<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Getorderbyuser extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('order_model');
    }


    // GET - get orders by user_id and order_id

    //Example 
    //http://localhost/Project/api/Getorderbyuserid/2/4
    //http://localhost/Project/api/Getorderbyuserid/user_id/order_id

    //public function index_get() {
    public function index_get() {

        $user_id =  $this->uri->segment(3);
        $order_id =  $this->uri->segment(4);

        $array = array('orders.user_id' => $user_id, 'orders.order_id' => $order_id);
        $orders = $this->Order_model->filter_result($array);
        
        //check if the user data exists
        if(!empty($orders)){
            //set the response and exit
         
             $this->response($orders);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No orders were found.'
            );
            $this->response($res);
        }
    }

}    