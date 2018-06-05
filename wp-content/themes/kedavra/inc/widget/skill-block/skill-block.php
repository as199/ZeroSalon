<?php

class Skill_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'skill-block',
			__('Skill Block', 'kedavra'),
			array(
				'description' => __('Widget to show skill bar', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(
				'skill_title' => array(
			        'type' => 'text',
			        'label' => __('Skills Title', 'kedavra'),
			        'default' => '',
		   			),

				'skill_block_anim' => array(
	                'type' => 'select',
						'label' => __( 'Skill Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'skill_block_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

		   		'skill_bar' => array(
			        'type' => 'repeater',
			        'label' => __( 'Skills' , 'kedavra' ),
			        'item_name'  => __( 'skill', 'kedavra' ),
			        'item_label' => array(
			            'selector'     => "[id*='skill_name']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),

		        'fields' => array(
		            'skill_name' => array(
		                'type' => 'text',
		                'label' => __( 'Your Skill Name', 'kedavra' ),
		                'default' => '',
		            	),

		            'skill_number' => array(
				        'type' => 'slider',
				        'label' => __( 'Insert Skill Value', 'kedavra' ),
				        'default' => '',
				        'min' => 0,
				        'max' => 100,
				        'integer' => true
			    		),

		            'skill_color' => array(
				        'type' => 'color',
				        'label' => __( 'Skill Bar Color', 'kedavra' ),
				        'default' => '',
				    	),

		        	),
					//field repeater end
		   		),
		   		//skill bar end
			),
			//skill end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/skill-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['skill_block_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('skill-block', __FILE__, 'Skill_Block');