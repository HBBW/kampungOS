<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rt extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->onlyRole('rt');
        $this->load->model(['Report_model', 'Announcement_model', 'Letter_model', 'Cash_model', 'Notification_model', 'User_model']);
    }

    public function index()
    {
        $data['judul'] = 'Dashboard RT';
        $data['total_warga'] = $this->User_model->count_all();
        $data['pending_reports'] = $this->Report_model->count_by_status('pending');
        $data['total_reports'] = $this->Report_model->count_this_month();
        $data['pending_letters'] = $this->Letter_model->count_by_status('pending');
        $data['balance'] = $this->Cash_model->get_balance();
        $data['month_income'] = $this->Cash_model->get_month_income();
        $data['recent_reports'] = $this->Report_model->get_all();
        $data['recent_letters'] = $this->Letter_model->get_requests(['letter_requests.status' => 'pending']);
        $this->render('rt/dashboard', $data);
    }

    public function surat()
    {
        $data['judul'] = 'Management Surat';
        $data['letters'] = $this->Letter_model->get_requests();
        $data['total_requests'] = $this->Letter_model->count_all();
        $data['pending'] = $this->Letter_model->count_by_status('pending');
        $data['approved'] = $this->Letter_model->count_by_status('approved');
        $data['rejected'] = $this->Letter_model->count_by_status('rejected');
        $this->render('rt/surat_view', $data);
    }

    public function pengumuman()
    {
        $data['judul'] = 'Management Pengumuman';
        $data['announcements'] = $this->Announcement_model->get_all();
        $data['active_count'] = $this->Announcement_model->count_active();
        $this->render('rt/pengumuman_view', $data);
    }

    public function laporan()
    {
        $data['judul'] = 'Management Laporan';
        $data['reports'] = $this->Report_model->get_all();
        $data['total_reports'] = $this->Report_model->count_all();
        $data['pending'] = $this->Report_model->count_by_status('pending');
        $data['processed'] = $this->Report_model->count_by_status('diproses');
        $data['completed'] = $this->Report_model->count_by_status('selesai');
        $this->render('rt/laporan_view', $data);
    }

    public function keuangan()
    {
        $data['judul'] = 'Management Kas';
        $data['transactions'] = $this->Cash_model->get_all(50);
        $data['balance'] = $this->Cash_model->get_balance();
        $data['month_income'] = $this->Cash_model->get_month_income();
        $data['month_expense'] = $this->Cash_model->get_month_expense();
        $data['total_transactions'] = $this->Cash_model->count_all();
        $data['monthly_summary'] = $this->Cash_model->get_monthly_summary();
        $this->render('rt/kas_view', $data);
    }
}
