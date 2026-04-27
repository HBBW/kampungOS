<?php
class Rt extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->onlyRole('rt');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard RT';
        $this->render('rt/dashboard', $data);
    }

    public function surat()
    {
        $data['judul'] = 'Management Surat';
        $this->render('rt/surat_view', $data);
    }

    public function pengumuman()
    {
        $data['judul'] = 'Management Pengumuman';
        $this->render('rt/pengumuman_view', $data);
    }

    public function laporan()
    {
        $data['judul'] = 'Management Laporan';
        $this->render('rt/laporan_view', $data);
    }

      public function keuangan()
    {
        $data['judul'] = 'Management Kas';
        $this->render('rt/kas_view', $data);
    }
}
