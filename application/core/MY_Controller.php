<?php
class MY_Controller extends CI_Controller
{
    public $user;

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }

        $this->user = $this->db->get_where('users', [
            'id' => $this->session->userdata('user_id')
        ])->row();

        if (!$this->user) {
            $this->session->sess_destroy();
            redirect('auth');
        }

        $current = $this->router->fetch_class();

        if ($this->user->must_reset_password == 1 && $current !== 'auth') {
            redirect('auth/reset_password');
        }
    }

    protected function onlyRole($roles)
    {
        if (!in_array($this->user->role, (array)$roles)) {
            redirect($this->user->role);
        }
    }

    protected function render($view, $data = [])
    {
        $data['user'] = $this->user;

        $data['role'] = $this->user->role;
        $data['current'] = $this->router->fetch_class();

        $data['menus'] = [
            [
                'label' => 'Beranda',
                'icon' => 'dashboard',
                'routes' => [
                    'rt' => 'rt',
                    'sekretaris' => 'sekretaris',
                    'bendahara' => 'bendahara',
                    'warga' => 'warga'
                ],
                'match' => ''
            ],
            [
                'label' => 'Laporan & Pengaduan',
                'icon' => 'campaign',
                'routes' => [
                    'rt' => 'rt/laporan',
                    'sekretaris' => 'sekretaris/laporan',
                    'warga' => 'warga/laporan'
                ],
                'match' => 'laporan'
            ],
            [
                'label' => 'Pengumuman',
                'icon' => 'notifications_active',
                'routes' => [
                    'rt' => 'rt/pengumuman',
                    'sekretaris' => 'sekretaris/pengumuman',
                    'warga' => 'warga/pengumuman'
                ],
                'match' => 'pengumuman'
            ],
            [
                'label' => 'Keuangan & Iuran',
                'icon' => 'payments',
                'routes' => [
                    'rt' => 'rt/keuangan',
                    'bendahara' => 'bendahara/keuangan',
                    'warga' => 'warga/iuran'
                ],
                'match' => 'keuangan'
            ],
            [
                'label' => [
                    'rt' => 'Arsip Surat',
                    'sekretaris' => 'Administrasi Surat',
                    'bendahara' => 'Surat',
                    'warga' => 'Surat Saya'
                ],
                'icon' => 'description',
                'routes' => [
                    'rt' => 'rt/surat',
                    'sekretaris' => 'sekretaris/surat',
                    'bendahara' => 'bendahara/surat',
                    'warga' => 'warga/surat'
                ],
                'match' => 'surat'
            ]
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer', $data);
    }
}
