<?php
class User extends CI_Controller 
{
	function __Construct()
	{
		parent:: __construct();
		$this->load->model('user_model');
	}
	
	function index()
	{
		if($this->session->userdata('user'))	redirect(base_url());
		
                $data['page'] = 'login';
                $this->load->view('includes/header-login');
				$this->load->view('forgotpassword');
				$this->load->view('includes/footer-login');
	}	
}
