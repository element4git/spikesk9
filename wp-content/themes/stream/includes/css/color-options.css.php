<?php header("Content-type: text/css; charset=utf-8"); 

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

require_once( $path_to_wp . '/wp-load.php' );

$options = get_option('infinite_options'); 

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

$rgb = implode(',', hex2rgb($options['accent-color']));

	//Convert hexdec color string to rgb(a) string

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}
?>
/* Accent Color */

a,
header #logo a:hover,
header #logo a:focus,
header #logo a:active,
#menu ul li.current_page_item a,
#menu ul li.current-menu-item a,
#latest-posts .post-name .entry-title a:hover,
.entry-meta.entry-header a:hover,
.entry-meta.entry-header a:active,
.entry-meta.entry-header a:focus,
.standard-blog .post-name .entry-title a:hover,
.masonry-blog .post-name .entry-title a:hover,
.center-blog .post-name .entry-title a:hover,
.comment-author cite a:hover,
.comment-meta a:hover,
#commentform span.required,
#copyright p a,
.social_widget a i,
.dropmenu-active ul li a:hover,
.color-text,
.searchform-input,
.dropcap-color,
.social-icons li a:hover i,
.counter-number .count-number-icon,
#sidebar .widget.widget_categories li a, 
#sidebar .widget.widget_pages li a,
#sidebar .widget.widget_recent_entries li a, 
#sidebar .widget.widget_recent_comments li,
#sidebar .widget.widget_nav_menu li a,
.sidebar .widget.widget_categories li a, 
.sidebar .widget.widget_pages li a,
.sidebar .widget.widget_recent_entries li a, 
.sidebar .widget.widget_recent_comments li,
.sidebar .widget.widget_nav_menu li a,
.widget.widget_categories li a:hover, 
.widget.widget_pages li a:hover,
.widget.widget_recent_entries li a:hover, 
.widget.widget_recent_comments li:hover,
.widget.widget_nav_menu li a:hover,
.accordion-heading.accordionize .accordion-toggle.active span, 
.accordion-heading.togglize .accordion-toggle.active span {
	color: <?php echo $options['accent-color']; ?>;
}

.nav-tabs > li.active > a, 
.nav-tabs > li.active > a:hover, 
.nav-tabs > li.active > a:focus,
.overlay-bg-fill,
#portfolio-filter .dropdown .dropmenu,
.wpas .btn-primary:hover, .wpas .btn-primary:focus, 
.wpas .btn-primary:active, .wpas .btn-primary.active, 
.open .dropdown-toggle.wpas .btn-primary,
.wpas .btn-default:hover, .wpas .btn-default:focus, 
.wpas .btn-default:active, .wpas .btn-default.active, 
.open .dropdown-toggle.wpas .btn-default,
.accordion-heading .accordion-toggle.active {
	background-color: <?php echo $options['accent-color']; ?>;
}

.fancy-wrap .overlay,
.post-thumb .hover-wrap .overlay,
.item-project .project-name {
	background-color: rgba(<?php echo $rgb; ?>, 0.9);
}

#menu ul .sub-menu li a:hover {
	color: <?php echo $options['accent-color']; ?> !important;
}

<?php
	$social_accent_color = (!empty($options["sharing_btn_accent_color"]) && $options["sharing_btn_accent_color"] == '1') ? 'body .twitter-share:hover i, .twitter-share.hovered i, .pinterest-share:hover i, .pinterest-share.hovered i, .facebook-share:hover i, .facebook-share.hovered i,' : null;

