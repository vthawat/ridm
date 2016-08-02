<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trader_sidebar extends CI_Model 
{
	var $items;

	function __construct()
	{
		parent::__construct();

	}
	function get_items()
	{
			$this->items=array('profile'=>'ข้อมูลผู้ประกอบการ',
							'production'=>'ข้อมูลผลิตภัณฑ์',
							'map'=>'ข้อมูลเชิงภูมิศาสตร์',
					'logistic'=>'ข้อมูลด้าน Logistic');
			return $this->items;	
	}
}