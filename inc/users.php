<?php
function add_excursion_caps()
{
    // gets the operator role register_activation_hook
    $operator = get_role("tour_operator");

    if (!is_null($operator)) {
        $operator->add_cap("upload_files");
        $operator->add_cap("read_excursion");
        $operator->add_cap("read_private_excursions");
        $operator->add_cap("create_excursion");
        $operator->add_cap("edit_excursion");
        $operator->add_cap("edit_excursions");
        //$operator->add_cap("edit_published_excursions");
        $operator->add_cap("edit_private_excursions");
        $operator->add_cap("delete_excursion");
        $operator->add_cap("delete_excursions");
        $operator->add_cap("delete_published_excursions");
        $operator->add_cap("delete_private_excursions");
        $operator->add_cap("publish_excursions");
        $operator->add_cap("moderate_excursion_comments");

        // WooCommerce
        //$operator->add_cap("view_woocommerce_reports");

        // WooCommerce Products
        $operator->add_cap("edit_product");
        $operator->add_cap("read_product");
        $operator->add_cap("delete_product");
        $operator->add_cap("edit_products");
        $operator->add_cap("publish_products");
        $operator->add_cap("read_private_products");
        $operator->add_cap("delete_products");
        $operator->add_cap("delete_private_products");
        $operator->add_cap("delete_published_products");
        $operator->add_cap("edit_private_products");
        $operator->add_cap("edit_published_products");
        $operator->add_cap("manage_product_terms");
        $operator->add_cap("edit_product_terms");
        $operator->add_cap("delete_product_terms");
        $operator->add_cap("assign_product_terms");

        // WooCommerce Orders
        $operator->add_cap("edit_shop_order");
        $operator->add_cap("read_shop_order");
        $operator->add_cap("delete_shop_order");
        $operator->add_cap("edit_shop_orders");
        $operator->add_cap("publish_shop_orders");
        $operator->add_cap("read_private_shop_orders");
        $operator->add_cap("delete_shop_orders");
        $operator->add_cap("delete_private_shop_orders");
        $operator->add_cap("delete_published_shop_orders");
        $operator->add_cap("edit_private_shop_orders");
        $operator->add_cap("edit_published_shop_orders");
        $operator->add_cap("manage_shop_order_terms");
        $operator->add_cap("edit_shop_order_terms");
        $operator->add_cap("delete_shop_order_terms");
        $operator->add_cap("assign_shop_order_terms");

        $operator->add_cap("edit_shop_coupon");
        $operator->add_cap("read_shop_coupon");
        $operator->add_cap("delete_shop_coupon");
        $operator->add_cap("edit_shop_coupons");
        $operator->add_cap("publish_shop_coupons");
        $operator->add_cap("read_private_shop_coupons");
        $operator->add_cap("delete_shop_coupons");
        $operator->add_cap("delete_private_shop_coupons");
        $operator->add_cap("delete_published_shop_coupons");
        $operator->add_cap("delete_others_shop_coupons");
        $operator->add_cap("edit_private_shop_coupons");
        $operator->add_cap("edit_published_shop_coupons");
        $operator->add_cap("manage_shop_coupon_terms");
        $operator->add_cap("edit_shop_coupon_terms");
        $operator->add_cap("delete_shop_coupon_terms");
        $operator->add_cap("assign_shop_coupon_terms");

        $operator->add_cap("edit_gallery");
        $operator->add_cap("edit_galleries");
        $operator->add_cap("edit_other_galleries");
        $operator->add_cap("publish_galleries");
        $operator->add_cap("read_gallery");
        $operator->add_cap("read_private_galleries");
        $operator->add_cap("delete_gallery");
    }
}
//add_action("admin_init", "add_excursion_caps");

function add_customer_caps()
{
    // gets the operator role register_activation_hook
    $operator = get_role("traveller");

    if (!is_null($operator)) {
        $operator->add_cap("upload_files");
        $operator->add_cap("read");
        $operator->add_cap("read_private_posts");
        $operator->add_cap("edit_posts");
        $operator->add_cap("edit_published_posts");
        $operator->add_cap("edit_private_posts");
        $operator->remove_cap("edit_others_posts");
        $operator->remove_cap("publish_posts");
        $operator->remove_cap("delete_posts");
        $operator->remove_cap("delete_pages");
        $operator->remove_cap("delete_private_posts");
        $operator->remove_cap("delete_published_posts");
        $operator->remove_cap("delete_others_posts");
    }
}
//add_action("admin_init", "add_customer_caps");

