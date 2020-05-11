<?php
class Setting_model extends CI_Model
{	
	//----------------------------------------------------------------------------------
	//orders join order_info
	//----------------------------------------------------------------------------------


	//get all setting
	function get_setting()
	{
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('status','active');
		$this->db->order_by('entry_date','desc');
		return $this->db->get()->result_array();
	}

	//get setting by settings_id
	function get_setting_by_settings_id($settings_id)
	{
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('settings.settings_id',$settings_id);
		return $this->db->get()->result_array();
	}

	//get setting by settings_id
/*	function get_setting_by_settings_id($settings_id)
	{
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('settings.settings_id',$settings_id);
		$this->db->where('settings.status','active');
		$this->db->order_by('settings.entry_date','desc');
		return $this->db->get()->result_array();
	}*/

	//get all active and inactive settings
	function get_setting_active_inactive()
	{
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('settings.status !=','delete');
		$this->db->order_by('settings.entry_date','desc');
		return $this->db->get()->result_array();
	}

	//get setting by settings_name
	function get_setting_by_settings_name($settings_name)
	{
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('settings.settings_name',$settings_name);
		return $this->db->get()->result_array();
	}

	//get setting by status function
	function get_setting_by_status($status)
	{
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('settings.status', $status);
		$this->db->order_by('settings.entry_date','desc');
		return $this->db->get()->result_array();
	}

	//delete settings function
	function delete_settings($settings_id)
	{
		
		$this->db->set('settings.status', 'delete');
		$this->db->where('settings_id', $settings_id);
		$result1 = $this->db->update('settings');
		return $result1;
	}

	//add settings function
	function add_settings($settings_data)
	{
		$result1 = $this->db->insert('settings',$settings_data);
		return $result1;
	}

	//update settings function
	function update_settings($data)
	{
		return $this->db->update_batch('settings', $data, 'settings_name');
	}

	//filter function

	function filter_result($data)
	{   
		$this->db->select('*');
        $this->db->from('settings');
        $this->db->where($data);
		$this->db->order_by('entry_date','desc');
		return $this->db->get()->result_array();
	}
}
?>