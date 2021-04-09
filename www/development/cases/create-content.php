<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-load.php');
require_once(dirname(dirname(__DIR__)) . '/silkroad.localhost/wp-admin/includes/post.php');
include_once( ABSPATH . 'wp-admin/includes/image.php' );

$cases = json_decode(file_get_contents('cases.json'));


foreach($cases as $case) {
	print_r($case);

	update_field('reference_code', $case->case_id, $case->post_id);
	
	update_field('name_ml_text', ['english' => $case->name], $case->post_id);
	update_field('profession_ml_text', ['english' => $case->profession], $case->post_id);
	update_field('ethnicity_ml_text', ['english' => $case->ethnicity], $case->post_id);

	update_field('date_of_birth', date('Ymd', strtotime($case->date_of_birth)), $case->post_id);

	update_field('hometown_ml_text', ['english' => $case->home_town], $case->post_id);

	update_field('last_seen_date_ml_text', ['english' => $case->arrest_last_contact_date], $case->post_id);
	update_field('last_seen_location_ml_text', ['english' => $case->arrest_last_contact_location], $case->post_id);

	update_field('reason_for_arrest_or_detention_official_ml_text', ['english' => $case->arrest_reason_official], $case->post_id);
	update_field('reason_for_arrest_or_detention_suspected_ml_text', ['english' => $case->arrest_reason_suspected], $case->post_id);
	
	update_field('where_held_ml_text', ['english' => $case->held_location], $case->post_id);
	
	update_field('summary_ml_rich_text_basic', ['english' => $case->summary], $case->post_id);
	update_field('quote_or_personal_detail_ml_rich_text_basic', ['english' => $case->personal_details], $case->post_id);


	$image_path = __DIR__ . '/media/' . $case->photo_url;
	if (file_exists($image_path)) {
		$attach_id = create_attachment($image_path, false);		
	}

	set_post_thumbnail( $case->post_id, $attach_id );

	$docs_dir = __DIR__ . '/media/' . strtolower($case->case_id);
	$doc_ids = [];
	if (is_dir($docs_dir)) {
		$docs = scandir($docs_dir);
		foreach ($docs as $doc) {
			if (substr($doc, 0, 1) != '.') {
				$image_path = $docs_dir . '/' . $doc;
				$doc_ids[] = create_attachment($image_path, false);
			}
		}
	}

	if (count($doc_ids) > 0) {
		update_field( 'images_documents', $doc_ids , $case->post_id );
	}
}	


function create_attachment($image_path, $random_name){

	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents($image_path);	

	$filename = pathinfo($image_path)['basename'];
	if ($random_name) {
		$filename = uniqid() . '.' . pathinfo($image_path)['extension'];
	}
	
	if(wp_mkdir_p($upload_dir['path'])) {
		$file = $upload_dir['path'] . '/' . $filename;
	} else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}

	file_put_contents($file, $image_data);

	$wp_filetype = wp_check_filetype($filename, null );
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title' => sanitize_file_name($filename),
		'post_content' => '',
		'post_status' => 'inherit'
	);

	// $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	$attach_id = wp_insert_attachment( $attachment, $file );
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	$res1 = wp_update_attachment_metadata( $attach_id, $attach_data );
	return $attach_id;
}