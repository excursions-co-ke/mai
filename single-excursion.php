<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="page" class="hfeed site front-page-iter yes-topbar standard-menu">
    <div class="gg-top-main-content">
        <div id="content" class="site-content container">
            <div class="row">
                <div class="post-img-full" data-type="background" data-speed="10"
                    style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center;">
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
                            <?php if (get_field('days') > 1) : ?>from<?php else : ?>on<?php endif; ?>
                            <span class="normal-price">
                                <?php if (get_field('from')) : ?>
                                <?php the_field('from'); ?>
                                <?php endif; ?>
                            </span>
                        </p>
                        <button type="button" data-toggle="modal" data-target="#booking-modal"
                            datatitle="<?php the_title(); ?>" class="btn btn-book icon-book">Book Now</button>

                    </div>
                </div>
                <div class="under-image">
                    <div id="primary" class="content-area col-md-8">
                        <main id="main" class="site-main">
                            <div id="<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <?php if (get_field('link')) : ?>
                                    <div class="link-post-container link-post-format">
                                        <span class="pf-link"><a href="<?php the_field('link'); ?>">External Link -
                                                <?php the_field('link'); ?></a></span>
                                        <a href="<?php the_field('link'); ?>"><i class="fa fa-link pull-right"></i></a>
                                    </div>
                                    <br>
                                    <br>
                                    <?php endif; ?>

                                    <?php the_content(); ?>

                                    <div id="accordion1" class="panel-group">
                                        <?php if (have_rows('itinerary')) : ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><a class="panel-title accordion-toggle"
                                                    data-toggle="collapse" href="#tour-plan1">Tour Plan<i
                                                        class="indicator glyphicon glyphicon-chevron-down pull-right"></i></a>
                                            </div>
                                            <div id="tour-plan1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <?php while (have_rows('itinerary')) : the_row(); ?>
                                                    <h4><strong><?php the_sub_field('day'); ?></strong></h4>
                                                    <?php if (have_rows('details')) : ?>
                                                    <ul class="list-sc list-1">
                                                        <?php
																			while (have_rows('details')) : the_row(); ?>
                                                        <li><?php the_sub_field('item'); ?></li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                    <?php endif; ?>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (get_field('map')) : ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><a class="panel-title accordion-toggle"
                                                    data-toggle="collapse" href="#map1">Map<i
                                                        class="indicator glyphicon glyphicon-chevron-down pull-right"></i></a>
                                            </div>
                                            <div id="map1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="video-container">
                                                        <?php the_field('map'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (get_field('video')) : ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><a class="panel-title accordion-toggle"
                                                    data-toggle="collapse" href="#video1">Video<i
                                                        class="indicator glyphicon glyphicon-chevron-down pull-right"></i></a>
                                            </div>
                                            <div id="video1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <?php the_field('video'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="gg-social">
                                            <span class="share-title">Share on:</span>
                                            <a class="btn gg-link gg-twitter"
                                                href="//twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=Iter"
                                                target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a class="btn gg-link gg-facebook"
                                                href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                                                target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a class="btn gg-link gg-whatsapp"
                                                href="https://wa.me/?text=<?php the_title(); ?> - <?php the_permalink(); ?>"
                                                target="_blank"><i class="fa fa-whatsapp"></i></a>
                                            <!-- <a class="btn gg-link gg-googleplus" href="//plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
													<a class="btn gg-link gg-linkedin" href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a> -->
                                            <a class="btn gg-link gg-pinterest"
                                                href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo get_the_post_thumbnail_url(); ?>&amp;description=<?php the_title(); ?>"
                                                target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                    </div>


                                    <div id="single-pagination">
                                        <?php
												$prev_post = get_adjacent_post(false, '', true);
												if (!empty($prev_post)) : ?>
                                        <div class="post-previous col-md-5 col-sm-5 col-xs-12 pull-left hvr-reveal">
                                            <div class="related-details">
                                                <h4><a href="<?php echo get_permalink($prev_post->ID); ?>"
                                                        rel="prev"><?php echo $prev_post->post_title; ?></a></h4>
                                                <a class="simple-link hvr-pop"
                                                    href="<?php echo get_permalink($prev_post->ID); ?>"><i
                                                        class="fa fa-arrow-left"></i> Previous</a>

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php
												$next_post = get_adjacent_post(false, '', false);
												if (!empty($next_post)) : ?>
                                        <div
                                            class="post-next col-md-5 col-md-offset-2 col-sm-offset-2 col-sm-5 col-xs-12 pull-right hvr-reveal ">
                                            <div class="related-details">
                                                <h4>
                                                    <a href="<?php echo get_permalink($next_post->ID); ?>" rel="next">
                                                        <?php echo $next_post->post_title; ?>
                                                    </a>
                                                </h4>
                                                <a class="simple-link hvr-pop"
                                                    href="<?php echo get_permalink($next_post->ID); ?>">Next <i
                                                        class="fa fa-arrow-right"></i></a>
                                                <h4>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>

                    <?php get_sidebar('excursion');
							?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="booking-modal" tabindex="-1" role="dialog" aria-labelledby="booking-modalLabel">
    <div class="modal-dialog bcf7 container" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="booking-modalLabel"><?php the_title(); ?></h4>
            </div>
            <div class="modal-body">
                <div class="booking-cf7">
                    <div role="form" class="wpcf" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response"></div>
                        <form action="<?php echo home_url("book-now"); ?>" method="POST" class="wpcf7-form"
                            novalidate="novalidate">
                            <div class="col-md-12">
                                <p>How many tickets would you like for this trip?</p>
                            </div>
                            <?php if (have_rows('cost')) : ?>
                            <?php $products = $quantities = []; ?>
                            <ol class="col-md-12">
                                <?php while (have_rows('cost')) : the_row(); ?>
                                <?php $product = wc_get_product(get_sub_field('type')); ?>
                                <li class="gg-cf7-wrap">
                                    <div class="gg-cf7">
                                        <span class="wpcf7-form-control-wrap number-adults">
                                            <input type="number" name="items[<?php echo $product->get_id(); ?>]"
                                                value=""
                                                class="wpcf7-form-control wpcf7-number wpcf7-validates-as-required wpcf7-validates-as-number"
                                                min="1" max="<?php the_sub_field('available'); ?>" aria-required="true"
                                                aria-invalid="false" /></span><br />
                                        <label class="input_label"><br />
                                            <span
                                                class="input_label-content"><?php echo $product->get_title(); ?></span><br />
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
<?php endwhile;
endif; ?> <?php get_footer(); ?>