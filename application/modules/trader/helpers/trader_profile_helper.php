<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('published'))
{
	function published($status)
	{
		$CI =& get_instance();
		$CI->load->model('trader_profile');
		$publish_status=array();
		foreach($CI->trader_profile->get_status_all() as $item)
			array_push($publish_status,$item->status_name);
		
		//$publish_status=array('ยังไม่แผยแพร่','แผยแพร่','ปิดกิจการ');
		switch ($status)
		{
			case 1:
				return '<span class="label label-primary">'.$publish_status[$status-1].'</span>';
			break;
			case 2:
				return '<span class="label label-success">'.$publish_status[$status-1].'</span>';
			break;
			case 3:
				return '<span class="label bg-maroon">'.$publish_status[$status-1].'</span>';
			break;
			case 4:
				return '<span class="label label-danger">'.$publish_status[$status-1].'</span>';
			break;			

		}
		//return $publish_status[$status];
	}
	function trader_type($type=null)
	{
		$CI =& get_instance();
		$CI->load->model('trader_profile');
		$options='';
		foreach($CI->trader_profile->get_type_all() as $item)
			if($type==$item->type_name)
				$options.='<option value="'.$item->type_name.'" selected>'.$item->type_name.'</option>';
			else 
				$options.='<option value="'.$item->type_name.'">'.$item->type_name.'</option>';
		
		return $options;
		
	}
	function geo_options($geo_id=null)
	{
		$CI =& get_instance();
		$CI->load->model('country_geography');
		$options='';
		foreach($CI->country_geography->get_all() as $item)
			if($geo_id==$item->GEO_ID)
				$options.='<option value="'.$item->GEO_ID.'" selected>'.$item->GEO_NAME.'</option>';
			else 
				$options.='<option value="'.$item->GEO_ID.'">'.$item->GEO_NAME.'</option>';
		
		return $options;
	}
	function province_options($province_id=null,$geo_id=null)
	{
		$CI =& get_instance();
		$CI->load->model('country_province');
		$options='';
		foreach($CI->country_province->get_by_geo_id($geo_id) as $item)
			if($province_id==$item->PROVINCE_ID)
				$options.='<option value="'.$item->PROVINCE_ID.'" selected>'.$item->PROVINCE_NAME.'</option>';
			else 
				$options.='<option value="'.$item->PROVINCE_ID.'">'.$item->PROVINCE_NAME.'</option>';
		
		return $options;
	}
	function amphur_options($amphur_id=null,$province_id=null)
	{
		$CI =& get_instance();
		$CI->load->model('country_amphur');
		$options='';
		foreach($CI->country_amphur->get_by_province_id($province_id) as $item)
			if($amphur_id==$item->AMPHUR_ID)
				$options.='<option value="'.$item->AMPHUR_ID.'" selected>'.$item->AMPHUR_NAME.'</option>';
			else 
				$options.='<option value="'.$item->AMPHUR_ID.'">'.$item->AMPHUR_NAME.'</option>';
		
		return $options;
	}
	function district_options($district_id=null,$amphur_id=null)
	{
		$CI =& get_instance();
		$CI->load->model('country_district');
		$options='';
		foreach($CI->country_district->get_by_amphur_id($amphur_id) as $item)
			if($district_id==$item->DISTRICT_ID)
				$options.='<option value="'.$item->DISTRICT_ID.'" selected>'.$item->DISTRICT_NAME.'</option>';
			else 
				$options.='<option value="'.$item->DISTRICT_ID.'">'.$item->DISTRICT_NAME.'</option>';
		
		return $options;
	}				
}