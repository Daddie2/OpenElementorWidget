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
        protected function render()
      {
  echo'
  <div class="circle3">
      <div class="card-circle">
        <div class="wrapper">
          <img
            src="https://www.unionegiovanidisinistra.it/wp-content/webp-express/webp-images/uploads/elementor/thumbs/testoni-qijcojt7h8u7xkgwf7ncw5nb4lz81ti99o0gddvimo.png.webp"
            class="cover-image"/>
        </div>
        <img
          src="C:\Users\david\Downloads\testoni-removebg.png"
          class="character"
        />
      </div>
  <style>
    :root {
      --card-height: 200px;
      --card-width: calc(var(--card-height) / 1.5);
        border-radius: 50%;

    }
  
    .circle3 {
      width: 100vw;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
    }
    .card-circle {
      width: var(--card-width);
      height: var(--card-height);
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      padding: 0 36px;
      perspective: 2500px;
      margin: 0 50px;
      border-radius: 50%;
    }

    .cover-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      
    }

    .wrapper {
      transition: all 0.5s;
      position: absolute;
      width: 100%;
      z-index: -1;
    }

    .card-circle:hover .wrapper {
      transform: perspective(900px) translateY(-5%) rotateX(25deg) translateZ(0);
    }

    .wrapper::before,
    .wrapper::after {
      content: "";
      opacity: 0;
      width: 100%;
      height: 80px;
      transition: all 0.5s;
      position: absolute;
      left: 0;
    }
    .wrapper::before {
      top: 0;
      height: 100%;
      background-color: 
        rgba(12, 13, 19, 0.6);
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background-position: center center;
    }
    .card-circle:hover .wrapper::before,
    .wrapper::after {
      opacity: 1;
    }

    .card-circle:hover .wrapper::after {
      height: 120px;
    }
    .title {
      width: 100%;
      transition: transform 0.5s;
    }
    .card-circle:hover .title {
      transform: translate3d(0%, -50px, 100px);
    }

    .character {
      top:0;
      bottom: 0;
      width: 100%;
      opacity: 0;
      transition: all 0.5s;
      position: absolute;
      z-index: -1;
      object-fit: cover;
      filter: drop-shadow(3px 3px 5px black);
    }

    .card-circle:hover .character {
      opacity: 1;
      transform: translate3d(0%, -30%, 50px);
    }
  </style>';
}
    }