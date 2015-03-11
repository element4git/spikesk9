<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Button
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Buttons extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $button_style = $animation_loading = $animation_loading_effects = $animation_delay = $buttonlabel = $buttonlink = $target = $buttonsize = $inverted = $checkicon = $icon = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'animation_delay' => '',
	  	'buttonlabel' => '',
        'buttonlink' => '',
        'target' => '',
        'buttonsize' => '',
		'button_style' => '',
        'buttoncolor' => '',
        'custombuttoncolor' => '',
		'checkicon' => '',
		'icon' => '',
		'inverted' => false,
        'el_class' => ''
      ), $atts ) );
      $output = '';
      $el_class = $this->getExtraClass($el_class);
	  
      
	  if ( $target == 'same' || $target == '_self' ) { $target = ''; }
      if ( $target != '' ) { $target = ' target="'.$target.'"'; }
	  
	  if ($checkicon=="custom_icon") { $icon = '<i class="'.$icon.'"></i>'; } else { $icon = ""; }

	  $inverted_to = '';
	  $buttonclass = null;
	  if ($inverted==true) {
		$inverted_to = ' inverted';
		if($buttoncolor=="custom") {
			$buttoncolor = ' style="background-color: '.$custombuttoncolor.'; border-color: '.$custombuttoncolor.'; color: '.$custombuttoncolor.';"';
			$buttonclass = ' custom-button-color'; 
		}
	  } else {
	  	if($buttoncolor=="custom") {
			$buttoncolor = ' style="background-color: '.$custombuttoncolor.'; border-color: '.$custombuttoncolor.';"';
			$buttonclass = ' custom-button-color'; 
		}
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
	  
	  $class = setClass(array('button-main', $el_class, $buttonsize, $buttonclass, $inverted_to, $animation_loading_class, $animation_effect_class, $button_style));

	  $output .= '<a'.$class.$buttoncolor.' href="'.$buttonlink.'"'.$target.''.$animation_delay_class.'>'.$icon.$buttonlabel.'</a>';
      
      return $output.$this->endBlockComment('ig_buttons')."\n";
  }
}

?>