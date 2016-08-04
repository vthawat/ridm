<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('web/web_model','Web');
		$this->template->add_js($this->load->view('guest/js/slide-wow.js',null,TRUE),'embed',TRUE);
		$this->template->add_css($this->load->view('guest/css/slide-intro.css',null,TRUE),'embed',TRUE);
		//$this->template->write('band_name','',TRUE);
		$this->template->write('band_name','<img class="ridm-logo" src="'.base_url('images/ridm-logo.png').'">',TRUE);
		$this->template->write_view('header','guest/slide-intro');
	}

	public function index()
	{

		$this->load_jquery_dtable();
		$data['km']=$this->load->view('guest/km-category-list',array('km_category'=>$this->Web->get_category_all()),TRUE);
		$data['inside']=$this->load->view('guest/home_block',$data,TRUE);
		$this->template->write_view('content','guest/content',$data);
		$this->template->render();
	}
	function km($action=null,$id=null)
	{
		$data['inside']=$this->load->view('guest/nav',null,TRUE);
		$this->template->write_view('content','guest/content',$data);
		switch ($action) {
			case 'category':
				$data['category_all']=$this->Web->get_category_all();
				$by_array=array('web_contents.cat_id'=>$id);
				$data['category']=$this->Web->get_articles_by($by_array);
				$data['inside']=$this->load->view('guest/km-category',$data,TRUE);
				$this->template->write_view('content','guest/content',$data);
				break;
			case 'article':
				$data['category_all']=$this->Web->get_category_all();
				$data['article']=$this->Web->get_article_by_id($id);
				$data['inside']=$this->load->view('guest/km-article',$data,TRUE);
				$this->template->write_view('content','guest/content',$data);

				break;
			default:
				# code...
				break;
		}
		$this->template->render();
	}
	function load_jquery_dtable()
	{
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->add_js($this->load->view('guest/js/datables.js',null,TRUE),'embed',TRUE);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */