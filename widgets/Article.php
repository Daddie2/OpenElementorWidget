    
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
            if ($settings['posts_per_page'] == null) {
                $settings['posts_per_page'] = 4;
            }
            $args = array(
                'post_type' => 'post',
                'posts_per_page' =>$settings['posts_per_page'],
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $query = new WP_Query($args);
            
            if ($query->have_posts()) :
                echo '<div class="articles-grid">';
                while ($query->have_posts()) : $query->the_post();
                    $category = get_the_category();
                    $cat_name = $category[0]->name;
                    ?>
                    <div class="article-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="article-image">
                                <?php the_post_thumbnail('medium'); ?>
                                <span class="category-tag"><?php echo esc_html($cat_name); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="article-content">
                            <span class="article-date"><?php echo get_the_date('d F Y'); ?></span>
                            <h2 class="article-title"><?php the_title(); ?></h2>
                            <a href="<?php the_permalink(); ?>" class="read-more">Leggi di più</a>
                        </div>
                    </div>
                <?php
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            else :
                echo 'Nessun articolo trovato.';
            endif;
            ?>                  <?php

echo '
<style>
.articles-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.article-card {
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
}

.article-image {
    position: relative;
}

.article-image img {
    width: 100%;
    height: auto;
}

.category-tag {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: red;
    color: white;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
}

.article-content {
    padding: 15px;
}

.article-date {
    font-size: 14px;
    color: #666;
}

.article-title {
    margin: 10px 0;
}

.read-more {
    display: inline-block;
    background-color: red;
    color: white;
    padding: 5px 15px;
    text-decoration: none;
    border-radius: 3px;
}
  </style>';
                }
                            }
