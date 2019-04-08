<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {
    public function create($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function update($table,$key,$value,$data){
        $this->db->where($key,$value);
        $this->db->update($table, $data);
    }

    public function getDataCompany($table,$key,$value){
        $query = $this->db->get_where($table,[$key=>$value]);
        return $query->row_array();
    }

    public function delete($table,$key,$value)
    {
        $this->db->where($key,$value);
        $this->db->delete($table);
    }

}