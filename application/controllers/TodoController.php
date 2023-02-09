<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	
}
