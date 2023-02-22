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
		$this->layout('insert');
		
	}

	// public function my_pets() {
	// 	$this->modules[]      = 'todo'; //todo-module.js
    //     $this->js_listeners[] = 'Todo.fn.view_modal';
	// 	$this->layout('insert');
	// }

	public function add_modal() {
		$this->load->view('add_modal');
	}

	public function insertdata() {
		
		//$this->load->database();

		// check submit button
		if($this->input->post('save')){
			$data['name']=$this->input->post('name');
			$data['species']=$this->input->post('species');
			$data['age']=$this->input->post('age');
			$response->$this->MyModel->insert_data($data);
			if($response==true){
				echo "Pet added succesfully";
			}
			else {
				echo "Error! Cannot add data";
			}
		}
	
	}
}
