<?php
/**
 * Theme Functions &
 * Functionality
 *
 */


/* =========================================
		ACTION HOOKS & FILTERS
	 ========================================= */

/**--- Actions ---**/

add_action( 'after_setup_theme',	'theme_setup' );

add_action( 'wp_enqueue_scripts', 'theme_styles' );

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// expose php variables to js. just uncomment line
// below and see function theme_scripts_localize
// add_action( 'wp_enqueue_scripts', 'theme_scripts_localize', 20 );

/**--- Filters ---**/



/* =========================================
		HOOKED Functions
	 ========================================= */

/**--- Actions ---**/


/**
 * Setup the theme
 *
 * @since 1.0
 */
if ( ! function_exists( 'theme_setup' ) ) {
	function theme_setup() {

		// Let wp know we want to use html5 for content
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		) );


		add_theme_support( 'post-thumbnails' );


		// Register navigation menus for theme
		register_nav_menus( array(
			'departments' => 'Departments Menu',
			'mdi' => 'Main Menu',
			'vic' => 'VIC Menu',
			'wic' => 'WIC Menu'
		) );

		register_sidebar(array(
			'name' => 'Footer',
			'id' => 'footer',
			'description' => 'Footer Widgets',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			 'after_widget'	=> '</li>',
			 'before_title'	=> '<h2 class="widgettitle">',
			 'after_title'	 => '</h2>',
		));

		add_filter( 'widget_text', 'shortcode_unautop' );
		add_filter( 'widget_text', 'do_shortcode' );




		// Let wp know we are going to handle styling galleries
		/*
		add_filter( 'use_default_gallery_style', '__return_false' );
		*/


		// Stop WP from printing emoji service on the front
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );


		// Remove toolbar for all users in front end
		show_admin_bar( false );


		// Add Custom Image Sizes


		add_image_size( 'article_header', 1800, 700, array( 'center', 'center' ) );

		add_image_size( 'thumbnail_large', 500, 500, array( 'center', 'center' ) );


		// WPML configuration
		// disable plugin from printing styles and js
		// we are going to handle all that ourselves.
		define( 'ICL_DONT_LOAD_NAVIGATION_CSS', true );
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
		define( 'ICL_DONT_LOAD_LANGUAGES_JS', true );


		// Contact Form 7 Configuration needs to be done
		// in wp-config.php. add the following snippet
		// under the line:
		// define( 'WP_DEBUG', false );
		/*
		//Contact Form 7 Plugin Configuration
		define ( 'WPCF7_LOAD_JS',	false ); // Added to disable JS loading
		define ( 'WPCF7_LOAD_CSS', false ); // Added to disable CSS loading
		define ( 'WPCF7_AUTOP',		false ); // Added to disable adding <p> & <br> in form output
		*/


		// Register Autoloaders Loader
		$theme_dir = get_template_directory();
		include "$theme_dir/library/library-loader.php";
		include "$theme_dir/includes/includes-loader.php";
		include "$theme_dir/components/components-loader.php";
	}
}


/**
 * Register and/or Enqueue
 * Styles for the theme
 *
 * @since 1.0
 */
if ( ! function_exists( 'theme_styles' ) ) {
	function theme_styles() {
		$theme_dir = get_stylesheet_directory_uri();

		wp_enqueue_style( 'main', "$theme_dir/assets/css/main.css", array(), null, 'all' );
	}
}


/**
 * Register and/or Enqueue
 * Scripts for the theme
 *
 * @since 1.0
 */
if ( ! function_exists( 'theme_scripts' ) ) {
	function theme_scripts() {
		$theme_dir = get_stylesheet_directory_uri();

		wp_enqueue_script( 'main', "$theme_dir/assets/js/main.js", array( 'jquery' ), null, true );
	}
}


/**
 * Attach variables we want
 * to expose to our JS
 *
 * @since 3.12.0
 */
if ( ! function_exists( 'theme_scripts_localize' ) ) {
	function theme_scripts_localize() {
		$ajax_url_params = array();

		// You can remove this block if you don't use WPML
		if ( function_exists( 'wpml_object_id' ) ) {
			/** @var $sitepress SitePress */
			global $sitepress;

			$current_lang = $sitepress->get_current_language();
			wp_localize_script( 'main', 'i18n', array(
				'lang' => $current_lang
			) );

			$ajax_url_params['lang'] = $current_lang;
		}

		wp_localize_script( 'main', 'urls', array(
			'home'	=> home_url(),
			'theme' => get_stylesheet_directory_uri(),
			'ajax'	=> add_query_arg( $ajax_url_params, admin_url( 'admin-ajax.php' ) )
		) );
	}
}

