<?php

	include_once( 'framework/init.php' );
	$mm_config = array(
		'MM_WARE_NAME' => 'Infinite Menu',
		'MM_WARE_SLUG' => 'mega_main_menu',
		'MM_WARE_PREFIX' => 'mmm',
		'MM_WARE_VERSION' => '1.0.0',
		'MM_WARE_INIT_FILE' => __FILE__,
	);
	new mega_main_init( $mm_config );
?>
