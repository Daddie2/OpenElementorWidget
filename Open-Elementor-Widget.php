<?php
/*
Plugin Name: OpenWidgetElementor
Description: Custom widget for elementor
Version: 1.0
Author: Davide 
*/ 
function remove_text_before_last_post_title($excerpt)
{
 
  // Recupera tutti i valori del campo "All_place" dalle opzioni di Elementor
  global $wpdb;
  $elementor_data = $wpdb->get_results(
    "SELECT meta_value FROM {$wpdb->postmeta} WHERE meta_key = '_elementor_data'"
  );
  
  $all_place_values = array();
  
  // Estrai i valori di All_place da tutti i dati di Elementor
  foreach ($elementor_data as $data) {
    if (!empty($data->meta_value)) {
      // Cerca valori del campo All_place
      if (preg_match_all('/"All_place":"([^"]+)"/', $data->meta_value, $matches)) {
        foreach ($matches[1] as $match) {
          $all_place_values[] = $match;
        }
      }
    }
  }
  
  // Rimuovi tutti i valori di All_place dall'excerpt
  foreach ($all_place_values as $value) {
    $excerpt = str_replace($value, '', $excerpt);
  }

  
  // Continua con la pulizia standard
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
function register_OpenElementorWidget_widgets($widgets_manager)
{
  // Include and register the latest-posts-hover widget
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