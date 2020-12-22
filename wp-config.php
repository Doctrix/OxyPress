<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db_wordpress_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ':;%a_Wm5fLijsiY1](E{n{=#y[t*%te~M{GDhjwtmv(A[B/G9|]m&KnoKpH_lZ40');
define('SECURE_AUTH_KEY',  'spJJ/rnf]:1[&h i[VB}UGKSe)+^2K/n~@<3UV{rCgQY3aV|81v@DDX.zmT ]X#%');
define('LOGGED_IN_KEY',    's-HE%Tiz<@p_ MknC_ qR~EO6/gCB`B4QwID)mV>~&Rlw<ll=L:@Gz}g2W0;5S|I');
define('NONCE_KEY',        '@Sbe@*)Qot={6Tn<k:+|BVp3Huu,://8i:JA35]Ib;}G 7wn!1!/YT~Qt>l{i2ny');
define('AUTH_SALT',        'n3Yb;m7+kAAzW4N(4kxXFRo!-QfKsjZmey@kLz6U9nuL+k6}JzAQK!:EN*%B!F{s');
define('SECURE_AUTH_SALT', 'K(_L nI<BiglWS<:!jYKwRQ8k`42HTEu1wE6QiR>-zN4<95wk2|4fl;7CE s.ipI');
define('LOGGED_IN_SALT',   'fYu`xZR@d8w{c02Vb!Yi%()?B1zVSJ;<`t6P86kKR~,_mSydTb~Jv|i^;a;B,Ix?');
define('NONCE_SALT',       'l$J^@Bq7l5tTqeAY1k%rk85c@&U=c:qfJ/2^(Ao)k@KOhYbe(q#MkAs3=Q9,2RXs');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'oxy_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define('DISALLOW_FILE_EDIT', true);
define('DISABLE_WP_CRON', false);
/* That's all, stop editing! Happy blogging. */

/** Multisite */
/**define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);*/

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');