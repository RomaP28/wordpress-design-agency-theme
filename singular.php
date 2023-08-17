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

$postFields = get_fields(get_the_ID());
$link = $postFields["category"];
//p($postFields);


wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/less_separate/pages/home.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'button', get_template_directory_uri() . '/assets/less_separate/components/button.css' );

wp_enqueue_style( 'single-post', get_template_directory_uri() . '/assets/less_separate/pages/single-post.css' );
wp_enqueue_style( 'card-blog', get_template_directory_uri() . '/assets/less_separate/components/card-blog.css' );
wp_enqueue_style( 'approach', get_template_directory_uri() . '/assets/less_separate/components/approach.css' );
wp_enqueue_style( 'reviews-slider', get_template_directory_uri() . '/assets/less_separate/components/reviews-slider.css' );
wp_enqueue_style( 'card-brands', get_template_directory_uri() . '/assets/less_separate/components/card-brands.css' );

get_header();

//$arFields = get_fields( get_the_ID() );
$blogPosts = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => 3,
    'orderby'   => 'rand',
//    'order'    => 'DESC'
]);

?>
<script>
    document.querySelectorAll(".header-top-menu li.smooth").forEach((el, i) => {
        if (i === 0 || i === 1) el.style.display = 'none';
    })
</script>


<section class="article">
    <article>
        <a class="back" href="/blog/"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-left-grey.svg">Back to all articles</a>
        <h1 class="h-primary"><?php echo get_the_title(); ?></h1>
        <div class="row">
            <p class="date"><?php echo get_the_date(); ?></p>
            <?php if (isset($link["url"]) && !empty($link["url"])) { ?>
                <a href="<?php echo $link["url"] ?>"
                   target="<?php if (isset($link["target"]) && !empty($link["target"])) {
                        echo $link["target"];} else {
                        echo "_self";}  ?>"
                   class="category"><?php if (isset($link["title"]) && !empty($link["title"])) {
                        echo $link["title"];
                   } ?></a>

            <?php } ?>
        </div>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </article>
</section>
<section class="blog nav-trigger">
    <div class="container">
        <h2 class="h-primary">You may also like</h2>
            <?php get_template_part('template-parts/blog-cards', null, $blogPosts); ?>
    </div>
</section>

<?php
get_footer();