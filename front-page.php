<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
?>
<?php get_header(); ?>

<?php echo do_shortcode('[rev_slider alias="home"]'); ?>

<h2 class="header__full-width"><span>Providing answers</span></h2>

<p class="home__tagline">Locally owned and operated for 65 years, MD Imaging offers a complete range of imaging technology in a safe, caring environment. From X-ray to MRI, we are the trusted resource to help you and your doctor determine the next step in your medical care.</p>

<section class="home__departments">
  <div class="wic">
    <?php echo mdi_shortcode_circle_figure(array(
      'caption' => "Women's Imaging Center",
      'background' => get_stylesheet_directory_uri() . '/assets/img/wic.jpg'
    )); ?>
    <p>Whether it’s time for an annual screening or you are looking for peace of mind, you are in good hands with the Women’s Imaging Center. Located within MD Imaging, our center offers advanced mammography, breast ultrasound, MRI, and biopsy services in a warm, caring environment. We are here when you need us most.</p>
    <a href="<?php echo get_bloginfo('url'); ?>/womens-imaging-center" class="button">Visit</a>
  </div>
  <div class="mdi">
    <?php echo mdi_shortcode_circle_figure(array(
      'caption' => "MD Imaging",
      'background' => get_stylesheet_directory_uri() . '/assets/img/mdi.jpg'
    )); ?>
    <p>MD Imaging provides quality, diagnostic imaging that is critical in aiding doctors with diagnosing and treating their patients. We provide patients and their caregivers the information needed to make important health care decisions. We are the only comprehensive diagnostic imaging center in our community.</p>
    <a href="<?php echo get_bloginfo('url'); ?>/about-us" class="button">Read On</a>
  </div>
  <div class="vic">
    <?php echo mdi_shortcode_circle_figure(array(
      'caption' => "Vascular &amp; Interventional Center",
      'background' => get_stylesheet_directory_uri() . '/assets/img/vic.jpg'
    )); ?>
    <p>The Vascular &amp; Interventional center performs vein care and a variety of outpatient procedures including port placement and fibroid therapy. Our radiologists and skin experts are specially trained to perform guided X-ray, laser, and skin procedures with positive results both medically and aesthetically.</p>
    <a href="<?php echo get_bloginfo('url'); ?>/vascular-interventional-center" class="button">Visit</a>
  </div>
</section>

<h2 class="header__full-width" id="about-mdi"><span>About Us</span></h2>

<p class="home__tagline">MD Imaging offers complete diagnostic imaging services in a comfortable atmosphere. Owned and operated by radiologists who live, work, and raise their families in our community, we are here for all of your outpatient imaging needs. <a href="<?php echo get_bloginfo('url'); ?>/about-us">Learn more about us</a>.</p>
<br>
<p class="home__tagline">&ldquo;MD Imaging is dedicated to providing the highest quality medical imaging services in a safe and caring environment.&rdquo;<br />- Our Mission</p>

<?php echo do_shortcode('[mdi_parallax image="' . get_stylesheet_directory_uri() . '/assets/img/Couple1.jpg" id="couple"]<blockquote>MD Imaging is dedicated to providing the highest quality medical imaging services in a safe and caring environment.</blockquote>[/mdi_parallax]'); ?>
<?php //echo do_shortcode('[mdi_parallax image="' . get_stylesheet_directory_uri() . '/assets/img/mdi-parallax-woman-stretching.jpg" id="woman_stretching"]<h2>Celebrating 65 years of diagnostic exellence.</h2>[/mdi_parallax]') ?>

<section class="home__about-mdi">
  <div>
    <span class="initial">H</span>
    <h3>History</h3>
    <p>We’ve come a long way in 65 years. Dr. George Martin opened a radiology practice in 1951 that has today grown into a thriving company, offering complete diagnostic and women’s imaging services. With a history rooted in community, we continue to meet and exceed the growing needs of our patients and referring physicians.</p>
    <a href="<?php echo get_bloginfo('url'); ?>/history" class="button">Learn More</a>
  </div>
  <div>
    <span class="initial">S</span>
    <h3>Services</h3>
    <p>From X-ray to detailed MRI, we offer exceptional imaging technology that helps caregivers, patients, and their doctors make informed health care decisions. Owned by dedicated radiologists, we specialize in offering complete imaging services to give you answers when you need them most. Our equipment is leading-edge, often rivaling that found in urban centers.</p>
    <a href="<?php echo get_bloginfo('url'); ?>/services" class="button">Learn More</a>
  </div>
  <div>
    <span class="initial">R</span>
    <h3>Radiologists</h3>
    <p>When you are looking for answers about your health, you deserve to have the best experts on your side. Our highly qualified radiologists are here to serve you with compassion and skill. They are multi-specialized, board-certified, and many are fellowship trained in additional areas of expertise. It’s the knowledge and skill you can count on.</p>
    <a href="<?php echo get_bloginfo('url'); ?>/staff" class="button">Learn More</a>
  </div>
</section>


<script charset="utf-8">
  jQuery(document).ready(function($) {
    $(".header__full-width span, .home__tagline").each(function() {
      var wordArray = $(this).text().split(" ");
      if (wordArray.length > 1) {
        wordArray[wordArray.length-2] += "&nbsp;" + wordArray[wordArray.length-1];
        wordArray.pop();
        $(this).html(wordArray.join(" "));
      }
    });
  });
</script>

<?php the_content(); ?>

<?php get_footer(); ?>
