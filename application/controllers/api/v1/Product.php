<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Model_product');
		header("Access-Control-Allow-Origin: *"); // CORS Origin enabled
	}

	// Get all products
	public function index()
	{
		$data = $this->Model_product->get_all();

		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$result[] = array("id" => intval($row->id), "title" => $row->title);
			}
			echo json_encode($result);
		} else {
			header("HTTP/1.0 204 No Content");
			echo json_encode("204: no products in the database");
		}
	}

	// Get a product
	public function view($id)
	{
		$data = $this->Model_product->get_one($id);

		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$result[] = array("id" => intval($row->id), "title" => $row->title);
			}
			echo json_encode($result);
		} else {
			header("HTTP/1.0 404 Not Found");
			echo json_encode("404 : Product #$id not found");
		}
	}

	// Create a product
	public function create()
	{
		$title = $this->input->post('title', TRUE);

		if (!empty($title)) {
			$this->Model_product->post($title);
			echo json_encode('Product created');
		} else {
			header("HTTP/1.0 400 Bad Request");
			echo json_encode("400: Empty value");
		}
	}

	// Update a product
	public function update($id)
	{
		$title = utf8_encode($this->input->input_stream("title", TRUE));

		// If product exists
		if ($this->Model_product->get_one($id)->num_rows() == 1) {

			if (!empty($title)) {
				$this->Model_product->put($id, $title);
				echo json_encode("200: Product #$id updated");
			} else {
				header("HTTP/1.0 400 Bad Request");
				echo json_encode("400: Empty value");
			}

		} else {
			header("HTTP/1.0 404 Not Found");
			echo json_encode("404: Product #$id not found");
		}
	}

	// Delete a product
	public function delete($id)
	{
		// If product exists
		if ($this->Model_product->get_one($id)->num_rows() == 1) {
			$this->Model_product->delete($id);
			echo json_encode("200: Product #$id deleted");
		} else { 
			header("HTTP/1.0 404 Not Found");
			echo json_encode("404: Product $id not found");
		}
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */