<?php

function wp_rocket_add_purge_posts_to_author() {
	// gets the author role object
	$role = get_role('editor');
 
	// add a new capability
	$role->add_cap('rocket_purge_cache', true);
}
add_action('init', 'wp_rocket_add_purge_posts_to_author', 12);

function xinjiang_admin_style() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/build/styles/adminstyles.css?t=' . time());
}
add_action('admin_enqueue_scripts', 'xinjiang_admin_style');

function xinjiang_admin_scripts() { 
	wp_enqueue_script('admin_script', get_template_directory_uri() . '/build/scripts/adminscripts.js?t=' . time()); 
} 

add_action('admin_enqueue_scripts', 'xinjiang_admin_scripts');

function xinjiang_after_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'build/styles/editor.css' ) );
}
add_action( 'after_setup_theme', 'xinjiang_after_theme_setup' );

function xinjiang_admin_menu() {
	remove_menu_page('edit.php'); // posts
	remove_menu_page('edit-comments.php'); // comments

	remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Status Metabox
	remove_meta_box( 'commentsdiv','post','normal' ); // Comments Metabox
	remove_meta_box( 'trackbacksdiv','post','normal' ); // Trackback Metabox

	// if (get_current_user_id() != 1) {
	// 	remove_menu_page('edit.php?post_type=acf-field-group'); // ACF
	// }
}



add_action('admin_menu', 'xinjiang_admin_menu');

// function xinjiang_remove_menus() {
// 	if (get_current_user_id() != 1) {
//     	remove_menu_page('cptui_main_menu');
// 	}
// }
// add_action('admin_init', 'xinjiang_remove_menus');


function remove_textarea() {
	remove_post_type_support( 'page', 'editor' );
	remove_post_type_support( 'report', 'editor' );
	remove_post_type_support( 'testimony', 'editor' );
	remove_post_type_support( 'case', 'editor' );
	remove_post_type_support( 'resource', 'editor' );
}

add_action('admin_init', 'remove_textarea');

function xinjiang_remove_revisions_metabox() {
	remove_meta_box( 'revisionsdiv','post','normal' );
	remove_meta_box( 'commentsdiv','post','normal' );

	remove_meta_box( 'revisionsdiv','page','normal' );
	remove_meta_box( 'commentsdiv','page','normal' );
}

add_action('admin_menu','xinjiang_remove_revisions_metabox');

	
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page([
	]);
	
	acf_add_options_page(array(
		'page_title' => 'Translations',
		'menu_title'=> 'Translations',
		'menu_slug' => 'translations',
		'capability'=> 'edit_posts',
		'redirect' => false,
	));
}
