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
		$data['member'] = $this->Member_model->getDataMember('id_user', '1');

		$this->load->view('partials/user/header',$data); 
		$this->load->view('home/homepage.php');
		$this->load->view('partials/user/footer');
	}

	public function about()
	{
		$this->load->view('about.php');
	}

	public function howitworks()
	{
		$this->load->view('howitworks.php');
	}

	public function contact()
	{
		$this->load->view('contact.php');
	}

	// public function login()
	// {
	// 	$this->load->view('login.php');
	// }

	// public function register()
	// {
	// 	$this->load->view('register.php');
	// }
}
 ?>