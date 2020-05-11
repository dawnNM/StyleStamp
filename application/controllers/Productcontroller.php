<?php
 
class Productcontroller extends CI_Controller
{
	public function __Construct()
	{
		error_reporting(-1);
		parent:: __Construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	function index()
	{
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
				$data['page'] = 'pro';
				$data['products']=$this->product_model->get_product_image();
				$this->load->view('includes/header-view');
				$this->load->view('includes/nav',$data);
				$this->load->view('viewproduct',$data);
				$this->load->view('includes/footer-view');
			}
		}
	}

	function addproduct(){
		if(!$this->session->userdata('user')){
			$data['page'] = 'login';
			$this->load->view('includes/header-login');
			$this->load->view('login');
			$this->load->view('includes/footer-login');
		}
		else{
			$user=json_decode(json_encode($this->session->userdata('user')),true);

			if($user[0]['user_type']=='admin'){
				$data['page'] = 'pro';
				$data['categories']=$this->category_model->get_all_sub_categories();
				$this->load->view('includes/header');
				$this->load->view('includes/nav',$data);
				$this->load->view('addproduct',$data);
				$this->load->view('includes/footer');

			}
		}
	}
	function edit($id){
        $cate_id = $this->uri->segment(3, 0);
        if($cate_id==0){
            $this->session->set_userdata('error','seems like trying to update wrong category');
                redirect(base_url('viewproducts'),'refresh');
		}
		$data['page'] = 'pro';
		$data['categories']=$this->category_model->get_all_sub_categories();
        $data['product']=$this->product_model->get_products_image($id);
        $this->load->view('includes/header');
        $this->load->view('includes/nav',$data);
        $this->load->view('addproduct',$data);
        $this->load->view('includes/footer');
    }
	function add(){
		$name = $this->security->xss_clean($this->input->post('prod_name'));
		$desc = $this->security->xss_clean($this->input->post('prod_desc'));
		$this->form_validation->set_rules('prod_name','product_name','required');

		if($this->form_validation->run()== TRUE){
				$data == array(
				'product_name'=>$name,
				'description'=>$desc,
				'date_created'=>date('Y-m-d H:i:s'),
				'created_by'=>$this->session->userdate('user')[0]['user_id'],
				'modified_by'=>$this->session->userdate('user')[0]['user_id']);

				$res=$this->product_model->add_product($data);

				if($res)
				{
					$this->session->set_userdata('success','product added successfully.! <a href="'.base_url().'viewproducts" >view</a>');
					redirect(base_url('addproduct'));
				}
				else{
					$this->session->set_userdata('error','trouble while adding new products');
					redirect(base_url('viewproducts'));
				}
			}else{
				$data['page'] = 'pro';
					$data['categories']=$this->product_model->get_all_products();
				$this->load->view('includes/header');
				$this->load->view('includes/nav',$data);
				$this->load->view('addproducts',$data);
				$this->load->view('includes/footer');	
			}
		}	
		
		function update($id){
			$cate_id = $this->uri->segment(2, 0);
			if($cate_id==0){
				$this->session->set_userdata('success','trouble while updating category');
					// redirect(base_url('viewcategories'),'refresh');  
			}
			$name = $this->security->xss_clean($this->input->post('cate_name'));
			$desc = $this->security->xss_clean($this->input->post('cate_desc'));
			$pid=$this->security->xss_clean($this->input->post('parent_cate'));
			$this->form_validation->set_rules('cate_name','category name','required');
			// $this->form_validation->set_rules('parent_cate','parent category','required');
			
			$data = array(
				'category_name'=>$name,
				'description'=>$desc,
				'parent_category'=>$pid,
				'modified_by'=>$this->session->userdata('user')[0]['user_id']
			);
			if($this->form_validation->run()== TRUE){
					//  print_r($data);
					$res=$this->product_model->modify_product($data,$id);
					if($res){
						$this->session->set_userdata('success','product updated successfully');
						redirect(base_url('viewproducts'),'refresh');
						
					}else{
						$this->session->set_userdata('error','trouble while updating  product');
						$data['product']=$this->product_model->get_products_image($id);
						$data['page'] = 'pro';
						$this->load->view('includes/header');
						$this->load->view('includes/nav',$data);
						$this->load->view('addproduct',$data);
						$this->load->view('includes/footer');
					}
			}
			else{
				$data['page'] = 'pro';
				$data['product']=$this->product_model->get_products_image($id);
				$this->load->view('includes/header');
				$this->load->view('includes/nav',$data);
				$this->load->view('addproduct',$data);
				$this->load->view('includes/footer');
			}
		}
	function delete($id){
		echo $id;
		if($this->product_model->delete_product($id)){
			$this->session->set_userdata('success','product deleted successfully.! ');
			redirect(base_url('viewproducts'));
		}else{
			$this->session->set_userdata('error','trouble while deleting products');
					redirect(base_url('viewproducts'));
		}	

		
}
}


?>
