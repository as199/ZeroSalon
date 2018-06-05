<?php

class Heroimage_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'heroimage-block',
			__('Hero Image Block', 'kedavra'),
			array(
				'description' => __('Widget to show hero image', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'heroimage_type' => array(
	                'type' => 'select',
						'label' => __( 'Select hero image block', 'kedavra' ),
						'default' => 'heroimage_style1',
						'state_emitter' => array(
					        'callback' => 'select',
					        'args' => array( 'heroimage_type' )
					    ),
						'options' => array(
							'heroimage_style1' => __( 'Full Height With Border', 'kedavra' ),
							'heroimage_style2' => __( 'Hero Image with Logo', 'kedavra' ),
							'heroimage_style3' => __( 'Hero Image with Button', 'kedavra' ),
						)
	            	),

		 		'heroimage_title' => array(
	                'type' => 'text',
	                'label' => __( 'Your Hero Image Title', 'kedavra' ),
	                'default' => '',
	            	),

	            'heroimage_subtitle' => array(
	                'type' => 'textarea',
			        'label' => __( 'Detail Content (HTML allowed)', 'kedavra' ),
			        'default' => '',
			        'allow_html_formatting' => true,
			        'rows' => 10
			    	),

	            'text_align' => array(
	                'type' => 'select',
						'label' => __( 'Content Align ', 'kedavra' ),
						'default' => 'text-center',
						'options' => array(
							'text-center' => __( 'Center', 'kedavra' ),
							'text-right' => __( 'Right', 'kedavra' ),
							'text-left' => __( 'Left', 'kedavra' ),
						)
	            	),

	            'hero_img_anim' => array(
	                'type' => 'select',
						'label' => __( 'Hero Image Content Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'hero_img_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

	            'heroimage_text_color' => array(
			        'type' => 'color',
			        'label' => __( 'Hero Image Text Color', 'kedavra' ),
			        'default' => '',
			    	),

	            'heroimage_overlay_color' => array(
			        'type' => 'color',
			        'label' => __( 'Hero Image Overlay Color', 'kedavra' ),
			        'default' => '',
			        'state_handler' => array(
				        'heroimage_type[heroimage_style1]' => array('show'),
				        'heroimage_type[heroimage_style2]' => array('hide'),
				        'heroimage_type[heroimage_style3]' => array('show'),
			        	),
			    	),

	            'overlay_level' => array(
			        'type' => 'number',
			        'label' => __( 'Overlay Level (0-1)', 'kedavra' ),
			        'default' => '',
			        'state_handler' => array(
				        'heroimage_type[heroimage_style1]' => array('show'),
				        'heroimage_type[heroimage_style2]' => array('hide'),
				        'heroimage_type[heroimage_style3]' => array('show'),
			        	),
		    		),

	            'section_to_link' => array(
	                'type' => 'text',
	                'label' => __( 'Insert an ID or class of block you want to linked', 'kedavra' ),
	                'default' => '',
					'state_handler' => array(
				        'heroimage_type[heroimage_style1]' => array('show'),
				        'heroimage_type[heroimage_style2]' => array('hide'),
				        'heroimage_type[heroimage_style3]' => array('show'),
			        	),
	            	),

	            'heroimage_img' => array(
			        'type' => 'media',
			        'label' => __( 'Insert Hero Image', 'kedavra' ),
			        'choose' => __( 'Choose image', 'kedavra' ),
			        'update' => __( 'Set image', 'kedavra' ),
			        'library' => 'image',
			        'state_handler' => array(
				        'heroimage_type[heroimage_style1]' => array('hide'),
				        'heroimage_type[heroimage_style2]' => array('show'),
				        'heroimage_type[heroimage_style3]' => array('hide'),
			        	),
			    	),

	            'heroimage_button' => array(
		        'type' => 'repeater',
		        'label' => __( 'Hero Image Button' , 'kedavra' ),
		        'item_name'  => __( 'The Button', 'kedavra' ),
		        'state_handler' => array(
			        'heroimage_type[heroimage_style1]' => array('hide'),
			        'heroimage_type[heroimage_style2]' => array('hide'),
			        'heroimage_type[heroimage_style3]' => array('show'),
		        	),
		        'item_label' => array(
		            'selector'     => "[id*='button_slide']",
		            'update_event' => 'change',
		            'value_method' => 'val'
		        ),

		        'fields' => array(

					'button_img_text' => array(
						'type' => 'text',
						'label' => __( 'Button Text', 'kedavra' ),
						'default' => '',
						),

					'button_img_link' => array(
						'type' => 'text',
						'label' => __( 'Button Link', 'kedavra' ),
						'default' => '',
						),

					),
					//field repeater end
		   		),

			),
			//heroimage end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/heroimage-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['hero_img_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('heroimage-block', __FILE__, 'Heroimage_block');