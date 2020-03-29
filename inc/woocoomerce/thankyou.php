<?php

add_filter('woocommerce_endpoint_order-received_title', 'os_thank_you_title');
function os_thank_you_title($old_title)
{
    return 'You\'re awesome!';
}

add_filter('woocommerce_thankyou_order_received_text', 'os_thank_you_subtitle', 20, 2);
function os_thank_you_subtitle($thank_you_title, $order)
{
    return 'Oh ' . $order->get_billing_first_name() . ', thank you so much for your order!';
}

add_action('woocommerce_thankyou', 'os_poll_form', 4);
function os_poll_form($order_id)
{

    echo '<h2>What do you think about Excursions Kenya?</h2>
<form id="thankyou_form">
    <label><input type="radio" name="like" value="superb"> Superb</label>
    <label><input type="radio" name="like" value="good enough"> Good enough</label>
    <label><input type="radio" name="like" value="could be better"> Could be better</label>
    <input type="hidden" name="action" value="collect_feedback" />
    <input type="hidden" name="order_id" value="' . $order_id . '" />
    ' . wp_nonce_field('thankyou' . $order_id, 'thankyou_nonce', true, false) . '
</form>';
}

add_action('wp_footer', 'os_send_thankyou_ajax');

function os_send_thankyou_ajax()
{
    // exit if we are not on the Thank You page
    if (!is_wc_endpoint_url('order-received')) return;

    echo "<script>
	jQuery( function( $ ) {
		$('input[type=radio][name=like]').change(function() {
			$.ajax({
				url: '" . admin_url('admin-ajax.php') . "',
				type: 'POST',
				data: $('#thankyou_form').serialize(),
				beforeSend : function( xhr ){
					$('#thankyou_form').html('Thank you! You feedback has been send!');
				},
				success : function( data ){
					console.log( data );
				}
			});
		});
	});
	</script>";
}

add_action('wp_ajax_collect_feedback', 'os_thankyou_ajax'); // wp_ajax_{ACTION}
add_action('wp_ajax_nopriv_collect_feedback', 'os_thankyou_ajax');

function os_thankyou_ajax()
{
    // security check
    check_ajax_referer('thankyou' . $_POST['order_id'], 'thankyou_nonce');

    if ($order = wc_get_order($_POST['order_id'])) {
        $note = $order->get_formatted_billing_full_name() . '  thinks that the shop is ' . $_POST['like'] . '.';
        $order->add_order_note($note, 0, true);
    }

    die();
}
