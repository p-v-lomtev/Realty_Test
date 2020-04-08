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
define( 'DB_NAME', 'u0994751_wp49' );

/** MySQL database username */
define( 'DB_USER', 'u0994751_wp49' );

/** MySQL database password */
define( 'DB_PASSWORD', '(6pQSd4)51' );

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
define( 'AUTH_KEY',         'evp7riwk95nhsbxu8fhxypuatj24mxmnah3hqcumyb2ypofjpcjjnpitcplyoxif' );
define( 'SECURE_AUTH_KEY',  'hnucd0pbyu0ewkic0jb5tcwcfzgnemefsyq3tnii6zu9c5zj0tdgpnan0l5mlsjy' );
define( 'LOGGED_IN_KEY',    'mk6gdp5zgaytzlillbh4bf027bk66pnlqud8oejacynwenoco8pphya0odarsacs' );
define( 'NONCE_KEY',        'jijnirbjuqchyev7qtpvd8rfkt2silm06fdr7s0bendb1nkdtcijl0s7jlwih87p' );
define( 'AUTH_SALT',        'qmsebte68izfpwpcgpafhcou91enmrig1qr9nxzc7lxih7e0i7oz297axfpyqmub' );
define( 'SECURE_AUTH_SALT', 'woqpbh7pouwizhz7zioxumzrk8tuugpnp4fsxdevjflp5r7lpe1ltd4cilvm7qtr' );
define( 'LOGGED_IN_SALT',   'epyl2qvzwzanoqu60iow26zdxlzerzuoxfoapcnlvo0toycpf3fbyk5cg5kqe7b1' );
define( 'NONCE_SALT',       'vnbwacjuzxnkdfsygntngcsehulnarqv3hjjcg0efk82objd71atlrdxnkqjhyhm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp45_';

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
