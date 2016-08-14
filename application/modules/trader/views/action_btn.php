<?php switch($action): case 'view':?>
<button class="btn icon-btn btn-primary back" onclick="javascript:history.back(-1)"><span class="btn-glyphicon fa fa-reply img-circle text-primary"></span>ย้อนกลับ</button>

<button class="btn icon-btn btn-success new" onclick="javascript:location.href='<?=base_url('trader/profile/new')?>'"><span class="btn-glyphicon fa fa-plus img-circle text-success"></span>เพิ่มใหม่</button>

<?php if($this->ezrbac->getCurrentUser()->id==$trader->create_by_user_id):?>
	<button class="btn icon-btn btn-warning edit" onclick="javascript:location.href='<?=base_url('trader/profile/edit/'.$trader->id)?>'"><span class="btn-glyphicon fa fa-edit img-circle text-warning"></span>แก้ไข</button>

	<?php if($trader->published!=3):?>
	<button class="btn icon-btn btn-danger delete" onclick="javascript:if(confirm('ข้อมูลนี้จะถูกย้ายไปในถังขยะ')) location.href='<?=base_url('trader/profile/change_staus/'.$trader->id.'/3')?>'"><span class="btn-glyphicon fa fa-trash img-circle text-danger"></span>ถังขยะ</button>
	<?php endif;?>
 <?php endif?>

<?php break;?>

<?php case 'new':?>
<button class="btn icon-btn btn-primary back" onclick="javascript:history.back(-1)"><span class="btn-glyphicon fa fa-reply img-circle text-primary"></span>ย้อนกลับ</button>
<?php break;?>
<?php case 'edit':?>
<button class="btn icon-btn btn-primary back" onclick="javascript:location.href='<?=base_url('trader/profile')?>'"><span class="btn-glyphicon fa fa-reply img-circle text-primary"></span>ย้อนกลับ</button>
<?php break;?>
<?php endswitch;?>