<div class="box-footer">
<table class="table">
<thead>
	<th>#</th>
	<th>หมวดหมู่</th>
	<th>บทความ</th>
</thead>
<tbody>
<?php $num=1;if(!empty($km_category)) foreach($km_category as $item): ?>
      <tr>
      <td><?=$num?></td>
      <td><a href="<?=base_url('guest/km/category/'.$item->id)?>"><?=$item->category_name?></a></td>
      <td class="text-center"><span class="badge bg-green">10</span></td>
      </tr>

<?php $num++;endforeach;?>
</tbody>
</table>
</div>
