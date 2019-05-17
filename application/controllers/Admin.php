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

    public function member(){
        $data['title'] = "Data Member"; //nanti bakalan jadi title di bagian head

        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('partials/admin/header', $data);
        $this->load->view('partials/admin/sidebar', $data);
        $this->load->view('partials/admin/topbar', $data);
        $x['data']=$this->Admin_model->member();
        $this->load->view('admin/members',$x);
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

    public function company()
    {
        $data['title'] = 'Data Company';
        $data['company'] = $this->Company_model->getAllCompany();
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

    function simpan_member(){
      $data = [
        // "id_user" => $this->input->post('id_member', true),
          "nama_member" => $this->input->post('nama_member', true),
          "deskripsi_member" => $this->input->post('deskripsi_member', true),
          "gender_member" => $this->input->post('gender_member', true),
          "tempat_lahir" => $this->input->post('tempat_lahir', true),
          "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
          // "phone_member" => $this->input->post('phone_member', true),
          "alamat" => $this->input->post('alamat', true),
          // "id_prov" => $this->input->post('provinsi', true),
          // "id_kab" => $this->input->post('kabupaten', true),
          // "id_kec" => $this->input->post('kecamatan', true),
          // "foto" => $foto,
      ];
      $upload_image = $_FILES['foto']['name'];

      if ($upload_image) {
          $config['allowed_types'] = 'gif|png|jpg';
          $config['upload_path'] = './assets/images/profile/';

          $this->load->library('upload', $config);

          if ($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('foto', $new_image);
          } else {
              echo $this->upload->display_errors();
          }
      }

      // var_dump($data);
      // die();

      $this->Member_model->create('member', $data);
      redirect('admin/members');
            // $nama_member=$this->input->post('nama_member','gender_member','id_user');
            // $this->Admin_model->save_member($id,$nama_member,$gender_member);
            // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            // New Member added!</div>');
            // redirect('admin/members');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            New Member Added</div>');
            redirect('admin/members');
    }
    function update_member(){
            $id=$this->input->post('kode');
            $data = [
              // "id_user" => $this->input->post('id_member', true),
                "nama_member" => $this->input->post('nama_member', true),
                "gender_member" => $this->input->post('gender_member', true),
                "deskripsi_member" => $this->input->post('deskripsi_member', true),
                "tempat_lahir" => $this->input->post('tempat_lahir', true),
                // // "tanggal_lahir" => $tanggalLahir,
                "alamat" => $this->input->post('alamat', true),
                // "id_prov" => $this->input->post('provinsi', true),
                // "id_kab" => $this->input->post('kabupaten', true),
                // "id_kec" => $this->input->post('kecamatan', true),
                // "foto" => $foto,

            ];
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|png|jpg';
                $config['upload_path'] = './assets/images/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Member_model->update('member', 'id_user', $id, $data, $upload_image);
            // $this->Admin_model->edit_member($id,$nama_member);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Member updated!</div>');
            redirect('admin/members');
    }
    function hapus_member(){
            $id=$this->input->post('kode');
            $this->Admin_model->hapus_member($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Member deleted!</div>');
            redirect('admin/members');
    }

    public function service(){

    }
}
