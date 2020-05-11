<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Getcustomerprofile extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('user_model');
    }
    public function index_get($id=0) {
        
        $array = array('users.user_type' => 'customer', 'users.user_id' => $id);
        $users = $this->user_model->get_customer_profile($id, $array);
        
        //check if the user data exists
        if(!empty($users)){
            //set the response and exit
             $this->response($users);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No user was found.'
            );
            $this->response($res);
        }
    }
}