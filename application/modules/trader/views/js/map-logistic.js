$(document).ready(function(){
$.ajaxSetup({ cache: false });

// modal set up
$('.trad-modal').on('hidden.bs.modal', function (e) {
  // do something...
   $(this).removeData();
})

//var center = [37.772323, -122.214897];
    $('#gm-map')
      .gmap3({
        center:trader_gis[0].position,
        zoom: 6,
        mapTypeId : google.maps.MapTypeId.ROADMAP,

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
      .route({
        origin:trader_gis[0].position,
        destination:trader_gis[1].position,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
      })
      .directionsrenderer(function (results) {
        if (results) {
          return {
            panel: "#box",
            directions: results,
             options: 
                    {  
                        preserveViewport: false,
                        draggable: true,
                        directions:results                      
                    },
          }
        }
      });

});