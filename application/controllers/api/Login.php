<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Login extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('user_model');
    }

    public function index_post() {
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[8]');
        
        if ($this->form_validation->run() == TRUE) {
            
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = sha1($this->security->xss_clean($this->input->post('password')));
        
            $data= $this->user_model->verify_login($email,$password);
            
            if($data)
            {
                $res=array(
                    'status' => 1,
                    'login_status' => 'success',
                    'message' => 'loggedin successfully',
                    'user'=>$data[0]
                    );
                    // echo $res;
                    // $this->response($res);
                $this->response($res);
            }
            else{
                $res=array(
                'status' => 0,
                'login_status' => 'failed',
                'message' => 'Invalid credentials!.',
                'user'=>null
                );
                // echo $res;
                $this->response($res);
            }

        }else {

            $res=array(
                'status' => 2,
                'login_status' => 'failed',
                'message' => 'Login Unsuccessful.',
                'user'=>null
            );
          
            $this->response($res);
        }
    }
}
?>
