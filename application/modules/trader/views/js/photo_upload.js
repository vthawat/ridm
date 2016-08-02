$(document).on('ready', function() {

    $path_trader_logo=traders.app_url+'trader/ajax_upload_photo/images_logo/'+traders.id;
     $path_trader_about=traders.app_url+'trader/ajax_upload_photo/images_about/'+traders.id;

    $("#trader-logo").fileinput({
  
    	 initialPreviewAsData: true,
    	initialPreview: ['<img class="img-responsive" src="'+traders.trader_img_path+'/'+trader_images.images_logo+'">'],
    	overwriteInitial: true,
         allowedFileExtensions : ['jpg', 'png'],
        allowedPreviewTypes:['image'],
        allowedPreviewMimeTypes:['image/jpeg','image/pjpeg'],
      	uploadUrl: $path_trader_logo, // server upload action
    	uploadAsync: true,
    	maxFileCount: 1,
    });
    
        $("#trader-about").fileinput({
        
        initialPreviewAsData: true,
        initialPreview: ['<img class="img-responsive" src="'+traders.trader_img_path+'/'+trader_images.images_about+'">'],
    	overwriteInitial: true,
        allowedFileExtensions : ['jpg', 'png'],
        allowedPreviewTypes:['image'],
        allowedPreviewMimeTypes:['image/jpeg','image/pjpeg'],
      	uploadUrl: $path_trader_about, // server upload action
    	uploadAsync: true,
    	 maxFileCount: 1,
    });
});
