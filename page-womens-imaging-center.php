<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
?>
<?php get_header(); ?>

<?php echo do_shortcode('[rev_slider alias="wic"]'); ?>

<h2 class="header__full-width"><span>Complete Breast Care</span></h2>

<p class="home__tagline">Whether you are called grandma, daughter, mother, or sister, we know you work hard caring for others. That’s why you come first at the Women’s Imaging Center at MD Imaging. Built with you in mind, our center offers complete breast care services, including 3D mammography and breast ultrasound, biopsy, and MRI. <a href="#dr_bauer">Dr. Bauer</a> and our caring team are dedicated to your comfort. From registration through your exam, you will be supported by experienced staff and advanced technology. It is our privilege to partner with you in your search for answers or peace of mind. </p>

<section class="wic__services" id="wic__services">
  <div class="ultrasound">
    <?php echo mdi_shortcode_circle_figure(array(
      'caption' => "Ultrasound",
      'background' => get_stylesheet_directory_uri() . '/assets/img/flower_1.jpg'
    )); ?>
    <p>It is not uncommon for a mammogram to reveal an area that a radiologist would like to view more closely. Ultrasound (or a sonogram) uses high frequency sound waves to aid mammography by giving the radiologist different views of the area of concern. This supports diagnosis and helps determine if further testing is needed. Ultrasound is also a supplemental breast screening tool for pregnant women, or women who should avoid mammography.</p>
  </div>
  <div class="biopsy">
    <?php echo mdi_shortcode_circle_figure(array(
      'caption' => "Biopsy",
      'background' => get_stylesheet_directory_uri() . '/assets/img/flower_2.jpg'
    )); ?>
    <p>When an abnormality is discovered in the breast, a needle core biopsy may be recommended. A biopsy is an minimally invasive procedure performed under image guidance to obtain a tissue sample. The sample is sent to  pathology for diagnosis, and results are usually received within 2 to 3 working days. We offer two types of image-guided biopsy, and your radiologist will determine and perform the technique that is most appropriate for you.</p>
  </div>
  <div class="breast-mri">
    <?php echo mdi_shortcode_circle_figure(array(
      'caption' => "MRI",
      'background' => get_stylesheet_directory_uri() . '/assets/img/flower_3.jpg'
    )); ?>
    <p>Breast magnetic resonance imaging (MRI) is an imaging technique using a strong magnetic field, radio wave pulses, and computer processing to create precise images within the breasts and surrounding structures. Breast MRI is best for screening high-risk women, determining the extent of cancer after diagnosis, or providing more information following abnormal mammogram results. MRI is a safe, valuable test that aids mammography.</p>
  </div>
</section>

<h2 class="header__full-width" id="dr_bauer_header"><span>Meet the Doctor</span></h2>


<section id="dr_bauer">
  <figure>
    <img width="200" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dr_bauer.jpg" alt="A woman with auburn hair wearing a necklace smiling. She is confident because she is highly qualified.">
    <figcaption>Ewa B. Bauer, M.D.</figcaption>
  </figure>
  <h3>Dr. Ewa Bauer: compassion comes first</h3>
  <p>Radiologist Ewa Bauer meets patients with warmth and compassion. As a patient advocate, Dr. Bauer skillfully matches technology with sensitivity, which can make all the difference during uncertain times. She most often sees patients who need advanced testing following abnormal exam results or when they first learn they have cancer. Dr. Bauer is a local Health Care Hero award recipient with a solid reputation that prompted several of her patients and our own staff to nominate her for the honor. Dr. Bauer not only partners with patients in finding answers, she reassures them that there are solutions.</p>
  <h3>Board Certification</h3>
  <p>American Board of Radiology</p>
  <h3>Specialty</h3>
  <p>Breast Imaging, MRI/CT, Positron Emission Tomography</p>
  <h3>Awards</h3>
  <p>Health Hero's Award 2014 - Redding Record Searchlight</p>
