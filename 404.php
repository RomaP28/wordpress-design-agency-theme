<?php
/* Template Name: Error Page */

wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/less_separate/pages/home.css' );
wp_enqueue_style( 'page404', get_template_directory_uri() . '/assets/less_separate/pages/page404.css' );
wp_enqueue_style( 'button', get_template_directory_uri() . '/assets/less_separate/components/button.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );

wp_enqueue_script( 'MotionPathPlugin', get_template_directory_uri() . '/assets/libs/MotionPathPlugin.min.js', ['gsap']  );
wp_enqueue_script( 'lazy-backgrounds', get_template_directory_uri() . '/assets/js/lazy-backgrounds.js' );

get_header();

?>
<section class="error-section nav-trigger">
    <div class="container">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <div class="scroll-trajectory">
            <svg viewBox="-170 -70 700 350" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <filter id="filter0_f_1924_1999" x="-100" y="-100" width="700" height="400" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="25" result="effect1_foregroundBlur_1924_1999"/>
                    </filter>
                </defs>

                <g class="innerTrajectory" style="transform: translate(-7%,-13%);">
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
        <h2 class="h-primary">Oooops...<span> Nothing to show here!</span></h2>
        <p>404</p>
        <a class="btn dark big" href="/">Go to homepage</a>
    </div>

</section>

<?php get_footer('404'); ?>
