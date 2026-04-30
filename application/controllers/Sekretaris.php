<?php
class Sekretaris extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->onlyRole('sekretaris');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Sekretaris';
        $this->render('sekretaris/dashboard', $data);
    }

    public function laporan()
    {
        $data['judul'] = 'Laporan Sekretaris';
        $this->render('sekretaris/laporan', $data);
    }

    public function pengumuman()
    {
        $data['judul'] = 'Pengumuman Sekretaris';
        $this->render('sekretaris/pengumuman', $data);
    }

    public function surat()
    {
        $data['judul'] = 'Surat Sekretaris';
        $this->render('sekretaris/surat', $data);
    }
}
