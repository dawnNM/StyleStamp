<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Product extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('product_model');
    }
    public function index_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        if($id==0){
            $data= $this->product_model->get_product_image();
        }
        else{
            $data= $this->product_model->get_products_image($id)[0];
        }
        //check if the user data exists
        if(!empty($data)){
            //set the response and exit
            $res=array(
                'status' => 1,
                'message' => 'product  found.',
                'product'=>$data
            );
             $this->response($res);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No product were found.'
            );
            $this->response($res);
        }
    }
}