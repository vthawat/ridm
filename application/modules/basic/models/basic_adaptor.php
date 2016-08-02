<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Basic_adaptor extends CI_Model 
{
	var $desc;
	var $items;
	var $view;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->data=$this->input->post();
	}
	function post($item=null)
	{
		
		if(empty($item)) return FALSE;
			
		if(empty($this->data)) return FALSE;
			return $this->{$item}->post($this->data);
		/*switch ($item) 
		{
			case 'product_type':
				if(empty($data['product_type']))	return FALSE;
				return $this->base_product_type->post($data);
			break;
						
		}*/
	}
	function put($item=null,$id=null,$status=null)
	{
		if(empty($item)&&empty($id)) return FALSE;
			$data=$this->input->post();
			return $this->{$item}->put($data,$id);
		/*switch($item)
		{
			case 'potentiality':
				if(empty($data['POTENTIALITY_NAME']))	return FALSE;
				return $this->potentiality->put($data,$id);
			break;
			case 'province':
				return $this->project_scope->put($id,$status);
			break;
		
		}*/
		

	}
	function load_edit($item,$id)
	{
		return $this->{$item}->get_by_id($id);
	}
	function get($item)
	{
					$this->desc=$this->{$item}->desc;
					$this->items=$this->{$item}->get_all();
					return array('desc'=>$this->desc,
								'items'=>$this->items,
								'view'=>$this->load->view($item,array('Basic_items'=>$this->items),TRUE));

	}

}

/* End of file template.php */
/* Location: ./application/modules/admin/models/basic.php */