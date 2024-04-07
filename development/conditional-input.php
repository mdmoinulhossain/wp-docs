<?php
    $regPrice = 600; 
    $curPrice = 300;

    $presentage = $curPrice / $regPrice * 100;
    echo $presentage.'%';
?>

<?php
/* wp product price hooks */

if (!function_exists('my_commonPriceHtml')) {

    function my_commonPriceHtml($price_amt, $regular_price, $sale_price) {
        $html_price = '<p class="price">';
        //if product is in sale
        if (($price_amt == $sale_price) && ($sale_price != 0)) {
            $html_price .= '<ins>' . wc_price($sale_price) . '</ins>';
            $html_price .= '<del>' . wc_price($regular_price) . '</del>';
        }
        //in sale but free
        else if (($price_amt == $sale_price) && ($sale_price == 0)) {
            $html_price .= '<ins>Free!</ins>';
            $html_price .= '<del>' . wc_price($regular_price) . '</del>';
        }
        //not is sale
        else if (($price_amt == $regular_price) && ($regular_price != 0)) {
            $html_price .= '<ins>' . wc_price($regular_price) . '</ins>';
        }
        //for free product
        else if (($price_amt == $regular_price) && ($regular_price == 0)) {
            $html_price .= '<ins>Free!</ins>';
        }
        $html_price .= '</p>';
        return $html_price;
    }

}

add_filter('woocommerce_get_price_html', 'my_simple_product_price_html', 100, 2);

function my_simple_product_price_html($price, $product) {
    if ($product->is_type('simple')) {
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
        $price_amt = $product->get_price();
        return my_commonPriceHtml($price_amt, $regular_price, $sale_price);
    } else {
        return $price;
    }
}

add_filter('woocommerce_variation_sale_price_html', 'my_variable_product_price_html', 10, 2);
add_filter('woocommerce_variation_price_html', 'my_variable_product_price_html', 10, 2);

function my_variable_product_price_html($price, $variation) {
    $variation_id = $variation->variation_id;
    //creating the product object
    $variable_product = new WC_Product($variation_id);

    $regular_price = $variable_product->get_regular_price();
    $sale_price = $variable_product->get_sale_price();
    $price_amt = $variable_product->get_price();

    return my_commonPriceHtml($price_amt, $regular_price, $sale_price);
}

add_filter('woocommerce_variable_sale_price_html', 'my_variable_product_minmax_price_html', 10, 2);
add_filter('woocommerce_variable_price_html', 'my_variable_product_minmax_price_html', 10, 2);

function my_variable_product_minmax_price_html($price, $product) {
    $variation_min_price = $product->get_variation_price('min', true);
    $variation_max_price = $product->get_variation_price('max', true);
    $variation_min_regular_price = $product->get_variation_regular_price('min', true);
    $variation_max_regular_price = $product->get_variation_regular_price('max', true);

    if (($variation_min_price == $variation_min_regular_price) && ($variation_max_price == $variation_max_regular_price)) {
        $html_min_max_price = $price;
    } else {
        $html_price = '<p class="price">';
        $html_price .= '<ins>' . wc_price($variation_min_price) . '-' . wc_price($variation_max_price) . '</ins>';
        $html_price .= '<del>' . wc_price($variation_min_regular_price) . '-' . wc_price($variation_max_regular_price) . '</del>';
        $html_min_max_price = $html_price;
    }

    return $html_min_max_price;
}




//Hide Price Range for WooCommerce Variable Products
add_filter( 'woocommerce_variable_sale_price_html','lw_variable_product_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html','lw_variable_product_price', 10, 2 );

function lw_variable_product_price( $v_price, $v_product ) {

    // Product Price
    $prod_prices = array( $v_product->get_variation_price( 'min', true ), $v_product->get_variation_price( 'max', true ) );
    $prod_price = $prod_prices[0]!==$prod_prices[1] ? sprintf(__('From: %1$s', 'woocommerce'), wc_price( $prod_prices[0] ) ) : wc_price( $prod_prices[0] );

    // Regular Price
    $regular_prices = array( $v_product->get_variation_regular_price( 'min', true ), 
                              $v_product->get_variation_regular_price( 'max', true ) );
    sort( $regular_prices );
    $regular_price = $regular_prices[0]!==$regular_prices[1] ? sprintf(__('From: %1$s','woocommerce')
                          , wc_price( $regular_prices[0] ) ) : wc_price( $regular_prices[0] );

    if ( $prod_price !== $regular_price ) {
        $prod_price = '<del>'.$regular_price.$v_product->get_price_suffix() . '</del> <ins>' . 
                           $prod_price . $v_product->get_price_suffix() . '</ins>';
    }
    return $prod_price;
}




/* percentage calculation and display */
add_filter( 'woocommerce_get_price_html', 'change_displayed_sale_price_html', 10, 2 );
function change_displayed_sale_price_html( $price, $product ) {
    // Only on sale products on frontend and excluding min/max price on variable products
    if( $product->is_on_sale() && ! is_admin() && ! $product->is_type('variable')){
        // Get product prices
        $regular_price = (float) $product->get_regular_price(); // Regular price
        $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)

        // "Saving Percentage" calculation and formatting
        $precision = 1; // Max number of decimals
        $saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';

        // Append to the formated html price
        $price .= sprintf( __('<p class="saved-sale">Save: %s</p>', 'woocommerce' ), $saving_percentage );
    }
    return $price;
}
?>