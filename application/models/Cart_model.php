<?php
class Cart_model extends CI_Model
{	
	public function __construct() { 
        parent::__construct();
        
        //load user model
        $this->load->model('product_model');
    }
	
	function get_cart($user_id)
	{
		$this->db->select('cart_id,user_id');
		$this->db->from('cart');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('date_created','desc');
		return $this->db->get()->result_array();
	}
	function get_cart_info($user_id)
	{
		$data=$this->get_cart($user_id);
		if($data){
		$data[0]['cart_info']=$this->get_cartinfo($data[0]['cart_id']);
		}

		return $data;
	}
	function get_cartinfo($cart_id)
	{
		$this->db->select('product_id,quantity,size,color');
		$this->db->from('cart_info');
		$this->db->where('cart_id',$cart_id);
		$this->db->order_by('created_date','desc');
		$data=$this->db->get()->result_array();
		$product_cnt=count($data);
			for($i=0;$i<$product_cnt;$i++)
			{
				 $data[$i]['product']=$this->product_model->get_products_image($data[$i]['product_id'])[0];
			}
		return $data;
	}
	
	function add_cart($data)
	{
		$this->db->insert('cart',$data);
		return $this->db->insert_id();
	}
	function add_cart_info($data)
	{
		return $this->db->insert('cart_info',$data);
		//  $this->db->insert_id();
	}
	
	function check_cart_exist($user_id)
	{
		return $this->db->from('cart')->where('user_id',$user_id)->get()->num_rows();
		
	}
	function update_cart($data,$cart_id,$user_id)
	{
		$this->db->where('cart_id',$cart_id);
		return $this->db->update('cart',$data);
	}
	function delete($id)
	{
		
		$this->db->set('status', 'delete');
        $this->db->where('cart_id', $id);
		return $this->db->update('cart');
	}	
}
?>
