<?php
/* Template Name: Home */

wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/less_separate/pages/home.css' );
wp_enqueue_style( 'front-block', get_template_directory_uri() . '/assets/less_separate/components/front-block.css' );
wp_enqueue_style( 'button', get_template_directory_uri() . '/assets/less_separate/components/button.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'moving_bg', get_template_directory_uri() . '/assets/less_separate/components/moving_bg.css' );
wp_enqueue_style( 'card-work', get_template_directory_uri() . '/assets/less_separate/components/card-work.css' );
wp_enqueue_style( 'card-progress', get_template_directory_uri() . '/assets/less_separate/components/card-progress.css' );
wp_enqueue_style( 'card-capabilities', get_template_directory_uri() . '/assets/less_separate/components/card-capabilities.css' );
wp_enqueue_style( 'card-blog', get_template_directory_uri() . '/assets/less_separate/components/card-blog.css' );
wp_enqueue_style( 'approach', get_template_directory_uri() . '/assets/less_separate/components/approach.css' );
wp_enqueue_style( 'reviews-slider', get_template_directory_uri() . '/assets/less_separate/components/reviews-slider.css' );
wp_enqueue_style( 'card-brands', get_template_directory_uri() . '/assets/less_separate/components/card-brands.css' );

wp_enqueue_script( 'TextPlugin', get_template_directory_uri() . '/assets/libs/TextPlugin.min.js', ['gsap'] );
wp_enqueue_script( 'lazy-backgrounds', get_template_directory_uri() . '/assets/js/lazy-backgrounds.js' );

 get_header();

$arFields = get_fields();

$posts = get_posts([
    'post_type' => 'projects',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order'    => 'ASC'
]);

$pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order'    => 'ASC',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/services.php'
]);

$blogPosts = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => 6,
    'order'    => 'DESC'
]);

