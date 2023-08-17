<div class="card-container">
    <?php foreach($args as $article) {
        $newDate = date("F d, Y", strtotime($article->post_date));
        ?>
        <div class="blog-card">
            <p class="date"><?php echo $newDate; ?></p>
            <h2><a href="<?php echo get_permalink($article->ID); ?>"><?php echo $article->post_title; ?></a></h2>
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
            <a href="<?php echo get_permalink($article->ID); ?>"><img class="arrow" src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-right.svg" alt="arrow-right"></a>
        </div>
    <?php } ?>
</div>