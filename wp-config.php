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
define('DB_NAME', 'bitnami_wordpress');

/** MySQL database username */
define('DB_USER', 'bn_wordpress');

/** MySQL database password */
define('DB_PASSWORD', '6301f23ab8');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY', 'b32dabd44b628b2a9dd9c64ecdcd3f1e6fa3d4bee10eb79fb2c9146fe73f906e');
define('SECURE_AUTH_KEY', 'd8da838aa469e424b13557d317ba0333ef62b5508617b689220cd6dde4dd6bbc');
define('LOGGED_IN_KEY', 'e17c1b2b52c91e00803ebabe19aedc1d2b07305c1ecbb19097e01c2fbe498184');
define('NONCE_KEY', 'be9b0ad495758f99b61777354d2f86c45257fdd145475761d7263dcd9676f446');
define('AUTH_SALT', '84b1afff66d4c9638f273246c13ee65251a24b70d9c6494d6f7e7600738461bf');
define('SECURE_AUTH_SALT', '4080b9e1da54f84e6bc9ea4d596f67cc7aeb1f513fb96b1abccb7f0af906c19d');
define('LOGGED_IN_SALT', 'b95cc916605f37fa6248a0fea73e35c29cc33b16c298d64696835d6538d850a3');
define('NONCE_SALT', '5c4d565a643046e908fd16bf74ffa7f0c10e3e429d6ed4099d5af8cd41652c9c');

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

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/wordpress/tmp');


define('FS_METHOD', 'ftpext');
define('FTP_BASE', '/opt/bitnami/apps/wordpress/htdocs/');
define('FTP_USER', 'bitnamiftp');
define('FTP_PASS', 'JyZoW8KoooHkQoG30gP0siDqfQEPgmmgmcpGEUF4KfU4GxEVZO');
define('FTP_HOST', '127.0.0.1');
define('FTP_SSL', false);
