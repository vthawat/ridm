<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('web/web_model','Web');
		$this->load->model('base_product_type','Product_type');
		$this->load->model('base_product_item');
		$this->load->model('trader_production_items','Productions');
		$this->load->model('trader_profile','Traders');
		$this->load->model('country_geography','Geo');
		$this->load->model('country_district');
		$this->load->model('country_amphur');
		$this->load->model('country_province');
		$this->load->library('pagination');
		
		$this->template->add_js($this->load->view('guest/js/slide-wow.js',null,TRUE),'embed',TRUE);
		$this->template->add_css($this->load->view('guest/css/slide-intro.css',null,TRUE),'embed',TRUE);
		//$this->template->write('band_name','',TRUE);
		$this->template->write('band_name','<img class="ridm-logo" src="'.base_url('images/ridm-logo.png').'">',TRUE);
		$this->template->write_view('menu','guest/menu');
		$this->template->write_view('header','guest/slide-intro');
	}

	public function index()
	{

		$this->load_jquery_dtable();
		$data['km']=$this->load->view('guest/km-category-list',array('km_category'=>$this->Web->get_category_all()),TRUE);
		$data['productions']=$this->load->view('guest/production-category',array('product_category'=>$this->Product_type->get_all()),TRUE);
		$data['trader']=$this->load->view('guest/trader-geo-list',array('geo'=>$this->Geo->get_all()),TRUE);
		//$data['inside']=$this->load->view('guest/home_block',$data,TRUE);
		$this->template->write_view('content','guest/home_block',$data);
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
	function production()
	{

					$this->template->add_js('assets/light-gallery/js/lightgallery.js');
					$this->template->add_css('assets/light-gallery/css/lightgallery.css');
					$this->template->add_js($this->load->view('guest/js/light-box.js',null,TRUE),'embed',TRUE);

					$fillter=array('trader_profile.geo_id'=>$this->input->get_post('geo_id'),
										'trader_profile.province_id'=>$this->input->get_post('province_id'),
										'trader_profile.amphur_id'=>$this->input->get_post('amphur_id'),
										'base_product_item.product_type_id'=>$this->input->get_post('product_type_id')
										);
				$data['fillter']=$fillter;

				$fillter_query_string='?geo_id='.$this->input->get_post('geo_id');
				$fillter_query_string.='&province_id='.$this->input->get_post('province_id');
				$fillter_query_string.='&amphur_id='.$this->input->get_post('amphur_id');
				$fillter_query_string.='&product_type_id='.$this->input->get_post('product_type_id');

				$limit=$this->input->get('per_page');
				$config['page_query_string'] = TRUE;
				$config['base_url'] = base_url('guest/production'.$fillter_query_string);
				$config['total_rows'] = count($this->Productions->get_group_by(array('product_item_id'),null,null,$fillter));
				$config['per_page'] = 3;
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$config['next_link']='<i class="fa fa-forward" aria-hidden="true"></i>';
				$config['prev_link']='<i class="fa fa-backward" aria-hidden="true"></i>';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="active"><a>';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config); 
				$data['pageingation']=$this->pagination->create_links();


				$data['trader']=$this->Traders;
				//$data['productions']=$this->trader_production_items->get_all();
				$data['productions']=$this->Productions->get_group_by(array('product_item_id'),$limit,$config['per_page'],$fillter);
				$data['productions_item']=$this->Productions;
				//$this->template->write('page_header',"<i class='fa fa-paper-plane fa-fw'></i>ข้อมูลผลิตภัณฑ์");
				$data['content']=array('color'=>'primary',
											'size'=>9,
											'title'=>$this->load->view('guest/nav',null,TRUE),
											'detail'=>$this->load->view('guest/product_list',$data,TRUE));
				$this->template->write_view('content','guest/contents',$data);
		
				// prepare data for fillter 
				$this->template->add_js($this->load->view('guest/js/geo_fillter.js',null,TRUE),'embed',TRUE);
				$fillter['geo_fillter']=$this->Geo->get_all();
				$fillter['product_type_fillter']=$this->Product_type->get_all();
				$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
										'size'=>3,
										'color'=>'success',
										'detail'=>$this->load->view('guest/product_fillter',$fillter,TRUE));
				$this->template->write_view('content','guest/contents',$data);	


		$this->template->render();
	}	

  function json_get_province_by_geo_id($geo_id)
	{
		$province=array();
		foreach($this->country_province->get_by_geo_id($geo_id) as $item)
		{
			array_push($province,array('province_id'=>$item->PROVINCE_ID,'province_name'=>$item->PROVINCE_NAME));
		}
		//print_r($province);
		print json_encode($province);
	}
  function json_get_amphur_by_province_id($province_id)
	{
		$amphur=array();
		foreach($this->country_amphur->get_by_province_id($province_id) as $item)
		{
			array_push($amphur,array('amphur_id'=>$item->AMPHUR_ID,'amphur_name'=>$item->AMPHUR_NAME));
		}
		//print_r($province);
		print json_encode($amphur);
	}
  function json_get_district_by_amphur_id($amphur_id)
	{
		$district=array();
		foreach($this->country_district->get_by_amphur_id($amphur_id) as $item)
		{
			array_push($district,array('district_id'=>$item->DISTRICT_ID,'district_name'=>$item->DISTRICT_NAME));
		}
		//print_r($province);
		print json_encode($district);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */