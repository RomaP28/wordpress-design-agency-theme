<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php if (is_post_type_archive()) { echo 'Professional development project dev-3'; } else { the_title();};?></title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" rel="stylesheet" />

    <?php

    wp_enqueue_script( 'intlTelInput', get_template_directory_uri() . '/assets/libs/intl-tel/js/intlTelInput.js' );

    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/libs/gsap.min.js' );
    wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/libs/swiper-bundle.min.js' );
    wp_enqueue_script( 'ScrollTrigger', get_template_directory_uri() . '/assets/libs/ScrollTrigger.min.js' );
    wp_enqueue_script( 'EasePack', get_template_directory_uri() . '/assets/libs/EasePack.min.js' );
    wp_enqueue_script( 'simplebar', get_template_directory_uri() . '/assets/libs/simplebar.min.js' );
    wp_enqueue_script( 'Draggable', get_template_directory_uri() . '/assets/libs/Draggable.min.js' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js' );


    wp_enqueue_style( 'header', get_template_directory_uri() . '/assets/less_separate/layout/header.css' );
    wp_enqueue_style( 'menu-dots', get_template_directory_uri() . '/assets/less_separate/components/menu-dots.css' );
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/assets/less_separate/layout/footer.css' );
//    wp_enqueue_style( 'intlTelInput', get_template_directory_uri() . '/assets/libs/phoneInput/css/intlTelInput.css' );
    wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/libs/swiper-bundle.min.css' );
    wp_enqueue_style( 'simplebar', get_template_directory_uri() . '/assets/libs/simplebar.css' );

    ?>

	<?php wp_head();?>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
<body>
<?php


$arFields = get_fields( get_option( 'page_on_front' ) );

$posts = get_posts([
    'post_type' => 'projects',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order'    => 'ASC'
]);

?>
<header>
    <div class="desktop-menu-bg"></div>
    <div class="desktop-menu">
        <div>
            <div class="top-left">
                <h2>We are <span>digital</span> creators</h2>
                <p>And we help with digital solutions tailored to specific business needs</p>
                <button class="btn small open-menu-form"><?php echo $arFields['button'] ?><svg viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.50019C0 6.33443 0.065848 6.17545 0.183058 6.05824C0.300268 5.94103 0.45924 5.87519 0.625 5.87519L15.3663 5.87519L11.4325 1.94269C11.3151 1.82533 11.2492 1.66616 11.2492 1.50019C11.2492 1.33422 11.3151 1.17504 11.4325 1.05769C11.5499 0.940328 11.709 0.874397 11.875 0.874397C12.041 0.874397 12.2001 0.940328 12.3175 1.05769L17.3175 6.05769C17.3757 6.11574 17.4219 6.18471 17.4534 6.26065C17.4849 6.33658 17.5011 6.41798 17.5011 6.50019C17.5011 6.5824 17.4849 6.6638 17.4534 6.73973C17.4219 6.81566 17.3757 6.88463 17.3175 6.94269L12.3175 11.9427C12.2001 12.06 12.041 12.126 11.875 12.126C11.709 12.126 11.5499 12.06 11.4325 11.9427C11.3151 11.8253 11.2492 11.6662 11.2492 11.5002C11.2492 11.3342 11.3151 11.175 11.4325 11.0577L15.3663 7.12519L0.625 7.12519C0.45924 7.12519 0.300268 7.05934 0.183058 6.94213C0.065848 6.82492 0 6.66595 0 6.50019Z" fill="#FF8686"/>
                    </svg></button>
            </div>
            <div class="macbook">
                <div class="swiper preview-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($posts as $p) {
                            $postFields = get_fields($p->ID);
                            if( isset($postFields['project_enabled']) && $postFields['project_enabled']) { ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $postFields['slider_preview_image'] ?>" alt="site">
                                    <p><?php echo $postFields['info']['title'] ?></p>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>

                <div class="swiper-button-prev">
                    <img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right-white.webp" alt="arrow">
                </div>
                <div class="swiper-button-next">
                    <img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right-white.webp" alt="arrow">
                </div>
            </div>
        </div>
        <div>
            <h2>Cases</h2>
            <?php wp_nav_menu( array( 'theme_location'=>'main-cases-menu', 'menu_class' => 'menu-cases') );?>
        </div>
        <div>
            <h2>Services</h2>
            <?php  wp_nav_menu( array( 'theme_location'=>'main-services-menu', 'menu_class' => 'menu-services') ); ?>
        </div>
        <div>
            <div class="menu-close">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/red-close.webp" alt="close">
            </div>
            <div class="drain-line-wrapper">
                <div class="line-animation">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <ul class="followus">
                <?php if(isset($arFields['footer']['follow_us_label']) && !empty($arFields['footer']['follow_us_label'])) { ?>
                    <li class="label"><?php echo $arFields['footer']['follow_us_label'] ?></li>
                <?php } foreach($arFields['footer']['follow_us'] as $socialNetwork) {
                    if(isset($socialNetwork['link']) && !empty($socialNetwork['link']) && isset($socialNetwork['icon']) && !empty($socialNetwork['icon'])) { ?>
                        <li><a target="_blank" rel="noopener nofollow" href="<?php echo $socialNetwork['link'] ?>"><img src="<?php echo $socialNetwork['icon'] ?>" alt="icon"></a></li>
                    <?php }
                } ?>
            </ul>
        </div>
        <div class="header-form">
            <h2>Enquiry for a project</h2>
            <?php echo do_shortcode('[contact-form-7 id="664" title="Header Form"]'); ?>
        </div>
        <div class="thank-you-modal">
            <h2>Thank you</h2>
            <p>We have recieved your enquiry, and will get back to you in shortest possible time</p>
            <button class="btn small close-modal">OK<svg viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.50019C0 6.33443 0.065848 6.17545 0.183058 6.05824C0.300268 5.94103 0.45924 5.87519 0.625 5.87519L15.3663 5.87519L11.4325 1.94269C11.3151 1.82533 11.2492 1.66616 11.2492 1.50019C11.2492 1.33422 11.3151 1.17504 11.4325 1.05769C11.5499 0.940328 11.709 0.874397 11.875 0.874397C12.041 0.874397 12.2001 0.940328 12.3175 1.05769L17.3175 6.05769C17.3757 6.11574 17.4219 6.18471 17.4534 6.26065C17.4849 6.33658 17.5011 6.41798 17.5011 6.50019C17.5011 6.5824 17.4849 6.6638 17.4534 6.73973C17.4219 6.81566 17.3757 6.88463 17.3175 6.94269L12.3175 11.9427C12.2001 12.06 12.041 12.126 11.875 12.126C11.709 12.126 11.5499 12.06 11.4325 11.9427C11.3151 11.8253 11.2492 11.6662 11.2492 11.5002C11.2492 11.3342 11.3151 11.175 11.4325 11.0577L15.3663 7.12519L0.625 7.12519C0.45924 7.12519 0.300268 7.05934 0.183058 6.94213C0.065848 6.82492 0 6.66595 0 6.50019Z" fill="#FF8686"/>
                </svg></button>
        </div>
    </div>

    <nav>
        <div class="container">
            <?php if(isset($arFields['logo']) && !empty($arFields['logo'])) { ?>
                <a class="logo" href="/"><img src="<?php echo $arFields['logo'] ?>" alt="dev-3.agency"></a>
            <?php } if(isset($arFields['logo_mobile']) && !empty($arFields['logo_mobile'])) { ?>
                <a class="logo-mobile" href="/"><img src="<?php echo $arFields['logo_mobile'] ?>" alt="dev-3.agency"></a>
             <?php } ?>
            <?php wp_nav_menu( array( 'theme_location'=>'header-menu', 'menu_class' => 'header-top-menu') ); ?>
            <div class="right-side">
                <ul class="followus">
                    <li style="display: none"></li>
                <?php foreach($arFields['followus_header'] as $socialNetwork) {
                    if(isset($socialNetwork['link']) && !empty($socialNetwork['link']) && isset($socialNetwork['icon']) && !empty($socialNetwork['icon'])) { ?>
                        <li><a target="_blank" rel="noopener nofollow" href="<?php echo $socialNetwork['link'] ?>"><img src="<?php echo $socialNetwork['icon'] ?>" alt="icon"></a></li>
                <?php }
                } ?>
                    <li style="display: none"></li>
                    <li style="display: none"></li>
                </ul>
                <?php if(isset($arFields['button']) && !empty($arFields['button'])) { ?>
                    <a class="btn light small smooth" href="#contact"><?php echo $arFields['button'] ?></a>
                <?php } ?>
                <div class="menu-open">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <?php
    $template_path = get_post_meta(get_the_ID(), '_wp_page_template', true);
    $templates = wp_get_theme()->get_page_templates();
    if (!is_singular('post') && $templates[$template_path] !== 'Blog') { ?>
        <div class="info-block">
            <div class="icon-container">
                <i class="icon">i</i>
            </div>
            <div class="info-container">
                <div class="info-header">
                    <?php echo $templates[$template_path] === 'Blog'; ?>
                    <span>DEV-3 Software development firm</span>
                    <div class="info-close"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/black-cross.svg" alt="info"></div>
                </div>
                <div class="content">
                    <div class="inner">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>