<?php 
	$classes = ['swiper-slide', 'case-'.get_field('reference_code')];
	$gallery = get_field('images_documents');

	if ($gallery && is_array($gallery) && count($gallery) > 0){
		$classes[]='has-gallery';
	}
?>
<article class="<?php echo implode(' ', $classes);?>" data-ref="<?php echo get_field('reference_code'); ?>">
	<div class="preview">
		<div class="slideshow" data-idx="0">

			<div class="slide">
				<?php the_post_thumbnail();?>
				<p class="caption">
					<a target="_blank" href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large');?>"> <span>View</span></a>
				</p>
			</div>
	

			<?php if ($gallery && is_array($gallery) && count($gallery) > 0): ?>
				<?php foreach($gallery as $media): ?>

					<?php 
					$preview = get_field('preview', $media['ID']);
					?>

					<?php if ($media['type'] == 'image'): ?>
						<div class="slide">
							<img src="<?php echo esc_url($media['sizes']['medium']); ?>" alt="<?php echo esc_attr($media['alt']); ?>" />
							<p class="caption">
								<a target="_blank" href="<?php echo $media['sizes']['large'];?>">
									<?php if($media['caption']):?>
										<span><?php echo $media['caption'];?></span>
									<?php else:?>
										<span>View</span>
									<?php endif;?>
								</a>
							</p>
						</div>

					<?php elseif ($preview): ?>
						<div class="slide">
							<img src="<?php echo esc_url($preview['sizes']['medium']); ?>" alt="<?php echo esc_attr($preview['alt']); ?>" />
							<?php if($media['caption']):?>
								<p class="caption"><?php echo $caption;?></p>
							<?php endif;?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

			<?php if(get_field('images_documents')):?>
				<div class="controls">
					<div class="prev"><i class="far fa-chevron-left"></i></div>
					<div class="next"><i class="far fa-chevron-right"></i></div>
				</div>
			<?php endif;?>
		</div>
		<div class="case-outer">
			<div class="case">
				<div class="case__permalink"><a href="<?php echo site_url(); ?>#case-<?php echo get_field('reference_code'); ?>" target="_blank"><i class="fal fa-link"></i></a></div>

				<h3><?php echo xinjiang_translate_field(get_field('name_ml_text')); ?></h3>
				<div class="case__row"><p><?php echo xinjiang_translate_field(get_field('name_chinese_ml_text')); ?></p></div>
				
			
				<div class="case__row">


					<h5>Assumed Location</h5>
					<p><?php echo xinjiang_translate_field(get_field('where_held_ml_text')); ?></p>
				</div>
				<div class="case__row">
					<h5>Suspected Reasons for Arrest or Detention</h5>
					<p><?php echo xinjiang_translate_field(get_field('reason_for_arrest_or_detention_suspected_ml_text')); ?></p>
				</div>
				<div class="case__row">
					<h5>Official Reason for Arrest or Detention</h5>
					<p><?php echo xinjiang_translate_field(get_field('reason_for_arrest_or_detention_official_ml_text')); ?></p>
				</div>
				<div class="case__row">
					<h5>Last Contact</h5>
					<p><?php echo xinjiang_translate_field(get_field('last_seen_date_ml_text')); ?></p>
				</div>

				
				

				<div class="case__row--full summary">
					<?php if(get_field('summary_ml_rich_text') && strlen(xinjiang_translate_field(get_field('summary_ml_rich_text'))) > 0):?>
						<p><?php echo xinjiang_translate_field(get_field('summary_ml_rich_text')); ?></p>
					<?php else:?>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
					<?php endif;?>
					

				</div>

				<div class="case__personal-container">
					<?php if(get_field('quote_or_personal_detail_ml_rich_text_basic') && strlen(xinjiang_translate_field(get_field('quote_or_personal_detail_ml_rich_text_basic'))) > 0):?>
						<div class="personal-details case__row--full">
							<h5>Personal Details</h5>
							<p><?php echo xinjiang_translate_field(get_field('quote_or_personal_detail_ml_rich_text_basic')); ?></p>
						</div>
					<?php endif;?>
					<div class="case__row">
						<h5>Date of Birth</h5>
						<p><?php the_field('date_of_birth'); ?></p>
					</div>

					<div class="ethnicity case__row">
						<h5>Ethnicity</h5>
						<p><?php echo xinjiang_translate_field(get_field('ethnicity_ml_text')); ?></p>
					</div>
					<div class="case__row">
						<h5>Hometown</h5>
						<p><?php echo xinjiang_translate_field(get_field('hometown_ml_text')); ?></p>
					</div>
					
					<div class="profession case__row">
						<h5>Profession</h5>
						<p><?php echo xinjiang_translate_field(get_field('profession_ml_text')); ?></p>
					</div>
					<div class="read-more"><p><span>Read More</span> <i class="fas fa-caret-down"></i></p></div>
				</div>
			</div>
		</div>
	</div>	
</article>