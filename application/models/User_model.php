<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function get_all($where = [])
    {
        $this->db->where($where);
        return $this->db->get($this->table)->result();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function get_family_members($user_id)
    {
        return $this->db->where('user_id', $user_id)->get('family_members')->result();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_members_count()
    {
        return $this->db->count_all('family_members');
    }
}
