<div class="box box-defualt">
<div class="box-header">
<h1 class="page-header"><img src="<?=base_url('images/right-arrow.png')?>"> KM การจัดการความรู้เกี่ยวกับอุตสาหกรรมยางพาราปลายน้ำ</h1>
</div>
<div class="box-body">
<table class="table">
<thead>
	<th>#</th>
	<th>หมวดหมู่</th>
	<th>จำนวนบทความ</th>
</thead>
<tbody>
<?php $num=1;if(!empty($km_category)) foreach($km_category as $item): ?>
      <tr>
      <td><?=$num?></td>
      <td><a href="#"><?=$item->category_name?></a></td>
      <td class="text-center"><span class="badge bg-green">10</span></td>
      </tr>

<?php $num++;endforeach;?>
</tbody>
</table>
</div>
</div>
