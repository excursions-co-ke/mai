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
                        <div class="post-img-full" data-type="background" data-speed="10" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center;">
                            <div class="ggts-name single-post">
                                <h2><?php the_title(); ?></h2>
                                <p class="info-tour-home">
                                    <span class="posted-on">
                                        <time class="entry-date published" datetime="2016-10-13T18:08:17+00:00"><?php the_date('M d, Y'); ?></time>
                                        <time class="updated" datetime="2016-12-10T11:22:17+00:00"><?php the_date('M d, Y'); ?></time>
                                    </span>
                                    <span class="byline"> by <span class="author vcard">
                                            <?php the_author_posts_link(); ?>
                                        </span></span> <span class="meta-comments">
                                        <a href="#respond"><?php echo get_comments_number(get_the_ID()); ?> Comments</a>
                                    </span>

                                    <span class="z-likes">
                                        <?php if (function_exists('zilla_likes')) zilla_likes(); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="under-image">
                            <div id="primary" class="content-area col-md-8">
                                <main id="main" class="site-main">

                                    <div id="<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <div class="entry-content">
                                            <?php the_post_thumbnail('full'); ?>
                                            <br><br>
                                            <?php the_content(); ?> </div>
                                        <footer class="entry-footer">
                                            <span class="cat-links">Posted in: <?php the_category(' ', '<span>'); ?></span>
                                            <span class="tags-links">Tagged: <?php the_tags(', ', '<span>'); ?></span>
                                            <div class="gg-social">
                                                <span class="share-title">Share on:</span>
                                                <a class="btn gg-link gg-twitter" href="//twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=Iter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a class="btn gg-link gg-facebook" href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a class="btn gg-link gg-whatsapp" href="https://wa.me/?text=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                <!-- <a class="btn gg-link gg-googleplus" href="//plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
												<a class="btn gg-link gg-linkedin" href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a> -->
                                                <a class="btn gg-link gg-pinterest" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo get_the_post_thumbnail_url(); ?>&amp;description=<?php the_title(); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                                            </div>
                                        </footer>
                                    </div>

                                    <div id="single-pagination">
                                        <?php
                                        $prev_post = get_adjacent_post(false, '', true);
                                        if (!empty($prev_post)) : ?>
                                            <div class="post-previous col-md-5 col-sm-5 col-xs-12 pull-left hvr-reveal" style="background: url('<?php echo get_the_post_thumbnail_url($prev_post->ID); ?>');  background-size: cover; background-position: center;">
                                                <div class="related-details">
                                                    <h4><a href="<?php echo get_permalink($prev_post->ID); ?>" rel="prev"><?php echo $prev_post->post_title; ?></a></h4>
                                                    <a class="simple-link hvr-pop" href="<?php echo get_permalink($prev_post->ID); ?>"><i class="fa fa-arrow-left"></i> Previous</a>

                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        $next_post = get_adjacent_post(false, '', false);
                                        if (!empty($next_post)) : ?>
                                            <div class="post-next col-md-5 col-md-offset-2 col-sm-offset-2 col-sm-5 col-xs-12 pull-right hvr-reveal " style="background: url('<?php echo get_the_post_thumbnail_url($next_post->ID); ?>');  background-size: cover; background-position: center;">
                                                <div class="related-details">
                                                    <h4>
                                                        <a href="<?php echo get_permalink($next_post->ID); ?>" rel="next">
                                                            <?php echo $next_post->post_title; ?>
                                                        </a>
                                                    </h4>
                                                    <a class="simple-link hvr-pop" href="<?php echo get_permalink($next_post->ID); ?>">Next <i class="fa fa-arrow-right"></i></a>
                                                    <h4>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php comments_template(); ?>

                                </main>
                            </div>

                            <?php get_sidebar();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>