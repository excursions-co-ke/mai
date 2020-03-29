<section class="gg-section service-section" data-type="background" data-speed="10">
    <div class="container table-wrapper">

        <?php foreach (get_posts() as $post) : setup_postdata($post); ?>
            <div class="col-md-4 text-center wow zoomIn">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <i class="icon-bed hvr-pulse"></i>
                    <h3 class=""><?php the_title(); ?></h3>
                </a>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endforeach;
        wp_reset_postdata(); ?>
    </div>
</section>