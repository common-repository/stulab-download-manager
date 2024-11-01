<?php
if (!defined('STUWPFILTERHOOKS')) {
	define('STUWPFILTERHOOKS',1);

	abstract class WpFilterHooks {
	/**
		 * Filters the permalink for a non-page_on_front page.
		 *
		 * @since 2.1.0
		 *
		 * @param string $link    The page's permalink.
		 * @param int    $post_id The ID of the page.
		 * @Reference wp-includes\link-template.php apply_filters( '_get_page_link', $link, $post->ID )
	*/
	const GetPageLink = "_get_page_link";
	/**
		 * Filters the list of fields saved in post revisions.
		 *
		 * Included by default: 'post_title', 'post_content' and 'post_excerpt'.
		 *
		 * Disallowed fields: 'ID', 'post_name', 'post_parent', 'post_date',
		 * 'post_date_gmt', 'post_status', 'post_type', 'comment_count',
		 * and 'post_author'.
		 *
		 * @since 2.6.0
		 * @since 4.5.0 The `$post` parameter was added.
		 *
		 * @param array $fields List of fields to revision. Contains 'post_title',
		 *                      'post_content', and 'post_excerpt' by default.
		 * @param array $post   A post array being processed for insertion as a post revision.
		 * @Reference wp-includes\revision.php apply_filters( '_wp_post_revision_fields', $fields, $post )
	*/
	const WpPostRevisionFields = "_wp_post_revision_fields";
	/**
		 * Filters the relative path to an uploaded file.
		 *
		 * @since 2.9.0
		 *
		 * @param string $new_path Relative path to the file.
		 * @param string $path     Full path to the file.
		 * @Reference wp-includes\post.php apply_filters( '_wp_relative_upload_path', $new_path, $path )
	*/
	const WpRelativeUploadPath = "_wp_relative_upload_path";
	/**
		 * Filters administration menus array with classes added for top-level items.
		 *
		 * @since 2.7.0
		 *
		 * @param array $menu Associative array of administration menu items.
		 * @Reference wp-admin\includes\menu.php apply_filters( 'add_menu_classes', $menu )
	*/
	const AddMenuClasses = "add_menu_classes";
	/**
		 * Filters the new ping URL to add for the given post.
		 *
		 * @since 2.0.0
		 *
		 * @param string $new New ping URL to add.
		 * @Reference wp-includes\post.php apply_filters( 'add_ping', $new )
	*/
	const AddPing = "add_ping";
	/**
		 * Filters the new default site meta variables.
		 *
		 * @since 3.0.0
		 *
		 * @param array $meta {
		 *     An array of default site meta variables.
		 *
		 *     @type int $lang_id     The language ID.
		 *     @type int $blog_public Whether search engines should be discouraged from indexing the site. 1 for true, 0 for false.
		 * }
		 * @Reference wp-signup.php apply_filters( 'add_signup_meta', $meta_defaults )
	* @Reference wp-signup.php apply_filters( 'add_signup_meta', $signup_meta )
	* @Reference wp-signup.php apply_filters( 'add_signup_meta', array() )
	*/
	const AddSignupMeta = "add_signup_meta";
	/**
	* @Reference wp-admin\user-edit.php apply_filters( 'additional_capabilities_display', true, $profileuser )
	*/
	const AdditionalCapabilitiesDisplay = "additional_capabilities_display";
	/**
	 * Filters the CSS classes for the body tag in the admin.
	 *
	 * This filter differs from the {@see 'post_class'} and {@see 'body_class'} filters
	 * in two important ways:
	 *
	 * 1. `$classes` is a space-separated string of class names instead of an array.
	 * 2. Not all core admin classes are filterable, notably: wp-admin, wp-core-ui,
	 *    and no-js cannot be removed.
	 *
	 * @since 2.3.0
	 *
	 * @param string $classes Space-separated list of CSS classes.
	 * @Reference wp-admin\admin-header.php apply_filters( 'admin_body_class', '' )
	* @Reference wp-admin\includes\template.php apply_filters( 'admin_body_class', '' )
	*/
	const AdminBodyClass = "admin_body_class";
	/**
					 * Filters the comment types dropdown menu.
					 *
					 * @since 2.7.0
					 *
					 * @param string[] $comment_types An array of comment types. Accepts 'Comments', 'Pings'.
					 * @Reference wp-admin\includes\class-wp-comments-list-table.php apply_filters(					'admin_comment_types_dropdown',					array(						'comment' => __( 'Comments' ),						'pings'   => __( 'Pings' ),					)				)
	*/
	const AdminCommentTypesDropdown = "admin_comment_types_dropdown";
	/**
				 * Filters the interval for redirecting the user to the admin email confirmation screen.
				 * If `0` (zero) is returned, the user will not be redirected.
				 *
				 * @since 5.3.0
				 *
				 * @param int Interval time (in seconds).
				 * @Reference wp-login.php apply_filters( 'admin_email_check_interval', 6 * MONTH_IN_SECONDS )
	* @Reference wp-login.php apply_filters( 'admin_email_check_interval', 6 * MONTH_IN_SECONDS )
	*/
	const AdminEmailCheckInterval = "admin_email_check_interval";
	/**
			 * Filters the "Thank you" text displayed in the admin footer.
			 *
			 * @since 2.8.0
			 *
			 * @param string $text The content that will be printed.
			 * @Reference wp-admin\admin-footer.php apply_filters( 'admin_footer_text', '<span id="footer-thankyou">' . $text . '</span>' )
	*/
	const AdminFooterText = "admin_footer_text";
	/**
				 * Filters the maximum memory limit available for administration screens.
				 *
				 * This only applies to administrators, who may require more memory for tasks
				 * like updates. Memory limits when processing images (uploaded or edited by
				 * users of any role) are handled separately.
				 *
				 * The `WP_MAX_MEMORY_LIMIT` constant specifically defines the maximum memory
				 * limit available when in the administration back end. The default is 256M
				 * (256 megabytes of memory) or the original `memory_limit` php.ini value if
				 * this is higher.
				 *
				 * @since 3.0.0
				 * @since 4.6.0 The default now takes the original `memory_limit` into account.
				 *
				 * @param int|string $filtered_limit The maximum WordPress memory limit. Accepts an integer
				 *                                   (bytes), or a shorthand string notation, such as '256M'.
				 * @Reference wp-includes\functions.php apply_filters( 'admin_memory_limit', $filtered_limit )
	*/
	const AdminMemoryLimit = "admin_memory_limit";
	/**
		 * Filters the admin post thumbnail HTML markup to return.
		 *
		 * @since 2.9.0
		 * @since 3.5.0 Added the `$post_id` parameter.
		 * @since 4.6.0 Added the `$thumbnail_id` parameter.
		 *
		 * @param string   $content      Admin post thumbnail HTML markup.
		 * @param int      $post_id      Post ID.
		 * @param int|null $thumbnail_id Thumbnail attachment ID, or null if there isn't one.
		 * @Reference wp-admin\includes\post.php apply_filters( 'admin_post_thumbnail_html', $content, $post->ID, $thumbnail_id )
	*/
	const AdminPostThumbnailHtml = "admin_post_thumbnail_html";
	/**
			 * Filters the size used to display the post thumbnail image in the 'Featured Image' meta box.
			 *
			 * Note: When a theme adds 'post-thumbnail' support, a special 'post-thumbnail'
			 * image size is registered, which differs from the 'thumbnail' image size
			 * managed via the Settings > Media screen. See the `$size` parameter description
			 * for more information on default values.
			 *
			 * @since 4.4.0
			 *
			 * @param string|array $size         Post thumbnail image size to display in the meta box. Accepts any valid
			 *                                   image size, or an array of width and height values in pixels (in that order).
			 *                                   If the 'post-thumbnail' size is set, default is 'post-thumbnail'. Otherwise,
			 *                                   default is an array with 266 as both the height and width values.
			 * @param int          $thumbnail_id Post thumbnail attachment ID.
			 * @param WP_Post      $post         The post object associated with the thumbnail.
			 * @Reference wp-admin\includes\post.php apply_filters( 'admin_post_thumbnail_size', $size, $thumbnail_id, $post )
	*/
	const AdminPostThumbnailSize = "admin_post_thumbnail_size";
	/**
		 * Filters the admin referrer policy header value.
		 *
		 * @since 4.9.0
		 * @since 4.9.5 The default value was changed to 'strict-origin-when-cross-origin'.
		 *
		 * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Referrer-Policy
		 *
		 * @param string $policy The admin referrer policy header value. Default 'strict-origin-when-cross-origin'.
		 * @Reference wp-admin\includes\misc.php apply_filters( 'admin_referrer_policy', $policy )
	*/
	const AdminReferrerPolicy = "admin_referrer_policy";
	/**
	 * Filters the title tag content for an admin page.
	 *
	 * @since 3.1.0
	 *
	 * @param string $admin_title The page title, with extra context added.
	 * @param string $title       The original page title.
	 * @Reference wp-admin\admin-header.php apply_filters( 'admin_title', $admin_title, $title )
	*/
	const AdminTitle = "admin_title";
	/**
		 * Filters the admin area URL.
		 *
		 * @since 2.8.0
		 *
		 * @param string   $url     The complete admin area URL including scheme and path.
		 * @param string   $path    Path relative to the admin area URL. Blank string if no path is specified.
		 * @param int|null $blog_id Site ID, or null for the current site.
		 * @Reference wp-includes\link-template.php apply_filters( 'admin_url', $url, $path, $blog_id )
	*/
	const AdminUrl = "admin_url";
	/**
		 * Filters the arguments passed to WP_Query during an Ajax
		 * call for querying attachments.
		 *
		 * @since 3.7.0
		 *
		 * @see WP_Query::parse_query()
		 *
		 * @param array $query An array of query variables.
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'ajax_query_attachments_args', $query )
	*/
	const AjaxQueryAttachmentsArgs = "ajax_query_attachments_args";
	/**
			 * Filters the full array of plugins to list in the Plugins list table.
			 *
			 * @since 3.0.0
			 *
			 * @see get_plugins()
			 *
			 * @param array $all_plugins An array of plugins to display in the list table.
			 * @Reference wp-admin\includes\class-wp-plugins-list-table.php apply_filters( 'all_plugins', get_plugins() )
	*/
	const AllPlugins = "all_plugins";
	/**
				 * Filters the full array of WP_Theme objects to list in the Multisite
				 * themes list table.
				 *
				 * @since 3.1.0
				 *
				 * @param WP_Theme[] $all Array of WP_Theme objects to display in the list table.
				 * @Reference wp-admin\includes\class-wp-ms-themes-list-table.php apply_filters( 'all_themes', wp_get_themes() )
	*/
	const AllThemes = "all_themes";
	/**
		 * Filters all options after retrieving them.
		 *
		 * @since 4.9.0
		 *
		 * @param array $alloptions Array with all options.
		 * @Reference wp-includes\option.php apply_filters( 'alloptions', $alloptions )
	*/
	const Alloptions = "alloptions";
	/**
				 * Filters whether to enable automatic core updates for development versions.
				 *
				 * @since 3.7.0
				 *
				 * @param bool $upgrade_dev Whether to enable automatic updates for
				 *                          development versions.
				 * @Reference wp-admin\includes\class-core-upgrader.php apply_filters( 'allow_dev_auto_core_updates', $upgrade_dev )
	* @Reference wp-admin\includes\class-wp-site-health-auto-updates.php apply_filters( 'allow_dev_auto_core_updates', $wp_version )
	*/
	const AllowDevAutoCoreUpdates = "allow_dev_auto_core_updates";
	/**
		 * Filters whether an empty comment should be allowed.
		 *
		 * @since 5.1.0
		 *
		 * @param bool  $allow_empty_comment Whether to allow empty comments. Default false.
		 * @param array $commentdata         Array of comment data to be sent to wp_insert_comment().
		 * @Reference wp-includes\comment.php apply_filters( 'allow_empty_comment', false, $commentdata )
	*/
	const AllowEmptyComment = "allow_empty_comment";
	/**
				 * Filters whether to enable major automatic core updates.
				 *
				 * @since 3.7.0
				 *
				 * @param bool $upgrade_major Whether to enable major automatic core updates.
				 * @Reference wp-admin\includes\class-core-upgrader.php apply_filters( 'allow_major_auto_core_updates', $upgrade_major )
	*/
	const AllowMajorAutoCoreUpdates = "allow_major_auto_core_updates";
	/**
				 * Filters whether to enable minor automatic core updates.
				 *
				 * @since 3.7.0
				 *
				 * @param bool $upgrade_minor Whether to enable minor automatic core updates.
				 * @Reference wp-admin\includes\class-core-upgrader.php apply_filters( 'allow_minor_auto_core_updates', $upgrade_minor )
	* @Reference wp-admin\includes\class-wp-site-health-auto-updates.php apply_filters( 'allow_minor_auto_core_updates', true )
	*/
	const AllowMinorAutoCoreUpdates = "allow_minor_auto_core_updates";
	/**
		 * Filters whether to allow a password to be reset.
		 *
		 * @since 2.7.0
		 *
		 * @param bool $allow         Whether to allow the password to be reset. Default true.
		 * @param int  $user_data->ID The ID of the user attempting to reset a password.
		 * @Reference wp-includes\user.php apply_filters( 'allow_password_reset', $allow, $user->ID )
	*/
	const AllowPasswordReset = "allow_password_reset";
	/**
			 * Filters whether to enable the subdirectory installation feature in Multisite.
			 *
			 * @since 3.0.0
			 *
			 * @param bool $allow Whether to enable the subdirectory installation feature in Multisite. Default is false.
			 * @Reference wp-admin\includes\network.php apply_filters( 'allow_subdirectory_install', false )
	*/
	const AllowSubdirectoryInstall = "allow_subdirectory_install";
	/**
	 * Filters the allowed block types for the editor, defaulting to true (all
	 * block types supported).
	 *
	 * @since 5.0.0
	 *
	 * @param bool|array $allowed_block_types Array of block type slugs, or
	 *                                        boolean to enable/disable all.
	 * @param object $post                    The post resource data.
	 * @Reference wp-admin\edit-form-blocks.php apply_filters( 'allowed_block_types', true, $post )
	*/
	const AllowedBlockTypes = "allowed_block_types";
	/**
		 * Change the allowed HTTP origin result.
		 *
		 * @since 3.4.0
		 *
		 * @param string $origin     Origin URL if allowed, empty string if not.
		 * @param string $origin_arg Original origin string passed into is_allowed_http_origin function.
		 * @Reference wp-includes\http.php apply_filters( 'allowed_http_origin', $origin, $origin_arg )
	*/
	const AllowedHttpOrigin = "allowed_http_origin";
	/**
		 * Change the origin types allowed for HTTP requests.
		 *
		 * @since 3.4.0
		 *
		 * @param string[] $allowed_origins {
		 *     Array of default allowed HTTP origins.
		 *
		 *     @type string $0 Non-secure URL for admin origin.
		 *     @type string $1 Secure URL for admin origin.
		 *     @type string $2 Non-secure URL for home origin.
		 *     @type string $3 Secure URL for home origin.
		 * }
		 * @Reference wp-includes\http.php apply_filters( 'allowed_http_origins', $allowed_origins )
	*/
	const AllowedHttpOrigins = "allowed_http_origins";
	/**
			 * Filters the whitelist of hosts to redirect to.
			 *
			 * @since 2.3.0
			 *
			 * @param array       $hosts An array of allowed hosts.
			 * @param bool|string $host  The parsed host; empty if not isset.
			 * @Reference wp-includes\pluggable.php apply_filters( 'allowed_redirect_hosts', array( $wpp['host'] ), isset( $lp['host'] ) ? $lp['host'] : '' )
	*/
	const AllowedRedirectHosts = "allowed_redirect_hosts";
	/**
			 * Filters the array of themes allowed on the network.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string[] $allowed_themes An array of theme stylesheet names.
			 * @Reference wp-includes\class-wp-theme.php apply_filters( 'allowed_themes', $allowed_themes )
	*/
	const AllowedThemes = "allowed_themes";
	/**
				 * Filters whether to asynchronously update translation for core, a plugin, or a theme.
				 *
				 * @since 4.0.0
				 *
				 * @param bool   $update          Whether to update.
				 * @param object $language_update The update offer.
				 * @Reference wp-admin\includes\class-language-pack-upgrader.php apply_filters( 'async_update_translation', $update, $language_update )
	*/
	const AsyncUpdateTranslation = "async_update_translation";
	/**
					 * Filters the atom enclosure HTML link tag for the current post.
					 *
					 * @since 2.2.0
					 *
					 * @param string $html_link_tag The HTML link tag with a URI and other attributes.
					 * @Reference wp-includes\feed.php apply_filters( 'atom_enclosure', '<link href="' . esc_url( trim( $enclosure[0] ) ) . '" rel="enclosure" length="' . absint( trim( $enclosure[1] ) ) . '" type="' . esc_attr( trim( $enclosure[2] ) ) . '" />' . "\n" )
	*/
	const AtomEnclosure = "atom_enclosure";
	/**
			 * Filters the information attached to the newly created session.
			 *
			 * Can be used to attach further information to a session.
			 *
			 * @since 4.0.0
			 *
			 * @param array $session Array of extra data.
			 * @param int   $user_id User ID.
			 * @Reference wp-includes\class-wp-session-tokens.php apply_filters( 'attach_session_information', array(), $this->user_id )
	*/
	const AttachSessionInformation = "attach_session_information";
	/**
		 * Filters the attachment fields to edit.
		 *
		 * @since 2.5.0
		 *
		 * @param array   $form_fields An array of attachment form fields.
		 * @param WP_Post $post        The WP_Post attachment object.
		 * @Reference wp-admin\includes\media.php apply_filters( 'attachment_fields_to_edit', $form_fields, $post )
	* @Reference wp-admin\includes\media.php apply_filters( 'attachment_fields_to_edit', $form_fields, $post )
	*/
	const AttachmentFieldsToEdit = "attachment_fields_to_edit";
	/**
				 * Filters the attachment fields to be saved.
				 *
				 * @since 2.5.0
				 *
				 * @see wp_get_attachment_metadata()
				 *
				 * @param array $post       An array of post data.
				 * @param array $attachment An array of attachment metadata.
				 * @Reference wp-admin\includes\media.php apply_filters( 'attachment_fields_to_save', $post, $attachment )
	* @Reference wp-admin\includes\ajax-actions.php apply_filters( 'attachment_fields_to_save', $post, $attachment_data )
	* @Reference wp-admin\includes\post.php apply_filters( 'attachment_fields_to_save', $translated, $attachment_data )
	*/
	const AttachmentFieldsToSave = "attachment_fields_to_save";
	/**
	* @Reference wp-includes\deprecated.php apply_filters( 'attachment_icon', $icon, $post->ID )
	*/
	const AttachmentIcon = "attachment_icon";
	/**
	* @Reference wp-includes\deprecated.php apply_filters('attachment_innerHTML', $innerHTML, $post->ID)
	*/
	const AttachmentInnerhtml = "attachment_innerHTML";
	/**
		 * Filters the permalink for an attachment.
		 *
		 * @since 2.0.0
		 *
		 * @param string $link    The attachment's permalink.
		 * @param int    $post_id Attachment ID.
		 * @Reference wp-includes\link-template.php apply_filters( 'attachment_link', $link, $post->ID )
	*/
	const AttachmentLink = "attachment_link";
	/**
	* @Reference wp-includes\deprecated.php apply_filters('attachment_max_dims', $max_dims)
	*/
	const AttachmentMaxDims = "attachment_max_dims";
	/**
					 * Filters the parameters for the attachment thumbnail creation.
					 *
					 * @since 3.9.0
					 *
					 * @param array $image_attachment An array of parameters to create the thumbnail.
					 * @param array $metadata         Current attachment metadata.
					 * @param array $uploaded         An array containing the thumbnail path and url.
					 * @Reference wp-admin\includes\image.php apply_filters( 'attachment_thumbnail_args', $image_attachment, $metadata, $uploaded )
	*/
	const AttachmentThumbnailArgs = "attachment_thumbnail_args";
	/**
		 * Filters an attachment id found by URL.
		 *
		 * @since 4.2.0
		 *
		 * @param int|null $post_id The post_id (if any) found by the function.
		 * @param string   $url     The URL being looked up.
		 * @Reference wp-includes\media.php apply_filters( 'attachment_url_to_postid', $post_id, $url )
	*/
	const AttachmentUrlToPostid = "attachment_url_to_postid";
	/**
		 * Filters a string cleaned and escaped for output in an HTML attribute.
		 *
		 * Text passed to esc_attr() is stripped of invalid or special characters
		 * before output.
		 *
		 * @since 2.0.6
		 *
		 * @param string $safe_text The text after it has been escaped.
		 * @param string $text      The text prior to being escaped.
		 * @Reference wp-includes\formatting.php apply_filters( 'attribute_escape', $safe_text, $text )
	*/
	const AttributeEscape = "attribute_escape";
	/**
			 * Filters the audio attachment metadata fields to be shown in the publish meta box.
			 *
			 * The key for each item in the array should correspond to an attachment
			 * metadata key, and the value should be the desired label.
			 *
			 * @since 3.7.0
			 * @since 4.9.0 Added the `$post` parameter.
			 *
			 * @param array   $fields An array of the attachment metadata keys and labels.
			 * @param WP_Post $post   WP_Post object for the current attachment.
			 * @Reference wp-admin\includes\media.php apply_filters( 'audio_submitbox_misc_sections', $fields, $post )
	*/
	const AudioSubmitboxMiscSections = "audio_submitbox_misc_sections";
	/**
			 * Filters the authentication cookie.
			 *
			 * @since 2.5.0
			 * @since 4.0.0 The `$token` parameter was added.
			 *
			 * @param string $cookie     Authentication cookie.
			 * @param int    $user_id    User ID.
			 * @param int    $expiration The time the cookie expires as a UNIX timestamp.
			 * @param string $scheme     Cookie scheme used. Accepts 'auth', 'secure_auth', or 'logged_in'.
			 * @param string $token      User's session token used.
			 * @Reference wp-includes\pluggable.php apply_filters( 'auth_cookie', $cookie, $user_id, $expiration, $scheme, $token )
	*/
	const AuthCookie = "auth_cookie";
	/**
				 * Filters the duration of the authentication cookie expiration period.
				 *
				 * @since 2.8.0
				 *
				 * @param int  $length   Duration of the expiration period in seconds.
				 * @param int  $user_id  User ID.
				 * @param bool $remember Whether to remember the user login. Default false.
				 * @Reference wp-includes\pluggable.php apply_filters( 'auth_cookie_expiration', 14 * DAY_IN_SECONDS, $user_id, $remember )
	* @Reference wp-includes\user.php apply_filters( 'auth_cookie_expiration', ( 2 * DAY_IN_SECONDS ), $ID, false )
	* @Reference wp-includes\pluggable.php apply_filters( 'auth_cookie_expiration', 2 * DAY_IN_SECONDS, $user_id, $remember )
	*/
	const AuthCookieExpiration = "auth_cookie_expiration";
	/**
			 * Filters the authentication redirect scheme.
			 *
			 * @since 2.9.0
			 *
			 * @param string $scheme Authentication redirect scheme. Default empty.
			 * @Reference wp-includes\pluggable.php apply_filters( 'auth_redirect_scheme', '' )
	*/
	const AuthRedirectScheme = "auth_redirect_scheme";
	/**
			 * Filters whether a set of user login credentials are valid.
			 *
			 * A WP_User object is returned if the credentials authenticate a user.
			 * WP_Error or null otherwise.
			 *
			 * @since 2.8.0
			 * @since 4.5.0 `$username` now accepts an email address.
			 *
			 * @param null|WP_User|WP_Error $user     WP_User if the user is authenticated.
			 *                                        WP_Error or null otherwise.
			 * @param string                $username Username or email address.
			 * @param string                $password User password
			 * @Reference wp-includes\pluggable.php apply_filters( 'authenticate', null, $username, $password )
	*/
	const Authenticate = "authenticate";
	/**
		 * Filters the comment author's email for display.
		 *
		 * @since 1.2.0
		 * @since 4.1.0 The `$comment_ID` parameter was added.
		 *
		 * @param string $author_email The comment author's email address.
		 * @param int    $comment_ID   The comment ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'author_email', $author_email, $comment->comment_ID )
	*/
	const AuthorEmail = "author_email";
	/**
		 * Filters the feed link for a given author.
		 *
		 * @since 1.5.1
		 *
		 * @param string $link The author feed link.
		 * @param string $feed Feed type. Possible values include 'rss2', 'atom'.
		 * @Reference wp-includes\link-template.php apply_filters( 'author_feed_link', $link, $feed )
	*/
	const AuthorFeedLink = "author_feed_link";
	/**
		 * Filters the URL to the author's page.
		 *
		 * @since 2.1.0
		 *
		 * @param string $link            The URL to the author's page.
		 * @param int    $author_id       The author's id.
		 * @param string $author_nicename The author's nice name.
		 * @Reference wp-includes\author-template.php apply_filters( 'author_link', $link, $author_id, $author_nicename )
	*/
	const AuthorLink = "author_link";
	/**
			 * Filters rewrite rules used for author archives.
			 *
			 * Likely author archives would include /author/author-name/, as well as
			 * pagination and feed paths for author archives.
			 *
			 * @since 1.5.0
			 *
			 * @param array $author_rewrite The rewrite rules for author archives.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'author_rewrite_rules', $author_rewrite )
	*/
	const AuthorRewriteRules = "author_rewrite_rules";
	/**
			 * Filters the email sent following an automatic background core update.
			 *
			 * @since 3.7.0
			 *
			 * @param array $email {
			 *     Array of email arguments that will be passed to wp_mail().
			 *
			 *     @type string $to      The email recipient. An array of emails
			 *                            can be returned, as handled by wp_mail().
			 *     @type string $subject The email's subject.
			 *     @type string $body    The email message body.
			 *     @type string $headers Any email headers, defaults to no headers.
			 * }
			 * @param string $type        The type of email being sent. Can be one of
			 *                            'success', 'fail', 'manual', 'critical'.
			 * @param object $core_update The update offer that was attempted.
			 * @param mixed  $result      The result for the core update. Can be WP_Error.
			 * @Reference wp-admin\includes\class-wp-automatic-updater.php apply_filters( 'auto_core_update_email', $email, $type, $core_update, $result )
	*/
	const AutoCoreUpdateEmail = "auto_core_update_email";
	/**
			 * Filters whether to send an email following an automatic background core update.
			 *
			 * @since 3.7.0
			 *
			 * @param bool   $send        Whether to send the email. Default true.
			 * @param string $type        The type of email to send. Can be one of
			 *                            'success', 'fail', 'critical'.
			 * @param object $core_update The update offer that was attempted.
			 * @param mixed  $result      The result for the core update. Can be WP_Error.
			 * @Reference wp-admin\includes\class-wp-automatic-updater.php apply_filters( 'auto_core_update_send_email', true, $type, $core_update, $result )
	*/
	const AutoCoreUpdateSendEmail = "auto_core_update_send_email";
	/** This filter is documented in wp-admin/user-new.php * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'autocomplete_users_for_site_admins', false )
	* @Reference wp-admin\user-new.php apply_filters( 'autocomplete_users_for_site_admins', false )
	*/
	const AutocompleteUsersForSiteAdmins = "autocomplete_users_for_site_admins";
	/**
			 * Filters whether to entirely disable background updates.
			 *
			 * There are more fine-grained filters and controls for selective disabling.
			 * This filter parallels the AUTOMATIC_UPDATER_DISABLED constant in name.
			 *
			 * This also disables update notification emails. That may change in the future.
			 *
			 * @since 3.7.0
			 *
			 * @param bool $disabled Whether the updater should be disabled.
			 * @Reference wp-admin\includes\class-wp-automatic-updater.php apply_filters( 'automatic_updater_disabled', $disabled )
	* @Reference wp-admin\includes\class-wp-site-health-auto-updates.php apply_filters( 'automatic_updater_disabled', false )
	*/
	const AutomaticUpdaterDisabled = "automatic_updater_disabled";
	/**
			 * Filters the debug email that can be sent following an automatic
			 * background core update.
			 *
			 * @since 3.8.0
			 *
			 * @param array $email {
			 *     Array of email arguments that will be passed to wp_mail().
			 *
			 *     @type string $to      The email recipient. An array of emails
			 *                           can be returned, as handled by wp_mail().
			 *     @type string $subject Email subject.
			 *     @type string $body    Email message body.
			 *     @type string $headers Any email headers. Default empty.
			 * }
			 * @param int   $failures The number of failures encountered while upgrading.
			 * @param mixed $results  The results of all attempted updates.
			 * @Reference wp-admin\includes\class-wp-automatic-updater.php apply_filters( 'automatic_updates_debug_email', $email, $failures, $this->update_results )
	*/
	const AutomaticUpdatesDebugEmail = "automatic_updates_debug_email";
	/**
			 * Filters whether the automatic updater should consider a filesystem
			 * location to be potentially managed by a version control system.
			 *
			 * @since 3.7.0
			 *
			 * @param bool $checkout  Whether a VCS checkout was discovered at $context
			 *                        or ABSPATH, or anywhere higher.
			 * @param string $context The filesystem context (a path) against which
			 *                        filesystem status should be checked.
			 * @Reference wp-admin\includes\class-wp-automatic-updater.php apply_filters( 'automatic_updates_is_vcs_checkout', $checkout, $context )
	* @Reference wp-admin\includes\class-wp-site-health-auto-updates.php apply_filters( 'automatic_updates_is_vcs_checkout', true, ABSPATH )
	*/
	const AutomaticUpdatesIsVcsCheckout = "automatic_updates_is_vcs_checkout";
	/**
				 * Filters whether to send a debugging email for each automatic background update.
				 *
				 * @since 3.7.0
				 *
				 * @param bool $development_version By default, emails are sent if the
				 *                                  install is a development version.
				 *                                  Return false to avoid the email.
				 * @Reference wp-admin\includes\class-wp-automatic-updater.php apply_filters( 'automatic_updates_send_debug_email', $development_version )
	*/
	const AutomaticUpdatesSendDebugEmail = "automatic_updates_send_debug_email";
	/**
					 * Filters the list of available permalink structure tags on the Permalinks settings page.
					 *
					 * @since 4.8.0
					 *
					 * @param string[] $available_tags An array of key => value pairs of available permalink structure tags.
					 * @Reference wp-admin\options-permalink.php apply_filters( 'available_permalink_structure_tags', $available_tags )
	*/
	const AvailablePermalinkStructureTags = "available_permalink_structure_tags";
	/**
	 * Filters the default avatars.
	 *
	 * Avatars are stored in key/value pairs, where the key is option value,
	 * and the name is the displayed avatar name.
	 *
	 * @since 2.6.0
	 *
	 * @param string[] $avatar_defaults Associative array of default avatars.
	 * @Reference wp-admin\options-discussion.php apply_filters( 'avatar_defaults', $avatar_defaults )
	*/
	const AvatarDefaults = "avatar_defaults";
	/**
		 * Filters the "BIG image" threshold value.
		 *
		 * If the original image width or height is above the threshold, it will be scaled down. The threshold is
		 * used as max width and max height. The scaled down image will be used as the largest available size, including
		 * the `_wp_attached_file` post meta value.
		 *
		 * Returning `false` from the filter callback will disable the scaling.
		 *
		 * @since 5.3.0
		 *
		 * @param int    $threshold     The threshold value in pixels. Default 2560.
		 * @param array  $imagesize     Indexed array of the image width and height (in that order).
		 * @param string $file          Full path to the uploaded image file.
		 * @param int    $attachment_id Attachment post ID.
		 * @Reference wp-admin\includes\image.php apply_filters( 'big_image_size_threshold', 2560, $imagesize, $file, $attachment_id )
	*/
	const BigImageSizeThreshold = "big_image_size_threshold";
	/**
		 * Filter the default array of block categories.
		 *
		 * @since 5.0.0
		 *
		 * @param array   $default_categories Array of block categories.
		 * @param WP_Post $post               Post being loaded.
		 * @Reference wp-admin\includes\post.php apply_filters( 'block_categories', $default_categories, $post )
	*/
	const BlockCategories = "block_categories";
	/**
						 * Filters the message displayed in the block editor interface when JavaScript is
						 * not enabled in the browser.
						 *
						 * @since 5.0.3
						 *
						 * @param string  $message The message being displayed.
						 * @param WP_Post $post    The post being edited.
						 * @Reference wp-admin\edit-form-blocks.php apply_filters( 'block_editor_no_javascript_message', $message, $post )
	*/
	const BlockEditorNoJavascriptMessage = "block_editor_no_javascript_message";
	/**
	 * Preload common data by specifying an array of REST API paths that will be preloaded.
	 *
	 * Filters the array of paths that will be preloaded.
	 *
	 * @since 5.0.0
	 *
	 * @param array  $preload_paths Array of paths to preload.
	 * @param object $post          The post resource data.
	 * @Reference wp-admin\edit-form-blocks.php apply_filters( 'block_editor_preload_paths', $preload_paths, $post )
	*/
	const BlockEditorPreloadPaths = "block_editor_preload_paths";
	/**
	 * Filters the settings to pass to the block editor.
	 *
	 * @since 5.0.0
	 *
	 * @param array   $editor_settings Default editor settings.
	 * @param WP_Post $post            Post being edited.
	 * @Reference wp-admin\edit-form-blocks.php apply_filters( 'block_editor_settings', $editor_settings, $post )
	*/
	const BlockEditorSettings = "block_editor_settings";
	/**
				 * Filters whether to block local HTTP API requests.
				 *
				 * A local request is one to `localhost` or to the same host as the site itself.
				 *
				 * @since 2.8.0
				 *
				 * @param bool $block Whether to block local requests. Default false.
				 * @Reference wp-includes\class-http.php apply_filters( 'block_local_requests', false )
	*/
	const BlockLocalRequests = "block_local_requests";
	/**
		 * Filter to allow plugins to replace the server-side block parser
		 *
		 * @since 5.0.0
		 *
		 * @param string $parser_class Name of block parser class.
		 * @Reference wp-includes\blocks.php apply_filters( 'block_parser_class', 'WP_Block_Parser' )
	*/
	const BlockParserClass = "block_parser_class";
	/**
		 * Filters a blog's details.
		 *
		 * @since MU (3.0.0)
		 * @deprecated 4.7.0 Use site_details
		 *
		 * @param object $details The blog details.
		 * @Reference wp-includes\ms-blogs.php apply_filters( 'blog_details', array( $details ), '4.7.0', 'site_details' )
	* @Reference wp-includes\class-wp-site.php apply_filters( 'blog_details', array( $details ), '4.7.0', 'site_details' )
	*/
	const BlogDetails = "blog_details";
	/**
			 * Filters the redirect URL for 404s on the main site.
			 *
			 * The filter is only evaluated if the NOBLOGREDIRECT constant is defined.
			 *
			 * @since 3.0.0
			 *
			 * @param string $no_blog_redirect The redirect URL defined in NOBLOGREDIRECT.
			 * @Reference wp-includes\ms-functions.php apply_filters( 'blog_redirect_404', NOBLOGREDIRECT )
	*/
	const BlogRedirect404 = "blog_redirect_404";
	/**
				 * Filters the site information returned by get_bloginfo().
				 *
				 * @since 0.71
				 *
				 * @param mixed $output The requested non-URL site information.
				 * @param mixed $show   Type of information requested.
				 * @Reference wp-includes\general-template.php apply_filters( 'bloginfo', $output, $show )
	*/
	const Bloginfo = "bloginfo";
	/**
		 * Filters the bloginfo for display in RSS feeds.
		 *
		 * @since 2.1.0
		 *
		 * @see get_bloginfo()
		 *
		 * @param string $rss_container RSS container for the blog information.
		 * @param string $show          The type of blog information to retrieve.
		 * @Reference wp-includes\feed.php apply_filters( 'bloginfo_rss', get_bloginfo_rss( $show ), $show )
	*/
	const BloginfoRss = "bloginfo_rss";
	/**
				 * Filters the URL returned by get_bloginfo().
				 *
				 * @since 2.0.5
				 *
				 * @param mixed $output The URL returned by bloginfo().
				 * @param mixed $show   Type of information requested.
				 * @Reference wp-includes\general-template.php apply_filters( 'bloginfo_url', $output, $show )
	*/
	const BloginfoUrl = "bloginfo_url";
	/**
		 * Filters the list of CSS body class names for the current post or page.
		 *
		 * @since 2.8.0
		 *
		 * @param string[] $classes An array of body class names.
		 * @param string[] $class   An array of additional class names added to the body.
		 * @Reference wp-includes\post-template.php apply_filters( 'body_class', $classes, $class )
	*/
	const BodyClass = "body_class";
	/**
		 * Filters the notice output for the 'Browse Happy' nag meta box.
		 *
		 * @since 3.2.0
		 *
		 * @param string $notice   The notice content.
		 * @param array  $response An array containing web browser information. See `wp_check_browser_version()`.
		 * @Reference wp-admin\includes\dashboard.php apply_filters( 'browse-happy-notice', $notice, $response )
	*/
	const BrowseHappyNotice = "browse-happy-notice";
	/**
	 * Filters the bulk action updated messages.
	 *
	 * By default, custom post types use the messages for the 'post' post type.
	 *
	 * @since 3.7.0
	 *
	 * @param array[] $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
	 *                               keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
	 * @param int[]   $bulk_counts   Array of item counts for each message, used to build internationalized strings.
	 * @Reference wp-admin\edit.php apply_filters( 'bulk_post_updated_messages', $bulk_messages, $bulk_counts )
	*/
	const BulkPostUpdatedMessages = "bulk_post_updated_messages";
	/**
		 * Filters whether a user should be added to a site.
		 *
		 * @since 4.9.0
		 *
		 * @param bool|WP_Error $retval  True if the user should be added to the site, false
		 *                               or error object otherwise.
		 * @param int           $user_id User ID.
		 * @param string        $role    User role.
		 * @param int           $blog_id Site ID.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'can_add_user_to_blog', true, $user_id, $role, $blog_id )
	*/
	const CanAddUserToBlog = "can_add_user_to_blog";
	/**
		 * Filters whether this network can be edited from this page.
		 *
		 * @since 3.1.0
		 *
		 * @param bool $result     Whether the network can be edited from this page.
		 * @param int  $network_id The network ID to check.
		 * @Reference wp-admin\includes\ms.php apply_filters( 'can_edit_network', $result, $network_id )
	*/
	const CanEditNetwork = "can_edit_network";
	/**
		 * Filters the cancel comment reply link HTML.
		 *
		 * @since 2.7.0
		 *
		 * @param string $formatted_link The HTML-formatted cancel comment reply link.
		 * @param string $link           Cancel comment reply link URL.
		 * @param string $text           Cancel comment reply link text.
		 * @Reference wp-includes\comment-template.php apply_filters( 'cancel_comment_reply_link', $formatted_link, $link, $text )
	*/
	const CancelCommentReplyLink = "cancel_comment_reply_link";
	/**
				 * Filters the list of CSS classes to include with each category in the list.
				 *
				 * @since 4.2.0
				 *
				 * @see wp_list_categories()
				 *
				 * @param array  $css_classes An array of CSS classes to be applied to each list item.
				 * @param object $category    Category data object.
				 * @param int    $depth       Depth of page, used for padding.
				 * @param array  $args        An array of wp_list_categories() arguments.
				 * @Reference wp-includes\class-walker-category.php apply_filters( 'category_css_class', $css_classes, $category, $depth, $args )
	*/
	const CategoryCssClass = "category_css_class";
	/**
				 * Filters the category description for display.
				 *
				 * @since 1.2.0
				 *
				 * @param string $description Category description.
				 * @param object $category    Category object.
				 * @Reference wp-includes\class-walker-category.php apply_filters( 'category_description', $category->description, $category )
	*/
	const CategoryDescription = "category_description";
	/**
			 * Filters the category feed link.
			 *
			 * @since 1.5.1
			 *
			 * @param string $link The category feed link.
			 * @param string $feed Feed type. Possible values include 'rss2', 'atom'.
			 * @Reference wp-includes\link-template.php apply_filters( 'category_feed_link', $link, $feed )
	*/
	const CategoryFeedLink = "category_feed_link";
	/**
			 * Filters the category link.
			 *
			 * @since 1.5.0
			 * @deprecated 2.5.0 Use 'term_link' instead.
			 *
			 * @param string $termlink Category link URL.
			 * @param int    $term_id  Term ID.
			 * @Reference wp-includes\taxonomy.php apply_filters( 'category_link', $termlink, $term->term_id )
	*/
	const CategoryLink = "category_link";
	/**
			 * Filters the HTML attributes applied to a category list item's anchor element.
			 *
			 * @since 5.2.0
			 *
			 * @param array   $atts {
			 *     The HTML attributes applied to the list item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $href  The href attribute.
			 *     @type string $title The title attribute.
			 * }
			 * @param WP_Term $category Term data object.
			 * @param int     $depth    Depth of category, used for padding.
			 * @param array   $args     An array of arguments.
			 * @param int     $id       ID of the current category.
			 * @Reference wp-includes\class-walker-category.php apply_filters( 'category_list_link_attributes', $atts, $category, $depth, $args, $id )
	*/
	const CategoryListLinkAttributes = "category_list_link_attributes";
	/**
			 * Filters whether the user has been marked as a spammer.
			 *
			 * @since 3.7.0
			 *
			 * @param bool    $spammed Whether the user is considered a spammer.
			 * @param WP_User $user    User to check against.
			 * @Reference wp-includes\user.php apply_filters( 'check_is_user_spammed', is_user_spammy( $user ), $user )
	*/
	const CheckIsUserSpammed = "check_is_user_spammed";
	/**
				 * Filters whether the plaintext password matches the encrypted password.
				 *
				 * @since 2.5.0
				 *
				 * @param bool       $check    Whether the passwords match.
				 * @param string     $password The plaintext password.
				 * @param string     $hash     The hashed password.
				 * @param string|int $user_id  User ID. Can be empty.
				 * @Reference wp-includes\pluggable.php apply_filters( 'check_password', $check, $password, $hash, $user_id )
	* @Reference wp-includes\pluggable.php apply_filters( 'check_password', $check, $password, $hash, $user_id )
	*/
	const CheckPassword = "check_password";
	/**
		 * Filters a string cleaned and escaped for output as a URL.
		 *
		 * @since 2.3.0
		 *
		 * @param string $good_protocol_url The cleaned URL to be returned.
		 * @param string $original_url      The URL prior to cleaning.
		 * @param string $_context          If 'display', replace ampersands and single quotes only.
		 * @Reference wp-includes\formatting.php apply_filters( 'clean_url', $good_protocol_url, $original_url, $_context )
	*/
	const CleanUrl = "clean_url";
	/**
		 * Filters the list of post types to automatically close comments for.
		 *
		 * @since 3.2.0
		 *
		 * @param string[] $post_types An array of post type names.
		 * @Reference wp-includes\comment.php apply_filters( 'close_comments_for_post_types', array( 'post' ) )
	* @Reference wp-includes\comment.php apply_filters( 'close_comments_for_post_types', array( 'post' ) )
	*/
	const CloseCommentsForPostTypes = "close_comments_for_post_types";
	/**
		 * Filters the comment author's name for display.
		 *
		 * @since 1.2.0
		 * @since 4.1.0 The `$comment_ID` parameter was added.
		 *
		 * @param string $author     The comment author's username.
		 * @param int    $comment_ID The comment ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_author', $author, $comment->comment_ID )
	*/
	const CommentAuthor = "comment_author";
	/**
		 * Filters the current comment author for use in a feed.
		 *
		 * @since 1.5.0
		 *
		 * @see get_comment_author()
		 *
		 * @param string $comment_author The current comment author.
		 * @Reference wp-includes\feed.php apply_filters( 'comment_author_rss', get_comment_author() )
	*/
	const CommentAuthorRss = "comment_author_rss";
	/**
		 * Filters the returned CSS classes for the current comment.
		 *
		 * @since 2.7.0
		 *
		 * @param string[]    $classes    An array of comment classes.
		 * @param string      $class      A comma-separated list of additional classes added to the list.
		 * @param int         $comment_id The comment id.
		 * @param WP_Comment  $comment    The comment object.
		 * @param int|WP_Post $post_id    The post ID or WP_Post object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_class', $classes, $class, $comment->comment_ID, $comment, $post_id )
	*/
	const CommentClass = "comment_class";
	/**
		 * Filters the lifetime of the comment cookie in seconds.
		 *
		 * @since 2.8.0
		 *
		 * @param int $seconds Comment cookie lifetime. Default 30000000.
		 * @Reference wp-includes\comment.php apply_filters( 'comment_cookie_lifetime', 30000000 )
	*/
	const CommentCookieLifetime = "comment_cookie_lifetime";
	/**
			 * Filters duplicate comment error message.
			 *
			 * @since 5.2.0
			 *
			 * @param string $comment_duplicate_message Duplicate comment error message.
			 * @Reference wp-includes\comment.php apply_filters( 'comment_duplicate_message', __( 'Duplicate comment detected; it looks as though you&#8217;ve already said that!' ) )
	*/
	const CommentDuplicateMessage = "comment_duplicate_message";
	/**
		 * Filters the comment content before editing.
		 *
		 * @since 2.0.0
		 *
		 * @param string $comment->comment_content Comment content.
		 * @Reference wp-admin\includes\comment.php apply_filters( 'comment_edit_pre', $comment->comment_content )
	* @Reference wp-admin\includes\class-wp-comments-list-table.php apply_filters( 'comment_edit_pre', $comment->comment_content )
	*/
	const CommentEditPre = "comment_edit_pre";
	/**
			 * Filters the URI the user is redirected to after editing a comment in the admin.
			 *
			 * @since 2.1.0
			 *
			 * @param string $location The URI the user will be redirected to.
			 * @param int $comment_id The ID of the comment being edited.
			 * @Reference wp-admin\comment.php apply_filters( 'comment_edit_redirect', $location, $comment_id )
	*/
	const CommentEditRedirect = "comment_edit_redirect";
	/**
		 * Filters the comment author's email for display.
		 *
		 * Care should be taken to protect the email address and assure that email
		 * harvesters do not capture your commenter's email address.
		 *
		 * @since 1.2.0
		 * @since 4.1.0 The `$comment` parameter was added.
		 *
		 * @param string     $comment_author_email The comment author's email address.
		 * @param WP_Comment $comment              The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_email', $comment->comment_author_email, $comment )
	* @Reference wp-admin\includes\class-wp-comments-list-table.php apply_filters( 'comment_email', $comment->comment_author_email, $comment )
	*/
	const CommentEmail = "comment_email";
	/**
		 * Filters the comment excerpt for display.
		 *
		 * @since 1.2.0
		 * @since 4.1.0 The `$comment_ID` parameter was added.
		 *
		 * @param string $comment_excerpt The comment excerpt text.
		 * @param int    $comment_ID      The comment ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_excerpt', $comment_excerpt, $comment->comment_ID )
	*/
	const CommentExcerpt = "comment_excerpt";
	/**
		 * Filters the maximum number of words used in the comment excerpt.
		 *
		 * @since 4.4.0
		 *
		 * @param int $comment_excerpt_length The amount of words you want to display in the comment excerpt.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_excerpt_length', $comment_excerpt_length )
	*/
	const CommentExcerptLength = "comment_excerpt_length";
	/**
					 * Filters the GROUP BY clause of the comments feed query before sending.
					 *
					 * @since 2.2.0
					 *
					 * @param string   $cgroupby The GROUP BY clause of the query.
					 * @param WP_Query $this     The WP_Query instance (passed by reference).
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_groupby', array( $cgroupby, &$this ) )
	* @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_groupby', array( '', &$this ) )
	*/
	const CommentFeedGroupby = "comment_feed_groupby";
	/**
					 * Filters the JOIN clause of the comments feed query before sending.
					 *
					 * @since 2.2.0
					 *
					 * @param string   $cjoin The JOIN clause of the query.
					 * @param WP_Query $this The WP_Query instance (passed by reference).
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_join', array( $cjoin, &$this ) )
	* @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_join', array( '', &$this ) )
	*/
	const CommentFeedJoin = "comment_feed_join";
	/**
					 * Filters the LIMIT clause of the comments feed query before sending.
					 *
					 * @since 2.8.0
					 *
					 * @param string   $climits The JOIN clause of the query.
					 * @param WP_Query $this    The WP_Query instance (passed by reference).
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_limits', array( 'LIMIT ' . get_option( 'posts_per_rss' ), &$this ) )
	* @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_limits', array( 'LIMIT ' . get_option( 'posts_per_rss' ), &$this ) )
	*/
	const CommentFeedLimits = "comment_feed_limits";
	/**
					 * Filters the ORDER BY clause of the comments feed query before sending.
					 *
					 * @since 2.8.0
					 *
					 * @param string   $corderby The ORDER BY clause of the query.
					 * @param WP_Query $this     The WP_Query instance (passed by reference).
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_orderby', array( 'comment_date_gmt DESC', &$this ) )
	* @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_orderby', array( 'comment_date_gmt DESC', &$this ) )
	*/
	const CommentFeedOrderby = "comment_feed_orderby";
	/**
					 * Filters the WHERE clause of the comments feed query before sending.
					 *
					 * @since 2.2.0
					 *
					 * @param string   $cwhere The WHERE clause of the query.
					 * @param WP_Query $this   The WP_Query instance (passed by reference).
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_where', array( $cwhere, &$this ) )
	* @Reference wp-includes\class-wp-query.php apply_filters( 'comment_feed_where', array( "WHERE comment_post_ID = '{$this->posts[0]->ID}' AND comment_approved = '1'", &$this ) )
	*/
	const CommentFeedWhere = "comment_feed_where";
	/**
			 * Filters the comment flood status.
			 *
			 * @since 2.1.0
			 *
			 * @param bool $bool             Whether a comment flood is occurring. Default false.
			 * @param int  $time_lastcomment Timestamp of when the last comment was posted.
			 * @param int  $time_newcomment  Timestamp of when the new comment was posted.
			 * @Reference wp-includes\comment.php apply_filters( 'comment_flood_filter', false, $time_lastcomment, $time_newcomment )
	*/
	const CommentFloodFilter = "comment_flood_filter";
	/**
					 * Filters the comment flood error message.
					 *
					 * @since 5.2.0
					 *
					 * @param string $comment_flood_message Comment flood error message.
					 * @Reference wp-includes\comment.php apply_filters( 'comment_flood_message', __( 'You are posting comments too quickly. Slow down.' ) )
	* @Reference wp-includes\comment.php apply_filters( 'comment_flood_message', __( 'You are posting comments too quickly. Slow down.' ) )
	*/
	const CommentFloodMessage = "comment_flood_message";
	/**
		 * Filters the default comment form fields.
		 *
		 * @since 3.0.0
		 *
		 * @param string[] $fields Array of the default comment fields.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_form_default_fields', $fields )
	*/
	const CommentFormDefaultFields = "comment_form_default_fields";
	/**
		 * Filters the comment form default arguments.
		 *
		 * Use {@see 'comment_form_default_fields'} to filter the comment fields.
		 *
		 * @since 3.0.0
		 *
		 * @param array $defaults The default comment form arguments.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_form_defaults', $defaults )
	*/
	const CommentFormDefaults = "comment_form_defaults";
	/**
						 * Filters the content of the comment textarea field for display.
						 *
						 * @since 3.0.0
						 *
						 * @param string $args_comment_field The content of the comment textarea field.
						 * @Reference wp-includes\comment-template.php apply_filters( 'comment_form_field_comment', $field )
	*/
	const CommentFormFieldComment = "comment_form_field_comment";
	/**
				 * Filters the comment form fields, including the textarea.
				 *
				 * @since 4.4.0
				 *
				 * @param array $comment_fields The comment fields.
				 * @Reference wp-includes\comment-template.php apply_filters( 'comment_form_fields', $comment_fields )
	*/
	const CommentFormFields = "comment_form_fields";
	/**
					 * Filters the 'logged in' message for the comment form for display.
					 *
					 * @since 3.0.0
					 *
					 * @param string $args_logged_in The logged-in-as HTML-formatted message.
					 * @param array  $commenter      An array containing the comment author's
					 *                               username, email, and URL.
					 * @param string $user_identity  If the commenter is a registered user,
					 *                               the display name, blank otherwise.
					 * @Reference wp-includes\comment-template.php apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity )
	*/
	const CommentFormLoggedIn = "comment_form_logged_in";
	/**
				 * Filters the submit button for the comment form to display.
				 *
				 * @since 4.2.0
				 *
				 * @param string $submit_button HTML markup for the submit button.
				 * @param array  $args          Arguments passed to comment_form().
				 * @Reference wp-includes\comment-template.php apply_filters( 'comment_form_submit_button', $submit_button, $args )
	*/
	const CommentFormSubmitButton = "comment_form_submit_button";
	/**
				 * Filters the submit field for the comment form to display.
				 *
				 * The submit field includes the submit button, hidden fields for the
				 * comment form, and any wrapper markup.
				 *
				 * @since 4.2.0
				 *
				 * @param string $submit_field HTML markup for the submit field.
				 * @param array  $args         Arguments passed to comment_form().
				 * @Reference wp-includes\comment-template.php apply_filters( 'comment_form_submit_field', $submit_field, $args )
	*/
	const CommentFormSubmitField = "comment_form_submit_field";
	/**
		 * Filters the returned comment id fields.
		 *
		 * @since 3.0.0
		 *
		 * @param string $result    The HTML-formatted hidden id field comment elements.
		 * @param int    $id        The post ID.
		 * @param int    $replytoid The id of the comment being replied to.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_id_fields', $result, $id, $replytoid )
	*/
	const CommentIdFields = "comment_id_fields";
	/**
		 * Filters the current comment's permalink.
		 *
		 * @since 3.6.0
		 *
		 * @see get_comment_link()
		 *
		 * @param string $comment_permalink The current comment permalink.
		 * @Reference wp-includes\feed.php apply_filters( 'comment_link', get_comment_link( $comment ) )
	*/
	const CommentLink = "comment_link";
	/**
			 * Filters the number of links found in a comment.
			 *
			 * @since 3.0.0
			 * @since 4.7.0 Added the `$comment` parameter.
			 *
			 * @param int    $num_links The number of links found.
			 * @param string $url       Comment author's URL. Included in allowed links total.
			 * @param string $comment   Content of the comment.
			 * @Reference wp-includes\comment.php apply_filters( 'comment_max_links_url', $num_links, $url, $comment )
	*/
	const CommentMaxLinksUrl = "comment_max_links_url";
	/**
			 * Filters the comment moderation email headers.
			 *
			 * @since 2.8.0
			 *
			 * @param string $message_headers Headers for the comment moderation email.
			 * @param int    $comment_id      Comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_moderation_headers', $message_headers, $comment_id )
	*/
	const CommentModerationHeaders = "comment_moderation_headers";
	/**
			 * Filters the list of recipients for comment moderation emails.
			 *
			 * @since 3.7.0
			 *
			 * @param array $emails     List of email addresses to notify for comment moderation.
			 * @param int   $comment_id Comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_moderation_recipients', $emails, $comment_id )
	*/
	const CommentModerationRecipients = "comment_moderation_recipients";
	/**
			 * Filters the comment moderation email subject.
			 *
			 * @since 1.5.2
			 *
			 * @param string $subject    Subject of the comment moderation email.
			 * @param int    $comment_id Comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_moderation_subject', $subject, $comment_id )
	*/
	const CommentModerationSubject = "comment_moderation_subject";
	/**
			 * Filters the comment moderation email text.
			 *
			 * @since 1.5.2
			 *
			 * @param string $notify_message Text of the comment moderation email.
			 * @param int    $comment_id     Comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_moderation_text', $notify_message, $comment_id )
	*/
	const CommentModerationText = "comment_moderation_text";
	/**
			 * Filters the comment notification email headers.
			 *
			 * @since 1.5.2
			 *
			 * @param string $message_headers Headers for the comment notification email.
			 * @param int    $comment_id      Comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_notification_headers', $message_headers, $comment->comment_ID )
	*/
	const CommentNotificationHeaders = "comment_notification_headers";
	/**
			 * Filters whether to notify comment authors of their comments on their own posts.
			 *
			 * By default, comment authors aren't notified of their comments on their own
			 * posts. This filter allows you to override that.
			 *
			 * @since 3.8.0
			 *
			 * @param bool $notify     Whether to notify the post author of their own comment.
			 *                         Default false.
			 * @param int  $comment_id The comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_notification_notify_author', false, $comment->comment_ID )
	*/
	const CommentNotificationNotifyAuthor = "comment_notification_notify_author";
	/**
			 * Filters the list of email addresses to receive a comment notification.
			 *
			 * By default, only post authors are notified of comments. This filter allows
			 * others to be added.
			 *
			 * @since 3.7.0
			 *
			 * @param array $emails     An array of email addresses to receive a comment notification.
			 * @param int   $comment_id The comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_notification_recipients', $emails, $comment->comment_ID )
	*/
	const CommentNotificationRecipients = "comment_notification_recipients";
	/**
			 * Filters the comment notification email subject.
			 *
			 * @since 1.5.2
			 *
			 * @param string $subject    The comment notification email subject.
			 * @param int    $comment_id Comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_notification_subject', $subject, $comment->comment_ID )
	*/
	const CommentNotificationSubject = "comment_notification_subject";
	/**
			 * Filters the comment notification email text.
			 *
			 * @since 1.5.2
			 *
			 * @param string $notify_message The comment notification email text.
			 * @param int    $comment_id     Comment ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'comment_notification_text', $notify_message, $comment->comment_ID )
	*/
	const CommentNotificationText = "comment_notification_text";
	/**
	 * Filters the location URI to send the commenter after posting.
	 *
	 * @since 2.0.5
	 *
	 * @param string     $location The 'redirect_to' URI sent via $_POST.
	 * @param WP_Comment $comment  Comment object.
	 * @Reference wp-comments-post.php apply_filters( 'comment_post_redirect', $location, $comment )
	*/
	const CommentPostRedirect = "comment_post_redirect";
	/**
		 * Filters the comment reply link.
		 *
		 * @since 2.7.0
		 *
		 * @param string  $link    The HTML markup for the comment reply link.
		 * @param array   $args    An array of arguments overriding the defaults.
		 * @param object  $comment The object of the comment being replied.
		 * @param WP_Post $post    The WP_Post object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_reply_link', $args['before'] . $link . $args['after'], $args, $comment, $post )
	*/
	const CommentReplyLink = "comment_reply_link";
	/**
		 * Filters the comment reply link arguments.
		 *
		 * @since 4.1.0
		 *
		 * @param array      $args    Comment reply link arguments. See get_comment_reply_link()
		 *                            for more information on accepted arguments.
		 * @param WP_Comment $comment The object of the comment being replied to.
		 * @param WP_Post    $post    The WP_Post object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_reply_link_args', $args, $comment, $post )
	*/
	const CommentReplyLinkArgs = "comment_reply_link_args";
	/**
			 * Filters the action links displayed for each comment in the 'Recent Comments'
			 * dashboard widget.
			 *
			 * @since 2.6.0
			 *
			 * @param string[]   $actions An array of comment actions. Default actions include:
			 *                            'Approve', 'Unapprove', 'Edit', 'Reply', 'Spam',
			 *                            'Delete', and 'Trash'.
			 * @param WP_Comment $comment The comment object.
			 * @Reference wp-admin\includes\dashboard.php apply_filters( 'comment_row_actions', array_filter( $actions ), $comment )
	* @Reference wp-admin\includes\class-wp-comments-list-table.php apply_filters( 'comment_row_actions', array_filter( $actions ), $comment )
	*/
	const CommentRowActions = "comment_row_actions";
	/**
		 * Filters the comment content before it is updated in the database.
		 *
		 * @since 1.5.0
		 *
		 * @param string $comment_content The comment data.
		 * @Reference wp-includes\comment.php apply_filters( 'comment_save_pre', $data['comment_content'] )
	*/
	const CommentSavePre = "comment_save_pre";
	/**
			 * Filters the comment status links.
			 *
			 * @since 2.5.0
			 * @since 5.1.0 The 'Mine' link was added.
			 *
			 * @param string[] $status_links An associative array of fully-formed comment status links. Includes 'All', 'Mine',
			 *                              'Pending', 'Approved', 'Spam', and 'Trash'.
			 * @Reference wp-admin\includes\class-wp-comments-list-table.php apply_filters( 'comment_status_links', $status_links )
	*/
	const CommentStatusLinks = "comment_status_links";
	/**
		 * Filters the text of a comment to be displayed.
		 *
		 * @since 1.2.0
		 *
		 * @see Walker_Comment::comment()
		 *
		 * @param string          $comment_text Text of the current comment.
		 * @param WP_Comment|null $comment      The comment object.
		 * @param array           $args         An array of arguments.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_text', $comment_text, $comment, $args )
	* @Reference wp-includes\comment.php apply_filters( 'comment_text', $comment, null, array() )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'comment_text', $comment->comment_content, $comment )
	*/
	const CommentText = "comment_text";
	/**
		 * Filters the current comment content for use in a feed.
		 *
		 * @since 1.5.0
		 *
		 * @param string $comment_text The content of the current comment.
		 * @Reference wp-includes\feed.php apply_filters( 'comment_text_rss', $comment_text )
	*/
	const CommentTextRss = "comment_text_rss";
	/**
		 * Filters the comment author's URL for display.
		 *
		 * @since 1.2.0
		 * @since 4.1.0 The `$comment_ID` parameter was added.
		 *
		 * @param string $author_url The comment author's URL.
		 * @param int    $comment_ID The comment ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comment_url', $author_url, $comment->comment_ID )
	*/
	const CommentUrl = "comment_url";
	/**
		 * Filters the comments array.
		 *
		 * @since 2.1.0
		 *
		 * @param array $comments Array of comments supplied to the comments template.
		 * @param int   $post_ID  Post ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comments_array', $comments_flat, $post->ID )
	*/
	const CommentsArray = "comments_array";
	/**
			 * Filters the comment query clauses.
			 *
			 * @since 3.1.0
			 *
			 * @param string[]         $pieces An associative array of comment query clauses.
			 * @param WP_Comment_Query $this   Current instance of WP_Comment_Query (passed by reference).
			 * @Reference wp-includes\class-wp-comment-query.php apply_filters( 'comments_clauses', array( compact( $pieces ), &$this ) )
	*/
	const CommentsClauses = "comments_clauses";
	/**
		 * Filters the comments permalink for the current post.
		 *
		 * @since 3.6.0
		 *
		 * @param string $comment_permalink The current comment permalink with
		 *                                  '#comments' appended.
		 * @Reference wp-includes\feed.php apply_filters( 'comments_link_feed', get_comments_link() )
	*/
	const CommentsLinkFeed = "comments_link_feed";
	/**
			 * Filters the arguments for the comment query in the comments list table.
			 *
			 * @since 5.1.0
			 *
			 * @param array $args An array of get_comments() arguments.
			 * @Reference wp-admin\includes\class-wp-comments-list-table.php apply_filters( 'comments_list_table_query_args', $args )
	*/
	const CommentsListTableQueryArgs = "comments_list_table_query_args";
	/**
		 * Filters the comments count for display.
		 *
		 * @since 1.5.0
		 *
		 * @see _n()
		 *
		 * @param string $output A translatable string formatted based on whether the count
		 *                       is equal to 0, 1, or 1+.
		 * @param int    $number The number of post comments.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comments_number', $output, $number )
	*/
	const CommentsNumber = "comments_number";
	/**
		 * Filters whether the current post is open for comments.
		 *
		 * @since 2.5.0
		 *
		 * @param bool $open    Whether the current post is open for comments.
		 * @param int  $post_id The post ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comments_open', $open, $post_id )
	*/
	const CommentsOpen = "comments_open";
	/**
			 * Filters the number of comments listed per page in the comments list table.
			 *
			 * @since 2.6.0
			 *
			 * @param int    $comments_per_page The number of comments to list per page.
			 * @param string $comment_status    The comment status name. Default 'All'.
			 * @Reference wp-admin\includes\class-wp-comments-list-table.php apply_filters( 'comments_per_page', $comments_per_page, $comment_status )
	* @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'comments_per_page', $per_page, $comment_status )
	*/
	const CommentsPerPage = "comments_per_page";
	/**
		 * Filters the comments link attributes for display.
		 *
		 * @since 2.5.0
		 *
		 * @param string $attributes The comments link attributes. Default empty.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comments_popup_link_attributes', $attributes )
	*/
	const CommentsPopupLinkAttributes = "comments_popup_link_attributes";
	/**
			 * Filter the comments data before the query takes place.
			 *
			 * Return a non-null value to bypass WordPress's default comment queries.
			 *
			 * The expected return type from this filter depends on the value passed in the request query_vars.
			 * When `$this->query_vars['count']` is set, the filter should return the comment count as an int.
			 * When `'ids' == $this->query_vars['fields']`, the filter should return an array of comment ids.
			 * Otherwise the filter should return an array of WP_Comment objects.
			 *
			 * @since 5.3.0
			 *
			 * @param array|int|null   $comment_data Return an array of comment data to short-circuit WP's comment query,
			 *                                       the comment count as an integer if `$this->query_vars['count']` is set,
			 *                                       or null to allow WP to run its normal queries.
			 * @param WP_Comment_Query $this         The WP_Comment_Query instance, passed by reference.
			 * @Reference wp-includes\class-wp-comment-query.php apply_filters( 'comments_pre_query', array( $comment_data, &$this ) )
	*/
	const CommentsPreQuery = "comments_pre_query";
	/**
			 * Filters rewrite rules used for comment feed archives.
			 *
			 * Likely comments feed archives include /comments/feed/, and /comments/feed/atom/.
			 *
			 * @since 1.5.0
			 *
			 * @param array $comments_rewrite The rewrite rules for the site-wide comments feeds.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'comments_rewrite_rules', $comments_rewrite )
	*/
	const CommentsRewriteRules = "comments_rewrite_rules";
	/**
		 * Filters the path to the theme template file used for the comments template.
		 *
		 * @since 1.5.1
		 *
		 * @param string $theme_template The path to the theme template file.
		 * @Reference wp-includes\comment-template.php apply_filters( 'comments_template', $theme_template )
	*/
	const CommentsTemplate = "comments_template";
	/**
		 * Filters the arguments used to query comments in comments_template().
		 *
		 * @since 4.5.0
		 *
		 * @see WP_Comment_Query::__construct()
		 *
		 * @param array $comment_args {
		 *     Array of WP_Comment_Query arguments.
		 *
		 *     @type string|array $orderby                   Field(s) to order by.
		 *     @type string       $order                     Order of results. Accepts 'ASC' or 'DESC'.
		 *     @type string       $status                    Comment status.
		 *     @type array        $include_unapproved        Array of IDs or email addresses whose unapproved comments
		 *                                                   will be included in results.
		 *     @type int          $post_id                   ID of the post.
		 *     @type bool         $no_found_rows             Whether to refrain from querying for found rows.
		 *     @type bool         $update_comment_meta_cache Whether to prime cache for comment meta.
		 *     @type bool|string  $hierarchical              Whether to query for comments hierarchically.
		 *     @type int          $offset                    Comment offset.
		 *     @type int          $number                    Number of comments to fetch.
		 * }
		 * @Reference wp-includes\comment-template.php apply_filters( 'comments_template_query_args', $comment_args )
	*/
	const CommentsTemplateQueryArgs = "comments_template_query_args";
	/**
			 * Filters the "pages" derived from splitting the post content.
			 *
			 * "Pages" are determined by splitting the post content based on the presence
			 * of `<!-- nextpage -->` tags.
			 *
			 * @since 4.4.0
			 *
			 * @param string[] $pages Array of "pages" from the post content split by `<!-- nextpage -->` tags.
			 * @param WP_Post  $post  Current post object.
			 * @Reference wp-includes\class-wp-query.php apply_filters( 'content_pagination', $pages, $post )
	*/
	const ContentPagination = "content_pagination";
	/** This filter is documented in wp-includes/post.php * @Reference wp-includes\customize\class-wp-customize-nav-menu-item-setting.php apply_filters( 'content_save_pre', wp_slash( $menu_item_value['description'] ) )
	*/
	const ContentSavePre = "content_save_pre";
	/**
		 * Filters the URL to the content directory.
		 *
		 * @since 2.8.0
		 *
		 * @param string $url  The complete URL to the content directory including scheme and path.
		 * @param string $path Path relative to the URL to the content directory. Blank string
		 *                     if no path is specified.
		 * @Reference wp-includes\link-template.php apply_filters( 'content_url', $url, $path )
	*/
	const ContentUrl = "content_url";
	/**
			 * Filters the legacy contextual help text.
			 *
			 * @since 2.7.0
			 * @deprecated 3.3.0 Use get_current_screen()->add_help_tab() or
			 *                   get_current_screen()->remove_help_tab() instead.
			 *
			 * @param string    $old_help  Help text that appears on the screen.
			 * @param string    $screen_id Screen ID.
			 * @param WP_Screen $this      Current WP_Screen instance.
			 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'contextual_help', $old_help, $this->id, $this )
	*/
	const ContextualHelp = "contextual_help";
	/**
			 * Filters the legacy contextual help list.
			 *
			 * @since 2.7.0
			 * @deprecated 3.3.0 Use get_current_screen()->add_help_tab() or
			 *                   get_current_screen()->remove_help_tab() instead.
			 *
			 * @param array     $old_compat_help Old contextual help.
			 * @param WP_Screen $this            Current WP_Screen instance.
			 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'contextual_help_list', self::$_old_compat_help, $this )
	*/
	const ContextualHelpList = "contextual_help_list";
	/**
		 * Filters the locale requested for WordPress core translations.
		 *
		 * @since 2.8.0
		 *
		 * @param string $locale Current locale.
		 * @Reference wp-includes\update.php apply_filters( 'core_version_check_locale', get_locale() )
	*/
	const CoreVersionCheckLocale = "core_version_check_locale";
	/**
		 * Filter the query arguments sent as part of the core version check.
		 *
		 * WARNING: Changing this data may result in your site not receiving security updates.
		 * Please exercise extreme caution.
		 *
		 * @since 4.9.0
		 *
		 * @param array $query {
		 *     Version check query arguments.
		 *
		 *     @type string $version            WordPress version number.
		 *     @type string $php                PHP version number.
		 *     @type string $locale             The locale to retrieve updates for.
		 *     @type string $mysql              MySQL version number.
		 *     @type string $local_package      The value of the $wp_local_package global, when set.
		 *     @type int    $blogs              Number of sites on this WordPress installation.
		 *     @type int    $users              Number of users on this WordPress installation.
		 *     @type int    $multisite_enabled  Whether this WordPress installation uses Multisite.
		 *     @type int    $initial_db_version Database version of WordPress at time of installation.
		 * }
		 * @Reference wp-includes\update.php apply_filters( 'core_version_check_query_args', $query )
	*/
	const CoreVersionCheckQueryArgs = "core_version_check_query_args";
	/**
		 * Filters the cron request arguments.
		 *
		 * @since 3.5.0
		 * @since 4.5.0 The `$doing_wp_cron` parameter was added.
		 *
		 * @param array $cron_request_array {
		 *     An array of cron request URL arguments.
		 *
		 *     @type string $url  The cron request URL.
		 *     @type int    $key  The 22 digit GMT microtime.
		 *     @type array  $args {
		 *         An array of cron request arguments.
		 *
		 *         @type int  $timeout   The request timeout in seconds. Default .01 seconds.
		 *         @type bool $blocking  Whether to set blocking for the request. Default false.
		 *         @type bool $sslverify Whether SSL should be verified for the request. Default false.
		 *     }
		 * }
		 * @param string $doing_wp_cron The unix timestamp of the cron lock.
		 * @Reference wp-includes\cron.php apply_filters(		'cron_request',		array(			'url'  => add_query_arg( 'doing_wp_cron', $doing_wp_cron, site_url( 'wp-cron.php' ) ),			'key'  => $doing_wp_cron,			'args' => array(				'timeout'   => 0.01,				'blocking'  => false,'sslverify' => apply_filters( 'https_local_ssl_verify', false ),			),		),		$doing_wp_cron	)
	*/
	const CronRequest = "cron_request";
	/**
		 * Filters the non-default cron schedules.
		 *
		 * @since 2.1.0
		 *
		 * @param array $new_schedules An array of non-default cron schedules. Default empty.
		 * @Reference wp-includes\cron.php apply_filters( 'cron_schedules', array() )
	*/
	const CronSchedules = "cron_schedules";
	/**
	 * Filters whether to enable custom ordering of the administration menu.
	 *
	 * See the {@see 'menu_order'} filter for reordering menu items.
	 *
	 * @since 2.8.0
	 *
	 * @param bool $custom Whether custom ordering is enabled. Default false.
	 * @Reference wp-admin\includes\menu.php apply_filters( 'custom_menu_order', false )
	*/
	const CustomMenuOrder = "custom_menu_order";
	/**
			 * Filters the list of URLs allowed to be clicked and followed in the Customizer preview.
			 *
			 * @since 3.4.0
			 *
			 * @param string[] $allowed_urls An array of allowed URLs.
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_allowed_urls', $allowed_urls )
	*/
	const CustomizeAllowedUrls = "customize_allowed_urls";
	/**
			 * Filters whether or not changeset branching is allowed.
			 *
			 * By default in core, when changeset branching is not allowed, changesets will operate
			 * linearly in that only one saved changeset will exist at a time (with a 'draft' or
			 * 'future' status). This makes the Customizer operate in a way that is similar to going to
			 * "edit" to one existing post: all users will be making changes to the same post, and autosave
			 * revisions will be made for that post.
			 *
			 * By contrast, when changeset branching is allowed, then the model is like users going
			 * to "add new" for a page and each user makes changes independently of each other since
			 * they are all operating on their own separate pages, each getting their own separate
			 * initial auto-drafts and then once initially saved, autosave revisions on top of that
			 * user's specific post.
			 *
			 * Since linear changesets are deemed to be more suitable for the majority of WordPress users,
			 * they are the default. For WordPress sites that have heavy site management in the Customizer
			 * by multiple users then branching changesets should be enabled by means of this filter.
			 *
			 * @since 4.9.0
			 *
			 * @param bool                 $allow_branching Whether branching is allowed. If `false`, the default,
			 *                                              then only one saved changeset exists at a time.
			 * @param WP_Customize_Manager $wp_customize    Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_changeset_branching', $this->branching, $this )
	*/
	const CustomizeChangesetBranching = "customize_changeset_branching";
	/**
			 * Filters the settings' data that will be persisted into the changeset.
			 *
			 * Plugins may amend additional data (such as additional meta for settings) into the changeset with this filter.
			 *
			 * @since 4.7.0
			 *
			 * @param array $data Updated changeset data, mapping setting IDs to arrays containing a $value item and optionally other metadata.
			 * @param array $context {
			 *     Filter context.
			 *
			 *     @type string               $uuid          Changeset UUID.
			 *     @type string               $title         Requested title for the changeset post.
			 *     @type string               $status        Requested status for the changeset post.
			 *     @type string               $date_gmt      Requested date for the changeset post in MySQL format and GMT timezone.
			 *     @type int|false            $post_id       Post ID for the changeset, or false if it doesn't exist yet.
			 *     @type array                $previous_data Previous data contained in the changeset.
			 *     @type WP_Customize_Manager $manager       Manager instance.
			 * }
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_changeset_save_data', $data, $filter_context )
	*/
	const CustomizeChangesetSaveData = "customize_changeset_save_data";
	/**
			 * Filters response of WP_Customize_Control::active().
			 *
			 * @since 4.0.0
			 *
			 * @param bool                 $active  Whether the Customizer control is active.
			 * @param WP_Customize_Control $control WP_Customize_Control instance.
			 * @Reference wp-includes\class-wp-customize-control.php apply_filters( 'customize_control_active', $active, $control )
	*/
	const CustomizeControlActive = "customize_control_active";
	/**
				 * Filters a dynamic partial's constructor arguments.
				 *
				 * For a dynamic partial to be registered, this filter must be employed
				 * to override the default false value with an array of args to pass to
				 * the WP_Customize_Partial constructor.
				 *
				 * @since 4.5.0
				 *
				 * @param false|array $partial_args The arguments to the WP_Customize_Partial constructor.
				 * @param string      $partial_id   ID for dynamic partial.
				 * @Reference wp-includes\customize\class-wp-customize-selective-refresh.php apply_filters( 'customize_dynamic_partial_args', $partial_args, $partial_id )
	* @Reference wp-includes\customize\class-wp-customize-selective-refresh.php apply_filters( 'customize_dynamic_partial_args', $args, $id )
	*/
	const CustomizeDynamicPartialArgs = "customize_dynamic_partial_args";
	/**
				 * Filters the class used to construct partials.
				 *
				 * Allow non-statically created partials to be constructed with custom WP_Customize_Partial subclass.
				 *
				 * @since 4.5.0
				 *
				 * @param string $partial_class WP_Customize_Partial or a subclass.
				 * @param string $partial_id    ID for dynamic partial.
				 * @param array  $partial_args  The arguments to the WP_Customize_Partial constructor.
				 * @Reference wp-includes\customize\class-wp-customize-selective-refresh.php apply_filters( 'customize_dynamic_partial_class', $partial_class, $partial_id, $partial_args )
	* @Reference wp-includes\customize\class-wp-customize-selective-refresh.php apply_filters( 'customize_dynamic_partial_class', $class, $id, $args )
	*/
	const CustomizeDynamicPartialClass = "customize_dynamic_partial_class";
	/**
				 * Filters a dynamic setting's constructor args.
				 *
				 * For a dynamic setting to be registered, this filter must be employed
				 * to override the default false value with an array of args to pass to
				 * the WP_Customize_Setting constructor.
				 *
				 * @since 4.2.0
				 *
				 * @param false|array $setting_args The arguments to the WP_Customize_Setting constructor.
				 * @param string      $setting_id   ID for dynamic setting, usually coming from `$_POST['customized']`.
				 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_dynamic_setting_args', $setting_args, $setting_id )
	* @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_dynamic_setting_args', $args, $id )
	*/
	const CustomizeDynamicSettingArgs = "customize_dynamic_setting_args";
	/**
				 * Allow non-statically created settings to be constructed with custom WP_Customize_Setting subclass.
				 *
				 * @since 4.2.0
				 *
				 * @param string $setting_class WP_Customize_Setting or a subclass.
				 * @param string $setting_id    ID for dynamic setting, usually coming from `$_POST['customized']`.
				 * @param array  $setting_args  WP_Customize_Setting or a subclass.
				 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_dynamic_setting_class', $setting_class, $setting_id, $setting_args )
	* @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_dynamic_setting_class', $class, $id, $args )
	*/
	const CustomizeDynamicSettingClass = "customize_dynamic_setting_class";
	/**
			 * Filters the theme data loaded in the customizer.
			 *
			 * This allows theme data to be loading from an external source,
			 * or modification of data loaded from `wp_prepare_themes_for_js()`
			 * or WordPress.org via `themes_api()`.
			 *
			 * @since 4.9.0
			 *
			 * @see wp_prepare_themes_for_js()
			 * @see themes_api()
			 * @see WP_Customize_Manager::__construct()
			 *
			 * @param array                $themes  Nested array of theme data.
			 * @param array                $args    List of arguments, such as page, search term, and tags to query for.
			 * @param WP_Customize_Manager $manager Instance of Customize manager.
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_load_themes', $themes, $args, $this )
	*/
	const CustomizeLoadThemes = "customize_load_themes";
	/**
			 * Filters the core Customizer components to load.
			 *
			 * This allows Core components to be excluded from being instantiated by
			 * filtering them out of the array. Note that this filter generally runs
			 * during the {@see 'plugins_loaded'} action, so it cannot be added
			 * in a theme.
			 *
			 * @since 4.4.0
			 *
			 * @see WP_Customize_Manager::__construct()
			 *
			 * @param string[]             $components Array of core components to load.
			 * @param WP_Customize_Manager $this       WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_loaded_components', $this->components, $this )
	*/
	const CustomizeLoadedComponents = "customize_loaded_components";
	/**
			 * Filters the available menu item types.
			 *
			 * @since 4.3.0
			 * @since 4.7.0  Each array item now includes a `$type_label` in addition to `$title`, `$type`, and `$object`.
			 *
			 * @param array $item_types Navigation menu item types.
			 * @Reference wp-includes\class-wp-customize-nav-menus.php apply_filters( 'customize_nav_menu_available_item_types', $item_types )
	*/
	const CustomizeNavMenuAvailableItemTypes = "customize_nav_menu_available_item_types";
	/**
			 * Filters the available menu items.
			 *
			 * @since 4.3.0
			 *
			 * @param array  $items  The array of menu items.
			 * @param string $type   The object type.
			 * @param string $object The object name.
			 * @param int    $page   The current page number.
			 * @Reference wp-includes\class-wp-customize-nav-menus.php apply_filters( 'customize_nav_menu_available_items', $items, $type, $object, $page )
	*/
	const CustomizeNavMenuAvailableItems = "customize_nav_menu_available_items";
	/**
			 * Filters the available menu items during a search request.
			 *
			 * @since 4.5.0
			 *
			 * @param array $items The array of menu items.
			 * @param array $args  Includes 'pagenum' and 's' (search) arguments.
			 * @Reference wp-includes\class-wp-customize-nav-menus.php apply_filters( 'customize_nav_menu_searched_items', $items, $args )
	*/
	const CustomizeNavMenuSearchedItems = "customize_nav_menu_searched_items";
	/**
			 * Filters response of WP_Customize_Panel::active().
			 *
			 * @since 4.1.0
			 *
			 * @param bool               $active Whether the Customizer panel is active.
			 * @param WP_Customize_Panel $panel  WP_Customize_Panel instance.
			 * @Reference wp-includes\class-wp-customize-panel.php apply_filters( 'customize_panel_active', $active, $panel )
	*/
	const CustomizePanelActive = "customize_panel_active";
	/**
			 * Filters partial rendering.
			 *
			 * @since 4.5.0
			 *
			 * @param string|array|false   $rendered          The partial value. Default false.
			 * @param WP_Customize_Partial $partial           WP_Customize_Setting instance.
			 * @param array                $container_context Optional array of context data associated with
			 *                                                the target container.
			 * @Reference wp-includes\customize\class-wp-customize-partial.php apply_filters( 'customize_partial_render', $rendered, $partial, $container_context )
	*/
	const CustomizePartialRender = "customize_partial_render";
	/**
			 * Filters the available devices to allow previewing in the Customizer.
			 *
			 * @since 4.5.0
			 *
			 * @see WP_Customize_Manager::get_previewable_devices()
			 *
			 * @param array $devices List of devices with labels and default setting.
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_previewable_devices', $devices )
	*/
	const CustomizePreviewableDevices = "customize_previewable_devices";
	/**
			 * Filters nonces for Customizer.
			 *
			 * @since 4.2.0
			 *
			 * @param string[]             $nonces Array of refreshed nonces for save and
			 *                                     preview actions.
			 * @param WP_Customize_Manager $this   WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_refresh_nonces', $nonces, $this )
	*/
	const CustomizeRefreshNonces = "customize_refresh_nonces";
	/**
			 * Filters the response from rendering the partials.
			 *
			 * Plugins may use this filter to inject `$scripts` and `$styles`, which are dependencies
			 * for the partials being rendered. The response data will be available to the client via
			 * the `render-partials-response` JS event, so the client can then inject the scripts and
			 * styles into the DOM if they have not already been enqueued there.
			 *
			 * If plugins do this, they'll need to take care for any scripts that do `document.write()`
			 * and make sure that these are not injected, or else to override the function to no-op,
			 * or else the page will be destroyed.
			 *
			 * Plugins should be aware that `$scripts` and `$styles` may eventually be included by
			 * default in the response.
			 *
			 * @since 4.5.0
			 *
			 * @param array $response {
			 *     Response.
			 *
			 *     @type array $contents Associative array mapping a partial ID its corresponding array of contents
			 *                           for the containers requested.
			 *     @type array $errors   List of errors triggered during rendering of partials, if `WP_DEBUG_DISPLAY`
			 *                           is enabled.
			 * }
			 * @param WP_Customize_Selective_Refresh $this     Selective refresh component.
			 * @param array                          $partials Placements' context data for the partials rendered in the request.
			 *                                                 The array is keyed by partial ID, with each item being an array of
			 *                                                 the placements' context data.
			 * @Reference wp-includes\customize\class-wp-customize-selective-refresh.php apply_filters( 'customize_render_partials_response', $response, $this, $partials )
	*/
	const CustomizeRenderPartialsResponse = "customize_render_partials_response";
	/**
			 * Filters response data for a successful customize_save Ajax request.
			 *
			 * This filter does not apply if there was a nonce or authentication failure.
			 *
			 * @since 4.2.0
			 *
			 * @param array                $response Additional information passed back to the 'saved'
			 *                                       event on `wp.customize`.
			 * @param WP_Customize_Manager $this     WP_Customize_Manager instance.
			 * @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'customize_save_response', $response, $this )
	*/
	const CustomizeSaveResponse = "customize_save_response";
	/**
			 * Filters response of WP_Customize_Section::active().
			 *
			 * @since 4.1.0
			 *
			 * @param bool                 $active  Whether the Customizer section is active.
			 * @param WP_Customize_Section $section WP_Customize_Section instance.
			 * @Reference wp-includes\class-wp-customize-section.php apply_filters( 'customize_section_active', $active, $section )
	*/
	const CustomizeSectionActive = "customize_section_active";
	/**
						 * Filters Customizer widget section arguments for a given sidebar.
						 *
						 * @since 3.9.0
						 *
						 * @param array      $section_args Array of Customizer widget section arguments.
						 * @param string     $section_id   Customizer section ID.
						 * @param int|string $sidebar_id   Sidebar ID.
						 * @Reference wp-includes\class-wp-customize-widgets.php apply_filters( 'customizer_widgets_section_args', $section_args, $section_id, $sidebar_id )
	*/
	const CustomizerWidgetsSectionArgs = "customizer_widgets_section_args";
	/**
		 * Filters the array of extra elements to list in the 'At a Glance'
		 * dashboard widget.
		 *
		 * Prior to 3.8.0, the widget was named 'Right Now'. Each element
		 * is wrapped in list-item tags on output.
		 *
		 * @since 3.8.0
		 *
		 * @param string[] $items Array of extra 'At a Glance' widget items.
		 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_glance_items', array() )
	*/
	const DashboardGlanceItems = "dashboard_glance_items";
	/**
				 * Filters the primary feed URL for the 'WordPress Events and News' dashboard widget.
				 *
				 * @since 2.3.0
				 *
				 * @param string $url The widget's primary feed URL.
				 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_primary_feed', __( 'https://wordpress.org/news/feed/' ) )
	*/
	const DashboardPrimaryFeed = "dashboard_primary_feed";
	/**
				 * Filters the primary link URL for the 'WordPress Events and News' dashboard widget.
				 *
				 * @since 2.5.0
				 *
				 * @param string $link The widget's primary link URL.
				 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_primary_link', __( 'https://wordpress.org/news/' ) )
	*/
	const DashboardPrimaryLink = "dashboard_primary_link";
	/**
				 * Filters the primary link title for the 'WordPress Events and News' dashboard widget.
				 *
				 * @since 2.3.0
				 *
				 * @param string $title Title attribute for the widget's primary link.
				 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_primary_title', __( 'WordPress Blog' ) )
	*/
	const DashboardPrimaryTitle = "dashboard_primary_title";
	/**
			 * Filters the post query arguments for the 'Recent Drafts' dashboard widget.
			 *
			 * @since 4.4.0
			 *
			 * @param array $query_args The query arguments for the 'Recent Drafts' dashboard widget.
			 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_recent_drafts_query_args', $query_args )
	*/
	const DashboardRecentDraftsQueryArgs = "dashboard_recent_drafts_query_args";
	/**
		 * Filters the query arguments used for the Recent Posts widget.
		 *
		 * @since 4.2.0
		 *
		 * @param array $query_args The arguments passed to WP_Query to produce the list of posts.
		 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_recent_posts_query_args', $query_args )
	*/
	const DashboardRecentPostsQueryArgs = "dashboard_recent_posts_query_args";
	/**
				 * Filters the secondary feed URL for the 'WordPress Events and News' dashboard widget.
				 *
				 * @since 2.3.0
				 *
				 * @param string $url The widget's secondary feed URL.
				 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_secondary_feed', __( 'https://planet.wordpress.org/feed/' ) )
	*/
	const DashboardSecondaryFeed = "dashboard_secondary_feed";
	/**
				 * Filters the number of secondary link items for the 'WordPress Events and News' dashboard widget.
				 *
				 * @since 4.4.0
				 *
				 * @param string $items How many items to show in the secondary feed.
				 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_secondary_items', 3 )
	*/
	const DashboardSecondaryItems = "dashboard_secondary_items";
	/**
				 * Filters the secondary link URL for the 'WordPress Events and News' dashboard widget.
				 *
				 * @since 2.3.0
				 *
				 * @param string $link The widget's secondary link URL.
				 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_secondary_link', __( 'https://planet.wordpress.org/' ) )
	*/
	const DashboardSecondaryLink = "dashboard_secondary_link";
	/**
				 * Filters the secondary link title for the 'WordPress Events and News' dashboard widget.
				 *
				 * @since 2.3.0
				 *
				 * @param string $title Title attribute for the widget's secondary link.
				 * @Reference wp-admin\includes\dashboard.php apply_filters( 'dashboard_secondary_title', __( 'Other WordPress News' ) )
	*/
	const DashboardSecondaryTitle = "dashboard_secondary_title";
	/**
		 * Filters the default date formats.
		 *
		 * @since 2.7.0
		 * @since 4.0.0 Added ISO date standard YYYY-MM-DD format.
		 *
		 * @param string[] $default_date_formats Array of default date formats.
		 * @Reference wp-admin\options-general.php apply_filters( 'date_formats', array( __( 'F j, Y' ), 'Y-m-d', 'm/d/Y', 'd/m/Y' ) )
	*/
	const DateFormats = "date_formats";
	/**
		 * Filters the date formatted based on the locale.
		 *
		 * @since 2.8.0
		 *
		 * @param string $date      Formatted date string.
		 * @param string $format    Format to display the date.
		 * @param int    $timestamp A sum of Unix timestamp and timezone offset in seconds.
		 *                          Might be without offset if input omitted timestamp but requested GMT.
		 * @param bool   $gmt       Whether to use GMT timezone. Only applies if timestamp was not provided.
		 *                          Default false.
		 * @Reference wp-includes\functions.php apply_filters( 'date_i18n', $date, $format, $timestamp, $gmt )
	*/
	const DateI18n = "date_i18n";
	/**
				 * Filters the list of valid date query columns.
				 *
				 * @since 3.7.0
				 * @since 4.1.0 Added 'user_registered' to the default recognized columns.
				 *
				 * @param string[] $valid_columns An array of valid date query columns. Defaults
				 *                                are 'post_date', 'post_date_gmt', 'post_modified',
				 *                                'post_modified_gmt', 'comment_date', 'comment_date_gmt',
				 *                                'user_registered'
				 * @Reference wp-includes\class-wp-date-query.php apply_filters( 'date_query_valid_columns', $valid_columns )
	*/
	const DateQueryValidColumns = "date_query_valid_columns";
	/**
			 * Filters rewrite rules used for date archives.
			 *
			 * Likely date archives would include /yyyy/, /yyyy/mm/, and /yyyy/mm/dd/.
			 *
			 * @since 1.5.0
			 *
			 * @param array $date_rewrite The rewrite rules for date archives.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'date_rewrite_rules', $date_rewrite )
	*/
	const DateRewriteRules = "date_rewrite_rules";
	/**
		 * Filters the day archive permalink.
		 *
		 * @since 1.5.0
		 *
		 * @param string $daylink Permalink for the day archive.
		 * @param int    $year    Year for the archive.
		 * @param int    $month   Month for the archive.
		 * @param int    $day     The day for the archive.
		 * @Reference wp-includes\link-template.php apply_filters( 'day_link', $daylink, $year, $month, $day )
	*/
	const DayLink = "day_link";
	/**
		 * Filters the dbDelta SQL queries for creating tables and/or databases.
		 *
		 * Queries filterable via this hook contain "CREATE TABLE" or "CREATE DATABASE".
		 *
		 * @since 3.3.0
		 *
		 * @param string[] $cqueries An array of dbDelta create SQL queries.
		 * @Reference wp-admin\includes\upgrade.php apply_filters( 'dbdelta_create_queries', $cqueries )
	*/
	const DbdeltaCreateQueries = "dbdelta_create_queries";
	/**
		 * Filters the dbDelta SQL queries for inserting or updating.
		 *
		 * Queries filterable via this hook contain "INSERT INTO" or "UPDATE".
		 *
		 * @since 3.3.0
		 *
		 * @param string[] $iqueries An array of dbDelta insert or update SQL queries.
		 * @Reference wp-admin\includes\upgrade.php apply_filters( 'dbdelta_insert_queries', $iqueries )
	*/
	const DbdeltaInsertQueries = "dbdelta_insert_queries";
	/**
		 * Filters the dbDelta SQL queries.
		 *
		 * @since 3.3.0
		 *
		 * @param string[] $queries An array of dbDelta SQL queries.
		 * @Reference wp-admin\includes\upgrade.php apply_filters( 'dbdelta_queries', $queries )
	*/
	const DbdeltaQueries = "dbdelta_queries";
	/**
			 * Add or modify the debug information.
			 *
			 * Plugin or themes may wish to introduce their own debug information without creating additional admin pages
			 * they can utilize this filter to introduce their own sections or add more data to existing sections.
			 *
			 * Array keys for sections added by core are all prefixed with `wp-`, plugins and themes should use their own slug as
			 * a prefix, both for consistency as well as avoiding key collisions. Note that the array keys are used as labels
			 * for the copied data.
			 *
			 * All strings are expected to be plain text except $description that can contain inline HTML tags (see below).
			 *
			 * @since 5.2.0
			 *
			 * @param array $args {
			 *     The debug information to be added to the core information page.
			 *
			 *     This is an associative multi-dimensional array, up to three levels deep. The topmost array holds the sections.
			 *     Each section has a `$fields` associative array (see below), and each `$value` in `$fields` can be
			 *     another associative array of name/value pairs when there is more structured data to display.
			 *
			 *     @type string  $label        The title for this section of the debug output.
			 *     @type string  $description  Optional. A description for your information section which may contain basic HTML
			 *                                 markup, inline tags only as it is outputted in a paragraph.
			 *     @type boolean $show_count   Optional. If set to `true` the amount of fields will be included in the title for
			 *                                 this section.
			 *     @type boolean $private      Optional. If set to `true` the section and all associated fields will be excluded
			 *                                 from the copied data.
			 *     @type array   $fields {
			 *         An associative array containing the data to be displayed.
			 *
			 *         @type string  $label    The label for this piece of information.
			 *         @type string  $value    The output that is displayed for this field. Text should be translated. Can be
			 *                                 an associative array that is displayed as name/value pairs.
			 *         @type string  $debug    Optional. The output that is used for this field when the user copies the data.
			 *                                 It should be more concise and not translated. If not set, the content of `$value` is used.
			 *                                 Note that the array keys are used as labels for the copied data.
			 *         @type boolean $private  Optional. If set to `true` the field will not be included in the copied data
			 *                                 allowing you to show, for example, API keys here.
			 *     }
			 * }
			 * @Reference wp-admin\includes\class-wp-debug-data.php apply_filters( 'debug_information', $info )
	*/
	const DebugInformation = "debug_information";
	/**
	 * Filters the HTML output of the default avatar list.
	 *
	 * @since 2.6.0
	 *
	 * @param string $avatar_list HTML markup of the avatar list.
	 * @Reference wp-admin\options-discussion.php apply_filters( 'default_avatar_select', $avatar_list )
	*/
	const DefaultAvatarSelect = "default_avatar_select";
	/**
		 * Filters the default post content initially used in the "Write Post" form.
		 *
		 * @since 1.5.0
		 *
		 * @param string  $post_content Default post content.
		 * @param WP_Post $post         Post object.
		 * @Reference wp-admin\includes\post.php apply_filters( 'default_content', $post_content, $post )
	*/
	const DefaultContent = "default_content";
	/**
				 * Filters the default legacy contextual help text.
				 *
				 * @since 2.8.0
				 * @deprecated 3.3.0 Use get_current_screen()->add_help_tab() or
				 *                   get_current_screen()->remove_help_tab() instead.
				 *
				 * @param string $old_help_default Default contextual help text.
				 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'default_contextual_help', '' )
	*/
	const DefaultContextualHelp = "default_contextual_help";
	/**
		 * Filters the default post excerpt initially used in the "Write Post" form.
		 *
		 * @since 1.5.0
		 *
		 * @param string  $post_excerpt Default post excerpt.
		 * @param WP_Post $post         Post object.
		 * @Reference wp-admin\includes\post.php apply_filters( 'default_excerpt', $post_excerpt, $post )
	*/
	const DefaultExcerpt = "default_excerpt";
	/**
		 * Filters the default feed type.
		 *
		 * @since 2.5.0
		 *
		 * @param string $feed_type Type of default feed. Possible values include 'rss2', 'atom'.
		 *                          Default 'rss2'.
		 * @Reference wp-includes\feed.php apply_filters( 'default_feed', 'rss2' )
	*/
	const DefaultFeed = "default_feed";
	/**
			 * Filters the default list of hidden columns.
			 *
			 * @since 4.4.0
			 *
			 * @param array     $hidden An array of columns hidden by default.
			 * @param WP_Screen $screen WP_Screen object of the current screen.
			 * @Reference wp-admin\includes\screen.php apply_filters( 'default_hidden_columns', $hidden, $screen )
	*/
	const DefaultHiddenColumns = "default_hidden_columns";
	/**
			 * Filters the default list of hidden meta boxes.
			 *
			 * @since 3.1.0
			 *
			 * @param array     $hidden An array of meta boxes hidden by default.
			 * @param WP_Screen $screen WP_Screen object of the current screen.
			 * @Reference wp-admin\includes\screen.php apply_filters( 'default_hidden_meta_boxes', $hidden, $screen )
	*/
	const DefaultHiddenMetaBoxes = "default_hidden_meta_boxes";
	/**
			 * Filters the title of the default page template displayed in the drop-down.
			 *
			 * @since 4.1.0
			 *
			 * @param string $label   The display value for the default page template title.
			 * @param string $context Where the option label is displayed. Possible values
			 *                        include 'meta-box' or 'quick-edit'.
			 * @Reference wp-admin\includes\meta-boxes.php apply_filters( 'default_page_template_title', __( 'Default Template' ), 'meta-box' )
	* @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'default_page_template_title', __( 'Default Template' ), 'quick-edit' )
	* @Reference wp-admin\edit-form-blocks.php apply_filters( 'default_page_template_title', __( 'Default template' ), 'rest-api' )
	*/
	const DefaultPageTemplateTitle = "default_page_template_title";
	/**
		 * Filters the default post title initially used in the "Write Post" form.
		 *
		 * @since 1.5.0
		 *
		 * @param string  $post_title Default post title.
		 * @param WP_Post $post       Post object.
		 * @Reference wp-admin\includes\post.php apply_filters( 'default_title', $post_title, $post )
	*/
	const DefaultTitle = "default_title";
	/**
		 * Filters the email content sent when a site in a Multisite network is deleted.
		 *
		 * @since 3.0.0
		 *
		 * @param string $content The email content that will be sent to the user who deleted a site in a Multisite network.
		 * @Reference wp-admin\ms-delete-site.php apply_filters( 'delete_site_email_content', $content )
	*/
	const DeleteSiteEmailContent = "delete_site_email_content";
	/**
		 * Filters whether to trigger an error for deprecated arguments.
		 *
		 * @since 3.0.0
		 *
		 * @param bool $trigger Whether to trigger the error for deprecated arguments. Default true.
		 * @Reference wp-includes\functions.php apply_filters( 'deprecated_argument_trigger_error', true )
	*/
	const DeprecatedArgumentTriggerError = "deprecated_argument_trigger_error";
	/**
		 * Filters whether to trigger an error for deprecated functions.
		 *
		 * `WP_DEBUG` must be true in addition to the filter evaluating to true.
		 *
		 * @since 4.3.0
		 *
		 * @param bool $trigger Whether to trigger the error for deprecated functions. Default true.
		 * @Reference wp-includes\functions.php apply_filters( 'deprecated_constructor_trigger_error', true )
	*/
	const DeprecatedConstructorTriggerError = "deprecated_constructor_trigger_error";
	/**
		 * Filters whether to trigger an error for deprecated files.
		 *
		 * @since 2.5.0
		 *
		 * @param bool $trigger Whether to trigger the error for deprecated files. Default true.
		 * @Reference wp-includes\functions.php apply_filters( 'deprecated_file_trigger_error', true )
	*/
	const DeprecatedFileTriggerError = "deprecated_file_trigger_error";
	/**
		 * Filters whether to trigger an error for deprecated functions.
		 *
		 * @since 2.5.0
		 *
		 * @param bool $trigger Whether to trigger the error for deprecated functions. Default true.
		 * @Reference wp-includes\functions.php apply_filters( 'deprecated_function_trigger_error', true )
	*/
	const DeprecatedFunctionTriggerError = "deprecated_function_trigger_error";
	/**
		 * Filters whether to trigger deprecated hook errors.
		 *
		 * @since 4.6.0
		 *
		 * @param bool $trigger Whether to trigger deprecated hook errors. Requires
		 *                      `WP_DEBUG` to be defined true.
		 * @Reference wp-includes\functions.php apply_filters( 'deprecated_hook_trigger_error', true )
	*/
	const DeprecatedHookTriggerError = "deprecated_hook_trigger_error";
	/**
		 * Filters the current user.
		 *
		 * The default filters use this to determine the current user from the
		 * request's cookies, if available.
		 *
		 * Returning a value of false will effectively short-circuit setting
		 * the current user.
		 *
		 * @since 3.9.0
		 *
		 * @param int|bool $user_id User ID if one has been determined, false otherwise.
		 * @Reference wp-includes\user.php apply_filters( 'determine_current_user', false )
	*/
	const DetermineCurrentUser = "determine_current_user";
	/**
		 * Filters the locale for the current request.
		 *
		 * @since 5.0.0
		 *
		 * @param string $locale The locale.
		 * @Reference wp-includes\l10n.php apply_filters( 'determine_locale', $determined_locale )
	*/
	const DetermineLocale = "determine_locale";
	/**
		 * Filters whether to disable captions.
		 *
		 * Prevents image captions from being appended to image HTML when inserted into the editor.
		 *
		 * @since 2.6.0
		 *
		 * @param bool $bool Whether to disable appending captions. Returning true to the filter
		 *                   will disable captions. Default empty string.
		 * @Reference wp-admin\includes\media.php apply_filters( 'disable_captions', '' )
	* @Reference wp-admin\includes\media.php apply_filters( 'disable_captions', '' )
	* @Reference wp-admin\includes\media.php apply_filters( 'disable_captions', '' )
	* @Reference wp-includes\class-wp-editor.php apply_filters( 'disable_captions', '' )
	* @Reference wp-includes\media.php apply_filters( 'disable_captions', '' )
	* @Reference wp-includes\media-template.php apply_filters( 'disable_captions', '' )
	* @Reference wp-includes\media-template.php apply_filters( 'disable_captions', '' )
	* @Reference wp-includes\script-loader.php apply_filters( 'disable_captions', '' )
	*/
	const DisableCaptions = "disable_captions";
	/**
			 * Filters whether to remove the 'Categories' drop-down from the post list table.
			 *
			 * @since 4.6.0
			 *
			 * @param bool   $disable   Whether to disable the categories drop-down. Default false.
			 * @param string $post_type Post type slug.
			 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'disable_categories_dropdown', false, $post_type )
	*/
	const DisableCategoriesDropdown = "disable_categories_dropdown";
	/**
			 * Filters whether to remove the 'Formats' drop-down from the post list table.
			 *
			 * @since 5.2.0
			 *
			 * @param bool $disable Whether to disable the drop-down. Default false.
			 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'disable_formats_dropdown', false )
	*/
	const DisableFormatsDropdown = "disable_formats_dropdown";
	/**
			 * Filters whether to remove the 'Months' drop-down from the post list table.
			 *
			 * @since 4.2.0
			 *
			 * @param bool   $disable   Whether to disable the drop-down. Default false.
			 * @param string $post_type The post type.
			 * @Reference wp-admin\includes\class-wp-list-table.php apply_filters( 'disable_months_dropdown', false, $post_type )
	*/
	const DisableMonthsDropdown = "disable_months_dropdown";
	/**
		 * Filters the default media display states for items in the Media list table.
		 *
		 * @since 3.2.0
		 * @since 4.8.0 Added the `$post` parameter.
		 *
		 * @param string[] $media_states An array of media states. Default 'Header Image',
		 *                               'Background Image', 'Site Icon', 'Logo'.
		 * @param WP_Post  $post         The current attachment object.
		 * @Reference wp-admin\includes\template.php apply_filters( 'display_media_states', $media_states, $post )
	*/
	const DisplayMediaStates = "display_media_states";
	/**
		 * Filters the default post display states used in the posts list table.
		 *
		 * @since 2.8.0
		 * @since 3.6.0 Added the `$post` parameter.
		 *
		 * @param string[] $post_states An array of post display states.
		 * @param WP_Post  $post        The current post object.
		 * @Reference wp-admin\includes\template.php apply_filters( 'display_post_states', $post_states, $post )
	*/
	const DisplayPostStates = "display_post_states";
	/**
			 * Filter the default site display states for items in the Sites list table.
			 *
			 * @since 5.3.0
			 *
			 * @param array $site_states An array of site states. Default 'Main',
			 *                           'Archived', 'Mature', 'Spam', 'Deleted'.
			 * @param WP_Site $site The current site object.
			 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php apply_filters( 'display_site_states', $site_states, $_site )
	*/
	const DisplaySiteStates = "display_site_states";
	/**
		 * Filters whether to attempt to perform the multisite DB upgrade routine.
		 *
		 * In single site, the user would be redirected to wp-admin/upgrade.php.
		 * In multisite, the DB upgrade routine is automatically fired, but only
		 * when this filter returns true.
		 *
		 * If the network is 50 sites or less, it will run every time. Otherwise,
		 * it will throttle itself to reduce load.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param bool $do_mu_upgrade Whether to perform the Multisite upgrade routine. Default true.
		 * @Reference wp-admin\admin.php apply_filters( 'do_mu_upgrade', true )
	*/
	const DoMuUpgrade = "do_mu_upgrade";
	/**
			 * Filters whether to parse the request.
			 *
			 * @since 3.5.0
			 *
			 * @param bool         $bool             Whether or not to parse the request. Default true.
			 * @param WP           $this             Current WordPress environment instance.
			 * @param array|string $extra_query_vars Extra passed query variables.
			 * @Reference wp-includes\class-wp.php apply_filters( 'do_parse_request', true, $this, $extra_query_vars )
	*/
	const DoParseRequest = "do_parse_request";
	/**
		 * Filters the output created by a shortcode callback.
		 *
		 * @since 4.7.0
		 *
		 * @param string       $output Shortcode output.
		 * @param string       $tag    Shortcode name.
		 * @param array|string $attr   Shortcode attributes array or empty string.
		 * @param array        $m      Regular expression match array.
		 * @Reference wp-includes\shortcodes.php apply_filters( 'do_shortcode_tag', $output, $tag, $attr, $m )
	*/
	const DoShortcodeTag = "do_shortcode_tag";
	/**
		 * Filters the parts of the document title.
		 *
		 * @since 4.4.0
		 *
		 * @param array $title {
		 *     The document title parts.
		 *
		 *     @type string $title   Title of the viewed page.
		 *     @type string $page    Optional. Page number if paginated.
		 *     @type string $tagline Optional. Site description when on home page.
		 *     @type string $site    Optional. Site title when not on home page.
		 * }
		 * @Reference wp-includes\general-template.php apply_filters( 'document_title_parts', $title )
	*/
	const DocumentTitleParts = "document_title_parts";
	/**
		 * Filters the separator for the document title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $sep Document title separator. Default '-'.
		 * @Reference wp-includes\general-template.php apply_filters( 'document_title_separator', '-' )
	*/
	const DocumentTitleSeparator = "document_title_separator";
	/**
		 * Filters the list of functions and classes to be ignored from the documentation lookup.
		 *
		 * @since 2.8.0
		 *
		 * @param string[] $ignore_functions Array of names of functions and classes to be ignored.
		 * @Reference wp-admin\includes\misc.php apply_filters( 'documentation_ignore_functions', $ignore_functions )
	*/
	const DocumentationIgnoreFunctions = "documentation_ignore_functions";
	/**
		 * Filters whether to trigger an error for _doing_it_wrong() calls.
		 *
		 * @since 3.1.0
		 * @since 5.1.0 Added the $function, $message and $version parameters.
		 *
		 * @param bool   $trigger  Whether to trigger the error for _doing_it_wrong() calls. Default true.
		 * @param string $function The function that was called.
		 * @param string $message  A message explaining what has been done incorrectly.
		 * @param string $version  The version of WordPress where the message was added.
		 * @Reference wp-includes\functions.php apply_filters( 'doing_it_wrong_trigger_error', true, $function, $message, $version )
	*/
	const DoingItWrongTriggerError = "doing_it_wrong_trigger_error";
	/**
		 * Filters whether a site name is taken.
		 *
		 * The name is the site's subdomain or the site's subdirectory
		 * path depending on the network settings.
		 *
		 * @since 3.5.0
		 *
		 * @param int|null $result     The site ID if the site name exists, null otherwise.
		 * @param string   $domain     Domain to be checked.
		 * @param string   $path       Path to be checked.
		 * @param int      $network_id Network ID. Relevant only on multi-network installations.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'domain_exists', $result, $domain, $path, $network_id )
	*/
	const DomainExists = "domain_exists";
	/**
				 * Filters the maximum error response body size in `download_url()`.
				 *
				 * @since 5.1.0
				 *
				 * @see download_url()
				 *
				 * @param int $size The maximum error response body size. Default 1 KB.
				 * @Reference wp-admin\includes\file.php apply_filters( 'download_url_error_max_body_size', KB_IN_BYTES )
	*/
	const DownloadUrlErrorMaxBodySize = "download_url_error_max_body_size";
	/**
		 * Filters the ID, if any, of the duplicate comment found when creating a new comment.
		 *
		 * Return an empty value from this filter to allow what WP considers a duplicate comment.
		 *
		 * @since 4.4.0
		 *
		 * @param int   $dupe_id     ID of the comment identified as a duplicate.
		 * @param array $commentdata Data for the comment being created.
		 * @Reference wp-includes\comment.php apply_filters( 'duplicate_comment_id', $dupe_id, $commentdata )
	*/
	const DuplicateCommentId = "duplicate_comment_id";
	/**
		 * Filters whether a sidebar has widgets.
		 *
		 * Note: The filter is also evaluated for empty sidebars, and on both the front end
		 * and back end, including the Inactive Widgets sidebar on the Widgets screen.
		 *
		 * @since 3.9.0
		 *
		 * @param bool       $did_one Whether at least one widget was rendered in the sidebar.
		 *                            Default false.
		 * @param int|string $index   Index, name, or ID of the dynamic sidebar.
		 * @Reference wp-includes\widgets.php apply_filters( 'dynamic_sidebar_has_widgets', $did_one, $index )
	* @Reference wp-includes\widgets.php apply_filters( 'dynamic_sidebar_has_widgets', false, $index )
	*/
	const DynamicSidebarHasWidgets = "dynamic_sidebar_has_widgets";
	/**
			 * Filters the parameters passed to a widget's display callback.
			 *
			 * Note: The filter is evaluated on both the front end and back end,
			 * including for the Inactive Widgets sidebar on the Widgets screen.
			 *
			 * @since 2.5.0
			 *
			 * @see register_sidebar()
			 *
			 * @param array $params {
			 *     @type array $args  {
			 *         An array of widget display arguments.
			 *
			 *         @type string $name          Name of the sidebar the widget is assigned to.
			 *         @type string $id            ID of the sidebar the widget is assigned to.
			 *         @type string $description   The sidebar description.
			 *         @type string $class         CSS class applied to the sidebar container.
			 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
			 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
			 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
			 *         @type string $after_title   HTML markup to append to the widget title when displayed.
			 *         @type string $widget_id     ID of the widget.
			 *         @type string $widget_name   Name of the widget.
			 *     }
			 *     @type array $widget_args {
			 *         An array of multi-widget arguments.
			 *
			 *         @type int $number Number increment used for multiples of the same widget.
			 *     }
			 * }
			 * @Reference wp-includes\widgets.php apply_filters( 'dynamic_sidebar_params', $params )
	*/
	const DynamicSidebarParams = "dynamic_sidebar_params";
	/**
		 * Filters the bookmark edit link anchor tag.
		 *
		 * @since 2.7.0
		 *
		 * @param string $link    Anchor tag for the edit link.
		 * @param int    $link_id Bookmark ID.
		 * @Reference wp-includes\link-template.php apply_filters( 'edit_bookmark_link', $link, $bookmark->link_id )
	*/
	const EditBookmarkLink = "edit_bookmark_link";
	/**
				 * Filters the number of terms displayed per page for the Categories list table.
				 *
				 * @since 2.8.0
				 *
				 * @param int $tags_per_page Number of categories to be displayed. Default 20.
				 * @Reference wp-admin\includes\class-wp-terms-list-table.php apply_filters( 'edit_categories_per_page', $tags_per_page )
	* @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'edit_categories_per_page', $per_page )
	*/
	const EditCategoriesPerPage = "edit_categories_per_page";
	/**
		 * Filters the comment edit link anchor tag.
		 *
		 * @since 2.3.0
		 *
		 * @param string $link       Anchor tag for the edit link.
		 * @param int    $comment_id Comment ID.
		 * @param string $text       Anchor text.
		 * @Reference wp-includes\link-template.php apply_filters( 'edit_comment_link', $link, $comment->comment_ID, $text )
	*/
	const EditCommentLink = "edit_comment_link";
	/**
		 * Filters miscellaneous actions for the edit comment form sidebar.
		 *
		 * @since 4.3.0
		 *
		 * @param string $html    Output HTML to display miscellaneous action.
		 * @param object $comment Current comment object.
		 * @Reference wp-admin\edit-form-comment.php apply_filters( 'edit_comment_misc_actions', '', $comment )
	*/
	const EditCommentMiscActions = "edit_comment_misc_actions";
	/**
		 * Filters the post edit link anchor tag.
		 *
		 * @since 2.3.0
		 *
		 * @param string $link    Anchor tag for the edit link.
		 * @param int    $post_id Post ID.
		 * @param string $text    Anchor text.
		 * @Reference wp-includes\link-template.php apply_filters( 'edit_post_link', $link, $post->ID, $text )
	*/
	const EditPostLink = "edit_post_link";
	/**
		 * Filters the number of posts displayed per page when specifically listing "posts".
		 *
		 * @since 2.8.0
		 *
		 * @param int    $posts_per_page Number of posts to be displayed. Default 20.
		 * @param string $post_type      The post type.
		 * @Reference wp-admin\includes\post.php apply_filters( 'edit_posts_per_page', $posts_per_page, $post_type )
	* @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'edit_posts_per_page', $per_page, $post_type )
	* @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'edit_posts_per_page', $per_page, $this->post_type )
	*/
	const EditPostsPerPage = "edit_posts_per_page";
	/**
		 * Filters the URL for a user's profile editor.
		 *
		 * @since 3.1.0
		 *
		 * @param string $url     The complete URL including scheme and path.
		 * @param int    $user_id The user ID.
		 * @param string $scheme  Scheme to give the URL context. Accepts 'http', 'https', 'login',
		 *                        'login_post', 'admin', 'relative' or null.
		 * @Reference wp-includes\link-template.php apply_filters( 'edit_profile_url', $url, $user_id, $scheme )
	*/
	const EditProfileUrl = "edit_profile_url";
	/**
		 * Filters the anchor tag for the edit link for a tag (or term in another taxonomy).
		 *
		 * @since 2.7.0
		 *
		 * @param string $link The anchor tag for the edit link.
		 * @Reference wp-includes\link-template.php apply_filters( 'edit_tag_link', $link )
	*/
	const EditTagLink = "edit_tag_link";
	/**
				 * Filters the number of terms displayed per page for the Tags list table.
				 *
				 * @since 2.8.0
				 *
				 * @param int $tags_per_page Number of tags to be displayed. Default 20.
				 * @Reference wp-admin\includes\class-wp-terms-list-table.php apply_filters( 'edit_tags_per_page', $tags_per_page )
	*/
	const EditTagsPerPage = "edit_tags_per_page";
	/**
		 * Filters the anchor tag for the edit link of a term.
		 *
		 * @since 3.1.0
		 *
		 * @param string $link    The anchor tag for the edit link.
		 * @param int    $term_id Term ID.
		 * @Reference wp-includes\link-template.php apply_filters( 'edit_term_link', $link, $term->term_id )
	*/
	const EditTermLink = "edit_term_link";
	/**
		 * Filters file type extensions editable in the plugin editor.
		 *
		 * @since 2.8.0
		 * @since 4.9.0 Added the `$plugin` parameter.
		 *
		 * @param string[] $editable_extensions An array of editable plugin file extensions.
		 * @param string   $plugin              Path to the plugin file relative to the plugins directory.
		 * @Reference wp-admin\includes\file.php apply_filters( 'editable_extensions', $editable_extensions, $plugin )
	*/
	const EditableExtensions = "editable_extensions";
	/**
		 * Filters the list of editable roles.
		 *
		 * @since 2.8.0
		 *
		 * @param array[] $all_roles Array of arrays containing role information.
		 * @Reference wp-admin\includes\user.php apply_filters( 'editable_roles', $all_roles )
	*/
	const EditableRoles = "editable_roles";
	/**
				 * Filters the editable slug.
				 *
				 * Note: This is a multi-use hook in that it is leveraged both for editable
				 * post URIs and term slugs.
				 *
				 * @since 2.6.0
				 * @since 4.4.0 The `$tag` parameter was added.
				 *
				 * @param string          $slug The editable slug. Will be either a term slug or post URI depending
				 *                              upon the context in which it is evaluated.
				 * @param WP_Term|WP_Post $tag  Term or WP_Post object.
				 * @Reference wp-admin\edit-tag-form.php apply_filters( 'editable_slug', $tag->slug, $tag )
	* @Reference wp-admin\includes\meta-boxes.php apply_filters( 'editable_slug', $post->post_name, $post )
	* @Reference wp-admin\includes\post.php apply_filters( 'editable_slug', $post->post_name, $post )
	* @Reference wp-admin\includes\template.php apply_filters( 'editable_slug', $post->post_name, $post )
	* @Reference wp-admin\includes\class-wp-terms-list-table.php apply_filters( 'editable_slug', $qe_data->slug, $qe_data )
	* @Reference wp-admin\includes\class-wp-terms-list-table.php apply_filters( 'editable_slug', $tag->slug, $tag )
	* @Reference wp-admin\includes\post.php apply_filters( 'editable_slug', $uri, $post )
	*/
	const EditableSlug = "editable_slug";
	/**
		 * Filters the maximum image size dimensions for the editor.
		 *
		 * @since 2.5.0
		 *
		 * @param array        $max_image_size An array with the width as the first element,
		 *                                     and the height as the second element.
		 * @param string|array $size           Size of what the result image should be.
		 * @param string       $context        The context the image is being resized for.
		 *                                     Possible values are 'display' (like in a theme)
		 *                                     or 'edit' (like inserting into an editor).
		 * @Reference wp-includes\media.php apply_filters( 'editor_max_image_size', array( $max_width, $max_height ), $size, $context )
	*/
	const EditorMaxImageSize = "editor_max_image_size";
	/**
		 * Filters the array of stylesheets applied to the editor.
		 *
		 * @since 4.3.0
		 *
		 * @param array $stylesheets Array of stylesheets to be applied to the editor.
		 * @Reference wp-includes\theme.php apply_filters( 'editor_stylesheets', $stylesheets )
	*/
	const EditorStylesheets = "editor_stylesheets";
	/**
				 * Filters the contents of the email sent when the user's email is changed.
				 *
				 * @since 4.3.0
				 *
				 * @param array $email_change_email {
				 *            Used to build wp_mail().
				 *            @type string $to      The intended recipients.
				 *            @type string $subject The subject of the email.
				 *            @type string $message The content of the email.
				 *                The following strings have a special meaning and will get replaced dynamically:
				 *                - ###USERNAME###    The current user's username.
				 *                - ###ADMIN_EMAIL### The admin email in case this was unexpected.
				 *                - ###NEW_EMAIL###   The new email address.
				 *                - ###EMAIL###       The old email address.
				 *                - ###SITENAME###    The name of the site.
				 *                - ###SITEURL###     The URL to the site.
				 *            @type string $headers Headers.
				 *        }
				 * @param array $user The original user array.
				 * @param array $userdata The updated user array.
				 * @Reference wp-includes\user.php apply_filters( 'email_change_email', $email_change_email, $user, $userdata )
	*/
	const EmailChangeEmail = "email_change_email";
	/**
			 * Filters the array of post types to cache oEmbed results for.
			 *
			 * @since 2.9.0
			 *
			 * @param string[] $post_types Array of post type names to cache oEmbed results for. Defaults to post types with `show_ui` set to true.
			 * @Reference wp-includes\class-wp-embed.php apply_filters( 'embed_cache_oembed_types', $post_types )
	*/
	const EmbedCacheOembedTypes = "embed_cache_oembed_types";
	/**
		 * Filters the default array of embed dimensions.
		 *
		 * @since 2.9.0
		 *
		 * @param array  $size An array of embed width and height values
		 *                     in pixels (in that order).
		 * @param string $url  The URL that should be embedded.
		 * @Reference wp-includes\embed.php apply_filters( 'embed_defaults', compact( 'width', 'height' ), $url )
	*/
	const EmbedDefaults = "embed_defaults";
	/**
							 * Filters the returned embed handler.
							 *
							 * @since 2.9.0
							 *
							 * @see WP_Embed::shortcode()
							 *
							 * @param mixed  $return The shortcode callback function to call.
							 * @param string $url    The attempted embed URL.
							 * @param array  $attr   An array of shortcode attributes.
							 * @Reference wp-includes\class-wp-embed.php apply_filters( 'embed_handler_html', $return, $url, $attr )
	*/
	const EmbedHandlerHtml = "embed_handler_html";
	/**
		 * Filters the embed HTML output for a given post.
		 *
		 * @since 4.4.0
		 *
		 * @param string  $output The default iframe tag to display embedded content.
		 * @param WP_Post $post   Current post object.
		 * @param int     $width  Width of the response.
		 * @param int     $height Height of the response.
		 * @Reference wp-includes\embed.php apply_filters( 'embed_html', $output, $post, $width, $height )
	*/
	const EmbedHtml = "embed_html";
	/**
			 * Filters the returned, maybe-linked embed URL.
			 *
			 * @since 2.9.0
			 *
			 * @param string $output The linked or original URL.
			 * @param string $url    The original URL.
			 * @Reference wp-includes\class-wp-embed.php apply_filters( 'embed_maybe_make_link', $output, $url )
	*/
	const EmbedMaybeMakeLink = "embed_maybe_make_link";
	/**
			 * Filters whether to inspect the given URL for discoverable link tags.
			 *
			 * @since 2.9.0
			 * @since 4.4.0 The default value changed to true.
			 *
			 * @see WP_oEmbed::discover()
			 *
			 * @param bool $enable Whether to enable `<link>` tag discovery. Default true.
			 * @Reference wp-includes\class-wp-embed.php apply_filters( 'embed_oembed_discover', true )
	*/
	const EmbedOembedDiscover = "embed_oembed_discover";
	/**
					 * Filters the cached oEmbed HTML.
					 *
					 * @since 2.9.0
					 *
					 * @see WP_Embed::shortcode()
					 *
					 * @param mixed  $cache   The cached HTML result, stored in post meta.
					 * @param string $url     The attempted embed URL.
					 * @param array  $attr    An array of shortcode attributes.
					 * @param int    $post_ID Post ID.
					 * @Reference wp-includes\class-wp-embed.php apply_filters( 'embed_oembed_html', $cache, $url, $attr, $post_ID )
	* @Reference wp-includes\class-wp-embed.php apply_filters( 'embed_oembed_html', $html, $url, $attr, $post_ID )
	*/
	const EmbedOembedHtml = "embed_oembed_html";
	/**
		 * Filters the site title HTML in the embed footer.
		 *
		 * @since 4.4.0
		 *
		 * @param string $site_title The site title HTML.
		 * @Reference wp-includes\embed.php apply_filters( 'embed_site_title_html', $site_title )
	*/
	const EmbedSiteTitleHtml = "embed_site_title_html";
	/**
			 * Filters the thumbnail image ID for use in the embed template.
			 *
			 * @since 4.9.0
			 *
			 * @param int $thumbnail_id Attachment ID.
			 * @Reference wp-includes\theme-compat\embed-content.php apply_filters( 'embed_thumbnail_id', $thumbnail_id )
	*/
	const EmbedThumbnailId = "embed_thumbnail_id";
	/**
				 * Filters the thumbnail shape for use in the embed template.
				 *
				 * Rectangular images are shown above the title while square images
				 * are shown next to the content.
				 *
				 * @since 4.4.0
				 * @since 4.5.0 Added `$thumbnail_id` parameter.
				 *
				 * @param string $shape        Thumbnail image shape. Either 'rectangular' or 'square'.
				 * @param int    $thumbnail_id Attachment ID.
				 * @Reference wp-includes\theme-compat\embed-content.php apply_filters( 'embed_thumbnail_image_shape', $shape, $thumbnail_id )
	*/
	const EmbedThumbnailImageShape = "embed_thumbnail_image_shape";
	/**
				 * Filters the thumbnail image size for use in the embed template.
				 *
				 * @since 4.4.0
				 * @since 4.5.0 Added `$thumbnail_id` parameter.
				 *
				 * @param string $image_size   Thumbnail image size.
				 * @param int    $thumbnail_id Attachment ID.
				 * @Reference wp-includes\theme-compat\embed-content.php apply_filters( 'embed_thumbnail_image_size', $image_size, $thumbnail_id )
	*/
	const EmbedThumbnailImageSize = "embed_thumbnail_image_size";
	/**
			 * Filters the extension of the emoji png files.
			 *
			 * @since 4.2.0
			 *
			 * @param string The emoji extension for png files. Default .png.
			 * @Reference wp-includes\formatting.php apply_filters( 'emoji_ext', '.png' )
	* @Reference wp-includes\formatting.php apply_filters( 'emoji_ext', '.png' )
	*/
	const EmojiExt = "emoji_ext";
	/**
			 * Filters the extension of the emoji SVG files.
			 *
			 * @since 4.6.0
			 *
			 * @param string The emoji extension for svg files. Default .svg.
			 * @Reference wp-includes\formatting.php apply_filters( 'emoji_svg_ext', '.svg' )
	*/
	const EmojiSvgExt = "emoji_svg_ext";
	/**
			 * Filters the URL where emoji SVG images are hosted.
			 *
			 * @since 4.6.0
			 *
			 * @param string The emoji base URL for svg images.
			 * @Reference wp-includes\formatting.php apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/12.0.0-1/svg/' )
	* @Reference wp-includes\general-template.php apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/12.0.0-1/svg/' )
	*/
	const EmojiSvgUrl = "emoji_svg_url";
	/**
			 * Filters the URL where emoji png images are hosted.
			 *
			 * @since 4.2.0
			 *
			 * @param string The emoji base URL for png images.
			 * @Reference wp-includes\formatting.php apply_filters( 'emoji_url', 'https://s.w.org/images/core/emoji/12.0.0-1/72x72/' )
	* @Reference wp-includes\formatting.php apply_filters( 'emoji_url', 'https://s.w.org/images/core/emoji/12.0.0-1/72x72/' )
	*/
	const EmojiUrl = "emoji_url";
	/**
	* @Reference wp-admin\user-edit.php apply_filters( 'enable_edit_any_user_configuration', true )
	*/
	const EnableEditAnyUserConfiguration = "enable_edit_any_user_configuration";
	/**
		 * Filters whether to update network site or user counts when a new site is created.
		 *
		 * @since 3.7.0
		 *
		 * @see wp_is_large_network()
		 *
		 * @param bool   $small_network Whether the network is considered small.
		 * @param string $context       Context. Either 'users' or 'sites'.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'enable_live_network_counts', $is_small_network, 'sites' )
	* @Reference wp-includes\ms-functions.php apply_filters( 'enable_live_network_counts', $is_small_network, 'users' )
	*/
	const EnableLiveNetworkCounts = "enable_live_network_counts";
	/**
	 * Filters whether to enable loading of the advanced-cache.php drop-in.
	 *
	 * This filter runs before it can be used by plugins. It is designed for non-web
	 * run-times. If false is returned, advanced-cache.php will never be loaded.
	 *
	 * @since 4.6.0
	 *
	 * @param bool $enable_advanced_cache Whether to enable loading advanced-cache.php (if present).
	 *                                    Default true.
	 * @Reference wp-settings.php apply_filters( 'enable_loading_advanced_cache_dropin', true )
	*/
	const EnableLoadingAdvancedCacheDropin = "enable_loading_advanced_cache_dropin";
	/**
			 * Filters whether to print the call to `wp_attempt_focus()` on the login screen.
			 *
			 * @since 4.8.0
			 *
			 * @param bool $print Whether to print the function call. Default true.
			 * @Reference wp-login.php apply_filters( 'enable_login_autofocus', true )
	*/
	const EnableLoginAutofocus = "enable_login_autofocus";
	/**
		 * Filters whether to enable maintenance mode.
		 *
		 * This filter runs before it can be used by plugins. It is designed for
		 * non-web runtimes. If this filter returns true, maintenance mode will be
		 * active and the request will end. If false, the request will be allowed to
		 * continue processing even if maintenance mode should be active.
		 *
		 * @since 4.6.0
		 *
		 * @param bool $enable_checks Whether to enable maintenance mode. Default true.
		 * @param int  $upgrading     The timestamp set in the .maintenance file.
		 * @Reference wp-includes\load.php apply_filters( 'enable_maintenance_mode', true, $upgrading )
	*/
	const EnableMaintenanceMode = "enable_maintenance_mode";
	/**
		 * Filters whether the post-by-email functionality is enabled.
		 *
		 * @since 3.0.0
		 *
		 * @param bool $enabled Whether post-by-email configuration is enabled. Default true.
		 * @Reference wp-admin\options.php apply_filters( 'enable_post_by_email_configuration', true )
	* @Reference wp-admin\options-writing.php apply_filters( 'enable_post_by_email_configuration', true )
	* @Reference wp-admin\options-writing.php apply_filters( 'enable_post_by_email_configuration', true )
	* @Reference wp-mail.php apply_filters( 'enable_post_by_email_configuration', true )
	*/
	const EnablePostByEmailConfiguration = "enable_post_by_email_configuration";
	/**
	 * Filters whether to enable the Update Services section in the Writing settings screen.
	 *
	 * @since 3.0.0
	 *
	 * @param bool $enable Whether to enable the Update Services settings area. Default true.
	 * @Reference wp-admin\options-writing.php apply_filters( 'enable_update_services_configuration', true )
	* @Reference wp-admin\options-writing.php apply_filters( 'enable_update_services_configuration', true )
	*/
	const EnableUpdateServicesConfiguration = "enable_update_services_configuration";
	/**
		 * Filters whether to allow the debug mode check to occur.
		 *
		 * This filter runs before it can be used by plugins. It is designed for
		 * non-web run-times. Returning false causes the `WP_DEBUG` and related
		 * constants to not be checked and the default php values for errors
		 * will be used unless you take care to update them yourself.
		 *
		 * @since 4.6.0
		 *
		 * @param bool $enable_debug_mode Whether to enable debug mode checks to occur. Default true.
		 * @Reference wp-includes\load.php apply_filters( 'enable_wp_debug_mode_checks', true )
	*/
	const EnableWpDebugModeChecks = "enable_wp_debug_mode_checks";
	/**
		 * Filters the list of enclosure links before querying the database.
		 *
		 * Allows for the addition and/or removal of potential enclosures to save
		 * to postmeta before checking the database for existing enclosures.
		 *
		 * @since 4.4.0
		 *
		 * @param array $post_links An array of enclosure links.
		 * @param int   $post_ID    Post ID.
		 * @Reference wp-includes\functions.php apply_filters( 'enclosure_links', $post_links, $post->ID )
	*/
	const EnclosureLinks = "enclosure_links";
	/**
		 * Filters the title field placeholder text.
		 *
		 * @since 3.1.0
		 *
		 * @param string  $text Placeholder text. Default 'Add title'.
		 * @param WP_Post $post Post object.
		 * @Reference wp-admin\edit-form-advanced.php apply_filters( 'enter_title_here', __( 'Add title' ), $post )
	* @Reference wp-admin\edit-form-blocks.php apply_filters( 'enter_title_here', __( 'Add title' ), $post )
	* @Reference wp-admin\includes\dashboard.php apply_filters( 'enter_title_here', __( 'Title' ), $post )
	*/
	const EnterTitleHere = "enter_title_here";
	/**
		 * Filters a string cleaned and escaped for output in HTML.
		 *
		 * Text passed to esc_html() is stripped of invalid or special characters
		 * before output.
		 *
		 * @since 2.8.0
		 *
		 * @param string $safe_text The text after it has been escaped.
		 * @param string $text      The text prior to being escaped.
		 * @Reference wp-includes\formatting.php apply_filters( 'esc_html', $safe_text, $text )
	*/
	const EscHtml = "esc_html";
	/**
		 * Filters a string cleaned and escaped for output in a textarea element.
		 *
		 * @since 3.1.0
		 *
		 * @param string $safe_text The text after it has been escaped.
		 * @param string $text      The text prior to being escaped.
		 * @Reference wp-includes\formatting.php apply_filters( 'esc_textarea', $safe_text, $text )
	*/
	const EscTextarea = "esc_textarea";
	/**
	* @Reference wp-includes\plugin.php apply_filters( 'example_filter', 'filter me', $arg1, $arg2 )
	*/
	const ExampleFilter = "example_filter";
	/**
		 * Filters the list of blocks that can contribute to the excerpt.
		 *
		 * If a dynamic block is added to this list, it must not generate another
		 * excerpt, as this will cause an infinite loop to occur.
		 *
		 * @since 5.0.0
		 *
		 * @param array $allowed_blocks The list of allowed blocks.
		 * @Reference wp-includes\blocks.php apply_filters( 'excerpt_allowed_blocks', $allowed_blocks )
	*/
	const ExcerptAllowedBlocks = "excerpt_allowed_blocks";
	/**
			 * Filters the maximum number of words in a post excerpt.
			 *
			 * @since 2.7.0
			 *
			 * @param int $number The maximum number of words. Default 55.
			 * @Reference wp-includes\formatting.php apply_filters( 'excerpt_length', $excerpt_length )
	*/
	const ExcerptLength = "excerpt_length";
	/**
			 * Filters the string in the "more" link displayed after a trimmed excerpt.
			 *
			 * @since 2.9.0
			 *
			 * @param string $more_string The string shown within the more link.
			 * @Reference wp-includes\formatting.php apply_filters( 'excerpt_more', ' ' . '[&hellip;]' )
	*/
	const ExcerptMore = "excerpt_more";
	/** This filter is documented in wp-includes/post.php * @Reference wp-includes\customize\class-wp-customize-nav-menu-item-setting.php apply_filters( 'excerpt_save_pre', wp_slash( $menu_item_value['attr_title'] ) )
	*/
	const ExcerptSavePre = "excerpt_save_pre";
	/**
	 * Filters whether to allow 'HEAD' requests to generate content.
	 *
	 * Provides a significant performance bump by exiting before the page
	 * content loads for 'HEAD' requests. See #14348.
	 *
	 * @since 3.5.0
	 *
	 * @param bool $exit Whether to exit without generating any content for 'HEAD' requests. Default true.
	 * @Reference wp-includes\template-loader.php apply_filters( 'exit_on_http_head', true )
	*/
	const ExitOnHttpHead = "exit_on_http_head";
	/**
		 * Filters the export args.
		 *
		 * @since 3.5.0
		 *
		 * @param array $args The arguments to send to the exporter.
		 * @Reference wp-admin\export.php apply_filters( 'export_args', $args )
	*/
	const ExportArgs = "export_args";
	/**
		 * Filters the export filename.
		 *
		 * @since 4.4.0
		 *
		 * @param string $wp_filename The name of the file for download.
		 * @param string $sitename    The site name.
		 * @param string $date        Today's date, formatted.
		 * @Reference wp-admin\includes\export.php apply_filters( 'export_wp_filename', $wp_filename, $sitename, $date )
	*/
	const ExportWpFilename = "export_wp_filename";
	/**
		 * Filters file type based on the extension name.
		 *
		 * @since 2.5.0
		 *
		 * @see wp_ext2type()
		 *
		 * @param array $ext2type Multi-dimensional array with extensions for a default set
		 *                        of file types.
		 * @Reference wp-includes\functions.php apply_filters(		'ext2type',		array(			'image'       => array( 'jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp', 'tif', 'tiff', 'ico' ),			'audio'       => array( 'aac', 'ac3', 'aif', 'aiff', 'flac', 'm3a', 'm4a', 'm4b', 'mka', 'mp1', 'mp2', 'mp3', 'ogg', 'oga', 'ram', 'wav', 'wma' ),			'video'       => array( '3g2', '3gp', '3gpp', 'asf', 'avi', 'divx', 'dv', 'flv', 'm4v', 'mkv', 'mov', 'mp4', 'mpeg', 'mpg', 'mpv', 'ogm', 'ogv', 'qt', 'rm', 'vob', 'wmv' ),			'document'    => array( 'doc', 'docx', 'docm', 'dotm', 'odt', 'pages', 'pdf', 'xps', 'oxps', 'rtf', 'wp', 'wpd', 'psd', 'xcf' ),			'spreadsheet' => array( 'numbers', 'ods', 'xls', 'xlsx', 'xlsm', 'xlsb' ),			'interactive' => array( 'swf', 'key', 'ppt', 'pptx', 'pptm', 'pps', 'ppsx', 'ppsm', 'sldx', 'sldm', 'odp' ),			'text'        => array( 'asc', 'csv', 'tsv', 'txt' ),			'archive'     => array( 'bz2', 'cab', 'dmg', 'gz', 'rar', 'sea', 'sit', 'sqx', 'tar', 'tgz', 'zip', '7z' ),			'code'        => array( 'css', 'htm', 'html', 'php', 'js' ),		)	)
	*/
	const Ext2type = "ext2type";
	/**
	* @Reference wp-includes\deprecated.php apply_filters( 'extra_theme_headers', array() )
	*/
	const ExtraThemeHeaders = "extra_theme_headers";
	/**
			 * Filters the image sizes generated for non-image mime types.
			 *
			 * @since 4.7.0
			 *
			 * @param array $fallback_sizes An array of image size names.
			 * @param array $metadata       Current attachment metadata.
			 * @Reference wp-admin\includes\image.php apply_filters( 'fallback_intermediate_image_sizes', $fallback_sizes, $metadata )
	*/
	const FallbackIntermediateImageSizes = "fallback_intermediate_image_sizes";
	/**
		 * Filters the content type for a specific feed type.
		 *
		 * @since 2.8.0
		 *
		 * @param string $content_type Content type indicating the type of data that a feed contains.
		 * @param string $type         Type of feed. Possible values include 'rss', rss2', 'atom', and 'rdf'.
		 * @Reference wp-includes\feed.php apply_filters( 'feed_content_type', $content_type, $type )
	*/
	const FeedContentType = "feed_content_type";
	/**
		 * Filters the feed type permalink.
		 *
		 * @since 1.5.0
		 *
		 * @param string $output The feed permalink.
		 * @param string $feed   The feed type. Possible values include 'rss2', 'atom',
		 *                       or an empty string for the default feed type.
		 * @Reference wp-includes\link-template.php apply_filters( 'feed_link', $output, $feed )
	*/
	const FeedLink = "feed_link";
	/**
		 * Filters whether to display the comments feed link.
		 *
		 * @since 4.4.0
		 *
		 * @param bool $show Whether to display the comments feed link. Default true.
		 * @Reference wp-includes\general-template.php apply_filters( 'feed_links_show_comments_feed', true )
	*/
	const FeedLinksShowCommentsFeed = "feed_links_show_comments_feed";
	/**
		 * Filters whether to display the posts feed link.
		 *
		 * @since 4.4.0
		 *
		 * @param bool $show Whether to display the posts feed link. Default true.
		 * @Reference wp-includes\general-template.php apply_filters( 'feed_links_show_posts_feed', true )
	*/
	const FeedLinksShowPostsFeed = "feed_links_show_posts_feed";
	/**
		 * Filters whether the current image is displayable in the browser.
		 *
		 * @since 2.5.0
		 *
		 * @param bool   $result Whether the image can be displayed. Default true.
		 * @param string $path   Path to the image.
		 * @Reference wp-admin\includes\image.php apply_filters( 'file_is_displayable_image', $result, $path )
	*/
	const FileIsDisplayableImage = "file_is_displayable_image";
	/**
		 * Filters whether file modifications are allowed.
		 *
		 * @since 4.8.0
		 *
		 * @param bool   $file_mod_allowed Whether file modifications are allowed.
		 * @param string $context          The usage context.
		 * @Reference wp-includes\load.php apply_filters( 'file_mod_allowed', ! defined( 'DISALLOW_FILE_MODS' ) || ! DISALLOW_FILE_MODS, $context )
	*/
	const FileModAllowed = "file_mod_allowed";
	/**
		 * Filters the filesystem method to use.
		 *
		 * @since 2.6.0
		 *
		 * @param string $method  Filesystem method to return.
		 * @param array  $args    An array of connection details for the method.
		 * @param string $context Full path to the directory that is tested for being writable.
		 * @param bool   $allow_relaxed_file_ownership Whether to allow Group/World writable.
		 * @Reference wp-admin\includes\file.php apply_filters( 'filesystem_method', $method, $args, $context, $allow_relaxed_file_ownership )
	*/
	const FilesystemMethod = "filesystem_method";
	/**
			 * Filters the path for a specific filesystem method class file.
			 *
			 * @since 2.6.0
			 *
			 * @see get_filesystem_method()
			 *
			 * @param string $path   Path to the specific filesystem method class file.
			 * @param string $method The filesystem method to use.
			 * @Reference wp-admin\includes\file.php apply_filters( 'filesystem_method_file', ABSPATH . 'wp-admin/includes/class-wp-filesystem-' . $method . '.php', $method )
	*/
	const FilesystemMethodFile = "filesystem_method_file";
	/**
		 * Fires right before the meta boxes are rendered.
		 *
		 * This allows for the filtering of meta box data, that should already be
		 * present by this point. Do not use as a means of adding meta box data.
		 *
		 * @since 5.0.0
		 *
		 * @param array $wp_meta_boxes Global meta box state.
		 * @Reference wp-admin\includes\post.php apply_filters( 'filter_block_editor_meta_boxes', $wp_meta_boxes )
	*/
	const FilterBlockEditorMetaBoxes = "filter_block_editor_meta_boxes";
	/**
			 * Filters whether a "hard" rewrite rule flush should be performed when requested.
			 *
			 * A "hard" flush updates .htaccess (Apache) or web.config (IIS).
			 *
			 * @since 3.7.0
			 *
			 * @param bool $hard Whether to flush rewrite rules "hard". Default true.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'flush_rewrite_rules_hard', true )
	*/
	const FlushRewriteRulesHard = "flush_rewrite_rules_hard";
	/**
		 * Whether to filter imported data through kses on import.
		 *
		 * Multisite uses this hook to filter all data through kses by default,
		 * as a super administrator may be assisting an untrusted user.
		 *
		 * @since 3.1.0
		 *
		 * @param bool $force Whether to force data to be filtered through kses. Default false.
		 * @Reference wp-admin\admin.php apply_filters( 'force_filtered_html_on_import', false )
	*/
	const ForceFilteredHtmlOnImport = "force_filtered_html_on_import";
	/**
		 * Filters the text after it is formatted for the editor.
		 *
		 * @since 4.3.0
		 *
		 * @param string $text           The formatted text.
		 * @param string $default_editor The default editor for the current user.
		 *                               It is usually either 'html' or 'tinymce'.
		 * @Reference wp-includes\formatting.php apply_filters( 'format_for_editor', $text, $default_editor )
	*/
	const FormatForEditor = "format_for_editor";
	/**
		 * Filters the text to be formatted for editing.
		 *
		 * @since 1.2.0
		 *
		 * @param string $content The text, prior to formatting for editing.
		 * @Reference wp-includes\formatting.php apply_filters( 'format_to_edit', $content )
	*/
	const FormatToEdit = "format_to_edit";
	/**
				 * Filters the query used to retrieve found comment count.
				 *
				 * @since 4.4.0
				 *
				 * @param string           $found_comments_query SQL query. Default 'SELECT FOUND_ROWS()'.
				 * @param WP_Comment_Query $comment_query        The `WP_Comment_Query` instance.
				 * @Reference wp-includes\class-wp-comment-query.php apply_filters( 'found_comments_query', 'SELECT FOUND_ROWS()', $this )
	*/
	const FoundCommentsQuery = "found_comments_query";
	/**
				 * Filters the query used to retrieve found network count.
				 *
				 * @since 4.6.0
				 *
				 * @param string           $found_networks_query SQL query. Default 'SELECT FOUND_ROWS()'.
				 * @param WP_Network_Query $network_query        The `WP_Network_Query` instance.
				 * @Reference wp-includes\class-wp-network-query.php apply_filters( 'found_networks_query', 'SELECT FOUND_ROWS()', $this )
	*/
	const FoundNetworksQuery = "found_networks_query";
	/**
			 * Filters the number of found posts for the query.
			 *
			 * @since 2.1.0
			 *
			 * @param int      $found_posts The number of posts found.
			 * @param WP_Query $this        The WP_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-query.php apply_filters( 'found_posts', array( $this->found_posts, &$this ) )
	*/
	const FoundPosts = "found_posts";
	/**
				 * Filters the query to run for retrieving the found posts.
				 *
				 * @since 2.1.0
				 *
				 * @param string   $found_posts The query to run to find the found posts.
				 * @param WP_Query $this        The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'found_posts_query', array( 'SELECT FOUND_ROWS()', &$this ) )
	*/
	const FoundPostsQuery = "found_posts_query";
	/**
				 * Filters the query used to retrieve found site count.
				 *
				 * @since 4.6.0
				 *
				 * @param string        $found_sites_query SQL query. Default 'SELECT FOUND_ROWS()'.
				 * @param WP_Site_Query $site_query        The `WP_Site_Query` instance.
				 * @Reference wp-includes\class-wp-site-query.php apply_filters( 'found_sites_query', 'SELECT FOUND_ROWS()', $this )
	*/
	const FoundSitesQuery = "found_sites_query";
	/**
					 * Filters SELECT FOUND_ROWS() query for the current WP_User_Query instance.
					 *
					 * @since 3.2.0
					 * @since 5.1.0 Added the `$this` parameter.
					 *
					 * @global wpdb $wpdb WordPress database abstraction object.
					 *
					 * @param string $sql         The SELECT FOUND_ROWS() query for the current WP_User_Query.
					 * @param WP_User_Query $this The current WP_User_Query instance.
					 * @Reference wp-includes\class-wp-user-query.php apply_filters( 'found_users_query', 'SELECT FOUND_ROWS()', $this )
	*/
	const FoundUsersQuery = "found_users_query";
	/**
		 * Filters the connection types to output to the filesystem credentials form.
		 *
		 * @since 2.9.0
		 * @since 4.6.0 The `$context` parameter default changed from `false` to an empty string.
		 *
		 * @param array  $types       Types of connections.
		 * @param array  $credentials Credentials to connect with.
		 * @param string $type        Chosen filesystem method.
		 * @param object $error       Error object.
		 * @param string $context     Full path to the directory that is tested
		 *                            for being writable.
		 * @Reference wp-admin\includes\file.php apply_filters( 'fs_ftp_connection_types', $types, $credentials, $type, $error, $context )
	*/
	const FsFtpConnectionTypes = "fs_ftp_connection_types";
	/**
		 * Filters the default gallery shortcode CSS styles.
		 *
		 * @since 2.5.0
		 *
		 * @param string $gallery_style Default CSS styles and opening HTML div container
		 *                              for the gallery shortcode output.
		 * @Reference wp-includes\media.php apply_filters( 'gallery_style', $gallery_style . $gallery_div )
	*/
	const GalleryStyle = "gallery_style";
	/**
		 * Filters a given object's ancestors.
		 *
		 * @since 3.1.0
		 * @since 4.1.1 Introduced the `$resource_type` parameter.
		 *
		 * @param array  $ancestors     An array of object ancestors.
		 * @param int    $object_id     Object ID.
		 * @param string $object_type   Type of object.
		 * @param string $resource_type Type of resource $object_type is.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'get_ancestors', $ancestors, $object_id, $object_type, $resource_type )
	* @Reference wp-includes\taxonomy.php apply_filters( 'get_ancestors', $ancestors, $object_id, $object_type, $resource_type )
	*/
	const GetAncestors = "get_ancestors";
	/**
		 * Filters the archive link content.
		 *
		 * @since 2.6.0
		 * @since 4.5.0 Added the `$url`, `$text`, `$format`, `$before`, and `$after` parameters.
		 * @since 5.2.0 Added the `$selected` parameter.
		 *
		 * @param string $link_html The archive HTML link content.
		 * @param string $url       URL to archive.
		 * @param string $text      Archive text description.
		 * @param string $format    Link format. Can be 'link', 'option', 'html', or custom.
		 * @param string $before    Content to prepend to the description.
		 * @param string $after     Content to append to the description.
		 * @param bool   $selected  True if the current page is the selected archive.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_archives_link', $link_html, $url, $text, $format, $before, $after, $selected )
	*/
	const GetArchivesLink = "get_archives_link";
	/**
		 * Filters the attached file based on the given ID.
		 *
		 * @since 2.1.0
		 *
		 * @param string $file          Path to attached file.
		 * @param int    $attachment_id Attachment ID.
		 * @Reference wp-includes\post.php apply_filters( 'get_attached_file', $file, $attachment_id )
	*/
	const GetAttachedFile = "get_attached_file";
	/**
		 * Filters the list of media attached to the given post.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $children Associative array of media attached to the given post.
		 * @param string $type     Mime type of the media desired.
		 * @param mixed  $post     Post ID or object.
		 * @Reference wp-includes\media.php apply_filters( 'get_attached_media', $children, $type, $post )
	*/
	const GetAttachedMedia = "get_attached_media";
	/**
		 * Filters arguments used to retrieve media attached to the given post.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $args Post query arguments.
		 * @param string $type Mime type of the desired media.
		 * @param mixed  $post Post ID or object.
		 * @Reference wp-includes\media.php apply_filters( 'get_attached_media_args', $args, $type, $post )
	*/
	const GetAttachedMediaArgs = "get_attached_media_args";
	/**
		 * Filters the list of available language codes.
		 *
		 * @since 4.7.0
		 *
		 * @param array  $languages An array of available language codes.
		 * @param string $dir       The directory where the language files were found.
		 * @Reference wp-includes\l10n.php apply_filters( 'get_available_languages', $languages, $dir )
	*/
	const GetAvailableLanguages = "get_available_languages";
	/**
			 * Filters the avatar to retrieve.
			 *
			 * @since 2.5.0
			 * @since 4.2.0 The `$args` parameter was added.
			 *
			 * @param string $avatar      &lt;img&gt; tag for the user's avatar.
			 * @param mixed  $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
			 *                            user email, WP_User object, WP_Post object, or WP_Comment object.
			 * @param int    $size        Square avatar width and height in pixels to retrieve.
			 * @param string $default     URL for the default image or a default type. Accepts '404', 'retro', 'monsterid',
			 *                            'wavatar', 'indenticon','mystery' (or 'mm', or 'mysteryman'), 'blank', or 'gravatar_default'.
			 *                            Default is the value of the 'avatar_default' option, with a fallback of 'mystery'.
			 * @param string $alt         Alternative text to use in the avatar image tag. Default empty.
			 * @param array  $args        Arguments passed to get_avatar_data(), after processing.
			 * @Reference wp-includes\pluggable.php apply_filters( 'get_avatar', $avatar, $id_or_email, $args['size'], $args['default'], $args['alt'], $args )
	* @Reference wp-includes\pluggable.php apply_filters( 'get_avatar', $avatar, $id_or_email, $args['size'], $args['default'], $args['alt'], $args )
	*/
	const GetAvatar = "get_avatar";
	/**
		 * Filters the list of allowed comment types for retrieving avatars.
		 *
		 * @since 3.0.0
		 *
		 * @param array $types An array of content types. Default only contains 'comment'.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_avatar_comment_types', array( 'comment' ) )
	*/
	const GetAvatarCommentTypes = "get_avatar_comment_types";
	/**
		 * Filters the avatar data.
		 *
		 * @since 4.2.0
		 *
		 * @param array $args        Arguments passed to get_avatar_data(), after processing.
		 * @param mixed $id_or_email The Gravatar to retrieve. Accepts a user ID, Gravatar MD5 hash,
		 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_avatar_data', $args, $id_or_email )
	* @Reference wp-includes\link-template.php apply_filters( 'get_avatar_data', $args, $id_or_email )
	* @Reference wp-includes\link-template.php apply_filters( 'get_avatar_data', $args, $id_or_email )
	*/
	const GetAvatarData = "get_avatar_data";
	/**
		 * Filters the avatar URL.
		 *
		 * @since 4.2.0
		 *
		 * @param string $url         The URL of the avatar.
		 * @param mixed  $id_or_email The Gravatar to retrieve. Accepts a user ID, Gravatar MD5 hash,
		 *                            user email, WP_User object, WP_Post object, or WP_Comment object.
		 * @param array  $args        Arguments passed to get_avatar_data(), after processing.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_avatar_url', $url, $id_or_email, $args )
	*/
	const GetAvatarUrl = "get_avatar_url";
	/**
		 * Filters the bloginfo for use in RSS feeds.
		 *
		 * @since 2.2.0
		 *
		 * @see convert_chars()
		 * @see get_bloginfo()
		 *
		 * @param string $info Converted string value of the blog information.
		 * @param string $show The type of blog information to retrieve.
		 * @Reference wp-includes\feed.php apply_filters( 'get_bloginfo_rss', convert_chars( $info ), $show )
	*/
	const GetBloginfoRss = "get_bloginfo_rss";
	/**
		 * Filters the list of sites a user belongs to.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param array $sites   An array of site objects belonging to the user.
		 * @param int   $user_id User ID.
		 * @param bool  $all     Whether the returned sites array should contain all sites, including
		 *                       those marked 'deleted', 'archived', or 'spam'. Default false.
		 * @Reference wp-includes\user.php apply_filters( 'get_blogs_of_user', $sites, $user_id, $all )
	*/
	const GetBlogsOfUser = "get_blogs_of_user";
	/**
				 * Filters the returned list of bookmarks.
				 *
				 * The first time the hook is evaluated in this file, it returns the cached
				 * bookmarks list. The second evaluation returns a cached bookmarks list if the
				 * link category is passed but does not exist. The third evaluation returns
				 * the full cached results.
				 *
				 * @since 2.1.0
				 *
				 * @see get_bookmarks()
				 *
				 * @param array $bookmarks List of the cached bookmarks.
				 * @param array $parsed_args         An array of bookmark query arguments.
				 * @Reference wp-includes\bookmark.php apply_filters( 'get_bookmarks', $bookmarks, $parsed_args )
	* @Reference wp-includes\bookmark.php apply_filters( 'get_bookmarks', $results, $parsed_args )
	* @Reference wp-includes\bookmark.php apply_filters( 'get_bookmarks', array(), $parsed_args )
	*/
	const GetBookmarks = "get_bookmarks";
	/**
			 * Filters the HTML calendar output.
			 *
			 * @since 3.0.0
			 *
			 * @param string $calendar_output HTML output of the calendar.
			 * @Reference wp-includes\general-template.php apply_filters( 'get_calendar', $calendar_output )
	* @Reference wp-includes\general-template.php apply_filters( 'get_calendar', $cache[ $key ] )
	* @Reference wp-includes\general-template.php apply_filters( 'get_calendar', $calendar_output )
	*/
	const GetCalendar = "get_calendar";
	/**
		 * Filters the canonical URL for a post.
		 *
		 * @since 4.6.0
		 *
		 * @param string  $canonical_url The post's canonical URL.
		 * @param WP_Post $post          Post object.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_canonical_url', $canonical_url, $post )
	*/
	const GetCanonicalUrl = "get_canonical_url";
	/**
		 * Filters the taxonomy used to retrieve terms when calling get_categories().
		 *
		 * @since 2.7.0
		 *
		 * @param string $taxonomy Taxonomy to retrieve terms from.
		 * @param array  $args     An array of arguments. See get_terms().
		 * @Reference wp-includes\category.php apply_filters( 'get_categories_taxonomy', $args['taxonomy'], $args )
	*/
	const GetCategoriesTaxonomy = "get_categories_taxonomy";
	/**
		 * Fires after a comment is retrieved.
		 *
		 * @since 2.3.0
		 *
		 * @param mixed $_comment Comment data.
		 * @Reference wp-includes\comment.php apply_filters( 'get_comment', $_comment )
	*/
	const GetComment = "get_comment";
	/**
		 * Filters the returned comment author name.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$comment_ID` and `$comment` parameters were added.
		 *
		 * @param string     $author     The comment author's username.
		 * @param int        $comment_ID The comment ID.
		 * @param WP_Comment $comment    The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_author', $author, $comment->comment_ID, $comment )
	*/
	const GetCommentAuthor = "get_comment_author";
	/**
		 * Filters the comment author's returned email address.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$comment_ID` and `$comment` parameters were added.
		 *
		 * @param string     $comment_author_email The comment author's email address.
		 * @param int        $comment_ID           The comment ID.
		 * @param WP_Comment $comment              The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_author_email', $comment->comment_author_email, $comment->comment_ID, $comment )
	*/
	const GetCommentAuthorEmail = "get_comment_author_email";
	/**
		 * Filters the comment author's returned IP address.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$comment_ID` and `$comment` parameters were added.
		 *
		 * @param string     $comment_author_IP The comment author's IP address.
		 * @param int        $comment_ID        The comment ID.
		 * @param WP_Comment $comment           The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_author_IP', $comment->comment_author_IP, $comment->comment_ID, $comment )
	*/
	const GetCommentAuthorIp = "get_comment_author_IP";
	/**
		 * Filters the comment author's link for display.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$author` and `$comment_ID` parameters were added.
		 *
		 * @param string $return     The HTML-formatted comment author link.
		 *                           Empty for an invalid URL.
		 * @param string $author     The comment author's username.
		 * @param int    $comment_ID The comment ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_author_link', $return, $author, $comment->comment_ID )
	*/
	const GetCommentAuthorLink = "get_comment_author_link";
	/**
		 * Filters the comment author's URL.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$comment_ID` and `$comment` parameters were added.
		 *
		 * @param string     $url        The comment author's URL.
		 * @param int        $comment_ID The comment ID.
		 * @param WP_Comment $comment    The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_author_url', $url, $id, $comment )
	*/
	const GetCommentAuthorUrl = "get_comment_author_url";
	/**
		 * Filters the comment author's returned URL link.
		 *
		 * @since 1.5.0
		 *
		 * @param string $return The HTML-formatted comment author URL link.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_author_url_link', $return )
	*/
	const GetCommentAuthorUrlLink = "get_comment_author_url_link";
	/**
		 * Filters the returned comment date.
		 *
		 * @since 1.5.0
		 *
		 * @param string|int $date    Formatted date string or Unix timestamp.
		 * @param string     $d       The format of the date.
		 * @param WP_Comment $comment The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_date', $date, $d, $comment )
	*/
	const GetCommentDate = "get_comment_date";
	/**
		 * Filters the retrieved comment excerpt.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$comment_ID` and `$comment` parameters were added.
		 *
		 * @param string     $excerpt    The comment excerpt text.
		 * @param int        $comment_ID The comment ID.
		 * @param WP_Comment $comment    The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_excerpt', $excerpt, $comment->comment_ID, $comment )
	*/
	const GetCommentExcerpt = "get_comment_excerpt";
	/**
		 * Filters the returned comment ID.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$comment_ID` parameter was added.
		 *
		 * @param int        $comment_ID The current comment ID.
		 * @param WP_Comment $comment    The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_ID', $comment->comment_ID, $comment )
	*/
	const GetCommentId = "get_comment_ID";
	/**
		 * Filters the returned single comment permalink.
		 *
		 * @since 2.8.0
		 * @since 4.4.0 Added the `$cpage` parameter.
		 *
		 * @see get_page_of_comment()
		 *
		 * @param string     $link    The comment permalink with '#comment-$id' appended.
		 * @param WP_Comment $comment The current comment object.
		 * @param array      $args    An array of arguments to override the defaults.
		 * @param int        $cpage   The calculated 'cpage' value.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_link', $link, $comment, $args, $cpage )
	*/
	const GetCommentLink = "get_comment_link";
	/**
		 * Filters the text of a comment.
		 *
		 * @since 1.5.0
		 *
		 * @see Walker_Comment::comment()
		 *
		 * @param string     $comment_content Text of the comment.
		 * @param WP_Comment $comment         The comment object.
		 * @param array      $args            An array of arguments.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_text', $comment->comment_content, $comment, $args )
	*/
	const GetCommentText = "get_comment_text";
	/**
		 * Filters the returned comment time.
		 *
		 * @since 1.5.0
		 *
		 * @param string|int $date      The comment time, formatted as a date string or Unix timestamp.
		 * @param string     $d         Date format.
		 * @param bool       $gmt       Whether the GMT date is in use.
		 * @param bool       $translate Whether the time is translated.
		 * @param WP_Comment $comment   The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_time', $date, $d, $gmt, $translate, $comment )
	*/
	const GetCommentTime = "get_comment_time";
	/**
		 * Filters the returned comment type.
		 *
		 * @since 1.5.0
		 * @since 4.1.0 The `$comment_ID` and `$comment` parameters were added.
		 *
		 * @param string     $comment_type The type of comment, such as 'comment', 'pingback', or 'trackback'.
		 * @param int        $comment_ID   The comment ID.
		 * @param WP_Comment $comment      The comment object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comment_type', $comment->comment_type, $comment->comment_ID, $comment )
	*/
	const GetCommentType = "get_comment_type";
	/**
		 * Filters the returned post comments permalink.
		 *
		 * @since 3.6.0
		 *
		 * @param string      $comments_link Post comments permalink with '#comments' appended.
		 * @param int|WP_Post $post_id       Post ID or WP_Post object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comments_link', $comments_link, $post_id )
	*/
	const GetCommentsLink = "get_comments_link";
	/**
		 * Filters the returned comment count for a post.
		 *
		 * @since 1.5.0
		 *
		 * @param string|int $count   A string representing the number of comments a post has, otherwise 0.
		 * @param int        $post_id Post ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'get_comments_number', $count, $post_id )
	*/
	const GetCommentsNumber = "get_comments_number";
	/**
		 * Filters the comments page number link for the current request.
		 *
		 * @since 2.7.0
		 *
		 * @param string $result The comments page number link.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_comments_pagenum_link', $result )
	*/
	const GetCommentsPagenumLink = "get_comments_pagenum_link";
	/**
		 * Filters the custom logo output.
		 *
		 * @since 4.5.0
		 * @since 4.6.0 Added the `$blog_id` parameter.
		 *
		 * @param string $html    Custom logo HTML output.
		 * @param int    $blog_id ID of the blog to get the custom logo for.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_custom_logo', $html, $blog_id )
	*/
	const GetCustomLogo = "get_custom_logo";
	/**
			 * Filters the date query WHERE clause.
			 *
			 * @since 3.7.0
			 *
			 * @param string        $where WHERE clause of the date query.
			 * @param WP_Date_Query $this  The WP_Date_Query instance.
			 * @Reference wp-includes\class-wp-date-query.php apply_filters( 'get_date_sql', $where, $this )
	*/
	const GetDateSql = "get_date_sql";
	/**
		 * Filters the default comment status for the given post type.
		 *
		 * @since 4.3.0
		 *
		 * @param string $status       Default status for the given post type,
		 *                             either 'open' or 'closed'.
		 * @param string $post_type    Post type. Default is `post`.
		 * @param string $comment_type Type of comment. Default is `comment`.
		 * @Reference wp-includes\comment.php apply_filters( 'get_default_comment_status', $status, $post_type, $comment_type )
	*/
	const GetDefaultCommentStatus = "get_default_comment_status";
	/**
		 * Filters the post delete link.
		 *
		 * @since 2.9.0
		 *
		 * @param string $link         The delete link.
		 * @param int    $post_id      Post ID.
		 * @param bool   $force_delete Whether to bypass the trash and force deletion. Default false.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_delete_post_link', wp_nonce_url( $delete_link, "$action-post_{$post->ID}" ), $post->ID, $force_delete )
	*/
	const GetDeletePostLink = "get_delete_post_link";
	/**
		 * Filters the bookmark edit link.
		 *
		 * @since 2.7.0
		 *
		 * @param string $location The edit link.
		 * @param int    $link_id  Bookmark ID.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_edit_bookmark_link', $location, $link->link_id )
	*/
	const GetEditBookmarkLink = "get_edit_bookmark_link";
	/**
		 * Filters the comment edit link.
		 *
		 * @since 2.3.0
		 *
		 * @param string $location The edit link.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_edit_comment_link', $location )
	*/
	const GetEditCommentLink = "get_edit_comment_link";
	/**
		 * Filters the post edit link.
		 *
		 * @since 2.3.0
		 *
		 * @param string $link    The edit link.
		 * @param int    $post_id Post ID.
		 * @param string $context The link context. If set to 'display' then ampersands
		 *                        are encoded.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_edit_post_link', $link, $post->ID, $context )
	*/
	const GetEditPostLink = "get_edit_post_link";
	/**
		 * Filters the edit link for a tag (or term in another taxonomy).
		 *
		 * @since 2.7.0
		 *
		 * @param string $link The term edit link.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_edit_tag_link', get_edit_term_link( $tag_id, $taxonomy ) )
	*/
	const GetEditTagLink = "get_edit_tag_link";
	/**
		 * Filters the edit link for a term.
		 *
		 * @since 3.1.0
		 *
		 * @param string $location    The edit link.
		 * @param int    $term_id     Term ID.
		 * @param string $taxonomy    Taxonomy name.
		 * @param string $object_type The object type (eg. the post type).
		 * @Reference wp-includes\link-template.php apply_filters( 'get_edit_term_link', $location, $term_id, $taxonomy, $object_type )
	*/
	const GetEditTermLink = "get_edit_term_link";
	/**
		 * Filters the user edit link.
		 *
		 * @since 3.5.0
		 *
		 * @param string $link    The edit link.
		 * @param int    $user_id User ID.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_edit_user_link', $link, $user->ID )
	*/
	const GetEditUserLink = "get_edit_user_link";
	/**
	* @Reference wp-admin\includes\deprecated.php apply_filters('get_editable_authors', $authors)
	*/
	const GetEditableAuthors = "get_editable_authors";
	/**
		 * Filters the list of enclosures already enclosed for the given post.
		 *
		 * @since 2.0.0
		 *
		 * @param array $pung    Array of enclosures for the given post.
		 * @param int   $post_id Post ID.
		 * @Reference wp-includes\post.php apply_filters( 'get_enclosed', $pung, $post_id )
	*/
	const GetEnclosed = "get_enclosed";
	/**
		 * Filters the date the last post or comment in the query was modified.
		 *
		 * @since 5.2.0
		 *
		 * @param string $max_modified_time Date the last post or comment was modified in the query.
		 * @param string $format            The date format requested in get_feed_build_date.
		 * @Reference wp-includes\feed.php apply_filters( 'get_feed_build_date', $max_modified_time, $format )
	*/
	const GetFeedBuildDate = "get_feed_build_date";
	/**
		 * Filters the markup of header images.
		 *
		 * @since 4.4.0
		 *
		 * @param string $html   The HTML image tag markup being filtered.
		 * @param object $header The custom header object returned by 'get_custom_header()'.
		 * @param array  $attr   Array of the attributes for the image tag.
		 * @Reference wp-includes\theme.php apply_filters( 'get_header_image_tag', $html, $header, $attr )
	*/
	const GetHeaderImageTag = "get_header_image_tag";
	/**
		 * Filters the header video URL.
		 *
		 * @since 4.7.3
		 *
		 * @param string $url Header video URL, if available.
		 * @Reference wp-includes\theme.php apply_filters( 'get_header_video_url', $url )
	*/
	const GetHeaderVideoUrl = "get_header_video_url";
	/**
		 * Filters the HTML content for the image tag.
		 *
		 * @since 2.6.0
		 *
		 * @param string       $html  HTML content for the image.
		 * @param int          $id    Attachment ID.
		 * @param string       $alt   Alternate text.
		 * @param string       $title Attachment title.
		 * @param string       $align Part of the class name for aligning the image.
		 * @param string|array $size  Size of image. Image size or array of width and height values (in that order).
		 *                            Default 'medium'.
		 * @Reference wp-includes\media.php apply_filters( 'get_image_tag', $html, $id, $alt, $title, $align, $size )
	*/
	const GetImageTag = "get_image_tag";
	/**
		 * Filters the value of the attachment's image tag class attribute.
		 *
		 * @since 2.6.0
		 *
		 * @param string       $class CSS class name or space-separated list of classes.
		 * @param int          $id    Attachment ID.
		 * @param string       $align Part of the class name for aligning the image.
		 * @param string|array $size  Size of image. Image size or array of width and height values (in that order).
		 *                            Default 'medium'.
		 * @Reference wp-includes\media.php apply_filters( 'get_image_tag_class', $class, $id, $align, $size )
	*/
	const GetImageTagClass = "get_image_tag_class";
	/**
		 * Filters the most recent time that a post on the site was published.
		 *
		 * @since 2.3.0
		 *
		 * @param string $date     Date the last post was published.
		 * @param string $timezone Location to use for getting the post published date.
		 *                         See get_lastpostdate() for accepted `$timezone` values.
		 * @Reference wp-includes\post.php apply_filters( 'get_lastpostdate', _get_last_post_time( $timezone, 'date', $post_type ), $timezone )
	*/
	const GetLastpostdate = "get_lastpostdate";
	/**
		 * Filters the most recent time that a post was modified.
		 *
		 * @since 2.3.0
		 *
		 * @param string $lastpostmodified The most recent time that a post was modified, in 'Y-m-d H:i:s' format.
		 * @param string $timezone         Location to use for getting the post modified date.
		 *                                 See get_lastpostdate() for accepted `$timezone` values.
		 * @Reference wp-includes\post.php apply_filters( 'get_lastpostmodified', $lastpostmodified, $timezone )
	*/
	const GetLastpostmodified = "get_lastpostmodified";
	/**
		 * Filters the main network ID.
		 *
		 * @since 4.3.0
		 *
		 * @param int $main_network_id The ID of the main network.
		 * @Reference wp-includes\functions.php apply_filters( 'get_main_network_id', $main_network_id )
	*/
	const GetMainNetworkId = "get_main_network_id";
	/**
		 * Filters the arguments used to retrieve an image for the edit image form.
		 *
		 * @since 3.1.0
		 *
		 * @see get_media_item
		 *
		 * @param array $parsed_args An array of arguments.
		 * @Reference wp-admin\includes\media.php apply_filters( 'get_media_item_args', $parsed_args )
	* @Reference wp-admin\includes\media.php apply_filters( 'get_media_item_args', $args )
	*/
	const GetMediaItemArgs = "get_media_item_args";
	/**
			 * Filters the meta query's generated SQL.
			 *
			 * @since 3.1.0
			 *
			 * @param array  $sql               Array containing the query's JOIN and WHERE clauses.
			 * @param array  $queries           Array of meta queries.
			 * @param string $type              Type of meta.
			 * @param string $primary_table     Primary table.
			 * @param string $primary_id_column Primary column ID.
			 * @param object $context           The main query object.
			 * @Reference wp-includes\class-wp-meta-query.php apply_filters( 'get_meta_sql', array( $sql, $this->queries, $type, $primary_table, $primary_id_column, $context ) )
	*/
	const GetMetaSql = "get_meta_sql";
	/**
		 * Fires after a network is retrieved.
		 *
		 * @since 4.6.0
		 *
		 * @param WP_Network $_network Network data.
		 * @Reference wp-includes\ms-network.php apply_filters( 'get_network', $_network )
	*/
	const GetNetwork = "get_network";
	/**
		 * Filters the terms for a given object or objects.
		 *
		 * @since 4.2.0
		 *
		 * @param array    $terms      Array of terms for the given object or objects.
		 * @param int[]    $object_ids Array of object IDs for which terms were retrieved.
		 * @param string[] $taxonomies Array of taxonomy names from which terms were retrieved.
		 * @param array    $args       Array of arguments for retrieving terms for the given
		 *                             object(s). See wp_get_object_terms() for details.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'get_object_terms', $terms, $object_ids, $taxonomies, $args )
	*/
	const GetObjectTerms = "get_object_terms";
	/**
	* @Reference wp-admin\includes\deprecated.php apply_filters('get_others_drafts', $other_unpubs)
	*/
	const GetOthersDrafts = "get_others_drafts";
	/**
		 * Filters the calculated page on which a comment appears.
		 *
		 * @since 4.4.0
		 * @since 4.7.0 Introduced the `$comment_ID` parameter.
		 *
		 * @param int   $page          Comment page.
		 * @param array $args {
		 *     Arguments used to calculate pagination. These include arguments auto-detected by the function,
		 *     based on query vars, system settings, etc. For pristine arguments passed to the function,
		 *     see `$original_args`.
		 *
		 *     @type string $type      Type of comments to count.
		 *     @type int    $page      Calculated current page.
		 *     @type int    $per_page  Calculated number of comments per page.
		 *     @type int    $max_depth Maximum comment threading depth allowed.
		 * }
		 * @param array $original_args {
		 *     Array of arguments passed to the function. Some or all of these may not be set.
		 *
		 *     @type string $type      Type of comments to count.
		 *     @type int    $page      Current comment page.
		 *     @type int    $per_page  Number of comments per page.
		 *     @type int    $max_depth Maximum comment threading depth allowed.
		 * }
		 * @param int $comment_ID ID of the comment.
		 * @Reference wp-includes\comment.php apply_filters( 'get_page_of_comment', (int) $page, $args, $original_args, $comment_ID )
	*/
	const GetPageOfComment = "get_page_of_comment";
	/**
		 * Filters the URI for a page.
		 *
		 * @since 4.4.0
		 *
		 * @param string  $uri  Page URI.
		 * @param WP_Post $page Page object.
		 * @Reference wp-includes\post.php apply_filters( 'get_page_uri', $uri, $page )
	*/
	const GetPageUri = "get_page_uri";
	/**
		 * Filters the page number link for the current request.
		 *
		 * @since 2.5.0
		 * @since 5.2.0 Added the `$pagenum` argument.
		 *
		 * @param string $result  The page number link.
		 * @param int    $pagenum The page number.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_pagenum_link', $result, $pagenum )
	*/
	const GetPagenumLink = "get_pagenum_link";
	/**
		 * Filters the retrieved list of pages.
		 *
		 * @since 2.1.0
		 *
		 * @param array $pages List of pages to retrieve.
		 * @param array $parsed_args     Array of get_pages() arguments.
		 * @Reference wp-includes\post.php apply_filters( 'get_pages', $pages, $parsed_args )
	* @Reference wp-includes\post.php apply_filters( 'get_pages', $pages, $parsed_args )
	* @Reference wp-includes\post.php apply_filters( 'get_pages', array(), $parsed_args )
	*/
	const GetPages = "get_pages";
	/**
		 * Filters the list of all found galleries in the given post.
		 *
		 * @since 3.6.0
		 *
		 * @param array   $galleries Associative array of all found post galleries.
		 * @param WP_Post $post      Post object.
		 * @Reference wp-includes\media.php apply_filters( 'get_post_galleries', $galleries, $post )
	*/
	const GetPostGalleries = "get_post_galleries";
	/**
		 * Filters the first-found post gallery.
		 *
		 * @since 3.6.0
		 *
		 * @param array       $gallery   The first-found post gallery.
		 * @param int|WP_Post $post      Post ID or object.
		 * @param array       $galleries Associative array of all found post galleries.
		 * @Reference wp-includes\media.php apply_filters( 'get_post_gallery', $gallery, $post, $galleries )
	*/
	const GetPostGallery = "get_post_gallery";
	/**
		 * Filters the localized time a post was last modified.
		 *
		 * @since 2.8.0
		 *
		 * @param string $time The formatted time.
		 * @param string $d    Format to use for retrieving the time the post was modified.
		 *                     Accepts 'G', 'U', or php date format. Default 'U'.
		 * @param bool   $gmt  Whether to retrieve the GMT time. Default false.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_post_modified_time', $time, $d, $gmt )
	*/
	const GetPostModifiedTime = "get_post_modified_time";
	/**
		 * Filters the post status.
		 *
		 * @since 4.4.0
		 *
		 * @param string  $post_status The post status.
		 * @param WP_Post $post        The post object.
		 * @Reference wp-includes\post.php apply_filters( 'get_post_status', $post->post_status, $post )
	*/
	const GetPostStatus = "get_post_status";
	/**
		 * Filters the localized time a post was written.
		 *
		 * @since 2.6.0
		 *
		 * @param string $time The formatted time.
		 * @param string $d    Format to use for retrieving the time the post was written.
		 *                     Accepts 'G', 'U', or php date format. Default 'U'.
		 * @param bool   $gmt  Whether to retrieve the GMT time. Default false.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_post_time', $time, $d, $gmt )
	*/
	const GetPostTime = "get_post_time";
	/**
		 * Filters the list of already-pinged URLs for the given post.
		 *
		 * @since 2.0.0
		 *
		 * @param string[] $pung Array of URLs already pinged for the given post.
		 * @Reference wp-includes\post.php apply_filters( 'get_pung', $pung )
	*/
	const GetPung = "get_pung";
	/**
			 * Filters the returned array of roles for a user.
			 *
			 * @since 4.4.0
			 *
			 * @param string[] $role_list   An array of user roles.
			 * @param WP_User  $user_object A WP_User object.
			 * @Reference wp-admin\includes\class-wp-users-list-table.php apply_filters( 'get_role_list', $role_list, $user_object )
	*/
	const GetRoleList = "get_role_list";
	/**
		 * Filters the sample permalink.
		 *
		 * @since 4.4.0
		 *
		 * @param array   $permalink Array containing the sample permalink with placeholder for the post name, and the post name.
		 * @param int     $post_id   Post ID.
		 * @param string  $title     Post title.
		 * @param string  $name      Post name (slug).
		 * @param WP_Post $post      Post object.
		 * @Reference wp-admin\includes\post.php apply_filters( 'get_sample_permalink', $permalink, $post->ID, $title, $name, $post )
	*/
	const GetSamplePermalink = "get_sample_permalink";
	/**
		 * Filters the sample permalink HTML markup.
		 *
		 * @since 2.9.0
		 * @since 4.4.0 Added `$post` parameter.
		 *
		 * @param string  $return    Sample permalink HTML markup.
		 * @param int     $post_id   Post ID.
		 * @param string  $new_title New sample permalink title.
		 * @param string  $new_slug  New sample permalink slug.
		 * @param WP_Post $post      Post object.
		 * @Reference wp-admin\includes\post.php apply_filters( 'get_sample_permalink_html', $return, $post->ID, $new_title, $new_slug, $post )
	*/
	const GetSamplePermalinkHtml = "get_sample_permalink_html";
	/**
		 * Filter the schedule for a hook.
		 *
		 * @since 5.1.0
		 *
		 * @param string|bool $schedule Schedule for the hook. False if not found.
		 * @param string      $hook     Action hook to execute when cron is run.
		 * @param array       $args     Optional. Arguments to pass to the hook's callback function.
		 * @Reference wp-includes\cron.php apply_filters( 'get_schedule', $schedule, $hook, $args )
	*/
	const GetSchedule = "get_schedule";
	/**
		 * Filters the HTML output of the search form.
		 *
		 * @since 2.7.0
		 *
		 * @param string $form The search form HTML output.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_search_form', $form )
	*/
	const GetSearchForm = "get_search_form";
	/**
		 * Filters the contents of the search query variable.
		 *
		 * @since 2.3.0
		 *
		 * @param mixed $search Contents of the search query variable.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_search_query', get_query_var( 's' ) )
	*/
	const GetSearchQuery = "get_search_query";
	/**
		 * Filters the shortlink for a post.
		 *
		 * @since 3.0.0
		 *
		 * @param string $shortlink   Shortlink URL.
		 * @param int    $id          Post ID, or 0 for the current post.
		 * @param string $context     The context for the link. One of 'post' or 'query',
		 * @param bool   $allow_slugs Whether to allow post slugs in the shortlink. Not used by default.
		 * @Reference wp-includes\link-template.php apply_filters( 'get_shortlink', $shortlink, $id, $context, $allow_slugs )
	*/
	const GetShortlink = "get_shortlink";
	/**
		 * Fires after a site is retrieved.
		 *
		 * @since 4.6.0
		 *
		 * @param WP_Site $_site Site data.
		 * @Reference wp-includes\ms-site.php apply_filters( 'get_site', $_site )
	*/
	const GetSite = "get_site";
	/**
		 * Filters the site icon URL.
		 *
		 * @since 4.4.0
		 *
		 * @param string $url     Site icon URL.
		 * @param int    $size    Size of the site icon.
		 * @param int    $blog_id ID of the blog to get the site icon for.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_site_icon_url', $url, $size, $blog_id )
	*/
	const GetSiteIconUrl = "get_site_icon_url";
	/**
		 * Filters the upload quota for the current site.
		 *
		 * @since 3.7.0
		 *
		 * @param int $space_allowed Upload quota in megabytes for the current blog.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'get_space_allowed', $space_allowed )
	*/
	const GetSpaceAllowed = "get_space_allowed";
	/**
		 * Filters the array of term objects returned for the 'post_tag' taxonomy.
		 *
		 * @since 2.3.0
		 *
		 * @param WP_Term[]|int $tags Array of 'post_tag' term objects, or a count thereof.
		 * @param array         $args An array of arguments. @see get_terms()
		 * @Reference wp-includes\category.php apply_filters( 'get_tags', $tags, $args )
	*/
	const GetTags = "get_tags";
	/**
		 * Filters a taxonomy term object.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 `$_term` is now a `WP_Term` object.
		 *
		 * @param WP_Term $_term    Term object.
		 * @param string  $taxonomy The taxonomy slug.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'get_term', $_term, $taxonomy )
	*/
	const GetTerm = "get_term";
	/**
		 * Filters the found terms.
		 *
		 * @since 2.3.0
		 * @since 4.6.0 Added the `$term_query` parameter.
		 *
		 * @param array         $terms      Array of found terms.
		 * @param array         $taxonomies An array of taxonomies.
		 * @param array         $args       An array of get_terms() arguments.
		 * @param WP_Term_Query $term_query The WP_Term_Query object.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'get_terms', $terms, $term_query->query_vars['taxonomy'], $term_query->query_vars, $term_query )
	*/
	const GetTerms = "get_terms";
	/**
			 * Filters the terms query arguments.
			 *
			 * @since 3.1.0
			 *
			 * @param array    $args       An array of get_terms() arguments.
			 * @param string[] $taxonomies An array of taxonomy names.
			 * @Reference wp-includes\class-wp-term-query.php apply_filters( 'get_terms_args', $args, $taxonomies )
	*/
	const GetTermsArgs = "get_terms_args";
	/**
			 * Filters the terms query default arguments.
			 *
			 * Use {@see 'get_terms_args'} to filter the passed arguments.
			 *
			 * @since 4.4.0
			 *
			 * @param array    $defaults   An array of default get_terms() arguments.
			 * @param string[] $taxonomies An array of taxonomy names.
			 * @Reference wp-includes\class-wp-term-query.php apply_filters( 'get_terms_defaults', $this->query_var_defaults, $taxonomies )
	*/
	const GetTermsDefaults = "get_terms_defaults";
	/**
			 * Filters the fields to select in the terms query.
			 *
			 * Field lists modified using this filter will only modify the term fields returned
			 * by the function when the `$fields` parameter set to 'count' or 'all'. In all other
			 * cases, the term fields in the results array will be determined by the `$fields`
			 * parameter alone.
			 *
			 * Use of this filter can result in unpredictable behavior, and is not recommended.
			 *
			 * @since 2.8.0
			 *
			 * @param string[] $selects    An array of fields to select for the terms query.
			 * @param array    $args       An array of term query arguments.
			 * @param string[] $taxonomies An array of taxonomy names.
			 * @Reference wp-includes\class-wp-term-query.php apply_filters( 'get_terms_fields', $selects, $args, $taxonomies )
	*/
	const GetTermsFields = "get_terms_fields";
	/**
			 * Filters the ORDERBY clause of the terms query.
			 *
			 * @since 2.8.0
			 *
			 * @param string   $orderby    `ORDERBY` clause of the terms query.
			 * @param array    $args       An array of term query arguments.
			 * @param string[] $taxonomies An array of taxonomy names.
			 * @Reference wp-includes\class-wp-term-query.php apply_filters( 'get_terms_orderby', $orderby, $this->query_vars, $this->query_vars['taxonomy'] )
	*/
	const GetTermsOrderby = "get_terms_orderby";
	/**
		 * Filters the archive description.
		 *
		 * @since 4.1.0
		 *
		 * @param string $description Archive description to be displayed.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_the_archive_description', $description )
	*/
	const GetTheArchiveDescription = "get_the_archive_description";
	/**
		 * Filters the archive title.
		 *
		 * @since 4.1.0
		 *
		 * @param string $title Archive title to be displayed.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_the_archive_title', $title )
	*/
	const GetTheArchiveTitle = "get_the_archive_title";
	/**
		 * Filters the array of categories to return for a post.
		 *
		 * @since 3.1.0
		 * @since 4.4.0 Added `$id` parameter.
		 *
		 * @param WP_Term[] $categories An array of categories to return for the post.
		 * @param int|false $id         ID of the post.
		 * @Reference wp-includes\category-template.php apply_filters( 'get_the_categories', $categories, $id )
	*/
	const GetTheCategories = "get_the_categories";
	/**
		 * Filters the date a post was published.
		 *
		 * @since 3.0.0
		 *
		 * @param string      $the_date The formatted date.
		 * @param string      $d        PHP date format. Defaults to 'date_format' option
		 *                              if not specified.
		 * @param int|WP_Post $post     The post object or ID.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_the_date', $the_date, $d, $post )
	*/
	const GetTheDate = "get_the_date";
	/**
		 * Filters the retrieved post excerpt.
		 *
		 * @since 1.2.0
		 * @since 4.5.0 Introduced the `$post` parameter.
		 *
		 * @param string $post_excerpt The post excerpt.
		 * @param WP_Post $post Post object.
		 * @Reference wp-includes\post-template.php apply_filters( 'get_the_excerpt', $post->post_excerpt, $post )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-attachments-controller.php apply_filters( 'get_the_excerpt', $post->post_excerpt, $post )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-posts-controller.php apply_filters( 'get_the_excerpt', $post->post_excerpt, $post )
	*/
	const GetTheExcerpt = "get_the_excerpt";
	/**
		 * Filters the Global Unique Identifier (guid) of the post.
		 *
		 * @since 1.5.0
		 *
		 * @param string $guid Global Unique Identifier (guid) of the post.
		 * @param int    $id   The post ID.
		 * @Reference wp-includes\post-template.php apply_filters( 'get_the_guid', $guid, $id )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-posts-controller.php apply_filters( 'get_the_guid', $post->guid, $post->ID )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-revisions-controller.php apply_filters( 'get_the_guid', $post->guid, $post->ID )
	*/
	const GetTheGuid = "get_the_guid";
	/**
		 * Filters the date a post was last modified.
		 *
		 * @since 2.1.0
		 * @since 4.6.0 Added the `$post` parameter.
		 *
		 * @param string|bool  $the_time The formatted date or false if no post is found.
		 * @param string       $d        PHP date format. Defaults to value specified in
		 *                               'date_format' option.
		 * @param WP_Post|null $post     WP_Post object or null if no post is found.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_the_modified_date', $the_time, $d, $post )
	*/
	const GetTheModifiedDate = "get_the_modified_date";
	/**
		 * Filters the localized time a post was last modified.
		 *
		 * @since 2.0.0
		 * @since 4.6.0 Added the `$post` parameter.
		 *
		 * @param string|bool  $the_time The formatted time or false if no post is found.
		 * @param string       $d        Format to use for retrieving the time the post was
		 *                               written. Accepts 'G', 'U', or php date format. Defaults
		 *                               to value specified in 'time_format' option.
		 * @param WP_Post|null $post     WP_Post object or null if no post is found.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_the_modified_time', $the_time, $d, $post )
	*/
	const GetTheModifiedTime = "get_the_modified_time";
	/**
		 * Filters the description for a post type archive.
		 *
		 * @since 4.9.0
		 *
		 * @param string       $description   The post type description.
		 * @param WP_Post_Type $post_type_obj The post type object.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_the_post_type_description', $description, $post_type_obj )
	*/
	const GetThePostTypeDescription = "get_the_post_type_description";
	/**
		 * Filters the array of tags for the given post.
		 *
		 * @since 2.3.0
		 *
		 * @see get_the_terms()
		 *
		 * @param WP_Term[] $terms An array of tags for the given post.
		 * @Reference wp-includes\category-template.php apply_filters( 'get_the_tags', get_the_terms( $id, 'post_tag' ) )
	*/
	const GetTheTags = "get_the_tags";
	/**
		 * Filters the list of terms attached to the given post.
		 *
		 * @since 3.1.0
		 *
		 * @param WP_Term[]|WP_Error $terms    Array of attached terms, or WP_Error on failure.
		 * @param int                $post_id  Post ID.
		 * @param string             $taxonomy Name of the taxonomy.
		 * @Reference wp-includes\category-template.php apply_filters( 'get_the_terms', $terms, $post->ID, $taxonomy )
	*/
	const GetTheTerms = "get_the_terms";
	/**
		 * Filters the time a post was written.
		 *
		 * @since 1.5.0
		 *
		 * @param string      $the_time The formatted time.
		 * @param string      $d        Format to use for retrieving the time the post was written.
		 *                              Accepts 'G', 'U', or php date format value specified
		 *                              in 'time_format' option. Default empty.
		 * @param int|WP_Post $post     WP_Post object or ID.
		 * @Reference wp-includes\general-template.php apply_filters( 'get_the_time', $the_time, $d, $post )
	*/
	const GetTheTime = "get_the_time";
	/**
		 * Filters the expanded array of starter content.
		 *
		 * @since 4.7.0
		 *
		 * @param array $content Array of starter content.
		 * @param array $config  Array of theme-specific starter content configuration.
		 * @Reference wp-includes\theme.php apply_filters( 'get_theme_starter_content', $content, $config )
	*/
	const GetThemeStarterContent = "get_theme_starter_content";
	/**
		 * Filters the list of URLs yet to ping for the given post.
		 *
		 * @since 2.0.0
		 *
		 * @param array $to_ping List of URLs yet to ping.
		 * @Reference wp-includes\post.php apply_filters( 'get_to_ping', $to_ping )
	*/
	const GetToPing = "get_to_ping";
	/**
		 * Filters the number of posts a user has written.
		 *
		 * @since 2.7.0
		 * @since 4.1.0 Added `$post_type` argument.
		 * @since 4.3.1 Added `$public_only` argument.
		 *
		 * @param int          $count       The user's post count.
		 * @param int          $userid      User ID.
		 * @param string|array $post_type   Single post type or array of post types to count the number of posts for.
		 * @param bool         $public_only Whether to limit counted posts to public posts.
		 * @Reference wp-includes\user.php apply_filters( 'get_usernumposts', $count, $userid, $post_type, $public_only )
	*/
	const GetUsernumposts = "get_usernumposts";
	/**
		 * Filters the user's drafts query string.
		 *
		 * @since 2.0.0
		 *
		 * @param string $query The user's drafts query string.
		 * @Reference wp-admin\includes\user.php apply_filters( 'get_users_drafts', $query )
	*/
	const GetUsersDrafts = "get_users_drafts";
	/**
		 * Filters the blog title for use as the feed title.
		 *
		 * @since 2.2.0
		 * @since 4.4.0 The `$sep` parameter was deprecated and renamed to `$deprecated`.
		 *
		 * @param string $title      The current blog title.
		 * @param string $deprecated Unused.
		 * @Reference wp-includes\feed.php apply_filters( 'get_wp_title_rss', wp_get_document_title(), $deprecated )
	*/
	const GetWpTitleRss = "get_wp_title_rss";
	/**
		 * Filters the SQL JOIN clause for retrieving archives.
		 *
		 * @since 2.2.0
		 *
		 * @param string $sql_join    Portion of SQL query containing JOIN clause.
		 * @param array  $parsed_args An array of default arguments.
		 * @Reference wp-includes\general-template.php apply_filters( 'getarchives_join', '', $parsed_args )
	*/
	const GetarchivesJoin = "getarchives_join";
	/**
		 * Filters the SQL WHERE clause for retrieving archives.
		 *
		 * @since 2.2.0
		 *
		 * @param string $sql_where Portion of SQL query containing the WHERE clause.
		 * @param array  $parsed_args         An array of default arguments.
		 * @Reference wp-includes\general-template.php apply_filters( 'getarchives_where', $sql_where, $parsed_args )
	*/
	const GetarchivesWhere = "getarchives_where";
	/**
				 * Filters the list mapping image mime types to their respective extensions.
				 *
				 * @since 3.0.0
				 *
				 * @param  array $mime_to_ext Array of image mime types and their matching extensions.
				 * @Reference wp-includes\functions.php apply_filters(				'getimagesize_mimes_to_exts',				array(					'image/jpeg' => 'jpg',					'image/png'  => 'png',					'image/gif'  => 'gif',					'image/bmp'  => 'bmp',					'image/tiff' => 'tif',				)			)
	*/
	const GetimagesizeMimesToExts = "getimagesize_mimes_to_exts";
	/**
		 * Filters text with its translation.
		 *
		 * @since 2.0.11
		 *
		 * @param string $translation  Translated text.
		 * @param string $text         Text to translate.
		 * @param string $domain       Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'gettext', $translation, $text, $domain )
	*/
	const Gettext = "gettext";
	/**
		 * Filters text with its translation based on context information.
		 *
		 * @since 2.8.0
		 *
		 * @param string $translation  Translated text.
		 * @param string $text         Text to translate.
		 * @param string $context      Context information for the translators.
		 * @param string $domain       Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'gettext_with_context', $translation, $text, $context, $domain )
	*/
	const GettextWithContext = "gettext_with_context";
	/**
			 * Filters whether global terms are enabled.
			 *
			 * Passing a non-null value to the filter will effectively short-circuit the function,
			 * returning the value of the 'global_terms_enabled' site option instead.
			 *
			 * @since 3.0.0
			 *
			 * @param null $enabled Whether global terms are enabled.
			 * @Reference wp-includes\functions.php apply_filters( 'global_terms_enabled', null )
	*/
	const GlobalTermsEnabled = "global_terms_enabled";
	/**
		 * Filters whether Apache and mod_rewrite are present.
		 *
		 * This filter was previously used to force URL rewriting for other servers,
		 * like nginx. Use the {@see 'got_url_rewrite'} filter in got_url_rewrite() instead.
		 *
		 * @since 2.5.0
		 *
		 * @see got_url_rewrite()
		 *
		 * @param bool $got_rewrite Whether Apache and mod_rewrite are present.
		 * @Reference wp-admin\includes\misc.php apply_filters( 'got_rewrite', $got_rewrite )
	*/
	const GotRewrite = "got_rewrite";
	/**
		 * Filters whether URL rewriting is available.
		 *
		 * @since 3.7.0
		 *
		 * @param bool $got_url_rewrite Whether URL rewriting is available.
		 * @Reference wp-admin\includes\misc.php apply_filters( 'got_url_rewrite', $got_url_rewrite )
	*/
	const GotUrlRewrite = "got_url_rewrite";
	/**
	* @Reference wp-includes\ms-deprecated.php apply_filters( 'graceful_fail', $message )
	*/
	const GracefulFail = "graceful_fail";
	/**
	* @Reference wp-includes\ms-deprecated.php apply_filters( 'graceful_fail_template','<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Error!</title><style type="text/css">img {	border: 0;}body {line-height: 1.6em; font-family: Georgia, serif; width: 390px; margin: auto;text-align: center;}.message {	font-size: 22px;	width: 350px;	margin: auto;}</style></head><body><p class="message">%s</p></body></html>' )
	*/
	const GracefulFailTemplate = "graceful_fail_template";
	/** This action is documented in wp-admin/edit-comments.php * @Reference wp-admin\upload.php apply_filters( 'handle_bulk_actions-' . get_current_screen()->id, $location, $doaction, $post_ids )
	* @Reference wp-admin\edit-tags.php apply_filters( 'handle_bulk_actions-' . get_current_screen()->id, $location, $wp_list_table->current_action(), $tags )
	* @Reference wp-admin\link-manager.php apply_filters( 'handle_bulk_actions-' . get_current_screen()->id, $redirect_to, $doaction, $bulklinks )
	* @Reference wp-admin\plugins.php apply_filters( 'handle_bulk_actions-' . get_current_screen()->id, $sendback, $action, $plugins )
	* @Reference wp-admin\edit.php apply_filters( 'handle_bulk_actions-' . get_current_screen()->id, $sendback, $doaction, $post_ids )
	* @Reference wp-admin\users.php apply_filters( 'handle_bulk_actions-' . get_current_screen()->id, $sendback, $wp_list_table->current_action(), $userids )
	*/
	const HandleBulkActionsGetCurrentScreenId = "handle_bulk_actions-.get_current_screen()->id";
	/** This action is documented in wp-admin/network/site-themes.php * @Reference wp-admin\network\sites.php apply_filters( 'handle_network_bulk_actions-' . get_current_screen()->id, $redirect_to, $doaction, $blogs, $id )
	* @Reference wp-admin\network\themes.php apply_filters( 'handle_network_bulk_actions-' . get_current_screen()->id, $referer, $action, $themes )
	* @Reference wp-admin\network\site-users.php apply_filters( 'handle_network_bulk_actions-' . get_current_screen()->id, $referer, $action, $userids, $id )
	* @Reference wp-admin\network\users.php apply_filters( 'handle_network_bulk_actions-' . get_current_screen()->id, $sendback, $doaction, $user_ids )
	*/
	const HandleNetworkBulkActionsGetCurrentScreenId = "handle_network_bulk_actions-.get_current_screen()->id";
	/**
		 * Filters whether a nav menu is assigned to the specified location.
		 *
		 * @since 4.3.0
		 *
		 * @param bool   $has_nav_menu Whether there is a menu assigned to a location.
		 * @param string $location     Menu location.
		 * @Reference wp-includes\nav-menu.php apply_filters( 'has_nav_menu', $has_nav_menu, $location )
	*/
	const HasNavMenu = "has_nav_menu";
	/**
		 * Filters whether a post has a post thumbnail.
		 *
		 * @since 5.1.0
		 *
		 * @param bool             $has_thumbnail true if the post has a post thumbnail, otherwise false.
		 * @param int|WP_Post|null $post          Post ID or WP_Post object. Default is global `$post`.
		 * @param int|string       $thumbnail_id  Post thumbnail ID or empty string.
		 * @Reference wp-includes\post-thumbnail-template.php apply_filters( 'has_post_thumbnail', $has_thumbnail, $post, $thumbnail_id )
	*/
	const HasPostThumbnail = "has_post_thumbnail";
	/**
		 * Filters header video settings.
		 *
		 * @since 4.7.0
		 *
		 * @param array $settings An array of header video settings.
		 * @Reference wp-includes\theme.php apply_filters( 'header_video_settings', $settings )
	*/
	const HeaderVideoSettings = "header_video_settings";
	/**
			 * Filters Heartbeat Ajax response in no-privilege environments.
			 *
			 * @since 3.6.0
			 *
			 * @param array  $response  The no-priv Heartbeat response.
			 * @param array  $data      The $_POST data sent.
			 * @param string $screen_id The screen id.
			 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'heartbeat_nopriv_received', $response, $data, $screen_id )
	*/
	const HeartbeatNoprivReceived = "heartbeat_nopriv_received";
	/**
		 * Filters Heartbeat Ajax response in no-privilege environments when no data is passed.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $response  The no-priv Heartbeat response.
		 * @param string $screen_id The screen id.
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'heartbeat_nopriv_send', $response, $screen_id )
	*/
	const HeartbeatNoprivSend = "heartbeat_nopriv_send";
	/**
			 * Filters the Heartbeat response received.
			 *
			 * @since 3.6.0
			 *
			 * @param array  $response  The Heartbeat response.
			 * @param array  $data      The $_POST data sent.
			 * @param string $screen_id The screen id.
			 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'heartbeat_received', $response, $data, $screen_id )
	*/
	const HeartbeatReceived = "heartbeat_received";
	/**
		 * Filters the Heartbeat response sent.
		 *
		 * @since 3.6.0
		 *
		 * @param array  $response  The Heartbeat response.
		 * @param string $screen_id The screen id.
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'heartbeat_send', $response, $screen_id )
	*/
	const HeartbeatSend = "heartbeat_send";
	/**
			 * Filters the Heartbeat settings.
			 *
			 * @since 3.6.0
			 *
			 * @param array $settings Heartbeat settings array.
			 * @Reference wp-includes\script-loader.php apply_filters( 'heartbeat_settings', array() )
	*/
	const HeartbeatSettings = "heartbeat_settings";
	/**
		 * Filters the list of hidden columns.
		 *
		 * @since 4.4.0
		 * @since 4.4.1 Added the `use_defaults` parameter.
		 *
		 * @param array     $hidden An array of hidden columns.
		 * @param WP_Screen $screen WP_Screen object of the current screen.
		 * @param bool      $use_defaults Whether to show the default columns.
		 * @Reference wp-admin\includes\screen.php apply_filters( 'hidden_columns', $hidden, $screen, $use_defaults )
	*/
	const HiddenColumns = "hidden_columns";
	/**
		 * Filters the list of hidden meta boxes.
		 *
		 * @since 3.3.0
		 *
		 * @param array     $hidden       An array of hidden meta boxes.
		 * @param WP_Screen $screen       WP_Screen object of the current screen.
		 * @param bool      $use_defaults Whether to show the default meta boxes.
		 *                                Default true.
		 * @Reference wp-admin\includes\screen.php apply_filters( 'hidden_meta_boxes', $hidden, $screen, $use_defaults )
	*/
	const HiddenMetaBoxes = "hidden_meta_boxes";
	/**
		 * Filters the home URL.
		 *
		 * @since 3.0.0
		 *
		 * @param string      $url         The complete home URL including scheme and path.
		 * @param string      $path        Path relative to the home URL. Blank string if no path is specified.
		 * @param string|null $orig_scheme Scheme to give the home URL context. Accepts 'http', 'https',
		 *                                 'relative', 'rest', or null.
		 * @param int|null    $blog_id     Site ID, or null for the current site.
		 * @Reference wp-includes\link-template.php apply_filters( 'home_url', $url, $path, $orig_scheme, $blog_id )
	*/
	const HomeUrl = "home_url";
	/**
	* @Reference wp-includes\plugin.php apply_filters( 'hook', $value, $arg2, $arg3 )
	*/
	const Hook = "hook";
	/**
		 * Filters the text before it is formatted for the HTML editor.
		 *
		 * @since 2.5.0
		 * @deprecated 4.3.0
		 *
		 * @param string $output The HTML-formatted text.
		 * @Reference wp-includes\deprecated.php apply_filters( 'htmledit_pre', $output )
	* @Reference wp-includes\class-wp-editor.php apply_filters( 'htmledit_pre', array( $content ), '4.3.0', 'format_for_editor' )
	*/
	const HtmleditPre = "htmledit_pre";
	/**
			 * Filters which HTTP transports are available and in what order.
			 *
			 * @since 3.7.0
			 *
			 * @param array  $transports Array of HTTP transports to check. Default array contains
			 *                           'curl', and 'streams', in that order.
			 * @param array  $args       HTTP request arguments.
			 * @param string $url        The URL to request.
			 * @Reference wp-includes\class-http.php apply_filters( 'http_api_transports', $transports, $args, $url )
	*/
	const HttpApiTransports = "http_api_transports";
	/**
				 * Filters the user agent value sent with an HTTP request.
				 *
				 * @since 2.7.0
				 * @since 5.1.0 The `$url` parameter was added.
				 *
				 * @param string $user_agent WordPress user agent string.
				 * @param string $url        The request URL.
				 * @Reference wp-includes\class-http.php apply_filters( 'http_headers_useragent', 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' ), $url )
	* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'http_headers_useragent', 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' ), $url )
	*/
	const HttpHeadersUseragent = "http_headers_useragent";
	/**
		 * Change the origin of an HTTP request.
		 *
		 * @since 3.4.0
		 *
		 * @param string $origin The original origin for the request.
		 * @Reference wp-includes\http.php apply_filters( 'http_origin', $origin )
	*/
	const HttpOrigin = "http_origin";
	/**
			 * Filters the arguments used in an HTTP request.
			 *
			 * @since 2.7.0
			 *
			 * @param array  $parsed_args   An array of HTTP request arguments.
			 * @param string $url The request URL.
			 * @Reference wp-includes\class-http.php apply_filters( 'http_request_args', $parsed_args, $url )
	*/
	const HttpRequestArgs = "http_request_args";
	/**
					 * Check if HTTP request is external or not.
					 *
					 * Allows to change and allow external requests for the HTTP request.
					 *
					 * @since 3.6.0
					 *
					 * @param bool   $external Whether HTTP request is external or not.
					 * @param string $host     Host name of the requested URL.
					 * @param string $url      Requested URL.
					 * @Reference wp-includes\http.php apply_filters( 'http_request_host_is_external', false, $host, $url )
	*/
	const HttpRequestHostIsExternal = "http_request_host_is_external";
	/**
				 * Filters the number of redirects allowed during an HTTP request.
				 *
				 * @since 2.7.0
				 * @since 5.1.0 The `$url` parameter was added.
				 *
				 * @param int    $redirect_count Number of redirects allowed. Default 5.
				 * @param string $url            The request URL.
				 * @Reference wp-includes\class-http.php apply_filters( 'http_request_redirection_count', 5, $url )
	*/
	const HttpRequestRedirectionCount = "http_request_redirection_count";
	/**
				 * Filters whether to pass URLs through wp_http_validate_url() in an HTTP request.
				 *
				 * @since 3.6.0
				 * @since 5.1.0 The `$url` parameter was added.
				 *
				 * @param bool   $pass_url Whether to pass URLs through wp_http_validate_url(). Default false.
				 * @param string $url      The request URL.
				 * @Reference wp-includes\class-http.php apply_filters( 'http_request_reject_unsafe_urls', false, $url )
	*/
	const HttpRequestRejectUnsafeUrls = "http_request_reject_unsafe_urls";
	/**
				 * Filters the timeout value for an HTTP request.
				 *
				 * @since 2.7.0
				 * @since 5.1.0 The `$url` parameter was added.
				 *
				 * @param int    $timeout_value Time in seconds until a request times out. Default 5.
				 * @param string $url           The request URL.
				 * @Reference wp-includes\class-http.php apply_filters( 'http_request_timeout', 5, $url )
	*/
	const HttpRequestTimeout = "http_request_timeout";
	/**
				 * Filters the version of the HTTP protocol used in a request.
				 *
				 * @since 2.7.0
				 * @since 5.1.0 The `$url` parameter was added.
				 *
				 * @param string $version Version of HTTP used. Accepts '1.0' and '1.1'. Default '1.0'.
				 * @param string $url     The request URL.
				 * @Reference wp-includes\class-http.php apply_filters( 'http_request_version', '1.0', $url )
	*/
	const HttpRequestVersion = "http_request_version";
	/**
			 * Filters the HTTP API response immediately before the response is returned.
			 *
			 * @since 2.9.0
			 *
			 * @param array  $response    HTTP response.
			 * @param array  $parsed_args HTTP request arguments.
			 * @param string $url         The request URL.
			 * @Reference wp-includes\class-http.php apply_filters( 'http_response', $response, $parsed_args, $url )
	* @Reference wp-includes\class-http.php apply_filters( 'http_response', $response, $args, $url )
	*/
	const HttpResponse = "http_response";
	/**
				 * Filters whether SSL should be verified for local requests.
				 *
				 * @since 2.8.0
				 * @since 5.1.0 The `$url` parameter was added.
				 *
				 * @param bool   $ssl_verify Whether to verify the SSL connection. Default true.
				 * @param string $url        The request URL.
				 * @Reference wp-includes\class-wp-http-streams.php apply_filters( 'https_local_ssl_verify', $ssl_verify, $url )
	* @Reference wp-includes\class-wp-http-curl.php apply_filters( 'https_local_ssl_verify', $ssl_verify, $url )
	* @Reference wp-admin\includes\class-wp-site-health.php apply_filters( 'https_local_ssl_verify', false )
	* @Reference wp-admin\includes\class-wp-site-health.php apply_filters( 'https_local_ssl_verify', false )
	* @Reference wp-admin\includes\class-wp-site-health-auto-updates.php apply_filters( 'https_local_ssl_verify', false )
	* @Reference wp-admin\includes\file.php apply_filters( 'https_local_ssl_verify', false )
	* @Reference wp-includes\cron.php apply_filters( 'https_local_ssl_verify', false )
	*/
	const HttpsLocalSslVerify = "https_local_ssl_verify";
	/**
			 * Filters whether SSL should be verified for non-local requests.
			 *
			 * @since 2.8.0
			 * @since 5.1.0 The `$url` parameter was added.
			 *
			 * @param bool   $ssl_verify Whether to verify the SSL connection. Default true.
			 * @param string $url        The request URL.
			 * @Reference wp-includes\class-http.php apply_filters( 'https_ssl_verify', $options['verify'], $url )
	* @Reference wp-includes\class-wp-http-curl.php apply_filters( 'https_ssl_verify', $ssl_verify, $url )
	* @Reference wp-includes\class-wp-http-streams.php apply_filters( 'https_ssl_verify', $ssl_verify, $url )
	*/
	const HttpsSslVerify = "https_ssl_verify";
	/**
		 * Filters the human readable difference between two timestamps.
		 *
		 * @since 4.0.0
		 *
		 * @param string $since The difference in human readable text.
		 * @param int    $diff  The difference in seconds.
		 * @param int    $from  Unix timestamp from which the difference begins.
		 * @param int    $to    Unix timestamp to end the time difference.
		 * @Reference wp-includes\formatting.php apply_filters( 'human_time_diff', $since, $diff, $from, $to )
	*/
	const HumanTimeDiff = "human_time_diff";
	/**
				 * Filters the icon directory path.
				 *
				 * @since 2.0.0
				 *
				 * @param string $path Icon directory absolute path.
				 * @Reference wp-includes\post.php apply_filters( 'icon_dir', ABSPATH . WPINC . '/images/media' )
	* @Reference wp-includes\media.php apply_filters( 'icon_dir', ABSPATH . WPINC . '/images/media' )
	* @Reference wp-includes\deprecated.php apply_filters( 'icon_dir', get_template_directory() . '/images' )
	*/
	const IconDir = "icon_dir";
	/**
				 * Filters the icon directory URI.
				 *
				 * @since 2.0.0
				 *
				 * @param string $uri Icon directory URI.
				 * @Reference wp-includes\post.php apply_filters( 'icon_dir_uri', includes_url( 'images/media' ) )
	*/
	const IconDirUri = "icon_dir_uri";
	/**
				 * Filters the list of icon directory URIs.
				 *
				 * @since 2.5.0
				 *
				 * @param array $uris List of icon directory URIs.
				 * @Reference wp-includes\post.php apply_filters( 'icon_dirs', array( $icon_dir => $icon_dir_uri ) )
	*/
	const IconDirs = "icon_dirs";
	/**
		 * Filters whether IIS 7+ supports pretty permalinks.
		 *
		 * @since 2.8.0
		 *
		 * @param bool $supports_permalinks Whether IIS7 supports permalinks. Default false.
		 * @Reference wp-includes\functions.php apply_filters( 'iis7_supports_permalinks', $supports_permalinks )
	*/
	const Iis7SupportsPermalinks = "iis7_supports_permalinks";
	/**
			 * Filters the list of rewrite rules formatted for output to a web.config.
			 *
			 * @since 2.8.0
			 *
			 * @param string $rules Rewrite rules formatted for IIS web.config.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'iis7_url_rewrite_rules', $rules )
	*/
	const Iis7UrlRewriteRules = "iis7_url_rewrite_rules";
	/**
		 * Filters the list of blacklisted usernames.
		 *
		 * @since 4.4.0
		 *
		 * @param array $usernames Array of blacklisted usernames.
		 * @Reference wp-includes\user.php apply_filters( 'illegal_user_logins', array() )
	* @Reference wp-admin\includes\user.php apply_filters( 'illegal_user_logins', array() )
	* @Reference wp-includes\ms-functions.php apply_filters( 'illegal_user_logins', array() )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php apply_filters( 'illegal_user_logins', array() )
	* @Reference wp-includes\user.php apply_filters( 'illegal_user_logins', array() )
	*/
	const IllegalUserLogins = "illegal_user_logins";
	/**
		 * Filters the image HTML markup including the caption shortcode.
		 *
		 * @since 2.6.0
		 *
		 * @param string $shcode The image HTML markup with caption shortcode.
		 * @param string $html   The image HTML markup.
		 * @Reference wp-admin\includes\media.php apply_filters( 'image_add_caption_shortcode', $shcode, $html )
	*/
	const ImageAddCaptionShortcode = "image_add_caption_shortcode";
	/**
		 * Filters the caption text.
		 *
		 * Note: If the caption text is empty, the caption shortcode will not be appended
		 * to the image HTML when inserted into the editor.
		 *
		 * Passing an empty value also prevents the {@see 'image_add_caption_shortcode'}
		 * Filters from being evaluated at the end of image_add_caption().
		 *
		 * @since 4.1.0
		 *
		 * @param string $caption The original caption text.
		 * @param int    $id      The attachment ID.
		 * @Reference wp-admin\includes\media.php apply_filters( 'image_add_caption_text', $caption, $id )
	*/
	const ImageAddCaptionText = "image_add_caption_text";
	/**
		 * Filters whether to preempt the output of image_downsize().
		 *
		 * Passing a truthy value to the filter will effectively short-circuit
		 * down-sizing the image, returning that value as output instead.
		 *
		 * @since 2.5.0
		 *
		 * @param bool         $downsize Whether to short-circuit the image downsize. Default false.
		 * @param int          $id       Attachment ID for image.
		 * @param array|string $size     Size of image. Image size or array of width and height values (in that order).
		 *                               Default 'medium'.
		 * @Reference wp-includes\media.php apply_filters( 'image_downsize', false, $id, $size )
	* @Reference wp-includes\media.php apply_filters( 'image_downsize', false, $attachment->ID, $size )
	*/
	const ImageDownsize = "image_downsize";
	/**
			 * Filters the GD image resource before applying changes to the image.
			 *
			 * @since 2.9.0
			 * @deprecated 3.5.0 Use wp_image_editor_before_change instead.
			 *
			 * @param resource $image   GD image resource.
			 * @param array    $changes Array of change operations.
			 * @Reference wp-admin\includes\image-edit.php apply_filters( 'image_edit_before_change', $image, $changes )
	*/
	const ImageEditBeforeChange = "image_edit_before_change";
	/**
				 * Filters default mime type prior to getting the file extension.
				 *
				 * @see wp_get_mime_types()
				 *
				 * @since 3.5.0
				 *
				 * @param string $mime_type Mime type string.
				 * @Reference wp-includes\class-wp-image-editor.php apply_filters( 'image_editor_default_mime_type', $this->default_mime_type )
	*/
	const ImageEditorDefaultMimeType = "image_editor_default_mime_type";
	/**
			 * Filters the WP_Image_Editor instance for the image to be streamed to the browser.
			 *
			 * @since 3.5.0
			 *
			 * @param WP_Image_Editor $image         The image editor instance.
			 * @param int             $attachment_id The attachment post ID.
			 * @Reference wp-admin\includes\image-edit.php apply_filters( 'image_editor_save_pre', $image, $attachment_id )
	* @Reference wp-admin\includes\image-edit.php apply_filters( 'image_editor_save_pre', $image, $post_id )
	*/
	const ImageEditorSavePre = "image_editor_save_pre";
	/**
		 * Filters the output of image_get_intermediate_size()
		 *
		 * @since 4.4.0
		 *
		 * @see image_get_intermediate_size()
		 *
		 * @param array        $data    Array of file relative path, width, and height on success. May also include
		 *                              file absolute path and URL.
		 * @param int          $post_id The post_id of the image attachment
		 * @param string|array $size    Registered image size or flat array of initially-requested height and width
		 *                              dimensions (in that order).
		 * @Reference wp-includes\media.php apply_filters( 'image_get_intermediate_size', $data, $post_id, $size )
	*/
	const ImageGetIntermediateSize = "image_get_intermediate_size";
	/** This filter is documented in wp-includes/class-wp-image-editor-gd.php * @Reference wp-includes\class-wp-image-editor-imagick.php apply_filters( 'image_make_intermediate_size', $filename )
	* @Reference wp-includes\class-wp-image-editor-gd.php apply_filters( 'image_make_intermediate_size', $filename )
	*/
	const ImageMakeIntermediateSize = "image_make_intermediate_size";
	/**
				 * Filters the memory limit allocated for image manipulation.
				 *
				 * @since 3.5.0
				 * @since 4.6.0 The default now takes the original `memory_limit` into account.
				 *
				 * @param int|string $filtered_limit Maximum memory limit to allocate for images.
				 *                                   Default `WP_MAX_MEMORY_LIMIT` or the original
				 *                                   php.ini `memory_limit`, whichever is higher.
				 *                                   Accepts an integer (bytes), or a shorthand string
				 *                                   notation, such as '256M'.
				 * @Reference wp-includes\functions.php apply_filters( 'image_memory_limit', $filtered_limit )
	*/
	const ImageMemoryLimit = "image_memory_limit";
	/**
		 * Filters whether to preempt calculating the image resize dimensions.
		 *
		 * Passing a non-null value to the filter will effectively short-circuit
		 * image_resize_dimensions(), returning that value instead.
		 *
		 * @since 3.4.0
		 *
		 * @param null|mixed $null   Whether to preempt output of the resize dimensions.
		 * @param int        $orig_w Original width in pixels.
		 * @param int        $orig_h Original height in pixels.
		 * @param int        $dest_w New width in pixels.
		 * @param int        $dest_h New height in pixels.
		 * @param bool|array $crop   Whether to crop image to specified width and height or resize.
		 *                           An array can specify positioning of the crop area. Default false.
		 * @Reference wp-includes\media.php apply_filters( 'image_resize_dimensions', null, $orig_w, $orig_h, $dest_w, $dest_h, $crop )
	*/
	const ImageResizeDimensions = "image_resize_dimensions";
	/**
			 * Filters the GD image resource to be streamed to the browser.
			 *
			 * @since 2.9.0
			 * @deprecated 3.5.0 Use image_editor_save_pre instead.
			 *
			 * @param resource $image         Image resource to be streamed.
			 * @param int      $attachment_id The attachment post ID.
			 * @Reference wp-admin\includes\image-edit.php apply_filters( 'image_save_pre', $image, $attachment_id )
	* @Reference wp-admin\includes\image-edit.php apply_filters( 'image_save_pre', $image, $post_id )
	*/
	const ImageSavePre = "image_save_pre";
	/**
		 * Filters the image HTML markup to send to the editor when inserting an image.
		 *
		 * @since 2.5.0
		 *
		 * @param string       $html    The image HTML markup to send.
		 * @param int          $id      The attachment id.
		 * @param string       $caption The image caption.
		 * @param string       $title   The image title.
		 * @param string       $align   The image alignment.
		 * @param string       $url     The image source URL.
		 * @param string|array $size    Size of image. Image size or array of width and height values
		 *                              (in that order). Default 'medium'.
		 * @param string       $alt     The image alternative, or alt, text.
		 * @Reference wp-admin\includes\media.php apply_filters( 'image_send_to_editor', $html, $id, $caption, $title, $align, $url, $size, $alt )
	*/
	const ImageSendToEditor = "image_send_to_editor";
	/**
				 * Filters the image URL sent to the editor.
				 *
				 * @since 2.8.0
				 *
				 * @param string $html  HTML markup sent to the editor for an image.
				 * @param string $src   Image source URL.
				 * @param string $alt   Image alternate, or alt, text.
				 * @param string $align The image alignment. Default 'alignnone'. Possible values include
				 *                      'alignleft', 'aligncenter', 'alignright', 'alignnone'.
				 * @Reference wp-admin\includes\media.php apply_filters( 'image_send_to_editor_url', $html, esc_url_raw( $src ), $alt, $align )
	*/
	const ImageSendToEditorUrl = "image_send_to_editor_url";
	/**
		 * Filters the names and labels of the default image sizes.
		 *
		 * @since 3.3.0
		 *
		 * @param array $size_names Array of image sizes and their names. Default values
		 *                          include 'Thumbnail', 'Medium', 'Large', 'Full Size'.
		 * @Reference wp-admin\includes\media.php apply_filters(		'image_size_names_choose',		array(			'thumbnail' => __( 'Thumbnail' ),			'medium'    => __( 'Medium' ),			'large'     => __( 'Large' ),			'full'      => __( 'Full Size' ),		)	)
	* @Reference wp-includes\media-template.php apply_filters(										'image_size_names_choose',										array(											'thumbnail' => __( 'Thumbnail' ),											'medium'    => __( 'Medium' ),											'large'     => __( 'Large' ),											'full'      => __( 'Full Size' ),										)									)
	* @Reference wp-includes\media-template.php apply_filters(						'image_size_names_choose',						array(							'thumbnail' => __( 'Thumbnail' ),							'medium'    => __( 'Medium' ),							'large'     => __( 'Large' ),							'full'      => __( 'Full Size' ),						)					)
	* @Reference wp-includes\media-template.php apply_filters(					'image_size_names_choose',					array(						'thumbnail' => __( 'Thumbnail' ),						'medium'    => __( 'Medium' ),						'large'     => __( 'Large' ),						'full'      => __( 'Full Size' ),					)				)
	* @Reference wp-admin\includes\class-custom-background.php apply_filters(				'image_size_names_choose',				array(					'thumbnail' => __( 'Thumbnail' ),					'medium'    => __( 'Medium' ),					'large'     => __( 'Large' ),					'full'      => __( 'Full Size' ),				)			)
	* @Reference wp-includes\media.php apply_filters(			'image_size_names_choose',			array(				'thumbnail' => __( 'Thumbnail' ),				'medium'    => __( 'Medium' ),				'large'     => __( 'Large' ),				'full'      => __( 'Full Size' ),			)		)
	* @Reference wp-admin\edit-form-blocks.php apply_filters(	'image_size_names_choose',	array(		'thumbnail' => __( 'Thumbnail' ),		'medium'    => __( 'Medium' ),		'large'     => __( 'Large' ),		'full'      => __( 'Full Size' ),	))
	*/
	const ImageSizeNamesChoose = "image_size_names_choose";
	/**
			 * Filters whether to strip metadata from images when they're resized.
			 *
			 * This filter only applies when resizing using the Imagick editor since GD
			 * always strips profiles by default.
			 *
			 * @since 4.5.0
			 *
			 * @param bool $strip_meta Whether to strip image metadata during resizing. Default true.
			 * @Reference wp-includes\class-wp-image-editor-imagick.php apply_filters( 'image_strip_meta', $strip_meta )
	*/
	const ImageStripMeta = "image_strip_meta";
	/**
		 * Filters the default caption shortcode output.
		 *
		 * If the filtered output isn't empty, it will be used instead of generating
		 * the default caption template.
		 *
		 * @since 2.6.0
		 *
		 * @see img_caption_shortcode()
		 *
		 * @param string $output  The caption output. Default empty.
		 * @param array  $attr    Attributes of the caption shortcode.
		 * @param string $content The image element, possibly wrapped in a hyperlink.
		 * @Reference wp-includes\media.php apply_filters( 'img_caption_shortcode', '', $attr, $content )
	*/
	const ImgCaptionShortcode = "img_caption_shortcode";
	/**
		 * Filters the width of an image's caption.
		 *
		 * By default, the caption is 10 pixels greater than the width of the image,
		 * to prevent post content from running up against a floated image.
		 *
		 * @since 3.7.0
		 *
		 * @see img_caption_shortcode()
		 *
		 * @param int    $width    Width of the caption in pixels. To remove this inline style,
		 *                         return zero.
		 * @param array  $atts     Attributes of the caption shortcode.
		 * @param string $content  The image element, possibly wrapped in a hyperlink.
		 * @Reference wp-includes\media.php apply_filters( 'img_caption_shortcode_width', $width, $atts, $content )
	*/
	const ImgCaptionShortcodeWidth = "img_caption_shortcode_width";
	/**
		 * Filters the maximum allowed upload size for import files.
		 *
		 * @since 2.3.0
		 *
		 * @see wp_max_upload_size()
		 *
		 * @param int $max_upload_size Allowed upload size. Default 1 MB.
		 * @Reference wp-admin\includes\template.php apply_filters( 'import_upload_size_limit', wp_max_upload_size() )
	*/
	const ImportUploadSizeLimit = "import_upload_size_limit";
	/**
		 * Filters the URL to the includes directory.
		 *
		 * @since 2.8.0
		 *
		 * @param string $url  The complete URL to the includes directory including scheme and path.
		 * @param string $path Path relative to the URL to the wp-includes directory. Blank string
		 *                     if no path is specified.
		 * @Reference wp-includes\link-template.php apply_filters( 'includes_url', $url, $path )
	*/
	const IncludesUrl = "includes_url";
	/**
			 * Filters the list of incompatible SQL modes to exclude.
			 *
			 * @since 3.9.0
			 *
			 * @param array $incompatible_modes An array of incompatible modes.
			 * @Reference wp-includes\wp-db.php apply_filters( 'incompatible_sql_modes', $this->incompatible_modes )
	*/
	const IncompatibleSqlModes = "incompatible_sql_modes";
	/**
	* @Reference wp-includes\deprecated.php apply_filters( "index_rel_link", $link )
	*/
	const IndexRelLink = "index_rel_link";
	/**
		 * Filters a user's meta values and keys immediately after the user is created or updated
		 * and before any user meta is inserted or updated.
		 *
		 * Does not include contact methods. These are added using `wp_get_user_contact_methods( $user )`.
		 *
		 * @since 4.4.0
		 *
		 * @param array $meta {
		 *     Default meta values and keys for the user.
		 *
		 *     @type string   $nickname             The user's nickname. Default is the user's username.
		 *     @type string   $first_name           The user's first name.
		 *     @type string   $last_name            The user's last name.
		 *     @type string   $description          The user's description.
		 *     @type bool     $rich_editing         Whether to enable the rich-editor for the user. False if not empty.
		 *     @type bool     $syntax_highlighting  Whether to enable the rich code editor for the user. False if not empty.
		 *     @type bool     $comment_shortcuts    Whether to enable keyboard shortcuts for the user. Default false.
		 *     @type string   $admin_color          The color scheme for a user's admin screen. Default 'fresh'.
		 *     @type int|bool $use_ssl              Whether to force SSL on the user's admin area. 0|false if SSL is
		 *                                          not forced.
		 *     @type bool     $show_admin_bar_front Whether to show the admin bar on the front end for the user.
		 *                                          Default true.
		 *     @type string   $locale               User's locale. Default empty.
		 * }
		 * @param WP_User $user   User object.
		 * @param bool    $update Whether the user is being updated rather than created.
		 * @Reference wp-includes\user.php apply_filters( 'insert_user_meta', $meta, $user, $update )
	*/
	const InsertUserMeta = "insert_user_meta";
	/**
		 * Filters the inline instructions inserted before the dynamically generated content.
		 *
		 * @since 5.3.0
		 *
		 * @param string[] $instructions Array of lines with inline instructions.
		 * @param string   $marker       The marker being inserted.
		 * @Reference wp-admin\includes\misc.php apply_filters( 'insert_with_markers_inline_instructions', $instructions, $marker )
	*/
	const InsertWithMarkersInlineInstructions = "insert_with_markers_inline_instructions";
	/**
			 * Filters the list of action links available following a single plugin installation.
			 *
			 * @since 2.7.0
			 *
			 * @param string[] $install_actions Array of plugin action links.
			 * @param object   $api             Object containing WordPress.org API plugin data. Empty
			 *                                  for non-API installs, such as when a plugin is installed
			 *                                  via upload.
			 * @param string   $plugin_file     Path to the plugin file relative to the plugins directory.
			 * @Reference wp-admin\includes\class-plugin-installer-skin.php apply_filters( 'install_plugin_complete_actions', $install_actions, $this->api, $plugin_file )
	*/
	const InstallPluginCompleteActions = "install_plugin_complete_actions";
	/**
			 * Filters tabs not associated with a menu item on the Plugin Install screen.
			 *
			 * @since 2.7.0
			 *
			 * @param string[] $nonmenu_tabs The tabs that don't have a menu item on the Plugin Install screen.
			 * @Reference wp-admin\includes\class-wp-plugin-install-list-table.php apply_filters( 'install_plugins_nonmenu_tabs', $nonmenu_tabs )
	*/
	const InstallPluginsNonmenuTabs = "install_plugins_nonmenu_tabs";
	/**
			 * Filters the tabs shown on the Plugin Install screen.
			 *
			 * @since 2.7.0
			 *
			 * @param string[] $tabs The tabs shown on the Plugin Install screen. Defaults include 'featured', 'popular',
			 *                      'recommended', 'favorites', and 'upload'.
			 * @Reference wp-admin\includes\class-wp-plugin-install-list-table.php apply_filters( 'install_plugins_tabs', $tabs )
	*/
	const InstallPluginsTabs = "install_plugins_tabs";
	/**
			 * Filters the list of action links available following a single theme installation.
			 *
			 * @since 2.8.0
			 *
			 * @param string[] $install_actions Array of theme action links.
			 * @param object   $api             Object containing WordPress.org API theme data.
			 * @param string   $stylesheet      Theme directory name.
			 * @param WP_Theme $theme_info      Theme object.
			 * @Reference wp-admin\includes\class-theme-installer-skin.php apply_filters( 'install_theme_complete_actions', $install_actions, $this->api, $stylesheet, $theme_info )
	*/
	const InstallThemeCompleteActions = "install_theme_complete_actions";
	/**
			 * Filters tabs not associated with a menu item on the Install Themes screen.
			 *
			 * @since 2.8.0
			 *
			 * @param string[] $nonmenu_tabs The tabs that don't have a menu item on
			 *                               the Install Themes screen.
			 * @Reference wp-admin\includes\class-wp-theme-install-list-table.php apply_filters( 'install_themes_nonmenu_tabs', $nonmenu_tabs )
	*/
	const InstallThemesNonmenuTabs = "install_themes_nonmenu_tabs";
	/**
		 * Filters the tabs shown on the Add Themes screen.
		 *
		 * This filter is for backward compatibility only, for the suppression of the upload tab.
		 *
		 * @since 2.8.0
		 *
		 * @param string[] $tabs Associative array of the tabs shown on the Add Themes screen. Default is 'upload'.
		 * @Reference wp-admin\theme-install.php apply_filters( 'install_themes_tabs', array( 'upload' => __( 'Upload Theme' ) ) )
	* @Reference wp-admin\includes\class-wp-theme-install-list-table.php apply_filters( 'install_themes_tabs', $tabs )
	*/
	const InstallThemesTabs = "install_themes_tabs";
	/**
		 * Filters the list of intermediate image sizes.
		 *
		 * @since 2.5.0
		 *
		 * @param array $default_sizes An array of intermediate image sizes. Defaults
		 *                             are 'thumbnail', 'medium', 'medium_large', 'large'.
		 * @Reference wp-includes\media.php apply_filters( 'intermediate_image_sizes', $default_sizes )
	*/
	const IntermediateImageSizes = "intermediate_image_sizes";
	/**
		 * Filters the image sizes automatically generated when uploading an image.
		 *
		 * @since 2.9.0
		 * @since 4.4.0 Added the `$image_meta` argument.
		 * @since 5.3.0 Added the `$attachment_id` argument.
		 *
		 * @param array $new_sizes     Associative array of image sizes to be created.
		 * @param array $image_meta    The image meta data: width, height, file, sizes, etc.
		 * @param int   $attachment_id The attachment post ID for the image.
		 * @Reference wp-admin\includes\image.php apply_filters( 'intermediate_image_sizes_advanced', $new_sizes, $image_meta, $attachment_id )
	*/
	const IntermediateImageSizesAdvanced = "intermediate_image_sizes_advanced";
	/**
		 * Filters whether a dynamic sidebar is considered "active".
		 *
		 * @since 3.9.0
		 *
		 * @param bool       $is_active_sidebar Whether or not the sidebar should be considered "active".
		 *                                      In other words, whether the sidebar contains any widgets.
		 * @param int|string $index             Index, name, or ID of the dynamic sidebar.
		 * @Reference wp-includes\widgets.php apply_filters( 'is_active_sidebar', $is_active_sidebar, $index )
	*/
	const IsActiveSidebar = "is_active_sidebar";
	/**
			 * Filters whether an email address is valid.
			 *
			 * This filter is evaluated under several different contexts, such as 'email_too_short',
			 * 'email_no_at', 'local_invalid_chars', 'domain_period_sequence', 'domain_period_limits',
			 * 'domain_no_periods', 'sub_hyphen_limits', 'sub_invalid_chars', or no specific context.
			 *
			 * @since 2.8.0
			 *
			 * @param string|false $is_email The email address if successfully passed the is_email() checks, false otherwise.
			 * @param string       $email    The email address being checked.
			 * @param string       $context  Context under which the email was tested.
			 * @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'email_too_short' )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', $email, $email, null )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'domain_no_periods' )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'domain_period_limits' )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'domain_period_sequence' )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'email_no_at' )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'local_invalid_chars' )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'sub_hyphen_limits' )
	* @Reference wp-includes\formatting.php apply_filters( 'is_email', false, $email, 'sub_invalid_chars' )
	*/
	const IsEmail = "is_email";
	/**
		 * Filters whether an email address is unsafe.
		 *
		 * @since 3.5.0
		 *
		 * @param bool   $is_email_address_unsafe Whether the email address is "unsafe". Default false.
		 * @param string $user_email              User email address.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'is_email_address_unsafe', $is_email_address_unsafe, $user_email )
	*/
	const IsEmailAddressUnsafe = "is_email_address_unsafe";
	/**
		 * Modify whether the custom header video is eligible to show on the current page.
		 *
		 * @since 4.7.0
		 *
		 * @param bool $show_video Whether the custom header video should be shown. Returns the value
		 *                         of the theme setting for the `custom-header`'s `video-active-callback`.
		 *                         If no callback is set, the default value is that of `is_front_page()`.
		 * @Reference wp-includes\theme.php apply_filters( 'is_header_video_active', $show_video )
	*/
	const IsHeaderVideoActive = "is_header_video_active";
	/**
		 * Filters whether the site has more than one author with published posts.
		 *
		 * @since 3.2.0
		 *
		 * @param bool $is_multi_author Whether $is_multi_author should evaluate as true.
		 * @Reference wp-includes\author-template.php apply_filters( 'is_multi_author', (bool) $is_multi_author )
	*/
	const IsMultiAuthor = "is_multi_author";
	/**
		 * Filters whether the current request is against a protected endpoint.
		 *
		 * This filter is only fired when an endpoint is requested which is not already protected by
		 * WordPress core. As such, it exclusively allows providing further protected endpoints in
		 * addition to the admin backend, login pages and protected AJAX actions.
		 *
		 * @since 5.2.0
		 *
		 * @param bool $is_protected_endpoint Whether the currently requested endpoint is protected. Default false.
		 * @Reference wp-includes\load.php apply_filters( 'is_protected_endpoint', false )
	*/
	const IsProtectedEndpoint = "is_protected_endpoint";
	/**
		 * Filters whether a meta key is considered protected.
		 *
		 * @since 3.2.0
		 *
		 * @param bool        $protected Whether the key is considered protected.
		 * @param string      $meta_key  Meta key.
		 * @param string|null $meta_type Type of object metadata is for (e.g., comment, post, term, or user).
		 * @Reference wp-includes\meta.php apply_filters( 'is_protected_meta', $protected, $meta_key, $meta_type )
	*/
	const IsProtectedMeta = "is_protected_meta";
	/**
		 * Filters whether a post is sticky.
		 *
		 * @since 5.3.0
		 *
		 * @param bool $is_sticky Whether a post is sticky.
		 * @param int  $post_id   Post ID.
		 * @Reference wp-includes\post.php apply_filters( 'is_sticky', $is_sticky, $post_id )
	*/
	const IsSticky = "is_sticky";
	/**
			 * Filters whether the given widget is considered "wide".
			 *
			 * @since 3.9.0
			 *
			 * @param bool   $is_wide   Whether the widget is wide, Default false.
			 * @param string $widget_id Widget ID.
			 * @Reference wp-includes\class-wp-customize-widgets.php apply_filters( 'is_wide_widget_in_customizer', $is_wide, $widget_id )
	*/
	const IsWideWidgetInCustomizer = "is_wide_widget_in_customizer";
	/**
					 * Filters the JPEG compression quality for backward-compatibility.
					 *
					 * Applies only during initial editor instantiation, or when set_quality() is run
					 * manually without the `$quality` argument.
					 *
					 * set_quality() has priority over the filter.
					 *
					 * The filter is evaluated under two contexts: 'image_resize', and 'edit_image',
					 * (when a JPEG image is saved to file).
					 *
					 * @since 2.5.0
					 *
					 * @param int    $quality Quality level between 0 (low) and 100 (high) of the JPEG.
					 * @param string $context Context of the filter.
					 * @Reference wp-includes\class-wp-image-editor.php apply_filters( 'jpeg_quality', $quality, 'image_resize' )
	* @Reference wp-admin\includes\image-edit.php apply_filters( 'jpeg_quality', 90, 'edit_image' )
	*/
	const JpegQuality = "jpeg_quality";
	/**
		 * Filters a string cleaned and escaped for output in JavaScript.
		 *
		 * Text passed to esc_js() is stripped of invalid or special characters,
		 * and properly slashed for output.
		 *
		 * @since 2.0.6
		 *
		 * @param string $safe_text The text after it has been escaped.
		 * @param string $text      The text prior to being escaped.
		 * @Reference wp-includes\formatting.php apply_filters( 'js_escape', $safe_text, $text )
	*/
	const JsEscape = "js_escape";
	/**
			 * Filters the list of protocols allowed in HTML attributes.
			 *
			 * @since 3.0.0
			 *
			 * @param array $protocols Array of allowed protocols e.g. 'http', 'ftp', 'tel', and more.
			 * @Reference wp-includes\functions.php apply_filters( 'kses_allowed_protocols', $protocols )
	*/
	const KsesAllowedProtocols = "kses_allowed_protocols";
	/**
		 * Filters the language codes.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string[] $lang_codes Array of key/value pairs of language codes where key is the short version.
		 * @param string   $code       A two-letter designation of the language.
		 * @Reference wp-admin\includes\ms.php apply_filters( 'lang_codes', $lang_codes, $code )
	*/
	const LangCodes = "lang_codes";
	/**
		 * Filters the language attributes for display in the html tag.
		 *
		 * @since 2.5.0
		 * @since 4.3.0 Added the `$doctype` parameter.
		 *
		 * @param string $output A space-separated list of language attributes.
		 * @param string $doctype The type of html document (xhtml|html).
		 * @Reference wp-includes\general-template.php apply_filters( 'language_attributes', $output, $doctype )
	*/
	const LanguageAttributes = "language_attributes";
	/**
				 * Filters the category name.
				 *
				 * @since 2.2.0
				 *
				 * @param string $cat_name The category name.
				 * @Reference wp-includes\bookmark-template.php apply_filters( 'link_category', $cat->name )
	* @Reference wp-links-opml.php apply_filters( 'link_category', $cat->name )
	* @Reference wp-includes\deprecated.php apply_filters('link_category', $cat->name )
	*/
	const LinkCategory = "link_category";
	/**
			 * Filters the OPML outline link title text.
			 *
			 * @since 2.2.0
			 *
			 * @param string $title The OPML outline title text.
			 * @Reference wp-links-opml.php apply_filters( 'link_title', $bookmark->link_name )
	*/
	const LinkTitle = "link_title";
	/**
			 * Filters a taxonomy drop-down display element.
			 *
			 * A variety of taxonomy drop-down display elements can be modified
			 * just prior to display via this filter. Filterable arguments include
			 * 'show_option_none', 'show_option_all', and various forms of the
			 * term name.
			 *
			 * @since 1.2.0
			 *
			 * @see wp_dropdown_categories()
			 *
			 * @param string       $element  Category name.
			 * @param WP_Term|null $category The category object, or null if there's no corresponding category.
			 * @Reference wp-includes\category-template.php apply_filters( 'list_cats', $parsed_args['show_option_none'], null )
	* @Reference wp-includes\class-walker-category-dropdown.php apply_filters( 'list_cats', $category->name, $category )
	* @Reference wp-includes\category-template.php apply_filters( 'list_cats', $parsed_args['show_option_all'], null )
	* @Reference wp-includes\category-template.php apply_filters( 'list_cats', $parsed_args['show_option_none'], null )
	* @Reference wp-includes\class-walker-category.php apply_filters( 'list_cats', esc_attr( $category->name ), $category )
	*/
	const ListCats = "list_cats";
	/**
			 * Filters the page title when creating an HTML drop-down list of pages.
			 *
			 * @since 3.1.0
			 *
			 * @param string  $title Page title.
			 * @param WP_Post $page  Page data object.
			 * @Reference wp-includes\class-walker-page-dropdown.php apply_filters( 'list_pages', $title, $page )
	*/
	const ListPages = "list_pages";
	/**
			 * Filters the name of the primary column for the current list table.
			 *
			 * @since 4.3.0
			 *
			 * @param string $default Column name default for the specific list table, e.g. 'name'.
			 * @param string $context Screen ID for specific list table, e.g. 'plugins'.
			 * @Reference wp-admin\includes\class-wp-list-table.php apply_filters( 'list_table_primary_column', $default, $this->screen->id )
	*/
	const ListTablePrimaryColumn = "list_table_primary_column";
	/**
			 * Filters the terms to exclude from the terms query.
			 *
			 * @since 2.3.0
			 *
			 * @param string   $exclusions `NOT IN` clause of the terms query.
			 * @param array    $args       An array of terms query arguments.
			 * @param string[] $taxonomies An array of taxonomy names.
			 * @Reference wp-includes\class-wp-term-query.php apply_filters( 'list_terms_exclusions', $exclusions, $args, $taxonomies )
	*/
	const ListTermsExclusions = "list_terms_exclusions";
	/**
		 * Filters whether to load the default embed handlers.
		 *
		 * Returning a falsey value will prevent loading the default embed handlers.
		 *
		 * @since 2.9.0
		 *
		 * @param bool $maybe_load_embeds Whether to load the embeds library. Default true.
		 * @Reference wp-includes\embed.php apply_filters( 'load_default_embeds', true )
	*/
	const LoadDefaultEmbeds = "load_default_embeds";
	/**
		 * Filters whether to load the Widgets library.
		 *
		 * Passing a falsey value to the filter will effectively short-circuit
		 * the Widgets library from loading.
		 *
		 * @since 2.8.0
		 *
		 * @param bool $wp_maybe_load_widgets Whether to load the Widgets library.
		 *                                    Default true.
		 * @Reference wp-includes\functions.php apply_filters( 'load_default_widgets', true )
	*/
	const LoadDefaultWidgets = "load_default_widgets";
	/**
			 * Filters the current image being loaded for editing.
			 *
			 * @since 2.9.0
			 *
			 * @param resource $image         Current image.
			 * @param string   $attachment_id Attachment ID.
			 * @param string   $size          Image size.
			 * @Reference wp-admin\includes\image.php apply_filters( 'load_image_to_edit', $image, $attachment_id, $size )
	*/
	const LoadImageToEdit = "load_image_to_edit";
	/**
			 * Filters the image URL if not in the local filesystem.
			 *
			 * The filter is only evaluated if fopen is enabled on the server.
			 *
			 * @since 3.1.0
			 *
			 * @param string $image_url     Current image URL.
			 * @param string $attachment_id Attachment ID.
			 * @param string $size          Size of the image.
			 * @Reference wp-admin\includes\image.php apply_filters( 'load_image_to_edit_attachmenturl', wp_get_attachment_url( $attachment_id ), $attachment_id, $size )
	*/
	const LoadImageToEditAttachmenturl = "load_image_to_edit_attachmenturl";
	/**
					 * Filters the path to the current image.
					 *
					 * The filter is evaluated for all image sizes except 'full'.
					 *
					 * @since 3.1.0
					 *
					 * @param string $path          Path to the current image.
					 * @param string $attachment_id Attachment ID.
					 * @param string $size          Size of the image.
					 * @Reference wp-admin\includes\image.php apply_filters( 'load_image_to_edit_filesystempath', $filepath, $attachment_id, $size )
	*/
	const LoadImageToEditFilesystempath = "load_image_to_edit_filesystempath";
	/**
		 * Filters the returned path or URL of the current image.
		 *
		 * @since 2.9.0
		 *
		 * @param string|bool $filepath      File path or URL to current image, or false.
		 * @param string      $attachment_id Attachment ID.
		 * @param string      $size          Size of the image.
		 * @Reference wp-admin\includes\image.php apply_filters( 'load_image_to_edit_path', $filepath, $attachment_id, $size )
	*/
	const LoadImageToEditPath = "load_image_to_edit_path";
	/**
		 * Filters the relative path of scripts used for finding translation files.
		 *
		 * @since 5.0.2
		 *
		 * @param string $relative The relative path of the script. False if it could not be determined.
		 * @param string $src      The full source url of the script.
		 * @Reference wp-includes\l10n.php apply_filters( 'load_script_textdomain_relative_path', $relative, $src )
	*/
	const LoadScriptTextdomainRelativePath = "load_script_textdomain_relative_path";
	/**
		 * Filters the file path for loading script translations for the given script handle and text domain.
		 *
		 * @since 5.0.2
		 *
		 * @param string|false $file   Path to the translation file to load. False if there isn't one.
		 * @param string       $handle Name of the script to register a translation domain to.
		 * @param string       $domain The text domain.
		 * @Reference wp-includes\l10n.php apply_filters( 'load_script_translation_file', $file, $handle, $domain )
	*/
	const LoadScriptTranslationFile = "load_script_translation_file";
	/**
		 * Filters script translations for the given file, script handle and text domain.
		 *
		 * @since 5.0.2
		 *
		 * @param string $translations JSON-encoded translation data.
		 * @param string $file         Path to the translation file that was loaded.
		 * @param string $handle       Name of the script to register a translation domain to.
		 * @param string $domain       The text domain.
		 * @Reference wp-includes\l10n.php apply_filters( 'load_script_translations', $translations, $file, $handle, $domain )
	*/
	const LoadScriptTranslations = "load_script_translations";
	/**
		 * Filters MO file path for loading translations for a specific text domain.
		 *
		 * @since 2.9.0
		 *
		 * @param string $mofile Path to the MO file.
		 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'load_textdomain_mofile', $mofile, $domain )
	*/
	const LoadTextdomainMofile = "load_textdomain_mofile";
	/**
			 * Filters the locale ID of the WordPress installation.
			 *
			 * @since 1.5.0
			 *
			 * @param string $locale The locale ID.
			 * @Reference wp-includes\l10n.php apply_filters( 'locale', $locale )
	* @Reference wp-includes\l10n.php apply_filters( 'locale', $locale )
	*/
	const Locale = "locale";
	/**
		 * Filters the localized stylesheet URI.
		 *
		 * @since 2.1.0
		 *
		 * @param string $stylesheet_uri     Localized stylesheet URI.
		 * @param string $stylesheet_dir_uri Stylesheet directory URI.
		 * @Reference wp-includes\theme.php apply_filters( 'locale_stylesheet_uri', $stylesheet_uri, $stylesheet_dir_uri )
	*/
	const LocaleStylesheetUri = "locale_stylesheet_uri";
	/**
			 * Filters the custom query data being logged.
			 *
			 * Caution should be used when modifying any of this data, it is recommended that any additional
			 * information you need to store about a query be added as a new associative entry to the fourth
			 * element $query_data.
			 *
			 * @since 5.3.0
			 *
			 * @param array  $query_data      Custom query data.
			 * @param string $query           The query's SQL.
			 * @param float  $query_time      Total time spent on the query, in seconds.
			 * @param string $query_callstack Comma separated list of the calling functions.
			 * @param float  $query_start     Unix timestamp of the time at the start of the query.
			 * @Reference wp-includes\wp-db.php apply_filters( 'log_query_custom_data', $query_data, $query, $query_time, $query_callstack, $query_start )
	*/
	const LogQueryCustomData = "log_query_custom_data";
	/**
		 * Filters the login page body classes.
		 *
		 * @since 3.5.0
		 *
		 * @param array  $classes An array of body classes.
		 * @param string $action  The action that brought the visitor to the login page.
		 * @Reference wp-login.php apply_filters( 'login_body_class', $classes, $action )
	*/
	const LoginBodyClass = "login_body_class";
	/**
				 * Filters the error messages displayed above the login form.
				 *
				 * @since 2.1.0
				 *
				 * @param string $errors Login error message.
				 * @Reference wp-login.php apply_filters( 'login_errors', $errors )
	*/
	const LoginErrors = "login_errors";
	/**
		 * Filters content to display at the bottom of the login form.
		 *
		 * The filter evaluates just preceding the closing form tag element.
		 *
		 * @since 3.0.0
		 *
		 * @param string $content Content to display. Default empty.
		 * @param array  $args    Array of login form arguments.
		 * @Reference wp-includes\general-template.php apply_filters( 'login_form_bottom', '', $args )
	*/
	const LoginFormBottom = "login_form_bottom";
	/**
		 * Filters the default login form output arguments.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_login_form()
		 *
		 * @param array $defaults An array of default login form arguments.
		 * @Reference wp-includes\general-template.php apply_filters( 'login_form_defaults', $defaults )
	*/
	const LoginFormDefaults = "login_form_defaults";
	/**
		 * Filters content to display in the middle of the login form.
		 *
		 * The filter evaluates just following the location where the 'login-password'
		 * field is displayed.
		 *
		 * @since 3.0.0
		 *
		 * @param string $content Content to display. Default empty.
		 * @param array  $args    Array of login form arguments.
		 * @Reference wp-includes\general-template.php apply_filters( 'login_form_middle', '', $args )
	*/
	const LoginFormMiddle = "login_form_middle";
	/**
		 * Filters content to display at the top of the login form.
		 *
		 * The filter evaluates just following the opening form tag element.
		 *
		 * @since 3.0.0
		 *
		 * @param string $content Content to display. Default empty.
		 * @param array  $args    Array of login form arguments.
		 * @Reference wp-includes\general-template.php apply_filters( 'login_form_top', '', $args )
	*/
	const LoginFormTop = "login_form_top";
	/**
		 * Filters the link text of the header logo above the login form.
		 *
		 * @since 5.2.0
		 *
		 * @param string $login_header_text The login header logo link text.
		 * @Reference wp-login.php apply_filters( 'login_headertext', $login_header_text )
	*/
	const LoginHeadertext = "login_headertext";
	/**
		 * Filters the title attribute of the header logo above login form.
		 *
		 * @since 2.1.0
		 * @deprecated 5.2.0 Use login_headertext
		 *
		 * @param string $login_header_title Login header logo title attribute.
		 * @Reference wp-login.php apply_filters(		'login_headertitle',		array( $login_header_title ),		'5.2.0',		'login_headertext',		__( 'Usage of the title attribute on the login logo is not recommended for accessibility reasons. Use the link text instead.' )	)
	*/
	const LoginHeadertitle = "login_headertitle";
	/**
		 * Filters link URL of the header logo above login form.
		 *
		 * @since 2.1.0
		 *
		 * @param string $login_header_url Login header logo URL.
		 * @Reference wp-login.php apply_filters( 'login_headerurl', $login_header_url )
	*/
	const LoginHeaderurl = "login_headerurl";
	/**
	 * Filters the separator used between login form navigation links.
	 *
	 * @since 4.9.0
	 *
	 * @param string $login_link_separator The separator used between login form navigation links.
	 * @Reference wp-login.php apply_filters( 'login_link_separator', ' | ' )
	*/
	const LoginLinkSeparator = "login_link_separator";
	/**
		 * Filters the message to display above the login form.
		 *
		 * @since 2.1.0
		 *
		 * @param string $message Login message text.
		 * @Reference wp-login.php apply_filters( 'login_message', $message )
	*/
	const LoginMessage = "login_message";
	/**
				 * Filters instructional messages displayed above the login form.
				 *
				 * @since 2.5.0
				 *
				 * @param string $messages Login messages.
				 * @Reference wp-login.php apply_filters( 'login_messages', $messages )
	*/
	const LoginMessages = "login_messages";
	/**
			 * Filters the login redirect URL.
			 *
			 * @since 3.0.0
			 *
			 * @param string           $redirect_to           The redirect destination URL.
			 * @param string           $requested_redirect_to The requested redirect destination URL passed as a parameter.
			 * @param WP_User|WP_Error $user                  WP_User object if login was successful, WP_Error object otherwise.
			 * @Reference wp-login.php apply_filters( 'login_redirect', $redirect_to, $requested_redirect_to, $user )
	*/
	const LoginRedirect = "login_redirect";
	/**
		 * Filters the title tag content for login page.
		 *
		 * @since 4.9.0
		 *
		 * @param string $login_title The page title, with extra context added.
		 * @param string $title       The original page title.
		 * @Reference wp-login.php apply_filters( 'login_title', $login_title, $title )
	*/
	const LoginTitle = "login_title";
	/**
		 * Filters the login URL.
		 *
		 * @since 2.8.0
		 * @since 4.2.0 The `$force_reauth` parameter was added.
		 *
		 * @param string $login_url    The login URL. Not HTML-encoded.
		 * @param string $redirect     The path to redirect to on login, if supplied.
		 * @param bool   $force_reauth Whether to force reauthorization, even if a cookie is present.
		 * @Reference wp-includes\general-template.php apply_filters( 'login_url', $login_url, $redirect, $force_reauth )
	*/
	const LoginUrl = "login_url";
	/**
			 * Filters the HTML output for the Log In/Log Out link.
			 *
			 * @since 1.5.0
			 *
			 * @param string $link The HTML link content.
			 * @Reference wp-includes\general-template.php apply_filters( 'loginout', $link )
	* @Reference wp-includes\general-template.php apply_filters( 'loginout', $link )
	*/
	const Loginout = "loginout";
	/**
			 * Filters the log out redirect URL.
			 *
			 * @since 4.2.0
			 *
			 * @param string  $redirect_to           The redirect destination URL.
			 * @param string  $requested_redirect_to The requested redirect destination URL passed as a parameter.
			 * @param WP_User $user                  The WP_User object for the user that's logging out.
			 * @Reference wp-login.php apply_filters( 'logout_redirect', $redirect_to, $requested_redirect_to, $user )
	*/
	const LogoutRedirect = "logout_redirect";
	/**
		 * Filters the logout URL.
		 *
		 * @since 2.8.0
		 *
		 * @param string $logout_url The HTML-encoded logout URL.
		 * @param string $redirect   Path to redirect to on logout.
		 * @Reference wp-includes\general-template.php apply_filters( 'logout_url', $logout_url, $redirect )
	*/
	const LogoutUrl = "logout_url";
	/**
			 * Filters the URL redirected to after submitting the lostpassword/retrievepassword form.
			 *
			 * @since 3.0.0
			 *
			 * @param string $lostpassword_redirect The redirect destination URL.
			 * @Reference wp-login.php apply_filters( 'lostpassword_redirect', $lostpassword_redirect )
	*/
	const LostpasswordRedirect = "lostpassword_redirect";
	/**
		 * Filters the Lost Password URL.
		 *
		 * @since 2.8.0
		 *
		 * @param string $lostpassword_url The lost password page URL.
		 * @param string $redirect         The path to redirect to on login.
		 * @Reference wp-includes\general-template.php apply_filters( 'lostpassword_url', $lostpassword_url, $redirect )
	*/
	const LostpasswordUrl = "lostpassword_url";
	/**
		 * Filters the rel value that is added to URL matches converted to links.
		 *
		 * @since 5.3.0
		 *
		 * @param string $rel The rel value.
		 * @param string $url The matched URL being converted to a link tag.
		 * @Reference wp-includes\formatting.php apply_filters( 'make_clickable_rel', $rel, $url )
	* @Reference wp-includes\formatting.php apply_filters( 'make_clickable_rel', $rel, $dest )
	*/
	const MakeClickableRel = "make_clickable_rel";
	/**
			 * Filters the Media list table columns.
			 *
			 * @since 2.5.0
			 *
			 * @param string[] $posts_columns An array of columns displayed in the Media list table.
			 * @param bool     $detached      Whether the list table contains media not attached
			 *                                to any posts. Default true.
			 * @Reference wp-admin\includes\class-wp-media-list-table.php apply_filters( 'manage_media_columns', $posts_columns, $this->detached )
	*/
	const ManageMediaColumns = "manage_media_columns";
	/**
				 * Filters the columns displayed in the Pages list table.
				 *
				 * @since 2.5.0
				 *
				 * @param string[] $post_columns An associative array of column headings.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'manage_pages_columns', $posts_columns )
	*/
	const ManagePagesColumns = "manage_pages_columns";
	/**
				 * Filters the columns displayed in the Posts list table.
				 *
				 * @since 1.5.0
				 *
				 * @param string[] $post_columns An associative array of column headings.
				 * @param string   $post_type    The post type slug.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'manage_posts_columns', $posts_columns, $post_type )
	*/
	const ManagePostsColumns = "manage_posts_columns";
	/**
			 * Filters the action links displayed for each site in the Sites list table.
			 *
			 * The 'Edit', 'Dashboard', 'Delete', and 'Visit' links are displayed by
			 * default for each site. The site's status determines whether to show the
			 * 'Activate' or 'Deactivate' link, 'Unarchive' or 'Archive' links, and
			 * 'Not Spam' or 'Spam' link for each site.
			 *
			 * @since 3.1.0
			 *
			 * @param string[] $actions  An array of action links to be displayed.
			 * @param int      $blog_id  The site ID.
			 * @param string   $blogname Site path, formatted depending on whether it is a sub-domain
			 *                           or subdirectory multisite installation.
			 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php apply_filters( 'manage_sites_action_links', array_filter( $actions ), $blog['blog_id'], $blogname )
	*/
	const ManageSitesActionLinks = "manage_sites_action_links";
	/**
			 * Filters the taxonomy columns for attachments in the Media list table.
			 *
			 * @since 3.5.0
			 *
			 * @param string[] $taxonomies An array of registered taxonomy names to show for attachments.
			 * @param string   $post_type  The post type. Default 'attachment'.
			 * @Reference wp-admin\includes\class-wp-media-list-table.php apply_filters( 'manage_taxonomies_for_attachment_columns', $taxonomies, 'attachment' )
	*/
	const ManageTaxonomiesForAttachmentColumns = "manage_taxonomies_for_attachment_columns";
	/**
							 * Filters the display output of custom columns in the Users list table.
							 *
							 * @since 2.8.0
							 *
							 * @param string $output      Custom column output. Default empty.
							 * @param string $column_name Column name.
							 * @param int    $user_id     ID of the currently-listed user.
							 * @Reference wp-admin\includes\class-wp-users-list-table.php apply_filters( 'manage_users_custom_column', '', $column_name, $user_object->ID )
	* @Reference wp-admin\includes\class-wp-ms-users-list-table.php apply_filters( 'manage_users_custom_column', '', $column_name, $user->ID )
	*/
	const ManageUsersCustomColumn = "manage_users_custom_column";
	/**
		 * Filters a user's capabilities depending on specific context and/or privilege.
		 *
		 * @since 2.8.0
		 *
		 * @param string[] $caps    Array of the user's capabilities.
		 * @param string   $cap     Capability name.
		 * @param int      $user_id The user ID.
		 * @param array    $args    Adds the context to the cap. Typically the object ID.
		 * @Reference wp-includes\capabilities.php apply_filters( 'map_meta_cap', $caps, $cap, $user_id, $args )
	*/
	const MapMetaCap = "map_meta_cap";
	/**
		 * Filters the maximum image width to be included in a 'srcset' attribute.
		 *
		 * @since 4.4.0
		 *
		 * @param int   $max_width  The maximum image width to be included in the 'srcset'. Default '2048'.
		 * @param array $size_array Array of width and height values in pixels (in that order).
		 * @Reference wp-includes\media.php apply_filters( 'max_srcset_image_width', 2048, $size_array )
	*/
	const MaxSrcsetImageWidth = "max_srcset_image_width";
	/**
					 * Filters the first-row list of TinyMCE buttons (Visual tab).
					 *
					 * @since 2.0.0
					 *
					 * @param array  $buttons   First-row list of buttons.
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'mce_buttons', $mce_buttons, $editor_id )
	* @Reference wp-includes\script-loader.php apply_filters( 'mce_buttons', $toolbar1, 'classic-block' )
	*/
	const MceButtons = "mce_buttons";
	/**
					 * Filters the second-row list of TinyMCE buttons (Visual tab).
					 *
					 * @since 2.0.0
					 *
					 * @param array  $buttons   Second-row list of buttons.
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'mce_buttons_2', $mce_buttons_2, $editor_id )
	* @Reference wp-includes\script-loader.php apply_filters( 'mce_buttons_2', $toolbar2, 'classic-block' )
	*/
	const MceButtons2 = "mce_buttons_2";
	/**
					 * Filters the third-row list of TinyMCE buttons (Visual tab).
					 *
					 * @since 2.0.0
					 *
					 * @param array  $buttons   Third-row list of buttons.
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'mce_buttons_3', array(), $editor_id )
	* @Reference wp-includes\script-loader.php apply_filters( 'mce_buttons_3', array(), 'classic-block' )
	*/
	const MceButtons3 = "mce_buttons_3";
	/**
					 * Filters the fourth-row list of TinyMCE buttons (Visual tab).
					 *
					 * @since 2.5.0
					 *
					 * @param array  $buttons   Fourth-row list of buttons.
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'mce_buttons_4', array(), $editor_id )
	* @Reference wp-includes\script-loader.php apply_filters( 'mce_buttons_4', array(), 'classic-block' )
	*/
	const MceButtons4 = "mce_buttons_4";
	/**
					 * Filters the comma-delimited list of stylesheets to load in TinyMCE.
					 *
					 * @since 2.1.0
					 *
					 * @param string $stylesheets Comma-delimited list of stylesheets.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'mce_css', $mce_css )
	*/
	const MceCss = "mce_css";
	/**
							 * Filters the translations loaded for external TinyMCE 3.x plugins.
							 *
							 * The filter takes an associative array ('plugin_name' => 'path')
							 * where 'path' is the include path to the file.
							 *
							 * The language file should follow the same format as wp_mce_translation(),
							 * and should define a variable ($strings) that holds all translated strings.
							 *
							 * @since 2.5.0
							 *
							 * @param array $translations Translations for external TinyMCE plugins.
							 * @Reference wp-includes\class-wp-editor.php apply_filters( 'mce_external_languages', array() )
	*/
	const MceExternalLanguages = "mce_external_languages";
	/**
						 * Filters the list of TinyMCE external plugins.
						 *
						 * The filter takes an associative array of external plugins for
						 * TinyMCE in the form 'plugin_name' => 'url'.
						 *
						 * The url should be absolute, and should include the js filename
						 * to be loaded. For example:
						 * 'myplugin' => 'http://mysite.com/wp-content/plugins/myfolder/mce_plugin.js'.
						 *
						 * If the external plugin adds a button, it should be added with
						 * one of the 'mce_buttons' filters.
						 *
						 * @since 2.5.0
						 *
						 * @param array $external_plugins An array of external TinyMCE plugins.
						 * @Reference wp-includes\class-wp-editor.php apply_filters( 'mce_external_plugins', array() )
	* @Reference wp-includes\script-loader.php apply_filters( 'mce_external_plugins', array(), 'classic-block' )
	*/
	const MceExternalPlugins = "mce_external_plugins";
	/**
		 * Filters the legacy (pre-3.5.0) media buttons.
		 *
		 * Use {@see 'media_buttons'} action instead.
		 *
		 * @since 2.5.0
		 * @deprecated 3.5.0 Use {@see 'media_buttons'} action instead.
		 *
		 * @param string $string Media buttons context. Default empty.
		 * @Reference wp-admin\includes\media.php apply_filters( 'media_buttons_context', '' )
	*/
	const MediaButtonsContext = "media_buttons_context";
	/**
		 * Filters the embedded media types that are allowed to be returned from the content blob.
		 *
		 * @since 4.2.0
		 *
		 * @param array $allowed_media_types An array of allowed media types. Default media types are
		 *                                   'audio', 'video', 'object', 'embed', and 'iframe'.
		 * @Reference wp-includes\media.php apply_filters( 'media_embedded_in_content_allowed_types', array( 'audio', 'video', 'object', 'embed', 'iframe' ) )
	*/
	const MediaEmbeddedInContentAllowedTypes = "media_embedded_in_content_allowed_types";
	/**
		 * Allows overriding the list of months displayed in the media library.
		 *
		 * By default (if this filter does not return an array), a query will be
		 * run to determine the months that have media items.  This query can be
		 * expensive for large media libraries, so it may be desirable for sites to
		 * override this behavior.
		 *
		 * @since 4.7.4
		 *
		 * @link https://core.trac.wordpress.org/ticket/31071
		 *
		 * @param array|null An array of objects with `month` and `year`
		 *                   properties, or `null` (or any other non-array value)
		 *                   for default behavior.
		 * @Reference wp-includes\media.php apply_filters( 'media_library_months_with_files', null )
	*/
	const MediaLibraryMonthsWithFiles = "media_library_months_with_files";
	/**
		 * Allows showing or hiding the "Create Audio Playlist" button in the media library.
		 *
		 * By default, the "Create Audio Playlist" button will always be shown in
		 * the media library.  If this filter returns `null`, a query will be run
		 * to determine whether the media library contains any audio items.  This
		 * was the default behavior prior to version 4.8.0, but this query is
		 * expensive for large media libraries.
		 *
		 * @since 4.7.4
		 * @since 4.8.0 The filter's default value is `true` rather than `null`.
		 *
		 * @link https://core.trac.wordpress.org/ticket/31071
		 *
		 * @param bool|null Whether to show the button, or `null` to decide based
		 *                  on whether any audio files exist in the media library.
		 * @Reference wp-includes\media.php apply_filters( 'media_library_show_audio_playlist', true )
	*/
	const MediaLibraryShowAudioPlaylist = "media_library_show_audio_playlist";
	/**
		 * Allows showing or hiding the "Create Video Playlist" button in the media library.
		 *
		 * By default, the "Create Video Playlist" button will always be shown in
		 * the media library.  If this filter returns `null`, a query will be run
		 * to determine whether the media library contains any video items.  This
		 * was the default behavior prior to version 4.8.0, but this query is
		 * expensive for large media libraries.
		 *
		 * @since 4.7.4
		 * @since 4.8.0 The filter's default value is `true` rather than `null`.
		 *
		 * @link https://core.trac.wordpress.org/ticket/31071
		 *
		 * @param bool|null Whether to show the button, or `null` to decide based
		 *                  on whether any video files exist in the media library.
		 * @Reference wp-includes\media.php apply_filters( 'media_library_show_video_playlist', true )
	*/
	const MediaLibraryShowVideoPlaylist = "media_library_show_video_playlist";
	/**
		 * Filters the media metadata.
		 *
		 * @since 2.5.0
		 *
		 * @param string  $media_dims The HTML markup containing the media dimensions.
		 * @param WP_Post $post       The WP_Post attachment object.
		 * @Reference wp-admin\includes\media.php apply_filters( 'media_meta', $media_dims, $post )
	* @Reference wp-admin\includes\media.php apply_filters( 'media_meta', $media_dims, $post )
	* @Reference wp-admin\includes\media.php apply_filters( 'media_meta', '', $post )
	*/
	const MediaMeta = "media_meta";
	/**
			 * Filters the action links for each attachment in the Media list table.
			 *
			 * @since 2.8.0
			 *
			 * @param string[] $actions  An array of action links for each attachment.
			 *                           Default 'Edit', 'Delete Permanently', 'View'.
			 * @param WP_Post  $post     WP_Post object for the current attachment.
			 * @param bool     $detached Whether the list table contains media not attached
			 *                           to any posts. Default true.
			 * @Reference wp-admin\includes\class-wp-media-list-table.php apply_filters( 'media_row_actions', $actions, $post, $this->detached )
	*/
	const MediaRowActions = "media_row_actions";
	/**
			 * Filters the HTML markup for a media item sent to the editor.
			 *
			 * @since 2.5.0
			 *
			 * @see wp_get_attachment_metadata()
			 *
			 * @param string $html       HTML markup for a media item sent to the editor.
			 * @param int    $send_id    The first key from the $_POST['send'] data.
			 * @param array  $attachment Array of attachment metadata.
			 * @Reference wp-admin\includes\media.php apply_filters( 'media_send_to_editor', $html, $send_id, $attachment )
	* @Reference wp-admin\includes\ajax-actions.php apply_filters( 'media_send_to_editor', $html, $id, $attachment )
	*/
	const MediaSendToEditor = "media_send_to_editor";
	/**
			 * Filters the audio and video metadata fields to be shown in the publish meta box.
			 *
			 * The key for each item in the array should correspond to an attachment
			 * metadata key, and the value should be the desired label.
			 *
			 * @since 3.7.0
			 * @since 4.9.0 Added the `$post` parameter.
			 *
			 * @param array   $fields An array of the attachment metadata keys and labels.
			 * @param WP_Post $post   WP_Post object for the current attachment.
			 * @Reference wp-admin\includes\media.php apply_filters( 'media_submitbox_misc_sections', $fields, $post )
	*/
	const MediaSubmitboxMiscSections = "media_submitbox_misc_sections";
	/**
		 * Filters the default tab in the legacy (pre-3.5.0) media popup.
		 *
		 * @since 2.5.0
		 *
		 * @param string $type The default media popup tab. Default 'type' (From Computer).
		 * @Reference wp-admin\media-upload.php apply_filters( 'media_upload_default_tab', 'type' )
	* @Reference wp-admin\includes\media.php apply_filters( 'media_upload_default_tab', $default )
	*/
	const MediaUploadDefaultTab = "media_upload_default_tab";
	/**
		 * Filters the default media upload type in the legacy (pre-3.5.0) media popup.
		 *
		 * @since 2.5.0
		 *
		 * @param string $type The default media upload type. Possible values include
		 *                     'image', 'audio', 'video', 'file', etc. Default 'file'.
		 * @Reference wp-admin\media-upload.php apply_filters( 'media_upload_default_type', 'file' )
	*/
	const MediaUploadDefaultType = "media_upload_default_type";
	/**
		 * Filters the media upload form action URL.
		 *
		 * @since 2.6.0
		 *
		 * @param string $form_action_url The media upload form action URL.
		 * @param string $type            The type of media. Default 'file'.
		 * @Reference wp-admin\includes\media.php apply_filters( 'media_upload_form_url', $form_action_url, $type )
	* @Reference wp-admin\includes\media.php apply_filters( 'media_upload_form_url', $form_action_url, $type )
	* @Reference wp-admin\includes\media.php apply_filters( 'media_upload_form_url', $form_action_url, $type )
	* @Reference wp-admin\includes\media.php apply_filters( 'media_upload_form_url', $form_action_url, $type )
	*/
	const MediaUploadFormUrl = "media_upload_form_url";
	/**
	* @Reference wp-admin\includes\media.php apply_filters( 'media_upload_mime_type_links', $type_links )
	*/
	const MediaUploadMimeTypeLinks = "media_upload_mime_type_links";
	/**
		 * Filters the available tabs in the legacy (pre-3.5.0) media popup.
		 *
		 * @since 2.5.0
		 *
		 * @param array $_default_tabs An array of media tabs.
		 * @Reference wp-admin\includes\media.php apply_filters( 'media_upload_tabs', $_default_tabs )
	* @Reference wp-includes\media.php apply_filters( 'media_upload_tabs', $tabs )
	*/
	const MediaUploadTabs = "media_upload_tabs";
	/**
		 * Filters the media view settings.
		 *
		 * @since 3.5.0
		 *
		 * @param array   $settings List of media view settings.
		 * @param WP_Post $post     Post object.
		 * @Reference wp-includes\media.php apply_filters( 'media_view_settings', $settings, $post )
	*/
	const MediaViewSettings = "media_view_settings";
	/**
		 * Filters the media view strings.
		 *
		 * @since 3.5.0
		 *
		 * @param array   $strings List of media view strings.
		 * @param WP_Post $post    Post object.
		 * @Reference wp-includes\media.php apply_filters( 'media_view_strings', $strings, $post )
	*/
	const MediaViewStrings = "media_view_strings";
	/**
			 * Filters the MediaElement configuration settings.
			 *
			 * @since 4.4.0
			 *
			 * @param array $mejs_settings MediaElement settings array.
			 * @Reference wp-includes\script-loader.php apply_filters( 'mejs_settings', $mejs_settings )
	*/
	const MejsSettings = "mejs_settings";
	/**
		 * Filters the order of administration menu items.
		 *
		 * A truthy value must first be passed to the {@see 'custom_menu_order'} filter
		 * for this filter to work. Use the following to enable custom menu ordering:
		 *
		 *     add_filter( 'custom_menu_order', '__return_true' );
		 *
		 * @since 2.8.0
		 *
		 * @param array $menu_order An ordered array of menu items.
		 * @Reference wp-admin\includes\menu.php apply_filters( 'menu_order', $menu_order )
	*/
	const MenuOrder = "menu_order";
	/**
			 * Filters the table alias identified as compatible with the current clause.
			 *
			 * @since 4.1.0
			 *
			 * @param string|bool $alias        Table alias, or false if none was found.
			 * @param array       $clause       First-order query clause.
			 * @param array       $parent_query Parent of $clause.
			 * @param object      $this         WP_Meta_Query object.
			 * @Reference wp-includes\class-wp-meta-query.php apply_filters( 'meta_query_find_compatible_table_alias', $alias, $clause, $parent_query, $this )
	*/
	const MetaQueryFindCompatibleTableAlias = "meta_query_find_compatible_table_alias";
	/**
		 * Filters the list of mime types and file extensions.
		 *
		 * This filter should be used to add, not remove, mime types. To remove
		 * mime types, use the {@see 'upload_mimes'} filter.
		 *
		 * @since 3.5.0
		 *
		 * @param array $wp_get_mime_types Mime types keyed by the file extension regex
		 *                                 corresponding to those types.
		 * @Reference wp-includes\functions.php apply_filters(		'mime_types',		array(			// Image formats.			'jpg|jpeg|jpe'                 => 'image/jpeg',			'gif'                          => 'image/gif',			'png'                          => 'image/png',			'bmp'                          => 'image/bmp',			'tiff|tif'                     => 'image/tiff',			'ico'                          => 'image/x-icon',			// Video formats.			'asf|asx'                      => 'video/x-ms-asf',			'wmv'                          => 'video/x-ms-wmv',			'wmx'                          => 'video/x-ms-wmx',			'wm'                           => 'video/x-ms-wm',			'avi'                          => 'video/avi',			'divx'                         => 'video/divx',			'flv'                          => 'video/x-flv',			'mov|qt'                       => 'video/quicktime',			'mpeg|mpg|mpe'                 => 'video/mpeg',			'mp4|m4v'                      => 'video/mp4',			'ogv'                          => 'video/ogg',			'webm'                         => 'video/webm',			'mkv'                          => 'video/x-matroska',			'3gp|3gpp'                     => 'video/3gpp', // Can also be audio			'3g2|3gp2'                     => 'video/3gpp2', // Can also be audio			// Text formats.			'txt|asc|c|cc|h|srt'           => 'text/plain',			'csv'                          => 'text/csv',			'tsv'                          => 'text/tab-separated-values',			'ics'                          => 'text/calendar',			'rtx'                          => 'text/richtext',			'css'                          => 'text/css',			'htm|html'                     => 'text/html',			'vtt'                          => 'text/vtt',			'dfxp'                         => 'application/ttaf+xml',			// Audio formats.			'mp3|m4a|m4b'                  => 'audio/mpeg',			'aac'                          => 'audio/aac',			'ra|ram'                       => 'audio/x-realaudio',			'wav'                          => 'audio/wav',			'ogg|oga'                      => 'audio/ogg',			'flac'                         => 'audio/flac',			'mid|midi'                     => 'audio/midi',			'wma'                          => 'audio/x-ms-wma',			'wax'                          => 'audio/x-ms-wax',			'mka'                          => 'audio/x-matroska',			// Misc application formats.			'rtf'                          => 'application/rtf',			'js'                           => 'application/javascript',			'pdf'                          => 'application/pdf',			'swf'                          => 'application/x-shockwave-flash',			'class'                        => 'application/java',			'tar'                          => 'application/x-tar',			'zip'                          => 'application/zip',			'gz|gzip'                      => 'application/x-gzip',			'rar'                          => 'application/rar',			'7z'                           => 'application/x-7z-compressed',			'exe'                          => 'application/x-msdownload',			'psd'                          => 'application/octet-stream',			'xcf'                          => 'application/octet-stream',			// MS Office formats.			'doc'                          => 'application/msword',			'pot|pps|ppt'                  => 'application/vnd.ms-powerpoint',			'wri'                          => 'application/vnd.ms-write',			'xla|xls|xlt|xlw'              => 'application/vnd.ms-excel',			'mdb'                          => 'application/vnd.ms-access',			'mpp'                          => 'application/vnd.ms-project',			'docx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',			'docm'                         => 'application/vnd.ms-word.document.macroEnabled.12',			'dotx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',			'dotm'                         => 'application/vnd.ms-word.template.macroEnabled.12',			'xlsx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',			'xlsm'                         => 'application/vnd.ms-excel.sheet.macroEnabled.12',			'xlsb'                         => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',			'xltx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',			'xltm'                         => 'application/vnd.ms-excel.template.macroEnabled.12',			'xlam'                         => 'application/vnd.ms-excel.addin.macroEnabled.12',			'pptx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',			'pptm'                         => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',			'ppsx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',			'ppsm'                         => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',			'potx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.template',			'potm'                         => 'application/vnd.ms-powerpoint.template.macroEnabled.12',			'ppam'                         => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',			'sldx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slide',			'sldm'                         => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',			'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',			'oxps'                         => 'application/oxps',			'xps'                          => 'application/vnd.ms-xpsdocument',			// OpenOffice formats.			'odt'                          => 'application/vnd.oasis.opendocument.text',			'odp'                          => 'application/vnd.oasis.opendocument.presentation',			'ods'                          => 'application/vnd.oasis.opendocument.spreadsheet',			'odg'                          => 'application/vnd.oasis.opendocument.graphics',			'odc'                          => 'application/vnd.oasis.opendocument.chart',			'odb'                          => 'application/vnd.oasis.opendocument.database',			'odf'                          => 'application/vnd.oasis.opendocument.formula',			// WordPerfect formats.			'wp|wpd'                       => 'application/wordperfect',			// iWork formats.			'key'                          => 'application/vnd.apple.keynote',			'numbers'                      => 'application/vnd.apple.numbers',			'pages'                        => 'application/vnd.apple.pages',		)	)
	*/
	const MimeTypes = "mime_types";
	/**
		 * Filters the minimum site name length required when validating a site signup.
		 *
		 * @since 4.8.0
		 *
		 * @param int $length The minimum site name length. Default 4.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'minimum_site_name_length', 4 )
	*/
	const MinimumSiteNameLength = "minimum_site_name_length";
	/**
			 * Filters the list of rewrite rules formatted for output to an .htaccess file.
			 *
			 * @since 1.5.0
			 *
			 * @param string $rules mod_rewrite Rewrite rules formatted for .htaccess.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'mod_rewrite_rules', $rules )
	*/
	const ModRewriteRules = "mod_rewrite_rules";
	/**
		 * Filters the month archive permalink.
		 *
		 * @since 1.5.0
		 *
		 * @param string $monthlink Permalink for the month archive.
		 * @param int    $year      Year for the archive.
		 * @param int    $month     The month for the archive.
		 * @Reference wp-includes\link-template.php apply_filters( 'month_link', $monthlink, $year, $month )
	*/
	const MonthLink = "month_link";
	/**
			 * Filters the 'Months' drop-down results.
			 *
			 * @since 3.7.0
			 *
			 * @param object $months    The months drop-down query results.
			 * @param string $post_type The post type.
			 * @Reference wp-admin\includes\class-wp-list-table.php apply_filters( 'months_dropdown_results', $months, $post_type )
	*/
	const MonthsDropdownResults = "months_dropdown_results";
	/**
		 * Filters checking the status of the current blog.
		 *
		 * @since 3.0.0
		 *
		 * @param bool null Whether to skip the blog status check. Default null.
		 * @Reference wp-includes\ms-load.php apply_filters( 'ms_site_check', null )
	*/
	const MsSiteCheck = "ms_site_check";
	/**
			 * Filters the arguments for the site query in the sites list table.
			 *
			 * @since 4.6.0
			 *
			 * @param array $args An array of get_sites() arguments.
			 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php apply_filters( 'ms_sites_list_table_query_args', $args )
	*/
	const MsSitesListTableQueryArgs = "ms_sites_list_table_query_args";
	/**
				 * Filters the action links displayed next the sites a user belongs to
				 * in the Network Admin Users list table.
				 *
				 * @since 3.1.0
				 *
				 * @param string[] $actions     An array of action links to be displayed. Default 'Edit', 'View'.
				 * @param int      $userblog_id The site ID.
				 * @Reference wp-admin\includes\class-wp-ms-users-list-table.php apply_filters( 'ms_user_list_site_actions', $actions, $val->userblog_id )
	*/
	const MsUserListSiteActions = "ms_user_list_site_actions";
	/**
				 * Filters the span class for a site listing on the mulisite user list table.
				 *
				 * @since 5.2.0
				 *
				 * @param array  $site_classes Class used within the span tag. Default "site-#" with the site's network ID.
				 * @param int    $site_id      Site ID.
				 * @param int    $network_id   Network ID.
				 * @param object $user         WP_User object.
				 * @Reference wp-admin\includes\class-wp-ms-users-list-table.php apply_filters( 'ms_user_list_site_class', $site_classes, $val->userblog_id, $val->site_id, $user )
	*/
	const MsUserListSiteClass = "ms_user_list_site_class";
	/**
			 * Filters the action links displayed under each user in the Network Admin Users list table.
			 *
			 * @since 3.2.0
			 *
			 * @param string[] $actions An array of action links to be displayed. Default 'Edit', 'Delete'.
			 * @param WP_User  $user    WP_User object.
			 * @Reference wp-admin\includes\class-wp-ms-users-list-table.php apply_filters( 'ms_user_row_actions', $actions, $user )
	*/
	const MsUserRowActions = "ms_user_row_actions";
	/**
		 * Filters the languages available in the dropdown.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string[] $output     Array of HTML output for the dropdown.
		 * @param string[] $lang_files Array of available language files.
		 * @param string   $current    The current language code.
		 * @Reference wp-admin\includes\ms.php apply_filters( 'mu_dropdown_languages', $output, $lang_files, $current )
	*/
	const MuDropdownLanguages = "mu_dropdown_languages";
	/**
				 * Filters available network-wide administration menu options.
				 *
				 * Options returned to this filter are output as individual checkboxes that, when selected,
				 * enable site administrator access to the specified administration menu in certain contexts.
				 *
				 * Adding options for specific menus here hinges on the appropriate checks and capabilities
				 * being in place in the site dashboard on the other side. For instance, when the single
				 * default option, 'plugins' is enabled, site administrators are granted access to the Plugins
				 * screen in their individual sites' dashboards.
				 *
				 * @since MU (3.0.0)
				 *
				 * @param string[] $admin_menus Associative array of the menu items available.
				 * @Reference wp-admin\network\settings.php apply_filters( 'mu_menu_items', array( 'plugins' => __( 'Plugins' ) ) )
	*/
	const MuMenuItems = "mu_menu_items";
	/**
			 * Filters the row links displayed for each site on the My Sites screen.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string $actions   The HTML site link markup.
			 * @param object $user_blog An object containing the site data.
			 * @Reference wp-admin\my-sites.php apply_filters( 'myblogs_blog_actions', $actions, $user_blog )
	*/
	const MyblogsBlogActions = "myblogs_blog_actions";
	/**
		 * Enable the Global Settings section on the My Sites screen.
		 *
		 * By default, the Global Settings section is hidden. Passing a non-empty
		 * string to this filter will enable the section, and allow new settings
		 * to be added, either globally or for specific sites.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $settings_html The settings HTML markup. Default empty.
		 * @param object $context       Context of the setting (global or site-specific). Default 'global'.
		 * @Reference wp-admin\my-sites.php apply_filters( 'myblogs_options', '', 'global' )
	* @Reference wp-admin\my-sites.php apply_filters( 'myblogs_options', '', $user_blog )
	*/
	const MyblogsOptions = "myblogs_options";
	/**
				 * Filters a navigation menu item's title attribute.
				 *
				 * @since 3.0.0
				 *
				 * @param string $item_title The menu item title attribute.
				 * @Reference wp-includes\nav-menu.php apply_filters( 'nav_menu_attr_title', $menu_item->post_excerpt )
	* @Reference wp-includes\nav-menu.php apply_filters( 'nav_menu_attr_title', '' )
	* @Reference wp-includes\customize\class-wp-customize-nav-menu-item-setting.php apply_filters( 'nav_menu_attr_title', $post->attr_title )
	*/
	const NavMenuAttrTitle = "nav_menu_attr_title";
	/**
			 * Filters the CSS classes applied to a menu item's list item element.
			 *
			 * @since 3.0.0
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
			 * @param WP_Post  $item    The current menu item.
			 * @param stdClass $args    An object of wp_nav_menu() arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 * @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth )
	*/
	const NavMenuCssClass = "nav_menu_css_class";
	/**
					 * Filters a navigation menu item's description.
					 *
					 * @since 3.0.0
					 *
					 * @param string $description The menu item description.
					 * @Reference wp-includes\nav-menu.php apply_filters( 'nav_menu_description', wp_trim_words( $menu_item->post_content, 200 ) )
	* @Reference wp-includes\nav-menu.php apply_filters( 'nav_menu_description', '' )
	* @Reference wp-includes\customize\class-wp-customize-nav-menu-item-setting.php apply_filters( 'nav_menu_description', wp_trim_words( $post->description, 200 ) )
	*/
	const NavMenuDescription = "nav_menu_description";
	/**
			 * Filters the arguments for a single nav menu item.
			 *
			 * @since 4.4.0
			 *
			 * @param stdClass $args  An object of wp_nav_menu() arguments.
			 * @param WP_Post  $item  Menu item data object.
			 * @param int      $depth Depth of menu item. Used for padding.
			 * @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'nav_menu_item_args', $args, $item, $depth )
	*/
	const NavMenuItemArgs = "nav_menu_item_args";
	/**
			 * Filters the ID applied to a menu item's list item element.
			 *
			 * @since 3.0.1
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param WP_Post  $item    The current menu item.
			 * @param stdClass $args    An object of wp_nav_menu() arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 * @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth )
	*/
	const NavMenuItemId = "nav_menu_item_id";
	/**
			 * Filters a menu item's title.
			 *
			 * @since 4.4.0
			 *
			 * @param string   $title The menu item's title.
			 * @param WP_Post  $item  The current menu item.
			 * @param stdClass $args  An object of wp_nav_menu() arguments.
			 * @param int      $depth Depth of menu item. Used for padding.
			 * @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth )
	*/
	const NavMenuItemTitle = "nav_menu_item_title";
	/**
			 * Filters the HTML attributes applied to a menu item's anchor element.
			 *
			 * @since 3.6.0
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param array $atts {
			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $title        Title attribute.
			 *     @type string $target       Target attribute.
			 *     @type string $rel          The rel attribute.
			 *     @type string $href         The href attribute.
			 *     @type string $aria_current The aria-current attribute.
			 * }
			 * @param WP_Post  $item  The current menu item.
			 * @param stdClass $args  An object of wp_nav_menu() arguments.
			 * @param int      $depth Depth of menu item. Used for padding.
			 * @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth )
	*/
	const NavMenuLinkAttributes = "nav_menu_link_attributes";
	/**
			 * Filters whether a menu items meta box will be added for the current
			 * object type.
			 *
			 * If a falsey value is returned instead of an object, the menu items
			 * meta box for the current meta box object will not be added.
			 *
			 * @since 3.0.0
			 *
			 * @param object $meta_box_object The current object to add a menu items
			 *                                meta box for.
			 * @Reference wp-admin\includes\nav-menu.php apply_filters( 'nav_menu_meta_box_object', $post_type )
	* @Reference wp-admin\includes\ajax-actions.php apply_filters( 'nav_menu_meta_box_object', $menus_meta_box_object )
	* @Reference wp-admin\includes\nav-menu.php apply_filters( 'nav_menu_meta_box_object', $tax )
	*/
	const NavMenuMetaBoxObject = "nav_menu_meta_box_object";
	/**
			 * Filters the CSS class(es) applied to a menu list element.
			 *
			 * @since 4.8.0
			 *
			 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
			 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 * @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth )
	*/
	const NavMenuSubmenuCssClass = "nav_menu_submenu_css_class";
	/**
		 * Filters the navigation markup template.
		 *
		 * Note: The filtered template HTML must contain specifiers for the navigation
		 * class (%1$s), the screen-reader-text value (%2$s), placement of the navigation
		 * links (%3$s), and ARIA label text if screen-reader-text does not fit that (%4$s):
		 *
		 *     <nav class="navigation %1$s" role="navigation" aria-label="%4$s">
		 *         <h2 class="screen-reader-text">%2$s</h2>
		 *         <div class="nav-links">%3$s</div>
		 *     </nav>
		 *
		 * @since 4.4.0
		 *
		 * @param string $template The default template.
		 * @param string $class    The class passed by the calling function.
		 * @return string Navigation template.
		 * @Reference wp-includes\link-template.php apply_filters( 'navigation_markup_template', $template, $class )
	*/
	const NavigationMarkupTemplate = "navigation_markup_template";
	/**
		 * Filters the contents of the email notification sent when the network admin email address is changed.
		 *
		 * @since 4.9.0
		 *
		 * @param array $email_change_email {
		 *            Used to build wp_mail().
		 *
		 *            @type string $to      The intended recipient.
		 *            @type string $subject The subject of the email.
		 *            @type string $message The content of the email.
		 *                The following strings have a special meaning and will get replaced dynamically:
		 *                - ###OLD_EMAIL### The old network admin email address.
		 *                - ###NEW_EMAIL### The new network admin email address.
		 *                - ###SITENAME###  The name of the network.
		 *                - ###SITEURL###   The URL to the site.
		 *            @type string $headers Headers.
		 *        }
		 * @param string $old_email  The old network admin email address.
		 * @param string $new_email  The new network admin email address.
		 * @param int    $network_id ID of the network.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'network_admin_email_change_email', $email_change_email, $old_email, $new_email, $network_id )
	*/
	const NetworkAdminEmailChangeEmail = "network_admin_email_change_email";
	/**
				 * Filters the action links displayed for each plugin in the Network Admin Plugins list table.
				 *
				 * @since 3.1.0
				 *
				 * @param string[] $actions     An array of plugin action links. By default this can include 'activate',
				 *                              'deactivate', and 'delete'.
				 * @param string   $plugin_file Path to the plugin file relative to the plugins directory.
				 * @param array    $plugin_data An array of plugin data. See `get_plugin_data()`.
				 * @param string   $context     The plugin context. By default this can include 'all', 'active', 'inactive',
				 *                              'recently_activated', 'upgrade', 'mustuse', 'dropins', and 'search'.
				 * @Reference wp-admin\includes\class-wp-plugins-list-table.php apply_filters( 'network_admin_plugin_action_links', $actions, $plugin_file, $plugin_data, $context )
	*/
	const NetworkAdminPluginActionLinks = "network_admin_plugin_action_links";
	/**
		 * Filters the network admin URL.
		 *
		 * @since 3.0.0
		 *
		 * @param string $url  The complete network admin URL including scheme and path.
		 * @param string $path Path relative to the network admin URL. Blank string if
		 *                     no path is specified.
		 * @Reference wp-includes\link-template.php apply_filters( 'network_admin_url', $url, $path )
	*/
	const NetworkAdminUrl = "network_admin_url";
	/**
			 * Filters the array of themes allowed on the network.
			 *
			 * Site is provided as context so that a list of network allowed themes can
			 * be filtered further.
			 *
			 * @since 4.5.0
			 *
			 * @param string[] $allowed_themes An array of theme stylesheet names.
			 * @param int      $blog_id        ID of the site.
			 * @Reference wp-includes\class-wp-theme.php apply_filters( 'network_allowed_themes', self::get_allowed_on_network(), $blog_id )
	*/
	const NetworkAllowedThemes = "network_allowed_themes";
	/**
				 * Filters the number of path segments to consider when searching for a site.
				 *
				 * @since 3.9.0
				 *
				 * @param int|null $segments The number of path segments to consider. WordPress by default looks at
				 *                           one path segment. The function default of null only makes sense when you
				 *                           know the requested path should match a network.
				 * @param string   $domain   The requested domain.
				 * @param string   $path     The requested path, in full.
				 * @Reference wp-includes\class-wp-network.php apply_filters( 'network_by_path_segments_count', $segments, $domain, $path )
	*/
	const NetworkByPathSegmentsCount = "network_by_path_segments_count";
	/**
		 * Filters the links that appear on site-editing network pages.
		 *
		 * Default links: 'site-info', 'site-users', 'site-themes', and 'site-settings'.
		 *
		 * @since 4.6.0
		 *
		 * @param array $links {
		 *     An array of link data representing individual network admin pages.
		 *
		 *     @type array $link_slug {
		 *         An array of information about the individual link to a page.
		 *
		 *         $type string $label Label to use for the link.
		 *         $type string $url   URL, relative to `network_admin_url()` to use for the link.
		 *         $type string $cap   Capability required to see the link.
		 *     }
		 * }
		 * @Reference wp-admin\includes\ms.php apply_filters(		'network_edit_site_nav_links',		array(			'site-info'     => array(				'label' => __( 'Info' ),				'url'   => 'site-info.php',				'cap'   => 'manage_sites',			),			'site-users'    => array(				'label' => __( 'Users' ),				'url'   => 'site-users.php',				'cap'   => 'manage_sites',			),			'site-themes'   => array(				'label' => __( 'Themes' ),				'url'   => 'site-themes.php',				'cap'   => 'manage_sites',			),			'site-settings' => array(				'label' => __( 'Settings' ),				'url'   => 'site-settings.php',				'cap'   => 'manage_sites',			),		)	)
	*/
	const NetworkEditSiteNavLinks = "network_edit_site_nav_links";
	/**
		 * Filters the network home URL.
		 *
		 * @since 3.0.0
		 *
		 * @param string      $url         The complete network home URL including scheme and path.
		 * @param string      $path        Path relative to the network home URL. Blank string
		 *                                 if no path is specified.
		 * @param string|null $orig_scheme Scheme to give the URL context. Accepts 'http', 'https',
		 *                                 'relative' or null.
		 * @Reference wp-includes\link-template.php apply_filters( 'network_home_url', $url, $path, $orig_scheme )
	*/
	const NetworkHomeUrl = "network_home_url";
	/**
		 * Filters the network site URL.
		 *
		 * @since 3.0.0
		 *
		 * @param string      $url    The complete network site URL including scheme and path.
		 * @param string      $path   Path relative to the network site URL. Blank string if
		 *                            no path is specified.
		 * @param string|null $scheme Scheme to give the URL context. Accepts 'http', 'https',
		 *                            'relative' or null.
		 * @Reference wp-includes\link-template.php apply_filters( 'network_site_url', $url, $path, $scheme )
	*/
	const NetworkSiteUrl = "network_site_url";
	/**
			 * Filters the network query clauses.
			 *
			 * @since 4.6.0
			 *
			 * @param string[]         $pieces An associative array of network query clauses.
			 * @param WP_Network_Query $this   Current instance of WP_Network_Query (passed by reference).
			 * @Reference wp-includes\class-wp-network-query.php apply_filters( 'networks_clauses', array( compact( $pieces ), &$this ) )
	*/
	const NetworksClauses = "networks_clauses";
	/**
			 * Filter the network data before the query takes place.
			 *
			 * Return a non-null value to bypass WordPress's default network queries.
			 *
			 * The expected return type from this filter depends on the value passed in the request query_vars.
			 * When `$this->query_vars['count']` is set, the filter should return the network count as an int.
			 * When `'ids' === $this->query_vars['fields']`, the filter should return an array of network ids.
			 * Otherwise the filter should return an array of WP_Network objects.
			 *
			 * @since 5.2.0
			 *
			 * @param array|null       $network_data Return an array of network data to short-circuit WP's network query,
			 *                                       the network count as an integer if `$this->query_vars['count']` is set,
			 *                                       or null to allow WP to run its normal queries.
			 * @param WP_Network_Query $this         The WP_Network_Query instance, passed by reference.
			 * @Reference wp-includes\class-wp-network-query.php apply_filters( 'networks_pre_query', array( $network_data, &$this ) )
	*/
	const NetworksPreQuery = "networks_pre_query";
	/**
		 * Filters the text of the email sent when a change of site admin email address is attempted.
		 *
		 * The following strings have a special meaning and will get replaced dynamically:
		 * ###USERNAME###  The current user's username.
		 * ###ADMIN_URL### The link to click on to confirm the email change.
		 * ###EMAIL###     The proposed new site admin email address.
		 * ###SITENAME###  The name of the site.
		 * ###SITEURL###   The URL to the site.
		 *
		 * @since MU (3.0.0)
		 * @since 4.9.0 This filter is no longer Multisite specific.
		 *
		 * @param string $email_text      Text in the email.
		 * @param array  $new_admin_email {
		 *     Data relating to the new site admin email address.
		 *
		 *     @type string $hash     The secure hash used in the confirmation link URL.
		 *     @type string $newemail The proposed new site admin email address.
		 * }
		 * @Reference wp-admin\includes\misc.php apply_filters( 'new_admin_email_content', $email_text, $new_admin_email )
	*/
	const NewAdminEmailContent = "new_admin_email_content";
	/**
		 * Filters the text of the email sent when a change of network admin email address is attempted.
		 *
		 * The following strings have a special meaning and will get replaced dynamically:
		 * ###USERNAME###  The current user's username.
		 * ###ADMIN_URL### The link to click on to confirm the email change.
		 * ###EMAIL###     The proposed new network admin email address.
		 * ###SITENAME###  The name of the network.
		 * ###SITEURL###   The URL to the network.
		 *
		 * @since 4.9.0
		 *
		 * @param string $email_text      Text in the email.
		 * @param array  $new_admin_email {
		 *     Data relating to the new network admin email address.
		 *
		 *     @type string $hash     The secure hash used in the confirmation link URL.
		 *     @type string $newemail The proposed new network admin email address.
		 * }
		 * @Reference wp-includes\ms-functions.php apply_filters( 'new_network_admin_email_content', $email_text, $new_admin_email )
	*/
	const NewNetworkAdminEmailContent = "new_network_admin_email_content";
	/**
			 * Filters the text of the email sent when a change of user email address is attempted.
			 *
			 * The following strings have a special meaning and will get replaced dynamically:
			 * ###USERNAME###  The current user's username.
			 * ###ADMIN_URL### The link to click on to confirm the email change.
			 * ###EMAIL###     The new email.
			 * ###SITENAME###  The name of the site.
			 * ###SITEURL###   The URL to the site.
			 *
			 * @since MU (3.0.0)
			 * @since 4.9.0 This filter is no longer Multisite specific.
			 *
			 * @param string $email_text     Text in the email.
			 * @param array  $new_user_email {
			 *     Data relating to the new user email address.
			 *
			 *     @type string $hash     The secure hash used in the confirmation link URL.
			 *     @type string $newemail The proposed new email address.
			 * }
			 * @Reference wp-includes\user.php apply_filters( 'new_user_email_content', $email_text, $new_user_email )
	*/
	const NewUserEmailContent = "new_user_email_content";
	/**
		 * Filters the message body of the new site activation email sent
		 * to the network administrator.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $msg Email body.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'newblog_notify_siteadmin', $msg )
	*/
	const NewblogNotifySiteadmin = "newblog_notify_siteadmin";
	/**
		 * Filters the new site name during registration.
		 *
		 * The name is the site's subdomain or the site's subdirectory
		 * path depending on the network settings.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $blogname Site name.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'newblogname', $blogname )
	*/
	const Newblogname = "newblogname";
	/**
		 * Filters the message body of the new user activation email sent
		 * to the network administrator.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string  $msg  Email body.
		 * @param WP_User $user WP_User instance of the new user.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'newuser_notify_siteadmin', $msg, $user )
	*/
	const NewuserNotifySiteadmin = "newuser_notify_siteadmin";
	/**
		 * Filters the anchor tag attributes for the next comments page link.
		 *
		 * @since 2.7.0
		 *
		 * @param string $attributes Attributes for the anchor tag.
		 * @Reference wp-includes\link-template.php apply_filters( 'next_comments_link_attributes', '' )
	*/
	const NextCommentsLinkAttributes = "next_comments_link_attributes";
	/**
			 * Filters the anchor tag attributes for the next posts page link.
			 *
			 * @since 2.7.0
			 *
			 * @param string $attributes Attributes for the anchor tag.
			 * @Reference wp-includes\link-template.php apply_filters( 'next_posts_link_attributes', '' )
	*/
	const NextPostsLinkAttributes = "next_posts_link_attributes";
	/**
		 * Filters the singular or plural form of a string.
		 *
		 * @since 2.2.0
		 *
		 * @param string $translation Translated text.
		 * @param string $single      The text to be used if the number is singular.
		 * @param string $plural      The text to be used if the number is plural.
		 * @param string $number      The number to compare against to use either the singular or plural form.
		 * @param string $domain      Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'ngettext', $translation, $single, $plural, $number, $domain )
	*/
	const Ngettext = "ngettext";
	/**
		 * Filters the singular or plural form of a string with gettext context.
		 *
		 * @since 2.8.0
		 *
		 * @param string $translation Translated text.
		 * @param string $single      The text to be used if the number is singular.
		 * @param string $plural      The text to be used if the number is plural.
		 * @param string $number      The number to compare against to use either the singular or plural form.
		 * @param string $context     Context information for the translators.
		 * @param string $domain      Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'ngettext_with_context', $translation, $single, $plural, $number, $context, $domain )
	*/
	const NgettextWithContext = "ngettext_with_context";
	/**
		 * Filters the list of shortcodes not to texturize.
		 *
		 * @since 2.8.0
		 *
		 * @param array $default_no_texturize_shortcodes An array of shortcode names.
		 * @Reference wp-includes\formatting.php apply_filters( 'no_texturize_shortcodes', $default_no_texturize_shortcodes )
	*/
	const NoTexturizeShortcodes = "no_texturize_shortcodes";
	/**
		 * Filters the list of HTML elements not to texturize.
		 *
		 * @since 2.8.0
		 *
		 * @param array $default_no_texturize_tags An array of HTML element names.
		 * @Reference wp-includes\formatting.php apply_filters( 'no_texturize_tags', $default_no_texturize_tags )
	*/
	const NoTexturizeTags = "no_texturize_tags";
	/**
			 * Filters the cache-controlling headers.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_get_nocache_headers()
			 *
			 * @param array $headers {
			 *     Header names and field values.
			 *
			 *     @type string $Expires       Expires header.
			 *     @type string $Cache-Control Cache-Control header.
			 * }
			 * @Reference wp-includes\functions.php apply_filters( 'nocache_headers', $headers )
	*/
	const NocacheHeaders = "nocache_headers";
	/**
			 * Filters the lifespan of nonces in seconds.
			 *
			 * @since 2.5.0
			 *
			 * @param int $lifespan Lifespan of nonces in seconds. Default 86,400 seconds, or one day.
			 * @Reference wp-includes\pluggable.php apply_filters( 'nonce_life', DAY_IN_SECONDS )
	*/
	const NonceLife = "nonce_life";
	/**
				 * Filters whether the user who generated the nonce is logged out.
				 *
				 * @since 3.5.0
				 *
				 * @param int    $uid    ID of the nonce-owning user.
				 * @param string $action The nonce action.
				 * @Reference wp-includes\pluggable.php apply_filters( 'nonce_user_logged_out', $uid, $action )
	* @Reference wp-includes\pluggable.php apply_filters( 'nonce_user_logged_out', $uid, $action )
	*/
	const NonceUserLoggedOut = "nonce_user_logged_out";
	/**
			 * Filters whether to send the site moderator email notifications, overriding the site setting.
			 *
			 * @since 4.4.0
			 *
			 * @param bool $maybe_notify Whether to notify blog moderator.
			 * @param int  $comment_ID   The id of the comment for the notification.
			 * @Reference wp-includes\pluggable.php apply_filters( 'notify_moderator', $maybe_notify, $comment_id )
	* @Reference wp-includes\comment.php apply_filters( 'notify_moderator', $maybe_notify, $comment_ID )
	*/
	const NotifyModerator = "notify_moderator";
	/**
		 * Filters whether to send the post author new comment notification emails,
		 * overriding the site setting.
		 *
		 * @since 4.4.0
		 *
		 * @param bool $maybe_notify Whether to notify the post author about the new comment.
		 * @param int  $comment_ID   The ID of the comment for the notification.
		 * @Reference wp-includes\comment.php apply_filters( 'notify_post_author', $maybe_notify, $comment_ID )
	*/
	const NotifyPostAuthor = "notify_post_author";
	/**
		 * Filters the number formatted based on the locale.
		 *
		 * @since 2.8.0
		 * @since 4.9.0 The `$number` and `$decimals` parameters were added.
		 *
		 * @param string $formatted Converted number in string format.
		 * @param float  $number    The number to convert based on locale.
		 * @param int    $decimals  Precision of the number of decimal places.
		 * @Reference wp-includes\functions.php apply_filters( 'number_format_i18n', $formatted, $number, $decimals )
	*/
	const NumberFormatI18n = "number_format_i18n";
	/**
			 * Filters the returned oEmbed HTML.
			 *
			 * Use this filter to add support for custom data types, or to filter the result.
			 *
			 * @since 2.9.0
			 *
			 * @param string $return The returned oEmbed HTML.
			 * @param object $data   A data object result from an oEmbed provider.
			 * @param string $url    The URL of the content to be embedded.
			 * @Reference wp-includes\class-wp-oembed.php apply_filters( 'oembed_dataparse', $return, $data, $url )
	*/
	const OembedDataparse = "oembed_dataparse";
	/**
			 * Filters the maxwidth oEmbed parameter.
			 *
			 * @since 4.4.0
			 *
			 * @param int $maxwidth Maximum allowed width. Default 600.
			 * @Reference wp-includes\class-wp-oembed-controller.php apply_filters( 'oembed_default_width', 600 )
	*/
	const OembedDefaultWidth = "oembed_default_width";
	/**
		 * Filters the oEmbed discovery links HTML.
		 *
		 * @since 4.4.0
		 *
		 * @param string $output HTML of the discovery links.
		 * @Reference wp-includes\embed.php apply_filters( 'oembed_discovery_links', $output )
	*/
	const OembedDiscoveryLinks = "oembed_discovery_links";
	/**
		 * Filters the oEmbed endpoint URL.
		 *
		 * @since 4.4.0
		 *
		 * @param string $url       The URL to the oEmbed endpoint.
		 * @param string $permalink The permalink used for the `url` query arg.
		 * @param string $format    The requested response format.
		 * @Reference wp-includes\embed.php apply_filters( 'oembed_endpoint_url', $url, $permalink, $format )
	*/
	const OembedEndpointUrl = "oembed_endpoint_url";
	/**
			 * Filters the oEmbed URL to be fetched.
			 *
			 * @since 2.9.0
			 * @since 4.9.0 The `dnt` (Do Not Track) query parameter was added to all oEmbed provider URLs.
			 *
			 * @param string $provider URL of the oEmbed provider.
			 * @param string $url      URL of the content to be embedded.
			 * @param array  $args     Optional arguments, usually passed from a shortcode.
			 * @Reference wp-includes\class-wp-oembed.php apply_filters( 'oembed_fetch_url', $provider, $url, $args )
	*/
	const OembedFetchUrl = "oembed_fetch_url";
	/**
		 * Filters the title attribute of the given oEmbed HTML iframe.
		 *
		 * @since 5.2.0
		 *
		 * @param string $title  The title attribute.
		 * @param string $result The oEmbed HTML result.
		 * @param object $data   A data object result from an oEmbed provider.
		 * @param string $url    The URL of the content to be embedded.
		 * @Reference wp-includes\embed.php apply_filters( 'oembed_iframe_title_attribute', $title, $result, $data, $url )
	*/
	const OembedIframeTitleAttribute = "oembed_iframe_title_attribute";
	/**
				 * Filters the link types that contain oEmbed provider URLs.
				 *
				 * @since 2.9.0
				 *
				 * @param string[] $format Array of oEmbed link types. Accepts 'application/json+oembed',
				 *                         'text/xml+oembed', and 'application/xml+oembed' (incorrect,
				 *                         used by at least Vimeo).
				 * @Reference wp-includes\class-wp-oembed.php apply_filters(				'oembed_linktypes',				array(					'application/json+oembed' => 'json',					'text/xml+oembed'         => 'xml',					'application/xml+oembed'  => 'xml',				)			)
	*/
	const OembedLinktypes = "oembed_linktypes";
	/**
		 * Filters the allowed minimum and maximum widths for the oEmbed response.
		 *
		 * @since 4.4.0
		 *
		 * @param array $min_max_width {
		 *     Minimum and maximum widths for the oEmbed response.
		 *
		 *     @type int $min Minimum width. Default 200.
		 *     @type int $max Maximum width. Default 600.
		 * }
		 * @Reference wp-includes\embed.php apply_filters(		'oembed_min_max_width',		array(			'min' => 200,			'max' => 600,		)	)
	*/
	const OembedMinMaxWidth = "oembed_min_max_width";
	/**
			 * Filters the list of whitelisted oEmbed providers.
			 *
			 * Since WordPress 4.4, oEmbed discovery is enabled for all users and allows embedding of sanitized
			 * iframes. The providers in this list are whitelisted, meaning they are trusted and allowed to
			 * embed any content, such as iframes, videos, JavaScript, and arbitrary HTML.
			 *
			 * Supported providers:
			 *
			 * |   Provider   |                     Flavor                |  Since  |
			 * | ------------ | ----------------------------------------- | ------- |
			 * | Dailymotion  | dailymotion.com                           | 2.9.0   |
			 * | Flickr       | flickr.com                                | 2.9.0   |
			 * | Hulu         | hulu.com                                  | 2.9.0   |
			 * | Scribd       | scribd.com                                | 2.9.0   |
			 * | Vimeo        | vimeo.com                                 | 2.9.0   |
			 * | WordPress.tv | wordpress.tv                              | 2.9.0   |
			 * | YouTube      | youtube.com/watch                         | 2.9.0   |
			 * | Crowdsignal  | polldaddy.com                             | 3.0.0   |
			 * | SmugMug      | smugmug.com                               | 3.0.0   |
			 * | YouTube      | youtu.be                                  | 3.0.0   |
			 * | Twitter      | twitter.com                               | 3.4.0   |
			 * | Instagram    | instagram.com                             | 3.5.0   |
			 * | Instagram    | instagr.am                                | 3.5.0   |
			 * | Slideshare   | slideshare.net                            | 3.5.0   |
			 * | SoundCloud   | soundcloud.com                            | 3.5.0   |
			 * | Dailymotion  | dai.ly                                    | 3.6.0   |
			 * | Flickr       | flic.kr                                   | 3.6.0   |
			 * | Spotify      | spotify.com                               | 3.6.0   |
			 * | Imgur        | imgur.com                                 | 3.9.0   |
			 * | Meetup.com   | meetup.com                                | 3.9.0   |
			 * | Meetup.com   | meetu.ps                                  | 3.9.0   |
			 * | Animoto      | animoto.com                               | 4.0.0   |
			 * | Animoto      | video214.com                              | 4.0.0   |
			 * | CollegeHumor | collegehumor.com                          | 4.0.0   |
			 * | Issuu        | issuu.com                                 | 4.0.0   |
			 * | Mixcloud     | mixcloud.com                              | 4.0.0   |
			 * | Crowdsignal  | poll.fm                                   | 4.0.0   |
			 * | TED          | ted.com                                   | 4.0.0   |
			 * | YouTube      | youtube.com/playlist                      | 4.0.0   |
			 * | Tumblr       | tumblr.com                                | 4.2.0   |
			 * | Kickstarter  | kickstarter.com                           | 4.2.0   |
			 * | Kickstarter  | kck.st                                    | 4.2.0   |
			 * | Cloudup      | cloudup.com                               | 4.3.0   |
			 * | ReverbNation | reverbnation.com                          | 4.4.0   |
			 * | VideoPress   | videopress.com                            | 4.4.0   |
			 * | Reddit       | reddit.com                                | 4.4.0   |
			 * | Speaker Deck | speakerdeck.com                           | 4.4.0   |
			 * | Twitter      | twitter.com/timelines                     | 4.5.0   |
			 * | Twitter      | twitter.com/moments                       | 4.5.0   |
			 * | Facebook     | facebook.com                              | 4.7.0   |
			 * | Twitter      | twitter.com/user                          | 4.7.0   |
			 * | Twitter      | twitter.com/likes                         | 4.7.0   |
			 * | Twitter      | twitter.com/lists                         | 4.7.0   |
			 * | Screencast   | screencast.com                            | 4.8.0   |
			 * | Amazon       | amazon.com (com.mx, com.br, ca)           | 4.9.0   |
			 * | Amazon       | amazon.de (fr, it, es, in, nl, ru, co.uk) | 4.9.0   |
			 * | Amazon       | amazon.co.jp (com.au)                     | 4.9.0   |
			 * | Amazon       | amazon.cn                                 | 4.9.0   |
			 * | Amazon       | a.co                                      | 4.9.0   |
			 * | Amazon       | amzn.to (eu, in, asia)                    | 4.9.0   |
			 * | Amazon       | z.cn                                      | 4.9.0   |
			 * | Someecards   | someecards.com                            | 4.9.0   |
			 * | Someecards   | some.ly                                   | 4.9.0   |
			 * | Crowdsignal  | survey.fm                                 | 5.1.0   |
			 * | Instagram TV | instagram.com                             | 5.1.0   |
			 * | Instagram TV | instagr.am                                | 5.1.0   |
			 *
			 * No longer supported providers:
			 *
			 * |   Provider   |        Flavor        |   Since   |  Removed  |
			 * | ------------ | -------------------- | --------- | --------- |
			 * | Qik          | qik.com              | 2.9.0     | 3.9.0     |
			 * | Viddler      | viddler.com          | 2.9.0     | 4.0.0     |
			 * | Revision3    | revision3.com        | 2.9.0     | 4.2.0     |
			 * | Blip         | blip.tv              | 2.9.0     | 4.4.0     |
			 * | Rdio         | rdio.com             | 3.6.0     | 4.4.1     |
			 * | Rdio         | rd.io                | 3.6.0     | 4.4.1     |
			 * | Vine         | vine.co              | 4.1.0     | 4.9.0     |
			 * | Photobucket  | photobucket.com      | 2.9.0     | 5.1.0     |
			 * | Funny or Die | funnyordie.com       | 3.0.0     | 5.1.0     |
			 *
			 * @see wp_oembed_add_provider()
			 *
			 * @since 2.9.0
			 *
			 * @param array[] $providers An array of arrays containing data about popular oEmbed providers.
			 * @Reference wp-includes\class-wp-oembed.php apply_filters( 'oembed_providers', $providers )
	*/
	const OembedProviders = "oembed_providers";
	/**
			 * Filters oEmbed remote get arguments.
			 *
			 * @since 4.0.0
			 *
			 * @see WP_Http::request()
			 *
			 * @param array  $args oEmbed remote get arguments.
			 * @param string $url  URL to be inspected.
			 * @Reference wp-includes\class-wp-oembed.php apply_filters( 'oembed_remote_get_args', $args, $url )
	* @Reference wp-includes\class-wp-oembed.php apply_filters( 'oembed_remote_get_args', array(), $provider_url_with_args )
	*/
	const OembedRemoteGetArgs = "oembed_remote_get_args";
	/**
			 * Filters the determined post ID.
			 *
			 * @since 4.4.0
			 *
			 * @param int    $post_id The post ID.
			 * @param string $url     The requested URL.
			 * @Reference wp-includes\class-wp-oembed-controller.php apply_filters( 'oembed_request_post_id', $post_id, $request['url'] )
	* @Reference wp-includes\embed.php apply_filters( 'oembed_request_post_id', $post_id, $url )
	*/
	const OembedRequestPostId = "oembed_request_post_id";
	/**
		 * Filters the oEmbed response data.
		 *
		 * @since 4.4.0
		 *
		 * @param array   $data   The response data.
		 * @param WP_Post $post   The post object.
		 * @param int     $width  The requested width.
		 * @param int     $height The calculated height.
		 * @Reference wp-includes\embed.php apply_filters( 'oembed_response_data', $data, $post, $width, $height )
	*/
	const OembedResponseData = "oembed_response_data";
	/**
			 * Filters the HTML returned by the oEmbed provider.
			 *
			 * @since 2.9.0
			 *
			 * @param string|false $data The returned oEmbed HTML (false if unsafe).
			 * @param string       $url  URL of the content to be embedded.
			 * @param array        $args Optional arguments, usually passed from a shortcode.
			 * @Reference wp-includes\class-wp-oembed.php apply_filters( 'oembed_result', $this->data2html( $data, $url ), $url, $args )
	* @Reference wp-includes\class-wp-oembed-controller.php apply_filters( 'oembed_result', _wp_oembed_get_object()->data2html( (object) $data, $url ), $url, $args )
	*/
	const OembedResult = "oembed_result";
	/**
			 * Filters the oEmbed TTL value (time to live).
			 *
			 * @since 4.0.0
			 *
			 * @param int    $time    Time to live (in seconds).
			 * @param string $url     The attempted embed URL.
			 * @param array  $attr    An array of shortcode attributes.
			 * @param int    $post_ID Post ID.
			 * @Reference wp-includes\class-wp-embed.php apply_filters( 'oembed_ttl', DAY_IN_SECONDS, $url, $attr, $post_ID )
	*/
	const OembedTtl = "oembed_ttl";
	/**
			 * Filters the old slug redirect post ID.
			 *
			 * @since 4.9.3
			 *
			 * @param int $id The redirect post ID.
			 * @Reference wp-includes\query.php apply_filters( 'old_slug_redirect_post_id', $id )
	*/
	const OldSlugRedirectPostId = "old_slug_redirect_post_id";
	/**
			 * Filters the old slug redirect URL.
			 *
			 * @since 4.4.0
			 *
			 * @param string $link The redirect URL.
			 * @Reference wp-includes\query.php apply_filters( 'old_slug_redirect_url', $link )
	*/
	const OldSlugRedirectUrl = "old_slug_redirect_url";
	/**
	* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'option_enable_xmlrpc', true )
	*/
	const OptionEnableXmlrpc = "option_enable_xmlrpc";
	/**
		 * Filters whether to override the .mo file loading.
		 *
		 * @since 2.9.0
		 *
		 * @param bool   $override Whether to override the .mo file loading. Default false.
		 * @param string $domain   Text domain. Unique identifier for retrieving translated strings.
		 * @param string $mofile   Path to the MO file.
		 * @Reference wp-includes\l10n.php apply_filters( 'override_load_textdomain', false, $domain, $mofile )
	*/
	const OverrideLoadTextdomain = "override_load_textdomain";
	/**
			 * Filters whether to allow the post lock to be overridden.
			 *
			 * Returning a falsey value to the filter will disable the ability
			 * to override the post lock.
			 *
			 * @since 3.6.0
			 *
			 * @param bool    $override Whether to allow overriding post locks. Default true.
			 * @param WP_Post $post     Post object.
			 * @param WP_User $user     User object.
			 * @Reference wp-admin\includes\post.php apply_filters( 'override_post_lock', true, $post, $user )
	*/
	const OverridePostLock = "override_post_lock";
	/**
		 * Filters whether to override the text domain unloading.
		 *
		 * @since 3.0.0
		 *
		 * @param bool   $override Whether to override the text domain unloading. Default false.
		 * @param string $domain   Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'override_unload_textdomain', false, $domain )
	*/
	const OverrideUnloadTextdomain = "override_unload_textdomain";
	/**
			 * Filters the arguments used to generate a Pages drop-down element.
			 *
			 * @since 3.3.0
			 *
			 * @see wp_dropdown_pages()
			 *
			 * @param array   $dropdown_args Array of arguments used to generate the pages drop-down.
			 * @param WP_Post $post          The current post.
			 * @Reference wp-admin\includes\meta-boxes.php apply_filters( 'page_attributes_dropdown_pages_args', $dropdown_args, $post )
	*/
	const PageAttributesDropdownPagesArgs = "page_attributes_dropdown_pages_args";
	/**
			 * Filters the list of CSS classes to include with each page item in the list.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_list_pages()
			 *
			 * @param string[] $css_class    An array of CSS classes to be applied to each list item.
			 * @param WP_Post  $page         Page data object.
			 * @param int      $depth        Depth of page, used for padding.
			 * @param array    $args         An array of arguments.
			 * @param int      $current_page ID of the current page.
			 * @Reference wp-includes\class-walker-page.php apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page )
	*/
	const PageCssClass = "page_css_class";
	/**
		 * Filters the permalink for a page.
		 *
		 * @since 1.5.0
		 *
		 * @param string $link    The page's permalink.
		 * @param int    $post_id The ID of the page.
		 * @param bool   $sample  Is it a sample permalink.
		 * @Reference wp-includes\link-template.php apply_filters( 'page_link', $link, $post->ID, $sample )
	*/
	const PageLink = "page_link";
	/**
			 * Filters the HTML attributes applied to a page menu item's anchor element.
			 *
			 * @since 4.8.0
			 *
			 * @param array $atts {
			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $href         The href attribute.
			 *     @type string $aria_current The aria-current attribute.
			 * }
			 * @param WP_Post $page         Page data object.
			 * @param int     $depth        Depth of page, used for padding.
			 * @param array   $args         An array of arguments.
			 * @param int     $current_page ID of the current page.
			 * @Reference wp-includes\class-walker-page.php apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page )
	*/
	const PageMenuLinkAttributes = "page_menu_link_attributes";
	/**
			 * Filters rewrite rules used for "page" post type archives.
			 *
			 * @since 1.5.0
			 *
			 * @param array $page_rewrite The rewrite rules for the "page" post type.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'page_rewrite_rules', $page_rewrite )
	*/
	const PageRewriteRules = "page_rewrite_rules";
	/**
				 * Filters the array of row action links on the Pages list table.
				 *
				 * The filter is evaluated only for hierarchical post types.
				 *
				 * @since 2.8.0
				 *
				 * @param string[] $actions An array of row action links. Defaults are
				 *                          'Edit', 'Quick Edit', 'Restore', 'Trash',
				 *                          'Delete Permanently', 'Preview', and 'View'.
				 * @param WP_Post  $post    The post object.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'page_row_actions', $actions, $post )
	*/
	const PageRowActions = "page_row_actions";
	/**
				 * Filters the paginated links for the given archive pages.
				 *
				 * @since 3.0.0
				 *
				 * @param string $link The paginated link URL.
				 * @Reference wp-includes\general-template.php apply_filters( 'paginate_links', $link )
	* @Reference wp-includes\general-template.php apply_filters( 'paginate_links', $link )
	* @Reference wp-includes\general-template.php apply_filters( 'paginate_links', $link )
	*/
	const PaginateLinks = "paginate_links";
	/**
	 * Filters the parent file of an admin menu sub-menu item.
	 *
	 * Allows plugins to move sub-menu items around.
	 *
	 * @since MU (3.0.0)
	 *
	 * @param string $parent_file The parent file.
	 * @Reference wp-admin\menu-header.php apply_filters( 'parent_file', $parent_file )
	*/
	const ParentFile = "parent_file";
	/**
	* @Reference wp-includes\deprecated.php apply_filters( "parent_post_rel_link", $link )
	*/
	const ParentPostRelLink = "parent_post_rel_link";
	/**
		 * Filters the path to a file in the parent theme.
		 *
		 * @since 4.7.0
		 *
		 * @param string $path The file path.
		 * @param string $file The requested file to search for.
		 * @Reference wp-includes\link-template.php apply_filters( 'parent_theme_file_path', $path, $file )
	*/
	const ParentThemeFilePath = "parent_theme_file_path";
	/**
		 * Filters the URL to a file in the parent theme.
		 *
		 * @since 4.7.0
		 *
		 * @param string $url  The file URL.
		 * @param string $file The requested file to search for.
		 * @Reference wp-includes\link-template.php apply_filters( 'parent_theme_file_uri', $url, $file )
	*/
	const ParentThemeFileUri = "parent_theme_file_uri";
	/**
				 * Filters the contents of the email sent when the user's password is changed.
				 *
				 * @since 4.3.0
				 *
				 * @param array $pass_change_email {
				 *            Used to build wp_mail().
				 *            @type string $to      The intended recipients. Add emails in a comma separated string.
				 *            @type string $subject The subject of the email.
				 *            @type string $message The content of the email.
				 *                The following strings have a special meaning and will get replaced dynamically:
				 *                - ###USERNAME###    The current user's username.
				 *                - ###ADMIN_EMAIL### The admin email in case this was unexpected.
				 *                - ###EMAIL###       The user's email address.
				 *                - ###SITENAME###    The name of the site.
				 *                - ###SITEURL###     The URL to the site.
				 *            @type string $headers Headers. Add headers in a newline (\r\n) separated string.
				 *        }
				 * @param array $user     The original user array.
				 * @param array $userdata The updated user array.
				 * @Reference wp-includes\user.php apply_filters( 'password_change_email', $pass_change_email, $user, $userdata )
	*/
	const PasswordChangeEmail = "password_change_email";
	/**
		 * Filters the text describing the site's password complexity policy.
		 *
		 * @since 4.1.0
		 *
		 * @param string $hint The password hint text.
		 * @Reference wp-includes\user.php apply_filters( 'password_hint', $hint )
	*/
	const PasswordHint = "password_hint";
	/**
		 * Filters the expiration time of password reset keys.
		 *
		 * @since 4.3.0
		 *
		 * @param int $expiration The expiration time in seconds.
		 * @Reference wp-includes\user.php apply_filters( 'password_reset_expiration', DAY_IN_SECONDS )
	*/
	const PasswordResetExpiration = "password_reset_expiration";
	/**
			 * Filters the return value of check_password_reset_key() when an
			 * old-style key is used.
			 *
			 * @since 3.7.0 Previously plain-text keys were stored in the database.
			 * @since 4.3.0 Previously key hashes were stored without an expiration time.
			 *
			 * @param WP_Error $return  A WP_Error object denoting an expired key.
			 *                          Return a WP_User object to validate the key.
			 * @param int      $user_id The matched user ID.
			 * @Reference wp-includes\user.php apply_filters( 'password_reset_key_expired', $return, $user_id )
	*/
	const PasswordResetKeyExpired = "password_reset_key_expired";
	/**
		 * Filters the content of the post submitted by email before saving.
		 *
		 * @since 1.2.0
		 *
		 * @param string $content The email content.
		 * @Reference wp-mail.php apply_filters( 'phone_content', $content )
	*/
	const PhoneContent = "phone_content";
	/**
			 * Filters the pingback source URI.
			 *
			 * @since 3.6.0
			 *
			 * @param string $pagelinkedfrom URI of the page linked from.
			 * @param string $pagelinkedto   URI of the page linked to.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'pingback_ping_source_uri', $pagelinkedfrom, $pagelinkedto )
	*/
	const PingbackPingSourceUri = "pingback_ping_source_uri";
	/**
				 * Filters the user agent sent when pinging-back a URL.
				 *
				 * @since 2.9.0
				 *
				 * @param string $concat_useragent    The user agent concatenated with ' -- WordPress/'
				 *                                    and the WordPress version.
				 * @param string $useragent           The useragent.
				 * @param string $pingback_server_url The server URL being linked to.
				 * @param string $pagelinkedto        URL of page linked to.
				 * @param string $pagelinkedfrom      URL of page linked from.
				 * @Reference wp-includes\comment.php apply_filters( 'pingback_useragent', $client->useragent . ' -- WordPress/' . get_bloginfo( 'version' ), $client->useragent, $pingback_server_url, $pagelinkedto, $pagelinkedfrom )
	*/
	const PingbackUseragent = "pingback_useragent";
	/**
		 * Filters whether the current post is open for pings.
		 *
		 * @since 2.5.0
		 *
		 * @param bool $open    Whether the current post is open for pings.
		 * @param int  $post_id The post ID.
		 * @Reference wp-includes\comment-template.php apply_filters( 'pings_open', $open, $post_id )
	*/
	const PingsOpen = "pings_open";
	/**
				 * Filters the action links displayed for each plugin in the Plugins list table.
				 *
				 * @since 2.5.0
				 * @since 2.6.0 The `$context` parameter was added.
				 * @since 4.9.0 The 'Edit' link was removed from the list of action links.
				 *
				 * @param string[] $actions     An array of plugin action links. By default this can include 'activate',
				 *                              'deactivate', and 'delete'. With Multisite active this can also include
				 *                              'network_active' and 'network_only' items.
				 * @param string   $plugin_file Path to the plugin file relative to the plugins directory.
				 * @param array    $plugin_data An array of plugin data. See `get_plugin_data()`.
				 * @param string   $context     The plugin context. By default this can include 'all', 'active', 'inactive',
				 *                              'recently_activated', 'upgrade', 'mustuse', 'dropins', and 'search'.
				 * @Reference wp-admin\includes\class-wp-plugins-list-table.php apply_filters( 'plugin_action_links', $actions, $plugin_file, $plugin_data, $context )
	*/
	const PluginActionLinks = "plugin_action_links";
	/**
			 * Filters the array of excluded directories and files while scanning the folder.
			 *
			 * @since 4.9.0
			 *
			 * @param string[] $exclusions Array of excluded directories and files.
			 * @Reference wp-admin\includes\plugin.php apply_filters( 'plugin_files_exclusions', array( 'CVS', 'node_modules', 'vendor', 'bower_components' ) )
	*/
	const PluginFilesExclusions = "plugin_files_exclusions";
	/**
				 * Filters the install action links for a plugin.
				 *
				 * @since 2.7.0
				 *
				 * @param string[] $action_links An array of plugin action links. Defaults are links to Details and Install Now.
				 * @param array    $plugin       The plugin currently being listed.
				 * @Reference wp-admin\includes\class-wp-plugin-install-list-table.php apply_filters( 'plugin_install_action_links', $action_links, $plugin )
	*/
	const PluginInstallActionLinks = "plugin_install_action_links";
	/**
		 * Filters a plugin's locale.
		 *
		 * @since 3.0.0
		 *
		 * @param string $locale The plugin's current locale.
		 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'plugin_locale', determine_locale(), $domain )
	* @Reference wp-includes\l10n.php apply_filters( 'plugin_locale', determine_locale(), $domain )
	*/
	const PluginLocale = "plugin_locale";
	/**
						 * Filters the array of row meta for each plugin in the Plugins list table.
						 *
						 * @since 2.8.0
						 *
						 * @param string[] $plugin_meta An array of the plugin's metadata,
						 *                              including the version, author,
						 *                              author URI, and plugin URI.
						 * @param string   $plugin_file Path to the plugin file relative to the plugins directory.
						 * @param array    $plugin_data An array of plugin data.
						 * @param string   $status      Status of the plugin. Defaults are 'All', 'Active',
						 *                              'Inactive', 'Recently Activated', 'Upgrade', 'Must-Use',
						 *                              'Drop-ins', 'Search', 'Paused'.
						 * @Reference wp-admin\includes\class-wp-plugins-list-table.php apply_filters( 'plugin_row_meta', $plugin_meta, $plugin_file, $plugin_data, $status )
	*/
	const PluginRowMeta = "plugin_row_meta";
	/**
		 * Filters the response for the current WordPress.org Plugin Installation API request.
		 *
		 * Passing a non-false value will effectively short-circuit the WordPress.org API request.
		 *
		 * If `$action` is 'query_plugins' or 'plugin_information', an object MUST be passed.
		 * If `$action` is 'hot_tags' or 'hot_categories', an array should be passed.
		 *
		 * @since 2.7.0
		 *
		 * @param false|object|array $result The result object or array. Default false.
		 * @param string             $action The type of information being requested from the Plugin Installation API.
		 * @param object             $args   Plugin API arguments.
		 * @Reference wp-admin\includes\plugin-install.php apply_filters( 'plugins_api', false, $action, $args )
	*/
	const PluginsApi = "plugins_api";
	/**
		 * Filters the WordPress.org Plugin Installation API arguments.
		 *
		 * Important: An object MUST be returned to this filter.
		 *
		 * @since 2.7.0
		 *
		 * @param object $args   Plugin API arguments.
		 * @param string $action The type of information being requested from the Plugin Installation API.
		 * @Reference wp-admin\includes\plugin-install.php apply_filters( 'plugins_api_args', $args, $action )
	*/
	const PluginsApiArgs = "plugins_api_args";
	/**
		 * Filters the Plugin Installation API response results.
		 *
		 * @since 2.7.0
		 *
		 * @param object|WP_Error $res    Response object or WP_Error.
		 * @param string          $action The type of information being requested from the Plugin Installation API.
		 * @param object          $args   Plugin API arguments.
		 * @Reference wp-admin\includes\plugin-install.php apply_filters( 'plugins_api_result', $res, $action, $args )
	*/
	const PluginsApiResult = "plugins_api_result";
	/**
		 * Filters the locales requested for plugin translations.
		 *
		 * @since 3.7.0
		 * @since 4.5.0 The default value of the `$locales` parameter changed to include all locales.
		 *
		 * @param array $locales Plugin locales. Default is all available locales of the site.
		 * @Reference wp-includes\update.php apply_filters( 'plugins_update_check_locales', $locales )
	*/
	const PluginsUpdateCheckLocales = "plugins_update_check_locales";
	/**
		 * Filters the URL to the plugins directory.
		 *
		 * @since 2.8.0
		 *
		 * @param string $url    The complete URL to the plugins directory including scheme and path.
		 * @param string $path   Path relative to the URL to the plugins directory. Blank string
		 *                       if no path is specified.
		 * @param string $plugin The plugin file path to be relative to. Blank string if no plugin
		 *                       is specified.
		 * @Reference wp-includes\link-template.php apply_filters( 'plugins_url', $url, $path, $plugin )
	*/
	const PluginsUrl = "plugins_url";
	/**
		 * Filters the Plupload default parameters.
		 *
		 * @since 3.4.0
		 *
		 * @param array $params Default Plupload parameters array.
		 * @Reference wp-includes\media.php apply_filters( 'plupload_default_params', $params )
	*/
	const PluploadDefaultParams = "plupload_default_params";
	/**
		 * Filters the Plupload default settings.
		 *
		 * @since 3.4.0
		 *
		 * @param array $defaults Default Plupload settings array.
		 * @Reference wp-includes\media.php apply_filters( 'plupload_default_settings', $defaults )
	*/
	const PluploadDefaultSettings = "plupload_default_settings";
	/**
		 * Filters the default Plupload settings.
		 *
		 * @since 3.3.0
		 *
		 * @param array $plupload_init An array of default settings used by Plupload.
		 * @Reference wp-admin\includes\media.php apply_filters( 'plupload_init', $plupload_init )
	*/
	const PluploadInit = "plupload_init";
	/**
		 * Filters meta for a network on creation.
		 *
		 * @since 3.7.0
		 *
		 * @param array $sitemeta   Associative array of network meta keys and values to be inserted.
		 * @param int   $network_id ID of network to populate.
		 * @Reference wp-admin\includes\schema.php apply_filters( 'populate_network_meta', $sitemeta, $network_id )
	*/
	const PopulateNetworkMeta = "populate_network_meta";
	/**
		 * Filters meta for a site on creation.
		 *
		 * @since 5.2.0
		 *
		 * @param array $meta    Associative array of site meta keys and values to be inserted.
		 * @param int   $site_id ID of site to populate.
		 * @Reference wp-admin\includes\schema.php apply_filters( 'populate_site_meta', $meta, $site_id )
	*/
	const PopulateSiteMeta = "populate_site_meta";
	/**
		 * Filters the list of CSS class names for the current post.
		 *
		 * @since 2.7.0
		 *
		 * @param string[] $classes An array of post class names.
		 * @param string[] $class   An array of additional class names added to the post.
		 * @param int      $post_id The post ID.
		 * @Reference wp-includes\post-template.php apply_filters( 'post_class', $classes, $class, $post->ID )
	*/
	const PostClass = "post_class";
	/**
					 * Filters the links in `$taxonomy` column of edit.php.
					 *
					 * @since 5.2.0
					 *
					 * @param array  $term_links List of links to edit.php, filtered by the taxonomy term.
					 * @param string $taxonomy   Taxonomy name.
					 * @param array  $terms      Array of terms appearing in the post row.
					 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'post_column_taxonomy_links', $term_links, $taxonomy, $terms )
	*/
	const PostColumnTaxonomyLinks = "post_column_taxonomy_links";
	/**
		 * Filters the post comments feed permalink.
		 *
		 * @since 1.5.1
		 *
		 * @param string $url Post comments feed permalink.
		 * @Reference wp-includes\link-template.php apply_filters( 'post_comments_feed_link', $url )
	*/
	const PostCommentsFeedLink = "post_comments_feed_link";
	/**
		 * Filters the post comment feed link anchor tag.
		 *
		 * @since 2.8.0
		 *
		 * @param string $link    The complete anchor tag for the comment feed link.
		 * @param int    $post_id Post ID.
		 * @param string $feed    The feed type. Possible values include 'rss2', 'atom',
		 *                        or an empty string for the default feed type.
		 * @Reference wp-includes\link-template.php apply_filters( 'post_comments_feed_link_html', $link, $post_id, $feed )
	*/
	const PostCommentsFeedLinkHtml = "post_comments_feed_link_html";
	/**
		 * Filters the formatted post comments link HTML.
		 *
		 * @since 2.7.0
		 *
		 * @param string      $formatted The HTML-formatted post comments link.
		 * @param int|WP_Post $post      The post ID or WP_Post object.
		 * @Reference wp-includes\comment-template.php apply_filters( 'post_comments_link', $formatted_link, $post )
	*/
	const PostCommentsLink = "post_comments_link";
	/**
			 * Filters the status text of the post.
			 *
			 * @since 4.8.0
			 *
			 * @param string  $status      The status text.
			 * @param WP_Post $post        Post object.
			 * @param string  $column_name The column name.
			 * @param string  $mode        The list display mode ('excerpt' or 'list').
			 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'post_date_column_status', $status, $post, 'date', $mode )
	*/
	const PostDateColumnStatus = "post_date_column_status";
	/**
				 * Filters the published time of the post.
				 *
				 * If `$mode` equals 'excerpt', the published time and date are both displayed.
				 * If `$mode` equals 'list' (default), the publish date is displayed, with the
				 * time and date together available as an abbreviation definition.
				 *
				 * @since 2.5.1
				 *
				 * @param string  $t_time      The published time.
				 * @param WP_Post $post        Post object.
				 * @param string  $column_name The column name.
				 * @param string  $mode        The list display mode ('excerpt' or 'list').
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'post_date_column_time', $t_time, $post, 'date', $mode )
	* @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'post_date_column_time', $h_time, $post, 'date', $mode )
	*/
	const PostDateColumnTime = "post_date_column_time";
	/**
						 * Filters the arguments for the taxonomy parent dropdown on the Post Edit page.
						 *
						 * @since 4.4.0
						 *
						 * @param array $parent_dropdown_args {
						 *     Optional. Array of arguments to generate parent dropdown.
						 *
						 *     @type string   $taxonomy         Name of the taxonomy to retrieve.
						 *     @type bool     $hide_if_empty    True to skip generating markup if no
						 *                                      categories are found. Default 0.
						 *     @type string   $name             Value for the 'name' attribute
						 *                                      of the select element.
						 *                                      Default "new{$tax_name}_parent".
						 *     @type string   $orderby          Which column to use for ordering
						 *                                      terms. Default 'name'.
						 *     @type bool|int $hierarchical     Whether to traverse the taxonomy
						 *                                      hierarchy. Default 1.
						 *     @type string   $show_option_none Text to display for the "none" option.
						 *                                      Default "&mdash; {$parent} &mdash;",
						 *                                      where `$parent` is 'parent_item'
						 *                                      taxonomy label.
						 * }
						 * @Reference wp-admin\includes\meta-boxes.php apply_filters( 'post_edit_category_parent_dropdown_args', $parent_dropdown_args )
	*/
	const PostEditCategoryParentDropdownArgs = "post_edit_category_parent_dropdown_args";
	/**
		 * Filters the URL to embed a specific post.
		 *
		 * @since 4.4.0
		 *
		 * @param string  $embed_url The post embed URL.
		 * @param WP_Post $post      The corresponding post object.
		 * @Reference wp-includes\embed.php apply_filters( 'post_embed_url', $embed_url, $post )
	*/
	const PostEmbedUrl = "post_embed_url";
	/**
			 * Filters the post formats rewrite base.
			 *
			 * @since 3.1.0
			 *
			 * @param string $context Context of the rewrite base. Default 'type'.
			 * @Reference wp-includes\taxonomy.php apply_filters( 'post_format_rewrite_base', 'type' )
	*/
	const PostFormatRewriteBase = "post_format_rewrite_base";
	/**
		 * Filters the default gallery shortcode output.
		 *
		 * If the filtered output isn't empty, it will be used instead of generating
		 * the default gallery template.
		 *
		 * @since 2.5.0
		 * @since 4.2.0 The `$instance` parameter was added.
		 *
		 * @see gallery_shortcode()
		 *
		 * @param string $output   The gallery output. Default empty.
		 * @param array  $attr     Attributes of the gallery shortcode.
		 * @param int    $instance Unique numeric ID of this gallery shortcode instance.
		 * @Reference wp-includes\media.php apply_filters( 'post_gallery', '', $attr, $instance )
	*/
	const PostGallery = "post_gallery";
	/**
				 * Filters the LIMIT clause of the query.
				 *
				 * @since 2.1.0
				 *
				 * @param string   $limits The LIMIT clause of the query.
				 * @param WP_Query $this   The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'post_limits', array( $limits, &$this ) )
	*/
	const PostLimits = "post_limits";
	/**
				 * Filters the LIMIT clause of the query.
				 *
				 * For use by caching plugins.
				 *
				 * @since 2.5.0
				 *
				 * @param string   $limits The LIMIT clause of the query.
				 * @param WP_Query $this   The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'post_limits_request', array( $limits, &$this ) )
	*/
	const PostLimitsRequest = "post_limits_request";
	/**
		 * Filters the permalink for a post.
		 *
		 * Only applies to posts with post_type of 'post'.
		 *
		 * @since 1.5.0
		 *
		 * @param string  $permalink The post's permalink.
		 * @param WP_Post $post      The post in question.
		 * @param bool    $leavename Whether to keep the post name.
		 * @Reference wp-includes\link-template.php apply_filters( 'post_link', $permalink, $post, $leavename )
	*/
	const PostLink = "post_link";
	/**
					 * Filters the category that gets used in the %category% permalink token.
					 *
					 * @since 3.5.0
					 *
					 * @param WP_Term  $cat  The category to use in the permalink.
					 * @param array    $cats Array of all categories (WP_Term objects) associated with the post.
					 * @param WP_Post  $post The post in question.
					 * @Reference wp-includes\link-template.php apply_filters( 'post_link_category', $cats[0], $cats, $post )
	*/
	const PostLinkCategory = "post_link_category";
	/**
		 * Filters the default list of post mime types.
		 *
		 * @since 2.5.0
		 *
		 * @param array $post_mime_types Default list of post mime types.
		 * @Reference wp-includes\post.php apply_filters( 'post_mime_types', $post_mime_types )
	*/
	const PostMimeTypes = "post_mime_types";
	/**
			 * Filters the life span of the post password cookie.
			 *
			 * By default, the cookie expires 10 days from creation. To turn this
			 * into a session cookie, return 0.
			 *
			 * @since 3.7.0
			 *
			 * @param int $expires The expiry time, as passed to setcookie().
			 * @Reference wp-login.php apply_filters( 'post_password_expires', time() + 10 * DAY_IN_SECONDS )
	*/
	const PostPasswordExpires = "post_password_expires";
	/**
		 * Filters whether a post requires the user to supply a password.
		 *
		 * @since 4.7.0
		 *
		 * @param bool    $required Whether the user needs to supply a password. True if password has not been
		 *                          provided or is incorrect, false if password has been supplied or is not required.
		 * @param WP_Post $post     Post data.
		 * @Reference wp-includes\post-template.php apply_filters( 'post_password_required', $required, $post )
	* @Reference wp-includes\post-template.php apply_filters( 'post_password_required', false, $post )
	* @Reference wp-includes\post-template.php apply_filters( 'post_password_required', true, $post )
	*/
	const PostPasswordRequired = "post_password_required";
	/**
		 * Filters the playlist output.
		 *
		 * Passing a non-empty value to the filter will short-circuit generation
		 * of the default playlist output, returning the passed value instead.
		 *
		 * @since 3.9.0
		 * @since 4.2.0 The `$instance` parameter was added.
		 *
		 * @param string $output   Playlist output. Default empty.
		 * @param array  $attr     An array of shortcode attributes.
		 * @param int    $instance Unique numeric ID of this playlist shortcode instance.
		 * @Reference wp-includes\media.php apply_filters( 'post_playlist', '', $attr, $instance )
	*/
	const PostPlaylist = "post_playlist";
	/**
			 * Filters rewrite rules used for "post" archives.
			 *
			 * @since 1.5.0
			 *
			 * @param array $post_rewrite The rewrite rules for posts.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'post_rewrite_rules', $post_rewrite )
	*/
	const PostRewriteRules = "post_rewrite_rules";
	/**
				 * Filters the array of row action links on the Posts list table.
				 *
				 * The filter is evaluated only for non-hierarchical post types.
				 *
				 * @since 2.8.0
				 *
				 * @param string[] $actions An array of row action links. Defaults are
				 *                          'Edit', 'Quick Edit', 'Restore', 'Trash',
				 *                          'Delete Permanently', 'Preview', and 'View'.
				 * @param WP_Post  $post    The post object.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'post_row_actions', $actions, $post )
	*/
	const PostRowActions = "post_row_actions";
	/**
		 * Filters the post thumbnail HTML.
		 *
		 * @since 2.9.0
		 *
		 * @param string       $html              The post thumbnail HTML.
		 * @param int          $post_id           The post ID.
		 * @param string       $post_thumbnail_id The post thumbnail ID.
		 * @param string|array $size              The post thumbnail size. Image size or array of width and height
		 *                                        values (in that order). Default 'post-thumbnail'.
		 * @param string       $attr              Query string of attributes.
		 * @Reference wp-includes\post-thumbnail-template.php apply_filters( 'post_thumbnail_html', $html, $post->ID, $post_thumbnail_id, $size, $attr )
	*/
	const PostThumbnailHtml = "post_thumbnail_html";
	/**
		 * Filters the post thumbnail size.
		 *
		 * @since 2.9.0
		 * @since 4.9.0 Added the `$post_id` parameter.
		 *
		 * @param string|array $size    The post thumbnail size. Image size or array of width and height
		 *                              values (in that order). Default 'post-thumbnail'.
		 * @param int          $post_id The post ID.
		 * @Reference wp-includes\post-thumbnail-template.php apply_filters( 'post_thumbnail_size', $size, $post->ID )
	*/
	const PostThumbnailSize = "post_thumbnail_size";
	/**
		 * Filters the post type archive feed link.
		 *
		 * @since 3.1.0
		 *
		 * @param string $link The post type archive feed link.
		 * @param string $feed Feed type. Possible values include 'rss2', 'atom'.
		 * @Reference wp-includes\link-template.php apply_filters( 'post_type_archive_feed_link', $link, $feed )
	*/
	const PostTypeArchiveFeedLink = "post_type_archive_feed_link";
	/**
		 * Filters the post type archive permalink.
		 *
		 * @since 3.1.0
		 *
		 * @param string $link      The post type archive permalink.
		 * @param string $post_type Post type name.
		 * @Reference wp-includes\link-template.php apply_filters( 'post_type_archive_link', $link, $post_type )
	* @Reference wp-includes\link-template.php apply_filters( 'post_type_archive_link', $link, $post_type )
	*/
	const PostTypeArchiveLink = "post_type_archive_link";
	/**
		 * Filters the post type archive title.
		 *
		 * @since 3.1.0
		 *
		 * @param string $post_type_name Post type 'name' label.
		 * @param string $post_type      Post type.
		 * @Reference wp-includes\general-template.php apply_filters( 'post_type_archive_title', $post_type_obj->labels->name, $post_type )
	*/
	const PostTypeArchiveTitle = "post_type_archive_title";
	/**
		 * Filters the permalink for a post of a custom post type.
		 *
		 * @since 3.0.0
		 *
		 * @param string  $post_link The post's permalink.
		 * @param WP_Post $post      The post in question.
		 * @param bool    $leavename Whether to keep the post name.
		 * @param bool    $sample    Is it a sample permalink.
		 * @Reference wp-includes\link-template.php apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample )
	*/
	const PostTypeLink = "post_type_link";
	/**
			 * Filters the list of post types to delete with a user.
			 *
			 * @since 3.4.0
			 *
			 * @param string[] $post_types_to_delete Array of post types to delete.
			 * @param int      $id                   User ID.
			 * @Reference wp-admin\includes\user.php apply_filters( 'post_types_to_delete_with_user', $post_types_to_delete, $id )
	*/
	const PostTypesToDeleteWithUser = "post_types_to_delete_with_user";
	/**
	 * Filters the post updated messages.
	 *
	 * @since 3.0.0
	 *
	 * @param array[] $messages Post updated messages. For defaults see `$messages` declarations above.
	 * @Reference wp-admin\edit-form-advanced.php apply_filters( 'post_updated_messages', $messages )
	*/
	const PostUpdatedMessages = "post_updated_messages";
	/**
		 * Filters values for the meta key dropdown in the Custom Fields meta box.
		 *
		 * Returning a non-null value will effectively short-circuit and avoid a
		 * potentially expensive query against postmeta.
		 *
		 * @since 4.4.0
		 *
		 * @param array|null $keys Pre-defined meta keys to be used in place of a postmeta query. Default null.
		 * @param WP_Post    $post The current post object.
		 * @Reference wp-admin\includes\template.php apply_filters( 'postmeta_form_keys', null, $post )
	*/
	const PostmetaFormKeys = "postmeta_form_keys";
	/**
			 * Filters the number of custom fields to retrieve for the drop-down
			 * in the Custom Fields meta box.
			 *
			 * @since 2.1.0
			 *
			 * @param int $limit Number of custom fields to retrieve. Default 30.
			 * @Reference wp-admin\includes\template.php apply_filters( 'postmeta_form_limit', 30 )
	*/
	const PostmetaFormLimit = "postmeta_form_limit";
	/**
				 * Filters all query clauses at once, for convenience.
				 *
				 * Covers the WHERE, GROUP BY, JOIN, ORDER BY, DISTINCT,
				 * fields (SELECT), and LIMITS clauses.
				 *
				 * @since 3.1.0
				 *
				 * @param string[] $clauses Associative array of the clauses for the query.
				 * @param WP_Query $this    The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_clauses', array( compact( $pieces ), &$this ) )
	*/
	const PostsClauses = "posts_clauses";
	/**
				 * Filters all query clauses at once, for convenience.
				 *
				 * For use by caching plugins.
				 *
				 * Covers the WHERE, GROUP BY, JOIN, ORDER BY, DISTINCT,
				 * fields (SELECT), and LIMITS clauses.
				 *
				 * @since 3.1.0
				 *
				 * @param string[] $pieces Associative array of the pieces of the query.
				 * @param WP_Query $this   The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_clauses_request', array( compact( $pieces ), &$this ) )
	*/
	const PostsClausesRequest = "posts_clauses_request";
	/**
				 * Filters the DISTINCT clause of the query.
				 *
				 * @since 2.1.0
				 *
				 * @param string   $distinct The DISTINCT clause of the query.
				 * @param WP_Query $this     The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_distinct', array( $distinct, &$this ) )
	*/
	const PostsDistinct = "posts_distinct";
	/**
				 * Filters the DISTINCT clause of the query.
				 *
				 * For use by caching plugins.
				 *
				 * @since 2.5.0
				 *
				 * @param string   $distinct The DISTINCT clause of the query.
				 * @param WP_Query $this     The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_distinct_request', array( $distinct, &$this ) )
	*/
	const PostsDistinctRequest = "posts_distinct_request";
	/**
				 * Filters the SELECT clause of the query.
				 *
				 * @since 2.1.0
				 *
				 * @param string   $fields The SELECT clause of the query.
				 * @param WP_Query $this   The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_fields', array( $fields, &$this ) )
	*/
	const PostsFields = "posts_fields";
	/**
				 * Filters the SELECT clause of the query.
				 *
				 * For use by caching plugins.
				 *
				 * @since 2.5.0
				 *
				 * @param string   $fields The SELECT clause of the query.
				 * @param WP_Query $this   The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_fields_request', array( $fields, &$this ) )
	*/
	const PostsFieldsRequest = "posts_fields_request";
	/**
				 * Filters the GROUP BY clause of the query.
				 *
				 * @since 2.0.0
				 *
				 * @param string   $groupby The GROUP BY clause of the query.
				 * @param WP_Query $this    The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_groupby', array( $groupby, &$this ) )
	*/
	const PostsGroupby = "posts_groupby";
	/**
				 * Filters the GROUP BY clause of the query.
				 *
				 * For use by caching plugins.
				 *
				 * @since 2.5.0
				 *
				 * @param string   $groupby The GROUP BY clause of the query.
				 * @param WP_Query $this    The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_groupby_request', array( $groupby, &$this ) )
	*/
	const PostsGroupbyRequest = "posts_groupby_request";
	/**
				 * Filters the JOIN clause of the query.
				 *
				 * @since 1.5.0
				 *
				 * @param string   $join  The JOIN clause of the query.
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_join', array( $join, &$this ) )
	*/
	const PostsJoin = "posts_join";
	/**
				 * Filters the JOIN clause of the query.
				 *
				 * Specifically for manipulating paging queries.
				 *
				 * @since 1.5.0
				 *
				 * @param string   $join  The JOIN clause of the query.
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_join_paged', array( $join, &$this ) )
	*/
	const PostsJoinPaged = "posts_join_paged";
	/**
				 * Filters the JOIN clause of the query.
				 *
				 * For use by caching plugins.
				 *
				 * @since 2.5.0
				 *
				 * @param string   $join  The JOIN clause of the query.
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_join_request', array( $join, &$this ) )
	*/
	const PostsJoinRequest = "posts_join_request";
	/**
				 * Filters the ORDER BY clause of the query.
				 *
				 * @since 1.5.1
				 *
				 * @param string   $orderby The ORDER BY clause of the query.
				 * @param WP_Query $this    The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_orderby', array( $orderby, &$this ) )
	*/
	const PostsOrderby = "posts_orderby";
	/**
				 * Filters the ORDER BY clause of the query.
				 *
				 * For use by caching plugins.
				 *
				 * @since 2.5.0
				 *
				 * @param string   $orderby The ORDER BY clause of the query.
				 * @param WP_Query $this    The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_orderby_request', array( $orderby, &$this ) )
	*/
	const PostsOrderbyRequest = "posts_orderby_request";
	/**
			 * Filters the posts array before the query takes place.
			 *
			 * Return a non-null value to bypass WordPress's default post queries.
			 *
			 * Filtering functions that require pagination information are encouraged to set
			 * the `found_posts` and `max_num_pages` properties of the WP_Query object,
			 * passed to the filter by reference. If WP_Query does not perform a database
			 * query, it will not have enough information to generate these values itself.
			 *
			 * @since 4.6.0
			 *
			 * @param array|null $posts Return an array of post data to short-circuit WP's query,
			 *                          or null to allow WP to run its normal queries.
			 * @param WP_Query   $this  The WP_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_pre_query', array( null, &$this ) )
	*/
	const PostsPreQuery = "posts_pre_query";
	/**
				 * Filters the completed SQL query before sending.
				 *
				 * @since 2.0.0
				 *
				 * @param string   $request The complete SQL query.
				 * @param WP_Query $this    The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_request', array( $this->request, &$this ) )
	*/
	const PostsRequest = "posts_request";
	/**
					 * Filters the Post IDs SQL request before sending.
					 *
					 * @since 3.4.0
					 *
					 * @param string   $request The post ID request.
					 * @param WP_Query $this    The WP_Query instance.
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_request_ids', $this->request, $this )
	*/
	const PostsRequestIds = "posts_request_ids";
	/**
				 * Filters the raw post results array, prior to status checks.
				 *
				 * @since 2.3.0
				 *
				 * @param WP_Post[] $posts Array of post objects.
				 * @param WP_Query  $this  The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_results', array( $this->posts, &$this ) )
	*/
	const PostsResults = "posts_results";
	/**
				 * Filters the search SQL that is used in the WHERE clause of WP_Query.
				 *
				 * @since 3.0.0
				 *
				 * @param string   $search Search SQL for WHERE clause.
				 * @param WP_Query $this   The current WP_Query object.
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_search', array( $search, &$this ) )
	*/
	const PostsSearch = "posts_search";
	/**
					 * Filters the ORDER BY used when ordering search results.
					 *
					 * @since 3.7.0
					 *
					 * @param string   $search_orderby The ORDER BY clause.
					 * @param WP_Query $this           The current WP_Query instance.
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_search_orderby', $search_orderby, $this )
	*/
	const PostsSearchOrderby = "posts_search_orderby";
	/**
				 * Filters the WHERE clause of the query.
				 *
				 * @since 1.5.0
				 *
				 * @param string   $where The WHERE clause of the query.
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_where', array( $where, &$this ) )
	*/
	const PostsWhere = "posts_where";
	/**
				 * Filters the WHERE clause of the query.
				 *
				 * Specifically for manipulating paging queries.
				 *
				 * @since 1.5.0
				 *
				 * @param string   $where The WHERE clause of the query.
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_where_paged', array( $where, &$this ) )
	*/
	const PostsWherePaged = "posts_where_paged";
	/**
				 * Filters the WHERE clause of the query.
				 *
				 * For use by caching plugins.
				 *
				 * @since 2.5.0
				 *
				 * @param string   $where The WHERE clause of the query.
				 * @param WP_Query $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'posts_where_request', array( $where, &$this ) )
	*/
	const PostsWhereRequest = "posts_where_request";
	/**
				 * Filters all options before caching them.
				 *
				 * @since 4.9.0
				 *
				 * @param array $alloptions Array with all options.
				 * @Reference wp-includes\option.php apply_filters( 'pre_cache_alloptions', $alloptions )
	*/
	const PreCacheAlloptions = "pre_cache_alloptions";
	/**
				 * Filters the category nicename before it is sanitized.
				 *
				 * Use the {@see 'pre_$taxonomy_$field'} hook instead.
				 *
				 * @since 2.0.3
				 *
				 * @param string $value The category nicename.
				 * @Reference wp-includes\taxonomy.php apply_filters( 'pre_category_nicename', $value )
	*/
	const PreCategoryNicename = "pre_category_nicename";
	/**
		 * Filter to preflight or hijack clearing a scheduled hook.
		 *
		 * Returning a non-null value will short-circuit the normal unscheduling
		 * process, causing the function to return the filtered value instead.
		 *
		 * For plugins replacing wp-cron, return the number of events successfully
		 * unscheduled (zero if no events were registered with the hook) or false
		 * if unscheduling one or more events fails.
		 *
		 * @since 5.1.0
		 *
		 * @param null|int|false $pre  Value to return instead. Default null to continue unscheduling the event.
		 * @param string         $hook Action hook, the execution of which will be unscheduled.
		 * @param array          $args Arguments to pass to the hook's callback function.
		 * @Reference wp-includes\cron.php apply_filters( 'pre_clear_scheduled_hook', null, $hook, $args )
	*/
	const PreClearScheduledHook = "pre_clear_scheduled_hook";
	/**
		 * Filters a comment's approval status before it is set.
		 *
		 * @since 2.1.0
		 * @since 4.9.0 Returning a WP_Error value from the filter will shortcircuit comment insertion and
		 *              allow skipping further processing.
		 *
		 * @param int|string|WP_Error $approved    The approval status. Accepts 1, 0, 'spam' or WP_Error.
		 * @param array               $commentdata Comment data.
		 * @Reference wp-includes\comment.php apply_filters( 'pre_comment_approved', $approved, $commentdata )
	*/
	const PreCommentApproved = "pre_comment_approved";
	/**
			 * Filters the comment author's email cookie before it is set.
			 *
			 * When this filter hook is evaluated in wp_filter_comment(),
			 * the comment author's email string is passed.
			 *
			 * @since 1.5.0
			 *
			 * @param string $author_email_cookie The comment author email cookie.
			 * @Reference wp-includes\comment.php apply_filters( 'pre_comment_author_email', $_COOKIE[ 'comment_author_email_' . COOKIEHASH ] )
	* @Reference wp-includes\comment.php apply_filters( 'pre_comment_author_email', $commentdata['comment_author_email'] )
	*/
	const PreCommentAuthorEmail = "pre_comment_author_email";
	/**
			 * Filters the comment author's name cookie before it is set.
			 *
			 * When this filter hook is evaluated in wp_filter_comment(),
			 * the comment author's name string is passed.
			 *
			 * @since 1.5.0
			 *
			 * @param string $author_cookie The comment author name cookie.
			 * @Reference wp-includes\comment.php apply_filters( 'pre_comment_author_name', $_COOKIE[ 'comment_author_' . COOKIEHASH ] )
	* @Reference wp-includes\comment.php apply_filters( 'pre_comment_author_name', $commentdata['comment_author'] )
	*/
	const PreCommentAuthorName = "pre_comment_author_name";
	/**
			 * Filters the comment author's URL cookie before it is set.
			 *
			 * When this filter hook is evaluated in wp_filter_comment(),
			 * the comment author's URL string is passed.
			 *
			 * @since 1.5.0
			 *
			 * @param string $author_url_cookie The comment author URL cookie.
			 * @Reference wp-includes\comment.php apply_filters( 'pre_comment_author_url', $_COOKIE[ 'comment_author_url_' . COOKIEHASH ] )
	* @Reference wp-includes\comment.php apply_filters( 'pre_comment_author_url', $commentdata['comment_author_url'] )
	*/
	const PreCommentAuthorUrl = "pre_comment_author_url";
	/**
		 * Filters the comment content before it is set.
		 *
		 * @since 1.5.0
		 *
		 * @param string $comment_content The comment content.
		 * @Reference wp-includes\comment.php apply_filters( 'pre_comment_content', $commentdata['comment_content'] )
	*/
	const PreCommentContent = "pre_comment_content";
	/**
		 * Filters the comment author's browser user agent before it is set.
		 *
		 * @since 1.5.0
		 *
		 * @param string $comment_agent The comment author's browser user agent.
		 * @Reference wp-includes\comment.php apply_filters( 'pre_comment_user_agent', ( isset( $commentdata['comment_agent'] ) ? $commentdata['comment_agent'] : '' ) )
	*/
	const PreCommentUserAgent = "pre_comment_user_agent";
	/**
		 * Filters the comment author's IP address before it is set.
		 *
		 * @since 1.5.0
		 *
		 * @param string $comment_author_ip The comment author's IP address.
		 * @Reference wp-includes\comment.php apply_filters( 'pre_comment_user_ip', $commentdata['comment_author_IP'] )
	*/
	const PreCommentUserIp = "pre_comment_user_ip";
	/**
		 * Filter the user count before queries are run. Return a non-null value to cause count_users()
		 * to return early.
		 *
		 * @since 5.1.0
		 *
		 * @param null|string $result   Default null.
		 * @param string      $strategy Optional. The computational strategy to use when counting the users.
		 *                              Accepts either 'time' or 'memory'. Default 'time'.
		 * @param int|null    $site_id  Optional. The site ID to count users for. Defaults to the current site.
		 * @Reference wp-includes\user.php apply_filters( 'pre_count_users', null, $strategy, $site_id )
	*/
	const PreCountUsers = "pre_count_users";
	/**
		 * Filters whether a post deletion should take place.
		 *
		 * @since 4.4.0
		 *
		 * @param bool|null $delete       Whether to go forward with deletion.
		 * @param WP_Post   $post         Post object.
		 * @param bool      $force_delete Whether to bypass the trash.
		 * @Reference wp-includes\post.php apply_filters( 'pre_delete_post', null, $post, $force_delete )
	*/
	const PreDeletePost = "pre_delete_post";
	/**
		 * Filters the locale for the current request prior to the default determination process.
		 *
		 * Using this filter allows to override the default logic, effectively short-circuiting the function.
		 *
		 * @since 5.0.0
		 *
		 * @param string|null The locale to return and short-circuit, or null as default.
		 * @Reference wp-includes\l10n.php apply_filters( 'pre_determine_locale', null )
	*/
	const PreDetermineLocale = "pre_determine_locale";
	/**
		 * Filters whether to call a shortcode callback.
		 *
		 * Returning a non-false value from filter will short-circuit the
		 * shortcode generation process, returning that value instead.
		 *
		 * @since 4.7.0
		 *
		 * @param false|string $return      Short-circuit return value. Either false or the value to replace the shortcode with.
		 * @param string       $tag         Shortcode name.
		 * @param array|string $attr        Shortcode attributes array or empty string.
		 * @param array        $m           Regular expression match array.
		 * @Reference wp-includes\shortcodes.php apply_filters( 'pre_do_shortcode_tag', false, $tag, $attr, $m )
	*/
	const PreDoShortcodeTag = "pre_do_shortcode_tag";
	/**
		 * Filters text before named entities are converted into numbered entities.
		 *
		 * A non-null string must be returned for the filter to be evaluated.
		 *
		 * @since 3.3.0
		 *
		 * @param string|null $converted_text The text to be converted. Default null.
		 * @param string      $text           The text prior to entity conversion.
		 * @Reference wp-includes\formatting.php apply_filters( 'pre_ent2ncr', null, $text )
	*/
	const PreEnt2ncr = "pre_ent2ncr";
	/**
			 * Filters whether to retrieve the avatar URL early.
			 *
			 * Passing a non-null value will effectively short-circuit get_avatar(), passing
			 * the value through the {@see 'get_avatar'} filter and returning early.
			 *
			 * @since 4.2.0
			 *
			 * @param string|null $avatar      HTML for the user's avatar. Default null.
			 * @param mixed       $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
			 *                                 user email, WP_User object, WP_Post object, or WP_Comment object.
			 * @param array       $args        Arguments passed to get_avatar_url(), after processing.
			 * @Reference wp-includes\pluggable.php apply_filters( 'pre_get_avatar', null, $id_or_email, $args )
	*/
	const PreGetAvatar = "pre_get_avatar";
	/**
		 * Filters whether to retrieve the avatar URL early.
		 *
		 * Passing a non-null value in the 'url' member of the return array will
		 * effectively short circuit get_avatar_data(), passing the value through
		 * the {@see 'get_avatar_data'} filter and returning early.
		 *
		 * @since 4.2.0
		 *
		 * @param array $args        Arguments passed to get_avatar_data(), after processing.
		 * @param mixed $id_or_email The Gravatar to retrieve. Accepts a user ID, Gravatar MD5 hash,
		 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
		 * @Reference wp-includes\link-template.php apply_filters( 'pre_get_avatar_data', $args, $id_or_email )
	*/
	const PreGetAvatarData = "pre_get_avatar_data";
	/**
		 * Filters the list of a user's sites before it is populated.
		 *
		 * Passing a non-null value to the filter will effectively short circuit
		 * get_blogs_of_user(), returning that value instead.
		 *
		 * @since 4.6.0
		 *
		 * @param null|array $sites   An array of site objects of which the user is a member.
		 * @param int        $user_id User ID.
		 * @param bool       $all     Whether the returned array should contain all sites, including
		 *                            those marked 'deleted', 'archived', or 'spam'. Default false.
		 * @Reference wp-includes\user.php apply_filters( 'pre_get_blogs_of_user', null, $user_id, $all )
	*/
	const PreGetBlogsOfUser = "pre_get_blogs_of_user";
	/**
			 * Filters the column charset value before the DB is checked.
			 *
			 * Passing a non-null value to the filter will short-circuit
			 * checking the DB for the charset, returning that value instead.
			 *
			 * @since 4.2.0
			 *
			 * @param string|null $charset The character set to use. Default null.
			 * @param string      $table   The name of the table being checked.
			 * @param string      $column  The name of the column being checked.
			 * @Reference wp-includes\wp-db.php apply_filters( 'pre_get_col_charset', null, $table, $column )
	*/
	const PreGetColCharset = "pre_get_col_charset";
	/**
		 * Filters the document title before it is generated.
		 *
		 * Passing a non-empty value will short-circuit wp_get_document_title(),
		 * returning that value instead.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The document title. Default empty string.
		 * @Reference wp-includes\general-template.php apply_filters( 'pre_get_document_title', '' )
	*/
	const PreGetDocumentTitle = "pre_get_document_title";
	/**
		 * Pre-filter the return value of get_lastpostmodified() before the query is run.
		 *
		 * @since 4.4.0
		 *
		 * @param string|false $lastpostmodified The most recent time that a post was modified, in 'Y-m-d H:i:s' format, or
		 *                                       false. Returning anything other than false will short-circuit the function.
		 * @param string       $timezone         Location to use for getting the post modified date.
		 *                                       See get_lastpostdate() for accepted `$timezone` values.
		 * @param string       $post_type        The post type to check.
		 * @Reference wp-includes\post.php apply_filters( 'pre_get_lastpostmodified', false, $timezone, $post_type )
	*/
	const PreGetLastpostmodified = "pre_get_lastpostmodified";
	/**
			 * Filters the main site ID.
			 *
			 * Returning a positive integer will effectively short-circuit the function.
			 *
			 * @since 4.9.0
			 *
			 * @param int|null   $main_site_id If a positive integer is returned, it is interpreted as the main site ID.
			 * @param WP_Network $network      The network object for which the main site was detected.
			 * @Reference wp-includes\class-wp-network.php apply_filters( 'pre_get_main_site_id', null, $this )
	*/
	const PreGetMainSiteId = "pre_get_main_site_id";
	/**
			 * Determine a network by its domain and path.
			 *
			 * This allows one to short-circuit the default logic, perhaps by
			 * replacing it with a routine that is more optimal for your setup.
			 *
			 * Return null to avoid the short-circuit. Return false if no network
			 * can be found at the requested domain and path. Otherwise, return
			 * an object from wp_get_network().
			 *
			 * @since 3.9.0
			 *
			 * @param null|bool|WP_Network $network  Network value to return by path.
			 * @param string               $domain   The requested domain.
			 * @param string               $path     The requested path, in full.
			 * @param int|null             $segments The suggested number of paths to consult.
			 *                                       Default null, meaning the entire path was to be consulted.
			 * @param string[]             $paths    Array of paths to search for, based on `$path` and `$segments`.
			 * @Reference wp-includes\class-wp-network.php apply_filters( 'pre_get_network_by_path', null, $domain, $path, $segments, $paths )
	*/
	const PreGetNetworkByPath = "pre_get_network_by_path";
	/**
		 * Filter to preflight or hijack retrieving ready cron jobs.
		 *
		 * Returning an array will short-circuit the normal retrieval of ready
		 * cron jobs, causing the function to return the filtered value instead.
		 *
		 * @since 5.1.0
		 *
		 * @param null|array $pre Array of ready cron tasks to return instead. Default null
		 *                        to continue using results from _get_cron_array().
		 * @Reference wp-includes\cron.php apply_filters( 'pre_get_ready_cron_jobs', null )
	*/
	const PreGetReadyCronJobs = "pre_get_ready_cron_jobs";
	/**
		 * Filter to preflight or hijack retrieving a scheduled event.
		 *
		 * Returning a non-null value will short-circuit the normal process,
		 * returning the filtered value instead.
		 *
		 * Return false if the event does not exist, otherwise an event object
		 * should be returned.
		 *
		 * @since 5.1.0
		 *
		 * @param null|false|object $pre  Value to return instead. Default null to continue retrieving the event.
		 * @param string            $hook Action hook of the event.
		 * @param array             $args Array containing each separate argument to pass to the hook's callback function.
		 *                                Although not passed to a callback, these arguments are used to uniquely identify
		 *                                the event.
		 * @param int|null  $timestamp Unix timestamp (UTC) of the event. Null to retrieve next scheduled event.
		 * @Reference wp-includes\cron.php apply_filters( 'pre_get_scheduled_event', null, $hook, $args, $timestamp )
	*/
	const PreGetScheduledEvent = "pre_get_scheduled_event";
	/**
		 * Filters whether to preempt generating a shortlink for the given post.
		 *
		 * Passing a truthy value to the filter will effectively short-circuit the
		 * shortlink-generation process, returning that value instead.
		 *
		 * @since 3.0.0
		 *
		 * @param bool|string $return      Short-circuit return value. Either false or a URL string.
		 * @param int         $id          Post ID, or 0 for the current post.
		 * @param string      $context     The context for the link. One of 'post' or 'query',
		 * @param bool        $allow_slugs Whether to allow post slugs in the shortlink.
		 * @Reference wp-includes\link-template.php apply_filters( 'pre_get_shortlink', false, $id, $context, $allow_slugs )
	*/
	const PreGetShortlink = "pre_get_shortlink";
	/**
		 * Determine a site by its domain and path.
		 *
		 * This allows one to short-circuit the default logic, perhaps by
		 * replacing it with a routine that is more optimal for your setup.
		 *
		 * Return null to avoid the short-circuit. Return false if no site
		 * can be found at the requested domain and path. Otherwise, return
		 * a site object.
		 *
		 * @since 3.9.0
		 *
		 * @param null|false|WP_Site $site     Site value to return by path.
		 * @param string             $domain   The requested domain.
		 * @param string             $path     The requested path, in full.
		 * @param int|null           $segments The suggested number of paths to consult.
		 *                                     Default null, meaning the entire path was to be consulted.
		 * @param array              $paths    The paths to search for, based on $path and $segments.
		 * @Reference wp-includes\ms-load.php apply_filters( 'pre_get_site_by_path', null, $domain, $path, $segments, $paths )
	*/
	const PreGetSiteByPath = "pre_get_site_by_path";
	/**
		 * Filters the amount of storage space used by the current site, in megabytes.
		 *
		 * @since 3.5.0
		 *
		 * @param int|false $space_used The amount of used space, in megabytes. Default false.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'pre_get_space_used', false )
	*/
	const PreGetSpaceUsed = "pre_get_space_used";
	/**
			 * Filters the table charset value before the DB is checked.
			 *
			 * Passing a non-null value to the filter will effectively short-circuit
			 * checking the DB for the charset, returning that value instead.
			 *
			 * @since 4.2.0
			 *
			 * @param string|null $charset The character set to use. Default null.
			 * @param string      $table   The name of the table being checked.
			 * @Reference wp-includes\wp-db.php apply_filters( 'pre_get_table_charset', null, $table )
	*/
	const PreGetTableCharset = "pre_get_table_charset";
	/**
			 * Filters whether to short-circuit default header status handling.
			 *
			 * Returning a non-false value from the filter will short-circuit the handling
			 * and return early.
			 *
			 * @since 4.5.0
			 *
			 * @param bool     $preempt  Whether to short-circuit default header status handling. Default false.
			 * @param WP_Query $wp_query WordPress Query object.
			 * @Reference wp-includes\class-wp.php apply_filters( 'pre_handle_404', false, $wp_query )
	*/
	const PreHandle404 = "pre_handle_404";
	/**
			 * Filters whether to preempt an HTTP request's return value.
			 *
			 * Returning a non-false value from the filter will short-circuit the HTTP request and return
			 * early with that value. A filter should return either:
			 *
			 *  - An array containing 'headers', 'body', 'response', 'cookies', and 'filename' elements
			 *  - A WP_Error instance
			 *  - boolean false (to avoid short-circuiting the response)
			 *
			 * Returning any other value may result in unexpected behaviour.
			 *
			 * @since 2.9.0
			 *
			 * @param false|array|WP_Error $preempt     Whether to preempt an HTTP request's return value. Default false.
			 * @param array                $parsed_args HTTP request arguments.
			 * @param string               $url         The request URL.
			 * @Reference wp-includes\class-http.php apply_filters( 'pre_http_request', false, $parsed_args, $url )
	*/
	const PreHttpRequest = "pre_http_request";
	/**
			 * Filters whether to preempt sending the request through the proxy.
			 *
			 * Returning false will bypass the proxy; returning true will send
			 * the request through the proxy. Returning null bypasses the filter.
			 *
			 * @since 3.5.0
			 *
			 * @param bool|null $override Whether to override the request result. Default null.
			 * @param string    $uri      URL to check.
			 * @param array     $check    Associative array result of parsing the request URI.
			 * @param array     $home     Associative array result of parsing the site URL.
			 * @Reference wp-includes\class-wp-http-proxy.php apply_filters( 'pre_http_send_through_proxy', null, $uri, $check, $home )
	*/
	const PreHttpSendThroughProxy = "pre_http_send_through_proxy";
	/**
		 * Filters a term before it is sanitized and inserted into the database.
		 *
		 * @since 3.0.0
		 *
		 * @param string|WP_Error $term     The term name to add or update, or a WP_Error object if there's an error.
		 * @param string          $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'pre_insert_term', $term, $taxonomy )
	*/
	const PreInsertTerm = "pre_insert_term";
	/**
		 * Filters content to be run through kses.
		 *
		 * @since 2.3.0
		 *
		 * @param string          $string            Content to run through KSES.
		 * @param array[]|string  $allowed_html      Allowed HTML elements.
		 * @param string[]        $allowed_protocols Array of allowed URL protocols.
		 * @Reference wp-includes\kses.php apply_filters( 'pre_kses', $string, $allowed_html, $allowed_protocols )
	*/
	const PreKses = "pre_kses";
	/**
		 * Pre-filters script translations for the given file, script handle and text domain.
		 *
		 * Returning a non-null value allows to override the default logic, effectively short-circuiting the function.
		 *
		 * @since 5.0.2
		 *
		 * @param string|false|null $translations JSON-encoded translation data. Default null.
		 * @param string|false      $file         Path to the translation file to load. False if there isn't one.
		 * @param string            $handle       Name of the script to register a translation domain to.
		 * @param string            $domain       The text domain.
		 * @Reference wp-includes\l10n.php apply_filters( 'pre_load_script_translations', null, $file, $handle, $domain )
	*/
	const PreLoadScriptTranslations = "pre_load_script_translations";
	/**
		 * Filters whether to short-circuit moving the uploaded file after passing all checks.
		 *
		 * If a non-null value is passed to the filter, moving the file and any related error
		 * reporting will be completely skipped.
		 *
		 * @since 4.9.0
		 *
		 * @param mixed    $move_new_file If null (default) move the file after the upload.
		 * @param string[] $file          An array of data for a single file.
		 * @param string   $new_file      Filename of the newly-uploaded file.
		 * @param string   $type          File type.
		 * @Reference wp-admin\includes\file.php apply_filters( 'pre_move_uploaded_file', null, $file, $new_file, $type )
	*/
	const PreMoveUploadedFile = "pre_move_uploaded_file";
	/**
			 * Filters the oEmbed result before any HTTP requests are made.
			 *
			 * This allows one to short-circuit the default logic, perhaps by
			 * replacing it with a routine that is more optimal for your setup.
			 *
			 * Passing a non-null value to the filter will effectively short-circuit retrieval,
			 * returning the passed value instead.
			 *
			 * @since 4.5.3
			 *
			 * @param null|string $result The UNSANITIZED (and potentially unsafe) HTML that should be used to embed. Default null.
			 * @param string      $url    The URL to the content that should be attempted to be embedded.
			 * @param array       $args   Optional. Arguments, usually passed from a shortcode. Default empty.
			 * @Reference wp-includes\class-wp-oembed.php apply_filters( 'pre_oembed_result', null, $url, $args )
	*/
	const PreOembedResult = "pre_oembed_result";
	/*
			* Respect old get_option() filters left for back-compat when the 'enable_xmlrpc'
			* option was deprecated in 3.5.0. Use the 'xmlrpc_enabled' hook instead.
			* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'pre_option_enable_xmlrpc', false )
	*/
	const PreOptionEnableXmlrpc = "pre_option_enable_xmlrpc";
	/**
		 * Filters the permalink structure for a post before token replacement occurs.
		 *
		 * Only applies to posts with post_type of 'post'.
		 *
		 * @since 3.0.0
		 *
		 * @param string  $permalink The site's permalink structure.
		 * @param WP_Post $post      The post in question.
		 * @param bool    $leavename Whether to keep the post name.
		 * @Reference wp-includes\link-template.php apply_filters( 'pre_post_link', $permalink, $post, $leavename )
	*/
	const PrePostLink = "pre_post_link";
	/**
		 * Filters theme data before it is prepared for JavaScript.
		 *
		 * Passing a non-empty array will result in wp_prepare_themes_for_js() returning
		 * early with that value instead.
		 *
		 * @since 4.2.0
		 *
		 * @param array           $prepared_themes An associative array of theme data. Default empty array.
		 * @param WP_Theme[]|null $themes          An array of theme objects to prepare, if any.
		 * @param string          $current_theme   The current theme slug.
		 * @Reference wp-admin\includes\theme.php apply_filters( 'pre_prepare_themes_for_js', array(), $themes, $current_theme )
	*/
	const PrePrepareThemesForJs = "pre_prepare_themes_for_js";
	/**
			 * Filters the pingback remote source.
			 *
			 * @since 2.5.0
			 *
			 * @param string $remote_source Response source for the page linked from.
			 * @param string $pagelinkedto  URL of the page linked to.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'pre_remote_source', $remote_source, $pagelinkedto )
	*/
	const PreRemoteSource = "pre_remote_source";
	/**
		 * Allows render_block() to be shortcircuited, by returning a non-null value.
		 *
		 * @since 5.1.0
		 *
		 * @param string|null $pre_render The pre-rendered content. Default null.
		 * @param array       $block      The block being rendered.
		 * @Reference wp-includes\blocks.php apply_filters( 'pre_render_block', null, $block )
	*/
	const PreRenderBlock = "pre_render_block";
	/**
		 * Filter to preflight or hijack rescheduling of events.
		 *
		 * Returning a non-null value will short-circuit the normal rescheduling
		 * process, causing the function to return the filtered value instead.
		 *
		 * For plugins replacing wp-cron, return true if the event was successfully
		 * rescheduled, false if not.
		 *
		 * @since 5.1.0
		 *
		 * @param null|bool $pre   Value to return instead. Default null to continue adding the event.
		 * @param stdClass  $event {
		 *     An object containing an event's data.
		 *
		 *     @type string       $hook      Action hook to execute when the event is run.
		 *     @type int          $timestamp Unix timestamp (UTC) for when to next run the event.
		 *     @type string|false $schedule  How often the event should subsequently recur.
		 *     @type array        $args      Array containing each separate argument to pass to the hook's callback function.
		 *     @type int          $interval  The interval time in seconds for the schedule. Only present for recurring events.
		 * }
		 * @Reference wp-includes\cron.php apply_filters( 'pre_reschedule_event', null, $event )
	*/
	const PreRescheduleEvent = "pre_reschedule_event";
	/**
		 * Filter to preflight or hijack scheduling an event.
		 *
		 * Returning a non-null value will short-circuit adding the event to the
		 * cron array, causing the function to return the filtered value instead.
		 *
		 * Both single events and recurring events are passed through this filter;
		 * single events have `$event->schedule` as false, whereas recurring events
		 * have this set to a recurrence from wp_get_schedules(). Recurring
		 * events also have the integer recurrence interval set as `$event->interval`.
		 *
		 * For plugins replacing wp-cron, it is recommended you check for an
		 * identical event within ten minutes and apply the {@see 'schedule_event'}
		 * filter to check if another plugin has disallowed the event before scheduling.
		 *
		 * Return true if the event was scheduled, false if not.
		 *
		 * @since 5.1.0
		 *
		 * @param null|bool $pre   Value to return instead. Default null to continue adding the event.
		 * @param stdClass  $event {
		 *     An object containing an event's data.
		 *
		 *     @type string       $hook      Action hook to execute when the event is run.
		 *     @type int          $timestamp Unix timestamp (UTC) for when to next run the event.
		 *     @type string|false $schedule  How often the event should subsequently recur.
		 *     @type array        $args      Array containing each separate argument to pass to the hook's callback function.
		 *     @type int          $interval  The interval time in seconds for the schedule. Only present for recurring events.
		 * }
		 * @Reference wp-includes\cron.php apply_filters( 'pre_schedule_event', null, $event )
	* @Reference wp-includes\cron.php apply_filters( 'pre_schedule_event', null, $event )
	*/
	const PreScheduleEvent = "pre_schedule_event";
	/**
		 * Filters the permalink structure for a terms before token replacement occurs.
		 *
		 * @since 4.9.0
		 *
		 * @param string  $termlink The permalink structure for the term's taxonomy.
		 * @param WP_Term $term     The term object.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'pre_term_link', $termlink, $term )
	*/
	const PreTermLink = "pre_term_link";
	/**
		 * Filters whether a post trashing should take place.
		 *
		 * @since 4.9.0
		 *
		 * @param bool|null $trash Whether to go forward with trashing.
		 * @param WP_Post   $post  Post object.
		 * @Reference wp-includes\post.php apply_filters( 'pre_trash_post', null, $post )
	* @Reference wp-includes\class-wp-customize-manager.php apply_filters( 'pre_trash_post', null, $post )
	*/
	const PreTrashPost = "pre_trash_post";
	/**
		 * Filter to preflight or hijack unscheduling of events.
		 *
		 * Returning a non-null value will short-circuit the normal unscheduling
		 * process, causing the function to return the filtered value instead.
		 *
		 * For plugins replacing wp-cron, return true if the event was successfully
		 * unscheduled, false if not.
		 *
		 * @since 5.1.0
		 *
		 * @param null|bool $pre       Value to return instead. Default null to continue unscheduling the event.
		 * @param int       $timestamp Timestamp for when to run the event.
		 * @param string    $hook      Action hook, the execution of which will be unscheduled.
		 * @param array     $args      Arguments to pass to the hook's callback function.
		 * @Reference wp-includes\cron.php apply_filters( 'pre_unschedule_event', null, $timestamp, $hook, $args )
	*/
	const PreUnscheduleEvent = "pre_unschedule_event";
	/**
		 * Filter to preflight or hijack clearing all events attached to the hook.
		 *
		 * Returning a non-null value will short-circuit the normal unscheduling
		 * process, causing the function to return the filtered value instead.
		 *
		 * For plugins replacing wp-cron, return the number of events successfully
		 * unscheduled (zero if no events were registered with the hook) or false
		 * if unscheduling one or more events fails.
		 *
		 * @since 5.1.0
		 *
		 * @param null|int|false $pre  Value to return instead. Default null to continue unscheduling the hook.
		 * @param string         $hook Action hook, the execution of which will be unscheduled.
		 * @Reference wp-includes\cron.php apply_filters( 'pre_unschedule_hook', null, $hook )
	*/
	const PreUnscheduleHook = "pre_unschedule_hook";
	/**
		 * Filters whether a post untrashing should take place.
		 *
		 * @since 4.9.0
		 *
		 * @param bool|null $untrash Whether to go forward with untrashing.
		 * @param WP_Post   $post    Post object.
		 * @Reference wp-includes\post.php apply_filters( 'pre_untrash_post', null, $post )
	*/
	const PreUntrashPost = "pre_untrash_post";
	/**
		 * Filters an option before its value is (maybe) serialized and updated.
		 *
		 * @since 3.9.0
		 *
		 * @param mixed  $value     The new, unserialized option value.
		 * @param string $option    Name of the option.
		 * @param mixed  $old_value The old option value.
		 * @Reference wp-includes\option.php apply_filters( 'pre_update_option', $value, $option, $old_value )
	*/
	const PreUpdateOption = "pre_update_option";
	/**
			 * Filters whether to preempt the XML-RPC media upload.
			 *
			 * Passing a truthy value will effectively short-circuit the media upload,
			 * returning that value as a 500 error instead.
			 *
			 * @since 2.1.0
			 *
			 * @param bool $error Whether to pre-empt the media upload. Default false.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'pre_upload_error', false )
	*/
	const PreUploadError = "pre_upload_error";
	/**
		 * Filters a user's description before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $description The user's description.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_description', $description )
	*/
	const PreUserDescription = "pre_user_description";
	/**
		 * Filters a user's display name before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $display_name The user's display name.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_display_name', $display_name )
	*/
	const PreUserDisplayName = "pre_user_display_name";
	/**
		 * Filters a user's email before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $raw_user_email The user's email.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_email', $raw_user_email )
	*/
	const PreUserEmail = "pre_user_email";
	/**
		 * Filters a user's first name before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $first_name The user's first name.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_first_name', $first_name )
	*/
	const PreUserFirstName = "pre_user_first_name";
	/**
			 * Filters the comment author's user id before it is set.
			 *
			 * The first time this filter is evaluated, 'user_ID' is checked
			 * (for back-compat), followed by the standard 'user_id' value.
			 *
			 * @since 1.5.0
			 *
			 * @param int $user_ID The comment author's user ID.
			 * @Reference wp-includes\comment.php apply_filters( 'pre_user_id', $commentdata['user_ID'] )
	* @Reference wp-includes\comment.php apply_filters( 'pre_user_id', $commentdata['user_id'] )
	*/
	const PreUserId = "pre_user_id";
	/**
		 * Filters a user's last name before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $last_name The user's last name.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_last_name', $last_name )
	*/
	const PreUserLastName = "pre_user_last_name";
	/**
		 * Filters a username after it has been sanitized.
		 *
		 * This filter is called before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $sanitized_user_login Username after it has been sanitized.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_login', $sanitized_user_login )
	* @Reference wp-admin\user-new.php apply_filters( 'pre_user_login', sanitize_user( wp_unslash( $_REQUEST['user_login'] ), true ) )
	*/
	const PreUserLogin = "pre_user_login";
	/**
		 * Filters a user's nicename before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $user_nicename The user's nicename.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_nicename', $user_nicename )
	*/
	const PreUserNicename = "pre_user_nicename";
	/**
		 * Filters a user's nickname before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $nickname The user's nickname.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_nickname', $nickname )
	*/
	const PreUserNickname = "pre_user_nickname";
	/**
		 * Filters a user's URL before the user is created or updated.
		 *
		 * @since 2.0.3
		 *
		 * @param string $raw_user_url The user's URL.
		 * @Reference wp-includes\user.php apply_filters( 'pre_user_url', $raw_user_url )
	*/
	const PreUserUrl = "pre_user_url";
	/**
		 * Filters the check for whether a site is initialized before the database is accessed.
		 *
		 * Returning a non-null value will effectively short-circuit the function, returning
		 * that value instead.
		 *
		 * @since 5.1.0
		 *
		 * @param bool|null $pre     The value to return, if not null.
		 * @param int       $site_id The site ID that is being checked.
		 * @Reference wp-includes\ms-site.php apply_filters( 'pre_wp_is_site_initialized', null, $site_id )
	*/
	const PreWpIsSiteInitialized = "pre_wp_is_site_initialized";
	/**
		 * Filters whether to short-circuit the wp_nav_menu() output.
		 *
		 * Returning a non-null value to the filter will short-circuit
		 * wp_nav_menu(), echoing that value if $args->echo is true,
		 * returning that value otherwise.
		 *
		 * @since 3.9.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string|null $output Nav menu output to short-circuit with. Default null.
		 * @param stdClass    $args   An object containing wp_nav_menu() arguments.
		 * @Reference wp-includes\nav-menu-template.php apply_filters( 'pre_wp_nav_menu', null, $args )
	*/
	const PreWpNavMenu = "pre_wp_nav_menu";
	/**
		 * Filters the post slug before it is generated to be unique.
		 *
		 * Returning a non-null value will short-circuit the
		 * unique slug generation, returning the passed value instead.
		 *
		 * @since 5.1.0
		 *
		 * @param string|null $override_slug Short-circuit return value.
		 * @param string      $slug          The desired slug (post_name).
		 * @param int         $post_ID       Post ID.
		 * @param string      $post_status   The post status.
		 * @param string      $post_type     Post type.
		 * @param int         $post_parent   Post parent ID.
		 * @Reference wp-includes\post.php apply_filters( 'pre_wp_unique_post_slug', null, $slug, $post_ID, $post_status, $post_type, $post_parent )
	*/
	const PreWpUniquePostSlug = "pre_wp_unique_post_slug";
	/**
		 * Filters a post's comment count before it is updated in the database.
		 *
		 * @since 4.5.0
		 *
		 * @param int|null $new     The new comment count. Default null.
		 * @param int      $old     The old comment count.
		 * @param int      $post_id Post ID.
		 * @Reference wp-includes\comment.php apply_filters( 'pre_wp_update_comment_count_now', null, $old, $post_id )
	*/
	const PreWpUpdateCommentCountNow = "pre_wp_update_comment_count_now";
	/**
		 * Filters the attachment markup to be prepended to the post content.
		 *
		 * @since 2.0.0
		 *
		 * @see prepend_attachment()
		 *
		 * @param string $p The attachment HTML output.
		 * @Reference wp-includes\post-template.php apply_filters( 'prepend_attachment', $p )
	*/
	const PrependAttachment = "prepend_attachment";
	/**
		 * Filters a comment's data before it is sanitized and inserted into the database.
		 *
		 * @since 1.5.0
		 *
		 * @param array $commentdata Comment data.
		 * @Reference wp-includes\comment.php apply_filters( 'preprocess_comment', $commentdata )
	*/
	const PreprocessComment = "preprocess_comment";
	/**
		 * Filters the URL used for a post preview.
		 *
		 * @since 2.0.5
		 * @since 4.0.0 Added the `$post` parameter.
		 *
		 * @param string  $preview_link URL used for the post preview.
		 * @param WP_Post $post         Post object.
		 * @Reference wp-includes\link-template.php apply_filters( 'preview_post_link', $preview_link, $post )
	*/
	const PreviewPostLink = "preview_post_link";
	/**
		 * Filters the anchor tag attributes for the previous comments page link.
		 *
		 * @since 2.7.0
		 *
		 * @param string $attributes Attributes for the anchor tag.
		 * @Reference wp-includes\link-template.php apply_filters( 'previous_comments_link_attributes', '' )
	*/
	const PreviousCommentsLinkAttributes = "previous_comments_link_attributes";
	/**
			 * Filters the anchor tag attributes for the previous posts page link.
			 *
			 * @since 2.7.0
			 *
			 * @param string $attributes Attributes for the anchor tag.
			 * @Reference wp-includes\link-template.php apply_filters( 'previous_posts_link_attributes', '' )
	*/
	const PreviousPostsLinkAttributes = "previous_posts_link_attributes";
	/**
		 * Filters whether to print the admin styles.
		 *
		 * @since 2.8.0
		 *
		 * @param bool $print Whether to print the admin styles. Default true.
		 * @Reference wp-includes\script-loader.php apply_filters( 'print_admin_styles', true )
	*/
	const PrintAdminStyles = "print_admin_styles";
	/**
		 * Filters whether to print the footer scripts.
		 *
		 * @since 2.8.0
		 *
		 * @param bool $print Whether to print the footer scripts. Default true.
		 * @Reference wp-includes\script-loader.php apply_filters( 'print_footer_scripts', true )
	*/
	const PrintFooterScripts = "print_footer_scripts";
	/**
		 * Filters whether to print the head scripts.
		 *
		 * @since 2.8.0
		 *
		 * @param bool $print Whether to print the head scripts. Default true.
		 * @Reference wp-includes\script-loader.php apply_filters( 'print_head_scripts', true )
	*/
	const PrintHeadScripts = "print_head_scripts";
	/**
		 * Filters whether to print the styles queued too late for the HTML head.
		 *
		 * @since 3.3.0
		 *
		 * @param bool $print Whether to print the 'late' styles. Default true.
		 * @Reference wp-includes\script-loader.php apply_filters( 'print_late_styles', true )
	*/
	const PrintLateStyles = "print_late_styles";
	/**
				 * Filters the list of script dependencies left to print.
				 *
				 * @since 2.3.0
				 *
				 * @param string[] $to_do An array of script dependency handles.
				 * @Reference wp-includes\class.wp-scripts.php apply_filters( 'print_scripts_array', $this->to_do )
	*/
	const PrintScriptsArray = "print_scripts_array";
	/**
				 * Filters the array of enqueued styles before processing for output.
				 *
				 * @since 2.6.0
				 *
				 * @param string[] $to_do The list of enqueued style handles about to be processed.
				 * @Reference wp-includes\class.wp-styles.php apply_filters( 'print_styles_array', $this->to_do )
	*/
	const PrintStylesArray = "print_styles_array";
	/**
			 * Filters the link label for the 'Search Engines Discouraged' message
			 * displayed in the 'At a Glance' dashboard widget.
			 *
			 * Prior to 3.8.0, the widget was named 'Right Now'.
			 *
			 * @since 3.0.0
			 *
			 * @param string $content Default text.
			 * @Reference wp-admin\includes\dashboard.php apply_filters( 'privacy_on_link_text', __( 'Search Engines Discouraged' ) )
	*/
	const PrivacyOnLinkText = "privacy_on_link_text";
	/**
			 * Filters the link title attribute for the 'Search Engines Discouraged'
			 * message displayed in the 'At a Glance' dashboard widget.
			 *
			 * Prior to 3.8.0, the widget was named 'Right Now'.
			 *
			 * @since 3.0.0
			 * @since 4.5.0 The default for `$title` was updated to an empty string.
			 *
			 * @param string $title Default attribute text.
			 * @Reference wp-admin\includes\dashboard.php apply_filters( 'privacy_on_link_title', '' )
	*/
	const PrivacyOnLinkTitle = "privacy_on_link_title";
	/**
		 * Filters the URL of the privacy policy page.
		 *
		 * @since 4.9.6
		 *
		 * @param string $url            The URL to the privacy policy page. Empty string
		 *                               if it doesn't exist.
		 * @param int    $policy_page_id The ID of privacy policy page.
		 * @Reference wp-includes\link-template.php apply_filters( 'privacy_policy_url', $url, $policy_page_id )
	*/
	const PrivacyPolicyUrl = "privacy_policy_url";
	/**
				 * Filters the text prepended to the post title of private posts.
				 *
				 * The filter is only applied on the front end.
				 *
				 * @since 2.8.0
				 *
				 * @param string  $prepend Text displayed before the post title.
				 *                         Default 'Private: %s'.
				 * @param WP_Post $post    Current post object.
				 * @Reference wp-includes\post-template.php apply_filters( 'private_title_format', $prepend, $post )
	*/
	const PrivateTitleFormat = "private_title_format";
	/**
					 * Contextually filters a diffed line.
					 *
					 * Filters TextDiff processing of diffed line. By default, diffs are processed with
					 * htmlspecialchars. Use this filter to remove or change the processing. Passes a context
					 * indicating if the line is added, deleted or unchanged.
					 *
					 * @since 4.1.0
					 *
					 * @param String $processed_line The processed diffed line.
					 * @param String $line           The unprocessed diffed line.
					 * @param string null            The line context. Values are 'added', 'deleted' or 'unchanged'.
					 * @Reference wp-includes\class-wp-text-diff-renderer-table.php apply_filters( 'process_text_diff_html', $processed_line, $line, 'added' )
	* @Reference wp-includes\class-wp-text-diff-renderer-table.php apply_filters( 'process_text_diff_html', $processed_line, $line, 'deleted' )
	* @Reference wp-includes\class-wp-text-diff-renderer-table.php apply_filters( 'process_text_diff_html', $processed_line, $line, 'unchanged' )
	*/
	const ProcessTextDiffHtml = "process_text_diff_html";
	/**
				 * Filters the text prepended to the post title for protected posts.
				 *
				 * The filter is only applied on the front end.
				 *
				 * @since 2.8.0
				 *
				 * @param string  $prepend Text displayed before the post title.
				 *                         Default 'Protected: %s'.
				 * @param WP_Post $post    Current post object.
				 * @Reference wp-includes\post-template.php apply_filters( 'protected_title_format', $prepend, $post )
	*/
	const ProtectedTitleFormat = "protected_title_format";
	/**
			 * Filters the capability to read private posts for a custom post type
			 * when generating SQL for getting posts by author.
			 *
			 * @since 2.2.0
			 * @deprecated 3.2.0 The hook transitioned from "somewhat useless" to "totally useless".
			 *
			 * @param string $cap Capability.
			 * @Reference wp-includes\post.php apply_filters( 'pub_priv_sql_capability', '' )
	*/
	const PubPrivSqlCapability = "pub_priv_sql_capability";
	/**
			 * Filters the database query.
			 *
			 * Some queries are made before the plugins have been loaded,
			 * and thus cannot be filtered with this method.
			 *
			 * @since 2.1.0
			 *
			 * @param string $query Database query.
			 * @Reference wp-includes\wp-db.php apply_filters( 'query', $query )
	*/
	const Query = "query";
	/**
				 * Filters the query string before parsing.
				 *
				 * @since 1.5.0
				 * @deprecated 2.1.0 Use 'query_vars' or 'request' filters instead.
				 *
				 * @param string $query_string The query string to modify.
				 * @Reference wp-includes\class-wp.php apply_filters( 'query_string', $this->query_string )
	*/
	const QueryString = "query_string";
	/**
			 * Filters the query variables whitelist before processing.
			 *
			 * Allows (publicly allowed) query vars to be added, removed, or changed prior
			 * to executing the query. Needed to allow custom rewrite rules using your own arguments
			 * to work, or any other custom query variables you want to be publicly available.
			 *
			 * @since 1.5.0
			 *
			 * @param string[] $public_query_vars The array of whitelisted query variable names.
			 * @Reference wp-includes\class-wp.php apply_filters( 'query_vars', $this->public_query_vars )
	*/
	const QueryVars = "query_vars";
	/**
						 * Filters the arguments used to generate the Quick Edit page-parent drop-down.
						 *
						 * @since 2.7.0
						 *
						 * @see wp_dropdown_pages()
						 *
						 * @param array $dropdown_args An array of arguments.
						 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'quick_edit_dropdown_pages_args', $dropdown_args )
	*/
	const QuickEditDropdownPagesArgs = "quick_edit_dropdown_pages_args";
	/**
				 * Filters whether the current taxonomy should be shown in the Quick Edit panel.
				 *
				 * @since 4.2.0
				 *
				 * @param bool   $show_in_quick_edit Whether to show the current taxonomy in Quick Edit.
				 * @param string $taxonomy_name      Taxonomy name.
				 * @param string $post_type          Post type of current Quick Edit post.
				 * @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'quick_edit_show_taxonomy', $show_in_quick_edit, $taxonomy_name, $screen->post_type )
	* @Reference wp-admin\includes\ajax-actions.php apply_filters( 'quick_edit_show_taxonomy', $tax_object->show_in_quick_edit, $taxonomy, $post['post_type'] )
	*/
	const QuickEditShowTaxonomy = "quick_edit_show_taxonomy";
	/**
				 * Filters the Quicktags settings.
				 *
				 * @since 3.3.0
				 *
				 * @param array  $qtInit    Quicktags settings.
				 * @param string $editor_id The unique editor ID, e.g. 'content'.
				 * @Reference wp-includes\class-wp-editor.php apply_filters( 'quicktags_settings', $qtInit, $editor_id )
	*/
	const QuicktagsSettings = "quicktags_settings";
	/**
			 * Filters the randomly-generated password.
			 *
			 * @since 3.0.0
			 * @since 5.3.0 Added the `$length`, `$special_chars`, and `$extra_special_chars` parameters.
			 *
			 * @param string $password            The generated password.
			 * @param int    $length              The length of password to generate.
			 * @param bool   $special_chars       Whether to include standard special characters.
			 * @param bool   $extra_special_chars Whether to include other special characters.
			 * @Reference wp-includes\pluggable.php apply_filters( 'random_password', $password, $length, $special_chars, $extra_special_chars )
	*/
	const RandomPassword = "random_password";
	/**
			 * Filters the debug information included in the fatal error protection email.
			 *
			 * @since 5.3.0
			 *
			 * @param $message array An associated array of debug information.
			 * @Reference wp-includes\class-wp-recovery-mode-email-service.php apply_filters( 'recovery_email_debug_info', $this->get_debug( $extension ) )
	*/
	const RecoveryEmailDebugInfo = "recovery_email_debug_info";
	/**
			 * Filters the support message sent with the the fatal error protection email.
			 *
			 * @since 5.2.0
			 *
			 * @param $message string The Message to include in the email.
			 * @Reference wp-includes\class-wp-recovery-mode-email-service.php apply_filters( 'recovery_email_support_info', __( 'Please contact your host for assistance with investigating this issue further.' ) )
	*/
	const RecoveryEmailSupportInfo = "recovery_email_support_info";
	/**
			 * Filter the URL to begin recovery mode.
			 *
			 * @since 5.2.0
			 *
			 * @param string $url   The generated recovery mode begin URL.
			 * @param string $token The token used to identify the key.
			 * @param string $key   The recovery mode key.
			 * @Reference wp-includes\class-wp-recovery-mode-link-service.php apply_filters( 'recovery_mode_begin_url', $url, $token, $key )
	*/
	const RecoveryModeBeginUrl = "recovery_mode_begin_url";
	/**
			 * Filter the length of time a Recovery Mode cookie is valid for.
			 *
			 * @since 5.2.0
			 *
			 * @param int $length Length in seconds.
			 * @Reference wp-includes\class-wp-recovery-mode-cookie-service.php apply_filters( 'recovery_mode_cookie_length', WEEK_IN_SECONDS )
	* @Reference wp-includes\class-wp-recovery-mode-cookie-service.php apply_filters( 'recovery_mode_cookie_length', WEEK_IN_SECONDS )
	*/
	const RecoveryModeCookieLength = "recovery_mode_cookie_length";
	/**
			 * Filter the contents of the Recovery Mode email.
			 *
			 * @since 5.2.0
			 *
			 * @param array  $email Used to build wp_mail().
			 * @param string $url   URL to enter recovery mode.
			 * @Reference wp-includes\class-wp-recovery-mode-email-service.php apply_filters( 'recovery_mode_email', $email, $url )
	*/
	const RecoveryModeEmail = "recovery_mode_email";
	/**
			 * Filter the amount of time the recovery mode email link is valid for.
			 *
			 * The ttl must be at least as long as the email rate limit.
			 *
			 * @since 5.2.0
			 *
			 * @param int $valid_for The number of seconds the link is valid for.
			 * @Reference wp-includes\class-wp-recovery-mode.php apply_filters( 'recovery_mode_email_link_ttl', $valid_for )
	*/
	const RecoveryModeEmailLinkTtl = "recovery_mode_email_link_ttl";
	/**
			 * Filter the rate limit between sending new recovery mode email links.
			 *
			 * @since 5.2.0
			 *
			 * @param int $rate_limit Time to wait in seconds. Defaults to 1 day.
			 * @Reference wp-includes\class-wp-recovery-mode.php apply_filters( 'recovery_mode_email_rate_limit', DAY_IN_SECONDS )
	*/
	const RecoveryModeEmailRateLimit = "recovery_mode_email_rate_limit";
	/**
		 * Filters the canonical redirect URL.
		 *
		 * Returning false to this filter will cancel the redirect.
		 *
		 * @since 2.3.0
		 *
		 * @param string $redirect_url  The redirect URL.
		 * @param string $requested_url The requested URL.
		 * @Reference wp-includes\canonical.php apply_filters( 'redirect_canonical', $redirect_url, $requested_url )
	*/
	const RedirectCanonical = "redirect_canonical";
	/**
	 * Filters whether to redirect the request to the Network Admin.
	 *
	 * @since 3.2.0
	 *
	 * @param bool $redirect_network_admin_request Whether the request should be redirected.
	 * @Reference wp-admin\network\admin.php apply_filters( 'redirect_network_admin_request', $redirect_network_admin_request )
	*/
	const RedirectNetworkAdminRequest = "redirect_network_admin_request";
	/**
		 * Filters the post redirect destination URL.
		 *
		 * @since 2.9.0
		 *
		 * @param string $location The destination URL.
		 * @param int    $post_id  The post ID.
		 * @Reference wp-admin\includes\post.php apply_filters( 'redirect_post_location', $location, $post_id )
	*/
	const RedirectPostLocation = "redirect_post_location";
	/**
		 * Filters the taxonomy redirect destination URL.
		 *
		 * @since 4.6.0
		 *
		 * @param string $location The destination URL.
		 * @param object $tax      The taxonomy object.
		 * @Reference wp-admin\edit-tags.php apply_filters( 'redirect_term_location', $location, $tax )
	*/
	const RedirectTermLocation = "redirect_term_location";
	/**
	 * Filters whether to redirect the request to the User Admin in Multisite.
	 *
	 * @since 3.2.0
	 *
	 * @param bool $redirect_user_admin_request Whether the request should be redirected.
	 * @Reference wp-admin\user\admin.php apply_filters( 'redirect_user_admin_request', $redirect_user_admin_request )
	*/
	const RedirectUserAdminRequest = "redirect_user_admin_request";
	/**
		 * Filters the HTML link to the Registration or Admin page.
		 *
		 * Users are sent to the admin page if logged-in, or the registration page
		 * if enabled and logged-out.
		 *
		 * @since 1.5.0
		 *
		 * @param string $link The HTML code for the link to the Registration or Admin page.
		 * @Reference wp-includes\general-template.php apply_filters( 'register', $link )
	* @Reference wp-login.php apply_filters( 'register', $registration_url )
	* @Reference wp-login.php apply_filters( 'register', $registration_url )
	* @Reference wp-login.php apply_filters( 'register', $registration_url )
	*/
	const Register = "register";
	/**
		 * Filters the registration arguments when registering meta.
		 *
		 * @since 4.6.0
		 *
		 * @param array  $args        Array of meta registration arguments.
		 * @param array  $defaults    Array of default arguments.
		 * @param string $object_type Object type.
		 * @param string $meta_key    Meta key.
		 * @Reference wp-includes\meta.php apply_filters( 'register_meta_args', $args, $defaults, $object_type, $meta_key )
	*/
	const RegisterMetaArgs = "register_meta_args";
	/**
			 * Filters the arguments for registering a post type.
			 *
			 * @since 4.4.0
			 *
			 * @param array  $args      Array of arguments for registering a post type.
			 * @param string $post_type Post type key.
			 * @Reference wp-includes\class-wp-post-type.php apply_filters( 'register_post_type_args', $args, $this->name )
	*/
	const RegisterPostTypeArgs = "register_post_type_args";
	/**
		 * Filters the registration arguments when registering a setting.
		 *
		 * @since 4.7.0
		 *
		 * @param array  $args         Array of setting registration arguments.
		 * @param array  $defaults     Array of default arguments.
		 * @param string $option_group Setting group.
		 * @param string $option_name  Setting name.
		 * @Reference wp-includes\option.php apply_filters( 'register_setting_args', $args, $defaults, $option_group, $option_name )
	*/
	const RegisterSettingArgs = "register_setting_args";
	/**
		 * Filters the sidebar default arguments.
		 *
		 * @since 5.3.0
		 *
		 * @see register_sidebar()
		 *
		 * @param array $defaults The default sidebar arguments.
		 * @Reference wp-includes\widgets.php apply_filters( 'register_sidebar_defaults', $defaults )
	*/
	const RegisterSidebarDefaults = "register_sidebar_defaults";
	/**
			 * Filters the arguments for registering a taxonomy.
			 *
			 * @since 4.4.0
			 *
			 * @param array    $args        Array of arguments for registering a taxonomy.
			 * @param string   $taxonomy    Taxonomy key.
			 * @param string[] $object_type Array of names of object types for the taxonomy.
			 * @Reference wp-includes\class-wp-taxonomy.php apply_filters( 'register_taxonomy_args', $args, $this->name, (array) $object_type )
	*/
	const RegisterTaxonomyArgs = "register_taxonomy_args";
	/**
		 * Filters the user registration URL.
		 *
		 * @since 3.6.0
		 *
		 * @param string $register The user registration URL.
		 * @Reference wp-includes\general-template.php apply_filters( 'register_url', site_url( 'wp-login.php?action=register', 'login' ) )
	*/
	const RegisterUrl = "register_url";
	/**
		 * Filters the errors encountered when a new user is being registered.
		 *
		 * The filtered WP_Error object may, for example, contain errors for an invalid
		 * or existing username or email address. A WP_Error object should always returned,
		 * but may or may not contain errors.
		 *
		 * If any errors are present in $errors, this will abort the user's registration.
		 *
		 * @since 2.1.0
		 *
		 * @param WP_Error $errors               A WP_Error object containing any errors encountered
		 *                                       during registration.
		 * @param string   $sanitized_user_login User's username after it has been sanitized.
		 * @param string   $user_email           User's email.
		 * @Reference wp-includes\user.php apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email )
	*/
	const RegistrationErrors = "registration_errors";
	/**
			 * Filters the registration redirect URL.
			 *
			 * @since 3.0.0
			 *
			 * @param string $registration_redirect The redirect destination URL.
			 * @Reference wp-login.php apply_filters( 'registration_redirect', $registration_redirect )
	*/
	const RegistrationRedirect = "registration_redirect";
	/**
		 * Filters the list of query variables to remove.
		 *
		 * @since 4.2.0
		 *
		 * @param array $removable_query_args An array of query variables to remove from a URL.
		 * @Reference wp-includes\functions.php apply_filters( 'removable_query_args', $removable_query_args )
	*/
	const RemovableQueryArgs = "removable_query_args";
	/**
		 * Filters the content of a single block.
		 *
		 * @since 5.0.0
		 *
		 * @param string $block_content The block content about to be appended.
		 * @param array  $block         The full block, including name and attributes.
		 * @Reference wp-includes\blocks.php apply_filters( 'render_block', $block_content, $block )
	*/
	const RenderBlock = "render_block";
	/**
		 * Filters the block being rendered in render_block(), before it's processed.
		 *
		 * @since 5.1.0
		 *
		 * @param array $block        The block being rendered.
		 * @param array $source_block An un-modified copy of $block, as it appeared in the source content.
		 * @Reference wp-includes\blocks.php apply_filters( 'render_block_data', $block, $source_block )
	*/
	const RenderBlockData = "render_block_data";
	/**
			 * Allows replacement of the editor.
			 *
			 * @since 4.9.0
			 *
			 * @param boolean      Whether to replace the editor. Default false.
			 * @param object $post Post object.
			 * @Reference wp-admin\post.php apply_filters( 'replace_editor', false, $post )
	* @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'replace_editor', false, $post )
	* @Reference wp-admin\post-new.php apply_filters( 'replace_editor', false, $post )
	*/
	const ReplaceEditor = "replace_editor";
	/**
			 * Filters the array of parsed query variables.
			 *
			 * @since 2.1.0
			 *
			 * @param array $query_vars The array of requested query variables.
			 * @Reference wp-includes\class-wp.php apply_filters( 'request', $this->query_vars )
	*/
	const Request = "request";
	/**
		 * Filters the filesystem credentials form output.
		 *
		 * Returning anything other than an empty string will effectively short-circuit
		 * output of the filesystem credentials form, returning that value instead.
		 *
		 * @since 2.5.0
		 * @since 4.6.0 The `$context` parameter default changed from `false` to an empty string.
		 *
		 * @param mixed  $output                       Form output to return instead. Default empty.
		 * @param string $form_post                    The URL to post the form to.
		 * @param string $type                         Chosen type of filesystem.
		 * @param bool   $error                        Whether the current request has failed to connect.
		 *                                             Default false.
		 * @param string $context                      Full path to the directory that is tested for
		 *                                             being writable.
		 * @param bool   $allow_relaxed_file_ownership Whether to allow Group/World writable.
		 *                                             Default false.
		 * @param array  $extra_fields                 Extra POST fields.
		 * @Reference wp-admin\includes\file.php apply_filters( 'request_filesystem_credentials', '', $form_post, $type, $error, $context, $extra_fields, $allow_relaxed_file_ownership )
	*/
	const RequestFilesystemCredentials = "request_filesystem_credentials";
	/**
			 * Filters the respond link when a post has no comments.
			 *
			 * @since 4.4.0
			 *
			 * @param string $respond_link The default response link.
			 * @param integer $id The post ID.
			 * @Reference wp-includes\comment-template.php apply_filters( 'respond_link', $respond_link, $id )
	*/
	const RespondLink = "respond_link";
	/**
				 * Filter whether comments can be created without authentication.
				 *
				 * Enables creating comments for anonymous users.
				 *
				 * @since 4.7.0
				 *
				 * @param bool $allow_anonymous Whether to allow anonymous comments to
				 *                              be created. Default `false`.
				 * @param WP_REST_Request $request Request used to generate the
				 *                                 response.
				 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'rest_allow_anonymous_comments', false, $request )
	*/
	const RestAllowAnonymousComments = "rest_allow_anonymous_comments";
	/**
			 * Filters REST authentication errors.
			 *
			 * This is used to pass a WP_Error from an authentication method back to
			 * the API.
			 *
			 * Authentication methods should check first if they're being used, as
			 * multiple authentication methods can be enabled on a site (cookies,
			 * HTTP basic auth, OAuth). If the authentication method hooked in is
			 * not actually being attempted, null should be returned to indicate
			 * another authentication method should check instead. Similarly,
			 * callbacks should ensure the value is `null` before checking for
			 * errors.
			 *
			 * A WP_Error instance can be returned if an error occurs, and this should
			 * match the format used by API methods internally (that is, the `status`
			 * data should be used). A callback can return `true` to indicate that
			 * the authentication method was used, and it succeeded.
			 *
			 * @since 4.4.0
			 *
			 * @param WP_Error|null|bool WP_Error if authentication error, null if authentication
			 *                              method wasn't used, true if authentication succeeded.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_authentication_errors', null )
	*/
	const RestAuthenticationErrors = "rest_authentication_errors";
	/**
		 * Filters the REST avatar sizes.
		 *
		 * Use this filter to adjust the array of sizes returned by the
		 * `rest_get_avatar_sizes` function.
		 *
		 * @since 4.4.0
		 *
		 * @param array $sizes An array of int values that are the pixel sizes for avatars.
		 *                     Default `[ 24, 48, 96 ]`.
		 * @Reference wp-includes\rest-api.php apply_filters( 'rest_avatar_sizes', array( 24, 48, 96 ) )
	*/
	const RestAvatarSizes = "rest_avatar_sizes";
	/**
			 * Filter collection parameters for the comments controller.
			 *
			 * This filter registers the collection parameter, but does not map the
			 * collection parameter to an internal WP_Comment_Query parameter. Use the
			 * `rest_comment_query` filter to set WP_Comment_Query parameters.
			 *
			 * @since 4.7.0
			 *
			 * @param array $query_params JSON Schema-formatted collection parameters.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'rest_comment_collection_params', $query_params )
	*/
	const RestCommentCollectionParams = "rest_comment_collection_params";
	/**
			 * Filters arguments, before passing to WP_Comment_Query, when querying comments via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @link https://developer.wordpress.org/reference/classes/wp_comment_query/
			 *
			 * @param array           $prepared_args Array of arguments for WP_Comment_Query.
			 * @param WP_REST_Request $request       The current request.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'rest_comment_query', $prepared_args, $request )
	*/
	const RestCommentQuery = "rest_comment_query";
	/**
			 * Filters whether a comment can be trashed.
			 *
			 * Return false to disable trash support for the post.
			 *
			 * @since 4.7.0
			 *
			 * @param bool    $supports_trash Whether the post type support trashing.
			 * @param WP_Post $comment        The comment object being considered for trashing support.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'rest_comment_trashable', ( EMPTY_TRASH_DAYS > 0 ), $comment )
	*/
	const RestCommentTrashable = "rest_comment_trashable";
	/**
						 * Filters the REST dispatch request result.
						 *
						 * Allow plugins to override dispatching the request.
						 *
						 * @since 4.4.0
						 * @since 4.5.0 Added `$route` and `$handler` parameters.
						 *
						 * @param mixed           $dispatch_result Dispatch result, will be used if not empty.
						 * @param WP_REST_Request $request         Request used to generate the response.
						 * @param string          $route           Route matched for the request.
						 * @param array           $handler         Route handler used for the request.
						 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_dispatch_request', null, $request, $route, $handler )
	*/
	const RestDispatchRequest = "rest_dispatch_request";
	/**
			 * Filters whether the REST API is enabled.
			 *
			 * @since 4.4.0
			 * @deprecated 4.7.0 Use the rest_authentication_errors filter to restrict access to the API
			 *
			 * @param bool $rest_enabled Whether the REST API is enabled. Default true.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters(			'rest_enabled',			array( true ),			'4.7.0',			'rest_authentication_errors',			__( 'The REST API can no longer be completely disabled, the rest_authentication_errors filter can be used to restrict access to the API, instead.' )		)
	*/
	const RestEnabled = "rest_enabled";
	/**
			 * Filters the array of available endpoints.
			 *
			 * @since 4.4.0
			 *
			 * @param array $endpoints The available endpoints. An array of matching regex patterns, each mapped
			 *                         to an array of callbacks for the endpoint. These take the format
			 *                         `'/path/regex' => array( $callback, $bitmask )` or
			 *                         `'/path/regex' => array( array( $callback, $bitmask ).
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_endpoints', $this->endpoints )
	*/
	const RestEndpoints = "rest_endpoints";
	/**
				 * Filters the REST endpoint data.
				 *
				 * @since 4.4.0
				 *
				 * @param WP_REST_Request $request Request data. The namespace is passed as the 'namespace' parameter.
				 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_endpoints_description', $data )
	*/
	const RestEndpointsDescription = "rest_endpoints_description";
	/**
			 * Filters the enveloped form of a response.
			 *
			 * @since 4.4.0
			 *
			 * @param array            $envelope Envelope data.
			 * @param WP_REST_Response $response Original response data.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_envelope_response', $envelope, $response )
	*/
	const RestEnvelopeResponse = "rest_envelope_response";
	/**
			 * Filters the API root index data.
			 *
			 * This contains the data describing the API. This includes information
			 * about supported authentication schemes, supported namespaces, routes
			 * available on the API, and a small amount of data about the site.
			 *
			 * @since 4.4.0
			 *
			 * @param WP_REST_Response $response Response data.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_index', $response )
	*/
	const RestIndex = "rest_index";
	/**
			 * Filters whether jsonp is enabled.
			 *
			 * @since 4.4.0
			 *
			 * @param bool $jsonp_enabled Whether jsonp is enabled. Default true.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_jsonp_enabled', true )
	* @Reference wp-includes\load.php apply_filters( 'rest_jsonp_enabled', true )
	*/
	const RestJsonpEnabled = "rest_jsonp_enabled";
	/**
			 * Filters the namespace index data.
			 *
			 * This typically is just the route data for the namespace, but you can
			 * add any data you'd like here.
			 *
			 * @since 4.4.0
			 *
			 * @param WP_REST_Response $response Response data.
			 * @param WP_REST_Request  $request  Request data. The namespace is passed as the 'namespace' parameter.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_namespace_index', $response, $request )
	*/
	const RestNamespaceIndex = "rest_namespace_index";
	/**
			 * Filters the oEmbed TTL value (time to live).
			 *
			 * Similar to the {@see 'oembed_ttl'} filter, but for the REST API
			 * oEmbed proxy endpoint.
			 *
			 * @since 4.8.0
			 *
			 * @param int    $time    Time to live (in seconds).
			 * @param string $url     The attempted embed URL.
			 * @param array  $args    An array of embed request arguments.
			 * @Reference wp-includes\class-wp-oembed-controller.php apply_filters( 'rest_oembed_ttl', DAY_IN_SECONDS, $url, $args )
	*/
	const RestOembedTtl = "rest_oembed_ttl";
	/**
			 * Filters the API response.
			 *
			 * Allows modification of the response before returning.
			 *
			 * @since 4.4.0
			 * @since 4.5.0 Applied to embedded responses.
			 *
			 * @param WP_HTTP_Response $result  Result to send to the client. Usually a WP_REST_Response.
			 * @param WP_REST_Server   $this    Server instance.
			 * @param WP_REST_Request  $request Request used to generate the response.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_post_dispatch', rest_ensure_response( $result ), $this, $request )
	* @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_post_dispatch', rest_ensure_response( $response ), $this, $request )
	*/
	const RestPostDispatch = "rest_post_dispatch";
	/**
			 * Filters the query arguments for a search request.
			 *
			 * Enables adding extra arguments or setting defaults for a post search request.
			 *
			 * @since 5.1.0
			 *
			 * @param array           $query_args Key value array of query var to query value.
			 * @param WP_REST_Request $request    The request used.
			 * @Reference wp-includes\rest-api\search\class-wp-rest-post-search-handler.php apply_filters( 'rest_post_search_query', $query_args, $request )
	*/
	const RestPostSearchQuery = "rest_post_search_query";
	/**
			 * Filters the pre-calculated result of a REST dispatch request.
			 *
			 * Allow hijacking the request before dispatching by returning a non-empty. The returned value
			 * will be used to serve the request instead.
			 *
			 * @since 4.4.0
			 *
			 * @param mixed           $result  Response to replace the requested version with. Can be anything
			 *                                 a normal endpoint can return, or null to not hijack the request.
			 * @param WP_REST_Server  $this    Server instance.
			 * @param WP_REST_Request $request Request used to generate the response.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_pre_dispatch', null, $this, $request )
	*/
	const RestPreDispatch = "rest_pre_dispatch";
	/**
				 * Filters the API response.
				 *
				 * Allows modification of the response data after inserting
				 * embedded data (if any) and before echoing the response data.
				 *
				 * @since 4.8.1
				 *
				 * @param array            $result  Response data to send to the client.
				 * @param WP_REST_Server   $this    Server instance.
				 * @param WP_REST_Request  $request Request used to generate the response.
				 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_pre_echo_response', $result, $this, $request )
	*/
	const RestPreEchoResponse = "rest_pre_echo_response";
	/**
				 * Filters the value of a setting recognized by the REST API.
				 *
				 * Allow hijacking the setting value and overriding the built-in behavior by returning a
				 * non-null value.  The returned value will be presented as the setting value instead.
				 *
				 * @since 4.7.0
				 *
				 * @param mixed  $result Value to use for the requested setting. Can be a scalar
				 *                       matching the registered schema for the setting, or null to
				 *                       follow the default get_option() behavior.
				 * @param string $name   Setting name (as shown in REST API responses).
				 * @param array  $args   Arguments passed to register_setting() for this setting.
				 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-settings-controller.php apply_filters( 'rest_pre_get_setting', null, $name, $args )
	*/
	const RestPreGetSetting = "rest_pre_get_setting";
	/**
			 * Filters a comment before it is inserted via the REST API.
			 *
			 * Allows modification of the comment right before it is inserted via wp_insert_comment().
			 * Returning a WP_Error value from the filter will shortcircuit insertion and allow
			 * skipping further processing.
			 *
			 * @since 4.7.0
			 * @since 4.8.0 `$prepared_comment` can now be a WP_Error to shortcircuit insertion.
			 *
			 * @param array|WP_Error  $prepared_comment The prepared comment data for wp_insert_comment().
			 * @param WP_REST_Request $request          Request used to insert the comment.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'rest_pre_insert_comment', $prepared_comment, $request )
	*/
	const RestPreInsertComment = "rest_pre_insert_comment";
	/**
			 * Filters user data before insertion via the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param object          $prepared_user User object.
			 * @param WP_REST_Request $request       Request object.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php apply_filters( 'rest_pre_insert_user', $prepared_user, $request )
	*/
	const RestPreInsertUser = "rest_pre_insert_user";
	/**
			 * Filters whether the request has already been served.
			 *
			 * Allow sending the request manually - by returning true, the API result
			 * will not be sent to the client.
			 *
			 * @since 4.4.0
			 *
			 * @param bool             $served  Whether the request has already been served.
			 *                                           Default false.
			 * @param WP_HTTP_Response $result  Result to send to the client. Usually a WP_REST_Response.
			 * @param WP_REST_Request  $request Request used to generate the response.
			 * @param WP_REST_Server   $this    Server instance.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_pre_serve_request', false, $result, $request, $this )
	*/
	const RestPreServeRequest = "rest_pre_serve_request";
	/**
				 * Filters whether to preempt a setting value update.
				 *
				 * Allows hijacking the setting update logic and overriding the built-in behavior by
				 * returning true.
				 *
				 * @since 4.7.0
				 *
				 * @param bool   $result Whether to override the default behavior for updating the
				 *                       value of a setting.
				 * @param string $name   Setting name (as shown in REST API responses).
				 * @param mixed  $value  Updated setting value.
				 * @param array  $args   Arguments passed to register_setting() for this setting.
				 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-settings-controller.php apply_filters( 'rest_pre_update_setting', false, $name, $request[ $name ], $args )
	*/
	const RestPreUpdateSetting = "rest_pre_update_setting";
	/**
			 * Filters an attachment returned from the REST API.
			 *
			 * Allows modification of the attachment right before it is returned.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param WP_Post          $post     The original attachment post.
			 * @param WP_REST_Request  $request  Request used to generate the response.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-attachments-controller.php apply_filters( 'rest_prepare_attachment', $response, $post, $request )
	*/
	const RestPrepareAttachment = "rest_prepare_attachment";
	/**
			 * Filters a revision returned from the API.
			 *
			 * Allows modification of the revision right before it is returned.
			 *
			 * @since 5.0.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param WP_Post          $post     The original revision object.
			 * @param WP_REST_Request  $request  Request used to generate the response.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-autosaves-controller.php apply_filters( 'rest_prepare_autosave', $response, $post, $request )
	*/
	const RestPrepareAutosave = "rest_prepare_autosave";
	/**
			 * Filters a comment returned from the API.
			 *
			 * Allows modification of the comment right before it is returned.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_REST_Response  $response The response object.
			 * @param WP_Comment        $comment  The original comment object.
			 * @param WP_REST_Request   $request  Request used to generate the response.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'rest_prepare_comment', $response, $comment, $request )
	*/
	const RestPrepareComment = "rest_prepare_comment";
	/**
			 * Filters a post type returned from the API.
			 *
			 * Allows modification of the post type data right before it is returned.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param object           $item     The original post type object.
			 * @param WP_REST_Request  $request  Request used to generate the response.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-post-types-controller.php apply_filters( 'rest_prepare_post_type', $response, $post_type, $request )
	*/
	const RestPreparePostType = "rest_prepare_post_type";
	/**
			 * Filters a revision returned from the API.
			 *
			 * Allows modification of the revision right before it is returned.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param WP_Post          $post     The original revision object.
			 * @param WP_REST_Request  $request  Request used to generate the response.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-revisions-controller.php apply_filters( 'rest_prepare_revision', $response, $post, $request )
	*/
	const RestPrepareRevision = "rest_prepare_revision";
	/**
			 * Filters a status returned from the REST API.
			 *
			 * Allows modification of the status data right before it is returned.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param object           $status   The original status object.
			 * @param WP_REST_Request  $request  Request used to generate the response.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-post-statuses-controller.php apply_filters( 'rest_prepare_status', $response, $status, $request )
	*/
	const RestPrepareStatus = "rest_prepare_status";
	/**
			 * Filters a taxonomy returned from the REST API.
			 *
			 * Allows modification of the taxonomy data right before it is returned.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param object           $item     The original taxonomy object.
			 * @param WP_REST_Request  $request  Request used to generate the response.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-taxonomies-controller.php apply_filters( 'rest_prepare_taxonomy', $response, $taxonomy, $request )
	*/
	const RestPrepareTaxonomy = "rest_prepare_taxonomy";
	/**
			 * Filters theme data returned from the REST API.
			 *
			 * @since 5.0.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param WP_Theme         $theme    Theme object used to create response.
			 * @param WP_REST_Request  $request  Request object.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-themes-controller.php apply_filters( 'rest_prepare_theme', $response, $theme, $request )
	*/
	const RestPrepareTheme = "rest_prepare_theme";
	/**
			 * Filters user data returned from the REST API.
			 *
			 * @since 4.7.0
			 *
			 * @param WP_REST_Response $response The response object.
			 * @param object           $user     User object used to create response.
			 * @param WP_REST_Request  $request  Request object.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php apply_filters( 'rest_prepare_user', $response, $user, $request )
	*/
	const RestPrepareUser = "rest_prepare_user";
	/**
			 * Filters a comment after it is prepared for the database.
			 *
			 * Allows modification of the comment right after it is prepared for the database.
			 *
			 * @since 4.7.0
			 *
			 * @param array           $prepared_comment The prepared comment data for `wp_insert_comment`.
			 * @param WP_REST_Request $request          The current request.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-comments-controller.php apply_filters( 'rest_preprocess_comment', $prepared_comment, $request )
	*/
	const RestPreprocessComment = "rest_preprocess_comment";
	/**
					 * Filters the response immediately after executing any REST API
					 * callbacks.
					 *
					 * Allows plugins to perform any needed cleanup, for example,
					 * to undo changes made during the {@see 'rest_request_before_callbacks'}
					 * filter.
					 *
					 * Note that this filter will not be called for requests that
					 * fail to authenticate or match to a registered route.
					 *
					 * Note that an endpoint's `permission_callback` can still be
					 * called after this filter - see `rest_send_allow_header()`.
					 *
					 * @since 4.7.0
					 *
					 * @param WP_HTTP_Response|WP_Error $response Result to send to the client. Usually a WP_REST_Response or WP_Error.
					 * @param array                     $handler  Route handler used for the request.
					 * @param WP_REST_Request           $request  Request used to generate the response.
					 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_request_after_callbacks', $response, $handler, $request )
	*/
	const RestRequestAfterCallbacks = "rest_request_after_callbacks";
	/**
					 * Filters the response before executing any REST API callbacks.
					 *
					 * Allows plugins to perform additional validation after a
					 * request is initialized and matched to a registered route,
					 * but before it is executed.
					 *
					 * Note that this filter will not be called for requests that
					 * fail to authenticate or match to a registered route.
					 *
					 * @since 4.7.0
					 *
					 * @param WP_HTTP_Response|WP_Error $response Result to send to the client. Usually a WP_REST_Response or WP_Error.
					 * @param array                     $handler  Route handler used for the request.
					 * @param WP_REST_Request           $request  Request used to generate the response.
					 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_request_before_callbacks', $response, $handler, $request )
	*/
	const RestRequestBeforeCallbacks = "rest_request_before_callbacks";
	/**
			 * Filters the request generated from a URL.
			 *
			 * @since 4.5.0
			 *
			 * @param WP_REST_Request|false $request Generated request object, or false if URL
			 *                                       could not be parsed.
			 * @param string                $url     URL the request was generated from.
			 * @Reference wp-includes\rest-api\class-wp-rest-request.php apply_filters( 'rest_request_from_url', $request, $url )
	*/
	const RestRequestFromUrl = "rest_request_from_url";
	/**
			 * Filters the parameter order.
			 *
			 * The order affects which parameters are checked when using get_param() and family.
			 * This acts similarly to PHP's `request_order` setting.
			 *
			 * @since 4.4.0
			 *
			 * @param array           $order {
			 *    An array of types to check, in order of priority.
			 *
			 * @param string $type The type to check.
			 * }
			 * @param WP_REST_Request $this The request object.
			 * @Reference wp-includes\rest-api\class-wp-rest-request.php apply_filters( 'rest_request_parameter_order', $order, $this )
	*/
	const RestRequestParameterOrder = "rest_request_parameter_order";
	/**
			 * Filters extra CURIEs available on API responses.
			 *
			 * CURIEs allow a shortened version of URI relations. This allows a more
			 * usable form for custom relations than using the full URI. These work
			 * similarly to how XML namespaces work.
			 *
			 * Registered CURIES need to specify a name and URI template. This will
			 * automatically transform URI relations into their shortened version.
			 * The shortened relation follows the format `{name}:{rel}`. `{rel}` in
			 * the URI template will be replaced with the `{rel}` part of the
			 * shortened relation.
			 *
			 * For example, a CURIE with name `example` and URI template
			 * `http://w.org/{rel}` would transform a `http://w.org/term` relation
			 * into `example:term`.
			 *
			 * Well-behaved clients should expand and normalise these back to their
			 * full URI relation, however some naive clients may not resolve these
			 * correctly, so adding new CURIEs may break backward compatibility.
			 *
			 * @since 4.5.0
			 *
			 * @param array $additional Additional CURIEs to register with the API.
			 * @Reference wp-includes\rest-api\class-wp-rest-response.php apply_filters( 'rest_response_link_curies', array() )
	*/
	const RestResponseLinkCuries = "rest_response_link_curies";
	/** This filter is documented in wp-includes/rest-api/endpoints/class-wp-rest-posts-controller.php * @Reference wp-includes\rest-api\endpoints\class-wp-rest-revisions-controller.php apply_filters( 'rest_revision_query', $args, $request )
	*/
	const RestRevisionQuery = "rest_revision_query";
	/**
			 * Filters the publicly-visible data for routes.
			 *
			 * This data is exposed on indexes and can be used by clients or
			 * developers to investigate the site and find out how to use it. It
			 * acts as a form of self-documentation.
			 *
			 * @since 4.4.0
			 *
			 * @param array $available Map of route to route data.
			 * @param array $routes    Internal route data as an associative array.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_route_data', $available, $routes )
	*/
	const RestRouteData = "rest_route_data";
	/**
			 * Send nocache headers on authenticated requests.
			 *
			 * @since 4.4.0
			 *
			 * @param bool $rest_send_nocache_headers Whether to send no-cache headers.
			 * @Reference wp-includes\rest-api\class-wp-rest-server.php apply_filters( 'rest_send_nocache_headers', is_user_logged_in() )
	*/
	const RestSendNocacheHeaders = "rest_send_nocache_headers";
	/**
			 * Filter collection parameters for the themes controller.
			 *
			 * @since 5.0.0
			 *
			 * @param array $query_params JSON Schema-formatted collection parameters.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-themes-controller.php apply_filters( 'rest_themes_collection_params', $query_params )
	*/
	const RestThemesCollectionParams = "rest_themes_collection_params";
	/**
		 * Filters the REST URL.
		 *
		 * Use this filter to adjust the url returned by the get_rest_url() function.
		 *
		 * @since 4.4.0
		 *
		 * @param string $url     REST URL.
		 * @param string $path    REST route.
		 * @param int    $blog_id Blog ID.
		 * @param string $scheme  Sanitization scheme.
		 * @Reference wp-includes\rest-api.php apply_filters( 'rest_url', $url, $path, $blog_id, $scheme )
	*/
	const RestUrl = "rest_url";
	/**
		 * Filters the REST URL prefix.
		 *
		 * @since 4.4.0
		 *
		 * @param string $prefix URL prefix. Default 'wp-json'.
		 * @Reference wp-includes\rest-api.php apply_filters( 'rest_url_prefix', 'wp-json' )
	*/
	const RestUrlPrefix = "rest_url_prefix";
	/**
			 * Filter collection parameters for the users controller.
			 *
			 * This filter registers the collection parameter, but does not map the
			 * collection parameter to an internal WP_User_Query parameter.  Use the
			 * `rest_user_query` filter to set WP_User_Query arguments.
			 *
			 * @since 4.7.0
			 *
			 * @param array $query_params JSON Schema-formatted collection parameters.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php apply_filters( 'rest_user_collection_params', $query_params )
	*/
	const RestUserCollectionParams = "rest_user_collection_params";
	/**
			 * Filters WP_User_Query arguments when querying users via the REST API.
			 *
			 * @link https://developer.wordpress.org/reference/classes/wp_user_query/
			 *
			 * @since 4.7.0
			 *
			 * @param array           $prepared_args Array of arguments for WP_User_Query.
			 * @param WP_REST_Request $request       The current request.
			 * @Reference wp-includes\rest-api\endpoints\class-wp-rest-users-controller.php apply_filters( 'rest_user_query', $prepared_args, $request )
	*/
	const RestUserQuery = "rest_user_query";
	/**
		 * Filters the message body of the password reset mail.
		 *
		 * If the filtered message is empty, the password reset email will not be sent.
		 *
		 * @since 2.8.0
		 * @since 4.1.0 Added `$user_login` and `$user_data` parameters.
		 *
		 * @param string  $message    Default mail message.
		 * @param string  $key        The activation key.
		 * @param string  $user_login The username for the user.
		 * @param WP_User $user_data  WP_User object.
		 * @Reference wp-login.php apply_filters( 'retrieve_password_message', $message, $key, $user_login, $user_data )
	*/
	const RetrievePasswordMessage = "retrieve_password_message";
	/**
		 * Filters the subject of the password reset email.
		 *
		 * @since 2.8.0
		 * @since 4.4.0 Added the `$user_login` and `$user_data` parameters.
		 *
		 * @param string  $title      Default email title.
		 * @param string  $user_login The username for the user.
		 * @param WP_User $user_data  WP_User object.
		 * @Reference wp-login.php apply_filters( 'retrieve_password_title', $title, $user_login, $user_data )
	*/
	const RetrievePasswordTitle = "retrieve_password_title";
	/**
			 * Filters revisions text diff options.
			 *
			 * Filters the options passed to wp_text_diff() when viewing a post revision.
			 *
			 * @since 4.1.0
			 *
			 * @param array   $args {
			 *     Associative array of options to pass to wp_text_diff().
			 *
			 *     @type bool $show_split_view True for split view (two columns), false for
			 *                                 un-split view (single column). Default true.
			 * }
			 * @param string  $field        The current revision field.
			 * @param WP_Post $compare_from The revision post to compare from.
			 * @param WP_Post $compare_to   The revision post to compare to.
			 * @Reference wp-admin\includes\revision.php apply_filters( 'revision_text_diff_options', $args, $field, $compare_from, $compare_to )
	*/
	const RevisionTextDiffOptions = "revision_text_diff_options";
	/**
			 * Filters the list of rewrite rules formatted for output to an .htaccess file.
			 *
			 * @since 1.5.0
			 * @deprecated 1.5.0 Use the mod_rewrite_rules filter instead.
			 *
			 * @param string $rules mod_rewrite Rewrite rules formatted for .htaccess.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'rewrite_rules', $rules )
	*/
	const RewriteRules = "rewrite_rules";
	/**
			 * Filters the full set of generated rewrite rules.
			 *
			 * @since 1.5.0
			 *
			 * @param array $this->rules The compiled array of rewrite rules.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'rewrite_rules_array', $this->rules )
	*/
	const RewriteRulesArray = "rewrite_rules_array";
	/**
			 * Filters text returned for the rich text editor.
			 *
			 * This filter is first evaluated, and the value returned, if an empty string
			 * is passed to wp_richedit_pre(). If an empty string is passed, it results
			 * in a break tag and line feed.
			 *
			 * If a non-empty string is passed, the filter is evaluated on the wp_richedit_pre()
			 * return after being formatted.
			 *
			 * @since 2.0.0
			 * @deprecated 4.3.0
			 *
			 * @param string $output Text for the rich text editor.
			 * @Reference wp-includes\deprecated.php apply_filters( 'richedit_pre', '' )
	* @Reference wp-includes\deprecated.php apply_filters( 'richedit_pre', $output )
	* @Reference wp-includes\class-wp-editor.php apply_filters( 'richedit_pre', array( $content ), '4.3.0', 'format_for_editor' )
	*/
	const RicheditPre = "richedit_pre";
	/**
		 * Filters the robots.txt output.
		 *
		 * @since 3.0.0
		 *
		 * @param string $output The robots.txt output.
		 * @param bool   $public Whether the site is considered "public".
		 * @Reference wp-includes\functions.php apply_filters( 'robots_txt', $output, $public )
	*/
	const RobotsTxt = "robots_txt";
	/**
			 * Filters which capabilities a role has.
			 *
			 * @since 2.0.0
			 *
			 * @param bool[] $capabilities Associative array of capabilities for the role.
			 * @param string $cap          Capability name.
			 * @param string $name         Role name.
			 * @Reference wp-includes\class-wp-role.php apply_filters( 'role_has_cap', $this->capabilities, $cap, $this->name )
	*/
	const RoleHasCap = "role_has_cap";
	/**
			 * Filters rewrite rules used for root-level archives.
			 *
			 * Likely root-level archives would include pagination rules for the homepage
			 * as well as site-wide post feeds (e.g. /feed/, and /feed/atom/).
			 *
			 * @since 1.5.0
			 *
			 * @param array $root_rewrite The root-level rewrite rules.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'root_rewrite_rules', $root_rewrite )
	*/
	const RootRewriteRules = "root_rewrite_rules";
	/**
					 * Filters the RSS enclosure HTML link tag for the current post.
					 *
					 * @since 2.2.0
					 *
					 * @param string $html_link_tag The HTML link tag with a URI and other attributes.
					 * @Reference wp-includes\feed.php apply_filters( 'rss_enclosure', '<enclosure url="' . esc_url( trim( $enclosure[0] ) ) . '" length="' . absint( trim( $enclosure[1] ) ) . '" type="' . esc_attr( $type ) . '" />' . "\n" )
	*/
	const RssEnclosure = "rss_enclosure";
	/**
			 * Filters the RSS update frequency.
			 *
			 * @since 2.1.0
			 *
			 * @param string $frequency An integer passed as a string representing the frequency
			 *                          of RSS updates within the update period. Default '1'.
			 * @Reference wp-includes\feed-rss2.php apply_filters( 'rss_update_frequency', $frequency )
	* @Reference wp-includes\feed-rdf.php apply_filters( 'rss_update_frequency', '1' )
	* @Reference wp-includes\feed-rss2-comments.php apply_filters( 'rss_update_frequency', '1' )
	*/
	const RssUpdateFrequency = "rss_update_frequency";
	/**
			 * Filters how often to update the RSS feed.
			 *
			 * @since 2.1.0
			 *
			 * @param string $duration The update period. Accepts 'hourly', 'daily', 'weekly', 'monthly',
			 *                         'yearly'. Default 'hourly'.
			 * @Reference wp-includes\feed-rss2.php apply_filters( 'rss_update_period', $duration )
	* @Reference wp-includes\feed-rdf.php apply_filters( 'rss_update_period', 'hourly' )
	* @Reference wp-includes\feed-rss2-comments.php apply_filters( 'rss_update_period', 'hourly' )
	*/
	const RssUpdatePeriod = "rss_update_period";
	/**
			 * Filters whether to skip running wptexturize().
			 *
			 * Passing false to the filter will effectively short-circuit wptexturize().
			 * returning the original text passed to the function instead.
			 *
			 * The filter runs only once, the first time wptexturize() is called.
			 *
			 * @since 4.0.0
			 *
			 * @see wptexturize()
			 *
			 * @param bool $run_texturize Whether to short-circuit wptexturize().
			 * @Reference wp-includes\formatting.php apply_filters( 'run_wptexturize', $run_texturize )
	*/
	const RunWptexturize = "run_wptexturize";
	/**
		 * Filters list of allowed CSS attributes.
		 *
		 * @since 2.8.1
		 * @since 4.4.0 Added support for `min-height`, `max-height`, `min-width`, and `max-width`.
		 * @since 4.6.0 Added support for `list-style-type`.
		 * @since 5.0.0 Added support for `background-image`.
		 * @since 5.1.0 Added support for `text-transform`.
		 * @since 5.2.0 Added support for `background-position` and `grid-template-columns`
		 * @since 5.3.0 Added support for `grid`, `flex` and `column` layout properties.
		 *              Extend `background-*` support of individual properties.
		 *
		 * @param string[] $attr Array of allowed CSS attributes.
		 * @Reference wp-includes\kses.php apply_filters(		'safe_style_css',		array(			'background',			'background-color',			'background-image',			'background-position',			'background-size',			'background-attachment',			'background-blend-mode',			'border',			'border-radius',			'border-width',			'border-color',			'border-style',			'border-right',			'border-right-color',			'border-right-style',			'border-right-width',			'border-bottom',			'border-bottom-color',			'border-bottom-style',			'border-bottom-width',			'border-left',			'border-left-color',			'border-left-style',			'border-left-width',			'border-top',			'border-top-color',			'border-top-style',			'border-top-width',			'border-spacing',			'border-collapse',			'caption-side',			'columns',			'column-count',			'column-fill',			'column-gap',			'column-rule',			'column-span',			'column-width',			'color',			'font',			'font-family',			'font-size',			'font-style',			'font-variant',			'font-weight',			'letter-spacing',			'line-height',			'text-align',			'text-decoration',			'text-indent',			'text-transform',			'height',			'min-height',			'max-height',			'width',			'min-width',			'max-width',			'margin',			'margin-right',			'margin-bottom',			'margin-left',			'margin-top',			'padding',			'padding-right',			'padding-bottom',			'padding-left',			'padding-top',			'flex',			'flex-basis',			'flex-direction',			'flex-flow',			'flex-grow',			'flex-shrink',			'grid-template-columns',			'grid-auto-columns',			'grid-column-start',			'grid-column-end',			'grid-column-gap',			'grid-template-rows',			'grid-auto-rows',			'grid-row-start',			'grid-row-end',			'grid-row-gap',			'grid-gap',			'justify-content',			'justify-items',			'justify-self',			'align-content',			'align-items',			'align-self',			'clear',			'cursor',			'direction',			'float',			'overflow',			'vertical-align',			'list-style-type',		)	)
	*/
	const SafeStyleCss = "safe_style_css";
	/**
				 * Filters the WordPress salt.
				 *
				 * @since 2.5.0
				 *
				 * @param string $cached_salt Cached salt for the given scheme.
				 * @param string $scheme      Authentication scheme. Values include 'auth',
				 *                            'secure_auth', 'logged_in', and 'nonce'.
				 * @Reference wp-includes\pluggable.php apply_filters( 'salt', $cached_salts[ $scheme ], $scheme )
	* @Reference wp-includes\pluggable.php apply_filters( 'salt', $cached_salts[ $scheme ], $scheme )
	*/
	const Salt = "salt";
	/**
			 * Filters a sanitized email address.
			 *
			 * This filter is evaluated under several contexts, including 'email_too_short',
			 * 'email_no_at', 'local_invalid_chars', 'domain_period_sequence', 'domain_period_limits',
			 * 'domain_no_periods', 'domain_no_valid_subs', or no context.
			 *
			 * @since 2.8.0
			 *
			 * @param string $sanitized_email The sanitized email address.
			 * @param string $email           The email address, as provided to sanitize_email().
			 * @param string|null $message    A message to pass to the user. null if email is sanitized.
			 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', '', $email, 'email_too_short' )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', $sanitized_email, $email, null )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', '', $email, 'domain_no_periods' )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', '', $email, 'domain_no_valid_subs' )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', '', $email, 'domain_period_limits' )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', '', $email, 'domain_period_sequence' )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', '', $email, 'email_no_at' )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_email', '', $email, 'local_invalid_chars' )
	*/
	const SanitizeEmail = "sanitize_email";
	/**
			 * Filters a sanitized filename string.
			 *
			 * @since 2.8.0
			 *
			 * @param string $filename     Sanitized filename.
			 * @param string $filename_raw The filename prior to sanitization.
			 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_file_name', $filename, $filename_raw )
	* @Reference wp-includes\formatting.php apply_filters( 'sanitize_file_name', $filename, $filename_raw )
	*/
	const SanitizeFileName = "sanitize_file_name";
	/**
		 * Filters the list of characters to remove from a filename.
		 *
		 * @since 2.8.0
		 *
		 * @param array  $special_chars Characters to remove.
		 * @param string $filename_raw  Filename as it was passed into sanitize_file_name().
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_file_name_chars', $special_chars, $filename_raw )
	*/
	const SanitizeFileNameChars = "sanitize_file_name_chars";
	/**
		 * Filters a sanitized HTML class string.
		 *
		 * @since 2.8.0
		 *
		 * @param string $sanitized The sanitized HTML class.
		 * @param string $class     HTML class before sanitization.
		 * @param string $fallback  The fallback string.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_html_class', $sanitized, $class, $fallback )
	*/
	const SanitizeHtmlClass = "sanitize_html_class";
	/**
		 * Filters a sanitized key string.
		 *
		 * @since 3.0.0
		 *
		 * @param string $key     Sanitized key.
		 * @param string $raw_key The key prior to sanitization.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_key', $key, $raw_key )
	*/
	const SanitizeKey = "sanitize_key";
	/**
		 * Filters a mime type following sanitization.
		 *
		 * @since 3.1.3
		 *
		 * @param string $sani_mime_type The sanitized mime type.
		 * @param string $mime_type      The mime type prior to sanitization.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_mime_type', $sani_mime_type, $mime_type )
	*/
	const SanitizeMimeType = "sanitize_mime_type";
	/**
		 * Filters a sanitized text field string.
		 *
		 * @since 2.9.0
		 *
		 * @param string $filtered The sanitized string.
		 * @param string $str      The string prior to being sanitized.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_text_field', $filtered, $str )
	*/
	const SanitizeTextField = "sanitize_text_field";
	/**
		 * Filters a sanitized textarea field string.
		 *
		 * @since 4.7.0
		 *
		 * @param string $filtered The sanitized string.
		 * @param string $str      The string prior to being sanitized.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_textarea_field', $filtered, $str )
	*/
	const SanitizeTextareaField = "sanitize_textarea_field";
	/**
		 * Filters a sanitized title string.
		 *
		 * @since 1.2.0
		 *
		 * @param string $title     Sanitized title.
		 * @param string $raw_title The title prior to sanitization.
		 * @param string $context   The context for which the title is being sanitized.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_title', $title, $raw_title, $context )
	*/
	const SanitizeTitle = "sanitize_title";
	/**
		 * Filters a list of trackback URLs following sanitization.
		 *
		 * The string returned here consists of a space or carriage return-delimited list
		 * of trackback URLs.
		 *
		 * @since 3.4.0
		 *
		 * @param string $urls_to_ping Sanitized space or carriage return separated URLs.
		 * @param string $to_ping      Space or carriage return separated URLs before sanitization.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_trackback_urls', $urls_to_ping, $to_ping )
	*/
	const SanitizeTrackbackUrls = "sanitize_trackback_urls";
	/**
		 * Filters a sanitized username string.
		 *
		 * @since 2.0.1
		 *
		 * @param string $username     Sanitized username.
		 * @param string $raw_username The username prior to sanitization.
		 * @param bool   $strict       Whether to limit the sanitization to specific characters. Default false.
		 * @Reference wp-includes\formatting.php apply_filters( 'sanitize_user', $username, $raw_username, $strict )
	*/
	const SanitizeUser = "sanitize_user";
	/**
		 * Modify an event before it is scheduled.
		 *
		 * @since 3.1.0
		 *
		 * @param stdClass $event {
		 *     An object containing an event's data.
		 *
		 *     @type string       $hook      Action hook to execute when the event is run.
		 *     @type int          $timestamp Unix timestamp (UTC) for when to next run the event.
		 *     @type string|false $schedule  How often the event should subsequently recur.
		 *     @type array        $args      Array containing each separate argument to pass to the hook's callback function.
		 *     @type int          $interval  The interval time in seconds for the schedule. Only present for recurring events.
		 * }
		 * @Reference wp-includes\cron.php apply_filters( 'schedule_event', $event )
	* @Reference wp-includes\cron.php apply_filters( 'schedule_event', $event )
	*/
	const ScheduleEvent = "schedule_event";
	/**
			 * Filters the array of screen layout columns.
			 *
			 * This hook provides back-compat for plugins using the back-compat
			 * Filters instead of add_screen_option().
			 *
			 * @since 2.8.0
			 *
			 * @param array     $empty_columns Empty array.
			 * @param string    $screen_id     Screen ID.
			 * @param WP_Screen $this          Current WP_Screen instance.
			 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'screen_layout_columns', array(), $this->id, $this )
	*/
	const ScreenLayoutColumns = "screen_layout_columns";
	/**
			 * Filters whether to show the Screen Options tab.
			 *
			 * @since 3.2.0
			 *
			 * @param bool      $show_screen Whether to show Screen Options tab.
			 *                               Default true.
			 * @param WP_Screen $this        Current WP_Screen instance.
			 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'screen_options_show_screen', $show_screen, $this )
	*/
	const ScreenOptionsShowScreen = "screen_options_show_screen";
	/**
			 * Filters whether to show the Screen Options submit button.
			 *
			 * @since 4.4.0
			 *
			 * @param bool      $show_button Whether to show Screen Options submit button.
			 *                               Default false.
			 * @param WP_Screen $this        Current WP_Screen instance.
			 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'screen_options_show_submit', false, $this )
	*/
	const ScreenOptionsShowSubmit = "screen_options_show_submit";
	/**
			 * Filters the screen settings text displayed in the Screen Options tab.
			 *
			 * This filter is currently only used on the Widgets screen to enable
			 * accessibility mode.
			 *
			 * @since 3.0.0
			 *
			 * @param string    $screen_settings Screen settings.
			 * @param WP_Screen $this            WP_Screen object.
			 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'screen_settings', $this->_screen_settings, $this )
	*/
	const ScreenSettings = "screen_settings";
	/**
				 * Filters the script loader source.
				 *
				 * @since 2.2.0
				 *
				 * @param string $src    Script loader source path.
				 * @param string $handle Script handle.
				 * @Reference wp-includes\class.wp-scripts.php apply_filters( 'script_loader_src', $src, $handle )
	* @Reference wp-includes\class.wp-scripts.php apply_filters( 'script_loader_src', $src, $handle )
	* @Reference wp-includes\script-loader.php apply_filters( 'script_loader_src', $src, $handle )
	* @Reference wp-includes\formatting.php apply_filters( 'script_loader_src', includes_url( "js/twemoji.js?$version" ), 'twemoji' )
	* @Reference wp-includes\formatting.php apply_filters( 'script_loader_src', includes_url( "js/wp-emoji.js?$version" ), 'wpemoji' )
	* @Reference wp-includes\formatting.php apply_filters( 'script_loader_src', includes_url( "js/wp-emoji-release.min.js?$version" ), 'concatemoji' )
	*/
	const ScriptLoaderSrc = "script_loader_src";
	/**
			 * Filters the HTML script tag of an enqueued script.
			 *
			 * @since 4.1.0
			 *
			 * @param string $tag    The `<script>` tag for the enqueued script.
			 * @param string $handle The script's registered handle.
			 * @param string $src    The script's source URL.
			 * @Reference wp-includes\class.wp-scripts.php apply_filters( 'script_loader_tag', $tag, $handle, $src )
	*/
	const ScriptLoaderTag = "script_loader_tag";
	/**
		 * Filters the search feed link.
		 *
		 * @since 2.5.0
		 *
		 * @param string $link Search feed link.
		 * @param string $feed Feed type. Possible values include 'rss2', 'atom'.
		 * @param string $type The search type. One of 'posts' or 'comments'.
		 * @Reference wp-includes\link-template.php apply_filters( 'search_feed_link', $link, $feed, 'posts' )
	* @Reference wp-includes\link-template.php apply_filters( 'search_feed_link', $link, $feed, 'comments' )
	*/
	const SearchFeedLink = "search_feed_link";
	/**
		 * Filters the array of arguments used when generating the search form.
		 *
		 * @since 5.2.0
		 *
		 * @param array $args The array of arguments for building the search form.
		 * @Reference wp-includes\general-template.php apply_filters( 'search_form_args', $args )
	*/
	const SearchFormArgs = "search_form_args";
	/**
		 * Filters the HTML format of the search form.
		 *
		 * @since 3.6.0
		 *
		 * @param string $format The type of markup to use in the search form.
		 *                       Accepts 'html5', 'xhtml'.
		 * @Reference wp-includes\general-template.php apply_filters( 'search_form_format', $format )
	*/
	const SearchFormFormat = "search_form_format";
	/**
		 * Filters the search permalink.
		 *
		 * @since 3.0.0
		 *
		 * @param string $link   Search permalink.
		 * @param string $search The URL-encoded search term.
		 * @Reference wp-includes\link-template.php apply_filters( 'search_link', $link, $search )
	*/
	const SearchLink = "search_link";
	/**
			 * Filters rewrite rules used for search archives.
			 *
			 * Likely search-related archives include /search/search+query/ as well as
			 * pagination and feed paths for a search.
			 *
			 * @since 1.5.0
			 *
			 * @param array $search_rewrite The rewrite rules for search queries.
			 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'search_rewrite_rules', $search_rewrite )
	*/
	const SearchRewriteRules = "search_rewrite_rules";
	/**
			 * Filters whether the connection is secure.
			 *
			 * @since 3.1.0
			 *
			 * @param bool $secure  Whether the connection is secure.
			 * @param int  $user_id User ID.
			 * @Reference wp-includes\pluggable.php apply_filters( 'secure_auth_cookie', $secure, $user_id )
	*/
	const SecureAuthCookie = "secure_auth_cookie";
	/**
			 * Filters whether to use a secure authentication redirect.
			 *
			 * @since 3.1.0
			 *
			 * @param bool $secure Whether to use a secure authentication redirect. Default false.
			 * @Reference wp-includes\pluggable.php apply_filters( 'secure_auth_redirect', $secure )
	*/
	const SecureAuthRedirect = "secure_auth_redirect";
	/**
			 * Filters whether to use a secure cookie when logged-in.
			 *
			 * @since 3.1.0
			 *
			 * @param bool $secure_logged_in_cookie Whether to use a secure cookie when logged-in.
			 * @param int  $user_id                 User ID.
			 * @param bool $secure                  Whether the connection is secure.
			 * @Reference wp-includes\pluggable.php apply_filters( 'secure_logged_in_cookie', $secure_logged_in_cookie, $user_id, $secure )
	*/
	const SecureLoggedInCookie = "secure_logged_in_cookie";
	/**
		 * Filters whether to use a secure sign-on cookie.
		 *
		 * @since 3.1.0
		 *
		 * @param bool  $secure_cookie Whether to use a secure sign-on cookie.
		 * @param array $credentials {
		 *     Array of entered sign-on data.
		 *
		 *     @type string $user_login    Username.
		 *     @type string $user_password Password entered.
		 *     @type bool   $remember      Whether to 'remember' the user. Increases the time
		 *                                 that the cookie will be kept. Default false.
		 * }
		 * @Reference wp-includes\user.php apply_filters( 'secure_signon_cookie', $secure_cookie, $credentials )
	*/
	const SecureSignonCookie = "secure_signon_cookie";
	/**
		 * Filters the admin URL for the current site or network depending on context.
		 *
		 * @since 4.9.0
		 *
		 * @param string $url    The complete URL including scheme and path.
		 * @param string $path   Path relative to the URL. Blank string if no path is specified.
		 * @param string $scheme The scheme to use.
		 * @Reference wp-includes\link-template.php apply_filters( 'self_admin_url', $url, $path, $scheme )
	*/
	const SelfAdminUrl = "self_admin_url";
	/**
		 * Filters the current feed URL.
		 *
		 * @since 3.6.0
		 *
		 * @see set_url_scheme()
		 * @see wp_unslash()
		 *
		 * @param string $feed_link The link for the feed with set URL scheme.
		 * @Reference wp-includes\feed.php apply_filters( 'self_link', get_self_link() )
	*/
	const SelfLink = "self_link";
	/**
			 * Allows preventing auth cookies from actually being sent to the client.
			 *
			 * @since 4.7.4
			 *
			 * @param bool $send Whether to send auth cookies to the client.
			 * @Reference wp-includes\pluggable.php apply_filters( 'send_auth_cookies', true )
	* @Reference wp-includes\pluggable.php apply_filters( 'send_auth_cookies', true )
	*/
	const SendAuthCookies = "send_auth_cookies";
	/**
			 * Filters whether to notify the site administrator of a new core update.
			 *
			 * By default, administrators are notified when the update offer received
			 * from WordPress.org sets a particular flag. This allows some discretion
			 * in if and when to notify.
			 *
			 * This filter is only evaluated once per release. If the same email address
			 * was already notified of the same new version, WordPress won't repeatedly
			 * email the administrator.
			 *
			 * This filter is also used on about.php to check if a plugin has disabled
			 * these notifications.
			 *
			 * @since 3.7.0
			 *
			 * @param bool   $notify Whether the site administrator is notified.
			 * @param object $item   The update offer.
			 * @Reference wp-admin\includes\class-wp-automatic-updater.php apply_filters( 'send_core_update_notification_email', $notify, $item )
	*/
	const SendCoreUpdateNotificationEmail = "send_core_update_notification_email";
	/**
			 * Filters whether to send the email change email.
			 *
			 * @since 4.3.0
			 *
			 * @see wp_insert_user() For `$user` and `$userdata` fields.
			 *
			 * @param bool  $send     Whether to send the email.
			 * @param array $user     The original user array.
			 * @param array $userdata The updated user array.
			 * @Reference wp-includes\user.php apply_filters( 'send_email_change_email', true, $user, $userdata )
	*/
	const SendEmailChangeEmail = "send_email_change_email";
	/**
		 * Filters whether to send the network admin email change notification email.
		 *
		 * @since 4.9.0
		 *
		 * @param bool   $send       Whether to send the email notification.
		 * @param string $old_email  The old network admin email address.
		 * @param string $new_email  The new network admin email address.
		 * @param int    $network_id ID of the network.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'send_network_admin_email_change_email', $send, $old_email, $new_email, $network_id )
	*/
	const SendNetworkAdminEmailChangeEmail = "send_network_admin_email_change_email";
	/**
			 * Filters whether to send the password change email.
			 *
			 * @since 4.3.0
			 *
			 * @see wp_insert_user() For `$user` and `$userdata` fields.
			 *
			 * @param bool  $send     Whether to send the email.
			 * @param array $user     The original user array.
			 * @param array $userdata The updated user array.
			 * @Reference wp-includes\user.php apply_filters( 'send_password_change_email', true, $user, $userdata )
	*/
	const SendPasswordChangeEmail = "send_password_change_email";
	/**
		 * Filters whether to send the site admin email change notification email.
		 *
		 * @since 4.9.0
		 *
		 * @param bool   $send      Whether to send the email notification.
		 * @param string $old_email The old site admin email address.
		 * @param string $new_email The new site admin email address.
		 * @Reference wp-includes\functions.php apply_filters( 'send_site_admin_email_change_email', $send, $old_email, $new_email )
	*/
	const SendSiteAdminEmailChangeEmail = "send_site_admin_email_change_email";
	/**
			 * Filters the class name for the session token manager.
			 *
			 * @since 4.0.0
			 *
			 * @param string $session Name of class to use as the manager.
			 *                        Default 'WP_User_Meta_Session_Tokens'.
			 * @Reference wp-includes\class-wp-session-tokens.php apply_filters( 'session_token_manager', 'WP_User_Meta_Session_Tokens' )
	* @Reference wp-includes\class-wp-session-tokens.php apply_filters( 'session_token_manager', 'WP_User_Meta_Session_Tokens' )
	*/
	const SessionTokenManager = "session_token_manager";
	/**
		 * Filters the resulting URL after setting the scheme.
		 *
		 * @since 3.4.0
		 *
		 * @param string      $url         The complete URL including scheme and path.
		 * @param string      $scheme      Scheme applied to the URL. One of 'http', 'https', or 'relative'.
		 * @param string|null $orig_scheme Scheme requested for the URL. One of 'http', 'https', 'login',
		 *                                 'login_post', 'admin', 'relative', 'rest', 'rpc', or null.
		 * @Reference wp-includes\link-template.php apply_filters( 'set_url_scheme', $url, $scheme, $orig_scheme )
	*/
	const SetUrlScheme = "set_url_scheme";
	/**
					 * Filters a screen option value before it is set.
					 *
					 * The filter can also be used to modify non-standard [items]_per_page
					 * settings. See the parent function for a full list of standard options.
					 *
					 * Returning false to the filter will skip saving the current option.
					 *
					 * @since 2.8.0
					 *
					 * @see set_screen_options()
					 *
					 * @param bool     $keep   Whether to save or skip saving the screen option value. Default false.
					 * @param string   $option The option name.
					 * @param int      $value  The number of rows to use.
					 * @Reference wp-admin\includes\misc.php apply_filters( 'set-screen-option', false, $option, $value )
	*/
	const SetScreenOption = "set-screen-option";
	/**
		 * Filters the error codes array for shaking the login form.
		 *
		 * @since 3.0.0
		 *
		 * @param array $shake_error_codes Error codes that shake the login form.
		 * @Reference wp-login.php apply_filters( 'shake_error_codes', $shake_error_codes )
	*/
	const ShakeErrorCodes = "shake_error_codes";
	/**
		 * Filters the Press This bookmarklet link.
		 *
		 * @since 2.6.0
		 * @deprecated 4.9.0
		 *
		 * @param string $link The Press This bookmarklet link.
		 * @Reference wp-includes\deprecated.php apply_filters( 'shortcut_link', $link )
	*/
	const ShortcutLink = "shortcut_link";
	/**
		 * Filters whether to show the admin bar.
		 *
		 * Returning false to this hook is the recommended way to hide the admin bar.
		 * The user's display preference is used for logged in users.
		 *
		 * @since 3.1.0
		 *
		 * @param bool $show_admin_bar Whether the admin bar should be shown. Default false.
		 * @Reference wp-includes\admin-bar.php apply_filters( 'show_admin_bar', $show_admin_bar )
	*/
	const ShowAdminBar = "show_admin_bar";
	/**
				 * Filters whether to display the advanced plugins list table.
				 *
				 * There are two types of advanced plugins - must-use and drop-ins -
				 * which can be used in a single site or Multisite network.
				 *
				 * The $type parameter allows you to differentiate between the type of advanced
				 * plugins to filter the display of. Contexts include 'mustuse' and 'dropins'.
				 *
				 * @since 3.0.0
				 *
				 * @param bool   $show Whether to show the advanced plugins for the specified
				 *                     plugin type. Default true.
				 * @param string $type The plugin type. Accepts 'mustuse', 'dropins'.
				 * @Reference wp-admin\includes\class-wp-plugins-list-table.php apply_filters( 'show_advanced_plugins', true, 'mustuse' )
	* @Reference wp-admin\includes\class-wp-plugins-list-table.php apply_filters( 'show_advanced_plugins', true, 'dropins' )
	*/
	const ShowAdvancedPlugins = "show_advanced_plugins";
	/**
				 * Filters whether to display network-active plugins alongside plugins active for the current site.
				 *
				 * This also controls the display of inactive network-only plugins (plugins with
				 * "Network: true" in the plugin header).
				 *
				 * Plugins cannot be network-activated or network-deactivated from this screen.
				 *
				 * @since 4.4.0
				 *
				 * @param bool $show Whether to show network-active plugins. Default is whether the current
				 *                   user can manage network plugins (ie. a Super Admin).
				 * @Reference wp-admin\includes\class-wp-plugins-list-table.php apply_filters( 'show_network_active_plugins', $show )
	*/
	const ShowNetworkActivePlugins = "show_network_active_plugins";
	/**
	 * Filters whether to show the Add Existing User form on the Multisite Users screen.
	 *
	 * @since 3.1.0
	 *
	 * @param bool $bool Whether to show the Add Existing User form. Default true.
	 * @Reference wp-admin\network\site-users.php apply_filters( 'show_network_site_users_add_existing_form', true )
	* @Reference wp-admin\network\site-users.php apply_filters( 'show_network_site_users_add_existing_form', true )
	*/
	const ShowNetworkSiteUsersAddExistingForm = "show_network_site_users_add_existing_form";
	/**
	 * Filters whether to show the Add New User form on the Multisite Users screen.
	 *
	 * @since 3.1.0
	 *
	 * @param bool $bool Whether to show the Add New User form. Default true.
	 * @Reference wp-admin\network\site-users.php apply_filters( 'show_network_site_users_add_new_form', true )
	*/
	const ShowNetworkSiteUsersAddNewForm = "show_network_site_users_add_new_form";
	/**
			 * Filters the display of the password fields.
			 *
			 * @since 1.5.1
			 * @since 2.8.0 Added the `$profileuser` parameter.
			 * @since 4.4.0 Now evaluated only in user-edit.php.
			 *
			 * @param bool    $show        Whether to show the password fields. Default true.
			 * @param WP_User $profileuser User object for the current user to edit.
			 * @Reference wp-admin\user-edit.php apply_filters( 'show_password_fields', true, $profileuser )
	*/
	const ShowPasswordFields = "show_password_fields";
	/**
			 * Filters whether to show the post locked dialog.
			 *
			 * Returning a falsey value to the filter will short-circuit displaying the dialog.
			 *
			 * @since 3.6.0
			 *
			 * @param bool         $display Whether to display the dialog. Default true.
			 * @param WP_Post      $post    Post object.
			 * @param WP_User|bool $user    WP_User object on success, false otherwise.
			 * @Reference wp-admin\includes\post.php apply_filters( 'show_post_locked_dialog', true, $post, $user )
	* @Reference wp-admin\edit-form-blocks.php apply_filters( 'show_post_locked_dialog', true, $post, $user_id )
	*/
	const ShowPostLockedDialog = "show_post_locked_dialog";
	/**
	* @Reference wp-includes\widgets\class-wp-widget-recent-comments.php apply_filters( 'show_recent_comments_widget_style', true, $this->id_base )
	*/
	const ShowRecentCommentsWidgetStyle = "show_recent_comments_widget_style";
	/**
		 * Filters the list of sidebars and their widgets.
		 *
		 * @since 2.7.0
		 *
		 * @param array $sidebars_widgets An associative array of sidebars and their widgets.
		 * @Reference wp-includes\widgets.php apply_filters( 'sidebars_widgets', $sidebars_widgets )
	*/
	const SidebarsWidgets = "sidebars_widgets";
	/**
		 * Filters the default site sign-up variables.
		 *
		 * @since 3.0.0
		 *
		 * @param array $signup_defaults {
		 *     An array of default site sign-up variables.
		 *
		 *     @type string   $blogname   The site blogname.
		 *     @type string   $blog_title The site title.
		 *     @type WP_Error $errors     A WP_Error object possibly containing 'blogname' or 'blog_title' errors.
		 * }
		 * @Reference wp-signup.php apply_filters( 'signup_another_blog_init', $signup_defaults )
	*/
	const SignupAnotherBlogInit = "signup_another_blog_init";
	/**
		 * Filters the default site creation variables for the site sign-up form.
		 *
		 * @since 3.0.0
		 *
		 * @param array $signup_blog_defaults {
		 *     An array of default site creation variables.
		 *
		 *     @type string   $user_name  The user username.
		 *     @type string   $user_email The user email address.
		 *     @type string   $blogname   The blogname.
		 *     @type string   $blog_title The title of the site.
		 *     @type WP_Error $errors     A WP_Error object with possible errors relevant to new site creation variables.
		 * }
		 * @Reference wp-signup.php apply_filters( 'signup_blog_init', $signup_blog_defaults )
	*/
	const SignupBlogInit = "signup_blog_init";
	/**
		 * Filters the new site meta variables.
		 *
		 * Use the {@see 'add_signup_meta'} filter instead.
		 *
		 * @since MU (3.0.0)
		 * @deprecated 3.0.0 Use the {@see 'add_signup_meta'} filter instead.
		 *
		 * @param array $blog_meta_defaults An array of default blog meta variables.
		 * @Reference wp-signup.php apply_filters( 'signup_create_blog_meta', $blog_meta_defaults )
	*/
	const SignupCreateBlogMeta = "signup_create_blog_meta";
	/**
		 * Filters the list of available languages for front-end site signups.
		 *
		 * Passing an empty array to this hook will disable output of the setting on the
		 * signup form, and the default language will be used when creating the site.
		 *
		 * Languages not already installed will be stripped.
		 *
		 * @since 4.4.0
		 *
		 * @param array $available_languages Available languages.
		 * @Reference wp-signup.php apply_filters( 'signup_get_available_languages', get_available_languages() )
	*/
	const SignupGetAvailableLanguages = "signup_get_available_languages";
	/**
		 * Filters the metadata for a site signup.
		 *
		 * The metadata will be serialized prior to storing it in the database.
		 *
		 * @since 4.8.0
		 *
		 * @param array  $meta       Signup meta data. Default empty array.
		 * @param string $domain     The requested domain.
		 * @param string $path       The requested path.
		 * @param string $title      The requested site title.
		 * @param string $user       The user's requested login name.
		 * @param string $user_email The user's email address.
		 * @param string $key        The user's activation key.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'signup_site_meta', $meta, $domain, $path, $title, $user, $user_email, $key )
	*/
	const SignupSiteMeta = "signup_site_meta";
	/**
		 * Filters the default user variables used on the user sign-up form.
		 *
		 * @since 3.0.0
		 *
		 * @param array $signup_user_defaults {
		 *     An array of default user variables.
		 *
		 *     @type string   $user_name  The user username.
		 *     @type string   $user_email The user email address.
		 *     @type WP_Error $errors     A WP_Error object with possible errors relevant to the sign-up user.
		 * }
		 * @Reference wp-signup.php apply_filters( 'signup_user_init', $signup_user_defaults )
	*/
	const SignupUserInit = "signup_user_init";
	/**
		 * Filters the metadata for a user signup.
		 *
		 * The metadata will be serialized prior to storing it in the database.
		 *
		 * @since 4.8.0
		 *
		 * @param array  $meta       Signup meta data. Default empty array.
		 * @param string $user       The user's requested login name.
		 * @param string $user_email The user's email address.
		 * @param string $key        The user's activation key.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'signup_user_meta', $meta, $user, $user_email, $key )
	*/
	const SignupUserMeta = "signup_user_meta";
	/**
			 * Filters the category archive page title.
			 *
			 * @since 2.0.10
			 *
			 * @param string $term_name Category name for archive being displayed.
			 * @Reference wp-includes\general-template.php apply_filters( 'single_cat_title', $term->name )
	*/
	const SingleCatTitle = "single_cat_title";
	/**
		 * Filters the page title for a single post.
		 *
		 * @since 0.71
		 *
		 * @param string $_post_title The single post page title.
		 * @param object $_post       The current queried object as returned by get_queried_object().
		 * @Reference wp-includes\general-template.php apply_filters( 'single_post_title', $_post->post_title, $_post )
	*/
	const SinglePostTitle = "single_post_title";
	/**
			 * Filters the tag archive page title.
			 *
			 * @since 2.3.0
			 *
			 * @param string $term_name Tag name for archive being displayed.
			 * @Reference wp-includes\general-template.php apply_filters( 'single_tag_title', $term->name )
	*/
	const SingleTagTitle = "single_tag_title";
	/**
			 * Filters the custom taxonomy archive page title.
			 *
			 * @since 3.1.0
			 *
			 * @param string $term_name Term name for archive being displayed.
			 * @Reference wp-includes\general-template.php apply_filters( 'single_term_title', $term->name )
	*/
	const SingleTermTitle = "single_term_title";
	/**
		 * Filters the contents of the email notification sent when the site admin email address is changed.
		 *
		 * @since 4.9.0
		 *
		 * @param array $email_change_email {
		 *            Used to build wp_mail().
		 *
		 *            @type string $to      The intended recipient.
		 *            @type string $subject The subject of the email.
		 *            @type string $message The content of the email.
		 *                The following strings have a special meaning and will get replaced dynamically:
		 *                - ###OLD_EMAIL### The old site admin email address.
		 *                - ###NEW_EMAIL### The new site admin email address.
		 *                - ###SITENAME###  The name of the site.
		 *                - ###SITEURL###   The URL to the site.
		 *            @type string $headers Headers.
		 *        }
		 * @param string $old_email The old site admin email address.
		 * @param string $new_email The new site admin email address.
		 * @Reference wp-includes\functions.php apply_filters( 'site_admin_email_change_email', $email_change_email, $old_email, $new_email )
	*/
	const SiteAdminEmailChangeEmail = "site_admin_email_change_email";
	/**
				 * Filters the array of themes allowed on the site.
				 *
				 * @since 4.5.0
				 *
				 * @param string[] $allowed_themes An array of theme stylesheet names.
				 * @param int      $blog_id        ID of the site. Defaults to current site.
				 * @Reference wp-includes\class-wp-theme.php apply_filters( 'site_allowed_themes', $allowed_themes[ $blog_id ], $blog_id )
	* @Reference wp-includes\class-wp-theme.php apply_filters( 'site_allowed_themes', $allowed_themes[ $blog_id ], $blog_id )
	*/
	const SiteAllowedThemes = "site_allowed_themes";
	/**
		 * Filters the number of path segments to consider when searching for a site.
		 *
		 * @since 3.9.0
		 *
		 * @param int|null $segments The number of path segments to consider. WordPress by default looks at
		 *                           one path segment following the network path. The function default of
		 *                           null only makes sense when you know the requested path should match a site.
		 * @param string   $domain   The requested domain.
		 * @param string   $path     The requested path, in full.
		 * @Reference wp-includes\ms-load.php apply_filters( 'site_by_path_segments_count', $segments, $domain, $path )
	*/
	const SiteByPathSegmentsCount = "site_by_path_segments_count";
	/**
			 * Filters a site's extended properties.
			 *
			 * @since 4.6.0
			 *
			 * @param stdClass $details The site details.
			 * @Reference wp-includes\class-wp-site.php apply_filters( 'site_details', $details )
	*/
	const SiteDetails = "site_details";
	/**
			 * Filters the site icon attachment metadata.
			 *
			 * @since 4.3.0
			 *
			 * @see wp_generate_attachment_metadata()
			 *
			 * @param array $metadata Attachment metadata.
			 * @Reference wp-admin\includes\class-wp-site-icon.php apply_filters( 'site_icon_attachment_metadata', $metadata )
	*/
	const SiteIconAttachmentMetadata = "site_icon_attachment_metadata";
	/**
			 * Filters the different dimensions that a site icon is saved in.
			 *
			 * @since 4.3.0
			 *
			 * @param int[] $site_icon_sizes Array of sizes available for the Site Icon.
			 * @Reference wp-admin\includes\class-wp-site-icon.php apply_filters( 'site_icon_image_sizes', $this->site_icon_sizes )
	* @Reference wp-admin\includes\class-wp-site-icon.php apply_filters( 'site_icon_image_sizes', $this->site_icon_sizes )
	*/
	const SiteIconImageSizes = "site_icon_image_sizes";
	/**
		 * Filters the site icon meta tags, so plugins can add their own.
		 *
		 * @since 4.3.0
		 *
		 * @param string[] $meta_tags Array of Site Icon meta tags.
		 * @Reference wp-includes\general-template.php apply_filters( 'site_icon_meta_tags', $meta_tags )
	*/
	const SiteIconMetaTags = "site_icon_meta_tags";
	/**
				 * Filters the columns to search in a WP_Site_Query search.
				 *
				 * The default columns include 'domain' and 'path.
				 *
				 * @since 4.6.0
				 *
				 * @param string[]      $search_columns Array of column names to be searched.
				 * @param string        $search         Text being searched.
				 * @param WP_Site_Query $this           The current WP_Site_Query instance.
				 * @Reference wp-includes\class-wp-site-query.php apply_filters( 'site_search_columns', $search_columns, $this->query_vars['search'], $this )
	*/
	const SiteSearchColumns = "site_search_columns";
	/**
			 * An array representing all the modules we wish to test for.
			 *
			 * @since 5.2.0
			 * @since 5.3.0 The `$constant` and `$class` parameters were added.
			 *
			 * @param array $modules {
			 *     An associated array of modules to test for.
			 *
			 *     array $module {
			 *         An associated array of module properties used during testing.
			 *         One of either `$function` or `$extension` must be provided, or they will fail by default.
			 *
			 *         string $function     Optional. A function name to test for the existence of.
			 *         string $extension    Optional. An extension to check if is loaded in PHP.
			 *         string $constant     Optional. A constant name to check for to verify an extension exists.
			 *         string $class        Optional. A class name to check for to verify an extension exists.
			 *         bool   $required     Is this a required feature or not.
			 *         string $fallback_for Optional. The module this module replaces as a fallback.
			 *     }
			 * }
			 * @Reference wp-admin\includes\class-wp-site-health.php apply_filters( 'site_status_test_php_modules', $modules )
	*/
	const SiteStatusTestPhpModules = "site_status_test_php_modules";
	/**
							 * Filter the output of a finished Site Health test.
							 *
							 * @since 5.3.0
							 *
							 * @param array $test_result {
							 *     An associated array of test result data.
							 *
							 *     @param string $label  A label describing the test, and is used as a header in the output.
							 *     @param string $status The status of the test, which can be a value of `good`, `recommended` or `critical`.
							 *     @param array  $badge {
							 *         Tests are put into categories which have an associated badge shown, these can be modified and assigned here.
							 *
							 *         @param string $label The test label, for example `Performance`.
							 *         @param string $color Default `blue`. A string representing a color to use for the label.
							 *     }
							 *     @param string $description A more descriptive explanation of what the test looks for, and why it is important for the end user.
							 *     @param string $actions     An action to direct the user to where they can resolve the issue, if one exists.
							 *     @param string $test        The name of the test being ran, used as a reference point.
							 * }
							 * @Reference wp-admin\includes\class-wp-site-health.php apply_filters( 'site_status_test_result', call_user_func( array( $this, $test_function ) ) )
	* @Reference wp-admin\includes\class-wp-site-health.php apply_filters( 'site_status_test_result', call_user_func( $test['test'] ) )
	*/
	const SiteStatusTestResult = "site_status_test_result";
	/**
			 * Add or modify which site status tests are run on a site.
			 *
			 * The site health is determined by a set of tests based on best practices from
			 * both the WordPress Hosting Team, but also web standards in general.
			 *
			 * Some sites may not have the same requirements, for example the automatic update
			 * checks may be handled by a host, and are therefore disabled in core.
			 * Or maybe you want to introduce a new test, is caching enabled/disabled/stale for example.
			 *
			 * Tests may be added either as direct, or asynchronous ones. Any test that may require some time
			 * to complete should run asynchronously, to avoid extended loading periods within wp-admin.
			 *
			 * @since 5.2.0
			 *
			 * @param array $test_type {
			 *     An associative array, where the `$test_type` is either `direct` or
			 *     `async`, to declare if the test should run via AJAX calls after page load.
			 *
			 *     @type array $identifier {
			 *         `$identifier` should be a unique identifier for the test that should run.
			 *         Plugins and themes are encouraged to prefix test identifiers with their slug
			 *         to avoid any collisions between tests.
			 *
			 *         @type string $label A friendly label for your test to identify it by.
			 *         @type mixed  $test  A callable to perform a direct test, or a string AJAX action to be called
			 *                             to perform an async test.
			 *     }
			 * }
			 * @Reference wp-admin\includes\class-wp-site-health.php apply_filters( 'site_status_tests', $tests )
	*/
	const SiteStatusTests = "site_status_tests";
	/**
		 * Filters the site URL.
		 *
		 * @since 2.7.0
		 *
		 * @param string      $url     The complete site URL including scheme and path.
		 * @param string      $path    Path relative to the site URL. Blank string if no path is specified.
		 * @param string|null $scheme  Scheme to give the site URL context. Accepts 'http', 'https', 'login',
		 *                             'login_post', 'admin', 'relative' or null.
		 * @param int|null    $blog_id Site ID, or null for the current site.
		 * @Reference wp-includes\link-template.php apply_filters( 'site_url', $url, $path, $scheme, $blog_id )
	*/
	const SiteUrl = "site_url";
	/**
			 * Filters the site query clauses.
			 *
			 * @since 4.6.0
			 *
			 * @param string[]      $pieces An associative array of site query clauses.
			 * @param WP_Site_Query $this   Current instance of WP_Site_Query (passed by reference).
			 * @Reference wp-includes\class-wp-site-query.php apply_filters( 'sites_clauses', array( compact( $pieces ), &$this ) )
	*/
	const SitesClauses = "sites_clauses";
	/**
			 * Filter the site data before the get_sites query takes place.
			 *
			 * Return a non-null value to bypass WordPress's default site queries.
			 *
			 * The expected return type from this filter depends on the value passed in the request query_vars:
			 * When `$this->query_vars['count']` is set, the filter should return the site count as an int.
			 * When `'ids' == $this->query_vars['fields']`, the filter should return an array of site ids.
			 * Otherwise the filter should return an array of WP_Site objects.
			 *
			 * @since 5.2.0
			 *
			 * @param array|int|null $site_data Return an array of site data to short-circuit WP's site query,
			 *                                  the site count as an integer if `$this->query_vars['count']` is set,
			 *                                  or null to run the normal queries.
			 * @param WP_Site_Query  $this      The WP_Site_Query instance, passed by reference.
			 * @Reference wp-includes\class-wp-site-query.php apply_filters( 'sites_pre_query', array( $site_data, &$this ) )
	*/
	const SitesPreQuery = "sites_pre_query";
	/**
		 * Filters all the smilies.
		 *
		 * This filter must be added before `smilies_init` is run, as
		 * it is normally only run once to setup the smilies regex.
		 *
		 * @since 4.7.0
		 *
		 * @param array $wpsmiliestrans List of the smilies.
		 * @Reference wp-includes\functions.php apply_filters( 'smilies', $wpsmiliestrans )
	*/
	const Smilies = "smilies";
	/**
		 * Filters the Smiley image URL before it's used in the image element.
		 *
		 * @since 2.9.0
		 *
		 * @param string $smiley_url URL for the smiley image.
		 * @param string $img        Filename for the smiley image.
		 * @param string $site_url   Site URL, as returned by site_url().
		 * @Reference wp-includes\formatting.php apply_filters( 'smilies_src', includes_url( "images/smilies/$img" ), $img, site_url() )
	*/
	const SmiliesSrc = "smilies_src";
	/**
				 * Filters whether to split the query.
				 *
				 * Splitting the query will cause it to fetch just the IDs of the found posts
				 * (and then individually fetch each post by ID), rather than fetching every
				 * complete row at once. One massive result vs. many small results.
				 *
				 * @since 3.4.0
				 *
				 * @param bool     $split_the_query Whether or not to split the query.
				 * @param WP_Query $this            The WP_Query instance.
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'split_the_query', $split_the_query, $this )
	*/
	const SplitTheQuery = "split_the_query";
	/**
			 * Filters an HTTP status header.
			 *
			 * @since 2.2.0
			 *
			 * @param string $status_header HTTP status header.
			 * @param int    $code          HTTP status code.
			 * @param string $description   Description for the status code.
			 * @param string $protocol      Server protocol.
			 * @Reference wp-includes\functions.php apply_filters( 'status_header', $status_header, $code, $description, $protocol )
	* @Reference wp-includes\functions.php apply_filters( 'status_header', $status_header, $code, $description, $protocol )
	*/
	const StatusHeader = "status_header";
	/**
		 * Filters the list of shortcode tags to remove from the content.
		 *
		 * @since 4.7.0
		 *
		 * @param array  $tags_to_remove Array of shortcode tags to remove.
		 * @param string $content        Content shortcodes are being removed from.
		 * @Reference wp-includes\shortcodes.php apply_filters( 'strip_shortcodes_tagnames', $tags_to_remove, $content )
	*/
	const StripShortcodesTagnames = "strip_shortcodes_tagnames";
	/**
			 * Filters an enqueued style's fully-qualified URL.
			 *
			 * @since 2.6.0
			 *
			 * @param string $src    The source URL of the enqueued style.
			 * @param string $handle The style's registered handle.
			 * @Reference wp-includes\class.wp-styles.php apply_filters( 'style_loader_src', $src, $handle )
	*/
	const StyleLoaderSrc = "style_loader_src";
	/**
			 * Filters the HTML link tag of an enqueued style.
			 *
			 * @since 2.6.0
			 * @since 4.3.0 Introduced the `$href` parameter.
			 * @since 4.5.0 Introduced the `$media` parameter.
			 *
			 * @param string $html   The link tag for the enqueued style.
			 * @param string $handle The style's registered handle.
			 * @param string $href   The stylesheet's source URL.
			 * @param string $media  The stylesheet's media attribute.
			 * @Reference wp-includes\class.wp-styles.php apply_filters( 'style_loader_tag', $tag, $handle, $href, $media )
	* @Reference wp-includes\class.wp-styles.php apply_filters( 'style_loader_tag', $rtl_tag, $handle, $rtl_href, $media )
	*/
	const StyleLoaderTag = "style_loader_tag";
	/**
		 * Filters the name of current stylesheet.
		 *
		 * @since 1.5.0
		 *
		 * @param string $stylesheet Name of the current stylesheet.
		 * @Reference wp-includes\theme.php apply_filters( 'stylesheet', get_option( 'stylesheet' ) )
	*/
	const Stylesheet = "stylesheet";
	/**
		 * Filters the stylesheet directory path for current theme.
		 *
		 * @since 1.5.0
		 *
		 * @param string $stylesheet_dir Absolute path to the current theme.
		 * @param string $stylesheet     Directory name of the current theme.
		 * @param string $theme_root     Absolute path to themes directory.
		 * @Reference wp-includes\theme.php apply_filters( 'stylesheet_directory', $stylesheet_dir, $stylesheet, $theme_root )
	*/
	const StylesheetDirectory = "stylesheet_directory";
	/**
		 * Filters the stylesheet directory URI.
		 *
		 * @since 1.5.0
		 *
		 * @param string $stylesheet_dir_uri Stylesheet directory URI.
		 * @param string $stylesheet         Name of the activated theme's directory.
		 * @param string $theme_root_uri     Themes root URI.
		 * @Reference wp-includes\theme.php apply_filters( 'stylesheet_directory_uri', $stylesheet_dir_uri, $stylesheet, $theme_root_uri )
	*/
	const StylesheetDirectoryUri = "stylesheet_directory_uri";
	/**
		 * Filters the URI of the current theme stylesheet.
		 *
		 * @since 1.5.0
		 *
		 * @param string $stylesheet_uri     Stylesheet URI for the current theme/child theme.
		 * @param string $stylesheet_dir_uri Stylesheet directory URI for the current theme/child theme.
		 * @Reference wp-includes\theme.php apply_filters( 'stylesheet_uri', $stylesheet_uri, $stylesheet_dir_uri )
	*/
	const StylesheetUri = "stylesheet_uri";
	/**
		 * Filters reserved site names on a sub-directory Multisite installation.
		 *
		 * @since 3.0.0
		 * @since 4.4.0 'wp-admin', 'wp-content', 'wp-includes', 'wp-json', and 'embed' were added
		 *              to the reserved names list.
		 *
		 * @param array $subdirectory_reserved_names Array of reserved names.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'subdirectory_reserved_names', $names )
	*/
	const SubdirectoryReservedNames = "subdirectory_reserved_names";
	/**
	 * Filters the file of an admin menu sub-menu item.
	 *
	 * @since 4.4.0
	 *
	 * @param string $submenu_file The submenu file.
	 * @param string $parent_file  The submenu item's parent file.
	 * @Reference wp-admin\menu-header.php apply_filters( 'submenu_file', $submenu_file, $parent_file )
	*/
	const SubmenuFile = "submenu_file";
	/**
		 * Filters additional database tables to repair.
		 *
		 * @since 3.0.0
		 *
		 * @param string[] $tables Array of prefixed table names to be repaired.
		 * @Reference wp-admin\maint\repair.php apply_filters( 'tables_to_repair', array() )
	*/
	const TablesToRepair = "tables_to_repair";
	/**
		 * Filters how the items in a tag cloud are sorted.
		 *
		 * @since 2.8.0
		 *
		 * @param WP_Term[] $tags Ordered array of terms.
		 * @param array     $args An array of tag cloud arguments.
		 * @Reference wp-includes\category-template.php apply_filters( 'tag_cloud_sort', $tags, $args )
	*/
	const TagCloudSort = "tag_cloud_sort";
	/**
		 * Filters a string cleaned and escaped for output as an HTML tag.
		 *
		 * @since 2.8.0
		 *
		 * @param string $safe_tag The tag name after it has been escaped.
		 * @param string $tag_name The text before it was escaped.
		 * @Reference wp-includes\formatting.php apply_filters( 'tag_escape', $safe_tag, $tag_name )
	*/
	const TagEscape = "tag_escape";
	/**
			 * Filters the post tag feed link.
			 *
			 * @since 2.3.0
			 *
			 * @param string $link The tag feed link.
			 * @param string $feed Feed type. Possible values include 'rss2', 'atom'.
			 * @Reference wp-includes\link-template.php apply_filters( 'tag_feed_link', $link, $feed )
	*/
	const TagFeedLink = "tag_feed_link";
	/**
			 * Filters the tag link.
			 *
			 * @since 2.3.0
			 * @deprecated 2.5.0 Use 'term_link' instead.
			 *
			 * @param string $termlink Tag link URL.
			 * @param int    $term_id  Term ID.
			 * @Reference wp-includes\taxonomy.php apply_filters( 'tag_link', $termlink, $term->term_id )
	*/
	const TagLink = "tag_link";
	/**
					 * Filters rewrite rules used specifically for Tags.
					 *
					 * @since 2.3.0
					 * @deprecated 3.1.0 Use 'post_tag_rewrite_rules' instead
					 *
					 * @param array $rules The rewrite rules generated for tags.
					 * @Reference wp-includes\class-wp-rewrite.php apply_filters( 'tag_rewrite_rules', $rules )
	*/
	const TagRewriteRules = "tag_rewrite_rules";
	/**
			 * Filters the action links displayed for each term in the Tags list table.
			 *
			 * @since 2.8.0
			 * @deprecated 3.0.0 Use {$taxonomy}_row_actions instead.
			 *
			 * @param string[] $actions An array of action links to be displayed. Default
			 *                          'Edit', 'Quick Edit', 'Delete', and 'View'.
			 * @param WP_Term  $tag     Term object.
			 * @Reference wp-admin\includes\class-wp-terms-list-table.php apply_filters( 'tag_row_actions', $actions, $tag )
	*/
	const TagRowActions = "tag_row_actions";
	/**
				 * Filters the number of terms displayed per page for the Tags list table.
				 *
				 * @since 2.7.0
				 * @deprecated 2.8.0 Use edit_tags_per_page instead.
				 *
				 * @param int $tags_per_page Number of tags to be displayed. Default 20.
				 * @Reference wp-admin\includes\class-wp-terms-list-table.php apply_filters( 'tagsperpage', $tags_per_page )
	*/
	const Tagsperpage = "tagsperpage";
	/**
			 * Filters the feed link for a taxonomy other than 'category' or 'post_tag'.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link     The taxonomy feed link.
			 * @param string $feed     Feed type. Possible values include 'rss2', 'atom'.
			 * @param string $taxonomy The taxonomy name.
			 * @Reference wp-includes\link-template.php apply_filters( 'taxonomy_feed_link', $link, $feed, $taxonomy )
	*/
	const TaxonomyFeedLink = "taxonomy_feed_link";
	/**
			 * Filters the taxonomy parent drop-down on the Edit Term page.
			 *
			 * @since 3.7.0
			 * @since 4.2.0 Added `$context` parameter.
			 *
			 * @param array  $dropdown_args {
			 *     An array of taxonomy parent drop-down arguments.
			 *
			 *     @type int|bool $hide_empty       Whether to hide terms not attached to any posts. Default 0|false.
			 *     @type bool     $hide_if_empty    Whether to hide the drop-down if no terms exist. Default false.
			 *     @type string   $taxonomy         The taxonomy slug.
			 *     @type string   $name             Value of the name attribute to use for the drop-down select element.
			 *                                      Default 'parent'.
			 *     @type string   $orderby          The field to order by. Default 'name'.
			 *     @type bool     $hierarchical     Whether the taxonomy is hierarchical. Default true.
			 *     @type string   $show_option_none Label to display if there are no terms. Default 'None'.
			 * }
			 * @param string $taxonomy The taxonomy slug.
			 * @param string $context  Filter context. Accepts 'new' or 'edit'.
			 * @Reference wp-admin\edit-tags.php apply_filters( 'taxonomy_parent_dropdown_args', $dropdown_args, $taxonomy, 'new' )
	* @Reference wp-admin\edit-tag-form.php apply_filters( 'taxonomy_parent_dropdown_args', $dropdown_args, $taxonomy, 'edit' )
	*/
	const TaxonomyParentDropdownArgs = "taxonomy_parent_dropdown_args";
	/**
					 * Filters the teenyMCE config before init.
					 *
					 * @since 2.7.0
					 *
					 * @param array  $mceInit   An array with teenyMCE config.
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'teeny_mce_before_init', $mceInit, $editor_id )
	*/
	const TeenyMceBeforeInit = "teeny_mce_before_init";
	/**
					 * Filters the list of teenyMCE buttons (Text tab).
					 *
					 * @since 2.7.0
					 *
					 * @param array  $buttons   An array of teenyMCE buttons.
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'teeny_mce_buttons', array( 'bold', 'italic', 'underline', 'blockquote', 'strikethrough', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright', 'undo', 'redo', 'link', 'fullscreen' ), $editor_id )
	*/
	const TeenyMceButtons = "teeny_mce_buttons";
	/**
						 * Filters the list of teenyMCE plugins.
						 *
						 * @since 2.7.0
						 *
						 * @param array  $plugins   An array of teenyMCE plugins.
						 * @param string $editor_id Unique editor identifier, e.g. 'content'.
						 * @Reference wp-includes\class-wp-editor.php apply_filters( 'teeny_mce_plugins', array( 'colorpicker', 'lists', 'fullscreen', 'image', 'wordpress', 'wpeditimage', 'wplink' ), $editor_id )
	*/
	const TeenyMcePlugins = "teeny_mce_plugins";
	/**
		 * Filters the name of the current theme.
		 *
		 * @since 1.5.0
		 *
		 * @param string $template Current theme's directory name.
		 * @Reference wp-includes\theme.php apply_filters( 'template', get_option( 'template' ) )
	*/
	const Template = "template";
	/**
		 * Filters the current theme directory path.
		 *
		 * @since 1.5.0
		 *
		 * @param string $template_dir The URI of the current theme directory.
		 * @param string $template     Directory name of the current theme.
		 * @param string $theme_root   Absolute path to the themes directory.
		 * @Reference wp-includes\theme.php apply_filters( 'template_directory', $template_dir, $template, $theme_root )
	*/
	const TemplateDirectory = "template_directory";
	/**
		 * Filters the current theme directory URI.
		 *
		 * @since 1.5.0
		 *
		 * @param string $template_dir_uri The URI of the current theme directory.
		 * @param string $template         Directory name of the current theme.
		 * @param string $theme_root_uri   The themes root URI.
		 * @Reference wp-includes\theme.php apply_filters( 'template_directory_uri', $template_dir_uri, $template, $theme_root_uri )
	*/
	const TemplateDirectoryUri = "template_directory_uri";
	/**
		 * Filters the path of the current template before including it.
		 *
		 * @since 3.0.0
		 *
		 * @param string $template The path of the template to include.
		 * @Reference wp-includes\template-loader.php apply_filters( 'template_include', $template )
	*/
	const TemplateInclude = "template_include";
	/**
		 * Filters the term ID after a new term is created.
		 *
		 * @since 2.3.0
		 *
		 * @param int $term_id Term ID.
		 * @param int $tt_id   Taxonomy term ID.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'term_id_filter', $term_id, $tt_id )
	* @Reference wp-includes\taxonomy.php apply_filters( 'term_id_filter', $term_id, $tt_id )
	*/
	const TermIdFilter = "term_id_filter";
	/**
		 * Filters the term link.
		 *
		 * @since 2.5.0
		 *
		 * @param string $termlink Term link URL.
		 * @param object $term     Term object.
		 * @param string $taxonomy Taxonomy slug.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'term_link', $termlink, $term, $taxonomy )
	*/
	const TermLink = "term_link";
	/**
			 * Filters display of the term name in the terms list table.
			 *
			 * The default output may include padding due to the term's
			 * current level in the term hierarchy.
			 *
			 * @since 2.5.0
			 *
			 * @see WP_Terms_List_Table::column_name()
			 *
			 * @param string $pad_tag_name The term name, padded if not top-level.
			 * @param WP_Term $tag         Term object.
			 * @Reference wp-admin\includes\class-wp-terms-list-table.php apply_filters( 'term_name', $pad . ' ' . $tag->name, $tag )
	*/
	const TermName = "term_name";
	/**
		 * Filters the minimum number of characters required to fire a tag search via Ajax.
		 *
		 * @since 4.0.0
		 *
		 * @param int         $characters The minimum number of characters required. Default 2.
		 * @param WP_Taxonomy $tax        The taxonomy object.
		 * @param string      $s          The search term.
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'term_search_min_chars', 2, $tax, $s )
	*/
	const TermSearchMinChars = "term_search_min_chars";
	/**
	 * Filters the messages displayed when a tag is updated.
	 *
	 * @since 3.7.0
	 *
	 * @param array $messages The messages to be displayed.
	 * @Reference wp-admin\includes\edit-tag-messages.php apply_filters( 'term_updated_messages', $messages )
	*/
	const TermUpdatedMessages = "term_updated_messages";
	/**
			 * Filters the terms query SQL clauses.
			 *
			 * @since 3.1.0
			 *
			 * @param string[] $pieces     Array of query SQL clauses.
			 * @param string[] $taxonomies An array of taxonomy names.
			 * @param array    $args       An array of term query arguments.
			 * @Reference wp-includes\class-wp-term-query.php apply_filters( 'terms_clauses', compact( 'fields', 'join', 'where', 'distinct', 'orderby', 'order', 'limits' ), $taxonomies, $args )
	*/
	const TermsClauses = "terms_clauses";
	/**
			 * Filter the terms array before the query takes place.
			 *
			 * Return a non-null value to bypass WordPress's default term queries.
			 *
			 * @since 5.3.0
			 *
			 * @param array|null    $terms Return an array of term data to short-circuit WP's term query,
			 *                             or null to allow WP queries to run normally.
			 * @param WP_Term_Query $this  The WP_Term_Query instance, passed by reference.
			 *
			 * @Reference wp-includes\class-wp-term-query.php apply_filters( 'terms_pre_query', array( $this->terms, &$this ) )
	*/
	const TermsPreQuery = "terms_pre_query";
	/**
		 * Filters the comma-separated list of terms available to edit.
		 *
		 * @since 2.8.0
		 *
		 * @see get_terms_to_edit()
		 *
		 * @param string $terms_to_edit A comma-separated list of term names.
		 * @param string $taxonomy      The taxonomy name for which to retrieve terms.
		 * @Reference wp-admin\includes\taxonomy.php apply_filters( 'terms_to_edit', $terms_to_edit, $taxonomy )
	*/
	const TermsToEdit = "terms_to_edit";
	/**
		 * Filters the display name of the current post's author.
		 *
		 * @since 2.9.0
		 *
		 * @param string $authordata->display_name The author's display name.
		 * @Reference wp-includes\author-template.php apply_filters( 'the_author', is_object( $authordata ) ? $authordata->display_name : null )
	*/
	const TheAuthor = "the_author";
	/**
		 * Filters the link to the author page of the author of the current post.
		 *
		 * @since 2.9.0
		 *
		 * @param string $link HTML link.
		 * @Reference wp-includes\author-template.php apply_filters( 'the_author_posts_link', $link )
	*/
	const TheAuthorPostsLink = "the_author_posts_link";
	/**
		 * Filters the category or list of categories.
		 *
		 * @since 1.2.0
		 *
		 * @param string $thelist   List of categories for the current post.
		 * @param string $separator Separator used between the categories.
		 * @param string $parents   How to display the category parents. Accepts 'multiple',
		 *                          'single', or empty.
		 * @Reference wp-includes\category-template.php apply_filters( 'the_category', $thelist, $separator, $parents )
	* @Reference wp-admin\includes\class-walker-category-checklist.php apply_filters( 'the_category', $category->name, '', '' )
	* @Reference wp-admin\includes\class-walker-category-checklist.php apply_filters( 'the_category', $category->name, '', '' )
	* @Reference wp-admin\includes\template.php apply_filters( 'the_category', $category->name, '', '' )
	* @Reference wp-admin\includes\template.php apply_filters( 'the_category', $term->name, '', '' )
	* @Reference wp-includes\category-template.php apply_filters( 'the_category', '', $separator, $parents )
	* @Reference wp-includes\category-template.php apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents )
	* @Reference wp-admin\edit-tags.php apply_filters( 'the_category', get_cat_name( get_option( 'default_category' ) ), '', '' )
	*/
	const TheCategory = "the_category";
	/**
		 * Filters the categories before building the category list.
		 *
		 * @since 4.4.0
		 *
		 * @param WP_Term[] $categories An array of the post's categories.
		 * @param int|bool  $post_id    ID of the post we're retrieving categories for. When `false`, we assume the
		 *                              current post in the loop.
		 * @Reference wp-includes\category-template.php apply_filters( 'the_category_list', get_the_category( $post_id ), $post_id )
	*/
	const TheCategoryList = "the_category_list";
	/**
		 * Filters all of the post categories for display in a feed.
		 *
		 * @since 1.2.0
		 *
		 * @param string $the_list All of the RSS post categories.
		 * @param string $type     Type of feed. Possible values include 'rss2', 'atom'.
		 *                         Default 'rss2'.
		 * @Reference wp-includes\feed.php apply_filters( 'the_category_rss', $the_list, $type )
	*/
	const TheCategoryRss = "the_category_rss";
	/**
			 * Filters the comment query results.
			 *
			 * @since 3.1.0
			 *
			 * @param WP_Comment[]     $_comments An array of comments.
			 * @param WP_Comment_Query $this      Current instance of WP_Comment_Query (passed by reference).
			 * @Reference wp-includes\class-wp-comment-query.php apply_filters( 'the_comments', array( $_comments, &$this ) )
	*/
	const TheComments = "the_comments";
	/**
		 * Filters the post content.
		 *
		 * @since 0.71
		 *
		 * @param string $content Content of the current post.
		 * @Reference wp-includes\post-template.php apply_filters( 'the_content', $content )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-attachments-controller.php apply_filters( 'the_content', $post->post_content )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-posts-controller.php apply_filters( 'the_content', $post->post_content )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-revisions-controller.php apply_filters( 'the_content', $post->post_content )
	* @Reference wp-includes\comment.php apply_filters( 'the_content', $post->post_content, $post->ID )
	* @Reference wp-includes\formatting.php apply_filters( 'the_content', $text )
	* @Reference wp-includes\feed.php apply_filters( 'the_content', get_the_content() )
	*/
	const TheContent = "the_content";
	/**
					 * Filters the post content used for WXR exports.
					 *
					 * @since 2.5.0
					 *
					 * @param string $post_content Content of the current post.
					 * @Reference wp-admin\includes\export.php apply_filters( 'the_content_export', $post->post_content )
	*/
	const TheContentExport = "the_content_export";
	/**
		 * Filters the post content for use in feeds.
		 *
		 * @since 2.9.0
		 *
		 * @param string $content   The current post content.
		 * @param string $feed_type Type of feed. Possible values include 'rss2', 'atom'.
		 *                          Default 'rss2'.
		 * @Reference wp-includes\feed.php apply_filters( 'the_content_feed', $content, $feed_type )
	*/
	const TheContentFeed = "the_content_feed";
	/**
					 * Filters the Read More link text.
					 *
					 * @since 2.8.0
					 *
					 * @param string $more_link_element Read More link element.
					 * @param string $more_link_text    Read More text.
					 * @Reference wp-includes\post-template.php apply_filters( 'the_content_more_link', ' <a href="' . get_permalink( $_post ) . "#more-{$_post->ID}\" class=\"more-link\">$more_link_text</a>", $more_link_text )
	*/
	const TheContentMoreLink = "the_content_more_link";
	/**
		 * Filters the post content in the context of an RSS feed.
		 *
		 * @since 0.71
		 *
		 * @param string $content Content of the current post.
		 * @Reference wp-includes\deprecated.php apply_filters('the_content_rss', $content)
	*/
	const TheContentRss = "the_content_rss";
	/**
		 * Filters the date a post was published for display.
		 *
		 * @since 0.71
		 *
		 * @param string $the_date The formatted date string.
		 * @param string $d        PHP date format. Defaults to 'date_format' option
		 *                         if not specified.
		 * @param string $before   HTML output before the date.
		 * @param string $after    HTML output after the date.
		 * @Reference wp-includes\general-template.php apply_filters( 'the_date', $the_date, $d, $before, $after )
	*/
	const TheDate = "the_date";
	/**
			 * Filters the HTML markup output that displays the editor.
			 *
			 * @since 2.1.0
			 *
			 * @param string $output Editor's HTML markup.
			 * @Reference wp-includes\class-wp-editor.php apply_filters(			'the_editor',			'<div id="wp-' . $editor_id_attr . '-editor-container" class="wp-editor-container">' .			$quicktags_toolbar .			'<textarea' . $editor_class . $height . $tabindex . $autocomplete . ' cols="40" name="' . esc_attr( $set['textarea_name'] ) . '" ' .			'id="' . $editor_id_attr . '">%s</textarea></div>'		)
	*/
	const TheEditor = "the_editor";
	/**
			 * Filters the default editor content.
			 *
			 * @since 2.1.0
			 *
			 * @param string $content        Default editor content.
			 * @param string $default_editor The default editor for the current user.
			 *                               Either 'html' or 'tinymce'.
			 * @Reference wp-includes\class-wp-editor.php apply_filters( 'the_editor_content', $content, $default_editor )
	* @Reference wp-includes\widgets\class-wp-widget-text.php apply_filters( 'the_editor_content', $instance['text'], $default_editor )
	*/
	const TheEditorContent = "the_editor_content";
	/**
		 * Filters the displayed post excerpt.
		 *
		 * @since 0.71
		 *
		 * @see get_the_excerpt()
		 *
		 * @param string $post_excerpt The post excerpt.
		 * @Reference wp-includes\post-template.php apply_filters( 'the_excerpt', get_the_excerpt() )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-revisions-controller.php apply_filters( 'the_excerpt', $excerpt, $post )
	* @Reference wp-includes\comment.php apply_filters( 'the_excerpt', $post->post_excerpt )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-attachments-controller.php apply_filters( 'the_excerpt', apply_filters( 'get_the_excerpt', $post->post_excerpt, $post ) )
	* @Reference wp-includes\rest-api\endpoints\class-wp-rest-posts-controller.php apply_filters( 'the_excerpt', apply_filters( 'get_the_excerpt', $post->post_excerpt, $post ) )
	*/
	const TheExcerpt = "the_excerpt";
	/**
		 * Filters the post excerpt for the embed template.
		 *
		 * @since 4.4.0
		 *
		 * @param string $output The current post excerpt.
		 * @Reference wp-includes\embed.php apply_filters( 'the_excerpt_embed', $output )
	*/
	const TheExcerptEmbed = "the_excerpt_embed";
	/**
					 * Filters the post excerpt used for WXR exports.
					 *
					 * @since 2.6.0
					 *
					 * @param string $post_excerpt Excerpt for the current post.
					 * @Reference wp-admin\includes\export.php apply_filters( 'the_excerpt_export', $post->post_excerpt )
	*/
	const TheExcerptExport = "the_excerpt_export";
	/**
		 * Filters the post excerpt for a feed.
		 *
		 * @since 1.2.0
		 *
		 * @param string $output The current post excerpt.
		 * @Reference wp-includes\feed.php apply_filters( 'the_excerpt_rss', $output )
	*/
	const TheExcerptRss = "the_excerpt_rss";
	/**
		 * Filters the feed link anchor tag.
		 *
		 * @since 3.0.0
		 *
		 * @param string $link The complete anchor tag for a feed link.
		 * @param string $feed The feed type. Possible values include 'rss2', 'atom',
		 *                     or an empty string for the default feed type.
		 * @Reference wp-includes\link-template.php apply_filters( 'the_feed_link', $link, $feed )
	*/
	const TheFeedLink = "the_feed_link";
	/**
		 * Filters the output of the XHTML generator tag for display.
		 *
		 * @since 2.5.0
		 *
		 * @param string $generator_type The generator output.
		 * @param string $type           The type of generator to output. Accepts 'html',
		 *                               'xhtml', 'atom', 'rss2', 'rdf', 'comment', 'export'.
		 * @Reference wp-includes\general-template.php apply_filters( 'the_generator', get_the_generator( $type ), $type )
	*/
	const TheGenerator = "the_generator";
	/**
		 * Filters the escaped Global Unique Identifier (guid) of the post.
		 *
		 * @since 4.2.0
		 *
		 * @see get_the_guid()
		 *
		 * @param string $guid Escaped Global Unique Identifier (guid) of the post.
		 * @param int    $id   The post ID.
		 * @Reference wp-includes\post-template.php apply_filters( 'the_guid', $guid, $id )
	*/
	const TheGuid = "the_guid";
	/**
				 * Filters the HTML output of the li element in the post custom fields list.
				 *
				 * @since 2.2.0
				 *
				 * @param string $html  The HTML output for the li element.
				 * @param string $key   Meta key.
				 * @param string $value Meta value.
				 * @Reference wp-includes\post-template.php apply_filters( 'the_meta_key', $html, $key, $value )
	*/
	const TheMetaKey = "the_meta_key";
	/**
			 * Filters the display name of the author who last edited the current post.
			 *
			 * @since 2.8.0
			 *
			 * @param string $last_user->display_name The author's display name.
			 * @Reference wp-includes\author-template.php apply_filters( 'the_modified_author', $last_user->display_name )
	*/
	const TheModifiedAuthor = "the_modified_author";
	/**
		 * Filters the date a post was last modified for display.
		 *
		 * @since 2.1.0
		 *
		 * @param string $the_modified_date The last modified date.
		 * @param string $d                 PHP date format. Defaults to 'date_format' option
		 *                                  if not specified.
		 * @param string $before            HTML output before the date.
		 * @param string $after             HTML output after the date.
		 * @Reference wp-includes\general-template.php apply_filters( 'the_modified_date', $the_modified_date, $d, $before, $after )
	*/
	const TheModifiedDate = "the_modified_date";
	/**
		 * Filters the localized time a post was last modified, for display.
		 *
		 * @since 2.0.0
		 *
		 * @param string $get_the_modified_time The formatted time.
		 * @param string $d                     The time format. Accepts 'G', 'U',
		 *                                      or php date format. Defaults to value
		 *                                      specified in 'time_format' option.
		 * @Reference wp-includes\general-template.php apply_filters( 'the_modified_time', get_the_modified_time( $d ), $d )
	*/
	const TheModifiedTime = "the_modified_time";
	/**
			 * Filters the network query results.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Network[]     $_networks An array of WP_Network objects.
			 * @param WP_Network_Query $this      Current instance of WP_Network_Query (passed by reference).
			 * @Reference wp-includes\class-wp-network-query.php apply_filters( 'the_networks', array( $_networks, &$this ) )
	*/
	const TheNetworks = "the_networks";
	/**
		 * Filters the HTML output for the protected post password form.
		 *
		 * If modifying the password field, please note that the core database schema
		 * limits the password field to 20 characters regardless of the value of the
		 * size attribute in the form input.
		 *
		 * @since 2.7.0
		 *
		 * @param string $output The password form HTML output.
		 * @Reference wp-includes\post-template.php apply_filters( 'the_password_form', $output )
	*/
	const ThePasswordForm = "the_password_form";
	/**
		 * Filters the display of the permalink for the current post.
		 *
		 * @since 1.5.0
		 * @since 4.4.0 Added the `$post` parameter.
		 *
		 * @param string      $permalink The permalink for the current post.
		 * @param int|WP_Post $post      Post ID, WP_Post object, or 0. Default 0.
		 * @Reference wp-includes\link-template.php apply_filters( 'the_permalink', get_permalink( $post ), $post )
	* @Reference wp-includes\comment-template.php apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id )
	* @Reference wp-includes\comment-template.php apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id )
	*/
	const ThePermalink = "the_permalink";
	/**
		 * Filters the permalink to the post for use in feeds.
		 *
		 * @since 2.3.0
		 *
		 * @param string $post_permalink The current post permalink.
		 * @Reference wp-includes\feed.php apply_filters( 'the_permalink_rss', get_permalink() )
	*/
	const ThePermalinkRss = "the_permalink_rss";
	/**
		 * Filters the displayed post thumbnail caption.
		 *
		 * @since 4.6.0
		 *
		 * @param string $caption Caption for the given attachment.
		 * @Reference wp-includes\post-thumbnail-template.php apply_filters( 'the_post_thumbnail_caption', get_the_post_thumbnail_caption( $post ) )
	*/
	const ThePostThumbnailCaption = "the_post_thumbnail_caption";
	/**
				 * Filters the array of retrieved posts after they've been fetched and
				 * internally processed.
				 *
				 * @since 1.5.0
				 *
				 * @param WP_Post[] $posts Array of post objects.
				 * @param WP_Query  $this The WP_Query instance (passed by reference).
				 * @Reference wp-includes\class-wp-query.php apply_filters( 'the_posts', array( $this->posts, &$this ) )
	*/
	const ThePosts = "the_posts";
	/**
					 * Filters the single post for preview mode.
					 *
					 * @since 2.7.0
					 *
					 * @param WP_Post  $post_preview  The Post object.
					 * @param WP_Query $this          The WP_Query instance (passed by reference).
					 * @Reference wp-includes\class-wp-query.php apply_filters( 'the_preview', array( $this->posts[0], &$this ) )
	*/
	const ThePreview = "the_preview";
	/**
		 * Filters the privacy policy link.
		 *
		 * @since 4.9.6
		 *
		 * @param string $link               The privacy policy link. Empty string if it
		 *                                   doesn't exist.
		 * @param string $privacy_policy_url The URL of the privacy policy. Empty string
		 *                                   if it doesn't exist.
		 * @Reference wp-includes\link-template.php apply_filters( 'the_privacy_policy_link', $link, $privacy_policy_url )
	*/
	const ThePrivacyPolicyLink = "the_privacy_policy_link";
	/**
		 * Filters the contents of the search query variable for display.
		 *
		 * @since 2.3.0
		 *
		 * @param mixed $search Contents of the search query variable.
		 * @Reference wp-includes\general-template.php apply_filters( 'the_search_query', get_search_query( false ) )
	*/
	const TheSearchQuery = "the_search_query";
	/**
			 * Filters the short link anchor tag for a post.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link      Shortlink anchor tag.
			 * @param string $shortlink Shortlink URL.
			 * @param string $text      Shortlink's text.
			 * @param string $title     Shortlink's title attribute.
			 * @Reference wp-includes\link-template.php apply_filters( 'the_shortlink', $link, $shortlink, $text, $title )
	*/
	const TheShortlink = "the_shortlink";
	/**
			 * Filters the site query results.
			 *
			 * @since 4.6.0
			 *
			 * @param WP_Site[]     $_sites An array of WP_Site objects.
			 * @param WP_Site_Query $this   Current instance of WP_Site_Query (passed by reference).
			 * @Reference wp-includes\class-wp-site-query.php apply_filters( 'the_sites', array( $_sites, &$this ) )
	*/
	const TheSites = "the_sites";
	/**
		 * Filters the tags list for a given post.
		 *
		 * @since 2.3.0
		 *
		 * @param string $tag_list List of tags.
		 * @param string $before   String to use before tags.
		 * @param string $sep      String to use between the tags.
		 * @param string $after    String to use after tags.
		 * @param int    $id       Post ID.
		 * @Reference wp-includes\category-template.php apply_filters( 'the_tags', get_the_term_list( $id, 'post_tag', $before, $sep, $after ), $before, $sep, $after, $id )
	*/
	const TheTags = "the_tags";
	/**
		 * Filters the list of terms to display.
		 *
		 * @since 2.9.0
		 *
		 * @param string $term_list List of terms to display.
		 * @param string $taxonomy  The taxonomy name.
		 * @param string $before    String to use before the terms.
		 * @param string $sep       String to use between the terms.
		 * @param string $after     String to use after the terms.
		 * @Reference wp-includes\category-template.php apply_filters( 'the_terms', $term_list, $taxonomy, $before, $sep, $after )
	*/
	const TheTerms = "the_terms";
	/**
		 * Filters the time a post was written for display.
		 *
		 * @since 0.71
		 *
		 * @param string $get_the_time The formatted time.
		 * @param string $d            The time format. Accepts 'G', 'U',
		 *                             or php date format.
		 * @Reference wp-includes\general-template.php apply_filters( 'the_time', get_the_time( $d ), $d )
	*/
	const TheTime = "the_time";
	/**
		 * Filters the post title.
		 *
		 * @since 0.71
		 *
		 * @param string $title The post title.
		 * @param int    $id    The post ID.
		 * @Reference wp-includes\post-template.php apply_filters( 'the_title', $title, $id )
	* @Reference wp-admin\includes\class-walker-nav-menu-checklist.php apply_filters( 'the_title', $item->post_title, $item->ID )
	* @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'the_title', $item->title, $item->ID )
	* @Reference wp-includes\customize\class-wp-customize-nav-menu-item-setting.php apply_filters( 'the_title', $original_object->post_title, $original_object->ID )
	* @Reference wp-includes\nav-menu.php apply_filters( 'the_title', $original_object->post_title, $original_object->ID )
	* @Reference wp-includes\class-walker-page.php apply_filters( 'the_title', $page->post_title, $page->ID )
	* @Reference wp-admin\includes\class-wp-posts-list-table.php apply_filters( 'the_title', $parent->post_title, $parent->ID )
	* @Reference wp-includes\comment.php apply_filters( 'the_title', $post->post_title, $post->ID )
	* @Reference wp-includes\general-template.php apply_filters( 'the_title', $result->post_title, $result->ID )
	* @Reference wp-includes\link-template.php apply_filters( 'the_title', $title, $post->ID )
	* @Reference wp-includes\deprecated.php apply_filters('the_title', $post->post_title, $post->ID)
	* @Reference wp-includes\deprecated.php apply_filters('the_title', $post->post_title, $post->ID)
	* @Reference wp-includes\deprecated.php apply_filters('the_title', $title, $post->ID)
	* @Reference wp-includes\deprecated.php apply_filters('the_title', $title, $post->ID)
	*/
	const TheTitle = "the_title";
	/**
		 * Filters the post title for use in a feed.
		 *
		 * @since 1.2.0
		 *
		 * @param string $title The current post title.
		 * @Reference wp-includes\feed.php apply_filters( 'the_title_rss', $title )
	* @Reference wp-admin\includes\export.php apply_filters( 'the_title_rss', $post->post_title )
	* @Reference wp-includes\feed-atom-comments.php apply_filters( 'the_title_rss', $title )
	* @Reference wp-includes\feed-rss2-comments.php apply_filters( 'the_title_rss', $title )
	*/
	const TheTitleRss = "the_title_rss";
	/**
		 * Filters the weekday on which the post was written, for display.
		 *
		 * @since 0.71
		 *
		 * @param string $the_weekday
		 * @Reference wp-includes\general-template.php apply_filters( 'the_weekday', $the_weekday )
	*/
	const TheWeekday = "the_weekday";
	/**
		 * Filters the localized date on which the post was written, for display.
		 *
		 * @since 0.71
		 *
		 * @param string $the_weekday_date The weekday on which the post was written.
		 * @param string $before           The HTML to output before the date.
		 * @param string $after            The HTML to output after the date.
		 * @Reference wp-includes\general-template.php apply_filters( 'the_weekday_date', $the_weekday_date, $before, $after )
	*/
	const TheWeekdayDate = "the_weekday_date";
	/**
			 * Filters the action links displayed for each theme in the Multisite
			 * themes list table.
			 *
			 * The action links displayed are determined by the theme's status, and
			 * which Multisite themes list table is being displayed - the Network
			 * themes list table (themes.php), which displays all installed themes,
			 * or the Site themes list table (site-themes.php), which displays the
			 * non-network enabled themes when editing a site in the Network admin.
			 *
			 * The default action links for the Network themes list table include
			 * 'Network Enable', 'Network Disable', and 'Delete'.
			 *
			 * The default action links for the Site themes list table include
			 * 'Enable', and 'Disable'.
			 *
			 * @since 2.8.0
			 *
			 * @param string[] $actions An array of action links.
			 * @param WP_Theme $theme   The current WP_Theme object.
			 * @param string   $context Status of the theme, one of 'all', 'enabled', or 'disabled'.
			 * @Reference wp-admin\includes\class-wp-ms-themes-list-table.php apply_filters( 'theme_action_links', array_filter( $actions ), $theme, $context )
	* @Reference wp-admin\includes\class-wp-themes-list-table.php apply_filters( 'theme_action_links', $actions, $theme, 'all' )
	*/
	const ThemeActionLinks = "theme_action_links";
	/**
		 * Filters the path to a file in the theme.
		 *
		 * @since 4.7.0
		 *
		 * @param string $path The file path.
		 * @param string $file The requested file to search for.
		 * @Reference wp-includes\link-template.php apply_filters( 'theme_file_path', $path, $file )
	*/
	const ThemeFilePath = "theme_file_path";
	/**
		 * Filters the URL to a file in the theme.
		 *
		 * @since 4.7.0
		 *
		 * @param string $url  The file URL.
		 * @param string $file The requested file to search for.
		 * @Reference wp-includes\link-template.php apply_filters( 'theme_file_uri', $url, $file )
	*/
	const ThemeFileUri = "theme_file_uri";
	/**
			 * Filters the install action links for a theme in the Install Themes list table.
			 *
			 * @since 3.4.0
			 *
			 * @param string[] $actions An array of theme action links. Defaults are
			 *                          links to Install Now, Preview, and Details.
			 * @param WP_Theme $theme   Theme object.
			 * @Reference wp-admin\includes\class-wp-theme-install-list-table.php apply_filters( 'theme_install_actions', $actions, $theme )
	*/
	const ThemeInstallActions = "theme_install_actions";
	/**
		 * Filters a theme's locale.
		 *
		 * @since 3.0.0
		 *
		 * @param string $locale The theme's current locale.
		 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
		 * @Reference wp-includes\l10n.php apply_filters( 'theme_locale', determine_locale(), $domain )
	*/
	const ThemeLocale = "theme_locale";
	/**
		 * Filters the absolute path to the themes directory.
		 *
		 * @since 1.5.0
		 *
		 * @param string $theme_root Absolute path to themes directory.
		 * @Reference wp-includes\theme.php apply_filters( 'theme_root', $theme_root )
	*/
	const ThemeRoot = "theme_root";
	/**
		 * Filters the URI for themes directory.
		 *
		 * @since 1.5.0
		 *
		 * @param string $theme_root_uri         The URI for themes directory.
		 * @param string $siteurl                WordPress web address which is set in General Options.
		 * @param string $stylesheet_or_template The stylesheet or template name of the theme.
		 * @Reference wp-includes\theme.php apply_filters( 'theme_root_uri', $theme_root_uri, get_option( 'siteurl' ), $stylesheet_or_template )
	*/
	const ThemeRootUri = "theme_root_uri";
	/**
			 * Filters the array of row meta for each theme in the Multisite themes
			 * list table.
			 *
			 * @since 3.1.0
			 *
			 * @param string[] $theme_meta An array of the theme's metadata,
			 *                             including the version, author, and
			 *                             theme URI.
			 * @param string   $stylesheet Directory name of the theme.
			 * @param WP_Theme $theme      WP_Theme object.
			 * @param string   $status     Status of the theme.
			 * @Reference wp-admin\includes\class-wp-ms-themes-list-table.php apply_filters( 'theme_row_meta', $theme_meta, $stylesheet, $theme, $status )
	*/
	const ThemeRowMeta = "theme_row_meta";
	/**
			 * Filters the array of excluded directories and files while scanning theme folder.
			 *
			 * @since 4.7.4
			 *
			 * @param string[] $exclusions Array of excluded directories and files.
			 * @Reference wp-includes\class-wp-theme.php apply_filters( 'theme_scandir_exclusions', array( 'CVS', 'node_modules', 'vendor', 'bower_components' ) )
	*/
	const ThemeScandirExclusions = "theme_scandir_exclusions";
	/**
			 * Filters list of page templates for a theme.
			 *
			 * @since 4.9.6
			 *
			 * @param string[]     $post_templates Array of page templates. Keys are filenames,
			 *                                     values are translated names.
			 * @param WP_Theme     $this           The theme object.
			 * @param WP_Post|null $post           The post being edited, provided for context, or null.
			 * @param string       $post_type      Post type to get the templates for.
			 * @Reference wp-includes\class-wp-theme.php apply_filters( 'theme_templates', $post_templates, $this, $post, $post_type )
	*/
	const ThemeTemplates = "theme_templates";
	/**
		 * Filters whether to override the WordPress.org Themes API.
		 *
		 * Passing a non-false value will effectively short-circuit the WordPress.org API request.
		 *
		 * If `$action` is 'query_themes', 'theme_information', or 'feature_list', an object MUST
		 * be passed. If `$action` is 'hot_tags', an array should be passed.
		 *
		 * @since 2.8.0
		 *
		 * @param false|object|array $override Whether to override the WordPress.org Themes API. Default false.
		 * @param string             $action   Requested action. Likely values are 'theme_information',
		 *                                    'feature_list', or 'query_themes'.
		 * @param object             $args     Arguments used to query for installer pages from the Themes API.
		 * @Reference wp-admin\includes\theme.php apply_filters( 'themes_api', false, $action, $args )
	*/
	const ThemesApi = "themes_api";
	/**
		 * Filters arguments used to query for installer pages from the WordPress.org Themes API.
		 *
		 * Important: An object MUST be returned to this filter.
		 *
		 * @since 2.8.0
		 *
		 * @param object $args   Arguments used to query for installer pages from the WordPress.org Themes API.
		 * @param string $action Requested action. Likely values are 'theme_information',
		 *                       'feature_list', or 'query_themes'.
		 * @Reference wp-admin\includes\theme.php apply_filters( 'themes_api_args', $args, $action )
	*/
	const ThemesApiArgs = "themes_api_args";
	/**
		 * Filters the returned WordPress.org Themes API response.
		 *
		 * @since 2.8.0
		 *
		 * @param array|object|WP_Error $res    WordPress.org Themes API response.
		 * @param string                $action Requested action. Likely values are 'theme_information',
		 *                                      'feature_list', or 'query_themes'.
		 * @param object                $args   Arguments used to query for installer pages from the WordPress.org Themes API.
		 * @Reference wp-admin\includes\theme.php apply_filters( 'themes_api_result', $res, $action, $args )
	*/
	const ThemesApiResult = "themes_api_result";
	/**
		 * Filters the locales requested for theme translations.
		 *
		 * @since 3.7.0
		 * @since 4.5.0 The default value of the `$locales` parameter changed to include all locales.
		 *
		 * @param array $locales Theme locales. Default is all available locales of the site.
		 * @Reference wp-includes\update.php apply_filters( 'themes_update_check_locales', $locales )
	*/
	const ThemesUpdateCheckLocales = "themes_update_check_locales";
	/**
	 * Filters the maximum depth of threaded/nested comments.
	 *
	 * @since 2.7.0
	 *
	 * @param int $max_depth The maximum depth of threaded comments. Default 10.
	 * @Reference wp-admin\options-discussion.php apply_filters( 'thread_comments_depth_max', 10 )
	*/
	const ThreadCommentsDepthMax = "thread_comments_depth_max";
	/**
		 * Filters the default time formats.
		 *
		 * @since 2.7.0
		 *
		 * @param string[] $default_time_formats Array of default time formats.
		 * @Reference wp-admin\options-general.php apply_filters( 'time_formats', array( __( 'g:i a' ), 'g:i A', 'H:i' ) )
	*/
	const TimeFormats = "time_formats";
	/**
					 * Filters the TinyMCE config before init.
					 *
					 * @since 2.5.0
					 *
					 * @param array  $mceInit   An array with TinyMCE config.
					 * @param string $editor_id Unique editor identifier, e.g. 'content'.
					 * @Reference wp-includes\class-wp-editor.php apply_filters( 'tiny_mce_before_init', $mceInit, $editor_id )
	* @Reference wp-includes\script-loader.php apply_filters( 'tiny_mce_before_init', $tinymce_settings, 'classic-block' )
	*/
	const TinyMceBeforeInit = "tiny_mce_before_init";
	/**
						 * Filters the list of default TinyMCE plugins.
						 *
						 * The filter specifies which of the default plugins included
						 * in WordPress should be added to the TinyMCE instance.
						 *
						 * @since 3.3.0
						 *
						 * @param array $plugins An array of default TinyMCE plugins.
						 * @Reference wp-includes\class-wp-editor.php apply_filters( 'tiny_mce_plugins', $plugins )
	* @Reference wp-includes\script-loader.php apply_filters( 'tiny_mce_plugins', $tinymce_plugins, 'classic-block' )
	*/
	const TinyMcePlugins = "tiny_mce_plugins";
	/** This filter is documented in wp-includes/post.php * @Reference wp-includes\customize\class-wp-customize-nav-menu-item-setting.php apply_filters( 'title_save_pre', wp_slash( $menu_item_value['title'] ) )
	*/
	const TitleSavePre = "title_save_pre";
	/**
		 * Filters the returned trackback URL.
		 *
		 * @since 2.2.0
		 *
		 * @param string $tb_url The trackback URL.
		 * @Reference wp-includes\comment-template.php apply_filters( 'trackback_url', $tb_url )
	*/
	const TrackbackUrl = "trackback_url";
	/**
		 * Allows a plugin to override the WordPress.org Translation Installation API entirely.
		 *
		 * @since 4.0.0
		 *
		 * @param bool|array  $result The result object. Default false.
		 * @param string      $type   The type of translations being requested.
		 * @param object      $args   Translation API arguments.
		 * @Reference wp-admin\includes\translation-install.php apply_filters( 'translations_api', false, $type, $args )
	*/
	const TranslationsApi = "translations_api";
	/**
		 * Filters the Translation Installation API response results.
		 *
		 * @since 4.0.0
		 *
		 * @param object|WP_Error $res  Response object or WP_Error.
		 * @param string          $type The type of translations being requested.
		 * @param object          $args Translation API arguments.
		 * @Reference wp-admin\includes\translation-install.php apply_filters( 'translations_api_result', $res, $type, $args )
	*/
	const TranslationsApiResult = "translations_api_result";
	/**
		 * Filters the insert media from URL form HTML.
		 *
		 * @since 3.3.0
		 *
		 * @param string $form_html The insert from URL form HTML.
		 * @Reference wp-admin\includes\media.php apply_filters( 'type_url_form_media', wp_media_insert_url_form( $type ) )
	*/
	const TypeUrlFormMedia = "type_url_form_media";
	/**
		 * Filters whether to use ZipArchive to unzip archives.
		 *
		 * @since 3.0.0
		 *
		 * @param bool $ziparchive Whether to use ZipArchive. Default true.
		 * @Reference wp-admin\includes\file.php apply_filters( 'unzip_file_use_ziparchive', true )
	*/
	const UnzipFileUseZiparchive = "unzip_file_use_ziparchive";
	/**
		 * Filters the path to the attached file to update.
		 *
		 * @since 2.1.0
		 *
		 * @param string $file          Path to the attached file to update.
		 * @param int    $attachment_id Attachment ID.
		 * @Reference wp-includes\post.php apply_filters( 'update_attached_file', $file, $attachment_id )
	*/
	const UpdateAttachedFile = "update_attached_file";
	/**
			 * Filters the list of action links available following bulk plugin updates.
			 *
			 * @since 3.0.0
			 *
			 * @param string[] $update_actions Array of plugin action links.
			 * @param array    $plugin_info    Array of information for the last-updated plugin.
			 * @Reference wp-admin\includes\class-bulk-plugin-upgrader-skin.php apply_filters( 'update_bulk_plugins_complete_actions', $update_actions, $this->plugin_info )
	*/
	const UpdateBulkPluginsCompleteActions = "update_bulk_plugins_complete_actions";
	/**
			 * Filters the list of action links available following bulk theme updates.
			 *
			 * @since 3.0.0
			 *
			 * @param string[] $update_actions Array of theme action links.
			 * @param WP_Theme $theme_info     Theme object for the last-updated theme.
			 * @Reference wp-admin\includes\class-bulk-theme-upgrader-skin.php apply_filters( 'update_bulk_theme_complete_actions', $update_actions, $this->theme_info )
	*/
	const UpdateBulkThemeCompleteActions = "update_bulk_theme_complete_actions";
	/**
		 * Filters the `css` (`post_content`) and `preprocessed` (`post_content_filtered`) args for a `custom_css` post being updated.
		 *
		 * This filter can be used by plugin that offer CSS pre-processors, to store the original
		 * pre-processed CSS in `post_content_filtered` and then store processed CSS in `post_content`.
		 * When used in this way, the `post_content_filtered` should be supplied as the setting value
		 * instead of `post_content` via a the `customize_value_custom_css` filter, for example:
		 *
		 * <code>
		 * add_filter( 'customize_value_custom_css', function( $value, $setting ) {
		 *     $post = wp_get_custom_css_post( $setting->stylesheet );
		 *     if ( $post && ! empty( $post->post_content_filtered ) ) {
		 *         $css = $post->post_content_filtered;
		 *     }
		 *     return $css;
		 * }, 10, 2 );
		 * </code>
		 *
		 * @since 4.7.0
		 * @param array $data {
		 *     Custom CSS data.
		 *
		 *     @type string $css          CSS stored in `post_content`.
		 *     @type string $preprocessed Pre-processed CSS stored in `post_content_filtered`. Normally empty string.
		 * }
		 * @param array $args {
		 *     The args passed into `wp_update_custom_css_post()` merged with defaults.
		 *
		 *     @type string $css          The original CSS passed in to be updated.
		 *     @type string $preprocessed The original preprocessed CSS passed in to be updated.
		 *     @type string $stylesheet   The stylesheet (theme) being updated.
		 * }
		 * @Reference wp-includes\theme.php apply_filters( 'update_custom_css_data', $data, array_merge( $args, compact( 'css' ) ) )
	*/
	const UpdateCustomCssData = "update_custom_css_data";
	/**
		 * Filters feedback messages displayed during the core update process.
		 *
		 * The filter is first evaluated after the zip file for the latest version
		 * has been downloaded and unzipped. It is evaluated five more times during
		 * the process:
		 *
		 * 1. Before WordPress begins the core upgrade process.
		 * 2. Before Maintenance Mode is enabled.
		 * 3. Before WordPress begins copying over the necessary files.
		 * 4. Before Maintenance Mode is disabled.
		 * 5. Before the database is upgraded.
		 *
		 * @since 2.5.0
		 *
		 * @param string $feedback The core update feedback messages.
		 * @Reference wp-admin\includes\update-core.php apply_filters( 'update_feedback', __( 'Verifying the unpacked files&#8230;' ) )
	* @Reference wp-admin\includes\class-core-upgrader.php apply_filters( 'update_feedback', $result )
	* @Reference wp-admin\includes\class-core-upgrader.php apply_filters( 'update_feedback', $this->strings['start_rollback'] )
	* @Reference wp-admin\includes\update-core.php apply_filters( 'update_feedback', __( 'Copying the required files&#8230;' ) )
	* @Reference wp-admin\includes\update-core.php apply_filters( 'update_feedback', __( 'Disabling Maintenance mode&#8230;' ) )
	* @Reference wp-admin\includes\update-core.php apply_filters( 'update_feedback', __( 'Enabling Maintenance mode&#8230;' ) )
	* @Reference wp-admin\includes\update-core.php apply_filters( 'update_feedback', __( 'Preparing to install the latest version&#8230;' ) )
	* @Reference wp-admin\includes\update-core.php apply_filters( 'update_feedback', __( 'Upgrading database&#8230;' ) )
	* @Reference wp-admin\includes\class-core-upgrader.php apply_filters( 'update_feedback', $download->get_error_message() )
	*/
	const UpdateFeedback = "update_feedback";
	/**
			 * Filters the version/update text displayed in the admin footer.
			 *
			 * WordPress prints the current version and update information,
			 * using core_update_footer() at priority 10.
			 *
			 * @since 2.3.0
			 *
			 * @see core_update_footer()
			 *
			 * @param string $content The content that will be printed.
			 * @Reference wp-admin\admin-footer.php apply_filters( 'update_footer', '' )
	*/
	const UpdateFooter = "update_footer";
	/**
			 * Filters the list of action links available following a single plugin update.
			 *
			 * @since 2.7.0
			 *
			 * @param string[] $update_actions Array of plugin action links.
			 * @param string   $plugin         Path to the plugin file relative to the plugins directory.
			 * @Reference wp-admin\includes\class-plugin-upgrader-skin.php apply_filters( 'update_plugin_complete_actions', $update_actions, $this->plugin )
	*/
	const UpdatePluginCompleteActions = "update_plugin_complete_actions";
	/**
		 * Filters the text displayed in the 'At a Glance' dashboard widget.
		 *
		 * Prior to 3.8.0, the widget was named 'Right Now'.
		 *
		 * @since 4.4.0
		 *
		 * @param string $content Default text.
		 * @Reference wp-admin\includes\update.php apply_filters( 'update_right_now_text', $content )
	*/
	const UpdateRightNowText = "update_right_now_text";
	/**
			 * Filters the list of action links available following a single theme update.
			 *
			 * @since 2.8.0
			 *
			 * @param string[] $update_actions Array of theme action links.
			 * @param string   $theme          Theme directory name.
			 * @Reference wp-admin\includes\class-theme-upgrader-skin.php apply_filters( 'update_theme_complete_actions', $update_actions, $this->theme )
	*/
	const UpdateThemeCompleteActions = "update_theme_complete_actions";
	/**
			 * Filters the list of action links available following a translations update.
			 *
			 * @since 3.7.0
			 *
			 * @param string[] $update_actions Array of translations update links.
			 * @Reference wp-admin\includes\class-language-pack-upgrader-skin.php apply_filters( 'update_translations_complete_actions', $update_actions )
	*/
	const UpdateTranslationsCompleteActions = "update_translations_complete_actions";
	/**
		 * Filters the content of the welcome email after site activation.
		 *
		 * Content should be formatted for transmission via wp_mail().
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $welcome_email Message body of the email.
		 * @param int    $blog_id       Blog ID.
		 * @param int    $user_id       User ID.
		 * @param string $password      User password.
		 * @param string $title         Site title.
		 * @param array  $meta          Signup meta data. By default, contains the requested privacy setting and lang_id.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'update_welcome_email', $welcome_email, $blog_id, $user_id, $password, $title, $meta )
	*/
	const UpdateWelcomeEmail = "update_welcome_email";
	/**
		 * Filters the subject of the welcome email after site activation.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $subject Subject of the email.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'update_welcome_subject', sprintf( $subject, $current_network->site_name, wp_unslash( $title ) ) )
	*/
	const UpdateWelcomeSubject = "update_welcome_subject";
	/**
		 * Filters the content of the welcome email after user activation.
		 *
		 * Content should be formatted for transmission via wp_mail().
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $welcome_email The message body of the account activation success email.
		 * @param int    $user_id       User ID.
		 * @param string $password      User password.
		 * @param array  $meta          Signup meta data. Default empty array.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'update_welcome_user_email', $welcome_email, $user_id, $password, $meta )
	*/
	const UpdateWelcomeUserEmail = "update_welcome_user_email";
	/**
		 * Filters the subject of the welcome email after user activation.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $subject Subject of the email.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'update_welcome_user_subject', sprintf( $subject, $current_network->site_name, $user->user_login ) )
	*/
	const UpdateWelcomeUserSubject = "update_welcome_user_subject";
	/**
				 * Filters whether the upgrader cleared the destination.
				 *
				 * @since 2.8.0
				 *
				 * @param mixed  $removed            Whether the destination was cleared. true on success, WP_Error on failure
				 * @param string $local_destination  The local package destination.
				 * @param string $remote_destination The remote package destination.
				 * @param array  $hook_extra         Extra arguments passed to hooked filters.
				 * @Reference wp-admin\includes\class-wp-upgrader.php apply_filters( 'upgrader_clear_destination', $removed, $local_destination, $remote_destination, $args['hook_extra'] )
	*/
	const UpgraderClearDestination = "upgrader_clear_destination";
	/**
			 * Filters the package options before running an update.
			 *
			 * See also {@see 'upgrader_process_complete'}.
			 *
			 * @since 4.3.0
			 *
			 * @param array $options {
			 *     Options used by the upgrader.
			 *
			 *     @type string $package                     Package for update.
			 *     @type string $destination                 Update location.
			 *     @type bool   $clear_destination           Clear the destination resource.
			 *     @type bool   $clear_working               Clear the working resource.
			 *     @type bool   $abort_if_destination_exists Abort if the Destination directory exists.
			 *     @type bool   $is_multi                    Whether the upgrader is running multiple times.
			 *     @type array  $hook_extra {
			 *         Extra hook arguments.
			 *
			 *         @type string $action               Type of action. Default 'update'.
			 *         @type string $type                 Type of update process. Accepts 'plugin', 'theme', or 'core'.
			 *         @type bool   $bulk                 Whether the update process is a bulk update. Default true.
			 *         @type string $plugin               Path to the plugin file relative to the plugins directory.
			 *         @type string $theme                The stylesheet or template name of the theme.
			 *         @type string $language_update_type The language pack update type. Accepts 'plugin', 'theme',
			 *                                            or 'core'.
			 *         @type object $language_update      The language pack update offer.
			 *     }
			 * }
			 * @Reference wp-admin\includes\class-wp-upgrader.php apply_filters( 'upgrader_package_options', $options )
	*/
	const UpgraderPackageOptions = "upgrader_package_options";
	/**
			 * Filters the installation response after the installation has finished.
			 *
			 * @since 2.8.0
			 *
			 * @param bool  $response   Installation response.
			 * @param array $hook_extra Extra arguments passed to hooked filters.
			 * @param array $result     Installation result data.
			 * @Reference wp-admin\includes\class-wp-upgrader.php apply_filters( 'upgrader_post_install', true, $args['hook_extra'], $this->result )
	*/
	const UpgraderPostInstall = "upgrader_post_install";
	/**
			 * Filters whether to return the package.
			 *
			 * @since 3.7.0
			 *
			 * @param bool        $reply   Whether to bail without returning the package.
			 *                             Default false.
			 * @param string      $package The package file name.
			 * @param WP_Upgrader $this    The WP_Upgrader instance.
			 * @Reference wp-admin\includes\class-wp-upgrader.php apply_filters( 'upgrader_pre_download', false, $package, $this )
	*/
	const UpgraderPreDownload = "upgrader_pre_download";
	/**
			 * Filters the install response before the installation has started.
			 *
			 * Returning a truthy value, or one that could be evaluated as a WP_Error
			 * will effectively short-circuit the installation, returning that value
			 * instead.
			 *
			 * @since 2.8.0
			 *
			 * @param bool|WP_Error $response   Response.
			 * @param array         $hook_extra Extra arguments passed to hooked filters.
			 * @Reference wp-admin\includes\class-wp-upgrader.php apply_filters( 'upgrader_pre_install', true, $args['hook_extra'] )
	*/
	const UpgraderPreInstall = "upgrader_pre_install";
	/**
			 * Filters the source file location for the upgrade package.
			 *
			 * @since 2.8.0
			 * @since 4.4.0 The $hook_extra parameter became available.
			 *
			 * @param string      $source        File source location.
			 * @param string      $remote_source Remote file source location.
			 * @param WP_Upgrader $this          WP_Upgrader instance.
			 * @param array       $hook_extra    Extra arguments passed to hooked filters.
			 * @Reference wp-admin\includes\class-wp-upgrader.php apply_filters( 'upgrader_source_selection', $source, $remote_source, $this, $args['hook_extra'] )
	*/
	const UpgraderSourceSelection = "upgrader_source_selection";
	/**
		 * Filters the uploads directory data.
		 *
		 * @since 2.0.0
		 *
		 * @param array $uploads {
		 *     Array of information about the upload directory.
		 *
		 *     @type string       $path    Base directory and subdirectory or full path to upload directory.
		 *     @type string       $url     Base URL and subdirectory or absolute URL to upload directory.
		 *     @type string       $subdir  Subdirectory if uploads use year/month folders option is on.
		 *     @type string       $basedir Path without subdir.
		 *     @type string       $baseurl URL path without subdir.
		 *     @type string|false $error   False or error message.
		 * }
		 * @Reference wp-includes\functions.php apply_filters( 'upload_dir', $cache[ $key ] )
	*/
	const UploadDir = "upload_dir";
	/**
		 * Filters list of allowed mime types and file extensions.
		 *
		 * @since 2.0.0
		 *
		 * @param array            $t    Mime types keyed by the file extension regex corresponding to
		 *                               those types. 'swf' and 'exe' removed from full list. 'htm|html' also
		 *                               removed depending on '$user' capabilities.
		 * @param int|WP_User|null $user User ID, User object or null if not provided (indicates current user).
		 * @Reference wp-includes\functions.php apply_filters( 'upload_mimes', $t, $user )
	*/
	const UploadMimes = "upload_mimes";
	/**
		 * Filters the number of items to list per page when listing media items.
		 *
		 * @since 2.9.0
		 *
		 * @param int $media_per_page Number of media to list. Default 20.
		 * @Reference wp-admin\includes\post.php apply_filters( 'upload_per_page', $media_per_page )
	*/
	const UploadPerPage = "upload_per_page";
	/**
		 * Filters the media upload post parameters.
		 *
		 * @since 3.1.0 As 'swfupload_post_params'
		 * @since 3.3.0
		 *
		 * @param array $post_params An array of media upload parameters used by Plupload.
		 * @Reference wp-admin\includes\media.php apply_filters( 'upload_post_params', $post_params )
	*/
	const UploadPostParams = "upload_post_params";
	/**
		 * Filters the maximum upload size allowed in php.ini.
		 *
		 * @since 2.5.0
		 *
		 * @param int $size    Max upload size limit in bytes.
		 * @param int $u_bytes Maximum upload filesize in bytes.
		 * @param int $p_bytes Maximum size of POST data in bytes.
		 * @Reference wp-includes\media.php apply_filters( 'upload_size_limit', min( $u_bytes, $p_bytes ), $u_bytes, $p_bytes )
	*/
	const UploadSizeLimit = "upload_size_limit";
	/**
		 * Filters the URL to derive the post ID from.
		 *
		 * @since 2.2.0
		 *
		 * @param string $url The URL to derive the post ID from.
		 * @Reference wp-includes\rewrite.php apply_filters( 'url_to_postid', $url )
	*/
	const UrlToPostid = "url_to_postid";
	/**
		 * Filter whether a post is able to be edited in the block editor.
		 *
		 * @since 5.0.0
		 *
		 * @param bool    $use_block_editor Whether the post can be edited or not.
		 * @param WP_Post $post             The post being checked.
		 * @Reference wp-admin\includes\post.php apply_filters( 'use_block_editor_for_post', $use_block_editor, $post )
	*/
	const UseBlockEditorForPost = "use_block_editor_for_post";
	/**
		 * Filter whether a post is able to be edited in the block editor.
		 *
		 * @since 5.0.0
		 *
		 * @param bool   $use_block_editor  Whether the post type can be edited or not. Default true.
		 * @param string $post_type         The post type being checked.
		 * @Reference wp-admin\includes\post.php apply_filters( 'use_block_editor_for_post_type', true, $post_type )
	*/
	const UseBlockEditorForPostType = "use_block_editor_for_post_type";
	/**
			 * Filters whether cURL can be used as a transport for retrieving a URL.
			 *
			 * @since 2.7.0
			 *
			 * @param bool  $use_class Whether the class can be used. Default true.
			 * @param array $args      An array of request arguments.
			 * @Reference wp-includes\class-wp-http-curl.php apply_filters( 'use_curl_transport', true, $args )
	*/
	const UseCurlTransport = "use_curl_transport";
	/**
		 * Filters whether to print default gallery styles.
		 *
		 * @since 3.1.0
		 *
		 * @param bool $print Whether to print default gallery styles.
		 *                    Defaults to false if the theme supports HTML5 galleries.
		 *                    Otherwise, defaults to true.
		 * @Reference wp-includes\media.php apply_filters( 'use_default_gallery_style', ! $html5 )
	*/
	const UseDefaultGalleryStyle = "use_default_gallery_style";
	/**
				 * Filters whether Google Chrome Frame should be used, if available.
				 *
				 * @since 3.2.0
				 *
				 * @param bool $is_admin Whether to use the Google Chrome Frame. Default is the value of is_admin().
				 * @Reference wp-includes\vars.php apply_filters( 'use_google_chrome_frame', $is_admin )
	*/
	const UseGoogleChromeFrame = "use_google_chrome_frame";
	/**
			 * Filters whether streams can be used as a transport for retrieving a URL.
			 *
			 * @since 2.7.0
			 *
			 * @param bool  $use_class Whether the class can be used. Default true.
			 * @param array $args      Request arguments.
			 * @Reference wp-includes\class-wp-http-streams.php apply_filters( 'use_streams_transport', true, $args )
	*/
	const UseStreamsTransport = "use_streams_transport";
	/**
		 * Filters the user admin URL for the current user.
		 *
		 * @since 3.1.0
		 *
		 * @param string $url  The complete URL including scheme and path.
		 * @param string $path Path relative to the URL. Blank string if
		 *                     no path is specified.
		 * @Reference wp-includes\link-template.php apply_filters( 'user_admin_url', $url, $path )
	*/
	const UserAdminUrl = "user_admin_url";
	/**
		 * Filters whether the user can access the visual editor.
		 *
		 * @since 2.1.0
		 *
		 * @param bool $wp_rich_edit Whether the user can access the visual editor.
		 * @Reference wp-includes\general-template.php apply_filters( 'user_can_richedit', $wp_rich_edit )
	*/
	const UserCanRichedit = "user_can_richedit";
	/**
		 * Filters the body of the user request confirmation email.
		 *
		 * The email is sent to an administrator when an user request is confirmed.
		 * The following strings have a special meaning and will get replaced dynamically:
		 *
		 * ###SITENAME###    The name of the site.
		 * ###USER_EMAIL###  The user email for the request.
		 * ###DESCRIPTION### Description of the action being performed so the user knows what the email is for.
		 * ###MANAGE_URL###  The URL to manage requests.
		 * ###SITEURL###     The URL to the site.
		 *
		 * @since 4.9.6
		 *
		 * @param string $email_text Text in the email.
		 * @param array  $email_data {
		 *     Data relating to the account action email.
		 *
		 *     @type WP_User_Request $request     User request object.
		 *     @type string          $user_email  The email address confirming a request
		 *     @type string          $description Description of the action being performed so the user knows what the email is for.
		 *     @type string          $manage_url  The link to click manage privacy requests of this type.
		 *     @type string          $sitename    The site name sending the mail.
		 *     @type string          $siteurl     The site URL sending the mail.
		 *     @type string          $admin_email The administrator email receiving the mail.
		 * }
		 * @Reference wp-includes\user.php apply_filters( 'user_confirmed_action_email_content', $email_text, $email_data )
	* @Reference wp-includes\user.php apply_filters( 'user_confirmed_action_email_content', $email_text, $email_data )
	*/
	const UserConfirmedActionEmailContent = "user_confirmed_action_email_content";
	/**
		 * Filters the user contact methods.
		 *
		 * @since 2.9.0
		 *
		 * @param array   $methods Array of contact methods and their labels.
		 * @param WP_User $user    WP_User object.
		 * @Reference wp-includes\user.php apply_filters( 'user_contactmethods', $methods, $user )
	*/
	const UserContactmethods = "user_contactmethods";
	/**
		 * Filters the dashboard URL for a user.
		 *
		 * @since 3.1.0
		 *
		 * @param string $url     The complete URL including scheme and path.
		 * @param int    $user_id The user ID.
		 * @param string $path    Path relative to the URL. Blank string if no path is specified.
		 * @param string $scheme  Scheme to give the URL context. Accepts 'http', 'https', 'login',
		 *                        'login_post', 'admin', 'relative' or null.
		 * @Reference wp-includes\link-template.php apply_filters( 'user_dashboard_url', $url, $user_id, $path, $scheme )
	*/
	const UserDashboardUrl = "user_dashboard_url";
	/**
		 * Filters the subject of the email sent when an erasure request is completed.
		 *
		 * @since 4.9.8
		 *
		 * @param string $subject    The email subject.
		 * @param string $sitename   The name of the site.
		 * @param array  $email_data {
		 *     Data relating to the account action email.
		 *
		 *     @type WP_User_Request $request            User request object.
		 *     @type string          $message_recipient  The address that the email will be sent to. Defaults
		 *                                               to the value of `$request->email`, but can be changed
		 *                                               by the `user_erasure_fulfillment_email_to` filter.
		 *     @type string          $privacy_policy_url Privacy policy URL.
		 *     @type string          $sitename           The site name sending the mail.
		 *     @type string          $siteurl            The site URL sending the mail.
		 * }
		 * @Reference wp-includes\user.php apply_filters( 'user_erasure_complete_email_subject', $subject, $email_data['sitename'], $email_data )
	*/
	const UserErasureCompleteEmailSubject = "user_erasure_complete_email_subject";
	/**
		 * Filters the recipient of the data erasure fulfillment notification.
		 *
		 * @since 4.9.6
		 *
		 * @param string          $user_email The email address of the notification recipient.
		 * @param WP_User_Request $request    The request that is initiating the notification.
		 * @Reference wp-includes\user.php apply_filters( 'user_erasure_fulfillment_email_to', $request->email, $request )
	*/
	const UserErasureFulfillmentEmailTo = "user_erasure_fulfillment_email_to";
	/**
			 * Dynamically filter a user's capabilities.
			 *
			 * @since 2.0.0
			 * @since 3.7.0 Added the `$user` parameter.
			 *
			 * @param bool[]   $allcaps Array of key/value pairs where keys represent a capability name and boolean values
			 *                          represent whether the user has that capability.
			 * @param string[] $caps    Required primitive capabilities for the requested capability.
			 * @param array    $args {
			 *     Arguments that accompany the requested capability check.
			 *
			 *     @type string    $0 Requested capability.
			 *     @type int       $1 Concerned user ID.
			 *     @type mixed  ...$2 Optional second and further parameters, typically object ID.
			 * }
			 * @param WP_User  $user    The user object.
			 * @Reference wp-includes\class-wp-user.php apply_filters( 'user_has_cap', $this->allcaps, $caps, $args, $this )
	*/
	const UserHasCap = "user_has_cap";
	/**
				 * Filters the user profile picture description displayed under the Gravatar.
				 *
				 * @since 4.4.0
				 * @since 4.7.0 Added the `$profileuser` parameter.
				 *
				 * @param string  $description The description that will be printed.
				 * @param WP_User $profileuser The current WP_User object.
				 * @Reference wp-admin\user-edit.php apply_filters( 'user_profile_picture_description', $description, $profileuser )
	*/
	const UserProfilePictureDescription = "user_profile_picture_description";
	/**
		 * Filters the email address of a user being registered.
		 *
		 * @since 2.1.0
		 *
		 * @param string $user_email The email address of the new user.
		 * @Reference wp-includes\user.php apply_filters( 'user_registration_email', $user_email )
	*/
	const UserRegistrationEmail = "user_registration_email";
	/**
		 * Filters the message displayed to a user when they confirm a data request.
		 *
		 * @since 4.9.6
		 *
		 * @param string $message    The message to the user.
		 * @param int    $request_id The ID of the request being confirmed.
		 * @Reference wp-includes\user.php apply_filters( 'user_request_action_confirmed_message', $message, $request_id )
	*/
	const UserRequestActionConfirmedMessage = "user_request_action_confirmed_message";
	/**
		 * Filters the user action description.
		 *
		 * @since 4.9.6
		 *
		 * @param string $description The default description.
		 * @param string $action_name The name of the request.
		 * @Reference wp-includes\user.php apply_filters( 'user_request_action_description', $description, $action_name )
	*/
	const UserRequestActionDescription = "user_request_action_description";
	/**
		 * Filters the text of the email sent when an account action is attempted.
		 *
		 * The following strings have a special meaning and will get replaced dynamically:
		 *
		 * ###DESCRIPTION### Description of the action being performed so the user knows what the email is for.
		 * ###CONFIRM_URL### The link to click on to confirm the account action.
		 * ###SITENAME###    The name of the site.
		 * ###SITEURL###     The URL to the site.
		 *
		 * @since 4.9.6
		 *
		 * @param string $email_text Text in the email.
		 * @param array  $email_data {
		 *     Data relating to the account action email.
		 *
		 *     @type WP_User_Request $request     User request object.
		 *     @type string          $email       The email address this is being sent to.
		 *     @type string          $description Description of the action being performed so the user knows what the email is for.
		 *     @type string          $confirm_url The link to click on to confirm the account action.
		 *     @type string          $sitename    The site name sending the mail.
		 *     @type string          $siteurl     The site URL sending the mail.
		 * }
		 * @Reference wp-includes\user.php apply_filters( 'user_request_action_email_content', $email_text, $email_data )
	*/
	const UserRequestActionEmailContent = "user_request_action_email_content";
	/**
		 * Filters the subject of the email sent when an account action is attempted.
		 *
		 * @since 4.9.6
		 *
		 * @param string $subject    The email subject.
		 * @param string $sitename   The name of the site.
		 * @param array  $email_data {
		 *     Data relating to the account action email.
		 *
		 *     @type WP_User_Request $request     User request object.
		 *     @type string          $email       The email address this is being sent to.
		 *     @type string          $description Description of the action being performed so the user knows what the email is for.
		 *     @type string          $confirm_url The link to click on to confirm the account action.
		 *     @type string          $sitename    The site name sending the mail.
		 *     @type string          $siteurl     The site URL sending the mail.
		 * }
		 * @Reference wp-includes\user.php apply_filters( 'user_request_action_email_subject', $subject, $email_data['sitename'], $email_data )
	*/
	const UserRequestActionEmailSubject = "user_request_action_email_subject";
	/**
		 * Filters the subject of the user request confirmation email.
		 *
		 * @since 4.9.8
		 *
		 * @param string $subject    The email subject.
		 * @param string $sitename   The name of the site.
		 * @param array  $email_data {
		 *     Data relating to the account action email.
		 *
		 *     @type WP_User_Request $request     User request object.
		 *     @type string          $user_email  The email address confirming a request
		 *     @type string          $description Description of the action being performed so the user knows what the email is for.
		 *     @type string          $manage_url  The link to click manage privacy requests of this type.
		 *     @type string          $sitename    The site name sending the mail.
		 *     @type string          $siteurl     The site URL sending the mail.
		 *     @type string          $admin_email The administrator email receiving the mail.
		 * }
		 * @Reference wp-includes\user.php apply_filters( 'user_request_confirmed_email_subject', $subject, $email_data['sitename'], $email_data )
	*/
	const UserRequestConfirmedEmailSubject = "user_request_confirmed_email_subject";
	/**
		 * Filters the recipient of the data request confirmation notification.
		 *
		 * In a Multisite environment, this will default to the email address of the
		 * network admin because, by default, single site admins do not have the
		 * capabilities required to process requests. Some networks may wish to
		 * delegate those capabilities to a single-site admin, or a dedicated person
		 * responsible for managing privacy requests.
		 *
		 * @since 4.9.6
		 *
		 * @param string          $admin_email The email address of the notification recipient.
		 * @param WP_User_Request $request     The request that is initiating the notification.
		 * @Reference wp-includes\user.php apply_filters( 'user_request_confirmed_email_to', get_site_option( 'admin_email' ), $request )
	*/
	const UserRequestConfirmedEmailTo = "user_request_confirmed_email_to";
	/**
		 * Filters the expiration time of confirm keys.
		 *
		 * @since 4.9.6
		 *
		 * @param int $expiration The expiration time in seconds.
		 * @Reference wp-includes\user.php apply_filters( 'user_request_key_expiration', DAY_IN_SECONDS )
	* @Reference wp-admin\includes\privacy-tools.php apply_filters( 'user_request_key_expiration', DAY_IN_SECONDS )
	*/
	const UserRequestKeyExpiration = "user_request_key_expiration";
	/**
				 * Filters the action links displayed under each user in the Users list table.
				 *
				 * @since 2.8.0
				 *
				 * @param string[] $actions     An array of action links to be displayed.
				 *                              Default 'Edit', 'Delete' for single site, and
				 *                              'Edit', 'Remove' for Multisite.
				 * @param WP_User  $user_object WP_User object for the currently listed user.
				 * @Reference wp-admin\includes\class-wp-users-list-table.php apply_filters( 'user_row_actions', $actions, $user_object )
	*/
	const UserRowActions = "user_row_actions";
	/**
				 * Filters the columns to search in a WP_User_Query search.
				 *
				 * The default columns depend on the search term, and include 'ID', 'user_login',
				 * 'user_email', 'user_url', 'user_nicename', and 'display_name'.
				 *
				 * @since 3.6.0
				 *
				 * @param string[]      $search_columns Array of column names to be searched.
				 * @param string        $search         Text being searched.
				 * @param WP_User_Query $this           The current WP_User_Query instance.
				 * @Reference wp-includes\class-wp-user-query.php apply_filters( 'user_search_columns', $search_columns, $search, $this )
	*/
	const UserSearchColumns = "user_search_columns";
	/**
		 * Filters the trailing-slashed string, depending on whether the site is set to use trailing slashes.
		 *
		 * @since 2.2.0
		 *
		 * @param string $string      URL with or without a trailing slash.
		 * @param string $type_of_url The type of URL being considered. Accepts 'single', 'single_trackback',
		 *                            'single_feed', 'single_paged', 'commentpaged', 'paged', 'home', 'feed',
		 *                            'category', 'page', 'year', 'month', 'day', 'post_type_archive'.
		 * @Reference wp-includes\link-template.php apply_filters( 'user_trailingslashit', $string, $type_of_url )
	*/
	const UserTrailingslashit = "user_trailingslashit";
	/**
		 * Filters whether the given username exists or not.
		 *
		 * @since 4.9.0
		 *
		 * @param int|false $user_id  The user's ID on success, and false on failure.
		 * @param string    $username Username to check.
		 * @Reference wp-includes\user.php apply_filters( 'username_exists', $user_id, $username )
	*/
	const UsernameExists = "username_exists";
	/**
			 * Filters whether the users being deleted have additional content
			 * associated with them outside of the `post_author` and `link_owner` relationships.
			 *
			 * @since 5.2.0
			 *
			 * @param boolean $users_have_additional_content Whether the users have additional content. Default false.
			 * @param int[]   $userids                       Array of IDs for users being deleted.
			 * @Reference wp-admin\users.php apply_filters( 'users_have_additional_content', false, $userids )
	*/
	const UsersHaveAdditionalContent = "users_have_additional_content";
	/**
			 * Filters the query arguments used to retrieve users for the current users list table.
			 *
			 * @since 4.4.0
			 *
			 * @param array $args Arguments passed to WP_User_Query to retrieve items for the current
			 *                    users list table.
			 * @Reference wp-admin\includes\class-wp-users-list-table.php apply_filters( 'users_list_table_query_args', $args )
	* @Reference wp-admin\includes\class-wp-ms-users-list-table.php apply_filters( 'users_list_table_query_args', $args )
	*/
	const UsersListTableQueryArgs = "users_list_table_query_args";
	/**
			 * Filters the users array before the query takes place.
			 *
			 * Return a non-null value to bypass WordPress's default user queries.
			 * Filtering functions that require pagination information are encouraged to set
			 * the `total_users` property of the WP_User_Query object, passed to the filter
			 * by reference. If WP_User_Query does not perform a database query, it will not
			 * have enough information to generate these values itself.
			 *
			 * @since 5.1.0
			 *
			 * @param array|null $results Return an array of user data to short-circuit WP's user query
			 *                            or null to allow WP to run its normal queries.
			 * @param WP_User_Query $this The WP_User_Query instance (passed by reference).
			 * @Reference wp-includes\class-wp-user-query.php apply_filters( 'users_pre_query', array( null, &$this ) )
	*/
	const UsersPreQuery = "users_pre_query";
	/**
		 * Filters whether to validate the current theme.
		 *
		 * @since 2.7.0
		 *
		 * @param bool $validate Whether to validate the current theme. Default true.
		 * @Reference wp-includes\theme.php apply_filters( 'validate_current_theme', true )
	*/
	const ValidateCurrentTheme = "validate_current_theme";
	/**
		 * Filters whether the provided username is valid or not.
		 *
		 * @since 2.0.1
		 *
		 * @param bool   $valid    Whether given username is valid.
		 * @param string $username Username to check.
		 * @Reference wp-includes\user.php apply_filters( 'validate_username', $valid, $username )
	*/
	const ValidateUsername = "validate_username";
	/**
			 * Filters the post types that have different view mode options.
			 *
			 * @since 4.4.0
			 *
			 * @param string[] $view_mode_post_types Array of post types that can change view modes.
			 *                                       Default non-hierarchical post types with show_ui on.
			 * @Reference wp-admin\includes\class-wp-screen.php apply_filters( 'view_mode_post_types', $view_mode_post_types )
	*/
	const ViewModePostTypes = "view_mode_post_types";
	/**
			 * Filters a menu item's starting output.
			 *
			 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
			 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
			 * no filter for modifying the opening and closing `<li>` for a menu item.
			 *
			 * @since 3.0.0
			 *
			 * @param string   $item_output The menu item's starting HTML output.
			 * @param WP_Post  $item        Menu item data object.
			 * @param int      $depth       Depth of menu item. Used for padding.
			 * @param stdClass $args        An object of wp_nav_menu() arguments.
			 * @Reference wp-includes\class-walker-nav-menu.php apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args )
	*/
	const WalkerNavMenuStartEl = "walker_nav_menu_start_el";
	/**
	 * Filters the options white list.
	 *
	 * @since 2.7.0
	 *
	 * @param array $whitelist_options White list options.
	 * @Reference wp-admin\options.php apply_filters( 'whitelist_options', $whitelist_options )
	*/
	const WhitelistOptions = "whitelist_options";
	/** This filter is documented in wp-includes/widgets/class-wp-widget-archives.php * @Reference wp-includes\blocks\archives.php apply_filters(		'widget_archives_args',		array(			'type'            => 'monthly',			'show_post_count' => $show_post_count,		)	)
	* @Reference wp-includes\widgets\class-wp-widget-archives.php apply_filters(					'widget_archives_args',					array(						'type'            => 'monthly',						'show_post_count' => $c,					),					$instance				)
	*/
	const WidgetArchivesArgs = "widget_archives_args";
	/**
				 * Filters the arguments for the Archives widget drop-down.
				 *
				 * @since 2.8.0
				 * @since 4.9.0 Added the `$instance` parameter.
				 *
				 * @see wp_get_archives()
				 *
				 * @param array $args     An array of Archives widget drop-down arguments.
				 * @param array $instance Settings for the current Archives widget instance.
				 * @Reference wp-includes\widgets\class-wp-widget-archives.php apply_filters(				'widget_archives_dropdown_args',				array(					'type'            => 'monthly',					'format'          => 'option',					'show_post_count' => $c,				),				$instance			)
	* @Reference wp-includes\blocks\archives.php apply_filters(			'widget_archives_dropdown_args',			array(				'type'            => 'monthly',				'format'          => 'option',				'show_post_count' => $show_post_count,			)		)
	*/
	const WidgetArchivesDropdownArgs = "widget_archives_dropdown_args";
	/**
				 * Filters the arguments for the Categories widget.
				 *
				 * @since 2.8.0
				 * @since 4.9.0 Added the `$instance` parameter.
				 *
				 * @param array $cat_args An array of Categories widget options.
				 * @param array $instance Array of settings for the current widget.
				 * @Reference wp-includes\widgets\class-wp-widget-categories.php apply_filters( 'widget_categories_args', $cat_args, $instance )
	*/
	const WidgetCategoriesArgs = "widget_categories_args";
	/**
				 * Filters the arguments for the Categories widget drop-down.
				 *
				 * @since 2.8.0
				 * @since 4.9.0 Added the `$instance` parameter.
				 *
				 * @see wp_dropdown_categories()
				 *
				 * @param array $cat_args An array of Categories widget drop-down arguments.
				 * @param array $instance Array of settings for the current widget.
				 * @Reference wp-includes\widgets\class-wp-widget-categories.php apply_filters( 'widget_categories_dropdown_args', $cat_args, $instance )
	*/
	const WidgetCategoriesDropdownArgs = "widget_categories_dropdown_args";
	/**
	* @Reference wp-includes\widgets\class-wp-widget-recent-comments.php apply_filters(				'widget_comments_args',				array(					'number'      => $number,					'status'      => 'approve',					'post_status' => 'publish',				),				$instance			)
	* @Reference wp-includes\blocks\latest-comments.php apply_filters(			'widget_comments_args',			array(				'number'      => $attributes['commentsToShow'],				'status'      => 'approve',				'post_status' => 'publish',			)		)
	*/
	const WidgetCommentsArgs = "widget_comments_args";
	/**
			 * Filters the content of the Custom HTML widget.
			 *
			 * @since 4.8.1
			 *
			 * @param string                $content  The widget content.
			 * @param array                 $instance Array of settings for the current widget.
			 * @param WP_Widget_Custom_HTML $this     Current Custom HTML widget instance.
			 * @Reference wp-includes\widgets\class-wp-widget-custom-html.php apply_filters( 'widget_custom_html_content', $content, $instance, $this )
	*/
	const WidgetCustomHtmlContent = "widget_custom_html_content";
	/**
			 * Filters the common arguments supplied when constructing a Customizer setting.
			 *
			 * @since 3.9.0
			 *
			 * @see WP_Customize_Setting
			 *
			 * @param array  $args Array of Customizer setting arguments.
			 * @param string $id   Widget setting ID.
			 * @Reference wp-includes\class-wp-customize-widgets.php apply_filters( 'widget_customizer_setting_args', $args, $id )
	*/
	const WidgetCustomizerSettingArgs = "widget_customizer_setting_args";
	/**
				 * Filters the settings for a particular widget instance.
				 *
				 * Returning false will effectively short-circuit display of the widget.
				 *
				 * @since 2.8.0
				 *
				 * @param array     $instance The current widget instance's settings.
				 * @param WP_Widget $this     The current widget instance.
				 * @param array     $args     An array of default widget arguments.
				 * @Reference wp-includes\class-wp-widget.php apply_filters( 'widget_display_callback', $instance, $this, $args )
	* @Reference wp-includes\widgets.php apply_filters( 'widget_display_callback', $instance, $widget_obj, $args )
	*/
	const WidgetDisplayCallback = "widget_display_callback";
	/**
			 * Filters the widget instance's settings before displaying the control form.
			 *
			 * Returning false effectively short-circuits display of the control form.
			 *
			 * @since 2.8.0
			 *
			 * @param array     $instance The current widget instance's settings.
			 * @param WP_Widget $this     The current widget instance.
			 * @Reference wp-includes\class-wp-widget.php apply_filters( 'widget_form_callback', $instance, $this )
	*/
	const WidgetFormCallback = "widget_form_callback";
	/**
			 * Filters the arguments for the Links widget.
			 *
			 * @since 2.6.0
			 * @since 4.4.0 Added the `$instance` parameter.
			 *
			 * @see wp_list_bookmarks()
			 *
			 * @param array $widget_links_args An array of arguments to retrieve the links list.
			 * @param array $instance          The settings for the particular instance of the widget.
			 * @Reference wp-includes\widgets\class-wp-widget-links.php apply_filters( 'widget_links_args', $widget_links_args, $instance )
	*/
	const WidgetLinksArgs = "widget_links_args";
	/**
				 * Filters the "WordPress.org" list item HTML in the Meta widget.
				 *
				 * @since 3.6.0
				 * @since 4.9.0 Added the `$instance` parameter.
				 *
				 * @param string $html     Default HTML for the WordPress.org list item.
				 * @param array  $instance Array of settings for the current widget.
				 * @Reference wp-includes\widgets\class-wp-widget-meta.php apply_filters(				'widget_meta_poweredby',				sprintf(					'<li><a href="%1$s">%2$s</a></li>',					esc_url( __( 'https://wordpress.org/' ) ),					__( 'WordPress.org' )				),				$instance			)
	*/
	const WidgetMetaPoweredby = "widget_meta_poweredby";
	/**
			 * Filters the arguments for the Navigation Menu widget.
			 *
			 * @since 4.2.0
			 * @since 4.4.0 Added the `$instance` parameter.
			 *
			 * @param array    $nav_menu_args {
			 *     An array of arguments passed to wp_nav_menu() to retrieve a navigation menu.
			 *
			 *     @type callable|bool $fallback_cb Callback to fire if the menu doesn't exist. Default empty.
			 *     @type mixed         $menu        Menu ID, slug, or name.
			 * }
			 * @param WP_Term  $nav_menu      Nav menu object for the current menu.
			 * @param array    $args          Display arguments for the current widget.
			 * @param array    $instance      Array of settings for the current widget.
			 * @Reference wp-includes\widgets\class-wp-nav-menu-widget.php apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance )
	*/
	const WidgetNavMenuArgs = "widget_nav_menu_args";
	/**
	* @Reference wp-includes\widgets\class-wp-widget-pages.php apply_filters(				'widget_pages_args',				array(					'title_li'    => '',					'echo'        => 0,					'sort_column' => $sortby,					'exclude'     => $exclude,				),				$instance			)
	*/
	const WidgetPagesArgs = "widget_pages_args";
	/**
	* @Reference wp-includes\widgets\class-wp-widget-recent-posts.php apply_filters(				'widget_posts_args',				array(					'posts_per_page'      => $number,					'no_found_rows'       => true,					'post_status'         => 'publish',					'ignore_sticky_posts' => true,				),				$instance			)
	*/
	const WidgetPostsArgs = "widget_posts_args";
	/**
	* @Reference wp-includes\widgets\class-wp-widget-tag-cloud.php apply_filters(				'widget_tag_cloud_args',				array(					'taxonomy'   => $current_taxonomy,					'echo'       => false,					'show_count' => $show_count,				),				$instance			)
	*/
	const WidgetTagCloudArgs = "widget_tag_cloud_args";
	/**
			 * Filters the content of the Text widget.
			 *
			 * @since 2.3.0
			 * @since 4.4.0 Added the `$this` parameter.
			 * @since 4.8.1 The `$this` param may now be a `WP_Widget_Custom_HTML` object in addition to a `WP_Widget_Text` object.
			 *
			 * @param string                               $text     The widget content.
			 * @param array                                $instance Array of settings for the current widget.
			 * @param WP_Widget_Text|WP_Widget_Custom_HTML $this     Current Text widget instance.
			 * @Reference wp-includes\widgets\class-wp-widget-text.php apply_filters( 'widget_text', $text, $instance, $this )
	* @Reference wp-includes\widgets\class-wp-widget-custom-html.php apply_filters( 'widget_text', $instance['content'], $simulated_text_widget_instance, $this )
	*/
	const WidgetText = "widget_text";
	/**
				 * Filters the content of the Text widget to apply changes expected from the visual (TinyMCE) editor.
				 *
				 * By default a subset of the_content filters are applied, including wpautop and wptexturize.
				 *
				 * @since 4.8.0
				 *
				 * @param string         $text     The widget content.
				 * @param array          $instance Array of settings for the current widget.
				 * @param WP_Widget_Text $this     Current Text widget instance.
				 * @Reference wp-includes\widgets\class-wp-widget-text.php apply_filters( 'widget_text_content', $text, $instance, $this )
	*/
	const WidgetTextContent = "widget_text_content";
	/**
			 * Filters the widget title.
			 *
			 * @since 2.6.0
			 *
			 * @param string $title    The widget title. Default 'Pages'.
			 * @param array  $instance Array of settings for the current widget.
			 * @param mixed  $id_base  The widget ID.
			 * @Reference wp-includes\widgets\class-wp-widget-pages.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-custom-html.php apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-media.php apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-nav-menu-widget.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-archives.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-calendar.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-categories.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-meta.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-recent-comments.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-recent-posts.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-rss.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-search.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-tag-cloud.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	* @Reference wp-includes\widgets\class-wp-widget-text.php apply_filters( 'widget_title', $title, $instance, $this->id_base )
	*/
	const WidgetTitle = "widget_title";
	/**
					 * Filters a widget's settings before saving.
					 *
					 * Returning false will effectively short-circuit the widget's ability
					 * to update settings.
					 *
					 * @since 2.8.0
					 *
					 * @param array     $instance     The current widget instance's settings.
					 * @param array     $new_instance Array of new widget settings.
					 * @param array     $old_instance Array of old widget settings.
					 * @param WP_Widget $this         The current widget instance.
					 * @Reference wp-includes\class-wp-widget.php apply_filters( 'widget_update_callback', $instance, $new_instance, $old_instance, $this )
	*/
	const WidgetUpdateCallback = "widget_update_callback";
	/**
		 * Filters the admin bar class to instantiate.
		 *
		 * @since 3.1.0
		 *
		 * @param string $wp_admin_bar_class Admin bar class to use. Default 'WP_Admin_Bar'.
		 * @Reference wp-includes\admin-bar.php apply_filters( 'wp_admin_bar_class', 'WP_Admin_Bar' )
	*/
	const WpAdminBarClass = "wp_admin_bar_class";
	/**
		 * Filters the stylesheet link to the specified CSS file.
		 *
		 * If the site is set to display right-to-left, the RTL stylesheet link
		 * will be used instead.
		 *
		 * @since 2.3.0
		 * @param string $stylesheet_link HTML link element for the stylesheet.
		 * @param string $file            Style handle name or filename (without ".css" extension)
		 *                                relative to wp-admin/. Defaults to 'wp-admin'.
		 * @Reference wp-includes\general-template.php apply_filters( 'wp_admin_css', $stylesheet_link, $file )
	* @Reference wp-includes\general-template.php apply_filters( 'wp_admin_css', $rtl_stylesheet_link, "$file-rtl" )
	*/
	const WpAdminCss = "wp_admin_css";
	/**
		 * Filters the URI of a WordPress admin CSS file.
		 *
		 * @since 2.3.0
		 *
		 * @param string $_file Relative path to the file with query arguments attached.
		 * @param string $file  Relative path to the file, minus its ".css" extension.
		 * @Reference wp-includes\general-template.php apply_filters( 'wp_admin_css_uri', $_file, $file )
	*/
	const WpAdminCssUri = "wp_admin_css_uri";
	/**
				 * Filters the attachment ID for a cropped image.
				 *
				 * @since 4.3.0
				 *
				 * @param int    $attachment_id The attachment ID of the cropped image.
				 * @param string $context       The Customizer control requesting the cropped image.
				 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_ajax_cropped_attachment_id', $attachment_id, $context )
	*/
	const WpAjaxCroppedAttachmentId = "wp_ajax_cropped_attachment_id";
	/**
				 * Filters the cropped image attachment metadata.
				 *
				 * @since 4.3.0
				 *
				 * @see wp_generate_attachment_metadata()
				 *
				 * @param array $metadata Attachment metadata.
				 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_ajax_cropped_attachment_metadata', $metadata )
	*/
	const WpAjaxCroppedAttachmentMetadata = "wp_ajax_cropped_attachment_metadata";
	/**
			 * Filters whether to anonymize the comment.
			 *
			 * @since 4.9.6
			 *
			 * @param bool|string                    Whether to apply the comment anonymization (bool).
			 *                                       Custom prevention message (string). Default true.
			 * @param WP_Comment $comment            WP_Comment object.
			 * @param array      $anonymized_comment Anonymized comment data.
			 * @Reference wp-includes\comment.php apply_filters( 'wp_anonymize_comment', true, $comment, $anonymized_comment )
	*/
	const WpAnonymizeComment = "wp_anonymize_comment";
	/**
	* @Reference wp-includes\embed.php apply_filters( 'wp_audio_embed_handler', 'wp_embed_handler_audio' )
	*/
	const WpAudioEmbedHandler = "wp_audio_embed_handler";
	/**
		 * Filters the list of supported audio formats.
		 *
		 * @since 3.6.0
		 *
		 * @param array $extensions An array of supported audio formats. Defaults are
		 *                          'mp3', 'ogg', 'flac', 'm4a', 'wav'.
		 * @Reference wp-includes\media.php apply_filters( 'wp_audio_extensions', array( 'mp3', 'ogg', 'flac', 'm4a', 'wav' ) )
	*/
	const WpAudioExtensions = "wp_audio_extensions";
	/**
		 * Filters the audio shortcode output.
		 *
		 * @since 3.6.0
		 *
		 * @param string $html    Audio shortcode HTML output.
		 * @param array  $atts    Array of audio shortcode attributes.
		 * @param string $audio   Audio file.
		 * @param int    $post_id Post ID.
		 * @param string $library Media library used for the audio shortcode.
		 * @Reference wp-includes\media.php apply_filters( 'wp_audio_shortcode', $html, $atts, $audio, $post_id, $library )
	*/
	const WpAudioShortcode = "wp_audio_shortcode";
	/**
		 * Filters the class attribute for the audio shortcode output container.
		 *
		 * @since 3.6.0
		 * @since 4.9.0 The `$atts` parameter was added.
		 *
		 * @param string $class CSS class or list of space-separated classes.
		 * @param array  $atts  Array of audio shortcode attributes.
		 * @Reference wp-includes\media.php apply_filters( 'wp_audio_shortcode_class', $atts['class'], $atts )
	*/
	const WpAudioShortcodeClass = "wp_audio_shortcode_class";
	/**
		 * Filters the media library used for the audio shortcode.
		 *
		 * @since 3.6.0
		 *
		 * @param string $library Media library used for the audio shortcode.
		 * @Reference wp-includes\media.php apply_filters( 'wp_audio_shortcode_library', 'mediaelement' )
	* @Reference wp-includes\widgets\class-wp-widget-media-audio.php apply_filters( 'wp_audio_shortcode_library', 'mediaelement' )
	*/
	const WpAudioShortcodeLibrary = "wp_audio_shortcode_library";
	/**
		 * Filters the default audio shortcode output.
		 *
		 * If the filtered output isn't empty, it will be used instead of generating the default audio template.
		 *
		 * @since 3.6.0
		 *
		 * @param string $html     Empty variable to be replaced with shortcode markup.
		 * @param array  $attr     Attributes of the shortcode. @see wp_audio_shortcode()
		 * @param string $content  Shortcode content.
		 * @param int    $instance Unique numeric ID of this audio shortcode instance.
		 * @Reference wp-includes\media.php apply_filters( 'wp_audio_shortcode_override', '', $attr, $content, $instance )
	*/
	const WpAudioShortcodeOverride = "wp_audio_shortcode_override";
	/**
				 * Filters the authentication check interval.
				 *
				 * @since 3.6.0
				 *
				 * @param int $interval The interval in which to check a user's authentication.
				 *                      Default 3 minutes in seconds, or 180.
				 * @Reference wp-includes\script-loader.php apply_filters( 'wp_auth_check_interval', 3 * MINUTE_IN_SECONDS )
	*/
	const WpAuthCheckInterval = "wp_auth_check_interval";
	/**
		 * Filters whether to load the authentication check.
		 *
		 * Passing a falsey value to the filter will effectively short-circuit
		 * loading the authentication check.
		 *
		 * @since 3.6.0
		 *
		 * @param bool      $show   Whether to load the authentication check.
		 * @param WP_Screen $screen The current screen object.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_auth_check_load', $show, $screen )
	*/
	const WpAuthCheckLoad = "wp_auth_check_load";
	/**
		 * Filters whether the authentication check originated at the same domain.
		 *
		 * @since 3.6.0
		 *
		 * @param bool $same_domain Whether the authentication check originated at the same domain.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_auth_check_same_domain', $same_domain )
	*/
	const WpAuthCheckSameDomain = "wp_auth_check_same_domain";
	/**
		 * Filters whether the given user can be authenticated with the provided $password.
		 *
		 * @since 2.5.0
		 *
		 * @param WP_User|WP_Error $user     WP_User or WP_Error object if a previous
		 *                                   callback failed authentication.
		 * @param string           $password Password to check against the user.
		 * @Reference wp-includes\user.php apply_filters( 'wp_authenticate_user', $user, $password )
	* @Reference wp-includes\user.php apply_filters( 'wp_authenticate_user', $user, $password )
	*/
	const WpAuthenticateUser = "wp_authenticate_user";
	/**
		 * Filters whether to get the cache of the registered theme directories.
		 *
		 * @since 3.4.0
		 *
		 * @param bool   $cache_expiration Whether to get the cache of the theme directories. Default false.
		 * @param string $cache_directory  Directory to be searched for the cache.
		 * @Reference wp-includes\theme.php apply_filters( 'wp_cache_themes_persistently', false, 'search_theme_directories' )
	* @Reference wp-includes\class-wp-theme.php apply_filters( 'wp_cache_themes_persistently', false, 'WP_Theme' )
	*/
	const WpCacheThemesPersistently = "wp_cache_themes_persistently";
	/**
		 * Filters the output of 'wp_calculate_image_sizes()'.
		 *
		 * @since 4.4.0
		 *
		 * @param string       $sizes         A source size value for use in a 'sizes' attribute.
		 * @param array|string $size          Requested size. Image size or array of width and height values
		 *                                    in pixels (in that order).
		 * @param string|null  $image_src     The URL to the image file or null.
		 * @param array|null   $image_meta    The image meta data as returned by wp_get_attachment_metadata() or null.
		 * @param int          $attachment_id Image attachment ID of the original image or 0.
		 * @Reference wp-includes\media.php apply_filters( 'wp_calculate_image_sizes', $sizes, $size, $image_src, $image_meta, $attachment_id )
	*/
	const WpCalculateImageSizes = "wp_calculate_image_sizes";
	/**
		 * Filters an image's 'srcset' sources.
		 *
		 * @since 4.4.0
		 *
		 * @param array  $sources {
		 *     One or more arrays of source data to include in the 'srcset'.
		 *
		 *     @type array $width {
		 *         @type string $url        The URL of an image source.
		 *         @type string $descriptor The descriptor type used in the image candidate string,
		 *                                  either 'w' or 'x'.
		 *         @type int    $value      The source width if paired with a 'w' descriptor, or a
		 *                                  pixel density value if paired with an 'x' descriptor.
		 *     }
		 * }
		 * @param array  $size_array    Array of width and height values in pixels (in that order).
		 * @param string $image_src     The 'src' of the image.
		 * @param array  $image_meta    The image meta data as returned by 'wp_get_attachment_metadata()'.
		 * @param int    $attachment_id Image attachment ID or 0.
		 * @Reference wp-includes\media.php apply_filters( 'wp_calculate_image_srcset', $sources, $size_array, $image_src, $image_meta, $attachment_id )
	*/
	const WpCalculateImageSrcset = "wp_calculate_image_srcset";
	/**
		 * Let plugins pre-filter the image meta to be able to fix inconsistencies in the stored data.
		 *
		 * @since 4.5.0
		 *
		 * @param array  $image_meta    The image meta data as returned by 'wp_get_attachment_metadata()'.
		 * @param array  $size_array    Array of width and height values in pixels (in that order).
		 * @param string $image_src     The 'src' of the image.
		 * @param int    $attachment_id The image attachment ID or 0 if not supplied.
		 * @Reference wp-includes\media.php apply_filters( 'wp_calculate_image_srcset_meta', $image_meta, $size_array, $image_src, $attachment_id )
	*/
	const WpCalculateImageSrcsetMeta = "wp_calculate_image_srcset_meta";
	/**
		 * Filters the "real" file type of the given file.
		 *
		 * @since 3.0.0
		 * @since 5.1.0 The $real_mime parameter was added.
		 *
		 * @param array       $wp_check_filetype_and_ext File data array containing 'ext', 'type', and
		 *                                               'proper_filename' keys.
		 * @param string      $file                      Full path to the file.
		 * @param string      $filename                  The name of the file (may differ from $file due to
		 *                                               $file being in a tmp directory).
		 * @param array       $mimes                     Key is the file extension with value as the mime type.
		 * @param string|bool $real_mime                 The actual mime type or false if the type cannot be determined.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_check_filetype_and_ext', compact( 'ext', 'type', 'proper_filename' ), $file, $filename, $mimes, $real_mime )
	*/
	const WpCheckFiletypeAndExt = "wp_check_filetype_and_ext";
	/**
		 * Filters the post lock window duration.
		 *
		 * @since 3.3.0
		 *
		 * @param int $interval The interval in seconds the post lock duration
		 *                      should last, plus 5 seconds. Default 150.
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_check_post_lock_window', 150 )
	* @Reference wp-admin\includes\post.php apply_filters( 'wp_check_post_lock_window', 150 )
	*/
	const WpCheckPostLockWindow = "wp_check_post_lock_window";
	/**
		 * Filters whether the given date is valid for the Gregorian calendar.
		 *
		 * @since 3.5.0
		 *
		 * @param bool   $checkdate   Whether the given date is valid.
		 * @param string $source_date Date to check.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_checkdate', checkdate( $month, $day, $year ), $source_date )
	*/
	const WpCheckdate = "wp_checkdate";
	/**
		 * Filters settings that are passed into the code editor.
		 *
		 * Returning a falsey value will disable the syntax-highlighting code editor.
		 *
		 * @since 4.9.0
		 *
		 * @param array $settings The array of settings passed to the code editor. A falsey value disables the editor.
		 * @param array $args {
		 *     Args passed when calling `get_code_editor_settings()`.
		 *
		 *     @type string   $type       The MIME type of the file to be edited.
		 *     @type string   $file       Filename being edited.
		 *     @type WP_Theme $theme      Theme being edited when on theme editor.
		 *     @type string   $plugin     Plugin being edited when on plugin editor.
		 *     @type array    $codemirror Additional CodeMirror setting overrides.
		 *     @type array    $csslint    CSSLint rule overrides.
		 *     @type array    $jshint     JSHint rule overrides.
		 *     @type array    $htmlhint   JSHint rule overrides.
		 * }
		 * @Reference wp-includes\general-template.php apply_filters( 'wp_code_editor_settings', $settings, $args )
	*/
	const WpCodeEditorSettings = "wp_code_editor_settings";
	/**
		 * Filters the in-line comment reply-to form output in the Comments
		 * list table.
		 *
		 * Returning a non-empty value here will short-circuit display
		 * of the in-line comment-reply form in the Comments list table,
		 * echoing the returned value instead.
		 *
		 * @since 2.7.0
		 *
		 * @see wp_comment_reply()
		 *
		 * @param string $content The reply-to form content.
		 * @param array  $args    An array of default args.
		 * @Reference wp-admin\includes\template.php apply_filters(		'wp_comment_reply',		'',		array(			'position' => $position,			'checkbox' => $checkbox,			'mode'     => $mode,		)	)
	*/
	const WpCommentReply = "wp_comment_reply";
	/**
		 * Filters dimensions to constrain down-sampled images to.
		 *
		 * @since 4.1.0
		 *
		 * @param array $dimensions     The image width and height.
		 * @param int   $current_width  The current width of the image.
		 * @param int   $current_height The current height of the image.
		 * @param int   $max_width      The maximum width permitted.
		 * @param int   $max_height     The maximum height permitted.
		 * @Reference wp-includes\media.php apply_filters( 'wp_constrain_dimensions', array( $w, $h ), $current_width, $current_height, $max_width, $max_height )
	*/
	const WpConstrainDimensions = "wp_constrain_dimensions";
	/**
		 * Modify returned attachment counts by mime type.
		 *
		 * @since 3.7.0
		 *
		 * @param object $counts    An object containing the attachment counts by
		 *                          mime type.
		 * @param string $mime_type The mime type pattern used to filter the attachments
		 *                          counted.
		 * @Reference wp-includes\post.php apply_filters( 'wp_count_attachments', (object) $counts, $mime_type )
	*/
	const WpCountAttachments = "wp_count_attachments";
	/**
		 * Filters the comments count for a given post or the whole site.
		 *
		 * @since 2.7.0
		 *
		 * @param array|stdClass $count   An empty array or an object containing comment counts.
		 * @param int            $post_id The post ID. Can be 0 to represent the whole site.
		 * @Reference wp-includes\comment.php apply_filters( 'wp_count_comments', array(), $post_id )
	*/
	const WpCountComments = "wp_count_comments";
	/**
		 * Modify returned post counts by status for the current post type.
		 *
		 * @since 3.7.0
		 *
		 * @param object $counts An object containing the current post_type's post
		 *                       counts by status.
		 * @param string $type   Post type.
		 * @param string $perm   The permission to determine if the posts are 'readable'
		 *                       by the current user.
		 * @Reference wp-includes\post.php apply_filters( 'wp_count_posts', $counts, $type, $perm )
	* @Reference wp-includes\post.php apply_filters( 'wp_count_posts', $counts, $type, $perm )
	*/
	const WpCountPosts = "wp_count_posts";
	/** This filter is documented in wp-admin/includes/class-custom-image-header.php * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_create_file_in_uploads', $cropped, $attachment_id )
	* @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_create_file_in_uploads', $cropped, $attachment_id )
	* @Reference wp-admin\includes\class-custom-image-header.php apply_filters( 'wp_create_file_in_uploads', $cropped, $attachment_id )
	* @Reference wp-admin\includes\class-custom-image-header.php apply_filters( 'wp_create_file_in_uploads', $cropped, $attachment_id )
	* @Reference wp-admin\includes\class-custom-image-header.php apply_filters( 'wp_create_file_in_uploads', $image, $attachment_id )
	*/
	const WpCreateFileInUploads = "wp_create_file_in_uploads";
	/**
	* @Reference wp-admin\includes\deprecated.php apply_filters( 'wp_create_thumbnail', image_resize( $file, $max_side, $max_side ) )
	*/
	const WpCreateThumbnail = "wp_create_thumbnail";
	/**
			 * Filters the list of widgets to load for the admin dashboard.
			 *
			 * @since 2.5.0
			 *
			 * @param string[] $dashboard_widgets An array of dashboard widget IDs.
			 * @Reference wp-admin\includes\dashboard.php apply_filters( 'wp_dashboard_widgets', array() )
	*/
	const WpDashboardWidgets = "wp_dashboard_widgets";
	/**
		 * Filters the date formatted based on the locale.
		 *
		 * @since 5.3.0
		 *
		 * @param string       $date      Formatted date string.
		 * @param string       $format    Format to display the date.
		 * @param int          $timestamp Unix timestamp.
		 * @param DateTimeZone $timezone  Timezone.
		 *
		 * @Reference wp-includes\functions.php apply_filters( 'wp_date', $date, $format, $timestamp, $timezone )
	*/
	const WpDate = "wp_date";
	/**
		 * Filters which editor should be displayed by default.
		 *
		 * @since 2.5.0
		 *
		 * @param string $r Which editor should be displayed by default. Either 'tinymce', 'html', or 'test'.
		 * @Reference wp-includes\general-template.php apply_filters( 'wp_default_editor', $r )
	*/
	const WpDefaultEditor = "wp_default_editor";
	/**
		 * Filters the path of the file to delete.
		 *
		 * @since 2.1.0
		 *
		 * @param string $file Path to the file to delete.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_delete_file', $file )
	*/
	const WpDeleteFile = "wp_delete_file";
	/**
			 * Filters the callback for killing WordPress execution for Ajax requests.
			 *
			 * @since 3.4.0
			 *
			 * @param callable $function Callback function name.
			 * @Reference wp-includes\functions.php apply_filters( 'wp_die_ajax_handler', '_ajax_wp_die_handler' )
	*/
	const WpDieAjaxHandler = "wp_die_ajax_handler";
	/**
			 * Filters the callback for killing WordPress execution for all non-Ajax, non-JSON, non-XML requests.
			 *
			 * @since 3.0.0
			 *
			 * @param callable $function Callback function name.
			 * @Reference wp-includes\functions.php apply_filters( 'wp_die_handler', '_default_wp_die_handler' )
	*/
	const WpDieHandler = "wp_die_handler";
	/**
			 * Filters the callback for killing WordPress execution for JSON requests.
			 *
			 * @since 5.1.0
			 *
			 * @param callable $function Callback function name.
			 * @Reference wp-includes\functions.php apply_filters( 'wp_die_json_handler', '_json_wp_die_handler' )
	*/
	const WpDieJsonHandler = "wp_die_json_handler";
	/**
			 * Filters the callback for killing WordPress execution for JSONP requests.
			 *
			 * @since 5.2.0
			 *
			 * @param callable $function Callback function name.
			 * @Reference wp-includes\functions.php apply_filters( 'wp_die_jsonp_handler', '_jsonp_wp_die_handler' )
	*/
	const WpDieJsonpHandler = "wp_die_jsonp_handler";
	/**
			 * Filters the callback for killing WordPress execution for XML requests.
			 *
			 * @since 5.2.0
			 *
			 * @param callable $function Callback function name.
			 * @Reference wp-includes\functions.php apply_filters( 'wp_die_xml_handler', '_xml_wp_die_handler' )
	*/
	const WpDieXmlHandler = "wp_die_xml_handler";
	/**
			 * Filters the callback for killing WordPress execution for XML-RPC requests.
			 *
			 * @since 3.4.0
			 *
			 * @param callable $function Callback function name.
			 * @Reference wp-includes\functions.php apply_filters( 'wp_die_xmlrpc_handler', '_xmlrpc_wp_die_handler' )
	*/
	const WpDieXmlrpcHandler = "wp_die_xmlrpc_handler";
	/**
		 * Filters the URL for directly updating the PHP version the site is running on from the host.
		 *
		 * @since 5.1.1
		 *
		 * @param string $direct_update_url URL for directly updating PHP.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_direct_php_update_url', $direct_update_url )
	*/
	const WpDirectPhpUpdateUrl = "wp_direct_php_update_url";
	/**
		 * Filters whether the current request is a WordPress Ajax request.
		 *
		 * @since 4.7.0
		 *
		 * @param bool $wp_doing_ajax Whether the current request is a WordPress Ajax request.
		 * @Reference wp-includes\load.php apply_filters( 'wp_doing_ajax', defined( 'DOING_AJAX' ) && DOING_AJAX )
	*/
	const WpDoingAjax = "wp_doing_ajax";
	/**
		 * Filters whether the current request is a WordPress cron request.
		 *
		 * @since 4.8.0
		 *
		 * @param bool $wp_doing_cron Whether the current request is a WordPress cron request.
		 * @Reference wp-includes\load.php apply_filters( 'wp_doing_cron', defined( 'DOING_CRON' ) && DOING_CRON )
	*/
	const WpDoingCron = "wp_doing_cron";
	/**
		 * Filters the taxonomy drop-down output.
		 *
		 * @since 2.1.0
		 *
		 * @param string $output HTML output.
		 * @param array  $parsed_args      Arguments used to build the drop-down.
		 * @Reference wp-includes\category-template.php apply_filters( 'wp_dropdown_cats', $output, $parsed_args )
	*/
	const WpDropdownCats = "wp_dropdown_cats";
	/**
		 * Filters the HTML output of a list of pages as a drop down.
		 *
		 * @since 2.1.0
		 * @since 4.4.0 `$parsed_args` and `$pages` added as arguments.
		 *
		 * @param string $output      HTML output for drop down list of pages.
		 * @param array  $parsed_args The parsed arguments array.
		 * @param array  $pages       List of WP_Post objects returned by `get_pages()`
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_dropdown_pages', $output, $parsed_args, $pages )
	*/
	const WpDropdownPages = "wp_dropdown_pages";
	/**
		 * Filters the wp_dropdown_users() HTML output.
		 *
		 * @since 2.3.0
		 *
		 * @param string $output HTML output generated by wp_dropdown_users().
		 * @Reference wp-includes\user.php apply_filters( 'wp_dropdown_users', $output )
	*/
	const WpDropdownUsers = "wp_dropdown_users";
	/**
		 * Filters the query arguments for the list of users in the dropdown.
		 *
		 * @since 4.4.0
		 *
		 * @param array $query_args The query arguments for get_users().
		 * @param array $parsed_args          The arguments passed to wp_dropdown_users() combined with the defaults.
		 * @Reference wp-includes\user.php apply_filters( 'wp_dropdown_users_args', $query_args, $parsed_args )
	*/
	const WpDropdownUsersArgs = "wp_dropdown_users_args";
	/**
			 * Filters the Walker class used when adding nav menu items.
			 *
			 * @since 3.0.0
			 *
			 * @param string $class   The walker class to use. Default 'Walker_Nav_Menu_Edit'.
			 * @param int    $menu_id ID of the menu being rendered.
			 * @Reference wp-admin\includes\nav-menu.php apply_filters( 'wp_edit_nav_menu_walker', 'Walker_Nav_Menu_Edit', $menu_id )
	* @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_edit_nav_menu_walker', 'Walker_Nav_Menu_Edit', $_POST['menu'] )
	*/
	const WpEditNavMenuWalker = "wp_edit_nav_menu_walker";
	/**
	* @Reference wp-admin\edit-form-advanced.php apply_filters( 'wp_editor_expand', true, $post_type )
	*/
	const WpEditorExpand = "wp_editor_expand";
	/**
				 * Filters the default image compression quality setting.
				 *
				 * Applies only during initial editor instantiation, or when set_quality() is run
				 * manually without the `$quality` argument.
				 *
				 * set_quality() has priority over the filter.
				 *
				 * @since 3.5.0
				 *
				 * @param int    $quality   Quality level between 1 (low) and 100 (high).
				 * @param string $mime_type Image mime type.
				 * @Reference wp-includes\class-wp-image-editor.php apply_filters( 'wp_editor_set_quality', $this->default_quality, $this->mime_type )
	*/
	const WpEditorSetQuality = "wp_editor_set_quality";
	/**
			 * Filters the wp_editor() settings.
			 *
			 * @since 4.0.0
			 *
			 * @see _WP_Editors::parse_settings()
			 *
			 * @param array  $settings  Array of editor arguments.
			 * @param string $editor_id ID for the current editor instance.
			 * @Reference wp-includes\class-wp-editor.php apply_filters( 'wp_editor_settings', $settings, $editor_id )
	* @Reference wp-includes\script-loader.php apply_filters( 'wp_editor_settings', array( 'tinymce' => true ), 'classic-block' )
	*/
	const WpEditorSettings = "wp_editor_settings";
	/**
		 * Filters the audio embed output.
		 *
		 * @since 3.6.0
		 *
		 * @param string $audio   Audio embed output.
		 * @param array  $attr    An array of embed attributes.
		 * @param string $url     The original URL that was matched by the regex.
		 * @param array  $rawattr The original unmodified attributes.
		 * @Reference wp-includes\embed.php apply_filters( 'wp_embed_handler_audio', $audio, $attr, $url, $rawattr )
	*/
	const WpEmbedHandlerAudio = "wp_embed_handler_audio";
	/**
		 * Filters the video embed output.
		 *
		 * @since 3.6.0
		 *
		 * @param string $video   Video embed output.
		 * @param array  $attr    An array of embed attributes.
		 * @param string $url     The original URL that was matched by the regex.
		 * @param array  $rawattr The original unmodified attributes.
		 * @Reference wp-includes\embed.php apply_filters( 'wp_embed_handler_video', $video, $attr, $url, $rawattr )
	*/
	const WpEmbedHandlerVideo = "wp_embed_handler_video";
	/**
		 * Filters the YoutTube embed output.
		 *
		 * @since 4.0.0
		 *
		 * @see wp_embed_handler_youtube()
		 *
		 * @param string $embed   YouTube embed output.
		 * @param array  $attr    An array of embed attributes.
		 * @param string $url     The original URL that was matched by the regex.
		 * @param array  $rawattr The original unmodified attributes.
		 * @Reference wp-includes\embed.php apply_filters( 'wp_embed_handler_youtube', $embed, $attr, $url, $rawattr )
	*/
	const WpEmbedHandlerYoutube = "wp_embed_handler_youtube";
	/**
		 * Filters whether the fatal error handler is enabled.
		 *
		 * @since 5.2.0
		 *
		 * @param bool $enabled True if the fatal error handler is enabled, false otherwise.
		 * @Reference wp-includes\error-protection.php apply_filters( 'wp_fatal_error_handler_enabled', $enabled )
	*/
	const WpFatalErrorHandlerEnabled = "wp_fatal_error_handler_enabled";
	/**
			 * Filters the transient lifetime of the feed cache.
			 *
			 * @since 2.8.0
			 *
			 * @param int    $lifetime Cache duration in seconds. Default is 43200 seconds (12 hours).
			 * @param string $filename Unique identifier for the cache object.
			 * @Reference wp-includes\class-wp-feed-cache-transient.php apply_filters( 'wp_feed_cache_transient_lifetime', $lifetime, $filename )
	* @Reference wp-includes\feed.php apply_filters( 'wp_feed_cache_transient_lifetime', 12 * HOUR_IN_SECONDS, $url )
	*/
	const WpFeedCacheTransientLifetime = "wp_feed_cache_transient_lifetime";
	/**
		 * Filters the generated attachment meta data.
		 *
		 * @since 2.1.0
		 * @since 5.3.0 The `$context` parameter was added.
		 *
		 * @param array  $metadata      An array of attachment meta data.
		 * @param int    $attachment_id Current attachment ID.
		 * @param string $context       Additional context. Can be 'create' when metadata was initially created for new attachment
		 *                              or 'update' when the metadata was updated.
		 * @Reference wp-admin\includes\image.php apply_filters( 'wp_generate_attachment_metadata', $metadata, $attachment_id, 'create' )
	* @Reference wp-admin\includes\image.php apply_filters( 'wp_generate_attachment_metadata', $image_meta, $attachment_id, 'update' )
	*/
	const WpGenerateAttachmentMetadata = "wp_generate_attachment_metadata";
	/**
			 * Filters the generated output of a tag cloud.
			 *
			 * The filter is only evaluated if a true value is passed
			 * to the $filter argument in wp_generate_tag_cloud().
			 *
			 * @since 2.3.0
			 *
			 * @see wp_generate_tag_cloud()
			 *
			 * @param array|string $return String containing the generated HTML tag cloud output
			 *                             or an array of tag links if the 'format' argument
			 *                             equals 'array'.
			 * @param WP_Term[]    $tags   An array of terms used in the tag cloud.
			 * @param array        $args   An array of wp_generate_tag_cloud() arguments.
			 * @Reference wp-includes\category-template.php apply_filters( 'wp_generate_tag_cloud', $return, $tags, $args )
	*/
	const WpGenerateTagCloud = "wp_generate_tag_cloud";
	/**
		 * Filters the data used to generate the tag cloud.
		 *
		 * @since 4.3.0
		 *
		 * @param array $tags_data An array of term data for term used to generate the tag cloud.
		 * @Reference wp-includes\category-template.php apply_filters( 'wp_generate_tag_cloud_data', $tags_data )
	*/
	const WpGenerateTagCloudData = "wp_generate_tag_cloud_data";
	/**
		 * Filters the output of the XHTML generator tag.
		 *
		 * @since 2.5.0
		 *
		 * @param string $generator_type The XHTML generator.
		 * @Reference wp-includes\general-template.php apply_filters( 'wp_generator_type', 'xhtml' )
	*/
	const WpGeneratorType = "wp_generator_type";
	/**
		 * Filters the attachment caption.
		 *
		 * @since 4.6.0
		 *
		 * @param string $caption Caption for the given attachment.
		 * @param int    $post_id Attachment ID.
		 * @Reference wp-includes\post.php apply_filters( 'wp_get_attachment_caption', $caption, $post->ID )
	*/
	const WpGetAttachmentCaption = "wp_get_attachment_caption";
	/**
		 * Filters the editable list of keys to look up data from an attachment's metadata.
		 *
		 * @since 3.9.0
		 *
		 * @param array   $fields     Key/value pairs of field keys to labels.
		 * @param WP_Post $attachment Attachment object.
		 * @param string  $context    The context. Accepts 'edit', 'display'. Default 'display'.
		 * @Reference wp-includes\media.php apply_filters( 'wp_get_attachment_id3_keys', $fields, $attachment, $context )
	*/
	const WpGetAttachmentId3Keys = "wp_get_attachment_id3_keys";
	/**
			 * Filters the list of attachment image attributes.
			 *
			 * @since 2.8.0
			 *
			 * @param array        $attr       Attributes for the image markup.
			 * @param WP_Post      $attachment Image attachment post.
			 * @param string|array $size       Requested size. Image size or array of width and height values
			 *                                 (in that order). Default 'thumbnail'.
			 * @Reference wp-includes\media.php apply_filters( 'wp_get_attachment_image_attributes', $attr, $attachment, $size )
	*/
	const WpGetAttachmentImageAttributes = "wp_get_attachment_image_attributes";
	/**
		 * Filters the image src result.
		 *
		 * @since 4.3.0
		 *
		 * @param array|false  $image         Either array with src, width & height, icon src, or false.
		 * @param int          $attachment_id Image attachment ID.
		 * @param string|array $size          Size of image. Image size or array of width and height values
		 *                                    (in that order). Default 'thumbnail'.
		 * @param bool         $icon          Whether the image should be treated as an icon. Default false.
		 * @Reference wp-includes\media.php apply_filters( 'wp_get_attachment_image_src', $image, $attachment_id, $size, $icon )
	*/
	const WpGetAttachmentImageSrc = "wp_get_attachment_image_src";
	/**
		 * Filters a retrieved attachment page link.
		 *
		 * @since 2.7.0
		 * @since 5.1.0 Added the $attr parameter.
		 *
		 * @param string       $link_html The page link HTML output.
		 * @param int          $id        Post ID.
		 * @param string|array $size      Size of the image. Image size or array of width and height values (in that order).
		 *                                Default 'thumbnail'.
		 * @param bool         $permalink Whether to add permalink to image. Default false.
		 * @param bool         $icon      Whether to include an icon. Default false.
		 * @param string|bool  $text      If string, will be link text. Default false.
		 * @param array|string $attr      Array or string of attributes. Default empty.
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_get_attachment_link', "<a href='" . esc_url( $url ) . "'>$link_text</a>", $id, $size, $permalink, $icon, $text, $attr )
	*/
	const WpGetAttachmentLink = "wp_get_attachment_link";
	/**
		 * Filters the attachment meta data.
		 *
		 * @since 2.1.0
		 *
		 * @param array|bool $data          Array of meta data for the given attachment, or false
		 *                                  if the object does not exist.
		 * @param int        $attachment_id Attachment post ID.
		 * @Reference wp-includes\post.php apply_filters( 'wp_get_attachment_metadata', $data, $post->ID )
	*/
	const WpGetAttachmentMetadata = "wp_get_attachment_metadata";
	/**
				 * Filters the attachment thumbnail file path.
				 *
				 * @since 2.1.0
				 *
				 * @param string $thumbfile File path to the attachment thumbnail.
				 * @param int    $post_id   Attachment ID.
				 * @Reference wp-includes\post.php apply_filters( 'wp_get_attachment_thumb_file', $thumbfile, $post->ID )
	*/
	const WpGetAttachmentThumbFile = "wp_get_attachment_thumb_file";
	/**
		 * Filters the attachment thumbnail URL.
		 *
		 * @since 2.1.0
		 *
		 * @param string $url     URL for the attachment thumbnail.
		 * @param int    $post_id Attachment ID.
		 * @Reference wp-includes\post.php apply_filters( 'wp_get_attachment_thumb_url', $url, $post->ID )
	*/
	const WpGetAttachmentThumbUrl = "wp_get_attachment_thumb_url";
	/**
		 * Filters the attachment URL.
		 *
		 * @since 2.1.0
		 *
		 * @param string $url           URL for the given attachment.
		 * @param int    $attachment_id Attachment post ID.
		 * @Reference wp-includes\post.php apply_filters( 'wp_get_attachment_url', $url, $post->ID )
	*/
	const WpGetAttachmentUrl = "wp_get_attachment_url";
	/**
		 * Filters the lengths for the comment form fields.
		 *
		 * @since 4.5.0
		 *
		 * @param array $lengths Associative array `'field_name' => 'maximum length'`.
		 * @Reference wp-includes\comment.php apply_filters( 'wp_get_comment_fields_max_lengths', $lengths )
	*/
	const WpGetCommentFieldsMaxLengths = "wp_get_comment_fields_max_lengths";
	/**
		 * Filters the current commenter's name, email, and URL.
		 *
		 * @since 3.1.0
		 *
		 * @param array $comment_author_data {
		 *     An array of current commenter variables.
		 *
		 *     @type string $comment_author       The name of the author of the comment. Default empty.
		 *     @type string $comment_author_email The email address of the `$comment_author`. Default empty.
		 *     @type string $comment_author_url   The URL address of the `$comment_author`. Default empty.
		 * }
		 * @Reference wp-includes\comment.php apply_filters( 'wp_get_current_commenter', compact( 'comment_author', 'comment_author_email', 'comment_author_url' ) )
	*/
	const WpGetCurrentCommenter = "wp_get_current_commenter";
	/**
		 * Filters the Custom CSS Output into the <head>.
		 *
		 * @since 4.7.0
		 *
		 * @param string $css        CSS pulled in from the Custom CSS CPT.
		 * @param string $stylesheet The theme stylesheet name.
		 * @Reference wp-includes\theme.php apply_filters( 'wp_get_custom_css', $css, $stylesheet )
	*/
	const WpGetCustomCss = "wp_get_custom_css";
	/**
			 * Filters the default content suggested for inclusion in a privacy policy.
			 *
			 * @since 4.9.6
			 * @since 5.0.0 Added the `$strings`, `$description`, and `$blocks` parameters.
			 *
			 * @param string $content     The default policy content.
			 * @param array  $strings     An array of privacy policy content strings.
			 * @param bool   $description Whether policy descriptions should be included.
			 * @param bool   $blocks      Whether the content should be formatted for the block editor.
			 * @Reference wp-admin\includes\class-wp-privacy-policy-content.php apply_filters( 'wp_get_default_privacy_policy_content', $content, $strings, $description, $blocks )
	*/
	const WpGetDefaultPrivacyPolicyContent = "wp_get_default_privacy_policy_content";
	/**
		 * Filters the array of missing image sub-sizes for an uploaded image.
		 *
		 * @since 5.3.0
		 *
		 * @param array $missing_sizes Array with the missing image sub-sizes.
		 * @param array $image_meta    The image meta data.
		 * @param int   $attachment_id The image attachment post ID.
		 * @Reference wp-admin\includes\image.php apply_filters( 'wp_get_missing_image_subsizes', $missing_sizes, $image_meta, $attachment_id )
	*/
	const WpGetMissingImageSubsizes = "wp_get_missing_image_subsizes";
	/**
		 * Filters the navigation menu items being returned.
		 *
		 * @since 3.0.0
		 *
		 * @param array  $items An array of menu item post objects.
		 * @param object $menu  The menu object.
		 * @param array  $args  An array of arguments used to retrieve menu item objects.
		 * @Reference wp-includes\nav-menu.php apply_filters( 'wp_get_nav_menu_items', $items, $menu, $args )
	*/
	const WpGetNavMenuItems = "wp_get_nav_menu_items";
	/**
		 * Filters the navigation menu name being returned.
		 *
		 * @since 4.9.0
		 *
		 * @param string $menu_name Menu name.
		 * @param string $location  Menu location identifier.
		 * @Reference wp-includes\nav-menu.php apply_filters( 'wp_get_nav_menu_name', $menu_name, $location )
	*/
	const WpGetNavMenuName = "wp_get_nav_menu_name";
	/**
		 * Filters the nav_menu term retrieved for wp_get_nav_menu_object().
		 *
		 * @since 4.3.0
		 *
		 * @param WP_Term|false      $menu_obj Term from nav_menu taxonomy, or false if nothing had been found.
		 * @param int|string|WP_Term $menu     The menu ID, slug, name, or object passed to wp_get_nav_menu_object().
		 * @Reference wp-includes\nav-menu.php apply_filters( 'wp_get_nav_menu_object', $menu_obj, $menu )
	*/
	const WpGetNavMenuObject = "wp_get_nav_menu_object";
	/**
		 * Filters the navigation menu objects being returned.
		 *
		 * @since 3.0.0
		 *
		 * @see get_terms()
		 *
		 * @param array $menus An array of menu objects.
		 * @param array $args  An array of arguments used to retrieve menu objects.
		 * @Reference wp-includes\nav-menu.php apply_filters( 'wp_get_nav_menus', get_terms( $args ), $args )
	*/
	const WpGetNavMenus = "wp_get_nav_menus";
	/**
		 * Filters the terms for a given object or objects.
		 *
		 * The `$taxonomies` parameter passed to this filter is formatted as a SQL fragment. The
		 * {@see 'get_object_terms'} filter is recommended as an alternative.
		 *
		 * @since 2.8.0
		 *
		 * @param array    $terms      Array of terms for the given object or objects.
		 * @param int[]    $object_ids Array of object IDs for which terms were retrieved.
		 * @param string[] $taxonomies Array of taxonomy names from which terms were retrieved.
		 * @param array    $args       Array of arguments for retrieving terms for the given
		 *                             object(s). See wp_get_object_terms() for details.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_get_object_terms', $terms, $object_ids, $taxonomies, $args )
	*/
	const WpGetObjectTerms = "wp_get_object_terms";
	/**
		 * Filter arguments for retrieving object terms.
		 *
		 * @since 4.9.0
		 *
		 * @param array    $args       An array of arguments for retrieving terms for the given object(s).
		 *                             See {@see wp_get_object_terms()} for details.
		 * @param int[]    $object_ids Array of object IDs.
		 * @param string[] $taxonomies Array of taxonomy names to retrieve terms from.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_get_object_terms_args', $args, $object_ids, $taxonomies )
	*/
	const WpGetObjectTermsArgs = "wp_get_object_terms_args";
	/**
		 * Filters the path to the original image.
		 *
		 * @since 5.3.0
		 *
		 * @param string $original_image Path to original image file.
		 * @param int    $attachment_id  Attachment ID.
		 * @Reference wp-includes\post.php apply_filters( 'wp_get_original_image_path', $original_image, $attachment_id )
	*/
	const WpGetOriginalImagePath = "wp_get_original_image_path";
	/**
		 * Filters the URL to the original attachment image.
		 *
		 * @since 5.3.0
		 *
		 * @param string $original_image_url URL to original image.
		 * @param int    $attachment_id      Attachment ID.
		 * @Reference wp-includes\post.php apply_filters( 'wp_get_original_image_url', $original_image_url, $attachment_id )
	*/
	const WpGetOriginalImageUrl = "wp_get_original_image_url";
	/**
		 * Filters the fields displayed in the post revision diff UI.
		 *
		 * @since 4.1.0
		 *
		 * @param array[] $return       Array of revision UI fields. Each item is an array of id, name, and diff.
		 * @param WP_Post $compare_from The revision post to compare from.
		 * @param WP_Post $compare_to   The revision post to compare to.
		 * @Reference wp-admin\includes\revision.php apply_filters( 'wp_get_revision_ui_diff', $return, $compare_from, $compare_to )
	*/
	const WpGetRevisionUiDiff = "wp_get_revision_ui_diff";
	/**
		 * Filters the returned array of update data for plugins, themes, and WordPress core.
		 *
		 * @since 3.5.0
		 *
		 * @param array $update_data {
		 *     Fetched update data.
		 *
		 *     @type array   $counts       An array of counts for available plugin, theme, and WordPress updates.
		 *     @type string  $update_title Titles of available updates.
		 * }
		 * @param array $titles An array of update counts and UI strings for available updates.
		 * @Reference wp-includes\update.php apply_filters( 'wp_get_update_data', $update_data, $titles )
	*/
	const WpGetUpdateData = "wp_get_update_data";
	/**
		 * Filters the data array for the uploaded file.
		 *
		 * @since 2.1.0
		 *
		 * @param array  $upload {
		 *     Array of upload data.
		 *
		 *     @type string $file Filename of the newly-uploaded file.
		 *     @type string $url  URL of the uploaded file.
		 *     @type string $type File type.
		 * }
		 * @param string $context The type of upload action. Values include 'upload' or 'sideload'.
		 * @Reference wp-admin\includes\file.php apply_filters(		'wp_handle_upload',		array(			'file' => $new_file,			'url'  => $url,			'type' => $type,		),		'wp_handle_sideload' === $action ? 'sideload' : 'upload'	)
	* @Reference wp-includes\functions.php apply_filters(		'wp_handle_upload',		array(			'file'  => $new_file,			'url'   => $url,			'type'  => $wp_filetype['type'],			'error' => false,		),		'sideload'	)
	*/
	const WpHandleUpload = "wp_handle_upload";
	/**
			 * Filters the header image attachment metadata.
			 *
			 * @since 3.9.0
			 *
			 * @see wp_generate_attachment_metadata()
			 *
			 * @param array $metadata Attachment metadata.
			 * @Reference wp-admin\includes\class-custom-image-header.php apply_filters( 'wp_header_image_attachment_metadata', $metadata )
	*/
	const WpHeaderImageAttachmentMetadata = "wp_header_image_attachment_metadata";
	/**
			 * Filters the HTTP headers before they're sent to the browser.
			 *
			 * @since 2.8.0
			 *
			 * @param string[] $headers Associative array of headers to be sent.
			 * @param WP       $this    Current WordPress environment instance.
			 * @Reference wp-includes\class-wp.php apply_filters( 'wp_headers', $headers, $this )
	*/
	const WpHeaders = "wp_headers";
	/**
			 * Filters the allowed encoding types.
			 *
			 * @since 3.6.0
			 *
			 * @param array  $type Encoding types allowed. Accepts 'gzinflate',
			 *                     'gzuncompress', 'gzdecode'.
			 * @param string $url  URL of the HTTP request.
			 * @param array  $args HTTP request arguments.
			 * @Reference wp-includes\class-wp-http-encoding.php apply_filters( 'wp_http_accept_encoding', $type, $url, $args )
	*/
	const WpHttpAcceptEncoding = "wp_http_accept_encoding";
	/**
			 * Filters the header-encoded cookie value.
			 *
			 * @since 3.4.0
			 *
			 * @param string $value The cookie value.
			 * @param string $name  The cookie name.
			 * @Reference wp-includes\class-wp-http-cookie.php apply_filters( 'wp_http_cookie_value', $this->value, $this->name )
	*/
	const WpHttpCookieValue = "wp_http_cookie_value";
	/**
			 * Filters the headers collection to be sent to the XML-RPC server.
			 *
			 * @since 4.4.0
			 *
			 * @param string[] $headers Associative array of headers to be sent.
			 * @Reference wp-includes\class-wp-http-ixr-client.php apply_filters( 'wp_http_ixr_client_headers', $args['headers'] )
	*/
	const WpHttpIxrClientHeaders = "wp_http_ixr_client_headers";
	/**
			 * Filters the WP_Image_Editor instance before applying changes to the image.
			 *
			 * @since 3.5.0
			 *
			 * @param WP_Image_Editor $image   WP_Image_Editor instance.
			 * @param array           $changes Array of change operations.
			 * @Reference wp-admin\includes\image-edit.php apply_filters( 'wp_image_editor_before_change', $image, $changes )
	*/
	const WpImageEditorBeforeChange = "wp_image_editor_before_change";
	/**
		 * Filters the list of image editing library classes.
		 *
		 * @since 3.5.0
		 *
		 * @param array $image_editors List of available image editors. Defaults are
		 *                             'WP_Image_Editor_Imagick', 'WP_Image_Editor_GD'.
		 * @Reference wp-includes\media.php apply_filters( 'wp_image_editors', array( 'WP_Image_Editor_Imagick', 'WP_Image_Editor_GD' ) )
	*/
	const WpImageEditors = "wp_image_editors";
	/**
			 * Filters the `$orientation` value to correct it before rotating or to prevemnt rotating the image.
			 *
			 * @since 5.3.0
			 *
			 * @param int    $orientation EXIF Orientation value as retrieved from the image file.
			 * @param string $file        Path to the image file.
			 * @Reference wp-includes\class-wp-image-editor.php apply_filters( 'wp_image_maybe_exif_rotate', $orientation, $this->file )
	*/
	const WpImageMaybeExifRotate = "wp_image_maybe_exif_rotate";
	/**
			 * Filters whether to proceed with making an image sub-size with identical dimensions
			 * with the original/source image. Differences of 1px may be due to rounding and are ignored.
			 *
			 * @since 5.3.0
			 *
			 * @param bool The filtered value.
			 * @param int  Original image width.
			 * @param int  Original image height.
			 * @Reference wp-includes\media.php apply_filters( 'wp_image_resize_identical_dimensions', false, $orig_w, $orig_h )
	*/
	const WpImageResizeIdenticalDimensions = "wp_image_resize_identical_dimensions";
	/**
		 * Filters the arguments for initializing a site.
		 *
		 * @since 5.1.0
		 *
		 * @param array      $args    Arguments to modify the initialization behavior.
		 * @param WP_Site    $site    Site that is being initialized.
		 * @param WP_Network $network Network that the site belongs to.
		 * @Reference wp-includes\ms-site.php apply_filters( 'wp_initialize_site_args', $args, $site, $network )
	*/
	const WpInitializeSiteArgs = "wp_initialize_site_args";
	/**
			 * Filters attachment post data before it is updated in or added to the database.
			 *
			 * @since 3.9.0
			 *
			 * @param array $data    An array of sanitized attachment post data.
			 * @param array $postarr An array of unsanitized attachment post data.
			 * @Reference wp-includes\post.php apply_filters( 'wp_insert_attachment_data', $data, $postarr )
	*/
	const WpInsertAttachmentData = "wp_insert_attachment_data";
	/**
			 * Filters slashed post data just before it is inserted into the database.
			 *
			 * @since 2.7.0
			 *
			 * @param array $data    An array of slashed post data.
			 * @param array $postarr An array of sanitized, but otherwise unmodified post data.
			 * @Reference wp-includes\post.php apply_filters( 'wp_insert_post_data', $data, $postarr )
	*/
	const WpInsertPostData = "wp_insert_post_data";
	/**
		 * Filters whether the post should be considered "empty".
		 *
		 * The post is considered "empty" if both:
		 * 1. The post type supports the title, editor, and excerpt fields
		 * 2. The title, editor, and excerpt fields are all empty
		 *
		 * Returning a truthy value to the filter will effectively short-circuit
		 * the new post being inserted, returning 0. If $wp_error is true, a WP_Error
		 * will be returned instead.
		 *
		 * @since 3.3.0
		 *
		 * @param bool  $maybe_empty Whether the post should be considered "empty".
		 * @param array $postarr     Array of post data.
		 * @Reference wp-includes\post.php apply_filters( 'wp_insert_post_empty_content', $maybe_empty, $postarr )
	*/
	const WpInsertPostEmptyContent = "wp_insert_post_empty_content";
	/**
		 * Filters the post parent -- used to check for and prevent hierarchy loops.
		 *
		 * @since 3.1.0
		 *
		 * @param int   $post_parent Post parent ID.
		 * @param int   $post_ID     Post ID.
		 * @param array $new_postarr Array of parsed post data.
		 * @param array $postarr     Array of sanitized, but otherwise unmodified post data.
		 * @Reference wp-includes\post.php apply_filters( 'wp_insert_post_parent', $post_parent, $post_ID, $new_postarr, $postarr )
	*/
	const WpInsertPostParent = "wp_insert_post_parent";
	/**
		 * Filters term data before it is inserted into the database.
		 *
		 * @since 4.7.0
		 *
		 * @param array  $data     Term data to be inserted.
		 * @param string $taxonomy Taxonomy slug.
		 * @param array  $args     Arguments passed to wp_insert_term().
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_insert_term_data', $data, $taxonomy, $args )
	*/
	const WpInsertTermData = "wp_insert_term_data";
	/**
		 * Filters the duplicate term check that takes place during term creation.
		 *
		 * Term parent+taxonomy+slug combinations are meant to be unique, and wp_insert_term()
		 * performs a last-minute confirmation of this uniqueness before allowing a new term
		 * to be created. Plugins with different uniqueness requirements may use this filter
		 * to bypass or modify the duplicate-term check.
		 *
		 * @since 5.1.0
		 *
		 * @param object $duplicate_term Duplicate term row from terms table, if found.
		 * @param string $term           Term being inserted.
		 * @param string $taxonomy       Taxonomy name.
		 * @param array  $args           Term arguments passed to the function.
		 * @param int    $tt_id          term_taxonomy_id for the newly created term.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_insert_term_duplicate_term_check', $duplicate_term, $term, $taxonomy, $args, $tt_id )
	*/
	const WpInsertTermDuplicateTermCheck = "wp_insert_term_duplicate_term_check";
	/**
		 * Filters whether a comment is part of a comment flood.
		 *
		 * The default check is wp_check_comment_flood(). See check_comment_flood_db().
		 *
		 * @since 4.7.0
		 *
		 * @param bool   $is_flood             Is a comment flooding occurring? Default false.
		 * @param string $comment_author_IP    Comment author's IP address.
		 * @param string $comment_author_email Comment author's email.
		 * @param string $comment_date_gmt     GMT date the comment was posted.
		 * @param bool   $avoid_die            Whether to prevent executing wp_die()
		 *                                     or die() if a comment flood is occurring.
		 * @Reference wp-includes\comment.php apply_filters(		'wp_is_comment_flood',		false,		$commentdata['comment_author_IP'],		$commentdata['comment_author_email'],		$commentdata['comment_date_gmt'],		$avoid_die	)
	*/
	const WpIsCommentFlood = "wp_is_comment_flood";
	/**
			 * Filters whether the network is considered large.
			 *
			 * @since 3.3.0
			 * @since 4.8.0 The `$network_id` parameter has been added.
			 *
			 * @param bool   $is_large_network Whether the network has more than 10000 users or sites.
			 * @param string $component        The component to count. Accepts 'users', or 'sites'.
			 * @param int    $count            The count of items for the component.
			 * @param int    $network_id       The ID of the network being checked.
			 * @Reference wp-includes\ms-functions.php apply_filters( 'wp_is_large_network', $count > 10000, 'users', $count, $network_id )
	* @Reference wp-includes\ms-functions.php apply_filters( 'wp_is_large_network', $count > 10000, 'sites', $count, $network_id )
	*/
	const WpIsLargeNetwork = "wp_is_large_network";
	/**
		 * Filters whether the request should be treated as coming from a mobile device or not.
		 *
		 * @since 4.9.0
		 *
		 * @param bool $is_mobile Whether the request is from a mobile device or not.
		 * @Reference wp-includes\vars.php apply_filters( 'wp_is_mobile', $is_mobile )
	*/
	const WpIsMobile = "wp_is_mobile";
	/**
			 * Filters whether the active PHP version is considered acceptable by WordPress.
			 *
			 * Returning false will trigger a PHP version warning to show up in the admin dashboard to administrators.
			 *
			 * This filter is only run if the wordpress.org Serve Happy API considers the PHP version acceptable, ensuring
			 * that this filter can only make this check stricter, but not loosen it.
			 *
			 * @since 5.1.1
			 *
			 * @param bool   $is_acceptable Whether the PHP version is considered acceptable. Default true.
			 * @param string $version       PHP version checked.
			 * @Reference wp-admin\includes\misc.php apply_filters( 'wp_is_php_version_acceptable', true, $version )
	*/
	const WpIsPhpVersionAcceptable = "wp_is_php_version_acceptable";
	/**
			 * Filters the HTML that is allowed for a given context.
			 *
			 * @since 3.5.0
			 *
			 * @param array[]|string $context      Context to judge allowed tags by.
			 * @param string         $context_type Context name.
			 * @Reference wp-includes\kses.php apply_filters( 'wp_kses_allowed_html', $context, 'explicit' )
	* @Reference wp-includes\kses.php apply_filters( 'wp_kses_allowed_html', $allowedentitynames, $context )
	* @Reference wp-includes\kses.php apply_filters( 'wp_kses_allowed_html', $allowedposttags, $context )
	* @Reference wp-includes\kses.php apply_filters( 'wp_kses_allowed_html', $allowedtags, $context )
	* @Reference wp-includes\kses.php apply_filters( 'wp_kses_allowed_html', $tags, $context )
	* @Reference wp-includes\kses.php apply_filters( 'wp_kses_allowed_html', $tags, $context )
	* @Reference wp-includes\kses.php apply_filters( 'wp_kses_allowed_html', array(), $context )
	*/
	const WpKsesAllowedHtml = "wp_kses_allowed_html";
	/**
		 * Filters the list of attributes that are required to contain a URL.
		 *
		 * Use this filter to add any `data-` attributes that are required to be
		 * validated as a URL.
		 *
		 * @since 5.0.1
		 *
		 * @param array $uri_attributes HTML attributes requiring validation as a URL.
		 * @Reference wp-includes\kses.php apply_filters( 'wp_kses_uri_attributes', $uri_attributes )
	*/
	const WpKsesUriAttributes = "wp_kses_uri_attributes";
	/**
		 * Filters the HTML output of page links for paginated posts.
		 *
		 * @since 3.6.0
		 *
		 * @param string $output HTML output of paginated posts' page links.
		 * @param array  $args   An array of arguments.
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_link_pages', $output, $args )
	*/
	const WpLinkPages = "wp_link_pages";
	/**
		 * Filters the arguments used in retrieving page links for paginated posts.
		 *
		 * @since 3.0.0
		 *
		 * @param array $parsed_args An array of arguments for page links for paginated posts.
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_link_pages_args', $parsed_args )
	*/
	const WpLinkPagesArgs = "wp_link_pages_args";
	/**
					 * Filters the HTML output of individual page number links.
					 *
					 * @since 3.6.0
					 *
					 * @param string $link The page number HTML output.
					 * @param int    $i    Page number for paginated posts' page links.
					 * @Reference wp-includes\post-template.php apply_filters( 'wp_link_pages_link', $link, $i )
	* @Reference wp-includes\post-template.php apply_filters( 'wp_link_pages_link', $link, $next )
	* @Reference wp-includes\post-template.php apply_filters( 'wp_link_pages_link', $link, $prev )
	*/
	const WpLinkPagesLink = "wp_link_pages_link";
	/**
			 * Filters the link query results.
			 *
			 * Allows modification of the returned link query results.
			 *
			 * @since 3.7.0
			 *
			 * @see 'wp_link_query_args' filter
			 *
			 * @param array $results {
			 *     An associative array of query results.
			 *
			 *     @type array {
			 *         @type int    $ID        Post ID.
			 *         @type string $title     The trimmed, escaped post title.
			 *         @type string $permalink Post permalink.
			 *         @type string $info      A 'Y/m/d'-formatted date for 'post' post type,
			 *                                 the 'singular_name' post type label otherwise.
			 *     }
			 * }
			 * @param array $query  An array of WP_Query arguments.
			 * @Reference wp-includes\class-wp-editor.php apply_filters( 'wp_link_query', $results, $query )
	*/
	const WpLinkQuery = "wp_link_query";
	/**
			 * Filters the link query arguments.
			 *
			 * Allows modification of the link query arguments before querying.
			 *
			 * @see WP_Query for a full list of arguments
			 *
			 * @since 3.7.0
			 *
			 * @param array $query An array of WP_Query arguments.
			 * @Reference wp-includes\class-wp-editor.php apply_filters( 'wp_link_query_args', $query )
	*/
	const WpLinkQueryArgs = "wp_link_query_args";
	/**
		 * Filters the bookmarks list before it is echoed or returned.
		 *
		 * @since 2.5.0
		 *
		 * @param string $html The HTML list of bookmarks.
		 * @Reference wp-includes\bookmark-template.php apply_filters( 'wp_list_bookmarks', $output )
	*/
	const WpListBookmarks = "wp_list_bookmarks";
	/**
		 * Filters the HTML output of a taxonomy list.
		 *
		 * @since 2.1.0
		 *
		 * @param string $output HTML output.
		 * @param array  $args   An array of taxonomy-listing arguments.
		 * @Reference wp-includes\category-template.php apply_filters( 'wp_list_categories', $output, $args )
	*/
	const WpListCategories = "wp_list_categories";
	/**
		 * Filters the arguments used in retrieving the comment list.
		 *
		 * @since 4.0.0
		 *
		 * @see wp_list_comments()
		 *
		 * @param array $parsed_args An array of arguments for displaying comments.
		 * @Reference wp-includes\comment-template.php apply_filters( 'wp_list_comments_args', $parsed_args )
	*/
	const WpListCommentsArgs = "wp_list_comments_args";
	/**
		 * Filters the HTML output of the pages to list.
		 *
		 * @since 1.5.1
		 * @since 4.4.0 `$pages` added as arguments.
		 *
		 * @see wp_list_pages()
		 *
		 * @param string $output      HTML output of the pages list.
		 * @param array  $parsed_args An array of page-listing arguments.
		 * @param array  $pages       List of WP_Post objects returned by `get_pages()`
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_list_pages', $output, $parsed_args, $pages )
	*/
	const WpListPages = "wp_list_pages";
	/**
		 * Filters the array of pages to exclude from the pages list.
		 *
		 * @since 2.1.0
		 *
		 * @param array $exclude_array An array of page IDs to exclude.
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_list_pages_excludes', $exclude_array )
	*/
	const WpListPagesExcludes = "wp_list_pages_excludes";
	/**
			 * Filters the login page errors.
			 *
			 * @since 3.6.0
			 *
			 * @param object $errors      WP Error object.
			 * @param string $redirect_to Redirect destination URL.
			 * @Reference wp-login.php apply_filters( 'wp_login_errors', $errors, $redirect_to )
	*/
	const WpLoginErrors = "wp_login_errors";
	/**
			 * Filters the wp_mail() arguments.
			 *
			 * @since 2.2.0
			 *
			 * @param array $args A compacted array of wp_mail() arguments, including the "to" email,
			 *                    subject, message, headers, and attachments values.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_mail', compact( 'to', 'subject', 'message', 'headers', 'attachments' ) )
	*/
	const WpMail = "wp_mail";
	/**
			 * Filters the default wp_mail() charset.
			 *
			 * @since 2.3.0
			 *
			 * @param string $charset Default email charset.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_mail_charset', $charset )
	*/
	const WpMailCharset = "wp_mail_charset";
	/**
			 * Filters the wp_mail() content type.
			 *
			 * @since 2.3.0
			 *
			 * @param string $content_type Default wp_mail() content type.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_mail_content_type', $content_type )
	* @Reference wp-includes\formatting.php apply_filters( 'wp_mail_content_type', $content_type )
	*/
	const WpMailContentType = "wp_mail_content_type";
	/**
			 * Filters the email address to send from.
			 *
			 * @since 2.2.0
			 *
			 * @param string $from_email Email address to send from.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_mail_from', $from_email )
	*/
	const WpMailFrom = "wp_mail_from";
	/**
			 * Filters the name to associate with the "from" email address.
			 *
			 * @since 2.3.0
			 *
			 * @param string $from_name Name associated with the "from" email address.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_mail_from_name', $from_name )
	*/
	const WpMailFromName = "wp_mail_from_name";
	/**
		 * Filters the original content of the email.
		 *
		 * Give Post-By-Email extending plugins full access to the content, either
		 * the raw content, or the content of the last quoted-printable section.
		 *
		 * @since 2.8.0
		 *
		 * @param string $content The original email content.
		 * @Reference wp-mail.php apply_filters( 'wp_mail_original_content', $content )
	*/
	const WpMailOriginalContent = "wp_mail_original_content";
	/**
			 * Filters translated strings prepared for TinyMCE.
			 *
			 * @since 3.9.0
			 *
			 * @param array  $mce_translation Key/value pairs of strings.
			 * @param string $mce_locale      Locale.
			 * @Reference wp-includes\class-wp-editor.php apply_filters( 'wp_mce_translation', $mce_translation, $mce_locale )
	*/
	const WpMceTranslation = "wp_mce_translation";
	/**
		 * Filters the Mediaelement fallback output for no-JS.
		 *
		 * @since 3.6.0
		 *
		 * @param string $output Fallback output for no-JS.
		 * @param string $url    Media file URL.
		 * @Reference wp-includes\media.php apply_filters( 'wp_mediaelement_fallback', sprintf( '<a href="%1$s">%1$s</a>', esc_url( $url ) ), $url )
	*/
	const WpMediaelementFallback = "wp_mediaelement_fallback";
	/**
		 * Filters the mime type icon.
		 *
		 * @since 2.1.0
		 *
		 * @param string $icon    Path to the mime type icon.
		 * @param string $mime    Mime type.
		 * @param int    $post_id Attachment ID. Will equal 0 if the function passed
		 *                        the mime type.
		 * @Reference wp-includes\post.php apply_filters( 'wp_mime_type_icon', $icon, $mime, $post_id )
	*/
	const WpMimeTypeIcon = "wp_mime_type_icon";
	/**
								 * Filters the number of locations listed per menu in the drop-down select.
								 *
								 * @since 3.6.0
								 *
								 * @param int $locations Number of menu locations to list. Default 3.
								 * @Reference wp-admin\nav-menus.php apply_filters( 'wp_nav_locations_listed_per_menu', 3 )
	*/
	const WpNavLocationsListedPerMenu = "wp_nav_locations_listed_per_menu";
	/**
		 * Filters the HTML content for navigation menus.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string   $nav_menu The HTML content for the navigation menu.
		 * @param stdClass $args     An object containing wp_nav_menu() arguments.
		 * @Reference wp-includes\nav-menu-template.php apply_filters( 'wp_nav_menu', $nav_menu, $args )
	*/
	const WpNavMenu = "wp_nav_menu";
	/**
		 * Filters the arguments used to display a navigation menu.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param array $args Array of wp_nav_menu() arguments.
		 * @Reference wp-includes\nav-menu-template.php apply_filters( 'wp_nav_menu_args', $args )
	*/
	const WpNavMenuArgs = "wp_nav_menu_args";
	/**
			 * Filters the list of HTML tags that are valid for use as menu containers.
			 *
			 * @since 3.0.0
			 *
			 * @param array $tags The acceptable HTML tags for use as menu containers.
			 *                    Default is array containing 'div' and 'nav'.
			 * @Reference wp-includes\nav-menu-template.php apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) )
	*/
	const WpNavMenuContainerAllowedtags = "wp_nav_menu_container_allowedtags";
	/**
		 * Filters the HTML list content for navigation menus.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string   $items The HTML list content for the menu items.
		 * @param stdClass $args  An object containing wp_nav_menu() arguments.
		 * @Reference wp-includes\nav-menu-template.php apply_filters( 'wp_nav_menu_items', $items, $args )
	*/
	const WpNavMenuItems = "wp_nav_menu_items";
	/**
		 * Filters the sorted list of menu item objects before generating the menu's HTML.
		 *
		 * @since 3.1.0
		 *
		 * @param array    $sorted_menu_items The menu items, sorted by each menu item's menu order.
		 * @param stdClass $args              An object containing wp_nav_menu() arguments.
		 * @Reference wp-includes\nav-menu-template.php apply_filters( 'wp_nav_menu_objects', $sorted_menu_items, $args )
	*/
	const WpNavMenuObjects = "wp_nav_menu_objects";
	/**
			 * Filters the list of widgets to load for the Network Admin dashboard.
			 *
			 * @since 3.1.0
			 *
			 * @param string[] $dashboard_widgets An array of dashboard widget IDs.
			 * @Reference wp-admin\includes\dashboard.php apply_filters( 'wp_network_dashboard_widgets', array() )
	*/
	const WpNetworkDashboardWidgets = "wp_network_dashboard_widgets";
	/**
			 * Filters the contents of the new user notification email sent to the new user.
			 *
			 * @since 4.9.0
			 *
			 * @param array   $wp_new_user_notification_email {
			 *     Used to build wp_mail().
			 *
			 *     @type string $to      The intended recipient - New user email address.
			 *     @type string $subject The subject of the email.
			 *     @type string $message The body of the email.
			 *     @type string $headers The headers of the email.
			 * }
			 * @param WP_User $user     User object for new user.
			 * @param string  $blogname The site title.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_new_user_notification_email', $wp_new_user_notification_email, $user, $blogname )
	*/
	const WpNewUserNotificationEmail = "wp_new_user_notification_email";
	/**
				 * Filters the contents of the new user notification email sent to the site admin.
				 *
				 * @since 4.9.0
				 *
				 * @param array   $wp_new_user_notification_email_admin {
				 *     Used to build wp_mail().
				 *
				 *     @type string $to      The intended recipient - site admin email address.
				 *     @type string $subject The subject of the email.
				 *     @type string $message The body of the email.
				 *     @type string $headers The headers of the email.
				 * }
				 * @param WP_User $user     User object for new user.
				 * @param string  $blogname The site title.
				 * @Reference wp-includes\pluggable.php apply_filters( 'wp_new_user_notification_email_admin', $wp_new_user_notification_email_admin, $user, $blogname )
	*/
	const WpNewUserNotificationEmailAdmin = "wp_new_user_notification_email_admin";
	/**
		 * Filters passed site data in order to normalize it.
		 *
		 * @since 5.1.0
		 *
		 * @param array $data Associative array of site data passed to the respective function.
		 *                    See {@see wp_insert_site()} for the possibly included data.
		 * @Reference wp-includes\ms-site.php apply_filters( 'wp_normalize_site_data', $data )
	*/
	const WpNormalizeSiteData = "wp_normalize_site_data";
	/**
		 * Filters the HTML output of a page-based menu.
		 *
		 * @since 2.7.0
		 *
		 * @see wp_page_menu()
		 *
		 * @param string $menu The HTML output.
		 * @param array  $args An array of arguments.
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_page_menu', $menu, $args )
	*/
	const WpPageMenu = "wp_page_menu";
	/**
		 * Filters the arguments used to generate a page-based menu.
		 *
		 * @since 2.7.0
		 *
		 * @see wp_page_menu()
		 *
		 * @param array $args An array of page menu arguments.
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_page_menu_args', $args )
	*/
	const WpPageMenuArgs = "wp_page_menu_args";
	/**
		 * Filters the array of variables derived from a parsed string.
		 *
		 * @since 2.3.0
		 *
		 * @param array $array The array populated with variables.
		 * @Reference wp-includes\formatting.php apply_filters( 'wp_parse_str', $array )
	*/
	const WpParseStr = "wp_parse_str";
	/**
				 * Filters the contents of the password change notification email sent to the site admin.
				 *
				 * @since 4.9.0
				 *
				 * @param array   $wp_password_change_notification_email {
				 *     Used to build wp_mail().
				 *
				 *     @type string $to      The intended recipient - site admin email address.
				 *     @type string $subject The subject of the email.
				 *     @type string $message The body of the email.
				 *     @type string $headers The headers of the email.
				 * }
				 * @param WP_User $user     User object for user whose password was changed.
				 * @param string  $blogname The site title.
				 * @Reference wp-includes\pluggable.php apply_filters( 'wp_password_change_notification_email', $wp_password_change_notification_email, $user, $blogname )
	*/
	const WpPasswordChangeNotificationEmail = "wp_password_change_notification_email";
	/**
			 * Filters the arguments passed to {@see wp_die()} for the default PHP error template.
			 *
			 * @since 5.2.0
			 *
			 * @param array $args Associative array of arguments passed to `wp_die()`. By default these contain a
			 *                    'response' key, and optionally 'link_url' and 'link_text' keys.
			 * @param array $error Error information retrieved from `error_get_last()`.
			 * @Reference wp-includes\class-wp-fatal-error-handler.php apply_filters( 'wp_php_error_args', $args, $error )
	*/
	const WpPhpErrorArgs = "wp_php_error_args";
	/**
			 * Filters the message that the default PHP error template displays.
			 *
			 * @since 5.2.0
			 *
			 * @param string $message HTML error message to display.
			 * @param array  $error   Error information retrieved from `error_get_last()`.
			 * @Reference wp-includes\class-wp-fatal-error-handler.php apply_filters( 'wp_php_error_message', $message, $error )
	*/
	const WpPhpErrorMessage = "wp_php_error_message";
	/**
		 * Filters the formatted author and date for a revision.
		 *
		 * @since 4.4.0
		 *
		 * @param string  $revision_date_author The formatted string.
		 * @param WP_Post $revision             The revision object.
		 * @param bool    $link                 Whether to link to the revisions page, as passed into
		 *                                      wp_post_revision_title_expanded().
		 * @Reference wp-includes\post-template.php apply_filters( 'wp_post_revision_title_expanded', $revision_date_author, $revision, $link )
	*/
	const WpPostRevisionTitleExpanded = "wp_post_revision_title_expanded";
	/**
		 * Filters user data before the record is created or updated.
		 *
		 * It only includes data in the wp_users table wp_user, not any user metadata.
		 *
		 * @since 4.9.0
		 *
		 * @param array    $data {
		 *     Values and keys for the user.
		 *
		 *     @type string $user_login      The user's login. Only included if $update == false
		 *     @type string $user_pass       The user's password.
		 *     @type string $user_email      The user's email.
		 *     @type string $user_url        The user's url.
		 *     @type string $user_nicename   The user's nice name. Defaults to a URL-safe version of user's login
		 *     @type string $display_name    The user's display name.
		 *     @type string $user_registered MySQL timestamp describing the moment when the user registered. Defaults to
		 *                                   the current UTC timestamp.
		 * }
		 * @param bool     $update Whether the user is being updated rather than created.
		 * @param int|null $id     ID of the user to be updated, or NULL if the user is being created.
		 * @Reference wp-includes\user.php apply_filters( 'wp_pre_insert_user_data', $data, $update, $update ? (int) $ID : null )
	*/
	const WpPreInsertUserData = "wp_pre_insert_user_data";
	/**
		 * Filters the attachment data prepared for JavaScript.
		 *
		 * @since 3.5.0
		 *
		 * @param array       $response   Array of prepared attachment data.
		 * @param WP_Post     $attachment Attachment object.
		 * @param array|false $meta       Array of attachment meta data, or false if there is none.
		 * @Reference wp-includes\media.php apply_filters( 'wp_prepare_attachment_for_js', $response, $attachment, $meta )
	*/
	const WpPrepareAttachmentForJs = "wp_prepare_attachment_for_js";
	/**
			 * Filters the array of revisions used on the revisions screen.
			 *
			 * @since 4.4.0
			 *
			 * @param array   $revisions_data {
			 *     The bootstrapped data for the revisions screen.
			 *
			 *     @type int        $id         Revision ID.
			 *     @type string     $title      Title for the revision's parent WP_Post object.
			 *     @type int        $author     Revision post author ID.
			 *     @type string     $date       Date the revision was modified.
			 *     @type string     $dateShort  Short-form version of the date the revision was modified.
			 *     @type string     $timeAgo    GMT-aware amount of time ago the revision was modified.
			 *     @type bool       $autosave   Whether the revision is an autosave.
			 *     @type bool       $current    Whether the revision is both not an autosave and the post
			 *                                  modified date matches the revision modified date (GMT-aware).
			 *     @type bool|false $restoreUrl URL if the revision can be restored, false otherwise.
			 * }
			 * @param WP_Post $revision       The revision's WP_Post object.
			 * @param WP_Post $post           The revision's parent WP_Post object.
			 * @Reference wp-admin\includes\revision.php apply_filters( 'wp_prepare_revision_for_js', $revisions_data, $revision, $post )
	*/
	const WpPrepareRevisionForJs = "wp_prepare_revision_for_js";
	/**
		 * Filters the themes prepared for JavaScript, for themes.php.
		 *
		 * Could be useful for changing the order, which is by name by default.
		 *
		 * @since 3.8.0
		 *
		 * @param array $prepared_themes Array of theme data.
		 * @Reference wp-admin\includes\theme.php apply_filters( 'wp_prepare_themes_for_js', $prepared_themes )
	*/
	const WpPrepareThemesForJs = "wp_prepare_themes_for_js";
	/**
		 * Filters the anonymous data for each type.
		 *
		 * @since 4.9.6
		 *
		 * @param string $anonymous Anonymized data.
		 * @param string $type      Type of the data.
		 * @param string $data      Original data.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_privacy_anonymize_data', $anonymous, $type, $data )
	*/
	const WpPrivacyAnonymizeData = "wp_privacy_anonymize_data";
	/**
		 * Filters the lifetime, in seconds, of a personal data export file.
		 *
		 * By default, the lifetime is 3 days. Once the file reaches that age, it will automatically
		 * be deleted by a cron job.
		 *
		 * @since 4.9.6
		 *
		 * @param int $expiration The expiration age of the export, in seconds.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_privacy_export_expiration', 3 * DAY_IN_SECONDS )
	* @Reference wp-admin\includes\privacy-tools.php apply_filters( 'wp_privacy_export_expiration', 3 * DAY_IN_SECONDS )
	*/
	const WpPrivacyExportExpiration = "wp_privacy_export_expiration";
	/**
		 * Filters the directory used to store personal data export files.
		 *
		 * @since 4.9.6
		 *
		 * @param string $exports_dir Exports directory.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_privacy_exports_dir', $exports_dir )
	*/
	const WpPrivacyExportsDir = "wp_privacy_exports_dir";
	/**
		 * Filters the URL of the directory used to store personal data export files.
		 *
		 * @since 4.9.6
		 *
		 * @param string $exports_url Exports directory URL.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_privacy_exports_url', $exports_url )
	*/
	const WpPrivacyExportsUrl = "wp_privacy_exports_url";
	/**
		 * Filters the text of the email sent with a personal data export file.
		 *
		 * The following strings have a special meaning and will get replaced dynamically:
		 * ###EXPIRATION###         The date when the URL will be automatically deleted.
		 * ###LINK###               URL of the personal data export file for the user.
		 * ###SITENAME###           The name of the site.
		 * ###SITEURL###            The URL to the site.
		 *
		 * @since 4.9.6
		 * @since 5.3.0 Introduced the `$email_data` array.
		 *
		 * @param string $email_text Text in the email.
		 * @param int    $request_id The request ID for this personal data export.
		 * @param array  $email_data {
		 *     Data relating to the account action email.
		 *
		 *     @type WP_User_Request $request           User request object.
		 *     @type int             $expiration        The time in seconds until the export file expires.
		 *     @type string          $expiration_date   The localized date and time when the export file expires.
		 *     @type string          $message_recipient The address that the email will be sent to. Defaults
		 *                                              to the value of `$request->email`, but can be changed
		 *                                              by the `wp_privacy_personal_data_email_to` filter.
		 *     @type string          $export_file_url   The export file URL.
		 *     @type string          $sitename          The site name sending the mail.
		 *     @type string          $siteurl           The site URL sending the mail.
		 * @Reference wp-admin\includes\privacy-tools.php apply_filters( 'wp_privacy_personal_data_email_content', $email_text, $request_id, $email_data )
	*/
	const WpPrivacyPersonalDataEmailContent = "wp_privacy_personal_data_email_content";
	/**
		 * Filters the subject of the email sent when an export request is completed.
		 *
		 * @since 5.3.0
		 *
		 * @param string $subject    The email subject.
		 * @param string $sitename   The name of the site.
		 * @param array  $email_data {
		 *     Data relating to the account action email.
		 *
		 *     @type WP_User_Request $request           User request object.
		 *     @type int             $expiration        The time in seconds until the export file expires.
		 *     @type string          $expiration_date   The localized date and time when the export file expires.
		 *     @type string          $message_recipient The address that the email will be sent to. Defaults
		 *                                              to the value of `$request->email`, but can be changed
		 *                                              by the `wp_privacy_personal_data_email_to` filter.
		 *     @type string          $export_file_url   The export file URL.
		 *     @type string          $sitename          The site name sending the mail.
		 *     @type string          $siteurl           The site URL sending the mail.
		 * }
		 * @Reference wp-admin\includes\privacy-tools.php apply_filters( 'wp_privacy_personal_data_email_subject', $subject, $site_name, $email_data )
	*/
	const WpPrivacyPersonalDataEmailSubject = "wp_privacy_personal_data_email_subject";
	/**
		 * Filters the recipient of the personal data export email notification.
		 * Should be used with great caution to avoid sending the data export link to wrong emails.
		 *
		 * @since 5.3.0
		 *
		 * @param string          $request_email The email address of the notification recipient.
		 * @param WP_User_Request $request       The request that is initiating the notification.
		 * @Reference wp-admin\includes\privacy-tools.php apply_filters( 'wp_privacy_personal_data_email_to', $request->email, $request )
	*/
	const WpPrivacyPersonalDataEmailTo = "wp_privacy_personal_data_email_to";
	/**
		 * Filters the array of personal data eraser callbacks.
		 *
		 * @since 4.9.6
		 *
		 * @param array $args {
		 *     An array of callable erasers of personal data. Default empty array.
		 *
		 *     @type array {
		 *         Array of personal data exporters.
		 *
		 *         @type string $callback               Callable eraser that accepts an email address and
		 *                                              a page and returns an array with boolean values for
		 *                                              whether items were removed or retained and any messages
		 *                                              from the eraser, as well as if additional pages are
		 *                                              available.
		 *         @type string $exporter_friendly_name Translated user facing friendly name for the eraser.
		 *     }
		 * }
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_privacy_personal_data_erasers', array() )
	* @Reference wp-admin\includes\class-wp-privacy-data-removal-requests-list-table.php apply_filters( 'wp_privacy_personal_data_erasers', array() )
	* @Reference wp-admin\includes\class-wp-privacy-data-removal-requests-list-table.php apply_filters( 'wp_privacy_personal_data_erasers', array() )
	* @Reference wp-admin\includes\privacy-tools.php apply_filters( 'wp_privacy_personal_data_erasers', array() )
	*/
	const WpPrivacyPersonalDataErasers = "wp_privacy_personal_data_erasers";
	/**
		 * Filters a page of personal data eraser data.
		 *
		 * Allows the erasure response to be consumed by destinations in addition to Ajax.
		 *
		 * @since 4.9.6
		 *
		 * @param array  $response        The personal data for the given exporter and page.
		 * @param int    $eraser_index    The index of the eraser that provided this data.
		 * @param string $email_address   The email address associated with this personal data.
		 * @param int    $page            The page for this response.
		 * @param int    $request_id      The privacy request post ID associated with this request.
		 * @param string $eraser_key      The key (slug) of the eraser that provided this data.
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_privacy_personal_data_erasure_page', $response, $eraser_index, $email_address, $page, $request_id, $eraser_key )
	*/
	const WpPrivacyPersonalDataErasurePage = "wp_privacy_personal_data_erasure_page";
	/**
		 * Filters a page of personal data exporter data. Used to build the export report.
		 *
		 * Allows the export response to be consumed by destinations in addition to Ajax.
		 *
		 * @since 4.9.6
		 *
		 * @param array  $response        The personal data for the given exporter and page.
		 * @param int    $exporter_index  The index of the exporter that provided this data.
		 * @param string $email_address   The email address associated with this personal data.
		 * @param int    $page            The page for this response.
		 * @param int    $request_id      The privacy request post ID associated with this request.
		 * @param bool   $send_as_email   Whether the final results of the export should be emailed to the user.
		 * @param string $exporter_key    The key (slug) of the exporter that provided this data.
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_privacy_personal_data_export_page', $response, $exporter_index, $email_address, $page, $request_id, $send_as_email, $exporter_key )
	*/
	const WpPrivacyPersonalDataExportPage = "wp_privacy_personal_data_export_page";
	/**
		 * Filters the array of exporter callbacks.
		 *
		 * @since 4.9.6
		 *
		 * @param array $args {
		 *     An array of callable exporters of personal data. Default empty array.
		 *
		 *     @type array {
		 *         Array of personal data exporters.
		 *
		 *         @type string $callback               Callable exporter function that accepts an
		 *                                              email address and a page and returns an array
		 *                                              of name => value pairs of personal data.
		 *         @type string $exporter_friendly_name Translated user facing friendly name for the
		 *                                              exporter.
		 *     }
		 * }
		 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_privacy_personal_data_exporters', array() )
	* @Reference wp-admin\includes\class-wp-privacy-data-export-requests-list-table.php apply_filters( 'wp_privacy_personal_data_exporters', array() )
	* @Reference wp-admin\includes\class-wp-privacy-data-export-requests-list-table.php apply_filters( 'wp_privacy_personal_data_exporters', array() )
	* @Reference wp-admin\includes\privacy-tools.php apply_filters( 'wp_privacy_personal_data_exporters', array() )
	*/
	const WpPrivacyPersonalDataExporters = "wp_privacy_personal_data_exporters";
	/**
		 * Filters the array of protected AJAX actions.
		 *
		 * This filter is only fired when doing AJAX and the AJAX request has an 'action' property.
		 *
		 * @since 5.2.0
		 *
		 * @param array $actions_to_protect Array of strings with AJAX actions to protect.
		 * @Reference wp-includes\load.php apply_filters( 'wp_protected_ajax_actions', $actions_to_protect )
	*/
	const WpProtectedAjaxActions = "wp_protected_ajax_actions";
	/**
			 * Filters the prefix that indicates that a search term should be excluded from results.
			 *
			 * @since 4.7.0
			 *
			 * @param string $exclusion_prefix The prefix. Default '-'. Returning
			 *                                 an empty value disables exclusions.
			 * @Reference wp-includes\class-wp-query.php apply_filters( 'wp_query_search_exclusion_prefix', '-' )
	*/
	const WpQuerySearchExclusionPrefix = "wp_query_search_exclusion_prefix";
	/**
		 * Filters the array of meta data read from an image's exif data.
		 *
		 * @since 2.5.0
		 * @since 4.4.0 The `$iptc` parameter was added.
		 * @since 5.0.0 The `$exif` parameter was added.
		 *
		 * @param array  $meta       Image meta data.
		 * @param string $file       Path to image file.
		 * @param int    $image_type Type of image, one of the `IMAGETYPE_XXX` constants.
		 * @param array  $iptc       IPTC data.
		 * @param array  $exif       EXIF data.
		 * @Reference wp-admin\includes\image.php apply_filters( 'wp_read_image_metadata', $meta, $file, $image_type, $iptc, $exif )
	*/
	const WpReadImageMetadata = "wp_read_image_metadata";
	/**
		 * Filters the image types to check for exif data.
		 *
		 * @since 2.5.0
		 *
		 * @param array $image_types Image types to check for exif data.
		 * @Reference wp-admin\includes\image.php apply_filters( 'wp_read_image_metadata_types', array( IMAGETYPE_JPEG, IMAGETYPE_TIFF_II, IMAGETYPE_TIFF_MM ) )
	*/
	const WpReadImageMetadataTypes = "wp_read_image_metadata_types";
	/**
		 * Filters the array of metadata retrieved from a video.
		 *
		 * In core, usually this selection is what is stored.
		 * More complete data can be parsed from the `$data` parameter.
		 *
		 * @since 4.9.0
		 *
		 * @param array  $metadata       Filtered Video metadata.
		 * @param string $file           Path to video file.
		 * @param string $file_format    File format of video, as analyzed by getID3.
		 * @param string $data           Raw metadata from getID3.
		 * @Reference wp-admin\includes\media.php apply_filters( 'wp_read_video_metadata', $metadata, $file, $file_format, $data )
	*/
	const WpReadVideoMetadata = "wp_read_video_metadata";
	/**
			 * Filters the redirect location.
			 *
			 * @since 2.1.0
			 *
			 * @param string $location The path or URL to redirect to.
			 * @param int    $status   The HTTP response status code to use.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_redirect', $location, $status )
	*/
	const WpRedirect = "wp_redirect";
	/**
			 * Filters the redirect HTTP response status code to use.
			 *
			 * @since 2.3.0
			 *
			 * @param int    $status   The HTTP response status code to use.
			 * @param string $location The path or URL to redirect to.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_redirect_status', $status, $location )
	*/
	const WpRedirectStatus = "wp_redirect_status";
	/**
			 * Filters the nonces to send to the New/Edit Post screen.
			 *
			 * @since 4.3.0
			 *
			 * @param array  $response  The Heartbeat response.
			 * @param array  $data      The $_POST data sent.
			 * @param string $screen_id The screen id.
			 * @Reference wp-admin\includes\ajax-actions.php apply_filters( 'wp_refresh_nonces', $response, $data, $screen_id )
	*/
	const WpRefreshNonces = "wp_refresh_nonces";
	/**
			 * Filters domains and URLs for resource hints of relation type.
			 *
			 * @since 4.6.0
			 *
			 * @param array  $urls          URLs to print for resource hints.
			 * @param string $relation_type The relation type the URLs are printed for, e.g. 'preconnect' or 'prerender'.
			 * @Reference wp-includes\general-template.php apply_filters( 'wp_resource_hints', $urls, $relation_type )
	*/
	const WpResourceHints = "wp_resource_hints";
	/**
		 * Filters the search handlers to use in the REST search controller.
		 *
		 * @since 5.0.0
		 *
		 * @param array $search_handlers List of search handlers to use in the controller. Each search
		 *                               handler instance must extend the `WP_REST_Search_Handler` class.
		 *                               Default is only a handler for posts.
		 * @Reference wp-includes\rest-api.php apply_filters( 'wp_rest_search_handlers', array( new WP_REST_Post_Search_Handler() ) )
	*/
	const WpRestSearchHandlers = "wp_rest_search_handlers";
	/**
			 * Filters the REST Server Class.
			 *
			 * This filter allows you to adjust the server class used by the API, using a
			 * different class to handle requests.
			 *
			 * @since 4.4.0
			 *
			 * @param string $class_name The name of the server class. Default 'WP_REST_Server'.
			 * @Reference wp-includes\rest-api.php apply_filters( 'wp_rest_server_class', 'WP_REST_Server' )
	*/
	const WpRestServerClass = "wp_rest_server_class";
	/**
		 * Filters the number of revisions to save for the given post.
		 *
		 * Overrides the value of WP_POST_REVISIONS.
		 *
		 * @since 3.6.0
		 *
		 * @param int     $num  Number of revisions to store.
		 * @param WP_Post $post Post object.
		 * @Reference wp-includes\revision.php apply_filters( 'wp_revisions_to_keep', $num, $post )
	*/
	const WpRevisionsToKeep = "wp_revisions_to_keep";
	/**
			 * Filters the redirect fallback URL for when the provided redirect is not safe (local).
			 *
			 * @since 4.3.0
			 *
			 * @param string $fallback_url The fallback URL to use by default.
			 * @param int    $status       The HTTP response status code to use.
			 * @Reference wp-includes\pluggable.php apply_filters( 'wp_safe_redirect_fallback', admin_url(), $status )
	*/
	const WpSafeRedirectFallback = "wp_safe_redirect_fallback";
	/**
			 * Filters whether to skip saving the image file.
			 *
			 * Returning a non-null value will short-circuit the save method,
			 * returning that value instead.
			 *
			 * @since 3.5.0
			 *
			 * @param mixed           $override  Value to return instead of saving. Default null.
			 * @param string          $filename  Name of the file to be saved.
			 * @param WP_Image_Editor $image     WP_Image_Editor instance.
			 * @param string          $mime_type Image mime type.
			 * @param int             $post_id   Post ID.
			 * @Reference wp-admin\includes\image-edit.php apply_filters( 'wp_save_image_editor_file', null, $filename, $image, $mime_type, $post_id )
	*/
	const WpSaveImageEditorFile = "wp_save_image_editor_file";
	/**
			 * Filters whether to skip saving the image file.
			 *
			 * Returning a non-null value will short-circuit the save method,
			 * returning that value instead.
			 *
			 * @since 2.9.0
			 * @deprecated 3.5.0 Use wp_save_image_editor_file instead.
			 *
			 * @param mixed           $override  Value to return instead of saving. Default null.
			 * @param string          $filename  Name of the file to be saved.
			 * @param WP_Image_Editor $image     WP_Image_Editor instance.
			 * @param string          $mime_type Image mime type.
			 * @param int             $post_id   Post ID.
			 * @Reference wp-admin\includes\image-edit.php apply_filters( 'wp_save_image_file', null, $filename, $image, $mime_type, $post_id )
	*/
	const WpSaveImageFile = "wp_save_image_file";
	/**
			 * Filters whether the post has changed since the last revision.
			 *
			 * By default a revision is saved only if one of the revisioned fields has changed.
			 * This filter can override that so a revision is saved even if nothing has changed.
			 *
			 * @since 3.6.0
			 *
			 * @param bool    $check_for_changes Whether to check for changes before saving a new revision.
			 *                                   Default true.
			 * @param WP_Post $last_revision     The last revision post object.
			 * @param WP_Post $post              The post object.
			 * @Reference wp-includes\revision.php apply_filters( 'wp_save_post_revision_check_for_changes', true, $last_revision, $post )
	*/
	const WpSavePostRevisionCheckForChanges = "wp_save_post_revision_check_for_changes";
	/**
				 * Filters whether a post has changed.
				 *
				 * By default a revision is saved only if one of the revisioned fields has changed.
				 * This filter allows for additional checks to determine if there were changes.
				 *
				 * @since 4.1.0
				 *
				 * @param bool    $post_has_changed Whether the post has changed.
				 * @param WP_Post $last_revision    The last revision post object.
				 * @param WP_Post $post             The post object.
				 * @Reference wp-includes\revision.php apply_filters( 'wp_save_post_revision_post_has_changed', $post_has_changed, $last_revision, $post )
	*/
	const WpSavePostRevisionPostHasChanged = "wp_save_post_revision_post_has_changed";
	/**
			 * Filters stopwords used when parsing search terms.
			 *
			 * @since 3.7.0
			 *
			 * @param string[] $stopwords Array of stopwords.
			 * @Reference wp-includes\class-wp-query.php apply_filters( 'wp_search_stopwords', $stopwords )
	*/
	const WpSearchStopwords = "wp_search_stopwords";
	/**
		 * Filters a navigation menu item object.
		 *
		 * @since 3.0.0
		 *
		 * @param object $menu_item The menu item object.
		 * @Reference wp-includes\nav-menu.php apply_filters( 'wp_setup_nav_menu_item', $menu_item )
	* @Reference wp-includes\customize\class-wp-customize-nav-menu-item-setting.php apply_filters( 'wp_setup_nav_menu_item', $post )
	*/
	const WpSetupNavMenuItem = "wp_setup_nav_menu_item";
	/**
			 * Filters whether a given thrown error should be handled by the fatal error handler.
			 *
			 * This filter is only fired if the error is not already configured to be handled by WordPress core. As such,
			 * it exclusively allows adding further rules for which errors should be handled, but not removing existing
			 * ones.
			 *
			 * @since 5.2.0
			 *
			 * @param bool  $should_handle_error Whether the error should be handled by the fatal error handler.
			 * @param array $error               Error information retrieved from error_get_last().
			 * @Reference wp-includes\class-wp-fatal-error-handler.php apply_filters( 'wp_should_handle_php_error', false, $error )
	*/
	const WpShouldHandlePhpError = "wp_should_handle_php_error";
	/**
		 * Filters if upgrade routines should be run on global tables.
		 *
		 * @param bool $should_upgrade Whether to run the upgrade routines on global tables.
		 * @Reference wp-admin\includes\upgrade.php apply_filters( 'wp_should_upgrade_global_tables', $should_upgrade )
	*/
	const WpShouldUpgradeGlobalTables = "wp_should_upgrade_global_tables";
	/**
			 * Filters the list of hosts which should have Signature Verification attempteds on.
			 *
			 * @since 5.2.0
			 *
			 * @param array List of hostnames.
			 * @Reference wp-admin\includes\file.php apply_filters( 'wp_signature_hosts', array( 'wordpress.org', 'downloads.wordpress.org', 's.w.org' ) )
	*/
	const WpSignatureHosts = "wp_signature_hosts";
	/**
				 * Filters whether Signature Verification failures should be allowed to soft fail.
				 *
				 * WARNING: This may be removed from a future release.
				 *
				 * @since 5.2.0
				 *
				 * @param bool   $signature_softfail If a softfail is allowed.
				 * @param string $url                The url being accessed.
				 * @Reference wp-admin\includes\file.php apply_filters( 'wp_signature_softfail', true, $url )
	*/
	const WpSignatureSoftfail = "wp_signature_softfail";
	/**
				 * Filter the URL where the signature for a file is located.
				 *
				 * @since 5.2.0
				 *
				 * @param false|string $signature_url The URL where signatures can be found for a file, or false if none are known.
				 * @param string $url                 The URL being verified.
				 * @Reference wp-admin\includes\file.php apply_filters( 'wp_signature_url', $signature_url, $url )
	*/
	const WpSignatureUrl = "wp_signature_url";
	/**
				 * Filters the Multisite sign up URL.
				 *
				 * @since 3.0.0
				 *
				 * @param string $sign_up_url The sign up URL.
				 * @Reference wp-login.php apply_filters( 'wp_signup_location', network_site_url( 'wp-signup.php' ) )
	* @Reference wp-admin\my-sites.php apply_filters( 'wp_signup_location', network_site_url( 'wp-signup.php' ) )
	* @Reference wp-includes\canonical.php apply_filters( 'wp_signup_location', network_site_url( 'wp-signup.php' ) )
	*/
	const WpSignupLocation = "wp_signup_location";
	/**
			 * Filters the regexp for common whitespace characters.
			 *
			 * This string is substituted for the \s sequence as needed in regular
			 * expressions. For websites not written in English, different characters
			 * may represent whitespace. For websites not encoded in UTF-8, the 0xC2 0xA0
			 * sequence may not be in use.
			 *
			 * @since 4.0.0
			 *
			 * @param string $spaces Regexp pattern for matching common whitespace characters.
			 * @Reference wp-includes\formatting.php apply_filters( 'wp_spaces_regexp', '[\r\n\t ]|\xC2\xA0|&nbsp;' )
	*/
	const WpSpacesRegexp = "wp_spaces_regexp";
	/**
				 * Filters a fragment from the pattern passed to wp_sprintf().
				 *
				 * If the fragment is unchanged, then sprintf() will be run on the fragment.
				 *
				 * @since 2.5.0
				 *
				 * @param string $fragment A fragment from the pattern.
				 * @param string $arg      The argument.
				 * @Reference wp-includes\formatting.php apply_filters( 'wp_sprintf', $fragment, $arg )
	*/
	const WpSprintf = "wp_sprintf";
	/**
		 * Filters the translated delimiters used by wp_sprintf_l().
		 * Placeholders (%s) are included to assist translators and then
		 * removed before the array of strings reaches the filter.
		 *
		 * Please note: Ampersands and entities should be avoided here.
		 *
		 * @since 2.5.0
		 *
		 * @param array $delimiters An array of translated delimiters.
		 * @Reference wp-includes\formatting.php apply_filters(		'wp_sprintf_l',		array('between'          => sprintf( __( '%1$s, %2$s' ), '', '' ),'between_last_two' => sprintf( __( '%1$s, and %2$s' ), '', '' ),'between_only_two' => sprintf( __( '%1$s and %2$s' ), '', '' ),		)	)
	*/
	const WpSprintfL = "wp_sprintf_l";
	/**
		 * Filters the tag cloud output.
		 *
		 * @since 2.3.0
		 *
		 * @param string $return HTML output of the tag cloud.
		 * @param array  $args   An array of tag cloud arguments.
		 * @Reference wp-includes\category-template.php apply_filters( 'wp_tag_cloud', $return, $args )
	*/
	const WpTagCloud = "wp_tag_cloud";
	/**
		 * Filters the rel values that are added to links with `target` attribute.
		 *
		 * @since 5.1.0
		 *
		 * @param string $rel       The rel values.
		 * @param string $link_html The matched content of the link tag including all HTML attributes.
		 * @Reference wp-includes\formatting.php apply_filters( 'wp_targeted_link_rel', 'noopener noreferrer', $link_html )
	*/
	const WpTargetedLinkRel = "wp_targeted_link_rel";
	/**
		 * Filters the taxonomy terms checklist arguments.
		 *
		 * @since 3.4.0
		 *
		 * @see wp_terms_checklist()
		 *
		 * @param array $args    An array of arguments.
		 * @param int   $post_id The post ID.
		 * @Reference wp-admin\includes\template.php apply_filters( 'wp_terms_checklist_args', $args, $post_id )
	*/
	const WpTermsChecklistArgs = "wp_terms_checklist_args";
	/**
		 * Filters the list of file types allowed for editing in the Theme editor.
		 *
		 * @since 4.4.0
		 *
		 * @param string[] $default_types List of allowed file types.
		 * @param WP_Theme $theme         The current Theme object.
		 * @Reference wp-admin\includes\file.php apply_filters( 'wp_theme_editor_filetypes', $default_types, $theme )
	*/
	const WpThemeEditorFiletypes = "wp_theme_editor_filetypes";
	/**
		 * Filters the text of the page title.
		 *
		 * @since 2.0.0
		 *
		 * @param string $title       Page title.
		 * @param string $sep         Title separator.
		 * @param string $seplocation Location of the separator ('left' or 'right').
		 * @Reference wp-includes\general-template.php apply_filters( 'wp_title', $title, $sep, $seplocation )
	*/
	const WpTitle = "wp_title";
	/**
		 * Filters the parts of the page title.
		 *
		 * @since 4.0.0
		 *
		 * @param array $title_array Parts of the page title.
		 * @Reference wp-includes\general-template.php apply_filters( 'wp_title_parts', explode( $t_sep, $title ) )
	*/
	const WpTitleParts = "wp_title_parts";
	/**
		 * Filters the blog title for display of the feed title.
		 *
		 * @since 2.2.0
		 * @since 4.4.0 The `$sep` parameter was deprecated and renamed to `$deprecated`.
		 *
		 * @see get_wp_title_rss()
		 *
		 * @param string $wp_title_rss The current blog title.
		 * @param string $deprecated   Unused.
		 * @Reference wp-includes\feed.php apply_filters( 'wp_title_rss', get_wp_title_rss(), $deprecated )
	*/
	const WpTitleRss = "wp_title_rss";
	/**
		 * Filters the trimmed excerpt string.
		 *
		 * @since 2.8.0
		 *
		 * @param string $text        The trimmed text.
		 * @param string $raw_excerpt The text prior to trimming.
		 * @Reference wp-includes\formatting.php apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt )
	*/
	const WpTrimExcerpt = "wp_trim_excerpt";
	/**
		 * Filters the text content after words have been trimmed.
		 *
		 * @since 3.3.0
		 *
		 * @param string $text          The trimmed text.
		 * @param int    $num_words     The number of words to trim the text to. Default 55.
		 * @param string $more          An optional string to append to the end of the trimmed text, e.g. &hellip;.
		 * @param string $original_text The text before it was trimmed.
		 * @Reference wp-includes\formatting.php apply_filters( 'wp_trim_words', $text, $num_words, $more, $original_text )
	*/
	const WpTrimWords = "wp_trim_words";
	/**
		 * Filter the valid Signing keys used to verify the contents of files.
		 *
		 * @since 5.2.0
		 *
		 * @param array $trusted_keys The trusted keys that may sign packages.
		 * @Reference wp-admin\includes\file.php apply_filters( 'wp_trusted_keys', $trusted_keys )
	*/
	const WpTrustedKeys = "wp_trusted_keys";
	/**
				 * Filters the result when generating a unique file name.
				 *
				 * @since 4.5.0
				 *
				 * @param string        $filename                 Unique file name.
				 * @param string        $ext                      File extension, eg. ".png".
				 * @param string        $dir                      Directory path.
				 * @param callable|null $unique_filename_callback Callback function that generates the unique file name.
				 * @Reference wp-includes\functions.php apply_filters( 'wp_unique_filename', $filename2, $ext, $dir, $unique_filename_callback )
	* @Reference wp-includes\functions.php apply_filters( 'wp_unique_filename', $filename, $ext, $dir, $unique_filename_callback )
	*/
	const WpUniqueFilename = "wp_unique_filename";
	/**
		 * Filters the unique post slug.
		 *
		 * @since 3.3.0
		 *
		 * @param string $slug          The post slug.
		 * @param int    $post_ID       Post ID.
		 * @param string $post_status   The post status.
		 * @param string $post_type     Post type.
		 * @param int    $post_parent   Post parent ID
		 * @param string $original_slug The original post slug.
		 * @Reference wp-includes\post.php apply_filters( 'wp_unique_post_slug', $slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug )
	*/
	const WpUniquePostSlug = "wp_unique_post_slug";
	/**
			 * Filters whether the post slug would make a bad attachment slug.
			 *
			 * @since 3.1.0
			 *
			 * @param bool   $bad_slug Whether the slug would be bad as an attachment slug.
			 * @param string $slug     The post slug.
			 * @Reference wp-includes\post.php apply_filters( 'wp_unique_post_slug_is_bad_attachment_slug', false, $slug )
	*/
	const WpUniquePostSlugIsBadAttachmentSlug = "wp_unique_post_slug_is_bad_attachment_slug";
	/**
			 * Filters whether the post slug would be bad as a flat slug.
			 *
			 * @since 3.1.0
			 *
			 * @param bool   $bad_slug  Whether the post slug would be bad as a flat slug.
			 * @param string $slug      The post slug.
			 * @param string $post_type Post type.
			 * @Reference wp-includes\post.php apply_filters( 'wp_unique_post_slug_is_bad_flat_slug', false, $slug, $post_type )
	*/
	const WpUniquePostSlugIsBadFlatSlug = "wp_unique_post_slug_is_bad_flat_slug";
	/**
			 * Filters whether the post slug would make a bad hierarchical post slug.
			 *
			 * @since 3.1.0
			 *
			 * @param bool   $bad_slug    Whether the post slug would be bad in a hierarchical post context.
			 * @param string $slug        The post slug.
			 * @param string $post_type   Post type.
			 * @param int    $post_parent Post parent ID.
			 * @Reference wp-includes\post.php apply_filters( 'wp_unique_post_slug_is_bad_hierarchical_slug', false, $slug, $post_type, $post_parent )
	*/
	const WpUniquePostSlugIsBadHierarchicalSlug = "wp_unique_post_slug_is_bad_hierarchical_slug";
	/**
		 * Filters the unique term slug.
		 *
		 * @since 4.3.0
		 *
		 * @param string $slug          Unique term slug.
		 * @param object $term          Term object.
		 * @param string $original_slug Slug originally passed to the function for testing.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_unique_term_slug', $slug, $term, $original_slug )
	*/
	const WpUniqueTermSlug = "wp_unique_term_slug";
	/**
		 * Filters whether the proposed unique term slug is bad.
		 *
		 * @since 4.3.0
		 *
		 * @param bool   $needs_suffix Whether the slug needs to be made unique with a suffix.
		 * @param string $slug         The slug.
		 * @param object $term         Term object.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_unique_term_slug_is_bad_slug', $needs_suffix, $slug, $term )
	*/
	const WpUniqueTermSlugIsBadSlug = "wp_unique_term_slug_is_bad_slug";
	/**
		 * Filters the updated attachment meta data.
		 *
		 * @since 2.1.0
		 *
		 * @param array $data          Array of updated attachment meta data.
		 * @param int   $attachment_id Attachment post ID.
		 * @Reference wp-includes\post.php apply_filters( 'wp_update_attachment_metadata', $data, $post->ID )
	*/
	const WpUpdateAttachmentMetadata = "wp_update_attachment_metadata";
	/**
		 * Filters the comment data immediately before it is updated in the database.
		 *
		 * Note: data being passed to the filter is already unslashed.
		 *
		 * @since 4.7.0
		 *
		 * @param array $data       The new, processed comment data.
		 * @param array $comment    The old, unslashed comment data.
		 * @param array $commentarr The new, raw comment data.
		 * @Reference wp-includes\comment.php apply_filters( 'wp_update_comment_data', $data, $comment, $commentarr )
	*/
	const WpUpdateCommentData = "wp_update_comment_data";
	/**
		 * Filters the URL to learn more about updating the PHP version the site is running on.
		 *
		 * Providing an empty string is not allowed and will result in the default URL being used. Furthermore
		 * the page the URL links to should preferably be localized in the site language.
		 *
		 * @since 5.1.0
		 *
		 * @param string $update_url URL to learn more about updating PHP.
		 * @Reference wp-includes\functions.php apply_filters( 'wp_update_php_url', $update_url )
	*/
	const WpUpdatePhpUrl = "wp_update_php_url";
	/**
		 * Filters term data before it is updated in the database.
		 *
		 * @since 4.7.0
		 *
		 * @param array  $data     Term data to be updated.
		 * @param int    $term_id  Term ID.
		 * @param string $taxonomy Taxonomy slug.
		 * @param array  $args     Arguments passed to wp_update_term().
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_update_term_data', $data, $term_id, $taxonomy, $args )
	*/
	const WpUpdateTermData = "wp_update_term_data";
	/**
		 * Filters the term parent.
		 *
		 * Hook to this filter to see if it will cause a hierarchy loop.
		 *
		 * @since 3.1.0
		 *
		 * @param int    $parent      ID of the parent term.
		 * @param int    $term_id     Term ID.
		 * @param string $taxonomy    Taxonomy slug.
		 * @param array  $parsed_args An array of potentially altered update arguments for the given term.
		 * @param array  $args        An array of update arguments for the given term.
		 * @Reference wp-includes\taxonomy.php apply_filters( 'wp_update_term_parent', $args['parent'], $term_id, $taxonomy, $parsed_args, $args )
	*/
	const WpUpdateTermParent = "wp_update_term_parent";
	/**
		 * Filters whether to treat the upload bits as an error.
		 *
		 * Passing a non-array to the filter will effectively short-circuit preparing
		 * the upload bits, returning that value instead.
		 *
		 * @since 3.0.0
		 *
		 * @param mixed $upload_bits_error An array of upload bits data, or a non-array error to return.
		 * @Reference wp-includes\functions.php apply_filters(		'wp_upload_bits',		array(			'name' => $name,			'bits' => $bits,			'time' => $time,		)	)
	*/
	const WpUploadBits = "wp_upload_bits";
	/**
			 * Filters the list of widgets to load for the User Admin dashboard.
			 *
			 * @since 3.1.0
			 *
			 * @param string[] $dashboard_widgets An array of dashboard widget IDs.
			 * @Reference wp-admin\includes\dashboard.php apply_filters( 'wp_user_dashboard_widgets', array() )
	*/
	const WpUserDashboardWidgets = "wp_user_dashboard_widgets";
	/**
		 * Filters whether the current request should use themes.
		 *
		 * @since 5.1.0
		 *
		 * @param bool $wp_using_themes Whether the current request should use themes.
		 * @Reference wp-includes\load.php apply_filters( 'wp_using_themes', defined( 'WP_USE_THEMES' ) && WP_USE_THEMES )
	*/
	const WpUsingThemes = "wp_using_themes";
	/**
	* @Reference wp-includes\embed.php apply_filters( 'wp_video_embed_handler', 'wp_embed_handler_video' )
	*/
	const WpVideoEmbedHandler = "wp_video_embed_handler";
	/**
		 * Filters the list of supported video formats.
		 *
		 * @since 3.6.0
		 *
		 * @param array $extensions An array of supported video formats. Defaults are
		 *                          'mp4', 'm4v', 'webm', 'ogv', 'flv'.
		 * @Reference wp-includes\media.php apply_filters( 'wp_video_extensions', array( 'mp4', 'm4v', 'webm', 'ogv', 'flv' ) )
	*/
	const WpVideoExtensions = "wp_video_extensions";
	/**
		 * Filters the output of the video shortcode.
		 *
		 * @since 3.6.0
		 *
		 * @param string $output  Video shortcode HTML output.
		 * @param array  $atts    Array of video shortcode attributes.
		 * @param string $video   Video file.
		 * @param int    $post_id Post ID.
		 * @param string $library Media library used for the video shortcode.
		 * @Reference wp-includes\media.php apply_filters( 'wp_video_shortcode', $output, $atts, $video, $post_id, $library )
	*/
	const WpVideoShortcode = "wp_video_shortcode";
	/**
		 * Filters the class attribute for the video shortcode output container.
		 *
		 * @since 3.6.0
		 * @since 4.9.0 The `$atts` parameter was added.
		 *
		 * @param string $class CSS class or list of space-separated classes.
		 * @param array  $atts  Array of video shortcode attributes.
		 * @Reference wp-includes\media.php apply_filters( 'wp_video_shortcode_class', $atts['class'], $atts )
	*/
	const WpVideoShortcodeClass = "wp_video_shortcode_class";
	/**
		 * Filters the media library used for the video shortcode.
		 *
		 * @since 3.6.0
		 *
		 * @param string $library Media library used for the video shortcode.
		 * @Reference wp-includes\media.php apply_filters( 'wp_video_shortcode_library', 'mediaelement' )
	* @Reference wp-includes\widgets\class-wp-widget-media-video.php apply_filters( 'wp_video_shortcode_library', 'mediaelement' )
	*/
	const WpVideoShortcodeLibrary = "wp_video_shortcode_library";
	/**
		 * Filters the default video shortcode output.
		 *
		 * If the filtered output isn't empty, it will be used instead of generating
		 * the default video template.
		 *
		 * @since 3.6.0
		 *
		 * @see wp_video_shortcode()
		 *
		 * @param string $html     Empty variable to be replaced with shortcode markup.
		 * @param array  $attr     Attributes of the shortcode. @see wp_video_shortcode()
		 * @param string $content  Video shortcode content.
		 * @param int    $instance Unique numeric ID of this video shortcode instance.
		 * @Reference wp-includes\media.php apply_filters( 'wp_video_shortcode_override', '', $attr, $content, $instance )
	*/
	const WpVideoShortcodeOverride = "wp_video_shortcode_override";
	/**
	 * Filters the class used for handling XML-RPC requests.
	 *
	 * @since 3.1.0
	 *
	 * @param string $class The name of the XML-RPC server class.
	 * @Reference xmlrpc.php apply_filters( 'wp_xmlrpc_server_class', 'wp_xmlrpc_server' )
	*/
	const WpXmlrpcServerClass = "wp_xmlrpc_server_class";
	/**
	* @Reference wp-includes\plugin.php apply_filters( 'wpdocs_filter', $value, $extra_arg )
	* @Reference wp-includes\plugin.php apply_filters( 'wpdocs_filter', array( $value, $extra_arg ), '4.9', 'wpdocs_new_filter' )
	*/
	const WpdocsFilter = "wpdocs_filter";
	/**
	 * Filters the type of site sign-up.
	 *
	 * @since 3.0.0
	 *
	 * @param string $active_signup String that returns registration type. The value can be
	 *                              'all', 'none', 'blog', or 'user'.
	 * @Reference wp-signup.php apply_filters( 'wpmu_active_signup', $active_signup )
	*/
	const WpmuActiveSignup = "wpmu_active_signup";
	/**
			 * Filters the displayed site columns in Sites list table.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string[] $sites_columns An array of displayed site columns. Default 'cb',
			 *                               'blogname', 'lastupdated', 'registered', 'users'.
			 * @Reference wp-admin\includes\class-wp-ms-sites-list-table.php apply_filters( 'wpmu_blogs_columns', $sites_columns )
	*/
	const WpmuBlogsColumns = "wpmu_blogs_columns";
	/**
		 * Filters the upload base directory to delete when the site is deleted.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $uploads['basedir'] Uploads path without subdirectory. @see wp_upload_dir()
		 * @param int    $site_id            The site ID.
		 * @Reference wp-includes\ms-site.php apply_filters( 'wpmu_delete_blog_upload_dir', $uploads['basedir'], $site->id )
	*/
	const WpmuDeleteBlogUploadDir = "wpmu_delete_blog_upload_dir";
	/**
		 * Filters the tables to drop when the site is deleted.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string[] $tables  Array of names of the site tables to be dropped.
		 * @param int      $site_id The ID of the site to drop tables for.
		 * @Reference wp-includes\ms-site.php apply_filters( 'wpmu_drop_tables', $tables, $site->id )
	*/
	const WpmuDropTables = "wpmu_drop_tables";
	/**
		 * Filters whether to bypass the new site email notification.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string|bool $domain     Site domain.
		 * @param string      $path       Site path.
		 * @param string      $title      Site title.
		 * @param string      $user_login User login name.
		 * @param string      $user_email User email address.
		 * @param string      $key        Activation key created in wpmu_signup_blog().
		 * @param array       $meta       Signup meta data. By default, contains the requested privacy setting and lang_id.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'wpmu_signup_blog_notification', $domain, $path, $title, $user_login, $user_email, $key, $meta )
	*/
	const WpmuSignupBlogNotification = "wpmu_signup_blog_notification";
	/**
			 * Filters the message content of the new blog notification email.
			 *
			 * Content should be formatted for transmission via wp_mail().
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string $content    Content of the notification email.
			 * @param string $domain     Site domain.
			 * @param string $path       Site path.
			 * @param string $title      Site title.
			 * @param string $user_login User login name.
			 * @param string $user_email User email address.
			 * @param string $key        Activation key created in wpmu_signup_blog().
			 * @param array  $meta       Signup meta data. By default, contains the requested privacy setting and lang_id.
			 * @Reference wp-includes\ms-functions.php apply_filters(			'wpmu_signup_blog_notification_email',__( "To activate your blog, please click the following link:\n\n%1\$s\n\nAfter you activate, you will receive *another email* with your login.\n\nAfter you activate, you can visit your site here:\n\n%2\$s" ),			$domain,			$path,			$title,			$user_login,			$user_email,			$key,			$meta		)
	*/
	const WpmuSignupBlogNotificationEmail = "wpmu_signup_blog_notification_email";
	/**
			 * Filters the subject of the new blog notification email.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string $subject    Subject of the notification email.
			 * @param string $domain     Site domain.
			 * @param string $path       Site path.
			 * @param string $title      Site title.
			 * @param string $user_login User login name.
			 * @param string $user_email User email address.
			 * @param string $key        Activation key created in wpmu_signup_blog().
			 * @param array  $meta       Signup meta data. By default, contains the requested privacy setting and lang_id.
			 * @Reference wp-includes\ms-functions.php apply_filters(			'wpmu_signup_blog_notification_subject',_x( '[%1$s] Activate %2$s', 'New site notification email subject' ),			$domain,			$path,			$title,			$user_login,			$user_email,			$key,			$meta		)
	*/
	const WpmuSignupBlogNotificationSubject = "wpmu_signup_blog_notification_subject";
	/**
		 * Filters whether to bypass the email notification for new user sign-up.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $user_login User login name.
		 * @param string $user_email User email address.
		 * @param string $key        Activation key created in wpmu_signup_user().
		 * @param array  $meta       Signup meta data. Default empty array.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'wpmu_signup_user_notification', $user_login, $user_email, $key, $meta )
	*/
	const WpmuSignupUserNotification = "wpmu_signup_user_notification";
	/**
			 * Filters the content of the notification email for new user sign-up.
			 *
			 * Content should be formatted for transmission via wp_mail().
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string $content    Content of the notification email.
			 * @param string $user_login User login name.
			 * @param string $user_email User email address.
			 * @param string $key        Activation key created in wpmu_signup_user().
			 * @param array  $meta       Signup meta data. Default empty array.
			 * @Reference wp-includes\ms-functions.php apply_filters(			'wpmu_signup_user_notification_email',__( "To activate your user, please click the following link:\n\n%s\n\nAfter you activate, you will receive *another email* with your login." ),			$user_login,			$user_email,			$key,			$meta		)
	*/
	const WpmuSignupUserNotificationEmail = "wpmu_signup_user_notification_email";
	/**
			 * Filters the subject of the notification email of new user signup.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string $subject    Subject of the notification email.
			 * @param string $user_login User login name.
			 * @param string $user_email User email address.
			 * @param string $key        Activation key created in wpmu_signup_user().
			 * @param array  $meta       Signup meta data. Default empty array.
			 * @Reference wp-includes\ms-functions.php apply_filters(			'wpmu_signup_user_notification_subject',_x( '[%1$s] Activate %2$s', 'New user notification email subject' ),			$user_login,			$user_email,			$key,			$meta		)
	*/
	const WpmuSignupUserNotificationSubject = "wpmu_signup_user_notification_subject";
	/**
			 * Filters the columns displayed in the Network Admin Users list table.
			 *
			 * @since MU (3.0.0)
			 *
			 * @param string[] $users_columns An array of user columns. Default 'cb', 'username',
			 *                                'name', 'email', 'registered', 'blogs'.
			 * @Reference wp-admin\includes\class-wp-ms-users-list-table.php apply_filters( 'wpmu_users_columns', $users_columns )
	*/
	const WpmuUsersColumns = "wpmu_users_columns";
	/**
		 * Filters site details and error messages following registration.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param array $result {
		 *     Array of domain, path, blog name, blog title, user and error messages.
		 *
		 *     @type string         $domain     Domain for the site.
		 *     @type string         $path       Path for the site. Used in subdirectory installations.
		 *     @type string         $blogname   The unique site name (slug).
		 *     @type string         $blog_title Blog title.
		 *     @type string|WP_User $user       By default, an empty string. A user object if provided.
		 *     @type WP_Error       $errors     WP_Error containing any errors found.
		 * }
		 * @Reference wp-includes\ms-functions.php apply_filters( 'wpmu_validate_blog_signup', $result )
	*/
	const WpmuValidateBlogSignup = "wpmu_validate_blog_signup";
	/**
		 * Filters the validated user registration details.
		 *
		 * This does not allow you to override the username or email of the user during
		 * registration. The values are solely used for validation and error handling.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param array $result {
		 *     The array of user name, email and the error messages.
		 *
		 *     @type string   $user_name     Sanitized and unique username.
		 *     @type string   $orig_username Original username.
		 *     @type string   $user_email    User email address.
		 *     @type WP_Error $errors        WP_Error object containing any errors found.
		 * }
		 * @Reference wp-includes\ms-functions.php apply_filters( 'wpmu_validate_user_signup', $result )
	*/
	const WpmuValidateUserSignup = "wpmu_validate_user_signup";
	/**
		 * Filters whether to bypass the welcome email after site activation.
		 *
		 * Returning false disables the welcome email.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int|bool $blog_id  Blog ID.
		 * @param int      $user_id  User ID.
		 * @param string   $password User password.
		 * @param string   $title    Site title.
		 * @param array    $meta     Signup meta data. By default, contains the requested privacy setting and lang_id.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'wpmu_welcome_notification', $blog_id, $user_id, $password, $title, $meta )
	*/
	const WpmuWelcomeNotification = "wpmu_welcome_notification";
	/**
		 * Filters whether to bypass the welcome email after user activation.
		 *
		 * Returning false disables the welcome email.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param int    $user_id  User ID.
		 * @param string $password User password.
		 * @param array  $meta     Signup meta data. Default empty array.
		 * @Reference wp-includes\ms-functions.php apply_filters( 'wpmu_welcome_user_notification', $user_id, $password, $meta )
	*/
	const WpmuWelcomeUserNotification = "wpmu_welcome_user_notification";
	/**
	 * Filters the body placeholder text.
	 *
	 * @since 5.0.0
	 *
	 * @param string  $text Placeholder text. Default 'Start writing or type / to choose a block'.
	 * @param WP_Post $post Post object.
	 * @Reference wp-admin\edit-form-blocks.php apply_filters( 'write_your_story', __( 'Start writing or type / to choose a block' ), $post )
	*/
	const WriteYourStory = "write_your_story";
	/**
							 * Filters whether to selectively skip comment meta used for WXR exports.
							 *
							 * Returning a truthy value to the filter will skip the current meta
							 * object from being exported.
							 *
							 * @since 4.0.0
							 *
							 * @param bool   $skip     Whether to skip the current comment meta. Default false.
							 * @param string $meta_key Current meta key.
							 * @param object $meta     Current meta object.
							 * @Reference wp-admin\includes\export.php apply_filters( 'wxr_export_skip_commentmeta', false, $meta->meta_key, $meta )
	*/
	const WxrExportSkipCommentmeta = "wxr_export_skip_commentmeta";
	/**
						 * Filters whether to selectively skip post meta used for WXR exports.
						 *
						 * Returning a truthy value to the filter will skip the current meta
						 * object from being exported.
						 *
						 * @since 3.3.0
						 *
						 * @param bool   $skip     Whether to skip the current post meta. Default false.
						 * @param string $meta_key Current meta key.
						 * @param object $meta     Current meta object.
						 * @Reference wp-admin\includes\export.php apply_filters( 'wxr_export_skip_postmeta', false, $meta->meta_key, $meta )
	*/
	const WxrExportSkipPostmeta = "wxr_export_skip_postmeta";
	/**
				 * Filters whether to selectively skip term meta used for WXR exports.
				 *
				 * Returning a truthy value to the filter will skip the current meta
				 * object from being exported.
				 *
				 * @since 4.6.0
				 *
				 * @param bool   $skip     Whether to skip the current piece of term meta. Default false.
				 * @param string $meta_key Current meta key.
				 * @param object $meta     Current meta object.
				 * @Reference wp-admin\includes\export.php apply_filters( 'wxr_export_skip_termmeta', false, $meta->meta_key, $meta )
	*/
	const WxrExportSkipTermmeta = "wxr_export_skip_termmeta";
	/**
			 * Filters the X-Redirect-By header.
			 *
			 * Allows applications to identify themselves when they're doing a redirect.
			 *
			 * @since 5.1.0
			 *
			 * @param string $x_redirect_by The application doing the redirect.
			 * @param int    $status        Status code to use.
			 * @param string $location      The path to redirect to.
			 * @Reference wp-includes\pluggable.php apply_filters( 'x_redirect_by', $x_redirect_by, $status, $location )
	*/
	const XRedirectBy = "x_redirect_by";
	/**
			 * Filters whether to allow anonymous comments over XML-RPC.
			 *
			 * @since 2.7.0
			 *
			 * @param bool $allow Whether to allow anonymous commenting via XML-RPC.
			 *                    Default false.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_allow_anonymous_comments', false )
	*/
	const XmlrpcAllowAnonymousComments = "xmlrpc_allow_anonymous_comments";
	/**
			 * Filters the XML-RPC blog options property.
			 *
			 * @since 2.6.0
			 *
			 * @param array $blog_options An array of XML-RPC blog options.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_blog_options', $this->blog_options )
	*/
	const XmlrpcBlogOptions = "xmlrpc_blog_options";
	/**
			 * Filters the chunk size that can be used to parse an XML-RPC response message.
			 *
			 * @since 4.4.0
			 *
			 * @param int $chunk_size Chunk size to parse in bytes.
			 * @Reference wp-includes\IXR\class-IXR-message.php apply_filters( 'xmlrpc_chunk_parsing_size', $chunk_size )
	*/
	const XmlrpcChunkParsingSize = "xmlrpc_chunk_parsing_size";
	/**
				 * Filters the list of post query fields used by the given XML-RPC method.
				 *
				 * @since 3.4.0
				 *
				 * @param array  $fields Array of post fields. Default array contains 'post', 'terms', and 'custom_fields'.
				 * @param string $method Method name.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_post_fields', array( 'post', 'terms', 'custom_fields' ), 'wp.getPost' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_post_fields', array( 'post', 'terms', 'custom_fields' ), 'wp.getPosts' )
	*/
	const XmlrpcDefaultPostFields = "xmlrpc_default_post_fields";
	/**
				 * Filters the default query fields used by the given XML-RPC method.
				 *
				 * @since 3.4.0
				 *
				 * @param array  $fields An array of post type query fields for the given method.
				 * @param string $method The method name.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_posttype_fields', array( 'labels', 'cap', 'taxonomies' ), 'wp.getPostType' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_posttype_fields', array( 'labels', 'cap', 'taxonomies' ), 'wp.getPostTypes' )
	*/
	const XmlrpcDefaultPosttypeFields = "xmlrpc_default_posttype_fields";
	/**
				 * Filters the default revision query fields used by the given XML-RPC method.
				 *
				 * @since 3.5.0
				 *
				 * @param array  $field  An array of revision query fields.
				 * @param string $method The method name.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_revision_fields', array( 'post_date', 'post_date_gmt' ), 'wp.getRevisions' )
	*/
	const XmlrpcDefaultRevisionFields = "xmlrpc_default_revision_fields";
	/**
				 * Filters the taxonomy query fields used by the given XML-RPC method.
				 *
				 * @since 3.4.0
				 *
				 * @param array  $fields An array of taxonomy fields to retrieve.
				 * @param string $method The method name.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_taxonomy_fields', array( 'labels', 'cap', 'object_type' ), 'wp.getTaxonomy' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_taxonomy_fields', array( 'labels', 'cap', 'object_type' ), 'wp.getTaxonomies' )
	*/
	const XmlrpcDefaultTaxonomyFields = "xmlrpc_default_taxonomy_fields";
	/**
				 * Filters the default user query fields used by the given XML-RPC method.
				 *
				 * @since 3.5.0
				 *
				 * @param array  $fields User query fields for given method. Default 'all'.
				 * @param string $method The method name.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_user_fields', array( 'all' ), 'wp.getUser' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_user_fields', array( 'all' ), 'wp.getProfile' )
	* @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_default_user_fields', array( 'all' ), 'wp.getUsers' )
	*/
	const XmlrpcDefaultUserFields = "xmlrpc_default_user_fields";
	/**
				 * Filters the number of elements to parse in an XML-RPC response.
				 *
				 * @since 4.0.0
				 *
				 * @param int $element_limit Default elements limit.
				 * @Reference wp-includes\IXR\class-IXR-message.php apply_filters( 'xmlrpc_element_limit', $element_limit )
	* @Reference wp-includes\IXR\class-IXR-message.php apply_filters( 'xmlrpc_element_limit', $element_limit )
	*/
	const XmlrpcElementLimit = "xmlrpc_element_limit";
	/**
			 * Filters whether XML-RPC methods requiring authentication are enabled.
			 *
			 * Contrary to the way it's named, this filter does not control whether XML-RPC is *fully*
			 * enabled, rather, it only controls whether XML-RPC methods requiring authentication - such
			 * as for publishing purposes - are enabled.
			 *
			 * Further, the filter does not control whether pingbacks or other custom endpoints that don't
			 * require authentication are enabled. This behavior is expected, and due to how parity was matched
			 * with the `enable_xmlrpc` UI option the filter replaced when it was introduced in 3.5.
			 *
			 * To disable XML-RPC methods that require authentication, use:
			 *
			 *     add_filter( 'xmlrpc_enabled', '__return_false' );
			 *
			 * For more granular control over all XML-RPC methods and requests, see the {@see 'xmlrpc_methods'}
			 * and {@see 'xmlrpc_element_limit'} hooks.
			 *
			 * @since 3.5.0
			 *
			 * @param bool $enabled Whether XML-RPC is enabled. Default true.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_enabled', $enabled )
	*/
	const XmlrpcEnabled = "xmlrpc_enabled";
	/**
				 * Filters the XML-RPC user login error message.
				 *
				 * @since 3.5.0
				 *
				 * @param string   $error The XML-RPC error message.
				 * @param WP_Error $user  WP_Error object.
				 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_login_error', $this->error, $user )
	*/
	const XmlrpcLoginError = "xmlrpc_login_error";
	/**
			 * Filters the methods exposed by the XML-RPC server.
			 *
			 * This filter can be used to add new methods, and remove built-in methods.
			 *
			 * @since 1.5.0
			 *
			 * @param array $methods An array of XML-RPC methods.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_methods', $this->methods )
	*/
	const XmlrpcMethods = "xmlrpc_methods";
	/**
			 * Filters the XML-RPC pingback error return.
			 *
			 * @since 3.5.1
			 *
			 * @param IXR_Error $error An IXR_Error object containing the error code and message.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_pingback_error', new IXR_Error( $code, $message ) )
	*/
	const XmlrpcPingbackError = "xmlrpc_pingback_error";
	/**
			 * Filters XML-RPC-prepared data for the given comment.
			 *
			 * @since 3.4.0
			 *
			 * @param array      $_comment An array of prepared comment data.
			 * @param WP_Comment $comment  Comment object.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_comment', $_comment, $comment )
	*/
	const XmlrpcPrepareComment = "xmlrpc_prepare_comment";
	/**
			 * Filters XML-RPC-prepared data for the given media item.
			 *
			 * @since 3.4.0
			 *
			 * @param array  $_media_item    An array of media item data.
			 * @param object $media_item     Media item object.
			 * @param string $thumbnail_size Image size.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_media_item', $_media_item, $media_item, $thumbnail_size )
	*/
	const XmlrpcPrepareMediaItem = "xmlrpc_prepare_media_item";
	/**
			 * Filters XML-RPC-prepared data for the given page.
			 *
			 * @since 3.4.0
			 *
			 * @param array   $_page An array of page data.
			 * @param WP_Post $page  Page object.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_page', $_page, $page )
	*/
	const XmlrpcPreparePage = "xmlrpc_prepare_page";
	/**
			 * Filters XML-RPC-prepared date for the given post.
			 *
			 * @since 3.4.0
			 *
			 * @param array $_post  An array of modified post data.
			 * @param array $post   An array of post data.
			 * @param array $fields An array of post fields.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_post', $_post, $post, $fields )
	*/
	const XmlrpcPreparePost = "xmlrpc_prepare_post";
	/**
			 * Filters XML-RPC-prepared date for the given post type.
			 *
			 * @since 3.4.0
			 * @since 4.6.0 Converted the `$post_type` parameter to accept a WP_Post_Type object.
			 *
			 * @param array        $_post_type An array of post type data.
			 * @param WP_Post_Type $post_type  Post type object.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_post_type', $_post_type, $post_type )
	*/
	const XmlrpcPreparePostType = "xmlrpc_prepare_post_type";
	/**
			 * Filters XML-RPC-prepared data for the given taxonomy.
			 *
			 * @since 3.4.0
			 *
			 * @param array       $_taxonomy An array of taxonomy data.
			 * @param WP_Taxonomy $taxonomy  Taxonomy object.
			 * @param array       $fields    The subset of taxonomy fields to return.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_taxonomy', $_taxonomy, $taxonomy, $fields )
	*/
	const XmlrpcPrepareTaxonomy = "xmlrpc_prepare_taxonomy";
	/**
			 * Filters XML-RPC-prepared data for the given term.
			 *
			 * @since 3.4.0
			 *
			 * @param array        $_term An array of term data.
			 * @param array|object $term  Term object or array.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_term', $_term, $term )
	*/
	const XmlrpcPrepareTerm = "xmlrpc_prepare_term";
	/**
			 * Filters XML-RPC-prepared data for the given user.
			 *
			 * @since 3.5.0
			 *
			 * @param array   $_user  An array of user data.
			 * @param WP_User $user   User object.
			 * @param array   $fields An array of user fields.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_prepare_user', $_user, $user, $fields )
	*/
	const XmlrpcPrepareUser = "xmlrpc_prepare_user";
	/**
			 * Filters the MoveableType text filters list for XML-RPC.
			 *
			 * @since 2.2.0
			 *
			 * @param array $filters An array of text filters.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_text_filters', array() )
	*/
	const XmlrpcTextFilters = "xmlrpc_text_filters";
	/**
			 * Filters post data array to be inserted via XML-RPC.
			 *
			 * @since 3.4.0
			 *
			 * @param array $post_data      Parsed array of post data.
			 * @param array $content_struct Post data array.
			 * @Reference wp-includes\class-wp-xmlrpc-server.php apply_filters( 'xmlrpc_wp_insert_post_data', $post_data, $content_struct )
	*/
	const XmlrpcWpInsertPostData = "xmlrpc_wp_insert_post_data";
	/**
		 * Filters the year archive permalink.
		 *
		 * @since 1.5.0
		 *
		 * @param string $yearlink Permalink for the year archive.
		 * @param int    $year     Year for the archive.
		 * @Reference wp-includes\link-template.php apply_filters( 'year_link', $yearlink, $year )
	*/
	const YearLink = "year_link";
	}
}