<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes
/*-----------------------------------------------------------------------------------*/

function is_edit_page($new_edit = null){
    global $pagenow;
    if (!is_admin()) return false;
    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new")
        return in_array( $pagenow, array( 'post-new.php' ) );
    else
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

function ig_shortcode_init() {
	if(is_admin()){
		if(is_edit_page()){
			// Enqueue Scripts
function enqueue_generator_scripts(){

	wp_enqueue_style('tinymce', get_template_directory_uri() . '/framework/shortcodes/tinymce/shortcode_generator/css/tinymce.css'); 
	wp_enqueue_style('font-entypo', get_template_directory_uri() . '/includes/css/fonts/fonts.css'); 
	
	wp_enqueue_style('magnific', get_template_directory_uri() . '/framework/shortcodes/tinymce/shortcode_generator/css/magnific-popup.css'); 
	wp_enqueue_script('magnific', get_template_directory_uri() . '/framework/shortcodes/tinymce/shortcode_generator/js/magnific-popup.js','jquery','0.9.7 ', TRUE);
	
	wp_enqueue_script('shortcode-generator-popup', get_template_directory_uri() . '/framework/shortcodes/tinymce/shortcode_generator/js/popup.js','jquery','0.9.7 ', TRUE);
	wp_enqueue_script('shortcode-generator', get_template_directory_uri() . '/framework/shortcodes/tinymce/ig.tinymce.js','jquery','0.9.7 ', TRUE);
	
}

add_action('admin_enqueue_scripts','enqueue_generator_scripts');

add_action('admin_footer','content_display');

// Get All Revolution Sliders
function all_rev_sliders_in_array(){
    if (class_exists('RevSlider')) {
        $theslider     = new RevSlider();
        $arrSliders = $theslider->getArrSliders();
        $arrA     = array();
        $arrT     = array();
        foreach($arrSliders as $slider){
            $arrA[]     = $slider->getAlias();
            $arrT[]     = $slider->getTitle();
        }
        if($arrA && $arrT){
            $result = array_combine($arrA, $arrT);
        }
        else
        {
            $result = false;
        }
        return $result;
    }
}

function content_display(){

// Global Icons
global $infinite_icons;

// Shotcodes Definitions

// Blank Divider
$ig_shortcodes['ig_blank_divider_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Blank Divider', 'INFINITE_LANGUAGE' ),
	'attr'=>array(
		'height_value'=>array('type'=>'text', 'title'=>__('Height Value', 'INFINITE_LANGUAGE'), 'desc'=>__('Height Value in pixel. Enter only number value.', 'INFINITE_LANGUAGE')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE'))
	)
);

// Divider
$ig_shortcodes['ig_divider_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Divider', 'INFINITE_LANGUAGE' ),
	'attr'=>array(
		'div_type'=>array('type'=>'select', 'title'=>__('Divider Style', 'INFINITE_LANGUAGE'), 'values' => array ( "normal" => "normal", "short" => "short"), 'desc'=>__('Choose between the two available divider styles.', 'INFINITE_LANGUAGE')),
		'margin_top_value'=>array('type'=>'text', 'title'=>__('Margin Top Value', 'INFINITE_LANGUAGE'), 'desc'=>__('Margin Top Value in pixel. Enter only number value.', 'INFINITE_LANGUAGE')),
		'margin_bottom_value'=>array('type'=>'text', 'title'=>__('Margin Bottom Value', 'INFINITE_LANGUAGE'), 'desc'=>__('Margin Bottom Value in pixel. Enter only number value.', 'INFINITE_LANGUAGE')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE'))
	)
);

// Accordion
$ig_shortcodes['ig_accordion_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Accordion Section', 'INFINITE_LANGUAGE' ), 
	'attr'=>array(
		'accordions'=>array('type'=>'custom')
	)
);

// Toggle
$ig_shortcodes['ig_toggle_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Toggle Section', 'INFINITE_LANGUAGE' ), 
	'attr'=>array(
		'toggles'=>array('type'=>'custom')
	)
);

// Tabs
$ig_shortcodes['ig_tab_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Tab Section', 'INFINITE_LANGUAGE' ), 
	'attr'=>array(
		'tabs'=>array('type'=>'custom')
	)
);

// Testimonials
$ig_shortcodes['ig_testimonial_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Testimonial Section', 'INFINITE_LANGUAGE' ), 
	'attr'=>array(
		'testimonials'=>array('type'=>'custom')
	)
);

// Alert Box
$ig_shortcodes['ig_alert_box_sh'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Alert Box', 'INFINITE_LANGUAGE'), 
	'attr'=>array(
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE')), 
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Type', 'INFINITE_LANGUAGE'), 
			'opt'=>array(
				'standard'=>'Standard',
				'warning'=>'Warning',
				'error'=>'Error',
				'info'=>'Info',
				'success'=>'Success'
			)
		)
	) 
);

// Tooltip
$ig_shortcodes['ig_tooltip'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Tooltip', 'INFINITE_LANGUAGE'), 
	'attr'=>array(
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Position', 'INFINITE_LANGUAGE'),
			'desc'=>__('Select the position of the tooltip.', 'INFINITE_LANGUAGE'), 
			'opt'=>array(
				'top'=>'Top',
				'left'=>'Left',
				'right'=>'Right',
				'bottom'=>'Bottom'
			)
		),
		'text'=>array(
			'type'=>'text', 
			'title'=>__('Text', 'INFINITE_LANGUAGE'),
			'desc'=>__('This text appear inside the tooltip.', 'INFINITE_LANGUAGE')
		)
	) 
);

