<?php
 
 class Reportcontroller extends CI_Controller
 {
     public function __Construct()
     {
         error_reporting(-1);
         parent:: __Construct();
         $this->load->model('setting_model');
     }
 
     function index(){
         if(!$this->session->userdata('user')){
             $data['page'] = 'login';
             $this->load->view('includes/header-login');
             $this->load->view('login');
             $this->load->view('includes/footer-login');
         }
         else{
             $user=json_decode(json_encode($this->session->userdata('user')),true);
             //print_r ($user);
 
             if($user[0]['user_type']=='admin'){
                 $data['page'] = 'report';
                //  $data['categories']=$this->product_model->get_all_products();
                 $this->load->view('includes/header');
                 $this->load->view('includes/nav',$data);
                 $this->load->view('productreport',$data);
                 $this->load->view('includes/footer');
             }
         }
     }
 
     function salesreport(){
        if(!$this->session->userdata('user')){
            $data['page'] = 'login';
            $this->load->view('includes/header-login');
            $this->load->view('login');
            $this->load->view('includes/footer-login');
        }
        else{
            $user=json_decode(json_encode($this->session->userdata('user')),true);
            //print_r ($user);

            if($user[0]['user_type']=='admin'){
                $data['page'] = 'report';
               //  $data['categories']=$this->product_model->get_all_products();
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('salesreport',$data);
                $this->load->view('includes/footer');
            }
        }
     }
     function contactdetails(){
        if(!$this->session->userdata('user')){
            $data['page'] = 'login';
            $this->load->view('includes/header-login');
            $this->load->view('login');
            $this->load->view('includes/footer-login');
        }
        else{
            $user=json_decode(json_encode($this->session->userdata('user')),true);
            //print_r ($user);

            if($user[0]['user_type']=='admin'){
                $data['page'] = 'report';
               //  $data['categories']=$this->product_model->get_all_products();
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changecontactdetails',$data);
                $this->load->view('includes/footer');
            }
        }
     }
    }
    ?>