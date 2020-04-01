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
<header class="post-img-full page-img-header" data-type="background" data-speed="10"
    style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center;">
    <div class="pattern-color"></div>
    <div class="container text-center">
        <div class="page-name-wrap">
            <div class="ggts-name">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <nav class="woocommerce-breadcrumb"><a
                        href="<?php echo home_url('/'); ?>">Home</a>&nbsp;/&nbsp;<?php the_title(); ?></nav>
            </div>
        </div>
    </div>
</header>

<div class="gg-top-main-content">
    <div id="content" class="site-content container">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="col-md-8 col-sm-12 col-xs-12 first-content">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                    <?php get_sidebar('contact'); ?>
                </main>
            </div>
        </div>
    </div>
</div>
<div id="contacts-map" class="last-map"></div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>