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
define( 'DB_NAME', 'socialmedia_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'wD5 4_;rS9F|/dvhr)JfDOsO<3z`P0Z*(yM5k[ g-*_Y,1D_1pmU+P)dG*C~{/+Y' );
define( 'SECURE_AUTH_KEY',  'Q8k`R/K3e{!mhxJsqS-=A9?N Cb_|/ #E!;bn/<q0F IJpIr]7 2+%vK<)uW/YsR' );
define( 'LOGGED_IN_KEY',    't3B5u&]m#tM;=id>CPq9-I%m(Tn_I+*o2:m~%]~d+k`DhbeCc4yo-H^&43y4+:k]' );
define( 'NONCE_KEY',        '@oLGjAuN>kGV;g?wMUFX=./Fa}s9b&:TBQ1[Yr]>`X|%/YTE!(Tmp:3-W$2}]Qem' );
define( 'AUTH_SALT',        '$I>Jpzgk srDb~i^D7(w`Bda V9Wf ?&>!g^[1<@CCSNc#,:CT:v,nP+(0[*VWT@' );
define( 'SECURE_AUTH_SALT', '.L,lmKEq|JleO5I3n7iPHyaX2lAp:Rok/_cq6AIL^&{y-?H{=m,p}Oz,0=(*,?Ow' );
define( 'LOGGED_IN_SALT',   '[.U^c:99k&,[q!CYux7q6Hn2YXJ>Q<YBLxDsP!ap!wN>pM@qat7W8VbwQ|0fYnM1' );
define( 'NONCE_SALT',       'qIkx/1];I ?@rmCI}]-^yY!XAi|g_=pVo2j&>Q&)^+ M*MTM_#@vXL]Z36<agg9k' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
