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
define('DB_NAME', 'wordpress_mystwoodretreats');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'heist89@gads');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'UX+zg}0;?|x>y).#n(Ux!GJ`v:k9f&Pw;fZ/w0X;w00+!ZMQ`+90o!8MoxQCs>o_');
define('SECURE_AUTH_KEY',  'Ka0Lb@Z*0`cM]o?C@>I|`rP}A)Ky[c]/y3]S{eY+AS%<-v[fdt!!SL,y.I.[!a|X');
define('LOGGED_IN_KEY',    '6z}Uf]iCW*ajl_k+9v7&FS-%:XC+Xo6)H! .YXQCcBQ/lZo>_d2oG|}C)-^%}Leg');
define('NONCE_KEY',        'hx$<+0,}|}sR/3-qcba(`D7ya,!<XiOKq4q6drw7-9D~KH|.1%^[$-q.a3w8Ls+%');
define('AUTH_SALT',        'o&Hl_/@rEmpD6dH&w5_RMMuuz9k^RT_A=-Ii+t/Mf3?@2vdq*$Cth[WN`a`-X1%?');
define('SECURE_AUTH_SALT', '|g`o|tUL h/HZ#iAK<qh2|@ue{:l@+1TQkG~I^|(--;4h+X=KJznb&<;|(L_G@Z ');
define('LOGGED_IN_SALT',   'tq/:Nk2eMk=]PM1cWR gG|ujuZr]F8bl9{&h$_;eGJf*l=CV0p2)(4MXAAeM|(tN');
define('NONCE_SALT',       ' :|Q;xY4D+[OpG~mlxXe5yLPn7G8lUXF^,PV|^o/rGdFguV`}gZ>AdsE7a}t-W6I');

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
