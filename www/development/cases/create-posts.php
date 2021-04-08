<?php

// exit; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-load.php');
require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-admin/includes/post.php');

$csv = [];
if (($handle = fopen('cases.csv', 'r')) !== FALSE) {
	while (($row = fgetcsv($handle, 0, ',')) !== FALSE) {
		$csv[] = $row;	
	}
	fclose($handle);
}

$data = [];
$keys = [];
foreach($csv as $row_num => $row) {
	if ($row_num == 0) {
		for ($i=0; $i<=18; $i++) {
			$keys[] = $row[$i];
		}
	} else {
		$entry = [];
		for ($i=0; $i<=18; $i++) {
			$key = $keys[$i];
			$val = $row[$i];
				
			$entry[$key] = $val;
		}		

		$data[] = $entry;
	}
}

foreach($data as $idx => $entry) {
	$title = $entry['case_id'] . ': ' . $entry['name'];

	$chapter_args = [
		'post_type' => 'case',
		'post_title' => $title,
		'post_name' => $title,
		'post_status' => 'publish',
		'comment_status' => 'closed',
		'ping_status' => 'closed',
		'menu_order' => $idx,
	];

	$case_id = wp_insert_post($chapter_args);
	$data[$idx]['post_id'] = $case_id;
}

file_put_contents('cases.json', json_encode($data));