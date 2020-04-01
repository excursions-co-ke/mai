<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */

?>
<div id="secondary" class="widget-area col-md-4 col-sm-12 col-xs-12" role="complementary">
    <?php if ( is_active_sidebar( 'shop-side-bar' ) ) : ?>
    <?php dynamic_sidebar( 'shop-side-bar' ); ?>
    <?php endif; ?>
</div>