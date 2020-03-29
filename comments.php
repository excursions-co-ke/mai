<?php

/**
 * @package Thrill Seeker WordPress Theme
 * @subpackage Header template
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 0.1
 * 
 */

if ( post_password_required() ) {
	return;
}
$with_icons = TRUE;


$comments_number = get_comments_number();
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>

		<h2 class="comments-title">
            <?php
                printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'twentythirteen' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>

		<div class="comments-list">
			<?php wp_list_comments(); ?>
		</div>

		<div class="comments-pagination">
			<?php previous_comments_link() ?>
			<?php next_comments_link() ?>
		</div>
	<?php } ?>
	<?php if ( comments_open() ) : ?>
		<?php if ( get_option( 'comment_registration' ) AND ! is_user_logged_in() ) { ?>
			<div class="comments-form-text"><?php printf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( get_permalink() ) ); ?></div>
		<?php } else {
			$commenter = wp_get_current_commenter();

			$fields = array(
				'comment' => array(
					'type' => 'textarea',
					'name' => 'comment',
					'placeholder' => __( 'Comment', 'noun' ),
					'required' => TRUE,
					'icon' => $with_icons ? 'far|edit' : '',
				),
				'author' => array(
					'type' => 'text',
					'name' => 'author',
					'placeholder' => __( 'Name' ),
					'required' => get_option( 'require_name_email' ),
					'value' => $commenter['comment_author'],
					'icon' => $with_icons ? 'far|user' : '',
				),
				'email' => array(
					'type' => 'email',
					'name' => 'email',
					'placeholder' => __( 'Email' ),
					'required' => get_option( 'require_name_email' ),
					'value' => $commenter['comment_author_email'],
					'icon' => $with_icons ? 'far|envelope' : '',
				),
			);

			// Add Cookie Consent field if it's enabled at Settings > Discussion
			if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
				$fields['cookies'] = array(
					'type' => 'agreement',
					'value' => __( 'Save my name and email in this browser for the next time I comment.' ),
					'name' => 'wp-comment-cookies-consent',
					'checked' => FALSE,
				);
			}

			$fields = apply_filters( 'us_comment_form_fields', $fields );

			$json_data = array(
				'no_content_msg' => __( 'Fill out this field', 'us' ),
				'no_name_msg' => __( 'Fill out this field', 'us' ),
				'no_email_msg' => __( 'Please enter a valid email address.' ),
			);

			$comment_form_args = array( 'fields' => array() );

			$comment_form_args['fields'] = apply_filters( 'comment_form_default_fields', $comment_form_args['fields'] );
			$comment_form_args['submit_button'] = '<button type="submit" class="w-btn us-btn-style_1"><span class="w-btn-label">' . __( 'Post Comment' ) . '</span></button>';

			comment_form( $comment_form_args );
		} ?>
	<?php endif; ?>
</div>
