<?php defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Member_model');
        // $this->load->model('Keahlian_model');
        $this->load->model('Search_model');

    }

    public function cariKerja()
    {
        $data['title'] = 'Bio Project';
        $data['loker'] = $this->Search_model->getAllLowonganKerja();
        
        $this->load->view('partials/user/header', $data);
        $this->load->view('search/cari_kerja');
        $this->load->view('partials/user/footer');
    }
}