                      	<?php $this->load->helper('trader_profile');?>
                      	<h3 class="page-header text-success">ที่อยู่</h3>	
							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="trader_type">ประเภท</label>
							  <div class="col-md-2">
							    <select id="trader_type" name="trader_type" class="form-control">
							      <?php if(empty($trader)):?>
							      	<?=trader_type()?>
							      <?php else:?>
							      	<?=trader_type($trader->trader_type)?>
							      <?php endif;?>
							    </select>
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="trader_name">ชื่อบริษัท/โรงงาน*</label>  
							  <div class="col-md-7">
							  	<div class="">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->trader_name?>"<?php endif?> id="trader_name" name="trader_name" type="text" placeholder="ชื่อบริษัท/โรงงาน" class="form-control input-md" required>
							  <span class="help-block">ไม่ต้องใส่"บริษัท หรือ โรงงาน" นำหน้า</span>
							  </div>  
							  </div>
							  </div>
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="address">ที่อยู่</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->address?>"<?php endif?> id="address" name="address" type="text" placeholder="40/4 ถ.ตัวอย่าง หมู่ที่ 2" class="form-control input-md" required="">
							  <span class="help-block">เลขที่ ถนน หมู่ที่</span>  
							  </div>
							</div>
						<div class="country-fillter">
						<div class="form-group">
							 <label for="geo" class="col-md-4 control-label">ภูมิภาค</label>
							 <div class="col-md-3">
							 	<select class="form-control" id="geo" name="geo_id">
							 		<option value="">--เลือกภูมิภาค--</option>
							      <?php if(empty($trader)):?>
							      	<?=geo_options()?>
							      <?php else:?>
							      	<?=geo_options($trader->geo_id)?>
							      <?php endif;?>
							 	</select>
							 </div>
						</div>
						<div class="form-group">
							 <label for="province" class="col-md-4 control-label">จังหวัด</label>
							 <div class="col-md-3">
							 	<select class="form-control" id="province" name="province_id">
							 		<option value="">--เลือกจังหวัด--</option>
							      <?php if(!empty($trader)):?>
							      	<?=province_options($trader->province_id,$trader->geo_id)?>
							      <?php endif;?>							 		
							 	</select>
							 </div>
						</div>
						<div class="form-group">
							 <label for="amphur" class="col-md-4 control-label">เขต/อำเภอ</label>
							 <div class="col-md-3">
							 	<select class="form-control" id="amphur" name="amphur_id">
							 		<option value="">--เลือกอำเภอ--</option>
							 		 <?php if(!empty($trader)):?>
							      	<?=amphur_options($trader->amphur_id,$trader->province_id)?>
							      <?php endif;?>
							 	</select>
							 </div>
						</div>
						<div class="form-group">
							 <label for="district" class="col-md-4 control-label">แขวง/ตำบล</label>
							 <div class="col-md-3">
							 	<select class="form-control" id="district" name="district_id">
							 		<option value="">--เลือกตำบล--</option>
							 		 <?php if(!empty($trader)):?>
							      	<?=district_options($trader->district_id,$trader->amphur_id)?>
							      <?php endif;?>
							 	</select>
							 </div>
						</div>						
						</div>

										
	<h3 class="page-header text-success">การติดต่อ</h3>
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="contact_name">ผู้ติดต่อ</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->contact_name?>"<?php endif?> id="contact_name" name="contact_name" type="text" placeholder="เจ้าหน้าที่ประชาสัมพันธ์" class="form-control input-md" required="">
							  <span class="help-block">ให้ใส่ชื่อผู้ติดต่อหรือชื่อตำแหน่ง</span>  
							  </div>
							  </div>
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="contact_telephone">โทรศัพท์</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->contact_telephone?>"<?php endif?> id="contact_telephone" name="contact_telephone" type="text" placeholder="" class="form-control input-md" required="">
							  <span class="help-block">หากมีหมายเลขมากกว่า 1 ให้ใส่เครื่องหมาย , ระหว่างหมายเลข</span>  
							  </div>
							  </div>	
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="fax">โทรสาร</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->fax?>"<?php endif?> id="fax" name="fax" type="text" placeholder="" class="form-control input-md" required="">
							  <span class="help-block">หากมีหมายเลขมากกว่า 1 ให้ใส่เครื่องหมาย , ระหว่างหมายเลข</span>  
							  </div>
							  </div>	
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="website">เว็บไซต์</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->website?>"<?php endif?> id="website" name="website" type="text" placeholder="http://rubercerter.com" class="form-control input-md" required="">
							  <span class="help-block"></span>  
							  </div>
							  </div>
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="contact_email">อีเมล</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->contact_email?>"<?php endif?> id="contact_email" name="contact_email" type="text" placeholder="provider@rubercerter.com" class="form-control input-md" required="">
							  <span class="help-block"></span>  
							  </div>
							  </div>							  