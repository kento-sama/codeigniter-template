<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
			$this->load->database();
			$this->load->model('productmodel');
			$this->load->library('session');
	}

	public function index()
	{
		$this->modules[]      = 'todo';
		$this->js_listeners[] = '';
    $this->layout('product_view');
	}

	// Inserting Data into the Database
	public function insertData() {
		if($this->input->post('save'))
		{
			$data['product_name'] = $this->input->post('product_name');
			$data['product_price'] = $this->input->post('product_price');
			$data['product_category'] = $this->input->post('product_category');

			$response = $this->productmodel->saverecords($data);
			if ($response = true){
				$this->session->set_flashdata('status', 'Successful Entry!');
				redirect('todo');
			}
			else {
				echo 'Unsuccessful Entry!';
				redirect('todo');
			}
		}
	}
}