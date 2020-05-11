<?php
class Categorycontroller extends CI_Controller 
{
	public function __Construct()
	{	error_reporting(-1);
        parent:: __construct();
        $this->load->model('category_model');
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
                    $data['page'] = 'cat';
                    $data['categories']=$this->category_model->get_all_categories();
                    $this->load->view('includes/header-view');
					$this->load->view('includes/nav',$data);
					$this->load->view('viewcategory',$data);
					$this->load->view('includes/footer-view');
			}
		}
    }
    function addcategory(){
        if(!$this->session->userdata('user')){
			
            $data['page'] = 'login';
            $this->load->view('includes/header-login');
            $this->load->view('login');
            $this->load->view('includes/footer-login');			
    }else{
        $user=json_decode(json_encode($this->session->userdata('user')),true);
        // print_r($user);
        if($user[0]['user_type']=='admin'){
            $data['page'] = 'cat';
                // $data['categories']=$this->category_model->get_all_categories();
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('addcategory',$data);
                $this->load->view('includes/footer');
        }
    }
    }
    function add(){
        $name = $this->security->xss_clean($this->input->post('cate_name'));
        $desc = $this->security->xss_clean($this->input->post('cate_desc'));
        $this->form_validation->set_rules('cate_name','category_name','required');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
            'category_name'=>$name,
            'description'=>$desc,
            'date_created'=>date('Y-m-d H:i:s'),
            'created_by'=>$this->session->userdata('user')[0]['user_id'],
            'modified_by'=>$this->session->userdata('user')[0]['user_id']);
            //  print_r($data);
            $res=$this->category_model->add_category($data);
            
            if($res)
            {
                $this->session->set_userdata('success','category added successfully <a href="'. base_url().'viewcategories" >view</a>');
                redirect(base_url('addcategory'));
            }
            else{

                $this->session->set_userdata('error','trouble while adding new category');
                redirect(base_url('viewcategories'));
            }				
        }else {
            $data['categories']=$this->category_model->get_all_categories();
            $data['page'] = 'cat';
            $this->load->view('includes/header');
            $this->load->view('includes/nav',$data);
            $this->load->view('addcategory',$data);
            $this->load->view('includes/footer');
         }
    }
    function edit($id){
        $cate_id = $this->uri->segment(3, 0);
        if($cate_id==0){
            $this->session->set_userdata('error','seems like trying to update wrong category');
                redirect(base_url('viewcategories'),'refresh');
        }
        $data['category']=$this->category_model->get_category($id);
        $data['page'] = 'cat';
        $this->load->view('includes/header');
        $this->load->view('includes/nav',$data);
        $this->load->view('addcategory',$data);
        $this->load->view('includes/footer');
    }
    function update($id){
        $cate_id = $this->uri->segment(2, 0);
        if($cate_id==0){
            $this->session->set_userdata('success','trouble while updating category');
                // redirect(base_url('viewcategories'),'refresh');  
        }
        $name = $this->security->xss_clean($this->input->post('cate_name'));
        $desc = $this->security->xss_clean($this->input->post('cate_desc'));
        $this->form_validation->set_rules('cate_name','category name','required');
        
        $data = array(
        'category_name'=>$name,
        'description'=>$desc,
        'modified_by'=>$this->session->userdata('user')[0]['user_id']
    );
        if($this->form_validation->run()== TRUE){
                 
                $res=$this->category_model->update_category($data,$id);
                if($res){
                    $this->session->set_userdata('success','category updated successfully');
                    redirect(base_url('viewcategories'),'refresh');
                    
                   }else{
                    $this->session->set_userdata('error','trouble while updating  category');
                    $data['category']=$this->category_model->get_category($id);
                    $data['page'] = 'cat';
        $this->load->view('includes/header');
        $this->load->view('includes/nav',$data);
        $this->load->view('addcategory',$data);
        $this->load->view('includes/footer');

                }
        }
        else{
            $data['category']=$this->category_model->get_category($id);
            $data['page'] = 'cat';
        $this->load->view('includes/header');
        $this->load->view('includes/nav',$data);
        $this->load->view('addcategory',$data);
        $this->load->view('includes/footer');
        }
    }
    function delete($id){
        $this->session->set_userdata('error','Trouble while deleting category');
        redirect(base_url('viewcategories'),'refresh');
        // if($this->category_model->is_parent($id)>0){
            // if($this->product_model->update_product($data)){
            //    if( $this->category_model->delete_category($id))
            //    {
            //     $this->session->set_userdata('success','trouble while adding new category');
            //     redirect(base_url('viewcategories'),'refresh');
                
            //    }else{
            //     $this->session->set_userdata('error','trouble while adding new category');
            //     $data['page'] = 'cat';
            //     $this->load->view('includes/header');
            //     $this->load->view('includes/nav',$data);
            //     $this->load->view('viewcategory',$data);
            //     $this->load->view('includes/footer');
            //    }
            // }
        //     $this->session->set_userdata('error','trouble while adding new category');
        // $this->load->view('includes/header');
        // $this->load->view('includes/nav',$data);
        // $this->load->view('viewcategory',$data);
        // $this->load->view('includes/footer');
        // }
    }
}
?>
