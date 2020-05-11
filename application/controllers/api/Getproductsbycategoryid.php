<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Getproductsbycategoryid extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('Product_model');
    }
    public function index_get() {
        
        $category_id =  $this->uri->segment(3);

        $array = array('product.category_id' => $category_id);
        $products = $this->Product_model->get_sorted_products($array);
        
        //check if the user data exists
        if(!empty($products)){
            //set the response and exit
             $this->response($products);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No products were found.'
            );
            $this->response($res);
        }
    }
}