<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// load model here
		$this->load->database();
		$this->load->model('add_model');	
	}

	public function index()
	{	
		
		 $this->modules[]      = 'todo';
         $this->js_listeners[] = '';
         $this->layout('welcome_message');
		
	}
	public function create(){
		
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
			$response=$this->add_model->saverecords($data);
			if($response==true){
				$this->session->set_flashdata('success','Successfully Added!');
				redirect(base_url('todo'));
			}
			else{
					echo "404 error !";
			}
		}
	}
}
