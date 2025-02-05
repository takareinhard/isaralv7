<?php
/*-------------------------------------------*/
/*	customize_register
/*-------------------------------------------*/
add_action( 'customize_register', 'lightning_customize_register_layout' );
function lightning_customize_register_layout( $wp_customize ) {

	$wp_customize->add_section(
		'lightning_layout', array(
			'title'    => lightning_get_prefix_customize_panel() . __( 'Layout settings', 'lightning' ),
			'priority' => 502,
		// 'panel'				=> 'lightning_setting',
		)
	);
	// Add setting


	$wp_customize->add_setting(
		'ltg_column_setting', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Custom_Html_Control(
			$wp_customize, 'ltg_column_setting', array(
				'label'            => __( 'Column Setting', 'lightning' ) . ' ( ' . __( 'PC mode', 'lightning' ).' )',
				'section'          => 'lightning_layout',
				'type'             => 'text',
				'custom_title_sub' => '',
				'custom_html'      => '',
				// 'priority'         => 700,
			)
		)
	);

	$page_types = array(
		'front-page' => array(
			'label' => __( 'Home page', 'lightning' ),
			'description' => '',
		),
		'search' => array(
			'label' => __( 'Search', 'lightning' ),
		),
		'error404' => array(
			'label' => __( '404 page', 'lightning' ),
		),
		'archive' => array(
			'label' => __( 'Archive page (Post and custom post type)', 'lightning' ),
		),
		'single' => array(
			'label' => __( 'Single page (Post and custom post type)', 'lightning' ),
		),
		// If cope with custom post types that like a "archive-post" "single-post".
	);

	$choices = array(
		'default' => __( 'Unspecified', 'lightning-pro' ),
		'col-two' => __( 'Two colmun', 'lightning-pro' ),
		'col-one' => __( 'One column', 'lightning-pro' ),
	);

	foreach( $page_types as $key => $value ){
		$wp_customize->add_setting(
			'lightning_theme_options[layout][' . $key . ']', array(
				'default'           => 'default',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
	
		$wp_customize->add_control(
			'lightning_theme_options[layout][' . $key . ']',
			array(
				'label'    => $value['label'],
				'section'  => 'lightning_layout',
				'settings' => 'lightning_theme_options[layout][' . $key . ']',
				'type'     => 'select',
				'choices'  => $choices,
				// 'priority' => 700,
			)
		);
	}

	$wp_customize->add_setting(
		'ltg_sidebar_setting', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Custom_Html_Control(
			$wp_customize, 'ltg_sidebar_setting', array(
				'label'            => __( 'Sidebar Setting', 'lightning' ),
				'section'          => 'lightning_layout',
				'type'             => 'text',
				'custom_title_sub' => '',
				'custom_html'      => '',
				// 'priority'         => 700,
			)
		)
	);

	// sidebar_position
	$wp_customize->add_setting(
		'lightning_theme_options[sidebar_position]', array(
			'default'           => 'right',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'lightning_sanitize_radio',
		)
	);
	$wp_customize->add_control(
		'lightning_theme_options[sidebar_position]', array(
			'label'    => __( 'Sidebar position ( PC mode )', 'lightning' ),
			'section'  => 'lightning_layout',
			'settings' => 'lightning_theme_options[sidebar_position]',
			'type'     => 'radio',
			'choices'  => array(
				'right' => __( 'Right', 'lightning' ),
				'left'  => __( 'Left', 'lightning' ),
			),
		)
	);

	// sidebar_fix
	$wp_customize->add_setting(
		'ltg_sidebar_fix_setting_title', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Custom_Html_Control(
			$wp_customize, 'ltg_sidebar_fix_setting_title', array(
				'label'            => '',
				'section'          => 'lightning_layout',
				'type'             => 'text',
				'custom_title_sub' => __( 'Sidebar fix', 'lightning' ),
				'custom_html'      => '',
			)
		)
	);
	$wp_customize->add_setting(
		'lightning_theme_options[sidebar_fix]', array(
			'default'           => false,
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'lightning_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'lightning_theme_options[sidebar_fix]', array(
			'label'    => __( 'Don\'t fix the sidebar', 'lightning' ),
			'section'  => 'lightning_layout',
			'settings' => 'lightning_theme_options[sidebar_fix]',
			'type'     => 'checkbox',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'lightning_theme_options[sidebar_fix]', array(
			'selector'        => '.sideSection',
			'render_callback' => '',
		)
	);

	$wp_customize->add_setting(
		'ltg_sidebar_display_setting_title', array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Custom_Html_Control(
			$wp_customize, 'ltg_sidebar_display_setting_title', array(
				'label'            => '',
				'section'          => 'lightning_layout',
				'type'             => 'text',
				'custom_title_sub' => __( 'Sidebar display', 'lightning' ) . ' ( ' . __( 'One-column mode', 'lightning' ).' )',
				'custom_html'      => '<p>Sidebar display setting of case of one-column.</p>',
			)
		)
	);

	$choices = array(
		'break' => __( 'Display to under the Main Section', 'lightning-pro' ),
		'hidden' => __( 'Do not display', 'lightning-pro' ),
	);

	foreach( $page_types as $key => $value ){
		$wp_customize->add_setting(
			'lightning_theme_options[sidebar_display][' . $key . ']', array(
				'default'           => 'break',
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
	
		$wp_customize->add_control(
			'lightning_theme_options[sidebar_display][' . $key . ']',
			array(
				'label'    => $value['label'],
				'section'  => 'lightning_layout',
				'settings' => 'lightning_theme_options[sidebar_display][' . $key . ']',
				'type'     => 'select',
				'choices'  => $choices,
				// 'priority' => 700,
			)
		);
	}

}