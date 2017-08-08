<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
add_filter('wp_title', function () {
  global $post;
  $title = 'Job Application';
  $jobid = get_query_var('jobid');
  if($jobid && $jobid !== 'any') {
    $title = get_post($jobid)->post_title . ' Application';
  }
  return $title . ' | MD Imaging';
}, 10, 3);

?>
<?php get_header(); ?>

<?php if(get_query_var('jobid')): ?>
  <main class="page__content page__job">
    <?php $job = get_post(get_query_var('jobid')); ?>
    <h1>Application <?php if(get_query_var('jobid') !== 'any'): ?> for <?php echo $job->post_title; endif; ?></h1>
    <?php gravity_form(1, false, false, false, array('jobid' => $job ? $job->ID : '', 'jobtitle' => $job ? $job->post_title : '')); ?>
  </main>
<?php else: ?>
  <?php while(have_posts()): the_post(); ?>
    <?php if(has_post_thumbnail()): ?>
      <figure class="post--image" style="background-image: url('<?php echo the_post_thumbnail_url( 'article_header' ); ?>')"></figure>
    <?php endif; ?>
    <main class="page__content page__job">
      <h1><?php the_title(); ?></h1>
      <p><a href="<?php echo get_bloginfo('url'); ?>/apply-for-job/<?php the_ID(); ?>">Apply for this Position</a></p>
      <?php the_content(); ?>
      <a href="<?php echo get_bloginfo('url'); ?>/apply-for-job/<?php the_ID(); ?>">Apply for this Position</a>
    </main>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
