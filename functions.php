<?php

/**
 * Create Custo Post Type for Slideres
*/
function create_slider_post_type() {

	$labels = array(
		'name' => __( 'Sliders' ),
		'singular_name' => __( 'Sliders' ),
		'all_items'           => __( 'All Sliders' ),
		'view_item'           => __( 'View Slider' ),
		'add_new_item'        => __( 'Add New Slider' ),
		'add_new'             => __( 'Add New Slider' ),
		'edit_item'           => __( 'Edit Slider' ),
		'update_item'         => __( 'Update Slider' ),
		'search_items'        => __( 'Search Slider' ),
		'search_items' => __('Sliders')
	);

	$args = array(
		'labels' => $labels,
		'description' => 'Add New Slider contents',
		'menu_position' => 27,
		'public' => true,
		'has_archive' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => false),
		'menu_icon'=>'dashicons-format-image',
		'supports' => array(
			'title',
			'thumbnail',
			'editor'
		),
	);
	register_post_type( 'slider', $args);

}
add_action( 'init', 'create_slider_post_type' );

// Slider Setting
function theme_admin_page(){
	add_menu_page( 'Slider Setting', 'Slider Setting', 'manage_options', 'slider-setting', 'theme_init', 'dashicons-admin-generic', 30 );
}

function theme_settings(){
	register_setting( 'slider-option-group', 'sliderHeight' );
	add_settings_section( 'theme-index-options', '', 'theme_slider_options', 'slider-setting' );
	add_settings_field( 'slider-height', 'Slider Height', 'sliderheight_callback', 'slider-setting', 'theme-index-options' );
}

add_action( 'admin_menu', 'theme_admin_page' );
add_action( 'admin_init', 'theme_settings' );


function theme_init(){
   require_once(get_template_directory().'/inc/admin/admin-panel.php');
}

function theme_slider_options(){}

function sliderheight_callback(){
	$preText = get_option( 'sliderHeight' );
	echo '<input type="number" name="sliderHeight" placeholder="500" value="'.$preText.'">'; echo'px';
}

function mytheme_customize_css()
{
    ?>
         <style type="text/css">
            .carousel-item img {  height: <?php echo get_option('sliderHeight', 500); ?>px; width:100%; }
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');

// Post & Page Feature Image
function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

// Menus
function my_cool_menu_function(){
    register_nav_menus( array(
        'primary-menu' => 'Primary Menu',
    ));
}
add_action( 'after_setup_theme', 'my_cool_menu_function' );