<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement_model extends CI_Model
{
    protected $table = 'announcements';

    public function get_all($where = [])
    {
        $this->db->select('announcements.*, users.head_name');
        $this->db->join('users', 'users.id = announcements.created_by', 'left');
        $this->db->where($where);
        $this->db->order_by('is_pinned', 'DESC');
        $this->db->order_by('announcements.created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('announcements.*, users.head_name');
        $this->db->join('users', 'users.id = announcements.created_by', 'left');
        $this->db->where('announcements.id', $id);
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

    public function count_active()
    {
        return $this->db->where('is_active', 1)->count_all_results($this->table);
    }
}
