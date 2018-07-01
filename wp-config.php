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
define('DB_NAME', 'wp_learnwordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Qm>5y>+2[G8Hx&Ru93^}5O7}sW5wwHY>~docN18{Ir^U&}kNbYc?;u_Oo=,50sj9');
define('SECURE_AUTH_KEY',  '02.@1:2e%4y6$s_4juM{y@&VjT%*1wHb=v>bI6 la>Uzw4>jfG9W<P%wF;?H?T*O');
define('LOGGED_IN_KEY',    '8C9_2ANhqfQe8:lAngMZrEh+}L;Q_+sl^?h}aggf@MR@yH8JUTs}?Q`3.#|!6Ro(');
define('NONCE_KEY',        '4:B1>]`@sH5ov!s{R-aez!^!y![iNTlVT@B%*^>n#H-q:Ke?:JR(FYN/ dv>:JWw');
define('AUTH_SALT',        '-a,6*P2*{*`XBZU2c<anKlD}Lq^?bOFF-NLMebtRGT%yW[y(G-rB/H,05Wrm pb/');
define('SECURE_AUTH_SALT', 'dL/[vpBj3G+2Eu:U&%mqLRHrX*?y# [9rBy,k=:2/6rr+q&vBTt $!p/v4s{F!8U');
define('LOGGED_IN_SALT',   '+r/$`Nl5{ujpA$;e`?Jz/nB9Q^as$]d>@R_[`Fy3<7:BD$dh}d+JQ}6.Ty)1orKW');
define('NONCE_SALT',       'Uf&s$ Q(eNALIn/_twnK_>f<TwMpZw=%7#HJ9Gnv%8G?6u3%.qt !e6ibiGYR5Ga');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
