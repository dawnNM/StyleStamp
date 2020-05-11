<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Deleteorder extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('Order_model');
    }

      // DELETE
      // path : <project_url>/index.php/order

      public function index_delete($order_id){
        // delete data method
        //$data = json_decode(file_get_contents("php://input"));
        //$order_id = $this->security->xss_clean($data->order_id);
  
      if($this->Order_model->cancel_order($order_id)){
        // retruns true
        $this->response(array(
          "status" => 1,
          "message" => "Order has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        // return false
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete order"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }  
}    