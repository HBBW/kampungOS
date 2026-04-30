<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    private function json($data)
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function index()
    {
        $data['judul'] = 'Login Page';
        $this->load->view('templates/header', $data);
        $this->load->view('Auth/login_view');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $idNumber = $this->input->post('id_number');
        $password = $this->input->post('password');

        if (!$idNumber || !$password) {
            return $this->json([
                'status' => false,
                'message' => 'NIK dan password wajib diisi'
            ]);
        }

        $user = $this->db->get_where('users', [
            'kk_number' => $idNumber
        ])->row();

        if (!$user || !password_verify($password, $user->password)) {
            return $this->json([
                'status' => false,
                'message' => 'NIK atau password salah'
            ]);
        }

        $this->session->sess_regenerate(TRUE);

        $this->session->set_userdata([
            'user_id' => $user->id,
            'name' => $user->head_name,
            'role' => $user->role,
            'address' => $user->address,
            'logged_in' => true
        ]);

        if ($user->must_reset_password == 1) {
            return $this->json([
                'status' => true,
                'redirect' => base_url('auth/reset_password')
            ]);
        }

        $allowed_roles = ['rt', 'sekretaris', 'bendahara', 'warga'];

        $redirect = in_array($user->role, $allowed_roles)
            ? $user->role
            : 'auth';

        return $this->json([
            'status' => true,
            'redirect' => base_url($redirect)
        ]);
    }

    public function reset_password()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->view('templates/header');
        $this->load->view('Auth/reset_password_view');
        $this->load->view('templates/footer');
    }

    public function update_password()
    {
        $userId = $this->session->userdata('user_id');
        $password = $this->input->post('password');

        if (!$userId) {
            return $this->json([
                'status' => false,
                'message' => 'Session habis'
            ]);
        }

        if (!$password || strlen($password) < 6) {
            return $this->json([
                'status' => false,
                'message' => 'Password minimal 6 karakter'
            ]);
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->db->where('id', $userId);
        $this->db->update('users', [
            'password' => $hash,
            'must_reset_password' => 0
        ]);

        $this->session->sess_destroy();

        return $this->json([
            'status' => true,
            'redirect' => base_url('auth')
        ]);
    }

    public function logout()
    {
        $this->session->unset_userdata([
            'user_id',
            'name',
            'role',
            'address',
            'logged_in'
        ]);

        $this->session->sess_destroy();

        if ($this->input->is_ajax_request()) {
            echo json_encode([
                'status' => true,
                'redirect' => base_url('auth')
            ]);
        } else {
            redirect('auth');
        }
    }
}
