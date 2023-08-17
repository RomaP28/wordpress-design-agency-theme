<?php

$arFields = get_fields( get_option( 'page_on_front' ) );

$reviews = get_posts([
    'post_type' => 'reviews',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order'    => 'ASC'
]);

?>

    <?php if(isset($arFields['approach_section_enabled']) && $arFields['approach_section_enabled']) { ?>
        <section class="approach">
            <div class="container">
                <?php if(isset($arFields['approach']['title']) && !empty($arFields['approach']['title'])) { ?>
                    <h2 class="h-primary"><?php echo $arFields['approach']['title'] ?></h2>
                <?php } if(isset($arFields['approach']['text']) && !empty($arFields['approach']['text'])) { ?>
                    <p class="paragraph"><?php echo $arFields['approach']['text'] ?></p>
                <?php } foreach ($arFields['approach']['row'] as $row) { ?>
                    <div class="row">
                        <?php if(isset($row['number']) && !empty($row['number'])) { ?>
                            <h2 class="num"><?php echo $row['number'] ?></h2>
                            <div class="line"></div>
                        <?php } if(isset($row['service']) && !empty($row['service']) && isset($row['icon']) && !empty($row['icon'])) { ?>
                            <h2 class="sub-title"><img src="<?php echo $row['icon'] ?>" alt="hands shaking" class="approach__icon"><?php echo $row['service'] ?></h2>
                        <?php } if(isset($row['description']) && !empty($row['description'])) { ?>
                            <p class="description"><?php echo $row['description'] ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <?php if(isset($arFields['reviews_section_enabled']) && $arFields['reviews_section_enabled']) { ?>
        <section id="reviews" class="reviews">
            <div class="container">
                <?php if(isset($arFields['reviews']['title']) && !empty($arFields['reviews']['title'])) { ?>
                    <h2 class="h-primary"><?php echo $arFields['reviews']['title'] ?></h2>
                <?php } if(isset($arFields['reviews']['text']) && !empty($arFields['reviews']['text'])) { ?>
                    <p class="paragraph"><?php echo $arFields['reviews']['text'] ?></p>
                <?php } ?>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($reviews as $review) {
                            $revFields = get_fields($review); ?>
                            <div class="swiper-slide">
                                <div class="top">
                                    <?php if(isset($arFields['reviews']['bracket_up']) && !empty($arFields['reviews']['bracket_up'])) { ?>
                                        <img src="<?php echo $arFields['reviews']['bracket_up'] ?>" alt="Bracket">
                                    <?php } if(isset($revFields['review']) && !empty($revFields['review'])) { ?>
                                        <h2 class="review"><?php echo $revFields['review'] ?></h2>
                                    <?php } if(isset($arFields['reviews']['bracket_down']) && !empty($arFields['reviews']['bracket_down'])) { ?>
                                        <img src="<?php echo $arFields['reviews']['bracket_down'] ?>" alt="Bracket">
                                    <?php } ?>
                                </div>
                                <div class="user">
                                <?php if(isset($revFields['user_image']) && !empty($revFields['user_image'])) { ?>
                                    <img class="user-image" src="<?php echo $revFields['user_image'] ?>" alt="user photo">
                                <?php } ?>
                                </div>
                                <?php if(isset($revFields['user_name']) && !empty($revFields['user_name'])) { ?>
                                    <p class="paragraph user-name"><?php echo $revFields['user_name'] ?></p>
                                <?php } if(isset($arFields['reviews']['button']) && !empty($arFields['reviews']['button'])) { ?>
                                    <a class="btn dark big" target="_blank" rel="noopener nofollow" href="<?php echo $revFields['link'] ?>"><?php echo $arFields['reviews']['button'] ?><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right-white.webp" alt="arrow right"></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

    <?php } ?>

    <?php if(isset($arFields['brands_section_enabled']) && $arFields['brands_section_enabled']) { ?>
        <div class="brands">
            <div class="container">
                <?php $count = count($arFields['brands']);
                    foreach ($arFields['brands'] as $brand) {
                        if (isset($brand['image']) && !empty($brand['image'])) { ?>
                            <div class="card"><img src="<?php echo $brand['image'] ?>" alt="logo"></div>
                        <?php } if(--$count > 0 && isset($brand['image']) && !empty($brand['image'])) { ?>
                            <div class="dot"></div>
                        <?php }
                    } ?>
            </div>
        </div>
    <?php } ?>

    <?php if(isset($arFields['request_section_enabled']) && $arFields['request_section_enabled']) { ?>
        <section id="contact" class="contact-us">
            <div class="container">
                <?php if(isset($arFields['request']['title']) && !empty($arFields['request']['title'])) { ?>
                    <h2 class="h-primary"><?php echo $arFields['request']['title'] ?></h2>
                <?php } if(isset($arFields['request']['text']) && !empty($arFields['request']['text'])) { ?>
                    <p class="paragraph"><?php echo $arFields['request']['text'] ?></p>
                <?php } echo do_shortcode('[contact-form-7 id="35" title="Footer Form"]'); ?>
            </div>
        </section>
    <?php } ?>
</main>
<footer class="footer">
	<div class="container">
        <div>
            <?php if(isset($arFields['footer']['logo_light']) && !empty($arFields['footer']['logo_light'])) { ?>
                <a class="logo" href="/"><img src="<?php echo $arFields['footer']['logo_light'] ?>" alt="dev-3.agency"></a>
            <?php } ?>
            <div class="contacts">
                <?php if(isset($arFields['footer']['chats_label']) && !empty($arFields['footer']['chats_label'])) { ?>
                    <p class="label"><?php echo $arFields['footer']['chats_label'] ?></p>
                <?php } ?>
                <ul class="icons">
                    <?php foreach ($arFields['footer']['chats'] as $chat) { ?>
                        <?php if(isset($chat['icon']) && !empty($chat['icon'])) { ?>
                        <li><a target="_blank" rel="noopener nofollow" href="<?php echo $chat['url'] ?>"><img src="<?php echo $chat['icon'] ?>" alt="icon"></a></li>
                        <?php }
                    } ?>
                </ul>
            </div>
		</div>
        <div class="footer-menu">
            <p class="label">Menu</p>
            <?php wp_nav_menu( array( 'theme_location'=>'footer-menu') );?>
        </div>
        <div class="footer-menu">
            <p class="label">Services</p>
            <?php wp_nav_menu( array( 'theme_location'=>'main-services-menu') );?>
        </div>
        <div class="footer-menu">
            <p class="label">Cases</p>
        <?php wp_nav_menu( array( 'theme_location'=>'main-cases-menu') ); ?>
        </div>
        <div class="footer-menu">
            <?php if(isset($arFields['footer']['contacts']['title']) && !empty($arFields['footer']['contacts']['title'])) { ?>
                <p class="label"><?php echo $arFields['footer']['contacts']['title'] ?></p>
            <?php } if(isset($arFields['footer']['contacts']['address']) && !empty($arFields['footer']['contacts']['address'])) { ?>
                <ul>
                    <li class="icon">
                        <a target="_blank" rel="noopener nofollow" href="http://maps.google.com/?q=<?php echo $arFields['footer']['contacts']['address'] ?>"><?php echo $arFields['footer']['contacts']['address'] ?></a>
                    </li>
                <?php } if(isset($arFields['footer']['contacts']['phone']) && !empty($arFields['footer']['contacts']['phone'])) { ?>
                    <li class="icon">
                        <a href="tel:<?php echo $arFields['footer']['contacts']['phone'] ?>"><?php echo $arFields['footer']['contacts']['phone'] ?></a
                    </li>
                <?php } if(isset($arFields['footer']['contacts']['email']) && !empty($arFields['footer']['contacts']['email'])) { ?>
                    <li class="icon">
                        <a href="mailto:<?php echo $arFields['footer']['contacts']['email'] ?>"><?php echo $arFields['footer']['contacts']['email'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
	</div>
	<div class="divider"></div>
	<div class="container container-bottom">
		    <p class="copyright">&copy; Copyright <?php echo date('Y'); ?>. DEV-3 All Rights Reserved.</p>
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
</footer>

<?php wp_footer(); ?>

<?php

?>

<script type="text/javascript">
    function statistics() {
        window.smartlook||(function(d) {
            var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName("head")[0];
            var c=d.createElement("script");o.api=new Array();c.async=true;c.type="text/javascript";
            c.charset="utf-8";c.src="https://web-sdk.smartlook.com/recorder.js";h.appendChild(c);
        })(document);
        smartlook("init", "58c6223a2208fbc4b8adef705fab1218ea80d089", { region: "eu" });
    }
    setTimeout(statistics, 2000);
</script>

</body>

</html>
