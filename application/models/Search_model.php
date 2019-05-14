<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {
    public function getAllLowonganKerja()
    {
        $this->db->join('kabupaten', 'kabupaten.id_kab = list_lowongan_kerja.id_kab');
        $this->db->join('provinsi', 'provinsi.id_prov = list_lowongan_kerja.id_prov');
        
        $query = $this->db->get('list_lowongan_kerja');
        return $query->result_array();
    }
}