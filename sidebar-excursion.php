<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */

?>
<div id="secondary" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 tour-details-sidebar">
    <a href="<?php if (get_field('poster')) the_field('poster'); ?>">
        <aside id="newsletter-sc" class="hidden-xs newsletter-sticky" style="background: url('<?php if (get_field('poster')) the_field('poster'); ?>'); background-size:cover; background-repeat:no-repeat;">
            <img src="<?php if (get_field('poster')) the_field('poster'); ?>" width="100%">
        </aside>
    </a>
    <div class="tour-side-details">
        <ul>
            <li class="side-title">TICKET PRICING</li>
            <?php if (have_rows('cost')) : ?>
                <ul>
                    <?php while (have_rows('cost')) : the_row(); ?>
                        <?php $product = wc_get_product(get_sub_field('type')); ?>
                        <li><small><?php echo $product->get_title(); ?> </small>
                            <br><span class="price-sidebars"><?php echo $product->get_price_html(); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <ul>
                <li class="side-title">FROM</li>
                <?php if (get_field('from')) : ?>
                    <li><?php the_field('from'); ?></li>
                <?php endif; ?>
                <li class="side-title">TO</li>
                <?php if (get_field('to')) : ?>
                    <li><?php the_field('to'); ?></li>
                <?php endif; ?>
            </ul>
            <ul>
                <li class="side-title">REMAINING SLOTS</li>
                <?php if (have_rows('cost')) : ?>
                    <ul>
                        <?php while (have_rows('cost')) : the_row(); ?>
                            <?php $product = wc_get_product(get_sub_field('type')); ?>
                            <li>
                                <?php $product = wc_get_product(get_sub_field('type')); ?>
                                <small><?php echo $product->get_title(); ?> </small>
                                <br>
                                <span class=""><?php the_sub_field('available'); ?> spot<?php if (get_field('available') > 1) : ?>s<?php endif; ?> left</span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </ul>
            <?php if (have_rows('includes')) : ?>
                <ul>
                    <li class="side-title">INCLUDED</li>
                    <?php while (have_rows('includes')) : the_row(); ?>
                        <li><i class="fa fa-check"></i> <?php the_sub_field('item'); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php if (get_field('from') && (strtotime(get_field('from')) > time())) : ?>
                <button type="button" data-toggle="modal" data-target="#booking-modal" datatitle="<?php the_title(); ?>" class="btn btn-book icon-book">Book Now</button>
            <?php endif; ?>

            <h4 class="link">More by <?php the_author_posts_link(); ?></h4>
    </div>
</div>