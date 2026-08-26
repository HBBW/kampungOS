<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letter_model extends CI_Model
{
    public function get_requests($where = [])
    {
        $this->db->select('letter_requests.*, users.head_name, users.kk_number');
        $this->db->join('users', 'users.id = letter_requests.user_id', 'left');
        $this->db->where($where);
        $this->db->order_by('letter_requests.created_at', 'DESC');
        return $this->db->get('letter_requests')->result();
    }

    public function get_requests_by_user($user_id)
    {
        $this->db->select('letter_requests.*, users.head_name');
        $this->db->join('users', 'users.id = letter_requests.user_id', 'left');
        $this->db->where('letter_requests.user_id', $user_id);
        $this->db->order_by('letter_requests.created_at', 'DESC');
        return $this->db->get('letter_requests')->result();
    }

    public function get_request_by_id($id)
    {
        $this->db->select('letter_requests.*, users.head_name, users.kk_number, users.address');
        $this->db->join('users', 'users.id = letter_requests.user_id', 'left');
        $this->db->where('letter_requests.id', $id);
        return $this->db->get('letter_requests')->row();
    }

    public function create_request($data)
    {
        $this->db->insert('letter_requests', $data);
        return $this->db->insert_id();
    }

    public function update_request($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('letter_requests', $data);
    }

    public function generate_letter_number($type)
    {
        $year = date('Y');

        $prefix_map = [
            'domisili' => 'SKD',
            'usaha' => 'SKU',
            'nikah' => 'SPN',
            'skck' => 'SKCK'
        ];
        $prefix = $prefix_map[$type] ?? 'SK';

        $this->db->trans_start();

        // Lock the row to prevent race condition
        $this->db->where('year', $year);
        $row = $this->db->get('letter_numbering')->row();

        if (!$row) {
            $this->db->insert('letter_numbering', ['year' => $year, 'last_number' => 1]);
            $num = 1;
        } else {
            $num = $row->last_number + 1;
            $this->db->where('year', $year);
            $this->db->update('letter_numbering', ['last_number' => $num]);
        }

        $this->db->trans_complete();

        return $prefix . '/' . str_pad($num, 4, '0', STR_PAD_LEFT) . '/' . $year;
    }

    public function save_letter($data)
    {
        $this->db->insert('letters', $data);
        return $this->db->insert_id();
    }

    public function get_letter_by_request($request_id)
    {
        return $this->db->where('request_id', $request_id)->get('letters')->row();
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->count_all_results('letter_requests');
    }

    public function count_all()
    {
        return $this->db->count_all('letter_requests');
    }
}
