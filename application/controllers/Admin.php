<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Member_model');
        $this->load->model('Company_model');
    }

    public function dashboard()
    {

        $data['title'] = "Dashboard Admin"; //nanti bakalan jadi title di bagian head

        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('partials/admin/footer');

    }

    public function profile()
    {

        $data['title'] = "My Profile";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/myprofile', $data);
        $this->load->view('partials/admin/footer');


    }

    public function edit_profile()
    {
        $data['title'] = "Edit My Profile";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/admin/header', $data);
            $this->load->view('partials/admin/sidebar', $data);
            $this->load->view('partials/admin/topbar', $data);
            $this->load->view('admin/edit-profile', $data);
            $this->load->view('partials/admin/footer');
        } else {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|png|jpg';
                $config['upload_path'] = './assets/images/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('firstname', $firstname);
            $this->db->set('lastname', $lastname);

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your profile has been updated.</div>');
            redirect('admin/profile');

        }
    }

    public function members()
    {
        $data['title'] = 'Data Member';
        $data['member'] = $this->Member_model->getAllMember();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_member()
    {
        // $foto = $this->upload->data()['file_name'];
        $data = [
        // "id_user" => $this->input->post('id_member', true),
          "nama_member" => $this->input->post('nama_member', true),
          "gender_member" => $this->input->post('gender_member', true),
          "tempat_lahir" => $this->input->post('tempat_lahir', true),
          "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
          "deskripsi_member" => $this->input->post('deskripsi_member', true),
          // "phone_member" => $this->input->post('phone_member', true),
          "alamat" => $this->input->post('alamat', true),
          // "foto" => $foto
        ];
        // $upload_image = $_FILES['foto']['name'];
        //
        // if ($upload_image) {
        //     $config['allowed_types'] = 'gif|png|jpg';
        //     $config['upload_path'] = './assets/images/profile/';
        //
        //     $this->load->library('upload', $config);
        //
        //     if ($this->upload->do_upload('foto')) {
        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('image', $new_image);
        //     } else {
        //         echo $this->upload->display_errors();
        //     }
        // }



      // var_dump($data);
      // die();
        $this->Member_model->create('member', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New Member Added</div>');
        redirect('admin/members');
    }

    public function update_member()
    {
        $id=$this->input->post('kode');
        $data = [
          // "id_user" => $this->input->post('id_member', true),
            "nama_member" => $this->input->post('nama_member', true),
            "gender_member" => $this->input->post('gender_member', true),
            "deskripsi_member" => $this->input->post('deskripsi_member', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "alamat" => $this->input->post('alamat', true),
            // "id_prov" => $this->input->post('provinsi', true),
            // "id_kab" => $this->input->post('kabupaten', true),
            // "id_kec" => $this->input->post('kecamatan', true)
            // "foto" => $foto,

        ];



        $this->Member_model->update('member', 'id_user', $id, $data);
        // $this->Admin_model->edit_member($id,$nama_member);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Member updated!</div>');
        redirect('admin/members');
    }

    public function hapus_member()
    {
        $id=$this->input->post('kode');
        $this->Member_model->delete('member', 'id_user', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Member deleted!</div>');
        redirect('admin/members');
    }

    public function companies()
    {
        $data['title'] = 'Data Company';
        $data['perusahaan'] = $this->Company_model->getAllCompany();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/company', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_company()
    {
        $data = [
        // "id" => $this->input->post('id', true),
          "nama_perusahaan" => $this->input->post('nama_perusahaan', true),
          "website_perusahaan" => $this->input->post('website_perusahaan', true),
          "alamat_perusahaan" => $this->input->post('alamat_perusahaan', true),
          "tagline" => $this->input->post('tagline', true),
          "deskripsi_perusahaan" => $this->input->post('deskripsi_perusahaan', true)
        ];

        // var_dump($data);
        // die();
        $this->Company_model->create('perusahaan', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New Company Added</div>');
        redirect('admin/companies');
    }

    public function update_company()
    {
        $id=$this->input->post('kode');
        $data = [
        // "id" => $this->input->post('id', true),
          "nama_perusahaan" => $this->input->post('nama_perusahaan', true),
          "website_perusahaan" => $this->input->post('website_perusahaan', true),
          "alamat_perusahaan" => $this->input->post('alamat_perusahaan', true),
          "tagline" => $this->input->post('tagline', true),
          "deskripsi_perusahaan" => $this->input->post('deskripsi_perusahaan', true)
        ];

        // var_dump($data);
        // die();
        $this->Company_model->update('perusahaan','id_user', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Company Updated</div>');
        redirect('admin/companies');
    }

    public function hapus_company()
    {
        $id=$this->input->post('kode');
        $this->Company_model->delete('perusahaan', 'id_user', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Company deleted!</div>');
        redirect('admin/companies');
    }

    public function services(){
        $data['title'] = 'Data Service';
        $data['service'] = $this->Admin_model->getAllService();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/service', $data);
        $this->load->view('partials/admin/footer');

    }

    public function simpan_service()
    {
        $data = [
        // "id" => $this->input->post('id', true),
          "icon" => $this->input->post('icon', true),
          "title" => $this->input->post('title', true),
          "deskripsi" => $this->input->post('deskripsi', true)
        ];

        // var_dump($data);
        // die();
        $this->Admin_model->create('service', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New Service Added</div>');
        redirect('admin/services');
    }

    public function update_service()
    {
        $id=$this->input->post('kode');
        $data = [
          // "id_user" => $this->input->post('id', true),
            "icon" => $this->input->post('icon', true),
            "title" => $this->input->post('title', true),
            "deskripsi" => $this->input->post('deskripsi', true)

        ];
        $this->Admin_model->update('service', 'id', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Service updated!</div>');
        redirect('admin/services');
    }

    public function hapus_service()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('service', 'id', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Member deleted!</div>');
        redirect('admin/services');
    }

    public function portofolios()
    {
        $data['title'] = 'Data Portofolio';
        $data['portofolio'] = $this->Admin_model->getAllPortofolioo();
        $data['member'] = $this->Member_model->getAllMember();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/portofolio', $data);
        $this->load->view('partials/admin/footer');

    }

    public function hapus_portofolio()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('portofolio', 'id_portofolio', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Portofolio deleted!</div>');
        redirect('admin/portofolios');
    }

    public function educations(){
        $data['title'] = 'Data Pendidikan';
        $data['pendidikan'] = $this->Admin_model->getAllEducations();
        $data['member'] = $this->Member_model->getAllMember();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/education', $data);
        $this->load->view('partials/admin/footer');

    }

    public function simpan_education()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "nama_univ" => $this->input->post('nama_univ', true),
            "gelar" => $this->input->post('gelar', true),
            "prodi" => $this->input->post('prodi', true),
            "tahun_mulai" => $this->input->post('tahun_mulai', true),
            "tahun_selesai" => $this->input->post('tahun_selesai', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->create('pendidikan', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New Education Added</div>');
        redirect('admin/educations');
    }

    public function update_education()
    {
        $id=$this->input->post('kode');
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "nama_univ" => $this->input->post('nama_univ', true),
            "gelar" => $this->input->post('gelar', true),
            "prodi" => $this->input->post('prodi', true),
            "tahun_mulai" => $this->input->post('tahun_mulai', true),
            "tahun_selesai" => $this->input->post('tahun_selesai', true)
        ];
        $this->Admin_model->update('pendidikan', 'id_pendidikan', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Education updated!</div>');
        redirect('admin/educations');
    }

    public function hapus_education()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('pendidikan', 'id_pendidikan', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Pendidikan deleted!</div>');
        redirect('admin/educations');
    }

    public function certificates(){
        $data['title'] = 'Data Sertifikat';
        $data['sertifikat'] = $this->Admin_model->getAllCertificates();
        $data['member'] = $this->Member_model->getAllMember();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/certificate', $data);
        $this->load->view('partials/admin/footer');

    }

    public function simpan_certificate()
    {
        $data = [
          "id_user" => $this->input->post('id_user', true),
          "nama_sertifikat" => $this->input->post('nama_sertifikat', true),
          "tahun" => $this->input->post('tahun', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->create('sertifikat', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New Certificate Added</div>');
        redirect('admin/certificates');
    }

    public function update_certificate()
    {
        $id=$this->input->post('kode');
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "nama_sertifikat" => $this->input->post('nama_sertifikat', true),
            "tahun" => $this->input->post('tahun', true)
        ];
        $this->Admin_model->update('sertifikat', 'id_sertifikat', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Certificate updated!</div>');
        redirect('admin/certificates');
    }

    public function hapus_certificate()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('sertifikat', 'id_sertifikat', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Sertifikat deleted!</div>');
        redirect('admin/certificates');
    }

    public function categories()
    {
        $data['title'] = 'Data Kategori Keahlian';
        $data['kategori_keahlian'] = $this->Admin_model->getAllCategory();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/category', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_category()
    {
        $data = [
            "nama_kategori_keahlian" => $this->input->post('nama_kategori_keahlian', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->create('kategori_keahlian', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New Kategori Keahlian Added</div>');
        redirect('admin/categories');
    }

    public function update_category()
    {
        $id=$this->input->post('kode');
        $data = [
            "nama_kategori_keahlian" => $this->input->post('nama_kategori_keahlian', true)
        ];
        $this->Admin_model->update('kategori_keahlian', 'id_kategori', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Kategori Keahlian updated!</div>');
        redirect('admin/categories');
    }

    public function hapus_category()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('kategori_keahlian', 'id_kategori', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Kategori Keahlian deleted!</div>');
        redirect('admin/categories');
    }

    public function skills()
    {
        $data['title'] = 'Data List Keahlian';
        $data['list_keahlian'] = $this->Admin_model->getAllSkills();
        $data['kategori_keahlian'] = $this->Admin_model->getAllCategory();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['list_keahlian']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/skill', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_skill()
    {
        $data = [
            "nama_keahlian" => $this->input->post('nama_keahlian', true),
            "id_kategori" => $this->input->post('id_kategori', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->create('list_keahlian', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New List Keahlian Added</div>');
        redirect('admin/skills');
    }

    public function update_skill()
    {
        $id=$this->input->post('kode');
        $data = [
            "nama_keahlian" => $this->input->post('nama_keahlian', true),
            "id_kategori" => $this->input->post('id_kategori', true)
        ];
        $this->Admin_model->update('list_keahlian', 'id_keahlian', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        List Keahlian updated!</div>');
        redirect('admin/skills');
    }

    public function hapus_skill()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('list_keahlian', 'id_keahlian', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        List Keahlian deleted!</div>');
        redirect('admin/skills');
    }

    public function projects()
    {
        $data['title'] = 'Data Project';
        $data['lowongan_kerja'] = $this->Admin_model->getAllProjects();
        $data['list_lowongan_kerja'] = $this->Admin_model->getAllListProjects();
        $data['list_keahlian'] = $this->Admin_model->getAllSkills();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['lowongan_kerja']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/project', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_projectt()
    {
        $data = [
            "id_lowongan_kerja" => $this->input->post('id_lowongan_kerja', true),
            "judul" => $this->input->post('judul',true),
            "id_keahlian" => $this->input->post('id_keahlian', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->create('lowongan_kerja', 'id', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New List Project Added</div>');
        redirect('admin/projects');
    }

    public function update_projectt()
    {
        $id=$this->input->post('kode');
        $data = [
            "id_lowongan_kerja" => $this->input->post('id_lowongan_kerja', true),
            // "judul" => $this->input->post('judul',true),
            "id_keahlian" => $this->input->post('id_keahlian', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->update('lowongan_kerja', 'id_lowongan_kerja', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Project updated!</div>');
        redirect('admin/projects');
    }

    public function hapus_project()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('lowongan_kerja', 'id_lowongan_kerja', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Project deleted!</div>');
        redirect('admin/projects');
    }

    public function list_projects()
    {
        $data['title'] = 'Data List Project';
        $data['list_lowongan_kerja'] = $this->Admin_model->getAllListProjects();
        $data['member'] = $this->Member_model->getAllMember();
        $data['perusahaan'] = $this->Company_model->getAllCompany();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/list-project', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_list_project()
    {
        $data = [
            "id_lowongan_kerja" => $this->input->post('id_lowongan_kerja', true),
            "id_user" => $this->input->post('id_user', true),
            "judul" => $this->input->post('judul', true),
            "gender" => $this->input->post('gender', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "tanggal_penutupan" => $this->input->post('tanggal_penutupan', true),
            "tipe_kerja" => $this->input->post('tipe_kerja', true),
            "detail_lowongan_kerja" => $this->input->post('detail_lowongan_kerja', true)
        ];
        var_dump($data);
        die();
        $this->Admin_model->create('list_lowongan_kerja', 'id_lowongan_kerja', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New List Project Added</div>');
        redirect('admin/list_projects');
    }

    public function update_list_project()
    {
        $id=$this->input->post('kode');
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "judul" => $this->input->post('judul', true),
            "gender" => $this->input->post('gender', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "usia_min" => $this->input->post('usia_min', true),
            "usia_maks" => $this->input->post('usia_maks', true),
            "tanggal_penutupan" => $this->input->post('tanggal_penutupan', true),
            "tipe_kerja" => $this->input->post('tipe_kerja', true),
            "detail_lowongan_kerja" => $this->input->post('detail_lowongan_kerja', true)
        ];
        $this->Admin_model->update('list_lowongan_kerja', 'id_lowongan_kerja', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        List Project updated!</div>');
        redirect('admin/list_projects');
    }

    public function hapus_list_project()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('list_lowongan_kerja', 'id_lowongan_kerja', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Project deleted!</div>');
        redirect('admin/list_projects');
    }

    public function pengalaman_kerjas()
    {
        $data['title'] = 'Data Pengalaman Kerja';
        $data['pengalaman_kerja'] = $this->Admin_model->getAllPengalamanKerja();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['list_keahlian']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/pengalaman_kerja', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_pengalaman_kerja()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "nama_perusahaan" => $this->input->post('nama_perusahaan', true),
            "jabatan" => $this->input->post('jabatan', true),
            "lokasi" => $this->input->post('lokasi', true),
            "bulan_mulai" => $this->input->post('bulan_mulai', true),
            "tahun_mulai" => $this->input->post('tahun_mulai', true),
            "bulan_selesai" => $this->input->post('bulan_selesai', true),
            "tahun_selesai" => $this->input->post('tahun_selesai', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->create('pengalaman_kerja', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Pengalaman Kerja Added</div>');
        redirect('admin/pengalaman_kerjas');
    }

    public function update_pengalaman_kerja()
    {
        $id=$this->input->post('kode');
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "nama_perusahaan" => $this->input->post('nama_perusahaan', true),
            "jabatan" => $this->input->post('jabatan', true),
            "lokasi" => $this->input->post('lokasi', true),
            "bulan_mulai" => $this->input->post('bulan_mulai', true),
            "tahun_mulai" => $this->input->post('tahun_mulai', true),
            "bulan_selesai" => $this->input->post('bulan_selesai', true),
            "tahun_selesai" => $this->input->post('tahun_selesai', true)
        ];
        $this->Admin_model->update('pengalaman_kerja', 'id_pengalaman', $id, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Pengalaman Kerja updated!</div>');
        redirect('admin/pengalaman_kerjas');
    }

    public function hapus_pengalaman_kerja()
    {
        $id=$this->input->post('kode');
        $this->Admin_model->delete('pengalaman_kerja', 'id_pengalaman', $id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Pengalaman Kerja deleted!</div>');
        redirect('admin/pengalaman_kerjas');
    }


}
