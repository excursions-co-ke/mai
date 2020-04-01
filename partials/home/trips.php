<section class="gg-section">
    <button class="ggts-tour-trigger"><span aria-hidden="true" class="ggts-icon"></span></button>
    <div class="tour-sections-cont">
        <div class="ggts-projects-container">
            <ul>
                <?php $posts = get_posts(
                    [
                        'post_type'         => 'excursion', 
                        'posts_per_page'	=> 5,
                        'meta_key'			=> 'from',
                        'orderby'			=> 'meta_value',
                        'order'				=> 'ASC'
                    ]
                ); ?>
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                <?php if (get_field('from') && (strtotime(get_field('from')) > time())) : ?>
                <li class="single-project">
                    <div class="ggts-title">
                        <div id="tour-<?php the_ID(); ?>" class="ggts-image-section"
                            style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                        <div class="ggts-name">
                            <h4>
                                <?php $terms = get_the_terms(get_the_ID(), 'destination'); ?>
                                <?php if ($terms) : ?>
                                <?php foreach ($terms as $term) : ?>
                                <a href="<?php echo get_term_link($term); ?>">
                                    <span data-hover="<?php echo $term->name; ?>">
                                        <?php echo $term->name; ?>
                                    </span>
                                </a>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </h4>
                            <h2><?php the_title(); ?></h2>
                            <p class="info-tour-home">
                                <span class="tour-days">
                                    <?php if (get_field('days')) : ?>
                                    <?php the_field('days'); ?> day<?php if (get_field('days') > 1) : ?>s<?php endif; ?>
                                    <?php endif; ?>
                                </span>
                                <?php if (get_field('days') > 1) : ?>from<?php else: ?>on<?php endif; ?>
                                <span class="normal-price">
                                    <?php if (get_field('from')) : ?>
                                    <?php the_field('from'); ?>
                                    <?php endif; ?>
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="ggts-project-info">
                        <div class="ggts-scroll">
                            <div class="mouse-icon">
                                <div class="wheel"></div>
                            </div>
                        </div>

                        <div class="content-wrapper">
                            <div class="container">
                                <div class="row tdetails-table text-center">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="table">
                                            <div class="table-cell">
                                                <button type="button" data-toggle="modal"
                                                    data-target="#booking-modal<?php the_ID(); ?>"
                                                    dataTitle="<?php the_title(); ?>" class="btn btn-book icon-book">
                                                    Book Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="table">
                                            <div class="table-cell">
                                                <span class="side-title">FROM</span>
                                                <?php if (get_field('from')) : ?>
                                                <p><?php the_field('from'); ?></p>
                                                <?php endif; ?>
                                                <span class="side-title">TO</span>
                                                <?php if (get_field('to')) : ?>
                                                <p><?php the_field('to'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="table">
                                            <div class="table-cell">
                                                <span class="side-title">AVAILABILITY</span>
                                                <?php if (have_rows('cost')) : ?>
                                                <?php while (have_rows('cost')) : the_row(); ?>
                                                <?php $product = wc_get_product(get_sub_field('type')); ?>
                                                <small><?php echo $product->get_title(); ?> </small>
                                                <br>
                                                <span class=""><?php the_sub_field('available'); ?>
                                                    spot<?php if (get_field('available') > 1) : ?>s<?php endif; ?>
                                                    left</span>
                                                <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="table">
                                            <div class="table-cell">
                                                <a class="btn black" href="<?php the_permalink(); ?>">More Info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <div class="modal fade" id="booking-modal<?php the_ID(); ?>" tabindex="-1" role="dialog"
                    aria-labelledby="booking-modal<?php the_ID(); ?>Label">
                    <div class="modal-dialog bcf7 container" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="booking-modal<?php the_ID(); ?>Label"><?php the_title(); ?>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="booking-cf7">
                                    <div role="form" class="wpcf" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                        <form action="<?php echo home_url("book-now"); ?>" method="POST"
                                            class="wpcf7-form" novalidate="novalidate">
                                            <div class="col-md-12">
                                                <p>How many tickets would you like for this trip?</p>
                                            </div>
                                            <?php if (have_rows('cost')) : ?>
                                            <ol class="col-md-12">
                                                <?php while (have_rows('cost')) : the_row(); ?>
                                                <?php $product = wc_get_product(get_sub_field('type')); ?>
                                                <li class="gg-cf7-wrap">
                                                    <div class="gg-cf7">
                                                        <span class="wpcf7-form-control-wrap number-adults">
                                                            <input type="number"
                                                                name="items[<?php echo $product->get_id(); ?>]" value=""
                                                                class="wpcf7-form-control wpcf7-number wpcf7-validates-as-required wpcf7-validates-as-number"
                                                                min="1" max="<?php the_sub_field('available'); ?>"
                                                                aria-required="true" aria-invalid="false" />
                                                        </span>
                                                        <br />
                                                        <label class="input_label">
                                                            <br />
                                                            <span class="input_label-content">
                                                                <?php echo $product->get_title(); ?>
                                                            </span>
                                                            <br />
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php endwhile; ?>
                                            </ol>
                                            <?php endif; ?>
                                            <p class="submit-booking">
                                                <input type="submit" value="Proceed to checkout"
                                                    class="wpcf7-form-controls wpcf7-submits" />
                                            </p>
                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach;
                wp_reset_postdata(); ?>

            </ul>
        </div>
    </div>
</section>