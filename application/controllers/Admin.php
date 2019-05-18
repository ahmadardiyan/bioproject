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
        $data['title'] = 'Data Service';
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
}
