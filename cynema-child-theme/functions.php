<?php

// Include php files
include get_theme_file_path('/includes/shortcodes.php');
include get_theme_file_path('includes/custom-post-types/video.php');

// Enqueue needed scripts
function needed_styles_and_scripts_enqueue() {
	
    // Custom script
    wp_enqueue_script( 'wpbs-custom-script', get_stylesheet_directory_uri() . '/assets/javascript/script.js' , array( 'jquery' ) );

    // enqueue style
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	
	// Add-ons
	wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/assets/scss/supports.css', array(), '', 'all' );


}
add_action( 'wp_enqueue_scripts', 'needed_styles_and_scripts_enqueue' );

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'widget_text', 'do_shortcode' );

//Dynamic Year
function site_year(){
	ob_start();
	echo date( 'Y' );
	$output = ob_get_clean();
    return $output;
}
add_shortcode( 'site_year', 'site_year' );

//
// Your code goes below
//
	
	function cynematv_add_woocommerce_support() {
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 2,
				'max_rows'        => 8,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 5,
			),
		) );
	}
	add_action( 'after_setup_theme', 'cynematv_add_woocommerce_support' );