global $woocommerce; 
	if ($woocommerce) {
?>
.woocommerce ul.products li.product .onsale, 
.woocommerce-page ul.products li.product .onsale, 
.woocommerce span.onsale, .woocommerce-page span.onsale, 
.woocommerce .product-wrap .add_to_cart_button.added, 
.single-product .facebook-share a:hover, 
.single-product .twitter-share a:hover, 
.single-product .pinterest-share a:hover, 
.woocommerce-message, 
.woocommerce-error, 
.woocommerce-info, 
.woocommerce-page table.cart a.remove:hover, 
.woocommerce .chzn-container .chzn-results .highlighted, 
.woocommerce .chosen-container .chosen-results .highlighted, 
.woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce .container-wrap nav.woocommerce-pagination ul li:hover span, 
.woocommerce a.button:hover, 
.woocommerce-page a.button:hover, 
.woocommerce button.button:hover, 
.woocommerce-page button.button:hover, 
.woocommerce input.button:hover, 
.woocommerce-page input.button:hover, 
.woocommerce #respond input#submit:hover, 
.woocommerce-page #respond input#submit:hover, 
.woocommerce #content input.button:hover, 
.woocommerce-page #content input.button:hover, 
.woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, 
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, 
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, 
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, 
.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, 
.woocommerce .widget_layered_nav_filters ul li a:hover, 
.woocommerce-page .widget_layered_nav_filters ul li a:hover,
.woocommerce .price_slider_amount button.button:hover {
	background-color: <?php echo $options['accent-color']; ?> !important;
}
<?php } ?>
.overlay-bg,
.item-project i,
.box.boxed-version,
.standard-blog .post-link,
.standard-blog .post-quote,
.masonry-blog .post-link,
.masonry-blog .post-quote,
.center-blog .post-link,
.center-blog .post-quote,
.standard-blog .more-link:hover,
.badge_author,
#error-page .error-btn,
.social_widget a:hover,
.tooltip-inner,
.highlight-text,
.progress-bar .bar,
.pricing-table.selected .header-price,
.pricing-table.selected .confirm,
.mejs-overlay:hover .mejs-overlay-button,
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
#menu > ul > li > a > .menu-decoration,
#jpreOverlay,
#jSplash,
#jprePercentage {
	background-color: <?php echo $options['accent-color']; ?>;
}

.navigation-projects ul li.prev a:hover,
.navigation-projects ul li.next a:hover,
.navigation-projects ul li.back-page a:hover,
.post-type-navi .prev a:hover, 
.post-type-navi .next a:hover,
#pagination a:hover,
#pagination span,
.button-error {
	background-color: <?php echo $options['accent-color']; ?>;
	border-color: <?php echo $options['accent-color']; ?>;
}

.navigation-controls ul li.prev a i:hover,
.navigation-controls ul li.next a i:hover,
.navigation-controls ul li.port-index a i:hover {
	color: <?php echo $options['accent-color']; ?> !important;
}

.wpcf7 .wpcf7-submit,
#commentform #submit:hover,
.button-main:hover,
.button-main:active,
.button-main:focus,
.button-main.inverted,
#back-top a:hover i {
	background-color: <?php echo $options['accent-color']; ?>;
    border-color: <?php echo $options['accent-color']; ?>;
}

.wpcf7-form.invalid input.wpcf7-not-valid,
.wpcf7-form.invalid textarea.wpcf7-not-valid,
.wpcf7-form input:focus:invalid:focus,
.wpcf7-form textarea:focus:invalid:focus {
	border-color: <?php echo $options['accent-color']; ?>;
}

.tagcloud a:hover,
.tagcloud a:active,
.tagcloud a:focus {
	background-color: <?php echo $options['accent-color']; ?>;
}

.tooltip.top .tooltip-arrow {
    border-top-color: <?php echo $options['accent-color']; ?>;
}

.tooltip.right .tooltip-arrow {
    border-right-color: <?php echo $options['accent-color']; ?>;
}

.tooltip.left .tooltip-arrow {
    border-left-color: <?php echo $options['accent-color']; ?>;
}

.tooltip.bottom .tooltip-arrow {
    border-bottom-color: <?php echo $options['accent-color']; ?>;
}

.box .icon.circle-mode-box {
	border-color: rgba(<?php echo $rgb; ?>, 0.5);
}

.box:hover .icon.circle-mode-box,
.box:active .icon.circle-mode-box,
.box:focus .icon.circle-mode-box {
	border-color: <?php echo $options['accent-color']; ?>;
	background-color: <?php echo $options['accent-color']; ?>;
}

.box .icon.circle-mode-box i,
.box.boxed-version,
.box .icon.icon-only-mode-box {
	color: <?php echo $options['accent-color']; ?>;
}

<?php
echo '
/* WooCommerce Colors */

#header-outer .widget_shopping_cart .cart_list a, 
.woocommerce .star-rating, 
.woocommerce-page table.cart a.remove, 
.woocommerce form .form-row .required, 
.woocommerce-page form .form-row .required, 
body #header-secondary-outer #social a:hover i,
.woocommerce ul.products li.product .price, 
'.$social_accent_color.' .woocommerce-page ul.products li.product .price {
	color: '.$options["accent-color"].' !important;
}';
?>

