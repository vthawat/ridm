$(document).ready(function(){
	$('#img-light-box-logo').lightGallery({
    	thumbnail:true,
		animateThumb: true,

	});

	$('#img-light-box-about').lightGallery({
    	  thumbnail:true,
		animateThumb: true,
	});
	$('.img-light-product').lightGallery({
    	  thumbnail:true,
		animateThumb: true,
		selector: 'this'
	});


});
