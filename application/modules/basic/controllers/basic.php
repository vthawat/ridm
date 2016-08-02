<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('admin');
		$this->load->model('init_basic');
		$this->load->model('basic_adaptor','Basic');
		$get_sidebar=$this->load->controller('sidebar/get_sidebar',array(),FALSE);
		$this->template->write('sidebar',$get_sidebar);	
	
	}
	function index()
	{
		$this->template->render();
	}

	function base_product_item($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function base_product_type($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function base_research_type($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function base_research_topic($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}	
	function province($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function amphur($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}
	function district($action=null,$id=null)
	{
		$item=$this->router->fetch_method();
		$this->load_basic($item,$action,$id);
	}	
	function load_basic($item=null,$action=null,$id=null)
	{
				
		if(empty($action))
		{
			$this->load_jquery_dtable();		
			$data['basic_item']=$item;
			$data['Basic_info']=$this->Basic->get($item);
			$data['content']=array('title'=>$data['Basic_info']['desc'],
									'color'=>'primary',
									'toolbar'=>$this->load->view('toolsbar',$data,TRUE),
									'detail'=>$data['Basic_info']['view']);
			$this->template->write('page_header','ข้อมูลพื้นฐาน');
			$this->template->write_view('content','contents',$data);	
		}
		else 
		{
				$desc=$this->{$item}->desc;
				$action_array=array('new','edit');
				if(in_array($action, $action_array))
				{

					$this->template->write('page_header','ข้อมูลพื้นฐาน <i class="fa fa-angle-double-right"></i> '.$desc);
					$getForm=$this->get_form($item,$action,$id);
					$data['content']=array('title'=>$getForm['title'],'detail'=>$getForm['detail']);
					$this->template->write_view('content','contents',$data);
				}
			
				else show_404();
				
		}
		$this->template->render();
	}

	function load_jquery_dtable()
	{
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->add_js($this->load->view('js/datables.js',null,TRUE),'embed',TRUE);
	}
	function get_form($item=null,$action=null,$id=null)
	{
		// this function get form view basic data to post and update
		$desc=$this->{$item}->desc;
		$action_array=array('new','edit');
		if(in_array($action, $action_array))
		{
			if($action=='new')
			{
				$data['action']=base_url().'basic/post/'.$item;
				$reForm['title']='เพิ่มข้อมูล';
			}
			if($action=='edit')
			{
				$data['action']=base_url().'basic/put/'.$item.'/'.$id;
				$data['edit_item']=$this->Basic->load_edit($item,$id);
				$reForm['title']='แก้ไขข้อมูล';
			}
		
		$data['action_btn']=$this->load->view('action_btn',null,TRUE);
		$reForm['detail']=$this->load->view('form_'.$item,$data,TRUE);

		return $reForm;
		}
		else show_404();
		
	}
	function post($item=null,$call_back=null)
	{
		// this function add new record in to basic data
		$this->Basic->post($item);
		if(empty($call_back)) redirect(base_url().'basic/'.$item);
		else redirect(base_url($call_back));

		
	}
	function put($item=null,$id=null,$status=null)
	{
		// this function update record in to basic data
		$result=$this->Basic->put($item,$id,$status);
		if($status==null)
		{
			if(!$result) {
			$message=array('color'=>'info',
        				'icon'=>'fa-comment-o',
        				'title'=>$desc=$this->{$item}->desc,
        				'details'=>'ข้อมูลยังไม่สมบูรณ์ในช่อง*');
        	$res=$this->load->controller('message/alert',$message,FALSE);
			$this->template->write('content',$res);
			$this->load_basic($item,'new');
			}
		}
		redirect(base_url().'basic/'.$item);
				
	}
	function del($item=null,$id=null)
	{
		$result=$this->{$item}->delete($id);
		if(!$result) 
		{
			$res=$this->load->controller('message/error',array(211),FALSE);
			$call_back='<a href="'.base_url('basic/'.$item).'" class="btn btn-primary btn-lg"><i class="fa fa-fw fa-mail-reply"></i>ย้อนกลับ</a>';
			$this->template->write('content',$res.$call_back);
			$this->template->render();
			//redirect(base_url('basic/'.$item));
		}
		else redirect(base_url().'basic/'.$item);	
	}
	
}