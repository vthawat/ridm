$(document).ready(function(){
	$('.profile-save').click(function()
	{
		//$trader_type=$('#trader_type').val();
		$trader_name=$('#trader_name').val();
		
	if($trader_name!='')		
		$('.frm-address').submit();
	else	
		alert('กรอกข้อมูลยังไม่สมบูรณ์');
		$('#trader_name').parent().addClass('has-error');
	});

});