<?php
/*
Plugin Name: OpenElementorWidget
Description: Custom widget for elementor
Version: 2.0
Author: Davide Antonica
*/ 


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

// ── Registrazione asset Article Widget ──────────────────────────────────────
function register_article_widget_assets()
{
  wp_register_script(
    'article-widget-js',
    plugin_dir_url(__FILE__) . 'widgets/article_js.js',
    ['jquery'],
    '1.0.0',
    true
  );

  wp_register_style(
    'article-widget-css',
    plugin_dir_url(__FILE__) . 'widgets/article_style.css',
    [],
    '1.0.0'
  );
}
add_action('wp_enqueue_scripts', 'register_article_widget_assets');
add_action('elementor/editor/before_enqueue_scripts', 'register_article_widget_assets');
// ────────────────────────────────────────────────────────────────────────────

function register_OpenElementorWidget_widgets($widgets_manager)
{
require_once(plugin_dir_path(__FILE__) . 'widgets/Latest-Posts-Hover.php');
 $widgets_manager->register_widget_type(new \Latest_Posts_Hover_Widget());
 require_once(plugin_dir_path(__FILE__) . 'widgets/Animated-Text.php');
 $widgets_manager->register_widget_type(new \Animated_Text_Widget());
 require_once(plugin_dir_path(__FILE__) . 'widgets/Image-hover.php');
  $widgets_manager->register_widget_type(new \Image_Hover_Widget());
require_once(plugin_dir_path(__FILE__) . 'widgets/Article.php');
 $widgets_manager->register_widget_type(new \Article_Widget());
}

add_filter('password_protected_is_active', function($enabled) {
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    if (strpos($request_uri, '/plugins/OpenElementorWidget/') !== false) {
        return false;
    }
    return $enabled;
});