<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $js_listeners = [];
	public $js_plugins   = [];
	public $css_plugins  = [];
	public $custom_css   = [];
	public $custom_js    = [];
	public $modules		 = [];
    
    public $server_side_js = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function layout($view_path, $data = [], $stringify = FALSE)
	{
		$data['js_listeners']   = $this->js_listeners;
		$data['js_plugins']     = $this->js_plugins;
		$data['css_plugins']    = $this->css_plugins;
		$data['modules']        = $this->modules;
		$data['custom_css']     = $this->custom_css;
        $data['custom_js']	    = $this->custom_js;
        $data['server_side_js'] = $this->server_side_js;
		$string_view            = '';
		if ($stringify)
		{
            $string_view .= $this->load->view('templates/header', $stringify);
            $string_view .= $this->load->view('templates/navbar',$data, $stringify);
            $string_view .= $this->load->view('templates/sidebar',$data, $stringify);
			$string_view .= $this->load->view($view_path, $data, $stringify, $stringify);
            $string_view .= $this->load->view('templates/footer', $stringify);
            
            foreach($this->server_side_js as $js)
            {
                $string_view .= $this->load->view($js, $stringify);
            }

            $this->load->view('templates/end');

			return $string_view;
		} else
		{
			$this->load->view('templates/header');
            $this->load->view('templates/navbar',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view($view_path, $data);
            $this->load->view('templates/footer', $data);

            foreach($this->server_side_js as $js)
            {
                $this->load->view($js);
            }

            $this->load->view('templates/end');
		}

	}

	/*public function is_logged_in()
	{
		$user_id = $this->session->userdata('current_user');
		if (empty($user_id)
			&& current_url() != base_url('user/login_view')
			&& current_url() != base_url('login')
			&& current_url() != base_url('user/register_view')
			&& current_url() != base_url('register'))
		{
			redirect(base_url('login'));
		}

		if( ! empty($user_id))
		{
			$this->css_plugins[]  = 'w3/w3';
			$this->custom_css[]	  = 'sidebar';
			$this->custom_js[]    = 'sidebar';
		}
	}

	public function _update_current_user($user_id)
    {
        $this->session->set_userdata('current_user', $user_id);
    }*/
}