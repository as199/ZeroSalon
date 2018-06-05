<?php

class Clear_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'clear-block',
			__('Clear Block', 'kedavra'),
			array(
				'description' => __('Widget to show Clear Description', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

		   		'clear_px' => array(
					'type' => 'number',
					'label' => __('Clear Padding Top & Bottom', 'kedavra'),
					'default' => '',
					),

	            'use_border' => array(
					'type' => 'checkbox',
					'label' => __('Use Border Clear', 'kedavra'),
					'default' => true,
				),

				'border_type' => array(
					'type' => 'select',
					'label' => __( 'Border Type', 'kedavra' ),
					'default' => 'solid',
					'options' => array(
						'solid' => __( 'Solid Border', 'kedavra' ),
						'dashed' => __( 'Dashed Border', 'kedavra' ),
						'dotted' => __( 'Dotted Border', 'kedavra' ),
					)
				),

				'border_height' => array(
					'type' => 'number',
					'label' => __('Border Height', 'kedavra'),
					'default' => '',
					),

				'border_color' => array(
			        'type' => 'color',
			        'label' => __( 'Border Color', 'kedavra' ),
			        'default' => '',
			    ),

			),
			//clear end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/clear-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('clear-block', __FILE__, 'Clear_block');