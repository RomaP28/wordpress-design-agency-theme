<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

wp_enqueue_style( 'services', get_template_directory_uri() . '/assets/less_separate/pages/services.css' );
wp_enqueue_style( 'case-studies', get_template_directory_uri() . '/assets/less_separate/pages/case-studies.css' );
wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/less_separate/pages/home.css' );
wp_enqueue_style( 'macbook', get_template_directory_uri() . '/assets/less_separate/components/macbook.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'composition', get_template_directory_uri() . '/assets/less_separate/components/composition.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'button', get_template_directory_uri() . '/assets/less_separate/components/button.css' );
wp_enqueue_style( 'approach', get_template_directory_uri() . '/assets/less_separate/components/approach.css' );
wp_enqueue_style( 'reviews-slider', get_template_directory_uri() . '/assets/less_separate/components/reviews-slider.css' );
wp_enqueue_style( 'card-brands', get_template_directory_uri() . '/assets/less_separate/components/card-brands.css' );

get_header();

$arFields = get_fields( get_the_ID() );

?>
<script>
    document.querySelectorAll(".header-top-menu li.smooth").forEach((el, i) => {
        if (i === 0 || i === 1) el.style.display = 'none';
    })
</script>
<section id="main" class="top-block"
         <?php if(isset($arFields['background_gradient']) && !empty($arFields['background_gradient'])) { ?>
            style="background-image: url(<?php echo $arFields['background_gradient'] ?>);"
         <?php } ?>>
    <div class="container">
        <div class="mac-shadow">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/macshadow.webp" alt="macbook">
        </div>
        <div class="macbook">
            <div class="screen">
                <?php if(isset($arFields['macbook-screen']) && !empty($arFields['macbook-screen'])) { ?>
                    <img src="<?php echo $arFields['macbook-screen'] ?>" alt="screen">
                <?php } ?>
            </div>
        </div>
        <div class="top-block-title">
            <?php if(isset($arFields['title_gradient_word']) && !empty($arFields['title_gradient_word']) && isset($arFields['title_second_part']) && !empty($arFields['title_second_part'])) { ?>
                <h2><span class="gradient" style="
                    <?php if(isset($arFields['gradient']['degrees']) && !empty($arFields['gradient']['degrees'])) { ?>
                    background-image: linear-gradient(
                        <?php echo $arFields['gradient']['degrees'] ?>deg,
                            <?php $count = count($arFields['gradient']['colors']);
                                foreach ($arFields['gradient']['colors'] as $color) {
                                    echo $color['hex'] . ' ';
                                    echo $color['percent'] . '%';
                                    if (--$count > 0) { echo ','; }
                            }?>)"
                    <?php } ?>><?php echo $arFields['title_gradient_word'] ?></span> <?php echo $arFields['title_second_part'] ?></h2>
            <?php } if(isset($arFields['subtitle']) && !empty($arFields['subtitle'])) { ?>
                <p><?php echo $arFields['subtitle'] ?></p>
            <?php } ?>
        </div>
    </div>
</section>

