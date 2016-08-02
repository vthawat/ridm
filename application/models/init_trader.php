<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Init_trader extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('country_geography');
		$this->load->model('country_province');
		$this->load->model('country_amphur');
		$this->load->model('country_district');
		$this->load->model('base_product_type');
		$this->load->model('base_product_item');
		$this->load->model('trader_locate');
		$this->load->model('trader_production_items');
		$this->load->model('trader_profile');
		
		
	}

}

/* End of file template.php */
/* Location: ./application/models/province.php */
