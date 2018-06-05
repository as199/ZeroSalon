<?php

class Partner_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'partner-block',
			__('Partner Block', 'kedavra'),
			array(
				'description' => __('Widget to show partner', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'partner_display' => array(
				'type' => 'number',
				'label' => __('Partner Item Per Slide', 'kedavra'),
				'default' => 4,
				),

				'partner_item' => array(
		        'type' => 'repeater',
		        'label' => __( 'Partner' , 'kedavra' ),
		        'item_name'  => __( 'Partner Item', 'kedavra' ),
		        'item_label' => array(
		            'selector'     => "[id*='partner']",
		            'update_event' => 'change',
		            'value_method' => 'val'
		        ),

		        'fields' => array(
		            'partner_name' => array(
		                'type' => 'text',
		                'label' => __( 'Partner Name', 'kedavra' ),
		                'default' => '',
		            	),

		            'partner_img' => array(
				        'type' => 'media',
				        'label' => __( 'Insert Partner Image', 'kedavra' ),
				        'choose' => __( 'Choose image', 'kedavra' ),
				        'update' => __( 'Set image', 'kedavra' ),
				        'library' => 'image'
				    	),
		        	),
					//field repeater end
		   		),
		   		//partner_item end
			),
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/partner-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('partner-block', __FILE__, 'Partner_Block');