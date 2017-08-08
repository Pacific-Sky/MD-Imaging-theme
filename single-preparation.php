<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
?>
<?php get_header();
global $mdi_department;
switch($mdi_department) {
  case 'vic':
    $patient_center_link = get_bloginfo('url') . '/vascular-interventional-center/patient-center';
    break;
  default:
    $patient_center_link = get_bloginfo('url') . '/patient-center';
    break;
}
?>


  <?php while(have_posts()): the_post(); ?>
    <?php if(has_post_thumbnail()): ?>
      <figure class="post--image" style="background-image: url('<?php echo the_post_thumbnail_url( 'article_header' ); ?>')"></figure>
    <?php endif; ?>
    <main class="page__content page__preparation">
      <a href="<?php echo $patient_center_link; ?>" class="breadcrumb">&larr; Back to Patient Center</a>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </main>
  <?php endwhile; ?>

<?php get_footer(); ?>
