<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
		 <label for="content_name" class="col-sm-2 control-label">ชื่อเรื่องบทความ</label>
		 <div class="col-sm-10">
		 	<input type="text" id="content_name" class="form-control" name="content_name" value="<?php if(!empty($edit_item)) print $edit_item->content_name?>" required>
		 </div>
	</div>
	<div class="form-group">
		 <label for="cat_id" class="col-sm-2 control-label">ประเภท</label>
		 <div class="col-sm-10">
		 	<select class="form-control" id="cat_id" name="cat_id" required>
		 		<option value="">--เลือกประเภท--</option>
		 		<?php if(!empty($web_categories)) foreach($web_categories as $item):?>
		 			<?php if(!empty($edit_item)&&$edit_item->cat_id==$item->id):?>
		 				<option value="<?=$item->id?>" selected><?=$item->category_name?></option>
		 			<?php else:?>
		 				<option value="<?=$item->id?>"><?=$item->category_name?></option>
		 				<?php endif;?>	
		 		<?php endforeach;?>
		 	</select>
		 </div>
	</div>
	<div class="form-group">
		 <label for="content_detail" class="col-sm-2 control-label">รายละเอียด</label>
		 <div class="col-sm-10">
		 	<textarea rows="20" class="form-control" name="content_detail" id="content_detail"><?php if(!empty($edit_item)):?><?=$edit_item->content_detail?><?php endif;?></textarea>
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