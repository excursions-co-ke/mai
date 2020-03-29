<?php
if (class_exists('Wc_Product')) {
    // Rename WooCommerce to Shop

    /**
     * rename_woocoomerce
     *
     * @return void
     */
    function rename_woocoomerce()
    {
        global $menu;

        // Pinpoint menu item
        $woo = rename_woocommerce('WooCommerce', $menu);

        // Validate
        if (!$woo)
            return;

        $menu[$woo][0] = 'Bookings';
    }
    add_action('admin_menu', 'rename_woocoomerce', 999);

    /**
     * rename_woocommerce
     *
     * @param  mixed $needle
     * @param  mixed $haystack
     * @return void
     */
    function rename_woocommerce($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            $current_key = $key;
            if (
                $needle === $value
                or (is_array($value)
                    && rename_woocommerce($needle, $value) !== false)
            ) {
                return $current_key;
            }
        }
        return false;
    }

    /**
     * custom_post_type_label_woo
     *
     * @param  mixed $args
     * @return void
     */
    function custom_post_type_label_woo($args)
    {
        $labels = array(
            'name' => _x('Tickets', 'Post Type General Name', 'iter'),
            'singular_name' => _x('Ticket', 'Post Type Singular Name', 'iter'),
            'menu_name' => __('Tickets', 'iter'),
            'name_admin_bar' => __('Ticket', 'iter'),
            'archives' => __('Ticket Archives', 'iter'),
            'attributes' => __('Ticket Attributes', 'iter'),
            'parent_item_colon' => __('Parent Ticket:', 'iter'),
            'all_items' => __('All Tickets', 'iter'),
            'add_new_item' => __('Add New Ticket', 'iter'),
            'add_new' => __('Add New', 'iter'),
            'new_item' => __('New Ticket', 'iter'),
            'edit_item' => __('Edit Ticket', 'iter'),
            'update_item' => __('Update Ticket', 'iter'),
            'view_item' => __('View Ticket', 'iter'),
            'view_items' => __('View Tickets', 'iter'),
            'search_items' => __('Search Ticket', 'iter'),
            'not_found' => __('Not found', 'iter'),
            'not_found_in_trash' => __('Not found in Trash', 'iter'),
            'featured_image' => __('Excursion Poster', 'iter'),
            'set_featured_image' => __('Set featured image', 'iter'),
            'remove_featured_image' => __('Remove featured image', 'iter'),
            'use_featured_image' => __('Use as featured image', 'iter'),
            'insert_into_item' => __('Insert into ticket', 'iter'),
            'uploaded_to_this_item' => __('Uploaded to this ticket', 'iter'),
            'items_list' => __('Tickets list', 'iter'),
            'items_list_navigation' => __('Tickets list navigation', 'iter'),
            'filter_items_list' => __('Filter tickets list', 'iter'),
        );

        $args['labels'] = $labels;
        $args['description'] = __('Add individual tickets for your excursions.', 'iter');
        return $args;
    }
    add_filter('woocommerce_register_post_type_product', 'custom_post_type_label_woo');

    /**
     * orders_label_woo
     *
     * @param  mixed $args
     * @return void
     */
    function orders_label_woo($args)
    {
        $labels = array(
            'name' => _x('Bookings', 'Post Type General Name', 'iter'),
            'singular_name' => _x('Booking', 'Post Type Singular Name', 'iter'),
            'menu_name' => __('Bookings', 'iter'),
            'name_admin_bar' => __('Booking', 'iter'),
            'archives' => __('Booking Archives', 'iter'),
            'attributes' => __('Booking Attributes', 'iter'),
            'parent_item_colon' => __('Parent Booking:', 'iter'),
            'all_items' => __('All Bookings', 'iter'),
            'add_new_item' => __('Add New Booking', 'iter'),
            'add_new' => __('Add New', 'iter'),
            'new_item' => __('New Booking', 'iter'),
            'edit_item' => __('Edit Booking', 'iter'),
            'update_item' => __('Update Booking', 'iter'),
            'view_item' => __('View Booking', 'iter'),
            'view_items' => __('View Bookings', 'iter'),
            'search_items' => __('Search Booking', 'iter'),
            'not_found' => __('Not found', 'iter'),
            'not_found_in_trash' => __('Not found in Trash', 'iter'),
            'featured_image' => __('Excursion Poster', 'iter'),
            'set_featured_image' => __('Set featured image', 'iter'),
            'remove_featured_image' => __('Remove featured image', 'iter'),
            'use_featured_image' => __('Use as featured image', 'iter'),
            'insert_into_item' => __('Insert into booking', 'iter'),
            'uploaded_to_this_item' => __('Uploaded to this booking', 'iter'),
            'items_list' => __('Bookings list', 'iter'),
            'items_list_navigation' => __('Bookings list navigation', 'iter'),
            'filter_items_list' => __('Filter bookings list', 'iter'),
        );

        $args['labels'] = $labels;
        $args['description'] = __('Add individual bookings for your excursions.', 'iter');
        return $args;
    }
    add_filter('woocommerce_register_post_type_shop_order', 'orders_label_woo');

    // Remove Tags and categories

    add_action('admin_menu', 'os_hide_product_tags_admin_menu', 9999);
    function os_hide_product_tags_admin_menu()
    {
        remove_submenu_page('edit.php?post_type=product', 'edit-tags.php?taxonomy=product_tag&amp;post_type=product');
    }

    add_action('admin_menu', 'os_hide_product_tags_metabox');
    function os_hide_product_tags_metabox()
    {
        remove_meta_box('tagsdiv-product_tag', 'product', 'side');
    }


    add_filter('manage_product_posts_columns', 'os_hide_product_tags_column', 999);
    function os_hide_product_tags_column($product_columns)
    {
        unset($product_columns['product_tag']);
        return $product_columns;
    }

    add_filter('quick_edit_show_taxonomy', 'os_hide_product_tags_quick_edit', 10, 2);
    function os_hide_product_tags_quick_edit($show, $taxonomy_name)
    {
        if ('product_tag' == $taxonomy_name)
            $show = false;

        return $show;
    }

    add_action('widgets_init', 'os_remove_product_tag_cloud_widget');
    function os_remove_product_tag_cloud_widget()
    {
        unregister_widget('WC_Widget_Product_Tag_Cloud');
    }

    add_filter('product_type_selector', 'os_remove_grouped_and_external');

    function os_remove_grouped_and_external($product_types)
    {
        unset($product_types['grouped']);
        unset($product_types['external']);
        unset($product_types['variable']);

        return $product_types;
    }

    /**
     * Step 1. Add a custom product type "term" to other hardcoded ones
     */
    add_filter('product_type_selector', 'os_add_complimentary_product_type');

    function os_add_complimentary_product_type($product_types)
    {
        $product_types['complimentary'] = 'Complimentary';
        return $product_types;
    }

    /**
     * Step 2. Each product type has a PHP class WC_Product_{type}
     */
    add_action('init', 'os_create_complimentary_product_class');
    add_filter('woocommerce_product_class', 'os_load_complimentary_product_class', 10, 2);

    function os_create_complimentary_product_class()
    {
        class WC_Product_Complimentary extends WC_Product
        {
            public function get_type()
            {
                return 'complimentary'; // so you can use $product = wc_get_product(); $product->get_type()
            }

            public function get_price($context = 'view')
            {

                return $this->get_prop('price', $context);
            }
        }
    }

    add_filter('product_type_options', function ($options) {

        // remove "Virtual" checkbox
        if (isset($options['virtual'])) {
            unset($options['virtual']);
        }

        // remove "Downloadable" checkbox
        if (isset($options['downloadable'])) {
            unset($options['downloadable']);
        }

        return $options;
    });

    add_filter('woocommerce_products_admin_list_table_filters', function ($filters) {

        if (isset($filters['product_type'])) {
            $filters['product_type'] = 'os_product_type_callback';
        }
        return $filters;
    });

    function os_product_type_callback()
    {
        $current_product_type = isset($_REQUEST['product_type']) ? wc_clean(wp_unslash($_REQUEST['product_type'])) : false;
        $output               = '<select name="product_type" id="dropdown_product_type"><option value="">Filter by product type</option>';

        foreach (wc_get_product_types() as $value => $label) {
            $output .= '<option value="' . esc_attr($value) . '" ';
            $output .= selected($value, $current_product_type, false);
            $output .= '>' . esc_html($label) . '</option>';
        }

        $output .= '</select>';
        echo $output;
    }

    function os_load_complimentary_product_class($php_classname, $product_type)
    {
        if ($product_type == 'complimentary') {
            $php_classname = 'WC_Product_Complimentary';
        }
        return $php_classname;
    }


    //Add product to cart when booking  

    add_action('template_redirect', 'os_add_to_cart_on_custom_page_and_redirect');
    function os_add_to_cart_on_custom_page_and_redirect()
    {
        if (is_page('book-now')) {
            $tickets = $_POST['items'];

            if (!empty($tickets)) {
                foreach ($tickets as $id => $quantity) {
                    global $woocommerce;
                    $woocommerce->cart->add_to_cart($id, (int) $quantity);
                }

                wp_safe_redirect(wc_get_checkout_url());
                exit();
            }
        }
    }

    /**
     * os_custom_billing_fields - remove some fields from billing form
     * @see https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
     *
     * @param  mixed $fields
     * @return void
     */
    function os_custom_billing_fields($fields = array())
    {

        unset($fields['billing_company']);
        unset($fields['billing_address_1']);
        unset($fields['billing_address_2']);
        unset($fields['billing_state']);
        unset($fields['billing_city']);
        unset($fields['billing_postcode']);
        unset($fields['billing_country']);

        return $fields;
    }
    add_filter('woocommerce_cart_needs_shipping_address', '__return_false');
    add_filter('woocommerce_ship_to_different_address_checked', '__return_false');
    add_filter('woocommerce_billing_fields', 'os_custom_billing_fields');

    // Checkout fields customizations
    add_filter('woocommerce_checkout_fields', 'customizing_checkout_fields', 10, 1);
    function customizing_checkout_fields($fields)
    {
        // Remove the Order Notes
        unset($fields['order']['order_comments']);

        // Define custom Order Notes field data array
        $customer_note  = array(
            'type' => 'textarea',
            'class' => array('form-row-wide', 'notes'),
            'label' => __('Extra Details', 'woocommerce'),
            'placeholder' => _x('Special instructions (such as allergies or special needs).', 'placeholder', 'woocommerce')
        );

        // Set custom Order Notes field
        $fields['billing']['billing_customer_note'] = $customer_note;

        // Define billing fields new order
        $ordered_keys = array(
            'billing_first_name',
            'billing_last_name',
            'billing_phone',
            'billing_email',
            'billing_customer_note', // <= HERE
        );

        // Set billing fields new order
        $count = 0;
        foreach ($ordered_keys as $key) {
            $count += 10;
            $fields['billing'][$key]['priority'] = $count;
        }

        return $fields;
    }

    // Set the custom field 'billing_customer_note' in the order object as a default order note (before it's saved)
    add_action('woocommerce_checkout_create_order', 'customizing_checkout_create_order', 10, 2);
    function customizing_checkout_create_order($order, $data)
    {
        $order->set_customer_note(isset($data['billing_customer_note']) ? $data['billing_customer_note'] : '');
    }

    // Hook in
    add_filter('woocommerce_checkout_fields', 'my_theme_custom_override_checkout_fields');

    // Our hooked in function - $fields is passed via the filter!
    function my_theme_custom_override_checkout_fields($fields)
    {
        foreach ($fields as $fieldset) {
            foreach ($fieldset as $field) {
                $field['class'] = array('form-control');
            }
        }

        return $fields;
    }
    add_action('template_redirect', 'woo_custom_redirect_after_purchase');
    function woo_custom_redirect_after_purchase()
    {
        global $wp;
        if (is_checkout() && !empty($wp->query_vars['order-received'])) {
            wp_redirect('thank-you');
            exit;
        }
    }
}
