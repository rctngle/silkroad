<?php

function silkroad_report_display_children($parent, $depth) {

	$report_query = new WP_Query([
		'post_type' => 'report',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $parent,
	]);

	if ($report_query->have_posts()) {
		while ($report_query->have_posts()) {
			$report_query->the_post();
			
			get_template_part('templates/posts/post', get_post_type(), ['depth' => $depth ]);
			silkroad_report_display_children(get_the_ID(), $depth+1);

		}
	}	
}

silkroad_report_display_children(0, 0);