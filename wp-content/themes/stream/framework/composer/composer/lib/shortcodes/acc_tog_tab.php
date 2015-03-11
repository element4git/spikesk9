<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Accordion / Toggle / Tab / Testimonial
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Acc_Container extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $animation_delay = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'animation_delay' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
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
        
	  $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'accordion-builder'.$el_class, $this->settings['base']);
	  $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));
	  
	  $output .= '<div'.$class.''.$animation_delay_class.'>'.wpb_js_remove_wpautop($content).'</div>';
	
	  return $output.$this->endBlockComment('ig_acc_container')."\n";
  }
}

class WPBakeryShortCode_IG_Tog_Container extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $animation_delay = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'animation_delay' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
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
        
	  $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'toggle-builder'.$el_class, $this->settings['base']);
	  $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));

	  $output .= '<div'.$class.''.$animation_delay_class.'>'.wpb_js_remove_wpautop($content).'</div>';
	
	  return $output.$this->endBlockComment('ig_tog_container')."\n";
  }
}

class WPBakeryShortCode_IG_Tab_Container extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $animation_delay = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'animation_delay' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
      
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
	    
	  $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tab-builder'.$el_class, $this->settings['base']);
	  $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));

	  $output .= '<div'.$class.''.$animation_delay_class.'>'.wpb_js_remove_wpautop($content).'</div>';
	
	  return $output.$this->endBlockComment('ig_tab_container')."\n";
  }
}

class WPBakeryShortCode_IG_Testimonial_Container extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
      
	  $animation_loading_class = null;
	  if ($animation_loading == "yes") {
		$animation_loading_class = 'animated-content';
	  }
	  
	  $animation_effect_class = null;
	  if ($animation_loading == "yes") {
		$animation_effect_class = $animation_loading_effects;
	  }
	    
	  $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'testimonial-builder'.$el_class, $this->settings['base']);
	  $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));

	  $output .= '<div'.$class.'>'.wpb_js_remove_wpautop($content).'</div>';
	
	  return $output.$this->endBlockComment('ig_testimonial_container')."\n";
  }
}
?>