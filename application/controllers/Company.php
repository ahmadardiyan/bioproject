<?php

class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
    }

}
