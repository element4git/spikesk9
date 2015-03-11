<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Special Heading
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Special_Heading extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $animation_delay = $heading_type = $heading_style = $heading_align = $heading_color = $custom_heading_color = $heading_size = $custom_heading_size = $padding_bottom_heading = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'animation_delay' => '',
		'heading_type' => '',
		'heading_style' => '',
		'heading_align' => '',
		'heading_color' => '',
		'custom_heading_color' => '',
		'heading_size' => '',
		'custom_heading_size' => '',
		'padding_bottom_heading' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);

	  $heading_setup = null;
	  if ($heading_color=="custom" && $heading_size=="custom") { $heading_setup = ' style="color: '.$custom_heading_color.'; font-size: '.$custom_heading_size.'px;"'; }
	  else if ($heading_size=="custom") { $heading_setup = ' style="font-size: '.$custom_heading_size.'px;"'; }
	  else if ($heading_color=="custom") { $heading_setup = ' style="color: '.$custom_heading_color.';"'; }

	  $padding_bottom_heading = ' style="padding-bottom: '.$padding_bottom_heading.'px;"';
	  
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
	  
	  $class = setClass(array('special-heading', $heading_align, $heading_style, $el_class, $animation_loading_class, $animation_effect_class));

	  $output .= '<div'.$class.''.$animation_delay_class.''.$padding_bottom_heading.'>';
	  $output .= '<h'. $heading_type . $heading_setup .' class="'.$heading_style.'">'.wpb_js_remove_wpautop($content).'</h'. $heading_type. '>';
	  $output .= '</div>';
	
	  return $output.$this->endBlockComment('ig_special_heading')."\n";
  }
}

?>