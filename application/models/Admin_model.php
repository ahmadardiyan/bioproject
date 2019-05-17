<?php

class Admin_model extends CI_Model{
  function hapus_member($id){
      $query=$this->db->query("delete from member where id_user='$id'");
      return $query;
  }

}
