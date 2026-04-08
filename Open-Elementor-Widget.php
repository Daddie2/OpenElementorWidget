<?php
/*
Plugin Name: OpenWidgetElementor
Description: Custom widget for elementor
Version: 1.0
Author: Davide 
*/ 

function remove_text_before_last_post_title($excerpt)
{
  global $wpdb;
  $elementor_data = $wpdb->get_results(
    "SELECT meta_value FROM {$wpdb->postmeta} WHERE meta_key = '_elementor_data'"
  );
  
  $all_place_values = array();
  
  foreach ($elementor_data as $data) {
    if (!empty($data->meta_value)) {
      if (preg_match_all('/"All_place":"([^"]+)"/', $data->meta_value, $matches)) {
        foreach ($matches[1] as $match) {
          $all_place_values[] = $match;
        }
      }
    }
  }
  
  foreach ($all_place_values as $value) {
    $excerpt = str_replace($value, '', $excerpt);
  }
  
  $categories = get_categories();
  foreach ($categories as $category) {
    $excerpt = str_replace($category->name, '', $excerpt);
  }
  
  $excerpt = preg_replace('#<a.*?>.*?</a>#i', '', $excerpt);
  
  return $excerpt;
}

add_filter('wp_trim_excerpt', 'remove_text_before_last_post_title');
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
  $base_url = 'https://waveew.altervista.org/wp-content/plugins/OpenElementorWidget/';

  wp_register_script(
    'article-widget-js',
    $base_url . 'widgets/article_js.js',
    ['jquery'],
    '1.0.0',
    true
  );

  wp_register_style(
    'article-widget-css',
    $base_url . 'widgets/article_style.css',
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

  require_once(plugin_dir_path(__FILE__) . 'widgets/Post-info.php');
  $widgets_manager->register_widget_type(new \Post_Info_Widget());

  require_once(plugin_dir_path(__FILE__) . 'widgets/Animated-Text.php');
  $widgets_manager->register_widget_type(new \Animated_Text_Widget());

  require_once(plugin_dir_path(__FILE__) . 'widgets/Image-hover.php');
  $widgets_manager->register_widget_type(new \Image_Hover_Widget());

  require_once(plugin_dir_path(__FILE__) . 'widgets/Article.php');
  $widgets_manager->register_widget_type(new \Article_Widget());
}