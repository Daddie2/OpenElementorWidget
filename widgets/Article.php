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
                    'selected_page',
                    [
                        'label' => esc_html__(' Select Page if you have a page with all post, made with this widget for the links', 'Article'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => $this->get_pages(),
                        'default' => 0,
                    ]
                );
                $this->add_control(
                    'column_width',
                    [
                        'label' => esc_html__('Columns Width', 'Article'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', 'em', '%'],
                        'default' => [
                            'size' => 23,
                            'unit' => '%',
                        ],
                        'range' => [
                            'px' => [
                                'min' => 200,
                                'max' => 600,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                            'em' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .articles-grid' => 'grid-template-columns: repeat(auto-fill, minmax({{SIZE}}{{UNIT}}, 1fr));',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_card_border_radius',
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
                            '{{WRAPPER}} .article-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_background',
                    [
                        'label' => esc_html__('Color Background', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'white',
                        'selectors' => [
                            '{{WRAPPER}} .article-card' => 'background-color: {{VALUE}} !important;',


                        ],
                    ]
                );
                $this->add_control(
                    'Article_border',
                    [
                        'label' => esc_html__('Card border width', 'Article'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'default' => [
                            'size' => 1,
                            'unit' => 'px',
                        ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 50,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .article-card' => 'border: solid {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_border_color',
                    [
                        'label' => esc_html__('Card color Border', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'black',
                        'selectors' => [
                            '{{WRAPPER}} .article-card' => 'border-color: {{VALUE}} !important;',
                        ],
                    ]
                );
                
                $this->end_controls_section();
                $this->start_controls_section(
                    'section_image',
                    [
                        'label' => esc_html__('Article image', 'Article'),
                    ]
                );
                $this->add_control(
                    'image_border_width',
                    [
                        'label' => esc_html__('Image Border Width', 'Article'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 10,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .article-image-inner' => 'border: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                
                $this->add_control(
                    'image_border_color',
                    [
                        'label' => esc_html__('Image Border Color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '#000000',
                        'selectors' => [
                            '{{WRAPPER}} .article-image-inner' => 'border-style: solid; border-color: {{VALUE}};',
                        ],
                        'condition' => [
                            'image_border_width[size]!' => 0,
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
                    'title_active',
                    [
                        'label' => esc_html__('Title disable', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'none',
                        'default' => 'flex',
                        'selectors' => [
                            '{{WRAPPER}} .Article-title' => 'display: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'title_link',
                    [
                        'label' => esc_html__('Active Title Link', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'allowed',
                        'default' => 'not-allowed',
                    ]
                );
                $this->add_control(
                    'Title_color',
                    [
                        'label' => esc_html__('Color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'black',
                        'selectors' => [
                            '{{WRAPPER}} .Article-title' => 'color: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'Title color_hover',
                    [
                        'label' => esc_html__('Color hover', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'red',
                        'selectors' => [
                            '{{WRAPPER}} .Article-title:hover' => 'color: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-title' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-title' => 'font-family: {{VALUE}}',
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
                            '{{WRAPPER}} .Article-title' => 'font-weight: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'hover_title_normal',
                    [
                        'label' => esc_html__('Hover Title Normal', 'Latest-Posts-Hover'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                        'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                        'return_value' => 'normal',
                        'default' => 'bold',
                        'selectors' => [
                            '{{WRAPPER}} .Article-title:hover' => 'font-weight: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-title' => 'text-align: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-date' => 'display: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'date_link',
                    [
                        'label' => esc_html__('Disable date Link', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'none',
                        'default' => 'all',
                        'selectors' => [
                            '{{WRAPPER}} .Article-date' => 'pointer-events: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-date' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Date_color_hover',
                    [
                        'label' => esc_html__('Color hover', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'red',
                        'selectors' => [
                            '{{WRAPPER}} .Article-date:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'hover_date_normal',
                    [
                        'label' => esc_html__('Hover Date Normal', 'Latest-Posts-Hover'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                        'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                        'return_value' => 'normal',
                        'default' => 'bold',
                        'selectors' => [
                            '{{WRAPPER}} .Article-date:hover' => 'font-weight: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'hover_date_font_size',
                    [
                        'label' => esc_html__('Hover Font Size', 'Latest-Posts-Hover'),
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
                            '{{WRAPPER}} .Article-date:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-date' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-date' => 'font-family: {{VALUE}}',
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
                            '{{WRAPPER}} .Article-date' => 'font-weight: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-date-card2' => 'justify-content: {{VALUE}};',
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
                        'label' => esc_html__('Tag active', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'inline-block',
                        'default' => 'none',
                        'selectors' => [
                            '{{WRAPPER}} .Article-tag' => 'display: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'tag_link',
                    [
                        'label' => esc_html__('Disable tag Link', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'none',
                        'default' => 'all',
                        'selectors' => [
                            '{{WRAPPER}} .Article-tag' => 'pointer-events: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-tag' => 'color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-tag' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-tag' => 'font-family: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'tag_bold',
                    [
                        'label' => esc_html__('Tag bold', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'bold',
                        'default' => 'normal',
                        'selectors' => [
                            '{{WRAPPER}} .Article-tag' => 'font-weight: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'tag_normal_hover',
                    [
                        'label' => esc_html__('Tag hover normal', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'normal',
                        'default' => 'bold',
                        'selectors' => [
                            '{{WRAPPER}} .Article-tag:hover' => 'font-weight: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-tag' => 'text-align: {{VALUE}} ;',
                            '{{WRAPPER}} .tag-card2' => 'text-align: {{VALUE}} ;',
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
                    'section_Article-category',
                    [
                        'label' => esc_html__('Category', 'Article'),
                    ]
                );
                $this->add_control(
                    'Article-category_active',
                    [
                        'label' => esc_html__('Category Active', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'flex',
                        'default' => 'none',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category' => 'display: {{VALUE}};',
                            '{{WRAPPER}} .Article-category-card2' => 'display: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'category_number',
                    [
                        'label' => esc_html__('Number of visible categories', 'Article'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'default' => 1,
                        'min' => 1,
                        'max' => 3,
                    ]
                );
                $this->add_control(
                    'Article-category_color',
                    [
                        'label' => esc_html__('Color Text', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'white',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article-category_background',
                    [
                        'label' => esc_html__('Color Background', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'red',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category' => 'background-color: {{VALUE}} !important;',
                        ],
                    ]
                );
        
                $this->add_control(
                    'Article-category_color_hover',
                    [
                        'label' => esc_html__('Color Text Hover', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'black',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category:hover' => 'color: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_category_border_radius',
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
                            '{{WRAPPER}} .Article-category' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article-category_padding',
                    [
                        'label' => esc_html__(' Category padding', 'Article'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', 'em', '%'],
                        'default' => [
                            'top' => -1,
                            'right' => -1,
                            'bottom' => -1,
                            'left' => -1,
                            'unit' => 'px',
                            'isLinked' => false,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .Article-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article-category_font_size',
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
                            '{{WRAPPER}} .Article-category' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article-category_font',
                    [
                        'label' => esc_html__('Font Family', 'Article'),
                        'type' => \Elementor\Controls_Manager::FONT,
                        'default' => "Work Sans",
                        'selectors' => [
                            '{{WRAPPER}} .Article-category' => 'font-family: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'Article-category_bold',
                    [
                        'label' => esc_html__('Category Bold', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'bold',
                        'default' => 'normal',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category' => 'font-weight: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article-category_alignment',
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
                            '{{WRAPPER}} .Article-category-card2' => 'justify-content: {{VALUE}} !important;',
                            '{{WRAPPER}} .Article-category' => 'justify-content: {{VALUE}} !important;',

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
                    'content_link',
                    [
                        'label' => esc_html__('Active Content Link', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'allowed',
                        'default' => 'not-allowed',
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
                            '{{WRAPPER}} .Article-description' => 'text-align: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-description' => 'color: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-description' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-description' => 'font-family: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'content_bold',
                    [
                        'label' => esc_html__('Content Bold', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'bold',
                        'default' => 'normal',
                        'selectors' => [
                            '{{WRAPPER}} .Article-description' => 'font-weight: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-description' => 'text-align: {{VALUE}};',
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
                        'default' => 'Read more',
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
                            '{{WRAPPER}} .Article-read-more' => 'background-color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-read-more' => 'color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-read-more:hover' => 'background-color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-read-more:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'read_more_bold',
                    [
                        'label' => esc_html__('Read more Bold', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'bold',
                        'default' => 'normal',
                        'selectors' => [
                            '{{WRAPPER}} .Article-read-more' => 'font-weight: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'hover_read_more_normal',
                    [
                        'label' => esc_html__('Hover Read more Normal', 'Latest-Posts-Hover'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                        'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                        'return_value' => 'normal',
                        'default' => 'bold',
                        'selectors' => [
                            '{{WRAPPER}} .Article-read-more:hover' => 'font-weight: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-read-more' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'read_more_font_size_hober',
                    [
                        'label' => esc_html__('Font Size hover', 'Article'),
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
                            '{{WRAPPER}} .Article-read-more:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-read-more' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                
                $this->end_controls_section();
                $this->start_controls_section(
                    'section_Button_filter',
                    [
                        'label' => esc_html__('Category button Filter', 'Article'),
                    ]
                );
                $this->add_control(
                    'filter_active',
                    [
                        'label' => esc_html__('Category button Filter Active', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'inline-block',
                        'default' => 'none',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category-filter-button' => 'display: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-category-filter-button' => '  color: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-category-filter-button' => 'font-family: {{VALUE}}',
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
                            '{{WRAPPER}} .Article-category-filter-button' => '  background-color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-category-filter-button' => 'font-weight: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-category-filter-button.active' => '  color: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-category-filter-button.active' => 'font-family: {{VALUE}}',
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
                            '{{WRAPPER}} .Article-category-filter-button.active' => '  background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Category_button_border_radius',
                    [
                        'label' => esc_html__('Category button Border Radius', 'Article'),
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
                            '{{WRAPPER}} .Article-category-filter-button' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-category-filter-button' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-category-filter-button.active' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-category-filter-button:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-category-filter-button.active' => 'font-weight: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-category-filter-button:hover' => '  color: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-category-filter-button:hover' => 'font-family: {{VALUE}}',
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
                            '{{WRAPPER}} .Article-category-filter-button:hover' => '  background-color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-category-filter-button:hover' => 'font-weight: {{VALUE}};',
                        ],
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
                    'section_Reset_filter',
                    [
                        'label' => esc_html__('Reset button Filter', 'Article'),
                    ]
                );
                $this->add_control(
                    'reset_button',
                    [
                        'label' => esc_html__('Reset Filter Text', 'Article'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Reset Filter',
                        'placeholder' => esc_html__('Reset Filter', 'Article'),
                    ]
                );
                $this->add_control(
                    'reset_text_color_inactive',
                    [
                        'label' => esc_html__('Reset filter text color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'white',
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters' => '  color: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'reset_text_font_inactive',
                    [
                        'label' => esc_html__('Reset filter text Font Family', 'Article'),
                        'type' => \Elementor\Controls_Manager::FONT,
                        'default' => "Work Sans",
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters' => 'font-family: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_background_color_inactive',
                    [
                        'label' => esc_html__('Reset filter background color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'black',
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters' => '  background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_inactive_font_size',
                    [
                        'label' => esc_html__('Reset filter text Font Size', 'Article'),
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
                            '{{WRAPPER}} .Article-reset-filters' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_Text_inactive_bold',
                    [
                        'label' => esc_html__('Reset filter text bold', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'bold',
                        'default' => 'normal',
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters' => 'font-weight: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_text_color_hover',
                    [
                        'label' => esc_html__('Reset filter Hover text color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'white',
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters:hover' => '  color: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_text_font_hover',
                    [
                        'label' => esc_html__('Reset filter hover text Font Family', 'Article'),
                        'type' => \Elementor\Controls_Manager::FONT,
                        'default' => "Work Sans",
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters:hover' => 'font-family: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_background_color_hover',
                    [
                        'label' => esc_html__('Reset filter Hover background color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'orange',
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters:hover' => '  background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'Reset_hover_font_size',
                    [
                        'label' => esc_html__('Reset filter Hover text Font Size', 'Article'),
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
                            '{{WRAPPER}} .Article-reset-filters:hover' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_filter_border_radius',
                    [
                        'label' => esc_html__('Reset Border Radius', 'Article'),
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
                            '{{WRAPPER}} .Article-reset-filters' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Reset_Text_hover_normal',
                    [
                        'label' => esc_html__(' Reset filter Hover text normal', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'normal',
                        'default' => 'bold',
                        'selectors' => [
                            '{{WRAPPER}} .Article-reset-filters:hover' => 'font-weight: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_filter_badge_text_color_inactive',
                    [
                        'label' => esc_html__('Article filter badge text color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'white',
                        'selectors' => [
                            '{{WRAPPER}} .Article-filter-badge' => '  color: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'reset_text_font_inactive',
                    [
                        'label' => esc_html__('Article filter badge text Font Family', 'Article'),
                        'type' => \Elementor\Controls_Manager::FONT,
                        'default' => "Work Sans",
                        'selectors' => [
                            '{{WRAPPER}} .Article-filter-badge' => 'font-family: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_filter_badge_background_color_inactive',
                    [
                        'label' => esc_html__('Article filter badge background color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'black',
                        'selectors' => [
                            '{{WRAPPER}} .Article-filter-badge' => '  background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_filter_badge_inactive_font_size',
                    [
                        'label' => esc_html__('Article filter badge text Font Size', 'Article'),
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
                            '{{WRAPPER}} .Article-filter-badge' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'Article_filter_badge_border_radius',
                    [
                        'label' => esc_html__('Article Filter Badge Border Radius', 'Article'),
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
                            '{{WRAPPER}} .Article-filter-badge' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
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
                        'return_value' => 'flex',
                        'default' => 'none',
                        'selectors' => [
                            '{{WRAPPER}} .article-widget-container2' => 'display: {{VALUE}};',
                            '.elementor-editor-active {{WRAPPER}} .article-widget-container2' => 'display: {{VALUE}} !important;',
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
                                    .article-input2' => '  background: {{VALUE}} !important;',
                            '{{WRAPPER}} .article-input2:focus' => ' background: {{VALUE}}!important;',
                            '{{WRAPPER}} .article-input2:hover' => ' background: {{VALUE}}!important;',
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
                            '{{WRAPPER}} .article-input2' => ' color: {{VALUE}}!important;',

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
                            '{{WRAPPER}} .article-icon2' => ' color: {{VALUE}}!important;',
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
                            '{{WRAPPER}} .article-input2' => ' caret-color: {{VALUE}}!important;',
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
                            '{{WRAPPER}} .article-input2' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    'posts_per_page' => $settings['posts_per_page'],
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                if ($settings['all_post'] == 'all') {
                    $args['posts_per_page'] = -1;
                }

                // Search
                // Category filtering
                if (!empty($settings['categories_in'])) {
                    $args['category__in'] = $settings['categories_in'];
                }
                
                if (!empty($settings['exclude_categories']) && $settings['include_all'] !== 'on') {
                    $args['category__not_in'] = $settings['exclude_categories'];
                }
                
                // Filtro per data dall'URL
                if (isset($_GET['Article-date'])) {
                    $date_param = sanitize_text_field($_GET['Article-date']);
                    
                    // Controlla il formato della data
                    if (substr($date_param, -1) == 'm') {
                        // Formato mese (YYYY/MM m)
                        $year = intval(substr($date_param, 0, 4));
                        $month = intval(substr($date_param, 5, 2));
                        
                        $args['date_query'] = array(
                            'year'  => $year,
                            'month' => $month,
                            'day'   => array(
                                'start' => 1,
                                'end'   => cal_days_in_month(CAL_GREGORIAN, $month, $year),
                            ),
                        );
                    } elseif (strlen($date_param) === 4) {
                        // Solo anno (YYYY)
                        $args['date_query'] = array(
                            'year' => intval($date_param),
                        );
                    } elseif (strlen($date_param) === 10) {
                        // Data completa (YYYY/MM/DD)
                        $args['date_query'] = array(
                            'year'  => intval(substr($date_param, 0, 4)),
                            'month' => intval(substr($date_param, 5, 2)),
                            'day'   => intval(substr($date_param, 8, 2)),
                        );
                    }
                }
                
                // Filtro per tag dall'URL
                if (isset($_GET['Article-tag'])) {
                    $args['tag'] = sanitize_text_field($_GET['Article-tag']);
                }
                
                // Run the query
                $query = new \WP_Query($args);
                
                // Trova le categorie effettivamente presenti nei risultati della query
                $categories_in_query = [];
                if ($query->have_posts()) {
                    foreach ($query->posts as $post_obj) {
                        $post_categories = get_the_category($post_obj->ID);
                        if (!empty($post_categories) && !is_wp_error($post_categories)) {
                            foreach ($post_categories as $post_category) {
                                $categories_in_query[$post_category->term_id] = true;
                            }
                        }
                    }
                }
                
                // Get all categories for filter buttons, ma solo quelle con almeno un articolo nella query
                $all_categories = [];
                    $categories = get_categories();
                    foreach ($categories as $category) {
                        // Salta le categorie che non compaiono in nessun articolo della query
                        if (empty($categories_in_query[$category->term_id])) {
                            continue;
                        }
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
                    echo '<div class="article-widget-container">';
                
                // Aggiungi pulsante reset filtri se necessario
                if (isset($_GET['Article-date']) || isset($_GET['Article-tag'])) {
                    echo '<div class="Article-active-filters">';
                    if (isset($_GET['Article-date'])) {
                        $date_param = $_GET['Article-date'];
                        if(substr($_GET['Article-date'], -1) =='m'){
                            $date_param = substr($_GET['Article-date'], 0, 4).'/'.substr($_GET['Article-date'], 5, 2);
                        }
                        echo '<span class="Article-filter-badge">Data: ' . esc_html($date_param) . '</span>';
                    }
                    if (isset($_GET['Article-tag'])) {
                        echo '<span class="Article-filter-badge">Tag: ' . esc_html($_GET['Article-tag']) . '</span>';
                    }
                    echo '<button class="Article-reset-filters">'.$settings['reset_button'].'</button>';
                    echo '</div>';
                }
                
                echo '<div class="Article-category-filter">';
                if (!empty($settings['include_all']) && $settings['include_all'] === 'on') {
                    echo '<button class="Article-category-filter-button active" data-Article-category="all">' . esc_html($settings['All_place'] ?: 'All') . '</button>';
                }
                    
                    foreach ($all_categories as $cat_id => $cat_name) {
                        echo '<button class="Article-category-filter-button" data-Article-category="' . esc_attr($cat_id) . '">' . esc_html($cat_name) . '</button>';
                    }
                    
                    echo '</div>';
                    echo '<div class="article-widget-container2">';
                    echo '<div class="search-form-container">';
                    echo '<input type="text" id="article-input2" class="article-input2 article-input" placeholder="' . esc_attr($settings['Search_place'] ?: 'Search') . '" autocomplete="off">';
                    echo '<div class="article-icon2">';
                    echo '<button type="button" id="search-button" class="article-submit-button article-submit">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="70"></path>
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                    </svg>';
                    echo '</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                // Articles grid
                if ($query->have_posts()) {
                    echo '<div class="articles-grid">';
                    $selected_page_id = $settings['selected_page'];
                    while ($query->have_posts()) {
                        $query->the_post();

                        // Get post categories
                        $post_categories = get_the_category();
                        $category_classes = '';
                        $category_names = [];
                        
                        foreach ($post_categories as $category) {
                            $category_classes .= ' Article-category-' . $category->term_id;
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
                                                                        // Clean content from Elementor code and other HTML
                                                                        $clean_content = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $content); // Remove style tags
                                                                        $clean_content = preg_replace('/\*!.*?\*\//s', '', $clean_content); // Remove CSS comments
                                                                        $clean_content = preg_replace('/\.elementor.*?\}/s', '', $clean_content); // Remove elementor CSS rules
                                                                        
                                                                        // Replace heading tags with text + space before stripping tags
                                                                        $clean_content = preg_replace('/<h1[^>]*>(.*?)<\/h1>/is', '$1 ', $clean_content);
                                                                        $clean_content = preg_replace('/<h2[^>]*>(.*?)<\/h2>/is', '$1 ', $clean_content);
                                                                        $clean_content = preg_replace('/<h3[^>]*>(.*?)<\/h3>/is', '$1 ', $clean_content);
                                                                        $clean_content = preg_replace('/<h4[^>]*>(.*?)<\/h4>/is', '$1 ', $clean_content);
                                                                        $clean_content = preg_replace('/<h5[^>]*>(.*?)<\/h5>/is', '$1 ', $clean_content);
                                                                        $clean_content = preg_replace('/<h6[^>]*>(.*?)<\/h6>/is', '$1 ', $clean_content);
                                                                        $clean_content = preg_replace('/<p[^>]*>(.*?)<\/p>/is', '$1 ', $clean_content);
                                                                        $clean_content = preg_replace('/<li[^>]*>(.*?)<\/li>/is', '$1 ', $clean_content); // Handle list items
                                                                        $clean_content = preg_replace('/<ol[^>]*>(.*?)<\/ol>/is', '$1 ', $clean_content); // Handle ordered lists
                                                                        $clean_content = preg_replace('/<ul[^>]*>(.*?)<\/ul>/is', '$1 ', $clean_content); // Handle unordered lists
                                                                        
                                                                        // Remove numbered list formatting (like "1. ", "2. ", etc.)                                                                     
                                                                        $clean_content = wp_strip_all_tags($clean_content); // Better than strip_tags()
                                                                        $clean_content = preg_replace('/\s+/', ' ', $clean_content); // Normalize whitespace
                                                                        $clean_content = preg_replace('/[\r\n]+/', ' ', $clean_content); // Replace line breaks with spaces
                                                                        $clean_content = trim($clean_content); // Remove leading/trailing whitespace
                                                                                $word_limit = wp_is_mobile() ? $settings['content_word_mobile'] : $settings['content_word_pc'];
                                                                                $words = explode(' ', $clean_content);
                                                                                $title_for_length = get_the_title();
                                                                                $title_for_length = preg_replace('/\s+/', ' ', $title_for_length);
                                                                                $title_word_count = count(explode(' ', trim($title_for_length)));
                                                                                if ($title_word_count < 4) {
                                                                                    $word_limit += 12;
                                                                                } elseif ($title_word_count < 7) {
                                                                                    $word_limit += 6;
                                                                                }
                                                                                if ($word_limit > count($words)) {
                                                                                    $word_limit = count($words);
                                                                                }
                                            $excerpt = implode(' ', array_slice($words, 0, $word_limit));
                        
                        // Article card HTML
                            echo '<div class="article-card' . esc_attr($category_classes) . '">';
                        echo '<div class="article-image">';
                        echo '<div class="article-image-inner">'; // Nuovo contenitore per il bordo
                        if (has_post_thumbnail($post->ID)) {
                            echo get_the_post_thumbnail($post->ID, 'medium_large', array('loading' => 'lazy'));
                        } else {
                            echo '<img src="' . $settings['default_image']['url'] . '" alt="Default Image" loading="lazy">';
                        }
                        echo '</div>'; // Chiusura del contenitore interno
                                // Category tag
                
                                echo '<div class="Article-category-card2">';
                    
                                // Mostra solo la prima categoria inizialmente
                                if (count($category_names) > $settings['category_number']) {
                                    // Ottieni l'URL della prima categoria
                                    $first_cat_id = $post_categories[0]->term_id;
                                    $first_cat_url = get_category_link($first_cat_id);
                                    
                                    echo '<span class="Article-category main-category">';
                                    if($selected_page_id!=0){
                                        $cat_url = get_permalink($selected_page_id).'?Article-category='. $first_cat_id;
                                        echo '<a href="' . $cat_url . '" class="Article-category">' . esc_html($category_names[0]) . '</a>';
                                    }
                                    else{
                                        echo '<a href="' . esc_url($first_cat_url) . '" class="Article-category">' . esc_html($category_names[0]) . '</a>';

                                    }
                                    echo '<span class="category-toggle">+</span></span>';
                                    
                                    echo '<div class="Article-hidden-categories">';
                                    for ($i = 1; $i < count($category_names); $i++) {
                                        $cat_id = $post_categories[$i]->term_id;
                                        $cat_url = get_category_link($cat_id); 
                                        echo '<span class="Article-category Article-hidden-category">';
                                        if($selected_page_id!=0){
                                            $cat_url = get_permalink($selected_page_id).'?Article-category='.$cat_id;
                                            echo '<a href="'.$cat_url. '" class="Article-category">'. esc_html($category_names[$i]). '</a>';  
                                        }
                                        else{
                                            echo '<a href="' . esc_url($cat_url) . '" class="Article-category">' . esc_html($category_names[$i]) . '</a>';
                                        }
                                        echo '</span>';
                                    }
                                    echo '</div>';
                                } else {
                                    foreach ($post_categories as $index => $category) {
                                        $cat_url = get_category_link($category->term_id);
                                        echo '<span class="Article-category">';
                                        if($selected_page_id!=0){
                                            $cat_url = get_permalink($selected_page_id).'?Article-category='.$category->term_id;
                                            echo '<a href="' .$cat_url. '" class="Article-category">' . esc_html($category->name) . '</a>';
                                        }
                                        else{
                                            echo '<a href="' . esc_url($cat_url) . '" class="Article-category">' . esc_html($category->name) . '</a>';
                                        }
                                        echo '</span>';
                                    }
                                }
                                
                                echo '</div>';
                        echo '</div>';
                        
                        // Content section
                        echo '<div class="article-content">';
                        
                        // Date
                        $post_numb = get_the_date('Y-m-d');
                        $post_date = get_the_date('j F Y');
                        $date_array = explode('-', $post_numb);
                    $date_parts = explode(' ', $post_date);
                    $i = 2;
                    $date_array[1] = $date_array[0] . '/' . $date_array[1];
                    $date_array[2] = $date_array[1] . '/' . $date_array[2];
                            echo '<div class="Article-date-card2">';
                            if ($selected_page_id != 0) {
                                $page_link = get_permalink($selected_page_id);

                                foreach ($date_parts as $part) {
                                    if ($i == 1) {
                                        $date_array[1] = $date_array[1] . '/01 m';
                                    }
                                    $date_link = add_query_arg('Article-date', $date_array[$i], $page_link);
                                    echo ' <a href="' . esc_url($date_link) . '" class="Article-date">' . ucfirst($part) . '&nbsp</a>';
                                    $i -= 1;
                                }
                            }
                                else {
                                    $i = 2;
                                    foreach ($date_parts as $part) {
                                        // Correggo la formattazione del link della data
                                        $date_link = home_url() . '/' . $date_array[$i];
                                        echo '<a href="' . esc_url($date_link) . '" class="Article-date">' . ucfirst($part) . '&nbsp</a> ';
                                        $i -= 1;
                                    }
                                }
                            echo '</div>';
                        
                        // Tags
                            $tags = get_the_tags();
                            if ($tags) {
                                echo '<div class="tag-card2">';
                                $tag_names = [];
                                foreach ($tags as $tag) {
                                    $tag_names[] = $tag->name;
                                
                                if($selected_page_id!= 0){
                                    $tag_link = add_query_arg('Article-tag', $tag->slug, $page_link);
                                }  
                                if($selected_page_id== 0){
                                    $tag_link=get_tag_link($tag->term_id);
                                }
                            echo '<a class="Article-tag" href="' . $tag_link . '">' . $tag->name . '&nbsp;</a>';

                            }
                        
                                echo '</div>';
                            }

                        // Title
                        if($settings['title_link'] != 'allowed'){
                            // Process the title to ensure proper spacing between heading parts
                            $title = get_the_title();
                            $title = preg_replace('/\s+/', ' ', $title); // Normalize whitespace
                            echo '<a class="Article-title" style="pointer-events: none;">' . $title . '</a>';
                        }
                        else{
                            $title = get_the_title();
                            $title = preg_replace('/\s+/', ' ', $title); // Normalize whitespace
                            echo '<a href="' . get_permalink() . '" class="Article-title">' . $title . '</a>';
                        }
                        if($settings['content_link']!= 'allowed'){
                            echo '<div class="Article-description" style="cursor: default;">'. $excerpt. '...</div>';
                        }
                        else{
                            echo '<div class="Article-description"> <a href="' . get_permalink() . '" >'. $excerpt. '... <a></div>';
                        }
                        echo '<a href="' . get_permalink() . '" class="Article-read-more">' . esc_html($settings['read_more_text']) . '</a>';                    
                        echo '</div>'; 
                        echo '</div>';     
                    }
                    echo '</div>';
                    echo '</div>'; 
                    wp_reset_postdata();
                } else {
                    // No posts found
                    echo '<div class="error-message">' . esc_html($settings['error_message'] ?: 'No post found') . '</div>';
                }
                
            // End article-widget-container
                
                // Add JavaScript for filtering and search functionality
                echo '<script>
                (function() {
                    // Wait for DOM to be fully loaded
                    document.addEventListener("DOMContentLoaded", function() {
                        // Find the closest widget container
                        var scriptTag = document.currentScript;
                        var widgetContainer = scriptTag ? scriptTag.closest(".elementor-widget-container") : null;
                        
                        if (!widgetContainer) {
                            // Fallback: find the widget by looking for the parent of our container
                            var articleContainer = document.querySelector(".article-widget-container");
                            if (articleContainer) {
                                widgetContainer = articleContainer.closest(".elementor-widget-container");
                            }
                        }
                        
                        if (!widgetContainer) {
                            console.error("Widget container not found");
                            return;
                        }
                        
                        // Set a unique ID for the widget container
                        var widgetId = "article-widget-" + Math.random().toString(36).substr(2, 9);
                        widgetContainer.id = widgetId;
                        
                        // Select elements within this specific widget
                        var categoryButtons = widgetContainer.querySelectorAll(".Article-category-filter-button");
                        var searchInput = widgetContainer.querySelector(".article-input2");
                        var searchButton = widgetContainer.querySelector(".article-submit-button");
                        var cards = widgetContainer.querySelectorAll(".article-card");
                        if (window.location.search.includes("Article-category=")) {
                            var currentUrl = new URL(window.location.href);
                            var categoryId = currentUrl.searchParams.get("Article-category");
                            
                            // Find and activate the button that corresponds to this category
                            categoryButtons.forEach(function(btn) {
                                // First remove active class from all buttons
                                btn.classList.remove("active");
                                
                                if (btn.getAttribute("data-Article-category") === categoryId) {
                                    btn.classList.add("active");
                                }
                            });
                            
                            // If no button was activated and we have an "all" button, activate it
                            var activeButton = widgetContainer.querySelector(".Article-category-filter-button.active");
                            if (!activeButton) {
                                var allButton = widgetContainer.querySelector(\'.Article-category-filter-button[data-Article-category="all"]\');
                                if (allButton) {
                                    allButton.classList.add("active");
                                }
                            }
                            
                            // Filter the cards based on the category
                            
                            cards.forEach(function(card) {
                                if (categoryId === "all") {
                                    card.style.display = "block";
                                } else if (card.classList.contains("Article-category-" + categoryId)) {
                                    card.style.display = "block";
                                } else {
                                    card.style.display = "none";
                                }
                            }); 
                        }
                        // Handle category filter buttons
                        categoryButtons.forEach(function(button) {
                            button.addEventListener("click", function(e) {
                                e.preventDefault(); // Prevent default button behavior
                                
                                // Remove active class from all buttons
                                categoryButtons.forEach(function(btn) {
                                    btn.classList.remove("active");
                                });
                                
                                // Add active class to clicked button
                                this.classList.add("active");
                                
                                // Get category ID
                                var categoryId = this.getAttribute("data-Article-category");
                                
                                // Store the selected category in localStorage
            
                                
                                // Update URL by removing any existing category parameter and adding the new one
                                var currentUrl = new URL(window.location.href);
                                currentUrl.searchParams.delete("Article-category");
                                
                            
                                
                                // Update browser history without reloading
                                window.history.pushState({}, "", currentUrl.toString());
                                
                        
                                cards.forEach(function(card) {
                                    if (categoryId === "all") {
                                        card.style.display = "block";
                                    } else if (card.classList.contains("Article-category-" + categoryId)) {
                                        card.style.display = "block";
                                    } else {
                                        card.style.display = "none";
                                    }
                                });
                            });
                        });               
                        var searchInput = widgetContainer.querySelector(".article-input2");
                        var searchButton = widgetContainer.querySelector(".article-submit-button");
                        var cards = widgetContainer.querySelectorAll(".article-card");
                        
                        // Gestione delle categorie espandibili
                        var mainCategories = widgetContainer.querySelectorAll(".main-category");
                        mainCategories.forEach(function(category) {
                            category.addEventListener("click", function() {
                                var parent = this.closest(".Article-category-card2");
                                parent.classList.toggle("show-categories");
                                // Cambia il simbolo da + a X quando è aperto
                                var toggle = this.querySelector(".category-toggle");
                                if (parent.classList.contains("show-categories")) {
                                    toggle.innerHTML = "×";
                                    toggle.textContent = "×";
                                } else {
                                    toggle.innerHTML = "+";
                                    toggle.textContent = "+";
                                }
                            });
                        });
                        
                        // Gestione del pulsante reset filtri
                        var resetButton = widgetContainer.querySelector(".Article-reset-filters");
                        if (resetButton) {
                            resetButton.addEventListener("click", function() {
                                var currentUrl = new URL(window.location.href);
                                currentUrl.searchParams.delete("Article-date");
                                currentUrl.searchParams.delete("Article-tag");
                                window.location.href = currentUrl.toString();
                            });
                        }
                        
                        // Verifica se le categorie sono troppo lunghe e le posiziona correttamente
                        function checkCategoryOverflow() {
                            var categories = widgetContainer.querySelectorAll(".Article-category");
                            var cardWidth = 0;
                            
                            categories.forEach(function(category) {
                                var card = category.closest(".article-card");
                                if (card && !cardWidth) {
                                    cardWidth = card.offsetWidth;
                                }
                                
                                // Calcola la larghezza massima disponibile (80% della card)
                                var maxWidth = cardWidth * 0.8;
                                
                                // Misura la larghezza effettiva del testo
                                var tempSpan = document.createElement("span");
                                tempSpan.style.visibility = "hidden";
                                tempSpan.style.position = "absolute";
                                tempSpan.style.whiteSpace = "nowrap";
                                tempSpan.style.fontSize = window.getComputedStyle(category).fontSize;
                                tempSpan.style.fontFamily = window.getComputedStyle(category).fontFamily;
                                tempSpan.style.fontWeight = window.getComputedStyle(category).fontWeight;
                                tempSpan.innerText = category.innerText;
                                document.body.appendChild(tempSpan);
                                
                                var textWidth = tempSpan.offsetWidth;
                                document.body.removeChild(tempSpan);
                                
                                // Se il testo è troppo lungo, imposta la categoria in modalità verticale
                                if (textWidth > maxWidth) {
                                    category.classList.add("category-vertical");
                                } else {
                                    category.classList.remove("category-vertical");
                                }
                            });
                        }
                        
                        // Esegui il controllo iniziale
                        setTimeout(checkCategoryOverflow, 100);
                        
                        // Riesegui il controllo quando la finestra viene ridimensionata
                        window.addEventListener("resize", checkCategoryOverflow);
                        
                        // Fix for browser autocomplete styling
                        if (searchInput) {
                            // Store the computed styles
                            var computedStyle = window.getComputedStyle(searchInput);
                            var bgColor = computedStyle.backgroundColor;
                            var textColor = computedStyle.color;
                            
                            // Apply these styles when autocomplete is active
                            searchInput.addEventListener("animationstart", function(e) {
                                if (e.animationName === "onAutoFillStart") {
                                    // Browser autocomplete is active
                                    this.style.backgroundColor = bgColor;
                                    this.style.color = textColor;
                                }
                            });
                            
                            // Also handle change events
                            searchInput.addEventListener("change", function() {
                                this.style.backgroundColor = bgColor;
                                this.style.color = textColor;
                            });
                        }
                    });
                })();
                </script>';
                echo '
                <style>
                
                .Article-category.main-category {
                    cursor: pointer;
                    display: inline-flex;
                    align-items: center;
                    justify-content: flex-start;
                    width: fit-content;
                    height: fit-content;
                    min-height: fit-content;
                    user-select: none;
                    white-space: nowrap;
                    word-break: normal;
                    position: relative; 
                }
                .Article-active-filters {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                    margin-bottom: 15px;
                    align-items: center;
                }
                
                .Article-filter-badge {
                    background-color: #f0f0f0;
                    padding: 5px 10px;
                    border-radius: 4px;
                    font-size: 14px;
                    display: inline-flex;
                    align-items: center;
                }
                
                .Article-reset-filters {
                    background-color: #e74c3c;
                    color: white;
                    border: none;
                    padding: 5px 10px;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 14px;
                    transition: background-color 0.3s;
                    font-weight: normal ;
                }
                
                .Article-reset-filters:hover {
                    background-color: #c0392b;
                    font-weight: bold !important;
                }
                .category-toggle {
                    font-weight: bold;
                    transition: transform 0.3s ease;
                    user-select: none;
                    display: inline-block;
                    white-space: nowrap;
                    margin-top: 3px;
                    margin-left: -08px;
                    z-index: 10;
                    }
                .Article-hidden-categories {
                    display: none;
                    width: auto;
                    clear: both;
                    position: absolute;
                    left: 0;
                    z-index: 100;
                    word-break: normal;
                    white-space: nowrap;
                    top: 100%; /* Position it right below the main category */
                    margin-top: 5px; /* Add a small gap */
                }
                
                
                .Article-hidden-category {
                    display: inline-block;
                    cursor: pointer;
                    margin-bottom: 2%;                
                    margin-right: 10px;
                    background-color: red !important;
                    color: white;
                    font-size: 12px;
                    border-radius: 3px;
                    white-space: nowrap;
                }
                
                .show-categories .Article-hidden-categories {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: flex-start;

                }
                
                .show-categories .category-toggle {
                    transform: rotate(89deg);
                    transition: transform 0.6s ease;           
                }
                
                .article-widget-container {
                    width: 100%;
                    margin: 0 auto;
                }
                .article-widget-container2 {
                    position: relative;
                    --size-button: 40px;
                    color: white;
                    padding: 10px;
                    white-space: nowrap;
                    display: none;          
                    width: 100%;
                }
                
                .article-icon2 {
                    position: absolute;
                    width: var(--size-button) !important;
                    height: var(--size-button) !important;
                    top: 1px;
                    left: 1px;
                    padding: 8px;
                    pointer-events: none;
                    z-index: 2;
                }
                
                .article-input2 {
                    padding-left: var(--size-button) !important;
                    height: var(--size-button);
                    font-size: 15px;
                    color: black;
                    outline: none;
                    width: var(--size-button);
                    transition: all ease 0.3s !important;
                    background: orange !important;
                    border-radius: 60px !important;
                    cursor: pointer;
                    caret-color: blue;
                    display: inline-block;
                    box-sizing: border-box;
                    position: relative;
                    z-index: 1;
                }
                
                .article-input2:focus {
                    width: 100% !important;
                    white-space: nowrap;
                    cursor: text;
                    outline: none;
                    box-shadow: none !important;
                    -webkit-box-shadow: none !important;
                    -moz-box-shadow: none !important;
                }
                
                
                
                
                .article-submit-button, 
                .article-submit-button:focus,
                .article-submit-button:hover {
                    background-color: transparent !important;
                    border: none;
                    padding: 0;
                    color: green !important;
                
                } 
                
                .article-submit-button {
                    background-color: transparent !important;
                    border: none;
                    padding: 0;
                    color: inherit !important;
                    cursor: pointer;
                    width: 100%;
                    height: 100%;
                    display: block;
                    position: relative;
                    z-index: 3;
                }
                
                .article-submit-button svg {
                    width: 100%;
                    height: 100%;
                    pointer-events: none;
                }
                
                .search-form-container {
                    position: relative;
                    display: flex;
                    align-items: center;
                    width: 100%;
                }
                .Article-category-filter {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                    margin-bottom: 20px;
                }
                
                .Article-category-filter-button {
                    padding: 8px 16px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: none;
                    font-weight: normal;
                }
                
                
                .articles-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(23%, 1fr));
                    gap: 20px;
                }
                
                .article-card {
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    overflow: hidden;
                     box-shadow: 0 5px 15px rgba(0,0,0,0.3) !important;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                
                .article-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 5px 15px rgba(0,0,0,0.5);
                }
                
                .article-image {
                    position: relative;
                    height: 0;
                    padding-bottom: 100%; /* Creates a perfect square */
                    overflow: hidden;
                }
                .article-image-inner {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                box-sizing: border-box; /* Assicura che il bordo sia incluso nelle dimensioni */
                /* Il bordo può essere aggiunto qui */
            }
                .article-image img {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    object-position: center;
                }
            .Article-category-card2 {
                    position: absolute;
                    top: 5px;
                    left: 10px;
                    display: none;
                    width: 100%;
                }
                .Article-category.category-vertical {
                    display: block;
                    margin-bottom: 5px;
                    white-space: normal;
                    max-width: 100%;
                }
            .Article-category {                
                    margin-right: 10px;
                    margin-left:-3px;
                    position: relative;
                    display: none;
                    background-color: red !important;
                    color: white;
                    font-size: 12px;
                    border-radius: 3px;
                    width: auto;
                    max-width: fit-content;
                    display: inline-block;
                    padding: 3px 6px;
                    overflow: visible;
                    text-overflow: clip;
                    white-space: normal;
                    line-height: 1.5;
                }
                .Article-category:hover{
                    font-weight: bold!important;
                }
                .article-content {
                    padding: 15px;
                }
                
                .Article-date-card2, .Article-tag-card2 {
                    display: flex;
                    z-index: 100;
                }
                .Article-tag {
                    margin-top: 0px;
                    margin-bottom: 0px;
                    font-size: 18px;
                    color:black;
                    display:none;
                    text-align: center;
                    word-break: break-all;
                    }
                    .Article-tag:hover {
                    font-weight: bold!important;
                    }

                    .Article-date {
                    font-size: 18px;
                    color:black;
                    display:none;
                    text-align: center;
                    word-break: break-all;
                    z-index: 100;
                    font-weight: normal;
                    }
                    .Article-date:hover {
                font-weight: bold !important;
                    }
                .Article-title:hover {
                font-weight: bold !important;
                    }
                
            .Article-title {
                    line-height: 1.5;
                    font-size: 18px;
                    color:black;
                    display:block;
                    text-align: center;
                    overflow-wrap: break-word;
                    flex-direction: column;

                }
                
                .Article-description {
                    margin-bottom: 15px;
                    line-height: 1.5;
                }
                
                .Article-read-more {
                    display: inline-block;
                    background-color: red;
                    color: white;
                    padding: 8px 15px;
                    text-decoration: none;
                    border-radius: 3px;
                    transition: background-color 0.3s ease;
                    font-weight: normal!important;
                }
                
                .Article-read-more:hover {
                    background-color: darkred;
                    font-weight: bold!important;
                }
                
                .error-message {
                    padding: 20px;
                    text-align: center;
                }
                
                @media (max-width: 768px) {
                    .articles-grid {
                        grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)) !important;
                    }
                }
                        @media (max-width: 940px) and (min-width: 768px) {
                    .articles-grid {
                        grid-template-columns: repeat(auto-fill, minmax(28%, 1fr)) !important;
                    }
            }
                </style>
                
                    ';
            }
        }