<?php
/*
Plugin Name: OpenWidgetElementor
Description: Custom widget for elementor
Version: 1.0
Author: Davide 
*/ function remove_text_before_last_post_title($excerpt)
{
  // Ottieni l'ultimo post
  $last_post = get_posts(array(
    'numberposts' => 1,
    'order' => 'DESC',
  ))[0];

  // Ottieni il titolo dell'ultimo post
  $last_post_title = $last_post->post_title;

  // Trova la posizione del titolo dell'ultimo post nell'excerpt
  $position = strpos($excerpt, $last_post_title);

  // Se il titolo è presente, restituisce solo il testo dopo di esso
  if ($position !== false) {
    $excerpt=preg_replace('#<a.*?>.*?</a>#i', '', $excerpt);
    return substr($excerpt, $position);
  }
  $excerpt = preg_replace('#<a.*?>.*?</a>#i', '', $excerpt);


  // Se il titolo non è presente, restituisce l'excerpt originale
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
}