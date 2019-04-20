<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');

	}

	public function index()
	{
		$data['title'] = 'Bio Project'; //nanti bakalan jadi title di bagian head
		$data['member'] = $this->Member_model->getMember('id_user', '1');

		$this->load->view('partials/user/header',$data); 
		$this->load->view('home/homepage.php');
		$this->load->view('partials/user/footer');
	}

}
 ?>