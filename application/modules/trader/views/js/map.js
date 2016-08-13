$(document).ready(function(){
	var $province;
	var $amphur;
	var $district;
	var $addres_fillter='';
	// get address from 
	$('.country-fillter #province').change(function(){
		$addres_fillter='';
		//alert($(this).find('option:selected').text());
		$province=$(this).find('option:selected').text();
		$addres_fillter+=$province+',';
	});
	
	$('.country-fillter #amphur').change(function(){
		
		$amphur=$(this).find('option:selected').text();
		$addres_fillter+=$amphur+' ';
	});
	
	$('.country-fillter #district').change(function(){
		
		$district=$(this).find('option:selected').text();
		$addres_fillter+=$district;
	});
	
	//$addres_fillter=$district+','+$amphur+','+$province;
	
// bind tab map event show
$("a[href='#profile']").on('shown.bs.tab', function(){
	//google.maps.event.trigger($("#gm-map"), 'resize');
	
});
	
// bind tab map event show
$("a[href='#trader-locate']").on('shown.bs.tab', function(){
// alert($addres_fillter);
 $location=$('.new-trader-name').text();
 alert($location);
  // set default location first
	$('#map_address').val($addres_fillter);
	var lat = 13.70319;
	var lon = 99.849963;
	var zoom = 8;
	$("#gm-map").goMap({
		scaleControl: true, 
		maptype: 'ROADMAP', 
		streetViewControl: true,
		zoom: zoom,
		address:$addres_fillter,
		markers: [{
			id: 'address',
			address:$location,
			latitude: lat, 
			longitude: lon,
			 radius: 1000,
			 location:lat+','+lon,
			draggable: true,
					html: { 
                content: $location, 
                popup:true 
           },
        }],
        icon: window.location.origin+'/ridm/images/icon-maker.png',
	});
	
	// create event listener
	$.goMap.createListener({type:'marker', marker:'address'}, 'position_changed', function() { 
		$("#latlon").val($($.goMap.mapId).data('address').getPosition().toUrlValue());
    });


// locate new render
			var _address = $.goMap.createListener({type:'marker', marker:'address'}, 'position_changed', function() { 
				$.goMap.fitBounds();
				$.goMap.removeListener(_address);
				$.goMap.setMap({zoom:15});
		    });

			$.goMap.setMarker('address', {address:$addres_fillter});

});



});