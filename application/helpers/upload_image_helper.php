<?php defined('BASEPATH') or exit('No direct script access allowed');

// uploadImage : function untuk upload image
// $path : lokasi penyimpanan image/foto
function uploadImage($path = 'profile')
{
    $config['upload_path'] = 'assets/images/' . $path;
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
    }

    return true;
}
