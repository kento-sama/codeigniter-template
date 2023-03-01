<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {
	public function __construct() {
		parent::__construct();

		// $this->load->database();
		// load model here
		$this->load->model('MyModel');
	}

	public function index() {
		$this->modules[]      = 'todo';
        $this->js_listeners[] = 'Todo.fn.view_modal()';
		$this->js_listeners[] = 'Todo.table.generate_table()';
		$this->layout('insert');
		
	}

	public function open_modal() {
		$this->load->view('add_modal');

	}

	public function insertData() {
		$post_data['id']  = $this->input->post('id', TRUE);
		$post_data['name'] = $this->input->post('name', TRUE);
		$post_data['species']  = $this->input->post('species', TRUE);
		$post_data['age']  = $this->input->post('age', TRUE);
		

		$this->MyModel->insert_data($post_data);
	}

	public function getData(){
		// Retrieve data from database
		$data = $this->MyModel->get_data();
		echo json_encode($data);
	}


}