<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */
if (is_user_logged_in()) {
    wp_redirect(admin_url('/'));
    exit();
} ?>
<?php get_header('empty'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<header id="page" class="hfeed site front-page-iter yetopbar standard-menu">
    <header class="post-img-full page-img-header" data-type="background" data-speed="10"
        style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center;">
        <div class="pattern-color"></div>
        <div class="container text-center">
            <div class="page-name-wrap">
                <div class="ggtname">
                    <br>
                    <br>
                    <h1 class="page-title p-2"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </header>
    <div class="gg-top-main-content">
        <div id="content" class="site-content container">
            <div class="row">
                <div id="primary"
                    class="content-area <?php echo is_shop() ? 'woocommerce col-md-8 gg-left-sidebar' : 'col-md-12'; ?>">
                    <main id="main" class="site-main">
                        <div class="entry-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-6">
                                        <center>
                                            <?php the_custom_logo(); ?>
                                        </center>
                                    </div>
                                    <form class="col-md-offset-2 col-md-6" id="os_register_user_form"
                                        name="os_register_user_form"
                                        action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="POST">
                                        <div class="wpcf7-form-control form-group-wrap">
                                            <input class="wpcf7-form-control form-group" name="first_name" required
                                                placeholder="First Name" type="text">
                                        </div>
                                        <div class="wpcf7-form-control form-group-wrap">
                                            <input class="wpcf7-form-control form-group" name="last_name"
                                                placeholder="Last Name" type="text">
                                        </div>
                                        <div class="wpcf7-form-control form-group-wrap">
                                            <input class="wpcf7-form-control form-group" name="user_email" required
                                                placeholder="Email Address" type="text">
                                        </div>
                                        <div class="wpcf7-form-control form-group-wrap">
                                            <input class="wpcf7-form-control form-group" name="user_pass" required
                                                placeholder="Your Password" type="password">
                                        </div>
                                        <div class="wpcf7-form-control form-group-wrap">
                                            <input class="wpcf7-form-control form-group" name="user_pass_r" required
                                                placeholder="Repeat Password" type="password">
                                        </div>
                                        <div class="wpcf7-form-control form-group-wrap">
                                            <input type="hidden" name="user_role" value="traveller" />
                                            <input type="hidden" name="os_register_user" />
                                            <input type="hidden" name="action" value="process_os_form">
                                            <?php wp_nonce_field('process_os_form', 'os_register_user_nonce'); ?>
                                        </div>
                                        <div class="wpcf7-form-control form-group-wrap">
                                            <div class="register-checkboxes">
                                                <p><input type="checkbox" name="newsletter" value="yes"> <label
                                                        for="os_age">Send me trip notifications</label></p>
                                            </div>
                                        </div>
                                        <div class=" form-group-wrap">
                                            <input class="btn btn-warning btn-block" value="Create your account"
                                                type="submit">
                                            <?php //do_action('register_form'); 
                                                    ?>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
    <?php endwhile;
endif; ?>
    <?php get_footer('empty'); ?>