<?php
echo '
/* Header Colors */

header {
	background-color: '.$options["header-background"].';
}

header #logo a {
	color: '.$options["header-logo-font-color"].';
}

#menu ul a {
	color: '.$options["header-font-color"].';
}

#menu > ul > li:after {
    border-color: '.$options["header-separator-color"].';
}

#menu ul a:hover,
#menu ul li.sfHover a,
#menu ul li.current-cat a,
#menu ul li.current-page-ancestor a,
#menu ul li.current-menu-ancestor a {
    color: '.$options["header-font-color-hover"].';
}

#menu ul ul {
	background-color: '.$options["header-dropdown-background"].';
}

#menu ul .sub-menu li a {
	color: '.$options["header-dropdown-font-color"].' !important;
	border-color: '.$options["header-dropdown-separator-color"].';
}';
?>

<?php
echo '
/* Mobile Dropdown Colors */

#navigation-mobile {
	background-color: '.$options["mobile-dropdown-background"].';
}

#navigation-mobile li a,
#menu-nav-mobile .sub-menu li a {
	color: '.$options["mobile-dropdown-font-color"].';
}

#navigation-mobile li.has-ul.open > a,
#navigation-mobile li a:hover,
#menu-nav-mobile .sub-menu li a:hover,
#navigation-mobile li.has-ul.open a i,
#navigation-mobile .sub-menu li.has-ul.open a i {
	color: '.$options["mobile-dropdown-font-color-hover"].';
}

#menu-nav-mobile li,
#menu-nav-mobile ul.sub-menu li {
	border-color: '.$options["mobile-dropdown-separator-color"].';
}

#navigation-mobile li.has-ul a i,
#navigation-mobile .sub-menu li.has-ul a i {
	color: '.$options["mobile-dropdown-icon-color"].';
}';
?>

<?php
echo '
/* Typography Colors */

#main {
	background: '.$options["body-typo-background"].';
}
	
body,
a:hover,
a:active,
a:focus,
.entry-meta.entry-header a,
.comment-meta, 
.comment-meta a,
#twitter-feed .tweet_list li .tweet_time a,
.box p,
.dropmenu-active ul li a {
	color: '.$options["body-typo-color"].';
}

h1,
h2,
h3,
h4,
h5,
h6,
#latest-posts .post-name .entry-title a,
.standard-blog .post-name .entry-title a,
.masonry-blog .post-name .entry-title a,
.center-blog .post-name .entry-title a,
.comment-author cite, 
.comment-author cite a,
.dropmenu p,
.dropcap,
.easyPieChart,
.counter-number .number-value {
	color: '.$options["heading-typo-color"].';
}';
?>

<?php
echo '
/* Back To Top Colors */

#back-top a i {
	border-color: '.$options["back-top-color"].' !important;
	color: '.$options["back-top-color"].' !important;
	background-color: '.$options["back-top-background"].' !important;
}';
?>

<?php
echo '
/* Footer Colors */

footer {
	background-color: '.$options["footer-widget-background"].';
}

.footer-widgets-wrap h3,
.footer-widgets-wrap .tweet_timestamp > a {
	color: '.$options["footer-widget-heading-color"].' !important;
}

.widget.widget_categories li a, 
.widget.widget_pages li a,
.widget.widget_recent_entries li a, 
.widget.widget_recent_comments li,
.widget.widget_nav_menu li a {
	color: '.$options["footer-widget-heading-color"].';
}

.footer-widgets-wrap {
	color: '.$options["footer-widget-font-color"].';
}

#copyright,
.tagcloud a,
.item-project i,
.post-thumb .hover-wrap .circle,
.fancy-wrap .overlay .circle,
.item-project .circle {
	background-color: '.$options["copyright-background"].';
}

#copyright p,
.tagcloud a, {
	color: '.$options["copyright-font-color"].';
}


/* Menu Custom Options */

/* initial_height */
#main.sticky-header-enabled
{
	padding-top:' . $options['first_level_item_height'] . 'px;
}

