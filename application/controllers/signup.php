<?php
class Signup extends CI_Controller 
{
	function __Construct()
	{
		parent:: __construct();
		$this->load->model('user_model');
	}
	
	function index()
	{
		if($this->session->userdata('user'))	redirect(base_url());
		
		$data['page'] = 'signup';
			
/*		$this->load->view('candidate/includes/header-login');
		$this->load->view('candidate/signup');
		$this->load->view('candidate/includes/footer-login');*/
	}
	/*New user registration*/
	function register()
	{
		$this->form_validation->set_rules('r_fname','First Name',required);
		$this->form_validation->set_rules('r_lname','Last Name',required);
		$this->form_validation->set_rules('r_email','email',required);
		$this->form_validation->set_rules('r_pass','password',required);
		$fname = $this->security->xss_clean($this->input->post('r_fname'));
		$lname = $this->security->xss_clean($this->input->post('r_lname'));
		$email = $this->security->xss_clean($this->input->post('r_email'));
		$password = sha1($this->security->xss_clean($this->input->post('r_pass')));
		
		if ($this->form_validation->run() ==TRUE ) {
			$data = array(
				'firstname'=>$fname,
				'lastname'=>$lname,
				'email'=>$email,
				'password'=>$password,
				'date_created'=>date('Y-m-d H:i:s')
			);
			$res= $this->user_model->register($data);
		if($res)
		{
            $this->session->set_userdata('login_status','register_success');
            $this->session->set_userdata('login_status','register_success');
			redirect(base_url('/'));
		}
		} else {
			redirect('signin');
		}
		
        
		
	}	
	/*Avoid email duplication while registration*/
	function check_email()
	{
		if($this->user_model->check_email($_POST['email'])>0)
			echo json_encode(false);
		else
			echo json_encode(true);
	}
}
?>