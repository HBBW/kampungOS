<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bendahara extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->onlyRole('bendahara');
        $this->load->model(['Cash_model', 'Report_model', 'Notification_model']);
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Bendahara';
        $data['balance'] = $this->Cash_model->get_balance();
        $data['month_income'] = $this->Cash_model->get_month_income();
        $data['month_expense'] = $this->Cash_model->get_month_expense();
        $data['transactions'] = $this->Cash_model->get_all(10);
        $data['total_transactions'] = $this->Cash_model->count_all();
        $this->render('bendahara/dashboard', $data);
    }

    public function keuangan()
    {
        $data['judul'] = 'Manajemen Keuangan';
        $data['balance'] = $this->Cash_model->get_balance();
        $data['month_income'] = $this->Cash_model->get_month_income();
        $data['month_expense'] = $this->Cash_model->get_month_expense();
        $data['transactions'] = $this->Cash_model->get_all(50);
        $data['total_transactions'] = $this->Cash_model->count_all();
        $data['monthly_summary'] = $this->Cash_model->get_monthly_summary();
        $this->render('bendahara/keuangan', $data);
    }
}
