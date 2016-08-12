$(document).ready(function(){
	$.ajaxSetup({ cache: false });
    $('#gm-map')
      .gmap3({
        center:trader_gis[0].position,
        zoom:6
      })

      .marker(trader_gis)
 	  
      .then(function (markers) {
      		$.each(trader_gis, function(i, item) {
         		 markers[i].setIcon(map_icon.icon);
       			 markers[i].addListener('click', function() {
       			 //	infowindow.open(this.get(0));
        			// alert(trader_detail_path.path+'/'+item[0].content);
        			$(".trad-modal").modal({ 				
        				show: true,
        				remote: trader_detail_path.path+'/'+item[0].content
        			});
        			
        			 
        		});

     		 }) 
        })

// modal set up
$('.trad-modal').on('hidden.bs.modal', function (e) {
  // do something...
   $(this).removeData();
})


});

