<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */

define('OS_SITE_VER', time());
/**
 * Essential theme supports
 * */
function theme_setup()
{
	/** automatic feed link*/
	add_theme_support('automatic-feed-links');

	/** tag-title **/
	add_theme_support('title-tag');

	/** post formats */
	$post_formats = array('aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status');
	add_theme_support('post-formats', $post_formats);

	/** post thumbnail **/
	add_theme_support('post-thumbnails');

	/** HTML5 support **/
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

	/** refresh widgest **/
	add_theme_support('customize-selective-refresh-widgets');

	/** custom background **/
	$bg_defaults = array(
		'default-image'          => '',
		'default-preset'         => 'default',
		'default-size'           => 'cover',
		'default-repeat'         => 'no-repeat',
		'default-attachment'     => 'scroll',
	);
	add_theme_support('custom-background', $bg_defaults);

	/** custom header **/
	$header_defaults = array(
		'default-image'          => '',
		'width'                  => 300,
		'height'                 => 60,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
	);
	add_theme_support('custom-header', $header_defaults);

	/** custom log **/
	add_theme_support('custom-logo', array(
		'height'      => 60,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array('site-title', 'site-description'),
	));
}
add_action('after_setup_theme', 'theme_setup');

/**
 * Load stylesheets and scripts
 */
