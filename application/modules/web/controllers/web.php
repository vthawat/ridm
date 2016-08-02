<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('admin');
		$this->load->model('web_model','Web');
		$get_sidebar=$this->load->controller('sidebar/get_sidebar',array(),FALSE);
		$this->template->write('sidebar',$get_sidebar);
	}
	
	function index()
	{
		$this->template->render();
	}
	function categories($action=null,$id=null)
	{
		switch($action)
		{
			case 'new':
				$data['action_btn']=$this->load->view('action_btn',null,TRUE);
				$data['action']=base_url('web/post_category');
				$data['content']=array('title'=>"เพิ่มใหม่",
															'color'=>'success',
															'toolbar'=>'',
															'detail'=>$this->load->view('frm_categories',$data,TRUE));
				$this->template->write_view('content','contents',$data);
			break;
			case 'edit':
				$data['action_btn']=$this->load->view('action_btn',null,TRUE);
				$data['action']=base_url('web/put_category/'.$id);
				$data['edit_item']=$this->Web->get_category_by_id($id);			
				$data['content']=array('title'=>"แก้ไข",
															'color'=>'success',
															'toolbar'=>'',
															'detail'=>$this->load->view('frm_categories',$data,TRUE));
				$this->template->write_view('content','contents',$data);
			break;			
		
			default:
				{
						$this->load_jquery_dtable();
						$categories['web_categories']=$this->Web->get_category_all();
						$data['content']=array('title'=>"ประเภทของเนื้อหา",
															'color'=>'success',
															'toolbar'=>$this->load->view('toolsbar',null,TRUE),
															'detail'=>$this->load->view('categories',$categories,TRUE));
						$this->template->write_view('content','contents',$data);	
				}
		}

		
		$this->template->render();
	}
	function articles($action=null,$id=null)
	{
			
		switch($action)
		{
			case 'view':
				if(empty($id)) show_error('ไม่พบรหัสรายการบทความ');
				$data['view_item']=$this->Web->get_article_by_id($id);	
				$data['content']=array('title'=>'<h3 class="text-primary">'.$data['view_item']->content_name.'</h3>',
															'color'=>'success',
															'toolbar'=>$this->load->view('view_action_btn',$data,TRUE),
															'detail'=>$this->load->view('article_detail',$data,TRUE));
				$this->template->write_view('content','contents',$data);
			break;
			case 'new':
				$this->template->add_js('assets/tinymce/js/tinymce/tinymce.min.js');
				$this->template->add_js($this->load->view('js/tiny.js',null,TRUE),'embed',TRUE);
				$data['action_btn']=$this->load->view('action_btn',null,TRUE);
				$data['web_categories']=$this->Web->get_category_all();
				$data['action']=base_url('web/post_article');
				$data['content']=array('title'=>"เพิ่มใหม่",
															'color'=>'success',
															'toolbar'=>'',
															'detail'=>$this->load->view('frm_articles',$data,TRUE));
				$this->template->write_view('content','contents',$data);
			break;
			case 'edit':
				$this->template->add_js('assets/tinymce/js/tinymce/tinymce.min.js');
				$this->template->add_js($this->load->view('js/tiny.js',null,TRUE),'embed',TRUE);
				$data['action_btn']=$this->load->view('action_btn',null,TRUE);
				$data['web_categories']=$this->Web->get_category_all();
				$data['action']=base_url('web/put_article/'.$id);
				$data['edit_item']=$this->Web->get_article_by_id($id);			
				$data['content']=array('title'=>"แก้ไข",
															'color'=>'success',
															'toolbar'=>'',
															'detail'=>$this->load->view('frm_articles',$data,TRUE));
				$this->template->write_view('content','contents',$data);
			break;			
		
			default:
				{
					$this->load_jquery_dtable();
					$articles['web_articles']=$this->Web->get_articles_all();
					$data['content']=array('title'=>"บทความทั้งหมด",
														'color'=>'info',
														'toolbar'=>$this->load->view('toolsbar',null,TRUE),
														'detail'=>$this->load->view('articles',$articles,TRUE));
					$this->template->write_view('content','contents',$data);
				}
			
			}
		$this->template->render();
	}
	function post_category()
	{
		if($this->Web->post_category()) redirect(base_url('web/categories'));
		else show_error('ไม่สามารถบันทึกได้');
	}
	function put_category($id)
	{
		if($this->Web->put_category($id)) redirect(base_url('web/categories'));
		else show_error('ไม่สามารถบันทึกได้');	
	}
	function delete_category($id)
	{
		if($this->Web->delete_category($id)) redirect(base_url('web/categories'));
		else show_error('ไม่สามารถลบได้ เนื่องจากมีรายการบทความอยู่');		
	}
	function post_article()
	{
		if($this->Web->post_article()) redirect(base_url('web/articles/view/'.$this->Web->insert_id));
		else show_error('ไม่สามารถบันทึกได้');
	}
	function put_article($id)
	{
		if($this->Web->put_article($id)) redirect(base_url('web/articles/view/'.$id));
		else show_error('ไม่สามารถบันทึกได้');		
	}
	function delete_article($id)
	{
		if($this->Web->delete_article($id)) redirect(base_url('web/articles'));
		else show_error('ไม่สามารถลบได้');	
	}
	function load_jquery_dtable()
	{
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->add_js($this->load->view('js/datables.js',null,TRUE),'embed',TRUE);
	}
}