<?php
/**
* WPBakery Visual Composer shortcodes
*
* @package WPBakeryVisualComposer
*
*/

// LightBox Image
class WPBakeryShortCode_IG_Lightbox_Image extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        $animation_loading = $animation_loading_effects = $animation_delay = $el_class = $image = $image_popup = $title = $thumb_widht = $gallery_name = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
			'animation_delay' => '',
            'el_class' => '',
			'image' => $image,
			'image_popup' => $image_popup,
			'thumb_widht' => '',
			'gallery_name' => '',
			'title' => ''
        ), $atts));

        $output = '';
		$img_id = preg_replace('/[^\d]/', '', $image);
		$img_popup_id = preg_replace('/[^\d]/', '', $image_popup);
			
        $el_class = $this->getExtraClass($el_class);
		
		$thumb_widht_to = (!empty($thumb_widht) ? ' style="width:'.$thumb_widht.'px; display: table-cell;"' : '');
		$thumb_display_to = (!empty($thumb_widht) ? ' style="display: inline-block;"' : '');
		$thumb_width_img = (!empty($thumb_widht) ? ' width='.$thumb_widht.' ' : '');
		
		$fancy_gallery = (!empty($gallery_name) ? ' data-fancybox-group="'.$gallery_name.'" ' : '');
		
		$image_string = wp_get_attachment_image_src( $img_id, 'full');
		$image_string = $image_string[0];

		$image_popup_string = wp_get_attachment_image_src( $img_popup_id, 'full');
		$image_popup_string = $image_popup_string[0];

		$customImgPopUp = (!empty($image_popup_string)) ? $image_popup_string : $image_string;
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}

		$animation_delay_class = null;
		if ($animation_loading == "yes" && !empty($animation_delay)) {
			$animation_delay_class = ' data-delay="'.$animation_delay.'"';
		}
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'lightbox'.$el_class, $this->settings['base']);
        $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));

		$output .= '<div'.$class.''.$animation_delay_class.''.$thumb_display_to.'>';
		$output .= '<a class="fancy-wrap fancybox" title="' . $title . '" href="' . $customImgPopUp .'" '.$fancy_gallery.$thumb_widht_to.'>';
		$output .= '<img class="img-responsive" alt="'.$title.'" src="' . $image_string .'" '.$thumb_width_img.' />';
		$output .= '<span class="overlay"><span class="circle"><i class="icon-plus22"></i></span></span>';
		$output .= '</a>';
		$output .= '</div>'.$this->endBlockComment('ig_lightbox_image')."\n";

        return $output;
    }
	
	public function singleParamHtmlHolder($param, $value) {
        $output = '';
        // Compatibility fixes
        $old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
        $new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
        $value = str_ireplace($old_names, $new_names, $value);
        //$value = __($value, "INFINITE_LANGUAGE");
        //
        $param_name = isset($param['param_name']) ? $param['param_name'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $class = isset($param['class']) ? $param['class'] : '';

        if ( isset($param['holder']) == false || $param['holder'] == 'hidden' ) {
            $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" />';
            if(($param['param_name'])=='image') {
                $img = wpb_getImageBySize(array( 'attach_id' => (int)preg_replace('/[^\d]/', '', $value), 'thumb_size' => 'medium' ));
                $output .= ( $img ? $img['medium'] : '<img width="50" height="50" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />') . '<img src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/elements_icons/single_image.png') . '" class="no_image_image' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'INFINITE_LANGUAGE' ) . '</a>';
            }
        }
        else {
            $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
        }
        return $output;
    }
	
}

// LightBox Video
class WPBakeryShortCode_IG_Lightbox_Video extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        $animation_loading = $animation_loading_effects = $animation_delay = $el_class = $image = $title = $thumb_widht = $gallery_name = $link_url = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
			'animation_delay' => '',
            'el_class' => '',
			'imgmode' => '',
			'image' => $image,
			'thumb_widht' => '',
			'link_url' => '',
			'gallery_name' => '',
			'title' => ''
        ), $atts));

        $output = '';
		$img_id = preg_replace('/[^\d]/', '', $image);
			
        $el_class = $this->getExtraClass($el_class);
		
		$thumb_widht_to = (!empty($thumb_widht) ? ' style="width:'.$thumb_widht.'px; display: table-cell;" ' : '');
		$thumb_display_to = (!empty($thumb_widht) ? ' style="display: inline-block;"' : '');
		$thumb_width_img = (!empty($thumb_widht) ? ' width='.$thumb_widht.' ' : '');
		
		$fancy_gallery = (!empty($gallery_name) ? ' data-fancybox-group="'.$gallery_name.'" ' : '');
		
		$image_string = wp_get_attachment_image_src( $img_id, 'full');
		$image_string = $image_string[0];
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}

		$animation_delay_class = null;
	  	if ($animation_loading == "yes" && !empty($animation_delay)) {
			$animation_delay_class = ' data-delay="'.$animation_delay.'"';
	  	}
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'lightbox'.$el_class, $this->settings['base']);
        $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));

		$output .= '<div'.$class.''.$animation_delay_class.''.$thumb_display_to.'>';
		$output .= '<a class="fancy-wrap fancybox-media" title="' . $title . '" href="' . $link_url .'" '.$fancy_gallery.$thumb_widht_to.'>';
		$output .= '<img class="img-responsive" alt="'.$title.'" src="' . $image_string .'" '.$thumb_width_img.' />';
		$output .= '<span class="overlay"><span class="circle"><i class="icon-play10"></i></span></span>';
		$output .= '</a>';
		$output .= '</div>'.$this->endBlockComment('ig_lightbox_video')."\n";

        return $output;
    }
	
	public function singleParamHtmlHolder($param, $value) {
        $output = '';
        // Compatibility fixes
        $old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
        $new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
        $value = str_ireplace($old_names, $new_names, $value);
        //$value = __($value, "INFINITE_LANGUAGE");
        //
        $param_name = isset($param['param_name']) ? $param['param_name'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $class = isset($param['class']) ? $param['class'] : '';

        if ( isset($param['holder']) == false || $param['holder'] == 'hidden' ) {
            $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" />';
            if(($param['type'])=='attach_image') {
                $img = wpb_getImageBySize(array( 'attach_id' => (int)preg_replace('/[^\d]/', '', $value), 'thumb_size' => 'medium' ));
                $output .= ( $img ? $img['medium'] : '<img width="50" height="50" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />') . '<img src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/elements_icons/single_image.png') . '" class="no_image_image' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'INFINITE_LANGUAGE' ) . '</a>';
            }
        }
        else {
            $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
        }
        return $output;
    }
	
}