function os_en_scripts()
{
	//wp_enqueue_style( 'calendar', get_template_directory_uri().'/assets/website/css/styles356f.css', array (), OS_SITE_VER );
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/assets/font-awesome.min1849.css', array(), OS_SITE_VER);
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/assets/bootstrap.min7433.css', array(), OS_SITE_VER);
	wp_enqueue_style('bootstrap-datetimepicker-css', get_template_directory_uri() . '/css/assets/bootstrap-datetimepicker.mine1b0.css', array(), OS_SITE_VER);
	wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/assets/animate.min9d52.css', array(), OS_SITE_VER);
	wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/css/assets/flexslider6fca.css', array(), OS_SITE_VER);
	wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/assets/owl.carousel3ba1.css', array(), OS_SITE_VER);
	wp_enqueue_style('prettyPhoto-css', get_template_directory_uri() . '/css/assets/prettyPhoto.min.css', array(), OS_SITE_VER);
	wp_enqueue_style('hover-css', get_template_directory_uri() . '/css/assets/hover.min4c56.css', array(), OS_SITE_VER);
	wp_enqueue_style('linear-icons-css', get_template_directory_uri() . '/css/assets/linear-icons.css', array(), OS_SITE_VER);
	wp_enqueue_style('iter-gioga-travel-icons-css', get_template_directory_uri() . '/css/travel-icons.min.css', array(), OS_SITE_VER);
	wp_enqueue_style('additional', get_template_directory_uri() . '/css/custom.css', array(), OS_SITE_VER);
	wp_enqueue_style('style', get_stylesheet_uri());

	//wp_enqueue_script( 'main', get_template_directory_uri() . '//assets/js/main.js', array (), OS_SITE_VER, true );

	wp_enqueue_script('jquery');

	wp_enqueue_script('navigations', get_template_directory_uri() . '/js/navigation.min.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/assets/bootstrap.min7433.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('moments', get_template_directory_uri() . '/js/assets/moment.min604a.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('datetime', get_template_directory_uri() . '/js/assets/bootstrap-datetimepickere1b0.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/assets/modernizr-custom.min653d.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('isotope', get_template_directory_uri() . '/js/assets/isotope.pkgd.min41fe.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('counterup', get_template_directory_uri() . '/js/assets/jquery.counterup.min5152.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/assets/jquery.flexslider-min6fca.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('pretty', get_template_directory_uri() . '/js/assets/jquery.prettyPhoto005e.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('cluster', get_template_directory_uri() . '/js/assets/markerclusterer.mine1fc.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('owl', get_template_directory_uri() . '/js/assets/owl.carousel.min9e1e.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('skip', get_template_directory_uri() . '/js/assets/skip-link-focus-fix.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('tab', get_template_directory_uri() . '/js/assets/tabcordion.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('ofi', get_template_directory_uri() . '/js/assets/ofi.browser.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('velocity', get_template_directory_uri() . '/js/assets/velocity.mine7f0.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/assets/jquery.waypoints.minf39e.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('wow', get_template_directory_uri() . '/js/assets/wow.mincfa9.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('stickyfill', get_template_directory_uri() . '/js/assets/stickyfill.min8daf.js', array(), OS_SITE_VER, true);
	wp_enqueue_script('iters', get_template_directory_uri() . '/js/iter.js', array(), OS_SITE_VER, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'os_en_scripts');

function os_load_custom_wp_admin_style()
{
	wp_register_style('os_custom_wp_admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, OS_SITE_VER);
	wp_enqueue_style('os_custom_wp_admin_css');
}
//add_action('admin_enqueue_scripts', 'os_load_custom_wp_admin_style');

/*
 * Image sizes
 */
function os_setup_thumbnails()
{
	add_image_size('iter_gioga_testimonials_thumb', 120, 120, true);
	add_image_size('project_image', 384, 384, true);
	add_image_size('methode_image', 932, 534, true);
}
add_action('after_setup_theme', 'os_setup_thumbnails');

/**
 * Remove type name in front of archive titles
 */

function os_sanitize_archive_title($title)
{
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} else {
		$title = 'Blog';
	}

	return $title;
}
add_filter('get_the_archive_title', 'os_sanitize_archive_title');

function os_subscribe_user_ajax()
{ ?>
<script id="ajax-registration" type="text/javascript">
jQuery(document).ready(function($) {
    $('#os_subscribe_user_form').submit(function(e) {
        e.preventDefault();

        var form = $(this);

        $.post(form.attr('action'), form.serialize(), function(data) {
            if (data.success) {
                $('.form-success-clean').val("");
                $('.form-success-invisible').addClass('invisible');
                $('.form-success-gone').addClass('gone');
                $('.form-success-visible').removeClass('invisible');
                $('.form-success-visible').removeClass('gone');
                $('.form-text-feedback').html(data.success);
                console.log('Request sent successfully');
            } else if (data.error) {
                $('.form-text-feedback').removeClass('gone');
                $('.form-text-feedback').removeClass('invisible');
                $('.form-text-feedback').html(data.error);
                console.log('Could not process AJAX request to server');
            } else {
                //Ajax connexion reject an error a success, now handle response
                $('.form-text-feedback').removeClass('gone');
                $('.form-text-feedback').removeClass('invisible');
                $('.form-text-feedback').html('Could not process AJAX request to server');
                console.log('Could not process AJAX request to server');
            }
        }, 'json');
    });
});
</script>
<?php
}
add_action('wp_footer', 'os_subscribe_user_ajax');

// add_action( 'wp_ajax_os_subscribe_newsletter', 'os_subscribe_newsletter' );
// add_action( 'wp_ajax_nopriv_os_subscribe_newsletter', 'os_subscribe_newsletter' );
// function os_subscribe_newsletter()
// {
// 	$response = array();

// 	if ( ! isset( $_POST['os_subscribe_newsletter_nonce'] ) || ! wp_verify_nonce( $_POST['os_subscribe_newsletter_nonce'], 'os_subscribe_newsletter') ) {
// 		$response['error'] = 'Form is not valid';
// 		wp_send_json( $response );
// 		exit();
// 	}

// 	$api_key = get_theme_mod( 'os_mc_key' );
// 	$mailing_list_id = get_theme_mod( 'os_mc_list_id' );
// 	$user_email = $_POST['user_email'];

// 	// Mailchimp API
// 	require_once( 'MailChimp.php' );

// 	try {
// 		$MailChimp = new \DrewM\MailChimp\MailChimp( $api_key );
// 	} catch (Exception $e) {
// 		$response['error'] = 'Invalid Mailchimp Configuration!';
// 		wp_send_json( $response );
// 		exit();
// 	}

// 	// check if person already in gift or webshop list
// 	$result_check = $MailChimp->get( "lists/$mailing_list_id/members/" . md5( strtolower( $user_email ) ) );
// 	if ( isset( $result_check ) && isset( $result_check['status'] ) && 'subscribed' == $result_check['status'] ) {
// 		$response['success'] = 'Already Subscribed!';
// 		wp_send_json( $response );
// 		exit();
// 	} else {
// 		$result = $MailChimp->post(
// 			"lists/$mailing_list_id/members", 
// 			array(
// 				'email_address' => $user_email,
// 				'status'        => 'subscribed',
// 			)
// 		);

// 		if ($MailChimp->success()) {
// 			$response['success'] = 'Subscription Successful!';
// 		} else {
// 			$response['error'] = $MailChimp->getLastError() ? $MailChimp->getLastError() : 'Subscription Failed!';
// 		}
// 		wp_send_json( $response );
// 		exit();
// 	}
// }

add_action('pre_get_posts', 'os_add_custom_type_to_query');

function os_add_custom_type_to_query($notused)
{
	if (!is_admin()) {
		global $wp_query;
		if (is_author() || is_home()) {
			$wp_query->set('post_type',  array('post', 'product'));
		}
	}
}

add_action('init', function () {
	/**
	 * Allow customers to access wp-admin
	 */
});