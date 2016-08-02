$(document).ready(function(){

$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});

// bind tab map event show
//$("a[href='#product']").on('shown.bs.tab', function(){

	$.each(product_list, function( index, value ) {
		$product_id=value.product_id;
		url=traders.app_url+'trader/ajax_get_form_product/'+traders.id+'/'+$product_id;
		var jqxhr = $.get(url, function(data) {
		   $( ".products-list" ).append(data);
		})
		  .done(function() {
		  // alert(product_list[index].product_id);
		    			// bind file upload 
		    $path_trader_product=traders.app_url+'trader/ajax_upload_product/'+traders.id+'/'+product_list[index].product_id;
			product_images=$('.products-list .product-'+product_list[index].product_id).find('.product-images').val();
			    $("#product-images-id-"+product_list[index].product_id).fileinput({
  
		    		 initialPreviewAsData: true,
		    		initialPreview: ['<img class="img-responsive" src="'+traders.product_img_path+'/'+product_images+'">'],
		    		overwriteInitial: true,
		        	 allowedFileExtensions : ['jpg', 'png'],
		        	allowedPreviewTypes:['image'],
		        	allowedPreviewMimeTypes:['image/jpeg','image/pjpeg'],
		      		uploadUrl: $path_trader_product, // server upload action
		    		uploadAsync: true,
		    		maxFileCount: 1,
		    		});
		  });

	

	});




	
// bind for ajax	
	$('.products').on('ifChecked', function(event){
		product_id=$(this).val();
		$.get(traders.app_url+'trader/ajax_get_form_product/'+traders.id+'/'+product_id, function( data )
		{

		  $( ".products-list" ).append(data);
			$path_trader_product=traders.app_url+'trader/ajax_upload_product/'+traders.id+'/'+product_id;
			
			// bind file upload 
			product_images=$('.products-list .product-'+product_id).find('.product-images').val();
			    $("#product-images-id-"+product_id).fileinput({
  
		    		 initialPreviewAsData: true,
		    		initialPreview: ['<img class="img-responsive" src="'+traders.product_img_path+'/'+product_images+'">'],
		    		overwriteInitial: true,
		        	 allowedFileExtensions : ['jpg', 'png'],
		        	allowedPreviewTypes:['image'],
		        	allowedPreviewMimeTypes:['image/jpeg','image/pjpeg'],
		      		uploadUrl: $path_trader_product, // server upload action
		    		uploadAsync: true,
		    		maxFileCount: 1,
		    		});
			
			});

	});
	
	


	$('.products').on('ifUnchecked', function(event){
 		// alert(event.type + ' callback');
 		$icheck=$(this);
 	product_id=$(this).val();
		$.get(traders.app_url+'trader/ajax_is_exist_product/'+traders.id+'/'+product_id, function( data )
		{
			//alert(data);
			if(data!=0)
			{
			 if(confirm('ยืนยันการลบ รายการผลิตภัณฑ์'))
			   {
				 $.get(traders.app_url+'trader/ajax_product_delete/'+data, function( data )
					{
					
						$('.product-'+product_id).remove();
					});
				}
			  else 
			  {	
			  	$('.product-'+product_id).remove();
			  	$icheck.iCheck('check');			  	
			  } 
			}
			else $('.product-'+product_id).remove();
			
		});		
 			
 		
	});
});