<ul class="list-group">
			<?php $this->load->helper('trader_profile');?>
		<?php $i=1;if(!empty($trader)) foreach($trader as $item):?>
	<li class="list-group-item">
		<?php 
			if(empty($item->images_logo)) $image_logo=base_url('images/trader/null-logo.png');
			else $image_logo=base_url('images/trader/'.$item->images_logo);
		?>
		<div class="col-md-2 col-sm-4"><img class="img-responsive img-thumbnail" src="<?=$image_logo?>"></div>
		<div class="col-md-6 col-sm-6">
		<h3 class="text-blue"><?=$item->trader_type?><?=$item->trader_name?></h3>

			<span>Status <?=published($item->published)?></span>
			<span>/ Create date <i class="fa fa-fw fa-calendar"></i><?=$item->create_date?></span>
			<span>/ Last update <i class="fa fa-fw fa-calendar"></i><?=$item->last_up_date?></span>		
	
		<h3>ผลิตภัณฑ์</h3>
		<ul class="list-group">
			<?php 
				$productions=$trader_production_items->get_by_trader_id($item->id);
				if(!empty($productions)): foreach($productions as $product_item):?>
					<li class="inline"><span class="text-green product-label"><?=$this->base_product_item->get_by_id($product_item->product_item_id)->product_name?></span>
						</li>
				<?php endforeach?>
				<?php else:?>
					<span class="text-red">ไม่มีข้อมูล</span>
			<?php endif?>
		</ul>
		</div>
		<div class="col-md-4 col-sm-4">
			<!-- Show address -->
			<address>ที่อยู่ <?php if(!empty($item->address)):?>
										<?=$item->address?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?></address>
			<address>แขวง/ตำบล
								<?php if(!empty($this->country_district->get_by_id($item->district_id)->DISTRICT_NAME)):?> 
									<?=$this->country_district->get_by_id($item->district_id)->DISTRICT_NAME?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
			</address>
			<address>เขต/อำเภอ 
									<?php if(!empty($this->country_amphur->get_by_id($item->amphur_id)->AMPHUR_NAME)):?> 
									<?=$this->country_amphur->get_by_id($item->amphur_id)->AMPHUR_NAME?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
				</address>			
			<address>จังหวัด 
				<?php if(!empty($this->country_province->get_by_id($item->province_id)->PROVINCE_NAME)):?> 
									<?=$this->country_province->get_by_id($item->province_id)->PROVINCE_NAME?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
			</address>
		</div>
		<span class="pull-right">
			<a href="<?=base_url('trader/profile/view/'.$item->id)?>" class="btn icon-btn btn-info"><span class="btn-glyphicon fa fa-search-plus img-circle text-info"></span>รายละเอียด</a>
			<button class="btn icon-btn btn-warning edit" onclick="javascript:location.href='<?=base_url('trader/profile/edit/'.$item->id)?>'"><span class="btn-glyphicon fa fa-edit img-circle text-warning"></span>แก้ไข</button>
			
			<!-- Single button -->
			<div class="btn-group">
			  <button type="button" class="btn icon-btn btn-primary change-staus dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="btn-glyphicon fa fa-check-circle img-circle text-info"></span>เปลี่ยนสถานะ <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			  	<?php foreach($trader_status_list as $status_item):?>
			  		<?php if($status_item->status!=3):?>
			    		<li <?php if($status_item->status==$item->published) print'class="active"'?>><a href="<?=base_url('trader/profile/change_staus/'.$item->id.'/'.$status_item->status)?>"><?=$status_item->status_name?></a></li>
					 <?php else:?>
					    <li role="separator" class="divider"></li>
					    <li <?php if($status_item->status==$item->published) print'class="active"'?>><a href="<?=base_url('trader/profile/change_staus/'.$item->id.'/'.$status_item->status)?>"><i class="fa fa-fw fa-trash"></i><?=$status_item->status_name?></a></li>
					  <?php endif?>
			    <?php endforeach;?>
			  </ul>
			</div>
		</span><div class="clearfix"></div></li>
	<?php $i++;endforeach;?>
</ul>
<?php if(!empty($pageingation)):?>
	<div class="text-center"><nav><ul class="pagination pagination-lg"><?=$pageingation?></ul></nav></div>
	<?php endif;?>