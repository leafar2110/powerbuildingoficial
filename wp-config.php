<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_wecan_1432_power' );

/** MySQL database username */
define( 'DB_USER', 'powerbuildingofi' );

/** MySQL database password */
define( 'DB_PASSWORD', '_8gTYWqM9FHU' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'FS_METHOD', 'direct' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',          '(!BqTbHFOg?8650m%pQc!JgV4)E%jV5*%Q9sN9Dbh$aY1gIpocFxA^c?0$Jx)*FO');
define('SECURE_AUTH_KEY',   'h7LL+A?Pv?X?r3#m(q0s*kYhHl)vJf8WV)W353FeC9?!xJXz!HR3?(lyrb$5MLqE');
define('LOGGED_IN_KEY',     'Ubp++XvEOJ3$ZK(YSm!Dy#Ag5!b#?6kn7f10&GTX0Es?iCgz)&NLb9Wh(Rsx6)e3');
define('NONCE_KEY',         'zs8t9$c@A!Il)9$N6pwG?9Z#n*(j%U0V6!Z$Ij!Sg2gLnL3Nr?NMr)Vof0WzJqTS');
define('AUTH_SALT',         'SC&*1)1dPpvq&*2wEw2bUP$jsB0Z&Q(1UwUcm3%azQ#wk7)t)*%@RiLpEK1MPUJ8');
define('SECURE_AUTH_SALT',  'P&2)xd#o&ocCx%%59s?1hAn5*nXf7YWX0T4)fF@^JbYAoBNit5McE^^+YX4Cbl?F');
define('LOGGED_IN_SALT',    '%4j7(vZfWrw$xK+ne?G#1kz)mc+*RZKbME^iVd+f1q94LFly9DVVH1^*9JP(!LF6');
define('NONCE_SALT',        '+kN#eOLfouX$yxk43jT*t?L8Wz0u^K2^2^NQ(MF3gyJ%TY^hyDt15E9fwZZ^R?@^');


/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
