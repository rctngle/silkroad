<?php

function silkroad_load_template_part($template_name, $part_name=null, $args=[]) {
	ob_start();
	get_template_part($template_name, $part_name, $args);
	$var = ob_get_contents();
	ob_end_clean();
	return $var;
}


function silkroad_footnotes($slug, $str) {
	preg_match_all("/\[\[\[(.+?)\]\]\]/", $str, $matches);


	foreach($matches[0] as $idx => $match) {
		$num_name = $slug . '-num-' . ($idx + 1);
		$fn_name = $slug . '-fn-' . ($idx + 1);
		$str = str_replace($match, '
			<a name="' . $num_name . '"></a>
			<sup>

				<a href="#' . $fn_name. '">' . ($idx + 1) . '</a>
				<span><span>' . ($idx+1) . '</span><br/>' . $matches[1][$idx] . '</span>
			</sup>', 
		$str);
	}

	$str .= '<ol class="footnotes">';
	foreach($matches[1] as $idx => $match) {
		$num_name = $slug . '-num-' . ($idx + 1);
		$fn_name = $slug . '-fn-' . ($idx + 1);
		$str .= '
			<li>
				<a name="' . $fn_name . '"></a>
				<a href="#' . $num_name. '">' . $match . '</a>
			</li>
		';
	}
	$str .= '</ol>';

	return $str;
}
