$(function () {
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();
    	
	$('.carousel').carousel({
	  interval: 6500
	})
$('.carousel').on('slide.bs.carousel', function (ev) {
  var id = ev.relatedTarget.id;
   switch (id) {
    case "1":
    new WOW().init();
      $('#headerwrap').removeClass('s2');
        $('#headerwrap').addClass('s'+id);
  		
      break;
    case "2":
    	$('#headerwrap').removeClass('s1');
         $('#headerwrap').addClass('s'+id);
      break;

    default:
      //the id is none of the above
  }

});

});