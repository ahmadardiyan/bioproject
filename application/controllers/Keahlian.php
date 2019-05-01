<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keahlian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('Keahlian_model');

    }

    //menampilkan data skills
    // public function getSkillsMember($id_user = null)
    public function getKeahlianMember($id_user = null)
    {
        $data= $this->Member_model->getSkillsMember('id_user',$id_user);
        echo json_encode($data);
    }

    public function kategoriKeahlian()
    {
        $data = $this->Keahlian_model->getAllData('kategori_keahlian');
        echo json_encode($data);
    }

    public function listKeahlian($id_kategori = null)
    {
        $data = $this->Keahlian_model->getAllDataWhere('list_keahlian','id_kategori', $id_kategori);
        echo json_encode($data);
    }

    public function listAllKeahlian($id_kategori = null)
    {
        $data = $this->Keahlian_model->getAllData('list_keahlian');
        echo json_encode($data);
    }

    // memperbarui skills
    // public function updateSkills($id_user = '1')
    public function updateKeahlian($id_user = '1')
    {
        $data['title']  = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);
     
        $this->form_validation->set_rules('skill[]', 'skill', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('member/update_keahlian', $data);
            $this->load->view('partials/user/footer');
        } else {
            $skill = $this->input->post('skill');
            // var_dump($skill);
            // die();

            foreach($skill as $row) :
                $data = array(
                    'id_keahlian' => $row,
                    'id_user' => $id_user
                );
                $this->db->insert('keahlian',$data);
            endforeach;

            redirect('member');
        }
    }
}

?>
