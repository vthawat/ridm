<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
		 <label for="topic" class="col-sm-2 control-label">หัวข้อการวิจัย*</label>
		 <div class="col-sm-10">
		 	<input type="text" id="topic" class="form-control" name="topic" value="<?php if(!empty($edit_item)) print $edit_item->topic?>" required>
		 </div>
	</div>
	<div class="form-group">
		 <label for="research_type_id" class="col-sm-2 control-label">ประเภทของงานวิจัย*</label>
		 <div class="col-sm-10">
		 	<select class="form-control" id="research_type_id" name="research_type_id" required>
		 		<option value="">--เลือกประเภทของงานวิจัย--</option>
		 		<?php $research_type=$this->base_research_type->get_all()?>
		 		<?php if(!empty($research_type)) foreach($research_type as $item):?>
		 			<?php if(!empty($edit_item)&&$edit_item->research_type_id==$item->id):?>
		 				<option value="<?=$item->id?>" selected><?=$item->research_type?></option>
		 			<?php else:?>
		 				<option value="<?=$item->id?>"><?=$item->research_type?></option>
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