// Register Custom Post Type
function mdi_register_post_type_staff() {

	$labels = array(
		'name'									=> 'Staff Members',
		'singular_name'				 => 'Staff',
		'menu_name'						 => 'Staff Members',
		'name_admin_bar'				=> 'Staff Member',
		'archives'							=> 'Item Archives',
		'parent_item_colon'		 => 'Parent Item:',
		'all_items'						 => 'All Items',
		'add_new_item'					=> 'Add New Staff',
		'add_new'							 => 'Add New',
		'new_item'							=> 'New Staff Member',
		'edit_item'						 => 'Edit Staff Member',
		'update_item'					 => 'Update Staff Member',
		'view_item'						 => 'View Staff Member',
		'search_items'					=> 'Search Staff Member',
		'not_found'						 => 'Not found',
		'not_found_in_trash'		=> 'Not found in Trash',
		'featured_image'				=> 'Featured Image',
		'set_featured_image'		=> 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'		=> 'Use as featured image',
		'insert_into_item'			=> 'Insert into staff member',
		'uploaded_to_this_item' => 'Uploaded to this staff member',
		'items_list'						=> 'Staff member list',
		'items_list_navigation' => 'Staff member list navigation',
		'filter_items_list'		 => 'Filter staff member list',
	);
	$args = array(
		'label'								 => 'Staff',
		'description'					 => 'MDI Staff',
		'labels'								=> $labels,
		'supports'							=> array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'					=> false,
		'public'								=> true,
		'show_ui'							 => true,
		'show_in_menu'					=> true,
		'menu_position'				 => 5,
		'show_in_admin_bar'		 => true,
		'show_in_nav_menus'		 => true,
		'can_export'						=> true,
		'has_archive'					 => true,
		'exclude_from_search'	 => false,
		'publicly_queryable'		=> true,
		'capability_type'			 => 'page',
		'menu_icon'						=> 'dashicons-groups'
	);
	register_post_type( 'staff', $args );

}
add_action( 'init', 'mdi_register_post_type_staff', 0 );

// Register Custom Taxonomy
function mdi_register_taxonomy_departments() {

	$labels = array(
		'name'											 => 'Departments',
		'singular_name'							=> 'Department',
		'menu_name'									=> 'Department',
		'all_items'									=> 'All Departments',
		'parent_item'								=> 'Parent Department',
		'parent_item_colon'					=> 'Parent Department:',
		'new_item_name'							=> 'New Department Name',
		'add_new_item'							 => 'Add New Department',
		'edit_item'									=> 'Edit Department',
		'update_item'								=> 'Update Department',
		'view_item'									=> 'View Department',
		'separate_items_with_commas' => 'Separate departments with commas',
		'add_or_remove_items'				=> 'Add or remove departments',
		'choose_from_most_used'			=> 'Choose from the most used',
		'popular_items'							=> 'Popular Departments',
		'search_items'							 => 'Search Departments',
		'not_found'									=> 'Not Found',
		'no_terms'									 => 'No departments',
		'items_list'								 => 'Departments list',
		'items_list_navigation'			=> 'Departments list navigation',
	);
	$args = array(
		'labels'										 => $labels,
		'hierarchical'							 => false,
		'public'										 => true,
		'show_ui'										=> true,
		'show_admin_column'					=> true,
		'show_in_nav_menus'					=> true,
		'show_tagcloud'							=> true,
	);
	register_taxonomy( 'department', array( 'staff', 'job', 'preparation' ), $args );

}
add_action( 'init', 'mdi_register_taxonomy_departments', 0 );





