<?php
$page = xinjiang_get_post_by_slug('page', 'introduction');
?>

<?php if ($page): ?>
<div>
	<?php echo xinjiang_translate_field(get_field('content_ml_rich_text', $page->ID)); ?>
</div>
<?php endif; ?>