<?php
/**
 * Tools Functions
 * @package MegaMain
 * @subpackage MegaMain
 * @since mm 1.0
 */

if ( !class_exists( 'mm_datastore' ) ) {
	class mm_datastore {
		/** 
		 * The function returns a list of available social icons.
		 * @return $social_icons - array with list of available social icons.
		 */
		public static function get_social_icons() {
			$social_icons = array(
				'Share' => 'im-icon-share-2',
				'Blogger' => 'im-icon-blogger',
				'Delicious' => 'im-icon-delicious',
				'Deviantart' => 'im-icon-deviantart-2',
				'Dribbble' => 'im-icon-dribble',
				'Facebook' => 'im-icon-facebook',
				'Flattr' => 'im-icon-flattr',
				'Flickr' => 'im-icon-flickr',
				'Forrst' => 'im-icon-forrst',
				'Foursquare' => 'im-icon-foursquare-2',
				'Github' => 'im-icon-github-3',
				'Google Drive' => 'im-icon-google-drive',
				'Google Plus' => 'im-icon-google-plus',
				'Instagram' => 'im-icon-instagram',
				'Joomla' => 'im-icon-joomla',
				'Lanyrd' => 'im-icon-lanyrd',
				'Lastfm' => 'im-icon-lastfm',
				'Linkedin' => 'im-icon-linkedin',
				'Mail' => 'im-icon-envelop',
				'Picassa' => 'im-icon-picassa',
				'Pinterest' => 'im-icon-pinterest-2',
				'Reddit' => 'im-icon-reddit',
				'RSS' => 'im-icon-feed-2',
				'Skype' => 'im-icon-skype',
				'Stackoverflow' => 'im-icon-stackoverflow',
				'Steam' => 'im-icon-steam',
				'Stumbleupon' => 'im-icon-stumbleupon',
				'Tumblr' => 'im-icon-tumblr',
				'Twitter' => 'im-icon-twitter',
				'Vimeo' => 'im-icon-vimeo',
				'Vk' => 'fa-icon-icon-vk',
				'Wordpress' => 'im-icon-wordpress',
				'Xing' => 'im-icon-xing',
				'Yahoo' => 'im-icon-yahoo',
				'Yelp' => 'im-icon-yelp',
				'Youtube' => 'im-icon-youtube',
			);
			return $social_icons;
		}

		/** 
		 * The function return a array with all availables font-icons.
		 * @return $all_icons.
		 */
		public static function get_all_icons() {
			global $infinite_icons;
			$icomoon = $infinite_icons;

			$all_icons = array();
			foreach( $icomoon as $value ) {
				$all_icons[$value] = ucwords( str_replace( array( 'im-icon-','-'), array( '',' '), $value ) ) . ' (IcoMoon)';
			}
			asort( $all_icons );
			$all_icons = array_flip( $all_icons );
			
			return $all_icons;
		}

		/** 
		 * The function returns a list of available social icons.
		 * @return $social_icons - array with list of available social icons.
		 */
		public static function get_list_of_animations () {
			$social_icons = array(
				'None' => '',
				'Attention Seekers:' => 'bounce',
				' &nbsp; &nbsp; bounce' => 'bounce',
				' &nbsp; &nbsp; flash' => 'flash',
				' &nbsp; &nbsp; pulse' => 'pulse',
				' &nbsp; &nbsp; rubberBand' => 'rubberBand',
				' &nbsp; &nbsp; shake' => 'shake',
				' &nbsp; &nbsp; swing' => 'swing',
				' &nbsp; &nbsp; tada' => 'tada',
				' &nbsp; &nbsp; wobble' => 'wobble',
				'Bouncing:' => 'bounceIn',
				' &nbsp; &nbsp; bounceIn' => 'bounceIn',
				' &nbsp; &nbsp; bounceInDown' => 'bounceInDown',
				' &nbsp; &nbsp; bounceInLeft' => 'bounceInLeft',
				' &nbsp; &nbsp; bounceInRight' => 'bounceInRight',
				' &nbsp; &nbsp; bounceInUp' => 'bounceInUp',
				'Fading:' => 'fadeIn',
				' &nbsp; &nbsp; fadeIn' => 'fadeIn',
				' &nbsp; &nbsp; fadeInDown' => 'fadeInDown',
				' &nbsp; &nbsp; fadeInDownBig' => 'fadeInDownBig',
				' &nbsp; &nbsp; fadeInLeft' => 'fadeInLeft',
				' &nbsp; &nbsp; fadeInLeftBig' => 'fadeInLeftBig',
				' &nbsp; &nbsp; fadeInRight' => 'fadeInRight',
				' &nbsp; &nbsp; fadeInRightBig' => 'fadeInRightBig',
				' &nbsp; &nbsp; fadeInUp' => 'fadeInUp',
				' &nbsp; &nbsp; fadeInUpBig' => 'fadeInUpBig',
				'Flippers:' => 'flip',
				' &nbsp; &nbsp; flip' => 'flip',
				' &nbsp; &nbsp; flipInX' => 'flipInX',
				' &nbsp; &nbsp; flipInY' => 'flipInY',
				'Rotating:' => 'rotateIn',
				' &nbsp; &nbsp; rotateIn' => 'rotateIn',
				' &nbsp; &nbsp; rotateInDownLeft' => 'rotateInDownLeft',
				' &nbsp; &nbsp; rotateInDownRight' => 'rotateInDownRight',
				' &nbsp; &nbsp; rotateInUpLeft' => 'rotateInUpLeft',
				' &nbsp; &nbsp; rotateInUpRight' => 'rotateInUpRight',
				'Sliders:' => 'slideInDown',
				' &nbsp; &nbsp; slideInDown' => 'slideInDown',
				' &nbsp; &nbsp; slideInLeft' => 'slideInLeft',
				' &nbsp; &nbsp; slideInRight' => 'slideInRight',
				' &nbsp; &nbsp; slideInUp' => 'slideInUp',
				'Specials:' => 'hinge',
				' &nbsp; &nbsp; rollIn' => 'rollIn',
				' &nbsp; &nbsp; lightSpeedIn' => 'lightSpeedIn',
			);
			return $social_icons;
		}
	}
}
?>