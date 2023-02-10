<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// load model here
		$this->load->database();
		
	}

	public function index()
	{
		
		$this->modules[]      = 'todo';
        $this->js_listeners[] = '';
        $this->layout('welcome_message');
	}
	public function get_data(){

		$query = $this->db->get('mckie');
		return $query->result_array();
	}
	
}
