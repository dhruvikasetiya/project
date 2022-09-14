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
define( 'DB_NAME', 'theme' );

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
define( 'AUTH_KEY',         'p{e1n.-5d->d%ABeZu#TNCXu]PB3Sm[bwXP~6@Bj >7I@4YBOkCvRu513[g[<5nJ' );
define( 'SECURE_AUTH_KEY',  'TTvw*jtk<w.G}xvrjVv=J?20M!Rt~&N)$tR_w29Amb)j;=u}-)O0_4iUYm;Qa)yQ' );
define( 'LOGGED_IN_KEY',    'B{$vVaxI=,#8S_W xe1YvcIjmlSWKE/ <zCH^W9_ckCs{dAT;X?_zi!N-s:Kk,fi' );
define( 'NONCE_KEY',        'gRTVGTg*)@yA29uU(6g&[)0sk:-/DK5YEePh9Xz(:N&]KpNX;I3Un4k9|q-8Vk( ' );
define( 'AUTH_SALT',        '!p<;alx6WfOvY>7TbBU/Vnl*ae@;yreUCV9Da1=uj4vey)F^GiGwl+GU,4<2Kf,X' );
define( 'SECURE_AUTH_SALT', 'lLoX:[a8p8~xqUmpgxZU<eK8TK1d$rXKMRA|(-U0o.jSl>C9}CnH{x6/$:>)xcPO' );
define( 'LOGGED_IN_SALT',   '?{/h%?^_yw*P[L9<ytn:f%6>bNp>yU-Q:5D,dnQcRakZtHSc$g}UPttvs@dk}5f$' );
define( 'NONCE_SALT',       'uhn9!Sgb`)}sHg#^0@s6(R9Ht.U10^yj=m^@W_LZ0*|.e2naW{K{= /C:A<}DOo)' );

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
