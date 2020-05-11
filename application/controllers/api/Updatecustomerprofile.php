<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';


class Updatecustomerprofile extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('user_model');
    }
    public function index_put() {
        
        // $user_id = $data->user_id;
        // $first_name = $data->first_name;
        // $last_name = $data->last_name;

        // Path: 
        // http://localhost/Project/api/Updatecustomerprofile/4/pqr/aaa

        $user_id =  $this->uri->segment(3);
        $first_name =  $this->uri->segment(4);
        $last_name =  $this->uri->segment(5);

        $contact =  $this->uri->segment(6);
        $D_O_B =  $this->uri->segment(7);
        $gender =  $this->uri->segment(8);

        $array = array('users.first_name' => $first_name, 'users.last_name' => $last_name, 
                        'users.contact' => $contact, 'users.D_O_B' => $D_O_B,
                        'users.gender' => $gender
                    );
        $result = $this->user_model->update_user($array, $user_id);
        
        if($result){
             $this->response(array(
                "status" => 1,
                "message" => "Customer Profile Updated successfully"
              ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "messsage" => "Failed to Update Customer Profile data"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}