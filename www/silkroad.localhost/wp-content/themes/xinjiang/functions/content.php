<?php

function xinjiang_load_template_part($template_name, $part_name=null, $args=[]) {
	ob_start();
	get_template_part($template_name, $part_name, $args);
	$var = ob_get_contents();
	ob_end_clean();
	return $var;
}


function xinjiang_footnotes($str) {
	
	$count = 0;
	$str = preg_replace_callback("/\[\[\[(.+?)\]\]\]/", function($matches) use (&$count, $slug) {
		$count = $count + 1;
		$num_name = 'num-' . $count;
		$fn_name = 'fn-' . $count;

		return '
			<a name="' . $num_name . '"></a>
			<sup>

				<a href="#' . $fn_name. '">' . $count . '</a>
				<span><span>' . $count . '</span><br/>' . $matches[1] . '</span>
			</sup>
		';
	}, $str);
	
	return $str;
}

function xinjiang_get_post_by_slug($post_type, $slug) {
	$posts = get_posts([
		'name' => $slug,
		'post_type' => $post_type,
		'posts_per_page' => 1
	]);
	if (count($posts) > 0) {
		return $posts[0];
	}
	return false;
}