#mega_main_menu .nav_logo > .logo_link > img 
{
	max-height: ' . $options['logo_height'] . '%;
}
#mega_main_menu > .menu_holder > .menu_inner > .nav_logo > .logo_link, 
#mega_main_menu > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, 
#mega_main_menu > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link, 
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_search_box,
#mega_main_menu.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $options['first_level_item_height'] . 'px;
	line-height:' . $options['first_level_item_height'] . 'px;
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text
{
	height:' . $options['first_level_item_height'] . 'px;
}
#mega_main_menu.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $options['first_level_item_height'] / 2 ) . 'px;
	line-height:' . ( $options['first_level_item_height'] / 3 ) . 'px;
}
#mega_main_menu.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text
{
	height:' . ( $options['first_level_item_height'] / 3 ) . 'px;
}
#mega_main_menu.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $options['first_level_item_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $options['first_level_item_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
{	
	width:' . ( $options['first_level_item_height'] * 0.6 ) . 'px;
}
/* initial_height_sticky */
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > .nav_logo > .logo_link, 
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > .nav_logo > .mobile_toggle, 
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link, 
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > ul > li.nav_search_box,
#mega_main_menu.icons-left > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.icons-right > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $options['first_level_item_height_sticky'] . 'px;
	line-height:' . $options['first_level_item_height_sticky'] . 'px;
}
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content > .link_text 
{
	height:' . $options['first_level_item_height_sticky'] . 'px;
}
#mega_main_menu.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $options['first_level_item_height_sticky'] / 2 ) . 'px;
	line-height:' . ( $options['first_level_item_height_sticky'] / 3 ) . 'px;
}
#mega_main_menu.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text
{
	height:' . ( $options['first_level_item_height_sticky'] / 3 ) . 'px;
}
#mega_main_menu.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $options['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
}
#mega_main_menu.icons-top > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $options['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
}
#mega_main_menu > .menu_holder.sticky_container > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
{	
	width:' . ( $options['first_level_item_height_sticky'] * 0.6 ) . 'px;
}
#mega_main_menu.primary_style-buttons > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link 
{
	margin:' . ( ( $options['first_level_item_height_sticky'] - $options['first_level_button_height'] ) / 2 ) . 'px 4px;
}

