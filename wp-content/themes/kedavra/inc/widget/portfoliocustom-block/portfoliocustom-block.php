<?php

class Portfoliocustom_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'portfoliocustom-block',
			__('Portfolio Custom Block', 'kedavra'),
			array(
				'description' => __('Widget to show portfolio custom link', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

	            'portfoliocustom_display' => array(
					'type' => 'number',
					'label' => __('Portfolio item to display', 'kedavra'),
					'default' => 10,
				),

	            'per_row' => array(
					'type' => 'number',
					'label' => __('Portfolio per row', 'kedavra'),
					'default' => 3,
				),

			),
			//portfoliocustom end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/portfoliocustom-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('portfoliocustom-block', __FILE__, 'Portfoliocustom_Block');