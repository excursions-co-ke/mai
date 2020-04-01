<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class();
    ?>>
    <h1 class="hide"><?php bloginfo('name') ?></h1>
    <div id="loadIcon">
        <div id="load-center">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div><a class="skip-link screen-reader-text" href="#content">Skip to content</a><a href="#"
        title="Scroll Back to Top" class="scrollup"><i class="top-scroll fa fa-angle-double-up"></i></a>
    <div id="header-grp" class="<?php echo is_home() ? 'yes-topbar fixed-small-dv' : 'fixed-small-dv'; ?>">
        <header class="small-header hide-502">
            <div class="container">
                <ul class="social-links">
                    <li><a target="_blank" href="<?php os_theme_mod('os_twitter'); ?>"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a target="_blank" href="<?php os_theme_mod('os_facebook'); ?>"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="<?php os_theme_mod('os_instagram'); ?>"><i
                                class="fa fa-instagram"></i></a></li>
                    <li><a target="_blank" href="<?php os_theme_mod('os_youtube'); ?>"><i
                                class="fa fa-youtube-play"></i></a></li>
                </ul><span class="contact-info"><span class="pull-right"><i class="lnr lnr-phone-handset"></i><a
                            href="tel:<?php os_theme_mod('phone', '254705459494'); ?>"><?php os_theme_mod('phone', '254705459494');
    ?></a></span><span class="pull-right"><i class="lnr lnr-envelope"></i><a
                            href="mailto:<?php os_theme_mod('email', 'twende@excursions.co.ke'); ?>"><?php os_theme_mod('email', 'twende@excursions.co.ke');
    ?></a></span></span>
            </div>
        </header>
        <header id="masthead" class="site-header">
            <div class="header-nav <?php echo is_home() ? 'color-phones' : ''; ?>">
                <div class="gg-top-main-header container <?php echo is_home() ? 'white-menu-items' : ''; ?>"><a
                        class="gg-top-logo homelogo" href="<?php echo home_url('/'); ?>"
                        title="<?php bloginfo('name') ?>" rel="home"><?php $custom_logo_id=get_theme_mod('custom_logo');
    $image=wp_get_attachment_image_src($custom_logo_id, 'full');
    ?><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name') ?>"></a>
                    <nav class="gg-top-nav"><?php wp_nav_menu(array('menu'=> 'Header',
            'container'=> 'ul',
            'container_class'=> 'gg-top-primary-nav is-fixed',
            'container_id'=> '',
            'menu_class'=> 'gg-top-primary-nav is-fixed',
            'menu_id'=> 'top-menu',
            'echo'=> true,
            'fallback_cb'=> 'wp_page_menu',
            'before'=> '',
            'after'=> '',
            'link_before'=> '',
            'link_after'=> '',
            'items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'theme_location'=> 'header'
        ));
    ?><script type="text/javascript">
                        // jQuery(document).ready(function($) {
                        //     $(".menu-item").addClass("nav-item");
                        //     $(".menu-item a").addClass("nav-link");
                        //     $(".current-menu-item").addClass('active');
                        //     $(".current-menu-item a").addClass('active');
                        // });
                        </script>
                    </nav>
                    <ul class="gg-top-header-buttons">
                        <li><a class="gg-top-search-trigger" href="#gg-top-search"><span></span></a></li>
                        <li><a class="gg-top-nav-trigger" href="#gg-top-primary-nav"><span></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="gg-top-search topbar-yes"><?php get_search_form();
    ?></div>
        </header>
    </div>