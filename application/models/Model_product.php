<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_product extends CI_Model {

	function get_all(){
		$this->db->select('id, title')
				 ->from('product');

		$query = $this->db->get();
		return $query;
	}

	function get_one($id){
		$this->db->select('id, title')
				 ->from('product')
				 ->where('id', $id)
				 ->limit(1);

		$query = $this->db->get();
		return $query;
	}

	function post($title){
		$data = array(
			'title' => $title,
		);

		$this->db->insert('product', $data);
	}

	function put($id, $title){
		$data = array(
			'title' => $title
		);

		$this->db->where('id', $id)
				 ->update('product', $data);
	}

	function delete($id){
		$this->db->where_in('id', $id)
				 ->delete('product');
	}

}

/* End of file Model_product.php */
/* Location: ./application/controllers/Model_product.php */