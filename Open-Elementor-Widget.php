<?php
/*
Plugin Name: OpenElementorWidget
Description: Custom widget for Elementor
Version: 1.0
Author: Davide
*/

// Register the custom widgets with Elementor
add_action( 'wp_enqueue_scripts', 'dequeue_parent_theme_styles', 20 );
function dequeue_parent_theme_styles() {
    if ( ! is_admin() ) {
        wp_dequeue_style( 'parent-style' );
        wp_dequeue_style( 'parent-style-rtl' );
    }
}
function my_custom_excerpt() {
	$content=get_the_content();
	$excerpt=wp_trim_words( $content, 30 );
	return $excerpt;
  
  }
  
  add_filter( 'get_the_excerpt', 'my_custom_excerpt' );
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
