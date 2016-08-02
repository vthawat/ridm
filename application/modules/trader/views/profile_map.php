<h3 class="page-header text-success">กำหนดแผนที่ตั้งสถานที่ประกอบการ</h3>
		<div class="form-group">
		  <div>
			  <input <?php if(!empty($trader)):?>value="<?=$trader->map_address?>"<?php endif?> id="map-address" name="map_address" type="text" class="form-control">
			  <span class="help-block">ค้นหาสถานที่ ระบุชื่อสถานที่ เช่น บริษัท</span> 
			 </div>
		 </div>		
		<div class="input-group">
      		<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i>Latitude</span>
			<input <?php if(!empty($trader)):?>value="<?=$trader->latitude?>"<?php endif?> class="form-control" type="text" name="latitude" id="latitude" />
			<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i>Longtitude</span>
			<input <?php if(!empty($trader)):?>value="<?=$trader->longtitude?>"<?php endif?> class="form-control" type="text" name="longtitude"  id="longtitude" />
		</div>
	
<div id="gm-map"></div>