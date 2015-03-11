<?php
/**
 * WPBakery Visual Composer Here includes useful files for plugin
 *
 * @package WPBakeryVisualComposer
 *
 */

$lib_dir = $composer_settings['COMPOSER_LIB'];
$shortcodes_dir = $composer_settings['SHORTCODES_LIB'];
$settings_dir = $composer_settings['COMPOSER'] . 'settings/';

require_once( $lib_dir . 'abstract.php' );
require_once( $lib_dir . 'helpers.php' );
require_once( $lib_dir . 'filters.php' );
require_once( $lib_dir . 'params.php' );

require_once( $lib_dir . 'mapper.php' );
require_once( $lib_dir . 'shortcodes.php' );
require_once( $lib_dir . 'composer.php' );

require_once( $settings_dir . 'settings.php');

/* Add shortcodes classes */
require_once( $shortcodes_dir . 'default.php' );
require_once( $shortcodes_dir . 'column.php' );
require_once( $shortcodes_dir . 'row.php' );
require_once( $shortcodes_dir . 'divider.php' );
require_once( $shortcodes_dir . 'special_heading.php' );
require_once( $shortcodes_dir . 'blog.php');
require_once( $shortcodes_dir . 'alert_box.php' );
require_once( $shortcodes_dir . 'acc_tog_tab.php' );
require_once( $shortcodes_dir . 'single_image.php' );
require_once( $shortcodes_dir . 'lightbox.php' );
require_once( $shortcodes_dir . 'pricing_table.php' );
require_once( $shortcodes_dir . 'maps.php' );
require_once( $shortcodes_dir . 'icons.php');
require_once( $shortcodes_dir . 'box_icon.php');
require_once( $shortcodes_dir . 'audio.php');
require_once( $shortcodes_dir . 'video.php');
require_once( $shortcodes_dir . 'team_grid.php');
require_once( $shortcodes_dir . 'portfolio_grid.php');
require_once( $shortcodes_dir . 'knowledgebase_grid.php');
require_once( $shortcodes_dir . 'latest_posts.php');
require_once( $shortcodes_dir . 'twitter_feed.php');
require_once( $shortcodes_dir . 'social_icons.php');
require_once( $shortcodes_dir . 'button.php' );
require_once( $shortcodes_dir . 'raw_content.php' );
require_once( $shortcodes_dir . 'progress_bar.php' );
require_once( $shortcodes_dir . 'circular_progress_bar.php' );
require_once( $shortcodes_dir . 'count_number.php' );

require_once( $lib_dir . 'layouts.php' );

require_once( $lib_dir . 'params/load.php');