<?php if(isset($arFields['tagline_enabled']) && $arFields['tagline_enabled']) { ?>
    <section class="tagline nav-trigger">
        <div class="container">
            <?php if(isset($arFields['tagline']['title']) && !empty($arFields['tagline']['title'])) { ?>
                <h2 class="h-tertiary"><?php echo $arFields['tagline']['title'] ?></h2>
            <?php } if(isset($arFields['tagline']['text']) && !empty($arFields['tagline']['text'])) { ?>
                <p class="p-secondary"><?php echo $arFields['tagline']['text'] ?></p>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<?php if(isset($arFields['composition_enabled']) && $arFields['composition_enabled']) { ?>
    <section id="services" class="details" style="
            <?php if(isset($arFields['composition']['bg_top']) && !empty($arFields['composition']['bg_top'] && isset($arFields['composition']['bg_bottom']) && !empty($arFields['composition']['bg_bottom']))) { ?>
                background: url(<?php echo $arFields['composition']['bg_top'] ?>), url(<?php echo $arFields['composition']['bg_bottom'] ?>) no-repeat;
                background-size: cover;"
        <?php } ?>>
        <div class="container">
            <div class="composition">
                <?php foreach ($arFields['composition']['image'] as $img) { ?>
                    <?php if(isset($img['src']) && !empty($img['src'])) { ?>
                        <?php if(wp_check_filetype( $img['src'], $mimes = null )['ext'] === 'webm') { ?>
                            <video playsinline autoplay loop muted
                                 style="width: <?php echo $img['attr']['width'] / 10 . 'rem' ?>;
                                 <?php if(isset($img['attr']['top']) && !empty($img['attr']['top']) || $img['attr']['top'] == 0) { ?>
                                         top: <?php echo $img['attr']['top'] / 10 . 'rem' ?>;
                             <?php } if(isset($img['attr']['right']) && !empty($img['attr']['right']) || $img['attr']['right'] == 0) { ?>
                                         right: <?php echo $img['attr']['right'] / 10 . 'rem' ?>;
                             <?php } if(isset($img['attr']['left']) && !empty($img['attr']['left']) || $img['attr']['left'] == 0) { ?>
                                         left: <?php echo $img['attr']['left'] / 10 . 'rem' ?>;
                             <?php } if(isset($img['attr']['bottom']) && !empty($img['attr']['bottom']) || $img['attr']['bottom'] == 0) { ?>
                                         bottom: <?php echo $img['attr']['bottom'] / 10 . 'rem' ?>;
                             <?php } ?>" >
                                <source src="<?php echo $img['src'] ?>" type="video/webm" />
                            </video>
                        <?php } else {?>
                            <img src="<?php echo $img['src'] ?>"
                                 style="width: <?php echo $img['attr']['width'] / 10 . 'rem' ?>;
                                 <?php if(isset($img['attr']['top']) && !empty($img['attr']['top']) || $img['attr']['top'] == 0) { ?>
                                         top: <?php echo $img['attr']['top'] / 10 . 'rem' ?>;
                             <?php } if(isset($img['attr']['right']) && !empty($img['attr']['right']) || $img['attr']['right'] == 0) { ?>
                                         right: <?php echo $img['attr']['right'] / 10 . 'rem' ?>;
                             <?php } if(isset($img['attr']['left']) && !empty($img['attr']['left']) || $img['attr']['left'] == 0) { ?>
                                         left: <?php echo $img['attr']['left'] / 10 . 'rem' ?>;
                             <?php } if(isset($img['attr']['bottom']) && !empty($img['attr']['bottom']) || $img['attr']['bottom'] == 0) { ?>
                                         bottom: <?php echo $img['attr']['bottom'] / 10 . 'rem' ?>;
                             <?php } ?>" alt="page">
                        <?php  } ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="text-area p-secondary">
            <?php if(isset($arFields['composition']['title']) && !empty($arFields['composition']['title'])) { ?>
                    <h2 class="h-tertiary"><?php echo $arFields['composition']['title'] ?></h2>
            <?php } if(isset($arFields['composition']['text']) && !empty($arFields['composition']['text'])) {
                echo $arFields['composition']['text']; } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php if(isset($arFields['details_review_enabled']) && $arFields['details_review_enabled']) { ?>
    <section class="details-review"
            <?php if(isset($arFields['details_review']['background']) && !empty($arFields['details_review']['background'])) { ?>
                style="background: url(<?php echo $arFields['details_review']['background'] ?>) no-repeat top right;"
            <?php } ?>>
        <div class="container p-secondary">
            <?php if(isset($arFields['details_review']['text']) && !empty($arFields['details_review']['text'])) {
                echo $arFields['details_review']['text'];
            } if(isset($arFields['details_review']['image']) && !empty($arFields['details_review']['image'])) { ?>
                <img src="<?php echo $arFields['details_review']['image'] ?>" alt="ipad">
            <?php } ?>
        </div>
    </section>
<?php } ?>

<?php
get_footer();
