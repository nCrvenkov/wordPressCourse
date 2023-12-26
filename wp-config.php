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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'H5n|oW/9[U]7[p8JpM/F0pZGp_$iw Cbr2f>Pb%hOQsBK``0G]aF5gN*nKhl-T}^' );
define( 'SECURE_AUTH_KEY',   'I;o`!x%ROXb52uMJT.rHZ[j[B[Qpo~~B,7>@?!;Y!0><&u>-/<+P=z45w!W4 Gb ' );
define( 'LOGGED_IN_KEY',     ':8]^KK?E@$PKR$p9[U=?!Xmc;hzp  }6>ve$ZY9EI:hGS|GDHK(sEn3/,E%;fIsW' );
define( 'NONCE_KEY',         'bYYdo?C20#+_p&jy}Y@+#x/q0_}b&A1FUb,ZToRk>/|4+#a$C7?:H32`qQa~c]2<' );
define( 'AUTH_SALT',         ',%qNjM/0L(>YD!jHQ@;3BeQ(]7*z61jdd1I-$.Jv{4QTd(=JY?q-3&$Gr/*wKcDJ' );
define( 'SECURE_AUTH_SALT',  'p#W<=.pAc9{J?LI(F>$_Z`qqG1G.Lk`UlR`yLF1bW}vb,=g.RJEt[EM^):pOrw&=' );
define( 'LOGGED_IN_SALT',    'g@h5vLefDj{!JlRv(k^8@h(HbyT<&Xtr0%0sTPC3w*?UgKa*#H.7x3R(_*ow_OvV' );
define( 'NONCE_SALT',        'e:>< RHXq!I6ykH0iVDn<`ZwZj}l+0|ZJk)M>hF^mI/YL9=M*2`#VtSDCv04A5i7' );
define( 'WP_CACHE_KEY_SALT', '2<>B8(|^5er (>D}W{`u8f&x0[.E2sMyCEvV[ab@27vJo^iXS6%bG{_ Q K1W.s.' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

//define('COOKIEPATH', '/');

/* Add any custom values between this line and the "stop editing" line. */



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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
