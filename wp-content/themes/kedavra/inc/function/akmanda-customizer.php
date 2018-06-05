<?php 

	/*
	*
	*	Theme Customizer Options
	*	------------------------------------------------
	*	Themes Awesome Framework
	* 	Copyright Themes Awesome 2013 - http://www.themesawesome.com
	*
	*	kedavra_customize_register()
	*	kedavra_customize_preview()
	*
	*/
	
	if (!function_exists('kedavra_customize_register')) {
		function kedavra_customize_register($wp_customize) {
		
			$wp_customize->get_setting('blogname')->transport='postMessage';
			$wp_customize->get_setting('blogdescription')->transport='postMessage';
			$wp_customize->get_setting('header_textcolor')->transport='postMessage';

			/* HEADER STYLING
			================================================== */
			
			$wp_customize->add_section( 'header_styling', array(
				'title'		=>	__( 'Header', 'kedavra' ),
				'priority'	=>	200,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'menu_list', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'menu_bg', array(
				'default'		=> 	'#17191e',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'sub_bg', array(
				'default'		=> 	'#17191e',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			
			//CONTROL
		
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_list', array(
				'label'		=>	__( 'Menu List Color', 'kedavra' ),
				'section'	=>	'header_styling',
				'settings'	=>	'menu_list',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_bg', array(
				'label'		=>	__( 'Menu Background Color', 'kedavra' ),
				'section'	=>	'header_styling',
				'settings'	=>	'menu_bg',
				'priority'	=>	2,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sub_bg', array(
				'label'		=>	__( 'Sub Menu Background Color', 'kedavra' ),
				'section'	=>	'header_styling',
				'settings'	=>	'sub_bg',
				'priority'	=>	3,
			) ) );


			/* CONTENT STYLING
			================================================== */
			
			$wp_customize->add_section( 'content_styling', array(
				'title'		=>	__( 'Content', 'kedavra' ),
				'priority'	=>	200,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'titlepage_color', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'desc1_color', array(
				'default'		=> 	'#999999',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'testi_color', array(
				'default'		=> 	'#555555',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'newslet_title', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'blog_title', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'blog_date', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'blog_bg', array(
				'default'		=> 	'#17191e',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'blog_ds', array(
				'default'		=> 	'#d0d0d0',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bg_article1', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bg_article2', array(
				'default'		=> 	'#f1f1f1',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'detail_post', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bg_port', array(
				'default'		=> 	'#17191e',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'title_port', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'detail_causes', array(
				'default'		=> 	'#999999',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bar_causes', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'icon_causes', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'btn_causes', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'title_portfolio', array(
				'default'		=> 	'#333333',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'detail_portfolio', array(
				'default'		=> 	'#333333',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'website_portfolio', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'webhov_portfolio', array(
				'default'		=> 	'#f3c52b',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bord_blog', array(
				'default'		=> 	'#d2d2d2',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bg_sidebar', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'title_widgetsid', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'link_sidebar', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bg_form', array(
				'default'		=> 	'#f4f4f4',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bord_form', array(
				'default'		=> 	'#dddddd',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			
			//CONTROL
		
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'titlepage_color', array(
				'label'		=>	__( 'Title Page Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'titlepage_color',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'desc1_color', array(
				'label'		=>	__( 'Description Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'desc1_color',
				'priority'	=>	2,
			) ) );


			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'testi_color', array(
				'label'		=>	__( 'Testimonial Text Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'testi_color',
				'priority'	=>	3,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'newslet_title', array(
				'label'		=>	__( 'Title Newsletter Text Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'newslet_title',
				'priority'	=>	4,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_title', array(
				'label'		=>	__( 'Blog Title Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'blog_title',
				'priority'	=>	5,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_date', array(
				'label'		=>	__( 'Blog Date Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'blog_date',
				'priority'	=>	6,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_bg', array(
				'label'		=>	__( 'Blog Background Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'blog_bg',
				'priority'	=>	7,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_ds', array(
				'label'		=>	__( 'Blog Single Date Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'blog_ds',
				'priority'	=>	8,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_article1', array(
				'label'		=>	__( 'Blog Single Background 1 Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bg_article1',
				'priority'	=>	9,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_article2', array(
				'label'		=>	__( 'Blog Single Background 2 Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bg_article2',
				'priority'	=>	10,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'detail_post', array(
				'label'		=>	__( 'Blog Single Detail Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'detail_post',
				'priority'	=>	11,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_port', array(
				'label'		=>	__( 'Portfolio/Causes Background Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bg_port',
				'priority'	=>	12,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_port', array(
				'label'		=>	__( 'Portfolio/Causes Title Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'title_port',
				'priority'	=>	13,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'detail_causes', array(
				'label'		=>	__( 'Causes Detail Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'detail_causes',
				'priority'	=>	14,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bar_causes', array(
				'label'		=>	__( 'Single Causes Percentage Bar Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bar_causes',
				'priority'	=>	15,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'icon_causes', array(
				'label'		=>	__( 'Single Causes Icon Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'icon_causes',
				'priority'	=>	16,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_causes', array(
				'label'		=>	__( 'Single Causes & Blog Sidebar Button with underline Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'btn_causes',
				'priority'	=>	17,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_portfolio', array(
				'label'		=>	__( 'Single Portfolio Title Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'title_portfolio',
				'priority'	=>	18,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'detail_portfolio', array(
				'label'		=>	__( 'Single Portfolio Detail Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'detail_portfolio',
				'priority'	=>	19,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'website_portfolio', array(
				'label'		=>	__( 'Single Portfolio Website link Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'website_portfolio',
				'priority'	=>	20,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webhov_portfolio', array(
				'label'		=>	__( 'Website link & Button Next/Previous Hover Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'webhov_portfolio',
				'priority'	=>	21,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bord_blog', array(
				'label'		=>	__( 'Blog Sidebar Border Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bord_blog',
				'priority'	=>	22,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_sidebar', array(
				'label'		=>	__( 'Background Sidebar Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bg_sidebar',
				'priority'	=>	23,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_widgetsid', array(
				'label'		=>	__( 'Title Widget Sidebar Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'title_widgetsid',
				'priority'	=>	24,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_sidebar', array(
				'label'		=>	__( 'Link Widget Sidebar Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'link_sidebar',
				'priority'	=>	25,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_form', array(
				'label'		=>	__( 'Background Form Contact Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bg_form',
				'priority'	=>	26,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bord_form', array(
				'label'		=>	__( 'Border Form Contact Color', 'kedavra' ),
				'section'	=>	'content_styling',
				'settings'	=>	'bord_form',
				'priority'	=>	27,
			) ) );


			/* BUILDER STYLING
			================================================== */
			
			$wp_customize->add_section( 'builder_styling', array(
				'title'		=>	__( 'Builder', 'kedavra' ),
				'priority'	=>	200,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'desc_color', array(
				'default'		=> 	'#9f9f9f',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'btn_slider', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			
			//CONTROL
		
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'desc_color', array(
				'label'		=>	__( 'Description Color', 'kedavra' ),
				'section'	=>	'builder_styling',
				'settings'	=>	'desc_color',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_slider', array(
				'label'		=>	__( 'Button With Border Color', 'kedavra' ),
				'section'	=>	'builder_styling',
				'settings'	=>	'btn_slider',
				'priority'	=>	2,
			) ) );


			/* FOOTER STYLING
			================================================== */
			
			$wp_customize->add_section( 'footer_styling', array(
				'title'		=>	__( 'Footer', 'kedavra' ),
				'priority'	=>	200,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'bg_color', array(
				'default'		=> 	'#17191e',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bg_color2', array(
				'default'		=> 	'#f9f9f9',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'bord_color', array(
				'default'		=> 	'#2f3035',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'title_widget', array(
				'default'		=> 	'#358d7c',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'text_widget', array(
				'default'		=> 	'#999999',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'copyright_color', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'socicon_color', array(
				'default'		=> 	'#ffffff',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'banner_color', array(
				'default'		=> 	'#333333',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_setting( 'banner_btn', array(
				'default'		=> 	'#333333',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			//CONTROL
		
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_color', array(
				'label'		=>	__( 'Footer style 1 Background Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'bg_color',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_color2', array(
				'label'		=>	__( 'Footer style 2 Background Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'bg_color2',
				'priority'	=>	2,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bord_color', array(
				'label'		=>	__( 'Footer Border Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'bord_color',
				'priority'	=>	3,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_widget', array(
				'label'		=>	__( 'Footer Title Widget Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'title_widget',
				'priority'	=>	4,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_widget', array(
				'label'		=>	__( 'Footer Text Widget Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'text_widget',
				'priority'	=>	5,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_color', array(
				'label'		=>	__( 'Footer Copyright Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'copyright_color',
				'priority'	=>	6,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socicon_color', array(
				'label'		=>	__( 'Footer Social Icon Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'socicon_color',
				'priority'	=>	7,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_color', array(
				'label'		=>	__( 'Footer Style 2 Slogan Text Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'banner_color',
				'priority'	=>	8,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_btn', array(
				'label'		=>	__( 'Footer Style 2 Button Color', 'kedavra' ),
				'section'	=>	'footer_styling',
				'settings'	=>	'banner_btn',
				'priority'	=>	9,
			) ) );


		}
		add_action( 'customize_register', 'kedavra_customize_register' );

	}
	
	
	function kedavra_customizer_live_preview() {
		wp_enqueue_script( 'akmanda-customizer',	get_template_directory_uri().'/js/akmanda-customizer.js', array( 'jquery','customize-preview' ), NULL, true);
	}
	add_action( 'customize_preview_init', 'kedavra_customizer_live_preview' );
	


	function kedavra_customizer_header_output() {	

	//header styling
	$menu_list					=	get_option('menu_list', '#ffffff');
	$menu_bg					=	get_option('menu_bg', '#17191e');
	$sub_bg						=	get_option('sub_bg', '#17191e');

	//content styling
	$titlepage_color			=	get_option('titlepage_color', '#358d7c');
	$desc1_color				=	get_option('desc1_color', '#999999');

	$testi_color				=	get_option('testi_color', '#555555');
	$newslet_title				=	get_option('newslet_title', '#358d7c');
	$blog_title					=	get_option('blog_title', '#358d7c');
	$blog_date					=	get_option('blog_date', '#ffffff');
	$blog_bg					=	get_option('blog_bg', '#17191e');
	$blog_ds					=	get_option('blog_ds', '#d0d0d0');
	$bg_article1				=	get_option('bg_article1', '#ffffff');
	$bg_article2				=	get_option('bg_article2', '#f1f1f1');
	$detail_post				=	get_option('detail_post', '#358d7c');
	$bg_port					=	get_option('bg_port', '#17191e');
	$title_port					=	get_option('title_port', '#ffffff');
	$detail_causes				=	get_option('detail_causes', '#999999');
	$bar_causes					=	get_option('bar_causes', '#358d7c');
	$icon_causes				=	get_option('icon_causes', '#358d7c');
	$btn_causes					=	get_option('btn_causes', '#000000');
	$title_portfolio			=	get_option('title_portfolio', '#333333');
	$detail_portfolio			=	get_option('detail_portfolio', '#333333');
	$website_portfolio			=	get_option('website_portfolio', '#358d7c');
	$webhov_portfolio			=	get_option('webhov_portfolio', '#f3c52b');
	$bord_blog					=	get_option('bord_blog', '#d2d2d2');
	$bg_sidebar					=	get_option('bg_sidebar', '#ffffff');
	$title_widgetsid			=	get_option('title_widgetsid', '#000000');
	$link_sidebar				=	get_option('link_sidebar', '#358d7c');
	$bg_form					=	get_option('bg_form', '#f4f4f4');
	$bord_form					=	get_option('bord_form', '#dddddd');

	//builder styling
	$desc_color					=	get_option('desc_color', '#9f9f9f');
	$btn_slider					=	get_option('btn_slider', '#ffffff');

	//footer styling
	$bg_color					=	get_option('bg_color', '#17191e');
	$bg_color2					=	get_option('bg_color2', '#f9f9f9');
	$bord_color					=	get_option('bord_color', '#2f3035');
	$title_widget				=	get_option('title_widget', '#358d7c');
	$text_widget				=	get_option('text_widget', '#999999');
	$copyright_color			=	get_option('copyright_color', '#ffffff');
	$socicon_color		 		=	get_option('socicon_color', '#ffffff');
	$banner_color		 		=	get_option('banner_color', '#333333');
	$banner_btn		 			=	get_option('banner_btn', '#333333');

	
	

	echo '<style type="text/css">';

	//=========HEADER STYLING======//

	//menu list
	echo '.menus a, .navigation-right .links a, .menus li.menu-item-has-children:hover ul li a, .navigation-right .social-links li a{color:'.$menu_list.'}' ;
	echo '.site-header, .fixedwrap.site-header, .page-template-contact-template .site-header, .page-template-blog-sidebar-template .site-header, .page-template-gallery-template .site-header, .page-template-portfolio-grid-template .site-header, .page-template-portfolio-masonry-template .site-header, .single-post .site-header, .search-results .site-header, .archive .site-header, .error404 .site-header, .single-kedavra-portfolio .site-header .page-template-fullwidth-portfolio-template .site-header{background-color:'.$menu_bg.'}' ;
	echo '.menus ul{background-color:'.$sub_bg.'}' ;

	//=========CONTENT STYLING======//

	//title
	echo '.thetitle, #contact .info .title{color:'.$titlepage_color.'}' ;
	//desc
	echo 'p{color:'.$desc1_color.'}' ;
	//testi
	echo '.review p{color:'.$testi_color.'}' ;
	//newsletter
	echo '#subscribe .title{color:'.$newslet_title.'}' ;
	//blog
	echo 'section.blog .post .info .title, article.article .info .title{color:'.$blog_title.'}' ;
	echo 'section.blog .post .info .date{color:'.$blog_date.'}' ;
	echo 'section.blog .post .info{background-color:'.$blog_bg.'}' ;
	echo 'article.article .info .date{color:'.$blog_ds.'}' ;
	echo 'article.article .offset{background-color:'.$bg_article1.'}' ;
	echo 'article.article{background-color:'.$bg_article2.'}' ;
	echo '.post-meta a, .single-tag-bottom a, .single-category-bottom a, .comment-author .fn a, .logged-in-as a{color:'.$detail_post.'}' ;
	echo 'section.blog.style-2 .post .info{border-color:'.$bord_blog.'}' ;
	echo '#primary-sidebar .widget{background-color:'.$bg_sidebar.'}' ;
	echo '#primary-sidebar .widget-title{color:'.$title_widgetsid.'}' ;
	echo 'ul li a{color:'.$link_sidebar.'}' ;
	//portfolio
	echo '.causes-desc{background-color:'.$bg_port.'}' ;
	echo '.causes-desc h4{color:'.$title_port.'}' ;
	echo '.causes-desc span{color:'.$detail_causes.'}' ;
	echo '.cause-detail .bar{background-color:'.$bar_causes.'}' ;
	echo '.progress-detail .info ul li span i{color:'.$icon_causes.'}' ;
	echo 'a.link{color:'.$btn_causes.'}' ;
	echo 'a.link{border-color:'.$btn_causes.'}' ;
	echo '.with-detail .project-details h3.title, .full-width-detail .project-details h3.title{color:'.$title_portfolio.'}' ;
	echo '.project-details .client-detail p{color:'.$detail_portfolio.'}' ;
	echo '.link a{color:'.$website_portfolio.'}' ;
	echo '.link a:hover{color:'.$webhov_portfolio.'}' ;

	echo '#contact .form{background-color:'.$bg_form.'}' ;
	echo '.form .border, #contact .form input[type="text"], #contact .form input[type="email"], #contact .form textarea{border-color:'.$bord_form.'}' ;

	//=========BUILDER STYLING======//

	echo 'article.article .content p{color:'.$desc_color.'}' ;
	echo '.button.box.light a{color:'.$btn_slider.'}' ;
	echo '.button.box.light a{border-color:'.$btn_slider.'}' ;

	//=========FOOTER STYLING======//
	//bg footer
	echo '#footer{background-color:'.$bg_color.'}' ;
	echo '#footer.agency .footer-with-bg{background-color:'.$bg_color2.'}' ;
	echo '#footer .info .item{border-color:'.$bord_color.'}' ;
	echo '#footer .info .item .title{color:'.$title_widget.'}' ;
	echo '.info .textwidget p{color:'.$text_widget.'}' ;
	echo '#footer .copyright{color:'.$copyright_color.'}' ;
	echo '#footer .social li a{color:'.$socicon_color.'}' ;
	echo '#footer.agency .banner h1, #footer.architect .banner h1{color:'.$banner_color.'}' ;
	echo '.button.box a{border-color:'.$banner_btn.'}' ;
	echo '.button.box a{color:'.$banner_btn.'}' ;


	
	echo '</style> ';

	}

	add_action( 'wp_head', 'kedavra_customizer_header_output');