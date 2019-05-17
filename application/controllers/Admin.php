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
      $config['upload_path'] = './assets/images/profile/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
      $_FILES['filefoto']['name'];
      $this->upload->do_upload('filefoto');
      $config['image_library']='gd2';
      $config['source_image']='./assets/images/profile'.$gbr['file_name'];
      $config['create_thumb']= FALSE;
      $config['maintain_ratio']= FALSE;
      $config['quality']= '60%';
      $config['width']= 300;
      $config['height']= 300;
      $config['new_image']= './assets/images/profile/'.$gbr['file_name'];
      $this->load->library('image_lib', $config);
      $this->image_lib->resize();
      $data = [
        // "id_user" => $this->input->post('id_member', true),
          "nama_member" => $this->input->post('nama_member', true),
          "deskripsi_member" => $this->input->post('deskripsi_member', true),
          "gender_member" => $this->input->post('gender_member', true),
          "tempat_lahir" => $this->input->post('tempat_lahir', true),
          "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
          // "phone_member" => $this->input->post('phone_member', true),
          "alamat" => $this->input->post('alamat', true),
          "id_prov" => $this->input->post('provinsi', true),
          "id_kab" => $this->input->post('kabupaten', true),
          "id_kec" => $this->input->post('kecamatan', true),
          "foto" => $foto,
      ];

      // var_dump($data);
      // die();

      $this->Member_model->create('member', $data);
      redirect('admin/members');
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
            $this->Member_model->update('member', 'id_user', $id, $data);
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
