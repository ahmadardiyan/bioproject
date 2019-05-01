<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wilayah_model');
    }

    public function provinsi()
    {
        $data = $this->Wilayah_model->getAllData('provinsi');
        echo json_encode($data);
    }

    public function kabupaten($id_prov = null)
    {
        $data = $this->Wilayah_model->getAllDataWhere('kabupaten', 'id_prov', $id_prov);
        echo json_encode($data);
    }

    public function kecamatan($id_kab = null)
    {
        $data = $this->Wilayah_model->getAllDataWhere('kecamatan', 'id_kab', $id_kab);
        echo json_encode($data);
    }
    
}
