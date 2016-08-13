 $(function () { 
 	
	/** on trader name change */
	$('#trader_name').change(function(){
			
			//alert('ok');
			$('.new-trader-name').text($('#trader_type').val()+$(this).val());
			//$('#map-address').val($(this).val());
		});
		
	/** on trader type change */				
	$('#trader_type').change(function(){
		
			$('.new-trader-name').text($(this).val()+$('#trader_name').val());
	});


});