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
    <div class="wrapper">

      <main id="history">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </main>
      <!-- <aside id="timeline">

        <ul>
          <li>
            <h2>1951</h2>
            <p>Dr. George Martin opens his radiology practice at the corner of Market and Tehama Streets. It is eventually renamed Redding Radiological Associates, which is now MD Imaging.</p>
            <img src="" alt="">
          </li>
          <li>
            <h2>1965</h2>
            <p>We realize the many benefits afforded by nuclear medicine and are first to introduce it to Northern California.</p>
            <img src="" alt="">
          </li>
          <li>
            <h2>1987</h2>
            <p>Magnetic resonance imaging (MRI) is added to our capabilities, making us the first imaging center North of Sacramento to offer diagnostic advance. We now offer 4 MRI suites, including conventional, short-bore, 3T, and Open MRI</p>
            <img src="" alt="">
          </li>
          <li>
            <h2>1987</h2>
            <p>Realizing women have unique healthcare needs - especially when it comes to diagnostic imaging - we open our Women's Imaging Center. Continuing to advance our technology, we offer the gold standard of breast imaging, digital mammography, coupled with a computer-aided detection program called Second Look.</p>
            <img src="" alt="">
          </li>
          <li>
            <h2>1990</h2>
            <p>We become the first imaging center north of Sacramento to offer MammoTest II non-surgical breast biopsy.</p>
            <img src="" alt="">
          </li>
          <li>
            <h2>1996</h2>
            <p>Redding Radiological Associates and Shasta Diagnostic Imaging merge to form MD Imaging.</p>
            <img src="" alt="">
          </li>
          <li>
            <h2>2001</h2>
            <p>We become the first imaging center north of Sacramento to offer positron emission tomography (PET).</p>
            <img src="" alt="">
          </li>
          <li>
            <h2>2011</h2>
            <p>2011 MD Imaging Celebrates 60 Years of Service</p>
            <img src="" alt="">
          </li>
        </ul>

      </aside> -->
    </div>
  <?php endwhile; ?>

<?php get_footer(); ?>
