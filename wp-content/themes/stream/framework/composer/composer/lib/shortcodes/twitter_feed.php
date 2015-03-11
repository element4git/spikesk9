<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Big Twitter Feed
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Recent_Tweets extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $animation_loading = $animation_loading_effects = $twitter_mode = $twitter_username = $num_tweet = $el_class = '';
      extract( shortcode_atts( array(
	  	'animation_loading' => '',
		'animation_loading_effects' => '',
		'twitter_mode' => '',
        'twitter_username' => '',
		'num_tweet' => '',
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

	  $twitter_slides_class = null;
	  if ($twitter_mode == "more_tweet") {
		$twitter_slides_class = 'slides';
	  }
	  
	  $class = setClass(array('tweet_list', $el_class, $animation_loading_class, $animation_effect_class, $twitter_slides_class));
	  $output .= '<div id="twitter-feed">
	  				<ul'.$class.'>';

	  if ($twitter_mode == "one_tweet") {
	  	$num_tweet = 1;
	  	$tweets = getTweets($num_tweet, $twitter_username);
	  	foreach($tweets as $tweet) {
		
		$output .= '
	  		<li>
				<span class="twittericon"><i class="icon-twitter_alt"></i></span>
				<p class="tweet_text">' . TwitterFilter($tweet['text']) . '</p>
				<p class="tweet_time"><a href="https://twitter.com/' . $twitter_username. '">— ' . $twitter_username . '</a></p>
			</li>';		
		}

	  } else {

	  	$tweets = getTweets(intval($num_tweet), $twitter_username);
	  	foreach($tweets as $tweet) {
		
		$output .= '
	  		<li>
				<span class="twittericon"><i class="icon-twitter_alt"></i></span>
				<p class="tweet_text">' . TwitterFilter($tweet['text']) . '</p>
				<p class="tweet_time"><a href="https://twitter.com/' . $twitter_username. '">— ' . $twitter_username . '</a></p>
			</li>';		
		}

	  }
	  
	  $output .= '</ul>
	  			</div>';
      
      return $output . $this->endBlockComment('ig_recent_tweets') . "\n";
  }
}

?>