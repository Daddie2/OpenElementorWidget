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
      $this->start_controls_section(
          'content_section',
          [
              'label' =>esc_html__('Content', 'animated-text-widget'),
          ]
      );

      $this->add_control(
          'text',
          [
              'label' =>esc_html__('Text', 'animated-text-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => 'Test',
          ]
      );
      $this->add_control(
        'width',
        [
            'label' => esc_html__('width', 'animated-text-widget'),
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
    'Second_Color',
    [
        'label' => esc_html__('Second Color', 'animated-text-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#f8f8f8',
    ]
);

      $this->end_controls_section();
  }

    protected function render() { 

$settings = $this->get_settings_for_display();
$left=$settings['Second_Color'];
$font=$settings['font_size']['size'].$settings['font_size']['unit'];
echo'
  <div class="container-text">
            <a class="square-text" id="square">
                <b class="text-square" id="text2">'.esc_html($settings['text']).'</b>
            </a>
        </div>
        <style>
  .container-text {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .square-text {
    background: linear-gradient(to left, '.$left.' 50%, #f1b10f 50%);
    background-size: 200% 100%;
    /* Imposta la posizione iniziale dello sfondo */
    background-position: left bottom;
    /* Aggiungi una transizione per la posizione dello sfondo */
    transition: background-position 0.7s;
    /* Imposta il display a inline-block */
    display: inline-block;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 500px;
    text-align: center;
    text-decoration: none;
    color: white;
    font-size: 10vh;
    font-family: "Work Sans", sans-serif;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
    text-shadow: 3px 3px #000000;
    overflow: hidden;
    border-radius: 60px; 
  }
.text-square{
  font-size: clamp(7px, 8vw,' .$font.');
}
  /* Stile per il quadrato quando viene passato sopra con il mouse */
  .square-text:hover {
    /* Cambia la posizione dello sfondo */
    background-position: right bottom;
    color: #f1b10f!important;
  }
  .square-text:hover .text-square {
    animation: changeColor 1s forwards;
  }
</style>
';
}
}