// LightBox Image Gallery
class WPBakeryShortCode_IG_Lightbox_Image_Gallery extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        $animation_loading = $animation_loading_effects = $animation_delay = $el_class = $image = $images_gallery = $title = $thumb_widht = $gallery_name = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
			'animation_delay' => '',
            'el_class' => '',
			'image' => $image,
			'images_gallery' => '',
			'thumb_widht' => '',
			'gallery_name' => '',
			'title' => ''
        ), $atts));

        $output = '';
		$img_id = preg_replace('/[^\d]/', '', $image);
		$images = explode(',', $images_gallery);
			
        $el_class = $this->getExtraClass($el_class);
		
		$thumb_widht_to = (!empty($thumb_widht) ? ' style="width:'.$thumb_widht.'px; display: table-cell;"' : '');
		$thumb_display_to = (!empty($thumb_widht) ? ' style="display: inline-block;"' : '');
		$thumb_width_img = (!empty($thumb_widht) ? ' width='.$thumb_widht.' ' : '');
		
		$fancy_gallery = (!empty($gallery_name) ? ' data-fancybox-group="'.$gallery_name.'" ' : '');
		
		$image_string = wp_get_attachment_image_src( $img_id, 'full');
		$image_string = $image_string[0];
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
		}

		$animation_delay_class = null;
	  	if ($animation_loading == "yes" && !empty($animation_delay)) {
			$animation_delay_class = ' data-delay="'.$animation_delay.'"';
	  	}
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'lightbox lightbox-gallery'.$el_class, $this->settings['base']);
        $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));

		$output .= '<div'.$class.''.$animation_delay_class.''.$thumb_display_to.'>';
		$output .= '<a class="fancy-wrap fancybox" title="' . $title . '" href="' . $image_string .'" '.$fancy_gallery.$thumb_widht_to.'>';
		$output .= '<img class="img-responsive" alt="'.$title.'" src="' . $image_string .'" '.$thumb_width_img.' />';
		$output .= '<span class="overlay"><span class="circle"><i class="icon-plus22"></i></span></span>';
		$output .= '</a>';

		if(!empty($images_gallery)){
			foreach($images as $image):
				$src = wp_get_attachment_image_src( $image, 'full' );
				$alt = ( get_post_meta($image, '_wp_attachment_image_alt', true) ) ? get_post_meta($image, '_wp_attachment_image_alt', true) : '';
				$output .= '<a class="fancy-wrap fancybox hidden" title="'.$alt.'" href="'.$src[0].'" '.$fancy_gallery.'></a>';
			endforeach;
		}

		$output .= '</div>'.$this->endBlockComment('ig_lightbox_image_gallery')."\n";

        return $output;
    }
	
	public function singleParamHtmlHolder($param, $value) {
        $output = '';
        // Compatibility fixes
        $old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
        $new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
        $value = str_ireplace($old_names, $new_names, $value);
        //$value = __($value, "INFINITE_LANGUAGE");
        //
        $param_name = isset($param['param_name']) ? $param['param_name'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $class = isset($param['class']) ? $param['class'] : '';

        if ( isset($param['holder']) == false || $param['holder'] == 'hidden' ) {
            $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" />';
            if(($param['param_name'])=='image') {
                $img = wpb_getImageBySize(array( 'attach_id' => (int)preg_replace('/[^\d]/', '', $value), 'thumb_size' => 'medium' ));
                $output .= ( $img ? $img['medium'] : '<img width="50" height="50" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />') . '<img src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/elements_icons/single_image.png') . '" class="no_image_image' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'INFINITE_LANGUAGE' ) . '</a>';
            }
        }
        else {
            $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
        }
        return $output;
    }
	
}

?>
