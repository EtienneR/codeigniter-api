<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Model_product');
	}

	// Get all products
	public function index(){
		$data = $this->Model_product->get_all();

		if ($data->num_rows() > 0):
			echo json_encode($data->result());
		else:
			header("HTTP/1.0 204 No Content");
			echo json_encode('204: no products in the database');
		endif;
	}

	// Get a product
	public function view($id){
		$data = $this->Model_product->get_one($id);

		if ($data->num_rows() > 0):
			echo json_encode($data->result());
		else:
			header("HTTP/1.0 404 Not Found");
			echo json_encode('404 : Product #' . $id . ' not found');
		endif;
	}

	// Create a product
	public function create(){
		$title = $this->input->post('title');

		if (!empty($title)):
			$this->Model_product->post($title);
			echo json_encode('Product created');
		else:
			header("HTTP/1.0 400 Bad Request");
			echo json_encode('400: Empty value');
		endif;
	}

	// Update a product
	public function update($id){
		$title = utf8_encode($this->input->input_stream('title'));

		// If product exists
		if ($this->Model_product->get_one($id)->num_rows() == 1):

			if (!empty($title)):
				$this->Model_product->put($id, $title);
				echo json_encode('200: Product #' . $id . ' updated');
			else:
				header("HTTP/1.0 400 Bad Request");
				echo json_encode('400: Empty value');
			endif;

		else:
			header("HTTP/1.0 404 Not Found");
			echo json_encode('404: Product #' . $id . ' not found');
		endif;
	}

	// Delete a product
	public function delete($id){
		// If product exists
		if ($this->Model_product->get_one($id)->num_rows() == 1):
			$this->Model_product->delete($id);
			echo json_encode('200: Product #' . $id . ' deleted');
		else:
			header("HTTP/1.0 404 Not Found");
			echo json_encode('404: Product #' . $id . ' not found');
		endif;
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */