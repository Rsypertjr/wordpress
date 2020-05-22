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
//define('WP_HOME','https://ide.c9.io/rsypertjr/fuel-cms/wordpress');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rlsworks_caribbeancatering');

/** MySQL database username */
define('DB_USER', 'rlsworks_richard');

/** MySQL database password */
define('DB_PASSWORD', 'syp3rt');

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
define('AUTH_KEY',         '{lRs:w9`|:e{@8(}ul{mwK+}7SuZ9o-|VHuHGh|r|iB|L}9PO:Ud}Z:&K,l,ebpp');
define('SECURE_AUTH_KEY',  'Id<Amk|hQ<d+<CCdF#&_$JT$rYfX28q~q>,_zwEbG-RPzH;:k b~HIk6aYy6Eyl:');
define('LOGGED_IN_KEY',    'K/P;SxhUw+i^vAZWq}R{pb;YvDsUYl5_DH,*DM@4uk?)$Hl^4@3J jX8^XGuhQS|');
define('NONCE_KEY',        '4!PhI-W{g&D6>r6nU1mrh.uBlJjB=pmI fyONM3u8vfJw*>Jno4M-)[Z*Y{o!z8l');
define('AUTH_SALT',        '#C9`=WeOi.8[MU|^$PD-!dK#A=61(,B*@<u|oSDkdr]%aChC?l1 &3#o,LCNrm&5');
define('SECURE_AUTH_SALT', 'Zm!s*+q@lG|,wgLIwp2{p#kx-;~CU*?m4~xb&5e-D>G..C(_><Zg&(1RmL(ti,B6');
define('LOGGED_IN_SALT',   'j@s(z`vc2{v(TZvi00[Gj.lzVR|b+Yi-?aU742W}LeBy9)C}IiMv2q}E!BEag)eP');
define('NONCE_SALT',       '3/l7aQz#;O8+{4(1d3_*#R!&f{:Cw+,T.Net}yF<=1Ja_^mi1Fgd9Y1:+c%6|`C<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