// Register Custom Post Type
function mdi_register_post_type_preparation() {

	$labels = array(
		'name'									=> 'Preparations',
		'singular_name'				 => 'Preparation',
		'menu_name'						 => 'Preparations',
		'name_admin_bar'				=> 'Preparation',
		'archives'							=> 'Item Archives',
		'parent_item_colon'		 => 'Parent Item:',
		'all_items'						 => 'All Items',
		'add_new_item'					=> 'Add New Preparation',
		'add_new'							 => 'Add New',
		'new_item'							=> 'New Preparation',
		'edit_item'						 => 'Edit Preparation',
		'update_item'					 => 'Update Preparation',
		'view_item'						 => 'View Preparation',
		'search_items'					=> 'Search Preparation',
		'not_found'						 => 'Not found',
		'not_found_in_trash'		=> 'Not found in Trash',
		'featured_image'				=> 'Featured Image',
		'set_featured_image'		=> 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'		=> 'Use as featured image',
		'insert_into_item'			=> 'Insert into preparation',
		'uploaded_to_this_item' => 'Uploaded to this preparation',
		'items_list'						=> 'Preparation list',
		'items_list_navigation' => 'Preparation list navigation',
		'filter_items_list'		 => 'Filter preparation list',
	);
	$args = array(
		'label'								 => 'Preparation',
		'description'					 => 'Exam Preparation',
		'labels'								=> $labels,
		'supports'							=> array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'					=> false,
		'public'								=> true,
		'show_ui'							 => true,
		'show_in_menu'					=> true,
		'menu_position'				 => 5,
		'show_in_admin_bar'		 => true,
		'show_in_nav_menus'		 => true,
		'can_export'						=> true,
		'has_archive'					 => true,
		'exclude_from_search'	 => false,
		'publicly_queryable'		=> true,
		'capability_type'			 => 'page',
		'menu_icon' => 'dashicons-editor-ul'
	);
	register_post_type( 'preparation', $args );

}
add_action( 'init', 'mdi_register_post_type_preparation', 0 );

// Register Custom Taxonomy
function mdi_register_taxonomy_preparation_categories() {

	$labels = array(
		'name'											 => 'Preparation Categories',
		'singular_name'							=> 'Preparation Category',
		'menu_name'									=> 'Preparation Category',
		'all_items'									=> 'All Preparation Categories',
		'parent_item'								=> 'Parent Preparation Category',
		'parent_item_colon'					=> 'Parent Preparation Category:',
		'new_item_name'							=> 'New Preparation Category Name',
		'add_new_item'							 => 'Add New Preparation Category',
		'edit_item'									=> 'Edit Preparation Category',
		'update_item'								=> 'Update Preparation Category',
		'view_item'									=> 'View Preparation Category',
		'separate_items_with_commas' => 'Separate preparation categories with commas',
		'add_or_remove_items'				=> 'Add or remove preparation categories',
		'choose_from_most_used'			=> 'Choose from the most used',
		'popular_items'							=> 'Popular Preparation Categories',
		'search_items'							 => 'Search Preparation Categories',
		'not_found'									=> 'Not Found',
		'no_terms'									 => 'No preparation categories',
		'items_list'								 => 'Preparation Categories list',
		'items_list_navigation'			=> 'Preparation Categories list navigation',
	);
	$args = array(
		'labels'										 => $labels,
		'hierarchical'							 => false,
		'public'										 => true,
		'show_ui'										=> true,
		'show_admin_column'					=> true,
		'show_in_nav_menus'					=> true,
		'show_tagcloud'							=> true,
	);
	register_taxonomy( 'preparation_category', array( 'preparation' ), $args );

}
add_action( 'init', 'mdi_register_taxonomy_preparation_categories', 0 );


add_shortcode('mdi_social', 'mdi_shortcode_social');

function mdi_shortcode_social() {

	ob_start();

	?>
	<a href=""><?php MOZ_SVG::svg('facebook'); ?></a>
	<!-- <a href=""><?php MOZ_SVG::svg('twitter'); ?></a>
	<a href=""><?php MOZ_SVG::svg('google'); ?></a> -->

	<?php

	return ob_get_clean();
}


add_shortcode('mdi_footer_location', 'mdi_shortcode_footer_location');

function mdi_shortcode_footer_location() {
	global $mdi_department;

	switch($mdi_department) {

	}

	ob_start();

	?>

	<div id="footer_location">

		<figure style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo $mdi_department; ?>_exterior_square.jpg')"></figure>

		<?php if($mdi_department === 'vic'): ?>
			<address>
				2650 Edith Ave<br />
				Redding, CA 96001
			</address>
		<?php else: ?>
			<address>
				2020 Court Street<br />
				Redding, CA 96001
			</address>
		<?php endif; ?>

		<?php if($mdi_department === 'vic'): ?>
			<a href="tel:18773122687">530.245.5945</a>
		<?php else: ?>
			<a href="tel:18007949729">1.800.794.XRAY (9729)</a>
			<a href="tel:5302431249">530.243.1249</a><br>
		<?php endif; ?>

	</div>

	<?php

	return ob_get_clean();

}


function my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter('the_content', 'my_formatter', 99);

