<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Order extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('order_model');
    }
    public function index_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        if($id==0){
            $data['orders']= $this->order_model->get_orders();
        }
        else{
            $data['order'] = $this->order_model->get_order($id);
        }
        //check if the user data exists
        if(!empty($data)){
            //set the response and exit
         
             $this->response($data);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No order were found.'
            );
            $this->response($res);
        }
    }

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

        public function userorder_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        if($id==0){
            $data['orders']= $this->order_model->get_orders();
        }
        else{
            $data['order'] = $this->order_model->get_order_by_user_id($id);
        }
        //check if the user data exists
        if(!empty($data)){
            //set the response and exit
         
             $this->response($data);
        }else{
            //set the response and exit
            $res=array(
                'status' => FALSE,
                'message' => 'No order were found.'
            );
            $this->response($res);
        }
    }

    public function index_put()
    {
        // collecting form data inputs
        //extra input fields will be sent as hidden
        $order_id = $this->security->xss_clean($this->input->post("order_id"));
        $user_id = $this->security->xss_clean($this->input->post("user_id"));
        $date = $this->security->xss_clean($this->input->post("date"));
        $shipped_status = $this->security->xss_clean($this->input->post("shipped_status"));
  
        $order_status = $this->security->xss_clean($this->input->post("order_status"));
        $payment_type = $this->security->xss_clean($this->input->post("payment_type"));
        $promotion_id = $this->security->xss_clean($this->input->post("promotion_id"));
        $status = $this->security->xss_clean($this->input->post("status"));
  
        $date_create = $this->security->xss_clean($this->input->post("date_create"));
        $date_modified = $this->security->xss_clean($this->input->post("date_modified"));
        $created_by = $this->security->xss_clean($this->input->post("created_by"));
        $modified_by = $this->security->xss_clean($this->input->post("modified_by"));
  
        $shipping_address_id = $this->security->xss_clean($this->input->post("shipping_address_id"));
        $shipping_date = $this->security->xss_clean($this->input->post("shipping_date"));
        $mail_address = $this->security->xss_clean($this->input->post("mail_address"));
        $total = $this->security->xss_clean($this->input->post("total"));
  
  //  ----------------
  
        $product_id = $this->security->xss_clean($this->input->post("product_id"));
        $quantity = $this->security->xss_clean($this->input->post("quantity"));
        //$shipped_status = $this->security->xss_clean($this->input->post("shipped_status")); 
        // $date_created = $date_create;   
  
        // form validation for inputs
        $this->form_validation->set_rules("order_id", "Order id", "required");
        $this->form_validation->set_rules("user_id", "User id", "required");
        $this->form_validation->set_rules("date", "Date", "required");
        $this->form_validation->set_rules("shipped_status", "Shipped Status", "required");
  
        $this->form_validation->set_rules("order_status", "Order status", "required");
        $this->form_validation->set_rules("payment_type", "Payment type", "required");
        $this->form_validation->set_rules("promotion_id", "Promotion id", "required");
        $this->form_validation->set_rules("status", "status", "required");
  
        $this->form_validation->set_rules("date_create", "Date Create", "required");
        $this->form_validation->set_rules("date_modified", "Date Modified", "required");
        $this->form_validation->set_rules("created_by", "Created By", "required");
        $this->form_validation->set_rules("modified_by", "Modified By", "required");
  
        $this->form_validation->set_rules("shipping_address_id", "Shipping Address Id", "required");
        $this->form_validation->set_rules("shipping_date", "Shipping Date", "required");
        $this->form_validation->set_rules("mail_address", "Mail Address", "required");
        $this->form_validation->set_rules("total", "Total", "required");
  
        $this->form_validation->set_rules("product_id", "Product id", "required");
        $this->form_validation->set_rules("quantity", "Quantity", "required");
        //$this->form_validation->set_rules("shipped_status", "Shipped Status", "required");
        // $this->form_validation->set_rules("date_created", "Course", "required");
  
        // checking form submittion have any error or not
        if($this->form_validation->run() === FALSE){
  
          // we have some errors
          $this->response(array(
            "status" => 0,
            "message" => "All fields are needed"
          ) , REST_Controller::HTTP_NOT_FOUND);
        }else{
  
          if(
            !empty($order_id) && !empty($user_id) && !empty($date) && !empty($shipped_status) &&
            !empty($order_status) && !empty($payment_type) && !empty($promotion_id) && !empty($status) &&
            !empty($date_create) && !empty($date_modified) && !empty($created_by) && !empty($modified_by) &&
            !empty($shipping_address_id) && !empty($shipping_date) && !empty($mail_address) && !empty($total) &&
            !empty($product_id) && !empty($quantity)
        ){
            // all values are available
            $order = array(
              "order_id" => $order_id,
              "user_id" => $user_id,
              "date" => $date,
              "shipped_status" => $shipped_status,
  
              "order_status" => $order_status,
              "payment_type" => $payment_type,
              "promotion_id" => $promotion_id,
              "status" => $status,  
  
              "date_create" => $date_create,
              "date_modified" => $date_modified,
              "created_by" => $created_by,
              "modified_by" => $modified_by, 
  
              "shipping_address_id" => $shipping_address_id,
              "shipping_date" => $shipping_date,
              "mail_address" => $mail_address,
              "total" => $total     
            );

            $order_info = array(
              "order_id" => $order_id,
              "product_id" => $product_id,
              "quantity" => $quantity,
              "status" => $status,
              "date_created" => $date_create,
              "date_modified" => $date_modified,
              "created_by" => $created_by,
              "modified_by" => $modified_by      
            );
  
            if($this->Order_model->update_order($order, $order_info, $order_id)){
  
              $this->response(array(
                "status" => 1,
                "message" => "Order updated Successfully"
              ), REST_Controller::HTTP_OK);
            }else{
  
              $this->response(array(
                "status" => 0,
                "message" => "Failed to update Order"
              ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
          }else{
            // we have some empty field
            $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
          }
        }
      } 
    }
