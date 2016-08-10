$(function () {
	
	//*******geo filter***** 
	$('.country-fillter #geo').change(function(){
		var get_url="<?=base_url($this->router->fetch_class())?>/json_get_province_by_geo_id/"+$(this).val();
		//alert(get_url);
		
		$.getJSON(get_url, function( data )
		 {
			$('.country-fillter #province').empty();
			$('.country-fillter #amphur').empty();
			$('.country-fillter #district').empty();
			$('.country-fillter #amphur').append('<option value="">--เลือกอำเภอ--</option>');
			$('.country-fillter #district').append('<option value="">--เลือกตำบล--</option>');
			//alert(data[0].province_name);
			$('.country-fillter #province').append('<option value="">--เลือกจังหวัด--</option>');
			 $.each( data, function( key, item ) {
				//alert(item.province_name);
   			 $('.country-fillter #province')
        		 .append($("<option></option>")
                    .attr("value",item.province_id)
                    .text(item.province_name)); 
  			});
  		
		});
	});
  
  //***********amphur filter********
	$('.country-fillter #province').change(function(){
		var get_url="<?=base_url($this->router->fetch_class())?>/json_get_amphur_by_province_id/"+$(this).val();
		//alert(get_url);
		
		$.getJSON(get_url, function( data )
		 {
			$('.country-fillter #amphur').empty();
			//alert(data[0].province_name);
			$('.country-fillter #amphur').append('<option value="">--เลือกอำเภอ--</option>');
			 $.each( data, function( key, item ) {
				//alert(item.province_name);
   			 $('.country-fillter #amphur')
        		 .append($("<option></option>")
                    .attr("value",item.amphur_id)
                    .text(item.amphur_name)); 

  			});
  		
		});
	});

  //***********district filter********
	$('.country-fillter #amphur').change(function(){
		var get_url="<?=base_url($this->router->fetch_class())?>/json_get_district_by_amphur_id/"+$(this).val();
		//alert(get_url);
		
		$.getJSON(get_url, function( data )
		 {
			$('.country-fillter #district').empty();
			//alert(data[0].province_name);
			$('.country-fillter #district').append('<option value="">--เลือกตำบล--</option>');
			 $.each( data, function( key, item ) {
				//alert(item.province_name);
   			 $('.country-fillter #district')
        		 .append($("<option></option>")
                    .attr("value",item.district_id)
                    .text(item.district_name)); 

  			});
  		
		});
	});

});