// Highlight
$ig_shortcodes['ig_highlight'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Highlight', 'INFINITE_LANGUAGE'), 
	'attr'=>array(
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Mode', 'INFINITE_LANGUAGE'), 
			'opt'=>array(
				'color-text'=>'Color Text',
				'highlight-text'=>'Highlight Text'
			)
		)
	) 
);

// Dropcap
$ig_shortcodes['ig_dropcap'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Dropcap', 'INFINITE_LANGUAGE'), 
	'attr'=>array(
		'mode'=>array(
			'type'=>'radio', 
			'title'=>__('Mode', 'INFINITE_LANGUAGE'), 
			'opt'=>array(
				'dropcap-normal'=>'Dropcap Normal',
				'dropcap-color'=>'Dropcap Color'
			)
		)
	) 
);

// Lightbox Image
$ig_shortcodes['ig_lightbox_image_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Lightbox Image', 'INFINITE_LANGUAGE' ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image','INFINITE_LANGUAGE'), 'desc'=>__('Select image from media library.', 'INFINITE_LANGUAGE')),
		'image_popup'=>array('type'=>'custom', 'title'  => __('Different Image PopUp','INFINITE_LANGUAGE'), 'desc'=>__('Select image from media library.', 'INFINITE_LANGUAGE')),
		'thumb_width'=>array('type'=>'text', 'title'  => __('Thumbnail Width','INFINITE_LANGUAGE'), 'desc'=>__('Choose a width for your thumbnail. It will be automatically cropped and resized.', 'INFINITE_LANGUAGE')),
		'title'=>array('type'=>'text', 'title'=>__('Title', 'INFINITE_LANGUAGE'), 'desc'=>__('Insert a Title of your Image.', 'INFINITE_LANGUAGE')),
		'gallery_name'=>array('type'=>'text', 'title'=>__('Gallery Name', 'INFINITE_LANGUAGE'), 'desc'=>__('If you want can insert a name of your gallery here.', 'INFINITE_LANGUAGE')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE'))
	)
);

// Lightbox Video
$ig_shortcodes['ig_lightbox_video_sh'] = array( 
	'type'=>'regular', 
	'title'=>__('Lightbox Video', 'INFINITE_LANGUAGE' ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image','INFINITE_LANGUAGE'), 'desc'=>__('Select image from media library.', 'INFINITE_LANGUAGE')),
		'thumb_width'=>array('type'=>'text', 'title'  => __('Thumbnail Width','INFINITE_LANGUAGE'), 'desc'=>__('Choose a width for your thumbnail. It will be automatically cropped and resized.', 'INFINITE_LANGUAGE')),
		'link_url'=>array('type'=>'text', 'title'=>__('Link URL', 'INFINITE_LANGUAGE'), 'desc'=>__('Insert the URL for video (https://vimeo.com/18439821).', 'INFINITE_LANGUAGE')),
		'title'=>array('type'=>'text', 'title'=>__('Title', 'INFINITE_LANGUAGE'), 'desc'=>__('Insert a Title of your Image.', 'INFINITE_LANGUAGE')),
		'gallery_name'=>array('type'=>'text', 'title'=>__('Gallery Name', 'INFINITE_LANGUAGE'), 'desc'=>__('If you want can insert a name of your gallery here.', 'INFINITE_LANGUAGE')),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE'))
	)
);

// Button
$ig_shortcodes['ig_button_sh'] = array( 
	'type'=>'radios', 
	'title'=>__('Button', 'INFINITE_LANGUAGE'), 
	'attr'=>array(
		'buttonlabel'=>array('type'=>'text', 'title'=>__('Button Label', 'INFINITE_LANGUAGE'), 'desc'=>__('This is the text that appears on your button.', 'INFINITE_LANGUAGE')),
		'buttonlink'=>array('type'=>'text', 'title'=>__('Button Link', 'INFINITE_LANGUAGE'), 'desc'=>__('Where should your button link to?', 'INFINITE_LANGUAGE')),
		'target'=>array(
			'type'=>'select', 
				'title'=>__('Button Link Target', 'INFINITE_LANGUAGE'), 
				'values'=>array(
					'same'=>'_self',
					'new'=>'_blank'
			)
		),
		'buttonsize'=>array(
			'type'=>'select', 
			'title'=>__('Button Size', 'INFINITE_LANGUAGE'), 
			'values'=>array(
				'mini'=>'button-mini',
				'small'=>'button-small',
				'medium'=>'button-medium',
				'large'=>'button-large'
			)
		),
		'buttoncolor'=>array(
			'type'=>'text', 
			'title'=>__('Custom Button Color?', 'INFINITE_LANGUAGE'),
			'desc'=>__('Insert your Custom Color - Example: #CCCCCC', 'INFINITE_LANGUAGE')
		),
		'inverted'=>array(
			'type'=>'checkbox', 
			'title'=>__('Inverted Color?', 'INFINITE_LANGUAGE')
		),
		'icons' => array(
			'type'=>'icons', 
			'title'=>'Icon', 
			'values'=> $infinite_icons
		),
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE'))
	) 
);

