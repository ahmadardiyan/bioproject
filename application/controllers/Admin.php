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
        $data = [
        // "id_user" => $this->input->post('id_member', true),
          "nama_member" => $this->input->post('nama_member', true),
          "gender_member" => $this->input->post('gender_member', true),
          "tempat_lahir" => $this->input->post('tempat_lahir', true),
          "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
          "deskripsi_member" => $this->input->post('deskripsi_member', true),
          // "phone_member" => $this->input->post('phone_member', true),
          "alamat" => $this->input->post('alamat', true),
          "id_prov" => $this->input->post('provinsi', true),
          "id_kab" => $this->input->post('kabupaten', true),
          "id_kec" => $this->input->post('kecamatan', true)
          // "foto" => $foto,
        ];
        // $upload_image = $_FILES['foto']['nama_member'];
        //
        // if ($upload_image) {
        //   $config['allowed_types'] = 'gif|png|jpg';
        //   $config['upload_path'] = './assets/images/profile/';
        //
        //   $this->load->library('upload', $config);
        //
        //   if ($this->upload->do_upload('foto')) {
        //       $new_image = $this->upload->data('file_name');
        //       $this->db->set('foto', $new_image);
        //   } else {
        //       echo $this->upload->display_errors();
        //   }
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
            // // "tanggal_lahir" => $tanggalLahir,
            "alamat" => $this->input->post('alamat', true),
            "id_prov" => $this->input->post('provinsi', true),
            "id_kab" => $this->input->post('kabupaten', true),
            "id_kec" => $this->input->post('kecamatan', true)
            // "foto" => $foto,

        ];
        // $upload_image = $_FILES['foto']['name'];
        //
        // if ($upload_image) {
        //     $config['allowed_types'] = 'gif|png|jpg';
        //     $config['upload_path'] = './assets/images/profile/';
        //
        //     $this->load->library('upload', $config);
        //
        //     if ($this->upload->do_upload('image')) {
        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('foto', $new_image);
        //     } else {
        //         echo $this->upload->display_errors();
        //     }
        // }
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

    public function porotofolios(){
        $data['title'] = 'Data Portofolios';
        $data['portofolio'] = $this->Admin_model->getAllPortofolio();
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
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
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
        $data['title'] = 'Data List Keahlian';
        $data['project'] = $this->Admin_model->getAllProjects();
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($data['member']);
        // die();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $this->load->view('admin/project', $data);
        $this->load->view('partials/admin/footer');
    }

    public function simpan_project()
    {
        $data = [
            "id_project" => $this->input->post('id_project', true),
            "id_keahlian" => $this->input->post('id_keahlian', true)
        ];
        // var_dump($data);
        // die();
        $this->Admin_model->create('project', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New Project Added</div>');
        redirect('admin/projects');
    }

    public function update_project()
    {
        $i_d=$this->input->post('kode');
        $data = [
            "id_project" => $this->input->post('id_project', true),
            "id_keahlian" => $this->input->post('id_keahlian', true)
        ];
        $this->Admin_model->update('project', 'id_project', $i_d, $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Project updated!</div>');
        redirect('admin/projects');
    }

    public function hapus_project()
    {
        $i_d=$this->input->post('kode');
        $this->Admin_model->delete('project', 'id_project', $i_d);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Project deleted!</div>');
        redirect('admin/projects');
    }
}
