<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class base_research_topic extends CI_Model 
{
	var $table='base_research_topic';
	var $desc='รายการหัวข้อการวิจัย';
	function __construct()
	{
		parent::__construct();
		
			
	}
	function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
	}
	function get_all()
	{
			$this->db->select($this->table.".*,research_type");
			$this->db->from($this->table);
			$this->db->join($this->base_research_type->table,$this->table.".research_type_id=".$this->base_research_type->table.".id");
			return $this->db->get()->result();
	}
	public function post($data)
	{
		if($this->db->insert($this->table,$data)) return true;
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
}

/* End of file template.php */
/* Location: ./application/models/amphur.php */
