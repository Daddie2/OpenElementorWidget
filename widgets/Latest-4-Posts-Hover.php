<?php

class Latest_4_Posts_Hover_Widget extends Elementor\Widget_Base {

    public function __construct() {
        parent::__construct();

        $this->init_control();
    }

    public function get_name() {
        return 'latest-4-posts-hover';
    }

    public function get_title() {
        return esc_html__('Latest 4 Posts Hover', 'latest-4-posts-hover');
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function init_control() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'latest-4-posts-hover'),
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Number of Posts', 'latest-4-posts-hover'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );

        $this->end_controls_section();
    }

    public function render() {

        $settings = $this->get_settings_for_display();

        $args = [
            'posts_per_page' => $settings['posts_per_page'],
        ];

        $posts = get_posts($args);
        if ( ! have_posts() ) {
            echo '<div class="no-posts-message">';
            echo esc_html__( 'No posts found.', 'latest-4-posts-hover' );
            echo '</div>';
            return;
        }
        if ($posts) {
            echo '<div class="latest-4-posts-hover">';

            foreach ($posts as $post) {
                $post_title = $post->post_title;
                $post_content = wp_trim_words($post->post_content, 15);
                $post_date = date('d/m/Y', strtotime($post->post_date));
                $post_link = get_permalink($post->ID);
                $post_thumbnail = get_the_post_thumbnail_url($post->ID);

                echo '
                    <div class="card">
                        <a href="' . $post_link . '" class="card-link">
                            <div class="card-image" style="background-image: url(' . $post_thumbnail . ');">
                                <div class="info">
                                    <h1>' . $post_title . '</h1>
                                    <p class="post-date">' . $post_date . '</p>
                                    <p class="description">' . $post_content . '</p>
                                </div>
                            </div>
                        </a>
                    </div>';
            }

            echo '</div>';
        }
    }
}

function enqueue_widget_styles() {
    wp_enqueue_style(
        'latest-4-posts-hover',
        plugin_dir_url(__FILE__) . 'style-4-post.css',
        filemtime(plugin_dir_path(__FILE__) . 'style-4-post.css')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_widget_styles');