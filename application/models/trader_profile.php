<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trader_profile extends CI_Model 
{
	var $table='trader_profile';
	var $desc='ข้อมูลโรงงานอุตสาหกรรมยางพารา';
	function __construct()
	{
		parent::__construct();
		
			
	}
	function count_by_geo_id($geo_id)
	{
		$fillter=array('geo_id'=>$geo_id);
		return count($this->get_all(null,null,$fillter));
	}
	function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
	}
	function get_all($limit=null,$offset=null,$fillter=null)
	{
			if($fillter==null)			
				return $this->db->get($this->table,$offset,$limit)->result();
			else{
				// Fillter
				//exit(print_r($fillter));
				foreach($fillter as $key=>$item)
				 if(empty($item)) unset($fillter[$key]);
				$query=$this->db->get_where($this->table,$fillter,$offset,$limit);
				return $query->result();
			}
	}

	public function post($data)
	{
		//print_r($data);
		$user_id=array('create_by_user_id'=>$this->ezrbac->getCurrentUserID());
		$create_date=array('create_date'=>date('Y-m-d H:i:s'));
		$data=array_merge($data,$user_id,$create_date);
		if($this->db->insert($this->table,$data)) return $this->db->insert_id();
		else return false;

	}
	function put($data,$id)
	{
		if($this->db->update($this->table,$data,array('id'=>$id))) return true;
		else return false;
	}
	function delete($id)
	{
		if($this->db->delete($this->table,array('id'=>$id))) return true;
		else return false;
	}
	function get_status_all()
	{
		return $this->db->get('trader_status')->result();
	}
	function get_type_all()
	{
		return $this->db->get('trader_type')->result();
	}	
	function set_status($status,$trader_id)
	{
		$this->db->where('id',$trader_id);
		return $this->db->update($this->table,$status);
	}
}

/* End of file template.php */
/* Location: ./application/models/amphur.php */
