<?php
class Subcategorycontroller extends CI_Controller 
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
                    $data['page'] = 'subcat';
                    $data['subcategories']=$this->category_model->get_all_sub_categories();
                    $this->load->view('includes/header-view');
					$this->load->view('includes/nav',$data);
					$this->load->view('viewsubcategory',$data);
					$this->load->view('includes/footer-view');
			}
		}
    }
    function addSubSategory(){
        if(!$this->session->userdata('user')){
			
            $data['page'] = 'login';
            $this->load->view('includes/header-login');
            $this->load->view('login');
            $this->load->view('includes/footer-login');			
    }else{
        $user=json_decode(json_encode($this->session->userdata('user')),true);
        // print_r($user);
        if($user[0]['user_type']=='admin'){
            $data['page'] = 'subcat';
                $data['categories']=$this->category_model->get_categories();
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('addsubcategory',$data);
                $this->load->view('includes/footer');
        }
    }
    }
    function add(){
        $name = $this->security->xss_clean($this->input->post('cate_name'));
        $desc = $this->security->xss_clean($this->input->post('cate_desc'));
        $pid=$this->security->xss_clean($this->input->post('parent_cate'));
        $this->form_validation->set_rules('cate_name','category name','required');
        $this->form_validation->set_rules('parent_cate','parent category','required');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
            'category_name'=>$name,
            'description'=>$desc,
            'date_created'=>date('Y-m-d H:i:s'),
            'parent_category'=>$pid,
            'created_by'=>$this->session->userdata('user')[0]['user_id'],
            'modified_by'=>$this->session->userdata('user')[0]['user_id']);
            //  print_r($data);
            $res=$this->category_model->add_category($data);
            
            if($res)
            {
                $this->session->set_userdata('success','sub-category added successfully <a href="'. base_url().'viewsubcategories" >view</a>');
                redirect(base_url('addsubcategory'));
        
            }
            else{

                $this->session->set_userdata('error','trouble while adding new sub-category');
              
                redirect(base_url('viewsubcategories'));
            }				
        }else {
            $data['page'] = 'subcat';
            $data['categories']=$this->category_model->get_categories();
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('addsubcategory',$data);
                $this->load->view('includes/footer');
         }
    }
    function edit($id){
        $cate_id = $this->uri->segment(3, 0);
        if($cate_id==0){
            $this->session->set_userdata('error','seems like trying to update wrong category');
                redirect(base_url('viewsubcategories'),'refresh');
        }
        $data['page'] = 'subcat';
        $data['categories']=$this->category_model->get_categories();
        $data['subcategory']=$this->category_model->get_category($id);
        $this->load->view('includes/header');
        $this->load->view('includes/nav',$data);
        $this->load->view('addsubcategory',$data);
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
                $res=$this->category_model->update_category($data,$id);
                if($res){
                    $this->session->set_userdata('success','subcategory updated successfully');
                    redirect(base_url('viewsubcategories'),'refresh');
                    
                }else{
                    $this->session->set_userdata('error','trouble while updating  subcategory');
                    $data['page'] = 'subcat';
                    $data['category']=$this->category_model->get_category($id);
                    $this->load->view('includes/header');
                    $this->load->view('includes/nav',$data);
                    $this->load->view('addsubcategory',$data);
                    $this->load->view('includes/footer');
                }
        }
        else{
            $data['category']=$this->category_model->get_category($id);
            $data['page'] = 'subcat';
            $this->load->view('includes/header');
            $this->load->view('includes/nav',$data);
            $this->load->view('addsubcategory',$data);
            $this->load->view('includes/footer');
        }
    }
    function delete($id){
        $this->session->set_userdata('error','Trouble while deleting sub category');
        redirect(base_url('viewsubcategories'),'refresh');
        // if($this->category_model->is_parent($id)>0){
        //     if($this->category_model->update_subcategory($data)){
        //        if( $this->product_model->delete_product_by_category($id))
        //        {
        //         $this->session->set_userdata('success','trouble while adding new sub-category');
        //         redirect(base_url('viewsubcategories'),'refresh');
                
        //        }else{
        //         $this->session->set_userdata('error','trouble while adding new sub-category');
        //         $data['page'] = 'subcat';
        //         $this->load->view('includes/header');
        //         $this->load->view('includes/nav',$data);
        //         $this->load->view('viewsubcategory',$data);
        //         $this->load->view('includes/footer');
        //        }
        //     }
        //     $this->session->set_userdata('error','trouble while adding new sub-category');
        //     $data['page'] = 'subcat';
        // $this->load->view('includes/header');
        // $this->load->view('includes/nav',$data);
        // $this->load->view('viewsubcategory',$data);
        // $this->load->view('includes/footer');
        // }
    }
}
?>
