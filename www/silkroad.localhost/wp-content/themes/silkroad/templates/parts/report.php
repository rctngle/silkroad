<div class="bw-inlay">
	<img src="<?php bloginfo('template_directory');?>/assets/images/inlay.jpg">
</div>
<div class="content-box section-title">	
	<h1>Report</h1>
</div>
<?php

function silkroad_report_display_children($template, $parent, $depth, $chapter_num, &$report_content='') {
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

			$report_args = [
				'depth' => $depth, 
				'is_chapter' => $is_chapter, 
				'chapter_num' => $chapter_num, 
				'report_content_type_terms' => $terms,
			];

			if ($template == 'nav/nav') {
				get_template_part('templates/'.$template, get_post_type(), $report_args);
				echo "<ul>";
				silkroad_report_display_children($template, get_the_ID(), $template_directorypth+1, $chapter_num, $report_content);
				echo "</ul>";
			} else {
				$report_content .= silkroad_load_template_part('templates/'.$template, get_post_type(), $report_args);
				// echo $report_content;
				silkroad_report_display_children($template, get_the_ID(), $depth+1, $chapter_num, $report_content);


				if ($is_chapter) {
					$report_content .= silkroad_load_template_part('templates/parts/illustrations');
				}

			}

		}
	}	
}

echo '<div class="report-nav">';
echo '<ul>';
silkroad_report_display_children('nav/nav', 0, 0, 0);
echo '</ul>';
echo "</div>";


$report_content = '';
silkroad_report_display_children('posts/post', 0, 0, 0, $report_content);

echo silkroad_footnotes('sr', $report_content);