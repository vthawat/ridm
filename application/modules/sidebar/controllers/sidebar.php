<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar extends CI_Controller {
	var $sidebar_items=array();
	var $sidebar_set;
	function __construct()
	{
		parent::__construct();
		$this->web_sidebar();
		$this->trader_sidebar();
		$this->basic_sidebar();
	}
	function get_sidebar()
	{
		foreach($this->sidebar_items as $item)
		   $this->sidebar_set.=$item;
		
		return $this->sidebar_set;
	}
	function trader_sidebar()
	{

      $this->load->model('trader/trader_sidebar');
	  $data=array('header_title'=>$this->trader_sidebar->get_items());  
	  array_push($this->sidebar_items,$this->load->view('trader_sidebar',$data,TRUE));		
		//return $this->load->view('trader_sidebar',$data,TRUE);
	}
	function basic_sidebar()
	{
		$this->load->model('init_basic');
		array_push($this->sidebar_items,$this->load->view('basic_sidebar',null,TRUE));	
	}
	function web_sidebar()
	{
		array_push($this->sidebar_items,$this->load->view('web_sidebar',null,TRUE));	
	}	
}
	