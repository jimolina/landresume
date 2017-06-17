<?php

/**
* Plugin Name: JM Social Media Icon (With Font Awesome)
* Plugin URI: http://josemolinaresume.com/jm-social-media-font-awesome/
* Description: A simple and free plugin for WordPress that let you add a list of Social Media Icon usind the popular font class: Fotn Awesome [http://fontawesome.io/].
* Version: 1.0.0
* Author: Jose Molina [israel.molina@gmail.com]
* Author URI: http://www.josemolianresume.com/
* License: GNU General Public License v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'JM_SMFA__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'JM_SMFA__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'JM_SMFA__VERSION', '1.0.5.2' );

function jm_awesome_load_resource()
{

	global $pagenow, $typenow;

	if ( ('edit.php' == $pagenow || 'post.php' == $pagenow || 'post-new.php' == $pagenow) && ( 'jm_awesome' == $typenow ) ) {
		wp_register_style( 'bootstrap.min.css', JM_SMFA__PLUGIN_URL . '_inc/vendor/bootstrap.min.css', [], JM_SMFA__VERSION );
		wp_enqueue_style( 'bootstrap.min.css');
		wp_register_style( 'bootstrap-select.min.css', JM_SMFA__PLUGIN_URL . '_inc/vendor/bootstrap-select.min.css', [], JM_SMFA__VERSION );
		wp_enqueue_style( 'bootstrap-select.min.css');
		wp_register_style( 'font-awesome.min.css', JM_SMFA__PLUGIN_URL . '_inc/vendor/font-awesome.min.css', [], JM_SMFA__VERSION );
		wp_enqueue_style( 'font-awesome.min.css');
		wp_register_style( 'fontawesome-iconpicker.min.css', JM_SMFA__PLUGIN_URL . '_inc/vendor/fontawesome-iconpicker.min.css', [], JM_SMFA__VERSION );
		wp_enqueue_style( 'fontawesome-iconpicker.min.css');
		wp_register_style( 'jm-social-media-font-awesome.css', JM_SMFA__PLUGIN_URL . '_inc/css/jm-social-media-font-awesome.css', [], JM_SMFA__VERSION );
		wp_enqueue_style( 'jm-social-media-font-awesome.css');

		wp_register_script( 'tether.min.js', JM_SMFA__PLUGIN_URL . '_inc/vendor/tether.min.js', ['jquery'], JM_SMFA__VERSION );
		wp_enqueue_script( 'tether.min.js' );
		wp_register_script( 'bootstrap.min.js', JM_SMFA__PLUGIN_URL . '_inc/vendor/bootstrap.min.js', ['jquery'], JM_SMFA__VERSION );
		wp_enqueue_script( 'bootstrap.min.js' );
		wp_register_script( 'bootstrap-select.min.js', JM_SMFA__PLUGIN_URL . '_inc/vendor/bootstrap-select.min.js', ['jquery'], JM_SMFA__VERSION );
		wp_enqueue_script( 'bootstrap-select.min.js' );
		wp_register_script( 'fontawesome-iconpicker.min.js', JM_SMFA__PLUGIN_URL . '_inc/vendor/fontawesome-iconpicker.min.js', ['jquery'], JM_SMFA__VERSION );
		wp_enqueue_script( 'fontawesome-iconpicker.min.js' );
		wp_register_script( 'jm-social-media-font-awesome.js', JM_SMFA__PLUGIN_URL . '_inc/js/jm-social-media-font-awesome.js', ['jquery'], JM_SMFA__VERSION );
		wp_enqueue_script( 'jm-social-media-font-awesome.js' );
	}

}

add_action( 'admin_enqueue_scripts', 'jm_awesome_load_resource' );

function jm_awesome_post_type()
{

	$labels = [
		'name'               => _x( 'FA Icons', 'post type general name', 'jm-social-media-font-awesome' ),
		'singular_name'      => _x( 'FA Icon', 'post type singular name', 'jm-social-media-font-awesome' ),
		'menu_name'          => _x( 'FA Icons', 'admin menu', 'jm-social-media-font-awesome' ),
		'name_admin_bar'     => _x( 'FA Icon', 'add new on admin bar', 'jm-social-media-font-awesome' ),
		'add_new'            => _x( 'Add New', 'icon', 'jm-social-media-font-awesome' ),
		'add_new_item'       => __( 'Add New FA Icons', 'jm-social-media-font-awesome' ),
		'new_item'           => __( 'New FA Icons', 'jm-social-media-font-awesome' ),
		'edit_item'          => __( 'Edit FA Icons', 'jm-social-media-font-awesome' ),
		'view_item'          => __( 'View FA Icons', 'jm-social-media-font-awesome' ),
		'all_items'          => __( 'All FA Icons', 'jm-social-media-font-awesome' ),
		'search_items'       => __( 'Search FA Icons', 'jm-social-media-font-awesome' ),
		'parent_item_colon'  => __( 'Parent FA Icons:', 'jm-social-media-font-awesome' ),
		'not_found'          => __( 'No FA Icons found.', 'jm-social-media-font-awesome' ),
		'not_found_in_trash' => __( 'No FA Icons found in Trash.', 'jm-social-media-font-awesome' )
	];

	$args = [
		'labels'             => $labels,
        'description'        => __( 'Social Media/Tags Icons with Font Awesome.', 'jm-social-media-font-awesome' ),
		'public'             => true,
		'rewrite'            => array( 'slug' => 'jm_awesome' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'page-attributes' ),
		'menu_icon'			 => 'dashicons-smiley'
	];

	register_post_type( 'jm_awesome', $args );

}

add_action( 'init', 'jm_awesome_post_type' );

function jm_awesome_add_custom_metabox()
{

	add_meta_box( 'jm_awesome_meta', 'Social Media Icons', 'jm_awesome_meta_callback', 'jm_awesome', 'normal' );

}

add_action( 'add_meta_boxes', 'jm_awesome_add_custom_metabox' );

function jm_awesome_meta_callback( $post ) 
{

	wp_nonce_field( basename( __FILE__ ), 'jm_awesome_nonce' );
	$jm_awesome_stored_meta = get_post_meta( $post->ID );

	require_once( JM_SMFA__PLUGIN_DIR . '/views/form.php' );

}

function jm_awesome_meta_save( $post_id ) {

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset ( $_POST[ 'jm_awesome_nonce' ] ) && wp_verify_nonce( $_POST[ 'jm_awesome_nonce' ][0], basename( __FILE__ ) ) ) ? 'true' : 'false'; 

	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	if ( isset ( $_POST['jm_awesome_icon'] ) ) {
		update_post_meta( $post_id, 'jm_awesome_icon', sanitize_text_field( $_POST['jm_awesome_icon'] ) );
	}

	if ( isset ( $_POST['jm_awesome_position'] ) ) {
		update_post_meta( $post_id, 'jm_awesome_position', sanitize_text_field( $_POST['jm_awesome_position'] ) );
	}

	if ( isset ( $_POST['jm_awesome_url'] ) ) {
		update_post_meta( $post_id, 'jm_awesome_url', sanitize_text_field( $_POST['jm_awesome_url'] ) );
	}

	if ( isset ( $_POST['jm_awesome_content'] ) ) {
		update_post_meta( $post_id, 'jm_awesome_content', $_POST['jm_awesome_content'] );
	}
}

add_action( 'save_post', 'jm_awesome_meta_save' );

function jm_awesome_table_head( $columns ) {

	unset($columns['date']);

    $columns['jm_awesome_icon']  = 'Icon';
    $columns['jm_awesome_position']  = 'Position';
    $columns['jm_awesome_url']  = 'Url';
    $columns['date']  = 'Date';

    return $columns;

}

add_filter( 'manage_jm_awesome_posts_columns', 'jm_awesome_table_head' );

function jm_awesome_columns_content($column_name, $post_ID) {

	global $post;

	switch ($column_name) {
		case 'jm_awesome_icon':
			$value = $post->jm_awesome_icon . '  <i class="fa fa-2x ' . $post->jm_awesome_icon . '"></i>';
			break;
		case 'jm_awesome_position':
			$value =  $post->jm_awesome_position;
			break;
		case 'jm_awesome_url':
			$value =  $post->jm_awesome_url;
			break;
		
		default:
			$value = '';
			break;
	}
    
    echo $value;

} 

add_action( 'manage_jm_awesome_posts_custom_column', 'jm_awesome_columns_content', 10, 2 );

function jm_awesome_columns_register_sortable($columns){
	
	$columns['jm_awesome_icon'] = 'jm_awesome_icon';
	$columns['jm_awesome_position'] = 'jm_awesome_position';
	$columns['jm_awesome_url'] = 'jm_awesome_url';

	return $columns;

}

add_filter( 'manage_edit-jm_awesome_sortable_columns', 'jm_awesome_columns_register_sortable', 10, 1 );