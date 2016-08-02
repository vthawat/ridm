<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class web_model extends CI_Model 
{
	var $data;
	var $insert_id;
	function __construct()
	{
		parent::__construct();
		$this->data=$this->input->post();
	}
	function get_category_all()
	{
		return $this->db->get('web_categories')->result();
	}
	function get_category_by_id($id)
	{
		
		$this->db->where('id',$id);
		return $this->db->get('web_categories')->row();
	}
	function get_article_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('web_contents')->row();
	}
	function get_articles_all()
	{
		$this->db->select('web_contents.*,web_categories.category_name');
		$this->db->from('web_contents');
		$this->db->join('web_categories','web_contents.cat_id = web_categories.id');
		return $this->db->get()->result();
		//return $result->result();
	}
	function post_category()
	{
		return $this->db->insert('web_categories',$this->data);
	}
	function put_category($id)
	{
		$this->db->where('id',$id);
		return $this->db->update('web_categories',$this->data);
	}
	function put_article($id)
	{
		$this->db->where('id',$id);
		return $this->db->update('web_contents',$this->data);
	}
	function delete_category($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('web_categories');
	}
	function delete_article($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('web_contents');
	}
	function post_article()
	{
		$post_article=$this->db->insert('web_contents',$this->data);
		$this->insert_id=$this->db->insert_id();
		return $post_article;
	}
	
}