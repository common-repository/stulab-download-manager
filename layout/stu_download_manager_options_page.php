<?php 
/**
 * Download pakage: Download custom type option page
 * Admin page used to manage custom type settings 
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

    // Check for user permissions
    if ( ! current_user_can( 'install_plugins' ) ) {
        wp_die( __( 'Sorry, you are not allowed to display this page.', STU_DOWNLOAD_MANAGER_DOMAIN ) );
    }

    $postType = sanitize_key($_GET['post_type']);
    if ($postType != studlCustumPostType::postTypeName || !is_admin()) return;

    wp_enqueue_script( 'accordion' );

    $settings = studlSetting::item()->settings;

    // add more buttons to the html editor
    function template_add_quicktags() {
        if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
        QTags.addButton( 'studl_title', 'title', '[studl_title post_id=1]', '', '', 'Short code download title' );
        QTags.addButton( 'studl_description', 'description', '[studl_description post_id=1]', '', '', 'Short code download description' );
        QTags.addButton( 'studl_thumbnail', 'thumbnail', '[studl_thumbnail post_id=1]', '', '', 'Short code download thumbnail' );
        QTags.addButton( 'studl_filename', 'file name', '[studl_filename post_id=1]', '', '', 'Short code download file name' );
        QTags.addButton( 'studl_filesize', 'file size', '[studl_filesize post_id=1]', '', '', 'Short code download file size' );
        QTags.addButton( 'studl_filedate', 'file date', '[studl_filedate post_id=1]', '', '', 'Short code download file date' );
        QTags.addButton( 'studl_fileversion', 'file version', '[studl_fileversion post_id=1]', '', '', 'Short code download file version' );
        QTags.addButton( 'studl_filemd5', 'file md5', '[studl_filemd5 post_id=1]', '', '', 'Short code download file md5' );
        QTags.addButton( 'studl_filesha1', 'file sha1', '[studl_filesha1 post_id=1]', '', '', 'Short code download file sha1' );
        QTags.addButton( 'studl_filedownload', 'download link', '[studl_filedownload post_id=1]', '', '', 'Short code download file link' );
    </script>
<?php
        }
    }
    add_action( 'admin_print_footer_scripts', 'template_add_quicktags' );
?>
<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form method="post" action="#">
        <div id="universal-message-container">
            <div id="side-sortables" class="accordion-container">
                <ul class="outer-border">
                    <!-- Début section 1 -->
                    <li class="control-section accordion-section open" id="section1" >
                        <h2 class="accordion-section-title hndle"><?php echo esc_html( __('General',STU_DOWNLOAD_MANAGER_DOMAIN) ); ?>
                        <span class="screen-reader-text"><?php _e( 'Press return or enter to open this section' ); ?></span>
                        </h2>
                        <div class="accordion-section-content <?php postbox_classes( "section1", "" ); ?>">
                            <table class="form-table" role="presentation">
                                <tr>
                                    <?php $id = 'studl_' . studlSettingOptions::RepositDir ?>
                                    <th scope="row"><label for="<?php echo $id?>"><?php echo esc_html( __('Repository directory',STU_DOWNLOAD_MANAGER_DOMAIN) ); ?></label></th>
                                    <td>
                                        <input type="text" <?php echo 'id="' . $id . '" name="' . $id . '" value="' . $settings[studlSettingOptions::RepositDir] . '"' ?>></input>
                                    </td>
                                </tr>
                                <tr>
                                    <?php $id = 'studl_' . studlSettingOptions::BlogCategory;
                                        $selected = $settings[studlSettingOptions::BlogCategory];
                                     ?>
                                    <th scope="row"><label for="<?php echo $id ?>"><?php echo esc_html( __('Default category',STU_DOWNLOAD_MANAGER_DOMAIN) ); ?></label></th>
                                    <td>
                                        <?php wp_dropdown_categories(array(
                                            'name' => $id,
                                            'hide_empty' => 0,
                                            'selected' => $selected
                                        )); ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </li>
                    <!-- Fin section -->

                    <!-- Début section 2 -->
                    <li class="control-section accordion-section" id="section2" >
                        <h2 class="accordion-section-title hndle"><?php echo esc_html( __('Post Template',STU_DOWNLOAD_MANAGER_DOMAIN) ); ?>
                        <span class="screen-reader-text"><?php _e( 'Press return or enter to open this section' ); ?></span>
                        </h2>
                        <div class="accordion-section-content <?php postbox_classes( "section2", "" ); ?>">
                            <table class="form-table" role="presentation">
                                <tr>
                                    <th scope="row"><label for="studl_editor">Template</label>
                                    </th>
                                    <td>
                                        <?php wp_editor( $settings[studlSettingOptions::BlogTemplate] , "studl_editor", array() ); 
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </li>
                    <!-- Fin section -->
                </ul>
            </div>
        </div><!-- #universal-message-container -->
 
        <?php
            wp_nonce_field( 'studl-settings-save', 'studl-settings-save-check' );
            submit_button();
        ?>
    </form>
</div>