// Social Share Buttons
$ig_shortcodes['ig_social_share'] = array( 
	'type'=>'regular', 
	'title'=>__('Social Buttons Sharing', 'INFINITE_LANGUAGE'), 
	'attr'=>array(
		'facebook'=>array(
			'type'=>'checkbox', 
			'title'=>__('Facebook', 'INFINITE_LANGUAGE'),
			'desc' => __('Check to enable', 'INFINITE_LANGUAGE')
		),
		'twitter'=>array(
			'type'=>'checkbox', 
			'title'=>__('Twitter', 'INFINITE_LANGUAGE'),
			'desc' => __('Check to enable', 'INFINITE_LANGUAGE')
		),
		'google_plus'=>array(
			'type'=>'checkbox', 
			'title'=>__('Google Plus', 'INFINITE_LANGUAGE'),
			'desc' => __('Check to enable', 'INFINITE_LANGUAGE')
		),
		'pinterest'=>array(
			'type'=>'checkbox', 
			'title'=>__('Pinterest', 'INFINITE_LANGUAGE'),
			'desc' => __('Check to enable', 'INFINITE_LANGUAGE')
		)
	)
);

// Revolution Slider
global $wpdb;
$rs = $wpdb->get_results( 
	"
	SELECT id, title, alias
	FROM ".$wpdb->prefix."revslider_sliders
	ORDER BY id ASC LIMIT 100
	"
);
$revsliders = array();
if ($rs) {
foreach ( $rs as $slider ) {
  $revsliders[$slider->alias] = $slider->alias;
}
} else {
$revsliders[0] = 'No Slider Found';
}
  
$ig_shortcodes['ig_slider'] = array(  
	'type'=>'regular', 
	'title'=>__('Revolution Slider', 'INFINITE_LANGUAGE' ),
	'attr'=>array(
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE')),
		'alias'=>array('type'=>'select_slider', 'title'=>__('Revolution Slider Alias', 'INFINITE_LANGUAGE'), 'options' => $revsliders, 'desc'=>__('Select your Revolution Slider.', 'INFINITE_LANGUAGE')) 
	)
);

// Video Embed Code
$ig_shortcodes['ig_video_embed'] = array(  
	'type'=>'regular', 
	'title'=>__('Video Embed', 'INFINITE_LANGUAGE' ),
	'attr'=>array(
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE')),
		'link' => array('type'=>'text', 'title'=>__('URL', 'INFINITE_LANGUAGE'),
										'desc'=>__('Working examples, in case you want to use an external service (Video Embed Shortcode):<br/><br/>https://vimeo.com/charlex/shapeshifter <br/>http://www.youtube.com/watch?v=CZIt20emgLY', 'INFINITE_LANGUAGE'))
	)
);

// Video
$ig_shortcodes['ig_video'] = array( 
	'type'=>'regular', 
	'title'=>__('Video Self Hosted', 'INFINITE_LANGUAGE' ), 
	'attr'=>array( 
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE')),
		'webm_url'=>array('type'=>'text', 'title'=>__('WEBM File URL', 'INFINITE_LANGUAGE'), 'desc'=>__('Upload a WEBM File.', 'INFINITE_LANGUAGE')),
		'mp4_url'=>array('type'=>'text', 'title'=>__('MP4 File URL', 'INFINITE_LANGUAGE'), 'desc'=>__('Upload a MP4 File.', 'INFINITE_LANGUAGE')),
		'ogv_url'=>array('type'=>'text', 'title'=>__('OGV File URL', 'INFINITE_LANGUAGE'), 'desc'=>__('Upload a OGV File.', 'INFINITE_LANGUAGE')),
		'image'=>array('type'=>'custom', 'title'=> __('Preview Image','INFINITE_LANGUAGE'), 'desc'=>__('If you wish can upload a poster image.', 'INFINITE_LANGUAGE'))
	)
);

// Audio
$ig_shortcodes['ig_audio'] = array( 
	'type'=>'regular', 
	'title'=>__('Audio Self Hosted', 'INFINITE_LANGUAGE' ), 
	'attr'=>array( 
		'class'=>array('type'=>'text', 'title'=>__('Class', 'INFINITE_LANGUAGE'), 'desc'=>__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'INFINITE_LANGUAGE')),
		'mp3_url'=>array('type'=>'text', 'title'=>__('MP3 File URL', 'INFINITE_LANGUAGE'), 'desc'=>__('Upload a MP3 File.', 'INFINITE_LANGUAGE'))
	)
);

