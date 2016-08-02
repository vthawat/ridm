<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('web/web_model','Web');
		$this->template->add_js($this->load->view('guest/js/slide-wow.js',null,TRUE),'embed',TRUE);
		$this->template->add_css($this->load->view('guest/css/slide-intro.css',null,TRUE),'embed',TRUE);
		$this->template->write('band_name','',TRUE);
		//$this->template->write('band_name','<img class="ridm-logo" src="'.base_url('images/ridm-logo.png').'">',TRUE);
	}

	public function index()
	{

		
		$this->template->write_view('header','guest/slide-intro');
		//$data['km_category']=$this->Web->get_category_all();
		$data['inside']=$this->load->view('guest/home_block',null,TRUE);
		$this->template->write_view('content','guest/content',$data);
		$this->template->render();
	}
	function km($action=null)
	{
		$this->template->write_view('header','guest/header_km');
		$this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */