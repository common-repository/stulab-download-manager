<?php
/**
 * Download pakage: studlCustumPostType class
 * Implements Download custom type blog 
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

include_once(STU_DOWNLOAD_MANAGER_PATH . 'common/stu-wp-customtype-labels.php');
include_once(STU_DOWNLOAD_MANAGER_PATH . 'classes/class-studl-Setting.php');
include_once(STU_DOWNLOAD_MANAGER_PATH . 'classes/class-studl-Shortcodes.php');

/**
 * Custom post class Download
 */
abstract class studlCustumPostType {
    const postTypeName = 'stu_download_manager';

    /**
	 * 'init' Action callback.
	 * 
	 * Custom type creation
	 */
    static function init() {
        // Load text translation file
        $user = wp_get_current_user();
        $local = '';
        if (isset($user)) {
            $local = $user->locale;

        } 
        if ($local=='') {
            $local = get_locale();
        }
        load_textdomain( STU_DOWNLOAD_MANAGER_DOMAIN, STU_DOWNLOAD_MANAGER_DIRNAME . '/languages/' . STU_DOWNLOAD_MANAGER_DOMAIN . '-' .$local . '.mo' );
        load_plugin_textdomain( STU_DOWNLOAD_MANAGER_DOMAIN, false, STU_DOWNLOAD_MANAGER_DIRNAME . '/languages/' );

        // Create custom type
        $labels = array(
            WpCustomtypeLabels::name            => __( 'Downloads',  STU_DOWNLOAD_MANAGER_DOMAIN ),
            WpCustomtypeLabels::singular_name   => __( 'Download', STU_DOWNLOAD_MANAGER_DOMAIN ),
            WpCustomtypeLabels::menu_name       => __( 'Downloads', STU_DOWNLOAD_MANAGER_DOMAIN ),
            WpCustomtypeLabels::all_items       => __( 'Download List', STU_DOWNLOAD_MANAGER_DOMAIN )
        );
        $customTypeDef = array(
            'label'                 => __( 'Download', STU_DOWNLOAD_MANAGER_DOMAIN ),
            'description'           => __( 'Upload files to publish for download', STU_DOWNLOAD_MANAGER_DOMAIN ),
            'labels'                => $labels,
            //supports : ‘title’, ‘editor’, ‘comments’, ‘revisions’, ‘trackbacks’, ‘author’, ‘excerpt’, ‘page-attributes’, ‘thumbnail’, ‘custom-fields’, and ‘post-formats’
            'supports'              => array( 'title' ),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_rest'          => false,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-download',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true
            //'capability_type'       => 'page',
        );

        $postType = register_post_type( self::postTypeName, $customTypeDef );
        studlShortcodes::register();

        flush_rewrite_rules();

        add_rewrite_tag( '%getfile%', '([^&]+)', 'getfile=' );
        add_rewrite_tag( '%id%', '([^&]+)','id=' );
        add_rewrite_rule( '^' . self::postTypeName . '/getfile/([^/]*)/([^/]*)/?', 
                        'index.php?post_type=' . self::postTypeName . '&getfile=$matches[1]&id=$matches[2]','top' );

        if (is_admin()) {
            add_action( WpActionHooks::PostEditFormTag , array(self::class,'post_edit_form_tag' ));
            add_action( WpActionHooks::AdminMenu,array(self::class,'initMenu'));
            add_action( WpActionHooks::PreGetPosts, array(self::class,'setFilters'));
            add_action( WpActionHooks::AddMetaBoxes, array( self::class, 'create_metabox' ), 10,2 );
            add_action( WpActionHooks::SavePost, array( self::class, 'save_edit_meta_box' ),10,3 );  // Save  metabox
            
            self::save_settings();

            add_action( WpActionHooks::AdminEnqueueScripts, array( self::class,'load_admin_script') );
        } else {
            add_action( WpActionHooks::WpHead, array( self::class,'post_display') );
            add_action( WpActionHooks::PreGetPosts, array( self::class,'send_file'));
        }

        add_action( WpActionHooks::BeforeDeletePost, array( self::class,'delete_file'));
    }

