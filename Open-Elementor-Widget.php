<?php
/*
Plugin Name: OpenElementorWidget
Description: Custom widget for Elementor
Version: 1.0
Author: Davide
*/

// Register the custom widgets with Elementor
function enqueue_font_awesome()
{
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css', array(), '6.1.0');
}
add_action('elementor/frontend/after_enqueue_styles', 'enqueue_font_awesome');
add_action('elementor/widgets/widgets_registered', 'register_OpenElementorWidget_widgets');
<<<<<<< HEAD

function add_elementor_widget_categories($elements_manager)
{
=======
function add_elementor_widget_categories( $elements_manager ) {
>>>>>>> d490c19b4b50f0986a1212da8bccc90d5009ca3e

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
<<<<<<< HEAD
	// Include and register the latest-posts-hover widget
	require_once(plugin_dir_path(__FILE__) . 'widgets/Latest-Posts-Hover.php');
	$widgets_manager->register_widget_type(new \Latest_Posts_Hover_Widget());
}
=======
	add_action( 'elementor/element/before_render', function( $element, $element_id, $settings ) {
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			// Disabilita il link solo se l'elemento contiene un link
			$link = $element->get_settings('link');
			if ( ! empty( $link ) ) {
				$element->add_render_attribute( '_wrapper', 'href', '' );
			}
			echo'prova';
		}
	}, 10, 3 );
    // Include and register the latest-posts-hover widget
    require_once(plugin_dir_path(__FILE__) . 'widgets/Latest-Posts-Hover.php');
    $widgets_manager->register_widget_type(new \Latest_Posts_Hover_Widget());

}
>>>>>>> d490c19b4b50f0986a1212da8bccc90d5009ca3e
