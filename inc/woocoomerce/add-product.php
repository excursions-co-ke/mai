<?php
class PostAd
{
    private $author;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->author = get_current_user();
    }

    /**
     * new_product
     *
     * @param  mixed $data
     * @return void
     */
    public function new_product(array $data = [])
    {
        $post_id = wp_insert_post(array(
            'post_title' => $data['title'],
            'post_type' => 'product',
            'post_staus' => 'draft',
            'post_content' => $data['description'],
            'post_excerpt' => $data['excerpt']
        ));
    }

    /**
     * update_product
     *
     * @param  mixed $data
     * @param  mixed $product
     * @return void
     */
    public function update_product($data, $product = null)
    {
        $post_id = is_null($product) ? $this->new_product($data) : $product;

        // set product is simple/variable/grouped
        wp_set_object_terms($post_id, 'simple', 'product_type');
        update_post_meta($post_id, '_visibility', 'visible');
        update_post_meta($post_id, '_stock_status', 'instock');
        update_post_meta($post_id, 'total_sales', '0');
        update_post_meta($post_id, '_downloadable', 'no');
        update_post_meta($post_id, '_virtual', 'yes');
        update_post_meta($post_id, '_regular_price', '');
        update_post_meta($post_id, '_sale_price', '');
        update_post_meta($post_id, '_purchase_note', '');
        update_post_meta($post_id, '_featured', 'no');
        update_post_meta($post_id, '_weight', '11');
        update_post_meta($post_id, '_length', '11');
        update_post_meta($post_id, '_width', '11');
        update_post_meta($post_id, '_height', '11');
        update_post_meta($post_id, '_sku', 'SKU11');
        update_post_meta($post_id, '_product_attributes', array());
        update_post_meta($post_id, '_sale_price_dates_from', '');
        update_post_meta($post_id, '_sale_price_dates_to', '');
        update_post_meta($post_id, '_price', '11');
        update_post_meta($post_id, '_sold_individually', '');
        update_post_meta($post_id, '_manage_stock', 'yes');
        wc_update_product_stock($post_id, $product['qty'], 'set');
        update_post_meta($post_id, '_backorders', 'no');
        // update_post_meta( $post_id, '_stock', $single['qty'] );
    }

    /**
     * Attach images to product (feature/ gallery)
     */
    function attach_product_thumbnail($post_id, $url, $flag)
    {
        /*
        * If allow_url_fopen is enable in php.ini then use this
        */
        $image_url = $url;
        $url_array = explode('/', $url);
        $image_name = $url_array[count($url_array) - 1];
        $image_data = file_get_contents($image_url); // Get image data

        /*
        * If allow_url_fopen is not enable in php.ini then use this
        */

        // $image_url = $url;
        // $url_array = explode('/',$url);
        // $image_name = $url_array[count($url_array)-1];
        // $ch = curl_init();
        // curl_setopt ($ch, CURLOPT_URL, $image_url);
        // // Getting binary data
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        // $image_data = curl_exec($ch);
        // curl_close($ch);
        $upload_dir = wp_upload_dir(); // Set upload folder
        $unique_file_name = wp_unique_filename($upload_dir['path'], $image_name); //    Generate unique name
        $filename = basename($unique_file_name); // Create image file name
        // Check folder permission and define file location
        if (wp_mkdir_p($upload_dir['path'])) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        // Create the image file on the server
        file_put_contents($file, $image_data);
        // Check image file type
        $wp_filetype = wp_check_filetype($filename, null);
        // Set attachment data
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        // Create the attachment
        $attach_id = wp_insert_attachment($attachment, $file, $post_id);
        // Include image.php
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        // Define attachment metadata
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        // Assign metadata to attachment
        wp_update_attachment_metadata($attach_id, $attach_data);
        // asign to feature image
        if ($flag == 0) {
            // And finally assign featured image to post
            set_post_thumbnail($post_id, $attach_id);
        }
        // assign to the product gallery
        if ($flag == 1) {
            // Add gallery image to product
            $attach_id_array = get_post_meta($post_id, '_product_image_gallery', true);
            $attach_id_array .= ',' . $attach_id;
            update_post_meta($post_id, '_product_image_gallery', $attach_id_array);
        }
    }

    /**
     * post
     *
     * @param  mixed $single
     * @param  mixed $post_id
     * @return void
     */
    public function post($single, $post_id)
    {
        $this->attach_product_thumbnail($post_id, $single['coverImage'], 0);
        foreach ($single['screenshots'] as $screenshots) {
            //set gallery image
            $this->attach_product_thumbnail($post_id, $screenshots['url_original'], 1);
        }
    }

    /**
     * add_category
     *
     * @param  mixed $single
     * @return void
     */
    public function add_category($single)
    {
        foreach ($single['genres'] as $prod_cat) {
            if (!term_exists($prod_cat, 'product_cat')) {
                $term = wp_insert_term($prod_cat, 'product_cat');
                array_push($tag, $term['term_id']);
            } else {
                $term_s = get_term_by('name', $prod_cat, 'product_cat');
                array_push($tag, $term_s->term_id);
            }
        }
    }

    /**
     * uploadMedia
     *
     * @param  mixed $image_url
     * @return void
     */
    function uploadMedia($image_url)
    {
        require_once('wp-admin/includes/image.php');
        require_once('wp-admin/includes/file.php');
        require_once('wp-admin/includes/media.php');
        $media = media_sideload_image($image_url, 0);
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'post_status' => null,
            'post_parent' => 0,
            'orderby' => 'post_date',
            'order' => 'DESC'
        ));
        return $attachments[0]->ID;
    }

    /**
     * extra
     *
     * @param  mixed $variable
     * @return void
     */
    public function extra($variable = false)
    {
        $objProduct = $variable ? new WC_Product_Variable() : new WC_Product();

        $objProduct->set_name("Product Title");
        $objProduct->set_status("publish");  // can be publish,draft or any wordpress post status
        $objProduct->set_catalog_visibility('visible'); // add the product visibility status
        $objProduct->set_description("Product Description");
        $objProduct->set_sku("product-sku"); //can be blank in case you don't have sku, but You can't add duplicate sku's
        $objProduct->set_price(10.55); // set product price
        $objProduct->set_regular_price(10.55); // set product regular price
        $objProduct->set_manage_stock(true); // true or false
        $objProduct->set_stock_quantity(10);
        $objProduct->set_stock_status('instock'); // in stock or out of stock value
        $objProduct->set_backorders('no');
        $objProduct->set_reviews_allowed(true);
        $objProduct->set_sold_individually(false);
        $objProduct->set_category_ids(array(1, 2, 3)); // array of category ids, You can get category id from WooCommerce Product Category Section of Wordpress Admin

        // above function uploadMedia, I have written which takes an image url as an argument and upload image to wordpress and returns the media id, later we will use this id to assign the image to product.
        $productImagesIDs = array(); // define an array to store the media ids.
        $images = array("image1 url", "image2 url", "image3 url"); // images url array of product
        foreach ($images as $image) {
            $mediaID = $this->uploadMedia($image); // calling the uploadMedia function and passing image url to get the uploaded media id
            if ($mediaID) $productImagesIDs[] = $mediaID; // storing media ids in a array.
        }
        if ($productImagesIDs) {
            $objProduct->set_image_id($productImagesIDs[0]); // set the first image as primary image of the product

            //in case we have more than 1 image, then add them to product gallery. 
            if (count($productImagesIDs) > 1) {
                $objProduct->set_gallery_image_ids($productImagesIDs);
            }
        }


        $product_id = $objProduct->save(); // it will save the product and return the generated product id
        if ($variable) {
            $this->add_attributes($product_id);
            $this->add_variations($product_id);
        }
    }

    /**
     * add_variations
     *
     * @param  mixed $product_id
     * @return void
     */
    public function add_variations($product_id)
    {
        $variations = array(
            array("regular_price" => 10.11, "price" => 10.11, "sku" => "ABC1", "attributes" => array(array("name" => "Size", "option" => "L"), array("name" => "Color", "option" => "Red")), "manage_stock" => 1, "stock_quantity" => 10),
            array("regular_price" => 10.11, "price" => 10.11, "sku" => "ABC2", "attributes" => array(array("name" => "Size", "option" => "XL"), array("name" => "Color", "option" => "Red")), "manage_stock" => 1, "stock_quantity" => 10)

        );

        if ($variations) {
            try {
                foreach ($variations as $variation) {
                    $objVariation = new WC_Product_Variation();
                    $objVariation->set_price($variation["price"]);
                    $objVariation->set_regular_price($variation["regular_price"]);
                    $objVariation->set_parent_id($product_id);
                    if (isset($variation["sku"]) && $variation["sku"]) {
                        $objVariation->set_sku($variation["sku"]);
                    }
                    $objVariation->set_manage_stock($variation["manage_stock"]);
                    $objVariation->set_stock_quantity($variation["stock_quantity"]);
                    $objVariation->set_stock_status('instock'); // in stock or out of stock value
                    $var_attributes = array();
                    foreach ($variation["attributes"] as $vattribute) {
                        $taxonomy = "pa_" . wc_sanitize_taxonomy_name(stripslashes($vattribute["name"])); // name of variant attribute should be same as the name used for creating product attributes
                        $attr_val_slug =  wc_sanitize_taxonomy_name(stripslashes($vattribute["option"]));
                        $var_attributes[$taxonomy] = $attr_val_slug;
                    }
                    $objVariation->set_attributes($var_attributes);
                    $objVariation->save();
                }
            } catch (Exception $e) {
                // handle exception here
            }
        }
    }

    /**
     * add_attributes
     *
     * @param  mixed $product_id
     * @return void
     */
    public function add_attributes($product_id)
    {
        $attributes = array(
            array("name" => "Size", "options" => array("S", "L", "XL", "XXL"), "position" => 1, "visible" => 1, "variation" => 1),
            array("name" => "Color", "options" => array("Red", "Blue", "Black", "White"), "position" => 2, "visible" => 1, "variation" => 1)
        );
        if ($attributes) {
            $productAttributes = array();
            foreach ($attributes as $attribute) {
                $attr = wc_sanitize_taxonomy_name(stripslashes($attribute["name"])); // remove any unwanted chars and return the valid string for taxonomy name
                $attr = 'pa_' . $attr; // woocommerce prepend pa_ to each attribute name
                if ($attribute["options"]) {
                    foreach ($attribute["options"] as $option) {
                        wp_set_object_terms($product_id, $option, $attr, true); // save the possible option value for the attribute which will be used for variation later
                    }
                }
                $productAttributes[sanitize_title($attr)] = array(
                    'name' => sanitize_title($attr),
                    'value' => $attribute["options"],
                    'position' => $attribute["position"],
                    'is_visible' => $attribute["visible"],
                    'is_variation' => $attribute["variation"],
                    'is_taxonomy' => '1'
                );
            }
            update_post_meta($product_id, '_product_attributes', $productAttributes); // save the meta entry for product attributes
        }
    }
}
