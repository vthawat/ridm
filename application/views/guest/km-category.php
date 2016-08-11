<?php if(!empty($category)):?>
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

<h3 class="text-success">หมวดหมู่: <?=$category[0]->category_name?></h3>
	<ul class="list-group">
	<?php foreach($category as $item):?>
		<li class="list-group-item"><a href="<?=base_url('guest/km/article/'.$item->id)?>"><i class="fa fa-fw fa-chevron-circle-right "></i><?=$item->content_name?></a><span class="badge bg-green"><?=$this->Web->get_hit_view_article($item->id)?> Views</span></li>
	<?php endforeach;?>
	</ul>
</div>
</div>
<?php endif;?>