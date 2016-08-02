<div class="btn-group input-group btn-breadcrumb">
	<input type="text" class="form-control search" style="width: 200px;" placeholder="ค้นหา">
	<?php if($this->router->fetch_method()!='production'):?>
        <a class="btn btn-success add-new" href="<?=base_url()?>trader/<?=$this->router->fetch_method()?>/new"><span class="fa fa-plus fa-fw"></span>เพิ่มใหม่</a>
     <?php endif?>
</div>