// Shortcode Output HTML
		$html_options = null;
		
		$shortcode_html = '
		
		<div id="ig-sh-heading">
		
		<div id="shortcode-generator" class="mfp-hide mfp-with-anim">
		    					
			<div class="shortcode-content">
				<div id="ig-sc-header">
					<div class="label"><strong>Infinite Shortcodes</strong></div>			
					<div class="content">
					<select id="ig-shortcodes">
				    <option value="0" selected="selected">'. __("Choose your Shortcode...", 'INFINITE_LANGUAGE') .'</option>';
					
					foreach( $ig_shortcodes as $shortcode => $options ){
						
						if(strpos($shortcode,'header') !== false) {
							$shortcode_html .= '<optgroup label="'.$options['title'].'">';
						}
						else {
							$shortcode_html .= '<option value="'.$shortcode.'">'.$options['title'].'</option>';
							$html_options .= '<div class="shortcode-options" id="options-'.$shortcode.'" data-name="'.$shortcode.'" data-type="'.$options['type'].'">';
							
							if( !empty($options['attr']) ){
								 foreach( $options['attr'] as $name => $attr_option ){
									$html_options .= ig_option_element( $name, $attr_option, $options['type'], $shortcode );
								 }
							}
			
							$html_options .= '</div>'; 
						}
						
					} 
			
			$shortcode_html .= '</select></div></div></div>'; 	
		
	
		 echo $shortcode_html . '<div class="sh-container">' . $html_options; ?>
			
			<div id="shortcode-content">
				
				<div class="label"><label id="option-label" for="shortcode-content"><?php echo __( 'Content: ', 'INFINITE_LANGUAGE' ); ?> </label></div>
				<div class="content"><textarea id="shortcode_content"></textarea></div>
			
			    <div class="hr"></div>
			    
			</div>
		
			<code class="shortcode_storage"><span id="shortcode-storage-o" style=""></span><span id="shortcode-storage-d"></span><span id="shortcode-storage-c" style=""></span></code>
            <a class="mfp-close btn btn-close"><?php echo __( 'Cancel', 'INFINITE_LANGUAGE' ); ?></a>
			<a class="btn" id="add-shortcode"><?php echo __( 'Add Shortcode', 'INFINITE_LANGUAGE' ); ?></a>
			</div><!--sh-container-->
		</div>

	</div>

	<?php	

}

function ig_option_element( $name, $attr_option, $type, $shortcode ){
	
	$option_element = null;
	
	(isset($attr_option['desc']) && !empty($attr_option['desc'])) ? $desc = '<p class="description">'.$attr_option['desc'].'</p>' : $desc = '';
		
	switch( $attr_option['type'] ){
		
	case 'radio':
	    
		$option_element .= '<div class="label"><strong>'.$attr_option['title'].': </strong></div><div class="content">';
	    foreach( $attr_option['opt'] as $val => $title ){
	    
		(isset($attr_option['def']) && !empty($attr_option['def'])) ? $def = $attr_option['def'] : $def = '';
		
		 $option_element .= '
			<label for="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'">'.$title.'</label>
		    <input class="attr" type="radio" data-attrname="'.$name.'" name="'.$shortcode.'-'.$name.'" value="'.$val.'" id="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'"'. ( $val == $def ? ' checked="checked"':'').'>';
	    }
		
		$option_element .= $desc . '</div>';
		
	    break;
		
	case 'checkbox':
		
		$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div><div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />'. $desc. '</div> ';
		
		break;	
	
	case 'select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'" class="ig-select">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
	
	case 'select_slider':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'" class="ig-select">';
			$values = $attr_option['options'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
		
	case 'icons':
		
		$option_element .= '

		<div class="icon-option">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<i class="'.$value.'"></i>';
			}
		$option_element .= $desc . '</div>';
		
		break;
		
	case 'custom':
 
		if( $name == 'accordions' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Accordion Title: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Accordion Content: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Accordion', 'INFINITE_LANGUAGE' ). '</a> <a href="#" class="btn green add-list-item">'.__('Add Accordion', 'INFINITE_LANGUAGE' ).'</a>';
			
		}
		
		if( $name == 'toggles' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Toggle Title: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Toggle Content: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Toggle', 'INFINITE_LANGUAGE' ). '</a> <a href="#" class="btn green add-list-item">'.__('Add Toggle', 'INFINITE_LANGUAGE' ).'</a>';
			
		}
		
		if( $name == 'tabs' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Tab Title: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Tab Content: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Tab', 'INFINITE_LANGUAGE' ). '</a> <a href="#" class="btn green add-list-item">'.__('Add Tab', 'INFINITE_LANGUAGE' ).'</a>';
			
		}

		if( $name == 'testimonials' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Testimonial Title: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Testimonial Content: ', 'INFINITE_LANGUAGE').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Testimonial', 'INFINITE_LANGUAGE' ). '</a> <a href="#" class="btn green add-list-item">'.__('Add Testimonial', 'INFINITE_LANGUAGE' ).'</a>';
			
		}
		
		elseif( $name == 'image'){
			$option_element .= '
				<div class="shortcode-dynamic-item-pop" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'INFINITE_LANGUAGE') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'INFINITE_LANGUAGE') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'image_popup'){
			$option_element .= '
				<div class="shortcode-dynamic-item-pop" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_popup_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'INFINITE_LANGUAGE') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'INFINITE_LANGUAGE') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		elseif( $type == 'checkbox' ){
			$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />' . $desc . '</div> ';
		} 
		
		
		break;

	case 'textarea':
		$option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><textarea data-attrname="'.$name.'"></textarea> ' . $desc . '</div>';
		break;
			
	case 'text':
	default:
	    $option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><input class="attr" type="text" data-attrname="'.$name.'" value="" />' . $desc . '</div>';
	    break;

    }
	
	
	$option_element .= '<div class="clear"></div>';
    
    return $option_element;
}	
		}
	}
}

