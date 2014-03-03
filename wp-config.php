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
define('DB_NAME', 'courses_participants');

/** MySQL database username */
define('DB_USER', 'courses_admin');

/** MySQL database password */
define('DB_PASSWORD', 'YtsF238t');

/** MySQL hostname */
define('DB_HOST', 'mysql3.webhost.co.nz');

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
define('AUTH_KEY',         'bl]z}|,D ?~*Rz[,D o^Uk1;=+;+}Zv||v&@Mp0a:c.-HCTW1b-M|p&z$v[wG+F<');
define('SECURE_AUTH_KEY',  '@lQ`10^BN1FoVE,ORDWp5`>F$_,zQlMol2#L#;v%<M{0nCs|2LrGE.@G}D>q^XXu');
define('LOGGED_IN_KEY',    '.sYN5.XTCmhj!lr{Kcm+ni+{SaYa#Y9||@p?X#enAFf6@noN{z*h/(zOal_jK#K2');
define('NONCE_KEY',        'SXTdBv&!?wg9{^-JYDcQ>alpj`4L&5>9Rn6>?lJHGY@;}RK|K*0LL30}~h 5$IP0');
define('AUTH_SALT',        '1|,+uM:]XRYwPO:o7/Ng}I?CIbO~<%L=kg;M-onCuY=W)(<<l7.J/.nFgo]D,$!{');
define('SECURE_AUTH_SALT', '@X%9p;MG!}L~rUJyh+(zeu+F,+3-i,EW|ZJJ+{?4E3wdAPCUSpZ<CTEp_||4_?Uw');
define('LOGGED_IN_SALT',   'G~a22*-7 Yq7YJ#1`_%a<4I+N~3,1!?qnRq/VuQ+J1xsdeDGE,=<8e+kbO.k(V9Z');
define('NONCE_SALT',       '<7d1QormfkH`Wn20K$%PeQT`4leEVxm/LW&dnQYF(0^EB3^%$o[i*Y~k(0oELhrH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * Peter Rooke
 * 
 * Switch off Contact forms until needed
 */
define('WPCF7_LOAD_JS', false);
define('WPCF7_LOAD_CSS', false);

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


