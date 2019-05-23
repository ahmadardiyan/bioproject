<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Home_model');
		$this->load->model('Company_model');
    }

    public function index()
    {
        $data['title'] = 'Bio Project'; //nanti bakalan jadi title di bagian head

        if (isset($_SESSION['level'])) {
            if ($_SESSION['level'] == 'member') {
                $data['member'] = $this->Member_model->getMember('id_user', $_SESSION['id_user']);
            } else {
                $data['company'] = $this->Company_model->getCompany('id_user', $_SESSION['id_user']);
            }
        } else {
            false;
        }

        $data['service'] = $this->Home_model->getAllService();

        $this->load->view('partials/user/header', $data);
        $this->load->view('home/homepage.php');
        $this->load->view('partials/user/footer');
        // $this->load->view('home/index.php');
    }

}
