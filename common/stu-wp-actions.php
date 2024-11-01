<?php

if (!defined('STUWPACTIONHOOKS')) {
	define('STUWPACTIONHOOKS',1);

	abstract class WpActionHooks {
	/**
		 * Fires before the administration menu loads in the admin.
		 *
		 * The hook fires before menus and sub-menus are removed based on user privileges.
		 *
		 * @private
		 * @since 2.2.0
		 * @Reference wp-admin\includes\menu.php do_action( '_admin_menu' )
	*/
	const AAdminMenu = "_admin_menu";
	/**
		 * Fires after WordPress core has been successfully updated.
		 *
		 * @since 3.3.0
		 *
		 * @param string $wp_version The current WordPress version.
		 * @Reference wp-admin\includes\update-core.php do_action( '_core_updated_successfully', $wp_version )
	*/
	const CoreUpdatedSuccessfully = "_core_updated_successfully";
	/**
		 * Fires before the administration menu loads in the Network Admin.
		 *
		 * The hook fires before menus and sub-menus are removed based on user privileges.
		 *
		 * @private
		 * @since 3.1.0
		 * @Reference wp-admin\includes\menu.php do_action( '_network_admin_menu' )
	*/
	const NNetworkAdminMenu = "_network_admin_menu";
	/**
		 * Fires before the administration menu loads in the User Admin.
		 *
		 * The hook fires before menus and sub-menus are removed based on user privileges.
		 *
		 * @private
		 * @since 3.1.0
		 * @Reference wp-admin\includes\menu.php do_action( '_user_admin_menu' )
	*/
	const UUserAdminMenu = "_user_admin_menu";
	/**
			 * Fires once a revision has been saved.
			 *
			 * @since 2.6.0
			 *
			 * @param int $revision_id Post revision ID.
			 * @Reference wp-includes\revision.php do_action( '_wp_put_post_revision', $revision_id )
	*/
	const WpPutPostRevision = "_wp_put_post_revision";
	/**
				 * Fires after a network site is activated.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param string $id The ID of the activated site.
				 * @Reference wp-admin\network\sites.php do_action( 'activate_blog', $id )
	*/
	const ActivateBlog = "activate_blog";
	/**
	 * Fires before the Site Activation page is loaded.
	 *
	 * @since 3.0.0
	 * @Reference wp-activate.php do_action( 'activate_header' )
	*/
	const ActivateHeader = "activate_header";
	/**
				 * Fires before a plugin is activated.
				 *
				 * If a plugin is silently activated (such as during an update),
				 * this hook does not fire.
				 *
				 * @since 2.9.0
				 *
				 * @param string $plugin       Path to the plugin file relative to the plugins directory.
				 * @param bool   $network_wide Whether to enable the plugin for all sites in the network
				 *                             or just the current site. Multisite only. Default is false.
				 * @Reference wp-admin\includes\plugin.php do_action( 'activate_plugin', $plugin, $network_wide )
	*/
	const ActivatePlugin = "activate_plugin";
	/**
		 * Fires before the Site Activation page is loaded.
		 *
		 * Fires on the {@see 'wp_head'} action.
		 *
		 * @since 3.0.0
		 * @Reference wp-activate.php do_action( 'activate_wp_head' )
	*/
	const ActivateWpHead = "activate_wp_head";
	/**
				 * Fires after a plugin has been activated.
				 *
				 * If a plugin is silently activated (such as during an update),
				 * this hook does not fire.
				 *
				 * @since 2.9.0
				 *
				 * @param string $plugin       Path to the plugin file relative to the plugins directory.
				 * @param bool   $network_wide Whether to enable the plugin for all sites in the network
				 *                             or just the current site. Multisite only. Default is false.
				 * @Reference wp-admin\includes\plugin.php do_action( 'activated_plugin', $plugin, $network_wide )
	*/
	const ActivatedPlugin = "activated_plugin";
	/**
		 * Fires at the end of the 'At a Glance' dashboard widget.
		 *
		 * Prior to 3.8.0, the widget was named 'Right Now'.
		 *
		 * @since 2.0.0
		 * @Reference wp-admin\includes\dashboard.php do_action( 'activity_box_end' )
	*/
	const ActivityBoxEnd = "activity_box_end";
	/**
			 * Fires after menus are added to the menu bar.
			 *
			 * @since 3.1.0
			 * @Reference wp-includes\class-wp-admin-bar.php do_action( 'add_admin_bar_menus' )
	*/
	const AddAdminBarMenus = "add_admin_bar_menus";
	/**
				 * Fires once an attachment has been added.
				 *
				 * @since 2.0.0
				 *
				 * @param int $post_ID Attachment ID.
				 * @Reference wp-includes\post.php do_action( 'add_attachment', $post_ID )
	*/
	const AddAttachment = "add_attachment";
	/**
			 * Fires before the Add Category form.
			 *
			 * @since 2.1.0
			 * @deprecated 3.0.0 Use {$taxonomy}_pre_add_form instead.
			 *
			 * @param object $arg Optional arguments cast to an object.
			 * @Reference wp-admin\edit-tags.php do_action( 'add_category_form_pre', (object) array( 'parent' => 0 ) )
	*/
	const AddCategoryFormPre = "add_category_form_pre";
	/**
		 * Fires after outputting the fields for the inline editor for posts and pages.
		 *
		 * @since 4.9.8
		 *
		 * @param WP_Post      $post             The current post object.
		 * @param WP_Post_Type $post_type_object The current post's post type object.
		 * @Reference wp-admin\includes\template.php do_action( 'add_inline_data', $post, $post_type_object )
	*/
	const AddInlineData = "add_inline_data";
	/**
			 * Fires after a link was added to the database.
			 *
			 * @since 2.0.0
			 *
			 * @param int $link_id ID of the link that was added.
			 * @Reference wp-admin\includes\bookmark.php do_action( 'add_link', $link_id )
	*/
	const AddLink = "add_link";
	/**
			 * Fires before the link category form.
			 *
			 * @since 2.3.0
			 * @deprecated 3.0.0 Use {$taxonomy}_pre_add_form instead.
			 *
			 * @param object $arg Optional arguments cast to an object.
			 * @Reference wp-admin\edit-tags.php do_action( 'add_link_category_form_pre', (object) array( 'parent' => 0 ) )
	*/
	const AddLinkCategoryFormPre = "add_link_category_form_pre";
	/**
		 * Fires after all built-in meta boxes have been added.
		 *
		 * @since 3.0.0
		 *
		 * @param string  $post_type Post type.
		 * @param WP_Post $post      Post object.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'add_meta_boxes', $post_type, $post )
	* @Reference wp-admin\edit-form-comment.php do_action( 'add_meta_boxes', 'comment', $comment )
	* @Reference wp-admin\edit-link-form.php do_action( 'add_meta_boxes', 'link', $link )
	*/
	const AddMetaBoxes = "add_meta_boxes";
	/**
	 * Fires when comment-specific meta boxes are added.
	 *
	 * @since 3.0.0
	 *
	 * @param WP_Comment $comment Comment object.
	 * @Reference wp-admin\edit-form-comment.php do_action( 'add_meta_boxes_comment', $comment )
	*/
	const AddMetaBoxesComment = "add_meta_boxes_comment";
	/**
	 * Fires when link-specific meta boxes are added.
	 *
	 * @since 3.0.0
	 *
	 * @param object $link Link object.
	 * @Reference wp-admin\edit-link-form.php do_action( 'add_meta_boxes_link', $link )
	*/
	const AddMetaBoxesLink = "add_meta_boxes_link";
	/**
		 * Fires before an option is added.
		 *
		 * @since 2.9.0
		 *
		 * @param string $option Name of the option to add.
		 * @param mixed  $value  Value of the option.
		 * @Reference wp-includes\option.php do_action( 'add_option', $option, $value )
	*/
	const AddOption = "add_option";
	/**
			 * Fires after a network option has been successfully added.
			 *
			 * @since 3.0.0
			 * @since 4.7.0 The `$network_id` parameter was added.
			 *
			 * @param string $option     Name of the network option.
			 * @param mixed  $value      Value of the network option.
			 * @param int    $network_id ID of the network.
			 * @Reference wp-includes\option.php do_action( 'add_site_option', $option, $value, $network_id )
	*/
	const AddSiteOption = "add_site_option";
	/**
			 * Fires at the end of the Add Tag form.
			 *
			 * @since 2.7.0
			 * @deprecated 3.0.0 Use {$taxonomy}_add_form instead.
			 *
			 * @param string $taxonomy The taxonomy slug.
			 * @Reference wp-admin\edit-tags.php do_action( 'add_tag_form', $taxonomy )
	*/
	const AddTagForm = "add_tag_form";
	/**
			 * Fires after the Add Tag form fields for non-hierarchical taxonomies.
			 *
			 * @since 3.0.0
			 *
			 * @param string $taxonomy The taxonomy slug.
			 * @Reference wp-admin\edit-tags.php do_action( 'add_tag_form_fields', $taxonomy )
	*/
	const AddTagFormFields = "add_tag_form_fields";
	/**
			 * Fires before the Add Tag form.
			 *
			 * @since 2.5.0
			 * @deprecated 3.0.0 Use {$taxonomy}_pre_add_form instead.
			 *
			 * @param string $taxonomy The taxonomy slug.
			 * @Reference wp-admin\edit-tags.php do_action( 'add_tag_form_pre', $taxonomy )
	*/
	const AddTagFormPre = "add_tag_form_pre";
	/**
			 * Fires immediately before an object-term relationship is added.
			 *
			 * @since 2.9.0
			 * @since 4.7.0 Added the `$taxonomy` parameter.
			 *
			 * @param int    $object_id Object ID.
			 * @param int    $tt_id     Term taxonomy ID.
			 * @param string $taxonomy  Taxonomy slug.
			 * @Reference wp-includes\taxonomy.php do_action( 'add_term_relationship', $object_id, $tt_id, $taxonomy )
	*/
	const AddTermRelationship = "add_term_relationship";
	/**
			 * Fires immediately after the user has been given a new role.
			 *
			 * @since 4.3.0
			 *
			 * @param int    $user_id The user ID.
			 * @param string $role    The new role.
			 * @Reference wp-includes\class-wp-user.php do_action( 'add_user_role', $this->ID, $role )
	*/
	const AddUserRole = "add_user_role";
	/**
		 * Fires immediately after a user is added to a site.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int    $user_id User ID.
		 * @param string $role    User role.
		 * @param int    $blog_id Blog ID.
		 * @Reference wp-includes\ms-functions.php do_action( 'add_user_to_blog', $user_id, $role, $blog_id )
	*/
	const AddUserToBlog = "add_user_to_blog";
	/**
			 * Fires immediately after an existing user is added to a site.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param int   $user_id User ID.
			 * @param mixed $result  True on success or a WP_Error object if the user doesn't exist
			 *                       or could not be added.
			 * @Reference wp-includes\ms-functions.php do_action( 'added_existing_user', $details['user_id'], $result )
	*/
	const AddedExistingUser = "added_existing_user";
	/**
		 * Fires after an option has been added.
		 *
		 * @since 2.9.0
		 *
		 * @param string $option Name of the added option.
		 * @param mixed  $value  Value of the option.
		 * @Reference wp-includes\option.php do_action( 'added_option', $option, $value )
	*/
	const AddedOption = "added_option";
	/**
			 * Fires immediately after an object-term relationship is added.
			 *
			 * @since 2.9.0
			 * @since 4.7.0 Added the `$taxonomy` parameter.
			 *
			 * @param int    $object_id Object ID.
			 * @param int    $tt_id     Term taxonomy ID.
			 * @param string $taxonomy  Taxonomy slug.
			 * @Reference wp-includes\taxonomy.php do_action( 'added_term_relationship', $object_id, $tt_id, $taxonomy )
	*/
	const AddedTermRelationship = "added_term_relationship";
	/**
	* @Reference wp-includes\deprecated.php do_action( 'added_usermeta', $wpdb->insert_id, $user_id, $meta_key, $meta_value )
	*/
	const AddedUsermeta = "added_usermeta";
	/**
			 * Fires after WP_Admin_Bar is initialized.
			 *
			 * @since 3.1.0
			 * @Reference wp-includes\class-wp-admin-bar.php do_action( 'admin_bar_init' )
	*/
	const AdminBarInit = "admin_bar_init";
	/**
		 * Load all necessary admin bar items.
		 *
		 * This is the hook used to add, remove, or manipulate admin bar items.
		 *
		 * @since 3.1.0
		 *
		 * @param WP_Admin_Bar $wp_admin_bar WP_Admin_Bar instance, passed by reference
		 * @Reference wp-includes\admin-bar.php do_action( 'admin_bar_menu', array( &$wp_admin_bar ) )
	*/
	const AdminBarMenu = "admin_bar_menu";
	/**
				 * Fires in the 'Admin Color Scheme' section of the user editing screen.
				 *
				 * The section is only enabled if a callback is hooked to the action,
				 * and if there is more than one defined color scheme for the admin.
				 *
				 * @since 3.0.0
				 * @since 3.8.1 Added `$user_id` parameter.
				 *
				 * @param int $user_id The user ID.
				 * @Reference wp-admin\user-edit.php do_action( 'admin_color_scheme_picker', $user_id )
	*/
	const AdminColorSchemePicker = "admin_color_scheme_picker";
	/**
			* Fires before the admin email confirm form.
			*
			* @since 5.3.0
			*
			* @param WP_Error $errors A `WP_Error` object containing any errors generated by using invalid credentials. Note that the error object may not contain any errors.
			* @Reference wp-login.php do_action( 'admin_email_confirm', $errors )
	*/
	const AdminEmailConfirm = "admin_email_confirm";
	/**
				* Fires inside the admin-email-confirm-form form tags, before the hidden fields.
				*
				* @since 5.3.0
				* @Reference wp-login.php do_action( 'admin_email_confirm_form' )
	*/
	const AdminEmailConfirmForm = "admin_email_confirm_form";
	/**
	 * Enqueue scripts for all admin pages.
	 *
	 * @since 2.8.0
	 *
	 * @param string $hook_suffix The current admin page.
	 * @Reference wp-admin\admin-header.php do_action( 'admin_enqueue_scripts', $hook_suffix )
	* @Reference wp-admin\includes\template.php do_action( 'admin_enqueue_scripts', $hook_suffix )
	* @Reference wp-admin\includes\media.php do_action( 'admin_enqueue_scripts', 'media-upload-popup' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_enqueue_scripts', 'widgets.php' )
	*/
	const AdminEnqueueScripts = "admin_enqueue_scripts";
	/**
	 * Prints scripts or data before the default footer scripts.
	 *
	 * @since 1.2.0
	 *
	 * @param string $data The data to print.
	 * @Reference wp-admin\admin-footer.php do_action( 'admin_footer', '' )
	* @Reference wp-admin\includes\template.php do_action( 'admin_footer', $hook_suffix )
	*/
	const AdminFooter = "admin_footer";
	/** This action is documented in wp-admin/admin-footer.php * @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_footer-widgets.php' )
	*/
	const AdminFooterWidgetsPhp = "admin_footer-widgets.php";
	/**
	 * Fires in head section for all admin pages.
	 *
	 * @since 2.1.0
	 * @Reference wp-admin\admin-header.php do_action( 'admin_head' )
	* @Reference wp-admin\includes\media.php do_action( 'admin_head' )
	* @Reference wp-admin\includes\template.php do_action( 'admin_head' )
	*/
	const AdminHead = "admin_head";
	/**
		 * Fires when scripts enqueued for the admin header for the legacy (pre-3.5.0)
		 * media upload popup are printed.
		 *
		 * @since 2.9.0
		 * @Reference wp-admin\includes\media.php do_action( 'admin_head-media-upload-popup' )
	*/
	const AdminHeadMediaUploadPopup = "admin_head-media-upload-popup";
	/**
	 * Fires as an admin screen or script is being initialized.
	 *
	 * Note, this does not just run on user-facing admin screens.
	 * It runs on admin-ajax.php and admin-post.php as well.
	 *
	 * This is roughly analogous to the more general {@see 'init'} hook, which fires earlier.
	 *
	 * @since 2.5.0
	 * @Reference wp-admin\admin.php do_action( 'admin_init' )
	* @Reference wp-admin\admin-ajax.php do_action( 'admin_init' )
	* @Reference wp-admin\admin-post.php do_action( 'admin_init' )
	*/
	const AdminInit = "admin_init";
	/**
		 * Fires before the administration menu loads in the admin.
		 *
		 * @since 1.5.0
		 *
		 * @param string $context Empty context.
		 * @Reference wp-admin\includes\menu.php do_action( 'admin_menu', '' )
	*/
	const AdminMenu = "admin_menu";
	/**
		 * Prints admin screen notices.
		 *
		 * @since 3.1.0
		 * @Reference wp-admin\admin-header.php do_action( 'admin_notices' )
	*/
	const AdminNotices = "admin_notices";
	/**
		 * Fires when access to an admin page is denied.
		 *
		 * @since 2.5.0
		 * @Reference wp-admin\includes\menu.php do_action( 'admin_page_access_denied' )
	*/
	const AdminPageAccessDenied = "admin_page_access_denied";
	/**
			 * Fires on an authenticated admin post request where no action is supplied.
			 *
			 * @since 2.6.0
			 * @Reference wp-admin\admin-post.php do_action( 'admin_post' )
	*/
	const AdminPost = "admin_post";
	/**
			 * Fires on a non-authenticated admin post request where no action is supplied.
			 *
			 * @since 2.6.0
			 * @Reference wp-admin\admin-post.php do_action( 'admin_post_nopriv' )
	*/
	const AdminPostNopriv = "admin_post_nopriv";
	/**
	 * Prints any scripts and data queued for the footer.
	 *
	 * @since 2.8.0
	 * @Reference wp-admin\admin-footer.php do_action( 'admin_print_footer_scripts' )
	* @Reference wp-admin\includes\media.php do_action( 'admin_print_footer_scripts' )
	* @Reference wp-admin\includes\template.php do_action( 'admin_print_footer_scripts' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_print_footer_scripts' )
	*/
	const AdminPrintFooterScripts = "admin_print_footer_scripts";
	/** This action is documented in wp-admin/admin-footer.php * @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_print_footer_scripts-widgets.php' )
	*/
	const AdminPrintFooterScriptsWidgetsPhp = "admin_print_footer_scripts-widgets.php";
	/**
	 * Fires when scripts are printed for all admin pages.
	 *
	 * @since 2.1.0
	 * @Reference wp-admin\admin-header.php do_action( 'admin_print_scripts' )
	* @Reference wp-admin\includes\media.php do_action( 'admin_print_scripts' )
	* @Reference wp-admin\includes\template.php do_action( 'admin_print_scripts' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_print_scripts' )
	*/
	const AdminPrintScripts = "admin_print_scripts";
	/**
		 * Fires when admin scripts enqueued for the legacy (pre-3.5.0) media upload popup are printed.
		 *
		 * @since 2.9.0
		 * @Reference wp-admin\includes\media.php do_action( 'admin_print_scripts-media-upload-popup' )
	*/
	const AdminPrintScriptsMediaUploadPopup = "admin_print_scripts-media-upload-popup";
	/** This action is documented in wp-admin/admin-header.php * @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_print_scripts-widgets.php' )
	*/
	const AdminPrintScriptsWidgetsPhp = "admin_print_scripts-widgets.php";
	/**
	 * Fires when styles are printed for all admin pages.
	 *
	 * @since 2.6.0
	 * @Reference wp-admin\admin-header.php do_action( 'admin_print_styles' )
	* @Reference wp-admin\includes\media.php do_action( 'admin_print_styles' )
	* @Reference wp-admin\includes\template.php do_action( 'admin_print_styles' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_print_styles' )
	*/
	const AdminPrintStyles = "admin_print_styles";
	/**
		 * Fires when admin styles enqueued for the legacy (pre-3.5.0) media upload popup are printed.
		 *
		 * @since 2.9.0
		 * @Reference wp-admin\includes\media.php do_action( 'admin_print_styles-media-upload-popup' )
	*/
	const AdminPrintStylesMediaUploadPopup = "admin_print_styles-media-upload-popup";
	/** This action is documented in wp-admin/admin-header.php * @Reference wp-includes\class-wp-customize-widgets.php do_action( 'admin_print_styles-widgets.php' )
	*/
	const AdminPrintStylesWidgetsPhp = "admin_print_styles-widgets.php";
	/**
		 * Fires inside the HTML tag in the admin header.
		 *
		 * @since 2.2.0
		 * @Reference wp-admin\includes\template.php do_action( 'admin_xml_ns' )
	* @Reference wp-admin\includes\template.php do_action( 'admin_xml_ns' )
	*/
	const AdminXmlNs = "admin_xml_ns";
	/**
	 * Fires after the admin menu has been output.
	 *
	 * @since 2.5.0
	 * @Reference wp-admin\menu-header.php do_action( 'adminmenu' )
	*/
	const Adminmenu = "adminmenu";
	/**
		 * Fires on the next page load after a successful DB upgrade.
		 *
		 * @since 2.8.0
		 * @Reference wp-admin\admin.php do_action( 'after_db_upgrade' )
	*/
	const AfterDbUpgrade = "after_db_upgrade";
	/**
		 * Fires after a post is deleted, at the conclusion of wp_delete_post().
		 *
		 * @since 3.2.0
		 *
		 * @see wp_delete_post()
		 *
		 * @param int $postid Post ID.
		 * @Reference wp-includes\post.php do_action( 'after_delete_post', $postid )
	*/
	const AfterDeletePost = "after_delete_post";
	/**
			 * Fires after the menu locations table is displayed.
			 *
			 * @since 3.6.0
			 * @Reference wp-admin\nav-menus.php do_action( 'after_menu_locations_table' )
	*/
	const AfterMenuLocationsTable = "after_menu_locations_table";
	/**
				 * Fires after the Multisite DB upgrade for each site is complete.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param array|WP_Error $response The upgrade response array or WP_Error on failure.
				 * @Reference wp-admin\network\upgrade.php do_action( 'after_mu_upgrade', $response )
	* @Reference wp-admin\admin.php do_action( 'after_mu_upgrade', $response )
	*/
	const AfterMuUpgrade = "after_mu_upgrade";
	/**
		 * Fires after the user's password is reset.
		 *
		 * @since 4.4.0
		 *
		 * @param WP_User $user     The user.
		 * @param string  $new_pass New user password.
		 * @Reference wp-includes\user.php do_action( 'after_password_reset', $user, $new_pass )
	*/
	const AfterPasswordReset = "after_password_reset";
	/**
			 * Fires after each row in the Plugins list table.
			 *
			 * @since 2.3.0
			 *
			 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
			 * @param array  $plugin_data An array of plugin data.
			 * @param string $status      Status of the plugin. Defaults are 'All', 'Active',
			 *                            'Inactive', 'Recently Activated', 'Upgrade', 'Must-Use',
			 *                            'Drop-ins', 'Search', 'Paused'.
			 * @Reference wp-admin\includes\class-wp-plugins-list-table.php do_action( 'after_plugin_row', $plugin_file, $plugin_data, $status )
	*/
	const AfterPluginRow = "after_plugin_row";
	/**
	 * Fires after the theme is loaded.
	 *
	 * @since 3.0.0
	 * @Reference wp-settings.php do_action( 'after_setup_theme' )
	*/
	const AfterSetupTheme = "after_setup_theme";
	/**
	 * Fires after the sign-up forms, before wp_footer.
	 *
	 * @since 3.0.0
	 * @Reference wp-signup.php do_action( 'after_signup_form' )
	*/
	const AfterSignupForm = "after_signup_form";
	/**
		 * Fires after site signup information has been written to the database.
		 *
		 * @since 4.4.0
		 *
		 * @param string $domain     The requested domain.
		 * @param string $path       The requested path.
		 * @param string $title      The requested site title.
		 * @param string $user       The user's requested login name.
		 * @param string $user_email The user's email address.
		 * @param string $key        The user's activation key.
		 * @param array  $meta       Signup meta data. By default, contains the requested privacy setting and lang_id.
		 * @Reference wp-includes\ms-functions.php do_action( 'after_signup_site', $domain, $path, $title, $user, $user_email, $key, $meta )
	*/
	const AfterSignupSite = "after_signup_site";
	/**
		 * Fires after a user's signup information has been written to the database.
		 *
		 * @since 4.4.0
		 *
		 * @param string $user       The user's requested login name.
		 * @param string $user_email The user's email address.
		 * @param string $key        The user's activation key.
		 * @param array  $meta       Signup meta data. Default empty array.
		 * @Reference wp-includes\ms-functions.php do_action( 'after_signup_user', $user, $user_email, $key, $meta )
	*/
	const AfterSignupUser = "after_signup_user";
	/**
				 * Fires on the first WP load after a theme switch if the old theme still exists.
				 *
				 * This action fires multiple times and the parameters differs
				 * according to the context, if the old theme exists or not.
				 * If the old theme is missing, the parameter will be the slug
				 * of the old theme.
				 *
				 * @since 3.3.0
				 *
				 * @param string   $old_name  Old theme name.
				 * @param WP_Theme $old_theme WP_Theme instance of the old theme.
				 * @Reference wp-includes\theme.php do_action( 'after_switch_theme', $old_theme->get( 'Name' ), $old_theme )
	* @Reference wp-includes\theme.php do_action( 'after_switch_theme', $stylesheet, $old_theme )
	*/
	const AfterSwitchTheme = "after_switch_theme";
	/**
			 * Fires after each row in the Multisite themes list table.
			 *
			 * @since 3.1.0
			 *
			 * @param string   $stylesheet Directory name of the theme.
			 * @param WP_Theme $theme      Current WP_Theme object.
			 * @param string   $status     Status of the theme.
			 * @Reference wp-admin\includes\class-wp-ms-themes-list-table.php do_action( 'after_theme_row', $stylesheet, $theme, $status )
	*/
	const AfterThemeRow = "after_theme_row";
	/**
			 * Fires after any core TinyMCE editor instances are created.
			 *
			 * @since 3.2.0
			 *
			 * @param array $mce_settings TinyMCE settings array.
			 * @Reference wp-includes\class-wp-editor.php do_action( 'after_wp_tiny_mce', self::$mce_settings )
	*/
	const AfterWpTinyMce = "after_wp_tiny_mce";
	/**
	 * Prints generic admin screen notices.
	 *
	 * @since 3.1.0
	 * @Reference wp-admin\admin-header.php do_action( 'all_admin_notices' )
	*/
	const AllAdminNotices = "all_admin_notices";
	/**
				 * Fires when the 'archived' status is added to a site.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'archive_blog', $site_id )
	*/
	const ArchiveBlog = "archive_blog";
	/**
				 * Fires at the end of each Atom feed author entry.
				 *
				 * @since 3.2.0
				 * @Reference wp-includes\feed-atom.php do_action( 'atom_author' )
	*/
	const AtomAuthor = "atom_author";
	/**
			 * Fires inside the feed tag in the Atom comment feed.
			 *
			 * @since 2.8.0
			 * @Reference wp-includes\feed-atom-comments.php do_action( 'atom_comments_ns' )
	*/
	const AtomCommentsNs = "atom_comments_ns";
	/**
			 * Fires at the end of each Atom feed item.
			 *
			 * @since 2.0.0
			 * @Reference wp-includes\feed-atom.php do_action( 'atom_entry' )
	*/
	const AtomEntry = "atom_entry";
	/**
		 * Fires just before the first Atom feed entry.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-atom.php do_action( 'atom_head' )
	*/
	const AtomHead = "atom_head";
	/**
		 * Fires at end of the Atom feed root to add namespaces.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-atom.php do_action( 'atom_ns' )
	* @Reference wp-includes\feed-atom-comments.php do_action( 'atom_ns' )
	*/
	const AtomNs = "atom_ns";
	/**
		 * Fires after the 'Uploaded on' section of the Save meta box
		 * in the attachment editing screen.
		 *
		 * @since 3.5.0
		 * @since 4.9.0 Added the `$post` parameter.
		 *
		 * @param WP_Post $post WP_Post object for the current attachment.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'attachment_submitbox_misc_actions', $post )
	*/
	const AttachmentSubmitboxMiscActions = "attachment_submitbox_misc_actions";
	/**
				 * Fires once an existing attachment has been updated.
				 *
				 * @since 4.4.0
				 *
				 * @param int     $post_ID      Post ID.
				 * @param WP_Post $post_after   Post object following the update.
				 * @param WP_Post $post_before  Post object before the update.
				 * @Reference wp-includes\post.php do_action( 'attachment_updated', $post_ID, $post_after, $post_before )
	*/
	const AttachmentUpdated = "attachment_updated";
	/**
				 * Fires if a bad authentication cookie hash is encountered.
				 *
				 * @since 2.7.0
				 *
				 * @param array $cookie_elements An array of data for the authentication cookie.
				 * @Reference wp-includes\pluggable.php do_action( 'auth_cookie_bad_hash', $cookie_elements )
	*/
	const AuthCookieBadHash = "auth_cookie_bad_hash";
	/**
	* @Reference wp-includes\pluggable.php do_action( 'auth_cookie_bad_session_token', $cookie_elements )
	*/
	const AuthCookieBadSessionToken = "auth_cookie_bad_session_token";
	/**
				 * Fires if a bad username is entered in the user authentication process.
				 *
				 * @since 2.7.0
				 *
				 * @param array $cookie_elements An array of data for the authentication cookie.
				 * @Reference wp-includes\pluggable.php do_action( 'auth_cookie_bad_username', $cookie_elements )
	*/
	const AuthCookieBadUsername = "auth_cookie_bad_username";
	/**
				 * Fires once an authentication cookie has expired.
				 *
				 * @since 2.7.0
				 *
				 * @param array $cookie_elements An array of data for the authentication cookie.
				 * @Reference wp-includes\pluggable.php do_action( 'auth_cookie_expired', $cookie_elements )
	*/
	const AuthCookieExpired = "auth_cookie_expired";
	/**
				 * Fires if an authentication cookie is malformed.
				 *
				 * @since 2.7.0
				 *
				 * @param string $cookie Malformed auth cookie.
				 * @param string $scheme Authentication scheme. Values include 'auth', 'secure_auth',
				 *                       or 'logged_in'.
				 * @Reference wp-includes\pluggable.php do_action( 'auth_cookie_malformed', $cookie, $scheme )
	*/
	const AuthCookieMalformed = "auth_cookie_malformed";
	/**
			 * Fires once an authentication cookie has been validated.
			 *
			 * @since 2.7.0
			 *
			 * @param array   $cookie_elements An array of data for the authentication cookie.
			 * @param WP_User $user            User object.
			 * @Reference wp-includes\pluggable.php do_action( 'auth_cookie_valid', $cookie_elements, $user )
	*/
	const AuthCookieValid = "auth_cookie_valid";
	/**
				 * Fires before the authentication redirect.
				 *
				 * @since 2.8.0
				 *
				 * @param int $user_id User ID.
				 * @Reference wp-includes\pluggable.php do_action( 'auth_redirect', $user_id )
	*/
	const AuthRedirect = "auth_redirect";
	/**
				 * Fires after all automatic updates have run.
				 *
				 * @since 3.8.0
				 *
				 * @param array $update_results The results of all attempted updates.
				 * @Reference wp-admin\includes\class-wp-automatic-updater.php do_action( 'automatic_updates_complete', $this->update_results )
	*/
	const AutomaticUpdatesComplete = "automatic_updates_complete";
	/**
		 * Fires before a post is deleted, at the start of wp_delete_post().
		 *
		 * @since 3.2.0
		 *
		 * @see wp_delete_post()
		 *
		 * @param int $postid Post ID.
		 * @Reference wp-includes\post.php do_action( 'before_delete_post', $postid )
	*/
	const BeforeDeletePost = "before_delete_post";
	/**
	 * Fires before the site sign-up form.
	 *
	 * @since 3.0.0
	 * @Reference wp-signup.php do_action( 'before_signup_form' )
	*/
	const BeforeSignupForm = "before_signup_form";
	/**
	 * Fires before the Site Signup page is loaded.
	 *
	 * @since 4.4.0
	 * @Reference wp-signup.php do_action( 'before_signup_header' )
	*/
	const BeforeSignupHeader = "before_signup_header";
	/**
			 * Fires immediately before the TinyMCE settings are printed.
			 *
			 * @since 3.2.0
			 *
			 * @param array $mce_settings TinyMCE settings array.
			 * @Reference wp-includes\class-wp-editor.php do_action( 'before_wp_tiny_mce', self::$mce_settings )
	*/
	const BeforeWpTinyMce = "before_wp_tiny_mce";
	/**
			 * Fires before fetching the post thumbnail HTML.
			 *
			 * Provides "just in time" filtering of all filters in wp_get_attachment_image().
			 *
			 * @since 2.9.0
			 *
			 * @param int          $post_id           The post ID.
			 * @param string       $post_thumbnail_id The post thumbnail ID.
			 * @param string|array $size              The post thumbnail size. Image size or array of width
			 *                                        and height values (in that order). Default 'post-thumbnail'.
			 * @Reference wp-includes\post-thumbnail-template.php do_action( 'begin_fetch_post_thumbnail_html', $post->ID, $post_thumbnail_id, $size )
	*/
	const BeginFetchPostThumbnailHtml = "begin_fetch_post_thumbnail_html";
	/**
		 * Add hidden input fields to the meta box save form.
		 *
		 * Hook into this action to print `<input type="hidden" ... />` fields, which will be POSTed back to
		 * the server when meta boxes are saved.
		 *
		 * @since 5.0.0
		 *
		 * @params WP_Post $post The post that is being edited.
		 * @Reference wp-admin\includes\post.php do_action( 'block_editor_meta_box_hidden_fields', $post )
	*/
	const BlockEditorMetaBoxHiddenFields = "block_editor_meta_box_hidden_fields";
	/**
		 * Enable the legacy 'Site Visibility' privacy options.
		 *
		 * By default the privacy options form displays a single checkbox to 'discourage' search
		 * engines from indexing the site. Hooking to this action serves a dual purpose:
		 * 1. Disable the single checkbox in favor of a multiple-choice list of radio buttons.
		 * 2. Open the door to adding additional radio button choices to the list.
		 *
		 * Hooking to this action also converts the 'Search Engine Visibility' heading to the more
		 * open-ended 'Site Visibility' heading.
		 *
		 * @since 2.1.0
		 * @Reference wp-admin\options-reading.php do_action( 'blog_privacy_selector' )
	* @Reference wp-admin\install.php do_action( 'blog_privacy_selector' )
	*/
	const BlogPrivacySelector = "blog_privacy_selector";
	/**
						 * Fires once for each column in Bulk Edit mode.
						 *
						 * @since 2.7.0
						 *
						 * @param string $column_name Name of the column to edit.
						 * @param string $post_type   The post type slug.
						 * @Reference wp-admin\includes\class-wp-posts-list-table.php do_action( 'bulk_edit_custom_box', $column_name, $screen->post_type )
	*/
	const BulkEditCustomBox = "bulk_edit_custom_box";
	/**
			 * Fires when the locale is switched to or restored.
			 *
			 * @since 4.7.0
			 *
			 * @param string $locale The new locale.
			 * @Reference wp-includes\class-wp-locale-switcher.php do_action( 'change_locale', $locale )
	*/
	const ChangeLocale = "change_locale";
	/**
			 * Fires once the admin request has been validated or not.
			 *
			 * @since 1.5.1
			 *
			 * @param string    $action The nonce action.
			 * @param false|int $result False if the nonce is invalid, 1 if the nonce is valid and generated between
			 *                          0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
			 * @Reference wp-includes\pluggable.php do_action( 'check_admin_referer', $action, $result )
	*/
	const CheckAdminReferer = "check_admin_referer";
	/**
			 * Fires once the Ajax request has been validated or not.
			 *
			 * @since 2.1.0
			 *
			 * @param string    $action The Ajax nonce action.
			 * @param false|int $result False if the nonce is invalid, 1 if the nonce is valid and generated between
			 *                          0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
			 * @Reference wp-includes\pluggable.php do_action( 'check_ajax_referer', $action, $result )
	*/
	const CheckAjaxReferer = "check_ajax_referer";
	/**
		 * Fires immediately before a comment is marked approved.
		 *
		 * Allows checking for comment flooding.
		 *
		 * @since 2.3.0
		 * @since 4.7.0 The `$avoid_die` parameter was added.
		 *
		 * @param string $comment_author_IP    Comment author's IP address.
		 * @param string $comment_author_email Comment author's email.
		 * @param string $comment_date_gmt     GMT date the comment was posted.
		 * @param bool   $avoid_die            Whether to prevent executing wp_die()
		 *                                     or die() if a comment flood is occurring.
		 * @Reference wp-includes\comment.php do_action(		'check_comment_flood',		$commentdata['comment_author_IP'],		$commentdata['comment_author_email'],		$commentdata['comment_date_gmt'],		$avoid_die	)
	*/
	const CheckCommentFlood = "check_comment_flood";
	/**
		 * Fires before the password and confirm password fields are checked for congruity.
		 *
		 * @since 1.5.1
		 *
		 * @param string $user_login The username.
		 * @param string $pass1     The password (passed by reference).
		 * @param string $pass2     The confirmed password (passed by reference).
		 * @Reference wp-admin\includes\user.php do_action( 'check_passwords', array( $user->user_login, &$pass1, &$pass2 ) )
	*/
	const CheckPasswords = "check_passwords";
	/**
		 * Fires after the given attachment's cache is cleaned.
		 *
		 * @since 3.0.0
		 *
		 * @param int $id Attachment ID.
		 * @Reference wp-includes\post.php do_action( 'clean_attachment_cache', $id )
	*/
	const CleanAttachmentCache = "clean_attachment_cache";
	/**
			 * Fires immediately after a comment has been removed from the object cache.
			 *
			 * @since 4.5.0
			 *
			 * @param int $id Comment ID.
			 * @Reference wp-includes\comment.php do_action( 'clean_comment_cache', $id )
	*/
	const CleanCommentCache = "clean_comment_cache";
	/**
			 * Fires immediately after a network has been removed from the object cache.
			 *
			 * @since 4.6.0
			 *
			 * @param int $id Network ID.
			 * @Reference wp-includes\ms-network.php do_action( 'clean_network_cache', $id )
	*/
	const CleanNetworkCache = "clean_network_cache";
	/**
		 * Fires after the object term cache has been cleaned.
		 *
		 * @since 2.5.0
		 *
		 * @param array  $object_ids An array of object IDs.
		 * @param string $object_type Object type.
		 * @Reference wp-includes\taxonomy.php do_action( 'clean_object_term_cache', $object_ids, $object_type )
	*/
	const CleanObjectTermCache = "clean_object_term_cache";
	/**
			 * Fires immediately after the given page's cache is cleaned.
			 *
			 * @since 2.5.0
			 *
			 * @param int $post_id Post ID.
			 * @Reference wp-includes\post.php do_action( 'clean_page_cache', $post->ID )
	*/
	const CleanPageCache = "clean_page_cache";
	/**
		 * Fires immediately after the given post's cache is cleaned.
		 *
		 * @since 2.5.0
		 *
		 * @param int     $post_id Post ID.
		 * @param WP_Post $post    Post object.
		 * @Reference wp-includes\post.php do_action( 'clean_post_cache', $post->ID, $post )
	*/
	const CleanPostCache = "clean_post_cache";
	/**
		 * Fires immediately after a site has been removed from the object cache.
		 *
		 * @since 4.6.0
		 *
		 * @param int     $id              Blog ID.
		 * @param WP_Site $blog            Site object.
		 * @param string  $domain_path_key md5 hash of domain and path.
		 * @Reference wp-includes\ms-site.php do_action( 'clean_site_cache', $blog_id, $blog, $domain_path_key )
	*/
	const CleanSiteCache = "clean_site_cache";
	/**
		 * Fires after a taxonomy's caches have been cleaned.
		 *
		 * @since 4.9.0
		 *
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'clean_taxonomy_cache', $taxonomy )
	*/
	const CleanTaxonomyCache = "clean_taxonomy_cache";
	/**
			 * Fires once after each taxonomy's term cache has been cleaned.
			 *
			 * @since 2.5.0
			 * @since 4.5.0 Added the `$clean_taxonomy` parameter.
			 *
			 * @param array  $ids            An array of term IDs.
			 * @param string $taxonomy       Taxonomy slug.
			 * @param bool   $clean_taxonomy Whether or not to clean taxonomy-wide caches
			 * @Reference wp-includes\taxonomy.php do_action( 'clean_term_cache', $ids, $taxonomy, $clean_taxonomy )
	*/
	const CleanTermCache = "clean_term_cache";
	/**
		 * Fires immediately after the given user's cache is cleaned.
		 *
		 * @since 4.4.0
		 *
		 * @param int     $user_id User ID.
		 * @param WP_User $user    User object.
		 * @Reference wp-includes\user.php do_action( 'clean_user_cache', $user->ID, $user )
	*/
	const CleanUserCache = "clean_user_cache";
	/**
			 * Fires just before the authentication cookies are cleared.
			 *
			 * @since 2.7.0
			 * @Reference wp-includes\pluggable.php do_action( 'clear_auth_cookie' )
	*/
	const ClearAuthCookie = "clear_auth_cookie";
	/**
		 * Fires at the end of each Atom comment feed item.
		 *
		 * @since 2.2.0
		 *
		 * @param int $comment_id      ID of the current comment.
		 * @param int $comment_post_id ID of the post the current comment is connected to.
		 * @Reference wp-includes\feed-atom-comments.php do_action( 'comment_atom_entry', $comment->comment_ID, $comment_post->ID )
	*/
	const CommentAtomEntry = "comment_atom_entry";
	/**
			 * Fires when a comment is attempted on a post that has comments closed.
			 *
			 * @since 1.5.0
			 *
			 * @param int $comment_post_ID Post ID.
			 * @Reference wp-includes\comment.php do_action( 'comment_closed', $comment_post_ID )
	*/
	const CommentClosed = "comment_closed";
	/**
			 * Fires immediately after a duplicate comment is detected.
			 *
			 * @since 3.0.0
			 *
			 * @param array $commentdata Comment data.
			 * @Reference wp-includes\comment.php do_action( 'comment_duplicate_trigger', $commentdata )
	*/
	const CommentDuplicateTrigger = "comment_duplicate_trigger";
	/**
				 * Fires before the comment flood message is triggered.
				 *
				 * @since 1.5.0
				 *
				 * @param int $time_lastcomment Timestamp of when the last comment was posted.
				 * @param int $time_newcomment  Timestamp of when the new comment was posted.
				 * @Reference wp-includes\comment.php do_action( 'comment_flood_trigger', $time_lastcomment, $time_newcomment )
	*/
	const CommentFloodTrigger = "comment_flood_trigger";
	/**
				 * Fires at the bottom of the comment form, inside the closing </form> tag.
				 *
				 * @since 1.5.0
				 *
				 * @param int $post_id The post ID.
				 * @Reference wp-includes\comment-template.php do_action( 'comment_form', $post_id )
	*/
	const CommentForm = "comment_form";
	/**
		 * Fires after the comment form.
		 *
		 * @since 3.0.0
		 * @Reference wp-includes\comment-template.php do_action( 'comment_form_after' )
	*/
	const CommentFormAfter = "comment_form_after";
	/**
							 * Fires after the comment fields in the comment form, excluding the textarea.
							 *
							 * @since 3.0.0
							 * @Reference wp-includes\comment-template.php do_action( 'comment_form_after_fields' )
	*/
	const CommentFormAfterFields = "comment_form_after_fields";
	/**
		 * Fires before the comment form.
		 *
		 * @since 3.0.0
		 * @Reference wp-includes\comment-template.php do_action( 'comment_form_before' )
	*/
	const CommentFormBefore = "comment_form_before";
	/**
							 * Fires before the comment fields in the comment form, excluding the textarea.
							 *
							 * @since 3.0.0
							 * @Reference wp-includes\comment-template.php do_action( 'comment_form_before_fields' )
	*/
	const CommentFormBeforeFields = "comment_form_before_fields";
	/**
			 * Fires after the comment form if comments are closed.
			 *
			 * @since 3.0.0
			 * @Reference wp-includes\comment-template.php do_action( 'comment_form_comments_closed' )
	*/
	const CommentFormCommentsClosed = "comment_form_comments_closed";
	/**
					 * Fires after the is_user_logged_in() check in the comment form.
					 *
					 * @since 3.0.0
					 *
					 * @param array  $commenter     An array containing the comment author's
					 *                              username, email, and URL.
					 * @param string $user_identity If the commenter is a registered user,
					 *                              the display name, blank otherwise.
					 * @Reference wp-includes\comment-template.php do_action( 'comment_form_logged_in_after', $commenter, $user_identity )
	*/
	const CommentFormLoggedInAfter = "comment_form_logged_in_after";
	/**
				 * Fires after the HTML-formatted 'must log in after' message in the comment form.
				 *
				 * @since 3.0.0
				 * @Reference wp-includes\comment-template.php do_action( 'comment_form_must_log_in_after' )
	*/
	const CommentFormMustLogInAfter = "comment_form_must_log_in_after";
	/**
				 * Fires at the top of the comment form, inside the form tag.
				 *
				 * @since 3.0.0
				 * @Reference wp-includes\comment-template.php do_action( 'comment_form_top' )
	*/
	const CommentFormTop = "comment_form_top";
	/**
			 * Fires when a comment is attempted on a post that does not exist.
			 *
			 * @since 1.5.0
			 *
			 * @param int $comment_post_ID Post ID.
			 * @Reference wp-includes\comment.php do_action( 'comment_id_not_found', $comment_post_ID )
	*/
	const CommentIdNotFound = "comment_id_not_found";
	/**
				 * Fires once the comment loop is started.
				 *
				 * @since 2.2.0
				 * @Reference wp-includes\class-wp-query.php do_action( 'comment_loop_start' )
	*/
	const CommentLoopStart = "comment_loop_start";
	/**
			 * Fires when a comment is attempted on a post in draft mode.
			 *
			 * @since 1.5.1
			 *
			 * @param int $comment_post_ID Post ID.
			 * @Reference wp-includes\comment.php do_action( 'comment_on_draft', $comment_post_ID )
	*/
	const CommentOnDraft = "comment_on_draft";
	/**
			 * Fires when a comment is attempted on a password-protected post.
			 *
			 * @since 2.9.0
			 *
			 * @param int $comment_post_ID Post ID.
			 * @Reference wp-includes\comment.php do_action( 'comment_on_password_protected', $comment_post_ID )
	*/
	const CommentOnPasswordProtected = "comment_on_password_protected";
	/**
			 * Fires when a comment is attempted on a trashed post.
			 *
			 * @since 2.9.0
			 *
			 * @param int $comment_post_ID Post ID.
			 * @Reference wp-includes\comment.php do_action( 'comment_on_trash', $comment_post_ID )
	*/
	const CommentOnTrash = "comment_on_trash";
	/**
		 * Fires immediately after a comment is inserted into the database.
		 *
		 * @since 1.2.0
		 * @since 4.5.0 The `$commentdata` parameter was added.
		 *
		 * @param int        $comment_ID       The comment ID.
		 * @param int|string $comment_approved 1 if the comment is approved, 0 if not, 'spam' if spam.
		 * @param array      $commentdata      Comment data.
		 * @Reference wp-includes\comment.php do_action( 'comment_post', $comment_ID, $commentdata['comment_approved'], $commentdata )
	*/
	const CommentPost = "comment_post";
	/**
				 * Fires at the end of each RSS2 comment feed item.
				 *
				 * @since 2.1.0
				 *
				 * @param int $comment->comment_ID The ID of the comment being displayed.
				 * @param int $comment_post->ID    The ID of the post the comment is connected to.
				 * @Reference wp-includes\feed-rss2-comments.php do_action( 'commentrss2_item', $comment->comment_ID, $comment_post->ID )
	*/
	const Commentrss2Item = "commentrss2_item";
	/**
		 * Fires at the end of the Atom comment feed header.
		 *
		 * @since 2.8.0
		 * @Reference wp-includes\feed-atom-comments.php do_action( 'comments_atom_head' )
	*/
	const CommentsAtomHead = "comments_atom_head";
	/**
		 * Fires at the end of the RSS2 comment feed header.
		 *
		 * @since 2.3.0
		 * @Reference wp-includes\feed-rss2-comments.php do_action( 'commentsrss2_head' )
	*/
	const Commentsrss2Head = "commentsrss2_head";
	/**
		 * Fires after the core, plugin, and theme update tables.
		 *
		 * @since 2.9.0
		 * @Reference wp-admin\update-core.php do_action( 'core_upgrade_preamble' )
	*/
	const CoreUpgradePreamble = "core_upgrade_preamble";
	/**
		 * Fires immediately after a new term is created, before the term cache is cleaned.
		 *
		 * @since 2.3.0
		 *
		 * @param int    $term_id  Term ID.
		 * @param int    $tt_id    Term taxonomy ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'create_term', $term_id, $tt_id, $taxonomy )
	*/
	const CreateTerm = "create_term";
	/**
		 * Fires after a new term is created, and after the term cache has been cleaned.
		 *
		 * @since 2.3.0
		 *
		 * @param int    $term_id  Term ID.
		 * @param int    $tt_id    Term taxonomy ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'created_term', $term_id, $tt_id, $taxonomy )
	*/
	const CreatedTerm = "created_term";
	/**
			 * Fires after the current screen has been set.
			 *
			 * @since 3.0.0
			 *
			 * @param WP_Screen $current_screen Current WP_Screen object.
			 * @Reference wp-admin\includes\class-wp-screen.php do_action( 'current_screen', $current_screen )
	*/
	const CurrentScreen = "current_screen";
	/**
			 * Fires just before the submit button in the custom header options form.
			 *
			 * @since 3.1.0
			 * @Reference wp-admin\includes\class-custom-image-header.php do_action( 'custom_header_options' )
	*/
	const CustomHeaderOptions = "custom_header_options";
	/**
	 * Enqueue Customizer control scripts.
	 *
	 * @since 3.4.0
	 * @Reference wp-admin\customize.php do_action( 'customize_controls_enqueue_scripts' )
	*/
	const CustomizeControlsEnqueueScripts = "customize_controls_enqueue_scripts";
	/**
	 * Fires when Customizer controls are initialized, before scripts are enqueued.
	 *
	 * @since 3.4.0
	 * @Reference wp-admin\customize.php do_action( 'customize_controls_init' )
	*/
	const CustomizeControlsInit = "customize_controls_init";
	/**
		 * Prints templates, control scripts, and settings in the footer.
		 *
		 * @since 3.4.0
		 * @Reference wp-admin\customize.php do_action( 'customize_controls_print_footer_scripts' )
	*/
	const CustomizeControlsPrintFooterScripts = "customize_controls_print_footer_scripts";
	/**
	 * Fires when Customizer control scripts are printed.
	 *
	 * @since 3.4.0
	 * @Reference wp-admin\customize.php do_action( 'customize_controls_print_scripts' )
	*/
	const CustomizeControlsPrintScripts = "customize_controls_print_scripts";
	/**
	 * Fires when Customizer control styles are printed.
	 *
	 * @since 3.4.0
	 * @Reference wp-admin\customize.php do_action( 'customize_controls_print_styles' )
	*/
	const CustomizeControlsPrintStyles = "customize_controls_print_styles";
	/**
			 * Announce when any setting's unsanitized post value has been set.
			 *
			 * Fires when the WP_Customize_Manager::set_post_value() method is called.
			 *
			 * This is useful for `WP_Customize_Setting` instances to watch
			 * in order to update a cached previewed value.
			 *
			 * @since 4.4.0
			 *
			 * @param string               $setting_id Setting ID.
			 * @param mixed                $value      Unsanitized setting post value.
			 * @param WP_Customize_Manager $this       WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'customize_post_value_set', $setting_id, $value, $this )
	*/
	const CustomizePostValueSet = "customize_post_value_set";
	/**
			 * Fires once the Customizer preview has initialized and JavaScript
			 * settings have been printed.
			 *
			 * @since 3.4.0
			 *
			 * @param WP_Customize_Manager $this WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'customize_preview_init', $this )
	*/
	const CustomizePreviewInit = "customize_preview_init";
	/**
			 * Fires once WordPress has loaded, allowing scripts and styles to be initialized.
			 *
			 * @since 3.4.0
			 *
			 * @param WP_Customize_Manager $this WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'customize_register', $this )
	* @Reference wp-includes\theme.php do_action( 'customize_register', $wp_customize )
	*/
	const CustomizeRegister = "customize_register";
	/**
			 * Fires just before the current Customizer control is rendered.
			 *
			 * @since 3.4.0
			 *
			 * @param WP_Customize_Control $this WP_Customize_Control instance.
			 * @Reference wp-includes\class-wp-customize-control.php do_action( 'customize_render_control', $this )
	*/
	const CustomizeRenderControl = "customize_render_control";
	/**
			 * Fires before rendering a Customizer panel.
			 *
			 * @since 4.0.0
			 *
			 * @param WP_Customize_Panel $this WP_Customize_Panel instance.
			 * @Reference wp-includes\class-wp-customize-panel.php do_action( 'customize_render_panel', $this )
	*/
	const CustomizeRenderPanel = "customize_render_panel";
	/**
			 * Fires immediately after partials are rendered.
			 *
			 * Plugins may do things like call wp_footer() to scrape scripts output and return them
			 * via the {@see 'customize_render_partials_response'} filter.
			 *
			 * @since 4.5.0
			 *
			 * @param WP_Customize_Selective_Refresh $this     Selective refresh component.
			 * @param array                          $partials Placements' context data for the partials rendered in the request.
			 *                                                 The array is keyed by partial ID, with each item being an array of
			 *                                                 the placements' context data.
			 * @Reference wp-includes\customize\class-wp-customize-selective-refresh.php do_action( 'customize_render_partials_after', $this, $partials )
	*/
	const CustomizeRenderPartialsAfter = "customize_render_partials_after";
	/**
			 * Fires immediately before partials are rendered.
			 *
			 * Plugins may do things like call wp_enqueue_scripts() and gather a list of the scripts
			 * and styles which may get enqueued in the response.
			 *
			 * @since 4.5.0
			 *
			 * @param WP_Customize_Selective_Refresh $this     Selective refresh component.
			 * @param array                          $partials Placements' context data for the partials rendered in the request.
			 *                                                 The array is keyed by partial ID, with each item being an array of
			 *                                                 the placements' context data.
			 * @Reference wp-includes\customize\class-wp-customize-selective-refresh.php do_action( 'customize_render_partials_before', $this, $partials )
	*/
	const CustomizeRenderPartialsBefore = "customize_render_partials_before";
	/**
			 * Fires before rendering a Customizer section.
			 *
			 * @since 3.4.0
			 *
			 * @param WP_Customize_Section $this WP_Customize_Section instance.
			 * @Reference wp-includes\class-wp-customize-section.php do_action( 'customize_render_section', $this )
	*/
	const CustomizeRenderSection = "customize_render_section";
	/**
			 * Fires once the theme has switched in the Customizer, but before settings
			 * have been saved.
			 *
			 * @since 3.4.0
			 *
			 * @param WP_Customize_Manager $manager WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'customize_save', $this )
	*/
	const CustomizeSave = "customize_save";
	/**
			 * Fires after Customize settings have been saved.
			 *
			 * @since 3.6.0
			 *
			 * @param WP_Customize_Manager $manager WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'customize_save_after', $this )
	*/
	const CustomizeSaveAfter = "customize_save_after";
	/**
			 * Fires before save validation happens.
			 *
			 * Plugins can add just-in-time {@see 'customize_validate_{$this->ID}'} filters
			 * at this point to catch any settings registered after `customize_register`.
			 * The dynamic portion of the hook name, `$this->ID` refers to the setting ID.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Customize_Manager $this WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'customize_save_validation_before', $this )
	*/
	const CustomizeSaveValidationBefore = "customize_save_validation_before";
	/**
		 * Fires in the middle of built-in meta box registration.
		 *
		 * @since 2.1.0
		 * @deprecated 3.7.0 Use 'add_meta_boxes' instead.
		 *
		 * @param WP_Post $post Post object.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'dbx_post_advanced', $post )
	*/
	const DbxPostAdvanced = "dbx_post_advanced";
	/**
	 * Fires after all meta box sections have been output, before the closing #post-body div.
	 *
	 * @since 2.1.0
	 *
	 * @param WP_Post $post Post object.
	 * @Reference wp-admin\edit-form-advanced.php do_action( 'dbx_post_sidebar', $post )
	*/
	const DbxPostSidebar = "dbx_post_sidebar";
	/**
				 * Fires before a network site is deactivated.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param string $id The ID of the site being deactivated.
				 * @Reference wp-admin\network\sites.php do_action( 'deactivate_blog', $id )
	*/
	const DeactivateBlog = "deactivate_blog";
	/**
				 * Fires before a plugin is deactivated.
				 *
				 * If a plugin is silently deactivated (such as during an update),
				 * this hook does not fire.
				 *
				 * @since 2.9.0
				 *
				 * @param string $plugin               Path to the plugin file relative to the plugins directory.
				 * @param bool   $network_deactivating Whether the plugin is deactivated for all sites in the network
				 *                                     or just the current site. Multisite only. Default is false.
				 * @Reference wp-admin\includes\plugin.php do_action( 'deactivate_plugin', $plugin, $network_deactivating )
	*/
	const DeactivatePlugin = "deactivate_plugin";
	/**
				 * Fires after a plugin is deactivated.
				 *
				 * If a plugin is silently deactivated (such as during an update),
				 * this hook does not fire.
				 *
				 * @since 2.9.0
				 *
				 * @param string $plugin               Path to the plugin file relative to the plugins directory.
				 * @param bool   $network_deactivating Whether the plugin is deactivated for all sites in the network.
				 *                                     or just the current site. Multisite only. Default false.
				 * @Reference wp-admin\includes\plugin.php do_action( 'deactivated_plugin', $plugin, $network_deactivating )
	*/
	const DeactivatedPlugin = "deactivated_plugin";
	/**
		 * Fires before an attachment is deleted, at the start of wp_delete_attachment().
		 *
		 * @since 2.0.0
		 *
		 * @param int $post_id Attachment ID.
		 * @Reference wp-includes\post.php do_action( 'delete_attachment', $post_id )
	*/
	const DeleteAttachment = "delete_attachment";
	/**
		 * Fires before a site is deleted.
		 *
		 * @since MU (3.0.0)
		 * @deprecated 5.1.0
		 *
		 * @param int  $site_id The site ID.
		 * @param bool $drop    True if site's table should be dropped. Default is false.
		 * @Reference wp-includes\ms-site.php do_action( 'delete_blog', array( $old_site->id, true ), '5.1.0' )
	* @Reference wp-admin\includes\ms.php do_action( 'delete_blog', array( $blog_id, false ), '5.1.0' )
	*/
	const DeleteBlog = "delete_blog";
	/**
		 * Fires immediately before a comment is deleted from the database.
		 *
		 * @since 1.2.0
		 * @since 4.9.0 Added the `$comment` parameter.
		 *
		 * @param int        $comment_id The comment ID.
		 * @param WP_Comment $comment    The comment to be deleted.
		 * @Reference wp-includes\comment.php do_action( 'delete_comment', $comment->comment_ID, $comment )
	*/
	const DeleteComment = "delete_comment";
	/**
		 * Fires before a link is deleted.
		 *
		 * @since 2.0.0
		 *
		 * @param int $link_id ID of the link to delete.
		 * @Reference wp-admin\includes\bookmark.php do_action( 'delete_link', $link_id )
	*/
	const DeleteLink = "delete_link";
	/**
		 * Fires immediately before an option is deleted.
		 *
		 * @since 2.9.0
		 *
		 * @param string $option Name of the option to delete.
		 * @Reference wp-includes\option.php do_action( 'delete_option', $option )
	*/
	const DeleteOption = "delete_option";
	/**
			 * Fires immediately before a plugin deletion attempt.
			 *
			 * @since 4.4.0
			 *
			 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
			 * @Reference wp-admin\includes\plugin.php do_action( 'delete_plugin', $plugin_file )
	*/
	const DeletePlugin = "delete_plugin";
	/**
		 * Fires immediately before a post is deleted from the database.
		 *
		 * @since 1.2.0
		 *
		 * @param int $postid Post ID.
		 * @Reference wp-includes\post.php do_action( 'delete_post', $postid )
	* @Reference wp-includes\post.php do_action( 'delete_post', $post_id )
	*/
	const DeletePost = "delete_post";
	/**
			 * Fires immediately before deleting metadata for a post.
			 *
			 * @since 2.9.0
			 *
			 * @param array $meta_ids An array of post metadata entry IDs to delete.
			 * @Reference wp-includes\meta.php do_action( 'delete_postmeta', $meta_ids )
	*/
	const DeletePostmeta = "delete_postmeta";
	/**
			 * Fires after a network option has been deleted.
			 *
			 * @since 3.0.0
			 * @since 4.7.0 The `$network_id` parameter was added.
			 *
			 * @param string $option     Name of the network option.
			 * @param int    $network_id ID of the network.
			 * @Reference wp-includes\option.php do_action( 'delete_site_option', $option, $network_id )
	*/
	const DeleteSiteOption = "delete_site_option";
	/**
		 * Fires after a term is deleted from the database and the cache is cleaned.
		 *
		 * @since 2.5.0
		 * @since 4.5.0 Introduced the `$object_ids` argument.
		 *
		 * @param int     $term         Term ID.
		 * @param int     $tt_id        Term taxonomy ID.
		 * @param string  $taxonomy     Taxonomy slug.
		 * @param mixed   $deleted_term Copy of the already-deleted term, in the form specified
		 *                              by the parent function. WP_Error otherwise.
		 * @param array   $object_ids   List of term object IDs.
		 * @Reference wp-includes\taxonomy.php do_action( 'delete_term', $term, $tt_id, $taxonomy, $deleted_term, $object_ids )
	*/
	const DeleteTerm = "delete_term";
	/**
			 * Fires immediately before an object-term relationship is deleted.
			 *
			 * @since 2.9.0
			 * @since 4.7.0 Added the `$taxonomy` parameter.
			 *
			 * @param int   $object_id Object ID.
			 * @param array $tt_ids    An array of term taxonomy IDs.
			 * @param string $taxonomy  Taxonomy slug.
			 * @Reference wp-includes\taxonomy.php do_action( 'delete_term_relationships', $object_id, $tt_ids, $taxonomy )
	*/
	const DeleteTermRelationships = "delete_term_relationships";
	/**
		 * Fires immediately before a term taxonomy ID is deleted.
		 *
		 * @since 2.9.0
		 *
		 * @param int $tt_id Term taxonomy ID.
		 * @Reference wp-includes\taxonomy.php do_action( 'delete_term_taxonomy', $tt_id )
	*/
	const DeleteTermTaxonomy = "delete_term_taxonomy";
	/**
		 * Fires immediately before a user is deleted from the database.
		 *
		 * @since 2.0.0
		 *
		 * @param int      $id       ID of the user to delete.
		 * @param int|null $reassign ID of the user to reassign posts and links to.
		 *                           Default null, for no reassignment.
		 * @Reference wp-admin\includes\user.php do_action( 'delete_user', $id, $reassign )
	*/
	const DeleteUser = "delete_user";
	/**
				 * Fires at the end of the delete users form prior to the confirm button.
				 *
				 * @since 4.0.0
				 * @since 4.5.0 The `$userids` parameter was added.
				 *
				 * @param WP_User $current_user WP_User object for the current user.
				 * @param int[]   $userids      Array of IDs for users being deleted.
				 * @Reference wp-admin\users.php do_action( 'delete_user_form', $current_user, $userids )
	* @Reference wp-admin\includes\ms.php do_action( 'delete_user_form', $current_user, $allusers )
	*/
	const DeleteUserForm = "delete_user_form";
	/**
	* @Reference wp-includes\deprecated.php do_action( 'delete_usermeta', $cur->umeta_id, $user_id, $meta_key, $meta_value )
	*/
	const DeleteUsermeta = "delete_usermeta";
	/**
			 * Fires immediately after a widget has been marked for deletion.
			 *
			 * @since 4.4.0
			 *
			 * @param string $widget_id  ID of the widget marked for deletion.
			 * @param string $sidebar_id ID of the sidebar the widget was deleted from.
			 * @param string $id_base    ID base for the widget.
			 * @Reference wp-admin\widgets.php do_action( 'delete_widget', $widget_id, $sidebar_id, $id_base )
	* @Reference wp-admin\includes\ajax-actions.php do_action( 'delete_widget', $widget_id, $sidebar_id, $id_base )
	*/
	const DeleteWidget = "delete_widget";
	/**
		 * Fires after the site is deleted from the network.
		 *
		 * @since 4.8.0
		 * @deprecated 5.1.0
		 *
		 * @param int  $site_id The site ID.
		 * @param bool $drop    True if site's tables should be dropped. Default is false.
		 * @Reference wp-includes\ms-site.php do_action( 'deleted_blog', array( $old_site->id, true ), '5.1.0' )
	* @Reference wp-admin\includes\ms.php do_action( 'deleted_blog', array( $blog_id, false ), '5.1.0' )
	*/
	const DeletedBlog = "deleted_blog";
	/**
		 * Fires immediately after a comment is deleted from the database.
		 *
		 * @since 2.9.0
		 * @since 4.9.0 Added the `$comment` parameter.
		 *
		 * @param int        $comment_id The comment ID.
		 * @param WP_Comment $comment    The deleted comment.
		 * @Reference wp-includes\comment.php do_action( 'deleted_comment', $comment->comment_ID, $comment )
	*/
	const DeletedComment = "deleted_comment";
	/**
		 * Fires after a link has been deleted.
		 *
		 * @since 2.2.0
		 *
		 * @param int $link_id ID of the deleted link.
		 * @Reference wp-admin\includes\bookmark.php do_action( 'deleted_link', $link_id )
	*/
	const DeletedLink = "deleted_link";
	/**
			 * Fires after an option has been deleted.
			 *
			 * @since 2.9.0
			 *
			 * @param string $option Name of the deleted option.
			 * @Reference wp-includes\option.php do_action( 'deleted_option', $option )
	*/
	const DeletedOption = "deleted_option";
	/**
			 * Fires immediately after a plugin deletion attempt.
			 *
			 * @since 4.4.0
			 *
			 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
			 * @param bool   $deleted     Whether the plugin deletion was successful.
			 * @Reference wp-admin\includes\plugin.php do_action( 'deleted_plugin', $plugin_file, $deleted )
	*/
	const DeletedPlugin = "deleted_plugin";
	/**
		 * Fires immediately after a post is deleted from the database.
		 *
		 * @since 2.2.0
		 *
		 * @param int $postid Post ID.
		 * @Reference wp-includes\post.php do_action( 'deleted_post', $postid )
	* @Reference wp-includes\post.php do_action( 'deleted_post', $post_id )
	*/
	const DeletedPost = "deleted_post";
	/**
			 * Fires immediately after deleting metadata for a post.
			 *
			 * @since 2.9.0
			 *
			 * @param array $meta_ids An array of deleted post metadata entry IDs.
			 * @Reference wp-includes\meta.php do_action( 'deleted_postmeta', $meta_ids )
	*/
	const DeletedPostmeta = "deleted_postmeta";
	/**
			 * Fires after a transient is deleted.
			 *
			 * @since 3.0.0
			 *
			 * @param string $transient Deleted transient name.
			 * @Reference wp-includes\option.php do_action( 'deleted_site_transient', $transient )
	*/
	const DeletedSiteTransient = "deleted_site_transient";
	/**
			 * Fires immediately after an object-term relationship is deleted.
			 *
			 * @since 2.9.0
			 * @since 4.7.0 Added the `$taxonomy` parameter.
			 *
			 * @param int    $object_id Object ID.
			 * @param array  $tt_ids    An array of term taxonomy IDs.
			 * @param string $taxonomy  Taxonomy slug.
			 * @Reference wp-includes\taxonomy.php do_action( 'deleted_term_relationships', $object_id, $tt_ids, $taxonomy )
	*/
	const DeletedTermRelationships = "deleted_term_relationships";
	/**
		 * Fires immediately after a term taxonomy ID is deleted.
		 *
		 * @since 2.9.0
		 *
		 * @param int $tt_id Term taxonomy ID.
		 * @Reference wp-includes\taxonomy.php do_action( 'deleted_term_taxonomy', $tt_id )
	*/
	const DeletedTermTaxonomy = "deleted_term_taxonomy";
	/**
			 * Fires after a transient is deleted.
			 *
			 * @since 3.0.0
			 *
			 * @param string $transient Deleted transient name.
			 * @Reference wp-includes\option.php do_action( 'deleted_transient', $transient )
	*/
	const DeletedTransient = "deleted_transient";
	/**
		 * Fires immediately after a user is deleted from the database.
		 *
		 * @since 2.9.0
		 *
		 * @param int      $id       ID of the deleted user.
		 * @param int|null $reassign ID of the user to reassign posts and links to.
		 *                           Default null, for no reassignment.
		 * @Reference wp-admin\includes\user.php do_action( 'deleted_user', $id, $reassign )
	* @Reference wp-admin\includes\ms.php do_action( 'deleted_user', $id, null )
	*/
	const DeletedUser = "deleted_user";
	/**
	* @Reference wp-includes\deprecated.php do_action( 'deleted_usermeta', $cur->umeta_id, $user_id, $meta_key, $meta_value )
	*/
	const DeletedUsermeta = "deleted_usermeta";
	/**
		 * Fires when a deprecated argument is called.
		 *
		 * @since 3.0.0
		 *
		 * @param string $function The function that was called.
		 * @param string $message  A message regarding the change.
		 * @param string $version  The version of WordPress that deprecated the argument used.
		 * @Reference wp-includes\functions.php do_action( 'deprecated_argument_run', $function, $message, $version )
	*/
	const DeprecatedArgumentRun = "deprecated_argument_run";
	/**
		 * Fires when a deprecated constructor is called.
		 *
		 * @since 4.3.0
		 * @since 4.5.0 Added the `$parent_class` parameter.
		 *
		 * @param string $class        The class containing the deprecated constructor.
		 * @param string $version      The version of WordPress that deprecated the function.
		 * @param string $parent_class The parent class calling the deprecated constructor.
		 * @Reference wp-includes\functions.php do_action( 'deprecated_constructor_run', $class, $version, $parent_class )
	*/
	const DeprecatedConstructorRun = "deprecated_constructor_run";
	/**
		 * Fires when a deprecated file is called.
		 *
		 * @since 2.5.0
		 *
		 * @param string $file        The file that was called.
		 * @param string $replacement The file that should have been included based on ABSPATH.
		 * @param string $version     The version of WordPress that deprecated the file.
		 * @param string $message     A message regarding the change.
		 * @Reference wp-includes\functions.php do_action( 'deprecated_file_included', $file, $replacement, $version, $message )
	*/
	const DeprecatedFileIncluded = "deprecated_file_included";
	/**
		 * Fires when a deprecated function is called.
		 *
		 * @since 2.5.0
		 *
		 * @param string $function    The function that was called.
		 * @param string $replacement The function that should have been called.
		 * @param string $version     The version of WordPress that deprecated the function.
		 * @Reference wp-includes\functions.php do_action( 'deprecated_function_run', $function, $replacement, $version )
	*/
	const DeprecatedFunctionRun = "deprecated_function_run";
	/**
		 * Fires when a deprecated hook is called.
		 *
		 * @since 4.6.0
		 *
		 * @param string $hook        The hook that was called.
		 * @param string $replacement The hook that should be used as a replacement.
		 * @param string $version     The version of WordPress that deprecated the argument used.
		 * @param string $message     A message regarding the change.
		 * @Reference wp-includes\functions.php do_action( 'deprecated_hook_run', $hook, $replacement, $version, $message )
	*/
	const DeprecatedHookRun = "deprecated_hook_run";
	/**
		 * Fires after meta boxes have been added.
		 *
		 * Fires once for each of the default meta box contexts: normal, advanced, and side.
		 *
		 * @since 3.0.0
		 *
		 * @param string                $post_type Post type of the post on Edit Post screen, 'link' on Edit Link screen,
		 *                                         'dashboard' on Dashboard screen.
		 * @param string                $context   Meta box context. Possible values include 'normal', 'advanced', 'side'.
		 * @param WP_Post|object|string $post      Post object on Edit Post screen, link object on Edit Link screen,
		 *                                         an empty string on Dashboard screen.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'do_meta_boxes', $post_type, 'normal', $post )
	* @Reference wp-admin\includes\meta-boxes.php do_action( 'do_meta_boxes', $post_type, 'advanced', $post )
	* @Reference wp-admin\includes\meta-boxes.php do_action( 'do_meta_boxes', $post_type, 'side', $post )
	* @Reference wp-admin\includes\dashboard.php do_action( 'do_meta_boxes', $screen->id, 'normal', '' )
	* @Reference wp-admin\includes\dashboard.php do_action( 'do_meta_boxes', $screen->id, 'side', '' )
	* @Reference wp-admin\edit-link-form.php do_action( 'do_meta_boxes', 'link', 'advanced', $link )
	* @Reference wp-admin\edit-link-form.php do_action( 'do_meta_boxes', 'link', 'normal', $link )
	* @Reference wp-admin\edit-link-form.php do_action( 'do_meta_boxes', 'link', 'side', $link )
	*/
	const DoMetaBoxes = "do_meta_boxes";
	/**
		 * Fired when the template loader determines a robots.txt request.
		 *
		 * @since 2.1.0
		 * @Reference wp-includes\template-loader.php do_action( 'do_robots' )
	*/
	const DoRobots = "do_robots";
	/**
		 * Fires when displaying the robots.txt file.
		 *
		 * @since 2.1.0
		 * @Reference wp-includes\functions.php do_action( 'do_robotstxt' )
	*/
	const DoRobotstxt = "do_robotstxt";
	/**
		 * Fires when the given function is being used incorrectly.
		 *
		 * @since 3.1.0
		 *
		 * @param string $function The function that was called.
		 * @param string $message  A message explaining what has been done incorrectly.
		 * @param string $version  The version of WordPress where the message was added.
		 * @Reference wp-includes\functions.php do_action( 'doing_it_wrong_run', $function, $message, $version )
	*/
	const DoingItWrongRun = "doing_it_wrong_run";
	/**
			 * Fires before a widget's display callback is called.
			 *
			 * Note: The action fires on both the front end and back end, including
			 * for widgets in the Inactive Widgets sidebar on the Widgets screen.
			 *
			 * The action is not fired for empty sidebars.
			 *
			 * @since 3.0.0
			 *
			 * @param array $widget_id {
			 *     An associative array of widget arguments.
			 *
			 *     @type string $name                Name of the widget.
			 *     @type string $id                  Widget ID.
			 *     @type array|callable $callback    When the hook is fired on the front end, $callback is an array
			 *                                       containing the widget object. Fired on the back end, $callback
			 *                                       is 'wp_widget_control', see $_callback.
			 *     @type array          $params      An associative array of multi-widget arguments.
			 *     @type string         $classname   CSS class applied to the widget container.
			 *     @type string         $description The widget description.
			 *     @type array          $_callback   When the hook is fired on the back end, $_callback is populated
			 *                                       with an array containing the widget object, see $callback.
			 * }
			 * @Reference wp-includes\widgets.php do_action( 'dynamic_sidebar', $wp_registered_widgets[ $id ] )
	*/
	const DynamicSidebar = "dynamic_sidebar";
	/**
		 * Fires after widgets are rendered in a dynamic sidebar.
		 *
		 * Note: The action also fires for empty sidebars, and on both the front end
		 * and back end, including the Inactive Widgets sidebar on the Widgets screen.
		 *
		 * @since 3.9.0
		 *
		 * @param int|string $index       Index, name, or ID of the dynamic sidebar.
		 * @param bool       $has_widgets Whether the sidebar is populated with widgets.
		 *                                Default true.
		 * @Reference wp-includes\widgets.php do_action( 'dynamic_sidebar_after', $index, true )
	* @Reference wp-includes\widgets.php do_action( 'dynamic_sidebar_after', $index, false )
	*/
	const DynamicSidebarAfter = "dynamic_sidebar_after";
	/**
		 * Fires before widgets are rendered in a dynamic sidebar.
		 *
		 * Note: The action also fires for empty sidebars, and on both the front end
		 * and back end, including the Inactive Widgets sidebar on the Widgets screen.
		 *
		 * @since 3.9.0
		 *
		 * @param int|string $index       Index, name, or ID of the dynamic sidebar.
		 * @param bool       $has_widgets Whether the sidebar is populated with widgets.
		 *                                Default true.
		 * @Reference wp-includes\widgets.php do_action( 'dynamic_sidebar_before', $index, true )
	* @Reference wp-includes\widgets.php do_action( 'dynamic_sidebar_before', $index, false )
	*/
	const DynamicSidebarBefore = "dynamic_sidebar_before";
	/**
				 * Fires once an existing attachment has been updated.
				 *
				 * @since 2.0.0
				 *
				 * @param int $post_ID Attachment ID.
				 * @Reference wp-includes\post.php do_action( 'edit_attachment', $post_ID )
	*/
	const EditAttachment = "edit_attachment";
	/**
			 * Fires at the end of the Edit Category form.
			 *
			 * @since 2.1.0
			 * @deprecated 3.0.0 Use {$taxonomy}_add_form instead.
			 *
			 * @param object $arg Optional arguments cast to an object.
			 * @Reference wp-admin\edit-tags.php do_action( 'edit_category_form', (object) array( 'parent' => 0 ) )
	* @Reference wp-admin\edit-tag-form.php do_action( 'edit_category_form', $tag )
	*/
	const EditCategoryForm = "edit_category_form";
	/**
				 * Fires after the Edit Category form fields are displayed.
				 *
				 * @since 2.9.0
				 * @deprecated 3.0.0 Use {$taxonomy}_edit_form_fields instead.
				 *
				 * @param WP_Term $tag Current category term object.
				 * @Reference wp-admin\edit-tag-form.php do_action( 'edit_category_form_fields', $tag )
	*/
	const EditCategoryFormFields = "edit_category_form_fields";
	/**
		 * Fires before the Edit Category form.
		 *
		 * @since 2.1.0
		 * @deprecated 3.0.0 Use {$taxonomy}_pre_edit_form instead.
		 *
		 * @param WP_Term $tag Current category term object.
		 * @Reference wp-admin\edit-tag-form.php do_action( 'edit_category_form_pre', $tag )
	*/
	const EditCategoryFormPre = "edit_category_form_pre";
	/**
		 * Fires immediately after a comment is updated in the database.
		 *
		 * The hook also fires immediately before comment status transition hooks are fired.
		 *
		 * @since 1.2.0
		 * @since 4.6.0 Added the `$data` parameter.
		 *
		 * @param int   $comment_ID The comment ID.
		 * @param array $data       Comment data.
		 * @Reference wp-includes\comment.php do_action( 'edit_comment', $comment_ID, $data )
	*/
	const EditComment = "edit_comment";
	/**
		 * Fires after 'normal' context meta boxes have been output for all post types other than 'page'.
		 *
		 * @since 1.5.0
		 *
		 * @param WP_Post $post Post object.
		 * @Reference wp-admin\edit-form-advanced.php do_action( 'edit_form_advanced', $post )
	* @Reference wp-admin\includes\post.php do_action( 'edit_form_advanced', $post )
	*/
	const EditFormAdvanced = "edit_form_advanced";
	/**
	 * Fires after the content editor.
	 *
	 * @since 3.5.0
	 *
	 * @param WP_Post $post Post object.
	 * @Reference wp-admin\edit-form-advanced.php do_action( 'edit_form_after_editor', $post )
	*/
	const EditFormAfterEditor = "edit_form_after_editor";
	/**
	 * Fires after the title field.
	 *
	 * @since 3.5.0
	 *
	 * @param WP_Post $post Post object.
	 * @Reference wp-admin\edit-form-advanced.php do_action( 'edit_form_after_title', $post )
	* @Reference wp-admin\includes\post.php do_action( 'edit_form_after_title', $post )
	*/
	const EditFormAfterTitle = "edit_form_after_title";
	/**
		 * Fires before the permalink field in the edit form.
		 *
		 * @since 4.1.0
		 *
		 * @param WP_Post $post Post object.
		 * @Reference wp-admin\edit-form-advanced.php do_action( 'edit_form_before_permalink', $post )
	*/
	const EditFormBeforePermalink = "edit_form_before_permalink";
	/**
	 * Fires at the beginning of the edit form.
	 *
	 * At this point, the required hidden fields and nonces have already been output.
	 *
	 * @since 3.7.0
	 *
	 * @param WP_Post $post Post object.
	 * @Reference wp-admin\edit-form-advanced.php do_action( 'edit_form_top', $post )
	*/
	const EditFormTop = "edit_form_top";
	/**
			 * Fires after a link was updated in the database.
			 *
			 * @since 2.0.0
			 *
			 * @param int $link_id ID of the link that was updated.
			 * @Reference wp-admin\includes\bookmark.php do_action( 'edit_link', $link_id )
	*/
	const EditLink = "edit_link";
	/**
			 * Fires at the end of the Edit Link form.
			 *
			 * @since 2.3.0
			 * @deprecated 3.0.0 Use {$taxonomy}_add_form instead.
			 *
			 * @param object $arg Optional arguments cast to an object.
			 * @Reference wp-admin\edit-tags.php do_action( 'edit_link_category_form', (object) array( 'parent' => 0 ) )
	* @Reference wp-admin\edit-tag-form.php do_action( 'edit_link_category_form', $tag )
	*/
	const EditLinkCategoryForm = "edit_link_category_form";
	/**
				 * Fires after the Edit Link Category form fields are displayed.
				 *
				 * @since 2.9.0
				 * @deprecated 3.0.0 Use {$taxonomy}_edit_form_fields instead.
				 *
				 * @param WP_Term $tag Current link category term object.
				 * @Reference wp-admin\edit-tag-form.php do_action( 'edit_link_category_form_fields', $tag )
	*/
	const EditLinkCategoryFormFields = "edit_link_category_form_fields";
	/**
		 * Fires before the Edit Link Category form.
		 *
		 * @since 2.3.0
		 * @deprecated 3.0.0 Use {$taxonomy}_pre_edit_form instead.
		 *
		 * @param WP_Term $tag Current link category term object.
		 * @Reference wp-admin\edit-tag-form.php do_action( 'edit_link_category_form_pre', $tag )
	*/
	const EditLinkCategoryFormPre = "edit_link_category_form_pre";
	/**
		 * Fires after 'normal' context meta boxes have been output for the 'page' post type.
		 *
		 * @since 1.5.0
		 *
		 * @param WP_Post $post Post object.
		 * @Reference wp-admin\edit-form-advanced.php do_action( 'edit_page_form', $post )
	*/
	const EditPageForm = "edit_page_form";
	/**
			 * Fires once an existing post has been updated.
			 *
			 * @since 1.2.0
			 *
			 * @param int     $post_ID Post ID.
			 * @param WP_Post $post    Post object.
			 * @Reference wp-includes\post.php do_action( 'edit_post', $post_ID, $post )
	* @Reference wp-includes\comment.php do_action( 'edit_post', $post_id, $post )
	* @Reference wp-includes\class-wp-customize-manager.php do_action( 'edit_post', $post->ID, $post )
	* @Reference wp-includes\post.php do_action( 'edit_post', $post->ID, $post )
	*/
	const EditPost = "edit_post";
	/**
		 * Fires at the end of the Edit Term form.
		 *
		 * @since 2.5.0
		 * @deprecated 3.0.0 Use {$taxonomy}_edit_form instead.
		 *
		 * @param WP_Term $tag Current taxonomy term object.
		 * @Reference wp-admin\edit-tag-form.php do_action( 'edit_tag_form', $tag )
	*/
	const EditTagForm = "edit_tag_form";
	/**
				 * Fires after the Edit Tag form fields are displayed.
				 *
				 * @since 2.9.0
				 * @deprecated 3.0.0 Use {$taxonomy}_edit_form_fields instead.
				 *
				 * @param WP_Term $tag Current tag term object.
				 * @Reference wp-admin\edit-tag-form.php do_action( 'edit_tag_form_fields', $tag )
	*/
	const EditTagFormFields = "edit_tag_form_fields";
	/**
		 * Fires before the Edit Tag form.
		 *
		 * @since 2.5.0
		 * @deprecated 3.0.0 Use {$taxonomy}_pre_edit_form instead.
		 *
		 * @param WP_Term $tag Current tag term object.
		 * @Reference wp-admin\edit-tag-form.php do_action( 'edit_tag_form_pre', $tag )
	*/
	const EditTagFormPre = "edit_tag_form_pre";
	/**
		 * Fires after a term has been updated, but before the term cache has been cleaned.
		 *
		 * @since 2.3.0
		 *
		 * @param int    $term_id  Term ID.
		 * @param int    $tt_id    Term taxonomy ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'edit_term', $term_id, $tt_id, $taxonomy )
	*/
	const EditTerm = "edit_term";
	/**
			 * Fires immediately before a term to delete's children are reassigned a parent.
			 *
			 * @since 2.9.0
			 *
			 * @param array $edit_tt_ids An array of term taxonomy IDs for the given term.
			 * @Reference wp-includes\taxonomy.php do_action( 'edit_term_taxonomies', $edit_tt_ids )
	*/
	const EditTermTaxonomies = "edit_term_taxonomies";
	/**
		 * Fires immediate before a term-taxonomy relationship is updated.
		 *
		 * @since 2.9.0
		 *
		 * @param int    $tt_id    Term taxonomy ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'edit_term_taxonomy', $tt_id, $taxonomy )
	* @Reference wp-includes\taxonomy.php do_action( 'edit_term_taxonomy', $term, $taxonomy->name )
	* @Reference wp-includes\taxonomy.php do_action( 'edit_term_taxonomy', $term, $taxonomy->name )
	*/
	const EditTermTaxonomy = "edit_term_taxonomy";
	/**
		 * Fires immediately before the given terms are edited.
		 *
		 * @since 2.9.0
		 *
		 * @param int    $term_id  Term ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'edit_terms', $term_id, $taxonomy )
	* @Reference wp-includes\taxonomy.php do_action( 'edit_terms', $term_id, $taxonomy )
	*/
	const EditTerms = "edit_terms";
	/**
			 * Fires after a new user has been created.
			 *
			 * @since 4.4.0
			 *
			 * @param int    $user_id ID of the newly created user.
			 * @param string $notify  Type of notification that should happen. See wp_send_new_user_notifications()
			 *                        for more information on possible values.
			 * @Reference wp-admin\includes\user.php do_action( 'edit_user_created_user', $user_id, $notify )
	*/
	const EditUserCreatedUser = "edit_user_created_user";
	/**
				 * Fires after the 'About the User' settings table on the 'Edit User' screen.
				 *
				 * @since 2.0.0
				 *
				 * @param WP_User $profileuser The current WP_User object.
				 * @Reference wp-admin\user-edit.php do_action( 'edit_user_profile', $profileuser )
	*/
	const EditUserProfile = "edit_user_profile";
	/**
				 * Fires before the page loads on the 'Edit User' screen.
				 *
				 * @since 2.7.0
				 *
				 * @param int $user_id The user ID.
				 * @Reference wp-admin\user-edit.php do_action( 'edit_user_profile_update', $user_id )
	*/
	const EditUserProfileUpdate = "edit_user_profile_update";
	/**
		 * Fires after a term has been updated, and the term cache has been cleaned.
		 *
		 * @since 2.3.0
		 *
		 * @param int    $term_id  Term ID.
		 * @param int    $tt_id    Term taxonomy ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'edited_term', $term_id, $tt_id, $taxonomy )
	*/
	const EditedTerm = "edited_term";
	/**
			 * Fires immediately after a term to delete's children are reassigned a parent.
			 *
			 * @since 2.9.0
			 *
			 * @param array $edit_tt_ids An array of term taxonomy IDs for the given term.
			 * @Reference wp-includes\taxonomy.php do_action( 'edited_term_taxonomies', $edit_tt_ids )
	*/
	const EditedTermTaxonomies = "edited_term_taxonomies";
	/**
		 * Fires immediately after a term-taxonomy relationship is updated.
		 *
		 * @since 2.9.0
		 *
		 * @param int    $tt_id    Term taxonomy ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'edited_term_taxonomy', $tt_id, $taxonomy )
	* @Reference wp-includes\taxonomy.php do_action( 'edited_term_taxonomy', $term, $taxonomy->name )
	* @Reference wp-includes\taxonomy.php do_action( 'edited_term_taxonomy', $term, $taxonomy->name )
	*/
	const EditedTermTaxonomy = "edited_term_taxonomy";
	/**
		 * Fires immediately after the given terms are edited.
		 *
		 * @since 2.9.0
		 *
		 * @param int    $term_id  Term ID
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php do_action( 'edited_terms', $term_id, $taxonomy )
	* @Reference wp-includes\taxonomy.php do_action( 'edited_terms', $term_id, $taxonomy )
	*/
	const EditedTerms = "edited_terms";
	/**
			 * Prints additional content after the embed excerpt.
			 *
			 * @since 4.4.0
			 * @Reference wp-includes\theme-compat\embed-content.php do_action( 'embed_content' )
	* @Reference wp-includes\theme-compat\embed-404.php do_action( 'embed_content' )
	*/
	const EmbedContent = "embed_content";
	/**
					 * Prints additional meta content in the embed template.
					 *
					 * @since 4.4.0
					 * @Reference wp-includes\theme-compat\embed-content.php do_action( 'embed_content_meta' )
	*/
	const EmbedContentMeta = "embed_content_meta";
	/**
	 * Prints scripts or data before the closing body tag in the embed template.
	 *
	 * @since 4.4.0
	 * @Reference wp-includes\theme-compat\footer-embed.php do_action( 'embed_footer' )
	*/
	const EmbedFooter = "embed_footer";
	/**
		 * Prints scripts or data in the embed template <head> tag.
		 *
		 * @since 4.4.0
		 * @Reference wp-includes\theme-compat\header-embed.php do_action( 'embed_head' )
	*/
	const EmbedHead = "embed_head";
	/**
			 * Fires after fetching the post thumbnail HTML.
			 *
			 * @since 2.9.0
			 *
			 * @param int          $post_id           The post ID.
			 * @param string       $post_thumbnail_id The post thumbnail ID.
			 * @param string|array $size              The post thumbnail size. Image size or array of width
			 *                                        and height values (in that order). Default 'post-thumbnail'.
			 * @Reference wp-includes\post-thumbnail-template.php do_action( 'end_fetch_post_thumbnail_html', $post->ID, $post_thumbnail_id, $size )
	*/
	const EndFetchPostThumbnailHtml = "end_fetch_post_thumbnail_html";
	/**
		 * Fires after enqueuing block assets for both editor and front-end.
		 *
		 * Call `add_action` on any hook before 'wp_enqueue_scripts'.
		 *
		 * In the function call you supply, simply use `wp_enqueue_script` and
		 * `wp_enqueue_style` to add your functionality to the Gutenberg editor.
		 *
		 * @since 5.0.0
		 * @Reference wp-includes\script-loader.php do_action( 'enqueue_block_assets' )
	*/
	const EnqueueBlockAssets = "enqueue_block_assets";
	/**
	 * Fires after block assets have been enqueued for the editing interface.
	 *
	 * Call `add_action` on any hook before 'admin_enqueue_scripts'.
	 *
	 * In the function call you supply, simply use `wp_enqueue_script` and
	 * `wp_enqueue_style` to add your functionality to the block editor.
	 *
	 * @since 5.0.0
	 * @Reference wp-admin\edit-form-blocks.php do_action( 'enqueue_block_editor_assets' )
	*/
	const EnqueueBlockEditorAssets = "enqueue_block_editor_assets";
	/**
		 * Fires when scripts and styles are enqueued for the embed iframe.
		 *
		 * @since 4.4.0
		 * @Reference wp-includes\embed.php do_action( 'enqueue_embed_scripts' )
	* @Reference wp-includes\embed.php do_action('enqueue_embed_scripts')
	*/
	const EnqueueEmbedScripts = "enqueue_embed_scripts";
	/**
	* @Reference wp-includes\plugin.php do_action( 'example_action', $arg1, $arg2 )
	*/
	const ExampleAction = "example_action";
	/**
	 * Fires at the end of the export filters form.
	 *
	 * @since 3.5.0
	 * @Reference wp-admin\export.php do_action( 'export_filters' )
	*/
	const ExportFilters = "export_filters";
	/**
		 * Fires at the beginning of an export, before any headers are sent.
		 *
		 * @since 2.3.0
		 *
		 * @param array $args An array of export arguments.
		 * @Reference wp-admin\includes\export.php do_action( 'export_wp', $args )
	*/
	const ExportWp = "export_wp";
	/**
			 * Fires when a recovery mode key is generated.
			 *
			 * @since 5.2.0
			 *
			 * @param string $token The recovery data token.
			 * @param string $key   The recovery mode key.
			 * @Reference wp-includes\class-wp-recovery-mode-key-service.php do_action( 'generate_recovery_mode_key', $token, $key )
	*/
	const GenerateRecoveryModeKey = "generate_recovery_mode_key";
	/**
			 * Fires after the rewrite rules are generated.
			 *
			 * @since 1.5.0
			 *
			 * @param WP_Rewrite $this Current WP_Rewrite instance (passed by reference).
			 * @Reference wp-includes\class-wp-rewrite.php do_action( 'generate_rewrite_rules', array( &$this ) )
	*/
	const GenerateRewriteRules = "generate_rewrite_rules";
	/**
		 * Fires before the footer template file is loaded.
		 *
		 * @since 2.1.0
		 * @since 2.8.0 $name parameter added.
		 *
		 * @param string|null $name Name of the specific footer file to use. null for the default footer.
		 * @Reference wp-includes\general-template.php do_action( 'get_footer', $name )
	*/
	const GetFooter = "get_footer";
	/**
		 * Fires before the header template file is loaded.
		 *
		 * @since 2.1.0
		 * @since 2.8.0 $name parameter added.
		 *
		 * @param string|null $name Name of the specific header file to use. null for the default header.
		 * @Reference wp-includes\general-template.php do_action( 'get_header', $name )
	*/
	const GetHeader = "get_header";
	/**
		 * Fires before the sidebar template file is loaded.
		 *
		 * @since 2.2.0
		 * @since 2.8.0 $name parameter added.
		 *
		 * @param string|null $name Name of the specific sidebar file to use. null for the default sidebar.
		 * @Reference wp-includes\general-template.php do_action( 'get_sidebar', $name )
	*/
	const GetSidebar = "get_sidebar";
	/**
		 * Fires before a template part is loaded.
		 *
		 * @since 5.2.0
		 *
		 * @param string   $slug      The slug name for the generic template.
		 * @param string   $name      The name of the specialized template.
		 * @param string[] $templates Array of template files to search for, in order.
		 * @Reference wp-includes\general-template.php do_action( 'get_template_part', $slug, $name, $templates )
	*/
	const GetTemplatePart = "get_template_part";
	/**
		 * Fires before the user is granted Super Admin privileges.
		 *
		 * @since 3.0.0
		 *
		 * @param int $user_id ID of the user that is about to be granted Super Admin privileges.
		 * @Reference wp-includes\capabilities.php do_action( 'grant_super_admin', $user_id )
	*/
	const GrantSuperAdmin = "grant_super_admin";
	/**
			 * Fires after the user is granted Super Admin privileges.
			 *
			 * @since 3.0.0
			 *
			 * @param int $user_id ID of the user that was granted Super Admin privileges.
			 * @Reference wp-includes\capabilities.php do_action( 'granted_super_admin', $user_id )
	*/
	const GrantedSuperAdmin = "granted_super_admin";
	/**
		 * Fires when Heartbeat ticks in no-privilege environments.
		 *
		 * Allows the transport to be easily replaced with long-polling.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $response  The no-priv Heartbeat response.
		 * @param string $screen_id The screen id.
		 * @Reference wp-admin\includes\ajax-actions.php do_action( 'heartbeat_nopriv_tick', $response, $screen_id )
	*/
	const HeartbeatNoprivTick = "heartbeat_nopriv_tick";
	/**
		 * Fires when Heartbeat ticks in logged-in environments.
		 *
		 * Allows the transport to be easily replaced with long-polling.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $response  The Heartbeat response.
		 * @param string $screen_id The screen id.
		 * @Reference wp-admin\includes\ajax-actions.php do_action( 'heartbeat_tick', $response, $screen_id )
	*/
	const HeartbeatTick = "heartbeat_tick";
	/**
			 * Fires before the cURL request is executed.
			 *
			 * Cookies are not currently handled by the HTTP API. This action allows
			 * plugins to handle cookies themselves.
			 *
			 * @since 2.8.0
			 *
			 * @param resource $handle  The cURL handle returned by curl_init() (passed by reference).
			 * @param array    $parsed_args       The HTTP request arguments.
			 * @param string   $url     The request URL.
			 * @Reference wp-includes\class-wp-http-curl.php do_action( 'http_api_curl', array( &$handle, $parsed_args, $url ) )
	* @Reference wp-includes\class-wp-http-requests-hooks.php do_action( 'http_api_curl', array( &$parameters[0], $this->request, $this->url ) )
	*/
	const HttpApiCurl = "http_api_curl";
	/**
			 * Fires after an HTTP API response is received and before the response is returned.
			 *
			 * @since 2.8.0
			 *
			 * @param array|WP_Error $response    HTTP response or WP_Error object.
			 * @param string         $context     Context under which the hook is fired.
			 * @param string         $class       HTTP transport used.
			 * @param array          $parsed_args HTTP request arguments.
			 * @param string         $url         The request URL.
			 * @Reference wp-includes\class-http.php do_action( 'http_api_debug', $response, 'response', 'Requests', $parsed_args, $url )
	* @Reference wp-includes\class-http.php do_action( 'http_api_debug', $response, 'response', $class, $args, $url )
	* @Reference wp-includes\class-http.php do_action( 'http_api_debug', $response, 'response', 'Requests', $parsed_args, $url )
	* @Reference wp-includes\class-http.php do_action( 'http_api_debug', $response, 'response', 'Requests', $parsed_args, $url )
	* @Reference wp-includes\class-http.php do_action( 'http_api_debug', $response, 'response', 'Requests', $parsed_args, $url )
	*/
	const HttpApiDebug = "http_api_debug";
	/**
		 * Fires after the opening tag for the admin footer.
		 *
		 * @since 2.5.0
		 * @Reference wp-admin\admin-footer.php do_action( 'in_admin_footer' )
	*/
	const InAdminFooter = "in_admin_footer";
	/**
	 * Fires at the beginning of the content section in an admin page.
	 *
	 * @since 3.0.0
	 * @Reference wp-admin\admin-header.php do_action( 'in_admin_header' )
	*/
	const InAdminHeader = "in_admin_header";
	/**
				 * Fires at the end of the widget control form.
				 *
				 * Use this hook to add extra fields to the widget form. The hook
				 * is only fired if the value passed to the 'widget_form_callback'
				 * hook is not false.
				 *
				 * Note: If the widget has no form, the text echoed from the default
				 * form method can be hidden using CSS.
				 *
				 * @since 2.8.0
				 *
				 * @param WP_Widget $this     The widget instance (passed by reference).
				 * @param null      $return   Return null if new fields are added.
				 * @param array     $instance An array of the widget's settings.
				 * @Reference wp-includes\class-wp-widget.php do_action( 'in_widget_form', array( &$this, &$return, $instance ) )
	*/
	const InWidgetForm = "in_widget_form";
	/**
	 * Fires after WordPress has finished loading but before any headers are sent.
	 *
	 * Most of WP is loaded at this stage, and the user is authenticated. WP continues
	 * to load on the {@see 'init'} hook that follows (e.g. widgets), and many plugins instantiate
	 * themselves on it for all sorts of reasons (e.g. they need a user, a taxonomy, etc.).
	 *
	 * If you wish to plug an action once WP is loaded, use the {@see 'wp_loaded'} hook below.
	 *
	 * @since 1.5.0
	 * @Reference wp-settings.php do_action( 'init' )
	*/
	const Init = "init";
	/** This action is documented in wp-admin/plugin-install.php * @Reference wp-admin\plugin-install.php do_action( 'install_plugins_pre_upload' )
	*/
	const InstallPluginsPreUpload = "install_plugins_pre_upload";
	/**
						 * Fires before the Plugin Install table header pagination is displayed.
						 *
						 * @since 2.7.0
						 * @Reference wp-admin\includes\class-wp-plugin-install-list-table.php do_action( 'install_plugins_table_header' )
	*/
	const InstallPluginsTableHeader = "install_plugins_table_header";
	/** This action is documented in wp-admin/plugin-install.php * @Reference wp-admin\plugin-install.php do_action( 'install_plugins_upload' )
	*/
	const InstallPluginsUpload = "install_plugins_upload";
	/**
					 * Fires in the Install Themes list table header.
					 *
					 * @since 2.8.0
					 * @Reference wp-admin\includes\class-wp-theme-install-list-table.php do_action( 'install_themes_table_header' )
	*/
	const InstallThemesTableHeader = "install_themes_table_header";
	/**
				 * Fires immediately after a user is invited to join a site, but before the notification is sent.
				 *
				 * @since 4.4.0
				 *
				 * @param int    $user_id     The invited user's ID.
				 * @param array  $role        The role of invited user.
				 * @param string $newuser_key The key of the invitation.
				 * @Reference wp-admin\user-new.php do_action( 'invite_user', $user_id, $role, $newuser_key )
	*/
	const InviteUser = "invite_user";
	/**
	 * Fires before MagpieRSS is loaded, to optionally replace it.
	 *
	 * @since 2.3.0
	 * @deprecated 3.0.0
	 * @Reference wp-includes\rss.php do_action( 'load_feed_engine' )
	*/
	const LoadFeedEngine = "load_feed_engine";
	/**
		 * Fires before the MO translation file is loaded.
		 *
		 * @since 2.9.0
		 *
		 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
		 * @param string $mofile Path to the .mo file.
		 * @Reference wp-includes\l10n.php do_action( 'load_textdomain', $domain, $mofile )
	*/
	const LoadTextdomain = "load_textdomain";
	/**
	* @Reference wp-admin\admin.php do_action( 'load-categories.php' )
	*/
	const LoadCategoriesPhp = "load-categories.php";
	/**
	* @Reference wp-admin\admin.php do_action( 'load-edit-link-categories.php' )
	*/
	const LoadEditLinkCategoriesPhp = "load-edit-link-categories.php";
	/**
	* @Reference wp-admin\admin.php do_action( 'load-edit-tags.php' )
	*/
	const LoadEditTagsPhp = "load-edit-tags.php";
	/**
	* @Reference wp-admin\admin.php do_action( 'load-page.php' )
	*/
	const LoadPagePhp = "load-page.php";
	/**
	* @Reference wp-admin\admin.php do_action( 'load-page-new.php' )
	*/
	const LoadPageNewPhp = "load-page-new.php";
	/**
		 * Fires early when editing the widgets displayed in sidebars.
		 *
		 * @since 2.8.0
		 * @Reference wp-admin\includes\ajax-actions.php do_action( 'load-widgets.php' )
	* @Reference wp-admin\includes\ajax-actions.php do_action( 'load-widgets.php' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'load-widgets.php' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'load-widgets.php' )
	*/
	const LoadWidgetsPhp = "load-widgets.php";
	/**
		 * Enqueue scripts and styles for the login page.
		 *
		 * @since 3.1.0
		 * @Reference wp-login.php do_action( 'login_enqueue_scripts' )
	*/
	const LoginEnqueueScripts = "login_enqueue_scripts";
	/**
		 * Fires in the login page footer.
		 *
		 * @since 3.1.0
		 * @Reference wp-login.php do_action( 'login_footer' )
	* @Reference wp-login.php do_action( 'login_footer' )
	*/
	const LoginFooter = "login_footer";
	/**
				 * Fires following the 'Password' field in the login form.
				 *
				 * @since 2.1.0
				 * @Reference wp-login.php do_action( 'login_form' )
	*/
	const LoginForm = "login_form";
	/**
		 * Fires in the login page header after scripts are enqueued.
		 *
		 * @since 2.1.0
		 * @Reference wp-login.php do_action( 'login_head' )
	*/
	const LoginHead = "login_head";
	/**
		 * Fires in the login page header after the body tag is opened.
		 *
		 * @since 4.6.0
		 * @Reference wp-login.php do_action( 'login_header' )
	*/
	const LoginHeader = "login_header";
	/**
	 * Fires when the login form is initialized.
	 *
	 * @since 3.2.0
	 * @Reference wp-login.php do_action( 'login_init' )
	*/
	const LoginInit = "login_init";
	/**
				 * Fires once the loop has ended.
				 *
				 * @since 2.0.0
				 *
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php do_action( 'loop_end', array( &$this ) )
	*/
	const LoopEnd = "loop_end";
	/**
				 * Fires if no results are found in a post query.
				 *
				 * @since 4.9.0
				 *
				 * @param WP_Query $this The WP_Query instance.
				 * @Reference wp-includes\class-wp-query.php do_action( 'loop_no_results', $this )
	*/
	const LoopNoResults = "loop_no_results";
	/**
				 * Fires once the loop is started.
				 *
				 * @since 2.0.0
				 *
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php do_action( 'loop_start', array( &$this ) )
	*/
	const LoopStart = "loop_start";
	/**
			 * Fires before the lost password form.
			 *
			 * @since 1.5.1
			 * @since 5.1.0 Added the `$errors` parameter.
			 *
			 * @param WP_Error $errors A `WP_Error` object containing any errors generated by using invalid
			 *                         credentials. Note that the error object may not contain any errors.
			 * @Reference wp-login.php do_action( 'lost_password', $errors )
	*/
	const LostPassword = "lost_password";
	/**
				 * Fires inside the lostpassword form tags, before the hidden fields.
				 *
				 * @since 2.1.0
				 * @Reference wp-login.php do_action( 'lostpassword_form' )
	*/
	const LostpasswordForm = "lostpassword_form";
	/**
		 * Fires before errors are returned from a password reset request.
		 *
		 * @since 2.1.0
		 * @since 4.4.0 Added the `$errors` parameter.
		 *
		 * @param WP_Error $errors A WP_Error object containing any errors generated
		 *                         by using invalid credentials.
		 * @Reference wp-login.php do_action( 'lostpassword_post', $errors )
	*/
	const LostpasswordPost = "lostpassword_post";
	/**
				 * Fires when the 'deleted' status is added to a site.
				 *
				 * @since 3.5.0
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'make_delete_blog', $site_id )
	*/
	const MakeDeleteBlog = "make_delete_blog";
	/**
				 * Fires when the 'spam' status is removed from a site.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'make_ham_blog', $site_id )
	*/
	const MakeHamBlog = "make_ham_blog";
	/**
					 * Fires after the user is marked as a HAM user. Opposite of SPAM.
					 *
					 * @since 3.0.0
					 *
					 * @param int $user_id ID of the user marked as HAM.
					 * @Reference wp-includes\user.php do_action( 'make_ham_user', $user_id )
	* @Reference wp-includes\ms-deprecated.php do_action( 'make_ham_user', $id )
	*/
	const MakeHamUser = "make_ham_user";
	/**
				 * Fires when the 'spam' status is added to a site.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'make_spam_blog', $site_id )
	*/
	const MakeSpamBlog = "make_spam_blog";
	/**
					 * Fires after the user is marked as a SPAM user.
					 *
					 * @since 3.0.0
					 *
					 * @param int $user_id ID of the user marked as SPAM.
					 * @Reference wp-includes\user.php do_action( 'make_spam_user', $user_id )
	* @Reference wp-includes\ms-deprecated.php do_action( 'make_spam_user', $id )
	*/
	const MakeSpamUser = "make_spam_user";
	/**
				 * Fires when the 'deleted' status is removed from a site.
				 *
				 * @since 3.5.0
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'make_undelete_blog', $site_id )
	*/
	const MakeUndeleteBlog = "make_undelete_blog";
	/**
			 * Fires when the default column output is displayed for a single row.
			 *
			 * @since 2.8.0
			 *
			 * @param string $column_name         The custom column's name.
			 * @param int    $comment->comment_ID The custom column's unique ID number.
			 * @Reference wp-admin\includes\class-wp-comments-list-table.php do_action( 'manage_comments_custom_column', $column_name, $comment->comment_ID )
	*/
	const ManageCommentsCustomColumn = "manage_comments_custom_column";
	/**
			 * Fires after the Filter submit button for comment types.
			 *
			 * @since 2.5.0
			 *
			 * @param string $comment_status The comment status name. Default 'All'.
			 * @Reference wp-admin\includes\class-wp-comments-list-table.php do_action( 'manage_comments_nav', $comment_status )
	*/
	const ManageCommentsNav = "manage_comments_nav";
	/**
			 * Fires for each registered custom link column.
			 *
			 * @since 2.1.0
			 *
			 * @param string $column_name Name of the custom column.
			 * @param int    $link_id     Link ID.
			 * @Reference wp-admin\includes\class-wp-links-list-table.php do_action( 'manage_link_custom_column', $column_name, $link->link_id )
	*/
	const ManageLinkCustomColumn = "manage_link_custom_column";
	/**
			 * Fires for each custom column in the Media list table.
			 *
			 * Custom columns are registered using the {@see 'manage_media_columns'} filter.
			 *
			 * @since 2.5.0
			 *
			 * @param string $column_name Name of the custom column.
			 * @param int    $post_id     Attachment ID.
			 * @Reference wp-admin\includes\class-wp-media-list-table.php do_action( 'manage_media_custom_column', $column_name, $post->ID )
	*/
	const ManageMediaCustomColumn = "manage_media_custom_column";
	/**
				 * Fires in each custom column on the Posts list table.
				 *
				 * This hook only fires if the current post type is hierarchical,
				 * such as pages.
				 *
				 * @since 2.5.0
				 *
				 * @param string $column_name The name of the column to display.
				 * @param int    $post_id     The current post ID.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php do_action( 'manage_pages_custom_column', $column_name, $post->ID )
	*/
	const ManagePagesCustomColumn = "manage_pages_custom_column";
	/**
						 * Fires inside each custom column of the Plugins list table.
						 *
						 * @since 3.1.0
						 *
						 * @param string $column_name Name of the column.
						 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
						 * @param array  $plugin_data An array of plugin data.
						 * @Reference wp-admin\includes\class-wp-plugins-list-table.php do_action( 'manage_plugins_custom_column', $column_name, $plugin_file, $plugin_data )
	*/
	const ManagePluginsCustomColumn = "manage_plugins_custom_column";
	/**
				 * Fires in each custom column in the Posts list table.
				 *
				 * This hook only fires if the current post type is non-hierarchical,
				 * such as posts.
				 *
				 * @since 1.5.0
				 *
				 * @param string $column_name The name of the column to display.
				 * @param int    $post_id     The current post ID.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php do_action( 'manage_posts_custom_column', $column_name, $post->ID )
	*/
	const ManagePostsCustomColumn = "manage_posts_custom_column";
	/**
			 * Fires immediately following the closing "actions" div in the tablenav for the posts
			 * list table.
			 *
			 * @since 4.4.0
			 *
			 * @param string $which The location of the extra table nav markup: 'top' or 'bottom'.
			 * @Reference wp-admin\includes\class-wp-posts-list-table.php do_action( 'manage_posts_extra_tablenav', $which )
	*/
	const ManagePostsExtraTablenav = "manage_posts_extra_tablenav";
	/**
			 * Fires for each registered custom column in the Sites list table.
			 *
			 * @since 3.1.0
			 *
			 * @param string $column_name The name of the column to display.
			 * @param int    $blog_id     The site ID.
			 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php do_action( 'manage_sites_custom_column', $column_name, $blog['blog_id'] )
	*/
	const ManageSitesCustomColumn = "manage_sites_custom_column";
	/**
			 * Fires immediately following the closing "actions" div in the tablenav for the
			 * MS sites list table.
			 *
			 * @since 5.3.0
			 *
			 * @param string $which The location of the extra table nav markup: 'top' or 'bottom'.
			 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php do_action( 'manage_sites_extra_tablenav', $which )
	*/
	const ManageSitesExtraTablenav = "manage_sites_extra_tablenav";
	/**
			 * Fires inside each custom column of the Multisite themes list table.
			 *
			 * @since 3.1.0
			 *
			 * @param string   $column_name Name of the column.
			 * @param string   $stylesheet  Directory name of the theme.
			 * @param WP_Theme $theme       Current WP_Theme object.
			 * @Reference wp-admin\includes\class-wp-ms-themes-list-table.php do_action( 'manage_themes_custom_column', $column_name, $stylesheet, $theme )
	*/
	const ManageThemesCustomColumn = "manage_themes_custom_column";
	/**
			 * Fires immediately following the closing "actions" div in the tablenav for the users
			 * list table.
			 *
			 * @since 4.9.0
			 *
			 * @param string $which The location of the extra table nav markup: 'top' or 'bottom'.
			 * @Reference wp-admin\includes\class-wp-users-list-table.php do_action( 'manage_users_extra_tablenav', $which )
	*/
	const ManageUsersExtraTablenav = "manage_users_extra_tablenav";
	/**
				 * Fires when the 'mature' status is added to a site.
				 *
				 * @since 3.1.0
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'mature_blog', $site_id )
	*/
	const MatureBlog = "mature_blog";
	/**
					 * Fires after the default media button(s) are displayed.
					 *
					 * @since 2.5.0
					 *
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php do_action( 'media_buttons', $editor_id )
	*/
	const MediaButtons = "media_buttons";
	/**
			 * Fires after objects are added to the metadata lazy-load queue.
			 *
			 * @since 4.5.0
			 *
			 * @param array                  $object_ids  Array of object IDs.
			 * @param string                 $object_type Type of object being queued.
			 * @param WP_Metadata_Lazyloader $lazyloader  The lazy-loader object.
			 * @Reference wp-includes\class-wp-metadata-lazyloader.php do_action( 'metadata_lazyloader_queued_objects', $object_ids, $object_type, $this )
	*/
	const MetadataLazyloaderQueuedObjects = "metadata_lazyloader_queued_objects";
	/**
	 * Fires after the current site and network have been detected and loaded
	 * in multisite's bootstrap.
	 *
	 * @since 4.6.0
	 * @Reference wp-includes\ms-settings.php do_action( 'ms_loaded' )
	*/
	const MsLoaded = "ms_loaded";
	/**
				 * Fires when a network cannot be found based on the requested domain and path.
				 *
				 * At the time of this action, the only recourse is to redirect somewhere
				 * and exit. If you want to declare a particular network, do so earlier.
				 *
				 * @since 4.4.0
				 *
				 * @param string $domain       The domain used to search for a network.
				 * @param string $path         The path used to search for a path.
				 * @Reference wp-includes\ms-load.php do_action( 'ms_network_not_found', $domain, $path )
	* @Reference wp-includes\ms-load.php do_action( 'ms_network_not_found', $domain, $path )
	*/
	const MsNetworkNotFound = "ms_network_not_found";
	/**
			 * Fires when a network can be determined but a site cannot.
			 *
			 * At the time of this action, the only recourse is to redirect somewhere
			 * and exit. If you want to declare a particular site, do so earlier.
			 *
			 * @since 3.9.0
			 *
			 * @param object $current_site The network that had been determined.
			 * @param string $domain       The domain used to search for a site.
			 * @param string $path         The path used to search for a site.
			 * @Reference wp-includes\ms-load.php do_action( 'ms_site_not_found', $current_site, $domain, $path )
	*/
	const MsSiteNotFound = "ms_site_not_found";
	/**
		 * Fires at the end of the 'Right Now' widget in the Network Admin dashboard.
		 *
		 * @since MU (3.0.0)
		 * @Reference wp-admin\includes\dashboard.php do_action( 'mu_activity_box_end' )
	*/
	const MuActivityBoxEnd = "mu_activity_box_end";
	/**
		 * Fires once a single must-use plugin has loaded.
		 *
		 * @since 5.1.0
		 *
		 * @param string $mu_plugin Full path to the plugin's main file.
		 * @Reference wp-settings.php do_action( 'mu_plugin_loaded', $mu_plugin )
	*/
	const MuPluginLoaded = "mu_plugin_loaded";
	/**
		 * Fires at the end of the 'Right Now' widget in the Network Admin dashboard.
		 *
		 * @since MU (3.0.0)
		 * @Reference wp-admin\includes\dashboard.php do_action( 'mu_rightnow_end' )
	*/
	const MuRightnowEnd = "mu_rightnow_end";
	/**
	 * Fires once all must-use and network-activated plugins have loaded.
	 *
	 * @since 2.8.0
	 * @Reference wp-settings.php do_action( 'muplugins_loaded' )
	*/
	const MupluginsLoaded = "muplugins_loaded";
	/**
		 * Fires before the sites list on the My Sites screen.
		 *
		 * @since 3.0.0
		 * @Reference wp-admin\my-sites.php do_action( 'myblogs_allblogs_options' )
	*/
	const MyblogsAllblogsOptions = "myblogs_allblogs_options";
	/**
		 * Fires before the administration menu loads in the Network Admin.
		 *
		 * @since 3.1.0
		 *
		 * @param string $context Empty context.
		 * @Reference wp-admin\includes\menu.php do_action( 'network_admin_menu', '' )
	*/
	const NetworkAdminMenu = "network_admin_menu";
	/**
		 * Prints network admin screen notices.
		 *
		 * @since 3.1.0
		 * @Reference wp-admin\admin-header.php do_action( 'network_admin_notices' )
	*/
	const NetworkAdminNotices = "network_admin_notices";
	/**
			 * Fires once a single network-activated plugin has loaded.
			 *
			 * @since 5.1.0
			 *
			 * @param string $network_plugin Full path to the plugin's main file.
			 * @Reference wp-settings.php do_action( 'network_plugin_loaded', $network_plugin )
	*/
	const NetworkPluginLoaded = "network_plugin_loaded";
	/**
			 * Fires after a new user has been created via the network site-new.php page.
			 *
			 * @since 4.4.0
			 *
			 * @param int $user_id ID of the newly created user.
			 * @Reference wp-admin\network\site-new.php do_action( 'network_site_new_created_user', $user_id )
	*/
	const NetworkSiteNewCreatedUser = "network_site_new_created_user";
	/**
		 * Fires at the end of the new site form in network admin.
		 *
		 * @since 4.5.0
		 * @Reference wp-admin\network\site-new.php do_action( 'network_site_new_form' )
	*/
	const NetworkSiteNewForm = "network_site_new_form";
	/**
	 * Fires after the list table on the Users screen in the Multisite Network Admin.
	 *
	 * @since 3.1.0
	 * @Reference wp-admin\network\site-users.php do_action( 'network_site_users_after_list_table' )
	*/
	const NetworkSiteUsersAfterListTable = "network_site_users_after_list_table";
	/**
							 * Fires after a user has been created via the network site-users.php page.
							 *
							 * @since 4.4.0
							 *
							 * @param int $user_id ID of the newly created user.
							 * @Reference wp-admin\network\site-users.php do_action( 'network_site_users_created_user', $user_id )
	*/
	const NetworkSiteUsersCreatedUser = "network_site_users_created_user";
	/**
				 * Fires after a new user has been created via the network user-new.php page.
				 *
				 * @since 4.4.0
				 *
				 * @param int $user_id ID of the newly created user.
				 * @Reference wp-admin\network\user-new.php do_action( 'network_user_new_created_user', $user_id )
	*/
	const NetworkUserNewCreatedUser = "network_user_new_created_user";
	/**
		 * Fires at the end of the new user form in network admin.
		 *
		 * @since 4.5.0
		 * @Reference wp-admin\network\user-new.php do_action( 'network_user_new_form' )
	*/
	const NetworkUserNewForm = "network_user_new_form";
	/**
			 * Fires in the OPML header.
			 *
			 * @since 3.0.0
			 * @Reference wp-links-opml.php do_action( 'opml_head' )
	*/
	const OpmlHead = "opml_head";
	/**
			 * Fires immediately after the label inside the 'Template' section
			 * of the 'Page Attributes' meta box.
			 *
			 * @since 4.4.0
			 *
			 * @param string  $template The template used for the current post.
			 * @param WP_Post $post     The current post.
			 * @Reference wp-admin\includes\meta-boxes.php do_action( 'page_attributes_meta_box_template', $template, $post )
	*/
	const PageAttributesMetaBoxTemplate = "page_attributes_meta_box_template";
	/**
			 * Fires before the help hint text in the 'Page Attributes' meta box.
			 *
			 * @since 4.9.0
			 *
			 * @param WP_Post $post The current post.
			 * @Reference wp-admin\includes\meta-boxes.php do_action( 'page_attributes_misc_attributes', $post )
	*/
	const PageAttributesMiscAttributes = "page_attributes_misc_attributes";
	/**
			 * Fires after the comment query vars have been parsed.
			 *
			 * @since 4.2.0
			 *
			 * @param WP_Comment_Query $this The WP_Comment_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-comment-query.php do_action( 'parse_comment_query', array( &$this ) )
	*/
	const ParseCommentQuery = "parse_comment_query";
	/**
			 * Fires after the network query vars have been parsed.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Network_Query $this The WP_Network_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-network-query.php do_action( 'parse_network_query', array( &$this ) )
	*/
	const ParseNetworkQuery = "parse_network_query";
	/**
			 * Fires after the main query vars have been parsed.
			 *
			 * @since 1.5.0
			 *
			 * @param WP_Query $this The WP_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-query.php do_action( 'parse_query', array( &$this ) )
	*/
	const ParseQuery = "parse_query";
	/**
			 * Fires once all query variables for the current request have been parsed.
			 *
			 * @since 2.1.0
			 *
			 * @param WP $this Current WordPress environment instance (passed by reference).
			 * @Reference wp-includes\class-wp.php do_action( 'parse_request', array( &$this ) )
	*/
	const ParseRequest = "parse_request";
	/**
			 * Fires after the site query vars have been parsed.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Site_Query $this The WP_Site_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-site-query.php do_action( 'parse_site_query', array( &$this ) )
	*/
	const ParseSiteQuery = "parse_site_query";
	/**
			 * Fires after taxonomy-related query vars have been parsed.
			 *
			 * @since 3.7.0
			 *
			 * @param WP_Query $this The WP_Query instance.
			 * @Reference wp-includes\class-wp-query.php do_action( 'parse_tax_query', $this )
	*/
	const ParseTaxQuery = "parse_tax_query";
	/**
			 * Fires after term query vars have been parsed.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Term_Query $this Current instance of WP_Term_Query.
			 * @Reference wp-includes\class-wp-term-query.php do_action( 'parse_term_query', $this )
	*/
	const ParseTermQuery = "parse_term_query";
	/**
		 * Fires before the user's password is reset.
		 *
		 * @since 1.5.0
		 *
		 * @param object $user     The user.
		 * @param string $new_pass New user password.
		 * @Reference wp-includes\user.php do_action( 'password_reset', $user, $new_pass )
	*/
	const PasswordReset = "password_reset";
	/**
				 * Fires after the permalink structure is updated.
				 *
				 * @since 2.8.0
				 *
				 * @param string $old_permalink_structure The previous permalink structure.
				 * @param string $permalink_structure     The new permalink structure.
				 * @Reference wp-includes\class-wp-rewrite.php do_action( 'permalink_structure_changed', $old_permalink_structure, $permalink_structure )
	*/
	const PermalinkStructureChanged = "permalink_structure_changed";
	/**
			 * Fires at the end of the 'Personal Options' settings table on the user editing screen.
			 *
			 * @since 2.7.0
			 *
			 * @param WP_User $profileuser The current WP_User object.
			 * @Reference wp-admin\user-edit.php do_action( 'personal_options', $profileuser )
	*/
	const PersonalOptions = "personal_options";
	/**
				 * Fires before the page loads on the 'Your Profile' editing screen.
				 *
				 * The action only fires if the current user is editing their own profile.
				 *
				 * @since 2.0.0
				 *
				 * @param int $user_id The user ID.
				 * @Reference wp-admin\user-edit.php do_action( 'personal_options_update', $user_id )
	*/
	const PersonalOptionsUpdate = "personal_options_update";
	/**
			 * Fires after PHPMailer is initialized.
			 *
			 * @since 2.2.0
			 *
			 * @param PHPMailer $phpmailer The PHPMailer instance (passed by reference).
			 * @Reference wp-includes\pluggable.php do_action( 'phpmailer_init', array( &$phpmailer ) )
	*/
	const PhpmailerInit = "phpmailer_init";
	/**
			 * Fires after a post pingback has been sent.
			 *
			 * @since 0.71
			 *
			 * @param int $comment_ID Comment ID.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'pingback_post', $comment_ID )
	*/
	const PingbackPost = "pingback_post";
	/**
		 * Fires once a single activated plugin has loaded.
		 *
		 * @since 5.1.0
		 *
		 * @param string $plugin Full path to the plugin's main file.
		 * @Reference wp-settings.php do_action( 'plugin_loaded', $plugin )
	*/
	const PluginLoaded = "plugin_loaded";
	/**
	 * Fires once activated plugins have loaded.
	 *
	 * Pluggable functions are also available at this point in the loading order.
	 *
	 * @since 1.5.0
	 * @Reference wp-settings.php do_action( 'plugins_loaded' )
	*/
	const PluginsLoaded = "plugins_loaded";
	/**
		 * Fires before creating WordPress options and populating their default values.
		 *
		 * @since 2.6.0
		 * @Reference wp-admin\includes\schema.php do_action( 'populate_options' )
	*/
	const PopulateOptions = "populate_options";
	/**
		 * Fires at the end of the Discussion meta box on the post editing screen.
		 *
		 * @since 3.1.0
		 *
		 * @param WP_Post $post WP_Post object of the current post.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'post_comment_status_meta_box-options', $post )
	*/
	const PostCommentStatusMetaBoxOptions = "post_comment_status_meta_box-options";
	/**
	 * Fires inside the post editor form tag.
	 *
	 * @since 3.0.0
	 *
	 * @param WP_Post $post Post object.
	 * @Reference wp-admin\edit-form-advanced.php do_action( 'post_edit_form_tag', $post )
	*/
	const PostEditFormTag = "post_edit_form_tag";
	/**
				 * Fires inside the dialog displayed when a user has lost the post lock.
				 *
				 * @since 3.6.0
				 *
				 * @param WP_Post $post Post object.
				 * @Reference wp-admin\includes\post.php do_action( 'post_lock_lost_dialog', $post )
	*/
	const PostLockLostDialog = "post_lock_lost_dialog";
	/**
			 * Fires inside the post locked dialog before the buttons are displayed.
			 *
			 * @since 3.6.0
			 *
			 * @param WP_Post $post Post object.
			 * @Reference wp-admin\includes\post.php do_action( 'post_locked_dialog', $post )
	*/
	const PostLockedDialog = "post_locked_dialog";
	/**
			 * Fires once a post has been added to the sticky list.
			 *
			 * @since 4.6.0
			 *
			 * @param int $post_id ID of the post that was stuck.
			 * @Reference wp-includes\post.php do_action( 'post_stuck', $post_id )
	*/
	const PostStuck = "post_stuck";
	/**
		 * Fires before the post time/date setting in the Publish meta box.
		 *
		 * @since 4.4.0
		 *
		 * @param WP_Post $post WP_Post object for the current post.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'post_submitbox_minor_actions', $post )
	*/
	const PostSubmitboxMinorActions = "post_submitbox_minor_actions";
	/**
		 * Fires after the post time/date setting in the Publish meta box.
		 *
		 * @since 2.9.0
		 * @since 4.4.0 Added the `$post` parameter.
		 *
		 * @param WP_Post $post WP_Post object for the current post.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'post_submitbox_misc_actions', $post )
	*/
	const PostSubmitboxMiscActions = "post_submitbox_misc_actions";
	/**
		 * Fires at the beginning of the publishing actions section of the Publish meta box.
		 *
		 * @since 2.7.0
		 * @since 4.9.0 Added the `$post` parameter.
		 *
		 * @param WP_Post|null $post WP_Post object for the current post on Edit Post screen,
		 *                           null on Edit Link screen.
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'post_submitbox_start', $post )
	* @Reference wp-admin\includes\meta-boxes.php do_action( 'post_submitbox_start', null )
	*/
	const PostSubmitboxStart = "post_submitbox_start";
	/**
			 * Fires once a post has been removed from the sticky list.
			 *
			 * @since 4.6.0
			 *
			 * @param int $post_id ID of the post that was unstuck.
			 * @Reference wp-includes\post.php do_action( 'post_unstuck', $post_id )
	*/
	const PostUnstuck = "post_unstuck";
	/**
			 * Fires once an existing post has been updated.
			 *
			 * @since 3.0.0
			 *
			 * @param int     $post_ID      Post ID.
			 * @param WP_Post $post_after   Post object following the update.
			 * @param WP_Post $post_before  Post object before the update.
			 * @Reference wp-includes\post.php do_action( 'post_updated', $post_ID, $post_after, $post_before )
	*/
	const PostUpdated = "post_updated";
	/**
		 * Fires after the upload button in the media upload interface.
		 *
		 * @since 2.6.0
		 * @Reference wp-admin\includes\media.php do_action( 'post-html-upload-ui' )
	*/
	const PostHtmlUploadUi = "post-html-upload-ui";
	/**
		 * Fires after the upload interface loads.
		 *
		 * @since 2.6.0 As 'post-flash-upload-ui'
		 * @since 3.3.0
		 * @Reference wp-admin\includes\media.php do_action( 'post-plupload-upload-ui' )
	* @Reference wp-includes\media-template.php do_action( 'post-plupload-upload-ui' )
	* @Reference wp-includes\media-template.php do_action( 'post-plupload-upload-ui' )
	*/
	const PostPluploadUploadUi = "post-plupload-upload-ui";
	/**
			 * Fires to announce the query's current selection parameters.
			 *
			 * For use by caching plugins.
			 *
			 * @since 2.3.0
			 *
			 * @param string $selection The assembled selection query.
			 * @Reference wp-includes\class-wp-query.php do_action( 'posts_selection', $where . $groupby . $orderby . $limits . $join )
	*/
	const PostsSelection = "posts_selection";
	/**
		 * Fires on the post upload UI screen.
		 *
		 * Legacy (pre-3.5.0) media workflow hook.
		 *
		 * @since 2.6.0
		 * @Reference wp-admin\includes\media.php do_action( 'post-upload-ui' )
	* @Reference wp-includes\media-template.php do_action( 'post-upload-ui' )
	*/
	const PostUploadUi = "post-upload-ui";
	/**
			 * Fires immediately prior to an auto-update.
			 *
			 * @since 4.4.0
			 *
			 * @param string $type    The type of update being checked: 'core', 'theme', 'plugin', or 'translation'.
			 * @param object $item    The update offer.
			 * @param string $context The filesystem context (a path) against which filesystem access and status
			 *                        should be checked.
			 * @Reference wp-admin\includes\class-wp-automatic-updater.php do_action( 'pre_auto_update', $type, $item, $context )
	*/
	const PreAutoUpdate = "pre_auto_update";
	/**
			 * Fires before a comment is posted.
			 *
			 * @since 2.8.0
			 *
			 * @param int $comment_post_ID Post ID.
			 * @Reference wp-includes\comment.php do_action( 'pre_comment_on_post', $comment_post_ID )
	*/
	const PreCommentOnPost = "pre_comment_on_post";
	/**
	 * Fires before the plugins list table is rendered.
	 *
	 * This hook also fires before the plugins list table is rendered in the Network Admin.
	 *
	 * Please note: The 'active' portion of the hook name does not refer to whether the current
	 * view is for active plugins, but rather all plugins actively-installed.
	 *
	 * @since 3.0.0
	 *
	 * @param array[] $plugins_all An array of arrays containing information on all installed plugins.
	 * @Reference wp-admin\plugins.php do_action( 'pre_current_active_plugins', $plugins['all'] )
	*/
	const PreCurrentActivePlugins = "pre_current_active_plugins";
	/**
		 * Fires when deleting a term, before any modifications are made to posts or terms.
		 *
		 * @since 4.1.0
		 *
		 * @param int    $term     Term ID.
		 * @param string $taxonomy Taxonomy Name.
		 * @Reference wp-includes\taxonomy.php do_action( 'pre_delete_term', $term, $taxonomy )
	*/
	const PreDeleteTerm = "pre_delete_term";
	/**
			 * Fires before comments are retrieved.
			 *
			 * @since 3.1.0
			 *
			 * @param WP_Comment_Query $this Current instance of WP_Comment_Query (passed by reference).
			 * @Reference wp-includes\class-wp-comment-query.php do_action( 'pre_get_comments', array( &$this ) )
	*/
	const PreGetComments = "pre_get_comments";
	/**
			 * Fires before networks are retrieved.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Network_Query $this Current instance of WP_Network_Query (passed by reference).
			 * @Reference wp-includes\class-wp-network-query.php do_action( 'pre_get_networks', array( &$this ) )
	*/
	const PreGetNetworks = "pre_get_networks";
	/**
			 * Fires after the query variable object is created, but before the actual query is run.
			 *
			 * Note: If using conditional tags, use the method versions within the passed instance
			 * (e.g. $this->is_main_query() instead of is_main_query()). This is because the functions
			 * like is_main_query() test against the global $wp_query instance, not the passed one.
			 *
			 * @since 2.0.0
			 *
			 * @param WP_Query $this The WP_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-query.php do_action( 'pre_get_posts', array( &$this ) )
	*/
	const PreGetPosts = "pre_get_posts";
	/**
		 * Fires before the search form is retrieved, at the start of get_search_form().
		 *
		 * @since 2.7.0 as 'get_search_form' action.
		 * @since 3.6.0
		 *
		 * @link https://core.trac.wordpress.org/ticket/19321
		 * @Reference wp-includes\general-template.php do_action( 'pre_get_search_form' )
	*/
	const PreGetSearchForm = "pre_get_search_form";
	/**
			 * Fires before sites are retrieved.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Site_Query $this Current instance of WP_Site_Query (passed by reference).
			 * @Reference wp-includes\class-wp-site-query.php do_action( 'pre_get_sites', array( &$this ) )
	*/
	const PreGetSites = "pre_get_sites";
	/**
			 * Fires before terms are retrieved.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Term_Query $this Current instance of WP_Term_Query.
			 * @Reference wp-includes\class-wp-term-query.php do_action( 'pre_get_terms', $this )
	*/
	const PreGetTerms = "pre_get_terms";
	/**
			 * Fires before the WP_User_Query has been parsed.
			 *
			 * The passed WP_User_Query object contains the query variables, not
			 * yet passed into SQL.
			 *
			 * @since 4.0.0
			 *
			 * @param WP_User_Query $this The current WP_User_Query instance,
			 *                            passed by reference.
			 * @Reference wp-includes\class-wp-user-query.php do_action( 'pre_get_users', $this )
	*/
	const PreGetUsers = "pre_get_users";
	/**
			 * Fires immediately before a new user is created via the network site-new.php page.
			 *
			 * @since 4.5.0
			 *
			 * @param string $email Email of the non-existent user.
			 * @Reference wp-admin\network\site-new.php do_action( 'pre_network_site_new_created_user', $email )
	*/
	const PreNetworkSiteNewCreatedUser = "pre_network_site_new_created_user";
	/**
		 * Fires just before pinging back links found in a post.
		 *
		 * @since 2.0.0
		 *
		 * @param string[] $post_links Array of link URLs to be checked (passed by reference).
		 * @param string[] $pung       Array of link URLs already pinged (passed by reference).
		 * @param int      $post_ID    The post ID.
		 * @Reference wp-includes\comment.php do_action( 'pre_ping', array( &$post_links, &$pung, $post->ID ) )
	*/
	const PrePing = "pre_ping";
	/**
			 * Fires immediately before an existing post is updated in the database.
			 *
			 * @since 2.5.0
			 *
			 * @param int   $post_ID Post ID.
			 * @param array $data    Array of unslashed post data.
			 * @Reference wp-includes\post.php do_action( 'pre_post_update', $post_ID, $data )
	*/
	const PrePostUpdate = "pre_post_update";
	/**
		 * Fires before the trackback is added to a post.
		 *
		 * @since 4.7.0
		 *
		 * @param int    $tb_id     Post ID related to the trackback.
		 * @param string $tb_url    Trackback URL.
		 * @param string $charset   Character Set.
		 * @param string $title     Trackback Title.
		 * @param string $excerpt   Trackback Excerpt.
		 * @param string $blog_name Blog Name.
		 * @Reference wp-trackback.php do_action( 'pre_trackback_post', $tb_id, $tb_url, $charset, $title, $excerpt, $blog_name )
	*/
	const PreTrackbackPost = "pre_trackback_post";
	/**
		 * Fires in uninstall_plugin() immediately before the plugin is uninstalled.
		 *
		 * @since 4.5.0
		 *
		 * @param string $plugin                Path to the plugin file relative to the plugins directory.
		 * @param array  $uninstallable_plugins Uninstallable plugins.
		 * @Reference wp-admin\includes\plugin.php do_action( 'pre_uninstall_plugin', $plugin, $uninstallable_plugins )
	*/
	const PreUninstallPlugin = "pre_uninstall_plugin";
	/**
			 * Fires after the WP_User_Query has been parsed, and before
			 * the query is executed.
			 *
			 * The passed WP_User_Query object contains SQL parts formed
			 * from parsing the given query.
			 *
			 * @since 3.1.0
			 *
			 * @param WP_User_Query $this The current WP_User_Query instance,
			 *                            passed by reference.
			 * @Reference wp-includes\class-wp-user-query.php do_action( 'pre_user_query', array( &$this ) )
	*/
	const PreUserQuery = "pre_user_query";
	/**
	* @Reference wp-admin\includes\deprecated.php do_action( 'pre_user_search', array( &$this ) )
	*/
	const PreUserSearch = "pre_user_search";
	/**
		 * Fires before the upload button in the media upload interface.
		 *
		 * @since 2.6.0
		 * @Reference wp-admin\includes\media.php do_action( 'pre-html-upload-ui' )
	*/
	const PreHtmlUploadUi = "pre-html-upload-ui";
	/**
		 * Fires before the upload interface loads.
		 *
		 * @since 2.6.0 As 'pre-flash-upload-ui'
		 * @since 3.3.0
		 * @Reference wp-admin\includes\media.php do_action( 'pre-plupload-upload-ui' )
	* @Reference wp-includes\media-template.php do_action( 'pre-plupload-upload-ui' )
	*/
	const PrePluploadUploadUi = "pre-plupload-upload-ui";
	/**
				 * Fires when the site sign-up form is sent.
				 *
				 * @since 3.0.0
				 * @Reference wp-signup.php do_action( 'preprocess_signup_form' )
	*/
	const PreprocessSignupForm = "preprocess_signup_form";
	/**
		 * Fires just before the legacy (pre-3.5.0) upload interface is loaded.
		 *
		 * @since 2.6.0
		 * @Reference wp-admin\includes\media.php do_action( 'pre-upload-ui' )
	* @Reference wp-includes\media-template.php do_action( 'pre-upload-ui' )
	*/
	const PreUploadUi = "pre-upload-ui";
	/**
			 * Fires when the editor scripts are loaded for later initialization,
			 * after all scripts and settings are printed.
			 *
			 * @since 4.8.0
			 * @Reference wp-includes\class-wp-editor.php do_action( 'print_default_editor_scripts' )
	*/
	const PrintDefaultEditorScripts = "print_default_editor_scripts";
	/**
		 * Fires when the custom Backbone media templates are printed.
		 *
		 * @since 3.5.0
		 * @Reference wp-includes\media-template.php do_action( 'print_media_templates' )
	*/
	const PrintMediaTemplates = "print_media_templates";
	/**
			 * Fires when a post's status is transitioned from private to published.
			 *
			 * @since 1.5.0
			 * @deprecated 2.3.0 Use 'private_to_publish' instead.
			 *
			 * @param int $post_id Post ID.
			 * @Reference wp-includes\post.php do_action( 'private_to_published', $post->ID )
	*/
	const PrivateToPublished = "private_to_published";
	/**
				 * Fires after the 'Personal Options' settings table on the 'Your Profile' editing screen.
				 *
				 * The action only fires if the current user is editing their own profile.
				 *
				 * @since 2.0.0
				 *
				 * @param WP_User $profileuser The current WP_User object.
				 * @Reference wp-admin\user-edit.php do_action( 'profile_personal_options', $profileuser )
	*/
	const ProfilePersonalOptions = "profile_personal_options";
	/**
			 * Fires immediately after an existing user is updated.
			 *
			 * @since 2.0.0
			 *
			 * @param int     $user_id       User ID.
			 * @param WP_User $old_user_data Object containing user's data prior to update.
			 * @Reference wp-includes\user.php do_action( 'profile_update', $user_id, $old_user_data )
	*/
	const ProfileUpdate = "profile_update";
	/**
		 * Fires after a post submitted by email is published.
		 *
		 * @since 1.2.0
		 *
		 * @param int $post_ID The post ID.
		 * @Reference wp-mail.php do_action( 'publish_phone', $post_ID )
	*/
	const PublishPhone = "publish_phone";
	/**
						 * Fires once for each column in Quick Edit mode.
						 *
						 * @since 2.7.0
						 *
						 * @param string $column_name Name of the column to edit.
						 * @param string $post_type   The post type slug, or current screen name if this is a taxonomy list table.
						 * @param string $taxonomy    The taxonomy name, if any.
						 * @Reference wp-admin\includes\class-wp-posts-list-table.php do_action( 'quick_edit_custom_box', $column_name, $screen->post_type, '' )
	* @Reference wp-admin\includes\class-wp-terms-list-table.php do_action( 'quick_edit_custom_box', $column_name, 'edit-tags', $this->screen->taxonomy )
	*/
	const QuickEditCustomBox = "quick_edit_custom_box";
	/**
		 * Fires at the end of the RDF feed header.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-rdf.php do_action( 'rdf_header' )
	*/
	const RdfHeader = "rdf_header";
	/**
		 * Fires at the end of each RDF feed item.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-rdf.php do_action( 'rdf_item' )
	*/
	const RdfItem = "rdf_item";
	/**
		 * Fires at the end of the feed root to add namespaces.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-rdf.php do_action( 'rdf_ns' )
	*/
	const RdfNs = "rdf_ns";
	/**
		 * Fires after the blog details cache is cleared.
		 *
		 * @since 3.4.0
		 * @deprecated 4.9.0 Use clean_site_cache
		 *
		 * @param int $blog_id Blog ID.
		 * @Reference wp-includes\ms-site.php do_action( 'refresh_blog_details', array( $blog_id ), '4.9.0', 'clean_site_cache' )
	*/
	const RefreshBlogDetails = "refresh_blog_details";
	/**
				 * Fires following the 'Email' field in the user registration form.
				 *
				 * @since 2.1.0
				 * @Reference wp-login.php do_action( 'register_form' )
	*/
	const RegisterForm = "register_form";
	/**
		 * Fires after a new user registration has been recorded.
		 *
		 * @since 4.4.0
		 *
		 * @param int $user_id ID of the newly registered user.
		 * @Reference wp-includes\user.php do_action( 'register_new_user', $user_id )
	*/
	const RegisterNewUser = "register_new_user";
	/**
		 * Fires when submitting registration form data, before the user is created.
		 *
		 * @since 2.1.0
		 *
		 * @param string   $sanitized_user_login The submitted username after being sanitized.
		 * @param string   $user_email           The submitted email.
		 * @param WP_Error $errors               Contains any errors with submitted username and email,
		 *                                       e.g., an empty field, an invalid username or email,
		 *                                       or an existing username or email.
		 * @Reference wp-includes\user.php do_action( 'register_post', $sanitized_user_login, $user_email, $errors )
	*/
	const RegisterPost = "register_post";
	/**
		 * Fires once a sidebar has been registered.
		 *
		 * @since 3.0.0
		 *
		 * @param array $sidebar Parsed arguments for the registered sidebar.
		 * @Reference wp-includes\widgets.php do_action( 'register_sidebar', $sidebar )
	*/
	const RegisterSidebar = "register_sidebar";
	/**
		 * Fires after a post type is registered.
		 *
		 * @since 3.3.0
		 * @since 4.6.0 Converted the `$post_type` parameter to accept a `WP_Post_Type` object.
		 *
		 * @param string       $post_type        Post type.
		 * @param WP_Post_Type $post_type_object Arguments used to register the post type.
		 * @Reference wp-includes\post.php do_action( 'registered_post_type', $post_type, $post_type_object )
	*/
	const RegisteredPostType = "registered_post_type";
	/**
		 * Fires after a taxonomy is registered.
		 *
		 * @since 3.3.0
		 *
		 * @param string       $taxonomy    Taxonomy slug.
		 * @param array|string $object_type Object type or array of object types.
		 * @param array        $args        Array of taxonomy registration arguments.
		 * @Reference wp-includes\taxonomy.php do_action( 'registered_taxonomy', $taxonomy, $object_type, (array) $taxonomy_object )
	*/
	const RegisteredTaxonomy = "registered_taxonomy";
	/**
		 * Fires after a taxonomy is registered for an object type.
		 *
		 * @since 5.1.0
		 *
		 * @param string $taxonomy    Taxonomy name.
		 * @param string $object_type Name of the object type.
		 * @Reference wp-includes\taxonomy.php do_action( 'registered_taxonomy_for_object_type', $taxonomy, $object_type )
	*/
	const RegisteredTaxonomyForObjectType = "registered_taxonomy_for_object_type";
	/**
		 * Fires before a user is removed from a site.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int $user_id User ID.
		 * @param int $blog_id Blog ID.
		 * @Reference wp-includes\ms-functions.php do_action( 'remove_user_from_blog', $user_id, $blog_id )
	*/
	const RemoveUserFromBlog = "remove_user_from_blog";
	/**
			 * Fires immediately after a role as been removed from a user.
			 *
			 * @since 4.3.0
			 *
			 * @param int    $user_id The user ID.
			 * @param string $role    The removed role.
			 * @Reference wp-includes\class-wp-user.php do_action( 'remove_user_role', $this->ID, $role )
	*/
	const RemoveUserRole = "remove_user_role";
	/**
				 * Fires following the 'Strength indicator' meter in the user password reset form.
				 *
				 * @since 3.9.0
				 *
				 * @param WP_User $user User object of the user whose password is being reset.
				 * @Reference wp-login.php do_action( 'resetpass_form', $user )
	*/
	const ResetpassForm = "resetpass_form";
	/**
			 * Fires after a single attachment is completely created or updated via the REST API.
			 *
			 * @since 5.0.0
			 *
			 * @param WP_Post         $attachment Inserted or updated attachment object.
			 * @param WP_REST_Request $request    Request object.
			 * @param bool            $creating   True when creating an attachment, false when updating.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-attachments-controller.php do_action( 'rest_after_insert_attachment', $attachment, $request, true )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-attachments-controller.php do_action( 'rest_after_insert_attachment', $attachment, $request, false )
	*/
	const RestAfterInsertAttachment = "rest_after_insert_attachment";
	/**
			 * Fires completely after a comment is created or updated via the REST API.
			 *
			 * @since 5.0.0
			 *
			 * @param WP_Comment      $comment  Inserted or updated comment object.
			 * @param WP_REST_Request $request  Request object.
			 * @param bool            $creating True when creating a comment, false
			 *                                  when updating.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php do_action( 'rest_after_insert_comment', $comment, $request, true )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php do_action( 'rest_after_insert_comment', $comment, $request, false )
	*/
	const RestAfterInsertComment = "rest_after_insert_comment";
	/**
			 * Fires after a user is completely created or updated via the REST API.
			 *
			 * @since 5.0.0
			 *
			 * @param WP_User         $user     Inserted or updated user object.
			 * @param WP_REST_Request $request  Request object.
			 * @param bool            $creating True when creating a user, false when updating.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php do_action( 'rest_after_insert_user', $user, $request, true )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php do_action( 'rest_after_insert_user', $user, $request, false )
	*/
	const RestAfterInsertUser = "rest_after_insert_user";
	/**
			 * Fires when preparing to serve an API request.
			 *
			 * Endpoint objects should be created and register their hooks on this action rather
			 * than another action to ensure they're only loaded when needed.
			 *
			 * @since 4.4.0
			 *
			 * @param WP_REST_Server $wp_rest_server Server object.
			 * @Reference wp-includes\rest-api.php do_action( 'rest_api_init', $wp_rest_server )
	*/
	const RestApiInit = "rest_api_init";
	/**
			 * Fires after a comment is deleted via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_Comment       $comment  The deleted comment data.
			 * @param WP_REST_Response $response The response returned from the API.
			 * @param WP_REST_Request  $request  The request sent to the API.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php do_action( 'rest_delete_comment', $comment, $response, $request )
	*/
	const RestDeleteComment = "rest_delete_comment";
	/**
			 * Fires after a revision is deleted via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param (mixed) $result The revision object (if it was deleted or moved to the trash successfully)
			 *                        or false (failure). If the revision was moved to the trash, $result represents
			 *                        its new state; if it was deleted, $result represents its state before deletion.
			 * @param WP_REST_Request $request The request sent to the API.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-revisions-controller.php do_action( 'rest_delete_revision', $result, $request )
	*/
	const RestDeleteRevision = "rest_delete_revision";
	/**
			 * Fires immediately after a user is deleted via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_User          $user     The user data.
			 * @param WP_REST_Response $response The response returned from the API.
			 * @param WP_REST_Request  $request  The request sent to the API.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php do_action( 'rest_delete_user', $user, $response, $request )
	*/
	const RestDeleteUser = "rest_delete_user";
	/**
			 * Fires after a single attachment is created or updated via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_Post         $attachment Inserted or updated attachment
			 *                                    object.
			 * @param WP_REST_Request $request    The request sent to the API.
			 * @param bool            $creating   True when creating an attachment, false when updating.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-attachments-controller.php do_action( 'rest_insert_attachment', $attachment, $request, true )
	*/
	const RestInsertAttachment = "rest_insert_attachment";
	/**
			 * Fires after a comment is created or updated via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_Comment      $comment  Inserted or updated comment object.
			 * @param WP_REST_Request $request  Request object.
			 * @param bool            $creating True when creating a comment, false
			 *                                  when updating.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php do_action( 'rest_insert_comment', $comment, $request, true )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php do_action( 'rest_insert_comment', $comment, $request, false )
	*/
	const RestInsertComment = "rest_insert_comment";
	/**
			 * Fires immediately after a user is created or updated via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_User         $user     Inserted or updated user object.
			 * @param WP_REST_Request $request  Request object.
			 * @param bool            $creating True when creating a user, false when updating.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php do_action( 'rest_insert_user', $user, $request, true )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php do_action( 'rest_insert_user', $user, $request, false )
	*/
	const RestInsertUser = "rest_insert_user";
	/**
			 * Fires when the locale is restored to the previous one.
			 *
			 * @since 4.7.0
			 *
			 * @param string $locale          The new locale.
			 * @param string $previous_locale The previous locale.
			 * @Reference wp-includes\class-wp-locale-switcher.php do_action( 'restore_previous_locale', $locale, $previous_locale )
	*/
	const RestorePreviousLocale = "restore_previous_locale";
	/**
				 * Fires just before the Filter submit button for comment types.
				 *
				 * @since 3.5.0
				 * @Reference wp-admin\includes\class-wp-comments-list-table.php do_action( 'restrict_manage_comments' )
	*/
	const RestrictManageComments = "restrict_manage_comments";
	/**
				 * Fires before the Filter button on the Posts and Pages list tables.
				 *
				 * The Filter button allows sorting by date and/or category on the
				 * Posts list table, and sorting by date on the Pages list table.
				 *
				 * @since 2.1.0
				 * @since 4.4.0 The `$post_type` parameter was added.
				 * @since 4.6.0 The `$which` parameter was added.
				 *
				 * @param string $post_type The post type slug.
				 * @param string $which     The location of the extra table nav markup:
				 *                          'top' or 'bottom' for WP_Posts_List_Table,
				 *                          'bar' for WP_Media_List_Table.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php do_action( 'restrict_manage_posts', $this->screen->post_type, $which )
	* @Reference wp-admin\includes\class-wp-media-list-table.php do_action( 'restrict_manage_posts', $this->screen->post_type, $which )
	*/
	const RestrictManagePosts = "restrict_manage_posts";
	/**
				 * Fires before the Filter button on the MS sites list table.
				 *
				 * @since 5.3.0
				 *
				 * @param string $which The location of the extra table nav markup: 'top' or 'bottom'.
				 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php do_action( 'restrict_manage_sites', $which )
	*/
	const RestrictManageSites = "restrict_manage_sites";
	/**
			 * Fires just before the closing div containing the bulk role-change controls
			 * in the Users list table.
			 *
			 * @since 3.5.0
			 * @since 4.6.0 The `$which` parameter was added.
			 *
			 * @param string $which The location of the extra table nav markup: 'top' or 'bottom'.
			 * @Reference wp-admin\includes\class-wp-users-list-table.php do_action( 'restrict_manage_users', $which )
	*/
	const RestrictManageUsers = "restrict_manage_users";
	/**
		 * Fires before a new password is retrieved.
		 *
		 * Use the {@see 'retrieve_password'} hook instead.
		 *
		 * @since 1.5.0
		 * @deprecated 1.5.1 Misspelled. Use 'retrieve_password' hook instead.
		 *
		 * @param string $user_login The user login name.
		 * @Reference wp-includes\user.php do_action( 'retreive_password', $user->user_login )
	*/
	const RetreivePassword = "retreive_password";
	/**
		 * Fires before a new password is retrieved.
		 *
		 * @since 1.5.1
		 *
		 * @param string $user_login The user login name.
		 * @Reference wp-includes\user.php do_action( 'retrieve_password', $user->user_login )
	*/
	const RetrievePassword = "retrieve_password";
	/**
		 * Fires when a password reset key is generated.
		 *
		 * @since 2.5.0
		 *
		 * @param string $user_login The username for the user.
		 * @param string $key        The generated password reset key.
		 * @Reference wp-includes\user.php do_action( 'retrieve_password_key', $user->user_login, $key )
	*/
	const RetrievePasswordKey = "retrieve_password_key";
	/**
		 * Fires before the user's Super Admin privileges are revoked.
		 *
		 * @since 3.0.0
		 *
		 * @param int $user_id ID of the user Super Admin privileges are being revoked from.
		 * @Reference wp-includes\capabilities.php do_action( 'revoke_super_admin', $user_id )
	*/
	const RevokeSuperAdmin = "revoke_super_admin";
	/**
				 * Fires after the user's Super Admin privileges are revoked.
				 *
				 * @since 3.0.0
				 *
				 * @param int $user_id ID of the user Super Admin privileges were revoked from.
				 * @Reference wp-includes\capabilities.php do_action( 'revoked_super_admin', $user_id )
	*/
	const RevokedSuperAdmin = "revoked_super_admin";
	/**
		 * Fires at the end of the 'At a Glance' dashboard widget.
		 *
		 * Prior to 3.8.0, the widget was named 'Right Now'.
		 *
		 * @since 2.5.0
		 * @Reference wp-admin\includes\dashboard.php do_action( 'rightnow_end' )
	*/
	const RightnowEnd = "rightnow_end";
	/**
		 * Fires at the end of the RSS Feed Header.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-rss.php do_action( 'rss_head' )
	*/
	const RssHead = "rss_head";
	/**
			 * Fires at the end of each RSS feed item.
			 *
			 * @since 2.0.0
			 * @Reference wp-includes\feed-rss.php do_action( 'rss_item' )
	*/
	const RssItem = "rss_item";
	/**
	 * Fires between the xml and rss tags in a feed.
	 *
	 * @since 4.0.0
	 *
	 * @param string $context Type of feed. Possible values include 'rss2', 'rss2-comments',
	 *                        'rdf', 'atom', and 'atom-comments'.
	 * @Reference wp-includes\feed-rss2.php do_action( 'rss_tag_pre', 'rss2' )
	* @Reference wp-includes\feed-atom.php do_action( 'rss_tag_pre', 'atom' )
	* @Reference wp-includes\feed-atom-comments.php do_action( 'rss_tag_pre', 'atom-comments' )
	* @Reference wp-includes\feed-rdf.php do_action( 'rss_tag_pre', 'rdf' )
	* @Reference wp-includes\feed-rss2-comments.php do_action( 'rss_tag_pre', 'rss2-comments' )
	*/
	const RssTagPre = "rss_tag_pre";
	/**
		 * Fires at the end of the RSS root to add namespaces.
		 *
		 * @since 2.8.0
		 * @Reference wp-includes\feed-rss2-comments.php do_action( 'rss2_comments_ns' )
	*/
	const Rss2CommentsNs = "rss2_comments_ns";
	/**
		 * Fires at the end of the RSS2 Feed Header.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-rss2.php do_action( 'rss2_head' )
	* @Reference wp-admin\includes\export.php do_action( 'rss2_head' )
	*/
	const Rss2Head = "rss2_head";
	/**
			 * Fires at the end of each RSS2 feed item.
			 *
			 * @since 2.0.0
			 * @Reference wp-includes\feed-rss2.php do_action( 'rss2_item' )
	*/
	const Rss2Item = "rss2_item";
	/**
		 * Fires at the end of the RSS root to add namespaces.
		 *
		 * @since 2.0.0
		 * @Reference wp-includes\feed-rss2.php do_action( 'rss2_ns' )
	* @Reference wp-includes\feed-rss2-comments.php do_action( 'rss2_ns' )
	*/
	const Rss2Ns = "rss2_ns";
	/**
	 * Fires when comment cookies are sanitized.
	 *
	 * @since 2.0.11
	 * @Reference wp-settings.php do_action( 'sanitize_comment_cookies' )
	*/
	const SanitizeCommentCookies = "sanitize_comment_cookies";
	/**
		 * Fires once a post has been saved.
		 *
		 * @since 1.5.0
		 *
		 * @param int     $post_ID Post ID.
		 * @param WP_Post $post    Post object.
		 * @param bool    $update  Whether this is an existing post being updated or not.
		 * @Reference wp-includes\post.php do_action( 'save_post', $post_ID, $post, $update )
	* @Reference wp-includes\class-wp-customize-manager.php do_action( 'save_post', $post->ID, $post, true )
	* @Reference wp-includes\post.php do_action( 'save_post', $post->ID, $post, true )
	*/
	const SavePost = "save_post";
	/**
			 * Fires once the requested HTTP headers for caching, content type, etc. have been sent.
			 *
			 * @since 2.1.0
			 *
			 * @param WP $this Current WordPress environment instance (passed by reference).
			 * @Reference wp-includes\class-wp.php do_action( 'send_headers', array( &$this ) )
	*/
	const SendHeaders = "send_headers";
	/**
			 * Fires immediately before the authentication cookie is set.
			 *
			 * @since 2.5.0
			 * @since 4.9.0 The `$token` parameter was added.
			 *
			 * @param string $auth_cookie Authentication cookie value.
			 * @param int    $expire      The time the login grace period expires as a UNIX timestamp.
			 *                            Default is 12 hours past the cookie's expiration time.
			 * @param int    $expiration  The time when the authentication cookie expires as a UNIX timestamp.
			 *                            Default is 14 days from now.
			 * @param int    $user_id     User ID.
			 * @param string $scheme      Authentication scheme. Values include 'auth' or 'secure_auth'.
			 * @param string $token       User's session token to use for this cookie.
			 * @Reference wp-includes\pluggable.php do_action( 'set_auth_cookie', $auth_cookie, $expire, $expiration, $user_id, $scheme, $token )
	*/
	const SetAuthCookie = "set_auth_cookie";
	/**
	 * Perform other actions when comment cookies are set.
	 *
	 * @since 3.4.0
	 * @since 4.9.6 The `$cookies_consent` parameter was added.
	 *
	 * @param WP_Comment $comment         Comment object.
	 * @param WP_User    $user            Comment author's user object. The user may not exist.
	 * @param boolean    $cookies_consent Comment author's consent to store cookies.
	 * @Reference wp-comments-post.php do_action( 'set_comment_cookies', $comment, $user, $cookies_consent )
	*/
	const SetCommentCookies = "set_comment_cookies";
	/**
			 * Fires after the current user is set.
			 *
			 * @since 2.0.1
			 * @Reference wp-includes\pluggable.php do_action( 'set_current_user' )
	*/
	const SetCurrentUser = "set_current_user";
	/**
			 * Fires immediately before the logged-in authentication cookie is set.
			 *
			 * @since 2.6.0
			 * @since 4.9.0 The `$token` parameter was added.
			 *
			 * @param string $logged_in_cookie The logged-in cookie value.
			 * @param int    $expire           The time the login grace period expires as a UNIX timestamp.
			 *                                 Default is 12 hours past the cookie's expiration time.
			 * @param int    $expiration       The time when the logged-in authentication cookie expires as a UNIX timestamp.
			 *                                 Default is 14 days from now.
			 * @param int    $user_id          User ID.
			 * @param string $scheme           Authentication scheme. Default 'logged_in'.
			 * @param string $token            User's session token to use for this cookie.
			 * @Reference wp-includes\pluggable.php do_action( 'set_logged_in_cookie', $logged_in_cookie, $expire, $expiration, $user_id, 'logged_in', $token )
	*/
	const SetLoggedInCookie = "set_logged_in_cookie";
	/**
		 * Fires after an object's terms have been set.
		 *
		 * @since 2.8.0
		 *
		 * @param int    $object_id  Object ID.
		 * @param array  $terms      An array of object terms.
		 * @param array  $tt_ids     An array of term taxonomy IDs.
		 * @param string $taxonomy   Taxonomy slug.
		 * @param bool   $append     Whether to append new terms to the old terms.
		 * @param array  $old_tt_ids Old array of term taxonomy IDs.
		 * @Reference wp-includes\taxonomy.php do_action( 'set_object_terms', $object_id, $terms, $tt_ids, $taxonomy, $append, $old_tt_ids )
	*/
	const SetObjectTerms = "set_object_terms";
	/**
			 * Fires after the user's role has changed.
			 *
			 * @since 2.9.0
			 * @since 3.6.0 Added $old_roles to include an array of the user's previous roles.
			 *
			 * @param int      $user_id   The user ID.
			 * @param string   $role      The new role.
			 * @param string[] $old_roles An array of the user's previous roles.
			 * @Reference wp-includes\class-wp-user.php do_action( 'set_user_role', $this->ID, $role, $old_roles )
	*/
	const SetUserRole = "set_user_role";
	/**
			 * Fires after the value for a site transient has been set.
			 *
			 * @since 3.0.0
			 *
			 * @param string $transient  The name of the site transient.
			 * @param mixed  $value      Site transient value.
			 * @param int    $expiration Time until expiration in seconds.
			 * @Reference wp-includes\option.php do_action( 'setted_site_transient', $transient, $value, $expiration )
	*/
	const SettedSiteTransient = "setted_site_transient";
	/**
			 * Fires after the value for a transient has been set.
			 *
			 * @since 3.0.0
			 * @since 3.6.0 The `$value` and `$expiration` parameters were added.
			 *
			 * @param string $transient  The name of the transient.
			 * @param mixed  $value      Transient value.
			 * @param int    $expiration Time until expiration in seconds.
			 * @Reference wp-includes\option.php do_action( 'setted_transient', $transient, $value, $expiration )
	*/
	const SettedTransient = "setted_transient";
	/**
	 * Fires before the theme is loaded.
	 *
	 * @since 2.6.0
	 * @Reference wp-settings.php do_action( 'setup_theme' )
	*/
	const SetupTheme = "setup_theme";
	/**
				 * Fires after the 'About Yourself' settings table on the 'Your Profile' editing screen.
				 *
				 * The action only fires if the current user is editing their own profile.
				 *
				 * @since 2.0.0
				 *
				 * @param WP_User $profileuser The current WP_User object.
				 * @Reference wp-admin\user-edit.php do_action( 'show_user_profile', $profileuser )
	*/
	const ShowUserProfile = "show_user_profile";
	/**
		 * Fires just before PHP shuts down execution.
		 *
		 * @since 1.2.0
		 * @Reference wp-includes\load.php do_action( 'shutdown' )
	*/
	const Shutdown = "shutdown";
	/**
	 * Fires after the available widgets and sidebars have loaded, before the admin footer.
	 *
	 * @since 2.2.0
	 * @Reference wp-admin\widgets.php do_action( 'sidebar_admin_page' )
	*/
	const SidebarAdminPage = "sidebar_admin_page";
	/**
	 * Fires early before the Widgets administration screen loads,
	 * after scripts are enqueued.
	 *
	 * @since 2.2.0
	 * @Reference wp-admin\widgets.php do_action( 'sidebar_admin_setup' )
	* @Reference wp-admin\includes\ajax-actions.php do_action( 'sidebar_admin_setup' )
	* @Reference wp-admin\includes\ajax-actions.php do_action( 'sidebar_admin_setup' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'sidebar_admin_setup' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'sidebar_admin_setup' )
	*/
	const SidebarAdminSetup = "sidebar_admin_setup";
	/**
		 * Fires after the site sign-up form.
		 *
		 * @since 3.0.0
		 *
		 * @param WP_Error $errors A WP_Error object possibly containing 'blogname' or 'blog_title' errors.
		 * @Reference wp-signup.php do_action( 'signup_blogform', $errors )
	*/
	const SignupBlogform = "signup_blogform";
	/**
		 * Fires at the end of the user registration form on the site sign-up form.
		 *
		 * @since 3.0.0
		 *
		 * @param WP_Error $errors A WP_Error object containing 'user_name' or 'user_email' errors.
		 * @Reference wp-signup.php do_action( 'signup_extra_fields', $errors )
	*/
	const SignupExtraFields = "signup_extra_fields";
	/**
		 * Fires when the site or user sign-up process is complete.
		 *
		 * @since 3.0.0
		 * @Reference wp-signup.php do_action( 'signup_finished' )
	* @Reference wp-signup.php do_action( 'signup_finished' )
	* @Reference wp-signup.php do_action( 'signup_finished' )
	*/
	const SignupFinished = "signup_finished";
	/**
		 * Fires within the head section of the site sign-up screen.
		 *
		 * @since 3.0.0
		 * @Reference wp-signup.php do_action( 'signup_header' )
	*/
	const SignupHeader = "signup_header";
	/**
			 * Hidden sign-up form fields output when creating another site or user.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string $context A string describing the steps of the sign-up process. The value can be
			 *                        'create-another-site', 'validate-user', or 'validate-site'.
			 * @Reference wp-signup.php do_action( 'signup_hidden_fields', 'create-another-site' )
	* @Reference wp-signup.php do_action( 'signup_hidden_fields', 'validate-site' )
	* @Reference wp-signup.php do_action( 'signup_hidden_fields', 'validate-user' )
	*/
	const SignupHiddenFields = "signup_hidden_fields";
	/**
		 * Fires immediately before a comment is marked as Spam.
		 *
		 * @since 2.9.0
		 * @since 4.9.0 Added the `$comment` parameter.
		 *
		 * @param int        $comment_id The comment ID.
		 * @param WP_Comment $comment    The comment to be marked as spam.
		 * @Reference wp-includes\comment.php do_action( 'spam_comment', $comment->comment_ID, $comment )
	*/
	const SpamComment = "spam_comment";
	/**
			 * Fires immediately after a comment is marked as Spam.
			 *
			 * @since 2.9.0
			 * @since 4.9.0 Added the `$comment` parameter.
			 *
			 * @param int        $comment_id The comment ID.
			 * @param WP_Comment $comment    The comment marked as spam.
			 * @Reference wp-includes\comment.php do_action( 'spammed_comment', $comment->comment_ID, $comment )
	*/
	const SpammedComment = "spammed_comment";
	/**
		 * Fires after a previously shared taxonomy term is split into two separate terms.
		 *
		 * @since 4.2.0
		 *
		 * @param int    $term_id          ID of the formerly shared term.
		 * @param int    $new_term_id      ID of the new term created for the $term_taxonomy_id.
		 * @param int    $term_taxonomy_id ID for the term_taxonomy row affected by the split.
		 * @param string $taxonomy         Taxonomy for the split term.
		 * @Reference wp-includes\taxonomy.php do_action( 'split_shared_term', $term_id, $new_term_id, $term_taxonomy_id, $term_taxonomy->taxonomy )
	*/
	const SplitSharedTerm = "split_shared_term";
	/**
			 * Fires once the Customizer theme preview has started.
			 *
			 * @since 3.4.0
			 *
			 * @param WP_Customize_Manager $this WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'start_previewing_theme', $this )
	*/
	const StartPreviewingTheme = "start_previewing_theme";
	/**
			 * Fires once the Customizer theme preview has stopped.
			 *
			 * @since 3.4.0
			 *
			 * @param WP_Customize_Manager $this WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php do_action( 'stop_previewing_theme', $this )
	*/
	const StopPreviewingTheme = "stop_previewing_theme";
	/**
		 * Fires at the end of the Publish box in the Link editing screen.
		 *
		 * @since 2.5.0
		 * @Reference wp-admin\includes\meta-boxes.php do_action( 'submitlink_box' )
	* @Reference wp-admin\edit-link-form.php do_action( 'submitlink_box' )
	*/
	const SubmitlinkBox = "submitlink_box";
	/**
		 * Fires before meta boxes with 'side' context are output for the 'page' post type.
		 *
		 * The submitpage box is a meta box with 'side' context, so this hook fires just before it is output.
		 *
		 * @since 2.5.0
		 *
		 * @param WP_Post $post Post object.
		 * @Reference wp-admin\edit-form-advanced.php do_action( 'submitpage_box', $post )
	*/
	const SubmitpageBox = "submitpage_box";
	/**
		 * Fires before meta boxes with 'side' context are output for all post types other than 'page'.
		 *
		 * The submitpost box is a meta box with 'side' context, so this hook fires just before it is output.
		 *
		 * @since 2.5.0
		 *
		 * @param WP_Post $post Post object.
		 * @Reference wp-admin\edit-form-advanced.php do_action( 'submitpost_box', $post )
	*/
	const SubmitpostBox = "submitpost_box";
	/**
			 * Fires when the blog is switched.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param int $new_blog_id  New blog ID.
			 * @param int $prev_blog_id Previous blog ID.
			 * @Reference wp-includes\ms-blogs.php do_action( 'switch_blog', $new_blog_id, $prev_blog_id )
	* @Reference wp-includes\ms-blogs.php do_action( 'switch_blog', $new_blog_id, $prev_blog_id )
	* @Reference wp-includes\ms-blogs.php do_action( 'switch_blog', $new_blog_id, $prev_blog_id )
	* @Reference wp-includes\ms-blogs.php do_action( 'switch_blog', $new_blog_id, $prev_blog_id )
	*/
	const SwitchBlog = "switch_blog";
	/**
			 * Fires when the locale is switched.
			 *
			 * @since 4.7.0
			 *
			 * @param string $locale The new locale.
			 * @Reference wp-includes\class-wp-locale-switcher.php do_action( 'switch_locale', $locale )
	*/
	const SwitchLocale = "switch_locale";
	/**
		 * Fires after the theme is switched.
		 *
		 * @since 1.5.0
		 * @since 4.5.0 Introduced the `$old_theme` parameter.
		 *
		 * @param string   $new_name  Name of the new theme.
		 * @param WP_Theme $new_theme WP_Theme instance of the new theme.
		 * @param WP_Theme $old_theme WP_Theme instance of the old theme.
		 * @Reference wp-includes\theme.php do_action( 'switch_theme', $new_name, $new_theme, $old_theme )
	*/
	const SwitchTheme = "switch_theme";
	/**
		 * Fires before determining which template to load.
		 *
		 * @since 1.5.0
		 * @Reference wp-includes\template-loader.php do_action( 'template_redirect' )
	*/
	const TemplateRedirect = "template_redirect";
	/**
			 * Fires once the post data has been setup.
			 *
			 * @since 2.8.0
			 * @since 4.1.0 Introduced `$this` parameter.
			 *
			 * @param WP_Post  $post The Post object (passed by reference).
			 * @param WP_Query $this The current Query object (passed by reference).
			 * @Reference wp-includes\class-wp-query.php do_action( 'the_post', array( &$post, &$this ) )
	*/
	const ThePost = "the_post";
	/**
		 * Fires before rendering the requested widget.
		 *
		 * @since 3.0.0
		 *
		 * @param string $widget   The widget's class name.
		 * @param array  $instance The current widget instance's settings.
		 * @param array  $args     An array of the widget's sidebar arguments.
		 * @Reference wp-includes\widgets.php do_action( 'the_widget', $widget, $instance, $args )
	*/
	const TheWidget = "the_widget";
	/**
	 * Fires at the end of the Tools Administration screen.
	 *
	 * @since 2.8.0
	 * @Reference wp-admin\tools.php do_action( 'tool_box' )
	*/
	const ToolBox = "tool_box";
	/**
		 * Fires after a trackback is added to a post.
		 *
		 * @since 1.2.0
		 *
		 * @param int $trackback_id Trackback ID.
		 * @Reference wp-trackback.php do_action( 'trackback_post', $trackback_id )
	*/
	const TrackbackPost = "trackback_post";
	/**
			 * Fires when the comment status is in transition.
			 *
			 * @since 2.7.0
			 *
			 * @param int|string $new_status The new comment status.
			 * @param int|string $old_status The old comment status.
			 * @param object     $comment    The comment data.
			 * @Reference wp-includes\comment.php do_action( 'transition_comment_status', $new_status, $old_status, $comment )
	*/
	const TransitionCommentStatus = "transition_comment_status";
	/**
		 * Fires when a post is transitioned from one status to another.
		 *
		 * @since 2.3.0
		 *
		 * @param string  $new_status New post status.
		 * @param string  $old_status Old post status.
		 * @param WP_Post $post       Post object.
		 * @Reference wp-includes\post.php do_action( 'transition_post_status', $new_status, $old_status, $post )
	*/
	const TransitionPostStatus = "transition_post_status";
	/**
		 * Fires immediately before a comment is sent to the Trash.
		 *
		 * @since 2.9.0
		 * @since 4.9.0 Added the `$comment` parameter.
		 *
		 * @param int        $comment_id The comment ID.
		 * @param WP_Comment $comment    The comment to be trashed.
		 * @Reference wp-includes\comment.php do_action( 'trash_comment', $comment->comment_ID, $comment )
	*/
	const TrashComment = "trash_comment";
	/**
		 * Fires before comments are sent to the trash.
		 *
		 * @since 2.9.0
		 *
		 * @param int $post_id Post ID.
		 * @Reference wp-includes\post.php do_action( 'trash_post_comments', $post_id )
	*/
	const TrashPostComments = "trash_post_comments";
	/**
			 * Fires immediately after a comment is sent to Trash.
			 *
			 * @since 2.9.0
			 * @since 4.9.0 Added the `$comment` parameter.
			 *
			 * @param int        $comment_id The comment ID.
			 * @param WP_Comment $comment    The trashed comment.
			 * @Reference wp-includes\comment.php do_action( 'trashed_comment', $comment->comment_ID, $comment )
	*/
	const TrashedComment = "trashed_comment";
	/**
		 * Fires after a post is sent to the trash.
		 *
		 * @since 2.9.0
		 *
		 * @param int $post_id Post ID.
		 * @Reference wp-includes\post.php do_action( 'trashed_post', $post_id )
	* @Reference wp-includes\class-wp-customize-manager.php do_action( 'trashed_post', $post_id )
	*/
	const TrashedPost = "trashed_post";
	/**
		 * Fires after comments are sent to the trash.
		 *
		 * @since 2.9.0
		 *
		 * @param int   $post_id  Post ID.
		 * @param array $statuses Array of comment statuses.
		 * @Reference wp-includes\post.php do_action( 'trashed_post_comments', $post_id, $statuses )
	*/
	const TrashedPostComments = "trashed_post_comments";
	/**
				 * Fires when the 'archived' status is removed from a site.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'unarchive_blog', $site_id )
	*/
	const UnarchiveBlog = "unarchive_blog";
	/**
		 * Fires before the text domain is unloaded.
		 *
		 * @since 3.0.0
		 *
		 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php do_action( 'unload_textdomain', $domain )
	*/
	const UnloadTextdomain = "unload_textdomain";
	/**
				 * Fires when the 'mature' status is removed from a site.
				 *
				 * @since 3.1.0
				 *
				 * @param int $site_id Site ID.
				 * @Reference wp-includes\ms-site.php do_action( 'unmature_blog', $site_id )
	*/
	const UnmatureBlog = "unmature_blog";
	/**
		 * Fires after a post type was unregistered.
		 *
		 * @since 4.5.0
		 *
		 * @param string $post_type Post type key.
		 * @Reference wp-includes\post.php do_action( 'unregistered_post_type', $post_type )
	*/
	const UnregisteredPostType = "unregistered_post_type";
	/**
		 * Fires after a taxonomy is unregistered.
		 *
		 * @since 4.5.0
		 *
		 * @param string $taxonomy Taxonomy name.
		 * @Reference wp-includes\taxonomy.php do_action( 'unregistered_taxonomy', $taxonomy )
	*/
	const UnregisteredTaxonomy = "unregistered_taxonomy";
	/**
		 * Fires after a taxonomy is unregistered for an object type.
		 *
		 * @since 5.1.0
		 *
		 * @param string $taxonomy    Taxonomy name.
		 * @param string $object_type Name of the object type.
		 * @Reference wp-includes\taxonomy.php do_action( 'unregistered_taxonomy_for_object_type', $taxonomy, $object_type )
	*/
	const UnregisteredTaxonomyForObjectType = "unregistered_taxonomy_for_object_type";
	/**
		 * Fires immediately before a comment is unmarked as Spam.
		 *
		 * @since 2.9.0
		 * @since 4.9.0 Added the `$comment` parameter.
		 *
		 * @param int        $comment_id The comment ID.
		 * @param WP_Comment $comment    The comment to be unmarked as spam.
		 * @Reference wp-includes\comment.php do_action( 'unspam_comment', $comment->comment_ID, $comment )
	*/
	const UnspamComment = "unspam_comment";
	/**
			 * Fires immediately after a comment is unmarked as Spam.
			 *
			 * @since 2.9.0
			 * @since 4.9.0 Added the `$comment` parameter.
			 *
			 * @param int        $comment_id The comment ID.
			 * @param WP_Comment $comment    The comment unmarked as spam.
			 * @Reference wp-includes\comment.php do_action( 'unspammed_comment', $comment->comment_ID, $comment )
	*/
	const UnspammedComment = "unspammed_comment";
	/**
		 * Fires immediately before a comment is restored from the Trash.
		 *
		 * @since 2.9.0
		 * @since 4.9.0 Added the `$comment` parameter.
		 *
		 * @param int        $comment_id The comment ID.
		 * @param WP_Comment $comment    The comment to be untrashed.
		 * @Reference wp-includes\comment.php do_action( 'untrash_comment', $comment->comment_ID, $comment )
	*/
	const UntrashComment = "untrash_comment";
	/**
		 * Fires before a post is restored from the trash.
		 *
		 * @since 2.9.0
		 *
		 * @param int $post_id Post ID.
		 * @Reference wp-includes\post.php do_action( 'untrash_post', $post_id )
	*/
	const UntrashPost = "untrash_post";
	/**
		 * Fires before comments are restored for a post from the trash.
		 *
		 * @since 2.9.0
		 *
		 * @param int $post_id Post ID.
		 * @Reference wp-includes\post.php do_action( 'untrash_post_comments', $post_id )
	*/
	const UntrashPostComments = "untrash_post_comments";
	/**
			 * Fires immediately after a comment is restored from the Trash.
			 *
			 * @since 2.9.0
			 * @since 4.9.0 Added the `$comment` parameter.
			 *
			 * @param int        $comment_id The comment ID.
			 * @param WP_Comment $comment    The untrashed comment.
			 * @Reference wp-includes\comment.php do_action( 'untrashed_comment', $comment->comment_ID, $comment )
	*/
	const UntrashedComment = "untrashed_comment";
	/**
		 * Fires after a post is restored from the trash.
		 *
		 * @since 2.9.0
		 *
		 * @param int $post_id Post ID.
		 * @Reference wp-includes\post.php do_action( 'untrashed_post', $post_id )
	*/
	const UntrashedPost = "untrashed_post";
	/**
		 * Fires after comments are restored for a post from the trash.
		 *
		 * @since 2.9.0
		 *
		 * @param int $post_id Post ID.
		 * @Reference wp-includes\post.php do_action( 'untrashed_post_comments', $post_id )
	*/
	const UntrashedPostComments = "untrashed_post_comments";
	/**
			 * Fires after the current blog's 'public' setting is updated.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param int    $site_id Site ID.
			 * @param string $value   The value of the site status.
			 * @Reference wp-includes\ms-site.php do_action( 'update_blog_public', $site_id, $new_site->public )
	*/
	const UpdateBlogPublic = "update_blog_public";
	/**
		 * Fires immediately before an option value is updated.
		 *
		 * @since 2.9.0
		 *
		 * @param string $option    Name of the option to update.
		 * @param mixed  $old_value The old option value.
		 * @param mixed  $value     The new option value.
		 * @Reference wp-includes\option.php do_action( 'update_option', $option, $old_value, $value )
	*/
	const UpdateOption = "update_option";
	/**
				 * Fires immediately before updating a post's metadata.
				 *
				 * @since 2.9.0
				 *
				 * @param int    $meta_id    ID of metadata entry to update.
				 * @param int    $object_id  Post ID.
				 * @param string $meta_key   Meta key.
				 * @param mixed  $meta_value Meta value. This will be a PHP-serialized string representation of the value if
				 *                           the value is an array, an object, or itself a PHP-serialized string.
				 * @Reference wp-includes\meta.php do_action( 'update_postmeta', $meta_id, $object_id, $meta_key, $meta_value )
	* @Reference wp-includes\meta.php do_action( 'update_postmeta', $meta_id, $object_id, $meta_key, $meta_value )
	*/
	const UpdatePostmeta = "update_postmeta";
	/**
			 * Fires after the value of a network option has been successfully updated.
			 *
			 * @since 3.0.0
			 * @since 4.7.0 The `$network_id` parameter was added.
			 *
			 * @param string $option     Name of the network option.
			 * @param mixed  $value      Current value of the network option.
			 * @param mixed  $old_value  Old value of the network option.
			 * @param int    $network_id ID of the network.
			 * @Reference wp-includes\option.php do_action( 'update_site_option', $option, $value, $old_value, $network_id )
	*/
	const UpdateSiteOption = "update_site_option";
	/**
	* @Reference wp-includes\deprecated.php do_action( 'update_usermeta', $cur->umeta_id, $user_id, $meta_key, $meta_value )
	*/
	const UpdateUsermeta = "update_usermeta";
	/**
		 * Fires after the network options are updated.
		 *
		 * @since MU (3.0.0)
		 * @Reference wp-admin\network\settings.php do_action( 'update_wpmu_options' )
	*/
	const UpdateWpmuOptions = "update_wpmu_options";
	/**
		 * Fires after the value of an option has been successfully updated.
		 *
		 * @since 2.9.0
		 *
		 * @param string $option    Name of the updated option.
		 * @param mixed  $old_value The old option value.
		 * @param mixed  $value     The new option value.
		 * @Reference wp-includes\option.php do_action( 'updated_option', $option, $old_value, $value )
	*/
	const UpdatedOption = "updated_option";
	/**
				 * Fires immediately after updating a post's metadata.
				 *
				 * @since 2.9.0
				 *
				 * @param int    $meta_id    ID of updated metadata entry.
				 * @param int    $object_id  Post ID.
				 * @param string $meta_key   Meta key.
				 * @param mixed  $meta_value Meta value. This will be a PHP-serialized string representation of the value if
				 *                           the value is an array, an object, or itself a PHP-serialized string.
				 * @Reference wp-includes\meta.php do_action( 'updated_postmeta', $meta_id, $object_id, $meta_key, $meta_value )
	* @Reference wp-includes\meta.php do_action( 'updated_postmeta', $meta_id, $object_id, $meta_key, $meta_value )
	*/
	const UpdatedPostmeta = "updated_postmeta";
	/**
	* @Reference wp-includes\deprecated.php do_action( 'updated_usermeta', $cur->umeta_id, $user_id, $meta_key, $meta_value )
	*/
	const UpdatedUsermeta = "updated_usermeta";
	/**
				 * Fires when the upgrader process is complete.
				 *
				 * See also {@see 'upgrader_package_options'}.
				 *
				 * @since 3.6.0
				 * @since 3.7.0 Added to WP_Upgrader::run().
				 * @since 4.6.0 `$translations` was added as a possible argument to `$hook_extra`.
				 *
				 * @param WP_Upgrader $this WP_Upgrader instance. In other contexts, $this, might be a
				 *                          Theme_Upgrader, Plugin_Upgrader, Core_Upgrade, or Language_Pack_Upgrader instance.
				 * @param array       $hook_extra {
				 *     Array of bulk item update data.
				 *
				 *     @type string $action       Type of action. Default 'update'.
				 *     @type string $type         Type of update process. Accepts 'plugin', 'theme', 'translation', or 'core'.
				 *     @type bool   $bulk         Whether the update process is a bulk update. Default true.
				 *     @type array  $plugins      Array of the basename paths of the plugins' main files.
				 *     @type array  $themes       The theme slugs.
				 *     @type array  $translations {
				 *         Array of translations update data.
				 *
				 *         @type string $language The locale the translation is for.
				 *         @type string $type     Type of translation. Accepts 'plugin', 'theme', or 'core'.
				 *         @type string $slug     Text domain the translation is for. The slug of a theme/plugin or
				 *                                'default' for core translations.
				 *         @type string $version  The version of a theme, plugin, or core.
				 *     }
				 * }
				 * @Reference wp-admin\includes\class-wp-upgrader.php do_action( 'upgrader_process_complete', $this, $options['hook_extra'] )
	* @Reference wp-admin\includes\class-language-pack-upgrader.php do_action(			'upgrader_process_complete',			$this,			array(				'action'       => 'update',				'type'         => 'translation',				'bulk'         => true,				'translations' => $language_updates_results,			)		)
	* @Reference wp-admin\includes\class-plugin-upgrader.php do_action(			'upgrader_process_complete',			$this,			array(				'action'  => 'update',				'type'    => 'plugin',				'bulk'    => true,				'plugins' => $plugins,			)		)
	* @Reference wp-admin\includes\class-core-upgrader.php do_action(			'upgrader_process_complete',			$this,			array(				'action' => 'update',				'type'   => 'core',			)		)
	* @Reference wp-admin\includes\class-theme-upgrader.php do_action(			'upgrader_process_complete',			$this,			array(				'action' => 'update',				'type'   => 'theme',				'bulk'   => true,				'themes' => $themes,			)		)
	*/
	const UpgraderProcessComplete = "upgrader_process_complete";
	/**
			 * Fires when an upload will exceed the defined upload space quota for a network site.
			 *
			 * @since 3.5.0
			 * @Reference wp-admin\includes\media.php do_action( 'upload_ui_over_quota' )
	* @Reference wp-includes\media-template.php do_action( 'upload_ui_over_quota' )
	*/
	const UploadUiOverQuota = "upload_ui_over_quota";
	/**
		 * Fires before the administration menu loads in the User Admin.
		 *
		 * @since 3.1.0
		 *
		 * @param string $context Empty context.
		 * @Reference wp-admin\includes\menu.php do_action( 'user_admin_menu', '' )
	*/
	const UserAdminMenu = "user_admin_menu";
	/**
		 * Prints user admin screen notices.
		 *
		 * @since 3.1.0
		 * @Reference wp-admin\admin-header.php do_action( 'user_admin_notices' )
	*/
	const UserAdminNotices = "user_admin_notices";
	/**
												 * Fires inside the your-profile form tag on the user editing screen.
												 *
												 * @since 3.0.0
												 * @Reference wp-admin\user-edit.php do_action( 'user_edit_form_tag' )
	*/
	const UserEditFormTag = "user_edit_form_tag";
	/**
		 * Fires at the end of the new user form.
		 *
		 * Passes a contextual string to make both types of new user forms
		 * uniquely targetable. Contexts are 'add-existing-user' (Multisite),
		 * and 'add-new-user' (single site and network admin).
		 *
		 * @since 3.7.0
		 *
		 * @param string $type A contextual string specifying which type of new user form the hook follows.
		 * @Reference wp-admin\user-new.php do_action( 'user_new_form', 'add-existing-user' )
	* @Reference wp-admin\user-new.php do_action( 'user_new_form', 'add-new-user' )
	*/
	const UserNewForm = "user_new_form";
	/**
		 * Fires inside the adduser form tag.
		 *
		 * @since 3.0.0
		 * @Reference wp-admin\user-new.php do_action( 'user_new_form_tag' )
	* @Reference wp-admin\user-new.php do_action( 'user_new_form_tag' )
	*/
	const UserNewFormTag = "user_new_form_tag";
	/**
		 * Fires before user profile update errors are returned.
		 *
		 * @since 2.8.0
		 *
		 * @param WP_Error $errors WP_Error object (passed by reference).
		 * @param bool     $update  Whether this is a user update.
		 * @param stdClass $user   User object (passed by reference).
		 * @Reference wp-admin\includes\user.php do_action( 'user_profile_update_errors', array( &$errors, $update, &$user ) )
	*/
	const UserProfileUpdateErrors = "user_profile_update_errors";
	/**
			 * Fires immediately after a new user is registered.
			 *
			 * @since 1.5.0
			 *
			 * @param int $user_id User ID.
			 * @Reference wp-includes\user.php do_action( 'user_register', $user_id )
	*/
	const UserRegister = "user_register";
	/**
			 * Fires an action hook when the account action has been confirmed by the user.
			 *
			 * Using this you can assume the user has agreed to perform the action by
			 * clicking on the link in the confirmation email.
			 *
			 * After firing this action hook the page will redirect to wp-login a callback
			 * redirects or exits first.
			 *
			 * @since 4.9.6
			 *
			 * @param int $request_id Request ID.
			 * @Reference wp-login.php do_action( 'user_request_action_confirmed', $request_id )
	*/
	const UserRequestActionConfirmed = "user_request_action_confirmed";
	/**
			 * Fires before the password reset procedure is validated.
			 *
			 * @since 3.5.0
			 *
			 * @param object           $errors WP Error object.
			 * @param WP_User|WP_Error $user   WP_User object if the login and reset key match. WP_Error object otherwise.
			 * @Reference wp-login.php do_action( 'validate_password_reset', $errors, $user )
	*/
	const ValidatePasswordReset = "validate_password_reset";
	/**
			 * Add content to the welcome panel on the admin dashboard.
			 *
			 * To remove the default welcome panel, use remove_action():
			 *
			 *     remove_action( 'welcome_panel', 'wp_welcome_panel' );
			 *
			 * @since 3.5.0
			 * @Reference wp-admin\index.php do_action( 'welcome_panel' )
	*/
	const WelcomePanel = "welcome_panel";
	/**
		 * Fires early when editing the widgets displayed in sidebars.
		 *
		 * @since 2.8.0
		 * @Reference wp-admin\includes\ajax-actions.php do_action( 'widgets.php' )
	* @Reference wp-admin\includes\ajax-actions.php do_action( 'widgets.php' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'widgets.php' )
	* @Reference wp-includes\class-wp-customize-widgets.php do_action( 'widgets.php' )
	*/
	const WidgetsPhp = "widgets.php";
	/**
	 * Fires before the Widgets administration page content loads.
	 *
	 * @since 3.0.0
	 * @Reference wp-admin\widgets.php do_action( 'widgets_admin_page' )
	*/
	const WidgetsAdminPage = "widgets_admin_page";
	/**
		 * Fires after all default WordPress widgets have been registered.
		 *
		 * @since 2.2.0
		 * @Reference wp-includes\widgets.php do_action( 'widgets_init' )
	*/
	const WidgetsInit = "widgets_init";
	/**
			 * Fires once the WordPress environment has been set up.
			 *
			 * @since 2.1.0
			 *
			 * @param WP $this Current WordPress environment instance (passed by reference).
			 * @Reference wp-includes\class-wp.php do_action( 'wp', array( &$this ) )
	*/
	const Wp = "wp";
	/**
			 * Fires immediately after a new navigation menu item has been added.
			 *
			 * @since 4.4.0
			 *
			 * @see wp_update_nav_menu_item()
			 *
			 * @param int   $menu_id         ID of the updated menu.
			 * @param int   $menu_item_db_id ID of the new menu item.
			 * @param array $args            An array of arguments used to update/add the menu item.
			 * @Reference wp-includes\nav-menu.php do_action( 'wp_add_nav_menu_item', $menu_id, $menu_item_db_id, $args )
	*/
	const WpAddNavMenuItem = "wp_add_nav_menu_item";
	/**
		 * Fires after the admin bar is rendered.
		 *
		 * @since 3.1.0
		 * @Reference wp-includes\admin-bar.php do_action( 'wp_after_admin_bar_render' )
	*/
	const WpAfterAdminBarRender = "wp_after_admin_bar_render";
	/**
				 * Fires before a cropped image is saved.
				 *
				 * Allows to add filters to modify the way a cropped image is saved.
				 *
				 * @since 4.3.0
				 *
				 * @param string $context       The Customizer control requesting the cropped image.
				 * @param int    $attachment_id The attachment ID of the original image.
				 * @param string $cropped       Path to the cropped image file.
				 * @Reference wp-admin\includes\ajax-actions.php do_action( 'wp_ajax_crop_image_pre_save', $context, $attachment_id, $cropped )
	*/
	const WpAjaxCropImagePreSave = "wp_ajax_crop_image_pre_save";
	/**
		 * Fires before the user is authenticated.
		 *
		 * The variables passed to the callbacks are passed by reference,
		 * and can be modified by callback functions.
		 *
		 * @since 1.5.1
		 *
		 * @todo Decide whether to deprecate the wp_authenticate action.
		 *
		 * @param string $user_login    Username (passed by reference).
		 * @param string $user_password User password (passed by reference).
		 * @Reference wp-includes\user.php do_action( 'wp_authenticate', array( &$credentials['user_login'], &$credentials['user_password'] ) )
	*/
	const WpAuthenticate = "wp_authenticate";
	/**
		 * Fires before the admin bar is rendered.
		 *
		 * @since 3.1.0
		 * @Reference wp-includes\admin-bar.php do_action( 'wp_before_admin_bar_render' )
	*/
	const WpBeforeAdminBarRender = "wp_before_admin_bar_render";
	/**
		 * Fires before the comment is tested for blacklisted characters or words.
		 *
		 * @since 1.5.0
		 *
		 * @param string $author     Comment author.
		 * @param string $email      Comment author's email.
		 * @param string $url        Comment author's URL.
		 * @param string $comment    Comment content.
		 * @param string $user_ip    Comment author's IP address.
		 * @param string $user_agent Comment author's browser user agent.
		 * @Reference wp-includes\comment.php do_action( 'wp_blacklist_check', $author, $email, $url, $comment, $user_ip, $user_agent )
	*/
	const WpBlacklistCheck = "wp_blacklist_check";
	/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since 5.2.0
		 * @Reference wp-includes\general-template.php do_action( 'wp_body_open' )
	*/
	const WpBodyOpen = "wp_body_open";
	/**
				 * Fires after the header image is set or an error is returned.
				 *
				 * @since 2.1.0
				 *
				 * @param string $file          Path to the file.
				 * @param int    $attachment_id Attachment ID.
				 * @Reference wp-admin\includes\class-custom-image-header.php do_action( 'wp_create_file_in_uploads', $file, $attachment_id )
	* @Reference wp-admin\includes\class-custom-background.php do_action( 'wp_create_file_in_uploads', $file, $id )
	*/
	const WpCreateFileInUploads = "wp_create_file_in_uploads";
	/**
			 * Fires after a navigation menu is successfully created.
			 *
			 * @since 3.0.0
			 *
			 * @param int   $term_id   ID of the new menu.
			 * @param array $menu_data An array of menu data.
			 * @Reference wp-includes\nav-menu.php do_action( 'wp_create_nav_menu', $_menu['term_id'], $menu_data )
	*/
	const WpCreateNavMenu = "wp_create_nav_menu";
	/**
			 * Fires before an autosave is stored.
			 *
			 * @since 4.1.0
			 *
			 * @param array $new_autosave Post array - the autosave that is about to be saved.
			 * @Reference wp-admin\includes\post.php do_action( 'wp_creating_autosave', $new_autosave )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-autosaves-controller.php do_action( 'wp_creating_autosave', $new_autosave )
	*/
	const WpCreatingAutosave = "wp_creating_autosave";
	/**
			 * Fires after core widgets for the admin dashboard have been registered.
			 *
			 * @since 2.5.0
			 * @Reference wp-admin\includes\dashboard.php do_action( 'wp_dashboard_setup' )
	*/
	const WpDashboardSetup = "wp_dashboard_setup";
	/**
			 * Fires when the WP_Scripts instance is initialized.
			 *
			 * @since 2.6.0
			 *
			 * @param WP_Scripts $this WP_Scripts instance (passed by reference).
			 * @Reference wp-includes\class.wp-scripts.php do_action( 'wp_default_scripts', array( &$this ) )
	*/
	const WpDefaultScripts = "wp_default_scripts";
	/**
			 * Fires when the WP_Styles instance is initialized.
			 *
			 * @since 2.6.0
			 *
			 * @param WP_Styles $this WP_Styles instance (passed by reference).
			 * @Reference wp-includes\class.wp-styles.php do_action( 'wp_default_styles', array( &$this ) )
	*/
	const WpDefaultStyles = "wp_default_styles";
	/**
			 * Fires after a navigation menu has been successfully deleted.
			 *
			 * @since 3.0.0
			 *
			 * @param int $term_id ID of the deleted menu.
			 * @Reference wp-includes\nav-menu.php do_action( 'wp_delete_nav_menu', $menu->term_id )
	*/
	const WpDeleteNavMenu = "wp_delete_nav_menu";
	/**
			 * Fires once a post revision has been deleted.
			 *
			 * @since 2.6.0
			 *
			 * @param int          $revision_id Post revision ID.
			 * @param object|array $revision    Post revision object or array.
			 * @Reference wp-includes\revision.php do_action( 'wp_delete_post_revision', $revision->ID, $revision )
	*/
	const WpDeletePostRevision = "wp_delete_post_revision";
	/**
		 * Fires once a site has been deleted from the database.
		 *
		 * @since 5.1.0
		 *
		 * @param WP_Site $old_site Deleted site object.
		 * @Reference wp-includes\ms-site.php do_action( 'wp_delete_site', $old_site )
	*/
	const WpDeleteSite = "wp_delete_site";
	/**
			 * Fires when an attachment type can't be rendered in the edit form.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Post $post A post object.
			 * @Reference wp-admin\includes\media.php do_action( 'wp_edit_form_attachment_display', $post )
	*/
	const WpEditFormAttachmentDisplay = "wp_edit_form_attachment_display";
	/**
		 * Fires when scripts and styles are enqueued for the code editor.
		 *
		 * @since 4.9.0
		 *
		 * @param array $settings Settings for the enqueued code editor.
		 * @Reference wp-includes\general-template.php do_action( 'wp_enqueue_code_editor', $settings )
	*/
	const WpEnqueueCodeEditor = "wp_enqueue_code_editor";
	/**
			 * Fires when scripts and styles are enqueued for the editor.
			 *
			 * @since 3.9.0
			 *
			 * @param array $to_load An array containing boolean values whether TinyMCE
			 *                       and Quicktags are being loaded.
			 * @Reference wp-includes\class-wp-editor.php do_action(			'wp_enqueue_editor',			array(				'tinymce'   => ( $default_scripts || self::$has_tinymce ),				'quicktags' => ( $default_scripts || self::$has_quicktags ),			)		)
	*/
	const WpEnqueueEditor = "wp_enqueue_editor";
	/**
		 * Fires at the conclusion of wp_enqueue_media().
		 *
		 * @since 3.5.0
		 * @Reference wp-includes\media.php do_action( 'wp_enqueue_media' )
	*/
	const WpEnqueueMedia = "wp_enqueue_media";
	/**
		 * Fires when scripts and styles are enqueued.
		 *
		 * @since 2.8.0
		 * @Reference wp-includes\script-loader.php do_action( 'wp_enqueue_scripts' )
	* @Reference wp-includes\script-loader.php do_action('wp_enqueue_scripts')
	*/
	const WpEnqueueScripts = "wp_enqueue_scripts";
	/**
		 * Fires just before processing the SimplePie feed object.
		 *
		 * @since 3.0.0
		 *
		 * @param object $feed SimplePie feed object (passed by reference).
		 * @param mixed  $url  URL of feed to retrieve. If an array of URLs, the feeds are merged.
		 * @Reference wp-includes\feed.php do_action( 'wp_feed_options', array( &$feed, $url ) )
	*/
	const WpFeedOptions = "wp_feed_options";
	/**
		 * Prints scripts or data before the closing body tag on the front end.
		 *
		 * @since 1.5.1
		 * @Reference wp-includes\general-template.php do_action( 'wp_footer' )
	*/
	const WpFooter = "wp_footer";
	/**
		 * Prints scripts or data in the head tag on the front end.
		 *
		 * @since 1.5.0
		 * @Reference wp-includes\general-template.php do_action( 'wp_head' )
	*/
	const WpHead = "wp_head";
	/**
		 * Fires when a site's initialization routine should be executed.
		 *
		 * @since 5.1.0
		 *
		 * @param WP_Site $new_site New site object.
		 * @param array   $args     Arguments for the initialization.
		 * @Reference wp-includes\ms-site.php do_action( 'wp_initialize_site', $new_site, $args )
	*/
	const WpInitializeSite = "wp_initialize_site";
	/**
		 * Fires immediately after a comment is inserted into the database.
		 *
		 * @since 2.8.0
		 *
		 * @param int        $id      The comment ID.
		 * @param WP_Comment $comment Comment object.
		 * @Reference wp-includes\comment.php do_action( 'wp_insert_comment', $id, $comment )
	*/
	const WpInsertComment = "wp_insert_comment";
	/**
		 * Fires once a post has been saved.
		 *
		 * @since 2.0.0
		 *
		 * @param int     $post_ID Post ID.
		 * @param WP_Post $post    Post object.
		 * @param bool    $update  Whether this is an existing post being updated or not.
		 * @Reference wp-includes\post.php do_action( 'wp_insert_post', $post_ID, $post, $update )
	* @Reference wp-includes\class-wp-customize-manager.php do_action( 'wp_insert_post', $post->ID, $post, true )
	* @Reference wp-includes\post.php do_action( 'wp_insert_post', $post->ID, $post, true )
	*/
	const WpInsertPost = "wp_insert_post";
	/**
		 * Fires once a site has been inserted into the database.
		 *
		 * @since 5.1.0
		 *
		 * @param WP_Site $new_site New site object.
		 * @Reference wp-includes\ms-site.php do_action( 'wp_insert_site', $new_site )
	*/
	const WpInsertSite = "wp_insert_site";
	/**
			 * Fires after a site is fully installed.
			 *
			 * @since 3.9.0
			 *
			 * @param WP_User $user The site owner.
			 * @Reference wp-admin\includes\upgrade.php do_action( 'wp_install', $user )
	*/
	const WpInstall = "wp_install";
	/**
	 * This hook is fired once WP, all plugins, and the theme are fully loaded and instantiated.
	 *
	 * Ajax requests should use wp-admin/admin-ajax.php. admin-ajax.php can handle requests for
	 * users not logged in.
	 *
	 * @link https://codex.wordpress.org/AJAX_in_Plugins
	 *
	 * @since 3.0.0
	 * @Reference wp-settings.php do_action( 'wp_loaded' )
	*/
	const WpLoaded = "wp_loaded";
	/**
		 * Fires after the user has successfully logged in.
		 *
		 * @since 1.5.0
		 *
		 * @param string  $user_login Username.
		 * @param WP_User $user       WP_User object of the logged-in user.
		 * @Reference wp-includes\user.php do_action( 'wp_login', $user->user_login, $user )
	*/
	const WpLogin = "wp_login";
	/**
				 * Fires after a user login has failed.
				 *
				 * @since 2.5.0
				 * @since 4.5.0 The value of `$username` can now be an email address.
				 *
				 * @param string $username Username or email address.
				 * @Reference wp-includes\pluggable.php do_action( 'wp_login_failed', $username )
	*/
	const WpLoginFailed = "wp_login_failed";
	/**
			 * Fires after a user is logged-out.
			 *
			 * @since 1.5.0
			 * @Reference wp-includes\pluggable.php do_action( 'wp_logout' )
	*/
	const WpLogout = "wp_logout";
	/**
				 * Fires after a phpmailerException is caught.
				 *
				 * @since 4.4.0
				 *
				 * @param WP_Error $error A WP_Error object with the phpmailerException message, and an array
				 *                        containing the mail recipient, subject, message, headers, and attachments.
				 * @Reference wp-includes\pluggable.php do_action( 'wp_mail_failed', new WP_Error( 'wp_mail_failed', $e->getMessage(), $mail_error_data ) )
	* @Reference wp-includes\pluggable.php do_action( 'wp_mail_failed', new WP_Error( 'wp_mail_failed', $e->getMessage(), $mail_error_data ) )
	*/
	const WpMailFailed = "wp_mail_failed";
	/**
			 * Fires during wp_cron, starting the auto update process.
			 *
			 * @since 3.9.0
			 * @Reference wp-includes\update.php do_action( 'wp_maybe_auto_update' )
	*/
	const WpMaybeAutoUpdate = "wp_maybe_auto_update";
	/**
		 * Fires before displaying echoed content in the sidebar.
		 *
		 * @since 1.5.0
		 * @Reference wp-includes\general-template.php do_action( 'wp_meta' )
	*/
	const WpMeta = "wp_meta";
	/**
			 * Fires after core widgets for the Network Admin dashboard have been registered.
			 *
			 * @since 3.1.0
			 * @Reference wp-admin\includes\dashboard.php do_action( 'wp_network_dashboard_setup' )
	*/
	const WpNetworkDashboardSetup = "wp_network_dashboard_setup";
	/**
			 * Prints and enqueues playlist scripts, styles, and JavaScript templates.
			 *
			 * @since 3.9.0
			 *
			 * @param string $type  Type of playlist. Possible values are 'audio' or 'video'.
			 * @param string $style The 'theme' for the playlist. Core provides 'light' and 'dark'.
			 * @Reference wp-includes\media.php do_action( 'wp_playlist_scripts', $atts['type'], $atts['style'] )
	*/
	const WpPlaylistScripts = "wp_playlist_scripts";
	/**
		 * Fires when footer scripts are printed.
		 *
		 * @since 2.8.0
		 * @Reference wp-includes\script-loader.php do_action( 'wp_print_footer_scripts' )
	*/
	const WpPrintFooterScripts = "wp_print_footer_scripts";
	/**
		 * Fires before scripts in the $handles queue are printed.
		 *
		 * @since 2.1.0
		 * @Reference wp-includes\functions.wp-scripts.php do_action( 'wp_print_scripts' )
	* @Reference wp-includes\script-loader.php do_action( 'wp_print_scripts' )
	* @Reference wp-includes\script-loader.php do_action( 'wp_print_scripts' )
	*/
	const WpPrintScripts = "wp_print_scripts";
	/**
	* @Reference wp-includes\functions.wp-styles.php do_action( 'wp_print_styles' )
	*/
	const WpPrintStyles = "wp_print_styles";
	/**
		 * Fires immediately after a personal data erasure request has been marked completed.
		 *
		 * @since 4.9.6
		 *
		 * @param int $request_id The privacy request post ID associated with this request.
		 * @Reference wp-admin\includes\privacy-tools.php do_action( 'wp_privacy_personal_data_erased', $request_id )
	*/
	const WpPrivacyPersonalDataErased = "wp_privacy_personal_data_erased";
	/**
		 * Generate the export file from the collected, grouped personal data.
		 *
		 * @since 4.9.6
		 *
		 * @param int $request_id The export request ID.
		 * @Reference wp-admin\includes\privacy-tools.php do_action( 'wp_privacy_personal_data_export_file', $request_id )
	*/
	const WpPrivacyPersonalDataExportFile = "wp_privacy_personal_data_export_file";
	/**
				 * Fires right after all personal data has been written to the export file.
				 *
				 * @since 4.9.6
				 *
				 * @param string $archive_pathname     The full path to the export file on the filesystem.
				 * @param string $archive_url          The URL of the archive file.
				 * @param string $html_report_pathname The full path to the personal data report on the filesystem.
				 * @param int    $request_id           The export request ID.
				 * @Reference wp-admin\includes\privacy-tools.php do_action( 'wp_privacy_personal_data_export_file_created', $archive_pathname, $archive_url, $html_report_pathname, $request_id )
	*/
	const WpPrivacyPersonalDataExportFileCreated = "wp_privacy_personal_data_export_file_created";
	/**
			 * Fires once for each registered widget.
			 *
			 * @since 3.0.0
			 *
			 * @param array $widget An array of default widget arguments.
			 * @Reference wp-includes\widgets.php do_action( 'wp_register_sidebar_widget', $widget )
	*/
	const WpRegisterSidebarWidget = "wp_register_sidebar_widget";
	/**
		 * Fires after a post revision has been restored.
		 *
		 * @since 2.6.0
		 *
		 * @param int $post_id     Post ID.
		 * @param int $revision_id Post revision ID.
		 * @Reference wp-includes\revision.php do_action( 'wp_restore_post_revision', $post_id, $revision['ID'] )
	*/
	const WpRestorePostRevision = "wp_restore_post_revision";
	/**
			 * After the roles have been initialized, allow plugins to add their own roles.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_Roles $this A reference to the WP_Roles object.
			 * @Reference wp-includes\class-wp-roles.php do_action( 'wp_roles_init', $this )
	*/
	const WpRolesInit = "wp_roles_init";
	/**
		 * Fires immediately before transitioning a comment's status from one to another
		 * in the database.
		 *
		 * @since 1.5.0
		 *
		 * @param int         $comment_id     Comment ID.
		 * @param string|bool $comment_status Current comment status. Possible values include
		 *                                    'hold', 'approve', 'spam', 'trash', or false.
		 * @Reference wp-includes\comment.php do_action( 'wp_set_comment_status', $comment->comment_ID, $comment_status )
	* @Reference wp-includes\comment.php do_action( 'wp_set_comment_status', $comment->comment_ID, 'delete' )
	*/
	const WpSetCommentStatus = "wp_set_comment_status";
	/**
			 * Fires after tinymce.js is loaded, but before any TinyMCE editor
			 * instances are created.
			 *
			 * @since 3.9.0
			 *
			 * @param array $mce_settings TinyMCE settings array.
			 * @Reference wp-includes\class-wp-editor.php do_action( 'wp_tiny_mce_init', self::$mce_settings )
	*/
	const WpTinyMceInit = "wp_tiny_mce_init";
	/**
		 * Fires before a post is sent to the trash.
		 *
		 * @since 3.3.0
		 *
		 * @param int $post_id Post ID.
		 * @Reference wp-includes\post.php do_action( 'wp_trash_post', $post_id )
	* @Reference wp-includes\class-wp-customize-manager.php do_action( 'wp_trash_post', $post_id )
	*/
	const WpTrashPost = "wp_trash_post";
	/**
		 * Fires when a site's uninitialization routine should be executed.
		 *
		 * @since 5.1.0
		 *
		 * @param WP_Site $old_site Deleted site object.
		 * @Reference wp-includes\ms-site.php do_action( 'wp_uninitialize_site', $old_site )
	*/
	const WpUninitializeSite = "wp_uninitialize_site";
	/**
		 * Fires just before a widget is removed from a sidebar.
		 *
		 * @since 3.0.0
		 *
		 * @param int $id The widget ID.
		 * @Reference wp-includes\widgets.php do_action( 'wp_unregister_sidebar_widget', $id )
	*/
	const WpUnregisterSidebarWidget = "wp_unregister_sidebar_widget";
	/**
		 * Fires immediately after a post's comment count is updated in the database.
		 *
		 * @since 2.3.0
		 *
		 * @param int $post_id Post ID.
		 * @param int $new     The new comment count.
		 * @param int $old     The old comment count.
		 * @Reference wp-includes\comment.php do_action( 'wp_update_comment_count', $post_id, $new, $old )
	*/
	const WpUpdateCommentCount = "wp_update_comment_count";
	/**
		 * Fires after a navigation menu has been successfully updated.
		 *
		 * @since 3.0.0
		 *
		 * @param int   $menu_id   ID of the updated menu.
		 * @param array $menu_data An array of menu data.
		 * @Reference wp-includes\nav-menu.php do_action( 'wp_update_nav_menu', $menu_id, $menu_data )
	* @Reference wp-admin\includes\nav-menu.php do_action( 'wp_update_nav_menu', $nav_menu_selected_id )
	*/
	const WpUpdateNavMenu = "wp_update_nav_menu";
	/**
		 * Fires after a navigation menu item has been updated.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_update_nav_menu_item()
		 *
		 * @param int   $menu_id         ID of the updated menu.
		 * @param int   $menu_item_db_id ID of the updated menu item.
		 * @param array $args            An array of arguments used to update a menu item.
		 * @Reference wp-includes\nav-menu.php do_action( 'wp_update_nav_menu_item', $menu_id, $menu_item_db_id, $args )
	*/
	const WpUpdateNavMenuItem = "wp_update_nav_menu_item";
	/**
		 * Fires once a site has been updated in the database.
		 *
		 * @since 5.1.0
		 *
		 * @param WP_Site $new_site New site object.
		 * @param WP_Site $old_site Old site object.
		 * @Reference wp-includes\ms-site.php do_action( 'wp_update_site', $new_site, $old_site )
	*/
	const WpUpdateSite = "wp_update_site";
	/**
			 * Fires after a site is fully upgraded.
			 *
			 * @since 3.9.0
			 *
			 * @param int $wp_db_version         The new $wp_db_version.
			 * @param int $wp_current_db_version The old (current) $wp_db_version.
			 * @Reference wp-admin\includes\upgrade.php do_action( 'wp_upgrade', $wp_db_version, $wp_current_db_version )
	*/
	const WpUpgrade = "wp_upgrade";
	/**
			 * Fires after core widgets for the User Admin dashboard have been registered.
			 *
			 * @since 3.1.0
			 * @Reference wp-admin\includes\dashboard.php do_action( 'wp_user_dashboard_setup' )
	*/
	const WpUserDashboardSetup = "wp_user_dashboard_setup";
	/**
		 * Fires when data should be validated for a site prior to inserting or updating in the database.
		 *
		 * Plugins should amend the `$errors` object via its `WP_Error::add()` method.
		 *
		 * @since 5.1.0
		 *
		 * @param WP_Error     $errors   Error object to add validation errors to.
		 * @param array        $data     Associative array of complete site data. See {@see wp_insert_site()}
		 *                               for the included data.
		 * @param WP_Site|null $old_site The old site object if the data belongs to a site being updated,
		 *                               or null if it is a new site being inserted.
		 * @Reference wp-includes\ms-site.php do_action( 'wp_validate_site_data', $errors, $data, $old_site )
	*/
	const WpValidateSiteData = "wp_validate_site_data";
	/**
		 * Fires before a site should be deleted from the database.
		 *
		 * Plugins should amend the `$errors` object via its `WP_Error::add()` method. If any errors
		 * are present, the site will not be deleted.
		 *
		 * @since 5.1.0
		 *
		 * @param WP_Error $errors   Error object to add validation errors to.
		 * @param WP_Site  $old_site The site object to be deleted.
		 * @Reference wp-includes\ms-site.php do_action( 'wp_validate_site_deletion', $errors, $old_site )
	*/
	const WpValidateSiteDeletion = "wp_validate_site_deletion";
	/**
			 * Fires when nonce verification fails.
			 *
			 * @since 4.4.0
			 *
			 * @param string     $nonce  The invalid nonce.
			 * @param string|int $action The nonce action.
			 * @param WP_User    $user   The current user object.
			 * @param string     $token  The user's session token.
			 * @Reference wp-includes\pluggable.php do_action( 'wp_verify_nonce_failed', $nonce, $action, $user, $token )
	*/
	const WpVerifyNonceFailed = "wp_verify_nonce_failed";
	/**
	 * Fires to allow a plugin to do a complete takeover of Post by Email.
	 *
	 * @since 2.9.0
	 * @Reference wp-mail.php do_action( 'wp-mail.php' )
	*/
	const WpMailPhp = "wp-mail.php";
	/**
		 * Fires immediately after a site is activated.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int    $blog_id       Blog ID.
		 * @param int    $user_id       User ID.
		 * @param int    $password      User password.
		 * @param string $signup_title  Site title.
		 * @param array  $meta          Signup meta data. By default, contains the requested privacy setting and lang_id.
		 * @Reference wp-includes\ms-functions.php do_action( 'wpmu_activate_blog', $blog_id, $user_id, $password, $signup->title, $meta )
	*/
	const WpmuActivateBlog = "wpmu_activate_blog";
	/**
			 * Fires immediately after a new user is activated.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param int   $user_id  User ID.
			 * @param int   $password User password.
			 * @param array $meta     Signup meta data.
			 * @Reference wp-includes\ms-functions.php do_action( 'wpmu_activate_user', $user_id, $password, $meta )
	*/
	const WpmuActivateUser = "wpmu_activate_user";
	/**
		 * Fires after the blog details are updated.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int $blog_id Site ID.
		 * @Reference wp-includes\ms-blogs.php do_action( 'wpmu_blog_updated', $site_id )
	*/
	const WpmuBlogUpdated = "wpmu_blog_updated";
	/**
		 * Fires before a user is deleted from the network.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int $id ID of the user about to be deleted from the network.
		 * @Reference wp-admin\includes\ms.php do_action( 'wpmu_delete_user', $id )
	*/
	const WpmuDeleteUser = "wpmu_delete_user";
	/**
			 * Fires immediately after a new site is created.
			 *
			 * @since MU (3.0.0)
			 * @deprecated 5.1.0 Use wp_insert_site
			 *
			 * @param int    $site_id    Site ID.
			 * @param int    $user_id    User ID.
			 * @param string $domain     Site domain.
			 * @param string $path       Site path.
			 * @param int    $network_id Network ID. Only relevant on multi-network installations.
			 * @param array  $meta       Meta data. Used to set initial site options.
			 * @Reference wp-includes\ms-site.php do_action( 'wpmu_new_blog', array( $new_site->id, $user_id, $new_site->domain, $new_site->path, $new_site->network_id, $meta ), '5.1.0', 'wp_insert_site' )
	*/
	const WpmuNewBlog = "wpmu_new_blog";
	/**
		 * Fires immediately after a new user is created.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int $user_id User ID.
		 * @Reference wp-includes\ms-functions.php do_action( 'wpmu_new_user', $user_id )
	*/
	const WpmuNewUser = "wpmu_new_user";
	/**
			 * Fires at the end of the Network Settings form, before the submit button.
			 *
			 * @since MU (3.0.0)
			 * @Reference wp-admin\network\settings.php do_action( 'wpmu_options' )
	*/
	const WpmuOptions = "wpmu_options";
	/**
		 * Fires after the site options are updated.
		 *
		 * @since 3.0.0
		 * @since 4.4.0 Added `$id` parameter.
		 *
		 * @param int $id The ID of the site being updated.
		 * @Reference wp-admin\network\site-settings.php do_action( 'wpmu_update_blog_options', $id )
	*/
	const WpmuUpdateBlogOptions = "wpmu_update_blog_options";
	/**
			 * Fires before the footer on the network upgrade screen.
			 *
			 * @since MU (3.0.0)
			 * @Reference wp-admin\network\upgrade.php do_action( 'wpmu_upgrade_page' )
	*/
	const WpmuUpgradePage = "wpmu_upgrade_page";
	/**
				 * Fires after each site has been upgraded.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param int $site_id The Site ID.
				 * @Reference wp-admin\network\upgrade.php do_action( 'wpmu_upgrade_site', $site_id )
	*/
	const WpmuUpgradeSite = "wpmu_upgrade_site";
	/**
	 * Fires just before the action handler in several Network Admin screens.
	 *
	 * This hook fires on multiple screens in the Multisite Network Admin,
	 * including Users, Network Settings, and Site Settings.
	 *
	 * @since 3.0.0
	 * @Reference wp-admin\network\edit.php do_action( 'wpmuadminedit' )
	* @Reference wp-admin\network\settings.php do_action( 'wpmuadminedit' )
	* @Reference wp-admin\network\sites.php do_action( 'wpmuadminedit' )
	* @Reference wp-admin\network\users.php do_action( 'wpmuadminedit' )
	*/
	const Wpmuadminedit = "wpmuadminedit";
	/**
			 * Fires in the Network Admin 'Right Now' dashboard widget
			 * just before the user and site search form fields.
			 *
			 * @since MU (3.0.0)
			 * @Reference wp-admin\includes\dashboard.php do_action( 'wpmuadminresult' )
	*/
	const Wpmuadminresult = "wpmuadminresult";
	/**
				 * Fires inside the auxiliary 'Actions' column of the Sites list table.
				 *
				 * By default this column is hidden unless something is hooked to the action.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param int $blog_id The site ID.
				 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php do_action( 'wpmublogsaction', $blog['blog_id'] )
	*/
	const Wpmublogsaction = "wpmublogsaction";
	/**
			 * Fires at the end of the Edit Site form, before the submit button.
			 *
			 * @since 3.0.0
			 *
			 * @param int $id Site ID.
			 * @Reference wp-admin\network\site-settings.php do_action( 'wpmueditblogaction', $id )
	*/
	const Wpmueditblogaction = "wpmueditblogaction";
	/**
			 * Fires after the XML-RPC user has been authenticated but before the rest of
			 * the method logic begins.
			 *
			 * All built-in XML-RPC methods use the action xmlrpc_call, with a parameter
			 * equal to the method's name, e.g., wp.getUsersBlogs, wp.newPost, etc.
			 *
			 * @since 2.5.0
			 *
			 * @param string $name The method name.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getUsersBlogs' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'blogger.deletePost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'blogger.editPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'blogger.getPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'blogger.getRecentPosts' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'blogger.getUserInfo' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'blogger.getUsersBlogs' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'blogger.newPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'metaWeblog.editPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'metaWeblog.getCategories' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'metaWeblog.getPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'metaWeblog.getRecentPosts' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'metaWeblog.newMediaObject' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'metaWeblog.newPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.getCategoryList' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.getPostCategories' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.getRecentPostTitles' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.getTrackbackPings' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.publishPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.setPostCategories' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.supportedMethods' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'mt.supportedTextFilters' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'pingback.extensions.getPingbacks' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'pingback.ping' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.deleteCategory' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.deleteComment' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.deletePage' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.deletePost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.deleteTerm' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.editComment' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.editPage' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.editPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.editProfile' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.editTerm' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getAuthors' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getComment' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getCommentCount' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getComments' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getCommentStatusList' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getKeywords' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getMediaItem' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getMediaLibrary' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPage' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPageList' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPages' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPageStatusList' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPostFormats' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPosts' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPostStatusList' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPostType' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getPostTypes' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getProfile' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getRevisions' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getTaxonomies' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getTaxonomy' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getTerm' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getTerms' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getUser' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.getUsers' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.newCategory' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.newComment' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.newPage' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.newPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.newTerm' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.restoreRevision' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call', 'wp.suggestCategories' )
	*/
	const XmlrpcCall = "xmlrpc_call";
	/**
			 * Fires after a post has been successfully deleted via the XML-RPC Blogger API.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $post_ID ID of the deleted post.
			 * @param array $args    An array of arguments to delete the post.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_blogger_deletePost', $post_ID, $args )
	*/
	const XmlrpcCallSuccessBloggerDeletepost = "xmlrpc_call_success_blogger_deletePost";
	/**
			 * Fires after a post has been successfully updated via the XML-RPC Blogger API.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $post_ID ID of the updated post.
			 * @param array $args    An array of arguments for the post to edit.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_blogger_editPost', $post_ID, $args )
	*/
	const XmlrpcCallSuccessBloggerEditpost = "xmlrpc_call_success_blogger_editPost";
	/**
			 * Fires after a new post has been successfully created via the XML-RPC Blogger API.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $post_ID ID of the new post.
			 * @param array $args    An array of new post arguments.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_blogger_newPost', $post_ID, $args )
	*/
	const XmlrpcCallSuccessBloggerNewpost = "xmlrpc_call_success_blogger_newPost";
	/**
			 * Fires after a post has been successfully updated via the XML-RPC MovableType API.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $post_ID ID of the updated post.
			 * @param array $args    An array of arguments to update the post.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_mw_editPost', $post_ID, $args )
	*/
	const XmlrpcCallSuccessMwEditpost = "xmlrpc_call_success_mw_editPost";
	/**
			 * Fires after a new attachment has been added via the XML-RPC MovableType API.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $id   ID of the new attachment.
			 * @param array $args An array of arguments to add the attachment.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_mw_newMediaObject', $id, $args )
	*/
	const XmlrpcCallSuccessMwNewmediaobject = "xmlrpc_call_success_mw_newMediaObject";
	/**
			 * Fires after a new post has been successfully created via the XML-RPC MovableType API.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $post_ID ID of the new post.
			 * @param array $args    An array of arguments to create the new post.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_mw_newPost', $post_ID, $args )
	*/
	const XmlrpcCallSuccessMwNewpost = "xmlrpc_call_success_mw_newPost";
	/**
				 * Fires after a category has been successfully deleted via XML-RPC.
				 *
				 * @since 3.4.0
				 *
				 * @param int   $category_id ID of the deleted category.
				 * @param array $args        An array of arguments to delete the category.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_wp_deleteCategory', $category_id, $args )
	*/
	const XmlrpcCallSuccessWpDeletecategory = "xmlrpc_call_success_wp_deleteCategory";
	/**
				 * Fires after a comment has been successfully deleted via XML-RPC.
				 *
				 * @since 3.4.0
				 *
				 * @param int   $comment_ID ID of the deleted comment.
				 * @param array $args       An array of arguments to delete the comment.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_wp_deleteComment', $comment_ID, $args )
	*/
	const XmlrpcCallSuccessWpDeletecomment = "xmlrpc_call_success_wp_deleteComment";
	/**
			 * Fires after a page has been successfully deleted via XML-RPC.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $page_id ID of the deleted page.
			 * @param array $args    An array of arguments to delete the page.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_wp_deletePage', $page_id, $args )
	*/
	const XmlrpcCallSuccessWpDeletepage = "xmlrpc_call_success_wp_deletePage";
	/**
			 * Fires after a comment has been successfully updated via XML-RPC.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $comment_ID ID of the updated comment.
			 * @param array $args       An array of arguments to update the comment.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_wp_editComment', $comment_ID, $args )
	*/
	const XmlrpcCallSuccessWpEditcomment = "xmlrpc_call_success_wp_editComment";
	/**
			 * Fires after a new category has been successfully created via XML-RPC.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $cat_id ID of the new category.
			 * @param array $args   An array of new category arguments.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_wp_newCategory', $cat_id, $args )
	*/
	const XmlrpcCallSuccessWpNewcategory = "xmlrpc_call_success_wp_newCategory";
	/**
			 * Fires after a new comment has been successfully created via XML-RPC.
			 *
			 * @since 3.4.0
			 *
			 * @param int   $comment_ID ID of the new comment.
			 * @param array $args       An array of new comment arguments.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php do_action( 'xmlrpc_call_success_wp_newComment', $comment_ID, $args )
	*/
	const XmlrpcCallSuccessWpNewcomment = "xmlrpc_call_success_wp_newComment";
	/**
			 * Fires when _publish_post_hook() is called during an XML-RPC request.
			 *
			 * @since 2.1.0
			 *
			 * @param int $post_id Post ID.
			 * @Reference wp-includes\post.php do_action( 'xmlrpc_publish_post', $post_id )
	*/
	const XmlrpcPublishPost = "xmlrpc_publish_post";
	/**
				 * Add additional APIs to the Really Simple Discovery (RSD) endpoint.
				 *
				 * @link http://cyber.law.harvard.edu/blogs/gems/tech/rsd.html
				 *
				 * @since 3.5.0
				 * @Reference xmlrpc.php do_action( 'xmlrpc_rsd_apis' )
	*/
	const XmlrpcRsdApis = "xmlrpc_rsd_apis";
	}
}