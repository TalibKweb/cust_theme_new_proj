<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'notandas-realty' );

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
define( 'AUTH_KEY',         'pr.wdddwo4)GmmX_zH&*~TW)aI:g36P=0s @d;3G<6&rx-x-]rx?*@@PzNo6ol%r' );
define( 'SECURE_AUTH_KEY',  '~N 4BQ(F;7Un-QH !=6IyQPZv6gmA#a@PCTOOQU<5ogwVZ<7F+<_b}{[o&1a=%[m' );
define( 'LOGGED_IN_KEY',    ':PAnro!jo&m~W08k_4M8]k^;h.shk,wr:V6jY7 qf`ruwdk1%NOn&aO*y+Ga6#pc' );
define( 'NONCE_KEY',        'U8c* U>Pu-bi)-L)T^6ty)y K7=]EwEti(G0{VS>lY+Vm*O&hFf=MabyE5S[VJ7m' );
define( 'AUTH_SALT',        '7ZV~qMS=e_%M,!/7EYyq~E8^B /Fk+W>0d}ahR~([%Z__>lO%v.kp.d/)E{:[K_^' );
define( 'SECURE_AUTH_SALT', 'rvTT~)oIoiFmnAZHgQjM!=oE}(8`(WwskShJT5,^,~.Wfa/&jT*!>d|DFL@FFX&g' );
define( 'LOGGED_IN_SALT',   'Uli*.3}G|UWIK^sj[o:eKg|w_(]BMoAbPX.,HuWPcXUR[}Z%RY;9;fYFy -]!_w,' );
define( 'NONCE_SALT',       'z:/f4pdotr)#0]H5/s]B#KvVseEY2u4u0{xKUTv0y-/wh$E[QaDf;X>6SY4TbY^]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

@ini_set('upload_max_size', '120M');
@ini_set('post_max_size', '120M');
@ini_set('max_execution_time', '300');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
