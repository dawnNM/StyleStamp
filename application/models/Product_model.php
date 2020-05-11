<?php 

  class Product_model extends CI_Model {
  	  function get_product ($id) {
  	  	return $this->db->select('*')->from ('product')->where ('product_id',$id)->get()->result_array(); 
  	  }

  	  function get_all_products() {
  	  	return $this->db->select('*')->from ('product')->join('product_image', 'product.product_id = product_image.product_id', 'inner')->join('image', 'product_image.image_id = image.image_id', 'inner')->where ('product.status !=','delete')->order_by('product.date_created','desc')->get()->result_array(); 
  	  }
  	   function get_products() {
  	  	return $this->db->select('*')->from ('product')->where ('status ','active')->order_by('date_created','desc')->get()->result_array(); 
		}
		function get_product_image(){
			$data=$this->db->select('*')->from ('product')->where ('status ','active')->order_by('date_created','desc')->get()->result_array();
			$product_cnt=count($data);
			// echo $product_cnt;
			for($i=0;$i<$product_cnt;$i++)
			{
				$data[$i]['images']=$this->get_images_by_product($data[$i]['product_id']);
			}
			for($i=0;$i<$product_cnt;$i++)
			{
				$data[$i]['specs']=$this->get_product_specs($data[$i]['product_info_id'])[0];
			}
			return $data;

		}
		function get_products_image($id){
			$data=$this->db->select('*')->from ('product')->where ('status ','active')->where ('product_id ',$id)->order_by('date_created','desc')->get()->result_array();
			$product_cnt=count($data);
			// echo $product_cnt;
			for($i=0;$i<$product_cnt;$i++)
			{
				$data[$i]['images']=$this->get_images_by_product($data[$i]['product_id']);
			}
			for($i=0;$i<$product_cnt;$i++)
			{
				$data[$i]['specs']=$this->get_product_specs($data[$i]['product_info_id'])[0];
			}
			return $data;

		}
		function get_product_specs($id){
			$this->db->select('color,size,composition');
			$this->db->from('product_specs');
			$this->db->where('product_info_id',$id);
    	  	return $this->db->get()->result_array();	

		}
  	  function create_product($data,$images)
	{
		$product_image='';
		$product_id= $this->db->insert('product',$data)->insert_id();
		$count=count($images);
		for($i=0;$i<$count;$i++){
					$image_id= $this->db->insert('image',$images[$i])->insert_id();
					$product_image[$i]=array(
						'product_id' => $product_id,
						'image_id'=>$image_id	,
						'status'=>'active',	
						'entry_date'=>date("Y-m-d H:i:s"));
		}
		$this->db->insert_batch('product_image', $product_image);
	}

	function delete_product($product_id)
	{

		// $query = $this->db->query('SELECT * FROM product_image where product_id=$product_id');
		// $count = $query->numrows();
		// for($i=0;$i<$count;$i++){
		// 	$this->db->set('status', 'deleted');
		// 	$this->db->where('product_id', $product_id);
		// 	$result2 = $this->db->update('product');
		// }


		$this->db->set('status', 'deleted');
		$this->db->where('product_id', $product_id);
		$result1 = $this->db->update('product_image');

		$this->db->set('status', 'delete');
		$this->db->where('product_id', $product_id);
		$result2 = $this->db->update('product');

		return $result1&&$result2;
	}

	function modify_product($data, $product_id,$product_info,$product_info_id)
	{
		$this->db->where('product_id', $product_id);
		$product= $this->db->update('product', $data);
		$this->db->where('product_info_id', $product_info_id);
		$product_info =$this->db->update('product_specs', $data);
		return($product&&$product_info_id);  	 
    }
    //filter function
    function filter_Result($data)
    {
    	$this->db->select('*');
    	$this->db->from('product');
    	$this->db->where($data);
    	$this->db->order_by('date_create', 'desc');
    	  return $this->db->get()->result_array();

    }

    //get product by category id
    function get_product_by_category($category_id){
 
    	$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.category_id',$category_id);
		$this->db->where('product.status','active');
		$this->db->order_by('product.data_created','desc');
		return $this->db->get()->result_array();
    }

    //get all product images function
    function get_images_by_product($product_id){
 
    	$this->db->select('image.url,image.alt_text');
		$this->db->from('product');
		$this->db->join('product_image', 'product.product_id = product_image.product_id', 'inner');
		$this->db->join('image', 'product_image.image_id = image.image_id', 'inner');  
		$this->db->where('product_image.product_id',$product_id);
		$this->db->where('product.status','active');
		$this->db->order_by('product.date_created','desc');
		return $this->db->get()->result_array();
    }

    //filter products function
    function get_sorted_products($data)
    {
    	$this->db->select('*');
    	$this->db->from('product');
    	$this->db->where($data);
    	$this->db->order_by('date_created', 'desc');
    	  return $this->db->get()->result_array();

    }

    function get_products_with_specs_and_images($data)
    {

		$data=$this->db->select('*')->from ('product')->where ('status ','active')->where($data)->order_by('date_created','desc')->get()->result_array();
		$product_cnt=count($data);
		//echo $product_cnt;
		for($i=0;$i<$product_cnt;$i++)
		{
			$data[$i]['images']=$this->get_images_by_product($data[$i]['product_id']);
		}
		for($i=0;$i<$product_cnt;$i++)
		{
			$data[$i]['specs']=$this->get_product_specs($data[$i]['product_info_id']);
		}
		return $data;

	}
	

  }
