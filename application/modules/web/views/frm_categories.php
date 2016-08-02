<form method="post" class="form-horizontal" action="<?php if(!empty($action)) print $action?>">
	<div class="form-group">
		 <label for="category_name" class="col-sm-2 control-label">ชื่อประเภท</label>
		 <div class="col-sm-10">
		 	<input type="text" id="category_name" class="form-control" name="category_name" value="<?php if(!empty($edit_item)) print $edit_item->category_name?>" required>
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