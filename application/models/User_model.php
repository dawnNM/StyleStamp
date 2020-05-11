<?php
class User_model extends CI_Model
{	
	public function __construct() { 
        parent::__construct();
        
        //load user model
        // $this->load->model('user_model');
    }
	function validate()
	{
		$arr['email'] = $this->input->post('lemail');
		$arr['password'] = sha1($this->input->post('lpassword'));
		$arr['user_type'] = 'admin';
		return $this->db->get_where('Users',$arr)->row();
	}
	function verify_login($email,$password)
	{
		return $res= $this->db->select('*')->from('users')->where('email',$email)->where('password',$password)->where('user_type','customer')->get()->result_array();
	  
	}
	function verify_admin($email,$password)
	{
		 return $this->db->select('*')->from('users')->where('email',$email)->where('password',$password)->where('user_type','admin')->get()->result_array();
	}
	function get_users()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_type','customer');
		$this->db->order_by('created_date','desc');
		return $this->db->get()->result_array();
	}
	
	function add_user($data)
	{
		return $this->db->insert('users',$data);
	}
	
	function check_email($email)
	{
		return $this->db->from('users')->where('email',$email)->get()->num_rows();
		
	}
	function check_admin_email($email)
	{
		return $this->db->from('users')->where('email',$email)->where('user_type','admin')->get()->num_rows();
		
	}
	function get_user($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$id);
		$this->db->order_by('created_date','desc');
		return $this->db->get()->result_array();
	}
	function update_user($data,$user_id)
	{
		$this->db->where('user_id',$user_id);
		return $this->db->update('users',$data);
	}
	function delete($id)
	{
		
		$this->db->set('status', 'delete');
        $this->db->where('id', $id);
		return $this->db->update('users');
	}
	function get_customer_profile($id, $data)
	{
		$this->db->select('users.user_id, users.first_name, users.last_name, users.contact, users.D_O_B, users.status, users.gender');
		$this->db->from('users');
		$this->db->where($data);
		$this->db->order_by('created_date','desc');
		return $this->db->get()->result_array();
	}

	function filter_result($data)
	{   
		$this->db->select('*');
        $this->db->from('users');
        $this->db->where($data);
		$this->db->order_by('created_date','desc');
		return $this->db->get()->result_array();
	}
	
}
?>