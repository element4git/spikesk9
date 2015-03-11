<?php
/*-----------------------------------------------------------------------------------

    Plugin Name: Custom Social Widget
    Plugin URI: http://www.8grids.com
    Description: A widget that displays your social icon profiles
    Version: 1.0
    Author: Jared Dias
    Author URI: http://www.8grids.com
-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*  Widget class
/*-----------------------------------------------------------------------------------*/

class ig_widget_social extends WP_Widget {
	
	function ig_widget_social() {
		// Widget settings
		$widget_ops = array(
			'classname' => 'social_widget', 
			'description' => __('Show your social Profiles.', INFINITE_LANGUAGE));

		// Create the widget
		$this->WP_Widget('social-widget', __('Social Profiles', INFINITE_LANGUAGE), $widget_ops);
	}

	function form($instance) {
		$defaults = array(
			'title' => 'Social Profiles',
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);
?>
		
	<p>
		<label><?php __('Title:', INFINITE_LANGUAGE); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
	</p>
		
<?php	
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		return $instance;
	}
	
	function widget($args, $instance) {
		
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		
		$output = '';
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title; 
		
		global $socials_profiles;
		$options = get_option('infinite_options');
	
		foreach ($socials_profiles as $social_profile):
		if( $options[$social_profile.'-url'] )
		{
			echo '<a href="'.$options[$social_profile.'-url'].'" target="_blank"><i class="icon-'.$social_profile.'"></i></a>';
		}
		
		endforeach;

		
		echo $output;
							
		echo $after_widget;

	}
		
}

add_action( 'widgets_init', 'ig_widget_social_init' );

function ig_widget_social_init() {
	register_widget('ig_widget_social');
}

?>
