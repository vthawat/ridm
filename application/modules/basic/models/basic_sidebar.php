<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Basic_sidebar extends CI_Model 
{
	var $items;

	function __construct()
	{
		parent::__construct();

	}
	function get_items()
	{
			/*$this->items=array('profile'=>'ข้อมูลโรงงานอุตสาหกรรมยางพาราฯ',
							'production'=>'ผลิตภัณฑ์อุตสาหกรรมยางพาราฯ',
							'map'=>'แผนที่ตั้งอุตสาหกรรมยางพาราฯ',
					'search'=>'ค้นหาข้อมูลผู้ประกอบการ');*/
			return $this->items;	
	}
}