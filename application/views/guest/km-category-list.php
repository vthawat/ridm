<section id="km"></section>
<div class="box-footer">
<table class="table">
<thead>
	<th>#</th>
	<th>หมวดหมู่</th>
	<th></th>
</thead>
<tbody>
<?php $num=1;if(!empty($km_category)) foreach($km_category as $item): ?>
      <tr>
      <td><?=$num?></td>
      <td><a href="<?=base_url('guest/km/category/'.$item->id)?>"><?=$item->category_name?></a></td>
      <td class="text-center"><span class="badge bg-green"><?=$this->Web->count_article_in_category($item->id)?></span> เรื่อง</td>
      </tr>

<?php $num++;endforeach;?>
</tbody>
</table>
</div>
