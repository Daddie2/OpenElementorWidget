<?php
class Post_Info_Widget extends \Elementor\Widget_Base {

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_name()
    {
        return 'Post-info';
    }
    public function get_title()
    {
        return esc_html__('Post info', 'Post-info');
    }

    public function get_icon()
    {
        return 'eicon-info-circle';    }

    public function get_categories()
    {
        return ['OpenWidget'];
    }
    
    protected function _register_controls()
    {
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
                    '{{WRAPPER}} .tag-div' => 'justify-content: {{VALUE}};',
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
                    '{{WRAPPER}} .category-div' => 'display: {{VALUE}};',
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
                    '{{WRAPPER}} .category-div' => 'justify-content: {{VALUE}};',


                ],
                'icon_colors' => [
                    'left' => 'white',
                    'center' => 'white',
                    'right' => 'white',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $post = get_post();
        ?>
        <!-- Includi il CDN di Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

        <div class="share-card">
  <div class="share-card-content">
  <a class="share-card-description">Breve descrizione della pagina da condividere.</a>
  <div class="tag-div">
  <a class="tag"> <?Php $post_tags = get_the_tags();

// Verifica se ci sono tag
if ($post_tags) {
    // Cicla attraverso ogni tag
    foreach ($post_tags as $tag) {
        // Stampa il nome del tag
        echo $tag->name . ' ';
    }
}?></a></div>
  <div class="category-div">
  <a class="category"> <?Php $post_category = get_the_category();
if ($post_category) {
    foreach ($post_category as $category) {
        echo $category->name . ' ';
    }
}?></a></div>
    <div class="share-card-icons">
      <a href="#" class="share-icon" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/intent/tweet?text=Questo%20%C3%A8%20il%20titolo%20dell%27articolo&url=https%3A%2F%2Fwww.miosito.com%2Farticolo" target="_blank" class="share-icon">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="share-icon" target="_blank">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
  </div>
</div>
        <?php
    }
} ?>
<style>
.share-card {
    display: block;
    align-items: left;
    background-color: #f5f5f5;
    border-radius: 8px;
    overflow: hidden;
     box-shadow: 1px 3px 5px -1px rgba(0, 0, 0, 0.5),
                            1px 5px 8px 0px rgba(0, 0, 0, 0.14),
                            1px 1px 14px 0px rgba(0, 0, 0, 0.12);
}
  .share-card-content {
    flex: 1 1 auto;
    padding: 13px;
  }
  
  .share-card-description {
    font-size: 14px;
    color: #666;
  }
  
  .share-card-icons {
    display: flex;
  }
  
  .share-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #333;
    color: #fff;
    margin-right: 8px;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }
  
  .share-icon:hover {
    background-color: #555;
  }
  
  .share-icon i {
    font-size: 16px;
  }
  .tag {
font-size: 18px;
color:black;
display:none;
text-align: center;
}
.tag-div {
display: flex;
justify-content:right; 
flex-wrap: wrap;
}
.category {
font-size: 18px;
color:black;
display:none;
text-align: center;
}
.category-div {
display:flex;
justify-content:right; 
flex-wrap: wrap;
}
  </style>