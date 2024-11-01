<?php
/**
 * Download pakage: studlDownloadManager class
 * Used to encapsulate functions 
 *
 * @package studl
 * 
 * @todo
 *  - nop
 */

 //Direct access to this file is not permitted
if (!defined('ABSPATH')){
    wp_die("Do not access this file directly.");
}

include_once(STU_DOWNLOAD_MANAGER_PATH . 'classes/class-studl-CustomType.php');

class studlDownloadManager {
    /**
	 * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
	 * @static
	 */
	public static function plugin_activation() {
		if ( version_compare( $GLOBALS['wp_version'], STU_DOWNLOAD_MANAGER_MINIMUM_WP_VERSION, '<' ) ) {
			$message = sprintf( __('STU Download manager %s requires WordPress %s or higher.' , STU_DOWNLOAD_MANAGER_DOMAIN), STU_DOWNLOAD_MANAGER_VER, STU_DOWNLOAD_MANAGER_MINIMUM_WP_VERSION );

			exit( $message );
		} elseif (!extension_loaded('openssl')) {
			$message = sprintf( __('STU Download manager %s requires OpenSSL extension installed on your PHP server.' , STU_DOWNLOAD_MANAGER_DOMAIN), STU_DOWNLOAD_MANAGER_VER);
			$message .= __('Ask your PHP asministrator to install it. For information see ' , STU_DOWNLOAD_MANAGER_DOMAIN)
				. '<a href="https://www.php.net/manual/en/book.openssl.php" target="_blank">php.net openssl manual</a>.';
	
			wp_die( $message );
		} elseif (!class_exists('ZipArchive')) {
			$message = sprintf( __('STU Download manager %s requires ZIP extension installed on your PHP server.' , STU_DOWNLOAD_MANAGER_DOMAIN), STU_DOWNLOAD_MANAGER_VER);
			$message .= __('Ask your PHP asministrator to install it. For information see ' , STU_DOWNLOAD_MANAGER_DOMAIN)
				. '<a href="https://www.php.net/manual/en/book.zip.php" target="_blank">php.net ZIP manual</a>.';
	
			wp_die( $message );
		}
    }
    
    /**
	 * Removes all connection options
	 * @static
	 */
	public static function plugin_deactivation( ) {
		studlCustumPostType::customTypeUnegister();
	}

	/**
	 * Translate plugin description
	 */
	public static function modify_plugin_description($all_plugins) {
		if ( isset( $all_plugins[STU_DOWNLOAD_MANAGER_BASENAME] ) ) {
			$all_plugins[STU_DOWNLOAD_MANAGER_BASENAME]['Description'] = __( 'Plugin from stu-suite. Gives download access to uploaded files', STU_DOWNLOAD_MANAGER_DOMAIN );
		}

		return $all_plugins;
	}
}