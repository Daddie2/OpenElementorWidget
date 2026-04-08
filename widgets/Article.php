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
            public function get_script_depends() {
                 return [ 'article-widget-js' ];
                 }
                  public function get_style_depends() {
        return [ 'article-widget-css' ];
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
                $this->add_responsive_control(
                    'column_width',
                    [
                        'label' => esc_html__('Columns Width', 'Article'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', 'em', '%'],
                        'default' => [
                            'size' => 23,
                            'unit' => '%',
                        ],
                        'tablet_default' => [
                            'size' => 48,
                            'unit' => '%',
                        ],
                        'mobile_default' => [
                            'size' => 100,
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
                            '{{WRAPPER}} .Article-date-card2' => 'display: {{VALUE}} !important;',
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
                        'label' => esc_html__('Tag Active', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'inline-block',
                        'default' => 'none',
                        'selectors' => [
                            '{{WRAPPER}} .Article-tag-card2' => 'display: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-tag-card2' => 'text-align: {{VALUE}} ;',
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
                    'category_active',
                    [
                        'label' => esc_html__('Category Active', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'inline-block',
                        'default' => 'none',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category-card2' => 'display: {{VALUE}} !important;',
                        ],
                    ]
                );

                $this->add_control(
                    'Article-category_color',
                    [
                        'label' => esc_html__('Color Text', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'white',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category, {{WRAPPER}} .category-toggle' => 'color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-category, {{WRAPPER}} .category-toggle' => 'background-color: {{VALUE}} !important;',
                        ],
                    ]
                );
        
                $this->add_responsive_control(
                    'category_toggle_size',
                    [
                        'label' => esc_html__('Toggle (+) Size', 'Article'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', 'em', 'rem'],
                        'default' => [
                            'size' => 20,
                            'unit' => 'px',
                        ],
                        'tablet_default' => [
                            'size' => 24,
                            'unit' => 'px',
                        ],
                        'mobile_default' => [
                            'size' => 27,
                            'unit' => 'px',
                        ],
                        'range' => [
                            'px' => [
                                'min' => 10,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .category-toggle' => 'font-size: {{SIZE}}{{UNIT}} !important;',
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
                            '{{WRAPPER}} .Article-category:hover, {{WRAPPER}} .category-toggle:hover' => 'color: {{VALUE}} !important;',
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
                            '{{WRAPPER}} .Article-category, {{WRAPPER}} .category-toggle' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-category, {{WRAPPER}} .category-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'Article-category_font_size',
                    [
                        'label' => esc_html__('Font Size', 'Article'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'default' => [
                            'size' => 18,
                            'unit' => 'px',
                        ],
                        'tablet_default' => [
                            'size' => 16,
                            'unit' => 'px',
                        ],
                        'mobile_default' => [
                            'size' => 14,
                            'unit' => 'px',
                        ],
                        'range' => [
                            'px' => [
                                'min' => 1,
                                'max' => 120,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .Article-category, {{WRAPPER}} .category-toggle' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .Article-category, {{WRAPPER}} .category-toggle' => 'font-family: {{VALUE}}',
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
                            '{{WRAPPER}} .Article-category, {{WRAPPER}} .category-toggle' => 'font-weight: {{VALUE}};',
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
                    'include_categories',
                    [
                        'label' => esc_html__('Select Categories to include', 'Article'),
                        'type' => \Elementor\Controls_Manager::SELECT2,
                        'multiple' => true,
                        'options' => $this->get_category(),
                    ]
                );
                $this->add_control(
                    'related_category',
                    [
                        'label' => esc_html__('Show related categories', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'on',
                        'default' => 'off',
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
                $this->add_control(
                    'hide_categories_from_badge',
                    [
                        'label' => esc_html__('Hide Categories from card badge', 'Article'),
                        'description' => esc_html__('These categories will NOT appear on the card label, but articles will still be shown.', 'Article'),
                        'type' => \Elementor\Controls_Manager::SELECT2,
                        'multiple' => true,
                        'options' => $this->get_category(),
                    ]
                );$repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'cat_id',
            [
                'label' => esc_html__('Select Category', 'Article'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_category(),
            ]
        );
        $repeater->add_control(
            'page_id',
            [
                'label' => esc_html__('Custom Page Redirect', 'Article'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_pages(),
            ]
        );
                $this->add_control(
            'category_custom_links',
            [
                'label' => esc_html__( 'Specific Category Redirects', 'Article' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => 'Redirect for Category ID: {{{ cat_id }}}',
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
    			    '{{WRAPPER}} .Article-description a' => 'color: {{VALUE}} !important;',

                        ],
                    ]
                );
                $this->add_control(
                    'text_color_hover',
                    [
                        'label' => esc_html__('Color Hover', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'red',
                        'selectors' => [
                            '{{WRAPPER}} .Article-description:hover a' => 'color: {{VALUE}} !important;',
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
                    'content_hover_bold',
                    [
                        'label' => esc_html__('Content Hover Bold', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('On', 'Article'),
                        'label_off' => esc_html__('Off', 'Article'),
                        'return_value' => 'bold',
                        'default' => 'normal',
                        'selectors' => [
                            '{{WRAPPER}} .Article-description:hover' => 'font-weight: {{VALUE}};',
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
                        'return_value' => 'flex',
                        'default' => 'none',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category-filter' => 'display: {{VALUE}};',
                        ],
                    ]
                );
                
                $this->add_responsive_control(
                    'filter_alignment',
                    [
                        'label' => esc_html__('Alignment', 'Article'),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'flex-start' => [
                                'title' => esc_html__('Left', 'Article'),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__('Center', 'Article'),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'flex-end' => [
                                'title' => esc_html__('Right', 'Article'),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'default' => 'flex-start',
                        'selectors' => [
                            '{{WRAPPER}} .Article-category-filter' => 'justify-content: {{VALUE}};',
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
                             '{{WRAPPER}} .Article-category-filter-button:hover' => '  color: {{VALUE}} !important;',
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
                             '{{WRAPPER}} .Article-category-filter-button:hover' => 'font-family: {{VALUE}}',
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
                            '{{WRAPPER}} .Article-category-filter-button:hover' => '  background-color: {{VALUE}};',
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
                            '{{WRAPPER}} .Article-category-filter-button:hover' => 'font-weight: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'show_all_button_forced',
                    [
                        'label' => esc_html__('Force show "All" button', 'Article'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'Article'),
                        'label_off' => esc_html__('No', 'Article'),
                        'return_value' => 'yes',
                        'default' => 'no',
                        'description' => esc_html__('Always show the "All" button regardless of exclusions', 'Article'),
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
                    'border_color_input',
                    [
                        'label' => esc_html__('Border color', 'Article'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '#cccccc',
                        'selectors' => [
                            '{{WRAPPER}} .article-input2' => ' border-color: {{VALUE}}!important;',
                        ],
                    ]
                );
                $this->add_control(
                    'border_width_input',
                    [
                        'label' => esc_html__('Border Width', 'Article'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', 'em', '%'],
                        'selectors' => [
                            '{{WRAPPER}} .article-input2' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; border-style: solid;',
                        ],
                    ]
                );
                $this->add_control(
                    'search_scope',
                    [
                        'label' => esc_html__('Search Scope', 'Article'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'title',
                        'options' => [
                            'title' => esc_html__('Title only', 'Article'),
                            'both' => esc_html__('Title and Content', 'Article'),
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
            
                $categories = get_categories(['hide_empty' => false]);
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

    // ── Variabili calcolate UNA SOLA VOLTA fuori dal loop ──────────────
    $selected_page_id  = $settings['selected_page'];
    $selected_page_url = ($selected_page_id != 0) ? get_permalink($selected_page_id) : '';

    $custom_redirects = [];
    if (!empty($settings['category_custom_links'])) {
        foreach ($settings['category_custom_links'] as $item) {
            if (!empty($item['cat_id']) && !empty($item['page_id'])) {
                $custom_redirects[$item['cat_id']] = get_permalink($item['page_id']);
            }
        }
    }

    $hidden_badge_cats = !empty($settings['hide_categories_from_badge'])
        ? array_map('intval', (array) $settings['hide_categories_from_badge'])
        : [];

    $word_limit_base = wp_is_mobile() ? $settings['content_word_mobile'] : $settings['content_word_pc'];
    $remove_title    = ($settings['remove_title'] === 'on');
    $include_cats    = !empty($settings['include_categories']) ? array_map('intval', $settings['include_categories']) : [];
    $exclude_cats    = !empty($settings['exclude_categories']) ? array_map('intval', $settings['exclude_categories']) : [];
    // ───────────────────────────────────────────────────────────────────

    $posts_per_page = !empty($settings['posts_per_page']) ? intval($settings['posts_per_page']) : 4;
    if ($settings['all_post'] == 'all') {
        $posts_per_page = -1;
    }

    $base_args = array(
        'post_type'           => 'post',
        'orderby'             => 'date',
        'order'               => 'DESC',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'suppress_filters'    => false,
    );

    if (!empty($settings['include_categories'])) {
        $base_args['category__in'] = $settings['include_categories'];
    }
    if (!empty($settings['exclude_categories']) && $settings['include_all'] !== 'on') {
        $base_args['category__not_in'] = $settings['exclude_categories'];
    }

    $args                 = $base_args;
    $args['posts_per_page'] = $posts_per_page;

    // Filtro per data dall'URL
    if (isset($_GET['Article-date'])) {
        $date_param = sanitize_text_field($_GET['Article-date']);
        if (substr($date_param, -1) == 'm') {
            $year  = intval(substr($date_param, 0, 4));
            $month = intval(substr($date_param, 5, 2));
            $args['date_query'] = array(
                'year'  => $year,
                'month' => $month,
                'day'   => array(
                    'start' => 1,
                    'end'   => date('t', mktime(0, 0, 0, $month, 1, $year)),
                ),
            );
        } elseif (strlen($date_param) === 4) {
            $args['date_query'] = array('year' => intval($date_param));
        } elseif (strlen($date_param) === 10) {
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

    $query = new \WP_Query($args);

    // Categorie per i filter buttons — ricavate dai post già in memoria, zero query extra
    $all_categories = [];
    if ($query->have_posts()) {
        foreach ($query->posts as $p) {
            $post_terms = get_the_terms($p->ID, 'category');
            if ($post_terms && !is_wp_error($post_terms)) {
                foreach ($post_terms as $term) {
                    $tid = (int) $term->term_id;
                    if (isset($all_categories[$tid]))      continue;
                    if (in_array($tid, $include_cats))     continue;
                    if (in_array($tid, $exclude_cats))     continue;
                    $all_categories[$tid] = $term->name;
                }
            }
        }
    }
    asort($all_categories);

    $widget_id = 'article-widget-' . $this->get_id();
    echo '<div id="' . esc_attr($widget_id) . '" class="article-widget-container" data-error-message="' . esc_attr($settings['error_message'] ?: 'No results found') . '">';

    // Reset filtri attivi
    if (isset($_GET['Article-date']) || isset($_GET['Article-tag'])) {
        echo '<div class="Article-active-filters">';
        if (isset($_GET['Article-date'])) {
            $date_param = $_GET['Article-date'];
            if (substr($date_param, -1) == 'm') {
                $date_param = substr($date_param, 0, 4) . '/' . substr($date_param, 5, 2);
            }
            echo '<span class="Article-filter-badge">Data: ' . esc_html($date_param) . '</span>';
        }
        if (isset($_GET['Article-tag'])) {
            echo '<span class="Article-filter-badge">Tag: ' . esc_html($_GET['Article-tag']) . '</span>';
        }
        echo '<button class="Article-reset-filters">' . $settings['reset_button'] . '</button>';
        echo '</div>';
    }

    // Filter buttons
    echo '<div class="Article-category-filter">';
    $all_shown = (!empty($settings['include_all']) && $settings['include_all'] === 'on')
              || (!empty($settings['show_all_button_forced']) && $settings['show_all_button_forced'] === 'yes');
    if ($all_shown) {
        echo '<button class="Article-category-filter-button" data-Article-category="all">' . esc_html($settings['All_place'] ?: 'All') . '</button>';
    }
    foreach ($all_categories as $cat_id => $cat_name) {
        echo '<button class="Article-category-filter-button" data-Article-category="' . esc_attr($cat_id) . '">' . esc_html($cat_name) . '</button>';
    }

    echo '<div class="article-widget-container2">';
    echo '<div class="search-form-container">';
    echo '<input type="text" class="article-input2 article-input" placeholder="' . esc_attr($settings['Search_place'] ?: 'Search') . '" autocomplete="off" data-search-scope="' . esc_attr($settings['search_scope'] ?: 'title') . '">';
    echo '<div class="article-icon2">';
    echo '<button type="button" class="article-submit-button article-submit">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="70"></path>
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
        </svg>';
    echo '</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Articles grid
    if ($query->have_posts()) {
        echo '<div class="articles-grid">';
        while ($query->have_posts()) {
            $query->the_post();

            $post_categories = get_the_category();

            // Redirect logic
            $cats_with_custom_redirects = [];
            foreach ($post_categories as $cat) {
                if (isset($custom_redirects[$cat->term_id])) {
                    $cats_with_custom_redirects[$cat->term_id] = $custom_redirects[$cat->term_id];
                }
            }

            $master_redirect_url = '';
            $special_cat_id      = 0;
            $force_default_links = false;

            if (count($cats_with_custom_redirects) === 1) {
                reset($cats_with_custom_redirects);
                $special_cat_id      = (int) key($cats_with_custom_redirects);
                $master_redirect_url = $cats_with_custom_redirects[$special_cat_id];
            } elseif (count($cats_with_custom_redirects) > 1) {
                $force_default_links = true;
            } elseif ($selected_page_url) {
                $master_redirect_url = $selected_page_url; // ← già calcolato fuori dal loop
            }

            // Category classes e badge
            $category_classes    = '';
            $badge_categories    = [];
            $badge_category_names = [];
            foreach ($post_categories as $category) {
                $category_classes .= ' Article-category-' . $category->term_id;
                if (!in_array((int) $category->term_id, $hidden_badge_cats)) { // ← già calcolato fuori dal loop
                    $badge_categories[]    = $category;
                    $badge_category_names[] = $category->name;
                }
            }

            // Excerpt
            $content = get_the_content();
            if ($remove_title) { // ← già calcolato fuori dal loop
                $content = preg_replace('/<h2[^>]*>(.*?)<\/h2>/i', '', $content, 1);
            }
            $clean_content = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $content);
            $clean_content = preg_replace('/\*!.*?\*\//s', '', $clean_content);
            $clean_content = preg_replace('/\.elementor.*?\}/s', '', $clean_content);
            $clean_content = preg_replace('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', '$1 ', $clean_content);
            $clean_content = preg_replace('/<(p|li|ol|ul)[^>]*>(.*?)<\/(p|li|ol|ul)>/is', '$2 ', $clean_content);
            $clean_content = wp_strip_all_tags($clean_content);
            $clean_content = trim(preg_replace('/[\s\r\n]+/', ' ', $clean_content));

            $word_limit      = $word_limit_base; // ← già calcolato fuori dal loop
            $words           = explode(' ', $clean_content);
            $title_words     = count(explode(' ', trim(preg_replace('/\s+/', ' ', get_the_title()))));
            if ($title_words < 4)      { $word_limit += 12; }
            elseif ($title_words < 7)  { $word_limit += 6; }
            if ($word_limit > count($words)) { $word_limit = count($words); }
            $excerpt = implode(' ', array_slice($words, 0, $word_limit));

            // Card HTML
            echo '<div class="article-card' . esc_attr($category_classes) . '">';
            echo '<div class="article-image">';
            echo '<div class="article-image-inner">';
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(null, 'medium_large', array('loading' => 'lazy'));
            } else {
                echo '<img src="' . esc_url($settings['default_image']['url']) . '" alt="Default Image" loading="lazy">';
            }
            echo '</div>';

            echo '<div class="Article-category-card2">';
            if (!empty($badge_categories) && count($badge_category_names) > 1) {
                $first_cat_id = $badge_categories[0]->term_id;
                if ($force_default_links) {
                    $final_url = get_category_link($first_cat_id);
                } elseif ($master_redirect_url) {
                    $final_url = ($first_cat_id === $special_cat_id) ? $master_redirect_url : add_query_arg('Article-category', $first_cat_id, $master_redirect_url);
                } else {
                    $final_url = get_category_link($first_cat_id);
                }
                echo '<div class="Article-category-wrapper">';
                echo '<a href="' . esc_url($final_url) . '" class="Article-category main-category">' . esc_html($badge_category_names[0]) . '</a>';
                echo '<span class="category-toggle">+</span>';
                echo '</div>';
                echo '<div class="Article-hidden-categories">';
                for ($i = 1; $i < count($badge_category_names); $i++) {
                    $cat_id = $badge_categories[$i]->term_id;
                    if ($force_default_links) {
                        $hidden_url = get_category_link($cat_id);
                    } elseif ($master_redirect_url) {
                        $hidden_url = ($cat_id === $special_cat_id) ? $master_redirect_url : add_query_arg('Article-category', $cat_id, $master_redirect_url);
                    } else {
                        $hidden_url = get_category_link($cat_id);
                    }
                    echo '<a href="' . esc_url($hidden_url) . '" class="Article-category Article-hidden-category">' . esc_html($badge_category_names[$i]) . '</a>';
                }
                echo '</div>';
            } elseif (!empty($badge_categories)) {
                foreach ($badge_categories as $category) {
                    $cat_id    = $category->term_id;
                    $final_url = $force_default_links
                        ? get_category_link($cat_id)
                        : ($master_redirect_url
                            ? (($cat_id === $special_cat_id) ? $master_redirect_url : add_query_arg('Article-category', $cat_id, $master_redirect_url))
                            : get_category_link($cat_id));
                    echo '<span class="Article-category">';
                    echo '<a href="' . esc_url($final_url) . '" class="Article-category">' . esc_html($category->name) . '</a>';
                    echo '</span>';
                }
            }
            echo '</div>';
            echo '</div>';

            // Content
            echo '<div class="article-content">';

            // Date
            echo '<div class="Article-date-card2">';
            $day        = get_the_date('d');
            $month      = get_the_date('m');
            $year       = get_the_date('Y');
            $month_name = get_the_date('F');
            if (!$force_default_links && $master_redirect_url) {
                echo '<a href="' . esc_url(add_query_arg('Article-date', "$year/$month/$day", $master_redirect_url)) . '" class="Article-date">' . $day . '</a>&nbsp;';
                echo '<a href="' . esc_url(add_query_arg('Article-date', "{$year}/{$month}m", $master_redirect_url)) . '" class="Article-date">' . ucfirst($month_name) . '</a>&nbsp;';
                echo '<a href="' . esc_url(add_query_arg('Article-date', $year, $master_redirect_url)) . '" class="Article-date">' . $year . '</a>';
            } elseif ($selected_page_url && !$force_default_links) {
                echo '<a href="' . esc_url(add_query_arg('Article-date', "$year/$month/$day", $selected_page_url)) . '" class="Article-date">' . $day . '</a>&nbsp;';
                echo '<a href="' . esc_url(add_query_arg('Article-date', "{$year}/{$month}m", $selected_page_url)) . '" class="Article-date">' . ucfirst($month_name) . '</a>&nbsp;';
                echo '<a href="' . esc_url(add_query_arg('Article-date', $year, $selected_page_url)) . '" class="Article-date">' . $year . '</a>';
            } else {
                echo '<a href="' . esc_url(get_day_link($year, $month, $day)) . '" class="Article-date">' . $day . '</a>&nbsp;';
                echo '<a href="' . esc_url(get_month_link($year, $month)) . '" class="Article-date">' . ucfirst($month_name) . '</a>&nbsp;';
                echo '<a href="' . esc_url(get_year_link($year)) . '" class="Article-date">' . $year . '</a>';
            }
            echo '</div>';

            // Tags
            $tags = get_the_tags();
            if ($tags) {
                echo '<div class="Article-tag-card2">';
                foreach ($tags as $tag) {
                    $tag_url = (!$force_default_links && $master_redirect_url)
                        ? add_query_arg('Article-tag', $tag->slug, $master_redirect_url)
                        : get_tag_link($tag->term_id);
                    echo '<a href="' . esc_url($tag_url) . '" class="Article-tag">' . esc_html($tag->name) . ' </a> ';
                }
                echo '</div>';
            }

            // Title
            $title = preg_replace('/\s+/', ' ', get_the_title());
            if ($settings['title_link'] != 'allowed') {
                echo '<a class="Article-title" style="pointer-events: none;">' . $title . '</a>';
            } else {
                echo '<a href="' . get_permalink() . '" class="Article-title">' . $title . '</a>';
            }

            // Description
            if ($settings['content_link'] != 'allowed') {
                echo '<div class="Article-description" style="cursor: default;">' . $excerpt . '...</div>';
            } else {
                echo '<div class="Article-description"><a href="' . get_permalink() . '">' . $excerpt . '...</a></div>';
            }

            echo '<a href="' . get_permalink() . '" class="Article-read-more">' . esc_html($settings['read_more_text']) . '</a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<div class="error-message">' . esc_html($settings['error_message'] ?: 'No post found') . '</div>';
    }
}
    }