<?php
    class Image_Hover_Widget extends \Elementor\Widget_Base
    {

        public function __construct($data = [], $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'image-hover';
        }
        public function get_title()
        {
            return esc_html__('Image Hover', 'image-hover');
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
                    'label' => esc_html__('General', 'Image-Hover'),
                ]
            );
    
            $this->add_control(
                'image_1',
                [
                    'label' => esc_html__('Image 1', 'Image-Hover'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
    
            $this->add_control(
                'image_2',
                [
                    'label' => esc_html__('Image 2', 'Image-Hover'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
    
            $this->add_responsive_control(
                'circle_size',
                [
                    'label' => esc_html__('Circle Size', 'Image-Hover'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 50,
                            'max' => 500,
                            'step' => 10,
                        ],
                        '%' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 200,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .card-circle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
    
            $this->end_controls_section();
        }
    
        protected function render()
        {
            $settings = $this->get_settings_for_display();
            $img1 = $settings['image_1']['url'];
            $img2 = $settings['image_2']['url'];
    
            echo '
            <div class="circle3">
              <div class="card-circle">
                <div class="wrappettozzo">
                  <div class="cover-image"></div>
                </div>
                <div class="character-wrapper">
                  <img src="' . $img2 . '" class="character"/>
                </div>
              </div>
            </div>
            <style>
              .circle3 {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
              }
              
              .card-circle {
                position: relative;
                border-radius: 50%;
                overflow: hidden;
                perspective: 2500px;
              }
              
              .cover-image {
                width: 100%;
                height: 100%;
                background-image: url("' . $img1 . '");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
              }
              
              .character {
                width: 100%;
                height: 100%;
                object-fit: cover;
              }
              
              .wrappettozzo, .character-wrapper {
                position: absolute;
                width: 100%;
                height: 100%;
                transition: all 0.8s ease;
                border-radius: 50%;
                overflow: hidden;
              }
              
              .wrappettozzo {
                z-index: 1;
              }
              
              .character-wrapper {
                z-index: 2;
                transform: translateY(100%);
                opacity: 0;
              }
              
              .card-circle:hover {
                overflow: visible;
              }
              
              .card-circle:hover .wrappettozzo {
                transform: perspective(900px) translateY(0) rotateX(25deg) translateZ(0);
              }
              
              .card-circle:hover .character-wrapper {
                transform: translateY(-25%);
                opacity: 1;
              }
              
              .wrappettozzo::before {
                content: "";
                opacity: 0;
                width: 100%;
                height: 100%;
                transition: all 0.8s ease;
                position: absolute;
                left: 0;
                top: 0;
                background-color: rgba(12, 13, 19, 0.6);
              }
              
              .card-circle:hover .wrappettozzo::before {
                opacity: 1;
              }
            </style>';
        }
    }