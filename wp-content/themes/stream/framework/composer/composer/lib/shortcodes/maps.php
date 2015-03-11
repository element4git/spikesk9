<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Google Maps
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Google_Maps extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $marker = $zoom = $latitude = $longitude = $image = $content  = $el_class = '';
      extract( shortcode_atts( array(
	  	'marker' => '',
        'zoom' => '',
		'latitude' => '',
		'longitude' => '',
        'image' => $image,
        'content' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  $img_id = preg_replace('/[^\d]/', '', $image);
	  $image_string = wp_get_attachment_image_src( $img_id, 'full');
	  $image_string = $image_string[0];	  
	  $options = get_option('infinite_options');
	  
	  $output .= '<div class="map" id="map_1" data-mapLat="'.$latitude.'" data-mapLon="'.$longitude.'" data-mapZoom="'.$zoom.'" data-extra-color="'.$options['accent-color'].'" data-mapTitle="'.$marker.'" data-marker-img="'.$image_string.'" data-info="'.$content.'">';
	  $output .= '</div>';
      
      return $output.$this->endBlockComment('ig_google_maps')."\n";
  }
}

?>