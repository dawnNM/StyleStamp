<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Settings extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('setting_model');
    }
    public function index_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        if($id==0){
            $settings= $this->setting_model->get_setting();
        }
        else{
            $settings = $this->setting_model->get_setting_by_settings_id($id);
        }
        //check if the user data exists
        if(!empty($settings)){
            //set the response and exit
         
             $this->response($settings);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No Settings were found.'
            );
            $this->response($res);
        }
    }
}