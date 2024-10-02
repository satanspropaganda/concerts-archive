<?php
/**
 * Plugin Name:       Concerts Archive
 * Description:       The block to render my Concerts Archive block.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       concerts-archive
 *
 * @package Concertsarchive
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function concertsarchive_concerts_archive_block_init()
{
	register_block_type(__DIR__ . '/build');
}
add_action('init', 'concertsarchive_concerts_archive_block_init');

//

function concerts_register_events_band() {
	$labels = array(
		'name'                       => _x( 'Bands', 'Taxonomy General Name', 'concerts' ),
		'singular_name'              => _x( 'Band', 'Taxonomy Singular Name', 'concerts' ),
		'menu_name'                  => __( 'Bands', 'concerts' ),
		'all_items'                  => __( 'All Bands', 'concerts' ),
		'new_item_name'              => __( 'New Band Name', 'concerts' ),
		'add_new_item'               => __( 'Add New Band', 'concerts' ),
		'edit_item'                  => __( 'Edit Band', 'concerts' ),
		'update_item'                => __( 'Update Band', 'concerts' ),
		'view_item'                  => __( 'View Band', 'concerts' ),
		'separate_items_with_commas' => __( 'Separate Band names with commas', 'concerts' ),
		'add_or_remove_items'        => __( 'Add or remove Bands', 'concerts' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'concerts' ),
		'popular_items'              => __( 'Popular Bands', 'concerts' ),
		'search_items'               => __( 'Search Bands', 'concerts' ),
		'not_found'                  => __( 'Not Found', 'concerts' ),
		'items_list'                 => __( 'Bands list', 'concerts' ),
		'items_list_navigation'      => __( 'Bands list navigation', 'concerts' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest' => true,
		'rewrite'      => array('slug' => 'concerts/band', 'with_front' => false)
	);

	register_taxonomy( 'concerts-bands', array( 'concerts' ), $args );
}
add_action( 'init', 'concerts_register_events_band', 0 );

function concerts_register_events_venue() {
	$labels = array(
		'name'                       => _x( 'Venues', 'Taxonomy General Name', 'concerts' ),
		'singular_name'              => _x( 'Venue', 'Taxonomy Singular Name', 'concerts' ),
		'menu_name'                  => __( 'Venues', 'concerts' ),
		'all_items'                  => __( 'All Venues', 'concerts' ),
		'new_item_name'              => __( 'New Venue Name', 'concerts' ),
		'add_new_item'               => __( 'Add New Venue', 'concerts' ),
		'edit_item'                  => __( 'Edit Venue', 'concerts' ),
		'update_item'                => __( 'Update Venue', 'concerts' ),
		'view_item'                  => __( 'View Venue', 'concerts' ),
		'separate_items_with_commas' => __( 'Separate Venue names with commas', 'concerts' ),
		'add_or_remove_items'        => __( 'Add or remove Venues', 'concerts' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'concerts' ),
		'popular_items'              => __( 'Popular Venue', 'concerts' ),
		'search_items'               => __( 'Search Venue', 'concerts' ),
		'not_found'                  => __( 'Not Found', 'concerts' ),
		'items_list'                 => __( 'Venue list', 'concerts' ),
		'items_list_navigation'      => __( 'Venue list navigation', 'concerts' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest' => true,
		'rewrite'      => array('slug' => 'concerts/venue', 'with_front' => false)
	);

	register_taxonomy( 'concert-venue', array( 'concerts' ), $args );
}
add_action( 'init', 'concerts_register_events_venue', 0 );

function concerts_register_events_city() {
	$labels = array(
		'name'                       => _x( 'Cities', 'Taxonomy General Name', 'concerts' ),
		'singular_name'              => _x( 'City', 'Taxonomy Singular Name', 'concerts' ),
		'menu_name'                  => __( 'Cities', 'concerts' ),
		'all_items'                  => __( 'All Cities', 'concerts' ),
		'new_item_name'              => __( 'New City Name', 'concerts' ),
		'add_new_item'               => __( 'Add New City', 'concerts' ),
		'edit_item'                  => __( 'Edit City', 'concerts' ),
		'update_item'                => __( 'Update City', 'concerts' ),
		'view_item'                  => __( 'View City', 'concerts' ),
		'separate_items_with_commas' => __( 'Separate City names with commas', 'concerts' ),
		'add_or_remove_items'        => __( 'Add or remove Cities', 'concerts' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'concerts' ),
		'popular_items'              => __( 'Popular City', 'concerts' ),
		'search_items'               => __( 'Search Cities', 'concerts' ),
		'not_found'                  => __( 'Not Found', 'concerts' ),
		'items_list'                 => __( 'City list', 'concerts' ),
		'items_list_navigation'      => __( 'City list navigation', 'concerts' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest' => true,
		'rewrite'      => array('slug' => 'concerts/city', 'with_front' => false)
	);

	register_taxonomy( 'concerts-city', array( 'concerts' ), $args );
}
add_action( 'init', 'concerts_register_events_city', 0 );


function concerts_register_events_country() {
	$labels = array(
		'name'                       => _x( 'Countries', 'Taxonomy General Name', 'concerts' ),
		'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'concerts' ),
		'menu_name'                  => __( 'Countries', 'concerts' ),
		'all_items'                  => __( 'All Countries', 'concerts' ),
		'new_item_name'              => __( 'New Country Name', 'concerts' ),
		'add_new_item'               => __( 'Add New Country', 'concerts' ),
		'edit_item'                  => __( 'Edit Country', 'concerts' ),
		'update_item'                => __( 'Update Country', 'concerts' ),
		'view_item'                  => __( 'View Country', 'concerts' ),
		'separate_items_with_commas' => __( 'Separate Country names with commas', 'concerts' ),
		'add_or_remove_items'        => __( 'Add or remove Countries', 'concerts' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'concerts' ),
		'popular_items'              => __( 'Popular Country', 'concerts' ),
		'search_items'               => __( 'Search Countries', 'concerts' ),
		'not_found'                  => __( 'Not Found', 'concerts' ),
		'items_list'                 => __( 'Country list', 'concerts' ),
		'items_list_navigation'      => __( 'Country list navigation', 'concerts' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest' => true,
		'rewrite'      => array('slug' => 'concerts/country', 'with_front' => false)
	);

	register_taxonomy( 'concerts-country', array( 'concerts' ), $args );
}
add_action( 'init', 'concerts_register_events_country', 0 );

function concerts_create_custom_post_type() {
    /*
     * The $labels describes how the post type appears.
     */
    $labels = array(
        'name'          => 'Concerts', // Plural name
        'singular_name' => 'Concert'   // Singular name
    );

    /*
     * The $args parameter holds important parameters for the custom post type
     */
    $args = array(
        'labels'              => $labels,
        'description'         => 'Post type for tracking concerts', // Description
        'taxonomies'          => array( 'Band', 'City', 'Venue', 'Country' ), // Allowed taxonomies
        'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
        'public'              => true,  // Makes the post type public
        'show_ui'             => true,  // Displays an interface for this post type
        'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-tickets-alt',
		'publicly_queryable'  => true,
		'show_in_rest' => true,
    );

    register_post_type('concerts', $args); 
}
add_action('init', 'concerts_create_custom_post_type');


