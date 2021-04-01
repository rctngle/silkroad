<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// $import = '2016-05';

require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-load.php');
require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-admin/includes/post.php');

$chapters = json_decode(file_get_contents('report-out.json'));

foreach ($chapters as $chapter_key => $chapter) {
	
	echo $chapter->title . PHP_EOL;

	foreach($chapter->sections as $section_key => $section) {

		echo "\t" . $section->title . PHP_EOL;
	
	}

}