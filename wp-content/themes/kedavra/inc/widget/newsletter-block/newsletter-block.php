<?php

class Newsletter_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'newsletter-block',
			__('Newsletter Block', 'kedavra'),
			array(
				'description' => __('Widget to show Newsletter Form', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

		   		'newsletter_template' => array(
	                'type' => 'text',
	                'label' => __( 'Paste Newsletter ID here', 'kedavra' ),
	                'default' => '',
	            	),

			),
			//newsletter end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/newsletter-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('newsletter-block', __FILE__, 'Newsletter_block');