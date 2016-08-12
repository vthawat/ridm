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
		//$data['inside']=$this->load->view('guest/nav',null,TRUE);
		//$this->template->write_view('content','guest/nav');
		switch ($action) {
			case 'category':
				$data['category_all']=$this->Web->get_category_all();
				$by_array=array('web_contents.cat_id'=>$id);
				$data['category']=$this->Web->get_articles_by($by_array);
				//$data['inside']=$this->load->view('guest/km-category',$data,TRUE);
				//$this->template->write_view('content','guest/km-category',$data);
				$data['content']=array('color'=>'primary',
											'title'=>$this->load->view('guest/nav',null,TRUE),
											'detail'=>$this->load->view('guest/km-category',$data,TRUE));
				$this->template->write_view('content','guest/contents',$data);	
				break;
			case 'article':
				$this->Web->set_hit_view_article($id);
				$data['category_all']=$this->Web->get_category_all();
				$data['article']=$this->Web->get_article_by_id($id);
				$data['content']=array('color'=>'primary',
											'title'=>$this->load->view('guest/nav',null,TRUE),
											'detail'=>$this->load->view('guest/km-article',$data,TRUE));
				$this->template->write_view('content','guest/contents',$data);	
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
	function gis_trader_json($trader=null)
	{
		$gis=array();
		foreach ($trader as $item) {
			if($item->latitude!=0&&$item->longtitude!=0)
			{
				array_push($gis,array('position'=>array($item->latitude,$item->longtitude),
				array('content'=>array($item->id))));
			}
		}
		//exit(print_r($gis));
		return json_encode($gis);
	}
	function trader($action=null,$id=null)
	{

			switch ($action) 
			{
				case 'gis':
					$fillter_post=$this->input->post();
					if(!empty($fillter_post)) $fillter=$fillter_post;
					else
					{
						$fillter_get=array('geo_id'=>$this->input->get('geo_id'),
											'province_id'=>$this->input->get('province_id'),
											'amphur_id'=>$this->input->get('amphur_id')
											);
						$fillter=$fillter_get;
					}
					$fillter_query_string='?geo_id='.$this->input->get_post('geo_id');
					$fillter_query_string.='&province_id='.$this->input->get_post('province_id');
					$fillter_query_string.='&amphur_id='.$this->input->get_post('amphur_id');
					
					$data['gis_data']=$this->Traders->get_all(null,null,$fillter);
					
					if(!empty($data['gis_data']))
					{
						$map_icon=json_encode(array('icon'=>base_url('images/trader-pin.png')));
						$trader_detail_path=json_encode(array('path'=>base_url('guest/trader/ajax/')));
						$json_gis_data=$this->gis_trader_json($this->Traders->get_all(null,null,$fillter));
						$json_val='var trader_gis='.$json_gis_data.';';
						$json_val.='var map_icon='.$map_icon.';';
						$json_val.='var trader_detail_path='.$trader_detail_path.';';
						$this->template->add_js($json_val,'embed',TRUE);
							// map helpers
						$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places','link');
						$this->template->add_js('assets/gmaps/js/gmap3.min.js');
						$this->template->add_css($this->load->view('guest/css/map.css',null,TRUE),'embed',TRUE);
						$this->template->add_js($this->load->view('guest/js/view-big-map.js',null,TRUE),'embed',TRUE);
					}
					// gis map
					$data['content']=array('title'=>$this->load->view('guest/nav',null,TRUE)."<i class='fa fa-map-marker fa-fw'></i>GIS View",
											'size'=>9,
											'toolbar'=>'<a href="'.base_url('guest/trader'.$fillter_query_string).'" class="btn btn-default"><i class="fa fa-fw fa-th-list"></i>List View</a>',
											'color'=>'primary',
											'detail'=>$this->load->view('guest/trader-gis',$data,TRUE));
					$this->template->write_view('content','guest/contents',$data);


					// prepare data for fillter 
					$this->template->add_js($this->load->view('guest/js/geo_fillter.js',null,TRUE),'embed',TRUE);
					$fillter['geo_fillter']=$this->Geo->get_all();
					$fillter['product_type_fillter']=$this->Product_type->get_all();
					$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
											'size'=>3,
											'color'=>'success',
											'detail'=>$this->load->view('guest/profile_fillter_gis',$fillter,TRUE));
					$this->template->write_view('content','guest/contents',$data);
				break;
				case 'ajax':
					$this->template->add_js('assets/light-gallery/js/lightgallery.js');
					$this->template->add_css('assets/light-gallery/css/lightgallery.css');
					$this->template->add_js($this->load->view('guest/js/light-box.js',null,TRUE),'embed',TRUE);
					$this->template->add_css($this->load->view('guest/css/products-list.css',null,TRUE),'embed',TRUE);
					$data['trader']=$this->Traders->get_by_id($id);
					$data['trader_production_items']=$this->Productions;
					//$trader_name=$data['trader']->trader_type.$data['trader']->trader_name;
					print $this->load->view('guest/trader-modal-detail',$data,TRUE);
					exit;
				break;
				case 'view':
					$data['trader']=$this->Traders->get_by_id($id);
					$this->template->add_js('assets/light-gallery/js/lightgallery.js');
					$this->template->add_css('assets/light-gallery/css/lightgallery.css');
					$this->template->add_js($this->load->view('guest/js/light-box.js',null,TRUE),'embed',TRUE);
					$this->template->add_css($this->load->view('guest/css/products-list.css',null,TRUE),'embed',TRUE);
									// map helpers
					$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places','link');
					//$this->template->add_js('assets/gmaps/js/locationpicker.jquery.min.js');
					$this->template->add_js('assets/gmaps/js/gmap3.min.js');
					$this->template->add_css($this->load->view('guest/css/map.css',null,TRUE),'embed',TRUE);

					$this->template->add_js($this->load->view('guest/js/view-single-map.js',null,TRUE),'embed',TRUE);
					
					$map=json_encode(array('lat'=>$data['trader']->latitude,'lon'=>$data['trader']->longtitude));
					$images_path=json_encode(array('imgpath'=>base_url('images')));
					$json_val='var view_location='.$map.';';
					$json_val.='var images_path='.$images_path.';';
					$this->template->add_js($json_val,'embed',TRUE);
						
					
					$data['trader_production_items']=$this->Productions;
					$trader_name=$data['trader']->trader_type.$data['trader']->trader_name;
					$data['content']=array('color'=>'primary',
												'size'=>9,
												'title'=>$this->load->view('guest/nav',null,TRUE)."<h3 class='text-blue'>รายละเอียด<i class='fa fa-angle-double-right fa-fw'></i>".$trader_name."</h3>",
												'toolbar'=>'',
												'detail'=>$this->load->view('guest/profile_details',$data,TRUE));
					$this->template->write_view('content','guest/contents',$data);		
									// prepare data for fillter 
					
					$this->template->add_js($this->load->view('guest/js/geo_fillter.js',null,TRUE),'embed',TRUE);
					$fillter['geo_fillter']=$this->Geo->get_all();
					$fillter['product_type_fillter']=$this->Product_type->get_all();
					
					$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
											'size'=>3,
											'color'=>'success',
											'detail'=>$this->load->view('guest/profile_fillter',$fillter,TRUE));
					$this->template->write_view('content','guest/contents',$data);
					break;
				
				default:
					$fillter_post=$this->input->post();
				if(!empty($fillter_post)) $fillter=$fillter_post;
				else
				{
					$fillter_get=array('geo_id'=>$this->input->get('geo_id'),
										'province_id'=>$this->input->get('province_id'),
										'amphur_id'=>$this->input->get('amphur_id')
										);
					$fillter=$fillter_get;
				}
				$fillter_query_string='?geo_id='.$this->input->get_post('geo_id');
				$fillter_query_string.='&province_id='.$this->input->get_post('province_id');
				$fillter_query_string.='&amphur_id='.$this->input->get_post('amphur_id');
				
				$limit=$this->input->get('per_page');
				$config['page_query_string'] = TRUE;
				$config['base_url'] = base_url('guest/trader'.$fillter_query_string);
				$config['total_rows'] = count($this->Traders->get_all(null,null,$fillter));
				$config['per_page'] = 10;
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
				$data['trader']=$this->Traders->get_all($limit,$config['per_page'],$fillter);
				$data['trader_status_list']=$this->Traders->get_status_all();
				$data['trader_production_items']=$this->Productions;
				$data['product_list']=$this->load->view('guest/production_list_name',$data,TRUE);
				$this->template->add_css($this->load->view('guest/css/products-list.css',null,TRUE),'embed',TRUE);
			
				$data['content']=array('color'=>'primary',
											'size'=>9,
											'title'=>$this->load->view('guest/nav',null,TRUE).'<h3>จำนวนทั้งหมด '.$config['total_rows'].' รายการ</h3>',
											'toolbar'=>'<a href="'.base_url('guest/trader/gis'.$fillter_query_string).'" class="btn btn-default"><i class="fa fa-fw fa-map-marker"></i>GIS View</a>',
											'detail'=>$this->load->view('guest/profile_list_items',$data,TRUE));;
				$this->template->write_view('content','guest/contents',$data);
						
							// prepare data for fillter 
				$this->template->add_js($this->load->view('guest/js/geo_fillter.js',null,TRUE),'embed',TRUE);
				$fillter['geo_fillter']=$this->Geo->get_all();
				$fillter['product_type_fillter']=$this->Product_type->get_all();
				$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
										'size'=>3,
										'color'=>'success',
										'detail'=>$this->load->view('guest/profile_fillter',$fillter,TRUE));
				$this->template->write_view('content','guest/contents',$data);
					break;
			}
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