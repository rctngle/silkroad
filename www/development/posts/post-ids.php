<?php

require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-load.php');
require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-admin/includes/post.php');

// $post_types = ['report', 'case'];
// $post_types = ['report'];
$post_types = ['case'];

$post_ids = [];
foreach($post_types as $post_type) {
	$post_query = new WP_Query([
		'post_type' => $post_type,
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'asc',
	]);

	$ids = [];
	foreach($post_query->posts as $post) {
		$ids[] = $post->ID;
	}

	$post_ids[$post_type] = $ids;
}

file_put_contents('post-ids.json', json_encode($post_ids));
