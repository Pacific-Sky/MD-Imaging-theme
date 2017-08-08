<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
?>
<?php get_header(); ?>


  <?php while(have_posts()): the_post(); ?>
		<main class="page__content">
			<ul class="breadcrumbs">
				<li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="breadcrumb">Back to News</a></li>
			</ul>
			<h1><?php the_title(); ?></h1>
			<?php if(has_post_thumbnail()): ?>
				<figure class="post--image" style="background-image: url('<?php echo the_post_thumbnail_url( 'article_header' ); ?>')"></figure>
			<?php endif; ?>
			<?php the_content(); ?>
			</main>
  <?php endwhile; ?>

<?php get_footer(); ?>
