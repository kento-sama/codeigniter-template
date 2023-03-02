<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {
	public function __construct() {
		parent::__construct();

		// $this->load->database();
		// load model here
		$this->load->model('MyModel');
		$this->load->model('GenericModel');
	}

	public function index() {
		$this->modules[]      = 'todo';
        $this->js_listeners[] = 'Todo.fn.view_modal()';
		$this->js_listeners[] = 'Todo.table.generate_table()';
		$this->layout('insert');
		
	}

	public function open_modal() {
		// $this->load->view('add_modal');

		$data_id  = $this->input->post('pet_id', TRUE);

		if($data_id == NULL)
		{
			// row_status 0 = deleted, 1 = final, 2 = draft 

			$condition['row_status'] = "2";
			$data_id = $this->GenericModel->add_create_row('pet', 'id', $condition);
		}
		$pet_data = $this->MyModel->edit_data($data_id);
		
		$this->load->view('add_modal', $pet_data);

	}

	public function saveData() {
		$post_data['id']  = $this->input->post('id', TRUE);
		$post_data['name'] = $this->input->post('name', TRUE);
		$post_data['species']  = $this->input->post('species', TRUE);
		$post_data['age']  = $this->input->post('age', TRUE);

		echo $this->MyModel->save_data($post_data);
	}

	public function getData(){
		// Retrieve data from database

		$data = $this->MyModel->get_data();
		echo json_encode($data);

	}


}