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
        
        $this->load->view('admin/dashboard');
       
    }
}
