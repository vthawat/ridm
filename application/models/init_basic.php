<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Init_basic extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('base_product_type');
		$this->load->model('base_product_item');
		$this->load->model('base_research_type');
		$this->load->model('base_research_topic');
		
	}

}

/* End of file template.php */
/* Location: ./application/models/province.php */
