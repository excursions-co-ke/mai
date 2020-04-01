<?php

function os_blog_sidebar()
{
    register_sidebar(
        array(
            'name' => __('Blog', 'iter'),
            'id' => 'blog-side-bar',
            'description' => __('Blog Sidebar', 'iter'),
            'before_widget' => '<aside class="widget">',
            'after_widget' => "</aside>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action('widgets_init', 'os_blog_sidebar');

function os_shop_sidebar()
{
    register_sidebar(
        array(
            'name' => __('Shop', 'iter'),
            'id' => 'shop-side-bar',
            'description' => __('Shop Sidebar', 'iter'),
            'before_widget' => '<aside class="widget woocommerce">',
            'after_widget' => "</aside>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action('widgets_init', 'os_shop_sidebar');