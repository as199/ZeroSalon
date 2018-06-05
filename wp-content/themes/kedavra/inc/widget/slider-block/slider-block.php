<?php

class Heroslider_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'heroslider-block',
			__('Hero Slider Block', 'kedavra'),
			array(
				'description' => __('Widget to show hero slider', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'slider_type' => array(
	                'type' => 'radio',
					'label' => __( 'Select slider type', 'kedavra' ),
					'default' => 'style1',
					'state_emitter' => array(
				        'callback' => 'select',
				        'args' => array( 'slider_type' )
				    ),
					'options' => array(
						'style1' => __( 'Bordered Slider', 'kedavra' ),
						'style2' => __( 'Button Link Slider', 'kedavra' ),
					)
	            ),

	            'heroslider_overlay_color' => array(
			        'type' => 'color',
			        'label' => __( 'Hero Slider Overlay Color', 'kedavra' ),
			        'default' => '',
			        'state_handler' => array(
			        'slider_type[style1]' => array('show'),
			        'slider_type[style2]' => array('hide'),
			        	),
			    	),

	            'overlay_level' => array(
			        'type' => 'number',
			        'label' => __( 'Overlay Level (0-1)', 'kedavra' ),
			        'default' => '',
			        'state_handler' => array(
			        'slider_type[style1]' => array('show'),
			        'slider_type[style2]' => array('hide'),
			        	),
		    		),

				'heroslider1_item' => array(
		        'type' => 'repeater',
		        'label' => __( 'Slides' , 'kedavra' ),
		        'item_name'  => __( 'Slider Item', 'kedavra' ),
		        'item_label' => array(
		            'selector'     => "[id*='heroslider_title']",
		            'update_event' => 'change',
		            'value_method' => 'val'
		        ),
		        'state_handler' => array(
			        'slider_type[style1]' => array('show'),
			        'slider_type[style2]' => array('hide'),
		        ),

		        'fields' => array(
			   		'heroslider_img' => array(
				        'type' => 'media',
				        'label' => __( 'Insert Hero Slider', 'kedavra' ),
				        'choose' => __( 'Choose image', 'kedavra' ),
				        'update' => __( 'Set image', 'kedavra' ),
				        'library' => 'image'
				    	),

			   		'heroslider_title' => array(
		                'type' => 'text',
		                'label' => __( 'Your Hero Slider Title', 'kedavra' ),
		                'default' => '',
		            	),

		            'heroslider_subtitle' => array(
		                'type' => 'textarea',
				        'label' => __( 'Detail Content (HTML allowed)', 'kedavra' ),
				        'default' => '',
				        'allow_html_formatting' => true,
				        'rows' => 10
				    	),

		            'slide1_animation_anim' => array(
		                'type' => 'select',
							'label' => __( 'Slider Content Animation Animation', 'kedavra' ),
							'default' => 'fadeIn',
							'options' => array(
								'bounce' => __( 'bounce', 'kedavra' ),
							    'flash' => __( 'flash', 'kedavra' ),
							    'pulse' => __( 'pulse', 'kedavra' ),
							    'rubberBand' => __( 'rubberBand', 'kedavra' ),
							    'shake' => __( 'shake', 'kedavra' ),
							    'swing' => __( 'swing', 'kedavra' ),
							    'tada' => __( 'tada', 'kedavra' ),
							    'wobble' => __( 'wobble', 'kedavra' ),
							    'bounceIn' => __( 'bounceIn', 'kedavra' ),
							    'bounceInDown' => __( 'bounceInDown', 'kedavra' ),
							    'bounceInLeft' => __( 'bounceInLeft', 'kedavra' ),
							    'bounceInRight' => __( 'bounceInRight', 'kedavra' ),
							    'bounceInUp' => __( 'bounceInUp', 'kedavra' ),
							    'bounceOut' => __( 'bounceOut', 'kedavra' ),
							    'bounceOutDown' => __( 'bounceOutDown', 'kedavra' ),
							    'bounceOutLeft' => __( 'bounceOutLeft', 'kedavra' ),
							    'bounceOutRight' => __( 'bounceOutRight', 'kedavra' ),
							    'bounceOutUp' => __( 'bounceOutUp', 'kedavra' ),
							    'fadeIn' => __( 'fadeIn', 'kedavra' ),
							    'fadeInDown' => __( 'fadeInDown', 'kedavra' ),
							    'fadeInDownBig' => __( 'fadeInDownBig', 'kedavra' ),
							    'fadeInLeft' => __( 'fadeInLeft', 'kedavra' ),
							    'fadeInLeftBig' => __( 'fadeInLeftBig', 'kedavra' ),
							    'fadeInRight' => __( 'fadeInRight', 'kedavra' ),
							    'fadeInRightBig' => __( 'fadeInRightBig', 'kedavra' ),
							    'fadeInUp' => __( 'fadeInUp', 'kedavra' ),
							    'fadeInUpBig' => __( 'fadeInUpBig', 'kedavra' ),
							    'fadeOut' => __( 'fadeOut', 'kedavra' ),
							    'fadeOutDown' => __( 'fadeOutDown', 'kedavra' ),
							    'fadeOutDownBig' => __( 'fadeOutDownBig', 'kedavra' ),
							    'fadeOutLeft' => __( 'fadeOutLeft', 'kedavra' ),
							    'fadeOutLeftBig' => __( 'fadeOutLeftBig', 'kedavra' ),
							    'fadeOutRight' => __( 'fadeOutRight', 'kedavra' ),
							    'fadeOutRightBig' => __( 'fadeOutRightBig', 'kedavra' ),
							    'fadeOutUp' => __( 'fadeOutUp', 'kedavra' ),
							    'fadeOutUpBig' => __( 'fadeOutUpBig', 'kedavra' ),
							    'flipInX' => __( 'flipInX', 'kedavra' ),
							    'flipInY' => __( 'flipInY', 'kedavra' ),
							    'flipOutX' => __( 'flipOutX', 'kedavra' ),
							    'flipOutY' => __( 'flipOutY', 'kedavra' ),
							    'lightSpeedIn' => __( 'lightSpeedIn', 'kedavra' ),
							    'lightSpeedOut' => __( 'lightSpeedOut', 'kedavra' ),
							    'rotateIn' => __( 'rotateIn', 'kedavra' ),
							    'rotateInDownLeft' => __( 'rotateInDownLeft', 'kedavra' ),
							    'rotateInDownRight' => __( 'rotateInDownRight', 'kedavra' ),
							    'rotateInUpLeft' => __( 'rotateInUpLeft', 'kedavra' ),
							    'rotateInUpRight' => __( 'rotateInUpRight', 'kedavra' ),
							    'rotateOut' => __( 'rotateOut', 'kedavra' ),
							    'rotateOutDownLeft' => __( 'rotateOutDownLeft', 'kedavra' ),
							    'rotateOutDownRight' => __( 'rotateOutDownRight', 'kedavra' ),
							    'rotateOutUpLeft' => __( 'rotateOutUpLeft', 'kedavra' ),
							    'rotateOutUpRight' => __( 'rotateOutUpRight', 'kedavra' ),
							    'hinge' => __( 'hinge', 'kedavra' ),
							    'rollIn' => __( 'rollIn', 'kedavra' ),
							    'rollOut' => __( 'rollOut', 'kedavra' ),
							    'zoomIn' => __( 'zoomIn', 'kedavra' ),
							    'zoomInDown' => __( 'zoomInDown', 'kedavra' ),
							    'zoomInLeft' => __( 'zoomInLeft', 'kedavra' ),
							    'zoomInRight' => __( 'zoomInRight', 'kedavra' ),
							    'zoomInUp' => __( 'zoomInUp', 'kedavra' ),
							    'zoomOut' => __( 'zoomOut', 'kedavra' ),
							    'zoomOutDown' => __( 'zoomOutDown', 'kedavra' ),
							    'zoomOutLeft' => __( 'zoomOutLeft', 'kedavra' ),
							    'zoomOutRight' => __( 'zoomOutRight', 'kedavra' ),
							    'zoomOutUp' => __( 'zoomOutUp', 'kedavra' ),
							    'slideInDown' => __( 'slideInDown', 'kedavra' ),
							    'slideInLeft' => __( 'slideInLeft', 'kedavra' ),
							    'slideInRight' => __( 'slideInRight', 'kedavra' ),
							    'slideInUp' => __( 'slideInUp', 'kedavra' ),
							    'slideOutDown' => __( 'slideOutDown', 'kedavra' ),
							    'slideOutLeft' => __( 'slideOutLeft', 'kedavra' ),
							    'slideOutRight' => __( 'slideOutRight', 'kedavra' ),
							    'slideOutUp' => __( 'slideOutUp', 'kedavra' ),
							),
		            	),
				    'slide1_animation_delay' => array(
		                'type' => 'number',
		                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
		                'default' => '0.2',
		            	),
					),
					//field repeater end
		   		),
		   		//slider1_item end
		   		
	            'section_to_link' => array(
	                'type' => 'text',
	                'label' => __( 'Insert an ID or class of block you want to linked', 'kedavra' ),
	                'default' => '',
						'state_handler' => array(
					        'slider_type[style1]' => array('show'),
					        'slider_type[style2]' => array('hide'),
				        ),
	            	),

	            'heroslider2_item' => array(
			        'type' => 'repeater',
			        'label' => __( 'Slides' , 'kedavra' ),
			        'item_name'  => __( 'Slider Item', 'kedavra' ),
			        'item_label' => array(
			            'selector'     => "[id*='heroslider_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
			        'state_handler' => array(
				        'slider_type[style1]' => array('hide'),
				        'slider_type[style2]' => array('show'),
			        ),

		        'fields' => array(
			   		'heroslider_img' => array(
				        'type' => 'media',
				        'label' => __( 'Insert Hero Slider', 'kedavra' ),
				        'choose' => __( 'Choose image', 'kedavra' ),
				        'update' => __( 'Set image', 'kedavra' ),
				        'library' => 'image'
				    	),
		            'heroslider_title' => array(
		                'type' => 'textarea',
				        'label' => __( 'Slider Title (HTML allowed)', 'kedavra' ),
				        'default' => '',
				        'allow_html_formatting' => true,
				        'rows' => 5,
				    	),
		            'heroslider_button' => array(
		                'type' => 'text',
		                'label' => __( 'Your Hero Slider Button', 'kedavra' ),
		                'default' => '',
		            	),
		            'heroslider_link' => array(
		                'type' => 'text',
		                'label' => __( 'Your Hero Slider Link', 'kedavra' ),
		                'default' => '',
		            	),
		            'slide2_animation_anim' => array(
		                'type' => 'select',
							'label' => __( 'Slider Content Animation Animation', 'kedavra' ),
							'default' => 'fadeIn',
							'options' => array(
								'bounce' => __( 'bounce', 'kedavra' ),
							    'flash' => __( 'flash', 'kedavra' ),
							    'pulse' => __( 'pulse', 'kedavra' ),
							    'rubberBand' => __( 'rubberBand', 'kedavra' ),
							    'shake' => __( 'shake', 'kedavra' ),
							    'swing' => __( 'swing', 'kedavra' ),
							    'tada' => __( 'tada', 'kedavra' ),
							    'wobble' => __( 'wobble', 'kedavra' ),
							    'bounceIn' => __( 'bounceIn', 'kedavra' ),
							    'bounceInDown' => __( 'bounceInDown', 'kedavra' ),
							    'bounceInLeft' => __( 'bounceInLeft', 'kedavra' ),
							    'bounceInRight' => __( 'bounceInRight', 'kedavra' ),
							    'bounceInUp' => __( 'bounceInUp', 'kedavra' ),
							    'bounceOut' => __( 'bounceOut', 'kedavra' ),
							    'bounceOutDown' => __( 'bounceOutDown', 'kedavra' ),
							    'bounceOutLeft' => __( 'bounceOutLeft', 'kedavra' ),
							    'bounceOutRight' => __( 'bounceOutRight', 'kedavra' ),
							    'bounceOutUp' => __( 'bounceOutUp', 'kedavra' ),
							    'fadeIn' => __( 'fadeIn', 'kedavra' ),
							    'fadeInDown' => __( 'fadeInDown', 'kedavra' ),
							    'fadeInDownBig' => __( 'fadeInDownBig', 'kedavra' ),
							    'fadeInLeft' => __( 'fadeInLeft', 'kedavra' ),
							    'fadeInLeftBig' => __( 'fadeInLeftBig', 'kedavra' ),
							    'fadeInRight' => __( 'fadeInRight', 'kedavra' ),
							    'fadeInRightBig' => __( 'fadeInRightBig', 'kedavra' ),
							    'fadeInUp' => __( 'fadeInUp', 'kedavra' ),
							    'fadeInUpBig' => __( 'fadeInUpBig', 'kedavra' ),
							    'fadeOut' => __( 'fadeOut', 'kedavra' ),
							    'fadeOutDown' => __( 'fadeOutDown', 'kedavra' ),
							    'fadeOutDownBig' => __( 'fadeOutDownBig', 'kedavra' ),
							    'fadeOutLeft' => __( 'fadeOutLeft', 'kedavra' ),
							    'fadeOutLeftBig' => __( 'fadeOutLeftBig', 'kedavra' ),
							    'fadeOutRight' => __( 'fadeOutRight', 'kedavra' ),
							    'fadeOutRightBig' => __( 'fadeOutRightBig', 'kedavra' ),
							    'fadeOutUp' => __( 'fadeOutUp', 'kedavra' ),
							    'fadeOutUpBig' => __( 'fadeOutUpBig', 'kedavra' ),
							    'flipInX' => __( 'flipInX', 'kedavra' ),
							    'flipInY' => __( 'flipInY', 'kedavra' ),
							    'flipOutX' => __( 'flipOutX', 'kedavra' ),
							    'flipOutY' => __( 'flipOutY', 'kedavra' ),
							    'lightSpeedIn' => __( 'lightSpeedIn', 'kedavra' ),
							    'lightSpeedOut' => __( 'lightSpeedOut', 'kedavra' ),
							    'rotateIn' => __( 'rotateIn', 'kedavra' ),
							    'rotateInDownLeft' => __( 'rotateInDownLeft', 'kedavra' ),
							    'rotateInDownRight' => __( 'rotateInDownRight', 'kedavra' ),
							    'rotateInUpLeft' => __( 'rotateInUpLeft', 'kedavra' ),
							    'rotateInUpRight' => __( 'rotateInUpRight', 'kedavra' ),
							    'rotateOut' => __( 'rotateOut', 'kedavra' ),
							    'rotateOutDownLeft' => __( 'rotateOutDownLeft', 'kedavra' ),
							    'rotateOutDownRight' => __( 'rotateOutDownRight', 'kedavra' ),
							    'rotateOutUpLeft' => __( 'rotateOutUpLeft', 'kedavra' ),
							    'rotateOutUpRight' => __( 'rotateOutUpRight', 'kedavra' ),
							    'hinge' => __( 'hinge', 'kedavra' ),
							    'rollIn' => __( 'rollIn', 'kedavra' ),
							    'rollOut' => __( 'rollOut', 'kedavra' ),
							    'zoomIn' => __( 'zoomIn', 'kedavra' ),
							    'zoomInDown' => __( 'zoomInDown', 'kedavra' ),
							    'zoomInLeft' => __( 'zoomInLeft', 'kedavra' ),
							    'zoomInRight' => __( 'zoomInRight', 'kedavra' ),
							    'zoomInUp' => __( 'zoomInUp', 'kedavra' ),
							    'zoomOut' => __( 'zoomOut', 'kedavra' ),
							    'zoomOutDown' => __( 'zoomOutDown', 'kedavra' ),
							    'zoomOutLeft' => __( 'zoomOutLeft', 'kedavra' ),
							    'zoomOutRight' => __( 'zoomOutRight', 'kedavra' ),
							    'zoomOutUp' => __( 'zoomOutUp', 'kedavra' ),
							    'slideInDown' => __( 'slideInDown', 'kedavra' ),
							    'slideInLeft' => __( 'slideInLeft', 'kedavra' ),
							    'slideInRight' => __( 'slideInRight', 'kedavra' ),
							    'slideInUp' => __( 'slideInUp', 'kedavra' ),
							    'slideOutDown' => __( 'slideOutDown', 'kedavra' ),
							    'slideOutLeft' => __( 'slideOutLeft', 'kedavra' ),
							    'slideOutRight' => __( 'slideOutRight', 'kedavra' ),
							    'slideOutUp' => __( 'slideOutUp', 'kedavra' ),
							),
		            	),
				    'slide2_animation_delay' => array(
		                'type' => 'number',
		                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
		                'default' => '0.2',
		            	),
					),
					//field repeater end
		   		),
		   		//slider1_item end

			),
			//heroslider end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/heroslider-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('heroslider-block', __FILE__, 'Heroslider_block');