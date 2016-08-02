<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class trader_locate extends CI_Model 
{
	var $table='trader_location';
	var $desc='สถานที่ตั้งอุตสาหกรรมยางพาราปลายน้ำ';
	function __construct()
	{
		parent::__construct();
		
			
	}
	public function get_by_id($id=null)
	{
		if(empty($id)) return FALSE;
		$sql="SELECT
				trader_location.id,
				trader_location.location_name,
				trader_location.address,
				trader_location.district_id,
				trader_location.amphur_id,
				trader_location.province_id,
				trader_location.zip_code_id,
				trader_location.latitude,
				trader_location.longtitude,
				country_amphur.AMPHUR_NAME,
				country_province.PROVINCE_NAME,
				country_district.DISTRICT_NAME,
				country_zipcode.ZIPCODE
				FROM
				trader_location
				INNER JOIN country_amphur ON trader_location.amphur_id = country_amphur.AMPHUR_ID
				INNER JOIN country_province ON trader_location.province_id = country_province.PROVINCE_ID
				INNER JOIN country_district ON trader_location.district_id = country_district.DISTRICT_ID
				INNER JOIN country_zipcode ON trader_location.district_id = country_zipcode.DISTRICT_ID
				WHERE
				trader_location.id = $id";
		
		//exit(print $this->db->last_query());
		return $this->db->query($sql)->row();
	}
	function get_all()
	{
			$this->db->select($this->table.".*,product_type");
			$this->db->from($this->table);
			$this->db->join($this->base_product_type->table,$this->table.".product_type_id=".$this->base_product_type->table.".id");
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