// Endpoints

function get_rest_concert_archives($parameters)
{
	global $wpdb;

	$defaults = array(
		'type' => 'monthly',
		'limit' => '',
		'format' => 'html',
		'before' => '',
		'after' => '',
		'show_post_count' => false,
		'echo' => 1,
		'order' => 'DESC',
		'post_type' => 'concerts'
	);

	$r = wp_parse_args($parameters, $defaults);

	$post_type_object = get_post_type_object($r['post_type']);
	if (!is_post_type_viewable($post_type_object)) {
		return;
	}
	$r['post_type'] = $post_type_object->name;

	if ('' == $r['type']) {
		$r['type'] = 'monthly';
	}

	if (!empty($r['limit'])) {
		$r['limit'] = absint($r['limit']);
		$r['limit'] = ' LIMIT ' . $r['limit'];
	}

	$order = strtoupper($r['order']);
	if ($order !== 'ASC') {
		$order = 'DESC';
	}

	$sql_where = $wpdb->prepare("WHERE post_type = %s AND post_status = 'publish'", $r['post_type']);

	/**
	 * Filters the SQL WHERE clause for retrieving archives.
	 *
	 * @since 2.2.0
	 *
	 * @param string $sql_where Portion of SQL query containing the WHERE clause.
	 * @param array  $r         An array of default arguments.
	 */
	$where = apply_filters('getarchives_where', $sql_where, $r);

	/**
	 * Filters the SQL JOIN clause for retrieving archives.
	 *
	 * @since 2.2.0
	 *
	 * @param string $sql_join Portion of SQL query containing JOIN clause.
	 * @param array  $r        An array of default arguments.
	 */
	$join = apply_filters('getarchives_join', '', $r);

	$limit = $r['limit'];

	$query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date $order $limit";

	$results = $wpdb->get_results($query);

	return rest_ensure_response($results);
}

