<?php
if (!defined('STUWPCUSTOMTYPELABELS')) {
	define('STUWPCUSTOMTYPELABELS',1);

	abstract class WpCustomtypeLabels {
		/**
		* General name for the post type, usually plural. The same and overridden
		* by `$post_type_object->label`. Default is 'Posts' / 'Pages'.
		*/
		const name = 'name';
		/**
		* Name for one object of this post type. Default is 'Post' / 'Page'.
		*/
		const singular_name = 'singular_name';
		/**
		* Label for the menu name. Default is the same as `name`.
		*/
		const menu_name = 'menu_name';
		/**
		* Default is 'Add New' for both hierarchical and non-hierarchical types.
		*/
		const add_new = 'add_new';
		/**
		* Label to signify all items in a submenu link. Default is 'All Posts' / 'All Pages'.
		*/
		const all_items = 'all_items';
		/**
		* Label for adding a new singular item. Default is 'Add New Post' / 'Add New Page'.
		*/
		const add_new_item = 'add_new_item';
		/**
		* Name for one object of this post type in admin bar. Default is 'Post' / 'Page'.
		*/
		const name_admin_bar = 'name_admin_bar';
		/**
		* Label for archives in nav menus. Default is 'Post Archives' / 'Page Archives'.
		*/
		const archives = 'archives';
		/**
		* Label for the attributes meta box. Default is 'Post Attributes' / 'Page Attributes'.
		*/
		const attributes = 'attributes';
		/**
		* Label used to prefix parents of hierarchical items. Not used on non-hierarchical
		* post types. Default is 'Parent Page:'.
		*/
		const parent_item_colon = 'parent_item_colon';
		/**
		* Label for the new item page title. Default is 'New Post' / 'New Page'.
		*/
		const new_item = 'new_item';
		/**
		* Label for editing a singular item. Default is 'Edit Post' / 'Edit Page'.
		*/
		const edit_item = 'edit_item';
		/**
		* Label for viewing a singular item. Default is 'View Post' / 'View Page'.
		*/
		const view_item = 'view_item';
		/**
		* Label for viewing post type archives. Default is 'View Posts' / 'View Pages'.
		*/
		const view_items = 'view_items';
		/**
		* Label for searching plural items. Default is 'Search Posts' / 'Search Pages'.
		*/
		const search_items = 'search_items';
		/**
		* Label used when no items are found. Default is 'No posts found' / 'No pages found'.
		*/
		const not_found = 'not_found';
		/**
		* Label used when no items are in the trash. Default is 'No posts found in Trash' / 
		*'No pages found in Trash'.
		*/
		const not_found_in_trash = 'not_found_in_trash';
		/**
		* Label for the Featured Image meta box title. Default is 'Featured Image'.
		*/
		const featured_image = 'featured_image';
		/**
		* Label for setting the featured image. Default is 'Set featured image'.
		*/
		const set_featured_image = 'set_featured_image';
		/**
		* Label for removing the featured image. Default is 'Remove featured image'.
		*/
		const remove_featured_image = 'remove_featured_image';
		/**
		* Label in the media frame for using a featured image. Default is 'Use as featured image'.
		*/
		const use_featured_image = 'use_featured_image';
		/**
		* Label for the media frame button. Default is 'Insert into post' / 'Insert into page'.
		*/
		const insert_into_item = 'insert_into_item';
		/**
		* Label for the media frame filter. Default is 'Uploaded to this post' /
		* 'Uploaded to this page'.
		*/
		const uploaded_to_this_item = 'uploaded_to_this_item';
		/**
		* Label for the table hidden heading. Default is 'Posts list' / 'Pages list'.
		*/
		const items_list = 'items_list';
		/**
		* Label for the table pagination hidden heading. Default is 'Posts list navigation' /
		* 'Pages list navigation'.
		*/
		const items_list_navigation = 'items_list_navigation';
		/**
		* Label for the table views hidden heading. Default is 'Filter posts list' /
		* 'Filter pages list'.
		*/
		const filter_items_list = 'filter_items_list';
		/**
		* Label used when an item is published. Default is 'Post published.' / 'Page published.'
		*/
		const item_published = 'item_published';
		/**
		* Label used when an item is published with private visibility.
		*Default is 'Post published privately.' / 'Page published privately.' 
		*/
		const item_published_privately = 'item_published_privately';
		/**
		* Label used when an item is switched to a draft.
		* Default is 'Post reverted to draft.' / 'Page reverted to draft.'
		*/
		const item_reverted_to_draft = 'item_reverted_to_draft';
		/**
		* Label used when an item is scheduled for publishing. Default is 'Post scheduled.' /
		* 'Page scheduled.'
		*/
		const item_scheduled = 'item_scheduled';
		/**
		* Label used when an item is updated. Default is 'Post updated.' / 'Page updated.'
		*/
		const item_updated = 'item_updated';
	}
}