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
define( 'DB_NAME', 'cornucopia' );

/** Database username */
define( 'DB_USER', 'flora' );

/** Database password */
define( 'DB_PASSWORD', 'potager-2026' );

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
define( 'AUTH_KEY', 'a161b6d60f1d888bfafd58a017bde6231ef546d5fe8f1f0f274a6f728f88cce9' );
define( 'SECURE_AUTH_KEY', '79e7df10cdd025bd82fd769dcc07d7690e0eee1d9ec0fee08470e24512c1a607' );
define( 'LOGGED_IN_KEY', '9b98c49efd52e381df33ac61797e7b56ec74f77e6d473ebc0ff31ebfc6abf1d5' );
define( 'NONCE_KEY', 'c55281421e593bc3411a473514c1ab7b84196e52006877c8c206104af739b7e0' );
define( 'AUTH_SALT', '9b2f47aac9cc960e76ca5896d8c9064d5815f2e9254abc2d3a87e1113033541f' );
define( 'SECURE_AUTH_SALT', 'dac011974f49ed4f49227a09a52848ec5c3a6dd48456296015e20fb8d1205e62' );
define( 'LOGGED_IN_SALT', '097adc86b37f74572ac8fd5e1de90f15d31d7445bad6e06e5961a54f7de8f61a' );
define( 'NONCE_SALT', 'b7029afa730cc3f7f3c0cd68c105be7c60a4b3bfec57add0a9d012e95f962fd6' );
define( 'WP_CACHE_KEY_SALT', 'bwc!2A]x?tAOS+Pl_y ^jW_hz(bJo?PO.<Rra0|E%:QG*&|wQD ?r-;ew&6)qeJ*' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
