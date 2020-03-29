<?php
/*
 * Tab
 */
add_filter('woocommerce_product_data_tabs', 'osen_product_settings_tabs');
function osen_product_settings_tabs($tabs)
{

    //unset( $tabs['inventory'] );

    $tabs['osen'] = array(
        'label'    => 'Osen',
        'target'   => 'osen_product_data',
        'class'    => array('show_if_virtual'),
        'priority' => 21,
    );

    return $tabs;
}

/*
 * Tab content
 */
add_action('woocommerce_product_data_panels', 'osen_product_panels');
function osen_product_panels()
{
    echo '<div id="osen_product_data" class="panel woocommerce_options_panel hidden">';

    woocommerce_wp_text_input(array(
        'id'                => 'osen_plugin_version',
        'value'             => get_post_meta(get_the_ID(), 'osen_plugin_version', true),
        'label'             => 'Plugin version',
        'description'       => 'Description when desc_tip param is not true'
    ));

    woocommerce_wp_textarea_input(array(
        'id'          => 'osen_changelog',
        'value'       => get_post_meta(get_the_ID(), 'osen_changelog', true),
        'label'       => 'Changelog',
        'desc_tip'    => true,
        'description' => 'Prove the plugin changelog here',
    ));

    woocommerce_wp_select(array(
        'id'          => 'osen_ext',
        'value'       => get_post_meta(get_the_ID(), 'osen_ext', true),
        'wrapper_class' => 'show_if_downloadable',
        'label'       => 'File extension',
        'options'     => array('' => 'Please select', 'zip' => 'Zip', 'gzip' => 'Gzip'),
    ));

    echo '</div>';
}

/**
 * Save
 */
// add_action('woocommerce_process_product_meta', function () {
// });

add_action('admin_head', 'osen_css_icon');
function osen_css_icon()
{
    echo '<style>
	#woocommerce-product-data ul.wc-tabs li.osen_options.osen_tab a:before{
		content: "\f487";
	}
	</style>';
}
