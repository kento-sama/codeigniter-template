<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// load model here
		$this->load->model('PlayerModel');	
		$this->load->model('GenericModel');
		
	}

	public function index()
	{	
		
		 $this->modules[]      = 'todo';
         $this->js_listeners[] = 'Todo.fn.add_todo()';
		 $this->js_listeners[] = 'Todo.table.generate_table();';
		// $data['players'] = $this->PlayerModel->get_players();
         $this->layout('welcome_message');
		
	}
	public function view_modal(){

		$data['player_id']  = $this->input->post('player_id', TRUE);
		//echo $data['player_id'];
		// var_dump($data);
	
		if($data['player_id'] == NULL)
		{
			$condition['row_status'] = 2;
			$data['player_id'] = $this->GenericModel->add_create_row('playertable', 'id', $condition);
		}
		//var_dump($data['player_id']);
		$player_data = $this->PlayerModel->get_data($data['player_id']);
		//var_dump($player_data);
	
		$this->load->view('addModal', $player_data);
		

	}
	public function data_Table(){
		//data table here;
		//$this->load->model('PlayerModel');

        // Get player data
        $data = $this->PlayerModel->get_players();

        // Send data as JSON
        echo json_encode($data);
	}
		


	public function savedata()
	{
		/*load registration view form*/
		// $this->load->view('welcome_message');
		$data = ['first_name'=>$this->input->post('first_name', TRUE),
				 'last_name'=>$this->input->post('last_name', TRUE),
				 'age'=>$this->input->post('age', TRUE),
				 'id'=>$this->input->post('id', TRUE),
				 'row_status'=> 1
					];
	
		
		//$this->load->model('PlayerModel');
		$datadd = $this->PlayerModel->saverecords($data);
		echo $datadd;
		
		/*Check submit button */
		    
		
	}
	// public function open_modal() {
		
	
	// }
	
	// public function save_player() {
	// 	$post_data['first_name'] = $this->input->post('first_name', TRUE);
	// 	$post_data['last_name']  = $this->input->post('last_name', TRUE);
	// 	$post_data['age']        = $this->input->post('age', TRUE);
	// 	$post_data['player_id']  = $this->inupt->post('player_id', TRUE);
	
	// 	$this->PlayerModel->save_player($post_data);
	
	// }
		
}
