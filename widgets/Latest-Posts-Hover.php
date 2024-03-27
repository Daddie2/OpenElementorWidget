    
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
                    'default' => '#f8f8f8',
                    'selectors' => [
                        '{{WRAPPER}} .info' => 'background-color:{{VALUE}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'card_opacity',
                [
                    'label' => esc_html__('Card opacity', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                    'default' => 0.8,
                    'selectors' => [
                        '{{WRAPPER}} .info' => 'filter:opacity({{VALUE}})!important;',
                    ],
                ]
            );

            $this->add_control(
                'selected_page',
                [
                    'label' => esc_html__(' Select Page if you have a page with all post, made with this widget for the links', 'OpenWidget'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => $this->get_pages(),
                    'default' => 0,
                ]
            );
            $this->add_control(
                'filter_alignment',
                [
                    'label' => esc_html__('Filter Alignment', 'OpenWidget'),
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
                        '{{WRAPPER}} .category-filter' => 'justify-content: {{VALUE}};',
                    ],
                    'icon_colors' => [
                        'left' => 'white',
                        'center' => 'white',
                        'right' => 'white',
                    ],
                ]
            );
            $this->add_control(
                'height_card',
                [
                    'label' => esc_html__('Height card', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 50,
                        'unit' => 'dvh',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .card2' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'content_card',
                [
                    'label' => esc_html__('Height card content pre animation(smaller is higher)', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 500,
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 1000,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .info' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'section_error',
                [
                    'label' => esc_html__('No post error', 'Latest-Posts-Hover'),
                ]
            );
            $this->add_control(
                'Error_color',
                [
                    'label' => esc_html__('Text color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .error-message' => 'color: {{VALUE}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'Error_font_size',
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
                        '{{WRAPPER}} .error-message' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'error_font',
                [
                    'label' => esc_html__('Font Family', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::FONT,
                    'default' => "Work Sans",
                    'selectors' => [
                        '{{WRAPPER}} .error-message' => 'font-family: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'error_bold',
                [
                    'label' => esc_html__('Error Bold', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'bold',
                    'default' => 'normal',
                    'selectors' => [
                        '{{WRAPPER}} .error-message' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'error_alignment',
                [
                    'label' => esc_html__('Error Alignment', 'OpenWidget'),
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
                        '{{WRAPPER}} .error-message' => 'text-align: {{VALUE}};',
                    ],
                    'icon_colors' => [
                        'left' => 'white',
                        'center' => 'white',
                        'right' => 'white',
                    ],
                ]
            );
            $this->add_control(
                'error_message',
                [
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label' => esc_html__('Error message', 'textdomain'),
                    'placeholder' => esc_html__('Error message', 'textdomain'),
                    'default' => 'No post found',
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
                    'return_value' => 'inline-block',
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
                    'label' => esc_html__('Font Date', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .date-card2' => 'justify-content: {{VALUE}};',
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
                'section_tag',
                [
                    'label' => esc_html__('Tag', 'Latest-Posts-Hover'),
                ]
            );
            $this->add_control(
                'tag_active',
                [
                    'label' => esc_html__('Tag Active', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'inline-block',
                    'default' => 'none',
                    'selectors' => [
                        '{{WRAPPER}} .tag' => 'display: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'Tag_color',
                [
                    'label' => esc_html__('Color Tag', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .tag' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'tag_font_size',
                [
                    'label' => esc_html__('Size Tag', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .tag' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'tag_font',
                [
                    'label' => esc_html__('Font tag', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::FONT,
                    'default' => "Work Sans",
                    'selectors' => [
                        '{{WRAPPER}} .tag' => 'font-family: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tag_bold',
                [
                    'label' => esc_html__('Tag Bold', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'bold',
                    'default' => 'normal',
                    'selectors' => [
                        '{{WRAPPER}} .tag' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'tag_alignment',
                [
                    'label' => esc_html__('Tag Alignment', 'OpenWidget'),
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
                        '{{WRAPPER}} .tag-card2' => 'justify-content: {{VALUE}};',
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
                    'return_value' => 'flex',
                    'default' => 'none',
                    'selectors' => [
                        '{{WRAPPER}} .category' => 'display: {{VALUE}};',
                        '{{WRAPPER}} .category-card2' => 'display: {{VALUE}};',
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
                        '{{WRAPPER}} .category-card2' => 'justify-content: {{VALUE}};',


                    ],
                    'icon_colors' => [
                        'left' => 'white',
                        'center' => 'white',
                        'right' => 'white',
                    ],
                ]
            );
            $this->add_control(
                'categories_in',
                [
                    'label' => esc_html__('Select Categories to include', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => $this->get_category(),
                ]
            );
            $this->add_control(
                'exclude_categories',
                [
                    'label' => esc_html__('Select Categories to exclude', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => $this->get_category(),
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
                    'label' => esc_html__('Content Font Size', 'Latest-Posts-Hover'),
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
            $this->add_control(
                'remove_title',
                [
                    'label' => esc_html__('Remove title(the first h2)', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'on',
                    'default' => 'off',
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
            $this->start_controls_section(
                'section_Button_filter',
                [
                    'label' => esc_html__('Button Filter', 'Latest-Posts-Hover'),
                ]
            );
            $this->add_control(
                'filter_active',
                [
                    'label' => esc_html__('Button Filter Active', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'inline-block',
                    'default' => 'none',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button' => 'display: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'text_color_inactive',
                [
                    'label' => esc_html__('Button filter Inactive text color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'white',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button' => '  color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'text_font_inactive',
                [
                    'label' => esc_html__('Button filter Inactive text Font Family', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::FONT,
                    'default' => "Work Sans",
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button' => 'font-family: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'background_color_inactive',
                [
                    'label' => esc_html__('Button filter Inactive background color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button' => '  background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'inactive_font_size',
                [
                    'label' => esc_html__('Button filter Inactive text Font Size', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .category-filter-button' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'Text_inactive_bold',
                [
                    'label' => esc_html__('Button filter Inactive text bold', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'bold',
                    'default' => 'normal',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'text_color_active',
                [
                    'label' => esc_html__('Button filter Active  text clor', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'white',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button.active' => '  color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'text_font_active',
                [
                    'label' => esc_html__('Button filter Active text Font Family', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::FONT,
                    'default' => "Work Sans",
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button.active' => 'font-family: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'background_color_active',
                [
                    'label' => esc_html__('Button filter Active background color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'red',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button.active' => '  background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'active_font_size',
                [
                    'label' => esc_html__('Button filter Active text Font Size', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .category-filter-button.active' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'Text_active_bold',
                [
                    'label' => esc_html__('Button filter Active text bold ', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'bold',
                    'default' => 'normal',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button.active' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'text_color_hover',
                [
                    'label' => esc_html__('Button filter Hover text color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'white',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button:hover' => '  color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'text_font_hover',
                [
                    'label' => esc_html__('Button filter hover text Font Family', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::FONT,
                    'default' => "Work Sans",
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button:hover' => 'font-family: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'background_color_hover',
                [
                    'label' => esc_html__('Button filter Hover background color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'orange',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button:hover' => '  background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'hover_font_size',
                [
                    'label' => esc_html__('Button filter Hover text Font Size', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .category-filter-button:hover' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'Text_hover_bold',
                [
                    'label' => esc_html__(' Button filter Hover text Bold', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'bold',
                    'default' => 'normal',
                    'selectors' => [
                        '{{WRAPPER}} .category-filter-button:hover' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'related_category',
                [
                    'label' => esc_html__('Show categories related to the one one you selected', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'on',
                    'default' => 'off',
                ]
            );
            $this->add_control(
                'include_all',
                [
                    'label' => esc_html__('Show all even if someone is excluded', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('on', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'on',
                    'default' => 'off',
                ]
            );
            $this->add_control(
                'All_place',
                [
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label' => esc_html__('All button', 'textdomain'),
                    'placeholder' => esc_html__('All button', 'textdomain'),
                    'default' => 'All',
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'section_search',
                [
                    'label' => esc_html__('Search', 'Latest-Posts-Hover'),
                ]
            );
            $this->add_control(
                'search_active',
                [
                    'label' => esc_html__('Search Active', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'inline-block',
                    'default' => 'none',
                    'selectors' => [
                        '{{WRAPPER}} .container2' => 'display: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'background_color_input',
                [
                    'label' => esc_html__('Background color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'orange',
                    'selectors' => [
                        '{{WRAPPER}} 
                                .input2' => '  background: {{VALUE}} !important;',
                        '{{WRAPPER}} .input2:focus' => ' background: {{VALUE}}!important;',
                        '{{WRAPPER}} .input2:hover' => ' background: {{VALUE}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'text_color_input',
                [
                    'label' => esc_html__('Text color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .input2' => ' color: {{VALUE}}!important;',

                    ],
                ]
            );
            $this->add_control(
                'icon_color_',
                [
                    'label' => esc_html__('Icon color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .submit-button' => ' color: {{VALUE}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'cursor_color_',
                [
                    'label' => esc_html__('Cursor color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .input2' => ' caret-color: {{VALUE}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'search_font_size',
                [
                    'label' => esc_html__('Search Font Size', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .input2' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'Search_place',
                [
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label' => esc_html__('Place', 'textdomain'),
                    'placeholder' => esc_html__('Placeholder Search', 'textdomain'),
                    'default' => 'search',
                ]
            );
            $this->end_controls_section();
        }
        private function get_category()
        {
            $categories = get_categories();
            $options = [];
            foreach ($categories as $category) {
                $options[$category->term_id] = $category->name;
            }
            return $options;
        }
        private function get_pages()
        {
            $pages = get_pages();
            $options = [];
            $options[0] = esc_html__('Default', 'OpenWidget');
            foreach ($pages as $page) {
                $options[$page->ID] = $page->post_title;
            }
            return $options ?: [];
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
                'tag' => isset($_GET['tags']) ? sanitize_text_field($_GET['tags']) : '',
            ];
            $args['s']=null;
            if (isset($_GET['category']) && ($_GET['category']) == "all") {
                unset($args['category_name']);
            }
            if (isset($_GET['date'])) {

                // Check the format of the provided date
                if (substr($_GET['date'], -1) == 'm') {
                    $date_query = [
                        'year'  => intval(substr($_GET['date'], 0, 4)),
                        'month' => intval(substr($_GET['date'], 5, 2)),
                        'day'   => array(
                            'start' => 1,
                            'end'   => cal_days_in_month(CAL_GREGORIAN, intval(substr($_GET['date'], 5, 2)), intval(substr($_GET['date'], 0, 4))),
                        ),                    ];
                }
                if (strlen($_GET['date']) === 4) {
                    // Only year provided (YYYY)
                    $date_query = [
                      'year' => intval($_GET['date']),
                    ];
                  } 
                  else if ( strlen($_GET['date']) === 10) {
                    // Full date provided (YYYY-MM-DD) - reuse previous logic
                  $date_query = [
                    'year' => intval(substr($_GET['date'], 0, 4)),
                    'month' => intval(substr($_GET['date'], 5, 2)),
                    'day' => intval(substr($_GET['date'], 8, 2)),
                  ];
                }
                $args['date_query'] = $date_query;
            }
            if ($settings['all_post'] == 'all') {
                $args['posts_per_page'] = -1;
            }
            $all = $settings['All_place'];
            $selected_page_id = $settings['selected_page'];
            $args['category__not_in'] = $settings['exclude_categories'];
            $args['category__in'] = $settings['categories_in'];
            if (isset($_GET['input2'])) {
                $args['s'] = sanitize_text_field($_GET['input2']);
            }
            $posts = get_posts($args);
            $wordPc = $settings['content_word_pc'];
            $wordMobile = $settings['content_word_mobile'];
            $place = $settings['Search_place'];

            if (count($posts) != 0) {
                $flex = 100 / count($posts);
            }
            if (count($posts) > 4 || count($posts) == 0) {
                $flex = 25;
            }
            $width = $flex - 1;
            if ($posts) {
                echo '<div class="category-filter">';
                if ($selected_page_id != 0) {
                    $page_link = get_permalink($selected_page_id);

                    echo '   <form method="get" action="' . $page_link . '">';
                } else {
                    echo '   <form method="get" action="">';
                }
                if ($settings['related_category'] != 'on' || $settings['related_category'] == 'on' && $settings['categories_in'] == null) {
                    $args_C['taxonomy'] = 'category';
                    $args_C['hide_empty'] = true;
                    $args_C['exclude'] = $settings['exclude_categories'];
                    $args_C['include'] = $settings['categories_in'];
                    if ($args_C['include'] == null && $args_C['exclude'] == null || $settings['include_all'] == 'on') {
                        echo '<button type="submit" name="category" value="all" class="category-filter-button';
                        if (isset($_GET['category']) && $_GET['category'] == 'all') {
                            echo ' active';
                        }
                        echo '">' . $all . '</button>';
                    }

                    $categories = get_terms($args_C);
                    foreach ($categories as $category) {
                        if (is_array($settings['exclude_categories'])) {
                            if (in_array($category->term_id, $settings['exclude_categories'])) {
                                continue; // Salta la categoria se è esclusa
                            }
                        }
                        // Controlla se la categoria ha almeno un post che non è escluso
                        $posts_in_category = get_posts(array(
                            'category' => $category->term_id,
                            'posts_per_page' => 1, // Controlla solo se ci sono post
                            'category__not_in' =>  $settings['exclude_categories'],
                        ));
                        if ($posts_in_category) {
                            $category_name = $category->name;
                            $category_slug = $category->slug;
                            echo '<button type="submit" name="category" value="' . $category_slug . '" class="category-filter-button';
                            if (isset($_GET['category']) && $_GET['category'] == $category_slug) {
                                echo ' active';
                            }
                            echo '">' . $category_name . '</button>';
                        }
                    }
                }
                if ($settings['related_category'] == 'on' && $settings['categories_in'] != null) {
                    if ($settings['include_all'] == 'on') {
                        echo '<button type="submit" name="category" value="all" class="category-filter-button';
                        if (isset($_GET['category']) && $_GET['category'] == 'all') {
                            echo ' active';
                        }
                        echo '">' . $all . '</button>';
                    }

                    $other_category_id = $settings['categories_in'];
                    $categories_with_posts = get_categories(array(
                        'hide_empty' => 0,
                        'child_of' => 0,
                    ));

                    foreach ($categories_with_posts as $category) {
                        if (!in_array($category->term_id, $other_category_id)) {
                            $posts_in_category = get_posts(array(
                                'category' => $category->term_id,
                                'category__in' => $other_category_id,
                                'posts_per_page' => 1,
                            ));

                            if ($posts_in_category) {
                                $category_name = $category->name;
                                $category_slug = $category->slug;
                                echo '<button type="submit" name="category" value="' . $category_slug . '" class="category-filter-button';
                                if (isset($_GET['category']) && $_GET['category'] == $category_slug) {
                                    echo ' active';
                                }
                                echo '">' . $category_name . '</button>';
                            }
                        }
                    }
                }


                echo '</form>
                    
            <div class="container2">';
                if ($selected_page_id != 0) {
                    $page_link = get_permalink($selected_page_id);

                    echo '   <form id="form2" action="' . $page_link . '">';
                } else {
                    echo '   <form id="form2" action="">';
                }
                echo '
                <input type="text" id="input2"name="input2"  class="input2"  placeholder="' . $place . '">
                <div class="icon2">
            <button type="submit"  class="submit-button" value="input2">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="70"></path>
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
        </svg>
        </button>
        </form>
        </div>
                </div>
            </div> ';
                echo '<div class="card2-container">';

                foreach ($posts as $post) {
                    $post_title = get_the_title($post->ID);
                    $dom = new DOMDocument();
                    libxml_use_internal_errors(true) and libxml_clear_errors();
                    if ($settings['remove_title'] == 'on') {
                        if (!empty($post->post_content)) {
                            // Set the charset to UTF-8
                            $dom->recover = true;
                            $dom->strictErrorChecking = false;
                            $dom->substituteEntities = false;
                            $dom->loadHTML('<?xml encoding="UTF-8">' . $post->post_content);
                            $elements = $dom->getElementsByTagName('h2');

                            // Loop through h2 elements and remove them
                            foreach ($elements as $element) {
                                $element->parentNode->removeChild($element);
                            }
                            $dom->encoding = 'UTF-8';
                            $post->post_content = $dom->saveHTML();
                        }
                    }

                    if (wp_is_mobile()) {
                        $post_content = wp_trim_words($post->post_content, $wordMobile);
                    } else {

                        $post_content = wp_trim_words($post->post_content, $wordPc);
                    }
                    $post_date = get_the_date('j F Y', $post->ID);
                    $post_link = get_permalink($post->ID);
                    $tags = get_the_tags($post->ID);
                    $post_numb = get_the_date('Y-m-d', $post->ID);
                    $date_array = explode('-', $post_numb);
                    // Check if the post has a featured image
                    $featured_image = get_the_post_thumbnail_url($post->ID);
                    if (!$featured_image) {
                        // If not, use the custom default image
                        $featured_image = $settings['default_image']['url'];
                    }

                    if (wp_is_mobile() || is_admin()) {
                        echo '<div class="card2" style="background-image: url(' . $featured_image . ')" >';
                    } else {
                        echo '<div class="card2" style="background-image: url(' . $featured_image . ')" onclick="window.location.href=\'' . $post_link . '\'">';
                    }
                    echo '
                            <div class="info">
                            <a class="title" href="' . $post_link . '">' . $post_title . ' <a/>';
                    if (!empty($tags)) {
                        if ($selected_page_id != 0) {
                            echo '<div class="tag-card2">';
                            $page_link = get_permalink($selected_page_id);
                            foreach ($tags as $tag) {
                                $tag_link = add_query_arg('tags', $tag->slug, $page_link);
                                echo '<a href="' . $tag_link . '" class="tag"> ' . $tag->name . '</a> ';
                            }
                            echo '</div>';
                        } else {
                            echo '<div class="tag-card2">';

                            foreach ($tags as $tag) {

                                echo '<a href="' . get_tag_link($tag->term_id) . '" class="tag">' . $tag->name . '</a> ';
                            }
                            echo '</div>';
                        }
                    }
                    $date_parts = explode(' ', $post_date);
                    $i = 2;
                    $date_array[1] = $date_array[0] . '/' . $date_array[1];
                    $date_array[2] = $date_array[1] . '/' . $date_array[2];
                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);
                        echo '<div class="date-card2">';

                        foreach ($date_parts as $part) {
                            if ($i == 1) {
                                $date_array[1] = $date_array[1] . '/01 m';
                            }
                            $date_link = add_query_arg('date', $date_array[$i], $page_link);
                            echo ' <a href="' . $date_link . '" class="date">' . ucfirst($part) . '</a>';
                            $i -= 1;
                        }
                        echo '</div>';
                    } else {
                        echo '<div class="date-card2">';
                        $i = 2;
                        foreach ($date_parts as $part) {
                            $date_link = home_url() . '/' . $date_array[$i];
                            echo '<a href="' . $date_link . '" class="date">' . ucfirst($part) . '</a>';
                            $i -= 1;
                        }
                        echo '</div>';
                    }

                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="category-card2">';
                            foreach ($categories as $category) {
                                $category_link = add_query_arg('category', $category->slug, $page_link);
                                echo '<a href="' . $category_link . '" class="category"> ' . $category->name . ' </a>';
                            }
                            echo    '</div>';
                        }
                    } else {
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="category-card2">';
                            foreach ($categories as $category) {
                                echo '<a href="' . get_category_link($category->term_id) . '" class="category"> '  . $category->name . ' </a> <br>';
                            }
                        }
                        echo    '</div>';
                    }
                    echo '<p class="description" href="' . $post_link . '">' . $post_content . ' </p> 
                            </div>
                            </div>';
                }
                wp_reset_postdata();
                echo '</div>';
            }
            if (!$posts) {

                echo '<a class="error-message">' . $settings['error_message'];
                echo '</a>';
                if ($args['s'] != null) {
                    echo ' <div class="container2">';
                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);

                        echo '   <form id="form2" action="' . $page_link . '">';
                    } else {
                        echo '   <form id="form2" action="">';
                    }
                    echo '
                <input type="text" id="input2"name="input2"  class="input2"  placeholder="' . $place . '">
                <div class="icon2">
            <button type="submit"  class="submit-button" value="input2">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="70"></path>
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
        </svg>
        </button>
        </form>
        </div>
                </div>
            </div> ';
                }
            }
            echo '<style>
                .category-filter {
                    display: flex;
                    justify-content:right; 
                    flex-wrap: wrap;
                    }
            .category-card2 {
                    display:none;
                    justify-content:right; 
                    flex-wrap: wrap;
                    }
                    .date-card2 {
                    display: flex;
                    justify-content:right; 
                    flex-wrap: wrap;
                    }
                    .tag-card2 {
                    display: flex;
                    justify-content:right; 
                    flex-wrap: wrap;
                    }
            .category-filter-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 30px;
            font-size: 18px;
            font-weight: bold;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: normal;
            font-family:Work Sans;
            font: size 15px;
            display:none;
            }

            .category-filter-button:hover {
            background-color: black;
            font-weight: normal;
            font: size 15px;
            font-family:Work Sans;
            }
            .category-filter-button.active {
                background-color: red;
                font-weight: normal;
                font: size 15px;
                font-family:Work Sans;
            }
                    .card2-link {
                        
                        text-decoration: none;
                    }
                    .card2 {
                        border-radius: 16px;
                                margin-left: 0.5%;
                        margin-right: 0.5%;
                        box-shadow: 1px 3px 5px -1px rgba(0, 0, 0, 0.5),
                            1px 5px 8px 0px rgba(0, 0, 0, 0.14),
                            1px 1px 14px 0px rgba(0, 0, 0, 0.12);
                        overflow: hidden; 
                        width: ' . $width . '%; 
                        margin-bottom: 20px;
                        background-position:  center;
                        background-size: cover;
                        cursor: pointer;
                        height:50dvh;
                    }
                
                    .info {
                        position: relative;
                        width: 100%;
                        height: 500px;
                        background-color: white;
                        filter:opacity(0.8); 
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
                     .error-message {
                        font-size: 32px;
                        color: black ;
                        text-align: center;

                    }
                    .tag {
                        margin-top: 0px;
                        margin-bottom: 0px;
                        padding: 0 5px;
                        font-size: 18px;
                        color:black;
                        display:none;
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
                        margin-bottom: 00px;
                        padding: 0 5px;
                        font-size: 18px;
                        color:black;
                        display:none;
            }
                
                    .description {
                        margin-top: 0px;
                        margin-bottom: 0;            
                        padding: 0 15px;
                        font-size: 19px;
                        color: black;
                        overflow-wrap: break-word;
                        text-align: left;

                    }
                    


                    .card2-container {
                        display: flex;
                        flex-wrap: wrap;
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
        .container2 {
            position: relative;
            --size-button: 40px;
            color: white;
            padding:10px;
            white-space: nowrap;
            display:none;          
            width:100%;
        }

            .input2 {
            padding-left: var(--size-button)!important;
            height: var(--size-button);
            font-size: 15px;
            border: none;
            color: black;
            outline: none;
            width: var(--size-button);
            transition: all ease 0.3s !important;
            background: orange !important;
            box-shadow: 1.5px 1.5px 3px #0e0e0e, -1.5px -1.5px 3px rgb(95 94 94 / 25%), inset 0px 0px 0px #0e0e0e, inset 0px -0px 0px #5f5e5e;
            border-radius: 60px!important;
            cursor: pointer;
            caret-color: blue;
            display:inline-block;

        }

            .input2:focus {
                width: 100% !important;
                white-space: nowrap;    cursor: text;
            background: orange !important;
            }

            .input2:focus + .icon2,
            .input2:not(:invalid) + .icon {
            pointer-events: all;
            cursor: pointer;
            }

            .container2 .icon2 {
            position: absolute;
            width: 60px !important;
            height:  60px !important;
            top: 0;
            left: 0;
            padding: 15px 13px;
            color:green !important;
            pointer-events: none;

            }
            #input2.container2 .icon2:focus {
                pointer-events: auto;
            }

            .container2 .icon2 svg {
            width: 100%;
            height: 100%;
            } 
        .submit-button, submit-bottom:focus,submit-bottom:hover{
            background-color: transparent!important;
        border: none;
        padding: 0; /* Remove default padding */
        color: green !important;            
        } 
        </style>';
        }
    }
