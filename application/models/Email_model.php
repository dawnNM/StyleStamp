<?php
class Email_model extends CI_Model 
{
	function __Construct()
	{
		parent:: __construct();
		
	}
	
	function forget_email($email,$newtPass)
	{	
		$data=array('password'=>sha1($newtPass));
		$this->db->where('email',$email);
		return $this->db->update('users',$data);
		
		
		
		
	}	
}
?>
