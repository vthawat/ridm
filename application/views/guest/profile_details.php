		<?php $this->load->helper('trader/trader_profile');?>
		<?php if(!empty($trader)):?>
		 <div class="col-md-3">
			<div class="box box-default">
				<?php 
						if(empty($trader->images_logo)) $image_logo=base_url('images/trader/null-logo.png');
							else $image_logo=base_url('images/trader/'.$trader->images_logo);
						if(empty($trader->images_about)) $image_about=base_url('images/trader/null-about.png');
							else $image_about=base_url('images/trader/'.$trader->images_about);
						?>
				<div class="box-body">
					<h4 class="text-primary"><i class="fa fa-photo fa-fw"></i>ภาพโลโก้</h4>
					<div id="img-light-box-logo">
						<a href="<?=$image_logo?>">
							<img class="img-responsive img-thumbnail" src="<?=$image_logo?>">
						</a>
					</div>

				</div>
				<div class="box-footer">
					<h4 class="text-primary"><i class="fa fa-photo fa-fw"></i>ภาพเกี่ยวกับสถานประกอบการ</h4>
					<div id="img-light-box-about">
						<a href="<?=$image_about?>">
							<img class="img-responsive img-thumbnail" src="<?=$image_about?>">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
					<div class="box box-default">
						<div class="box-header">
							<h4><i class="fa fa-fw fa-calendar"></i>Create date <?=$trader->create_date?> / <i class="fa fa-fw fa-calendar"></i>Last update <?=$trader->last_up_date?> / Status <?=published($trader->published)?></h4>
						</div>
						<div class="box-body">
							<div class="col-md-6 col-sm-6">

								<address>ที่อยู่ <?php if(!empty($trader->address)):?>
										<?=$trader->address?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?></address>
								<address>แขวง/ตำบล 
									<?php if(!empty($this->country_district->get_by_id($trader->district_id)->DISTRICT_NAME)):?> 
									<?=$this->country_district->get_by_id($trader->district_id)->DISTRICT_NAME?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address>เขต/อำเภอ 
									<?php if(!empty($this->country_amphur->get_by_id($trader->amphur_id)->AMPHUR_NAME)):?> 
									<?=$this->country_amphur->get_by_id($trader->amphur_id)->AMPHUR_NAME?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address>จังหวัด 
									<?php if(!empty($this->country_province->get_by_id($trader->province_id)->PROVINCE_NAME)):?> 
									<?=$this->country_province->get_by_id($trader->province_id)->PROVINCE_NAME?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address>รหัสไปรษณีย์ 
									<?php if(!empty($this->country_district->get_zipcode($trader->district_id)->ZIPCODE)):?> 
									<?=$this->country_district->get_zipcode($trader->district_id)->ZIPCODE?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>

							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<address><i class="fa fa-user fa-fw"></i>ชื่อผู้ติดต่อ 
									<?php if(!empty($trader->contact_name)):?>
										<?=$trader->contact_name?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address><i class="fa fa-phone fa-fw"></i>โทรศัพท์
									<?php if(!empty($trader->contact_telephone)):?>
										<?=$trader->contact_telephone?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>
								<address><i class="fa fa-fax fa-fw"></i>โทรสาร
									<?php if(!empty($trader->fax)):?>
										<?=$trader->fax?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>								
								<address><i class="fa fa-link fa-fw"></i>เว็บไซต์
									<?php if(!empty($trader->website)):?>
										<a href="<?=$trader->website?>" target="_blank"><?=$trader->website?></a>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>
								<address><i class="fa fa-envelope fa-fw"></i>อีเมล
									<?php if(!empty($trader->contact_email)):?>
										<?=$trader->contact_email?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>									
							</div>
						</div>
						<div class="box-footer"><h4 class="text-primary"><i class="fa fa-cog fa-fw"></i>ข้อมูลเกี่ยวกับการผลิต</h4>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<address>กำลังการผลิต 
									<?php if(!empty($trader->capacity)):?>
										<?=$trader->capacity?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address>เทคโนโลยีการผลิต 
									<?php if(!empty($trader->manufacturing_technology)):?>
										<?=$trader->manufacturing_technology?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address>มาตารฐานที่ได้รับ
									<?php if(!empty($trader->get_standard)):?>
										<?=$trader->get_standard?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
							   </address>
								
							</div>
							<div class="col-md-6 col-sm-6">
								<address>วัตุดิบหลัก 
									<?php if(!empty($trader->raw_material)):?>
										<?=$trader->raw_material?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address>ทุนการจดทะเบียน 
									<?php if(!empty($trader->capital_registration)):?>
										<?=$trader->capital_registration?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address>ข้อมูลอ้างอิง 
									<?php if(!empty($trader->reference_data)):?>
										<?=$trader->reference_data?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
							</div>
						</div>
						<div class="box-footer"><h4 class="text-primary"><i class="fa fa-paper-plane fa-fw"></i>ผลิตภัณฑ์ทั้งหมด</h4>
							<?php $productions=$trader_production_items->get_by_trader_id($trader->id);
								if(!empty($productions)): foreach($productions as $product_item):?>
									<div class="col-md-2 col-sm-3 col-xs-3">
									<a class="img-light-product" href="<?php if(empty($product_item->images)):?><?=base_url('images/productions/null-photo.png')?><?php else:?><?=base_url('images/productions/'.$product_item->images)?><?php endif;?>">
									      <img class="img-thumbnail product-img" src="<?php if(empty($product_item->images)):?><?=base_url('images/productions/null-photo.png')?><?php else:?><?=base_url('images/productions/'.$product_item->images)?><?php endif;?>">
									    </a>

									    <div class="media-body">
									      <h4 class="text-green text-center"><?=$this->base_product_item->get_by_id($product_item->product_item_id)->product_name?></h4>
									    </div>
									 </div>
								<?php endforeach?>
							<?php else:?>
							<span class="text-red">ไม่มีข้อมูล</span>
						<?php endif?>
	
						</div>
						<div class="box-footer bg-light-blue-gradient"><h4><i class="fa fa-map-marker fa-fw"></i>แผนที่ตั้ง</h4>
							<div id="gm-map"></div>
							<div id="street-view" style="width:100%; height: 400px; margin-top:10px"></div>
						</div>
					</div>
					</div>
		<?php endif;?>