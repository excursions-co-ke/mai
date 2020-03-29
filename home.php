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
<div id="page" class="hfeed site front-page-iter yes-topbar standard-menu">
    <div class="gg-top-main-content">
        <nav id="gg-vertical-nav">
            <ul>
                <li><a><span class="gg-dot"></span><span class="gg-label">Intro</span></a></li>
                <li><a><span class="gg-dot"></span><span class="gg-label">Services</span></a></li>
                <li><a><span class="gg-dot"></span><span class="gg-label">Travel Tips</span></a></li>
                <li><a><span class="gg-dot"></span><span class="gg-label">Testimonials</span></a></li>
            </ul>
        </nav>
        <?php get_template_part('partials/home/slides') ?>
        <?php //get_template_part('partials/home/services'); 
        ?>
        <?php get_template_part('partials/home/trips') ?>
        <?php get_template_part('partials/home/posts') ?>
        <?php get_template_part('partials/home/testimony'); ?>
    </div>
</div>
<?php get_footer(); ?>