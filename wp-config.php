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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

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
define( 'AUTH_KEY',         'pA.S.eL6L<7%6at_K9JqFlIWWJt.!ak8v%J:T]!74DReOJw@.8%x00C`p=r*y)>&' );
define( 'SECURE_AUTH_KEY',  'VA7J@zVw0[lA}1As#`GGjG@,-1@?-H+.C$sA|wfxy0RtfSK8@8uDu].VwI4!lh.,' );
define( 'LOGGED_IN_KEY',    'zrA4N)F-4;g?c-:W;$<.XnHuI1IeMB{f2IA$0tY^+du[Bc+e {5qIgID5,P| #;.' );
define( 'NONCE_KEY',        '[f38J:!T%fK:O }85&urQwK|4>|myUZX[>40IN@Ex>^<.U$uwKnbmil?A<$O?K(c' );
define( 'AUTH_SALT',        'Ak-EIPe=97V`C]*]-R3q.M:;yc.wdk2@ZFH5{oRl{PS@,{G^V4bm<3yWOREJ!iZg' );
define( 'SECURE_AUTH_SALT', 'D#>9yIHIv]5>phfP uaKJMh1KMH[l;boaAyi$Ntg.Eo!;8lvO70U%dDso[+~qQN*' );
define( 'LOGGED_IN_SALT',   'Dcz$ff8gl_>3 (mz<?p`%`Z>!$>kIWq7^>;&3L?m7#L3&yr(TM&DAQ?2~vIA3s}_' );
define( 'NONCE_SALT',       '-}#2bWWjam>7`hUGtA00[On60&d,aHs+C~19uy%W1C>ecX#vyPnAFB1oE?,C^Cb1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