add_action('init', 'ig_shortcode_init');

//Add button to page
add_action('media_buttons','ig_buttons',100);

function ig_buttons() {
     echo "<a data-effect='mfp-zoom-in' class='button button-primary ig-shortcode-generator' href='#shortcode-generator'><i class='icon-infinity' style='line-height: 2.2;'> </i>Infinite Shortcodes</a>";
}

/*-----------------------------------------------------------------------------------*/
/*	Elements
/*-----------------------------------------------------------------------------------*/

// Columns
function vc_row_inner($atts, $content = null) {  
    extract(shortcode_atts(array("column_type" => '', "class" => ''), $atts));
	
	if($class)
	$class = ' '.esc_attr($class);
	
	switch ($column_type) {
		case 'l_18' :
			$column_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="top">'. do_shortcode($content) .'</a>';
			break;
		case 'l_19' :
			$column_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="left">'. do_shortcode($content) .'</a>';
			break;
		case 'l_17' :
			$column_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="right">'. do_shortcode($content) .'</a>';
			break;
		case 'bottom' :
			$column_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="bottom">'. do_shortcode($content) .'</a>';
			break;
	}
	
	return $column_mode;
}
add_shortcode('vc_row_inner', 'vc_row_inner');

// Blank Divider
function ig_blank_divider_sh($atts, $content = null) {  
    extract(shortcode_atts(array("height_value" => '', "class" => ''), $atts));
	
	if($class)
	$class = ' '.esc_attr($class);
	
	$height_value = ' style="height: '.$height_value.'px;"';
	
	return '<div class="blank_divider'.$class.'"'.$height_value.'></div>';
}
add_shortcode('ig_blank_divider_sh', 'ig_blank_divider_sh');

// Divider
function ig_divider_sh($atts, $content = null) {  
    extract(shortcode_atts(array("div_type" => '', "class" => '', "margin_top_value" => '', "margin_bottom_value" => ''), $atts));
	
	if($class)
	$class = ' '.esc_attr($class);
	
	if ( $div_type=="short") { $div_type = ' short'; }
	
	$margin_top_value = 'margin-top: '.$margin_top_value.'px;';
	$margin_bottom_value = 'margin-bottom: '.$margin_bottom_value.'px;';
	
	return '<div class="divider'.$class.' '.$div_type.'" style="'.$margin_top_value.$margin_bottom_value.'"></div>';
}
add_shortcode('ig_divider_sh', 'ig_divider_sh');

// Testimonial Slider
function ig_testimonials($atts, $content = null){
	$GLOBALS['testimonial_count'] = 0;
	do_shortcode( $content );
	
	if( is_array( $GLOBALS['testimonials'] ) ){
		
		foreach( $GLOBALS['testimonials'] as $testimonial ){
			$testimonials[] = '<li>
									<p class="ig-testimonial-quote">'.$testimonial['content'].'</p>
									<span class="ig-testimonial-source">'.$testimonial['title'].'</span>
							   </li>';
		}
		
		$return = '<div class="ig-testimonials">
					<div class="ig-testimonials-container">
						<div class="testimonial">
							<ul class="slides">'.implode( "\n", $testimonials ).'</ul>
						</div>
					</div>
					</div>';
	}
	
	return $return;
}

add_shortcode('ig_testimonial_section', 'ig_testimonials');

function ig_testimonial($atts, $content){
	extract(shortcode_atts(array( 'title' => '%d', 'id' => '%d'), $atts));
	
	$x = $GLOBALS['testimonial_count'];
	$GLOBALS['testimonials'][$x] = array(
		'title' => sprintf( $title, $GLOBALS['testimonial_count'] ),
		'content' =>  do_shortcode($content),
		'id' =>  $id );
	
	$GLOBALS['testimonial_count']++;
}

add_shortcode( 'testimonial', 'ig_testimonial' );

// Accordion
function ig_accordions($atts, $content = null){
	$GLOBALS['accordion_count'] = 0;
	do_shortcode( $content );
	
	$id = rand();
	$id = $id*rand(0,50);
	
	if( is_array( $GLOBALS['accordions'] ) ){
		
		foreach( $GLOBALS['accordions'] as $accordion ){
			$accordions[] = '<div class="panel panel-default">
							<div class="accordion-heading accordionize">
								<a class="accordion-toggle" href="#'.$accordion['id'].'-'.$id.'" data-parent="#accordionArea-'.$id.'" data-toggle="collapse">'.$accordion['title'].'<span class="icon-angle-down"></span></a>
							</div>
							<div id="'.$accordion['id'].'-'.$id.'" class="accordion-body collapse">
								<div class="accordion-inner">'.$accordion['content'].'</div>
							</div>
						</div>';
		}
		
		$return = '<div id="accordionArea-'.$id.'" class="accordion">'.implode( "\n", $accordions ).'</div>';
	}
	
	return $return;
}

add_shortcode('ig_accordion_section', 'ig_accordions');

function ig_accordion($atts, $content){
	extract(shortcode_atts(array( 'title' => '%d', 'id' => '%d'), $atts));
	
	$x = $GLOBALS['accordion_count'];
	$GLOBALS['accordions'][$x] = array(
		'title' => sprintf( $title, $GLOBALS['accordion_count'] ),
		'content' =>  do_shortcode($content),
		'id' =>  $id );
	
	$GLOBALS['accordion_count']++;
}

