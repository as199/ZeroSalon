<?php

class Counter_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'counter-block',
			__('Counter Block', 'kedavra'),
			array(
				'description' => __('Widget to show counter bar', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(
				'counter_border' => array(
					'type' => 'checkbox',
					'label' => __('Use Border', 'kedavra'),
					'default' => true,
				),
				'counter_anim' => array(
	                'type' => 'select',
						'label' => __( 'Counter Block Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),
			    'anim_counter_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),
				'per_row' => array(
					'type' => 'number',
					'label' => __('Counter per row', 'kedavra'),
					'default' => 4,
				),
		   		'counter_item' => array(
		        'type' => 'repeater',
		        'label' => __( 'Counters' , 'kedavra' ),
		        'item_name'  => __( 'counter', 'kedavra' ),
		        'item_label' => array(
		            'selector'     => "[id*='counter']",
		            'update_event' => 'change',
		            'value_method' => 'val'
		        ),

		        'fields' => array(
		            'counter_number' => array(
				        'type' => 'number',
						'label' => __('Counter Value', 'kedavra'),
						'default' => '',
			    		),
		            'counter_title' => array(
				        'type' => 'text',
				        'label' => __('Counters Title', 'kedavra'),
				        'default' => '',
				   		),
		            'counter_color' => array(
				        'type' => 'color',
				        'label' => __( 'Counter Text Color', 'kedavra' ),
				        'default' => '',
					    ),
		        	),
					//field repeater end
		   		),
		   		//counter bar end
			),
			//counter end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/counter-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['counter_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('counter-block', __FILE__, 'Counter_Block');