    /**
	 * 'admin_enqueue_scripts' Action callback.
	 * 
	 * Add javascript files for admin pages into output flow
     * 
     * @param string  $hook  Script name
	 */
    static function load_admin_script( $hook ) {
        global $post;

        if ( 'post.php' != $hook && 'post-new.php' != $hook ) {
            return;
        }

        if ($post->post_type != self::postTypeName) return;

        
        wp_register_script('studl_admin_scripts', STU_DOWNLOAD_MANAGER_URL . '/js/studl_admin_scripts.js',array(), false, true);
        wp_enqueue_script( 'studl_admin_scripts' );
    }

    /**
	 * Allows <input> and <style> tags into textarea (for post template)
	 */
    static function KsesAllowedHtml( $allowedposttags, $context ) {
        if ($context=='post') {
            $allowedposttags['input'] = array(
                'accesskey'		    => true,
                'class'		        => true,
                'contextmenu'		=> true,
                'draggable'		    => true,
                'dropzone'		    => true,
                'hidden'		    => true,
                'id'		        => true,
                'spellcheck'		=> true,
                'style'		        => true,
                'tabindex'		    => true,
                'title'		        => true,
                'translate'		    => true,
                'accept'		    => true,
                'align'		        => true,
                'alt'		        => true,
                'autocomplete'		=> true,
                'autofocus'		    => true,
                'checked'		    => true,
                'disabled'		    => true,
                'form'		        => true,
                'formaction'		=> true,
                'formenctype'		=> true,
                'formmethod'		=> true,
                'formnovalidate'	=> true,
                'formtarget'		=> true,
                'height'		    => true,
                'list'		        => true,
                'max'		        => true,
                'maxlength'		    => true,
                'min'		        => true,
                'multiple'		    => true,
                'name'		        => true,
                'pattern'		    => true,
                'placeholder'		=> true,
                'readonly'		    => true,
                'required'		    => true,
                'size'		        => true,
                'src'		        => true,
                'step'		        => true,
                'type'		        => true,
                'value'		        => true,
                'width'		        => true,
                'onclick'           => true,
            );
            $allowedposttags['style'] = array(
                'type'		        => true,
            );
        }
        return $allowedposttags;
    }

    /**
	 * Save plugin options from posted fields
     * Fired by layou/stu_download_manager_options_page.php
	 */
    static function save_settings() {
        if (isset($_POST[ 'studl-settings-save-check' ])) {
            // Check form
            if ( wp_verify_nonce( $_POST[ 'studl-settings-save-check' ], 'studl-settings-save' ) ) {
                $opt = studlSetting::item();
                add_filter( WpFilterHooks::WpKsesAllowedHtml, array( self::class, 'KsesAllowedHtml' ),10,2);
                $opt->settings[studlSettingOptions::BlogTemplate] = wp_kses_post(stripslashes($_POST[ 'studl_editor' ]));
                $opt->settings[studlSettingOptions::RepositDir] = sanitize_text_field($_POST[ 'studl_' . studlSettingOptions::RepositDir]);
                $opt->settings[studlSettingOptions::BlogCategory] = intval($_POST[ 'studl_' . studlSettingOptions::BlogCategory]);
                studlSetting::save();
            }
        }
    }

    /**
	 * 'post_edit_form_tag' Action callback.
	 * 
	 * Add needed option to form tag
	 */
    static function post_edit_form_tag( ) {
        echo ' enctype="multipart/form-data"';
    }

