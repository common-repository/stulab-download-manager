<?php
/**
 * Plugin Name: STUlab Download Manager
 * Version: 1.0.2
 * Plugin URI: https://www.stulab.fr/blog/download-manager/
 * Author: stulab
 * Author URI: https://www.stulab.fr/
 * Description: Plugin from stu-suite. Gives download access to uploaded files
 * Text Domain: stulab-download-manager
 * Domain Path: /languages/
 */

//Direct access to this file is not permitted
if (!defined('ABSPATH')){
    exit("Do not access this file directly.");
}

define('STU_DOWNLOAD_MANAGER_VER', '1.0.2');
define('STU_DOWNLOAD_MANAGER_DB_VER', '1.0');
define('STU_DOWNLOAD_MANAGER_SITE_HOME_URL', home_url());
define('STU_DOWNLOAD_MANAGER_PATH', dirname(__FILE__) . '/');
define('STU_DOWNLOAD_MANAGER_BASENAME', plugin_basename( __FILE__ ));
define('STU_DOWNLOAD_MANAGER_URL', plugins_url('', __FILE__));
define('STU_DOWNLOAD_MANAGER_DIRNAME', dirname(plugin_basename(__FILE__)));
define('STU_DOWNLOAD_MANAGER_TEMPLATE_PATH', 'stu-download');
define('STU_DOWNLOAD_MANAGER_DOMAIN', 'stulab-download-manager');
if (!defined('COOKIEHASH')) {
    define('COOKIEHASH', md5(get_site_option('siteurl')));
}
define('STU_DOWNLOAD_MANAGER_AUTH', 'STU_DOWNLOAD_MANAGER_' . COOKIEHASH);
define('STU_DOWNLOAD_MANAGER_SEC_AUTH', 'STU_DOWNLOAD_MANAGER_sec_' . COOKIEHASH);
define('STU_DOWNLOAD_MANAGER_MINIMUM_WP_VERSION', '4.0' );

include_once(STU_DOWNLOAD_MANAGER_PATH . 'common/stu-wp-actions.php');
include_once(STU_DOWNLOAD_MANAGER_PATH . 'common/stu-wp-filters.php');
include_once(STU_DOWNLOAD_MANAGER_PATH . 'class.studl-downloadmanager.php');

// Registers install and uninstall functions
register_activation_hook( __FILE__, array( 'studlDownloadManager', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'studlDownloadManager', 'plugin_deactivation' ) );

// Add custom type
include_once(STU_DOWNLOAD_MANAGER_PATH . 'classes/class-studl-CustomType.php');
add_action( WpActionHooks::Init, array( 'studlCustumPostType', 'init' ));