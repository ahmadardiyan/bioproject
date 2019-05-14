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
        
        $data['title'] = "Dashboard Admin"; //nanti bakalan jadi title di bagian head

        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('partials/admin/footer');
       
    }
}
