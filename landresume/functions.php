<?php

require get_template_directory() . '/inc/function-admin.php';

/**
 * Load all the theme & vendor css/js files
 */
function landresume_script_enqueue() {

	wp_enqueue_style( 'bootstrap.min.css', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css', [], '4.0.0', $media );
	wp_enqueue_style( 'animate.css', get_template_directory_uri() . '/assets/css/vendor/animate.css', [], '3.5.1', $media );
	wp_enqueue_style( 'circle.css', get_template_directory_uri() . '/assets/css/vendor/circle.css', [], '1.0', $media );
	wp_enqueue_style( 'font-awesome.min.css', get_template_directory_uri() . '/assets/css/vendor/font-awesome.min.css', [], '4.7.0', $media );
	wp_enqueue_style( 'global.css', get_template_directory_uri() . '/assets/css/global.css', [], '1.0.2', $media );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'tether.min.js', get_template_directory_uri() . '/assets/js/vendor/tether.min.js', [], '1.3.3', true );
	wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', [], '4.0.0', true );
	wp_enqueue_script( 'global.js', get_template_directory_uri() . '/assets/js/global.js', [], '1.0.2', true );

}

add_action( 'wp_enqueue_scripts', 'landresume_script_enqueue' );

/**
 * Activate all the theme support and navigation menu
 */
function landresume_theme_setup() {

    add_theme_support('menus');
    add_theme_support('post-formats', ['aside']);
    add_theme_support('post-thumbnails');

	register_nav_menu( 'primary', 'Primary Header Menu' );

}

add_action( 'init', 'landresume_theme_setup' );

/**
 * Change the Menu options in order to add the required styles rules
 * the theme need for a good UX
 */
function landresume_add_specific_menu_location_atts( $atts, $item, $args ) {

    if ( $args->theme_location == 'primary' ) {

        $optionSelected = ( '1' == $item->menu_order ) ? ' selected' : '';
    	$atts['class'] = 'nav-link scrollitem ' . $item->post_excerpt . '-link' . $optionSelected;
    	$atts['href'] = '#' . $item->post_excerpt;

    }

    return $atts;

}

add_filter( 'nav_menu_link_attributes', 'landresume_add_specific_menu_location_atts', 10, 3 );

/**
 * Modify the Admin with to add more space to use the jm-social-media-font-awesome plugin
 */
function landresume_admin_column_width() {

    $output_css =  '<style type="text/css">
        #wpcontent, #wpcontent, #wpfooter { margin-left:190px }
        #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { width:190px }
    	#adminmenu .wp-submenu { left:190px }
    </style>';

    echo $output_css;

}

add_action('admin_head', 'landresume_admin_column_width');