<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
?>
<?php get_header(); ?>


  <?php while(have_posts()): the_post(); ?>
    <?php if(has_post_thumbnail()): ?>
      <figure class="post--image" style="background-image: url('<?php echo the_post_thumbnail_url( 'article_header' ); ?>')"></figure>
    <?php endif; ?>
    <main class="page__content">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </main>
  <?php endwhile; ?>

<?php get_footer(); ?>
