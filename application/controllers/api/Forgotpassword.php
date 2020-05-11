<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Forgotpassword extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('user_model');
        $this->load->library('email');
    }
    public function index_post() {

        $this->form_validation->set_rules('email','Email','required|valid_email');

        if ($this->form_validation->run() == TRUE) {

            $email = $this->security->xss_clean($this->input->post('email'));
            if($this->user_model->check_email($email)>0){
            // $res= $this->user_model->check_email($email);
            // print_r($res);
            
            $pass=random_string('alnum',8);
            $config['protocol']    = 'sendmail';
            $config['smtp_host']    = 'smtp.hostinger.com';
            $config['smtp_port']    = '587';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'mail@stylestamp.dipenoverseas.com';
            $config['smtp_pass']    = 'Admin@123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['priority']    = "1";
            $config['mailtype'] = 'text'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      
            $this->load->library('email', $config);
            // $this->email->initialize($config);
            $to=$email;
            $subject= "new temporary password";
            $txt = "Your new temporary password is ".$pass;	
            $this->email->from('mail@stylestamp.dipenoverseas.com', 'Style Stamp');
            $this->email->to($to);
            // echo $to;
            $this->email->subject($subject);
            $this->email->message($txt);
            if($this->email->send()){
                $this->email_model->forget_email($email,$pass);
                $res=array(
                    'status' => '1',
                    'message' => 'new password sent to your email'
                    );
                $this->response($res);
            }
            else{
                $res=array(
                'status' => '0',
                'message' => 'problem while sending you email'
                );
                $this->response($res);
            }
        }else{
            $res=array(
                'status' => '2',
                'message' => 'Invalid email address'
            );
            $this->response($res);
        }
    }
}
}
?>