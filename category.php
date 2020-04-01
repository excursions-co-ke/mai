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
<header class="post-img-full page-img-header taxonomy" data-type="background" data-speed="10"
    style="background: url('<?php if (get_field('image', get_queried_object())) { the_field('image', get_queried_object()); } ?>'); background-size: cover; background-position: center;">
    <div class="pattern-color"></div>
    <div class="container text-center">
        <div class="page-name-wrap">
            <div class="ggts-name">
                <h1 class="page-title"><?php single_term_title(); ?></h1>
                <!--     -->
                <?php echo term_description(); ?>
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
                        <!-- <ul class="filters blog-filters hidden-xs">
                                <li><a href="#" data-filter="*" class="current"><span data-hover="All">All</span></a><span class="sep">|</span></li>
                                <?php
                                $term_id = get_queried_object_id();
                                $taxonomy_name = 'category';
                                $string = '';
                                $term_children = get_term_children($term_id, $taxonomy_name); ?>

                                <?php if(is_array($term_children)): ?>
                                <?php foreach ($term_children as $child) :
                                    $term = get_term_by('id', $child, $taxonomy_name); ?>
                                    <li><a href="#" data-filter=".<?php echo $term->slug; ?>" class="current"><span data-hover="<?php echo $term->name; ?>"><?php echo $term->name; ?></span></a><span class="sep">|</span></li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="dropdown xs-filter masonryfilter visible-xs-block">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select A City/Town<span class="caret"></span>
                                </button>
                                <ul class="filters dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a href="#" data-filter="*" class="current">All</a></li>
                                <?php if(is_array($term_children)): ?>
                                    <?php foreach ($term_children as $child) :
                                        $term = get_term_by('id', $child, $taxonomy_name); ?>
                                        <li><a href="#" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div> -->
                        <ul class="blog-row sorter " style="position: relative; height: 1724.08px;">
                            <?php while (have_posts()) : the_post(); ?>
                            <?php $term_obj_list = get_the_terms(get_the_ID(), 'destination');
                                    $terms_string = join(' ', (is_array($term_obj_list) ? wp_list_pluck($term_obj_list, 'slug') : [])); ?>
                            <li class="col-md-6 col-xs-12 post-cont <?php echo $terms_string; ?>"
                                style="position: absolute; left: 0px; top: 0px;">
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
                                        <a class="blog-post-title"
                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <div class="info-post">
                                            <p class="">
                                                Shared on <?php the_date(); ?>
                                            </p>
                                        </div>
                                        <div class="post-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="post-links">
                                            <a class="simple-link hvr-pop" href="<?php the_permalink(); ?>">Read
                                                more</a>
                                            <span class="comments pull-right"><a
                                                    href="<?php the_permalink(); ?>#respond"><?php echo get_comments_number(); ?>
                                                    <i class="fa fa-comment-o"></i></a></span>

                                            <span class="z-likes">
                                                <?php if (function_exists('zilla_likes')){ zilla_likes(); } ?>
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