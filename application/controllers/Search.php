<?php defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        // $this->load->model('Keahlian_model');
        $this->load->model('Search_model');
        $this->load->model('Company_model');

    }

    public function cariKerja($id_user = '1')
    {
        $data['title'] = 'Bio Project';
        $data['loker'] = $this->Search_model->getAllLowonganKerja();
        if (isset($_SESSION['level'])) {
            if ($_SESSION['level'] == 'member') {
                $data['member'] = $this->Member_model->getMember('id_user', $_SESSION['id_user']);
            } else {
                $data['company'] = $this->Company_model->getCompany('id_user', $_SESSION['id_user']);
            }
        } else {
            false;
        }

        $this->load->view('partials/user/header', $data);
        $this->load->view('search/cari_kerja');
        $this->load->view('partials/user/footer');
    }
}
