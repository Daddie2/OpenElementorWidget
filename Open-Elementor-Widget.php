<?php
/*
Plugin Name: OpenElementorWidget
Description: Custom widget for Elementor
Version: 1.0
Author: Davide
*/

// Register the custom widgets with Elementor
add_action('elementor/widgets/widgets_registered', 'register_OpenElementorWidget_widgets');
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'OpenWidget',
		[
			'title' => esc_html__( 'OpenWidget', 'open-elementor-widget' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
function register_OpenElementorWidget_widgets($widgets_manager)
{
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