<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bitnami_wordpress');

/** MySQL database username */
define('DB_USER', 'bn_wordpress');

/** MySQL database password */
define('DB_PASSWORD', '0bf3db7677');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '9a25f25e27332aa5e8a16708e474a92232172f9f06dc084fc81f733ef5159d68');
define('SECURE_AUTH_KEY', '46cbff228acc8598ba5f35028de09f1a13a8434d62b796b19486785cfa4b5f1b');
define('LOGGED_IN_KEY', 'f1f2fd2cfd0be415a9ef8c6eba43d112940769b981d9da9735c011d5d722cd19');
define('NONCE_KEY', '55721ae46dcc403b18ba65ba152c3da52497174c823934c9be6c5fce0277ffab');
define('AUTH_SALT', '40c36bde4c920f789852254e5e24dd351827019b1529b1c55a0b5f92839181f8');
define('SECURE_AUTH_SALT', '6bdc222e8d3edf5d80b5c01bda9fe47d119ebdd51102fa54e40dc5664bb8604e');
define('LOGGED_IN_SALT', '0f2071bdd73981c54782b48353adebd6df2cf34c83733773e35e896f87db7d1f');
define('NONCE_SALT', '936971554b1455483db23a437ec4c585d4baae8f605eac5d0b7caa09f93b043b');

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
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/wordpress/tmp');


define('FS_METHOD', 'ftpext');
define('FTP_BASE', '/opt/bitnami/apps/wordpress/htdocs/');
define('FTP_USER', 'bitnamiftp');
define('FTP_PASS', 'aZobGP2a9NU7yBjOCLy3WVEC5CQK3ogvEn0e3CNnweA8C0ygeO');
define('FTP_HOST', '127.0.0.1');
define('FTP_SSL', false);