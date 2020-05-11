<?php

// Front Page Slider Setting
function front_page_slider_register( $wp_customize ) {

    // Slider Image 1
    $wp_customize->add_section('slides', array(
            'title'     => 'Front Page Slider Setting',
            'priority'  => 202,
        )
    );

    $wp_customize->add_setting( 'themeslug_number_setting_id', array(
        'capability' => 'edit_theme_options',
        'default' => 500,
    ) );
        
    $wp_customize->add_control( 'themeslug_number_setting_id', array(
        'type' => 'number',
        'section' => 'slides', // Add a default or your own section
        'label' => __( 'Slider Image Height' ),
        'description' => __( 'Height Ajust' ),
    ) );

}
add_action( 'customize_register', 'front_page_slider_register' );