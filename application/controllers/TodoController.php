<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
			$this->load->model('productmodel');
			$this->load->model('genericmodel');
	}

	public function index()
	{
		$this->modules[]      = 'todo';
		$this->js_listeners[] = 'Todo.fn.add_product()';
		$this->js_listeners[] = 'Todo.table.view_table()';
    $this->layout('product_view');
	}

	// Inserting Data into the Database
	public function insertData() {
		$data['id'] = $this->input->post('id', TRUE);
		$data['product_name'] = $this->input->post('name', TRUE);
		$data['product_price'] = $this->input->post('price', TRUE);
		$data['product_category'] = $this->input->post('category', TRUE);

		$result = $this->productmodel->saverecords($data);

		echo $result;
	}

	// Function to load the modal view
	public function viewModal() {
		$data['id'] = $this->input->post('id', TRUE);

		if($data['id'] == NULL) {
			$condition['row_status'] = 2;
			$data['id'] = $this->genericmodel->add_create_row('products', 'id', $condition);
		}

		$result = $this->productmodel->get_data($data['id']);
		$this->load->view('modal_view',$result);
	}

	// Getting data from the database
	public function getData(){
		$this->load->model('productmodel');
		$data = $this->productmodel->getrecords();
		echo json_encode($data);
	}
}