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
define('DB_NAME', 'wordpress');
/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'kokoliko');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '!kp>e,!5x:,8VJj*$YR6w-Y<-ComBe>&~s)XPcR_qBZ>msD!i{5^+<z+Cu-~}!4|');
define('SECURE_AUTH_KEY',  'SHV1OnT-c&o[A9x42xL:Yk.Z_b33pQ[^F[OS3?]g-D:t5_A.w?h^E)q3{aJIUbNc');
define('LOGGED_IN_KEY',    '|gOn+gRRay+Z=iYrX9~zG~#&~|#R9Z-R^()#E? 0)x>}M%-r3KPL/|rpOLE)o099');
define('NONCE_KEY',        '-cQywS8ZNQ_>$R+?a|r|a%YTC3t9n-{=qDC@,xeB,5~%Ao8li,~?w:V~ov5azR~:');
define('AUTH_SALT',        '~QKqH.N0,o-A|!q.UkQ1<EE8 aqC17J~(3j;|!#&H`%F(cRm;jLo5FMsV/|B*nYi');
define('SECURE_AUTH_SALT', 'k:t%nzQEl~Q|f+u+7@/@(.TAt6Ef-Wkw}u;*Y@A3kp3|O@05=`2M)$>59-0{7),a');
define('LOGGED_IN_SALT',   '@T`pW|P-9+[zx|sO_uzA&BEIVsfL &8V+~^|@RHIgQEeph/a|{]D|zfw)SRpN3-B');
define('NONCE_SALT',       'wycHK_Pf0>I~6EQxb!jkn^RIQepojs+cqAf-Mc7$u/HDD}Wsa+~b|5F8}Qf#-#IX');



/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wprs_';

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
