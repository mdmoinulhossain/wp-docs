### Remove Checkout Fileds
```
function quadlayers_remove_checkout_fields( $fields ) {

 unset($fields['billing']['billing_company']);
 unset($fields['billing']['billing_address_1']);
 unset($fields['billing']['billing_address_2']);
 unset($fields['billing']['billing_city']);
 unset($fields['billing']['billing_postcode']);
 unset($fields['billing']['billing_country']);
 unset($fields['billing']['billing_state']);

 return $fields; 
}
add_filter( 'woocommerce_checkout_fields' , 'quadlayers_remove_checkout_fields' );

add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );
```

### Details in 
* https://developer.woo.com/docs/customizing-checkout-fields-using-actions-and-filters/
* https://www.businessbloomer.com/woocommerce-checkout-quote-system/


### Change Process to checkout button text in cart page
```
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
add_action( 'woocommerce_proceed_to_checkout', 'custom_button_proceed_to_checkout', 20 );
function custom_button_proceed_to_checkout() {
    echo '<a href="'.esc_url(wc_get_checkout_url()).'" class="checkout-button button alt wc-forward">' .
    __("Order Now", "woocommerce") . '</a>';
}
```

### Change Place order button text in checkout page
```
function customize_checkout_button_text() {return __( 'Confirm Order', 'woocommerce' );}
add_filter( 'woocommerce_order_button_text', 'customize_checkout_button_text' );

```

### add extra button in woocemmerce product card
```
add_action('woocommerce_after_shop_loop_item', 'add_custom_button_after_stock', 15);

function add_custom_button_after_stock() {
    // Get the global product object
    global $product;

    // Check if the product is in stock
    if ($product->is_in_stock()) {
        // Get the product's single page URL
        $product_url = get_permalink($product->get_id());

        echo '<div class="custom-button-container">';
        echo '<a href="' . esc_url($product_url) . '" class="button custom-button">অর্ডার করুন</a>';
        echo '</div>';
    }
}
```

### Woocommerce add to cart for landing page to display checkout form.
```
// For multi product with multi page

function add_multiple_products_to_cart_on_checkout() {
    // Define an associative array of page slugs and their corresponding product IDs
    $pages_to_products = array(
        'landing-page-1' => array(123, 124), // Replace with your actual page slug and product IDs
        'landing-page-2' => array(125, 126), // Another example
        'landing-page-3' => array(127, 128, 129), // And another
        // Add more pages and products as needed
    );

    // Get the current page slug
    if (is_page()) {
        global $post;
        $current_page_slug = $post->post_name;

        // Check if the current page slug matches any in our array and the cart is empty
        if (array_key_exists($current_page_slug, $pages_to_products) && WC()->cart->is_empty()) {
            // Get the array of product IDs for the current page
            $product_ids = $pages_to_products[$current_page_slug];

            // Loop through each product ID and add it to the cart
            foreach ($product_ids as $product_id) {
                WC()->cart->add_to_cart($product_id);
            }
        }
    }
}
add_action('template_redirect', 'add_multiple_products_to_cart_on_checkout');


// For several product with associated page 

function add_product_to_cart_on_checkout() {
    // Define an associative array of page slugs and their corresponding product IDs
    $pages_to_products = array(
        'landing-page-1' => 123, // Replace with your actual page slug and product ID
        'landing-page-2' => 456, // Another example
        'landing-page-3' => 789, // And another
        // Add more pages and products as needed
    );

    // Get the current page slug
    if (is_page()) {
        global $post;
        $current_page_slug = $post->post_name;

        // Check if the current page slug matches any in our array and the cart is empty
        if (array_key_exists($current_page_slug, $pages_to_products) && WC()->cart->is_empty()) {
            // Get the product ID for the current page
            $product_id = $pages_to_products[$current_page_slug];
            // Add the product to the cart
            WC()->cart->add_to_cart($product_id);
        }
    }
}
add_action('template_redirect', 'add_product_to_cart_on_checkout');

// For single product with single page

function add_product_to_cart_on_checkout() {
    // Replace 'your-landing-page-slug' with your actual landing page slug
    if (is_page('your-landing-page-slug') && WC()->cart->is_empty()) {
        // Replace 'your_product_id' with the actual ID of the product you want to auto-add
        WC()->cart->add_to_cart(your_product_id);
    }
}
add_action('template_redirect', 'add_product_to_cart_on_checkout');


```