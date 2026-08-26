<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    protected $table = 'notifications';

    public function get_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(10);
        return $this->db->get($this->table)->result();
    }

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function mark_read($id)
    {
        return $this->db->where('id', $id)->update($this->table, ['is_read' => 1]);
    }

    public function mark_all_read($user_id)
    {
        return $this->db->where('user_id', $user_id)->where('is_read', 0)->update($this->table, ['is_read' => 1]);
    }

    public function count_unread($user_id)
    {
        return $this->db->where('user_id', $user_id)->where('is_read', 0)->count_all_results($this->table);
    }
}
