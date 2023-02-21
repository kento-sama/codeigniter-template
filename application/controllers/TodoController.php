<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		// load model here
		$this->load->model('mymodel');
	}

	public function index()
	{
		// $this->modules[]      = 'todo';
        // $this->js_listeners[] = '';
		$this->layout('insert');
		
	}

	public function insertdata() {
		
		$this->load->database();
	
		$name = $this->input->post('name');
		$species = $this->input->post('species');
		$age = $this->input->post('age');
		$data = array(
		  'name' => $name,
		  'species' => $species,
		  'age' => $age
		);
	
		$this->db->insert('pet', $data);
		redirect(base_url(TodoController));
		// echo "Message sent successfully!";
	}
}
