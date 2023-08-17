<?php

$arFields = get_fields( get_option( 'page_on_front' ) );;

$reviews = get_posts([
    'post_type' => 'reviews',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order'    => 'ASC'
]);

?>

<?php

 if(isset($arFields['request_section_enabled']) && $arFields['request_section_enabled']) { ?>
    <section id="contact-us" class="contact-us">
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
                            <li><a target="_blank" rel="nofollow" href="<?php echo $chat['url'] ?>"><img src="<?php echo $chat['icon'] ?>" alt="icon"></a></li>
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
            <?php wp_nav_menu( array( 'theme_location'=>'services-menu') );?>
        </div>
        <div class="footer-menu">
            <p class="label">Cases</p>
            <?php wp_nav_menu( array( 'theme_location'=>'cases-menu') ); ?>
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
</body>

</html>
