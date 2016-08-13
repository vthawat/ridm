	<?php if($this->router->fetch_method()!='production'):?>
        <a class="btn icon-btn btn-success add-new" href="<?=base_url()?>trader/<?=$this->router->fetch_method()?>/new"><span class="btn-glyphicon fa fa-plus img-circle text-success"></span>เพิ่มใหม่</a>
    <?php endif?>

