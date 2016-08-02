		<li class="list-group-item product-<?=$product_id?>">
			<input type="hidden" class="product-images" name="images[]" value="<?=$product_images?>" />
			<input type="hidden" class="product-id" name="product_item_id[]" value="<?=$product_id?>" />
					<div class="col-md-4 col-sm-3 col-xs-3">
										<h4 class="text-blue"><i class="fa fa-photo fa-fw"></i>ภาพผลิตภัณฑ์ <?=$product_name?></h4>
									     <input id="product-images-id-<?=$product_id?>" name="product_images_id_<?=$product_id?>" class="file-uploading" type="file" multiple data-min-file-count="1">
							
						</div>
					<div class="col-md-8 col-sm-3 col-xs-3">
						<h4 class="text-green"><i class="fa fa-paper-plane fa-fw"></i>ข้อมูลเกี่ยวกับผลิตภัณฑ์ <?=$product_name?></h4>
						<div class="form-group">
							  <label class="col-md-4 control-label">ราคาต่อหน่วย</label>  
							  <div class="col-md-4">
							  <input value="<?php if(!empty($product_item->wholesale_price)) print $product_item->wholesale_price;?>" id="wholesale_price" name="wholesale_price[]" type="text" placeholder="100" class="form-control input-md">
							  <div class="help-block">ใส่เพียงจำนวน ไม่ต้องใส่(บาท)</div>
							  </div>
						</div>
						<div class="form-group">
							  <label class="col-md-4 control-label">ราคาขายส่ง</label>  
							  <div class="col-md-4">
							  <input value="<?php if(!empty($product_item->retail_price)) print $product_item->retail_price;?>" id="retail_price" name="retail_price[]" type="text" placeholder="100" class="form-control input-md">
							  <div class="help-block">ใส่เพียงจำนวน ไม่ต้องใส่(บาท)</div>
							  </div>
						</div>
						<div class="form-group">
							  <label class="col-md-4 control-label">คุณสมบัติเกี่ยวกับผลิตภัณฑ์</label>  
							  <div class="col-md-8">
							  <textarea rows="12" class="form-control" id="product_details" name="product_details[]"><?php if(!empty($product_item->product_details)) print $product_item->product_details;?></textarea>
							  </div>
						</div>						
					</div>
			<div class="clearfix"></div>
		</li>