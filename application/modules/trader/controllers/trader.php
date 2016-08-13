<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trader extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('admin');
		$this->load->model('init_trader');
		$this->load->library('pagination');
		$get_sidebar=$this->load->controller('sidebar/get_sidebar',array(),FALSE);
		$this->template->write('sidebar',$get_sidebar);
	}
	
	function index()
	{
		$this->template->render();
	}
	
	function profile($action=null,$id=null,$status=null)
	{
		$this->load->model('country_district');
		$this->load->model('country_amphur');
		$this->load->model('country_province');
		
		
		switch($action)
		{
			case 'delete':
				$this->trader_profile->delete($id);
				redirect(base_url('trader/profile'));
			break;
			
			case 'change_staus':

				if($this->trader_profile->set_status(array('published'=>$status),$id))
					redirect(base_url('trader/profile'));
				else redirect(base_url('trader/profile/view/'.$id));
				
				
			break;	
				
			case 'view':
					$data['trader']=$this->trader_profile->get_by_id($id);
					$this->template->add_js('assets/light-gallery/js/lightgallery.js');
					$this->template->add_css('assets/light-gallery/css/lightgallery.css');
					$this->template->add_js($this->load->view('js/light-box.js',null,TRUE),'embed',TRUE);
					$this->template->add_css($this->load->view('css/products-list.css',null,TRUE),'embed',TRUE);
									// map helpers
					$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places&language=th','link');
					//$this->template->add_js('assets/gmaps/js/locationpicker.jquery.min.js');
					$this->template->add_js('assets/gmaps/js/gmap3.min.js');
					$this->template->add_css($this->load->view('css/map.css',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/view-single-map.js',null,TRUE),'embed',TRUE);
					
					$map=json_encode(array('lat'=>$data['trader']->latitude,'lon'=>$data['trader']->longtitude));
					$images_path=json_encode(array('imgpath'=>base_url('images')));
					$json_val='var view_location='.$map.';';
					$json_val.='var images_path='.$images_path.';';
					$this->template->add_js($json_val,'embed',TRUE);
						
					
					$data['trader_production_items']=$this->trader_production_items;
					$trader_name=$data['trader']->trader_type.$data['trader']->trader_name;
					$data['content']=array('color'=>'primary',
												'size'=>9,
												'title'=>"<h3 class='text-blue'>รายละเอียด<i class='fa fa-angle-double-right fa-fw'></i>".$trader_name."</h3>",
												'toolbar'=>$this->load->view('action_btn',array('action'=>$action,'trader'=>$data['trader']),TRUE),
												'detail'=>$this->load->view('profile_details',$data,TRUE));
					$this->template->write_view('content','contents',$data);		
									// prepare data for fillter 
					
					$this->template->add_js($this->load->view('js/geo_fillter.js',null,TRUE),'embed',TRUE);
					$fillter['geo_fillter']=$this->country_geography->get_all();
					$fillter['product_type_fillter']=$this->base_product_type->get_all();
					
					$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
											'size'=>3,
											'color'=>'success',
											'detail'=>$this->load->view('profile_fillter',$fillter,TRUE));
					$this->template->write_view('content','contents',$data);
					
			break;
			case 'new':
					$this->template->add_css($this->load->view('css/tab.css',null,TRUE),'embed',TRUE);
					//$this->template->add_css('assets/plugins/iCheck/all.css');
					$this->template->add_js($this->load->view('js/geo_fillter.js',null,TRUE),'embed',TRUE);
					//$this->template->add_js('assets/bootstrap-fileinput/js/fileinput.min.js');
					//$this->template->add_js('assets/plugins/iCheck/icheck.min.js');
					//$this->template->add_js($this->load->view('js/flat_check.js',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/trader_name.js',null,TRUE),'embed',TRUE);
					//$this->template->add_js($this->load->view('js/photo_upload.js',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/new-profile.js',null,TRUE),'embed',TRUE);
					//$this->template->add_css('assets/bootstrap-fileinput/css/fileinput.min.css');
					$data['geo_fillter']=$this->country_geography->get_all();
					//$data['profile_photo']=$this->load->view('profile_photo',null,TRUE);
					$data['profile_address']=$this->load->view('profile_address',$data,TRUE);
					$data['profile_manufacturing']=$this->load->view('profile_manufacturing',$data,TRUE);
					//$data['profile_product']=$this->load->view('profile_product',array('product_items'=>$this->base_product_item->get_all()),TRUE);
					
					$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places&language=th','link');
					//$this->template->add_js('assets/gmaps/js/jquery.gomap-1.3.3.min.js');
					$this->template->add_js('assets/gmaps/js/locationpicker.jquery.min.js');
					//$this->template->add_js('assets/gmaps/js/gmap3.min.js');
					$this->template->add_css($this->load->view('css/map.css',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/place-search.js',null,TRUE),'embed',TRUE);

					//$config['center'] = 'auto';
					//$data['map'] = $this->googlemaps->create_map();
					$data['profile_map']=$this->load->view('profile_map',null,TRUE);

					$data['content']=array('color'=>'success',
												'title'=>"<h3><i class='fa fa-pencil fa-fw'></i>เพิ่มใหม่<i class='fa fa-angle-double-right fa-fw'></i><span class='new-trader-name text-red'></span></h3>",
												'toolbar'=>$this->load->view('action_btn',array('action'=>$action),TRUE),
												'detail'=>$this->load->view('profile_new',$data,TRUE));
					$this->template->write_view('content','contents',$data);					
			break;
			case 'edit':

					// profile helpers
					$this->template->add_css('assets/plugins/iCheck/all.css');
					$this->template->add_js($this->load->view('js/geo_fillter.js',null,TRUE),'embed',TRUE);
					$this->template->add_js('assets/bootstrap-fileinput/js/fileinput.min.js');
					$this->template->add_css('assets/bootstrap-fileinput/css/fileinput.min.css');
					$add_on_json=json_encode(array('id'=>$id,'app_url'=>base_url(),'trader_img_path'=>base_url('images/trader'),'product_img_path'=>base_url('images/productions')));
					$json_val='var traders='.$add_on_json;
					$this->template->add_js($json_val,'embed',TRUE);
					$this->template->add_js($this->load->view('js/photo_upload.js',null,TRUE),'embed',TRUE);
					$this->template->add_js('assets/plugins/iCheck/icheck.min.js');
					$this->template->add_js($this->load->view('js/flat_check.js',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/trader_name.js',null,TRUE),'embed',TRUE);
					$this->template->add_css($this->load->view('css/tab.css',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/update-profile.js',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/products.js',null,TRUE),'embed',TRUE);
					
					// map helpers
					$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places&language=th','link');
					$this->template->add_js('assets/gmaps/js/locationpicker.jquery.min.js');
					$this->template->add_css($this->load->view('css/map.css',null,TRUE),'embed',TRUE);
					$this->template->add_js($this->load->view('js/place-search.js',null,TRUE),'embed',TRUE);
					
					// set show trader profile default images
					$data['trader']=$this->trader_profile->get_by_id($id);
					$set_show_images=array('images_logo'=>'null-logo.png','images_about'=>'null-about.png');
					if(!empty($data['trader']->images_logo)) $set_show_images['images_logo']=$data['trader']->images_logo;
					if(!empty($data['trader']->images_about)) $set_show_images['images_about']=$data['trader']->images_about;
					$json_val='var trader_images='.json_encode($set_show_images);
					$this->template->add_js($json_val,'embed',TRUE);
					// set load product to edit
					$json_val='var product_list='.$this->get_production_list($id);
					$this->template->add_js($json_val,'embed',TRUE);
					
					
					$trader_name=$data['trader']->trader_type.$data['trader']->trader_name;
					$data['product_items']=$this->base_product_item->get_all();
					$data['products']=$this->trader_production_items;
					//$data['productions_list']=$this->get_production_list($id);
					$data['profile_product']=$this->load->view('profile_product',$data,TRUE);
					$data['profile_address']=$this->load->view('profile_address',$data,TRUE);
					$data['profile_manufacturing']=$this->load->view('profile_manufacturing',$data,TRUE);
					$data['profile_map']=$this->load->view('profile_map',null,TRUE);
					$data['profile_photo']=$this->load->view('profile_photo',null,TRUE);
					
					
					$data['content']=array('color'=>'warning',
												'title'=>"<h3 class='text-blue'><i class='fa fa-pencil fa-fw'></i>แก้ไข<i class='fa fa-angle-double-right fa-fw'></i><span class='new-trader-name text-red'>".$trader_name."</span></h3>",
												'toolbar'=>$this->load->view('action_btn',array('action'=>$action),TRUE),
												'detail'=>$this->load->view('profile_edit',$data,TRUE));
					$this->template->write_view('content','contents',$data);					
			break;
			case 'fillter':
				
				$fillter=array('geo_id'=>$this->input->get_post('geo_id'),
										'province_id'=>$this->input->get_post('province_id'),
										'amphur_id'=>$this->input->get_post('amphur_id'),
										'published'=>$this->input->get_post('published')
										);

				$fillter_query_string='?geo_id='.$this->input->get_post('geo_id');
				$fillter_query_string.='&province_id='.$this->input->get_post('province_id');
				$fillter_query_string.='&amphur_id='.$this->input->get_post('amphur_id');
				$fillter_query_string.='&published='.$this->input->get_post('published');
				
				$limit=$this->input->get('per_page');
				$config['page_query_string'] = TRUE;
				$config['base_url'] = base_url('trader/profile/fillter'.$fillter_query_string);
				$config['total_rows'] = count($this->trader_profile->get_all(null,null,$fillter));
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
				$data['trader']=$this->trader_profile->get_all($limit,$config['per_page'],$fillter);
				$data['trader_status_list']=$this->trader_profile->get_status_all();
				$data['trader_production_items']=$this->trader_production_items;
				$data['product_list']=$this->load->view('production_list_name',$data,TRUE);
				$this->template->add_css($this->load->view('css/products-list.css',null,TRUE),'embed',TRUE);
			
				$data['content']=array('color'=>'primary',
											'size'=>9,
											'title'=>'<h3>จำนวนทั้งหมด '.$config['total_rows'].' รายการ</h3>',
											'toolbar'=>$this->load->view('toolsbar',null,TRUE),
											'detail'=>$this->load->view('profile_list_items',$data,TRUE));;
				$this->template->write_view('content','contents',$data);
						
							// prepare data for fillter 
				$this->template->add_js($this->load->view('js/geo_fillter.js',null,TRUE),'embed',TRUE);
				$fillter['geo_fillter']=$this->country_geography->get_all();
				$fillter['product_type_fillter']=$this->base_product_type->get_all();
				$fillter['status_list']=$this->trader_profile->get_status_all();
				$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
										'size'=>3,
										'color'=>'success',
										'detail'=>$this->load->view('profile_fillter',$fillter,TRUE));
				$this->template->write_view('content','contents',$data);
			break;			
			default:
		//get trader profile
		$config['base_url'] = base_url('trader/profile');
		$config['total_rows'] = count($this->trader_profile->get_all());
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
		$limit=$action;
		$data['trader']=$this->trader_profile->get_all($limit,$config['per_page']);
		$data['trader_status_list']=$this->trader_profile->get_status_all();
		$data['trader_production_items']=$this->trader_production_items;
		$data['product_list']=$this->load->view('production_list_name',$data,TRUE);
		$this->template->add_css($this->load->view('css/products-list.css',null,TRUE),'embed',TRUE);
	
		$data['content']=array('color'=>'primary',
									'size'=>9,
									'title'=>'<h3>จำนวนทั้งหมด '.$config['total_rows'].' รายการ</h3>',
									'toolbar'=>$this->load->view('toolsbar',null,TRUE),
									'detail'=>$this->load->view('profile_list_items',$data,TRUE));;
		$this->template->write_view('content','contents',$data);

		// prepare data for fillter 
		$this->template->add_js($this->load->view('js/geo_fillter.js',null,TRUE),'embed',TRUE);
		$fillter['status_list']=$this->trader_profile->get_status_all();
		$fillter['geo_fillter']=$this->country_geography->get_all();
		$fillter['product_type_fillter']=$this->base_product_type->get_all();
		$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
								'size'=>3,
								'color'=>'success',
								'detail'=>$this->load->view('profile_fillter',$fillter,TRUE));
		$this->template->write_view('content','contents',$data);
		}
		$this->template->write('page_header',"<i class='fa fa-th-list fa-fw'></i>ข้อมูลผู้ประกอบการ");
		$this->template->render();
	}
	function get_production_list($trader_id)
	{
		$product_id=array();
		$product_list=$this->trader_production_items->get_by_trader_id($trader_id);

		foreach ($product_list as $item) 
			array_push($product_id,array('product_id'=>$item->product_item_id));
		return json_encode($product_id);
	

	}
  function production($action=null,$trader_id=null)
	{
		$this->load->model('country_district');
		$this->load->model('country_amphur');
		$this->load->model('country_province');
		switch($action)
		{
			
			case 'post':
			$data=array();
			foreach($this->input->post('product_item_id') as $key =>$product_item_id)
				{
					$data['product_item_id']=$product_item_id;
					$data['trader_profile_id']=$trader_id;
					$data['retail_price']=$this->input->post('retail_price')[$key];
					$data['wholesale_price']=$this->input->post('wholesale_price')[$key];
					$data['product_details']=$this->input->post('product_details')[$key];
					$this->trader_production_items->post($data);
					
				}
			redirect(base_url('trader/profile/view/'.$trader_id));	
			
			break;
			case 'fillter':
					$this->template->add_js('assets/light-gallery/js/lightgallery.js');
					$this->template->add_css('assets/light-gallery/css/lightgallery.css');
					$this->template->add_js($this->load->view('js/light-box.js',null,TRUE),'embed',TRUE);

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
				$config['base_url'] = base_url('trader/production/fillter'.$fillter_query_string);
				$config['total_rows'] = count($this->trader_production_items->get_group_by(array('product_item_id'),null,null,$fillter));
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


				$data['trader']=$this->trader_profile;
				//$data['productions']=$this->trader_production_items->get_all();
				$data['productions']=$this->trader_production_items->get_group_by(array('product_item_id'),$limit,$config['per_page'],$fillter);
				$data['productions_item']=$this->trader_production_items;
				$this->template->write('page_header',"<i class='fa fa-paper-plane fa-fw'></i>ข้อมูลผลิตภัณฑ์");
				$data['content']=array('color'=>'primary',
											'size'=>9,
											//'toolbar'=>$this->load->view('toolsbar',null,TRUE),
											'detail'=>$this->load->view('product_list',$data,TRUE));
				$this->template->write_view('content','contents',$data);
		
				// prepare data for fillter 
				$this->template->add_js($this->load->view('js/geo_fillter.js',null,TRUE),'embed',TRUE);
				$fillter['geo_fillter']=$this->country_geography->get_all();
				$fillter['product_type_fillter']=$this->base_product_type->get_all();
				$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
										'size'=>3,
										'color'=>'success',
										'detail'=>$this->load->view('product_fillter',$fillter,TRUE));
				$this->template->write_view('content','contents',$data);	

			break;

			default:
					$this->template->add_js('assets/light-gallery/js/lightgallery.js');
					$this->template->add_css('assets/light-gallery/css/lightgallery.css');
					$this->template->add_js($this->load->view('js/light-box.js',null,TRUE),'embed',TRUE);

				$data['fillter']=null;
				$limit=$this->input->get('per_page');
				$config['page_query_string'] = TRUE;
				$config['base_url'] = base_url('trader/production?');
				$config['total_rows'] = count($this->trader_production_items->get_group_by(array('product_item_id')));
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


				$data['trader']=$this->trader_profile;
				//$data['productions']=$this->trader_production_items->get_all();
				$data['productions']=$this->trader_production_items->get_group_by(array('product_item_id'),$limit,$config['per_page']);
				$data['productions_item']=$this->trader_production_items;
				$this->template->write('page_header',"<i class='fa fa-paper-plane fa-fw'></i>ข้อมูลผลิตภัณฑ์");
				$data['content']=array('color'=>'primary',
											'size'=>9,
											//'toolbar'=>$this->load->view('toolsbar',null,TRUE),
											'detail'=>$this->load->view('product_list',$data,TRUE));
				$this->template->write_view('content','contents',$data);
		
				// prepare data for fillter 
				$this->template->add_js($this->load->view('js/geo_fillter.js',null,TRUE),'embed',TRUE);
				$fillter['geo_fillter']=$this->country_geography->get_all();
				$fillter['product_type_fillter']=$this->base_product_type->get_all();
				$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
										'size'=>3,
										'color'=>'success',
										'detail'=>$this->load->view('product_fillter',$fillter,TRUE));
				$this->template->write_view('content','contents',$data);		
				
				
	
		}
		$this->template->render();
	}
 function post()
 {
 	// add new trader profile
 	//
 	$res=$this->trader_profile->post($this->input->post());
 	if($res!=FALSE) redirect(base_url('trader/profile/edit/'.$res));
	else  redirect(base_url('trader/profile/new'));
 	//print_r($this->input->post());
 }

 function put($id)
 {
 	$data=$this->input->post();
	unset($data['images_logo']);
	unset($data['images_about']);
 	if($this->trader_profile->put($data,$id)) redirect(base_url('trader/profile/view/'.$id));
	else  redirect(base_url('trader/profile/edit/'.$id));

 }
 function gis()
	{
		$this->load->model('country_district');
		$this->load->model('country_amphur');
		$this->load->model('country_province');
		//$this->template->write('page_header',"<i class='fa fa-map-marker fa-fw'></i>GIS");
						$fillter=array('geo_id'=>$this->input->get_post('geo_id'),
											'province_id'=>$this->input->get_post('province_id'),
											'amphur_id'=>$this->input->get_post('amphur_id'),
											'published'=>'2'
											);
					
					$fillter_query_string='?geo_id='.$this->input->get_post('geo_id');
					$fillter_query_string.='&province_id='.$this->input->get_post('province_id');
					$fillter_query_string.='&amphur_id='.$this->input->get_post('amphur_id');
					
					$data['gis_data']=$this->trader_profile->get_all(null,null,$fillter);
					
					if(!empty($data['gis_data']))
					{
						$map_icon=json_encode(array('icon'=>base_url('images/trader-pin.png')));
						$trader_detail_path=json_encode(array('path'=>base_url('guest/trader/ajax/')));
						$json_gis_data=$this->gis_trader_json($this->trader_profile->get_all(null,null,$fillter));
						$json_val='var trader_gis='.$json_gis_data.';';
						$json_val.='var map_icon='.$map_icon.';';
						$json_val.='var trader_detail_path='.$trader_detail_path.';';
						$this->template->add_js($json_val,'embed',TRUE);
							// map helpers
						$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places&language=th','link');
						$this->template->add_js('assets/gmaps/js/gmap3.min.js');
						$this->template->add_css($this->load->view('guest/css/map.css',null,TRUE),'embed',TRUE);
						$this->template->add_js($this->load->view('guest/js/view-big-map.js',null,TRUE),'embed',TRUE);
					}
					// gis map
					$data['content']=array('title'=>$this->load->view('guest/nav',null,TRUE)."<i class='fa fa-map-marker fa-fw'></i>GIS View",
											'size'=>9,
											'toolbar'=>'<a href="'.base_url('trader/profile/fillter'.$fillter_query_string).'" class="icon-btn btn btn-warning"><span class="btn-glyphicon fa fa-th-list img-circle text-warning"></span>List View</a>',
											'color'=>'primary',
											'detail'=>$this->load->view('guest/trader-gis',$data,TRUE));
					$this->template->write_view('content','guest/contents',$data);


					// prepare data for fillter 
					$this->template->add_js($this->load->view('guest/js/geo_fillter.js',null,TRUE),'embed',TRUE);
					$fillter['geo_fillter']=$this->country_geography->get_all();
					$fillter['product_type_fillter']=$this->base_product_type->get_all();
					$fillter['country_province']=$this->country_province;
					$fillter['country_geography']=$this->country_geography;
					$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
											'size'=>3,
											'color'=>'success',
											'detail'=>$this->load->view('guest/profile_fillter_gis',$fillter,TRUE));
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
 function logistic()
	{
		$this->load->model('country_district');
		$this->load->model('country_amphur');
		$this->load->model('country_province');
		//$this->template->write('page_header',"<i class='fa fa-map-marker fa-fw'></i>GIS");
						$fillter=array('geo_id'=>$this->input->get_post('geo_id'),
											'province_id'=>$this->input->get_post('province_id'),
											'amphur_id'=>$this->input->get_post('amphur_id'),
											'published'=>'2'
											);
					
					$fillter_query_string='?geo_id='.$this->input->get_post('geo_id');
					$fillter_query_string.='&province_id='.$this->input->get_post('province_id');
					$fillter_query_string.='&amphur_id='.$this->input->get_post('amphur_id');
					
					$data['gis_data']=$this->trader_profile->get_all(null,null,$fillter);
					
					if(!empty($data['gis_data']))
					{
						$map_icon=json_encode(array('icon'=>base_url('images/trader-pin.png')));
						$trader_detail_path=json_encode(array('path'=>base_url('guest/trader/ajax/')));
						$json_gis_data=$this->gis_trader_json($this->trader_profile->get_all(null,null,$fillter));
						$json_val='var trader_gis='.$json_gis_data.';';
						$json_val.='var map_icon='.$map_icon.';';
						$json_val.='var trader_detail_path='.$trader_detail_path.';';
						$this->template->add_js($json_val,'embed',TRUE);
							// map helpers
						$this->template->add_js('https://maps.google.com/maps/api/js?key=AIzaSyBGE-KGQB9PP6uq4wErMO0Xbxmz4FWxy3Q&libraries=places&language=th','link');
						$this->template->add_js('assets/gmaps/js/gmap3.min.js');
						$this->template->add_css($this->load->view('css/map.css',null,TRUE),'embed',TRUE);
						$this->template->add_js($this->load->view('js/map-logistic.js',null,TRUE),'embed',TRUE);
					}

						$data['content']=array('title'=>'<i class="fa fa-truck fa-fw"></i>Logistic',
											'size'=>9,
											'color'=>'success',
											'detail'=>$this->load->view('map-logistic',$data,TRUE));
					$this->template->write_view('content','guest/contents',$data);
										// prepare data for fillter 
					$this->template->add_js($this->load->view('guest/js/geo_fillter.js',null,TRUE),'embed',TRUE);
					$fillter['geo_fillter']=$this->country_geography->get_all();
					$fillter['product_type_fillter']=$this->base_product_type->get_all();
					$fillter['country_province']=$this->country_province;
					$fillter['country_geography']=$this->country_geography;
					$data['content']=array('title'=>"<i class='fa fa-filter fa-fw'></i>ตัวกรองข้อมูล",
											'size'=>3,
											'color'=>'success',
											'detail'=>$this->load->view('guest/profile_fillter_gis',$fillter,TRUE));
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
 function ajax_upload_photo($images_type=null,$trader_id=null)	
 {
 		$CI =& get_instance();
		$CI->load->helper('path');
 		$CI->load->model('trader_profile');
		 	if($trader_id!=null)
			{
			 	$x = explode('.', $_FILES[$images_type]['name']);
				$ext_name='.'.end($x);	
				  if($images_type=='images_logo') $file_name='trader-logo-'.$trader_id.$ext_name;
				  if($images_type=='images_about') $file_name='trader-about-'.$trader_id.$ext_name;
			// upload physical data
		
			if(@move_uploaded_file($_FILES[$images_type]['tmp_name'], set_realpath('images/trader').$file_name)) print 1;
			else print 'error';
			// update in database
			$data=array($images_type=>$file_name);
			$CI->trader_profile->put($data,$trader_id);
			}

 }
 function ajax_upload_product($trader_id=null,$product_id=null)
 {
 	 	$CI =& get_instance();
		$CI->load->helper('path');
 		$CI->load->model('trader_production_items');
 	if($trader_id!=null&&$product_id!=null)
	{
		$input_name='product_images_id_'.$product_id;
		$x = explode('.', $_FILES[$input_name]['name']);
				$ext_name='.'.end($x);	
				$file_name='product-'.$trader_id.'-'.$product_id.$ext_name;

			// upload physical data
		
			if(@move_uploaded_file($_FILES[$input_name]['tmp_name'], set_realpath('images/productions').$file_name)) print 1;
			else print 'error';
			// update in database
			$data=array('product_item_id'=>$product_id,'trader_profile_id'=>$trader_id,'images'=>$file_name);
			$CI->trader_production_items->post($data);
	}
 	
 }
 function ajax_get_form_product($trader_id,$product_id)
 {
 		$CI =& get_instance();
 		$CI->load->model('trader_production_items');
	$product_item=$CI->trader_production_items->get_by_trader_id_and_product_id($trader_id,$product_id);
	if(empty($product_item->images)) $product_images='null-photo.png';
	else $product_images=$product_item->images;
	
 	$product=$this->base_product_item->get_by_id($product_id);
	
 	$data=array('product_id'=>$product_id,
 				'product_name'=>$product->product_name,
 				'product_images'=>$product_images,
				'product_item'=>$product_item);
	
	print $this->load->view('product_form_item',$data,TRUE);
 }
 function ajax_is_exist_product($trader_id,$product_id)
 {
 	$is_exits=0;
		$CI =& get_instance();
 		$CI->load->model('trader_production_items');
		$product_item=$CI->trader_production_items->get_by_trader_id_and_product_id($trader_id,$product_id);
	if(!empty($product_item->id)) $is_exits=$product_item->id;
	//else $product_images=$product_item->images;
	print $is_exits;
 	
 }
 function ajax_product_delete($product_id)
	{
		$CI =& get_instance();
 		$CI->load->model('trader_production_items');
		if($CI->trader_production_items->delete($product_id)) print 1;
		else print 0;
	}

}