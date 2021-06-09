<?php
$share_url = site_url();
$share_title = xinjiang_translate('social-media-text');
$instagram_url = get_field('instagram_url', 'options');
?>
<ul>
	<li>
		<a class="share-button ico-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>&t=<?php echo $share_title; ?>" target="_blank">
			<img src="<?php bloginfo('template_directory');?>/assets/images/ico-facebook-white.svg">
			<span>Facebook</span>
		</a>
	</li>
	<li>
		<a class="share-button ico-twitter" href="http://www.twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank">
			<img src="<?php bloginfo('template_directory');?>/assets/images/ico-twitter-white.svg">
			<span>Twitter</span>
		</a>
	</li>
	<?php if ($instagram_url): ?>
		<li>
			<a class="share-button ico-instagram" href="<?php echo $instagram_url; ?>" target="_blank">
				<img src="<?php bloginfo('template_directory');?>/assets/images/ico-instagram-white.svg">
				<span>Instagram</span>
			</a>
		</li>
	<?php endif; ?>

	
</ul>

