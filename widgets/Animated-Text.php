<?php
class Animated_Text_Widget extends \Elementor\Widget_Base {

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_name()
    {
        return 'Animated-Text';
    }
    public function get_title()
    {
        return esc_html__('Animated Text', 'Animated-Text');
    }

    public function get_icon()
    {
      return 'eicon-info-circle';    
    }

    public function get_categories()
    {
        return ['OpenWidget'];
    }
    protected function register_controls() {
        // Sezione Contenuto
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'animated-text-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Test',
            ]
        );
    
        $this->end_controls_section();
    
        // Sezione Stile
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'animated-text-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
    
        $this->add_control(
            'width',
            [
                'label' => esc_html__('Width', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 500,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .square-text' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
    
        $this->add_control(
            'font_size',
            [
                'label' => esc_html__('Font Size', 'animated-text-widget'),
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
            ]
        );
    
        $this->add_control(
            'font_family',
            [
                'label' => esc_html__('Font Family', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => '"Work Sans", sans-serif',
            ]
        );
    
        $this->add_control(
            'left_color',
            [
                'label' => esc_html__('Left Color', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f8f8f8',
            ]
        );
    
        $this->add_control(
            'right_color',
            [
                'label' => esc_html__('Right Color', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f1b10f',
            ]
        );
    
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
            ]
        );
    
        $this->add_control(
            'text_hover_color',
            [
                'label' => esc_html__('Text Hover Color', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f1b10f',
            ]
        );
    
        $this->end_controls_section();
    
        // Sezione Ombra del Testo
        $this->start_controls_section(
            'text_shadow_section',
            [
                'label' => esc_html__('Text Shadow', 'animated-text-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
    
        $this->add_control(
            'text_shadow_color',
            [
                'label' => esc_html__('Text Shadow Color', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
            ]
        );
    
        $this->add_control(
            'text_shadow_horizontal',
            [
                'label' => esc_html__('Text Shadow Horizontal', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => -50,
                        'max' => 50,
                    ],
                ],
            ]
        );
    
        $this->add_control(
            'text_shadow_vertical',
            [
                'label' => esc_html__('Text Shadow Vertical', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => -50,
                        'max' => 50,
                    ],
                ],
            ]
        );
    
        $this->add_control(
            'text_shadow_blur',
            [
                'label' => esc_html__('Text Shadow Blur', 'animated-text-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
            ]
        );
    
        $this->end_controls_section();
    }
    protected function render() { 
        $settings = $this->get_settings_for_display();
        $left_color = $settings['left_color'];
        $right_color = $settings['right_color'];
        $font = $settings['font_size']['size'] . $settings['font_size']['unit'];
        $font_family = $settings['font_family'];
        $text_color = $settings['text_color'];
        $text_hover_color = $settings['text_hover_color'];
        
        // Nuove variabili per l'ombra del testo
        $shadow_color = $settings['text_shadow_color'];
        $shadow_h = $settings['text_shadow_horizontal']['size'] . $settings['text_shadow_horizontal']['unit'];
        $shadow_v = $settings['text_shadow_vertical']['size'] . $settings['text_shadow_vertical']['unit'];
        $shadow_blur = $settings['text_shadow_blur']['size'] . $settings['text_shadow_blur']['unit'];
    
        echo '
        <div class="container-text">
            <a class="square-text" id="square">
                <b class="text-square" id="text2">' . esc_html($settings['text']) . '</b>
            </a>
        </div>
        <style>
        .container-text {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .square-text {
            background: linear-gradient(to left, ' . $left_color . ' 50%, ' . $right_color . ' 50%);
            background-size: 200% 100%;
            background-position: left bottom;
            transition: background-position 0.7s;
            display: inline-block;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 500px;
            text-align: center;
            text-decoration: none;
            color: ' . $text_color . ';
            font-size: 10vh;
            font-family: ' . $font_family . ';
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
            text-shadow: ' . $shadow_h . ' ' . $shadow_v . ' ' . $shadow_blur . ' ' . $shadow_color . ';
            overflow: hidden;
            border-radius: 60px; 
        }
        .text-square {
            font-size: clamp(7px, 8vw, ' . $font . ');
        }
        .square-text:hover {
            background-position: right bottom;
            color: ' . $text_hover_color . '!important;
        }
        .square-text:hover .text-square {
            animation: changeColor 1s forwards;
        }
        </style>
        ';
    }
}