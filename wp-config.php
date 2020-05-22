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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'database' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'hjDMe/1j*p*He2op8vjb]RG?D|jn|9>A38@8UtS1xN[Os0l<#z}Kok^?#HlORop&' );
define( 'SECURE_AUTH_KEY',  'jP4KegMwsT(OxxEEYIa~N!weHd;Y=gZKt<8}b>tfow~F,/9xtB-shA/YqdQNk9fF' );
define( 'LOGGED_IN_KEY',    'xvV}de?*N.@48A$)V(Vr?2?89tGb(?36W/.,hgNRwUZK|^kbwWt<m(YBV1P1s{Zl' );
define( 'NONCE_KEY',        'ZvdbgT,#RW`ylv3mm!Qy25w:kCSc=z5xz#JI99~nGe}gO]56wZO}NtEr4_sYiGE%' );
define( 'AUTH_SALT',        'a)Sm)b^[;kLjmwQxpT|3233Vr}*j*MOoEEG7vW8W$hG}s&`BpNn-G}K$dAJfqFxm' );
define( 'SECURE_AUTH_SALT', 'fW{)G@c5#3l*U@T3H8nYky@vs OAq0NAJU6ym4vvQ0kq8%Pk)zr,bc/N*ZzxPywW' );
define( 'LOGGED_IN_SALT',   'ZK)[Z>Dvy+o, rG%tVEFpnizey2!Wx1_3Al)Kof3)U==wx(oilp(gG_>U[K>0+CR' );
define( 'NONCE_SALT',       'v]J:c:vY38;=f&M=G*FF+ed)s[S@gdt4rMqL6MVP#=t=[C;jIT$9E*jlhc -<6k^' );

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

