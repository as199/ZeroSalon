<?php

class Portfolio_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'portfolio-block',
			__('Portfolio Masonry Block', 'kedavra'),
			array(
				'description' => __('Widget to show portfolio', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(
				'portfolio_number' => array(
					'type' => 'number',
					'label' => __('Portfolio Show Number', 'kedavra'),
					'default' => 10,
				),

				'per_row' => array(
					'type' => 'number',
					'label' => __('Portfolio per row', 'kedavra'),
					'default' => 3,
				),

				'portfolio_filter' => array(
					'type' => 'checkbox',
					'label' => __('Show Filter', 'kedavra'),
					'default' => false,
				),

				'portfolio_button' => array(
					'type' => 'text',
					'label' => __( 'Button Text', 'kedavra' ),
					'default' => 'View More'
				),

				'portfolio_link' => array(
					'type' => 'text',
					'label' => __( 'Button Link', 'kedavra' ),
					'default' => ''
				),
			),
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/portfolio-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('portfolio-block', __FILE__, 'Portfolio_Block');