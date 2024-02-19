<?php
class Latest_4_Posts_Hover_Widget extends \Elementor\Widget_Base {

    public function get_style_depends() {
		return [ 'lastest-4-post' ];
	}
    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
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

    protected function _register_controls() {
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
                'max'=> 4,
                'min'=> 1,
            ]
        );
        $this->add_control(
            'default_image',
            [
                'label' => esc_html__('Default Image', 'latest-4-posts-hover'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display(); 
        $args = [
            'posts_per_page' => $settings['posts_per_page'],
            ];           
        $posts = get_posts($args);
    
        if ($posts) { 
             echo '<div class="card2-container">'; 
            foreach ($posts as $post) { 
                $post_title = get_the_title($post->ID);
                $post_content = wp_trim_words($post->post_content, 15); 
                $post_date = date('d/m/Y', strtotime($post->post_date)); 
                $post_link = get_permalink($post->ID); 
            // Check if the post has a featured image
            $featured_image = get_the_post_thumbnail_url($post->ID);
            if (!$featured_image) {
                // If not, use the custom default image
                $default_image = $settings['default_image']['url'];
                $featured_image = $default_image;
            }

                echo '<div class="card2">
                <div style="background-image: url(' . $featured_image . ');"> 
                <a href="' . $post_link . '" class="card2-link"> 
                <div class="info"> <h1>' . $post_title . '</h1> <p class="post-date">' . $post_date . '
                </p> <p class="description">' . $post_content . '</p> </div> </div> </a> </div> '; } echo '</div>';
        }
            
    else {
        // Gestisci il caso in cui $posts non è un array valido
        echo '<div class="error-message">';
        echo esc_html__('Impossibile recuperare i post. Si è verificato un errore.', 'latest-4-posts-hover');
        echo '</div>';
    }
        echo'<style>
        .card2-link {
            text-decoration: none;
        }
        .card2 {
            border-radius: 16px;
            margin: 0 auto;
            width: 450px;
            box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.2),
                0px 5px 8px 0px rgba(0, 0, 0, 0.14),
                0px 1px 14px 0px rgba(0, 0, 0, 0.12);
            overflow: hidden;
           margin-bottom: 20px; /            
        }
    
        .info {
            position: relative;
            width: 100%;
            height: 600px;
            background-color: rgba(255, 255, 255, 0.8); /* Sfondo bianco trasparente */
            transform: translateY(100%)
                translateY(-170px)
                translateZ(0); /* Regola la posizione verticale */
            transition: transform 0.5s ease-out;
        }
    
        .info:before {
            z-index: -1;
            display: block;
            position: absolute;
            content: " ";
            width: 100%;
            height: 100%;
            overflow: hidden;
            filter: blur(6px);
            background-size: cover;
            opacity: 0.45;
            transform: translateY(-70%)
                translateY(122px)
                translateZ(10); /* Regola la posizione verticale */
            transition: transform 0.5s ease-out;
        }
    
        .card2:hover .info,
        .card2:hover .info:before {
            transform: translateY(0) translateZ(0);
        }
    
        .title {
            margin: 0;
            font-size: 32px;
            line-height: 1;
            color: rgba(0, 0, 0, 0.87);
            overflow-wrap: break-word;
        }
    
        .post-date {
            margin: 0;
            padding: 0 10px;
            font-size: 18px;
            color: rgba(0, 0, 0, 0.54);
        }
    
        .description {
            margin: 0;
            padding: 0 24px 24px;
            font-size: 19px;
            line-height: 1.5;
            color: black !important;
        }
    
        .card2:hover .description {
            display: block;
        }

        .card2-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
          }
          
          .card2-container .card2 {
            flex-basis: calc(25% - 20px);
          }
          @media (max-width: 900px) {
            .card2-container .card2 {
              flex-basis: 100%;
            }
          }
        </style>';

}
}