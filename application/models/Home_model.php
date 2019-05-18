<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

  public function getAllService()
  {
      $this->db->from('service');
      $query = $this->db->get();
      return $query->result_array();
  }
  
}