</section>

<?php echo do_shortcode('[mdi_parallax image="' . get_stylesheet_directory_uri() . '/assets/img/wic_intro.jpg" id="wic_intro"]<h2>Because you deserve the best, it\'s our standard.</h2>[/mdi_parallax]') ?>

<h2 class="header__full-width" id="genius_header"><span>3D Mammography leads the way to early detection</span></h2>

<section id="genius_about">
  <figure><a href="http://mygenius3d.com/what-is-3d/" target="_blank">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/circle_woman.png" alt="A woman emerging from a pink porthole" width="200">
    <figcaption>Learn more about Genius 3D Mammography</figcaption>
  </a></figure>
  <p>Because optimal outcomes begin with early detection, you deserve superior screening technology. Our Genius 3D mammography&trade; system allows radiologists to view breast tissue in a way never before possible. 3D mammography, or breast tomosynthesis, converts digital breast images into a stack of very thin layers. This means radiologists can examine your breast tissue in fine detail, unmasked by the tissue above or below. Approved by the FDA and clinically proven, Genius 3D technology provides the most accurate mammogram available. Because every woman deserves the best, we were the first to introduce this technology to our community. It’s our commitment to you.</p>
  <p>3D mammography is the cornerstone of our complete screening mammogram. Complete screenings are the best way to ensure accurate diagnosis. This means our screening mammograms combine the benefit of digital and 3D mammography, and Second Look computer-aided technology into a single exam. Whether it’s your first or tenth mammogram, complete screenings are our standard - every time.</p>
  <p>When abnormalities of the breast are found during a mammogram, your radiologists may recommend further exam by ultrasound, biopsy, or MRI. These tools enhance mammogram results by providing more information and supporting accurate diagnosis.</p>
</section>

<section id="genius_graphics">
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/transparent_layers.png" alt="" width="100">
    <figcaption>A more accurate way to screen for breast cancer</figcaption>
  </figure>
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/41_percent.png" alt="" width="100">
    <figcaption>Detects 41% more invasive breast cancers and reduces callbacks by up to 40%</figcaption>
  </figure>
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pink_us.png" alt="" width="100">
    <figcaption>It's already available on over 3,000 systems and in all 50 states</figcaption>
  </figure>
</section>


<h2 class="header__full-width"><span>Schedule an Appointment or Learn More</span></h2>

<div id="wic__scheduling">
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/wic_pointer.svg" alt="" />
    <figcaption>
      <h3>Schedule Online</h3>
      <p>Make an appointment for your<br>complete screening mammogram</p>
      <a class="button" href="<?php echo get_bloginfo('url'); ?>/womens-imaging-center/request-an-appointment/">Schedule Now</a>
    </figcaption>
  </figure>
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/wic_phone.svg" alt="" />
    <figcaption>
      <h3>Schedule by Phone</h3>
      <p>Call our scheduling center<br>to make an appointment today!</p>
      <a href="tel:5302431297">530.243.1297</a>
    </figcaption>
  </figure>
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/wic_prepare.svg" alt="" />
    <figcaption>
      <h3>How to Prepare</h3>
      <p>See what you need before<br>your appointment:</p>
      <a class="button" href="<?php echo get_bloginfo('url'); ?>/womens-imaging-center/patient-center">See What's Needed</a>
    </figcaption>
  </figure>
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/wic_question.svg" alt="" />
    <figcaption>
      <h3>Questions?</h3>
      <p>If you have any questions give<br>our friendly staff a call at:</p>
      <a href="tel:5302431249">530.243.1249</a>
    </figcaption>
  </figure>
</div>

<?php echo do_shortcode('[mdi_parallax image="' . get_stylesheet_directory_uri() . '/assets/img/wic_fish.jpg" id="wic_fish"]<h2>&nbsp;</h2>[/mdi_parallax]') ?>

<?php the_content(); ?>

<?php get_footer(); ?>