function mdi_shortcode_parallax($atts, $content) {
	$atts = extract( shortcode_atts( array(
		'id' => '',
		'image' => ''
	), $atts ) );
	ob_start();

	?>

	<div class="parallax" id="<?php echo $id; ?>">
		<div class="image" style="background-image: url('<?php echo $image; ?>')"></div>
		<?php echo do_shortcode($content); ?>
	</div>

	<?php

	return ob_get_clean();

}
add_shortcode('mdi_parallax','mdi_shortcode_parallax');


function mdi_shortcode_exam_prep_selector($atts) {

	$atts = extract( shortcode_atts( array(
		'category' => false
	), $atts ) );

	$args = array(
		'taxonomy' => 'preparation_category'
	);

	if($category) {
		$args['slug'] = explode(',', $category);
	}

	$preparation_categories = get_terms($args);

	ob_start();

	if(!$category) {
		?>

		<select id="preparation_category">
			<option value="">- select the type of exam -</option>
			<?php foreach($preparation_categories as $preparation_category): ?>
				<option value="<?php echo $preparation_category->slug; ?>"><?php echo $preparation_category->name; ?></option>
			<?php endforeach; ?>
		</select>

		<?php
	}

	foreach ($preparation_categories as $preparation_category):
		$preparations = get_posts(array(
			'post_type' => 'preparation',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'preparation_category',
					'field' => 'slug',
					'terms' => $preparation_category->slug
				)
			)
		));
		?>
		<div id="<?php echo $preparation_category->slug; ?>" class="preparation_category" style="<?php echo $category ? '' : 'display: none;' ?>">
			<select>
				<option value="">- select the specific exam -</option>
				<?php foreach($preparations as $preparation): ?>
					<option value="<?php echo get_permalink($preparation->ID); ?>"><?php echo $preparation->post_title; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<?php endforeach;

	?>

	<script charset="utf-8">
		jQuery(document).ready(function($) {
			$('#preparation_category').change(function (event) {
				$('.preparation_category').slideUp();
				$('#' + event.target.value).slideDown();
			});
			$('.preparation_category select').change(function (event) {
				window.location.href = event.target.value;
			});
		});
	</script>

	<?php


	return ob_get_clean();

	// do shortcode actions here
}
add_shortcode('mdi_exam_prep_selector','mdi_shortcode_exam_prep_selector');

function mdi_shortcode_circle_figure ($atts) {
	$atts = extract( shortcode_atts( array(
		'caption' => '',
		'background' => ''
	), $atts ) );

	ob_start();

	?>
	<figure class="figure__circle">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310.4 310.7" style="background-image: url('<?php echo $background; ?>');background-position: center center; background-size: cover;background-repeat: no-repeat;border-radius:50%;overflow: hidden;">
			<path d="M155.2,0C69.6,0,0,69.7,0,155.3s69.6,155.3,155.2,155.3c85.6,0,155.2-69.7,155.2-155.3S240.8,0,155.2,0z M24.1,215 c-8.3-18-12.9-38.4-12.9-59.6c0-79.5,64.6-144.2,144-144.2s144,64.7,144,144.2c0,21.3-4.6,41.6-12.9,59.6H24.1z"/>
		</svg>
		<figcaption><?php echo $caption; ?></figcaption>
	</figure>
	<?php

	return ob_get_clean();
}
add_shortcode('mdi_circle_figure', 'mdi_shortcode_circle_figure');


function mdi_shortcode_box_service ($atts, $content) {
	$atts = extract(shortcode_atts(array(
		'title' => '',
		'figcaption' => '',
		'image' => '',
		'link' => ''
	), $atts));
	ob_start();

	?>

	<div class="box__service">
		<?php echo mdi_shortcode_circle_figure(array(
			'caption' => $figcaption,
			'background' => $image
		)); ?>
		<div class="box__content">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $content; ?></p>
			<a class="button" href="<?php echo $link; ?>">Learn More</a>
		</div>
	</div>

	<?php

	return ob_get_clean();
}
add_shortcode('mdi_box_service', 'mdi_shortcode_box_service');

