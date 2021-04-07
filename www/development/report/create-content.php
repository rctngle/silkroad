<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-load.php');
require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-admin/includes/post.php');

$chapters = json_decode(file_get_contents('report-out-ids.json'));

$chapter_counter = 0;
foreach ($chapters as $chapter_key => $chapter) {
	
	echo $chapter->chapter_id . " : " . $chapter->title . PHP_EOL;

	update_field('title_ml_text', ['english' => 'tes!!!t'], $chapter->chapter_id);


	
	
	
	exit;
	foreach($chapter->sections as $section_key => $section) {

		echo $section->section_id . "\t" . $section->title . PHP_EOL;
	}
}


// acf-field_602657cc293e7-field_602657cc293e7_field_5edfa76c9ba7b-field_5edfa7bf9ba7d
