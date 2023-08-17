<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$projects = get_fields( get_option( 'page_on_front' ) );;

$posts = get_posts([
    'post_type' => 'projects',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order'    => 'ASC'
]);

wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/less_separate/pages/home.css' );
wp_enqueue_style( 'our-work', get_template_directory_uri() . '/assets/less_separate/pages/our-work.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'button', get_template_directory_uri() . '/assets/less_separate/components/button.css' );
wp_enqueue_style( 'approach', get_template_directory_uri() . '/assets/less_separate/components/approach.css' );
wp_enqueue_style( 'reviews-slider', get_template_directory_uri() . '/assets/less_separate/components/reviews-slider.css' );
wp_enqueue_style( 'card-brands', get_template_directory_uri() . '/assets/less_separate/components/card-brands.css' );
wp_enqueue_style( 'card-work', get_template_directory_uri() . '/assets/less_separate/components/card-work.css' );

wp_enqueue_script( 'lazy-backgrounds', get_template_directory_uri() . '/assets/js/lazy-backgrounds.js' );


get_header(); ?>

    <?php if(isset($projects['projects_section_enabled']) && $projects['projects_section_enabled']) { ?>
        <script>
            document.querySelectorAll(".header-top-menu li.smooth").forEach((el, i) => {
                if (i === 1) el.style.display = 'none';
            })
        </script>
        <section class="main-work">
            <div class="container">
                <?php $projects = $projects['projects_section'];
                    if(isset($projects['title']) && !empty($projects['title'])) { ?>
                    <h1 class="main-title"><?php echo $projects['title'] ?></h1>
                <?php } if(isset($projects['subtitle']) && !empty($projects['subtitle'])) { ?>
                    <div class="main-sub-title"><?php echo $projects['subtitle'] ?></div>
                <?php } if(isset($projects['text']) && !empty($projects['text'])) { ?>
                    <div class="main-text"><?php echo $projects['text'] ?></div>
                <?php } if(isset($projects['button']) && !empty($projects['button'])) { ?>
                    <a class="btn dark big smooth" href="#contact-us"><?php echo $projects['button'] ?></a>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

        <section id="main" class="work nav-trigger">
            <div class="container">
                <div class="card-container our-work">
                    <?php foreach ($posts as $i=>$post) {
                    $workFields = get_fields($post->ID);?>
                        <?php if(isset($workFields['project_enabled']) && $workFields['project_enabled']) { ?>
                        <div class="work-card">
                            <?php if(isset($workFields['bg_image']) && !empty($workFields['bg_image'])) { ?>
                                <div class="lazy-background" <?php if(isset($workFields['bg_image']) && !empty($workFields['bg_image'])) { ?>
                                    data-background="url(<?php echo $workFields['bg_image'] ?>)"
                                <?php } ?>>
                                    <?php if(isset($workFields['main_image']) && !empty($workFields['main_image'])) { ?>
                                        <img src="<?php echo $workFields['main_image'] ?>"
                                            <?php if(isset($workFields['custom_css']) && !empty($workFields['custom_css'])) { ?>
                                                class="<?php echo $workFields['custom_css'] ?>"
                                            <?php } ?> alt="Macbook">
                                    <?php } ?>
                                    <div class="info">
                                        <?php if(isset($workFields['info']['country']['flag']) && !empty($workFields['info']['country']['flag']) && isset($workFields['info']['country']['country_name']) && !empty($workFields['info']['country']['country_name'])) { ?>
                                            <p class="country"><img src="<?php echo $workFields['info']['country']['flag'] ?>" alt="Flag UK"><?php echo $workFields['info']['country']['country_name'] ?></p>
                                        <?php } if(isset($workFields['info']['title']) && !empty($workFields['info']['title'])) { ?>
                                            <p class="title"><?php echo $workFields['info']['title'] ?></p>
                                        <?php } ?>
                                        <ul>
                                            <?php $count = count($workFields['info']['services']);
                                            foreach ($workFields['info']['services'] as $service) {
                                                if (--$count <= 0 && isset($service['text']) && !empty($service['text'])) { ?>
                                                    <li><p><?php echo $service['text']?></p></li>
                                                    <?php break;
                                                } if( isset($service['text']) && !empty($service['text'])) { ?>
                                                    <li><p><?php echo $service['text']?></p><span>.</span></li>
                                                <?php }
                                            } ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="bottom">
                                    <ul>
                                        <?php if(isset($workFields['technologies']) && !empty($workFields['technologies'])) {
                                            foreach($workFields['technologies'] as $technology) { ?>
                                                <li><?php echo $technology['tag']; ?></li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                    <?php if(isset($workFields['button']) && !empty($workFields['button'])) { ?>
                                        <a href="<?php echo get_permalink($post->ID) ?>" class="btn light big"><?php echo $workFields['button']?><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right.svg" alt="arrow-right"></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>

<?php get_footer(); ?>
