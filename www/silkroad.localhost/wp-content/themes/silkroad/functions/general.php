<?php

// function silkroad_pre_get_posts( $query ) {

// 	$query->set( 'posts_per_page', 9999 );

// 	set_query_var('posts_per_archive_page', 9999);

// 	if ( !is_admin() && $query->is_main_query()) {
// 		if ( $query->get('post_type') ) {
// 			$query->set( 'posts_per_page', -1 );
// 		}
// 	}
// }
// add_action( 'pre_get_posts', 'silkroad_pre_get_posts' );

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls;
}

/*
 * WordPress 5.6.1: Window Unload Error Final Fix
 */
add_action('admin_print_footer_scripts', 'wp_561_window_unload_error_final_fix');
function wp_561_window_unload_error_final_fix(){
    ?>
    <script>
        jQuery(document).ready(function($){

            // Check screen
            if(typeof window.wp.autosave === 'undefined')
                return;

            // Data Hack
            var initialCompareData = {
                post_title: $( '#title' ).val() || '',
                content: $( '#content' ).val() || '',
                excerpt: $( '#excerpt' ).val() || ''
            };

            var initialCompareString = window.wp.autosave.getCompareString(initialCompareData);

            // Fixed postChanged()
            window.wp.autosave.server.postChanged = function(){

                var changed = false;

                // If there are TinyMCE instances, loop through them.
                if ( window.tinymce ) {
                    window.tinymce.each( [ 'content', 'excerpt' ], function( field ) {
                        var editor = window.tinymce.get( field );

                        if ( ( editor && editor.isDirty() ) || ( $( '#' + field ).val() || '' ) !== initialCompareData[ field ] ) {
                            changed = true;
                            return false;
                        }

                    } );

                    if ( ( $( '#title' ).val() || '' ) !== initialCompareData.post_title ) {
                        changed = true;
                    }

                    return changed;
                }

                return window.wp.autosave.getCompareString() !== initialCompareString;

            }
        });
    </script>
    <?php
}