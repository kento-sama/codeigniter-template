<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// load model here
	}

	public function index()
	{
		
		// $this->modules[]      = 'todo';
        // $this->js_listeners[] = 'Todo.fn.thatsme';
        // $this->layout('welcome_message');
	}
	public function todolist()
	{
		$test = "test";
		$todolist = array();
		$item = array();
		$status = array();
		$this->modules[]      = 'todo'; //module name
       
		$this->load->model("TodoModel");
	 	$results = $this->TodoModel->fetchTask();
		foreach($results as $row){
			array_push($item,$row->item_desc);
			array_push($status,$row->status);
		}
		array_push($todolist,$item,$status);
		$todolist = json_encode($todolist);
		
		$this->js_listeners[] = 'Todo.fn.modal_view(),Todo.table.tables('.$todolist.')'; 

        $this->layout('todolist');
	}
	public function todo_modal()
	{
        $this->load->view('todo_modal');
	}
	public function insert()
	{
		$item = $this->input->post('list');
		$data = array("item_desc"=>$item,"status"=>'active');
		$this->load->model("TodoModel");
		$x = $this->TodoModel->insertList($data);
		echo $x;
	}
}