/* initial_height_mobile */
@media (max-width: 767px) { /* DO NOT CHANGE THIS LINE (See = Specific Options -> Responsive Resolution) */
	#mega_main_menu
	{
		min-height:' . $options['first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .logo_link, 
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, 
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, 
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link, 
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_search_box,
	#mega_main_menu.mobile_minimized-enable.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.mobile_minimized-enable.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
	#mega_main_menu.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
	{
		height:' . $options['first_level_item_height_sticky'] . 'px;
		line-height:' . $options['first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text 
	{
		height:' . $options['first_level_item_height_sticky'] . 'px;
	}
	#mega_main_menu.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
	#mega_main_menu.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
	{
		height:' . ( $options['first_level_item_height_sticky'] / 2 ) . 'px;
		line-height:' . ( $options['first_level_item_height_sticky'] / 3 ) . 'px;
	}
	#mega_main_menu.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
	{
		padding-top:' . ( $options['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
	}
	#mega_main_menu.mobile_minimized-enable.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
	{
		padding-bottom:' . ( $options['first_level_item_height_sticky'] / 3 / 2 ) . 'px;
	}
	#mega_main_menu.mobile_minimized-enable > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i:before
	{	
		width:' . ( $options['first_level_item_height_sticky'] * 0.6 ) . 'px;
	}
	#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link 
	{
		margin:' . ( ( $options['first_level_item_height_sticky'] - $options['first_level_button_height'] ) / 2 ) . 'px 4px;
	}
}
/* style-buttons */
#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link, 
#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link > .link_content, 
#mega_main_menu.primary_style-buttons.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.primary_style-buttons.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > .link_content,
#mega_main_menu.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i, 
#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link > i.ci-icon-buddypress-user
{
	height:' . $options['first_level_button_height'] . 'px;
	line-height:' . $options['first_level_button_height'] . 'px;
}
#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link > .link_content > .link_text 
{
	height:' . $options['first_level_button_height'] . 'px;
}
#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link 
{
	margin:' . ( ( $options['first_level_item_height'] - $options['first_level_button_height'] ) / 2 ) . 'px 4px;
}
#mega_main_menu.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i,
#mega_main_menu.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	height:' . ( $options['first_level_button_height'] / 2 ) . 'px;
	line-height:' . ( $options['first_level_button_height'] / 3 ) . 'px;
}
#mega_main_menu.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.with_icon > .link_content > .link_text 
{
	height:' . ( $options['first_level_button_height'] / 3 ) . 'px;
}
#mega_main_menu.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	padding-top:' . ( $options['first_level_button_height'] / 3 / 2 ) . 'px;
}
#mega_main_menu.primary_style-buttons.icons-top > .menu_holder > .menu_inner > ul > li > .item_link > .link_content
{
	padding-bottom:' . ( $options['first_level_button_height'] / 3 / 2 ) . 'px;
}
/* color_scheme */
.sticky-header, 
.normal-header,
#mega_main_menu.responsive-enable.mobile_minimized-enable .nav_logo.mobile_menu_active + ul
{
	background-color: ' .$options['menu_bg_gradient']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link .link_text,
#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_search_box *,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .post_details > .post_title,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .post_details > .post_title > .item_link
{
	font-family: ' .$options['menu_first_level_link_font']['font-family']. ';
	font-size: ' .$options['menu_first_level_link_font']['font-size']. ';
	font-weight: ' .$options['menu_first_level_link_font']['font-weight']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link > i
{
	font-size: ' .$options['menu_first_level_icon_font']. 'px;
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link > i:before
{	
	width: ' .$options['menu_first_level_icon_font']. 'px;
}
#mega_main_menu > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link *
{
	color: ' .$options['menu_first_level_link_color']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_search_box > #mega_main_menu_searchform
{
	background-color: ' .$options['menu_search_bg']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_search_box .field,
#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_search_box *,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .icosearch
{
	color: ' .$options['menu_search_color']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus,
#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link *,
#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link *
{
	color: ' .$options['menu_first_level_link_color_hover']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > .mega_dropdown,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown > li .post_details
{
	background-color: ' .$options['menu_dropdown_wrapper_gradient']. ';
}
#mega_main_menu ul > li.default_dropdown .mega_dropdown ul.mega_dropdown > li:first-child > .item_link:after
{
	background-color: ' .$options['menu_dropdown_wrapper_gradient']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown *
{
	color: ' .$options['menu_dropdown_plain_text_color']. ';
}
#mega_main_menu ul li .mega_dropdown > li > .item_link,
#mega_main_menu ul li .mega_dropdown > li > .item_link .link_text,
#mega_main_menu ul li .mega_dropdown,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .post_details > .post_description
{
	font-family: ' .$options['menu_dropdown_link_font']['font-family']. ';
	font-size: ' .$options['menu_dropdown_link_font']['font-size']. ';
	font-weight: ' .$options['menu_dropdown_link_font']['font-weight']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul li .mega_dropdown > li > .item_link.with_icon
{
	line-height: ' .$options['menu_dropdown_icon_font']. 'px;
	mix-height: ' .$options['menu_dropdown_icon_font']. 'px;
}
#mega_main_menu ul li .mega_dropdown > li > .item_link > i
{
	width: ' .$options['menu_dropdown_icon_font']. 'px;
	height: ' .$options['menu_dropdown_icon_font']. 'px;
	line-height: ' .$options['menu_dropdown_icon_font']. 'px;
	font-size: ' .$options['menu_dropdown_icon_font']. 'px;
	margin-top: -' . ( $options['menu_dropdown_icon_font'] / 2 ) . 'px;
}
#mega_main_menu ul li .mega_dropdown > li > .item_link.with_icon > span
{
	margin-left: ' . ( $options['menu_dropdown_icon_font'] + 8 ) . 'px;
}
#mega_main_menu.language_direction-rtl ul li .mega_dropdown > li > .item_link.with_icon > span
{
	margin-right: ' . ( $options['menu_dropdown_icon_font'] + 8 ) . 'px;
}
#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link
{
	background-color: ' .$options['menu_dropdown_link_bg']. ';
	color: ' .$options['menu_dropdown_link_color']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li .post_details > .post_icon > i,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link *,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown a,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown a *,
#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link *,
#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link *,
#mega_main_menu ul li li .post_details a
{
	color: ' .$options['menu_dropdown_link_color']. ';
}
#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link
{
	border-color: ' .$options['menu_dropdown_link_border_color']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus,
#mega_main_menu ul li.default_dropdown .mega_dropdown > li:hover > .item_link,
#mega_main_menu ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover,
#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link,
#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .item_link:hover,
#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .processed_image,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .item_link,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link:hover,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link,
#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover
{
	background-color: ' .$options['menu_dropdown_link_bg_hover']. ';
	color: ' .$options['menu_dropdown_link_color_hover']. ';
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover *,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus *,
#mega_main_menu ul li.default_dropdown .mega_dropdown > li:hover > .item_link *,
#mega_main_menu ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *,
#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link *,
#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .item_link *,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li a:hover *,
#mega_main_menu ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover > .cover > a > i
{
	color: ' .$options['menu_dropdown_link_color_hover']. ';
}
#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > ul > li > .item_link,
#mega_main_menu.primary_style-buttons > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
#mega_main_menu.primary_style-buttons.direction-vertical > .menu_holder > .menu_inner > ul > li:first-child > .item_link,
#mega_main_menu > .menu_holder > .mmm_fullwidth_container,
#mega_main_menu > .menu_holder > .menu_inner > ul > li .post_details,
#mega_main_menu > .menu_holder > .menu_inner > ul .mega_dropdown
{
	border-radius: ' . $options['corners_rounding'] . 'px;
}
#mega_main_menu > .menu_holder > .menu_inner > span.nav_logo,
#mega_main_menu.primary_style-flat.direction-horizontal.first-lvl-align-left.no-logo > .menu_holder > .menu_inner > ul > li:first-child > .item_link,
/*
#mega_main_menu.direction-horizontal.first-lvl-align-left.no-logo.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:first-child > .item_link,
#mega_main_menu.direction-horizontal.first-lvl-align-left.no-logo.include-search > .menu_holder > .menu_inner > ul > li:nth-child(200n+2) > .item_link,
#mega_main_menu.direction-horizontal.first-lvl-align-left.no-logo.include-woo_cart > .menu_holder > .menu_inner > ul > li:nth-child(200n+2) > .item_link,
#mega_main_menu.direction-horizontal.first-lvl-align-left.no-logo.include-search.include-woo_cart > .menu_holder > .menu_inner > ul > li:nth-child(200n+3) > .item_link,
#mega_main_menu.direction-horizontal.first-lvl-align-left.no-logo.include-search.include-woo_cart.include-buddypress > .menu_holder > .menu_inner > ul > li:nth-child(200n+4) > .item_link,
*/
#mega_main_menu.direction-horizontal.first-lvl-align-center.no-logo.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:first-child > .item_link
{
	border-radius: ' . $options['corners_rounding'] . 'px 0px 0px ' . $options['corners_rounding'] . 'px;
}
#mega_main_menu.direction-horizontal.no-search > .menu_holder > .menu_inner > ul > li.nav_woo_cart > .item_link,
#mega_main_menu.direction-horizontal.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li.nav_buddypress > .item_link,
#mega_main_menu.direction-horizontal.first-lvl-align-right.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:last-child > .item_link,
#mega_main_menu.direction-horizontal.first-lvl-align-center.no-search.no-woo_cart > .menu_holder > .menu_inner > ul > li:last-child > .item_link
{
	border-radius: 0px ' . $options['corners_rounding'] . 'px ' . $options['corners_rounding'] . 'px 0px;
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown > li:first-child > .item_link,
#mega_main_menu.direction-vertical > .menu_holder > .menu_inner > ul > li:first-child > .item_link
{
	border-radius: ' . $options['corners_rounding'] . 'px ' . $options['corners_rounding'] . 'px 0px 0px;
}
#mega_main_menu > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown > li:last-child > .item_link
{
	border-radius: 0px 0px ' . $options['corners_rounding'] . 'px ' . $options['corners_rounding'] . 'px;
}
#mega_main_menu ul .nav_search_box #mega_main_menu_searchform,
#mega_main_menu .multicolumn_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu .widgets_dropdown .mega_dropdown > li > .item_link,
#mega_main_menu .grid_dropdown .mega_dropdown > li .item_link,
#mega_main_menu .grid_dropdown .mega_dropdown > li .processed_image,
#mega_main_menu .post_type_dropdown .mega_dropdown > li .item_link,
#mega_main_menu .post_type_dropdown .mega_dropdown > li .processed_image
{
	border-radius: ' . ( $options['corners_rounding'] / 2 ) . 'px;
}';

?>