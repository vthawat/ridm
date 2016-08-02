<table class="table table-hover tb-trader">
	<tbody>
		<?php $this->load->helper('trader_profile');?>
		<?php if(!empty($trader)) foreach($trader as $item):?>
			<tr>
				<td><img src="<?=base_url('images/village.png')?>" class="img-thumbnail"></td>
				<td width="80%">
					<div class="box box-default">
						<div class="box-header"><h3><?=$item->trader_type?><?=$item->trader_name?></h3><h4 class="pull-right">Status <?=published($item->published)?></h4>
						</div>
						<div class="box-body">
							<div class="col-md-6">
								<?php 
									 $location=$trader_locate->get_by_id($item->trader_location_id);
								?>
								<?php if(!empty($location)):?>
								<address>เลขที่ <?=$location->address?></address>
								<address>แขวง/ตำบล <?=$location->DISTRICT_NAME?></address>
								<address>เขต/อำเภอ <?=$location->AMPHUR_NAME?></address>
								<address>จังหวัด <?=$location->PROVINCE_NAME?></address>
								<address>รหัสไปรษณีย์ <?=$location->ZIPCODE?></address>
								<?php else:?>
								<address>ที่อยู่</address>
								<address class="text-red">ไม่มีข้อมูล</address>
								<?php endif;?>
							</div>
							<div class="col-md-6">
								<address><i class="fa fa-user fa-fw"></i>ชื่อผู้ติดต่อ 
									<?php if(!empty($item->contact_name)):?>
										<?=$item->contact_name?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>
								</address>
								<address><i class="fa fa-phone fa-fw"></i>โทรศัพท์
									<?php if(!empty($item->telephone)):?>
										<?=$item->telephone?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>
								<address><i class="fa fa-fax fa-fw"></i>โทรสาร
									<?php if(!empty($item->fax)):?>
										<?=$item->fax?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>								
								<address><i class="fa fa-link fa-fw"></i>เว็บไซต์
									<?php if(!empty($item->website)):?>
										<?=$item->website?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>
								<address><i class="fa fa-envelope fa-fw"></i>อีเมล
									<?php if(!empty($item->contact_email)):?>
										<?=$item->contact_email?>
										<?php else:?>
									<span class="text-red">ไม่มีข้อมูล</span>
									<?php endif;?>								
								</address>									
							</div>
						</div>
						<div class="box-footer"><h4>เกี่ยวกับการผลิต</h4>
							<address>กำลังการผลิต</address>
								<address>เทคโนโลยีการผลิต</address>
								<address>วัตุดิบ</address>
						</div>
						<div class="box-footer"><h4>ผลิตภัณฑ์ :</h4></div>
						<div class="box-footer"><div class="footer-bar pull-right">
							
								<button class="btn icon-btn btn-warning edit"><span class="btn-glyphicon fa fa-edit img-circle text-warning"></span>แก้ไข</button>
								<button class="btn icon-btn btn-info pin"><span class="btn-glyphicon fa fa-map-marker img-circle text-info"></span>แผนที่ตั้ง</button>
								<button class="btn icon-btn btn-danger delete"><span class="btn-glyphicon fa fa-remove img-circle text-danger"></span>ลบ</button>
						</div>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>