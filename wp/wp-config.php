<?php
/**
 * Hardening the wordpress config, to keep our database information out of harm's way.
 *
 * 1. create a conf/ directory outside of DOCUMENT_ROOT, and create an .ini file.
 * Using the php_uname('n') function, we can obtain the name of the server, and give our
 * .ini file that filename. 
 * 
 * ex: excelero.websitewelcome.com -> excelero.websitewelcome.com.ini
 *
 * Basic ini file info:
 *
 * [wp_db]
 * DB_NAME=databasename
 * DB_USER=database_username
 * DB_PASSWORD=db_password
 * DB_HOST=hostname
 *
 * @package WordPress
 * @author - sfleming
 *
 */

// ** MySQL settings - You can get this info from your web host ** //

// Keep our database creds outside of the doc_root, away from prying eyes.
$iniConf = parse_ini_file($_SERVER['DOCUMENT_ROOT'] .'/../conf/'. php_uname('n') .'.ini', true);

/** The name of the database for WordPress */
define('DB_NAME', $iniConf['wp_db']['DB_NAME']);

/** MySQL database username */
define('DB_USER', $iniConf['wp_db']['DB_USER']);

/** MySQL database password */
define('DB_PASSWORD', $iniConf['wp_db']['DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST',$iniConf['wp_db']['DB_HOST']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '@j?ipQ1nR,yuuCW@testing.comAS-{%gQEpSr_+<dyb+>:Yd#nWbetyh~4rmMUap4Q6rZEcZy');
define('SECURE_AUTH_KEY',  '+hOIBXnJ~C;ftmT([CA|]_wDSsamplesite.comG<K?#S8{H>//EaLy7]h:jhRfj.K=Usg#g&$9+ox');
define('LOGGED_IN_KEY',    'c8K?-u_wU{BZ2yHK_sbOo1@?!samplesite.com}H<`PM%7^l6VJTY,~DSOJ,zCtVI@Ym$WZi1@5x5');
define('NONCE_KEY',        's5,9YV+%:+HFX#l~ %RE`AZ/psamplesite.comUzn<&<R%71t-|[H-L+}AtN9/thH&dMcVM8WN|Q}');
define('AUTH_SALT',        'KUEIq@~d.Tk+~t>1:HS9$8G_*samplesite.comzG,jcuq2l=7l#KE[-1c)QW3a{LwGi-kwhRVP&]g');
define('SECURE_AUTH_SALT', ';0GoKVCGWIZh:YOa*h[]-T&Disamplesite.comnp=:iQ;z$>OkEYNi2@Y`|5-c|n:Jb #}97E?LX7');
define('LOGGED_IN_SALT',   'we3RP{hVolwbVh-((L%LEcHKlsamplesite.com[IaA9<bDvi`h/M:3U7xK8S]A|.Q,2$|*jcOqWNB');
define('NONCE_SALT',       '~<MckLITBiGaIV)497^JDbe-)samplesite.comG:*}/Prup?HeQMLNLz2kG~d/306X7Noin@gGh7+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

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
