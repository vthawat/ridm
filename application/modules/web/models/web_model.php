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
	function set_hit_view_article($article_id)
	{

		//$this->
		$current_hits=$this->get_hit_view_article($article_id);
		$current_hits=$current_hits+1;
		$this->db->where('id',$article_id);
		$this->db->update('web_contents',array('view_hits'=>$current_hits));
		return TRUE;
	}
	function get_hit_view_article($article_id)
	{
		$this->db->where('id',$article_id);
		return $this->db->get('web_contents')->row()->view_hits;
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
	function get_articles_by($by_array=null)
	{
		$this->db->select('web_contents.*,web_categories.category_name');
		$this->db->from('web_contents');
		$this->db->join('web_categories','web_contents.cat_id = web_categories.id');
		$this->db->where($by_array);
		return $this->db->get()->result();
		//return $result->result();
	}
	function count_article_in_category($cat_id)
	{
		$getby = array('web_contents.cat_id' => $cat_id);
		return count($this->get_articles_by($getby));
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