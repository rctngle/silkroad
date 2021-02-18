<?php


function silkroad_get_toolbars_options() {
	return [
		'formatselect',
		'bold',
		'italic',
		'strikethrough',
		'bullist',
		'numlist',
		'blockquote',
		'alignleft',
		'aligncenter',
		'alignright',
		'link',
		'unlink',
		'hr',
		'superscript'
	];
}

function silkroad_acf_wysiwyg_toolbars( $toolbars ) {
	
	$toolbars['Full'][1] = silkroad_get_toolbars_options();
	$toolbars['Full'][2] = [];

	$toolbars['Minimal'] = array();
	$toolbars['Minimal'][1] = array('bold', 'italic', 'link', 'unlink');

	return $toolbars;
}

add_filter( 'acf/fields/wysiwyg/toolbars' , 'silkroad_acf_wysiwyg_toolbars'  );

function silkroad_mce_buttons($buttons) {
	return silkroad_get_toolbars_options();
}
add_filter("mce_buttons", "silkroad_mce_buttons", 0);

if( !function_exists('silkroad_mce_buttons_2') ){
	function silkroad_mce_buttons_2($buttons) {
		return array();
	}
	add_filter("mce_buttons_2", "silkroad_mce_buttons_2", 0);
}

function silkroad_tinymce_init( $init ) {
	$init['paste_as_text'] = true;
	$init['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;blockquote=blockquote';
	return $init;
}

add_filter('tiny_mce_before_init', 'silkroad_tinymce_init');