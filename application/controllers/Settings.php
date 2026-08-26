<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['judul'] = 'Pengaturan Akun';
        $data['user_data'] = $this->user;
        $role = $this->user->role;

        if ($role === 'rt') {
            $this->render('settings/profile', $data);
        } elseif ($role === 'sekretaris') {
            $this->render('settings/profile', $data);
        } elseif ($role === 'bendahara') {
            $this->render('settings/profile', $data);
        } else {
            $this->render('settings/profile', $data);
        }
    }

    public function update()
    {
        $name = $this->input->post('name');
        $address = $this->input->post('address');

        if (!$name) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Nama wajib diisi']));
        }

        $update = ['head_name' => $name];
        if ($address) $update['address'] = $address;

        $this->db->where('id', $this->user->id);
        $this->db->update('users', $update);

        $this->session->set_userdata('name', $name);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['status' => true, 'message' => 'Profil berhasil diperbarui']));
    }
}
