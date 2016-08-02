$(document).ready(function(){
	
	// bind tab map event show
$("a[href='#photo']").on('shown.bs.tab', function(){
	//google.maps.event.trigger($("#gm-map"), 'resize');
	$('.profile-save').hide();
});

	// bind tab map event show
$("a[href='#product']").on('shown.bs.tab', function(){
	//google.maps.event.trigger($("#gm-map"), 'resize');
	$('.profile-save').hide();
});

$("a[href='#profile']").on('shown.bs.tab', function(){
	//google.maps.event.trigger($("#gm-map"), 'resize');
	$('.profile-save').show();
});

$("a[href='#manufacturing']").on('shown.bs.tab', function(){
	//google.maps.event.trigger($("#gm-map"), 'resize');
	$('.profile-save').show();
});
	
	$('.profile-save').click(function()
	{
		//$trader_type=$('#trader_type').val();
		$trader_name=$('#trader_name').val();
		
	if($trader_name!='')		
		$('.frm-trader-update').submit();
	else	
		alert('กรอกข้อมูลยังไม่สมบูรณ์');
		$('#trader_name').parent().addClass('has-error');
	});

});