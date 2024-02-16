<?php
class My_Elementor_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'my-elementor-widget';
    }

    public function get_title() {
        return __('My Elementor Widget', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-posts-circle';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $args = [
            'posts_per_page' => $settings['posts_per_page'],
        ];

        $posts = get_posts($args);

        if ($posts) {
            echo '<div class="latest-4-posts-hover">';

            foreach ($posts as $post) {
                $post_title = get_the_title($post->ID);
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
    else {
        // Gestisci il caso in cui $posts non è un array valido
        echo '<div class="error-message">';
        echo esc_html__('Impossibile recuperare i post. Si è verificato un errore.', 'latest-4-posts-hover');
        echo '</div>';
    }
        
}