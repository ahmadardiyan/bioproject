<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Portofolio_model');
        // $this->load->helper('upload_image');
    }

// membuat portofolio
    public function createPortofolio($id_user = '1')
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = 'Tambah Portofolio';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);

        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('judul', 'Judul Portofolio', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Portofolio', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'callback_uploadImage');

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('member/create_portofolio', $data);
            $this->load->view('partials/user/footer');
        } else {
            $foto = $this->upload->data()['file_name'];

            //membuat id_portofolio
            $kodeDepan = 'PRT' . date('ymd');

            $time = date('Y-m-d');

            $idMax = $this->Member_model->maxId('id_portofolio', $time, 'portofolio');

            $kodeBelakang = (int) substr($idMax, 9, 5);
            $kodeBelakang++;

            $idPortofolio = $kodeDepan . sprintf('%04s', $kodeBelakang);

            $data = [
                "id_portofolio" => $idPortofolio,
                "id_user" => $id_user,
                "judul" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "foto" => $foto,
            ];
            
            $this->Member_model->create('portofolio', $data);
            $this->session->set_flashdata('flash-message', 'Ditambahkan');
            redirect('member');
        }
    }

    // memperbarui portofolio
    public function updatePortofolio($idPortofolio)
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['portofolio'] = $this->Portofolio_model->getPortofolio('id_portofolio', $idPortofolio);

        $this->form_validation->set_rules('id_portofolio', 'ID Portofolio', 'required');
        $this->form_validation->set_rules('judul', 'Judul Portofolio', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Portofolio', 'required');

        if (!empty($_FILES["foto"]["name"])) {
            $this->form_validation->set_rules('foto', 'File', 'callback_uploadImage');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('member/update_portofolio', $data);
            $this->load->view('partials/user/footer');
        } else {

            if (!empty($_FILES["foto"]["name"])) {
                $foto = $this->upload->data()['file_name'];
            } else {
                $foto = $this->input->post('foto_lama');
            }

            $data = [
                "judul" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "foto" => $foto,
            ];
            $this->Member_model->update('portofolio', 'id_portofolio', $idPortofolio, $data);
            $this->session->set_flashdata('flash-message', 'Diperbarui');
            redirect('member');
        }
    }

    // melihat detail portofolio
    public function getPortofolio($idPortofolio)
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['portofolio'] = $this->Portofolio_model->getPortofolio('id_portofolio', $idPortofolio);

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/detail_portofolio', $data);
        $this->load->view('partials/user/footer');
    }

    // menghapus portofolio
    public function deletePortofolio($idPortofolio)
    {
        $this->Member_model->delete('portofolio', 'id_portofolio', $idPortofolio);
        $this->session->set_flashdata('flash-message', 'Dihapus');
        redirect('member');
    }

    public function uploadImage()
    {
        $config['upload_path'] = 'assets/images/profile';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 1024 * 2; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->form_validation->set_message('uploadImage', $error);
            return false;
        } else {
            return true;
        }
    }

}