<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio_model extends CI_Model
{
    // mengambil semua data portofolio secara desc
    public function getAllPortofolio($key, $value)
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get_where('portofolio', [$key => $value]);
        return $query->result_array();
    }

    // mengambil sebuah data portofolio
    public function getPortofolio($key, $value)
    {
        $query = $this->db->get_where('portofolio', [$key => $value]);
        return $query->row_array();
    }
}
