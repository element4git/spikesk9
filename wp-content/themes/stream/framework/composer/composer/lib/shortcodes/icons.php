<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Box Icon
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Icon extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $animation_delay = $icon = $icon_color = $custom_icon_color = $icon_size = $el_class = '';
      extract( shortcode_atts( array(
	    'loading_position_choice' => '',
		'loading_position' => '',
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'animation_delay' => '',
		'icon_color' => '',
		'custom_icon_color' => '',
		'icon_size' => '',
	  	'icon' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
      $el_class = $this->getExtraClass($el_class);
	  
	  $loading_position_class = null;
	  if ($loading_position_choice == "yes") {
		$loading_position_class = $loading_position;
	  }
	  
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

	  $icon_custom_value = null;
	  if ($icon_color=="custom" && !empty($icon_size)) { $icon_custom_value = ' style="color:'.$custom_icon_color.'; font-size:'.$icon_size.'px;"'; }
	  else if (!empty($icon_size)) { $icon_custom_value = ' style="font-size:'.$icon_size.'px;"'; }
	  
	  $class = setClass(array($icon, $el_class, $animation_loading_class, $animation_effect_class, $loading_position_class));
	  $output .= '<i'.$class.''.$animation_delay_class.$icon_custom_value.'></i>';
      
      return $output.$this->endBlockComment('ig_icon')."\n";
  }
}

?>