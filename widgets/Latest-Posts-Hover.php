<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                'selectors' => [
                    '{{WRAPPER}} .title' => 'filter:{{VALUE}}!important;',
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
                    '{{WRAPPER}} .tag' => 'text-align: {{VALUE}};',
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
                    '{{WRAPPER}} .category' => 'text-align: {{VALUE}};',


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
            'section_filter',
            [
                'label' => esc_html__('Filter', 'Latest-Posts-Hover'),
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
            'tag' => isset($_GET['tags']) ? sanitize_text_field($_GET['tags']) : '',
        ];
        if (isset($_GET['category']) && ($_GET['category']) == "all") {
            unset($args['category_name']);
        }
        if (isset($_GET['date'])) {
            $date_query = [
                'after' => $_GET['date'],
                'inclusive' => true,
            ];
            $args['date_query'] = $date_query;
        }
        if ($settings['all_post'] == 'all') {
            $args['posts_per_page'] = -1;
        }
        $args['category__not_in'] = $settings['exclude_categories'];
        $args['category__in'] = $settings['categories_in'];
        $posts = get_posts($args);
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
        if ($posts) {
            echo '<div class="category-filter">
         <form method="get" action="">';
         if($settings['related_category']!='on' || $settings['related_category']=='on'&& $settings['categories_in']==null){
            $args_C ['taxonomy']= 'category';
            $args_C['hide_empty'] = true;
            $args_C['exclude']= $settings['exclude_categories'];
            $args_C['include'] = $settings['categories_in'];
            if($args_C['include']==null && $args_C['exclude']==null){
                echo '<button type="submit" name="category" value="all" class="category-filter-button';
            if (isset($_GET['category']) && $_GET['category'] == 'all') {
                echo ' active';
            }
                            echo '">All</button>';


            }
            
            $categories = get_terms($args_C);
            foreach ($categories as $category) {
                $category_name = $category->name;
                $category_slug = $category->slug;
                echo '<button type="submit" name="category" value="' . $category_slug . '" class="category-filter-button';
                if (isset($_GET['category']) && $_GET['category'] == $category_slug) {
                    echo ' active';
                }
                echo '">' . $category_name . '</button>';
            }
        }
        if($settings['related_category']=='on' && $settings['categories_in']!=null){
$other_category_id = $settings['categories_in'];
            $categories_with_posts = get_categories(array(
                'hide_empty' => 0, 
                'child_of' => 0, 
                ));
foreach ($categories_with_posts as $category) {
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
            }    }
}
            echo '</form> <div class="container2"> 
        <div class="search">
  <input type="text" placeholder="Search...">
  <button type="submit"><i class="fa fa-search"></i></button>
 </div>
</div> </div>';
            echo '<div class="card2-container">';
            $selected_page_id = $settings['selected_page'];

            foreach ($posts as $post) {
                $post_title = get_the_title($post->ID);
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
                if (is_admin()) {
                    echo '<div class="card2" style="background-image: url(' . $featured_image . '); ">';
                } else {
                    if (wp_is_mobile()) {
                        echo '<div class="card2" style="background-image: url(' . $featured_image . ')" >';
                    } else {
                        echo '<div class="card2" style="background-image: url(' . $featured_image . ')" onclick="window.location.href=\'' . $post_link . '\'">';
                    }
                }
                echo '
                <div class="info">
                <a class="title" href="' . $post_link . '">' . $post_title . ' <a/>';
                if (!empty($tags)) {
                    if ($selected_page_id != 0) {
                        $page_link = get_permalink($selected_page_id);
                        foreach ($tags as $tag) {
                            $tag_link = add_query_arg('tags', $tag->slug, $page_link);
                            echo '<a href="' . $tag_link . '" class="tag"> ' . $tag->name . '</a> ';
                        }
                    } else {
                        foreach ($tags as $tag) {

                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="tag">' . $tag->name . '</a> ';
                        }
                    }
                }
                $date_parts = explode(' ', $post_date);
                $i = 2;
                $date_array[1] = $date_array[0] . '/' . $date_array[1];
                $date_array[2] = $date_array[1] . '/' . $date_array[2];
                if ($selected_page_id != 0) {
                    $page_link = get_permalink($selected_page_id);
                    echo '<div>';
                    foreach ($date_parts as $part) {
                        if ($i == 1) {
                            $date_array[1] = $date_array[1] . '/01';
                        }
                        $date_link = add_query_arg('date', $date_array[$i], $page_link);
                        echo ' <a href="' . $date_link . '" class="date">' . ucfirst($part) . '</a>';
                        $i -= 1;
                    }
                    echo '</div>';
                } else {
                    echo '<div>';
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
                        foreach ($categories as $category) {
                            $category_link = add_query_arg('category', $category->slug, $page_link);
                            echo '<a href="' . $category_link . '" class="category"> ' . $category->name . ' </a>';
                        }
                    }
                } else {
                    $categories = get_the_category($post->ID);
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<a href="' . get_category_link($category->term_id) . '" class="category"> '  . $category->name . ' </a>';
                        }
                    }
                }
                echo '<a class="description" href="' . $post_link . '">' . $post_content . ' </a> 
                 </div>
                </div>';
            }
            wp_reset_postdata();
            echo '</div>';
        if (!$posts) {
            // Gestisci il caso in cui $posts non è un array valido
            echo '<div class="error-message">';
            echo esc_html__('No post', 'Latest-Posts-Hover');
            echo '</div>';
        }
        if (isset($_GET['action'])  && $_GET['action'] === 'edit') {
            echo 'prova';
        }
        echo '<style>
