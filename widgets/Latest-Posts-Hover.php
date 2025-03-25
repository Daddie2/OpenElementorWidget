<?php
        class Latest_Posts_Hover_Widget extends \Elementor\Widget_Base
    {

        public function __construct($data = [], $args = null) {
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
                'card_border_radius',
                [
                    'label' => esc_html__('Card  border Radius', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 16,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-card2' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
                    ],
                ]
            );
         $this->add_control(
                'card_shadow',
                [
                    'label' => esc_html__('Card Shadow', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::BOX_SHADOW,
                    'default' => [
                        'horizontal' => 1,
                        'vertical' => 3,
                        'blur' => 5,
                        'spread' => -1,
                        'color' => 'rgba(0, 0, 0, 0.5)',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-card2' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} !important;',
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
                'height_card',
                [
                    'label' => esc_html__('Height card', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .latest-posts-hover-card2' => 'height: {{SIZE}}{{UNIT}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-title' => 'color: {{VALUE}}!important;',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-title' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-title' => 'font-family: {{VALUE}}',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-title' => 'font-weight: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-title' => 'text-align: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-date' => 'display: {{VALUE}};',
                        '{{WRAPPER}} .latest-posts-hover-widget-date-card2' => 'display: {{VALUE}};',  // Aggiungi questo selettore
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
                        '{{WRAPPER}} .latest-posts-hover-widget-date' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'Hover_Date_color',
                [
                    'label' => esc_html__('Hover Color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-widget-date:hover' => 'color: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-date' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-date:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-date' => 'font-family: {{VALUE}}',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-date' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'hover_date_bold',
                [
                    'label' => esc_html__('Hover Date Normal', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'normal',
                    'default' => 'bold',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-widget-date:hover' => 'font-weight: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-date-card2' => 'justify-content: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-tag' => 'display: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-tag' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'Hover_Tag_color',
                [
                    'label' => esc_html__('Hover Color Tag', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-widget-tag:hover' => 'color: {{VALUE}} !important;',
                        '{{WRAPPER}} .latest-posts-hover-widget-tag-card2 .latest-posts-hover-widget-tag:hover' => 'color: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-tag' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'hover_tag_font_size',
                [
                    'label' => esc_html__('Hover Size Tag', 'Latest-Posts-Hover'),
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
                        '{{WRAPPER}} .latest-posts-hover-widget-tag:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-tag' => 'font-family: {{VALUE}}',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-tag' => 'font-weight: {{VALUE}} !important;',
                        'body {{WRAPPER}} .latest-posts-hover-widget-tag' => 'font-weight: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'hover_tag_bold',
                [
                    'label' => esc_html__('Hover Tag Normal', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'normal',
                    'default' => 'bold',
                    'selectors' => [
                        'body {{WRAPPER}} .latest-posts-hover-widget-tag:hover' => 'font-weight: {{VALUE}} !important;',
                        'body {{WRAPPER}} .latest-posts-hover-widget-tag-card2 .latest-posts-hover-widget-tag:hover' => 'font-weight: {{VALUE}} !important;',
                        '{{WRAPPER}} .latest-posts-hover-widget-tag:hover' => 'font-weight: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-tag-card2' => 'justify-content: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-category' => 'display: {{VALUE}};',
                        '{{WRAPPER}} .latest-posts-hover-widget-category-card2' => 'display: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-category' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'hover_category_color',
                [
                    'label' => esc_html__('Hover color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'black',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-widget-category-card2 .latest-posts-hover-widget-category:hover' => 'color: {{VALUE}} !important;',
                        '{{WRAPPER}}.elementor-element .latest-posts-hover-widget-category:hover' => 'color: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-category' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'hover_category_font_size',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-category:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-category' => 'font-family: {{VALUE}}',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-category' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'hover_category_bold',
                [
                    'label' => esc_html__('Category hover Bold', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'bold',
                    'default' => 'normal',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-widget-category:hover' => 'font-weight: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-widget-category-card2' => 'justify-content: {{VALUE}};',


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
                    'label' => esc_html__('Button filter Active', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'Latest-Posts-Hover'),
                    'label_off' => esc_html__('Off', 'Latest-Posts-Hover'),
                    'return_value' => 'flex', // Cambiato da 'inline-block' a 'flex'
                    'default' => 'none',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-filter' => 'display: {{VALUE}};',
                        '{{WRAPPER}} .latest-posts-hover-button' => 'display: inline-block !important;', // Mantiene i pulsanti come inline-block
                    ],
                ]
            );
            $this->add_control(
                'filter_alignment',
                [
                    'label' => esc_html__(' Button filter Alignment', 'OpenWidget'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => esc_html__('Left', 'OpenWidget'),
                            'icon' => 'mce-ico mce-i-alignleft',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'OpenWidget'),
                            'icon' => 'mce-ico mce-i-aligncenter',
                        ],
                        'flex-end' => [
                            'title' => esc_html__('Right', 'OpenWidget'),
                            'icon' => 'mce-ico mce-i-alignright',
                        ],
                    ],
                    'default' => 'flex-start',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-filter' => 'justify-content: {{VALUE}}; display: flex; flex-wrap: wrap;',
                    ],
                    'icon_colors' => [
                        'flex-start' => 'white',
                        'center' => 'white',
                        'flex-end' => 'white',
                    ],
                ]
            );
            $this->add_control(
                'filter_border_radius',
                [
                    'label' => esc_html__('Button filter border Radius', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 60,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-button' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-button' => '  color: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-button' => 'font-family: {{VALUE}}',
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
                        '{{WRAPPER}} .latest-posts-hover-button' => '  background-color: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-button' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-button' => 'font-weight: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'text_color_active',
                [
                    'label' => esc_html__('Button filter Active  text color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => 'white',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-button.active' => '  color: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-button.active' => 'font-family: {{VALUE}}',
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
                        '{{WRAPPER}} .latest-posts-hover-button.active' => '  background-color: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-button.active' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-button.active' => 'font-weight: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-button:hover' => '  color: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-button:hover' => 'font-family: {{VALUE}}',
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
                        '{{WRAPPER}} .latest-posts-hover-button:hover' => '  background-color: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-button:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .latest-posts-hover-button:hover' => 'font-weight: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-search' => 'display: {{VALUE}};',
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
                        '{{WRAPPER}} .latest-posts-hover-input2 ' => ' caret-color: {{VALUE}}!important;',
                    ],
                ]
            );
            $this->add_control(
                'search_border_color',
                [
                    'label' => esc_html__('Border Color', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#0e0e0e',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-input2' => 'border-color: {{VALUE}} !important;',
                    ],
                ]
            );
            
            $this->add_control(
                'search_border_color_focus',
                [
                    'label' => esc_html__('Border Color on Focus', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#FF5500',
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-input2:focus' => 'border-color: {{VALUE}} !important;',
                    ],
                ]
            );
            
            $this->add_control(
                'search_border_width',
                [
                    'label' => esc_html__('Border Width', 'Latest-Posts-Hover'),
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
                        'size' => 2,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-input2' => 'border-width: {{SIZE}}{{UNIT}} !important; border-style: solid !important;',
                        '{{WRAPPER}} .latest-posts-hover-input2:focus' => 'border-width: {{SIZE}}{{UNIT}} !important; border-style: solid !important;',
                    ],
                ]
            );
            // Aggiungi controllo per lo spessore del bordo
            // Aggiungi controllo per il raggio del bordo
            $this->add_control(
                'search_border_radius',
                [
                    'label' => esc_html__('Search bar border Radius', 'Latest-Posts-Hover'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 60,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .latest-posts-hover-input2' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-input2' => 'background: {{VALUE}} !important;',
                        '{{WRAPPER}} .latest-posts-hover-input2:focus' => 'background: {{VALUE}} !important;',
                        '{{WRAPPER}} .latest-posts-hover-input2:hover' => 'background: {{VALUE}} !important;',
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
                        '{{WRAPPER}} .latest-posts-hover-input2 ' => ' color: {{VALUE}}!important;',

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
                        '{{WRAPPER}} .latest-posts-hover-submit-button' => ' color: {{VALUE}}!important;',
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
                        '{{WRAPPER}} .latest-posts-hover-input2 ' => ' caret-color: {{VALUE}}!important;',
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
                        '{{WRAPPER}} .latest-posts-hover-input2 ' => 'font-size: {{SIZE}}{{UNIT}};',
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
            if (isset($_GET['latest-posts-hover-input2 '])) {
                $args['s'] = sanitize_text_field($_GET['latest-posts-hover-input2 ']);
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
                // Start output
                echo '<div class=" latest-posts-hover-widget">';
                
             // Modifica i pulsanti delle categorie per usare AJAX invece di form submit
echo '<div class="latest-posts-hover-filter">';
// Sostituisci i button con elementi che usano data attributes
if ($settings['related_category'] != 'on' || $settings['related_category'] == 'on' && $settings['categories_in'] == null) {
    $args_C['taxonomy'] = 'category';
    $args_C['hide_empty'] = true;
    $args_C['exclude'] = $settings['exclude_categories'];
    $args_C['include'] = $settings['categories_in'];
    
    // Array per tenere traccia delle categorie già mostrate
    $displayed_categories = [];
    
    // Mostra il pulsante "All" solo una volta
    if (($args_C['include'] == null && $args_C['exclude'] == null) || $settings['include_all'] == 'on') {
        if (!isset($all_button_displayed)) {
            echo '<button type="button" data-category="all" class="latest-posts-hover-button';
            if (isset($_GET['category']) && $_GET['category'] == 'all') {
                echo ' active';
            }
            echo '">' . $all . '</button>';
            $all_button_displayed = true;
        }
    }

    $categories = get_terms($args_C);
    foreach ($categories as $category)  {
        // Salta se la categoria è già stata mostrata
        if (in_array($category->term_id, $displayed_categories)) {
            continue;
        }
        
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
            echo '<button type="button" data-category="' . $category_slug . '" class="latest-posts-hover-button';
            if (isset($_GET['category']) && $_GET['category'] == $category_slug) {
                echo ' active';
            }
            echo '">' . $category_name . '</button>';
            
            // Aggiungi la categoria all'array delle categorie mostrate
            $displayed_categories[] = $category->term_id;
        }
    }
}
                                
                                // Modifica i pulsanti delle categorie per il widget related_category
                                if ($settings['related_category'] == 'on') {
                                    // Array per tenere traccia delle categorie già mostrate
                                    if (!isset($displayed_categories)) {
                                        $displayed_categories = [];
                                    }
                                    
                                    // Mostra il pulsante "All" solo se non è già stato mostrato
                                    if ($settings['include_all'] == 'on' && !isset($all_button_displayed)) {
                                        echo '<button type="submit" name="category" value="all" class="latest-posts-hover-button';
                                        if (isset($_GET['category']) && $_GET['category'] == 'all') {
                                            echo ' active';
                                        }
                                        echo '">' . $all . '</button>';
                                        $all_button_displayed = true;
                                    }
                                
                                    // Mostra le categorie incluse
                                    if (!empty($settings['categories_in'])) {
                                        foreach ($settings['categories_in'] as $cat_id) {
                                            $category = get_category($cat_id);
                                            if ($category) {
                                                // Salta se la categoria è già stata mostrata
                                                if (in_array($category->term_id, $displayed_categories)) {
                                                    continue;
                                                }
                                                
                                                echo '<button type="submit" name="category" value="' . $category->slug . '" class="latest-posts-hover-button';
                                                if (isset($_GET['category']) && $_GET['category'] == $category->slug) {
                                                    echo ' active';
                                                }
                                                echo '">' . $category->name . '</button>';
                                                
                                                // Aggiungi la categoria all'array delle categorie mostrate
                                                $displayed_categories[] = $category->term_id;
                                            }
                                        }
                                    }
                                
                                    // Mostra le categorie correlate
                                    $categories = get_categories(array(
                                        'hide_empty' => true,
                                        'exclude' => $settings['exclude_categories']
                                    ));
                                
                                    foreach ($categories as $category) {
                                        // Salta se la categoria è già stata mostrata
                                        if (in_array($category->term_id, $displayed_categories)) {
                                            continue;
                                        }
                                        
                                        // Salta se la categoria è già inclusa
                                        if (!empty($settings['categories_in']) && in_array($category->term_id, $settings['categories_in'])) {
                                            continue;
                                        }
                                
                                        // Verifica se ci sono post correlati
                                        $related_posts = get_posts(array(
                                            'category' => $category->term_id,
                                            'category__in' => $settings['categories_in'],
                                            'posts_per_page' => 1
                                        ));
                                
                                        if (!empty($related_posts)) {
                                            echo '<button type="submit" name="category" value="' . $category->slug . '" class="latest-posts-hover-button';
                                            if (isset($_GET['category']) && $_GET['category'] == $category->slug) {
                                                echo ' active';
                                            }
                                            echo '">' . $category->name . '</button>';
                                            
                                            // Aggiungi la categoria all'array delle categorie mostrate
                                            $displayed_categories[] = $category->term_id;
                                        }
                                    }
                                }
                echo '</form>';
                // Replace the search form section with this improved version
echo '<div class="latest-posts-hover-widget-container2 latest-posts-hover-search">';
echo '<div class="search-form-container">';
echo '<input type="text" id="latest-posts-hover-input2" class="latest-posts-hover-input2 latest-posts-hover-input" placeholder="' . $place . '">';
echo '<div class="latest-posts-hover-icon2">';
echo '<button type="button" id="search-button" class="latest-posts-hover-submit-button latest-posts-hover-submit">';
echo '<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="70"></path>
    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
</svg>';
echo '</button>';
echo '</div>';
echo '</div>';
echo '</div>';// Modifica lo script JavaScript per gestire correttamente la card singola
// ... existing code ...
echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    var categoryButtons = document.querySelectorAll(".latest-posts-hover-button");
    var searchInput = document.getElementById("latest-posts-hover-input2");
    var searchButton = document.getElementById("search-button");
    var container = document.querySelector(".latest-posts-hover-widget");

    // Handle category button clicks
    categoryButtons.forEach(function(button) {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            var category = button.getAttribute("data-category") || "all";
            
            // Update active state
            categoryButtons.forEach(function(btn) {
                btn.classList.remove("active");
            });
            button.classList.add("active");
            
            // Show all cards initially
            document.querySelectorAll(".latest-posts-hover-card2").forEach(function(card) {
                card.style.display = "block";
            });
            
            if(category !== "all") {
                // Hide cards that don\'t match the category
                document.querySelectorAll(".latest-posts-hover-card2:not(.category-" + category + ")").forEach(function(card) {
                    card.style.display = "none";
                });
            }
            
            // Update card widths
            updateCardWidths();
        });
    });

    // Handle search
    function performSearch() {
        var searchTerm = searchInput.value.toLowerCase();
        var cards = document.querySelectorAll(".latest-posts-hover-card2");
        var found = false;
        
        cards.forEach(function(card) {
            var title = card.querySelector(".latest-posts-hover-widget-title").textContent.toLowerCase();
            var content = card.querySelector(".description").textContent.toLowerCase();
            
            if(title.includes(searchTerm) || content.includes(searchTerm)) {
                card.style.display = "block";
                found = true;
            } else {
                card.style.display = "none";
            }
        });
        
        updateCardWidths();
        document.querySelector(".error-message").style.display = found ? "none" : "block";
    }

    // Update card widths based on visible cards
    function updateCardWidths() {
        var visibleCards = document.querySelectorAll(".latest-posts-hover-card2").length;
        var visibleCardCount = Array.from(document.querySelectorAll(".latest-posts-hover-card2")).filter(card => card.style.display !== "none").length;
        
        if(visibleCardCount > 0) {
            var cardWidth = Math.min(visibleCardCount, 4);
            cardWidth = (100 / cardWidth) - 1;
            
            Array.from(document.querySelectorAll(".latest-posts-hover-card2")).filter(card => card.style.display !== "none").forEach(function(card) {
                card.style.width = cardWidth + "%";
                card.style.marginLeft = "0.5%";
                card.style.marginRight = "0.5%";
            });
        }
    }

    // Bind search events
    searchInput.addEventListener("input", performSearch);
    searchButton.addEventListener("click", function(e) {
        e.preventDefault();
        performSearch();
    });
});
</script>';
                
                echo '<div class="latest-posts-hover-widget-card2-container">';

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
                    $post->post_content=wpautop( $post->post_content);
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
                 // ... existing code ...
                 $featured_image = get_the_post_thumbnail_url($post->ID);
                 if (!$featured_image) {
                     // If not, use the custom default image
                     $featured_image = $settings['default_image']['url'];
                 }

                 // Get categories and create class string
                 $categories = get_the_category($post->ID);
                 $category_classes = '';
                 if (!empty($categories)) {
                     foreach ($categories as $category) {
                         $category_classes .= ' category-' . $category->slug;
                     }
                 }

                 if (wp_is_mobile() || is_admin()) {
                     echo '<div class="latest-posts-hover-card2' . esc_attr($category_classes) . '" style="background-image: url(' . $featured_image . ')" >';
                 } else {
                     echo '<div class="latest-posts-hover-card2' . esc_attr($category_classes) . '" style="background-image: url(' . $featured_image . ')" onclick="window.location.href=\'' . $post_link . '\'">';
                 }
// ... existing code ...
                    echo '
                            <div class="info">
                            <a class="latest-posts-hover-widget-title" href="' . $post_link . '">' . $post_title . ' <a/>';
                    if (!empty($tags)) {
                        if ($selected_page_id != 0) {
                            echo '<div class="latest-posts-hover-widget-tag-card2">';
                            $page_link = get_permalink($selected_page_id);
                            foreach ($tags as $tag) {
                                $tag_link = add_query_arg('tags', $tag->slug, $page_link);
                                echo '<a href="' . $tag_link . '" class="latest-posts-hover-widget-tag"> ' . $tag->name . '</a> ';
                            }
                            echo '</div>';
                        } else {
                            echo '<div class="latest-posts-hover-widget-tag-card2">';

                            foreach ($tags as $tag) {

                                echo '<a href="' . get_tag_link($tag->term_id) . '" class="latest-posts-hover-widget-tag">' . $tag->name . '</a> ';
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
                        echo '<div class="latest-posts-hover-widget-date-card2">';

                        foreach ($date_parts as $part) {
                            if ($i == 1) {
                                $date_array[1] = $date_array[1] . '/01 m';
                            }
                            $date_link = add_query_arg('date', $date_array[$i], $page_link);
                            echo ' <a href="' . $date_link .'<br> '. ' " class="latest-posts-hover-widget-date">' . ucfirst($part) . '</a>';
                            $i -= 1;
                        }
                        echo '</div>';
                    } else {
                        echo '<div class="latest-posts-hover-widget-date-card2">';
                        $i = 2;
                        foreach ($date_parts as $part) {
                            $date_link = home_url() . '/' . $date_array[$i];
                            echo '<a href="' . $date_link . '" class="latest-posts-hover-widget-date">' . ucfirst($part) . '</a> <br>';
                            $i -= 1;
                        }
                        echo '</div>';
                    }

                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="latest-posts-hover-widget-category-card2">';
                            foreach ($categories as $category) {
                                $category_link = add_query_arg('category', $category->slug, $page_link);
                                echo '<a href="' . $category_link . '" class="category"> ' . $category->name . ' </a>';
                            }
                            echo    '</div>';
                        }
                    } else {
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            echo '<div class="latest-posts-hover-widget-category-card2">';
                            $category_count = count($categories);
                            $i = 0;
                            foreach ($categories as $category) {
                                $i++;
                                // Assicurati che il nome della categoria sia pulito e coerente
                                $category_name = trim($category->name);
                                echo '<a href="' . get_category_link($category->term_id) . '" class="latest-posts-hover-widget-category">' . $category_name . '</a>';
                                if ($i < $category_count) {
                                    echo ' ';
                                }
                            }
                            echo '</div>';
                        }
                    }
                    echo '<p class="description"  onclick="window.location.href=\'' . $post_link . '\'">' . $post_content . ' </p> 
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
                    echo ' <div class="latest-posts-hover-widget-container2 latest-posts-hover-search">';
                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);

                        echo '   <form id="form2" action="' . $page_link . '">';
                    } else {
                        echo '   <form id="form2" action="">';
                    }
                 // Modifica la parte del form di ricerca
echo '<div class="latest-posts-hover-widget-container2 latest-posts-hover-search">';
echo '<div class="search-form-container">';
echo '<input type="text" id="latest-posts-hover-input2" class="latest-posts-hover-input2 latest-posts-hover-input" placeholder="' . $place . '">';
echo '<button type="button" class="latest-posts-hover-submit-button latest-posts-hover-submit">';
echo '<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="70"></path>
    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
</svg>';
echo '</button>';
echo '</div>';
echo '</div>';
echo'
                </form>
                </div>
                </div>
            </div> ';
                }
            }
            echo '<style>
            .latest-posts-hover-filter {
                display: flex;
                justify-content: flex-start; /* Valore predefinito, sarà sovrascritto dal controllo */
                flex-wrap: wrap;
                width: 100%;
                 padding: 0;
                margin: 0;
                }
            /* Resto dello stile... */
            .latest-posts-hover-widget-category-card2 {
                display:none;
                justify-content:right; 
                flex-wrap: wrap;
                }
                 .latest-posts-hover-filter form {
                display: flex;
                flex-wrap: wrap;
                width: 100%;
                justify-content: inherit;
                 padding: 0;
                margin: 0;
            }
            .latest-posts-hover-widget .latest-posts-hover-widget-date-card2 {
                display: none;
                justify-content:right; 
                flex-wrap: wrap;
                }
            .latest-posts-hover-widget .latest-posts-hover-widget-tag-card2 {
                display: flex;
                justify-content:right; 
                flex-wrap: wrap;
                }
            .latest-posts-hover-button {
                background-color: #007BFF;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 30px;
                font-size: 18px;
                font-weight: bold;
                margin: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                font-weight: normal;
                font-family:Work Sans;
                font: size 15px;
                display: none !important;;
            }

            .latest-posts-hover-button:hover {
                background-color: black;
                font-weight: normal;
                font: size 15px;
                font-family:Work Sans;
            }
            .latest-posts-hover-button.active {
                background-color: red;
                font-weight: normal;
                font: size 15px;
                font-family:Work Sans;
            }
            .latest-posts-hover-widget .latest-posts-hover-card2-link {
                text-decoration: none;
            }
        .latest-posts-hover-widget .latest-posts-hover-card2 {
            border-radius: 16px;
            margin-left: 0.5%;
            margin-right: 0.5%;
            margin-top:1.5%;
            box-shadow: 1px 3px 5px -1px rgba(0, 0, 0, 0.5),
                        1px 5px 8px 0px rgba(0, 0, 0, 0.14),
                        1px 1px 14px 0px rgba(0, 0, 0, 0.12);
                        overflow: hidden; 
                        width: ' . $width . '%; 
                        margin-bottom: 20px;
                        background-position:  center;
                        background-size: cover;
                        cursor: pointer;
                        height:450px;
}

        
            .latest-posts-hover-widget .info {
                position: relative;
                width: 100%;
                height: 500px;
                background-color: white;
                filter:opacity(0.8); 
                transform: translateY(100%)
                    translateY(-170px)
                    translateZ(0);
                transition: transform 0.5s ease-out;
                 display: flex;
                        flex-direction: column;
                        gap: 0; /* Rimuove lo spazio tra gli elementi flex */
            }
                
                    .latest-posts-hover-widget .info:before {
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
                
                    .latest-posts-hover-widget .latest-posts-hover-card2:hover .info,
                    .latest-posts-hover-widget .latest-posts-hover-card2:hover .info:before {
                        transform: translateY(0) translateZ(0);
                    }
                    .latest-posts-hover-widget-title {
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
                    .latest-posts-hover-widget-tag {
                        margin-top: 0px;
                        margin-bottom: 0px;
                        padding: 0 5px;
                        font-size: 18px;
                        color:black;
                        display:none;
                        text-align: center;
                    }
                        .latest-posts-hover-widget-tag:hover{
                         font-weight: bold !important;
                        }
                    .latest-posts-hover-widget-date {
                        margin-top: 0;
                        margin-bottom: 0px;
                        padding: 0 5px;
                        font-size: 18px;
                        color: black;
                        display:none;
                        text-align: left;
                    }
                    .latest-posts-hover-widget-category {
                        margin-top: 0px;
                        margin-bottom: 00px;
                        padding: 0 5px;
                        font-size: 18px;
                        color:black;
                        display:none;
            }
                        latest-posts-hover-widget-date:hover{
                         font-weight: bold!important;
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
                    
                    .latest-posts-hover-widget-card2-container {
                        display: flex;
                        flex-wrap: wrap;
                          width: 100%;
    justify-content: flex-start;
                    }
                                        }
                            }';
            if ($flex != 100) {
                echo '     
                        @media ( max-width:1200px) {
                            .latest-posts-hover-widget-card2-container .latest-posts-hover-card2 {
                                flex-basis: 49%;            
                                        }
                            }';
            }

            echo '
                    @media (max-width: 900px) {
                        .latest-posts-hover-widget-card2-container .latest-posts-hover-card2 {
                        flex-basis: 100%;
                        }
                            }
        .latest-posts-hover-widget-container2 {
            position: relative;
            --size-button: 40px;
            color: white;
            padding:10px;
            white-space: nowrap;
            display:none;          
            width:100%;
            
        }
                 .latest-posts-hover-icon2 {
                position: absolute;
                width: var(--size-button) !important;
                height: var(--size-button) !important;
                top: 10px;
                left: 10px;
                padding: 8px;
                pointer-events: none;
                z-index: 2;
            }
         .latest-posts-hover-input2 {
                padding-left: var(--size-button)!important;
                height: var(--size-button);
                font-size: 15px;
                color: black;
                outline: none;
                width: var(--size-button);
                transition: all ease 0.3s !important;
                background: orange !important;
                border-radius: 60px!important;
                cursor: pointer;
                caret-color: blue;
                display: inline-block;
                box-sizing: border-box;
                position: relative;
                z-index: 1;
            }

            .latest-posts-hover-input2:focus {
                width: 100% !important;
                white-space: nowrap;
                cursor: text;
                outline: none;
                  box-shadow: none !important;
                -webkit-box-shadow: none !important;
                -moz-box-shadow: none !important;
            }


            .latest-posts-hover-input2:focus + .latest-posts-hover-icon2,
            .latest-posts-hover-input2 :not(:invalid) + .icon {
            pointer-events: all;
            cursor: pointer;
            }

           .latest-posts-hover-icon2 {
    position: absolute;
    width: var(--size-button) !important;
    height: var(--size-button) !important;
    top: 10px;
    left: 10px;
    padding: 8px;
    z-index: 2;
}
            #latest-posts-hover-input2 .latest-posts-hover-widget-container2 .latest-posts-hover-icon2:focus {
                pointer-events: auto;
            }

            .latest-posts-hover-widget-container2 .latest-posts-hover-icon2 svg {
            width: 100%;
            height: 100%;
            } 
        .latest-posts-hover-submit-button, latest-posts-hover-submit-button:focus,latest-posts-hover-submit-button:hover{
            background-color: transparent!important;
        border: none;
        padding: 0; /* Remove default padding */
        color: green !important;            
        } 
      .latest-posts-hover-submit-button {
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

            .latest-posts-hover-submit-button svg {
                width: 100%;
                height: 100%;
                pointer-events: none;
            }
        </style>';
        }
    }
