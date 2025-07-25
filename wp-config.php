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
define( 'DB_NAME', 'estateinDb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define('AUTH_KEY', '2/rmoO4_^RN}6UK14.M[]I3UY^a>*>DuN+%>{[xtM60R4tkg-/33H`0=Ue5VLwNT');
define('SECURE_AUTH_KEY', '#e?|$6?6XSOei[=Sm//3M74fK@+)^[TI:-laHbw%hmur`XuWss/XikO)9Opg6Jw<');
define('LOGGED_IN_KEY', 'Ao@YEr1q|D#$)rgC7~&R D1>3fQkZkVFcDGQWp}y^Ym$eNz#-GP0y+=%TW-;2*Vm');
define('NONCE_KEY', 'LRj5:BODg8$7fW3E^KTB9L;t[8sVN,f^Hyt+%_-e/#+*$Oi@7h3|~]K');
define('AUTH_SALT', 'erjBPlZEBDO$bSVvj{OmFHi|g9 ryPW{{&kM[`dV*S.o?]kGd<+X$oWU(&HlaaAN');
define('SECURE_AUTH_SALT', 'erjBPlZEBDO$bSVvj{OmFHi|g9 ryPW{{&kM[`dV*S.o?]kGd<+X$oWU(&HlaaAN');
define('LOGGED_IN_SALT', 'Au]@VzC>>*RZ=R}#,=B8tk_>yt>SsufGJ99J`nCjTFe:?>MFo!2]^]khNSA*e-0M');
define('NONCE_SALT', 'j34! ?vq].IUvf_vwy5 M72[6PMx7t?S1Wt9#9^(esfFd4gM)}Om2Nuo(3Gap#z8');

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';