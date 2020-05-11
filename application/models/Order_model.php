<?php
class Order_model extends CI_Model
{	
	//----------------------------------------------------------------------------------
	//orders join order_info
	//----------------------------------------------------------------------------------

	//get one order
	function get_order($order_id)
	{
			$data=$this->db->select('order_id, user_id, promotion_id, shipping_address_id, mail_address_id, date, shipped_status, order_status, payment_type, total')->from ('orders')->where ('status ','active')->where ('order_id ', $order_id)->order_by('date_create','desc')->get()->result_array();
			$order_cnt=count($data);
			//echo $order_cnt;
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['user']=$this->get_user_details($data[$i]['user_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['promotion']=$this->get_promotion_details($data[$i]['promotion_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['shipping_address']=$this->get_shipping_address($data[$i]['shipping_address_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['mail_address']=$this->get_mailing_address($data[$i]['mail_address_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['products']=$this->get_products($data[$i]['order_id']);
			}
			return $data;
	}

	//--------------------
	
	//get all orders ( active )
	function get_orders(){
			$data=$this->db->select('order_id, user_id, promotion_id, shipping_address_id, mail_address_id, date, shipped_status, order_status, payment_type, total')->from ('orders')->where ('status ','active')->order_by('date_create','desc')->get()->result_array();
			$order_cnt=count($data);
			//echo $order_cnt;
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['user']=$this->get_user_details($data[$i]['user_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['promotion']=$this->get_promotion_details($data[$i]['promotion_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['shipping_address']=$this->get_shipping_address($data[$i]['shipping_address_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['mail_address']=$this->get_mailing_address($data[$i]['mail_address_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['products']=$this->get_products($data[$i]['order_id']);
			}
			return $data;

		}


	//---------------------

//get one order
	function get_order_by_user_id($user_id)
	{
			$data=$this->db->select('order_id, user_id, promotion_id, shipping_address_id, mail_address_id, date, shipped_status, order_status, payment_type, total')->from ('orders')->where ('status ','active')->where ('user_id ', $user_id)->order_by('date_create','desc')->get()->result_array();
			$order_cnt=count($data);
			//echo $order_cnt;
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['user']=$this->get_user_details($data[$i]['user_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['promotion']=$this->get_promotion_details($data[$i]['promotion_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['shipping_address']=$this->get_shipping_address($data[$i]['shipping_address_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['mail_address']=$this->get_mailing_address($data[$i]['mail_address_id']);
			}
			for($i=0;$i<$order_cnt;$i++)
			{
				$data[$i]['products']=$this->get_products($data[$i]['order_id']);
			}
			return $data;
	}


	//---------------------


	function get_total()
	{
		$this->db->select_sum('total');
    $this->db->from('orders');
    $this->db->where('order_status','completed');
    return $this->db->get()->row()->total;
	}
	function get_vieworders()
	{
		$sql="SELECT o.order_id,(SELECT CONCAT(u.first_name,' ' , u.last_name) from users u where u.user_id=o.user_id) As client_name,o.date,o.payment_type,o.shipped_status,o.order_status FROM `orders` o INNER JOIN `order_info` ON `o`.`order_id` = `order_info`.`order_id` WHERE `o`.`status` != 'delete' ORDER BY `o`.`date_create` DESC";
		return $this->db->query($sql)->result_array();
	}
	function get_all_completed_orders()
	{
		$this->db->select('*');
    $this->db->from('orders');
    $this->db->where('order_status','completed');
    return $this->db->get()->result_array();
	}

	//get all active orders
	function get_orders_active()
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_info', 'orders.order_id = order_info.order_id', 'inner'); 
		$this->db->where('orders.status','active');
		$this->db->order_by('orders.date_create','desc');
		return $this->db->get()->result_array();
	}

	//get all active and inactive orders
	function get_all_orders()
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_info', 'orders.order_id = order_info.order_id', 'inner'); 
		$this->db->where('orders.status !=','delete');
		$this->db->order_by('orders.date_create','DESC');
		return $this->db->get()->result_array();
	}

	//get orders by user_id and order_id
	function get_order_by_user_id_order_id($user_id, $order_id)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_info', 'orders.order_id = order_info.order_id', 'inner');
		$array = array('orders.order_id' => $order_id, 'orders.user_id' => $user_id, 'orders.status' => $active);
		$this->db->where($array); 
		$this->db->order_by('orders.date_create','desc');
		return $this->db->get()->result_array();
	}



	//get orders by user_id
	function get_orders_by_user_id($user_id)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_info', 'orders.order_id = order_info.order_id', 'inner'); 
		$this->db->where('orders.user_id',$user_id);
		$this->db->where('orders.status','active');
		$this->db->order_by('orders.date_create','desc');
		return $this->db->get()->result_array();
	}

	//get orders by status function
	function get_orders_by_status($status)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_info', 'orders.order_id = order_info.order_id', 'inner'); 
		$this->db->where('orders.status', $status);
		$this->db->order_by('orders.date_create','desc');
		return $this->db->get()->result_array();
	}

	//get order by order_id
	function get_order_by_order_id($order_id)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_info', 'orders.order_id = order_info.order_id', 'inner'); 
		$this->db->where('orders.order_id',$order_id);
		$this->db->where('orders.status','active');
		$this->db->order_by('orders.date_create','desc');
		return $this->db->get()->result_array();
	}


	//cancel order function
	function cancel_order($order_id)
	{
		
		$this->db->set('status', 'delete');
		$this->db->where('order_id', $order_id);
		$this->db->where('shipped_status', 'notshipped');
		$result1 = $this->db->update('orders');

		//$result2 = $result1;

		if($this->db->affected_rows() > 0){
			$this->db->set('status', 'delete');
			$this->db->where('order_id', $order_id);
			$result2 = $this->db->update('order_info');
		}

		if ($this->db->affected_rows() > 0)
		{
  			return TRUE;
		}
		else
		{
  			return FALSE;
		}
		//return $result1&&$result2;

	}

	//add order function
	function add_order($order_data, $order_info_data)
	{
		$result1 = $this->db->insert('orders',$order_data);
		$result2 = $this->db->insert('order_info',$order_info_data);
		return $result1&&$result2;
	}

	//update order function

	function update_order($orders_data,$order_info_data,$order_id)
	{
		$this->db->where('order_id',$order_id);
		$result1 = $this->db->update('orders',$orders_data);
		$this->db->where('order_id',$order_id);
		$result1 = $this->db->update('order_info',$order_info_data);
		return $result1&&$result2;
	}

	//filter function

	function filter_result($data)
	{   
		$this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_info', 'orders.order_id = order_info.order_id', 'inner'); 
        $this->db->where($data);
		$this->db->order_by('date_create','desc');
		return $this->db->get()->result_array();
	}


	//-----------------------------

	function get_user_details($id)
	{
		$this->db->select('user_id, email, first_name, last_name, contact, D_O_B, gender');
		$this->db->from('users');
		$this->db->where('user_id',$id);
		$this->db->order_by('created_date','desc');
		return $this->db->get()->result_array();
	}

	function get_promotion_details($id)
	{
		$this->db->select('promotion_id, code, promotion_decription, amount, expire');
		$this->db->from('promotion');
		$this->db->where('promotion_id',$id);
		$this->db->order_by('entry_date','desc');
		return $this->db->get()->result_array();
	}

	function get_shipping_address($id)
	{
		$this->db->select('address_id, street, civil_no, city, state, country, postal_code, appartment');
		$this->db->from('address');
		$this->db->where('address_id',$id);
		$this->db->where('address_type','shipping');
		$this->db->order_by('created_date','desc');
		return $this->db->get()->result_array();
	}

	function get_mailing_address($id)
	{
		$this->db->select('address_id, street, civil_no, city, state, country, postal_code, appartment');
		$this->db->from('address');
		$this->db->where('address_id',$id);
		$this->db->where('address_type','mail');
		$this->db->order_by('created_date','desc');
		return $this->db->get()->result_array();
	}

	function get_products($order_id){
 
    	$this->db->select('product.product_id, product.product_name, order_info.quantity');
		$this->db->from('order_info');
		$this->db->join('product', 'order_info.product_id = product.product_id', 'inner');
		//$this->db->join('image', 'product_image.image_id = image.image_id', 'inner');  
		//$this->db->where('product_image.product_id',$product_id);
		$this->db->where('product.status','active');
		$this->db->where('order_info.order_id', $order_id);
		$this->db->order_by('product.date_created','desc');
		return $this->db->get()->result_array();
    }

	//--------------------
}
?>