<?php
class Home extends CI_Controller 
{
	public function __Construct()
	{	error_reporting(-1);
		parent:: __construct();
		$this->load->model('order_model');
		$this->load->model('product_model');
		$this->load->model('user_model');
	}
	
	function index()
	{
		if(!$this->session->userdata('user')){
			
				$data['page'] = 'login';
				$this->load->view('includes/header-login');
				$this->load->view('login');
				$this->load->view('includes/footer-login');			
		}else{
			$user=json_decode(json_encode($this->session->userdata('user')),true);
			// print_r($user);
			if($user[0]['user_type']=='admin'){
					$data['page'] = 'Dashboard';
					$data['orders']=$this->order_model->get_orders();
					// var_dump($this->order_model->get_orders());
					$data['revenue']=$this->order_model->get_total();
					$data['productcnt']=count($this->product_model->get_products());
					$data['usercnt']=count($this->user_model->get_users());
					$data['orderscnt']=count($this->order_model->get_all_completed_orders());
					$this->load->view('includes/header');
					$this->load->view('includes/nav',$data);
					$this->load->view('index',$data);
					$this->load->view('includes/footer');
			}
		}
	}
}
?>