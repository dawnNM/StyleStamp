<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Changepassword extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('user_model');
    }
    public function index_post() {

        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('passconf','confirm Password ', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == TRUE) {
			
            $pass = sha1($this->security->xss_clean($this->input->post('password')));
            $data=array('password'=>$pass);
            $res= $this->user_model->update_user($data);

            if($res)
            {
                $res=array(
                    'status' => '1',
                    'message' => 'password changed successfully.'
                );
            }
            else{
                $res=array(
                    'status' => '0',    
                    'message' => 'error while changing password.'
                );
                $this->response($res);
            }
        }else{
            $res=array(
                'status' => '0',
                'message' => 'error while changing password.'
            );
            $this->response($res);
        }
    }
  
}
