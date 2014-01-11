<?php

// Peter Rooke
//----------------------------------------------------------
// Add action and function to remove post navigation links
//----------------------------------------------------------
add_action ( 'wp_head', 'remove_single_post_nav_links');
function remove_single_post_nav_links() {
    // remove the navigation links for a single post and not for the list of posts
    if ( !is_single() )
        return;
    //this action is defined in the class-content-post_navigation.php file
    remove_action  ( '__after_loop' , array( TC_post_navigation::$instance , 'tc_post_nav' ), 20 );
}

// Peter Rooke
//----------------------------------------------------------
// Display Posts Shortcode plugin: add H3 to title
//----------------------------------------------------------
add_filter( 'display_posts_shortcode_output', 'format_dps_title', 10, 7 );
function format_dps_title( $output, $atts, $image, $title, $date, $excerpt, $inner_wrapper ) {

	// Make Title and H2
	$title = ' <h3>'. $title .'</h3>';

	// Now let's rebuild the output.
	$output = '<' . $inner_wrapper . ' class="listing-item">' . $image . $title . $date . $excerpt . '</' . $inner_wrapper . '>';

	// Finally we'll return the modified output
	return $output;
}

// Peter Rooke
//----------------------------------------------------------
// Add action and function to add WIP button to Admin bar
//----------------------------------------------------------
add_action('admin_bar_menu', 'wip_button', 95);
function wip_button($wp_admin_bar){
	$args = array(
		'id' => 'wip-button',
		'title' => 'Work In Progress',
		'href' => 'http://www.rookemeister.com/ta/?page_id=274',
		'meta' => array(
			'class' => 'custom-button-class'
		)
	);
	$wp_admin_bar->add_node($args);
}

// Peter Rooke
//----------------------------------------------------------
// Add action and function to default All Posts to Published
//----------------------------------------------------------
add_action( 'admin_menu', 'default_published_wpse_91299' );
function default_published_wpse_91299() 
{
    global $submenu;

    // POSTS
    foreach( $submenu['edit.php'] as $key => $value )
    {
        if( in_array( 'edit.php', $value ) )
        {
            $submenu['edit.php'][ $key ][2] = 'edit.php?post_status=publish&post_type=post';
        }
    }
}

?>