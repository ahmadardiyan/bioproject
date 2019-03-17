<?php 

defined('BASEPATH') OR exit ('No direct script access allowed');

/**
* 
*/
class Products extends CI_Controller
{
	// Method construct yang pertama kali diekskusi ketika controller di akses.
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("product_model");
		$this->load->library('form_validation'); //memvalidasi method add() dan edit()
	}

	public function index()
	{
		$data["products"] = $this->product_model->getAll(); //mengambil data dari model
		$this->load->view("admin/product/list", $data); //Kirim data ke view "admin/product/list"
	}

	// method add juga memanggil method save()
	public function add() 
	{
		$product = $this->product_model; //objek model
		$validation = $this->form_validation; // objek validation
		$validation->set_rules($product->rules()); // menerapkan rules

		if ($validation->run()) { //melakukan validasi
			# code...
			$product->save(); //menyimpan ke database
			$this->session->set_flashdata('success', 'Berhasil disimpan'); //pop up pesan "berhasil"
		}
		$this->load->view("admin/product/new_form"); //menampilkan form add
	}


	public function edit ($id = null)
	// $id merupakan id data yang mau di direct
	// Memberikan nilai default null agar mudah di cek
	{
		if (!isset($id)) redirect('admin/products'); // kita lakukan redirect ke route "admin/product" jika $id bernilai null

		$product = $this->product_model; //objek model
		$validation = $this->form_validation; //objek validasi
		$validation->set_rules($product->rules()); //menerapkan rules

		if ($validation->run()){ // melakukan validasi
			$product->update(); // menyimpan data
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$data["product"] = $product->getById($id); //mengambil data untuk ditampilkan pada form
			if(!$data['product']) show_404(); // jika tidak ada data, tampilkan error 404

			$this->load->view("admin/product/edit_form", $data); //menampilkan form edit 
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->product_model->delete($id))
		{
			redirect(site_url('admin/products')); //apabila data berhasil dihapus maka kita akan langsung di alihkan redirect() menuju halaman "admin/product"
		}
	}
}
 ?>