jQuery(document).ready(function($){
	
	var selectedScheme = 'disabled';
	
	if ($('#_ig_header_settings').hasClass('disabled')){
		$('.form-table.ig-metabox-table.ig-metabox-page-header tr:not(:first-child)').hide();
		$('.form-table.ig-metabox-table.ig-metabox-post-header tr:not(:first-child)').hide();
	}
       
   $('#_ig_header_settings').on('change', function(){
		$(this).removeClass(selectedScheme).addClass($(this).val());
		selectedScheme = $(this).val();
		
		if ($('#_ig_header_settings').hasClass('disabled')){
			$('.form-table.ig-metabox-table.ig-metabox-page-header tr:not(:first-child)').fadeOut("slow");
			$('.form-table.ig-metabox-table.ig-metabox-post-header tr:not(:first-child)').fadeOut("slow");
		} else {
			$('.form-table.ig-metabox-table.ig-metabox-page-header tr:not(:first-child)').fadeIn("slow");
			$('.form-table.ig-metabox-table.ig-metabox-post-header tr:not(:first-child)').fadeIn("slow");
		}
	});

   	if ($('#_ig_header_text').hasClass('disabled')){
		$('.form-table.ig-metabox-table.ig-metabox-page-header').find('#_ig_header_text').parent().parent().nextAll('tr').hide();
		$('.form-table.ig-metabox-table.ig-metabox-post-header').find('#_ig_header_text').parent().parent().nextAll('tr').hide();
	}

    $('#_ig_header_text').on('change', function(){
		$(this).removeClass(selectedScheme).addClass($(this).val());
		selectedScheme = $(this).val();
		
		if ($('#_ig_header_text').hasClass('disabled')){
			$(this).parent().parent().nextAll('tr').fadeOut("slow");
		} else {
			$(this).parent().parent().nextAll('tr').fadeIn("slow");
		}
	});

   function checkField(){
	   $('.ig_meta_subfield').parents('tr').addClass('subfield_master');
	   if ($('.ig_meta_checker').is(':checked')) {
			$('tr.subfield_master').addClass('showed');
	   } else {
	   		$('tr.subfield_master').addClass('hided');
	   }
   }

   $('.ig_meta_checker').on('change', function(){
   		if ($(this).is(':checked')) {
   			$('tr.subfield_master').removeClass('hided').addClass('showed');
	  	} else {
	  		$('tr.subfield_master').removeClass('showed').addClass('hided');
	  	}
	});
	
	$('#post-formats-select input').change(checkFormat);
	
	function checkFormat(){
		var format = $('#post-formats-select input:checked').attr('value');
		
		if(typeof format != 'undefined'){
			
			if(format == 'gallery'){
				$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeIn(500);
			}
			
			else {
				$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeOut(500);
			}
			
			$('#post-body div[id^=ig-metabox-post-]').hide();
			$('#post-body div[id^=ig-metabox-post-header]').show();
			$('#post-body #ig-metabox-post-'+format+'').stop(true,true).fadeIn(500);
					
		}
	
	}

	function toggleSectionComposer(){
		$('body').delegate('.hide_row', 'click', function(){
			$(this).toggleClass('view');
			$(this).parents('.wpb_vc_row').find('.wpb_vc_column').eq(0).fadeToggle(150);
			return false;
		});
	}
	
	toggleSectionComposer();
	
	$(window).load(function(){
		checkFormat();
		checkField();
	})
	
	$('#poststuff div[id$=slide][id^=post]').hide();
});


