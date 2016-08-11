<h3 class="page-header text-success">ข้อมูลการผลิต</h3>
<form class="form-horizontal">
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="capacity">กำลังการผลิต</label>  
							  <div class="col-md-2">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->capacity?>"<?php endif?> id="capacity" name="capacity" type="text" placeholder="10 ตันต่อปี" class="form-control input-md" required="">
							  <span class="help-block">ใส่จำนวนต่อเดือนหรือต่อปี</span>  
							  </div>
						  </div>
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="manufacturing_technology">เทคโนโลยีการผลิต</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->manufacturing_technology?>"<?php endif?> id="manufacturing_technology" name="manufacturing_technology" type="text" placeholder="Compounding Formulation" class="form-control input-md" required="">
							  <span class="help-block"></span>  
							  </div>
						  </div>
						  						  
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="get_standard">มาตารฐานที่ได้รับ</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->get_standard?>"<?php endif?> id="get_standard" name="get_standard" type="text" placeholder="ISO9001 2008" class="form-control input-md" required="">
							  <span class="help-block"></span>  
							  </div>
						  </div>
						  						  						  
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="raw_material">วัตุดิบหลัก</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->raw_material?>"<?php endif?> id="raw_material" name="raw_material" type="text" placeholder="น้ำยางข้น" class="form-control input-md" required="">
							  <span class="help-block"></span>  
							  </div>
						  </div>

								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="capital_registration">ทุนการจดทะเบียน</label>  
							  <div class="col-md-2">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->capital_registration?>"<?php endif?> id="capital_registration" name="capital_registration" type="text" placeholder="4.3 ล้านบาท" class="form-control input-md">
							  <span class="help-block">ใส่จำนวน xx บาท</span>  
							  </div>
						  </div>
						  
								<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="reference_data">ข้อมูลอ้างอิง</label>  
							  <div class="col-md-4">
							  <input <?php if(!empty($trader)):?>value="<?=$trader->reference_data?>"<?php endif?> id="reference_data" name="reference_data" type="text" placeholder="" class="form-control input-md">
							  <span class="help-block"></span>  
							  </div>
						  </div>						  						  						  						  						  
</form>