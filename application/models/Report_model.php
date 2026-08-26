<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model
{
    protected $table = 'reports';

    public function get_all($where = [])
    {
        $this->db->select('reports.*, users.head_name, users.address');
        $this->db->join('users', 'users.id = reports.user_id', 'left');
        $this->db->where($where);
        $this->db->order_by('reports.created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function get_by_user($user_id)
    {
        $this->db->select('reports.*, users.head_name, users.address');
        $this->db->join('users', 'users.id = reports.user_id', 'left');
        $this->db->where('reports.user_id', $user_id);
        $this->db->order_by('reports.created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function get_public()
    {
        $this->db->select('reports.*, users.head_name, users.address');
        $this->db->join('users', 'users.id = reports.user_id', 'left');
        $this->db->where('report_type', 'public');
        $this->db->order_by('reports.created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('reports.*, users.head_name, users.address');
        $this->db->join('users', 'users.id = reports.user_id', 'left');
        $this->db->where('reports.id', $id);
        return $this->db->get($this->table)->row();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->count_all_results($this->table);
    }

    public function count_this_month()
    {
        $start = date('Y-m-01 00:00:00');
        $end = date('Y-m-t 23:59:59');
        $this->db->where('created_at >=', $start);
        $this->db->where('created_at <=', $end);
        return $this->db->count_all_results($this->table);
    }

    public function get_images($report_id)
    {
        return $this->db->where('report_id', $report_id)->get('report_images')->result();
    }

    public function add_image($data)
    {
        return $this->db->insert('report_images', $data);
    }
}
