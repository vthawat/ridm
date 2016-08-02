<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
		 <label for="product_name" class="col-sm-2 control-label">ชื่อผลิตภัณฑ์*</label>
		 <div class="col-sm-10">
		 	<input type="text" id="product_name" class="form-control" name="product_name" value="<?php if(!empty($edit_item)) print $edit_item->product_name?>" required>
		 </div>
	</div>
	<div class="form-group">
		 <label for="product_type_id" class="col-sm-2 control-label">ประเภทผลิตภัณฑ์*</label>
		 <div class="col-sm-10">
		 	<select class="form-control" id="product_type_id" name="product_type_id" required>
		 		<option value="">--เลือกประเภทผลิตภัณฑ์--</option>
		 		<?php $product_type=$this->base_product_type->get_all()?>
		 		<?php if(!empty($product_type)) foreach($product_type as $item):?>
		 			<?php if(!empty($edit_item)&&$edit_item->product_type_id==$item->id):?>
		 				<option value="<?=$item->id?>" selected><?=$item->product_type?></option>
		 			<?php else:?>
		 				<option value="<?=$item->id?>"><?=$item->product_type?></option>
		 				<?php endif;?>	
		 		<?php endforeach;?>
		 	</select>
		 </div>
	</div>	
  <?php if(!empty($action_btn)):?>
  	<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <?=$action_btn?>
    </div>
  </div>
  <?php endif;?>	
</form>