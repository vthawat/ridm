<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Role_acl extends CI_Model 
{
	function __construct()
	{
		parent::__construct();

	}
	
	function get_access_nav()
	{
		$role_id=$this->ezrbac->getCurrentUser()->user_role_id;
		$this->db->where('user_role_id',$role_id);
		return $this->db->get('user_access_map')->result();
	}

}