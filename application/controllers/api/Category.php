<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Category extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('category_model');
    }
    public function index_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        if($id==0){
            $data['categories']  = $this->category_model->get_categories();
        }
        else{
            $data['categories'] = $this->category_model->get_category($id);
        }
        //check if the user data exists
        if(!empty($data['categories'])){
            //set the response and exit
            $data['status']="1";
            $data['message']="ok";
             $this->response($data);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No category were found.',
                'categories'=>null
            );
            $this->response($res);
        }
    }
  
}