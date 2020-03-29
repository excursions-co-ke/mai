<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */

add_filter('woocommerce_prevent_admin_access', '__return_false');
add_filter('woocommerce_disable_admin_bar', '__return_false');

/**
 * Include all custom post types
 */
foreach (glob(plugin_dir_path(__FILE__) . 'cpt/*.php') as $filename) {
    require_once $filename;
}

/**
 * Include all files in inc folder
 */
foreach (glob(plugin_dir_path(__FILE__) . 'inc/*.php') as $filename) {
    require_once $filename;
}

/**
 * Include all theme customizations
 */
foreach (glob(plugin_dir_path(__FILE__) . 'customizer/*.php') as $filename) {
    require_once $filename;
}
/**
 * Load custom Admin dashboard
 */
require_once('acf/acf.php');
require_once('admin/theme.php');
