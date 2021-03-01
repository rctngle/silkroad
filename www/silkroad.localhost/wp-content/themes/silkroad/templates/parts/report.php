<div class="bw-inlay">
	<img src="<?php bloginfo('template_directory');?>/assets/images/inlay.jpg">
</div>
<div class="content-box section-title">	
	<h1>Report</h1>
</div>
<?php

function silkroad_get_report_args($post_id, $depth, $chapter_num) {
	$terms = get_the_terms($post_id, 'report_content_types');
	$is_chapter = false;
	if ($terms && is_array($terms)) {
		foreach($terms as $term) {
			if ($term->slug === 'chapter') {
				$is_chapter = true;
				$chapter_num++;
			}
		}
	}	

	$report_args = [
		'depth' => $depth, 
		'is_chapter' => $is_chapter, 
		'chapter_num' => $chapter_num, 
		'report_content_type_terms' => $terms,
	];

	return $report_args;

}

function silkroad_report_display_nav($parent, $depth, $chapter_num) {
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
			$report_args = silkroad_get_report_args(get_the_ID(), $depth, $chapter_num);
			get_template_part('templates/nav/nav', get_post_type(), $report_args);

			echo "<ul>";
			silkroad_report_display_nav(get_the_ID(), $depth+1, $chapter_num);
			echo "</ul>";

		}
	}	
}

function silkroad_report_get_children($parent, $root_parent, $depth, $chapter_num, &$report_content='') {
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
			if ($depth === 0) {
				$root_parent = get_the_id();
			}

			$report_args = silkroad_get_report_args(get_the_ID(), $depth, $chapter_num);
			$report_args['root_parent'] = $root_parent;

			$report_content .= silkroad_load_template_part('templates/posts/post', get_post_type(), $report_args);

			silkroad_report_get_children(get_the_ID(), $root_parent, $depth+1, $chapter_num, $report_content);

			if ($report_args['is_chapter']) {
				$report_content .= silkroad_load_template_part('templates/parts/illustrations');
			}
		}
	}	
}

echo '<div class="report-nav">';
echo '<ul>';
silkroad_report_display_nav(0, 0, 0);
echo '</ul>';
echo "</div>";


$report_content = '';
silkroad_report_get_children(0, 0, 0, 0, $report_content);

echo silkroad_footnotes('sr', $report_content);