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
    <aside id="newsletter-sc" class="hidden-xs newsletter-sticky"
        style="background: url('<?php echo get_template_directory_uri(); ?>/images/newsletter-back.jpg');">
        <h3 class="widget-title">Newsletter</h3>
        <div class="nwsletter-wrap">
            <div role="form" class="wpcf7" id="wpcf7-f117-o1" dir="ltr" lang="en-US">
                <div class="screen-reader-response"></div>
                <form action="/demo/iter/blog/return-home/#wpcf7-f117-o1" method="post" class="wpcf7-form"
                    novalidate="novalidate">
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="117">
                        <input type="hidden" name="_wpcf7_version" value="4.9.2">
                        <input type="hidden" name="_wpcf7_locale" value="en_US">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f117-o1">
                        <input type="hidden" name="_wpcf7_container_post" value="0">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        <br>
                        <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value=""
                                size="40"
                                class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                aria-required="true" aria-invalid="false" placeholder="E-mail*"></span>
                    </p>
                    <p>
                        <label class="input-btn">
                            <input type="submit" value="Subscribe" class="wpcf7-form-control wpcf7-submit"><span
                                class="ajax-loader"></span></label>
                    </p>
                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                </form>
            </div>
        </div>
    </aside>
    <?php if ( is_active_sidebar( 'blog-side-bar' ) ) : ?>
    <?php dynamic_sidebar( 'blog-side-bar' ); ?>
    <?php endif; ?>
    <!-- <aside id="recent-posts-2" class="widget widget_recent_entries">
        <h3 class="widget-title">Recent Posts</h3>
        <ul>
            <li class="rp-widget">
                <a class="recent-thumb" href="https://giogadesign.com/demo/iter/blog/tours-gallery/">
                    <img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/fashion-person-woman-taking-photo-150x150.jpg" class="attachment-55x55 size-55x55 wp-post-image" alt="" srcset="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/fashion-person-woman-taking-photo-150x150.jpg 150w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/fashion-person-woman-taking-photo-180x180.jpg 180w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/fashion-person-woman-taking-photo-500x500.jpg 500w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/fashion-person-woman-taking-photo-600x600.jpg 600w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/fashion-person-woman-taking-photo-627x627.jpg 627w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/fashion-person-woman-taking-photo-670x670.jpg 670w" sizes="(max-width: 55px) 100vw, 55px" data-id="75" width="55" height="55"> </a>
                <div class="recent-info pull-right">
                    <p><a href="https://giogadesign.com/demo/iter/blog/tours-gallery/" title="Tours Gallery">Tours
                            Gallery</a></p>
                    <span class="post-date">Nov 24, 2016</span>
                </div>
            </li>
            <li class="rp-widget">
                <a class="recent-thumb" href="<?php the_permalink(); ?>/">
                    <img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/a97c4a1614b53d6f55ae2464b06ba6aa-150x150.jpg" class="attachment-55x55 size-55x55 wp-post-image" alt="" srcset="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/a97c4a1614b53d6f55ae2464b06ba6aa-150x150.jpg 150w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/a97c4a1614b53d6f55ae2464b06ba6aa-180x180.jpg 180w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/a97c4a1614b53d6f55ae2464b06ba6aa-500x500.jpg 500w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/a97c4a1614b53d6f55ae2464b06ba6aa-600x600.jpg 600w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/a97c4a1614b53d6f55ae2464b06ba6aa-627x627.jpg 627w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/a97c4a1614b53d6f55ae2464b06ba6aa-670x670.jpg 670w" sizes="(max-width: 55px) 100vw, 55px" data-id="56" width="55" height="55"> </a>
                <div class="recent-info pull-right">
                    <p><a href="<?php the_permalink(); ?>/" title="Return Home">Return Home</a></p>
                    <span class="post-date">Oct 13, 2016</span>
                </div>
            </li>
            <li class="rp-widget">
                <a class="recent-thumb" href="https://giogadesign.com/demo/iter/blog/be-ready/">
                    <img src="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/pexels-photo-54566-150x150.jpg" class="attachment-55x55 size-55x55 wp-post-image" alt="" srcset="https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/pexels-photo-54566-150x150.jpg 150w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/pexels-photo-54566-180x180.jpg 180w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/pexels-photo-54566-500x500.jpg 500w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/pexels-photo-54566-600x600.jpg 600w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/pexels-photo-54566-627x627.jpg 627w, https://giogadesign.com/demo/iter/wp-content/uploads/2016/11/pexels-photo-54566-670x670.jpg 670w" sizes="(max-width: 55px) 100vw, 55px" data-id="110" width="55" height="55"> </a>
                <div class="recent-info pull-right">
                    <p><a href="https://giogadesign.com/demo/iter/blog/be-ready/" title="Be Ready!">Be
                            Ready!</a></p>
                    <span class="post-date">Sep 13, 2016</span>
                </div>
            </li>
        </ul>
    </aside>
    <aside id="archives-2" class="widget widget_archive">
        <h3 class="widget-title">Archives</h3>
        <ul>
            <li><a href="https://giogadesign.com/demo/iter/blog/2016/11/">November 2016</a></li>
            <li><a href="https://giogadesign.com/demo/iter/blog/2016/10/">October 2016</a></li>
            <li><a href="https://giogadesign.com/demo/iter/blog/2016/09/">September 2016</a></li>
            <li><a href="https://giogadesign.com/demo/iter/blog/2016/08/">August 2016</a></li>
            <li><a href="https://giogadesign.com/demo/iter/blog/2016/07/">July 2016</a></li>
        </ul>
    </aside>
    <aside id="categories-2" class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            <li class="cat-item cat-item-7"><a href="https://giogadesign.com/demo/iter/blog/category/advice/">Advice</a>
            </li>
            <li class="cat-item cat-item-16"><a href="https://giogadesign.com/demo/iter/blog/category/music/">Music</a>
            </li>
            <li class="cat-item cat-item-10"><a href="https://giogadesign.com/demo/iter/blog/category/pictures/">Pictures</a>
            </li>
            <li class="cat-item cat-item-1"><a href="https://giogadesign.com/demo/iter/blog/category/uncategorized/">Uncategorized</a>
            </li>
        </ul>
    </aside> -->
</div>