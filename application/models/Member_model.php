<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
    public function getDataMember($key,$value)
    {
        $query = $this->db->get_where('member',[$key=>$value]);
        return $query->row_array();
    }
}
