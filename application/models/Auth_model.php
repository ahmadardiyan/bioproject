<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

		function __construct(){
				parent::__construct();
				$this->load->database();
		}

		public function getAllUsers(){
				$query = $this->db->get('users');
				return $query->result();
		}

		public function insert($user){
				$this->db->insert('users', $user);
				return $this->db->insert_id();
		}

		public function getUser($id){
				$query = $this->db->get_where('users',array('id'=>$id));
				return $query->row_array();
		}

		public function activate($data, $id){
				$this->db->where('users.id', $id);
				return $this->db->update('users', $data);
		}

		public function checkUser($email,$password)
		{
				$sql = "SELECT active , id , first_name FROM users where email = ? and password = ? ";
				$data = $this->db->query($sql, array($email,$password));
				return ($data->result_array()) ;
		}
}
