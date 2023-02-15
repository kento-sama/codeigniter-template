<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS, POST");
class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// load model here
	}

	public function index()
	{
		
		$this->modules[]      = 'todo';
        $this->js_listeners[] = '';
        $this->layout('welcome_message');
	}
	public function todolist()
	{
		
		$this->modules[]      = '';
        $this->js_listeners[] = '';
        $this->layout('todolist');
	}
	public function insert()
	{
		$this->modules[]      = '';
        $this->js_listeners[] = '';
        $item = $this->input->post('list');
		$data = array("item_desc"=>$item,"status"=>'active');
		// echo $item;
		$this->load->model("ListInsert");

		$x = $this->ListInsert->insertList($data);

		echo $x;
		
	}
	
	
}
