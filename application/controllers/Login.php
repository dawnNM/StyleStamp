<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('admin'))
			redirect('dashboard');
	}
	function index()
	{
		$this->load->view('includes/header-login');
		$this->load->view('login');
		$this->load->view('includes/footer-login');
	}
	function verify()
	{
		//username:admin password:123456
		$this->load->model('User_model');
		$check = $this->User_model->validate();
		if($check)
		{
			$ufn = $check->first_name;
			$this->session->set_userdata('username', $ufn);
			$this->session->set_userdata(array('admin'=>'1', 'email'=>$email, 'ufirstname'=>'Aasman'));

			//$this->session->set_userdata('email', $email);
			redirect('dashboard');
		}
		else
		{
			redirect('login');
		}
	}
}