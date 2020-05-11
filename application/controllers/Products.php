<?php
class Products extends CI_Controller 
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
				$this->load->view('addproduct');
				$this->load->view('includes/footer-login');
	}	
	function verify_admin()
	{	$this->form_validation->set_rules('lemail','email','required|valid_email');
		$this->form_validation->set_rules('lpassword','password','required|min_length[8]');
		
		if ($this->form_validation->run() == TRUE) {
			
			$email = $this->security->xss_clean($this->input->post('lemail'));
			$password = sha1($this->security->xss_clean($this->input->post('lpassword')));
		
			$res= $this->user_model->verify_admin($email,$password);
			// print_r($res);
			if($res)
			{
				$this->session->set_userdata('user',$res);
				if($this->session->userdata('redirectTo'))
				{	
					$re = $this->session->userdata('redirectTo');
					$this->session->unset_userdata('redirectTo');
					redirect($re);				
				}
				else
					
					redirect('/','refresh');
					
			}
			else{
				
				$this->session->set_userdata('error','Invalid credentials!.');
				$this->session->set_userdata('login_status','failed');
				$this->load->view('includes/header-login');
				$this->load->view('login');
				$this->load->view('includes/footer-login');
			}

		}else {
			$this->session->set_userdata('login_status','failed');
			$this->load->view('includes/header-login');
				$this->load->view('login');
				$this->load->view('includes/footer-login');
		}
		
	}
	function verify_candidate(){
		$email = $this->security->xss_clean($this->input->post('email'));
		$password = sha1($this->security->xss_clean($this->input->post('password')));
		
		$res= $this->user_model->verify_login($email,$password);
		if($res)
		{
			
			$this->session->set_userdata('user',$res);
			if($res[0]['user_type'] == 'candidate'){
				redirect('index.php/candidate/');
			}
			else
			{
				redirect('index.php/login');
			}
		}
		else
		{
			$this->session->set_userdata('login_status','failed');
		}	 
	}
	/* change password */
	
	/*Avoid email duplication while registration*/
	function check_email()
	{
		$this->form_validation->set_rules('femail','email','required|valid_email');
		
		
		if ($this->form_validation->run() == TRUE) {
			
			$email = $this->security->xss_clean($this->input->post('femail'));
			if($this->user_model->check_email($_POST['email'])>0)
			{
					redirect('/','refresh');
					
			}
			else{
				
				$this->session->set_userdata('error','Invalid email');
				$this->session->set_userdata('login_status','failed');
				$this->load->view('includes/header-login');
				$this->load->view('login');
				$this->load->view('includes/footer-login');
			}

		}else {
			$this->session->set_userdata('login_status','failed');
			$this->load->view('includes/header-login');
				$this->load->view('login');
				$this->load->view('includes/footer-login');
		}
		
	}

	}
	
	function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url());
	}	
}
?>
