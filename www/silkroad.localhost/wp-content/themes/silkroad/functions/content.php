<?php

function silkroad_load_template_part($template_name, $part_name=null, $args=[]) {
	ob_start();
	get_template_part($template_name, $part_name, $args);
	$var = ob_get_contents();
	ob_end_clean();
	return $var;
}


function silkroad_footnotes($slug, $str) {
	
	$count = 0;
	$str = preg_replace_callback("/\[\[\[(.+?)\]\]\]/", function($matches) use (&$count, $slug) {
		$count = $count + 1;
		$num_name = $slug . '-num-' . $count;
		$fn_name = $slug . '-fn-' . $count;

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
