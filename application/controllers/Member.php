<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
    }

    // public function profile($id_member)
    public function profile()
    {

        $data['judul'] = 'Bio Project'; //nanti bakalan jadi title di bagian head
        // $data['member']= $this->Member_model->getAllDataMember('id_member',$id_member);
        $data['member']= $this->Member_model->getDataMember('id_user','1');
        // var_dump($data);
        // die();

		$this->load->view('partials/user/header',$data); 
        $this->load->view('member/profile',$data);
        $this->load->view('partials/user/footer');
    }
}