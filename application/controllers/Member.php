<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
    }

    public function index($id_user = '1')
    // public function index()
    {

        $data['title'] = 'Bio Project'; //nanti bakalan jadi title di bagian head
        // $data['member']= $this->Member_model->getAllDataMember('id_member',$id_member);
        $data['member'] = $this->Member_model->getDataMember('id_user', $id_user);
        $data['portofolio'] = $this->Member_model->getAllPortofolio('id_user', $id_user);
        // var_dump($data['portofolio']);
        // die();

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('partials/user/footer');
    }

    public function about($id_user = '1')
    {

        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getDataMember('id_user', $id_user);
        $data['skills'] = $this->Member_model->getSkillsMember('id_user', $id_user);
        // var_dump($data);
        // die();

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/about', $data);
        $this->load->view('partials/user/footer');
    }

    // public function editProfile($id_user)
    public function updateProfile($id_user = '1')
    {
        $data['title'] = 'Bio Project';

        $data['member'] = $this->Member_model->getDataMember('id_user', $id_user);

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

            // var_dump($data);
            // die();

            $this->Member_model->update('member', 'id_user', $id_user, $data);
            redirect('member');
        }
    }

    public function createPortofolio($id_user = '1')
    {
        $data['title'] = 'Tambah Portofolio';
        $data['member'] = $this->Member_model->getDataMember('id_user', $id_user);

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
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member');
        }
    }

    public function updatePortofolio($idPortofolio)
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getDataMember('id_user', '1');
        $data['portofolio'] = $this->Member_model->getPortofolio('id_portofolio', $idPortofolio);
        // var_dump($data);
        // die();

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
            // $this->session->set_flashdata('flash', 'Diperbarui');
            redirect('member');
        }
    }

    public function detailPortofolio($idPortofolio)
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getDataMember('id_user', '1');
        $data['portofolio'] = $this->Member_model->getPortofolio('id_portofolio', $idPortofolio);
        // var_dump($data['portofolio']);
        // die();

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/detail_portofolio', $data);
        $this->load->view('partials/user/footer');
    }

    public function deletePortofolio($idPortofolio)
    {
        $$data['portofolio'] = $this->Member_model->delete('portofolio', 'id_portofolio', $idPortofolio);
        // $this->session->set_flashdata('flash', 'Dihapus');
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

    public function updateSkills($id_user = '1')
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getDataMember('id_user', $id_user);
        // $data = ['skills' => $this->input->post('skills', true) ];

        // var_dump( $data['skills']);
        $this->form_validation->set_rules('skill[]', 'skill', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('member/update_skills', $data);
            $this->load->view('partials/user/footer');
        } else {
            $skill = $this->input->post('skill');

            foreach($skill as $row) :
                $data = array(
                    'id_daftar_keahlian' => $row,
                    'id_user' => $id_user
                );
                $this->db->insert('keahlian',$data);
            endforeach;

            redirect('member');
        }
    }
}