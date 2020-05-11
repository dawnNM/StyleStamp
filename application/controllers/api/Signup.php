<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Signup extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('user_model');
    }
	public function index_post() {
		$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|numeric');
		$this->form_validation->set_rules('reg[dob]', 'Date of birth', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');		
		$this->form_validation->set_rules('gender', 'Gender', 'required|numeric');
		if ($this->form_validation->run() == TRUE) {
		$data=array(
			'first_name'=>$_POST['fname'],
			'last_name'=>$_POST['lname'],
			'email'=>$_POST['email'],
			'password'=>sha1($_POST['password']),
			'contact'=>$_POST['contact_no'],
			'D_O_B'=>$_POST['dob'],
			'gender'=>$_POST['gender'],
			'user_type'=>'customer'
		);
	 	$res = $this->user_model->add_user($data);
		if($res){
			$res=array(
				'status' => TRUE,
				'message' => 'account created successfully'
			);
			$this->response($res);
			}else{
				//set the response and exit
				$res=array(
					'status' => FALSE,
					'message' => 'error whille creating account'
				);
				$this->response($res);
			}	
	}else{
		echo validation_errors();
	}
}
}?>
  
