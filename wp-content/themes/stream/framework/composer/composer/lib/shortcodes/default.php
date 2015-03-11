<?php
/**
 */

/* This shortcode is used for columns and text containers output
---------------------------------------------------------- */

class WPBakeryShortCode_VC_Column_text extends WPBakeryShortCode {

    public function content( $atts, $content = null ) {

        $animation_loading = $animation_loading_effects = $animation_delay = $el_class = $width = $el_position = '';

        extract(shortcode_atts(array(
			'animation_loading' => '',
			'animation_loading_effects' => '',
            'animation_delay' => '',
            'el_class' => '',
            'el_position' => '',
            'width' => '1/2'
        ), $atts));

        $output = '';

        $el_class = $this->getExtraClass($el_class);
        $width = '';//wpb_translateColumnWidthToSpan($width);
		
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
		
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'text-block'.$width.$el_class, $this->settings['base']);
        $class = setClass(array($css_class, $animation_loading_class, $animation_effect_class));

        $output .= '<div'.$class.''.$animation_delay_class.'>';
        $output .= wpb_js_remove_wpautop($content);
        $output .= '</div>'.$this->endBlockComment($width);

        $output = $this->startRow($el_position).$output.$this->endRow($el_position);
        return $output;
    }
}

class WPBakeryShortCode_VC_Widget_sidebar extends WPBakeryShortCode {

    protected function content($atts, $content = null) {
        $el_position = $title = $width = $el_class = $sidebar_id = '';
        extract(shortcode_atts(array(
            'el_position' => '',
            'title' => '',
            'width' => '1/1',
            'el_class' => '',
            'sidebar_id' => ''
        ), $atts));
        if ( $sidebar_id == '' ) return null;

        $output = '';
        $el_class = $this->getExtraClass($el_class);
        $width = '';//wpb_translateColumnWidthToSpan($width);

        ob_start();
        dynamic_sidebar($sidebar_id);
        $sidebar_value = ob_get_contents();
        ob_end_clean();

        $sidebar_value = trim($sidebar_value);
        $sidebar_value = (substr($sidebar_value, 0, 3) == '<li' ) ? '<ul>'.$sidebar_value.'</ul>' : $sidebar_value;
        //
        $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'sidebar'.$width.$el_class, $this->settings['base']);
        $output .= '<div class="'.$css_class.'">';
        $output .= '<div class="sidebar_content">';
        //$output .= ($title != '' ) ? "\n\t\t\t".'<h2 class="wpb_heading wpb_widgetised_column_heading">'.$title.'</h2>' : '';
        $output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_widgetised_column_heading'));
        $output .= $sidebar_value;
        $output .= '</div>'.$this->endBlockComment('.wpb_wrapper');
        $output .= '</div>'.$this->endBlockComment($width);
        //
        $output = $this->startRow($el_position).$output.$this->endRow($el_position);
        return $output;
    }
}

add_shortcode('rev_slider_vc', 'rev_slider_vc_func');
function rev_slider_vc_func($atts = '', $content = NULL, $tag) {
  extract( shortcode_atts( array(
      'alias' => '',
      'el_class' => ''
   ), $atts ) );
   
   $el_class = ($el_class!='') ? ' ' . $el_class : '';
   $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'revolution_slider_container'.$el_class, $tag);
   $output = '<div class="'.$css_class.'">';
   $output .= do_shortcode('[rev_slider '.$alias.']');
   $output .= '</div>';
   return $output;
}