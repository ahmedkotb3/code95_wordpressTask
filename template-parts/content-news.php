<div class="card">
	<?php if (has_post_thumbnail()): ?>
		<img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'medium')); ?>" class="card-img-top"
			alt="<?php the_title_attribute(); ?>">
	<?php endif; ?>
	<div class="card-body">
		<h5 class="card-title"><?php the_title(); ?></h5>
	</div>
</div>