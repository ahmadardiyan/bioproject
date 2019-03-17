<?php defined('BASEPATH') OR exit ('No direct script acces allowed');

/**
* 
*/
class Product_model extends CI_Model
{
	//Menggunakan private karena table product hanya digunakan pada class ini
	private $_table = "products";

	// Nama kolom yang ada di db yang sudah dibuat, sensitiv case !!
	public $product_id;
	public $name;
	public $price;
	public $image = "default.jpg";
	public $description;


	//Validasi inputan data !
	public function rules()
	{
		# code...
		return 
		[
			[
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required' //wajib diisi
			],

			[
			'field' => 'price',
			'label' => 'Price ',
			'rules' => 'numeric'
			],

			[
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required'
			]
		];
	}

		//Mengambil data dari database
		public function getAll()
		{
			return $this->db->get($this->_table)->result(); // fungsi result untuk mengambil semua data hasil query

			// Sama artinya seperti :
			//SELECT * FROM products
		}

		public function getById()
		{
			return $this->db->get_where($this->_table, ["product_id" => $id])->row(); // fungsi row() untuk mengambil satu data dari hasil query
			
			//Sama artinya seperti :
			//SELECT * FROM products WHERE product_id = $id
		}

		public function save()
		{
			$post = $this->input->post(); //ambil data dari form
			$this->product_id = uniqid(); // membuat id unik
			$this->name = $post["name"]; //isi field name
			$this->price = $post["price"];
			$this->description = $post["description"];
			$this->db->insert($this->_table, $this); //menyimpan ke data base
		}

		public function update()
		{
			$post = $this->input->post();
			$this->product_id = $post["id"];
			$this->name = $post["name"];
			$this->price = $post["price"];
			$this->description = $post["description"];
			$this->db->update($this->_table, $this, array('product_id' =>$post['id']));
		}

		public function delete()
		{
			return $this->db->delete($this->_table, array("product_id" =>$id));
		}		
	}
 ?>