<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
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
define( 'DB_NAME', 'starda45_wp847' );

/** Database username */
define( 'DB_USER', 'starda45_wp847' );

/** Database password */
define( 'DB_PASSWORD', 'Sx09[4x[p2' );

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
define( 'AUTH_KEY',         'dqglpzg7326ycvl9fslr8td6bjzuonbjsyqeszs0oxrqsxxlmlxljpwfhlin3ghr' );
define( 'SECURE_AUTH_KEY',  'xsubhn39hmdrlbbicbnqjlhmd8dr3pxgpzzuya6tmkmqcfmrlckyarawuopeunpn' );
define( 'LOGGED_IN_KEY',    'ho3m9y7w2kjwdhlmei4yme9faglobwao0qe4u5btyrfuuic52af4cyvvb385xca4' );
define( 'NONCE_KEY',        'rj1r6cnbxjavjlqh09q9kmyx5x6jhzsuuzuw79y0verzmvkidzutu9h5gjljvouf' );
define( 'AUTH_SALT',        'pazzfhh8fjmwswlmlbyswncjlwebyp4f7uatp1m9nvabjdlimsqn9eugysjoyvfw' );
define( 'SECURE_AUTH_SALT', '16wwapjqg36uh7gfwsve4yclp5im0esd3arm5decchq2d0vpte0k2w072zkkrwvm' );
define( 'LOGGED_IN_SALT',   'vvf6bpe3oaibuej0xnyqcgtpv77amvi0x0qrt3iezqqivy3qhcaump5llrayxiy9' );
define( 'NONCE_SALT',       'susxudloavnhkjlvvmc5m7xabu6cicrtylwvkc3rz7mx91vujoevug7ygztc2juu' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpqw_';

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
