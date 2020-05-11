<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Subcategory extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('category_model');
    }
    public function index_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        if($id==0){
            $data['subcategories'] = $this->category_model->get_all_sub_categories();
        }
        else{
            $data['subcategories'] = $this->category_model->get_all_sub_categories_by_parent($id);
        }
        //check if the user data exists
        if(!empty($data['subcategories'])){
            //set the response and exit
             $data['status']="1";
             $data['message']="ok";
             $this->response($data);
        }else{
            //set the response and exit
            $res=array(
                'status' => 0,
                'message' => 'no subcategory were found.',
                'subcategories'=>null
            );
            $this->response($res);
        }
    }
  
}
