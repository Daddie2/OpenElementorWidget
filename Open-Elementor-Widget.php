<?php
/*
Plugin Name: OpenElementorWidget
Description: Custom widget for Elementor
Version: 1.0
Author: Davide
*/

// Register the custom widgets with Elementor
add_action('elementor/widgets/widgets_registered', 'register_OpenElementorWidget_widgets');

// Register widget styles
function register_widget_styles() {
	wp_register_style( 'latest-4-post', plugins_url( 'widgets/style-4-post.css', __FILE__ ) );
	wp_register_style( 'my-custom-widget-css', plugins_url( 'widgets/custom.css', __FILE__ ) );

}
add_action('init', 'register_widget_styles');

function register_OpenElementorWidget_widgets($widgets_manager)
{
    // Include and register the Latest-4-Posts-Hover widget
    require_once(plugin_dir_path(__FILE__) . 'widgets/Latest-4-Posts-Hover.php');
    $widgets_manager->register_widget_type(new \Latest_4_Posts_Hover_Widget());
 require_once(plugin_dir_path(__FILE__) . 'widgets/My-Elementor-Widget.php');
    $widgets_manager->register_widget_type(new \My_Elementor_Widget());

    // Include and register other custom widgets here if needed
    // require_once(plugin_dir_path(__FILE__) . 'widgets/Your-Other-Widget.php');
    // $widgets_manager->register_widget_type(new \Elementor_Your_Other_Widget());
}