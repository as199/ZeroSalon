<?php

class Fullportfolio_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'fullportfolio-block',
			__('Full Width Portfolio Block', 'kedavra'),
			array(
				'description' => __('Widget to show full width portfolio', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(
				'fullportfolio_number' => array(
					'type' => 'number',
					'label' => __('Portfolio Show Number', 'kedavra'),
					'default' => 10,
				),

				'per_row' => array(
					'type' => 'number',
					'label' => __('Portfolio per row', 'kedavra'),
					'default' => 3,
				),

			),
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/fullportfolio-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('fullportfolio-block', __FILE__, 'Fullportfolio_Block');