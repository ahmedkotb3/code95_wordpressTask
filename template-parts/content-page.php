<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package code95_task
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="card bg-dark text-white">
		<?php if (has_post_thumbnail()): ?>
			<img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>" class="card-img"
				alt="<?php the_title_attribute(); ?>">
		<?php endif; ?>
		<div class="card-img-overlay">
			<span class="badge bg-danger">Local</span>
			<h5 class="card-title"><?php the_title(); ?></h5>
		</div>
	</div>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'code95-task'),
				'after' => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()): ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'code95-task'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->