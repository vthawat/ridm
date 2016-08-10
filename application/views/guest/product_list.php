<?php $this->load->helper('trader/trader_profile');?>
		<?php if(!empty($productions)) foreach($productions as $item):?>
					<div class="box">
						<div class="box-header"><h3><span class="text-green"><i class="fa fa-fw fa-paper-plane"></i><?=$this->base_product_item->get_by_id($item->product_item_id)->product_name?></span> <i class="text-maroon fa fa-angle-double-right fw"></i>
							<span class="text-info"><?=$this->Product_type->get_by_id($this->base_product_item->get_by_id($item->product_item_id)->product_type_id)->product_type?></span></h3>
						</div>
						
							<?php $result=$productions_item->get_by_product_id($item->product_item_id,$fillter);
										foreach($result as $product):
									?>
								
									<div class="box-footer">
										<h3 class="text-blue"><i class="fa fa-fw fa-home"></i><?=$product->trader_type.$product->trader_name?></h3>
										<h4><i class="fa fa-fw fa-calendar"></i>Create date <?=$product->create_date?> / <i class="fa fa-fw fa-calendar"></i>Last update <?=$product->last_up_date?> / Status <?=published($product->published)?></h4>
									<div class="col-md-2 col-xs-4">
												<?php if(empty($product->images)):?>
														<img src="<?=base_url('images/productions/null-photo.png')?>" class="img-thumbnail">
													<?php else:?>
														<a class="img-light-product" href="<?=base_url('images/productions/'.$product->images)?>">
														<img src="<?=base_url('images/productions/'.$product->images)?>" class="img-thumbnail">
														</a>
													<?php endif?>
									</div>
								<div class="col-md-5">
								<h3 class="text-info"><?=$this->base_product_item->get_by_id($item->product_item_id)->product_name?></h3>
											<h4>คุณสมบัติเกี่ยวกับผลิตภัณฑ์</h4>
											<?php if(!empty($product->product_details)):?>
											<div class="well"><?=nl2br($product->product_details)?></div>
											<?php else:?>
											<span class="text-red">ไม่มีข้อมูล</span>	
											<?php endif;?>
										</div>									
									<div class="col-md-5">				
										<h4>ข้อมูลทางการตลาด</h4>
											<address>ราคาต่อหน่วย: 
												<?php if(!empty($product->wholesale_price)):?>
													<span class="badge"><?=$product->wholesale_price?></span> บาท
													<?php else:?>
												<span class="text-red">ไม่มีข้อมูล</span>
												<?php endif;?></address>
											<address>ราคาขายส่ง: <?php if(!empty($product->retail_price)):?>
													<span class="badge"><?=$product->retail_price?></span> บาท
													<?php else:?>
												<span class="text-red">ไม่มีข้อมูล</span>
												<?php endif;?></address>
									</div>
									<div class="pull-right">
									<a href="<?=base_url('trader/profile/view/'.$product->trader_profile_id)?>" class="btn icon-btn btn-info"><span class="btn-glyphicon fa fa-search-plus img-circle text-info"></span>รายละเอียด</a>
									</div>
									<div class="clearfix"></div>
									</div>
										
									<?php endforeach?> 
				</div>
		<?php endforeach;?>
<?php if(!empty($pageingation)):?>
	<div class="text-center"><nav><ul class="pagination pagination-lg"><?=$pageingation?></ul></nav></div>
	<?php endif;?>