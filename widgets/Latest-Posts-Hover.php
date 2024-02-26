<?php
class Latest_Posts_Hover_Widget extends \Elementor\Widget_Base
{
    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_name()
    {
        return 'latest-posts-hover';
    }

    public function get_title()
    {
        return esc_html__('Latest Posts Hover', 'latest-posts-hover');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['OpenWidget'];
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('General', 'Latest-Posts-Hover'),
            ]
        );
        $this->add_control(
            'all_post',
            [
                'label' => esc_html__('All post', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                'return_value' => 'all',
                'default' => 'normal',
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Number of Posts', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
            ]
        );
        $this->add_control(
            'default_image',
            [
                'label' => esc_html__('Default Image', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'card_color',
            [
                'label' => esc_html__('Background color', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
            ]
        );
        $this->add_control(
            'card_opacity',
            [
                'label' => esc_html__('Card opacity', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0.8,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'Latest-Posts-Hover'),
            ]
        );
        $this->add_control(
            'Title_color',
            [
                'label' => esc_html__('Color', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'black',
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'title_font_size',
            [
                'label' => esc_html__('Font Size', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 120,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_font',
            [
                'label' => esc_html__('Font Family', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "Work Sans",
                'selectors' => [
                    '{{WRAPPER}} .title' => 'font-family: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_bold',
            [
                'label' => esc_html__('Title Bold', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                'return_value' => 'bold',
                'default' => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .title' => 'font-weight: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_date',
            [
                'label' => esc_html__('Date', 'Latest-Posts-Hover'),
            ]
        );
        $this->add_control(
            'date_active',
            [
                'label' => esc_html__('Date Active', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                'return_value' => 'block',
                'default' => 'none',
                'selectors' => [
                    '{{WRAPPER}} .date' => 'display: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'Date_color',
            [
                'label' => esc_html__('Color', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'black',
                'selectors' => [
                    '{{WRAPPER}} .date' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'date_font_size',
            [
                'label' => esc_html__('Font Size', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 18,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 120,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .date' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'date_font',
            [
                'label' => esc_html__('Font Family', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "Work Sans",
                'selectors' => [
                    '{{WRAPPER}} .date' => 'font-family: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'date_bold',
            [
                'label' => esc_html__('Date Bold', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                'return_value' => 'bold',
                'default' => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .date' => 'font-weight: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_category',
            [
                'label' => esc_html__('Category', 'Latest-Posts-Hover'),
            ]
        );
        $this->add_control(
            'category_active',
            [
                'label' => esc_html__('Category Active', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                'return_value' => 'block',
                'default' => 'none',
                'selectors' => [
                    '{{WRAPPER}} .category' => 'display: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'category_color',
            [
                'label' => esc_html__('Color', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'black',
                'selectors' => [
                    '{{WRAPPER}} .category' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'category_font_size',
            [
                'label' => esc_html__('Font Size', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 18,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 120,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .category' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'category_font',
            [
                'label' => esc_html__('Font Family', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "Work Sans",
                'selectors' => [
                    '{{WRAPPER}} .category' => 'font-family: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'category_bold',
            [
                'label' => esc_html__('category Bold', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                'return_value' => 'bold',
                'default' => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .category' => 'font-weight: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'Latest-Posts-Hover'),
            ]
        );
        $this->add_control(
            'content_word_pc',
            [
                'label' => esc_html__('Number of Word on pc', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 15,
                'min' => 1,
            ]
        );
        $this->add_control(
            'content_word_mobile',
            [
                'label' => esc_html__('Number of Word on mobile', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 15,
                'min' => 1,
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Color', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'black',
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'content_font_size',
            [
                'label' => esc_html__('Font Size', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 18,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 120,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .description' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'content_font',
            [
                'label' => esc_html__('Font Family', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "Work Sans",
                'selectors' => [
                    '{{WRAPPER}} .description' => 'font-family: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'content_bold',
            [
                'label' => esc_html__('category Bold', 'Latest-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                'return_value' => 'bold',
                'default' => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .description' => 'font-weight: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if ($settings['posts_per_page'] == null) {
            $settings['posts_per_page'] = 4;
        }
        $args = [
            'posts_per_page' => $settings['posts_per_page'],
            'category_name' => isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '',
        ];
        if (isset($_GET['category']) && ($_GET['category']) == "all") {
            $args = [
                'posts_per_page' => $settings['posts_per_page'],
            ];
        }
        if ($settings['all_post'] == 'all') {

            if (isset($_GET['category']) && ($_GET['category']) == "all") {
                $args = [
                    'posts_per_page' => -1,
                ];
            }
            $args = [
                'posts_per_page' => -1,
                'category_name' => isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '',

            ];
        }
        $posts = get_posts($args);
        $opacity = $settings['card_opacity'];
        $cardColor = $settings['card_color'];
        $wordPc = $settings['content_word_pc'];
        $wordMobile = $settings['content_word_mobile'];
        $flex = 100 / count($posts);

        if ($settings['posts_per_page'] > 4) {
            $flex = 25;
        }
        $widht = $flex - 1;
        $title_color = $settings['Title_color'];
        if ($posts) {
            echo '<div class="category-filter">
        <form method="get" action="">
        <button type="submit" name="category" value="all" class="category-filter-button';
            if (isset($_GET['category']) && $_GET['category'] == 'all') {
                echo ' active';
            }
            echo '">All</button>';
            $categories = get_categories();
            foreach ($categories as $category) {
                $category_name = $category->name;
                $category_slug = $category->slug;
                echo '<button type="submit" name="category" value="' . $category_slug . '" class="category-filter-button';
                if (isset($_GET['category']) && $_GET['category'] == $category_slug) {
                    echo ' active';
                }
                echo '">' . $category_name . '</button>';
            }
            echo '</form> </div>';
            if (isset($_GET['category']) && $_GET['category'] != 'all') {
                $category = get_category_by_slug($_GET['category']);
                echo '<p> ' . $category->name . '</p>';
            }
            echo '<div class="card2-container">';
            if (wp_is_mobile()) {
                // Codice da eseguire se la larghezza dello schermo è minore o uguale a 900 pixel

                // Rendering dei post
                foreach ($posts as $post) {
                    $post_title = get_the_title($post->ID);
                    $post_content = wp_trim_words($post->post_content, $wordPc);
                    $post_date = date_i18n(get_option('date_format'), strtotime($post->post_date));
                    $post_link = get_permalink($post->ID);
                    // Check if the post has a featured image
                    $featured_image = get_the_post_thumbnail_url($post->ID);
                    if (!$featured_image) {
                        // If not, use the custom default image
                        $featured_image = $settings['default_image']['url'];
                    }
                    $categories = get_the_category($post->ID);
                    if (!empty($categories)) {
                        $category_name = array();
                        foreach ($categories as $category) {
                            $category_name[] = $category->name;
                        }
                        $category_string = implode(', ', $category_name);
                    } else {
                        $category_name = '';
                    }
                    echo '
       <div class="card2" style="background-image: url(' . $featured_image . ');>
        <div class="info">
            <a class="title" href="' . $post_link . '">' . $post_title . ' <a/>
            <p class="date">' . $post_date . '</p> ';
                    if ($category_name != '') {
                        echo '<a class="category" role="button" tabindex="0" href="google.com">' . $category_string . '</a>';
                    }
                    echo '<a class="description" href="' . $post_link . '">' . $post_content . ' </a> 
        </div>
        </div>';
                }
                wp_reset_postdata();
                echo '</div>';
            } else {
                foreach ($posts as $post) {
                    $post_title = get_the_title($post->ID);
                    $post_content = wp_trim_words($post->post_content, $wordPc);
                    $post_date = date_i18n(get_option('date_format'), strtotime($post->post_date));
                    $post_link = get_permalink($post->ID);
                    // Check if the post has a featured image
                    $featured_image = get_the_post_thumbnail_url($post->ID);
                    if (!$featured_image) {
                        // If not, use the custom default image
                        $featured_image = $settings['default_image']['url'];
                    }
                    $categories = get_the_category($post->ID);
                    if (!empty($categories)) {
                        $category_name = array();
                        foreach ($categories as $category) {
                            $category_name[] = $category->name;
                        }
                        $category_string = implode(', ', $category_name);
                    } else {
                        $category_name = '';
                    }
                    echo '
       <div class="card2" style="background-image: url(' . $featured_image . '); "onclick=\'window.location.href="' . $post_link . '"\'>
        <div class="info">
            <a class="title" href="' . $post_link . '">' . $post_title . ' <a/>
            <p class="date">' . $post_date . '</p> ';
                    if ($category_name != '') {
                        echo '<a class="category" href="google.com">' . $category_string . '</a>';
                    }
                    echo '<a class="description" href="' . $post_link . '">' . $post_content . ' </a> 
        </div>
        </div>';
                }
                wp_reset_postdata();
                echo '</div>';
            }
        } else {
            // Gestisci il caso in cui $posts non è un array valido
            echo '<div class="error-message">';
            echo esc_html__('Impossibile recuperare i post. Si è verificato un errore.', 'Latest-Posts-Hover');
            echo '</div>';
        }
        echo '<style>
        .category-filter-button {
  background-color: green;
  color: yellow;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 10px;
}

.category-filter-button.active {
  background-color: red;
}
        .card2-link {
            
            text-decoration: none;
        }
        .card2 {
            border-radius: 16px;
            margin: 0 auto;
            box-shadow: 1px 3px 5px -1px rgba(0, 0, 0, 0.5),
                1px 5px 8px 0px rgba(0, 0, 0, 0.14),
                1px 1px 14px 0px rgba(0, 0, 0, 0.12);
            overflow: hidden; 
            width: ' . $widht . '%; 
            margin-bottom: 20px;
            background-position: center center;
            background-size: cover;
            cursor: pointer;
        }
    
        .info {
            position: relative;
            width: 100%;
            height: 600px;
            background-color: ' . $cardColor . ';
            filter:opacity(' . $opacity . ' ); 
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
            font-size: 32px;
            padding: 0 5px;
            margin-bottom: 0px;
            color: black ;
            overflow-wrap: break-word;
        }
    
        .date {
            margin-top: 0;
            margin-bottom: 0px;
            padding: 0 5px;
            font-size: 18px;
            color: black;
            display:none;
        }
        .category {
            margin-top: 0px;
            margin-bottom: 0;
            padding: 0 5px;
            font-size: 18px;
            color:black;
            display:none;
        }
    
        .description {
            margin: 0;
            padding: 0 15px;
            font-size: 19px;
            color: black;
        }
    
        .card2:hover .description {
            display: block;
        }

        .card2-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: left;
            flex-basis: (' . $flex . '- 20px);
          }
                            }
                  }';
        if ($flex != 100) {
            echo '     
            @media ( max-width:1200px) {
                .card2-container .card2 {
                    flex-basis: 49%;            
                            }
                  }';
        }

        echo '
          @media (max-width: 900px) {
            .card2-container .card2 {
              flex-basis: 100%;
            }
                  }
    
        </style>';
    }
}
