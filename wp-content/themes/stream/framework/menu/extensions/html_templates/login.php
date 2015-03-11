<?php
/**
 * @package mm
 * @subpackage mm
 * @since mm 1.0
 */
	echo '
	<div class="login-overlay-control overlay-area overlay-effects">
			<span class="overlay-close-btn"></span>
			<div class="master-login login">
			<form name="loginform" id="loginform" action="' . esc_url( home_url( '/wp-login.php' ) ) . '" method="post">';
			if($options['login-logo']['url'] != ''){
			echo '<div class="login-overlay-logo"><img src="' . $options['login-logo']['url'] . '"></div>';
			}
	echo '
				<input type="text" name="log" id="user_login" class="login-overlay-username" value="" size="20" placeholder="Username">
				<input type="password" name="pwd" id="user_pass" class="login-overlay-password" value="" size="20" placeholder="Password">
			
				<p class="login-submit">
					<input name="rememberme" type="checkbox" id="rememberme" class="login-overlay-rememberme" value="forever"><span class="login-overlay-rememberme-msg"> Remember Me</span>
					<input type="submit" name="wp-submit" id="wp-submit" class="login-overlay-submit" value="Log In">
					<input type="hidden" name="redirect_to" value="' . esc_url( home_url() ) . '">
				</p>
			
		</form>
		</div>
	</div>';
?>