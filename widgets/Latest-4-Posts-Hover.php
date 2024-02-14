<?php
class Latest_4_Posts_Hover_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'latest-4-posts-hover';
    }

    public function get_title()
    {
        return 'Latest 4 Posts Hover';
    }
    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['hello', 'world'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'Latest-4-Post-Hover'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'Latest-4-Posts-Hover'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Tab End


        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'Latest-4-Post-Hover'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'Latest-4-Post-Hover'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab End

    }
    public function render()
    {
        $args = [
            'posts_per_page' => 4,
            'post__not_in'   => array(2112)

        ];

        $recent_posts = get_posts($args);

        $articles_html_full = '';
        $articles_html_compact = '';
        foreach ($recent_posts as $post) {
            $post_title = $post->post_title;
            $post_content = wp_trim_words($post->post_content, 15); // Limita all'estratto dell'articolo
            $post_date = date('d/m/Y', strtotime($post->post_date)); // Data dell'articolo
            $post_link = get_permalink($post->ID);
            // Otteniamo l'URL della prima immagine allegata all'articolo e la ridimensioniamo a 500x500
            $post_thumbnail = get_the_post_thumbnail_url($post->ID);

            $articles_html_full .= '
    <div class="col-lg-3">
        <a href="' . $post_link . '" class="card-link">
            <div class="card" style="background-image: url(' . $post_thumbnail . ');">
                <div class="info">
                    <h1 class="title">' . $post_title . '</h1>
                    <p class="post-date">' . $post_date . '</p>
                    <p class="description">' . $post_content . '</p>
                </div>
            </div>
        </a>
    </div>';

            $articles_html_compact .= '
		<a href="' . $post_link . '" class="card-link">
        <div class="card" style="background-image: url(' . $post_thumbnail . ');">
            <div class="info">
                <h1 class="title">' . $post_title . '</h1>
                <p class="post-date">' . $post_date . '</p>
                <p class="description">' . $post_content . '</p>
                <a href="' . $post_link . '" class="compact-card-link"></a>
            </div>
        </div>';
        }

        echo '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Card Example</title>
<style>
    /* Tuo stile CSS */

    .card-link {
        text-decoration: none;
    }
    .card {
        border-radius: 16px;
        margin: 0 auto;
        width: 450px;
        min-height: 500px;
        box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.2),
            0px 5px 8px 0px rgba(0, 0, 0, 0.14),
            0px 1px 14px 0px rgba(0, 0, 0, 0.12);
        overflow: hidden;
        background-size: cover;
        border-top: none;
    }

    .info {
        position: relative;
        width: 100%;
        height: 500px;
        background-color: rgba(255, 255, 255, 0.8); /* Sfondo bianco trasparente */
        transform: translateY(100%)
            translateY(-190px)
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

    .card:hover .info,
    .card:hover .info:before {
        transform: translateY(0) translateZ(0);
    }

    .title {
        margin: 0;
        padding: 10px;
        font-size: 32px;
        line-height: 1;
        color: rgba(0, 0, 0, 0.87);
        overflow-wrap: break-word;
    }

    .post-date {
        margin: 0;
        padding: 0 10px;
        font-size: 18px;
        color: rgba(0, 0, 0, 0.54);
    }

    .description {
        margin: 0;
        padding: 0 24px 24px;
        font-size: 19px;
        line-height: 1.5;
        color: black !important;
    }

    .card:hover .description {
        display: block;
    }
  @media (min-width: 1140px) and (max-width: 1199px) {
			    .col-lg-3 {
 	widht:100%
 }
 .col-md-3 {
 	widht:100%
 }
			.card{
		margin-bottom:20px;
		width: 70em;
}
    }
	 @media (max-width: 1139px) and (min-width: 1052px) {
			    .col-lg-3 {
 	widht:100%
 }
 .col-md-3 {
 	widht:100%
 }
			.card{
		margin-bottom:20px;
		width: 60em;}
    }
	@media (max-width: 1051px) and (min-width: 992px) {
			    .col-lg-3 {
 	widht:100%
 }
 .col-md-3 {
 	widht:100%
 }
			.card{
		margin-bottom:20px;
		width: 56em;
}
    }
   @media (min-width: 820px) and (max-width: 991px) {
    .col-lg-3 {
			margin-bottom: 20px;
        }
		.card{
		width: 50em;
					margin-bottom: 20px;
		}
    }
	   @media (min-width: 720px) and (max-width: 819px) {
    .col-lg-3 {
			margin-bottom: 20px;
        }
		.card{
		width: 40em;
		margin-bottom: 20px;
		}
    }
   @media (max-width: 719px)  {
		.card{
		width: 35em;
		margin-bottom: 20px;
		}
		.title{
		font-size:30.3px;
		}
    }
	@media (min-width: 3000px) and (max-width:3999px) {
		.card{
		width: 45em;
		}
    }
	@media (min-width: 4000px)  {
		.card{
		width: 57em;
		}
    }
	@media (min-width: 3200px)  {
		.card{
		width: 840px;
		}
    }
	@media (min-width: 1200px)  {
		.card{
		max-width:100%;
		}
    }
	@media (max-width: 600px)  {
		.card{
		max-width:100%;
		}
    }
    /* Resto del tuo stile CSS */
    /* ... */
</style>
</head>
<body>
<main>
<div class="d-none d-lg-block">
            ' . $articles_html_full . '
        </div> 
        <div class="d-lg-none">
            ' . $articles_html_compact . '
        </div>
   
</main>
</body>
</html>
';
    }
}
