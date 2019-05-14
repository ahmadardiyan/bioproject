<?php

class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->model('Member_model');
    }

    public function index($id_user = '2')
    {
        $data['title'] = "Template Company";
        // $data['company'] = $this->Company_model->getData('id_user', $id_user);;
        $data['loker'] = $this->Company_model->getAllDataWhere('list_lowongan_kerja', 'id_user', $id_user);

        // var_dump($data);
        // die();

        $this->load->view('partials/user/header', $data);
        $this->load->view('company/index', $data);
        $this->load->view('partials/user/footer');
    }

    public function createLowonganKerja($id_user = '2')
    {
        $data['title'] = "Template Company";

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        // $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        // $this->form_validation->set_rules('usia_min', 'Usia Minimal', 'required|numeric');
        // $this->form_validation->set_rules('usia_maks', 'Usia Maksimal', 'required|numeric');
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
                // "gender" => $this->input->post('gender', true),
                // "usia_min" => $this->input->post('usia_min', true),
                // "usia_maks" => $this->input->post('usia_maks', true),
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

    public function detailLowonganKerja($id_lowongan_kerja=null)
    {
        $data['title'] = "Template Company";
        $data['loker'] = $this->Company_model->getLowonganKerjaWhere('id_lowongan_kerja', $id_lowongan_kerja);
        $data['keahlian'] = $this->Company_model->getKeahlian('id_lowongan_kerja', $id_lowongan_kerja);

        // var_dump($data['keahlian']);
        // die();

        $this->load->view('partials/user/header', $data);
        $this->load->view('company/detail_lowongan_kerja', $data);
        $this->load->view('partials/user/footer');
    }
}
