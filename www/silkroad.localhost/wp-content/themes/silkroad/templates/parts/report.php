<?php

function silkroad_report_display_children($parent, $depth, $chapter_num) {

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


			$terms = get_the_terms(get_the_ID(), 'report_content_types');
			$is_chapter = false;
			if ($terms && is_array($terms)) {
				foreach($terms as $term) {
					if ($term->slug === 'chapter') {
						$is_chapter = true;
						$chapter_num++;
					}
				}
			}	

			get_template_part('templates/posts/post', get_post_type(), [
				'depth' => $depth, 
				'is_chapter' => $is_chapter, 
				'chapter_num' => $chapter_num, 
				'report_content_type_terms' => $terms,
			]);

			silkroad_report_display_children(get_the_ID(), $depth+1, $chapter_num);
		}
	}	
}

silkroad_report_display_children(0, 0, 0);