    /**
	 * 'pre_get_posts' Action callback.
	 * 
	 * Add filters when a post is open
	 */
    static function setFilters() {
        if (get_query_var('post_type')!= self::postTypeName) return;

        if (is_admin()) {
            add_filter( 'manage_' . self::postTypeName . '_posts_columns', array(self::class,'set_custom_columns') );
            add_action( 'manage_' . self::postTypeName . '_posts_custom_column' , array(self::class,'diplay_custom_column'), 10, 2 );
            add_filter( 'manage_edit-' . self::postTypeName . '_sortable_columns', array(self::class,'sortable_columns') );    
        }
    }

    /**
	 * 'add_meta_boxes' Action callback.
     * 
	 * Create metaboxes for the custom post type
     * 
     * @param string  $post_type  Type name of current post
     *        object  $post       Current post object
	 */
    static function create_metabox($post_type, $post) {
        if ($post_type != self::postTypeName || !is_admin()) return;
        
        add_meta_box( self::postTypeName . '_mb_param', __( 'Parameters', STU_DOWNLOAD_MANAGER_DOMAIN ), 
            array( self::class, 'display_edit_meta_box' ), 
            self::postTypeName, 'normal', 'default' );
    }

    /**
	 * Add custom fields into custom type edit form
     * 
     * @param object $post Current post object
	 */
    static function display_edit_meta_box( $post ) {  // metabox
        $old_request	 = $post->post_content;
        $request_field	 = array( 'textarea_name' => self::postTypeName . '_description' );
        $file = get_post_meta($post->ID,'name',true);
        $version = get_post_meta($post->ID,'version',true);
        $thumbnail = get_post_meta($post->ID,'thumbnail',true);
        $attached_post = get_post_meta($post->ID,'attached_post',true);
        if ($attached_post) {
            $linked_post = get_post($attached_post);
            if (!$linked_post || $linked_post->post_status=='trash') $attached_post=false;
        }
        if ($file) {
            $size = size_format(get_post_meta($post->ID,'size',true),2);
            $date = date_format(DateTime::createFromImmutable(get_post_meta($post->ID,'date',true)),'d/m/Y H:i:s');
        }
?>
        <table>
        <?php if ($attached_post) { ?>
        <tr>
            <th><?php _e('Publication page:', STU_DOWNLOAD_MANAGER_DOMAIN); ?></th>
            <td> 
                <a href="<?php echo STU_DOWNLOAD_MANAGER_SITE_HOME_URL . '/?p=' . $attached_post . '&preview=true' ; ?>" ><?php _e('View', STU_DOWNLOAD_MANAGER_DOMAIN); ?></a>&nbsp;|&nbsp;
                <a href="<?php echo STU_DOWNLOAD_MANAGER_SITE_HOME_URL . '/wp-admin/post.php?post=' . $attached_post . '&action=edit' ; ?>" ><?php _e('Edit', STU_DOWNLOAD_MANAGER_DOMAIN); ?></a>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <th><?php _e('File to share:', STU_DOWNLOAD_MANAGER_DOMAIN); ?></th>
            <td> 
            <?php if ($file) { ?>
                <label for="upload_image_button"><?php echo '<b>' . $file . '</b> (' . __('size: ', STU_DOWNLOAD_MANAGER_DOMAIN) . $size .__(' date: ', STU_DOWNLOAD_MANAGER_DOMAIN) . $date . ')'; ?></label>
            <?php } else { ?>
                <label for="upload_image_button"><?php _e('Select a file to upload', STU_DOWNLOAD_MANAGER_DOMAIN); ?></label>
            <?php } ?>
            <br /><br />
            <input id="upload_image_button" name="upload_image_button" type="file" class="button-primary" value="Select file" />
            </td>
        </tr>
        <tr>
            <th><?php _e('Version:', STU_DOWNLOAD_MANAGER_DOMAIN); ?></th> 
            <td><input id="version" name="version" type="text" value="<?php echo $version; ?>" /></td>
        </tr>
        <tr>
            <th><?php _e('Thumbnail:', STU_DOWNLOAD_MANAGER_DOMAIN); ?></th> 
            <td><table><tr>
                <td><img id="studl_thumbnail_image" src="<?php echo $thumbnail ?>" style="max-width:200px;display:<?php echo ($thumbnail==''?'none':'block'); ?>;" /></td>
                <td>
                <input type="text" id="studl_thumbnail" name="studl_thumbnail" value="<?php echo $thumbnail ?>"/><br/>
                <input id="upload_thumbnail_button" type="button" class="button-primary" value="<?php _e( 'Select thumbnail image', STU_DOWNLOAD_MANAGER_DOMAIN ); ?>" />
                </td></tr></table>
            </td>
        </tr>
        <tr>
            <th><?php _e('Description:', STU_DOWNLOAD_MANAGER_DOMAIN); ?></th> 
            <td></td>
        </tr>
        </table>
<?php
        wp_editor( $old_request, self::postTypeName . "_download_editor_content", $request_field );
    
        wp_nonce_field( self::postTypeName . '_box_nonce', self::postTypeName . '_box_nonce_check' );
    }

    /**
	 * Gives the full path calculated for an input file name
     * 
     * @param string $filename File name to concat with download directory
     * @return string full file path
	 */
    static function get_file_path($filename = '') {
        $path = wp_upload_dir();

        $settings = studlSetting::item();

        $path = $path['basedir'] . '/' . $settings->settings[studlSettingOptions::RepositDir] ;

        if ($filename!='')
            return $path . '/' . $filename;
        else
            return $path;
    }

    /**
	 * Save action from edit post form
     * Zip and cript uploaded file and store it into download directory using random UUID name
     * 
     * @return array Resulting full file informations to store in post
	 */
    static function save_file() {
        if ( ! function_exists( 'wp_handle_upload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }

        //exit(json_encode($_FILES));
        $uploadedfile = $_FILES['upload_image_button'];

        if ($uploadedfile['size']==0) return false;

        $UUID = self::get_UUID();
        $path = self::get_file_path();

        $settings = studlSetting::item();

        $file_infos = array(
            'path' => $path ,
            'file' => $UUID,
            'name' => $uploadedfile['name'],
            'type' => $uploadedfile['type'],
            'size' => $uploadedfile['size'],
            'date' => current_datetime(),
            'md5' => md5_file($uploadedfile['tmp_name']),
            'sha1' => sha1_file($uploadedfile['tmp_name']),
            'iv' => ''
        );

        // Create upload directory
        if (!file_exists($file_infos['path']))
            mkdir($file_infos['path']);
        
        $UUID = self::get_UUID();
        $path = get_temp_dir() ;
        if (substr($path,strlen($path)-1,1)!='/')  $path = $path .'/' ;
        $path = $path . $UUID . '.zip';

        // Zip uploaded file
        $zip = new ZipArchive;
        if ($zip->open($path, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $zip->addFile($uploadedfile['tmp_name'], $uploadedfile['name']);
            $zip->close();
        } else {
            return false;
        }

        // clean the first 2 chars
        $f = fopen($path,'r+');
        //fseek($f,0);
        fwrite($f,chr(0) . chr(0));
        fclose($f);

        $destfile = $file_infos['path'] . '/' . $file_infos['file'];

        // encrypt resulting file
        if (in_array($settings->settings[studlSettingOptions::Cipher], openssl_get_cipher_methods())) {
            $ivlen = openssl_cipher_iv_length($settings->settings[studlSettingOptions::Cipher]);
            $file_infos['iv'] = openssl_random_pseudo_bytes($ivlen);

            $fdest = fopen($destfile,'w');
            fwrite($fdest,openssl_encrypt(file_get_contents($path),$settings->settings[studlSettingOptions::Cipher]
                ,studlSetting::getPassword(),0, $file_infos['iv']));
            fclose($fdest);
        }
        $file_infos['iv'] = bin2hex($file_infos['iv']);

        wp_delete_file($path);

        return $file_infos;
    }

    /**
	 * Get previously saved file for current post
     * uncrypt and unzip stored file and put it into temporary directory using random UUID name
     * 
     * @return string path of the temp file
	 */
    static function get_file($post) {
        if (!isset($post))
            $post = get_post();

        $iv = hex2bin(get_post_meta($post->ID,'_iv',true));
        $file = get_post_meta($post->ID,'file',true);
        $name = get_post_meta($post->ID,'name',true);

        $settings = studlSetting::item();

        $path = self::get_file_path($file); 
        
        $UUID = self::get_UUID();
        $destfile = get_temp_dir() ;
        if (substr($destfile,strlen($destfile)-1,1)!='/')  $destfile = $destfile .'/' ;
        $destfile = $destfile . $UUID . '.zip';
        //exit(file_get_contents($path));
        

        $fdest = fopen($destfile,'w');
        fwrite($fdest,openssl_decrypt(file_get_contents($path),$settings->settings[studlSettingOptions::Cipher]
                ,studlSetting::getPassword(),0, $iv));
        fseek($fdest, 0);
        fwrite($fdest, 'PK');
        fclose($fdest);

        //exit($destfile . ' => ok');

        $path = get_temp_dir() ;

        // unzip file
        $zip = new ZipArchive;
        if ($zip->open($destfile) === TRUE) {
            $zip->extractTo($path,$name);
            $zip->close();
        } else {
            return false;
        }
        wp_delete_file($destfile);

        if (substr($path,strlen($path)-1,1)!='/')  $path = $path .'/' ;
        $path = $path . $name;

        return $path;
    }

    /**
	 * Save action used by metabox included into edit form
     * 
     * @param integer  $post_id  ID of the current post
     *        object   $post     current post object
     *        bool     $update   update flag
	 */
    static function save_edit_meta_box( $post_id, $post, $update) {  // Save metabox
        static $isSaving;

        if (isset($isSaving) && $isSaving) return;

        // Check for autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check form
        if ( ! isset( $_POST[ self::postTypeName . '_box_nonce_check' ] ) 
            || ! wp_verify_nonce( $_POST[ self::postTypeName . '_box_nonce_check' ], self::postTypeName . '_box_nonce' ) ) {
            return;
        }

        if (get_post()->post_type != self::postTypeName || !is_admin()) return;

        // save values
        $isSaving = true; // Semaphore used to avoid circular loads

        $post_values = array(
            'ID'    =>  $post_id,
            'post_content' => wp_kses_post($_POST[ self::postTypeName . '_description' ])
        );

        $file_infos = self::save_file();
        if ($file_infos) {
            $oldfile = get_post_meta($post_id,'file',true);
            if ($oldfile) {
                $path = self::get_file_path($oldfile);
                wp_delete_file($path);
                update_post_meta ( $post_id, 'file', $file_infos['file'] );
            } else add_post_meta($post_id,'file',$file_infos['file'],true);

            if ( ! add_post_meta($post_id,'_iv',$file_infos['iv'],true)) { 
                update_post_meta ( $post_id, '_iv', $file_infos['iv'] );
            }
            if ( ! add_post_meta($post_id,'md5',$file_infos['md5'],true)) { 
                update_post_meta ( $post_id, 'md5', $file_infos['md5'] );
            }
            if ( ! add_post_meta($post_id,'sha1',$file_infos['sha1'],true)) { 
                update_post_meta ( $post_id, 'sha1', $file_infos['sha1'] );
            }
            if ( ! add_post_meta($post_id,'size',$file_infos['size'],true)) { 
                update_post_meta ( $post_id, 'size', $file_infos['size'] );
            }
            if ( ! add_post_meta($post_id,'date',$file_infos['date'],true)) { 
                update_post_meta ( $post_id, 'date', $file_infos['date'] );
            }
            if ( ! add_post_meta($post_id,'type',$file_infos['type'],true)) { 
                update_post_meta ( $post_id, 'type', $file_infos['type'] );
            }
            if ( ! add_post_meta($post_id,'name',$file_infos['name'],true)) { 
                update_post_meta ( $post_id, 'name', $file_infos['name'] );
            }
        }

        // create post page
        if (get_post_meta($post_id,'file',true)) {
            $attached_post_id = get_post_meta($post_id,'attached_post',true);
            if ($attached_post_id) {
                $linked_post = get_post($attached_post_id);
                if (!$linked_post || $linked_post->post_status=='trash') $attached_post_id=false;
            }
            if (!$attached_post_id) {
                $settings = studlSetting::item();
                $attached_post_id = wp_insert_post(
                    array(
                        'post_title'  => $post->post_title,
                        'post_type'   => 'post',
                        'post_status' => 'draft',
                        'post_content' => str_replace('post_id=1','post_id=' . $post_id, $settings->settings[studlSettingOptions::BlogTemplate])
                    )
                );
                wp_set_post_categories($attached_post_id,$settings->settings[studlSettingOptions::BlogCategory]);
                if ( ! add_post_meta($post_id,'attached_post',$attached_post_id,true)) {
                    update_post_meta ( $post_id, 'attached_post', $attached_post_id );
                }
            }
        }

        $sanitized_field = sanitize_text_field($_POST['version']);
        if ( ! add_post_meta($post_id,'version',$sanitized_field,true)) { 
            update_post_meta ( $post_id, 'version', $sanitized_field );
        }

        $sanitized_field = esc_url($_POST['studl_thumbnail']);
        if ( ! add_post_meta($post_id,'thumbnail',$sanitized_field,true)) { 
            update_post_meta ( $post_id, 'thumbnail', $sanitized_field );
        }

        wp_update_post($post_values);

        $isSaving = false;
    }

    /**
	 * Add the custom columns into custom post type table view
     * 
     * @param array  $columns  list of custom type columns
	 */
    static function set_custom_columns($columns) {
        unset($columns['title']);
        unset($columns['date']);

        $columns = array_merge(
            array(
                'cb'    => '',
                'title' => __( 'Title',STU_DOWNLOAD_MANAGER_DOMAIN ),
                'file' => __( 'File',STU_DOWNLOAD_MANAGER_DOMAIN ),
                'date' => __( 'Date',STU_DOWNLOAD_MANAGER_DOMAIN ),
                'size' => __( 'Size',STU_DOWNLOAD_MANAGER_DOMAIN )
            ),$columns);

        return $columns;
    }

    /**
	 * Display the custom columns into custom post type table view
     * 
     * @param array    $columns  list of custom type columns
     *        integer  $post_id  ID of the current post
	 */
    static function diplay_custom_column( $column, $post_id ) {
        switch ( $column ) {
            case 'size' :
                echo get_post_meta($post_id, 'size', true);
                break;
            case 'file' :
                    echo get_post_meta($post_id, 'name', true);
                    break;
        }
    }
    
    /**
	 * List sortable columns into custom post type table view
     * 
     * @param array  $columns  list of the defaults sortable columns
     * @return array  full list of the sortable columns
	 */
    static function sortable_columns( $columns ) {

        $columns['title'] = 'title';
        $columns['size'] = 'size';
        $columns['file'] = 'file';
    
        return $columns;
    }
    
    /**
     * 'admin_menu' Action callback.
     * 
	 * Add custom submenus into default menu
	 */
    static function initMenu() {
        self::add_custom_submenu_page('Options','Options','manage_privacy_options',3);
    }
    
    /**
     * 'admin_menu' Action callback.
     * 
	 * Display custom page associated to custom submenu
	 */
    static function displayAdminPage() {
        if (!isset($_GET['page'])) return;
        
        include(sprintf(STU_DOWNLOAD_MANAGER_PATH . 'layout/%s_page.php' ,sanitize_key(strtolower($_GET['page']))) );
    }

    /**
     * Unregister custom post type
	 */
    static function customTypeUnegister(){
        unregister_post_type(self::postTypeName);
    }

    /**
     * Add a submenu page related to default custom post type.
     *
     * This function takes a capability which will be used to determine whether
     * or not a page is included in the menu.
     *
     * The function which is hooked in to handle the output of the page must check
     * that the user has the required capability as well.
     *
     * @param string   $page_title  The text to be displayed in the title tags of the page when the menu
     *                              is selected.
     * @param string   $menu_title  The text to be used for the menu.
     * @param string   $capability  The capability required for this menu to be displayed to the user.
     * @param int      $position    The position in the menu order this item should appear.
     * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
     */
    static function add_custom_submenu_page( $page_title, $menu_title, $capability, $position = null ) {
        return add_submenu_page( 'edit.php?post_type='.self::postTypeName, 
            __($page_title, STU_DOWNLOAD_MANAGER_DOMAIN), __($menu_title, STU_DOWNLOAD_MANAGER_DOMAIN), 
            $capability, self::postTypeName.'_'.str_replace(' ','_',$menu_title), 
            array(self::class,'displayAdminPage'), $position );
    }

    /**
     * 'wp' action callback
     * 
     * Redirect to the post attached to the current post
	 */
    static function post_display() {
        global $post;

        if (!isset($post)) return;
        if ($post->post_type != self::postTypeName) return;

        $attached_post = get_post_meta($post->ID,'attached_post',true);

        echo("<script>window.location='" . get_post_permalink($attached_post) . "&preview=true';</script>");
    } 

    /**
     * 'before_delete_post' action callback
     * 
     * Send requested file to client
     * 
	 */
    static function delete_file($postid) {
        $post = get_post($postid);

        $file = get_post_meta($post->ID,'file',true);
        
        if ($file!='') {
            $path = self::get_file_path($file); 
            if (file_exists($path))
                wp_delete_file($path);
        }
    }

    /**
     * 'pre_get_posts' action callback
     * 
     * Send requested file to client
     * 
	 */
    static function send_file() {
        global $post;

        if (is_admin()) return;
        
        $uri = (explode('/',$_SERVER['REQUEST_URI']));
        $i = count($uri);
        
        if ($i>3 && $uri[$i-4]==self::postTypeName && $uri[$i-3]=='getfile') {
            $key = $uri[$i-2];
            $id = intval($uri[$i-1]);
        } else return;

        if (!isset($_SESSION['STUDL_FILES'][$key]) || !isset($_SESSION['STUDL_FILES'][$key][$id])) 
            self::exit404();

        $post = get_post($_SESSION['STUDL_FILES'][$key][$id]);
        $file = self::get_file($post);
        $name = get_post_meta($post->ID,'name',true);

        if (!$file) self::exit404();

        header( 'Content-Description: File Transfer');
        header( 'Content-Type: application/octet-stream' ); 
        header( 'Accept: application/octet-stream' );
        header( 'Content-Disposition: attachment; filename="' . $name . '"' );
        header( 'Expires: 0' );
        header( 'Cache-Control: must-revalidate' );
        header( 'Pragma: public' );
        header( 'Content-Length: ' . filesize( $file ) );

        if (ob_get_length() > 0) ob_end_clean();
        readfile($file);

        wp_delete_file($file);

        exit;
    }

    /**
     * Get UUID from database
     */
    static function get_UUID() {
        global $wpdb;

        $results = $wpdb->get_var( 'select uuid()' );
        if ($results==null && $wpdb->last_error!='') 
            $results = __('Download ends with error.',STU_DOWNLOAD_MANAGER_DOMAIN);
        return $results;
    }

    /**
     * Sends 404 error 
     */
    static function exit404() {
        header('HTTP/1.0 404 Not Found');
        include( get_query_template( '404' ) );
        exit;
    }
}