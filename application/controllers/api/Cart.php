
<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Cart extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('cart_model');
    }

    // GET

    public function index_get($id=0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
     if($id!=0){
          if($this->cart_model->check_cart_exist($id)>0){       
            $res=array('cart'=>$this->cart_model->get_cart_info($id)[0]);
            if(!empty($res)){
              $msg="cart found";
              $code=0;
            }
          }
          else{
            $data=array(
              // 'cart_id'=>2,
              'user_id'=> $id,
            );
             $res['cart_id']=$this->cart_model->add_cart($data);
             if($res['cart_id']){
               $msg="cart created";
               $code=1;
             }
             else{
               $res=null;
              $msg="trouble while creating cart";
              $code=0;
             }
          }
     }else{
              $msg="trouble while creating cart";
              $code=0;
             }
    
        //check if the user data exists
        if(!empty($msg)){
            //set the response and exit 
            $res['status'] =$code;
            $res['message'] = $msg;
            $this->response($res);
        }
    }
    // POST
    public function index_post(){
    
        // collecting form data inputs
        //extra input fields will be sent as hidden
      
        $cart_id = $this->security->xss_clean($this->input->post("cart_id"));
        $product_id=$this->security->xss_clean($this->input->post("product_id"));
        $quantity=$this->security->xss_clean($this->input->post("quantity"));
        $color=$this->security->xss_clean($this->input->post("color"));
        $size=$this->security->xss_clean($this->input->post("size"));
        // form validation for inputs  
        $this->form_validation->set_rules('cart_id', 'First Name', 'required|numeric');
        $this->form_validation->set_rules('product_id', 'Last Name', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Email', 'trim|required|numeric');
        $this->form_validation->set_rules('color', 'Password', 'required|alpha');
        $this->form_validation->set_rules('size', 'Contact Number', 'required|alpha');
        // checking form submittion have any error or not
        if($this->form_validation->run() === TRUE){
          $data=array(
            'cart_id'=>$cart_id,
            'product_id'=>$product_id,
            'quantity'=>$quantity,
            'size'=>$size,
            'color'=>$color
          );  
          // $this->response($data);
            if($this->cart_model->add_cart_info($data)){
  
              $this->response(array(
                "status" => 1,
                "message" => "product added Successfully"
              ), REST_Controller::HTTP_OK);
            }else{
  
              $this->response(array(
                "status" => 0,
                "message" => "Failed to add product"
              ), REST_Controller::HTTP_OK);
            }
          }else{
            // we have some empty field
            $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
            ), REST_Controller::HTTP_OK);
          }
        }
      // DELETE
      // path : <project_url>/index.php/order

      public function index_delete($cart_id){
      if($this->cart_model->cancel_cart($cart_id)){
        // retruns true
        $this->response(array(
          "status" => 1,
          "message" => "Cart has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        // return false
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete cart"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

    // PUT: <project_url>/index.php/student
    public function index_put(){
     
      $cart_id = $data->cart_id;
	  $user_id = $data->user_id;
	  $status = $status->status;
      $date_created = $data_created->date;
      $date_modified = $date_modified->date;

           if($this->cart_model->update_student_information($student_id, $student_info)){
            if($this->cart_model->update_cart($data)){
  
              $this->response(array(
                "status" => 1,
                "message" => "Student data updated successfully"
              ), REST_Controller::HTTP_OK);
          }else{
  
            $this->response(array(
              "status" => 0,
              "messsage" => "Failed to update student data"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }
        // }else{
  
        //   $this->response(array(
        //     "status" => 0,
        //     "message" => "All fields are needed"
        //   ), REST_Controller::HTTP_NOT_FOUND);
        // }
    } 
  
}    
  
}    