add_shortcode( 'accordion', 'ig_accordion' );

// Toggle
function ig_toggles($atts, $content = null){
	$GLOBALS['toggle_count'] = 0;
	do_shortcode( $content );
	
	$id = rand();
	$id = $id*rand(0,50);
	
	if( is_array( $GLOBALS['toggles'] ) ){
		
		foreach( $GLOBALS['toggles'] as $toggle ){
			$toggles[] = '<div class="panel panel-default">
							<div class="accordion-heading togglize">
								<a class="accordion-toggle" href="#'.$toggle['id'].'-'.$id.'" data-parent="#" data-toggle="collapse">'.$toggle['title'].'<span class="icon-angle-down"></span></a>
							</div>
							<div id="'.$toggle['id'].'-'.$id.'" class="accordion-body collapse">
								<div class="accordion-inner">'.$toggle['content'].'</div>
							</div>
						</div>';
		}
		
		$return = '<div id="toggleArea-'.$id.'" class="accordion">'.implode( "\n", $toggles ).'</div>';
	}
	
	return $return;
}

add_shortcode('ig_toggle_section', 'ig_toggles');

function ig_toggle($atts, $content){
	extract(shortcode_atts(array( 'title' => '%d', 'id' => '%d'), $atts));
	
	$x = $GLOBALS['toggle_count'];
	$GLOBALS['toggles'][$x] = array(
		'title' => sprintf( $title, $GLOBALS['toggle_count'] ),
		'content' =>  do_shortcode($content),
		'id' =>  $id );
	
	$GLOBALS['toggle_count']++;
}

add_shortcode( 'toggle', 'ig_toggle' );

// Tabs
function ig_tabs($atts, $content = null){
	$GLOBALS['tab_count'] = 0;
	do_shortcode( $content );
	
	$id = rand();
	$id = $id*rand(0,50);
	
	
	if( is_array( $GLOBALS['tabs'] ) ){
		
		foreach( $GLOBALS['tabs'] as $tab ){
			$tabs[] = '<li><a href="#'.$tab['id'].'-'.$id.'" data-toggle="tab">'.$tab['title'].'</a></li>';
			$panels[] = '<div id="'.$tab['id'].'-'.$id.'" class="tab-pane fade in">'.$tab['content'].'</div>';
			
		}
		
		$return = '<div class="tabbable"><ul id="myTab-'.$id.'" class="nav nav-tabs">'.implode( "\n", $tabs ).'</ul>
						<div class="tab-content">
							'.implode( "\n", $panels ).'
						</div>
					</div>';
	}
	
	return $return;
}

add_shortcode('ig_tab_section', 'ig_tabs');

