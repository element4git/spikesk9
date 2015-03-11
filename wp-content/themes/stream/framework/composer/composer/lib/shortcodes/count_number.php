<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Count Number
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Count_Number extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $number_field = $number_value_from = $number_value_to = $number_speed = $checkicon = $icon = $el_class = '';
      extract( shortcode_atts( array(
	  	  'animation_loading' => '',
		    'animation_loading_effects' => '',
        'number_field' => '',
        'number_value_from' => '',
        'number_value_to' => '',
        'number_speed' => '',
        'checkicon' => '',
        'icon' => '',
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

      if ($checkicon=="custom_icon") { $icon = '<div class="count-number-icon textaligncenter"><i class="'.$icon.'"></i></div>'; } else { $icon = ""; }
  	  
  		$class = setClass(array('counter-number', $el_class, $animation_loading_class, $animation_effect_class));

  		$output .= '<div'.$class.'>'.$icon.'';
  		$output .= '<span class="number-value timer" data-from="'.$number_value_from.'" data-to="'.$number_value_to.'" data-speed="'.$number_speed.'"></span>';
  		$output .= '<span class="number-field">'.$number_field.'</span>';
  		$output .= '</div>';
      
      return $output . $this->endBlockComment('ig_count_number') . "\n";
  }
}
?>