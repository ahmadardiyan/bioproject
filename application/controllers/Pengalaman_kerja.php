<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengalaman_kerja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Portofolio_model');
    }
    public function getPengalamanKerja()
    {
        $id_pengalaman = $_POST['id_pengalaman'];
        $data = $this->Member_model->getDataWhere('pengalaman_kerja', 'id_pengalaman', $id_pengalaman);

        echo json_encode($data);
    }

    public function getAllPengalamanKerja()
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['pengalaman_kerja'] = $this->Member_model->getAllDataWhere('pengalaman_kerja', 'id_user', $id_user);

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/pengalaman_kerja', $data);
        $this->load->view('partials/user/footer');
    }

     //Membuat Pengalaman Kerja
     public function createPengalamanKerja()
     {
        $id_user = $_SESSION['id_user'];
         $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
         $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
         $this->form_validation->set_rules('tahun_mulai', 'Tahun mulai', 'required|numeric');
         $this->form_validation->set_rules('tahun_selesai', 'Tahun selesai', 'required|numeric');
         
         if ($this->form_validation->run() == false) {
             redirect('pengalaman-kerja');
         }
 
         $data = [
             "id_user" => $id_user,
             "nama_perusahaan" => $this->input->post('nama_perusahaan', true),
             "jabatan" => $this->input->post('jabatan', true),
             "tahun_mulai" => $this->input->post('tahun_mulai', true),
             "tahun_selesai" => $this->input->post('tahun_selesai', true)
         ];
 
         $this->Member_model->create('pengalaman_kerja', $data);
         redirect('pengalaman-kerja');
     }
 
     // Memperbarui Data Pengalaman Kerja
     public function updatePengalamanKerja()
     {
         $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
         $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
         $this->form_validation->set_rules('tahun_mulai', 'Tahun mulai', 'required|numeric');
         $this->form_validation->set_rules('tahun_selesai', 'Tahun selesai', 'required|numeric');
         
         if ($this->form_validation->run() == false) {
             redirect('pengalaman-kerja');
         }
        //  die();
         $idPengalaman = $this->input->post('id_pengalaman', true);
         $data = [
             "nama_perusahaan" => $this->input->post('nama_perusahaan', true),
             "jabatan" => $this->input->post('jabatan', true),
             "tahun_mulai" => $this->input->post('tahun_mulai', true),
             "tahun_selesai" => $this->input->post('tahun_selesai', true)
         ];
 
         $this->Member_model->update('pengalaman_kerja', 'id_pengalaman', $idPengalaman, $data);
         redirect('pengalaman-kerja');
 
     }
 
     // Menghapus Data Pengalaman Kerja
     public function deletePengalamanKerja($idPengalaman)
     {
         $this->Member_model->delete('pengalaman_kerja', 'id_pengalaman', $idPengalaman);
         redirect('pengalaman-kerja');
     }
    }
