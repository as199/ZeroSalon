<?php

class Slogan_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'slogan-block',
			__('Slogan Block', 'kedavra'),
			array(
				'description' => __('Widget to show Slogan', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'slogan_block_anim' => array(
	                'type' => 'select',
						'label' => __( 'Slogan Block Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'slogan_block_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

		   		'slogan_title' => array(
	                'type' => 'text',
	                'label' => __( 'Your Slogan Title', 'kedavra' ),
	                'default' => '',
	            	),

	            'slogan_subtitle' => array(
	                'type' => 'textarea',
			        'label' => __( 'Slogan Description', 'kedavra' ),
			        'default' => '',
			        'allow_html_formatting' => true,
			        'rows' => 10
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

	            'slogan_text_link' => array(
	                'type' => 'text',
	                'label' => __( 'Slogan Text Link', 'kedavra' ),
	                'default' => '',
	            	),

	            'slogan_link' => array(
	                'type' => 'text',
	                'label' => __( 'Slogan Link', 'kedavra' ),
	                'default' => '',
	            	),

	            'slogan_text_color' => array(
			        'type' => 'color',
			        'label' => __( 'Slogan Text Color', 'kedavra' ),
			        'default' => '',
			    ),

			    'slogan_button_color' => array(
			        'type' => 'color',
			        'label' => __( 'Slogan Button Color', 'kedavra' ),
			        'default' => '',
			    ),

			    'slogan_overlay_color' => array(
			        'type' => 'color',
			        'label' => __( 'Slogan Overlay Color', 'kedavra' ),
			        'default' => '#171a1f',
			    	),

	            'overlay_level' => array(
			        'type' => 'number',
			        'label' => __( 'Overlay Level (0-1)', 'kedavra' ),
			        'default' => '0.9',
		    		),

			),
			//slogan end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/slogan-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['slogan_block_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('slogan-block', __FILE__, 'Slogan_block');