?>

    <?php if(isset($arFields['top_section_enabled']) && $arFields['top_section_enabled']) { ?>
        <section class="top-section">
            <div class="front-block">
                <h2 class="title">Global software development<br class="desktop"> firm with <span class="gradient">100%</span> <span class="gradient">reliability</span> rate</h2>
                <div class="options">
                    <?php foreach ($arFields['top_block']['options'] as $option) { ?>
                        <div>
                            <?php if(isset($option['title']) && !empty($option['title'])) { ?>
                                <h2><a href="<?php echo $option['link'] ?>"><?php echo $option['title'] ?></a></h2>
                            <?php } if(isset($option['text']) && !empty($option['text'])) { ?>
                                <p><?php echo $option['text'] ?></p>
                            <?php } ?>
                            <a href="<?php echo $option['link'] ?>"><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right.svg" alt="arrow-right"></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($arFields['top_block']['options'] as $option) { ?>
                            <div class="swiper-slide">
                                <?php if(isset($option['title']) && !empty($option['title'])) { ?>
                                    <h2><a href="<?php echo $option['link'] ?>"><?php echo $option['title'] ?></a></h2>
                                <?php } if(isset($option['text']) && !empty($option['text'])) { ?>
                                    <p><?php echo $option['text'] ?></p>
                                <?php } ?>
                                <a href="<?php echo $option['link'] ?>"><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right.svg" alt="arrow-right"></a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="bottom">
                    <?php if(isset($arFields['top_block']['button_contact_us']) && !empty($arFields['top_block']['button_contact_us'])) { ?>
                        <a class="btn dark small smooth" href="#contact"><?php echo $arFields['top_block']['button_contact_us'] ?></a>
                    <?php } if(isset($arFields['top_block']['button_cases']) && !empty($arFields['top_block']['button_cases'])) { ?>
                        <a class="btn light small" href="/projects/"><?php echo $arFields['top_block']['button_cases'] ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="moving_bg">
                <div class="up">
                    <?php foreach ($arFields['top_background']['row1'] as $row1) { ?>
                        <?php if(isset($row1['image']) && !empty($row1['image']) && isset($row1['image_retina']) && !empty($row1['image_retina'])) { ?>
                            <img src="<?php echo $row1['image'] ?>" alt="Page image">
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="down">
                    <?php foreach ($arFields['top_background']['row2'] as $row2) { ?>
                        <?php if(isset($row2['image']) && !empty($row2['image']) && isset($row2['image_retina']) && !empty($row2['image_retina'])) { ?>
                            <img src="<?php echo $row2['image'] ?>" alt="Page image">
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="up2">
                    <?php foreach ($arFields['top_background']['row3'] as $row3) { ?>
                        <?php if(isset($row3['image']) && !empty($row2['image']) && isset($row3['image_retina']) && !empty($row3['image_retina'])) { ?>
                            <img src="<?php echo $row3['image'] ?>" alt="Page image">
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="down2">
                    <?php foreach ($arFields['top_background']['row4'] as $row4) { ?>
                        <?php if(isset($row1['image']) && !empty($row4['image']) && isset($row4['image_retina']) && !empty($row4['image_retina'])) { ?>
                            <img src="<?php echo $row4['image'] ?>" alt="Page image">
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if(isset($arFields['work_section_enabled']) && $arFields['work_section_enabled']) { ?>
        <section id="main" class="work nav-trigger">
            <div class="container">
                <?php if(isset($arFields['work']['title']) && !empty($arFields['work']['title'])) { ?>
                    <h2 class="h-primary"><?php echo $arFields['work']['title']?></h2>
                <?php } ?>
                <div class="card-container">
                    <?php foreach ($posts as $post) {
                        $workFields = get_fields($post);
                        $choice = get_field('display', $post->ID);
                        if( $choice && in_array('display', $choice) && isset($workFields['project_enabled']) && $workFields['project_enabled']) { ?>
                            <div class="work-card">
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
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($posts as $post) {
                        $workFields = get_fields($post);
                        $choice = get_field('display');
                            if( $choice && in_array('display', $choice) && isset($workFields['project_enabled']) && $workFields['project_enabled']) { ?>
                                <div class="swiper-slide">
                                    <div class="work-card">
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
                                        <?php if(isset($workFields['button']) && !empty($workFields['button'])) { ?>
                                            <a href="<?php echo get_permalink($post->ID) ?>" class="btn light big"><?php echo $workFields['button']?><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right.svg" alt="arrow-right"></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
                    <?php if(isset($arFields['work']['text']) && !empty($arFields['work']['text'])) { ?>
                        <p class="paragraph"><?php echo $arFields['work']['text']?></p>
                    <?php } if(isset($arFields['work']['button']) && !empty($arFields['work']['button'])) { ?>
                        <a href="/projects/" class="btn dark big"><?php echo $arFields['work']['button']?></a>
                    <?php } ?>
            </div>
        </section>
    <?php } ?>

    <?php if(isset($arFields['rewards_section_enabled']) && $arFields['rewards_section_enabled']) { ?>
        <section class="rewards">
            <div class="container">
                <?php if(isset($arFields['rewards']['title']) && !empty($arFields['rewards']['title'])) { ?>
                    <h2 class="h-primary"><?php echo $arFields['rewards']['title']?></h2>
                <?php } if(isset($arFields['rewards']['text']) && !empty($arFields['rewards']['text'])) { ?>
                    <p class="paragraph"><?php echo $arFields['rewards']['text']?></p>
                <?php } ?>
                <div class="progress">
                    <div class="row">
                        <?php foreach ($arFields['rewards']['card'] as $card) { ?>
                            <div class="card" data-link="<?php echo $card['link'] ?>">
                                <div class="inner">
                                    <?php if(isset($card['logo']) && !empty($card['logo'])) { ?>
                                        <img src="<?php echo $card['logo'] ?>" alt="logo">
                                    <?php } ?>
                                    <div class="info">
                                        <?php if(isset($card['title']) && !empty($card['title'])&& isset($card['title_color']) && !empty($card['title_color'])) { ?>
                                            <h2 class="title" style="color:<?php echo $card['title_color'] ?>"><?php echo $card['title'] ?></h2>
                                        <?php } if(isset($card['rating']) && !empty($card['rating'])) { ?>
                                            <p class="rating"><?php echo $card['rating'] ?></p>
                                        <?php } if(isset($card['member']) && !empty($card['member'])) { ?>
                                            <p class="member"><?php echo $card['member'] ?></p>
                                        <?php } if(isset($card['star']) && !empty($card['star'])) { ?>
                                            <p class="star"><?php echo $card['star'] ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <?php foreach ($arFields['rewards']['card2'] as $card) { ?>
                            <div class="card-2">
                                <div class="top">
                                    <?php if(isset($card['image']) && !empty($card['image'])) { ?>
                                        <img src="<?php echo $card['image'] ?>" alt="icon">
                                    <?php } if(isset($card['title']) && !empty($card['title'])) { ?>
                                        <h2 class="h-secondary"><?php echo $card['title'] ?></h2>
                                    <?php } ?>
                                </div>
                                <?php if(isset($card['amount']) && !empty($card['amount'])) { ?>
                                    <h2 class="results"><?php echo $card['amount'] ?></h2>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if(isset($arFields['capabilities_section_enabled']) && $arFields['capabilities_section_enabled']) { ?>
        <section id="services" class="capabilities">
            <div class="container">
                <?php if(isset($arFields['capabilities']['title']) && !empty($arFields['capabilities']['title'])) { ?>
                    <h2 class="h-primary"><?php echo $arFields['capabilities']['title']?></h2>
                <?php } if(isset($arFields['capabilities']['text']) && !empty($arFields['capabilities']['text'])) { ?>
                    <p class="paragraph"><?php echo $arFields['capabilities']['text']?></p>
                <?php } ?>
                <div class="card-container">
                    <?php foreach($pages as $page) {
                        $pageFields = get_fields($page);
                        $display = get_field('display', $page->ID);
                        if ($display && in_array('display', $display) && isset($pageFields['service_enabled']) && !empty($pageFields['service_enabled'])) { ?>
                            <div class="cap-card" data-link="<?php echo get_permalink($page->ID) ?>">
                                <div class="bg"><img src="<?php echo $pageFields['bg_image'] ?>" alt="bg"></div>
                                <div class="blur"></div>
                                <div class="inner">
                                    <div class="top">
                                        <?php if(isset($pageFields['icon']) && !empty($pageFields['icon'])) { ?>
                                            <img src="<?php echo $pageFields['icon'] ?>" alt="icon">
                                        <?php } ?>
                                        <div class="circle"><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right-white.webp" alt="arrow"></div>
                                    </div>
                                    <div class="bottom">
                                        <?php if(isset($pageFields['title']) && !empty($pageFields['title'])) { ?>
                                            <h2><?php echo $pageFields['title'] ?></h2>
                                        <?php } if(isset($pageFields['technology']) && !empty($pageFields['technology'])) { ?>
                                            <p><?php echo $pageFields['technology'] ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                     <?php }
                    } ?>
                </div>
                <?php if(isset($arFields['capabilities']['button']) && !empty($arFields['capabilities']['button'])) { ?>
                    <a href="#contact" class="btn dark big smooth"><?php echo $arFields['capabilities']['button'] ?></a>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <?php if(isset($arFields['blog_section_enabled']) && $arFields['blog_section_enabled']) { ?>
        <section class="blog">
            <div class="container">
                <?php if(isset($arFields['blog']['title']) && !empty($arFields['blog']['title'])) { ?>
                    <h2 class="h-primary"><?php echo $arFields['blog']['title']?></h2>
                <?php }

                get_template_part('template-parts/blog-cards', null, $blogPosts); ?>
            </div>
        </section>
    <?php } ?>

<?php get_footer(); ?>
