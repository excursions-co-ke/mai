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
    <header class="post-img-full page-img-header" data-type="background" data-speed="10"
        style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center;">
        <div class="pattern-color"></div>
        <div class="container text-center">
            <div class="page-name-wrap">
                <div class="ggts-name">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <nav class="woocommerce-breadcrumb">
                        <a href="<?php echo home_url('shop'); ?>">
                            <?php _e('Tickets', 'woocommerce'); ?>
                        </a>
                        &nbsp;/&nbsp;<?php the_title(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="gg-top-main-content">
        <div id="content" class="site-content container">
            <div class="row">
                <div id="primary"
                    class="content-area <?php echo is_shop() ? 'woocommerce col-md-8 gg-left-sidebar' : 'col-md-12'; ?>">
                    <main id="main" class="site-main">
                        <div>
                            <div id="<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <!-- <h2><?php the_title(); ?></h2> -->
                                    <?php the_content(); ?>
                                </div>

                                <footer class="entry-footer"></footer>
                            </div>
                        </div>
                    </main>
                </div><?php if (is_shop()) : ?>
                <?php get_sidebar('shop'); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>