<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_model extends CI_Model
{
    public function create($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update($table, $key, $value, $data)
    {
        $this->db->where($key, $value);
        $this->db->update($table, $data);
    }

    public function delete($table, $key, $value)
    {
        $this->db->where($key, $value);
        $this->db->delete($table);
    }
    
    public function getDataWhere($table, $key, $value)
    {
        $query = $this->db->get_where($table, [$key => $value]);
        return $query->row_array();
    }

    public function getAllDataWhere($table, $key, $value)
    {
        $this->db->where($key, $value);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function getLowonganKerjaWhere($key, $value)
    {
        $this->db->where([$key => $value]);
        $this->db->join('kabupaten', 'kabupaten.id_kab = list_lowongan_kerja.id_kab');
        $this->db->join('provinsi', 'provinsi.id_prov = list_lowongan_kerja.id_prov');
        
        $query = $this->db->get('list_lowongan_kerja');
        return $query->row_array();
    }

    public function getKeahlian($key, $value)
    {
        $this->db->where([$key => $value]);
        $this->db->join('list_keahlian', 'list_keahlian.id_keahlian = lowongan_kerja.id_keahlian');
        $query = $this->db->get('lowongan_kerja');
        return $query->result_array();
    }

}
