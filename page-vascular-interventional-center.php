<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
$vic_staff_args = array('post_type' => 'staff', 'posts_per_page' => -1, 'tax_query' => array(array('taxonomy' => 'department', 'field' => 'slug', 'terms' => 'vic')));
$vic_staff = get_posts($vic_staff_args);
?>
<?php get_header(); ?>

<?php echo do_shortcode('[rev_slider alias="vic"]'); ?>

<p class="home__tagline">Whether you need a port placed before chemotherapy, relief from painful and unsightly varicose veins, or laser skin resurfacing to look the way you feel, the Vascular &amp; Interventional Center has everything you need. With a reputation for comfort and skill, let us show you the difference.</p>

<h2 class="header__full-width"><span>Experience the Difference</span></h2>

<p class="home__tagline">From clinical to cosmetic, our team of highly trained radiologists and knowledgeable, caring staff offer a diverse menu of services to benefit your every need.</p>

<section class="vic__services">
  <div class="vein-therapy"><a href="<?php echo get_bloginfo('url'); ?>/vascular-interventional-center/services/vein-therapy/">
		<?php echo mdi_shortcode_circle_figure(array(
      'caption' => "Vein Therapy",
      'background' => get_stylesheet_directory_uri() . '/assets/img/varicose-vein-ablation.png'
    )); ?>
    <p>Go ahead, wear shorts! You don’t have to live with unsightly or painful varicose or spider veins. We offer fast, simple, and non-surgical vein therapy options that requires no hospital stay or lengthy recovery. Don’t you think it’s time to love your legs (again)?</p>
  </a></div>
  <div class="skin-treatment"><a href="<?php echo get_bloginfo('url'); ?>/vascular-interventional-center/services/skin-treatment/">
		<?php echo mdi_shortcode_circle_figure(array(
      'caption' => "Skin Treatments",
      'background' => get_stylesheet_directory_uri() . '/assets/img/facial-services.png'
    )); ?>
    <p>If you’re like most of us, the years have been full - you’ve laughed, cried, and soaked up the sun. Our menu of skin treatments will help rewind the effects of age, acne, and sun exposure. We will help you look as young as you feel and bring out the beauty within.</p>
  </a></div>
  <div class="laser-hair-removal"><a href="<?php echo get_bloginfo('url'); ?>/vascular-interventional-center/services/laser-hair-removal/">
    <?php echo mdi_shortcode_circle_figure(array(
      'caption' => "Laser Hair Removal",
      'background' => get_stylesheet_directory_uri() . '/assets/img/laser-hair-removal.png'
    )); ?>
    <p>Are you embarrassed by unwanted hair? It’s time to throw away your razor and give us a call. Let us support your journey to higher self esteem with our popular, effective Clarity™ laser hair removal system. Permanent hair removal is the difference you can see.</p>
  </a></div>

  <a class="vic__services--all" href="<?php echo get_bloginfo('url'); ?>/vascular-interventional-center/services/">View All Services</a>
</section>

<h2 class="header__full-width"><span>What are Varicose Veins?</span></h2>

<p class="home__tagline">Varicose veins are enlarged, bulging superficial veins near the surface of the skin. They usually develop in the arms and legs due to weakness of the vein wall and poor functioning valves.</p>

<?php echo do_shortcode('[mdi_parallax image="' . get_stylesheet_directory_uri() . '/assets/img/vic-parallax-love-your-legs.jpg" id="love_your_legs"]<h2>Love Your Legs (again)</h2>[/mdi_parallax]') ?>

<div id="varicose_veins">
  <figure>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/varicose-veins.png" alt="" />
  </figure>
  <article>
    <h3>Healthy vs. Varicose Veins</h3>
    <p>Healthy veins carry blood upward, against gravity toward the heart. They have one-way valves to prevent blood from backing up. Valves can fail to close tightly, allowing blood to pool and cause varicose veins. Over time, varicose veins can continue to enlarge and may stretch out, twist, pouch, and thicken. Although the symptoms are normally only cosmetic, they are known to cause discomfort. </p>
    <p>As the North State’s only comprehensive vein treatment center, our specialists offer many effective, non-surgical treatments for varicose veins. </p>
  </article>
</div>

<a href="<?php echo get_bloginfo('url'); ?>/vascular-interventional-center/services/vein-therapy/" class="button varicose_veins__learn-more">Learn More</a>

<h2 class="header__full-width"><span>What is Laser Hair Removal?</span></h2>

<p class="home__tagline">Laser hair removal uses heat from a laser beam to permanently disable hair follicles, prevent re-growth, and create a lasting smoothness both men and women appreciate. The treatment is safe and effective, especially when delivered by experienced technicians. </p>


<?php echo do_shortcode('[mdi_parallax image="' . get_stylesheet_directory_uri() . '/assets/img/vic-parallax-look-good-feel-good.jpg" id="look_good_feel_good"]<h2>Laser Hair Removal for Every Body</h2>[/mdi_parallax]') ?>

<div id="hair_removal">
  <figure>
    <figcaption>Women</figcaption>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/vic-hair-removal-female.jpg" alt="">
    <p>Women delight in the confidence boost and convenience of permanent hair removal. The most commonly treated areas for women include:</p>
    <ul>
      <li>Face</li>
      <li>Neck</li>
      <li>Underarms</li>
      <li>Bikini area</li>
      <li>Legs </li>
    </ul>
  </figure>
  <figure>
    <figcaption>Men</figcaption>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/vic-hair-removal-male.jpg" alt="">
    <p>Men enjoy the smooth results of laser hair removal as an alternative to itchy regrowth and painful bumps from shaving. Commonly treated areas include:</p>
    <ul>
      <li>Face</li>
      <li>Neck</li>
      <li>Back</li>
      <li>Chest</li>
      <li>Buttocks</li>
    </ul>
  </figure>
</div>

<a class="hair_removal__learn-more button" href="<?php echo get_bloginfo('url'); ?>/vascular-interventional-center/services/laser-hair-removal/">Learn more</a>

<h2 class="header__full-width"><span>Qualified Specialists</span></h2>

<p class="vic__tagline">With the ongoing advancements in interventional radiology (IR), it’s important that our experts have only the highest levels of knowledge and experience. Our team of radiologists are fellowship trained in IR, Board Certified with the American Board of Radiology, and have earned a Certificate of Added Qualification (CAQ) in Vascular and Interventional Radiology from the same board. Every service and procedure offered at the Vascular & Interventional Center is supported by leading-edge equipment and our commitment to offering you the very best experience.</p>


<section class="vic__staff">
  <?php foreach($vic_staff as $staff): ?>
    <figure class="staff"><a href="<?php echo get_the_permalink($staff->ID); ?>">
      <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($staff->ID), 'thumbnail_large')[0]; ?>" alt="" />
      <figcaption><?php echo $staff->post_title; ?></figcaption>
    </a></figure>
  <?php endforeach; ?>
  <a href="<?php echo get_bloginfo('url'); ?>/staff/vic" class="vic__staff--all">Learn More</a>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>
