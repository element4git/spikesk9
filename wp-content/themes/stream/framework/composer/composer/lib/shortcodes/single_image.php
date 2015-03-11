<?php
/**
* WPBakery Visual Composer shortcodes
*
* @package WPBakeryVisualComposer
*
*/

// LightBox Image
class WPBakeryShortCode_IG_Single_Image extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        $animation_loading = $animation_loading_effects = $animation_delay = $el_class = $image = $image_mode = $image_alignment = $image_link = $image_link_url = $target = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
			'animation_delay' => '',
            'el_class' => '',
			'image' => $image,
			'image_mode' => '',
			'image_alignment' => '',
			'image_link' => '',
			'image_link_url' => '',
			'target' => ''
        ), $atts));

        $output = '';
		$img_id = preg_replace('/[^\d]/', '', $image);
			
        $el_class = $this->getExtraClass($el_class);

        if ( $target == 'same' || $target == '_self' ) { $target = ''; }
      	if ( $target != '' ) { $target = ' target="'.$target.'"'; }
		
		$image_string = wp_get_attachment_image_src( $img_id, 'full');
		$image_string = $image_string[0];
		$image_title = get_the_title($img_id);
		
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

		$img_output = null;
		if ($image_link == "yes") {
			$img_output = '<a href="'.$image_link_url.'" title="'.$image_title.'"'.$target.'><img class="'.$image_mode.' '.$image_alignment.' '.$animation_loading_class.' '.$animation_effect_class.' '.$el_class.'" alt="'.$image_title.'" src="'.$image_string.'" /></a>';
		} else {
			$img_output = '<img class="'.$image_mode.' '.$image_alignment.' '.$animation_loading_class.' '.$animation_effect_class.' '.$el_class.'" alt="'.$image_title.'" src="'. $image_string .'" />';
		}
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'single-image', $this->settings['base']);
        $class = setClass(array($css_class));

		$output .= '<div'.$class.''.$animation_delay_class.'>';
		$output .= $img_output;
		$output .= '</div>'.$this->endBlockComment('ig_single_image')."\n";

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

?>
