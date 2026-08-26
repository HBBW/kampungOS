<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->onlyRole('warga');
        $this->load->model(['Report_model', 'Announcement_model', 'Letter_model', 'Cash_model', 'Notification_model']);
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Warga';
        $data['my_reports'] = $this->Report_model->get_by_user($this->user->id);
        $data['announcements'] = $this->Announcement_model->get_all(['is_active' => 1]);
        $data['my_letters'] = $this->Letter_model->get_requests_by_user($this->user->id);
        $this->render('warga/dashboard', $data);
    }

    public function laporan()
    {
        $data['judul'] = 'Laporan Warga';
        $data['my_reports'] = $this->Report_model->get_by_user($this->user->id);
        $data['public_reports'] = $this->Report_model->get_public();
        $this->render('warga/laporan', $data);
    }

    public function pengumuman()
    {
        $data['judul'] = 'Pengumuman Warga';
        $data['announcements'] = $this->Announcement_model->get_all(['is_active' => 1]);
        $this->render('warga/pengumuman', $data);
    }

    public function iuran()
    {
        $data['judul'] = 'Keuangan & Iuran';
        $data['transactions'] = $this->Cash_model->get_all(50);
        $data['balance'] = $this->Cash_model->get_balance();
        $data['month_income'] = $this->Cash_model->get_month_income();
        $data['month_expense'] = $this->Cash_model->get_month_expense();
        $data['total_transactions'] = $this->Cash_model->count_all();
        $this->render('warga/kas', $data);
    }

    public function surat()
    {
        $data['judul'] = 'Surat Saya';
        $data['my_letters'] = $this->Letter_model->get_requests_by_user($this->user->id);
        $this->render('warga/surat', $data);
    }
}
