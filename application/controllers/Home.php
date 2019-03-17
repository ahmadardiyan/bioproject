<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['judul'] = 'Bio Project'; //nanti bakalan jadi title di bagian head

		$this->load->view('home/_partials/header',$data); 
		$this->load->view('home/homepage.php');
		$this->load->view('home/_partials/footer');
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