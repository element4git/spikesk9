<?php

	if ( is_admin() ) {
		include_once( 'menu_options_array.php' );
		include_once( 'backend_walker.php' );
	} else {
		include_once( 'frontend_walker.php' );
		include_once( 'handler.php' );
	}
?>