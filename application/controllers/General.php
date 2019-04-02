<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('General_model');
	}

	public function provinsi(){
		$data = $this->General_model->getAllData('provinsi');
		echo json_encode($data);
	}

	public function kabupaten($id_prov=null){
		$data = $this->General_model->getAllDataWhere('kabupaten','id_prov',$id_prov);
		echo json_encode($data);
	}

	public function kecamatan($id_kab=null){
		$data = $this->General_model->getAllDataWhere('kecamatan','id_kab',$id_kab);
		echo json_encode($data);
	}

	
    public function uploadImage(){

        $config['upload_path'] = 'assets/img/produk';
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