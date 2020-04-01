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
<div id="page" class="hfeed site">
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
                                    <?php
                                            $redirect = (isset($_GET['redirect_to']) && substr($_GET['redirect_to'], 0, strlen(get_admin_url())) === get_admin_url()) ? $_GET['redirect_to'] : get_admin_url();
                                            wp_login_form(
                                                array(
                                                    'echo'           => true,
                                                    'remember'       => false,
                                                    'redirect'       => $redirect,
                                                    'form_id'        => 'loginform',
                                                    'id_username'    => 'user_login',
                                                    'id_password'    => 'user_pass',
                                                    'id_remember'    => 'rememberme',
                                                    'id_submit'      => 'wp-submit',
                                                    'label_username' => __(''),
                                                    'label_password' => __(''),
                                                    'label_remember' => __('Remember Me'),
                                                    'label_log_in'   => __('Login Now'),
                                                    'value_username' => '',
                                                    'value_remember' => false
                                                )
                                            );
                                            ?> <div class="col-md-offset-2 col-md-6"><a
                                            href="<?php echo wp_lostpassword_url(get_permalink()); ?>"
                                            class="color-white"><u>Forgot password?</u></a>
                                    </div>

                                    <script type="text/javascript">
                                    jQuery(document).ready(function($) {
                                        $('form').addClass("col-md-offset-2 col-md-6");
                                        $('#wp-submit').removeAttr('class').addClass("btn btn-block pt-3");
                                        $('input').unwrap().wrap('<div class="form-group">');
                                        $('input[type!=submit]').addClass('wpcf7-form-control wpcf7-text');
                                        $('#user_login').attr('placeholder', 'Email Address');
                                        $('#user_pass').attr('placeholder', 'Password');
                                        $('#rememberme').prop('checked', 'true');
                                    });
                                    </script>
                                    <?php if (isset($_GET['login'])) : ?>
                                    <?php if ($_GET['login'] == 'failed') : ?>
                                    <div class="c-error">
                                        <p>Login failed. Please check your credentials and try again. </p><br>
                                        <!-- <p><a class="align-left" href="<?php echo wp_lostpassword_url(get_permalink()); ?>"> Forgot password?</a> <a href="<?php echo esc_url(home_url('register')); ?>">Register Now</a></p> -->
                                    </div>
                                    <?php elseif ($_GET['login'] == 'empty') : ?>
                                    <div class="c-error">
                                        <p>Please enter your credentials to log in. </p>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (isset($_GET['logout'])) : ?>
                                    <div class="c-error">
                                        <p>You are now logged out! Log in or <a
                                                href="<?php echo esc_url(home_url('/')); ?>">go to the homepage</a>.</p>
                                    </div>
                                    <?php endif; ?>
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