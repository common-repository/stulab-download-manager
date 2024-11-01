<?php
/**
 * Download pakage: studlShortcodes class
 * Implements Shortcodes tranformations into external plugin texts
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

add_filter( 'widget_text', 'do_shortcode' ); //Enable shortcode filtering in standard text widget

/**
 * Custom post Shortcodes class
 */
abstract class studlShortcodes {

    /**
     * Registration function: list all managed Shortcodes
     */
    static function register()  {
        add_shortcode('studl_title',array(self::class,'title'));
        add_shortcode('studl_description',array(self::class,'description'));
        add_shortcode('studl_thumbnail',array(self::class,'thumbnail'));
        add_shortcode('studl_filename',array(self::class,'file_name'));
        add_shortcode('studl_filesize',array(self::class,'file_size'));
        add_shortcode('studl_filedate',array(self::class,'file_date'));
        add_shortcode('studl_fileversion',array(self::class,'file_version'));
        add_shortcode('studl_filemd5',array(self::class,'file_md5'));
        add_shortcode('studl_filesha1',array(self::class,'file_sha1'));
        add_shortcode('studl_filedownload',array(self::class,'file_download'));
    }

    /**
     * 'wp_kses_allowed_html' filter callback
     * 
     * Allow Shortcodes into input onclick attribut
     */
    static function KsesAllowedHtml( $allowedposttags, $context ) {
        if ($context=='post') {
            $allowedposttags['input']['onclick'] = true;
        }
        return $allowedposttags;
    }

    /**
     * Shortcodes functions section: 1 function per Shortcode
     */

    static function title( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = get_post($post_id)->post_title;

        // Return result
        return $output;
    }

    static function description( $atts ) {

        extract( shortcode_atts( array('post_id' => '', 'part' => 0), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = get_post($post_id)->post_content;

        if ($part>0) {
            $pattern = '/<!--more-->/i';
            $parts = preg_split($pattern,$output);
            if (count($parts) >= $part) {
                $output = $parts[$part-1];
                $pattern = '/(<!-- wp:more -->|<!-- \/wp:more -->)/i';
                $output = preg_replace($pattern,'',$output);
            } else $output = '';
        }

        // Return result
        return $output;
    }

    static function thumbnail( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = get_post_meta($post_id,'thumbnail',true);

        // Return result
        return $output;
    }

    static function file_name( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = get_post_meta($post_id,'name',true);

        // Return result
        return $output;
    }

    static function file_size( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = size_format(get_post_meta($post_id,'size',true),2);

        // Return result
        return $output;
    }

    static function file_date( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = date_format(DateTime::createFromImmutable(get_post_meta($post_id,'date',true)),'d/m/Y');

        // Return result
        return $output;
    }

    static function file_version( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = get_post_meta($post_id,'version',true);

        // Return result
        return $output;
    }

    static function file_md5( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = get_post_meta($post_id,'md5',true);

        // Return result
        return $output;
    }

    static function file_sha1( $atts ) {

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
    
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $output = get_post_meta($post_id,'sha1',true);

        // Return result
        return $output;
    }

    static function file_download( $atts ) {
        static $id = 0;
        static $key ;
        
        // This key validates download file request
        // It's calculated from URI to avoid $_SESSION overflow
        if (!isset($key)) $key = md5($_SERVER['REQUEST_URI']);

        add_filter( WpFilterHooks::WpKsesAllowedHtml, array( self::class, 'KsesAllowedHtml' ),10,2);

        extract( shortcode_atts( array('post_id' => ''), $atts ) );
        
        if ( empty( $post_id ) )  return ''; // No id => nothing to do

        $id++;

        if (!isset($_SESSION['STUDL_FILES'])) {
            $_SESSION['STUDL_FILES'] = array( $key => array($id => $post_id ));
        } else {
            $_SESSION['STUDL_FILES'][$key][$id] = $post_id;
        }

        $url = STU_DOWNLOAD_MANAGER_SITE_HOME_URL . "/" . studlCustumPostType::postTypeName . "/getfile/$key/$id";
        $output = "window.location='$url';";

        // Return result
        return $output;
    }
}