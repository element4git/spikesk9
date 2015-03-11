jQuery(document).ready(function($){
	
	$('body').on('click','.ig-shortcode-generator',function(){
       		$('#ig-shortcodes').val('0');
       		$('.shortcode-options').hide(); 
 
            $.magnificPopup.open({
                mainClass: 'mfp-zoom-in',
 	 		 	items: {
 	  	     		src: '#shortcode-generator'
  	        	},
  	         	type: 'inline',
                removalDelay: 500
	    }, 0);         
 
	}); 


});