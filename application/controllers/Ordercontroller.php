<?php
 
class Ordercontroller extends CI_Controller
{
	public function __Construct()
	{
		error_reporting(-1);
		parent:: __Construct();
		$this->load->model('order_model');
	}

	function index()
	{
		if(!$this->session->userdata('user')){
			$data['page'] = 'login';
			$this->load->view('include/header-login');
			$this->load->view('login');
			$this->load->view('includes/footer-login');
		}
		else{
			$user=json_decode(json_encode($this->session->userdata('user')),true);
			//print_r ($user);

			if($user[0]['user_type']=='admin'){
				$data['page'] = 'order';
				$data['orders']=$this->order_model->get_orders();
				// print_r($data);				
				$this->load->view('includes/header-view');
				$this->load->view('includes/nav',$data);
				$this->load->view('vieworder',$data);
				$this->load->view('includes/footer-view');
			}
		}
	}

	function edit($id){

	}
	function update($id){
		
	}
			
	function delete($id){
		//if($this->product_model->is_parent($id)>0){
			//if($this->product_model->update_product($data)){
				if($this->order_model->cancel_order($id)){
					$this->session->set_userdata('success','Order deleted successfully.!');
					redirect(base_url('vieworders'),'refresh');
				}
				else{
					$this->session->set_userdata('error','Trouble while deleting order');
					redirect(base_url('vieworders'),'refresh');
					// $this->load->view('include/header');
					// $this->load->view('include/nav',$data);
					// $this->load->view('vieworders',$data);
					// $this->load->view('include/footer');
				}
			//}else{
			//	$this->session->set_userdata('error','trouble while adding new order');
			//	$this->load->view('include/header');
			//		$this->load->view('include/nav',$data);
			//		$this->load->view('vieworder',$data);
			//		$this->load->view('include/footer');
				
			}
		//}else{

		//}	

		
}

		

?>