function get_rest_concerts($parameters)
{
	$parameters = $parameters->get_params();
	$args = array(
		'posts_per_page' => '-1',
		'post_type' => 'concerts',
		'fields' => 'all'
	);
	if (array_key_exists('year', $parameters)) {
		$args['date_query'] = array(
			array(
				'after' => 'January 1st' . $parameters['year'],
				'before' => 'December 31st' . $parameters['year'],
				'inclusive' => true,
			),
		);
	}
	;
	if (array_key_exists('venue', $parameters)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'concert-venue',
				'field' => 'id',
				'terms' => $parameters['venue'],
			)
		);
	}
	if (array_key_exists('band', $parameters)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'concerts-bands',
				'field' => 'id',
				'terms' => $parameters['band'],
			)
		);
	}
	if (array_key_exists('country', $parameters)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'concerts-country',
				'field' => 'id',
				'terms' => $parameters['country'],
			)
		);
	}
	if (array_key_exists('city', $parameters)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'concerts-city',
				'field' => 'id',
				'terms' => $parameters['city'],
			)
		);
	}
	$results = new WP_Query($args);

	$concerts = array();
	foreach ($results->posts as $gig) {
		$concerts[] = array(
			'ID' => $gig->ID,
			'title' => $gig->post_title,
			'date' => $gig->post_date,
			'bands' => wp_list_pluck(get_the_terms($gig->ID, 'concerts-bands'), 'term_id'),
			'venue' => wp_list_pluck(get_the_terms($gig->ID, 'concert-venue'), 'term_id'),
			'city' => wp_list_pluck(get_the_terms($gig->ID, 'concerts-city'), 'term_id'),
			'country' => wp_list_pluck(get_the_terms($gig->ID, 'concerts-country'), 'term_id'),
		);
	}
	;

	return $concerts;
}
function get_rest_bands($parameters)
{
	$terms = get_terms('concerts-bands');
	$bands = array();
	foreach ($terms as $band) {
		$count_query = array(
			array(
				'taxonomy' => 'concerts-bands',
				'field'    => 'term_id',
				'terms'    => $band->term_id,
			)
		);
		$cities = count(get_term_union( 'concerts-city', $count_query ));
		$countries = count(get_term_union( 'concerts-country', $count_query ));
		$bands[$band->term_id] = array(
			'id' => $band->term_id,
			'name' => html_entity_decode($band->name),
			'shows' => $band->count,
			'cities' => $cities,
			'countries' => $countries
		);
	}
	return $bands;
}
function get_rest_venues($parameters)
{
	$terms = get_terms('concert-venue');
	$venues = array();
	foreach ($terms as $venue) {
		$venues[$venue->term_id] = array(
			'id' => $venue->term_id,
			'name' => $venue->name,
			'shows' => $venue->count,
		);
	}
	return $venues;
}
function get_rest_countries($parameters)
{
	$terms = get_terms('concerts-country');
	$countries = array();
	foreach ($terms as $country) {
		$countries[$country->term_id] = array(
			'id' => $country->term_id,
			'name' => $country->name,
			'shows' => $country->count,
		);
	}
	return $countries;
}
function get_rest_cities($parameters)
{
	$terms = get_terms('concerts-city');
	$cities = array();
	foreach ($terms as $city) {
		$location = get_field('location', $city->taxonomy. '_' .$city->term_id);
		$cities[$city->term_id] = array(
			'id' => $city->term_id,
			'name' => $city->name,
			'shows' => $city->count,
			'lat'  => $location['lat'] ? $location['lat'] : '',
			'lng'  => $location['lng'] ? $location['lng'] : ''
		);
	}
	return $cities;
}
function get_rest_stats($parameters)
{
	$totalGigs = wp_count_posts('concerts');
	return $totalGigs->publish;
}
add_action('rest_api_init', function () {
	register_rest_route('wp/v2', '/concert-archives', array(
		'methods' => 'GET',
		'callback' => 'get_rest_concert_archives',
		'permission_callback' => function() {
			return true;
		}
	));
	register_rest_route('wp/v2', '/gigs', array(
		'methods' => 'GET',
		'callback' => 'get_rest_concerts',
		'permission_callback' => function() {
			return true;
		}
	));
	register_rest_route('wp/v2', '/bands', array(
		'methods' => 'GET',
		'callback' => 'get_rest_bands',
		'permission_callback' => function() {
			return true;
		}
	));
	register_rest_route('wp/v2', '/venues', array(
		'methods' => 'GET',
		'callback' => 'get_rest_venues',
		'permission_callback' => function() {
			return true;
		}
	));
	register_rest_route('wp/v2', '/countries', array(
		'methods' => 'GET',
		'callback' => 'get_rest_countries',
		'permission_callback' => function() {
			return true;
		}
	));
	register_rest_route('wp/v2', '/cities', array(
		'methods' => 'GET',
		'callback' => 'get_rest_cities',
		'permission_callback' => function() {
			return true;
		}
	));
	register_rest_route('wp/v2', '/stats', array(
		'methods' => 'GET',
		'callback' => 'get_rest_stats',
		'permission_callback' => function() {
			return true;
		}
	));
});

// Routing 
add_action('init', 'concert_archive_rewrite_rules');

function concert_archive_rewrite_rules() {
    add_rewrite_rule('^concerts-archive/(.+)?', 'index.php?pagename=concerts-archive', 'top');
}