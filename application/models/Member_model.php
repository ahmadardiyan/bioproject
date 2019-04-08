<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
    public function getDataMember($key,$value)
    {
        $this->db->where([$key => $value]);
        $this->db->join('kecamatan', 'kecamatan.id_kec = member.id_kec');
        $this->db->join('kabupaten', 'kabupaten.id_kab = member.id_kab');
        $this->db->join('provinsi', 'provinsi.id_prov = member.id_prov');
        // $this->db->join('keahlian', 'keahlian.id_user = member.id_user');
        $query = $this->db->get('member');
        return $query->row_array();
    }

    public function getSkillsMember($key,$value)
    {
        $this->db->where([$key => $value]);
        $this->db->join('daftar_keahlian', 'daftar_keahlian.id_daftar_keahlian = keahlian.id_daftar_keahlian');
        $query = $this->db->get('keahlian');
        return $query->result_array();
    }

    public function getAllPortofolio($key,$value)
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get_where('portofolio',[$key=>$value]);
        return $query->result_array();
    }

    public function getPortofolio($key,$value)
    {
        $query = $this->db->get_where('portofolio',[$key=>$value]);
        return $query->row_array();
    }

    public function create($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function update($table,$key,$value,$data){
        $this->db->where($key,$value);
        $this->db->update($table, $data);
    }

    public function delete($table,$key,$value)
    {
        $this->db->where($key,$value);
        $this->db->delete($table);
    }

    public function maxId($select, $value, $table)
    {
        $this->db->like('created_at', $value);
        $this->db->select_max($select, 'maxId');
        $query = $this->db->get($table);
        $idMax = $query->row_array();
        return $idMax['maxId'];
    }
}
