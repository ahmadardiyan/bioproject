<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');

    }

    // index
    public function index($id_user = '1')
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['portofolio'] = $this->Member_model->getAllPortofolio('id_user', $id_user);
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

    // membuat portofolio
    public function createPortofolio($id_user = '1')
    {
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
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member');
        }
    }

    // memperbarui portofolio
    public function updatePortofolio($idPortofolio)
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', '1');
        $data['portofolio'] = $this->Member_model->getPortofolio('id_portofolio', $idPortofolio);

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

    // melihat detail portofolio
    public function detailPortofolio($idPortofolio)
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', '1');
        $data['portofolio'] = $this->Member_model->getPortofolio('id_portofolio', $idPortofolio);

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/detail_portofolio', $data);
        $this->load->view('partials/user/footer');
    }

    // menghapus portofolio
    public function deletePortofolio($idPortofolio)
    {
        $this->Member_model->delete('portofolio', 'id_portofolio', $idPortofolio);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('member');
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

    public function getSertifikat()
    {
        $id_sertifikat = $_POST['id_sertifikat'];
        $data = $this->Member_model->getDataWhere('sertifikat', 'id_sertifikat', $id_sertifikat);

        echo json_encode($data);
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

    public function getPendidikan()
    {
        $id_pendidikan = $_POST['id_pendidikan'];
        $data = $this->Member_model->getDataWhere('pendidikan', 'id_pendidikan', $id_pendidikan);

        echo json_encode($data);
    }


    public function getAllPendidikan($id_user = '1')
    {
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
    public function createPendidikan($id_user = '1')
    {
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
        // die();
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

    public function getPengalamanKerja()
    {
        $id_pengalaman = $_POST['id_pengalaman'];
        $data = $this->Member_model->getDataWhere('pengalaman_kerja', 'id_pengalaman', $id_pengalaman);

        echo json_encode($data);
    }

    public function getAllPengalamanKerja($id_user = '1')
    {
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
        $data['pengalaman_kerja'] = $this->Member_model->getAllDataWhere('pengalaman_kerja', 'id_user', $id_user);

        $this->load->view('partials/user/header', $data);
        $this->load->view('member/pengalaman_kerja', $data);
        $this->load->view('partials/user/footer');
    }

     //Membuat Pengalaman Kerja
     public function createPengalamanKerja($id_user = '1')
     {
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
