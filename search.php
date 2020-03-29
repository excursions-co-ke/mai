<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */
get_header(); ?>
<header id="page-title-bread">
    <div class="container text-center">
        <h1 class="page-title"><?php wp_title(''); ?></h1>
    </div>
</header>
<div class="gg-top-main-content">
    <div id="content" class="site-content container">
        <div class="row">
            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main">
                    <?php if (have_posts()) : ?>
                        <?php get_template_part('partials/search/results'); ?>
                    <?php else : ?>
                        <?php get_template_part('partials/search/empty'); ?>
                    <?php endif; ?>
                </main>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>