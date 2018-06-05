<?php

class Grid_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'grid-block',
			__('Portfolio Grid Block', 'kedavra'),
			array(
				'description' => __('Widget to show portfolio grid', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(
				'grid_number' => array(
					'type' => 'number',
					'label' => __('Portfolio Show Number', 'kedavra'),
					'default' => 10,
				),

				'per_row' => array(
					'type' => 'number',
					'label' => __('Portfolio per row', 'kedavra'),
					'default' => 3,
				),

				'grid_filter' => array(
					'type' => 'checkbox',
					'label' => __('Show Filter', 'kedavra'),
					'default' => false,
				),

				'grid_button' => array(
					'type' => 'text',
					'label' => __( 'Button Text', 'kedavra' ),
					'default' => 'View More'
				),

				'grid_link' => array(
					'type' => 'text',
					'label' => __( 'Button Link', 'kedavra' ),
					'default' => ''
				),
			),
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/grid-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('grid-block', __FILE__, 'Grid_Block');