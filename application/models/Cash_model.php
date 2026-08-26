<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash_model extends CI_Model
{
    protected $table = 'cash_transactions';

    private function is_postgres()
    {
        return $this->db->dbdriver === 'postgre';
    }

    private function month_filter($column, $month, $year)
    {
        if ($this->is_postgres()) {
            $this->db->where("EXTRACT(MONTH FROM {$column})", $month);
            $this->db->where("EXTRACT(YEAR FROM {$column})", $year);
        } else {
            $this->db->where("MONTH({$column})", $month);
            $this->db->where("YEAR({$column})", $year);
        }
    }

    public function get_all($limit = 50, $offset = 0)
    {
        $this->db->select('cash_transactions.*, users.head_name');
        $this->db->join('users', 'users.id = cash_transactions.user_id', 'left');
        $this->db->order_by('cash_transactions.created_at', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_financial_summary()
    {
        $month = date('m');
        $year = date('Y');

        if ($this->is_postgres()) {
            $sql = "SELECT
                SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as total_income,
                SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as total_expense
                FROM cash_transactions";
            $total = $this->db->query($sql)->row();

            $sql_month = "SELECT
                SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as month_income,
                SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as month_expense
                FROM cash_transactions
                WHERE EXTRACT(MONTH FROM created_at) = ?
                AND EXTRACT(YEAR FROM created_at) = ?";
            $monthly = $this->db->query($sql_month, [$month, $year])->row();

            return [
                'balance' => ($total->total_income ?? 0) - ($total->total_expense ?? 0),
                'month_income' => $monthly->month_income ?? 0,
                'month_expense' => $monthly->month_expense ?? 0,
            ];
        }

        // MySQL fallback
        return [
            'balance' => $this->get_balance(),
            'month_income' => $this->get_month_income(),
            'month_expense' => $this->get_month_expense(),
        ];
    }

    public function get_total_income()
    {
        $this->db->select_sum('amount');
        $this->db->where('type', 'income');
        return $this->db->get($this->table)->row()->amount ?? 0;
    }

    public function get_total_expense()
    {
        $this->db->select_sum('amount');
        $this->db->where('type', 'expense');
        return $this->db->get($this->table)->row()->amount ?? 0;
    }

    public function get_month_income()
    {
        $this->db->select_sum('amount');
        $this->db->where('type', 'income');
        $this->month_filter('created_at', date('m'), date('Y'));
        return $this->db->get($this->table)->row()->amount ?? 0;
    }

    public function get_month_expense()
    {
        $this->db->select_sum('amount');
        $this->db->where('type', 'expense');
        $this->month_filter('created_at', date('m'), date('Y'));
        return $this->db->get($this->table)->row()->amount ?? 0;
    }

    public function get_balance()
    {
        return $this->get_total_income() - $this->get_total_expense();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function get_monthly_summary($months = 6)
    {
        $results = [];
        for ($i = $months - 1; $i >= 0; $i--) {
            $month = date('m', strtotime("-{$i} months"));
            $year = date('Y', strtotime("-{$i} months"));

            if ($this->is_postgres()) {
                $sql = "SELECT
                    SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as income,
                    SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as expense
                    FROM cash_transactions
                    WHERE EXTRACT(MONTH FROM created_at) = ?
                    AND EXTRACT(YEAR FROM created_at) = ?";
                $row = $this->db->query($sql, [$month, $year])->row();
                $income = $row->income ?? 0;
                $expense = $row->expense ?? 0;
            } else {
                $this->db->select_sum('amount');
                $this->db->where('type', 'income');
                $this->db->where('MONTH(created_at)', $month);
                $this->db->where('YEAR(created_at)', $year);
                $income = $this->db->get($this->table)->row()->amount ?? 0;

                $this->db->select_sum('amount');
                $this->db->where('type', 'expense');
                $this->db->where('MONTH(created_at)', $month);
                $this->db->where('YEAR(created_at)', $year);
                $expense = $this->db->get($this->table)->row()->amount ?? 0;
            }

            $results[] = [
                'month' => date('M', mktime(0, 0, 0, $month, 1)),
                'income' => $income,
                'expense' => $expense,
                'net' => $income - $expense
            ];
        }
        return $results;
    }
}
