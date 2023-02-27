<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// load model here
	}

	public function index()
	{
		$this->layout('welcome_message');
	}
	public function todolist()
	{
		$this->modules[]      = 'todo'; //module name
		$this->js_listeners[] = 'Todo.fn.modal_view()'; 
		$this->js_listeners[] = 'Todo.tables.gen_table()'; 
        $this->layout('todolist');
	}
	public function fetch_task(){
		$get = $this->input->get("row_status",true);
		$this->load->model("TodoModel");
		$results = $this->TodoModel->fetchTask($get);
		// var_dump($results);
		echo json_encode($results);
	}
	public function todo_modal()
	{
		$this->load->model("GenericModel");
		$this->load->model("TodoModel");
		$id = $this->input->post("todo_id",true);
		//2 draft
		//1 final
		//0 deleted
		if($id == null){
			$condition['row_status'] = "2";
			$id = $this->GenericModel->add_create_row('todo','todo_id',$condition);
		}
		$results = $this->TodoModel->fetch_one_task($id);
		$this->load->view('todo_modal',$results);
	}
	public function delete_confirm()
	{
		$this->load->model("GenericModel");
		$this->load->model("TodoModel");
		$id = $this->input->post("todo_id",true);
		$results = $this->TodoModel->fetch_one_task($id);
		echo json_encode($results);
	}
	public function insert()
	{
		$row_status = $this->input->post('row_status');
		$item = $this->input->post('item');
		$id = $this->input->post('todo_id');
		$data = array("item_desc"=>$item,"status"=>'active',"row_status"=>$row_status);
		$this->load->model("TodoModel");
		$x = $this->TodoModel->insertList($data,$id);
		echo $x;
	}
}
