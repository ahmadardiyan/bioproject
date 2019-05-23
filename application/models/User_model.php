<?php 

/**
 * 
 */
class User_model extends CI_Model
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function insert_data(){
		$this->load->helper('string');//mengaktifkan helper string
		$_SESSION['token'] = random_string('alnum',16);

		$data = [
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email'    => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'token'    => $_SESSION['token']
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
		$data = ['role_id'=>$role_id];
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
		$hash = $this->User_model->get_user('email',$email)['password'];

		if (password_verify($password,$hash)) {
			return true;
		}

		return false;
	}

	public function updatePassword($id){
		$data = [ 
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
		];

		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

}

?>