<?php

class Team_Block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'team-block',
			__('Team Block', 'kedavra'),
			array(
				'description' => __('Widget to show team post', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

	            'team_type' => array(
	                'type' => 'select',
						'label' => __( 'Select Team Block Type', 'kedavra' ),
						'default' => 'style1',
						'options' => array(
							'style1' => __( 'Team with inner overlay', 'kedavra' ),
							'style2' => __( 'Team with image on right side', 'kedavra' ),
							/*'style3' => __( 'Team with image above', 'kedavra' ),*/
						)
	            	),

	            'team_display' => array(
					'type' => 'number',
					'label' => __('Team to display', 'kedavra'),
					'default' => 4,
				),

	            'per_row' => array(
					'type' => 'number',
					'label' => __('Team per row', 'kedavra'),
					'default' => 4,
				),

				'team_img_anim' => array(
	                'type' => 'select',
						'label' => __( 'Team Image Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'team_img_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

			    'team_desc_anim' => array(
	                'type' => 'select',
						'label' => __( 'Team Description Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'team_desc_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

			),
			//team end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/team-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['team_img_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		$form['team_desc_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('team-block', __FILE__, 'Team_Block');