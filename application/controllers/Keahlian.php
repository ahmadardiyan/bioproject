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
    // public function getKeahlian($id_user = null)
    public function getKeahlian()
    {
        $id_user = $_SESSION['id_user'];
        $data = $this->Member_model->getKeahlian('id_user', $id_user);
        echo json_encode($data);
    }

    public function kategoriKeahlian()
    {
        $data = $this->Keahlian_model->getAllData('kategori_keahlian');
        echo json_encode($data);
    }

    public function listKeahlian($id_kategori = null)
    {
        $data = $this->Keahlian_model->getAllDataWhere('list_keahlian', 'id_kategori', $id_kategori);
        echo json_encode($data);
    }

    public function listAllKeahlian($id_kategori = null)
    {
        $data = $this->Keahlian_model->getAllData('list_keahlian');
        echo json_encode($data);
    }

    // memperbarui skills
    public function updateKeahlian()
    {
        $id_user = $_SESSION['id_user'];
        $data['title'] = 'Bio Project';
        $data['member'] = $this->Member_model->getMember('id_user', $id_user);

        $this->form_validation->set_rules('keahlian[]', 'keahlian', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('member/update_keahlian', $data);
            $this->load->view('partials/user/footer');
        } else {
            $formKeahlian = $this->input->post('keahlian');

            $dbKeahlian = $this->Member_model->getKeahlian('id_user', $id_user);

            if (empty($formKeahlian)) {
                $this->db->where('id_user', $id_user)->delete('keahlian');
            } else {

                //tambah keahlian
                foreach ($formKeahlian as $form):

                    $x = false;
                    foreach ($dbKeahlian as $db):

                        if ($db['id_keahlian'] === $form) {

                            $x = true;
                        }

                    endforeach;

                    if ($x === false) {
                        $data = array(
                            'id_keahlian' => $form,
                            'id_user' => $id_user,
                        );
                        $this->db->insert('keahlian', $data);
                    }

                endforeach;

                //hapus keahlian
                foreach ($dbKeahlian as $db):

                    $x = false;
                    foreach ($formKeahlian as $form):

                        if ($db['id_keahlian'] === $form) {

                            $x = true;

                        }

                    endforeach;

                    if ($x === false) {

                        $this->db->where('id', $db['id'])->delete('keahlian');
                    }

                endforeach;
            }

            redirect('member');
        }
    }
}
