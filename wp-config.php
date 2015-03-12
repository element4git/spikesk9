<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'spikes_wordpress');

/** MySQL database username */
define('DB_USER', 'spikesuser');

/** MySQL database password */
define('DB_PASSWORD', 'd49p2y3Yp6Q365zE');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD','direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[*vcPrl<|m&mdkE{[xRdHu7Y~3|^=7KpPT>VOARXFB4<dl7`dUNuT>b`scbwN|?^');
define('SECURE_AUTH_KEY',  'swLA,F]j^6Fkjf/A1z<n.AucO[+OX{,LM#r?RW{]vBq&/}/7PfZjrx}|#?bfwzUV');
define('LOGGED_IN_KEY',    'HGDY+@Tm^3tR8(d. n<6g`&D{-D#@4rJs+sj#FD7-Kk(7)(>cXCsOuA^zf#z]*L`');
define('NONCE_KEY',        'vg(ouzjyeQ(ah94yv^O,MPS_Q|>qnKxiJHD7S+Pr}/DzBya(WT`!Co!;a}8W@]2}');
define('AUTH_SALT',        'CsQdb@X7rgz,VZEFh+=h/Bf/-f|`%@C.dmHq&/4MU$$K/6shX_y{@qi-yl2ZZ64!');
define('SECURE_AUTH_SALT', 'T`X$&}Ezlm}e+e.$QU1qKCpaBb9,!/n0V^|I&.5_KCasZ|1m?:?:|9f2t:~-f]LH');
define('LOGGED_IN_SALT',   'Pg{74vM#tG2WB[}D3#Nb>HSmVU(m7i$ww+q{I[R%Ld@VqRL.+mbwYmkc:Xlz:u1U');
define('NONCE_SALT',       '*>/j!n})S`b_/b^*0!RNu;}2;uJ_bfDU;jN}[Sh3(|2gTf#wcrR^3&k)4x@yB4qb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
