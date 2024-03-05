<?php
/*
Plugin Name:orWidget
Description: Custom widget for Elementor
Version: 1.0
Author: Davide
*/

// Register the custom widgets with Elementor
add_filter('get_the_excerpt', function ($excerpt) {

	$excerpt_length = 40; // Change excerpt length 

	global $post;

	if (
		is_archive() || is_search()
	) {
		$post = get_post();
	}

	if (
		has_excerpt($post)
	) {
	} else {
		$content = get_the_content();
		$first_word = substr($content, 0, strpos($content, ' '));
		$content = substr($content, strpos($content, ' ') + 2);
		$excerpt = wp_trim_words($content, $excerpt_length);
		$excerpt = $first_word . ' ' . $excerpt;
	}

	return $excerpt;
}, 10, 2);
add_action('elementor/widgets/widgets_registered', 'register_OpenElementorWidget_widgets');

function add_elementor_widget_categories($elements_manager)
{

	$elements_manager->add_category(
		'OpenWidget',
		[
			'title' => esc_html__('OpenWidget', 'open-elementor-widget'),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');
function register_OpenElementorWidget_widgets($widgets_manager)
{
	// Include and register the latest-posts-hover widget
	require_once(plugin_dir_path(__FILE__) . 'widgets/Latest-Posts-Hover.php');
	$widgets_manager->register_widget_type(new \Latest_Posts_Hover_Widget());
}
