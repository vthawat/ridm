<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class base_research_type extends CI_Model 
{
	var $table='base_research_type';
	var $desc='ประเภทของงานวิจัย';
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
			return $this->db->get($this->table)->result();
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
