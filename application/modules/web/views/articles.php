<?php if(!empty($web_articles)):?>
	<table class="table table-hover tb-web">
		<thead>
			<th>#ID</th>
			<th>ชื่อเรื่องบทความ</th>
			<th>ประเภท</th>
			<th>การจัดการ</th>
		</thead>
		<tbody>
			<?php foreach($web_articles as $item):?>
				<tr>
					<td><?=$item->id?></td>
					<td><a href="<?=base_url('web/articles/view/'.$item->id)?>"><?=$item->content_name?></a></td>
					<td><?=$item->category_name?></td>
					<td>
											<!-- Single button -->
							<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <span class="fa fa-cog fa-fw"></span><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a href="<?=base_url('web/articles/edit/'.$item->id)?>" class="text-yellow"><span class="fa fa-edit fa-fw"></span>แก้ไข</a></li>
							    <li><a href="<?=base_url('web/delete_article/'.$item->id)?>" class="text-red" onclick="return confirm('ยืนยันการลบรายการ: <?=$item->content_name?>?')"><span class="fa fa-remove fa-fw"></span>ลบ</a></li>
							  </ul>
							</div>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>