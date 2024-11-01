<?php
/**
 * Download pakage: plugin options structure
 *
 * @package studl
 */

//Direct access to this file is not permitted
if (!defined('ABSPATH')){
    wp_die("Do not access this file directly.");
}

 /**
 * Enumeration class of settings properties
 *
 * @access public
 */
abstract class studlSettingOptions {
    const key = 'studl_options';
    const RepositDir = 'RepositDir';
    const BlogTemplate = 'BlogTemplate';
    const BlogCategory = 'BlogCategory';
    const Cipher = 'Cipher';
}

/**
 * Setting class used to store plugin options
 *
 * @access public
 */
class studlSetting {
    public $settings;
    static private $_this;

    function __construct()
    {
        // All setting with default values
        $this->settings = array (
            studlSettingOptions::RepositDir => 'StuDownloads',
            studlSettingOptions::BlogTemplate => file_get_contents(STU_DOWNLOAD_MANAGER_PATH . 'layout/template.html'),
            studlSettingOptions::BlogCategory => 0,
            studlSettingOptions::Cipher => 'aes-128-ctr'
        );

        $options = get_option( studlSettingOptions::key );

        if ($options) {
            $this->settings = array_merge ($this->settings, $options);
        }
    }

    static function item() {
        if (!isset(self::$_this)) self::$_this = new studlSetting();

        return self::$_this;
    }

    static function save() {
        add_option(studlSettingOptions::key, '');
        update_option(studlSettingOptions::key, self::$_this->settings);
    }

    static function uninstall() {
        delete_option(studlSettingOptions::key);
    }

    static function getPassword() {
        $key = get_option( 'studl_key' );
        if (!$key) {
            if ( defined('AUTH_SALT') && AUTH_SALT ) {
                $key = AUTH_SALT;
            } else {
                $l = 32;
                $strong = true;
                $key = bin2hex(openssl_random_pseudo_bytes($l,$strong));
                add_option('studl_key', $key);
                $key = hex2bin($key);
            }
        }
        else $key = hex2bin($key);

        return $key;
    }
}