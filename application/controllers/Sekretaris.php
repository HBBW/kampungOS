<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekretaris extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->onlyRole('sekretaris');
        $this->load->model(['Report_model', 'Announcement_model', 'Letter_model', 'Cash_model', 'Notification_model', 'User_model']);
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Sekretaris';
        $data['total_warga'] = $this->User_model->count_all();
        $data['pending_letters'] = $this->Letter_model->count_by_status('pending');
        $data['total_reports'] = $this->Report_model->count_all();
        $data['recent_letters'] = $this->Letter_model->get_requests(['letter_requests.status' => 'pending']);
        $data['users'] = $this->User_model->get_all();
        $this->render('sekretaris/dashboard', $data);
    }

    public function laporan()
    {
        $data['judul'] = 'Laporan Sekretaris';
        $data['reports'] = $this->Report_model->get_all();
        $data['total_reports'] = $this->Report_model->count_all();
        $data['pending'] = $this->Report_model->count_by_status('pending');
        $data['processed'] = $this->Report_model->count_by_status('diproses');
        $data['completed'] = $this->Report_model->count_by_status('selesai');
        $this->render('sekretaris/laporan', $data);
    }

    public function pengumuman()
    {
        $data['judul'] = 'Pengumuman Sekretaris';
        $data['announcements'] = $this->Announcement_model->get_all();
        $this->render('sekretaris/pengumuman', $data);
    }

    public function surat()
    {
        $data['judul'] = 'Administrasi Surat';
        $data['letters'] = $this->Letter_model->get_requests();
        $data['total_requests'] = $this->Letter_model->count_all();
        $data['pending'] = $this->Letter_model->count_by_status('pending');
        $this->render('sekretaris/surat', $data);
    }
}
