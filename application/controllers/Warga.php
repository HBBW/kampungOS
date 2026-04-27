<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->onlyRole('warga');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Warga';
        $this->render('warga/dashboard', $data);
    }


    public function laporan()
    {
        $data['judul'] = 'Laporan Warga';
        $this->render('warga/laporan', $data);
    }

    public function pengumuman()
    {
        $data['judul'] = 'Pengumuman Warga';
        $this->render('warga/pengumuman', $data);
    }


    public function iuran()
    {
        $data['judul'] = 'Dashboard Warga';
        $this->render('warga/kas', $data);
    }

    public function surat()
    {
        $data['judul'] = 'Dashboard Warga';
        $this->render('warga/surat', $data);
    }
}
