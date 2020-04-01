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
            <div id="primary" class="content-area col-md-8">
                <main id="main" class="site-main">
                    <div>

                        <div id="<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <h2 style="top: 21px;">Link to File</h2>
                                <div id='gallery-2' class='gallery galleryid-271 gallery-columns-3 gallery-size-full'>
                                    <figure class='gallery-item'>
                                        <div class='gallery-icon landscape'>
                                            <a href='../wp-content/uploads/2016/11/img-default.jpg'><img width="1920"
                                                    height="1280" src="../wp-content/uploads/2016/11/img-default.jpg"
                                                    class="attachment-full size-full" alt=""
                                                    srcset="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/img-default.jpg 1920w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/img-default-300x200.jpg 300w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/img-default-768x512.jpg 768w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/img-default-1024x683.jpg 1024w"
                                                    sizes="(max-width: 1920px) 100vw, 1920px" data-id="157" /></a>
                                        </div>
                                    </figure>
                                    <figure class='gallery-item'>
                                        <div class='gallery-icon landscape'>
                                            <a href='../wp-content/uploads/2016/11/prague-1506918_1920.jpg'><img
                                                    width="1920" height="1280"
                                                    src="../wp-content/uploads/2016/11/prague-1506918_1920.jpg"
                                                    class="attachment-full size-full" alt=""
                                                    srcset="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/prague-1506918_1920.jpg 1920w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/prague-1506918_1920-300x200.jpg 300w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/prague-1506918_1920-768x512.jpg 768w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/prague-1506918_1920-1024x683.jpg 1024w"
                                                    sizes="(max-width: 1920px) 100vw, 1920px" data-id="114" /></a>
                                        </div>
                                    </figure>
                                    <figure class='gallery-item'>
                                        <div class='gallery-icon landscape'>
                                            <a href='../wp-content/uploads/2016/11/new-york-city-1150012_1920.jpg'><img
                                                    width="1920" height="1279"
                                                    src="../wp-content/uploads/2016/11/new-york-city-1150012_1920.jpg"
                                                    class="attachment-full size-full" alt=""
                                                    srcset="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/new-york-city-1150012_1920.jpg 1920w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/new-york-city-1150012_1920-300x200.jpg 300w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/new-york-city-1150012_1920-768x512.jpg 768w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/new-york-city-1150012_1920-1024x682.jpg 1024w"
                                                    sizes="(max-width: 1920px) 100vw, 1920px" data-id="102" /></a>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <footer class="entry-footer">
                            </footer>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>
    <?php endwhile;
endif; ?>
    <?php get_footer(); ?>