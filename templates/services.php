<?php
/* Template Name: Services */

$serviceFields = get_fields( get_the_ID() );
$arFields = get_fields( get_option( 'page_on_front' ) );


wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/less_separate/pages/home.css' );
wp_enqueue_style( 'services', get_template_directory_uri() . '/assets/less_separate/pages/services.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'button', get_template_directory_uri() . '/assets/less_separate/components/button.css' );
wp_enqueue_style( 'approach', get_template_directory_uri() . '/assets/less_separate/components/approach.css' );
wp_enqueue_style( 'reviews-slider', get_template_directory_uri() . '/assets/less_separate/components/reviews-slider.css' );
wp_enqueue_style( 'card-brands', get_template_directory_uri() . '/assets/less_separate/components/card-brands.css' );
wp_enqueue_style( 'rocket', get_template_directory_uri() . '/assets/less_separate/components/rocket.css' );
wp_enqueue_style( 'graphicsArea', get_template_directory_uri() . '/assets/less_separate/components/graphicsArea.css' );

wp_enqueue_script( 'MotionPathPlugin', get_template_directory_uri() . '/assets/libs/MotionPathPlugin.min.js', ['gsap']  );
wp_enqueue_script( 'rocket-scroll', get_template_directory_uri() . '/assets/js/rocket-scroll.js' );

get_header();

?>
<script>
    document.querySelectorAll(".header-top-menu li.smooth").forEach((el, i) => {
        if (i === 0) el.style.display = 'none';
    })
</script>

<section id="main" class="services-top">
    <div class="containerHero">
        <div class="right-top">
            <?php foreach ($serviceFields['tags'] as $tag) {
                if(isset($tag['name']) && !empty($tag['name'])) { ?>
                    <span><?php echo $tag['name'] ?></span>
                <?php }
            } ?>
        </div>
    <div class="graphics">
        <div class="graphicArea">
            <svg class="graphSecondary" viewBox="0 0 1600 507" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 158.672C54.8973 146.492 75.7958 153.146 97.4503 189.062C137.211 255.016 149.056 287.043 199.264 357.948C249.472 428.852 342.078 474.716 391.186 486.39C440.295 498.063 468.918 498.991 505.933 494.514C542.948 490.037 601.003 464.323 639.396 421.218C677.789 378.113 704.09 295.176 775.677 270.266C847.265 245.357 921.03 324.389 978.139 324.389C1035.25 324.389 1140.1 144.603 1202.55 140.239C1247.82 137.075 1304.37 328.554 1410.42 252.332C1516.48 176.109 1587 19.1786 1625.18 11.7061C1663.36 4.23356 1692 58.5359 1692 58.5359" stroke="url(#paint0_linear_1924_1984)" stroke-opacity="0.02" stroke-width="20"/>
                <defs>
                    <linearGradient id="paint0_linear_1924_1984" x1="1601.5" y1="33.9999" x2="368.5" y2="411" gradientUnits="userSpaceOnUse">
                        <stop  offset="0" style="stop-color:#26373E;stop-opacity:0"/>
                        <stop  offset="0.914875e-02" style="stop-color:#26373E"/>
                        <stop  offset="1" style="stop-color:#26373E;stop-opacity:0"/>
                    </linearGradient>
                </defs>
            </svg>
            <svg class="graphSecondaryColorLine" viewBox="0 0 1598 488" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="mot" d="M1 148.672C53.8973 136.492 74.7958 143.146 96.4503 179.062C136.211 245.016 148.056 277.043 198.264 347.948C248.472 418.852 341.078 464.716 390.186 476.39C439.295 488.063 467.918 488.991 504.933 484.514C541.948 480.037 600.003 454.323 638.396 411.218C676.789 368.113 703.09 285.176 774.677 260.266C846.265 235.357 920.03 314.389 977.139 314.389C1034.25 314.389 1139.1 134.603 1201.55 130.239C1246.82 127.075 1303.37 318.554 1409.42 242.332C1515.48 166.109 1586 9.17861 1624.18 1.70609C1662.36 -5.76644 1691 48.5359 1691 48.5359" stroke="url(#paint0_linear_1924_1982)" stroke-opacity="0.5"/>
                <defs>
                    <linearGradient id="paint0_linear_1924_1982" x1="634.5" y1="137" x2="1598.48" y2="12.4853" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF906C" stop-opacity="0"/>
                        <stop offset="0.869792" stop-color="#BA50FB"/>
                        <stop offset="1" stop-color="#BA50FB" stop-opacity="0"/>
                    </linearGradient>
                </defs>
            </svg>

            <svg class="graphPrimary"  viewBox="0 0 1600 508" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 158.706C51.0177 146.523 70.7785 153.179 91.2542 189.103C128.85 255.072 140.051 287.107 187.525 358.028C235 428.949 322.565 474.824 369 486.5C415.435 498.176 442.5 499.105 477.5 494.627C512.5 490.149 567.394 464.428 603.697 421.313C640 378.198 664.869 295.242 732.56 270.327C800.251 245.411 870 324.462 924 324.462C978 324.462 1077.15 144.634 1136.2 140.269C1179 137.105 1232.47 328.628 1332.75 252.388C1433.03 176.147 1499.72 19.1805 1535.82 11.7063C1571.92 4.23199 1599 58.5469 1599 58.5469" stroke="url(#paint0_linear_1924_1983)" stroke-opacity="0.05" stroke-width="20"/>
                <defs>
                    <linearGradient id="paint0_linear_1924_1983" x1="1599" y1="254" x2="444" y2="418" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#26373E" stop-opacity="0"/>
                        <stop offset="0.0133013" stop-color="#26373E" stop-opacity="0.59"/>
                        <stop offset="0.0278289" stop-color="#26373E" stop-opacity="0.872821"/>
                        <stop offset="1" stop-color="#26373E" stop-opacity="0"/>
                    </linearGradient>
                </defs>
            </svg>

            <svg class="graphPrimaryColorLine"  viewBox="0 0 1600 488" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 148.706C51.0177 136.523 70.7785 143.179 91.2542 179.103C128.85 245.072 140.051 277.107 187.525 348.028C235 418.949 322.565 464.824 369 476.5C415.435 488.176 442.5 489.105 477.5 484.627C512.5 480.149 567.394 454.428 603.697 411.313C640 368.198 664.869 285.242 732.56 260.327C800.251 235.411 870 314.462 924 314.462C978 314.462 1077.15 134.634 1136.2 130.269C1179 127.105 1232.47 318.628 1332.75 242.388C1433.03 166.147 1499.72 9.18051 1535.82 1.70625C1571.92 -5.76801 1599 48.5469 1599 48.5469" stroke="url(#paint0_linear_1924_1981)"/>
                <defs>
                    <linearGradient id="paint0_linear_1924_1981" x1="583.5" y1="217.5" x2="1599.87" y2="-18.7393" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF906C" stop-opacity="0"/>
                        <stop offset="0.834512" stop-color="#BF55F0" stop-opacity="0.921703"/>
                        <stop offset="0.938823" stop-color="#BC52F7" stop-opacity="0.16"/>
                        <stop offset="1" stop-color="#BA50FB" stop-opacity="0"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>
        <div class="services-right">
            <div class="scroll-trajectory">
                <svg  width="592" height="265" viewBox="-250 -50 700 350" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_f_1924_1999)">
                        <circle class="earth earth-blur" cx="77.5137" cy="77.499" r="27.5" fill="#C52AB6"/>
                    </g>
                    <defs>
                        <filter id="filter0_f_1924_1999" x="-100" y="-100" width="700" height="400" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                            <feGaussianBlur stdDeviation="25" result="effect1_foregroundBlur_1924_1999"/>
                        </filter>
                    </defs>

                    <g class="innerTrajectory">
                        <svg  width="79" height="100" viewBox="-10 0 100 120" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <circle id="sputnik" r="5" cx="0" cy="0" fill="url(#paint0_linear_1924_2002)" />
                            <defs>
                                <linearGradient id="paint0_linear_1924_2002" x1="0.013672" y1="6.99902" x2="10.0137" y2="-1.50098" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E7E7E7"/>
                                    <stop offset="1" stop-color="#A7A7A7"/>
                                </linearGradient>
                            </defs>
                            <animateMotion
                                xlink:href="#sputnik"
                                dur="12s"
                                begin="0s"
                                fill="freeze"
                                repeatCount="indefinite">
                                <mpath xlink:href="#motionPath" />
                            </animateMotion>
                        </svg>
                    </g>
                    <circle class="earth" cx="0" cy="0" r="11.5" fill="url(#paint0_linear_1924_2000)"/>
                    <defs>
                        <linearGradient id="paint0_linear_1924_2000" x1="2.51367" y1="4.99902" x2="28.5137" y2="22.999" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#BDBCBC"/>
                            <stop offset="1" stop-color="#636363"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <?php if (isset($serviceFields['detail']['rating']) && !empty($serviceFields['detail']['rating'])) { ?>
                <p class="paragraph"><img class="cup" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/cup.webp" alt="cup"> <?php echo $serviceFields['detail']['rating'] ?></p>
            <?php } if (isset($serviceFields['detail']['title']) && !empty($serviceFields['detail']['title'])) { ?>
                <h2><?php echo $serviceFields['detail']['title'] ?></h2>
            <?php } ?>
            <?php if (isset($serviceFields['detail']['description']) && !empty($serviceFields['detail']['description'])) { ?>
                <p class="services-sub-title"><?php echo $serviceFields['detail']['description'] ?></p>
            <?php } ?>
                <ul class="service-followus">
                <li><a target="_blank" href="https://www.upwork.com/ag/dev3/"><img class="upwork-img" src="/wp-content/themes/dev3agency/assets/img/icons/upwork.webp" alt="icon"></a></li>
                <li><a target="_blank" href="https://clutch.co/profile/dev-3-web-design-development-agency#reviews"><img class="clutch-img" src="/wp-content/themes/dev3agency/assets/img/icons/clutch.webp" alt="icon"></a></li>
            </ul>
        </div>

        <div class="services-form">
            <div class="ball"></div>
            <div class="services-form-bg"></div>
            <div class="services-form-content">
                <h3>Get a Custom Solution</h3>
                <?php echo do_shortcode('[contact-form-7 id="1269" title="Services Form"]'); ?>
            </div>
        </div>

        <span class="star star-top"></span>
    </div>
</section>
<section id="services" class="dev-service nav-trigger">
    <div class="container">
        <?php if (isset($serviceFields['section_title']) && !empty($serviceFields['section_title'])) { ?>
            <h2 class="h-primary"><?php echo $serviceFields['section_title'] ?></h2>
        <?php } ?>        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>

        <div class="orbit">
            <div class="progress"></div>
            <?php foreach ($serviceFields['rocket'] as $planet) { ?>
                <?php if(isset($planet['title']) && !empty($planet['title'])) { ?>
                <div class="planet-wrapper">
                    <div class="planet">
                        <p><?php echo $planet['title'] ?></p>
                     <?php if(isset($planet['planet']) && !empty($planet['planet'])) { ?>
                        <img src="<?php echo $planet['planet'] ?>" alt="rocket">
                     <?php } ?>
                    </div>
                </div>
                <?php }
            } ?>
            <div class="rocket">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/rocket.webp" alt="rocket">
            </div>
        </div>

        <div class="service-detail">
            <div class="service-row">
               <div class="title-wrapper">
                 <?php foreach ($serviceFields['rocket'] as $planet) {
                    if(isset($planet['title']) && !empty($planet['title'])) { ?>
                        <h2 class="service-title"><?php echo $planet['title'] ?></h2>
                    <?php }
                } ?>
               </div>
                <a href="#contact" class="btn dark small smooth">Get Service<img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right-white.webp" alt="arrow-right"></a>
            </div>
            <div class="service-row">
                <?php foreach ($serviceFields['rocket'] as $val) {
                if(isset($val['description']) && !empty($val['description'])) { ?>
                    <p class="service-desc"><?php echo $val['description'] ?></p>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>



