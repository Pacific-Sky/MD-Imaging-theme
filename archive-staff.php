<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 */
// preg_match("/(\w+)\s(?:(\w.?)\s)?(\w+)(?:,\s((?:\w.?)*))?/i", $input_line, $output_array);
$name_regex = '/(\w+)\s(?:(\w.?)\s)?(\w+)(?:,\s((?:\w.?)*))?/i';
global $wp_query;
$department = 'All';
$tax_query = array();
if(isset($wp_query->query['tax_query'])) {
	$tax_query = $wp_query->query['tax_query'];
	$department = $wp_query->query['tax_query'][0]['terms'];
	$department = get_term_by('slug', $department, 'department')->name;
}
$results = $wp_query->get_posts();
if($department === 'All') {
	$sorted_results = array(
		'mdi' => array(),
		'wic' => array(),
		'vic' => array(),
	);
} else {
	$sorted_results = array();
}
foreach ($results as $staff) {
	preg_match_all($name_regex, $staff->post_title, $name_components);
	$last_name = $name_components[3][0];
	if($department === 'All') {
		$staff_department = wp_get_post_terms($staff->ID, 'department')[0]->slug;
		$sorted_results[$staff_department][$last_name] = $staff;
	} else {
		$sorted_results[$last_name] = $staff;
	}
}

if($department === 'All') {
	// foreach ($sorted_results as &$members) {
	// 	ksort($members);
	// }
} else {
	ksort($sorted_results);
}

?>
<?php get_header(); ?>

<main class="page--archive archive--staff">
	<h1><?php echo $department; ?> Specialists</h1>
	<?php if($department === 'All'): ?>
		<?php foreach($sorted_results as $dept => $members): ksort($members); ?>
		<h2 class="<?php echo $dept; ?>" style="width: 100%; float: left"><?php echo strtoupper($dept); ?> Specialists</h2>
		<?php foreach($members as $post): setup_postdata($post);
			$departments = wp_get_post_terms(get_the_ID(), 'department');
			ob_start();
			?>
			[mdi_box_staff
				name="<?php the_title(); ?>"
				image="<?php the_post_thumbnail_url('thumbnail_large') ?>"
				link="<?php the_permalink(); ?>"
				department="<?php echo isset($departments[0]) ? $departments[0]->slug : ''; ?>"
			]
			<?php echo substr(wp_strip_all_tags(get_the_content()), 0, 150); ?>&hellip;
			[/mdi_box_staff]
			<?php echo do_shortcode(ob_get_clean()); ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<?php foreach($sorted_results as $post): setup_postdata($post);
		$departments = wp_get_post_terms(get_the_ID(), 'department');
		ob_start();
		?>
		[mdi_box_staff
			name="<?php the_title(); ?>"
			image="<?php the_post_thumbnail_url('thumbnail_large') ?>"
			link="<?php the_permalink(); ?>"
			department="<?php echo isset($departments[0]) ? $departments[0]->slug : ''; ?>"
		]
		<?php echo substr(wp_strip_all_tags(get_the_content()), 0, 150); ?>&hellip;
		[/mdi_box_staff]
		<?php echo do_shortcode(ob_get_clean()); ?>
		<?php endforeach; ?>
	<?php endif; ?>
</main>

<?php wp_reset_postdata(); get_footer(); ?>
