<?php if(!empty($Basic_items)):?>
	<table class="table table-hover tb-basic">
		<thead>
			<th>#ID</th>
			<th>ประเภทผลิตภัณฑ์</th>
			<th>การจัดการ</th>
		</thead>
		<tbody>
			<?php foreach($Basic_items as $item):?>
				<tr>
					<td><?=$item->id?></td>
					<td><?=$item->product_type?></td>
					<td>
											<!-- Single button -->
							<div class="btn-group">
							 
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a href="<?=base_url('basic/'.$this->router->fetch_method())?>/edit/<?=$item->id?>" class="text-yellow"><span class="fa fa-edit fa-fw"></span>แก้ไข</a></li>
							    <li><a href="<?=base_url('basic/del/'.$this->router->fetch_method())?>/<?=$item->id?>" class="text-red" onclick="return confirm('ยืนยันการลบรายการ: <?=$item->product_type?>?')"><span class="fa fa-remove fa-fw"></span>ลบ</a></li>
							  </ul>
							</div>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>