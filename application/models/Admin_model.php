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

  public function getAllCategory()
  {
      $this->db->from('kategori_keahlian');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllSkills()
  {
      $this->db->from('list_keahlian');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function getAllProjects()
  {
      $this->db->from('project');
      $query = $this->db->get();
      return $query->result_array();
  }

}