function mdi_shortcode_box_history ($atts, $content) {
	$atts = extract(shortcode_atts(array(
		'year' => '',
		'image' => ''
	), $atts));
	ob_start();
	?>
	<div class="box__history">
		<h3><?php echo $year; ?></h3>
		<figure>
			<img src="<?php echo $image; ?>" alt="" />
		</figure>
		<div class="box__content"><?php echo $content; ?></div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('mdi_box_history', 'mdi_shortcode_box_history');

function mdi_shortcode_box_staff ($atts, $content) {
	$atts = extract(shortcode_atts(array(
		'name' => '',
		'image' => '',
		'link' => '',
		'department' => 'mdi'
	), $atts));
	ob_start();
	?>
	<div class="box__staff <?php echo $department; ?>"><a href="<?php echo $link ?>">
		<h3><?php echo $name; ?></h3>
		<figure>
			<img src="<?php echo $image; ?>" alt="" alt="" />
		</figure>
		<div class="box__content"><?php echo $content; ?></div>
	</a></div>
	<?php
	return ob_get_clean();
}
add_shortcode('mdi_box_staff', 'mdi_shortcode_box_staff');


function mdi_shortcode_video_service($atts, $content) {
	$atts = extract(shortcode_atts(array(
		'link' => '',
		'image' => '',
		'name' => 'this service',
		'size' => 300,
		'breaker' => false
	), $atts));
	ob_start();
	?>
	<?php if($breaker) echo '<hr class="breaker" />'; ?>
	<figure class="video--service" style="max-width: <?php echo $size; ?>px;max-width: calc(<?php echo $size; ?>px + 2rem);">
		<a href="<?php echo $link; ?>" target="_blank">
			<img class="alignright size-medium" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" width="<?php echo $size; ?>" height="<?php echo $size; ?>" />
		</a>
		<figcaption>Learn more about <?php echo $name; ?> here</figcaption>
	</figure>
	<?php
	return trim(preg_replace('/\s\s+/', ' ', ob_get_clean()));
}
add_shortcode('mdi_video_service', 'mdi_shortcode_video_service');


function mdi_rewrite_staff() {
	$departments = get_terms('department');
	function reduce_to_name($item) { return $item->slug; }
	$departments = array_map('reduce_to_name', $departments);
	$departments = implode('|', $departments);
	add_rewrite_rule("^staff/($departments)/?", 'index.php?staff_department=$matches[1]', 'top');
}
add_action('init', 'mdi_rewrite_staff');

function mdi_query_staff($query_vars) {
	$query_vars[] = 'staff_department';
	return $query_vars;
}
add_action('query_vars', 'mdi_query_staff');

function mdi_parse_request_staff(&$wp) {
	if(isset($wp->query_vars['staff_department'])) {
		$wp->query_vars = array(
			'post_type' => 'staff',
			'tax_query' => array(
				array(
					'taxonomy' => 'department',
					'field' => 'slug',
					'terms' => $wp->query_vars['staff_department']
				)
			)
		);
		add_filter('template_include', create_function('$a', 'return locate_template(array("archive-staff.php"));'));
	}
	return;
}
add_action('parse_request', 'mdi_parse_request_staff');


function mdi_staff_query($query) {
	if(isset($query->query_vars['post_type']) && $query->query_vars['post_type'] === 'staff') {
		$query->set('posts_per_page', -1);
	}
	return $query;
}
add_filter('pre_get_posts', 'mdi_staff_query');

function mdi_icon_appointment($day = false) {
	// Returns an SVG icon of a desk calendar with the current day
	if(!$day) $day = date('j');
	ob_start();
	?>
	<svg id="icon--appointment" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
	  <defs>
	    <style>
	      .appointment-stroke {
	        fill: none;
	        stroke-miterlimit: 10;
	        stroke-width: 70px;
	      }

	      .appointment-text {
	        font-size: 190px;
	        font-family: Lato;
					font-weight: bold;
	        letter-spacing: 0.1em;
					text-anchor: middle;
	      }
	    </style>
	  </defs>
	  <path class="icon-path" d="M387.84,171.81v209h-280v-209h280m70-70H37.8v349h420v-349Z"/>
	  <line class="appointment-stroke icon-stroke" x1="152.81" y1="41.8" x2="152.81" y2="182.81"/>
	  <line class="appointment-stroke icon-stroke" x1="343" y1="41.8" x2="343" y2="182.81"/>
	  <text class="appointment-text icon-text" transform="translate(245.39 345.09)"><?php echo (string) $day; ?></text>
	</svg>
	<?php
	echo ob_get_clean();
}

function mdi_facebook_id ($mdi_department) {
	switch ($mdi_department) {
		default:
			$page_id = '173788265995343';
			break;
	}
	return $page_id;
}

function mdi_facebook_feed () {
	global $mdi_department;
	$page_id = mdi_facebook_id($mdi_department);
	return do_shortcode("[facebook-feed page_id='{$page_id}' post_limit='3']");
}
add_shortcode('mdi_facebook_feed', 'mdi_facebook_feed');

date_default_timezone_set('America/Los_Angeles');
