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
define( 'DB_NAME', 'jobboard' );

/** Database username */
define( 'DB_USER', 'jobadmin' );

/** Database password */
define( 'DB_PASSWORD', 'job123' );

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
define( 'AUTH_KEY',         '7ynf5R>%n4fUnQLw$/ldW,`H<.Ue*#=e}(2~fOq]1ek?)hO&:gD3{y4aVl3ir9t*' );
define( 'SECURE_AUTH_KEY',  '~-;U:8jN!7`%EZujJ~8Yn{cO0!g8/)%={nl%&?lo`f!8YR (6^|}@MKtqX}d^?~u' );
define( 'LOGGED_IN_KEY',    'ez/sSU-i%a)wo,&C6/Vw6XcDC.Cuvv(PBZo?ss8e1^r+~%n0p (bkTV,a^]Iw<]r' );
define( 'NONCE_KEY',        'O$(A<bY9[U.D`^zy]vwZ#XcV|dA{f{7 vN@QgmRL[zxF F`P3rl}G&!MbH_.*YTp' );
define( 'AUTH_SALT',        'EpSi]GLR-kVBpjj8L+ds.!3y9cO6PcnKfeF,UuRkpu`:ZSXKr4Jgm-9#Y~5ZpSvc' );
define( 'SECURE_AUTH_SALT', '7pu%m%4ENL<M.$mZ7v>ZL|Q8&WST+ar/B?Qd%~Sc/uKW@jqhN%39G&(@&Y[N,Nmy' );
define( 'LOGGED_IN_SALT',   '!S_^A{yNjY?RUh1>QnIYh:U)g|6(kslW]3df**UYPX+; j]+-7CdJHcC79LoU T]' );
define( 'NONCE_SALT',       'yj=9{.=_amdxb#dfkC.*Wy<:-OwW,O~2/iAv?C-%AMT=N1fX7WoQf,!hdnljdhw&' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_jobs';

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
