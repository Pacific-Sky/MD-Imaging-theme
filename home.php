<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
?>
<?php get_header(); ?>


	<main class="page__blog">
	<h1>News</h1>
  <?php while(have_posts()): the_post(); ?>
		<article class="box__blog">
			<a href="<?php the_permalink(); ?>">
			<h3><?php the_title(); ?></h3>
			<?php if(has_post_thumbnail()): ?>
				<figure style="background-image: url('<?php echo the_post_thumbnail_url( ); ?>')"></figure>
			<?php endif; ?>
			<div class="box__content"><?php echo substr(strip_tags(do_shortcode(get_the_content())), 0, 150); ?>&hellip;</div>
			</a>
		</article>
  <?php endwhile; ?>
	</main>

<?php get_footer(); ?>
