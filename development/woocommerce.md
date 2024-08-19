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