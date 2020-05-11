<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin'))
			redirect('login');
	}
	function index()
	{
		//$this->load->view('dashboard');
		$this->load->view('includes/header-view');
		$this->load->view('includes/nav');
		$this->load->view('index');
		$this->load->view('includes/footer-view');
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}