//add_action("admin_init", 'adi');
function adi()
{
    add_role(
        "tour_operator",
        __("Tour Operator"),
        array(
            "level_9"                => true,
            "level_8"                => true,
            "level_7"                => true,
            "level_6"                => true,
            "level_5"                => true,
            "level_4"                => true,
            "level_3"                => true,
            "level_2"                => true,
            "level_1"                => true,
            "level_0"                => true,
            "read" => true,
            "read_private_pages" => true,
            "read_private_posts" => true,
            "edit_posts" => true,
            "edit_pages" => true,
            "edit_published_posts" => true,
            "edit_published_pages" => true,
            "edit_private_pages" => true,
            "edit_private_posts" => true,
            "edit_others_posts" => true,
            "edit_others_pages" => true,
            "publish_posts" => true,

            "publish_pages" => true,
            "delete_posts" => false,
            "delete_pages" => false,
            "delete_private_pages" => true,
            "delete_private_posts" => true,
            "delete_published_pages" => true,
            "delete_published_posts" => true,
            "delete_others_posts" => false,
            "delete_others_pages" => false,

            "manage_categories" => true,
            "manage_links" => true,
            "moderate_comments" => false,
            "upload_files" => true,
            "export" => true,
            "import" => true,
            "list_users" => false,
            "edit_theme_options" => false,

            "manage_woocommerce" => false,
            "view_woocommerce_reports" => false,

            "edit_product" => true,
            "read_product" => true,
            "delete_product" => true,
            "edit_products" => true,
            "edit_others_products" => false,
            "publish_products" => true,
            "read_private_products" => true,
            "delete_products" => true,
            "delete_private_products" => true,
            "delete_published_products" => true,
            "delete_others_products" => false,
            "edit_private_products" => true,
            "edit_published_products" => true,

            "manage_product_terms" => true,
            "edit_product_terms" => true,
            "delete_product_terms" => true,
            "assign_product_terms" => true,

            "edit_shop_order" => true,
            "read_shop_order" => true,
            "delete_shop_order" => true,
            "edit_shop_orders" => true,
            "edit_others_shop_orders" => true,
            "publish_shop_orders" => true,
            "read_private_shop_orders" => true,
            "delete_shop_orders" => true,
            "delete_private_shop_orders" => true,
            "delete_published_shop_orders" => true,
            "delete_others_shop_orders" => false,
            "edit_private_shop_orders" => true,
            "edit_published_shop_orders" => true,
            "manage_shop_order_terms" => true,
            "edit_shop_order_terms" => true,
            "delete_shop_order_terms" => true,
            "assign_shop_order_terms" => true,

            "edit_shop_coupon" => true,
            "read_shop_coupon" => true,
            "delete_shop_coupon" => true,
            "edit_shop_coupons" => true,
            "edit_others_shop_coupons" => true,
            "publish_shop_coupons" => true,
            "read_private_shop_coupons" => true,
            "delete_shop_coupons" => true,
            "delete_private_shop_coupons" => true,
            "delete_published_shop_coupons" => true,
            "delete_others_shop_coupons" => false,
            "edit_private_shop_coupons" => true,
            "edit_published_shop_coupons" => true,

            "manage_shop_coupon_terms" => true,
            "edit_shop_coupon_terms" => true,
            "delete_shop_coupon_terms" => true,
            "assign_shop_coupon_terms" => true,

            "create_excursion" => true,
            "edit_excursions" => true,
            "edit_others_excursions" => false,
            "publish_excursions" => true,
            "delete_excursions" => true,
            "delete_others_excursions" => false,

            "edit_themes" => false,
            "install_plugins" => false,
            "update_plugin" => false,
            "update_core" => false
        )
    );

    add_role(
        "traveller",
        __("Traveller"),
        array(
            "read" => true,
            "read_private_pages" => true,
            "read_private_posts" => true,
            "edit_posts" => true,
            "edit_pages" => true,
            "edit_published_posts" => true,
            "edit_published_pages" => true,
            "edit_private_pages" => true,
            "edit_private_posts" => true,
            "edit_others_posts" => true,
            "edit_others_pages" => true,
            "publish_posts" => true,

            "manage_categories" => true,
            "manage_links" => true,
            "moderate_comments" => false,
            "upload_files" => true,
            "export" => true,
            "import" => true,
            "list_users" => false,
            "edit_theme_options" => false,

            "edit_themes" => false,
            "install_plugins" => false,
            "update_plugin" => false,
            "update_core" => false
        )
    );
}

function debug_user_roles()
{
    global $pagenow;
    if ($pagenow == "index.php") {
        $MYrole = get_role("seo_specialist");
        echo "<pre>";
        print_r($MYrole->capabilities);
        echo "</pre>";

        $MY_other_role = get_role("shop_manager");
        echo "<pre>";
        print_r($MY_other_role->capabilities);
        echo "</pre>";
    }
}
//add_action("admin_notices", "debug_user_roles");

function wooc_extra_register_fields()
{ ?>
<p class="form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e('Phone', 'woocommerce'); ?></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone"
        value="<?php esc_attr_e($_POST['billing_phone']); ?>" />
</p>
<p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name"
        value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
</p>
<p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e('Last name', 'woocommerce'); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name"
        value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
</p>
<div class="clear"></div>
<?php
}
add_action('woocommerce_register_form_start', 'wooc_extra_register_fields');

/**
 * register fields Validating.
 */
function wooc_validate_extra_register_fields($username, $email, $validation_errors)
{
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $validation_errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
        $validation_errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
    }
    return $validation_errors;
}
add_action('woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);

/**
* Below code save extra fields.
*/
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
                 // Phone input filed which is used in WooCommerce
                 update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
          }
      if ( isset( $_POST['billing_first_name'] ) ) {
             //First name field which is by default
             update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
             // First name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
      }
      if ( isset( $_POST['billing_last_name'] ) ) {
             // Last name field which is by default
             update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
             // Last name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
      }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );