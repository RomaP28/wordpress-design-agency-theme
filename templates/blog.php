<?php
/* Template Name: Blog */


wp_enqueue_style( 'home', get_template_directory_uri() . '/assets/less_separate/pages/home.css' );
wp_enqueue_style( 'services', get_template_directory_uri() . '/assets/less_separate/pages/services.css' );
wp_enqueue_style( 'desktop-menu', get_template_directory_uri() . '/assets/less_separate/components/desktop-menu.css' );
wp_enqueue_style( 'button', get_template_directory_uri() . '/assets/less_separate/components/button.css' );

wp_enqueue_style( 'blog', get_template_directory_uri() . '/assets/less_separate/pages/blog.css' );
wp_enqueue_style( 'card-blog', get_template_directory_uri() . '/assets/less_separate/components/card-blog.css' );
wp_enqueue_style( 'approach', get_template_directory_uri() . '/assets/less_separate/components/approach.css' );
wp_enqueue_style( 'reviews-slider', get_template_directory_uri() . '/assets/less_separate/components/reviews-slider.css' );
wp_enqueue_style( 'card-brands', get_template_directory_uri() . '/assets/less_separate/components/card-brands.css' );

 get_header();

$blogPosts = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => 9,
    'order'    => 'DESC'
]);


 ?>
<script>
    document.querySelectorAll(".header-top-menu li.smooth").forEach((el, i) => {
        if (i === 0 || i === 1) el.style.display = 'none';
    });
</script>

<section class="blog-page-top">
    <div class="container">
        <h2 class="h-primary"><?php the_title(); ?></h2>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($blogPosts as $article) {
                    $newDate = date("F d, Y", strtotime($article->post_date)); ?>
                    <div class="swiper-slide">

                        <div class="left-col">
                            <p class="featured">FEATURED POSTS</p>
                            <h2><a href="<?php echo get_permalink($article->ID); ?>"><?php echo $article->post_title; ?></a></h2>
                            <div class="row">
                                <p class="date"><?php echo $newDate; ?></p>
                                <?php $link = get_fields($article->ID)["category"];
                                if (isset($link["url"]) && !empty($link["url"])) { ?>
                                    <a href="<?php echo $link["url"] ?>"
                                       target="<?php if (isset($link["target"]) && !empty($link["target"])) {
                                           echo $link["target"];} else {
                                           echo "_self";}  ?>"
                                       class="category"><?php if (isset($link["title"]) && !empty($link["title"])) {
                                            echo $link["title"];
                                        } ?></a>

                                <?php } ?>
                            </div>
                            <a href="<?php echo get_permalink($article->ID); ?>"><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right.svg" alt="arrow-right"></a>
                        </div>
                        <div class="right-col">
                            <?php echo get_the_post_thumbnail($article->ID); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="mouse_scroll">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
        <div>
            <span class="m_scroll_arrows unu"></span>
            <span class="m_scroll_arrows doi"></span>
            <span class="m_scroll_arrows trei"></span>
        </div>
    </div>
</section>
<section class="blog nav-trigger">
    <div class="container">
        <div class="card-container">
            <?php

            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

            $args = array (
                'post_type'              => 'post',
                'posts_per_page'         => '9',
                'paged' => $paged
            );

            $cquery = new WP_Query( $args );
            while ( $cquery->have_posts() ) : $cquery->the_post();
                $newDate = date("F d, Y", strtotime($post->post_date));
                ?>

                <div class="blog-card">
                    <p class="date"><?php echo $newDate; ?></p>
                    <h2><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h2>
                    <?php $link = get_fields($post->ID)["category"];
                    if (isset($link["url"]) && !empty($link["url"])) { ?>
                        <a href="<?php echo $link["url"] ?>"
                           target="<?php if (isset($link["target"]) && !empty($link["target"])) {
                               echo $link["target"];} else {
                               echo "_self";}  ?>"
                           class="category"><?php if (isset($link["title"]) && !empty($link["title"])) {
                                echo $link["title"];
                            } ?></a>
                    <?php } ?>
                    <a href="<?php echo get_permalink($post->ID); ?>"><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right.svg" alt="arrow-right"></a>
                </div>

            <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php
            $big = 999999999;

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' =>  $cquery->max_num_pages,
                'prev_text' => '<img class="arrow" src="' . get_template_directory_uri() . '/assets/img/icons/arrow-right-white.webp' . '" alt="arrow-right">',
                'next_text' => '<img class="arrow" src="' . get_template_directory_uri() . '/assets/img/icons/arrow-right-white.webp' . '" alt="arrow-right">',
                ) );
                ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>