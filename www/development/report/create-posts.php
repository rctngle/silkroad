<?php

// exit; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// $import = '2016-05';

require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-load.php');
require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-admin/includes/post.php');

$chapters = json_decode(file_get_contents('report-out.json'));

$chapter_counter = 0;
foreach ($chapters as $chapter_key => $chapter) {
	
	echo $chapter->title . PHP_EOL;

	$chapter_args = [
		'post_type' => 'report',
		'post_title' => $chapter->title,
		'post_name' => $chapter->title,
		'post_status' => 'publish',
		'comment_status' => 'closed',
		'ping_status' => 'closed',
		'menu_order' => $chapter_counter,
	];

	$chapter_id = wp_insert_post($chapter_args);
	wp_set_object_terms($chapter_id, $chapter->type, 'report_content_types');
	// do_action('save_post', $chapter_id);

	$chapters->{$chapter_key}->chapter_id = $chapter_id;

	$section_counter = 0;
	foreach($chapter->sections as $section_key => $section) {

		echo "\t" . $section->title . PHP_EOL;

		$section_args = [
			'post_type' => 'report',
			'post_title' => $section->title,
			'post_name' => $section->title,
			'post_status' => 'publish',
			'comment_status' => 'closed',
			'ping_status' => 'closed',
			'post_parent' => $chapter_id,
			'menu_order' => $section_counter,
		];

		$section_id = wp_insert_post($section_args);
		wp_set_object_terms($section_id, $section->type, 'report_content_types');
		// do_action('save_post', $section_id);
		$chapters->{$chapter_key}->sections->{$section_key}->section_id = $section_id;

		$section_counter++;
	}

	$chapter_counter++;
}

file_put_contents('report-out-ids.json', json_encode($chapters));
