<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */
get_header(); ?>
<div id="page" class="hfeed site front-page-iter yetopbar standard-menu">
    <header id="page-title-bread">
        <div class="container text-center">
            <h1 class="page-title"><?php echo wp_get_document_title(); ?></h1>
            <ul id="breadcrumbs">
                <li><a href="<?php echo home_url('/'); ?>" rel="v:url" property="v:title">Home</a></li>
                <li class="separator">&nbsp;/&nbsp;</li>
                <li><span class="bread-current">Error 404 </span></li>
            </ul><!-- .breadcrumbs -->
        </div>
    </header>
    <div class="gg-top-main-content">
        <div id="content" class="site-content container">
            <div class="row">
                <div id="primary" class="content-area <?php echo is_shop() ? 'woocommerce col-md-8 gg-left-sidebar' : 'col-md-12'; ?>">
                    <main id="main" class="site-main">
                        <div class="entry-content">
                            <div class="container">
                                <div class="row">
                                    <div class="c-middle">
                                        <div class="page-content col-md-8 col-sm-12">
                                            <p class="p-404">It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
                                            <div class="form-no-results">
                                                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                                                    <label>
                                                        <span class="screen-reader-text">Search for:</span>
                                                        <input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">
                                                    </label>
                                                    <input type="submit" class="search-submit" value="">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="page-content col-md-4 col-sm-12 text-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/animat-compass-color.gif" alt="Don’t get lost!">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>