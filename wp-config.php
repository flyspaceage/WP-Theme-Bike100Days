<?php
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
define( 'DB_NAME', 'bike100DBbqnwb' );

/** MySQL database username */
define( 'DB_USER', 'bike100DBbqnwb' );

/** MySQL database password */
define( 'DB_PASSWORD', 'OP5UJjdxM' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']m6euAP+{exDS~;ap;DHt.Pe]9Uj3fuAUz>Uj3Iv,Xq6My<Ti${Xn3Iu.4Nz>Vk' );
define( 'SECURE_AUTH_KEY',  'k>,>UN}cZp]Wl1G-[Vk4-:Sh:Co-GVmixDT*;ap;Eq*LX.2l+Hi;1p~DT+]Wmi;DU' );
define( 'LOGGED_IN_KEY',    ',fIy<8Jw|Rg}ChwC8Nz[Vk7Nz>Qg}BgvBc>8kz]9l-GS~:Sh;Dp~Ka:C8l-GV!:Sh' );
define( 'NONCE_KEY',        '{M3juIogG>Uk0Fr^FV!0cr4JapGW_1Zp;Dp~Ka#5o~-GV!1do:Cp~KZ|GXm2Eq*LH' );
define( 'AUTH_SALT',        'z8N!v}cVsog:[G8sog@zJGdVR|@80rng@v^Y80JBr>@NkY},7SKd1#Dsh~OGZ_-;d' );
define( 'SECURE_AUTH_SALT', 'H;H]9;ap;Eq.Pe]DUjIv^Mf,4gUj0Jv,Xq7My<Tj{Bn$r7My{CR@}Zs8Ns|Rh:C0' );
define( 'LOGGED_IN_SALT',   '7vk@NgU>B0j$r[C1l~sGZO!5[Wph1KDsl~OGZ0[Cwk@RGZ}!4hVoC1O@s[ZNk*t]a' );
define( 'NONCE_SALT',       'H~h_2et9O+]AU^bq6{A^Mb<7jXnAP+{Xm2Lm$IX<6iy>8kzFY,4Yo4Jv|Rg3My>U' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
