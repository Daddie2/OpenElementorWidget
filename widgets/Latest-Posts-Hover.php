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
        $this->add_control(
            'selected_page',
            [
                'label' => esc_html__('Select Page if you have a page with all post, made with this widget', 'OpenWidget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_pages(),
                'default' => '0',
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
        $this->add_control(
            'title_alignment',
            [
                'label' => esc_html__('Title Alignment', 'OpenWidget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignleft',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-aligncenter',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignright',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-align: {{VALUE}};',
                ],
                'icon_colors' => [
                    'left' => 'white',
                    'center' => 'white',
                    'right' => 'white',
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
        $this->add_control(
            'date_alignment',
            [
                'label' => esc_html__('Date Alignment', 'OpenWidget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignleft',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-aligncenter',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignright',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .date' => 'text-align: {{VALUE}};',
                ],
                'icon_colors' => [
                    'left' => 'white',
                    'center' => 'white',
                    'right' => 'white',
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
                'return_value' => 'inline-block',
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
        $this->add_control(
            'category_alignment',
            [
                'label' => esc_html__('Category Alignment', 'OpenWidget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignleft',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-aligncenter',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignright',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .categories-links' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .category' => 'text-align: {{VALUE}};',


                ],
                'icon_colors' => [
                    'left' => 'white',
                    'center' => 'white',
                    'right' => 'white',
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
            'content_color',
            [
                'label' => esc_html__('Content Color', 'Latest-Posts-Hover'),
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
                'label' => esc_html__('Contnet Font Size', 'Latest-Posts-Hover'),
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
                'label' => esc_html__('Content Font Family', 'Latest-Posts-Hover'),
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
                'label' => esc_html__('Content Bold', 'Latest-Posts-Hover'),
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
        $this->add_control(
            'content_alignment',
            [
                'label' => esc_html__('Content Alignment', 'OpenWidget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignleft',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-aligncenter',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'OpenWidget'),
                        'icon' => 'mce-ico mce-i-alignright',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'text-align: {{VALUE}};',
                ],
                'icon_colors' => [
                    'left' => 'white',
                    'center' => 'white',
                    'right' => 'white',
                ],
            ]
        );
        $this->end_controls_section();
    }
    private function get_pages()
    {
        $pages = get_pages();
        $options = [];
        $options[0] = esc_html__('Default', 'OpenWidget');
        foreach ($pages as $page) {
            $options[$page->ID] = $page->post_title;
        }
        return $options;
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
        } else {
            $args = [
                'posts_per_page' => $settings['posts_per_page'],
                'category_name' => isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '',

            ];
        }
        if ($settings['all_post'] == 'all') {
            $args = [
                'posts_per_page' => -1,
            ];
        }

        $posts = get_posts($args);
        $opacity = $settings['card_opacity'];
        $cardColor = $settings['card_color'];
        $wordPc = $settings['content_word_pc'];
        $wordMobile = $settings['content_word_mobile'];
        if (count($posts) != 0) {
            $flex = 100 / count($posts);
        }
        if (count($posts) > 4 || count($posts) == 0) {
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
            $categories = get_categories(['hide_empty' => 0]);
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
            echo '<div class="card2-container">';
            $selected_page_id = $settings['selected_page'];
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
                    echo '<div class="card2" style="background-image: url(' . $featured_image . '); ">';
                    echo '
        <div class="info">
            <a class="title" href="' . $post_link . '">' . $post_title . ' <a/>
            <p class="date">' . $post_date . '</p> ';
                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="categories-links">';
                            foreach ($categories as $category) {
                                $category_link = add_query_arg('category', $category->slug, $page_link);
                                echo '<a href="' . $category_link . '" class="category">' . $category->name . '</a>';
                            }
                            echo '</div>';
                        }
                    } else {
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="categories-links">';
                            foreach ($categories as $category) {
                                echo '<a href="' . get_category_link($category->term_id) . '" class="category">' . $category->name . '</a>';
                            }
                            echo '</div>';
                        }
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
                    if (is_admin()) {
                        echo '<div class="card2" style="background-image: url(' . $featured_image . '); ">';
                    } else {
                        echo '       <div class="card2" style="background-image: url(' . $featured_image . '); "onclick=\'window.location.href="' . $post_link . '"\'>';
                    }
                    echo '
        <div class="info">
            <a class="title" href="' . $post_link . '">' . $post_title . ' <a/>
            <p class="date">' . $post_date . '</p> ';
                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="categories-links">';
                            foreach ($categories as $category) {
                                $category_link = add_query_arg('category', $category->slug, $page_link);
                                echo '<a href="' . $category_link . '" class="category">' . $category->name . '</a>';
                            }
                            echo '</div>';
                        }
                    } else {
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="categories-links">';
                            foreach ($categories as $category) {
                                echo '<a href="' . get_category_link($category->term_id) . '" class="category">' . $category->name . '</a>';
                            }
                            echo '</div>';
                        }
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
  .category-filter-button{
 background: linear-gradient(to right,#196BCA ,#532db3);
 background-color: #196BCA;
 color: #fff;
 font-family: Trebuchet MS;
 font-size: 20px;
 font-weight: 400;
 font-style: italic;
 text-decoration: none;
 padding: 14px 15px;
 border: 0px solid #000;
 border-radius: 100px;
 display: inline-block;
 box-shadow: 0px 1px 4px 2px #2D2D2D;
padding: 0 5px;
margin-bottom: 5px;
    margin-right: 5px;


 
}
.category-filter-button:hover{
 background: linear-gradient(to right,#1866c0 ,#4f2baa);
 background-color: #1866c0;
}
.category-filter-button:active{
 transform: scale(0.95);
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
            display:block;
            text-align: center;

        }
    
        .date {
            margin-top: 0;
            margin-bottom: 0px;
            padding: 0 5px;
            font-size: 18px;
            color: black;
            display:none;
            text-align: left;

        }
        .category {
            margin-top: 0px;
            margin-bottom: 0px;
            padding: 0 5px;
            font-size: 18px;
            color:black;
            display:none;            
            text-align: left;

        }
    
        .description {
            margin-top: 0px;
            margin-bottom: 0;            
            padding: 0 15px;
            font-size: 19px;
            color: black;
            display:block;            
            overflow-wrap: break-word;
            text-align: left;
        }
        .categories-links {
            padding: 0;
            flex-wrap: wrap;
            text-align: left;
            display: inline;
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
