
<?php
 
class Profilecontroller extends CI_Controller
{
	public function __Construct()
	{
		error_reporting(-1);
		parent:: __Construct();
		 $this->load->model('user_model');
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
				$data['page'] = 'pi';
				$data['user']=$this->user_model->get_user($user[0]['user_id']);
				$this->load->view('includes/header');
				$this->load->view('includes/nav',$data);
				$this->load->view('updateadmininformation',$data);
				$this->load->view('includes/footer');
			}
		}
	}	
	function edit(){

		$this->form_validation->set_rules('fname','First Name','required|alpha');
		$this->form_validation->set_rules('lname','Last Name','required|alpha');
		$this->form_validation->set_rules('email','email','required|valid_email');
		$this->form_validation->set_rules('pass','password','required|min_length[8]');
	
		if($this->form_validation->run()== TRUE){
			$fnm=$_POST['fname'];
			$lnm=$_POST['lname'];
			$email=$_POST['email'];
			$pass=sha1($_POST['pass']);

			if($pass==$this->session->userdata('user')[0]['password']){
					$data=array(
					'first_name'=>$fnm,
					'last_name'=>$lnm,
					'email'=>$email
				);
				print_r($data);
			
				$res=$this->user_model->update_user($data,$this->session->userdata('user')[0]['user_id']);

				 if($res)
				{
					$user=$this->user_model->get_user($this->session->userdata('user')[0]['user_id']);
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('success','inforation updated successfully.!');
					redirect(base_url('profilecontroller'));
				}
				else{
					$this->session->set_userdata('error','trouble while updating information');
					redirect(base_url('profilecontroller'));
				}
			}else{
				$this->session->set_userdata('error','wrong password');
				// echo $this->session->userdata('user')[0]['password']." ".sha1($pass);
					redirect(base_url('profilecontroller'));
			}
			}else{
				$data['page'] = 'pi';
				$data['user']=$this->user_model->get_user($this->session->userdata('user')[0]['user_id']);
				$this->load->view('includes/header');
				$this->load->view('includes/nav',$data);
				$this->load->view('updateadmininformation',$data);
				$this->load->view('includes/footer');	
			}
		
	}	

		
}

		

?>
