<?php if(!empty($article)):?>
<div class="box">
<div class="box-header"><img height="120" src="<?=base_url('images/cover/km-cover.png')?>"></div>
<div class="box-footer">
	<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    เลือกหมวดหมู่ <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php foreach($category_all as $item):?>
    <li><a href="<?=base_url('guest/km/category/'.$item->id)?>"><?=$item->category_name?></a></li>
   <?php endforeach;?>
  </ul>
</div>
</div>
<div class="box-footer">
	<h3 class="text-success">เรื่อง : <?=$article->content_name?></h3>
	<div>
		<?=$article->content_detail?>
	</div>
</div>
</div>
<?php endif;?>