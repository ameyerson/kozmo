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
define('DB_NAME', 'ale1504502402537');

/** MySQL database username */
define('DB_USER', 'ale1504502402537');

/** MySQL database password */
define('DB_PASSWORD', 'Kozmo20!%');

/** MySQL hostname */
define('DB_HOST', 'ale1504502402537.db.8644636.hostedresource.com');

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
define('AUTH_KEY',         '(Sc#XNvnvTZqf!xwRG9N');
define('SECURE_AUTH_KEY',  '7c8YTETr%FxWS2Fz*-6R');
define('LOGGED_IN_KEY',    '8b3q&@WI+Bd(LEyUKv j');
define('NONCE_KEY',        '&2x#p3Mbp-BTAzF( Y%$');
define('AUTH_SALT',        'VasxpB dKY@G__X5Wb1#');
define('SECURE_AUTH_SALT', 'fKh10CBb=DJYDjEVQ+G!');
define('LOGGED_IN_SALT',   '%xIF7(%MPzb-W2Oa&qx!');
define('NONCE_SALT',       '0=f7d43Hp2wWMc-Z1T&4');


define('ADMIN_COOKIE_PATH', '/');
define('COOKIE_DOMAIN', '');
define('COOKIEPATH', '');
define('SITECOOKIEPATH', '');

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
