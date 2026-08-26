<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Report_model', 'Announcement_model', 'Letter_model', 'Cash_model', 'Notification_model']);
    }

    private function json($data)
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    private function auth_check()
    {
        if (!$this->session->userdata('user_id')) {
            return $this->json(['status' => false, 'message' => 'Unauthorized']);
        }
        return null;
    }

    private function require_role($roles)
    {
        $role = $this->session->userdata('role');
        if (!in_array($role, (array) $roles)) {
            return $this->json(['status' => false, 'message' => 'Tidak memiliki akses']);
        }
        return null;
    }

    public function create_report()
    {
        if ($this->auth_check()) return;

        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $category = $this->input->post('category');
        $location = $this->input->post('location');
        $report_type = $this->input->post('report_type') ?: 'public';

        if (!$title || !$description || !$category) {
            return $this->json(['status' => false, 'message' => 'Judul, deskripsi, dan kategori wajib diisi']);
        }

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'location' => $location,
            'report_type' => $report_type,
            'status' => 'pending'
        ];

        $id = $this->Report_model->create($data);

        $this->db->insert('activity_logs', [
            'user_id' => $this->session->userdata('user_id'),
            'action' => 'Membuat laporan baru: ' . $title
        ]);

        return $this->json(['status' => true, 'message' => 'Laporan berhasil dikirim', 'id' => $id]);
    }

    public function update_report_status()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt', 'sekretaris'])) return;

        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if (!$id || !in_array($status, ['pending', 'diproses', 'selesai'])) {
            return $this->json(['status' => false, 'message' => 'Data tidak valid']);
        }

        $this->Report_model->update($id, ['status' => $status]);

        return $this->json(['status' => true, 'message' => 'Status laporan diperbarui']);
    }

    public function get_report()
    {
        if ($this->auth_check()) return;

        $id = $this->input->get('id');
        if (!$id) {
            return $this->json(['status' => false, 'message' => 'ID tidak valid']);
        }

        $report = $this->Report_model->get_by_id($id);
        if (!$report) {
            return $this->json(['status' => false, 'message' => 'Laporan tidak ditemukan']);
        }

        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('user_id');

        if ($report->report_type === 'private' && !in_array($role, ['rt', 'sekretaris']) && $report->user_id != $user_id) {
            return $this->json(['status' => false, 'message' => 'Anda tidak memiliki akses ke laporan ini']);
        }

        $report->images = $this->Report_model->get_images($id);

        return $this->json(['status' => true, 'data' => $report]);
    }

    public function delete_report()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt', 'sekretaris'])) return;

        $id = $this->input->post('id');
        if (!$id) {
            return $this->json(['status' => false, 'message' => 'ID tidak valid']);
        }

        $this->Report_model->delete($id);
        return $this->json(['status' => true, 'message' => 'Laporan dihapus']);
    }

    public function create_announcement()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt', 'sekretaris'])) return;

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $category = $this->input->post('category') ?: 'umum';

        if (!$title || !$content) {
            return $this->json(['status' => false, 'message' => 'Judul dan isi wajib diisi']);
        }

        $data = [
            'title' => $title,
            'content' => $content,
            'category' => $category,
            'created_by' => $this->session->userdata('user_id'),
            'is_active' => 1
        ];

        $id = $this->Announcement_model->create($data);

        return $this->json(['status' => true, 'message' => 'Pengumuman berhasil diterbitkan', 'id' => $id]);
    }

    public function update_announcement()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt', 'sekretaris'])) return;

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');

        if (!$id) {
            return $this->json(['status' => false, 'message' => 'ID tidak valid']);
        }

        $update = [];
        if ($title) $update['title'] = $title;
        if ($content) $update['content'] = $content;

        $this->Announcement_model->update($id, $update);
        return $this->json(['status' => true, 'message' => 'Pengumuman diperbarui']);
    }

    public function delete_announcement()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt', 'sekretaris'])) return;

        $id = $this->input->post('id');
        if (!$id) {
            return $this->json(['status' => false, 'message' => 'ID tidak valid']);
        }

        $this->Announcement_model->delete($id);
        return $this->json(['status' => true, 'message' => 'Pengumuman dihapus']);
    }

    public function create_letter()
    {
        if ($this->auth_check()) return;

        $type = $this->input->post('type');
        $purpose = $this->input->post('purpose');

        if (!$type || !$purpose) {
            return $this->json(['status' => false, 'message' => 'Jenis surat dan keperluan wajib diisi']);
        }

        $allowed = ['domisili', 'usaha', 'nikah', 'skck'];
        if (!in_array($type, $allowed)) {
            return $this->json(['status' => false, 'message' => 'Jenis surat tidak valid']);
        }

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'type' => $type,
            'purpose' => $purpose,
            'status' => 'pending'
        ];

        $id = $this->Letter_model->create_request($data);

        return $this->json(['status' => true, 'message' => 'Pengajuan surat berhasil', 'id' => $id]);
    }

    public function update_letter_status()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt', 'sekretaris'])) return;

        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if (!$id || !in_array($status, ['pending', 'approved', 'rejected'])) {
            return $this->json(['status' => false, 'message' => 'Data tidak valid']);
        }

        $update = ['status' => $status];
        if ($status === 'approved') {
            $request = $this->Letter_model->get_request_by_id($id);
            if ($request) {
                $letter_number = $this->Letter_model->generate_letter_number($request->type);
                $update['approved_by'] = $this->session->userdata('user_id');
                $update['approved_at'] = date('Y-m-d H:i:s');

                $this->Letter_model->save_letter([
                    'request_id' => $id,
                    'letter_number' => $letter_number,
                    'generated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

        $this->Letter_model->update_request($id, $update);
        return $this->json(['status' => true, 'message' => 'Status surat diperbarui']);
    }

    public function create_transaction()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt', 'bendahara'])) return;

        $type = $this->input->post('type');
        $amount = $this->input->post('amount');
        $description = $this->input->post('description');
        $category = $this->input->post('category') ?: 'umum';

        if (!$type || !$amount || !$description) {
            return $this->json(['status' => false, 'message' => 'Semua field wajib diisi']);
        }

        if (!in_array($type, ['income', 'expense'])) {
            return $this->json(['status' => false, 'message' => 'Tipe transaksi tidak valid']);
        }

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'type' => $type,
            'amount' => $amount,
            'description' => $description,
            'category' => $category,
            'created_by' => $this->session->userdata('user_id')
        ];

        $id = $this->Cash_model->create($data);

        return $this->json(['status' => true, 'message' => 'Transaksi berhasil ditambahkan', 'id' => $id]);
    }

    public function get_balance()
    {
        if ($this->auth_check()) return;

        return $this->json([
            'status' => true,
            'balance' => $this->Cash_model->get_balance(),
            'month_income' => $this->Cash_model->get_month_income(),
            'month_expense' => $this->Cash_model->get_month_expense()
        ]);
    }

    public function get_notifications()
    {
        if ($this->auth_check()) return;

        $user_id = $this->session->userdata('user_id');
        $notifications = $this->Notification_model->get_by_user($user_id);
        $unread = $this->Notification_model->count_unread($user_id);

        return $this->json(['status' => true, 'data' => $notifications, 'unread' => $unread]);
    }

    public function mark_notification_read()
    {
        if ($this->auth_check()) return;

        $id = $this->input->post('id');
        if ($id) {
            $this->Notification_model->mark_read($id, $this->session->userdata('user_id'));
        } else {
            $this->Notification_model->mark_all_read($this->session->userdata('user_id'));
        }

        return $this->json(['status' => true]);
    }

    public function get_announcements()
    {
        if ($this->auth_check()) return;

        $filter = $this->input->get('filter') ?: 'all';
        $where = [];
        if ($filter === 'active') $where['is_active'] = 1;
        if ($filter === 'ended') $where['is_active'] = 0;

        $announcements = $this->Announcement_model->get_all($where);
        return $this->json(['status' => true, 'data' => $announcements]);
    }

    public function create_jadwal()
    {
        if ($this->auth_check()) return;
        if ($this->require_role(['rt'])) return;

        $title = $this->input->post('title');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $location = $this->input->post('location') ?: 'Pos RT';

        if (!$title || !$date) {
            return $this->json(['status' => false, 'message' => 'Judul dan tanggal wajib diisi']);
        }

        $content = "Jadwal: " . date('d F Y', strtotime($date));
        if ($time) $content .= " pukul " . $time;
        if ($location) $content .= " di " . $location;
        $content .= "\n\n" . ($this->input->post('description') ?: '');

        $id = $this->Announcement_model->create([
            'title' => $title,
            'content' => $content,
            'category' => 'Kegiatan Warga',
            'created_by' => $this->session->userdata('user_id'),
            'is_active' => 1
        ]);

        return $this->json(['status' => true, 'message' => 'Jadwal rapat berhasil dibuat', 'id' => $id]);
    }
}
