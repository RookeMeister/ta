<?php
/*
Plugin Name: Peter Dev
Description: Plugin for testing development concepts.
Version: 0.1
Author: Peter Rooke
License: GPL2
*/

add_shortcode('peter_course', 'peter_course_shortcode');

function peter_course_shortcode() {

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

function peter_course_info( $course) {
global $wpdb;
$result = $wpdb->get_row( $wpdb->prepare("
	SELECT artist_name, venue_name, show_date, show_time 
	FROM wp_gigpress_shows, wp_gigpress_artists, wp_gigpress_venues
	WHERE show_id = %d 
	and wp_gigpress_shows.show_artist_id = wp_gigpress_artists.artist_id
	and wp_gigpress_shows.show_venue_id = wp_gigpress_venues.venue_id",
		$course), ARRAY_A );
$chosen_course = $result['artist_name'] . " " . $result['venue_name'] . " " .  $result['show_date'] . " " .  $result['show_time'];
return $chosen_course;
}