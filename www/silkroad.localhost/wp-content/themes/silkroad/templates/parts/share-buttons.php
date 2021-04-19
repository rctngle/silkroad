<?php

$share_url ='https://www.amnesty.org';
$share_title = 'Website title goes here';

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
	<?php /*
	<li>
		<a class="share-button ico-instagram" href="https://www.instagram.com/" target="_blank">
			<img src="<?php bloginfo('template_directory');?>/assets/images/ico-instagram-white.svg">
			<span>Instagram</span>
		</a>
	</li>
	*/ ?>
	<li>
		<a class="share-button ico-telegram" href="https://t.me/share/url?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank">
			<img src="<?php bloginfo('template_directory');?>/assets/images/ico-telegram-white.svg">
			<span>Telegram</span>
		</a>
	</li>
</ul>