.container2 {
	width: 394px;
	height: 50px;
    display: none;
    justify-content: end;';
    if(!wp_is_mobile()){
        echo'margin-top: 9px;';
        echo'margin-bottom: 5px;';

    }
    else{
        echo'margin-bottom: 5px;';
        echo'margin-right: 19px;';

    }
    
echo'
pointer-events: none;
}
.container2 .search {
	position: relative;
	height: 100%;
}

.container2:hover {
    pointer-events: initial;
}
button{
    pointer-events: fill; 
}
.container2 input[type="text"]:focus {
    caret-color: white; 
    
  }
  
 .search input {
	width: 50px;
	height: 50px;
	position: absolute;
	right: calc(50% - 25px);
	top: 0;
	padding: 0 25px;
	border: 0;
	border-radius: 25px;
	color: #4e4e4e;
	font-size: 18px;
	font-weight: 300;
	box-shadow: none;
	transition: all 0.6s cubic-bezier(0, 2, 1, -1);
    margin: 5;
}
 .search button {
	width: 50px;
	height: 50px;
	position: absolute;
	right: calc(50% - 35px);
	top: 0;
	margin: 5;
	background: #2d2926;
	color: #fff;
	font-size: 15px;
	border: 0;
	border-radius: 50%;
	cursor: pointer;
	transition:all 0.6s cubic-bezier(0, 2, 1, -1);  
}
.search input:focus {
    right: 0;
    border: 2px solid #007BFF; /* Add a colored border when in focus */
    background-color: #f0f0f0; /* Change the background color when in focus */

  }
.container2 .search input:focus,
.container2 .search input:active,
.container2 .search:hover input {';	
    if(wp_is_mobile()){
     echo'       width: 300px;';

    }
 else{
        echo'       width: 400px;';
   
       }
    echo'
	right:0%;    
    background:red;
}
.container2 .search input:focus + button,
.container2 .search input:active + button,
.container2 .search:hover button {
	right: 0;
}

    .category-filter {
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
        .tag {
            margin-top: 0px;
            margin-bottom: 0px;
            padding: 0 5px;
            font-size: 18px;
            color:black;
            display:none;
            text-align: left;
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
            text-align: center;
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
}