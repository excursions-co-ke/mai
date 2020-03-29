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
        <div class="gg-top-main-content">
            <div id="content" class="site-content container">
                <div class="row">
                    <div id="primary" class="content-area col-md-12">
                        <main id="main" class="site-main">
                            <div>
                                <div id="post-195" class="post-195 page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <h2><?php the_title(); ?></h2>
                                        <?php the_content(); ?>

                                        <section class="sc-section section-fullwidth" style="color:#fff; background-color:#00BCD4;">
                                            <div class="section-sc-wrap container">
                                                <h1 style="text-align: center;">Some of our Partners</h1>
                                                <p style="text-align: center;">Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim.</p>
                                                <p style="text-align: center;"></p>
                                                <div class="owl-partners owl-carousel owl-theme" style="opacity: 1; display: block;">
                                                    <div class="owl-wrapper-outer">
                                                        <div class="owl-wrapper" style="width: 5136px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-642px, 0px, 0px);">
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l4w.png" alt=""></div>
                                                            </div>
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l7w.png" alt=""></div>
                                                            </div>
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l6w.png" alt=""></div>
                                                            </div>
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l3w.png" alt=""></div>
                                                            </div>
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l8w.png" alt=""></div>
                                                            </div>
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l1w.png" alt=""></div>
                                                            </div>
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l2w.png" alt=""></div>
                                                            </div>
                                                            <div class="owl-item" style="width: 321px;">
                                                                <div class="item"><img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/l9w.png" alt=""></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="owl-controls clickable">
                                                        <div class="owl-pagination">
                                                            <div class="owl-page active"><span class=""></span></div>
                                                            <div class="owl-page"><span class=""></span></div>
                                                            <div class="owl-page"><span class=""></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    <footer class="entry-footer">
                                    </footer>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>