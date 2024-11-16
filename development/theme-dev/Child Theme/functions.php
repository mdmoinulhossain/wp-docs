<?php
/**
 * Load the parent style.css file
 */
function total_child_enqueue_parent_theme_style() {
	wp_enqueue_style(
		'parent-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'total_child_enqueue_parent_theme_style' );




// <?php

// /* Function to enqueue stylesheet from parent theme */

// function child_enqueue__parent_scripts() {

//     wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );

// }
// add_action( 'wp_enqueue_scripts', 'child_enqueue__parent_scripts' );