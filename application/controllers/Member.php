<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Portofolio_model');
    }

    // index
    public function index($id_user = '1')
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['portofolio'] = $this->Portofolio_model->getAllPortofolio('id_user', $id_user);
        $data['sertifikat'] = $this->Member_model->getAllDataWhere('sertifikat', 'id_user', $id_user);
        $data['pendidikan'] = $this->Member_model->getAllDataWhere('pendidikan', 'id_user', $id_user);
        $data['pengalaman_kerja'] = $this->Member_model->getAllDataWhere('pengalaman_kerja', 'id_user', $id_user);

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('partials/user/footer');
    }

    // data member json
    public function get($id_user = '1')
    {
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        echo json_encode($data);
    }

    //about member
    public function detailProfile($id_user = '1')
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        // $data['skills'] = $this->Member_model->getSkillsMember('id_user', $id_user);

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/detail_profile', $data);
        $this->load->view('partials/user/footer');
    }

    // memperbarui profile
    public function updateProfile($id_user = '1')
    {
        $data['title'] = 'Bio Project';

        $data['member'] = $this->Member_model->getMember('id_user', $id_user);

        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('nama_member', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi_member', 'Tentang Saya', 'required');
        $this->form_validation->set_rules('gender_member', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('phone_member', 'Telephone', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        if (!empty($_FILES["foto"]["name"])) {
            $this->form_validation->set_rules('foto', 'Foto', 'callback_uploadImage');
            // die();
            // $this->form_validation->set_rules('foto', 'Foto', 'uploadImage[profile]');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('member/update_profile', $data);
            $this->load->view('partials/user/footer');
        } else {

            if (!empty($_FILES["foto"]["name"])) {
                $foto = $this->upload->data()['file_name'];
            } else {
                $foto = $this->input->post('foto_lama');
            }

            $tanggalLahir = strtotime($this->input->post('tanggal_lahir'));
            $tanggalLahir = date('Y-m-d', $tanggalLahir);

            $data = [
                "nama_member" => $this->input->post('nama_member', true),
                "deskripsi_member" => $this->input->post('deskripsi_member', true),
                "gender_member" => $this->input->post('gender_member', true),
                "tempat_lahir" => $this->input->post('tempat_lahir', true),
                "tanggal_lahir" => $tanggalLahir,
                "phone_member" => $this->input->post('phone_member', true),
                "alamat" => $this->input->post('alamat', true),
                "id_prov" => $this->input->post('provinsi', true),
                "id_kab" => $this->input->post('kabupaten', true),
                "id_kec" => $this->input->post('kecamatan', true),
                "foto" => $foto,
            ];

            $this->Member_model->update('member', 'id_user', $id_user, $data);
            redirect('member');
        }
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
