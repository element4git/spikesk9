<?php
/**
* WPBakery Visual Composer shortcodes
*
* @package WPBakeryVisualComposer
*
*/

class WPBakeryShortCode_IG_Divider extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $margin_top_value = $margin_bottom_value = $animation_loading = $animation_loading_effects = $animation_delay = $div_type = $el_class = '';
        extract(shortcode_atts(array(
			'margin_top_value' => '',
			'margin_bottom_value' => '',
			'animation_loading' => '',
			'animation_loading_effects' => '',
			'animation_delay' => '',
			'div_type' => '',
            'el_class' => ''
        ), $atts));

        $output = '';
		
		$margin_top_value = 'margin-top: '.$margin_top_value.'px; ';
		$margin_bottom_value = 'margin-bottom: '.$margin_bottom_value.'px;';
		
		if ( $div_type=="short") { $div_type = ' short'; }
		
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
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'divider '.$el_class, $this->settings['base']);
        $class = setClass(array($css_class, $div_type, $animation_loading_class, $animation_effect_class));

		$output .= '<div'.$class.''.$animation_delay_class.' style="'.$margin_top_value.$margin_bottom_value.'"></div>'.$this->endBlockComment('ig_divider')."\n";

        return $output;
    }
	
	public function outputTitle($title) {
        return '';
    }
	
}

class WPBakeryShortCode_IG_Blank_Divider extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $height_value = $el_class = '';
        extract(shortcode_atts(array(
			'height_value' => '',
            'el_class' => ''
        ), $atts));

        $output = '';
		
		$height_value = ' style="height: '.$height_value.'px;"';
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'blank_divider '.$el_class, $this->settings['base']);
        $class = setClass(array($css_class));

		$output .= '<div'.$class.''.$height_value.'></div>'.$this->endBlockComment('ig_blank_divider')."\n";

        return $output;
    }
	
	public function outputTitle($title) {
        return '';
    }
	
}

?>