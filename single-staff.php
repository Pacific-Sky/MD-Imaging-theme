<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
?>
<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
	<main class="page__content page__staff">
		<?php global $mdi_department; $archive_link = get_bloginfo('url') . "/staff/$mdi_department"; ?>
		<!-- <a href="<?php echo $archive_link; ?>" class="breadcrumb">&larr; All Staff</a> -->
		<h1><?php the_title(); ?></h1>
		<?php if(has_post_thumbnail()): ?>
      <img src="<?php echo the_post_thumbnail_url('large'); ?>" class="image--staff">
    <?php endif; ?>
		<?php the_content(); ?>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