function ig_tab($atts, $content){
	extract(shortcode_atts(array( 'title' => '%d', 'id' => '%d'), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array(
		'title' => sprintf( $title, $GLOBALS['tab_count'] ),
		'content' =>  do_shortcode($content),
		'id' =>  $id );
	
	$GLOBALS['tab_count']++;
}

add_shortcode( 'tab', 'ig_tab' );


// Alert Box
function ig_alert($atts, $content = null) {  
    extract(shortcode_atts(array("mode" => 'standard', "class" => ''), $atts));
	
	if($class)
	$class = ' '.esc_attr($class);
	
	switch ($mode) {
		case 'standard' :
			$alert_mode = '<div class="alert alert-standard fade in'.$class.'"><a class="close" href="#" data-dismiss="alert"><i class="icon-cancel4"></i></a>'. do_shortcode($content) .'</div>';
			break;
		case 'warning' :
			$alert_mode = '<div class="alert fade in'.$class.'"><a class="close" href="#" data-dismiss="alert"><i class="icon-cancel4"></i></a>'. do_shortcode($content) .'</div>';
			break;
		case 'error' :
			$alert_mode = '<div class="alert alert-error fade in'.$class.'"><a class="close" href="#" data-dismiss="alert"><i class="icon-cancel4"></i></a>'. do_shortcode($content) .'</div>';
			break;
		case 'info' :
			$alert_mode = '<div class="alert alert-info fade in'.$class.'"><a class="close" href="#" data-dismiss="alert"><i class="icon-cancel4"></i></a>'. do_shortcode($content) .'</div>';
			break;
		case 'success' :
			$alert_mode = '<div class="alert alert-success fade in'.$class.'"><a class="close" href="#" data-dismiss="alert"><i class="icon-cancel4"></i></a>'. do_shortcode($content) .'</div>';
			break;	
	}
    return $alert_mode;
}
add_shortcode('ig_alert_box_sh', 'ig_alert');

// Tootltip
function ig_tooltip($atts, $content = null) {  
    extract(shortcode_atts(array("mode" => 'top', "text" => 'Tooltip'), $atts));
	
	switch ($mode) {
		case 'top' :
			$tooltip_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="top">'. do_shortcode($content) .'</a>';
			break;
		case 'left' :
			$tooltip_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="left">'. do_shortcode($content) .'</a>';
			break;
		case 'right' :
			$tooltip_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="right">'. do_shortcode($content) .'</a>';
			break;
		case 'bottom' :
			$tooltip_mode = '<a href="#" data-toggle="tooltip" data-original-title="'.$text.'" data-placement="bottom">'. do_shortcode($content) .'</a>';
			break;
	}
    return $tooltip_mode;
}
add_shortcode('ig_tooltip', 'ig_tooltip');

// Highlights
function ig_highlight($atts, $content = null) {  
    extract(shortcode_atts(array("mode" => 'color-text'), $atts));
	
	switch ($mode) {
		case 'color-text' :
			$highlight_mode = '<span class="color-text">'. do_shortcode($content) .'</span>';
			break;
		case 'highlight-text' :
			$highlight_mode = '<span class="highlight-text">'. do_shortcode($content) .'</span>';
			break;
	}
    return $highlight_mode;
}
add_shortcode('ig_highlight', 'ig_highlight');

// DropCaps
function ig_dropcap($atts, $content = null) {  
    extract(shortcode_atts(array("mode" => 'dropcap-normal'), $atts));
	
	switch ($mode) {
		case 'dropcap-normal' :
			$dropcap_mode = '<p><span class="dropcap">'. do_shortcode($content) .'</span>';
			break;
		case 'dropcap-color' :
			$dropcap_mode = '<p><span class="dropcap-color">'. do_shortcode($content) .'</span>';
			break;
	}
    return $dropcap_mode;
}
add_shortcode('ig_dropcap', 'ig_dropcap');

// Lightbox Image
function ig_lightbox_image_sh($atts, $content = null) {  
    extract(shortcode_atts(array('image_url' => '', 'image_popup_url' => '', 'thumb_width' => '', 'title' => '', 'gallery_name' => '', 'class' => ''), $atts));
		
	if($class)
	$class = ' '.esc_attr($class);
	
	$output = null;
	
	$thumb_widht_to = (!empty($thumb_width) ? ' style="width: '.$thumb_width.'px; display: table-cell;"' : '');
	$thumb_display_to = (!empty($thumb_width) ? ' style="display: inline-block;"' : '');
	$thumb_width_img = (!empty($thumb_width) ? ' width='.$thumb_width.' ' : '');
	
	$fancy_gallery = (!empty($gallery_name) ? ' data-fancybox-group="'.$gallery_name.'" ' : '');

	$customFancyImg = (!empty($image_popup_url)) ? $image_popup_url : $image_url;
	
	$output .= '<div class="lightbox'.$class.'" '.$thumb_display_to.'>';
	$output .= '<a class="fancy-wrap fancybox" title="' . $title . '" href="' . $customFancyImg .'" '.$fancy_gallery.$thumb_widht_to.'>';
	$output .= '<img class="img-responsive" alt="'.$title.'" src="' . $image_url .'" '.$thumb_width_img.' />';
	$output .= '<span class="overlay"><span class="circle"><i class="icon-plus22"></i></span></span>';
	$output .= '</a>';
	$output .= '</div>';

	return $output;
	 
}
add_shortcode('ig_lightbox_image_sh', 'ig_lightbox_image_sh');

// Lightbox Video
function ig_lightbox_video_sh($atts, $content = null) {  
    extract(shortcode_atts(array('image_url' => '', 'thumb_width' => '', 'link_url' => '', 'title' => '', 'gallery_name' => '', 'class' => ''), $atts));
		
	if($class)
	$class = ' '.esc_attr($class);
	
	$output = null;
	
	$thumb_widht_to = (!empty($thumb_width) ? ' style="width: '.$thumb_width.'px; display: table-cell;"' : '');
	$thumb_display_to = (!empty($thumb_width) ? ' style="display: inline-block;"' : '');
	$thumb_width_img = (!empty($thumb_width) ? ' width='.$thumb_width.' ' : '');
	
	$fancy_gallery = (!empty($gallery_name) ? ' data-fancybox-group="'.$gallery_name.'" ' : '');
			
	$output .= '<div class="lightbox'.$class.'" '.$thumb_display_to.'>';
	$output .= '<a class="fancy-wrap fancybox-media" title="' . $title . '" href="' . $link_url .'" '.$fancy_gallery.$thumb_widht_to.'>';
	$output .= '<img class="img-responsive" alt="'.$title.'" src="' . $image_url .'" '.$thumb_width_img.' />';
	$output .= '<span class="overlay"><span class="circle"><i class="icon-play"></i></span></span>';
	$output .= '</a>';
	$output .= '</div>';

	return $output;
	 
}
add_shortcode('ig_lightbox_video_sh', 'ig_lightbox_video_sh');


// Button
function ig_button_sh($atts, $content = null) {  
    extract(shortcode_atts(array("buttonlabel" => '', "buttonlink" => '', "target" => '', "buttonsize" => '', "buttoncolor" => '', "inverted" => false, "icons" => '', "class" => ''), $atts));
	
	if($class)
	$class = ' '.esc_attr($class);
	
	$output = null;
	
	if ( $target == 'same' || $target == '_self' ) { $target = ''; }
	if ( $target != '' ) { $target = ' target="'.$target.'"'; }
	
	$icon_to = (!empty($icons) ? '<i class="'.$icons.'"></i>'  : '');
	
	$inverted_to = '';
	$buttonclass = null;
	if ($inverted==true) {
		$inverted_to = ' inverted';
		if( !empty($buttoncolor)) {
			$buttoncolor = ' style="background-color: '.$buttoncolor.'; border-color: '.$buttoncolor.'; color: '.$buttoncolor.';"';
			$buttonclass = ' custom-button-color'; 
		}
	} else {
		if( !empty($buttoncolor)) {
			$buttoncolor = ' style="background-color: '.$buttoncolor.'; border-color: '.$buttoncolor.';"';
			$buttonclass = ' custom-button-color'; 
		}
	}
	
	$output .= '<a class="button-main '.$buttonsize.$inverted_to.$buttonclass.$class.'"'.$buttoncolor.' href="'.$buttonlink.'"'.$target.'>'.$icon_to.$buttonlabel.'</a>';
	
	return $output;
}
add_shortcode('ig_button_sh', 'ig_button_sh');

// Social Share Buttons
function ig_social_share_sh($atts, $content = null) {
	extract(shortcode_atts(array("facebook" => 'false', "twitter" => 'false', "google_plus" => 'false', "pinterest" => 'false'), $atts));  
    
    global $post;
    $buttons = null;

	$buttons .= '<div class="ig-social-share">';
	
	if($facebook == 'true'){
    	$buttons .= '<div class="fb-like" data-href="'.get_permalink( $post->ID ).'" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div>';
    }
	
	if($twitter == 'true'){
    	$buttons .= '<a href="https://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink( $post->ID ).'">Tweet</a>';
    }
	
	if($google_plus == 'true'){
    	$buttons .= '<div class="g-plusone" data-size="medium" data-action="share" data-annotation="bubble"></div>';
    }

	if($pinterest == 'true'){
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
    	$buttons .= '<a class="pinterest-share" href="//www.pinterest.com/pin/create/button/?url='.get_permalink( $post->ID ).'&media='. esc_attr( $thumbnail[0] ).'&description='.get_the_title().'" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>';
    }
	
	$buttons .= '</div>';
	
    return $buttons;
}
add_shortcode('ig_social_share', 'ig_social_share_sh');


// Revolution Slider
function ig_slider( $atts, $content = null ) {
    extract(shortcode_atts(array("class" => '', "alias" => ''), $atts));
	
	$rev_markup = null;
	
	if($class)
	$class = ' '.esc_attr($class);

	$rev_markup .= '<div class="revolution_slider_container'.$class.'">';
	$rev_markup .= do_shortcode('[rev_slider '.$alias.']');
	$rev_markup .= '</div>';
	
	return $rev_markup;
}
add_shortcode('ig_slider', 'ig_slider');

// Video Embed
function ig_shortcode_video_embed( $atts, $content = null ) {
    extract(shortcode_atts(array("class" => '', "link" => ''), $atts));
	
	$video_embed_markup = null;
	
	if($class)
	$class = ' '.esc_attr($class);
	
	if ( $link == '' ) { return null; }
	
	global $wp_embed;
    $embed = $wp_embed->run_shortcode('[embed]'.$link.'[/embed]');

	$video_embed_markup .= '<div class="videoWrapper'.$class.'">' . $embed . '</div>';
	
	return $video_embed_markup;
}
add_shortcode('ig_video_embed', 'ig_shortcode_video_embed');


// Video Self Hosted
function ig_shortcode_video($atts, $content = null) {
	extract(shortcode_atts(array("class" => '', "title" => 'Title', 'webm_url' => null, 'mp4_url' => null, 'ogv_url' => null, 'image_url' => null), $atts));  
	$video_markup = null;
		
		if($class)
		$class = ' '.esc_attr($class);
	
		$id = rand();
		$id = $id*rand(1,50);
		
		$video_markup .= '<div class="video-container'.$class.'">
						    <video id="video-'.$id.'" class="video-js vjs-default-skin" preload="auto" style="width:100%; height:100%;" poster="'. $image_url .'">';
					 			if(!empty($webm_url)) { $video_markup .= '<source type="video/webm" src="'.$webm_url.'">'; }
                                if(!empty($mp4_url)) { $video_markup .= '<source type="video/mp4" src="'.$mp4_url.'">'; }
                                if(!empty($ogv_url)) { $video_markup .= '<source type="video/ogg" src="'.$ogv_url.'">'; }
		$video_markup .= '  </video>
						  </div>';
	
    return $video_markup;
	
}

add_shortcode('ig_video', 'ig_shortcode_video');

// Audio Self Hosted
function ig_shortcode_audio($atts, $content = null) {
	extract(shortcode_atts(array("class" => '', "title" => 'Title', 'mp3_url' => null), $atts));  
	$audio_markup = null;
	
	$id = rand();
	$id = $id*rand(1,50);
	
	$audio_markup .= 
		'<div class="audio-container'.$class.'">
			<div id="audio-'.$id.'">
				<audio style="width:100%; height:30px;" class="audio-js" controls="control" preload src="'. $mp3_url .'"></audio>
			</div>
		</div>';
	
    return $audio_markup;
}

add_shortcode('ig_audio', 'ig_shortcode_audio');


define('IG_TINYMCE_URI', get_template_directory_uri() . '/framework/shortcodes/tinymce');
define('IG_TINYMCE_DIR', get_template_directory_uri() . '/framework/shortcodes/tinymce');

?>