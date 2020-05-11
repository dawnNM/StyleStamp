
<?php
 
 class Settingscontroller extends CI_Controller
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
                 $data['page'] = 'setting';
                //  $data['categories']=$this->product_model->get_all_products();
                 $this->load->view('includes/header');
                 $this->load->view('includes/nav',$data);
                 $this->load->view('updatecompanydetails',$data);
                 $this->load->view('includes/footer');
             }
         }
     }
 
     function banner(){
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
                $data['page'] = 'setting';
               //  $data['categories']=$this->product_model->get_all_products();
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changebanners',$data);
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
                $data['page'] = 'setting';
               //  $data['categories']=$this->product_model->get_all_products();
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changecontactdetails',$data);
                $this->load->view('includes/footer');
            }
        }
     }
     function socialmedia(){
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
                $data['page'] = 'setting';
                $data['fl']=$this->setting_model->get_setting_by_settings_name('fb');
            $data['ll']=$this->setting_model->get_setting_by_settings_name('li');
            $data['tl']=$this->setting_model->get_setting_by_settings_name('tweeter');
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changesocialmedialinks',$data);
                $this->load->view('includes/footer');
            }
        }
     }
     function privacypolicy(){
        if(!$this->session->userdata('user')){
            $data['page'] = 'setting';
            $this->load->view('includes/header-login');
            $this->load->view('login');
            $this->load->view('includes/footer-login');
        }
        else{
            $user=json_decode(json_encode($this->session->userdata('user')),true);
            //print_r ($user);

            if($user[0]['user_type']=='admin'){
                $data['page'] = 'setting';
                $data['pp']=$this->setting_model->get_setting_by_settings_name('privacy_policy');
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changeprivacypolicy',$data);
                $this->load->view('includes/footer');
            }
        }
     }
 
     function update_privacy_policy(){
         $this->form_validation->set_rules('pp','privacy policy','required');
         
         if($this->form_validation->run()== TRUE){
            $pp = $this->security->xss_clean($this->input->post('pp'));
                 $data = array(
                     array(
                    'settings_name'=>'privacy_policy',
                    'settings_value'=>$pp,            
                 'modified_by'=>$this->session->userdata('user')[0]['user_id'])
                );
                print_r($data);
                 $res=$this->setting_model->update_settings($data);
 
                 if($res)
                 {
                    $this->session->set_userdata('success','privacy policy updated successfully.! ');
                    redirect(base_url('privacypolicy'));
                 }
                 else{
                     $this->session->set_userdata('error','trouble while updating privacy policy');
                    redirect(base_url('privacypolicy'));
                 }
             }else{
                $data['page'] = 'settings';
                $data['pp']=$this->setting_model->get_setting_by_settings_name('privacy_policy');
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changeprivacypolicy',$data);
                $this->load->view('includes/footer');
             }
     }
     function update_social_media(){
        $fb = $this->security->xss_clean($this->input->post('fl'));
        $li = $this->security->xss_clean($this->input->post('ll'));
        $tweeter = $this->security->xss_clean($this->input->post('tl'));
        $this->form_validation->set_rules('fl','facebook link','regex_match[/(?:http:\/\/)?(?:www\.)?facebook\.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-]*)/]');//http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z0-9_\-\.]+\/?
        $this->form_validation->set_rules('ll','linkedin link','regex_match[(http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/[A-z0-9_-]+\/?)]');
        $this->form_validation->set_rules('tl','tweeter link','regex_match[(http(s)?:\/\/(.*\.)?twitter\.com\/[A-z0-9_]+\/?)]');

        if($this->form_validation->run()== TRUE){
                    $data=array(
                        array(
                            'settings_name'=>'fb',
                            'settings_value'=>$fb,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        ),
                        array(
                            'settings_name'=>'li',
                            'settings_value'=>$li,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        ),
                        array(
                            'settings_name'=>'tweeter',
                            'settings_value'=>$tweeter,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        )
                    );
                $res=$this->setting_model->update_settings($data);

                if($res)
                {
                    $this->session->set_userdata('success','settings updated successfully.! ');
                    redirect(base_url('socialmedia'));
                }
                else{
                    $this->session->set_userdata('error','trouble while updating links');
                    redirect(base_url('socialmedia'));
                }
            }else{
               $data['page'] = 'setting';
               $data['fl']=$this->setting_model->get_setting_by_settings_name('fb');
           $data['ll']=$this->setting_model->get_setting_by_settings_name('li');
           $data['tl']=$this->setting_model->get_setting_by_settings_name('tweeter');
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changesocialmedialinks',$data);
                $this->load->view('includes/footer');	
            }
	}
	

	function update_contact_details(){
        $fb = $this->security->xss_clean($this->input->post('fl'));
        $li = $this->security->xss_clean($this->input->post('ll'));
        $tweeter = $this->security->xss_clean($this->input->post('tl'));
        $this->form_validation->set_rules('phone1','Contact Number', 'required|numeric');
        $this->form_validation->set_rules('phone2','Contact Number', 'required|numeric');
		$this->form_validation->set_rules('phone3','Contact Number', 'required|numeric');
		$this->form_validation->set_rules('email1','email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('email2','email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run()== TRUE){
                    $data=array(
                        array(
                            'settings_name'=>'fb',
                            'settings_value'=>$fb,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        ),
                        array(
                            'settings_name'=>'li',
                            'settings_value'=>$li,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        ),
                        array(
                            'settings_name'=>'tweeter',
                            'settings_value'=>$tweeter,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        )
                    );
                $res=$this->setting_model->update_settings($data);

                if($res)
                {
                    $this->session->set_userdata('success','settings updated successfully.! ');
                    redirect(base_url('socialmedia'));
                }
                else{
                    $this->session->set_userdata('error','trouble while updating links');
                    redirect(base_url('socialmedia'));
                }
            }else{
               $data['page'] = 'setting';
               $data['fl']=$this->setting_model->get_setting_by_settings_name('fb');
           $data['ll']=$this->setting_model->get_setting_by_settings_name('li');
           $data['tl']=$this->setting_model->get_setting_by_settings_name('tweeter');
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changesocialmedialinks',$data);
                $this->load->view('includes/footer');	
            }
	}

	function update_company_details(){
        $fb = $this->security->xss_clean($this->input->post('fl'));
        $li = $this->security->xss_clean($this->input->post('ll'));
        $tweeter = $this->security->xss_clean($this->input->post('tl'));
        $this->form_validation->set_rules('company_name','Company Name','required|alpha');
        $this->form_validation->set_rules('myfile','Company Logo','validate_image['.$_FILES['myfile'].']');
		$this->form_validation->set_rules('cpydate','Copy Right Date', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
		

        if($this->form_validation->run()== TRUE){
                    $data=array(
                        array(
                            'settings_name'=>'fb',
                            'settings_value'=>$fb,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        ),
                        array(
                            'settings_name'=>'li',
                            'settings_value'=>$li,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        ),
                        array(
                            'settings_name'=>'tweeter',
                            'settings_value'=>$tweeter,
                            'modified_by'=>$this->session->userdata('user')[0]['user_id']
                        )
                    );
                $res=$this->setting_model->update_settings($data);

                if($res)
                {
                    $this->session->set_userdata('success','settings updated successfully.! ');
                    redirect(base_url('socialmedia'));
                }
                else{
                    $this->session->set_userdata('error','trouble while updating links');
                    redirect(base_url('socialmedia'));
                }
            }else{
               $data['page'] = 'setting';
               $data['fl']=$this->setting_model->get_setting_by_settings_name('fb');
           $data['ll']=$this->setting_model->get_setting_by_settings_name('li');
           $data['tl']=$this->setting_model->get_setting_by_settings_name('tweeter');
                $this->load->view('includes/header');
                $this->load->view('includes/nav',$data);
                $this->load->view('changesocialmedialinks',$data);
                $this->load->view('includes/footer');	
            }
	}




	function delete($id){
		if($this->setting_model->is_parent($id)>0){
			if($this->product_model->update_setting($data)){
				if($this->setting_model->delete_setting($id)){
					$this->session->set_userdata('success','delete.!');
					redirect(base_url('viewsetting'),'refresh');
				}
				else{
					$this->session->set_userdata('error','trouble while deleting');
					$this->load->view('include/header');
					$this->load->view('include/nav',$data);
					$this->load->view('viewsetting',$data);
					$this->load->view('include/footer');
				}
				$this->session->set_userdata('error','trouble while deleting');
				$this->load->view('include/header');
					$this->load->view('include/nav',$data);
					$this->load->view('viewsetting',$data);
					$this->load->view('include/footer');
				
			}
		}

    
    }
}
         
 
 ?>
 