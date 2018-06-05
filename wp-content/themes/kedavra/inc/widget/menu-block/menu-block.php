<?php

class Menu_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'menu-block',
			__('Menu Block', 'kedavra'),
			array(
				'description' => __('Widget to show Menu', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'menu_item' => array(
		        'type' => 'repeater',
		        'label' => __( 'Menus' , 'kedavra' ),
		        'item_name'  => __( 'menu', 'kedavra' ),
		        'item_label' => array(
		            'selector'     => "[id*='menu_title']",
		            'update_event' => 'change',
		            'value_method' => 'val'
		        ),

		        'fields' => array(

			   		'menu_title' => array(
		                'type' => 'text',
		                'label' => __( 'Your Menu Title', 'kedavra' ),
		                'default' => '',
		            	),

		            'menu_subtitle' => array(
		                'type' => 'text',
				        'label' => __( 'Menu Subtitle', 'kedavra' ),
				        'default' => '',
				    	),

		            'menu_price' => array(
		                'type' => 'text',
		                'label' => __( 'Menu Price', 'kedavra' ),
		                'default' => '',
		            	),

		            'menu_title_color' => array(
				        'type' => 'color',
				        'label' => __( 'Menu Title Color', 'kedavra' ),
				        'default' => '',
					    ),

		            'menu_subtitle_color' => array(
				        'type' => 'color',
				        'label' => __( 'Menu Description Color', 'kedavra' ),
				        'default' => '',
					    ),

		            'menu_price_color' => array(
				        'type' => 'color',
				        'label' => __( 'Menu Price Color', 'kedavra' ),
				        'default' => '',
					    ),

		            'menu_block_anim' => array(
		                'type' => 'select',
							'label' => __( 'Menu Item Animation', 'kedavra' ),
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

				    'menu_block_delay' => array(
		                'type' => 'number',
		                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
		                'default' => '0.2',
		            	),
		            ),
					//field repeater end
		   		),
		   		//menu_item end

			),
			//menu end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/menu-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('menu-block', __FILE__, 'Menu_block');