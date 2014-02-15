<?php

// Peter Rooke
//----------------------------------------------------------
// Add action and function to remove post navigation links
//----------------------------------------------------------
add_action ( 'wp_head', 'ta_remove_single_post_nav_links');
function ta_remove_single_post_nav_links()
{
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
add_filter( 'display_posts_shortcode_output', 'ta_format_dps_title', 10, 7 );
function ta_format_dps_title( $output, $atts, $image, $title, $date, $excerpt, $inner_wrapper )
{

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
add_action('admin_bar_menu', 'ta_wip_button', 95);
function ta_wip_button($wp_admin_bar)
{
	$args = array(
		'id' => 'wip-button',
		'title' => 'Work In Progress',
		'href' => 'http://rookemeister.com/ta/wip',
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
add_action( 'admin_menu', 'ta_default_published' );
function ta_default_published() 
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

// Peter Rooke
//----------------------------------------------------------
// Add action and function to remove comments from admin bar
//----------------------------------------------------------
add_action( 'wp_before_admin_bar_render', 'ta_admin_bar_render' );
function ta_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

// Peter Rooke
//----------------------------------------------------------
// Add shortcode and function to display signup form
//----------------------------------------------------------
add_shortcode( 'ta_signup', 'ta_signup_shortcode' );
function ta_signup_shortcode()
{
global $wpdb;
$result = $wpdb->get_row( $wpdb->prepare("
	SELECT artist_name, venue_name, show_date, show_time 
	FROM wp_gigpress_shows, wp_gigpress_artists, wp_gigpress_venues
	WHERE show_id = %d 
	and wp_gigpress_shows.show_artist_id = wp_gigpress_artists.artist_id
	and wp_gigpress_shows.show_venue_id = wp_gigpress_venues.venue_id",
		$_GET['course']), ARRAY_A );
$chosen_course = $result['artist_name'] . " " . $result['venue_name'] . " " .  $result['show_date'] . " " .  $result['show_time'];
$form = do_shortcode('[pdb_signup]');
return $chosen_course . $form;
}

// Peter Rooke
//----------------------------------------------------------
// Add function to get course details based on course ID
//----------------------------------------------------------
function ta_course_details( $course)
{
global $wpdb;
$result = $wpdb->get_row( $wpdb->prepare("
	SELECT artist_name, venue_name, show_date, show_time 
	FROM wp_gigpress_shows, wp_gigpress_artists, wp_gigpress_venues
	WHERE show_id = %d 
	and wp_gigpress_shows.show_artist_id = wp_gigpress_artists.artist_id
	and wp_gigpress_shows.show_venue_id = wp_gigpress_venues.venue_id",
		$course), ARRAY_A );
return $result['artist_name'] . " " . $result['venue_name'] . " " .  $result['show_date'] . " " .  $result['show_time'];
}

?>