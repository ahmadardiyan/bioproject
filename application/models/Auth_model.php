<?php 

class Auth_model extends CI_Model
{

	public function insert_data(){
		$this->load->helper('string');//mengaktifkan helper string
		$_SESSION['token'] = random_string('alnum',16);

		$data = [
			'email'    => $this->input->post('email'),
			'username'    => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'token'    => $_SESSION['token'],
			'level'	   => $this->input->post('level')
		];

		$this->db->insert('users',$data);
	}
	
	public function get_user($key,$value){
		$query = $this->db->get_where('users',[$key => $value]);

		if (!empty($query->row_array())) {
			return $query->row_array();
		}
		return false;
	}

	public function update_role($id_user,$role){
		$data = ['role'=>$role];
		$this->db->where('id_user',$id_user);
		$this->db->update('users',$data);
	}

	public function is_login(){
		if (!isset($_SESSION['login'])) {
			return false;
		}

		return true;
	}

	public function checkPassword($email,$password){
		$hash = $this->Auth_model->get_user('email',$email)['password'];

		if (password_verify($password,$hash)) {
			return true;
		}

		return false;
	}

	public function updatePassword($id_user){
		$data = [ 
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
			// 'password' => $this->input->post('password')
		];

		$this->db->where('id_user', $id_user);
		$this->db->update('users', $data);
	}

	public function createID($tabel,$data)
	{
		$this->db->insert($tabel,$data);
	}

}

?>