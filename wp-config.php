<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'generaleuropeanconsultants' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&=Ba^lCv>@I#%On7QNHK,TPZ=dngP){* o6Zys@A:-hMkO.SSK0 &Qw*%]}B+Jng' );
define( 'SECURE_AUTH_KEY',  ')Pf5<WM[J(T+JAT`@5).*q8%4SO7NK+Sl[%(KrQZW?qrSQcFNX-%qJR`NZHc~4Vk' );
define( 'LOGGED_IN_KEY',    '0)JA0 Gf1qgmj%f;FzzlVTR~cZIEgW2[cLKYsq(/=I;`BOgnP)%E^aTB#XEy#58M' );
define( 'NONCE_KEY',        '7~Rsr1pTDpo^Tv:n^FYLG)w$P+)rGGn$zc{|R/Jd$pjL<an:bG_}V>Ed{V:{WAqs' );
define( 'AUTH_SALT',        'aSTfCmV=Fc]F~+gdG5K;Oid@8a?fQ.F+0z1oeXLJm,fl.gyPv,0b`HxJqb!m2U@K' );
define( 'SECURE_AUTH_SALT', 'A^fY9BgHEfOdP~R41]6j5|Z(,}*Z=lGnM<GnN?5Cq+nJ1HGW``./a5Q`%Hb0r]]V' );
define( 'LOGGED_IN_SALT',   ':SC(^69_sq{cU.!-#M$=gdghIwb;h0Y{!*.[Ce(-XTyY]m4^&)`>-U9WmGN3#Ge&' );
define( 'NONCE_SALT',       'v4MaY?$nF1,3Kn`KNNcDKt.#ql6gCWe3^x6&3|?llB%wm6NzaEt>m9vVI1[W:4pR' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gpc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
