<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    // menampilkan data dari database
    public function get($table)
    {
        $this->db->get($table);
    }

    // menampilkan data dengan ketentuan where dari database
    public function getDataWhere($table, $key, $value)
    {
        $this->db->where($key, $value);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    public function getAllDataWhere($table, $key, $value)
    {
        $this->db->where($key, $value);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    // menambahkan data ke database
    public function create($table, $data)
    {
        $this->db->insert($table, $data);
    }

    // memperbarui data ke database
    public function update($table, $key, $value, $data)
    {
        $this->db->where($key, $value);
        $this->db->update($table, $data);
    }

    // menghapus data ke database
    public function delete($table, $key, $value)
    {
        $this->db->where($key, $value);
        $this->db->delete($table);
    }

    // melihat id terakhir pada database
    public function maxId($select, $value, $table)
    {
        $this->db->like('created_at', $value);
        $this->db->select_max($select, 'maxId');
        $query = $this->db->get($table);
        $idMax = $query->row_array();
        return $idMax['maxId'];
    }

    // mengambil data member
    public function getMember($key, $value)
    {
        $this->db->where([$key => $value]);
        $this->db->join('kecamatan', 'kecamatan.id_kec = member.id_kec');
        $this->db->join('kabupaten', 'kabupaten.id_kab = member.id_kab');
        $this->db->join('provinsi', 'provinsi.id_prov = member.id_prov');
        $this->db->from('member');

        $query = $this->db->get();
        return $query->row_array();
    }

    // mengambil data skill member
    public function getKeahlian($key, $value)
    {
        $this->db->where([$key => $value]);
        $this->db->join('list_keahlian', 'list_keahlian.id_keahlian = keahlian.id_keahlian');
        $query = $this->db->get('keahlian');
        return $query->result_array();
    }

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
