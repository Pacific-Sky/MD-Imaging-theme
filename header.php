<?php
/**
 * Header file common to all
 * templates
 *
 */

$colors = array(
	'mdi' => '#b9a77a',
	'wic' => '#9c3c6c',
	'vic' => '#31566c',
);
$homepages = array(
	'mdi' => '/',
	'wic' => '/womens-imaging-center',
	'vic' => '/vascular-interventional-center'
);
global $origin;
function mdi_get_department(){
	global $origin;
	$post_id = get_queried_object_id();
	if($post_id === 1 || $post_id === 0) {
		if(get_query_var('jobid')) {
			$post_id = get_query_var('jobid');
		}
	}
	$department = 'mdi';
	$ancestors = get_post_ancestors($post_id);
	$prep_categories = wp_get_post_terms($post_id, 'preparation_category');
	$department_tax = wp_get_post_terms($post_id, 'department');
	if(isset($_GET['department'])) {
		$department = $_GET['department'];
	}	elseif(isset($department_tax[0])) {
		$department = $department_tax[0]->slug;
	} elseif(isset($prep_categories[0])) {
		switch($prep_categories[0]->slug) {
			case 'vascular-interventional':
				$department = 'vic';
				break;
			case 'womens-imaging':
				$department = 'wic';
				break;
			default:
				$department = 'mdi';
				break;
		}
	} else {
		if(count($ancestors) === 0) {
			$origin = $post_id;
		} else {
			$origin = $ancestors[count($ancestors) - 1];
		}
		$origin = get_post($origin);
		if(is_object($origin)) {
			switch ($origin->post_name) {
				case 'vascular-interventional-center':
				$department = 'vic';
				break;
				case 'womens-imaging-center':
				$department = 'wic';
				break;
				default:
				$origin = get_post(get_option('page_on_front'));
				$department = 'mdi';
				break;
			}
		}
	}
	return $department;
}
global $mdi_department;
$mdi_department = mdi_get_department();

?>
<!doctype html>
<html class="site no-js" <?php language_attributes(); ?>>
<head>
	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<![endif]-->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>



	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/<?php echo $mdi_department; ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/<?php echo $mdi_department; ?>/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/<?php echo $mdi_department; ?>/favicon-16x16.png" sizes="16x16">
	<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/<?php echo $mdi_department; ?>/safari-pinned-tab.svg" color="<?php echo $colors[$mdi_department]; ?>">
	<meta name="theme-color" content="<?php echo $colors[$mdi_department]; ?>">
	<?php if(has_post_thumbnail()): ?>
		<meta property="og:image" content="<?php echo the_post_thumbnail_url( 'full' ); ?>" />
	<?php else: ?>
		<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo $mdi_department; ?>_og_image.jpg" />
	<?php endif; ?>
	<meta property="og:type" content="website" />
	<meta property="article:author" content="https://www.facebook.com/<?php echo mdi_facebook_id($mdi_department); ?>" />
	<meta property="article:publisher" content="https://www.facebook.com/<?php echo mdi_facebook_id($mdi_department); ?>" />



	<title><?php if(is_object($origin)): echo $origin->post_title; wp_title('|'); else: wp_title(''); endif;?></title>

	<?php // replace the no-js class to js on the html element ?>
	<script>document.documentElement.className=document.documentElement.className.replace(/\sno-js\s/,'js')</script>

	<?php // load the core js polyfills ?>
	<script async defer src="<?php echo get_template_directory_uri(); ?>/assets/js/core.js"></script>

	<?php wp_head(); ?>
</head>
<body <?php body_class( 'site__body ' . $mdi_department ); ?>>

	<?php if( current_user_can( 'edit_posts' ) ) edit_post_link( 'Edit' ); ?>

	<header class="site__header">
		<?php MOZ_Menu::nav_menu( 'departments' ); ?>

		<section class="header__main">

			<?php if($mdi_department === 'vic'): ?>
				<a href="tel:5302455945" class="header__call">
					<?php MOZ_SVG::svg('phone'); ?>
					Call Today: <br><em>530.245.5945</em>
				</a>
			<?php else: ?>
				<a href="tel:5302431249" class="header__call">
					<?php MOZ_SVG::svg('phone'); ?>
					Call Today: <br><em>530.243.1249</em>
				</a>
			<?php endif; ?>

			<a id="logo-wrapper" href="<?php echo get_bloginfo('url') . $homepages[$mdi_department]; ?>"><?php MOZ_SVG::svg('logo'); ?></a>

			<a class="header__appointment" href="<?php echo get_bloginfo('url'); ?>/request-an-appointment<?php echo $mdi_department === 'vic' ? '-vic?department=vic' : ''; ?>">
				<?php mdi_icon_appointment(date('j')); ?>
				Request an <br><em>Appointment</em>
			</a>

		</section>


		<?php MOZ_Menu::nav_menu( $mdi_department, array('menu_class' => 'menu--primary menu') ); ?>
	</header>
