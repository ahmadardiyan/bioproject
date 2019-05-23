<?php

class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Auth_model');
        $this->load->model('Member_model');

        if (!$this->Auth_model->is_login()) {
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = "Template Company";
        $data['company'] = $this->Company_model->getDataCompany('id_user', $id_user );
        $data['loker'] = $this->Company_model->getAllDataWhere('list_lowongan_kerja', 'id_user', $id_user);
        
        $this->load->view('partials/user/header', $data);
        $this->load->view('company/index', $data);
        $this->load->view('partials/user/footer');
    }

    //about member
    public function detailProfileCompany()
    {
        $id_user = $_SESSION['id_user']; 
        $data['title'] = 'Bio Project';
        $data['company'] = $this->Company_model->getDataCompany('id_user', $id_user );

        $this->load->view('partials/user/header', $data);
        $this->load->view('company/detail_profile_company', $data);
        $this->load->view('partials/user/footer');
    }

    // memperbarui profile
    public function updateProfileCompany()
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = 'Update Profile Perusahaan';
        $data['company'] = $this->Company_model->getCompany('id_user', $id_user);

        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Tentang Perusahaan', 'required');
        $this->form_validation->set_rules('website', 'Website Perusahaan', 'required');
        $this->form_validation->set_rules('phone', 'Telephone', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        if (!empty($_FILES["foto"]["name"])) {
            $this->form_validation->set_rules('foto', 'Logo Perusahaan', 'callback_uploadImage');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('company/update_profile_company', $data);
            $this->load->view('partials/user/footer');
        } else {

            if (!empty($_FILES["foto"]["name"])) {
                $foto = $this->upload->data()['file_name'];
            } else {
                $foto = $this->input->post('foto_lama');
            }
            
            $data = [
                "nama_perusahaan" => $this->input->post('nama_perusahaan', true),
                "deskripsi_perusahaan" => $this->input->post('deskripsi', true),
                "website_perusahaan" => $this->input->post('website', true),
                "phone" => $this->input->post('phone', true),
                "alamat_perusahaan" => $this->input->post('alamat', true),
                "id_prov" => $this->input->post('provinsi', true),
                "id_kab" => $this->input->post('kabupaten', true),
                "id_kec" => $this->input->post('kecamatan', true),
                "logo_perusahaan" => $foto,
            ];
            
            $id_user = $this->input->post('id_user', true);

            $this->Member_model->update('perusahaan', 'id_user', $id_user, $data);
            redirect('company');
        }
    }

    public function createLowonganKerja()
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = "Template Company";
        $data['company'] = $this->Company_model->getCompany('id_user', $id_user);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('tanggal_penutupan', 'Tanggal Pentupan', 'required');
        $this->form_validation->set_rules('tipe_kerja', 'Tipe Kerja', 'required');
        $this->form_validation->set_rules('keahlian[]', 'Keahlian', 'required');
        $this->form_validation->set_rules('detail_lowongan_kerja', 'Detail Lowongan Kerja', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('company/create_lowongan_kerja');
            $this->load->view('partials/user/footer');
        } else {
           

            //membuat id_lowongan_kerja
            $time = date('Y-m-d');

            $idMax = $this->Member_model->maxId('id_lowongan_kerja', $time, 'list_lowongan_kerja');

            $kodeBelakang = (int) substr($idMax, 6, 4);
            $kodeBelakang++;

            $idLoker = date('ymd') . sprintf('%04s', $kodeBelakang);

            //mengubah date pada tanggal penutupan
            $tanggalPenutupan = strtotime($this->input->post('tanggal_penutupan'), true);
            $tanggalPenutupan = date('Y-m-d', $tanggalPenutupan);

            $data = [
                "id_lowongan_kerja" => $idLoker,
                "id_user" => $id_user,
                "judul" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "id_prov" => $this->input->post('provinsi', true),
                "id_kab" => $this->input->post('kabupaten', true),
                "tanggal_penutupan" => $tanggalPenutupan,
                "tipe_kerja" => $this->input->post('tipe_kerja', true),
                "detail_lowongan_kerja" => $this->input->post('detail_lowongan_kerja', true),
            ];

            $idKeahlian = $this->input->post('keahlian[]', true);

            foreach ($idKeahlian as $keahlian) {

                $loker = [
                    'id_lowongan_kerja' => $idLoker,
                    'id_keahlian' => $keahlian,
                ];

                $this->Company_model->create('lowongan_kerja', $loker);
            }

            $this->Company_model->create('list_lowongan_kerja', $data);

            redirect('company');
        }

    }

    public function updateLowonganKerja($id_lowongan_kerja = null)
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = "Template Company";
        $data['company'] = $this->Company_model->getCompany('id_user', $id_user);
        $data['loker'] = $this->Company_model->getLowonganKerjaWhere('id_lowongan_kerja', $id_lowongan_kerja);

        // var_dump($data);
        // die();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('tanggal_penutupan', 'Tanggal Pentupan', 'required');
        $this->form_validation->set_rules('tipe_kerja', 'Tipe Kerja', 'required');
        $this->form_validation->set_rules('keahlian[]', 'Keahlian', 'required');
        $this->form_validation->set_rules('detail_lowongan_kerja', 'Detail Lowongan Kerja', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('company/update_lowongan_kerja',$data);
            $this->load->view('partials/user/footer');
        } else {
            //membuat id_lowongan_kerja
            $time = date('Y-m-d');

            $idMax = $this->Member_model->maxId('id_lowongan_kerja', $time, 'list_lowongan_kerja');

            $kodeBelakang = (int) substr($idMax, 6, 4);
            $kodeBelakang++;

            $idLoker = date('ymd') . sprintf('%04s', $kodeBelakang);

            //mengubah date pada tanggal penutupan
            $tanggalPenutupan = strtotime($this->input->post('tanggal_penutupan'), true);
            $tanggalPenutupan = date('Y-m-d', $tanggalPenutupan);

            $data = [
                "id_lowongan_kerja" => $idLoker,
                "id_user" => $id_user,
                "judul" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "id_prov" => $this->input->post('provinsi', true),
                "id_kab" => $this->input->post('kabupaten', true),
                "tanggal_penutupan" => $tanggalPenutupan,
                "tipe_kerja" => $this->input->post('tipe_kerja', true),
                "detail_lowongan_kerja" => $this->input->post('detail_lowongan_kerja', true),
            ];

            $idKeahlian = $this->input->post('keahlian[]', true);

            foreach ($idKeahlian as $keahlian) {

                $loker = [
                    'id_lowongan_kerja' => $idLoker,
                    'id_keahlian' => $keahlian,
                ];

                $this->Company_model->create('lowongan_kerja', $loker);
            }

            $this->Company_model->create('list_lowongan_kerja', $data);

            redirect('company');
        }

    }

    public function detailLowonganKerja($id_lowongan_kerja = null, $id_user = null)
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = "Template Company";
        $data['company'] = $this->Company_model->getDataCompany('id_user', $id_user );
        $data['loker'] = $this->Company_model->getLowonganKerjaWhere('id_lowongan_kerja', $id_lowongan_kerja);
        $data['keahlian'] = $this->Company_model->getKeahlian('id_lowongan_kerja', $id_lowongan_kerja);

        $this->load->view('partials/user/header', $data);
        $this->load->view('company/detail_lowongan_kerja', $data);
        $this->load->view('partials/user/footer');
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
