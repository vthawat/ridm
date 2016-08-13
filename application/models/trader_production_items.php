<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trader_production_items extends CI_Model 
{
	var $table='trader_production_items';
	var $desc='ข้อมูลผลิตภัณฑ์';
	var $id;
	function __construct()
	{
		parent::__construct();
		
			
	}
	function count_by_product_type($product_type_id)
	{
		$fillter=array('base_product_item.product_type_id'=>$product_type_id,
						'trader_profile.published'=>2);
		return count($this->get_group_by(null,null,null,$fillter));
	}
	function get_all($limit=null,$offset=null,$fillter=null)
	{
		
		
			$this->db->select($this->table.'.*,trader_profile.geo_id,trader_profile.province_id,trader_profile.amphur_id');
			$this->db->from($this->table);
			$this->db->join('trader_profile',$this->table.'.trader_profile_id=trader_profile.id');
			if($fillter!=null)$this->db->limit($limit,$offset);
					return $this->db->get()->result();
	

	}
	function get_group_by($group_by=null,$limit=null,$offset=null,$fillter=null)
	{
		$this->db->select($this->table.'.*,trader_profile.geo_id,trader_profile.province_id,trader_profile.amphur_id,trader_profile.published');
		$this->db->from($this->table);
		$this->db->join('trader_profile',$this->table.'.trader_profile_id=trader_profile.id');
		$this->db->join('base_product_item',$this->table.'.product_item_id=base_product_item.id');
		if(!empty($fillter))
		{
			foreach($fillter as $key=>$item)
			 if(empty($item)) unset($fillter[$key]);
				$this->db->where($fillter);
			
			
		}
		if($group_by!=null)$this->db->group_by($group_by);
		if(!empty($offset))$this->db->limit($offset,$limit);
		return $this->db->get()->result();
		// $this->db->get();
		//exit(print $this->db->last_query());
	}
		
	function get_by_trader_id($trader_id)
	{
		$this->db->where('trader_profile_id',$trader_id);
		return $this->db->get($this->table)->result();
	}
	function get_by_product_id($product_id,$fillter=null)
	{
		/*$this->db->where('product_item_id',$product_id);
		return $this->db->get($this->table)->result();
		*/
		$this->db->select($this->table.'.*,trader_profile.trader_type,trader_profile.trader_name,trader_profile.create_date,trader_profile.last_up_date,trader_profile.published');
		$this->db->from($this->table);
		$this->db->join('trader_profile',$this->table.'.trader_profile_id=trader_profile.id');
		$this->db->join('base_product_item',$this->table.'.product_item_id=base_product_item.id');
		$this->db->where('product_item_id',$product_id);
		if(!empty($fillter))
		{
			foreach($fillter as $key=>$item)
			 if(empty($item)) unset($fillter[$key]);
				$this->db->where($fillter);	
		}
		
		return $this->db->get()->result();
	}
	function get_by_trader_id_and_product_id($trader_id,$product_id)
	{
		$this->db->where('trader_profile_id',$trader_id);
		$this->db->where('product_item_id',$product_id);
		$result=$this->db->get($this->table)->row();
		if(!empty($result))
			$this->id=$result->id;
		return $result;
	}
	function post($data)
	{
		$trader_id=$data['trader_profile_id'];
		$product_id=$data['product_item_id'];
		if(empty($this->get_by_trader_id_and_product_id($trader_id, $product_id)))
				return $this->db->insert($this->table,$data);
			
		else {
			return $this->update($data);
		}
	}
	function update($data)
	{
		$this->db->where('id',$this->id);
		return $this->db->update($this->table,$data);
	}
	function delete($product_id)
	{
		$this->db->where('id',$product_id);
		return $this->db->delete($this->table);
	}
	function delete_by_trader_id($trader_id)
	{
		$this->db->where('trader_profile_id',$trader_id);
		return $this->db->delete($this->table);
	}
	
}