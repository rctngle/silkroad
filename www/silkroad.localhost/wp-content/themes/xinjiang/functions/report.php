<?php

function xinjiang_get_report_args($post_id, $depth, $chapter_num, $idx) {
	$terms = get_the_terms($post_id, 'report_content_types');
	$is_chapter = false;
	$is_intro = false;
	$is_conclusion = false;
	if ($terms && is_array($terms)) {
		foreach($terms as $term) {
			if ($term->slug === 'chapter') {
				$is_chapter = true;
				$chapter_num++;
			}
			if($term->slug == 'conclusion'){
				$is_conclusion = true;
			}
			if($term->slug === 'introduction'){
				$is_intro = true;
			}
		}
	}	

	$report_args = [
		'depth' => $depth, 
		'is_chapter' => $is_chapter, 
		'chapter_num' => $chapter_num, 
		'is_intro' => $is_intro,
		'idx' => $idx,
		'is_conclusion' => $is_conclusion,
		'report_content_type_terms' => $terms,
	];

	return $report_args;

}

function xinjiang_report_display_nav($parent, $depth, $chapter_num) {
	$report_query = new WP_Query([
		'post_type' => 'report',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $parent,
	]);

	$idx = 0;
	if ($report_query->have_posts()) {
		while ($report_query->have_posts()) {
			$report_query->the_post();
			$report_args = xinjiang_get_report_args(get_the_ID(), $depth, $chapter_num, $idx);
			$chapter_num = $report_args['chapter_num'];
			

			echo '<div class="reportid-' . get_the_ID() . ' swiper-slide">';
				get_template_part('templates/nav/nav', get_post_type(), $report_args);
			
			echo '</div>';
			$idx++;
		}
		$report_query->reset_postdata();
		wp_reset_postdata();
	}	
}

function xinjiang_report_get_children($parent, $root_parent, $sub_parent, $depth, $chapter_num, &$report_content='') {
	$report_query = new WP_Query([
		'post_type' => 'report',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $parent,
	]);

	$idx = 0;
	if ($report_query->have_posts()) {
		while ($report_query->have_posts()) {
			$report_query->the_post();
			if ($depth == 0) {
				$root_parent = get_the_ID();
			} else if ($depth == 1) {
				$sub_parent = get_the_ID();
			}


			$report_args = xinjiang_get_report_args(get_the_ID(), $depth, $chapter_num, $idx);
			$report_args['root_parent'] = $root_parent;
			$report_args['sub_parent'] = $sub_parent;
			$chapter_num = $report_args['chapter_num'];

			$report_content .= xinjiang_load_template_part('templates/posts/post', get_post_type(), $report_args);

			xinjiang_report_get_children(get_the_ID(), $root_parent, $sub_parent, $depth+1, $chapter_num, $report_content);

			// if ($report_args['is_chapter']) {
			// 	$report_content .= xinjiang_load_template_part('templates/parts/illustrations');
			// }

			$idx++;
		}
		$report_query->reset_postdata();
		wp_reset_postdata();
	}	
}
