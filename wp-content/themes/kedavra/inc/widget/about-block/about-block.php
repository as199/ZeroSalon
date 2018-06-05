<?php

global $animation_choice;

class About_block extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'about-block',
			__('About Block', 'kedavra'),

			array(
				'description' => __('Widget to show About Description', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),

			array(

			),

			array(

		   		'about_img' => array(
			        'type' => 'media',
			        'label' => __( 'Insert About Image', 'kedavra' ),
			        'choose' => __( 'Choose image', 'kedavra' ),
			        'update' => __( 'Set image', 'kedavra' ),
			        'library' => 'image'
			    ),

			    'about_img_anim' => array(
	                'type' => 'select',
						'label' => __( 'About Image Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'anim_img_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

		   		'about_title' => array(
	                'type' => 'text',
	                'label' => __( 'Your About Title', 'kedavra' ),
	                'default' => '',
	            ),

	            'about_subtitle' => array(
	                'type' => 'textarea',
			        'label' => __( 'About Description', 'kedavra' ),
			        'default' => '',
			        'allow_html_formatting' => true,
			        'rows' => 10
			    ),

			    'about_desc_anim' => array(
	                'type' => 'select',
						'label' => __( 'About Text Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'anim_desc_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

	            'about_title_color' => array(
			        'type' => 'color',
			        'label' => __( 'About Title Color', 'kedavra' ),
			        'default' => '',
			    ),

	            'text_align' => array(
	                'type' => 'select',
						'label' => __( 'Title Align ', 'kedavra' ),
						'default' => 'text-center',
						'options' => array(
							'text-center' => __( 'Center', 'kedavra' ),
							'text-right' => __( 'Right', 'kedavra' ),
							'text-left' => __( 'Left', 'kedavra' ),
						)
	            	),

	            'button_type' => array(
	                'type' => 'select',
						'label' => __( 'Button Type ', 'kedavra' ),
						'default' => 'default',
						'options' => array(
							'default' => __( 'With Border Bottom', 'kedavra' ),
							'background' => __( 'With Background Color', 'kedavra' ),
						)
	            	),

	            'about_text_link' => array(
	                'type' => 'text',
	                'label' => __( 'About Text Link', 'kedavra' ),
	                'default' => '',
	            	),

	            'about_link' => array(
	                'type' => 'text',
	                'label' => __( 'About Link', 'kedavra' ),
	                'default' => '',
	            	),

	            'about_button_color' => array(
			        'type' => 'color',
			        'label' => __( 'About Button Color', 'kedavra' ),
			        'default' => '',
			    ),

			),
			//about end
			
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/about-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['about_img_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		$form['about_desc_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}


siteorigin_widget_register('about-block', __FILE__, 'About_block');