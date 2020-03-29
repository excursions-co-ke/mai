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
<?php if (have_posts()) : ?>
    <header class="post-img-full page-img-header" data-type="background" data-speed="10" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="pattern-color"></div>
        <div class="container text-center">
            <div class="page-name-wrap">
                <div class="ggts-name">
                    <h1 class="page-title"><?php the_archive_title(); ?></h1>
                    <nav class="woocommerce-breadcrumb"><a href="<?php echo home_url('/'); ?>">Home</a>&nbsp;/&nbsp;<?php the_archive_title(); ?></nav>
                </div>
            </div>
        </div>
    </header>
    <div class="gg-top-main-content">
        <div id="content" class="site-content container">
            <div class="row">
                <div id="primary" class="content-area col-md-12">
                    <main id="main" class="site-main">
                        <div class="blog-section">
                            <ul class="filters blog-filters tour-filter hidden-xs">
                                <li><a href="#" data-filter="*" class="current"><span data-hover="All">All</span></a><span class="sep">|</span></li>
                                <?php $terms = get_terms([
                                    'taxonomy' => 'category',
                                    'hide_empty' => false,
                                    'parent' => 0
                                ]); ?>
                                <?php if (is_array($terms)) : ?>
                                    <?php foreach ($terms as $term) : ?>
                                        <li><a href="#" data-filter=".<?php echo $term->slug; ?>"><span data-hover="<?php echo $term->name; ?>"><?php echo $term->name; ?></span></a><span class="sep">|</span></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="dropdown xs-filter visible-xs-block">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select Category <span class="caret"></span>
                                </button>
                                <ul class="filters dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#" data-filter="*" class="current">All</a></li>
                                    <?php if (is_array($terms)) : ?>
                                        <?php foreach ($terms as $term) : ?>
                                            <li><a href="#" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <ul class="blog-row sorter " style="position: relative; height: 1724.08px;">
                                <?php while (have_posts()) : the_post(); ?>
                                    <?php $term_obj_list = get_the_terms(get_the_ID(), 'destination');
                                    $terms_string = join(' ', (is_array($term_obj_list) ? wp_list_pluck($term_obj_list, 'slug') : [])); ?>
                                    <li class="col-md-12 col-xs-12 post-cont <?php echo $terms_string; ?>" style="position: absolute; left: 0px; top: 0px;">
                                        <?php if (get_field('featured') === true) : ?>
                                            <div class="sticky-ribbon">
                                                <a href="<?php the_permalink(); ?>">
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card blog-post hvr-underline-from-center">
                                            <div class="img-post">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('full', ['class' => 'activator']); ?>
                                                </a>
                                            </div>
                                            <div class="post-details">
                                                <a class="blog-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <div class="info-post">
                                                    <p><?php the_date('M d, Y'); ?></p>
                                                </div>
                                                <div class="post-excerpt">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                <div class="post-links">
                                                    <a class="simple-link hvr-pop" href="<?php the_permalink(); ?>">Read
                                                        more</a>
                                                    <span class="comments pull-right"><a href="<?php the_permalink(); ?>#respond"><?php echo get_comments_number(); ?>
                                                            <i class="fa fa-comment-o"></i></a></span>

                                                    <span class="z-likes">
                                                        <?php if (function_exists('zilla_likes')) zilla_likes(); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php get_footer(); ?>