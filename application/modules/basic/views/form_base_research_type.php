<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
		 <label for="research_type" class="col-sm-2 control-label"><?=$this->base_research_type->desc?>*</label>
		 <div class="col-sm-10">
		 	<input type="text" id="research_type" class="form-control" name="research_type" value="<?php if(!empty($edit_item)) print $edit_item->research_type?>" required>
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