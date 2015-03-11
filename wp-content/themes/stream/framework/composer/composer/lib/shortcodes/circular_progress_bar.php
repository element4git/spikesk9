<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Circular Progress Bar
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Circular_Progress_Bar extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
     $animation_loading = $animation_loading_effects = $animation_delay = $circular_field = $circular_percentage = $circular_bgcolor = $circular_trackcolor = $circular_size = $circular_line = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'animation_delay' => '',
        'circular_field' => '',
        'circular_percentage' => '',
        'circular_bgcolor' => '',
        'circular_trackcolor' => '',
		'circular_size' => '',
		'circular_line' => '',
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
	  
	  // Control Size and Line Width of Circle Progress Bar
	  if( !empty($circular_size)) {
		  $size_output = $circular_size;
	  } else {
		  $size_output = 220;
	  }
	  
	  if( !empty($circular_line)) {
		  $line_output = $circular_line;
	  } else {
		  $line_output = 24;
	  }
	 
		$class = setClass(array('chart-circle', $el_class, $animation_loading_class, $animation_effect_class));
		  	
		$output .= '<div'.$class.''.$animation_delay_class.'>';
		$output .= '<div class="chart" data-bgcolor="'.$circular_bgcolor.'" data-trackcolor ="'.$circular_trackcolor.'" data-size="'.$size_output.'" data-line="'.$line_output.'" data-percent="'.$circular_percentage.'"><span class="percentage">'.$circular_percentage.'</span></div>';
		$output .= '<h5 class="field">'.$circular_field.'</h5>';
		$output .= '</div>';
      
      	return $output . $this->endBlockComment('ig_circular_progress_bar') . "\n";
  }
}

?>