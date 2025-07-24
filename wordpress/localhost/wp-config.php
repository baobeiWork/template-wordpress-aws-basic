<?php
/**
 * WordPress base configuration.
 * Generated via Ansible template.
 */

// ** Database settings ** //
define( 'DB_NAME',     'wp_localhost' );
define( 'DB_USER',     'wpuser' );
define( 'DB_PASSWORD', 'secret' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );


// ** Authentication unique keys and salts. **
define( 'AUTH_KEY',         'xxx' );
define( 'SECURE_AUTH_KEY',  'xxx' );
define( 'LOGGED_IN_KEY',    'xxx' );
define( 'NONCE_KEY',        'xxx' );
define( 'AUTH_SALT',        'xxx' );
define( 'SECURE_AUTH_SALT', 'xxx' );
define( 'LOGGED_IN_SALT',   'xxx' );
define( 'NONCE_SALT',       'xxx' );

// ** Table prefix **
$table_prefix = 'wp_';

// ** Debug mode **
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */
if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
