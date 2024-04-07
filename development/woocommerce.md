//Remove Checkout Fileds
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


<!-- Details in -->
https://www.businessbloomer.com/woocommerce-checkout-quote-system/