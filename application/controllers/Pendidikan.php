<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Portofolio_model');
    }
    public function getPendidikan()
    {
        $id_pendidikan = $_POST['id_pendidikan'];
        $data = $this->Member_model->getDataWhere('pendidikan', 'id_pendidikan', $id_pendidikan);

        echo json_encode($data);
    }


    public function getAllPendidikan()
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['pendidikan'] = $this->Member_model->getAllDataWhere('pendidikan', 'id_user', $id_user);

        // var_dump($data['pendidikan']);
        // die();

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/pendidikan', $data);
        $this->load->view('partials/user/footer');
    }

    //Membuat Pendidikan
    public function createPendidikan()
    {
        $id_user = $_SESSION['id_user'];
        $this->form_validation->set_rules('nama_univ', 'Nama Universitas', 'required');
        $this->form_validation->set_rules('gelar', 'Gelar', 'required');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required');
        $this->form_validation->set_rules('tahun_mulai', 'Tahun mulai', 'required|numeric');
        $this->form_validation->set_rules('tahun_selesai', 'Tahun selesai', 'required|numeric');
        
        if ($this->form_validation->run() == false) {
            redirect('pendidikan');
        }

        $data = [
            "id_user" => $id_user,
            "nama_univ" => $this->input->post('nama_univ', true),
            "gelar" => $this->input->post('gelar', true),
            "prodi" => $this->input->post('prodi', true),
            "tahun_mulai" => $this->input->post('tahun_mulai', true),
            "tahun_selesai" => $this->input->post('tahun_selesai', true)
        ];

        $this->Member_model->create('pendidikan', $data);
        redirect('pendidikan');
    }

    // Memperbarui Data Pendidikan
    public function updatePendidikan()
    {
        $this->form_validation->set_rules('nama_univ', 'Nama Universitas', 'required');
        $this->form_validation->set_rules('gelar', 'Gelar', 'required');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required');
        $this->form_validation->set_rules('tahun_mulai', 'Tahun Mulai', 'required|numeric');
        $this->form_validation->set_rules('tahun_selesai', 'Tahun selesai', 'required|numeric');
        
        if ($this->form_validation->run() == false) {
            redirect('pendidikan');
        }

        $idPendidikan = $this->input->post('id_pendidikan', true);
        $data = [
            "nama_univ" => $this->input->post('nama_univ', true),
            "gelar" => $this->input->post('gelar', true),
            "prodi" => $this->input->post('prodi', true),
            "tahun_mulai" => $this->input->post('tahun_mulai', true),
            "tahun_selesai" => $this->input->post('tahun_selesai', true),
        ];

        $this->Member_model->update('pendidikan', 'id_pendidikan', $idPendidikan, $data);
        redirect('pendidikan');
    }

    // Menghapus Data Pendidikan
    public function deletePendidikan($idPendidikan)
    {
        $this->Member_model->delete('pendidikan', 'id_pendidikan', $idPendidikan);
        redirect('pendidikan');
    }
}