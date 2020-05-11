
<?php
Class Category_model extends CI_Model
{
	function get_category($id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_id',$id);
		$this->db->where('status','active');
		$this->db->order_by('date_created','desc');
		return $this->db->get()->result_array();
	}

	function get_categories()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('status','active');
		$this->db->where('parent_category',null);
		$this->db->order_by('date_created','desc');
		return $this->db->get()->result_array();
	}

	function get_all_categories()
	{
		$this->db->select('*');
		$this->db->from('category');
		
		$this->db->where('status !=','delete');
		$this->db->where('parent_category',null);
		$this->db->order_by('date_created','desc');
		return $this->db->get()->result_array();
	}

	function add_category($data)
	{
		return $this->db->insert('category',$data);
	}

	function update_category($data,$category_id)
	{
		$this->db->where('category_id',$category_id);
		return $this->db->update('category',$data);
	}

	function delete_category($data,$category_id)
	{
		$this->db->where('category_id',$category_id);
		return $this->db->delete('category',$data);
	}

	function get_all_sub_categories()
	{
		$sql="select c1.category_id,c1.category_name,c1.description,c1.parent_category from category c1 where c1.parent_category is not null";
		return $this->db->query($sql)->result_array();
	}
	function get_all_sub_categories_by_parent($parent_id)
	{
		$sql="select c1.category_id,c1.category_name,c1.description,c1.parent_category  from category c1 where c1.parent_category is not null and c1.parent_category=".$parent_id;
		return $this->db->query($sql)->result_array();
	}
}
?>
