<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Sertifikat_model');
    }

    public function getSertifikat()
    {
        $id_sertifikat = $_POST['id_sertifikat'];
        $data = $this->Member_model->getDataWhere('sertifikat', 'id_sertifikat', $id_sertifikat);

        echo json_encode($data);
    }

    public function getAllSertifikat($id_user = '1')
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['sertifikat'] = $this->Member_model->getAllDataWhere('sertifikat', 'id_user', $id_user);

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/sertifikat', $data);
        $this->load->view('partials/user/footer');
    }


    //Membuat sertifikat
    public function createSertifikat($id_user = '1')
    {
        $this->form_validation->set_rules('nama_sertifikat', 'Nama Sertifikat', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');

        if ($this->form_validation->run() == false) {
            redirect('sertifikat');
        }

        $data = [
            "id_user" => $id_user,
            "nama_sertifikat" => $this->input->post('nama_sertifikat', true),
            "tahun" => $this->input->post('tahun', true),
        ];

        $this->Member_model->create('sertifikat', $data);
        redirect('sertifikat');
    }

    // Memperbarui Data Sertifikat
    public function updateSertifikat()
    {
        $this->form_validation->set_rules('nama_sertifikat', 'Nama Sertifikat', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');

        if ($this->form_validation->run() == false) {
            redirect('sertifikat');
        }

        $idSertifikat = $this->input->post('id_sertifikat', true);
        $data = [
            "nama_sertifikat" => $this->input->post('nama_sertifikat', true),
            "tahun" => $this->input->post('tahun', true),
        ];

        $this->Member_model->update('sertifikat', 'id_sertifikat', $idSertifikat, $data);
        redirect('sertifikat');

    }

    // Menghapus Data Sertifikat
    public function deleteSertifikat($idSertifikat)
    {
        $this->Member_model->delete('sertifikat', 'id_sertifikat', $idSertifikat);
        redirect('sertifikat');
    }
}