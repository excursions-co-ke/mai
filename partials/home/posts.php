<section class="gg-section latest-posts" data-type="background" data-speed="10">
    <div class="container table-wrapper">
        <h2 class="center-sc-title ">Travel Tips</h2>
        <p class="heading-subtitle">Get travel advice from people like yourself, who have had the experience.</p>
        <ul class="row blog-row">
            <?php foreach (get_posts(['numberposts' => 3]) as $post) : setup_postdata($post); ?>
            <li class="col-md-4 col-xs-12 post-wrap wow zoomIn">
                <div class="blog-post-img-front">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full'); ?>
                    </a>
                    <div class="post-details">
                        <div class="info-t-post">
                            <span class="cat-bl">
                                <?php the_category(' ', '<span>'); ?>
                            </span>
                            <div class="post-det pull-right">
                                <span class="latest-date"><?php the_date('M d, Y'); ?></span>
                                <span class="z-likes">
                                    <?php if (function_exists('zilla_likes')){ zilla_likes(); } ?>
                                </span>
                                <span class="comments">
                                    <a href="<?php the_permalink(); ?>#comments">
                                        <i class="fa fa-comment-o"></i>
                                        <?php echo get_comments_number(get_the_ID()); ?>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <a class="bp-title" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <div class="post-excerpt">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </ul>
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="btn animated fadeInRight" href="<?php echo home_url('blog'); ?>">Read About All Tips</a>
            </div>
        </div>
    </div>
</section>