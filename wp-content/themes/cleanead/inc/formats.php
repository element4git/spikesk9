<?php

/**
 * Get the video from the current post.
 *
 * @return mixed
 */
function cleanead_get_video(){
	global $cleanead_videos;
	$post_id = get_the_ID();

	if( empty( $cleanead_videos ) ) $cleanead_videos = array();
	if( isset($cleanead_videos[$post_id]) ) return $cleanead_videos[$post_id];

	$content = get_the_content();
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = trim($content);

	// Is the first line a video?
	list($line, $content) = explode("\n", $content, 2);

	if ( preg_match('/\<\s*(iframe|object|embed)/i', $line) ) {
		$cleanead_videos[$post_id] = strip_tags($line, '<iframe><object><embed>');
	}
	else {
		$cleanead_videos[$post_id] = false;
	}

	return $cleanead_videos[$post_id];
}

/**
 * Removes the video from the page
 *
 * @param $content
 *
 * @return mixed
 */
function cleanead_filter_video($content){
	list($line, $rest) = explode("\n", $content, 2);
	if ( preg_match('/\<\s*(iframe|object|embed)/i', $line) ) return $rest;
	else return $content;
}

if ( ! function_exists( 'cleanead_get_link_url' ) ) :
/**
 * Return the post URL.
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @see get_url_in_content()
 * @return string The Link format URL.
 */
function cleanead_get_link_url() {
	$has_url = get_url_in_content( get_the_content() );

	return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;