<?php
/**
 * @package mm
 * @subpackage mm
 * @since mm 1.0
 */
	echo '
	<div class="search-overlay-control overlay-area overlay-effects">
			<span class="overlay-close-btn"></span>
			<form method="get" class="master-searchform" action="' . esc_url( home_url( '/' ) ) . '">
				<input class="searchform-input" name="s" type="search" placeholder="Search..." />
				<button class="searchform-submit" type="submit">Search</button>
			</form>
		</div>
	';
?>
