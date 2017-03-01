<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jp_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'i0}f?PHtrOuwU|h7C7UOe[wgp&_!cX%L[Zg+~D*fA+-=88k4,D1q(aMX)YK>rF#%');
define('SECURE_AUTH_KEY',  '.+qy)r+QV`r~GM-]%%-SiZtR?1qQBa6V<{k/[yp=-5o))]EWMX$EtO)n_tCP6?_r');
define('LOGGED_IN_KEY',    'Zl?rnRN,(t*)gCua0_gVZH+-y/^D6ggA[;R 0:5c% H2ecc!w9yQv|II]/28(VIv');
define('NONCE_KEY',        '@Q<O/+wqvUWC*P|JdK.@xw!DDGqK9|;P`2.,1.71:Wzb[L~4pc-|e(G++,d4,0! ');
define('AUTH_SALT',        '=.A>8|0),+E0_joR^]mqy^O 1gME6PyD!:*~vH_5h+!t=WL!,a_w+y,Eim~-.N$$');
define('SECURE_AUTH_SALT', 'c2@|I,9lct+Yx.6l$*-DCYb%!^0qla,52og(/[f.gpF37<23M`eg)[t*`v0Mjk1t');
define('LOGGED_IN_SALT',   '/Gob?N-o,H%S~_5|Jg^0KDNe.oB|6c x3|$I%m3t7_}W<c|Vo~o(_@ll*y|I/ozx');
define('NONCE_SALT',       'a1zZkY8kZ79g&4_-L*kj)Hl}2mgKmCu5>j-{eL4_Ff4&q#;AmDRO<)_8/PdlZi,Q');

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
