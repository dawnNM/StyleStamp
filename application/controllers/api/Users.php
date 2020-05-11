<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Users extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('user_model');
    }
    public function index_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        if($id==0){
            $users= $this->user_model->get_users();
        }
        else{
            $users = $this->user_model->get_user($id);
        }
        //check if the user data exists
        if(!empty($users)){
            //set the response and exit
             $this->response($users);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No user were found.'
            );
            $this->response($res);
        }
    }
}
