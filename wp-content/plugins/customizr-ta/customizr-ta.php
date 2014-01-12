<?php

/*
Plugin Name: Customizr TA
Plugin URI: http://rookemeister.com/ta
Description: This plugin customises the WordPress admin for Training Aspirations
Version: 0.1
Author: Peter Rooke
Author URI: http://rookemeister.com/ta
License: GPLv2
*/

// Remove Comments menu item for all but Administrators
function ta_remove_comments_Menu_item() {
	$user = wp_get_current_user();
	if ( ! $user->has_cap( 'manage_options' ) ) {
		remove_menu_page( 'edit-comments.php' );
	}
}
add_action( 'admin_menu', 'ta_remove_comments_menu_item' );

?>