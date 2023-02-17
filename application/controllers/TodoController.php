<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// load model here
		$this->load->model('PlayerModel');	
		
	}

	public function index()
	{	
		
		 $this->modules[]      = 'todo';
         $this->js_listeners[] = 'Todo.fn.add_todo()';
		 $this->js_listeners[] = 'Todo.table.generate_table();';
		 $data['players'] = $this->PlayerModel->get_players();
         $this->layout('welcome_message', $data);
		
	}
	public function view_modal(){
		$this->load->view('addModal');
	}

	public function data_Table(){
		//data table here;
		$this->load->model('PlayerModel');

        // Get player data
        $data = $this->PlayerModel->get_players();

        // Send data as JSON
        echo json_encode($data);
	}


	public function savedata()
	{
		/*load registration view form*/
		// $this->load->view('welcome_message');
	
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data = ['first_name'=>$this->input->post('first_name'),
					 'last_name'=>$this->input->post('last_name'),
					 'age'=>$this->input->post('age')
		];
			$response=$this->PlayerModel->saverecords($data);
			if($response==true){
				$this->session->set_flashdata('success','Successfully Added!');
				// redirect(base_url('todo'));
				redirect('todo');
			}
			else{
					echo "404 error !";
			}
		}
	}
}
