$(document).ready(function(){
	
            $("#gm-map").locationpicker({
                location: {
                    latitude: view_location.lat,
                    longitude:  view_location.lon,
                   // icon: window.location.origin+'/ridm/images/icon-maker.png',
                },
                radius: 0,

            });

});
