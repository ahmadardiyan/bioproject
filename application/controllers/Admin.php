<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function dashboard()
    {
        
        $data['judul'] = "Dashboard Admin"; //nanti bakalan jadi title di bagian head
        
        $this->load->view('admin/_partials/header',$data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/_partials/footer');
    }
}
