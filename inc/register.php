<?php

/**
 * @package Mise En Place
 * @subpackage Custom Registration Functionality
 * @author Media Gladiators < mauko@mediagladiators.nl >
 * @since 0.1.0
 */

function register_user_ajax()
{ ?>
    <script id="ajax-registration" type="text/javascript">
        jQuery(document).ready(function($) {
            $('#os_register_user_form').submit(function(e) {
                e.preventDefault();

                var form = $(this);

                $.post(form.attr('action'), form.serialize(), function(data) {
                    if (data['error']) {
                        $('.c-success').hide();
                        if ($('.c-error').length) {
                            $('.c-error').html('<p>' + data['error'] + '</p>')
                        } else {
                            $('#os_register_user_form').after('<div class="c-error col-md-offset-2 col-md-6"><p>' + data['error'] + '</p></div>');
                        }
                    } else if (data['success']) {
                        $('.c-error').hide();
                        if ($('.c-success').length) {
                            $('.c-success').html('<p>' + data['success'] + '</p>')
                        } else {
                            form.hide();
                            $('#highlights').after('<div class="c-success col-md-offset-2 col-md-6"><p>' + data['success'] + ' Click here to <a href="<?php echo esc_url(home_url('login')); ?>">Log In</a> if you are not automatically redirected.</p></div>');
                            window.location.href = "<?php echo admin_url('/'); ?>";
                        }
                    } else {
                        window.location.href = "<?php echo admin_url('/'); ?>";
                    }
                }, 'json');
            });
        });
    </script><?php
            }
            add_action('wp_footer', 'register_user_ajax');

            /**
             * Register a new user and send email notification
             */
            add_action('wp_ajax_nopriv_process_os_form', 'process_os_form');
            function process_os_form()
            {
                $response = array();

                if (!isset($_POST['os_register_user_nonce']) || !wp_verify_nonce($_POST['os_register_user_nonce'], 'process_os_form')) {
                    $response['error'] = 'Form is not valid';
                    wp_send_json($response);
                    exit();
                }

                $first_name     = sanitize_text_field($_POST['first_name']);
                $last_name         = sanitize_text_field($_POST['last_name']);
                $user_email     = sanitize_email($_POST['user_email']);
                $user_pass         = $_POST['user_pass'];
                $user_pass_r     = $_POST['user_pass_r'];
                $user_login     = $user_email;

                $role     = $_POST['user_role'];

                // optins
                $optin_os_newsletter = 0;

                if (isset($_POST['newsletter']) && 'yes' == $_POST['os_newsletter']) {
                    $optin_os_newsletter = 1;
                }

                $user = array(
                    'user_login'    =>   $user_login,
                    'user_email'    =>   $user_email,
                    'first_name'    =>   $first_name,
                    'last_name'        =>   $last_name,
                    'user_pass'        =>   $user_pass,
                    'nickname' =>  explode('@', $user_email)[0]
                );

                if ($user_pass !== $user_pass_r) {
                    $response['error'] = 'Your passwords do not match. Please try again.';
                    wp_send_json($response);
                    exit();
                } else {
                    $user_id = wp_insert_user($user);

                    if (is_wp_error($user_id)) {
                        $response['error'] = $user_id->get_error_message();
                        wp_send_json($response);
                        exit();
                    } else {
                        $response['success'] = 'Account registration successful.';

                        wp_new_user_notification($user_id, null, 'user');

                        // save opt in info to user meta
                        add_user_meta($user_id, 'optin_newsletter', $optin_os_newsletter, true);

                        // save to mailchimp
                        $api_key = '9370f578b60286320ffc51cac9ca3db3-us19';
                        $mailing_list_id = '059176e6fe';

                        // Mailchimp API
                        //require('MailChimp.php');
                        //$MailChimp = new \DrewM\MailChimp\MailChimp($api_key);

                        // check if person already in gift or webshop list
                        // $result_check = $MailChimp->get("lists/$mailing_list_id/members/" . md5($user_email));
                        // if (isset($result_check) && isset($result_check['status']) && 'subscribed' == $result_check['status']) {
                        // wp_send_json( $response );
                        // exit();
                        //}

                        // put in gift shop list
                        // $result = $MailChimp->post("lists/$mailing_list_id/members", [
                        //     'email_address' => $user_email,
                        //     'merge_fields' => ['FNAME' => $first_name, 'NEWSLETTER' => $optin_os_newsletter, 'MARKETING' => $optin_os_marketing, 'SURVEYS' => $optin_os_surveys],
                        //     'status' => 'subscribed',
                        // ]);

                        wp_clear_auth_cookie();
                        wp_set_current_user($user_id);
                        wp_set_auth_cookie($user_id);
                        $user = get_user_by('id', $user_id);

                        // clear existing role if exist.
                        $user->set_role('');

                        // add the roles
                        $user->add_role($role);

                        wp_send_json($response);
                        exit();
                    }
                }
            }
