    
    <?php
    class Article_Widget extends \Elementor\Widget_Base
    {

        public function __construct($data = [], $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'Article';
        }
        public function get_title()
        {
            return esc_html__('Article', 'Article');
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
                    'label' => esc_html__('General', 'Article'),
                ]
            );
            $this->add_control(
                'all_post',
                [
                    'label' => esc_html__('All post', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
                    'return_value' => 'all',
                    'default' => 'normal',
                ]
            );
            $this->add_control(
                'posts_per_page',
                [
                    'label' => esc_html__('Number of Posts', 'Article'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 4,
                    'min' => 1,
                ]
            );
            $this->add_control(
                'default_image',
                [
                    'label' => esc_html__('Default Image', 'Article'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'card_color',
                [
                    'label' => esc_html__('Background color', 'Article'),
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
                    'label' => esc_html__('Card opacity', 'Article'),
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
                    'label' => esc_html__('Height card', 'Article'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 450,
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 1000,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .card2' => 'height: {{SIZE}}{{UNIT}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'content_card',
                [
                    'label' => esc_html__('Height card content pre animation(smaller is higher)', 'Article'),
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
                    'label' => esc_html__('No post error', 'Article'),
                ]
            );
            $this->add_control(
                'Error_color',
                [
                    'label' => esc_html__('Text color', 'Article'),
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
                    'label' => esc_html__('Font Size', 'Article'),
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
                    'label' => esc_html__('Font Family', 'Article'),
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
                    'label' => esc_html__('Error Bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Title', 'Article'),
                ]
            );
            $this->add_control(
                'Title_color',
                [
                    'label' => esc_html__('Color', 'Article'),
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
                    'label' => esc_html__('Font Size', 'Article'),
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
                    'label' => esc_html__('Font Family', 'Article'),
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
                    'label' => esc_html__('Title Bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Date', 'Article'),
                ]
            );
            $this->add_control(
                'date_active',
                [
                    'label' => esc_html__('Date Active', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Color', 'Article'),
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
                    'label' => esc_html__('Font Size', 'Article'),
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
                    'label' => esc_html__('Font Date', 'Article'),
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
                    'label' => esc_html__('Date Bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Tag', 'Article'),
                ]
            );
            $this->add_control(
                'tag_active',
                [
                    'label' => esc_html__('Tag Active', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Color Tag', 'Article'),
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
                    'label' => esc_html__('Size Tag', 'Article'),
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
                    'label' => esc_html__('Font tag', 'Article'),
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
                    'label' => esc_html__('Tag Bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Category', 'Article'),
                ]
            );
            $this->add_control(
                'category_active',
                [
                    'label' => esc_html__('Category Active', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Color', 'Article'),
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
                    'label' => esc_html__('Font Size', 'Article'),
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
                    'label' => esc_html__('Font Family', 'Article'),
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
                    'label' => esc_html__('category Bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Select Categories to include', 'Article'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => $this->get_category(),
                ]
            );
            $this->add_control(
                'exclude_categories',
                [
                    'label' => esc_html__('Select Categories to exclude', 'Article'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => $this->get_category(),
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'section_content',
                [
                    'label' => esc_html__('Content', 'Article'),
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
            

            $this->add_control(
                'content_word_pc',
                [
                    'label' => esc_html__('Number of Word on pc', 'Article'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 15,
                    'min' => 1,
                ]
            );
            $this->add_control(
                'content_word_mobile',
                [
                    'label' => esc_html__('Number of Word on mobile', 'Article'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 15,
                    'min' => 1,
                ]
            );
            $this->add_control(
                'text_color',
                [
                    'label' => esc_html__('Color', 'Article'),
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
                    'label' => esc_html__('Content Font Size', 'Article'),
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
                    'label' => esc_html__('Content Font Family', 'Article'),
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
                    'label' => esc_html__('category Bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Remove title(the first h2)', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
            
            // Add a new section for Read More button customization
            $this->start_controls_section(
                'section_read_more',
                [
                    'label' => esc_html__('Read More Button', 'Article'),
                ]
            );
            
            $this->add_control(
                'read_more_text',
                [
                    'label' => esc_html__('Read More Text', 'Article'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => 'Leggi di più',
                    'placeholder' => esc_html__('Read More', 'Article'),
                ]
            );
            
            $this->add_control(
                'read_more_color',
                [
                    'label' => esc_html__('Button Color', 'Article'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'red',
                    'selectors' => [
                        '{{WRAPPER}} .read-more' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_control(
                'read_more_text_color',
                [
                    'label' => esc_html__('Text Color', 'Article'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'white',
                    'selectors' => [
                        '{{WRAPPER}} .read-more' => 'color: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_control(
                'read_more_hover_color',
                [
                    'label' => esc_html__('Button Hover Color', 'Article'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'darkred',
                    'selectors' => [
                        '{{WRAPPER}} .read-more:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_control(
                'read_more_hover_text_color',
                [
                    'label' => esc_html__('Hover Text Color', 'Article'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'white',
                    'selectors' => [
                        '{{WRAPPER}} .read-more:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            
            $this->add_control(
                'read_more_font_size',
                [
                    'label' => esc_html__('Font Size', 'Article'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 14,
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 30,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .read-more' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_control(
                'read_more_padding',
                [
                    'label' => esc_html__('Padding', 'Article'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'default' => [
                        'top' => 8,
                        'right' => 15,
                        'bottom' => 8,
                        'left' => 15,
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_control(
                'read_more_border_radius',
                [
                    'label' => esc_html__('Border Radius', 'Article'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 3,
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 50,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .read-more' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->end_controls_section();
            $this->start_controls_section(
                'section_Button_filter',
                [
                    'label' => esc_html__('Button Filter', 'Article'),
                ]
            );
            $this->add_control(
                'filter_active',
                [
                    'label' => esc_html__('Button Filter Active', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Button filter Inactive text color', 'Article'),
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
                    'label' => esc_html__('Button filter Inactive text Font Family', 'Article'),
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
                    'label' => esc_html__('Button filter Inactive background color', 'Article'),
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
                    'label' => esc_html__('Button filter Inactive text Font Size', 'Article'),
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
                    'label' => esc_html__('Button filter Inactive text bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Button filter Active  text clor', 'Article'),
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
                    'label' => esc_html__('Button filter Active text Font Family', 'Article'),
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
                    'label' => esc_html__('Button filter Active background color', 'Article'),
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
                    'label' => esc_html__('Button filter Active text Font Size', 'Article'),
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
                    'label' => esc_html__('Button filter Active text bold ', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Button filter Hover text color', 'Article'),
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
                    'label' => esc_html__('Button filter hover text Font Family', 'Article'),
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
                    'label' => esc_html__('Button filter Hover background color', 'Article'),
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
                    'label' => esc_html__('Button filter Hover text Font Size', 'Article'),
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
                    'label' => esc_html__(' Button filter Hover text Bold', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Show categories related to the one one you selected', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
                    'return_value' => 'on',
                    'default' => 'off',
                ]
            );
            $this->add_control(
                'include_all',
                [
                    'label' => esc_html__('Show all even if someone is excluded', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('on', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Search', 'Article'),
                ]
            );
            $this->add_control(
                'search_active',
                [
                    'label' => esc_html__('Search Active', 'Article'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Article'),
                    'label_off' => esc_html__('Off', 'Article'),
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
                    'label' => esc_html__('Background color', 'Article'),
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
                    'label' => esc_html__('Text color', 'Article'),
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
                    'label' => esc_html__('Icon color', 'Article'),
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
                    'label' => esc_html__('Cursor color', 'Article'),
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
                    'label' => esc_html__('Search Font Size', 'Article'),
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

        protected function render() { 
            $settings = $this->get_settings_for_display();
            
            // Query arguments
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $settings['posts_per_page'] ?: 4,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            // Category filtering
            if (!empty($settings['categories_in'])) {
                $args['category__in'] = $settings['categories_in'];
            }
            
            if (!empty($settings['exclude_categories']) && $settings['include_all'] !== 'on') {
                $args['category__not_in'] = $settings['exclude_categories'];
            }
            
            // Run the query
            $query = new \WP_Query($args);
            
            // Get all categories for filter buttons
            $all_categories = [];
            if ($settings['filter_active'] === 'inline-block') {
                $categories = get_categories();
                foreach ($categories as $category) {
                    if (!empty($settings['categories_in'])) {
                        if (in_array($category->term_id, $settings['categories_in'])) {
                            $all_categories[$category->term_id] = $category->name;
                        }
                    } else if (!empty($settings['exclude_categories']) && $settings['include_all'] !== 'on') {
                        if (!in_array($category->term_id, $settings['exclude_categories'])) {
                            $all_categories[$category->term_id] = $category->name;
                        }
                    } else {
                        $all_categories[$category->term_id] = $category->name;
                    }
                }
            }
            
            // Start output
            echo '<div class="article-widget-container">';
            
            // Category filter buttons
            if ($settings['filter_active'] === 'inline-block') {
                echo '<div class="category-filter">';
                echo '<button class="category-filter-button active" data-category="all">' . esc_html($settings['All_place'] ?: 'All') . '</button>';
                
                foreach ($all_categories as $cat_id => $cat_name) {
                    echo '<button class="category-filter-button" data-category="' . esc_attr($cat_id) . '">' . esc_html($cat_name) . '</button>';
                }
                
                echo '</div>';
            }
            
            // Search box
            if ($settings['search_active'] === 'inline-block') {
                echo '<div class="container2">';
                echo '<input type="text" class="input2" placeholder="' . esc_attr($settings['Search_place'] ?: 'Search') . '">';
                echo '<button class="submit-button"><i class="fa fa-search"></i></button>';
                echo '</div>';
            }
            
            // Articles grid
            if ($query->have_posts()) {
                echo '<div class="articles-grid">';
                
                while ($query->have_posts()) {
                    $query->the_post();
                    
                    // Get post categories
                    $post_categories = get_the_category();
                    $category_classes = '';
                    $category_names = [];
                    
                    foreach ($post_categories as $category) {
                        $category_classes .= ' category-' . $category->term_id;
                        $category_names[] = $category->name;
                    }
                    
                    // Get featured image or default
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$image_url && isset($settings['default_image']['url'])) {
                        $image_url = $settings['default_image']['url'];
                    }
                    
                    // Get post content
                    $content = get_the_content();
                    if ($settings['remove_title'] === 'on') {
                        $content = preg_replace('/<h2[^>]*>(.*?)<\/h2>/i', '', $content, 1);
                    }
                    
                    // Limit words for excerpt
                    $word_limit = wp_is_mobile() ? $settings['content_word_mobile'] : $settings['content_word_pc'];
                    $words = explode(' ', strip_tags($content));
                    $excerpt = implode(' ', array_slice($words, 0, $word_limit));
                    
                    // Article card HTML
                    echo '<div class="article-card' . esc_attr($category_classes) . '">';
                    
                    // Image section
                    echo '<div class="article-image">';
                    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '">';
                    
                    // Category tag
                    if ($settings['category_active'] === 'flex' && !empty($category_names)) {
                        echo '<div class="category-card2">';
                        echo '<span class="category">' . esc_html(implode(', ', $category_names)) . '</span>';
                        echo '</div>';
                    }
                    echo '</div>';
                    
                    // Content section
                    echo '<div class="article-content">';
                    
                    // Date
                    if ($settings['date_active'] === 'inline-block') {
                        echo '<div class="date-card2">';
                        echo '<span class="date">' . get_the_date() . '</span>';
                        echo '</div>';
                    }
                    
                    // Tags
                    if ($settings['tag_active'] === 'inline-block') {
                        $tags = get_the_tags();
                        if ($tags) {
                            echo '<div class="tag-card2">';
                            $tag_names = [];
                            foreach ($tags as $tag) {
                                $tag_names[] = $tag->name;
                            }
                            echo '<span class="tag">' . esc_html(implode(', ', $tag_names)) . '</span>';
                            echo '</div>';
                        }
                    }
                    
                    // Title
                    echo '<h2 class="article-title title">' . get_the_title() . '</h2>';
                    
                    // Excerpt
                    echo '<div class="description">' . $excerpt . '...</div>';
                    
                    // Read more link
                    echo '<a href="' . get_permalink() . '" class="read-more">' . esc_html($settings['read_more_text'] ?: 'Leggi di più') . '</a>';                    
                    echo '</div>'; // End article-content
                    echo '</div>'; // End article-card
                }
                
                echo '</div>'; // End articles-grid
                wp_reset_postdata();
            } else {
                // No posts found
                echo '<div class="error-message">' . esc_html($settings['error_message'] ?: 'No post found') . '</div>';
            }
            
            echo '</div>'; // End article-widget-container
            
            // Add CSS
            echo '
            <style>
            .article-widget-container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }
            
            .category-filter {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-bottom: 20px;
            }
            
            .category-filter-button {
                padding: 8px 16px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            
            .container2 {
                position: relative;
                margin-bottom: 20px;
            }
            
            .input2 {
                width: 100%;
                padding: 10px 40px 10px 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
            
            .submit-button {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                cursor: pointer;
            }
            
            .articles-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
            }
            
            .article-card {
                border: 1px solid #ddd;
                border-radius: 5px;
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            
            .article-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }
            
            .article-image {
                position: relative;
                height: 200px;
                overflow: hidden;
            }
            
            .article-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .category-card2 {
                position: absolute;
                top: 10px;
                left: 10px;
                display: flex;
            }
            
            .category {
                background-color: red;
                color: white;
                padding: 5px 10px;
                font-size: 12px;
                border-radius: 3px;
            }
            
            .article-content {
                padding: 15px;
            }
            
            .date-card2, .tag-card2 {
                display: flex;
                margin-bottom: 10px;
            }
            
            .date, .tag {
                font-size: 14px;
                color: #666;
            }
            
            .article-title {
                margin: 10px 0;
            }
            
            .description {
                margin-bottom: 15px;
                line-height: 1.5;
            }
            
            .read-more {
                display: inline-block;
                background-color: red;
                color: white;
                padding: 8px 15px;
                text-decoration: none;
                border-radius: 3px;
                transition: background-color 0.3s ease;
            }
            
            .read-more:hover {
                background-color: darkred;
            }
            
            .error-message {
                padding: 20px;
                text-align: center;
            }
            
            @media (max-width: 768px) {
                .articles-grid {
                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                }
            }
            </style>
            
            <script>
            jQuery(document).ready(function($) {
                // Category filter functionality
                $(".category-filter-button").click(function() {
                    var category = $(this).data("category");
                    
                    // Update active button
                    $(".category-filter-button").removeClass("active");
                    $(this).addClass("active");
                    
                    // Show/hide articles based on category
                    if (category === "all") {
                        $(".article-card").show();
                    } else {
                        $(".article-card").hide();
                        $(".article-card.category-" + category).show();
                    }
                });
                
                // Search functionality
                $(".input2").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    
                    $(".article-card").filter(function() {
                        var title = $(this).find(".article-title").text().toLowerCase();
                        var content = $(this).find(".description").text().toLowerCase();
                        var matches = title.indexOf(value) > -1 || content.indexOf(value) > -1;
                        $(this).toggle(matches);
                    });
                });
            });
            </script>';
        }
    }