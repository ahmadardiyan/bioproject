<?php

class Admin_model extends CI_Model{

  public function get($table)
  {
      $this->db->get($table);
  }

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

  public function getAllService()
  {
      $this->db->from('service');
      $query = $this->db->get();
      return $query->result_array();
  }



  // public function getAllAlamat()
  // {
  //     $this->db->join('kecamatan', 'kecamatan.id_kec = member.id_kec');
  //     $this->db->join('kabupaten', 'kabupaten.id_kab = member.id_kab');
  //     $this->db->join('provinsi', 'provinsi.id_prov = member.id_prov');
  //     $query = $this->db->get();
  //     return $query->result_array();
  // }

  public function getAllPortofolioo()
  {
      $this->db->select('portofolio.*, users.id_user AS id_user, users.username');
      $this->db->join('users', 'users.id_user = portofolio.id_user');
      $this->db->from('portofolio');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllEducations()
  {
      $this->db->select('pendidikan.*, users.id_user AS id_user, users.username');
      $this->db->join('users', 'users.id_user = pendidikan.id_user');
      $this->db->from('pendidikan');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllCertificates()
  {
      $this->db->select('sertifikat.*, users.id_user AS id_user, users.username');
      $this->db->join('users', 'users.id_user = sertifikat.id_user');
      $this->db->from('sertifikat');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllCategory()
  {
      $this->db->from('kategori_keahlian');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllSkills()
  {
      $this->db->select('list_keahlian.*, kategori_keahlian.id_kategori AS id_kategori, kategori_keahlian.nama_kategori_keahlian');
      $this->db->join('kategori_keahlian', 'kategori_keahlian.id_kategori = list_keahlian.id_kategori');
      $this->db->from('list_keahlian');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllProjects()
  {
      $this->db->select('lowongan_kerja.*, list_lowongan_kerja.id_lowongan_kerja AS id_lowongan_kerja, list_lowongan_kerja.judul');
      $this->db->join('list_lowongan_kerja', 'list_lowongan_kerja.id_lowongan_kerja = lowongan_kerja.id_lowongan_kerja');
      $this->db->select('lowongan_kerja.*, list_keahlian.id_keahlian AS id_keahlian, list_keahlian.nama_keahlian');
      $this->db->join('list_keahlian', 'list_keahlian.id_keahlian = lowongan_kerja.id_keahlian');
      $this->db->from('lowongan_kerja');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllListProjects()
  {
      $this->db->select('list_lowongan_kerja.*, perusahaan.id_user AS id_user, perusahaan.nama_perusahaan');
      $this->db->join('perusahaan', 'perusahaan.id_user = list_lowongan_kerja.id_user');
      $this->db->select('list_lowongan_kerja.*, users.id_user AS id_user, users.username');
      $this->db->join('users', 'users.id_user = list_lowongan_kerja.id_user');
      $this->db->from('list_lowongan_kerja');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllPengalamanKerja()
  {
      $this->db->select('pengalaman_kerja.*, users.id_user AS id_user, users.username');
      $this->db->join('users', 'users.id_user = pengalaman_kerja.id_user');
      $this->db->from('pengalaman_kerja');
      $query = $this->db->get();
      return $query->result_array();
  }

}
