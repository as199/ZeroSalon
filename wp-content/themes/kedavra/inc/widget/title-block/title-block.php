<?php

class Title_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'title-block',
			__('The Title Block', 'kedavra'),
			array(
				'description' => __('Widget to show title', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

	            'title_type' => array(
	                'type' => 'select',
						'label' => __( 'Select Title Type', 'kedavra' ),
						'default' => 'default',
					    'state_emitter' => array(
					        'callback' => 'select',
					        'args' => array( 'title_type' )
					    ),
						'options' => array(
							'default' => __( 'No Formatting', 'kedavra' ),
							'featured' => __( 'Bordered Background', 'kedavra' ),
							'subtitled' => __( 'Subtitled Title', 'kedavra' ),
						)
	            	),

	            'title_overlay_color' => array(
			        'type' => 'color',
			        'label' => __( 'Title Overlay Color', 'kedavra' ),
			        'default' => '#171a1f',
			        'state_handler' => array(
				        'title_type[default]' => array('hide'),
				        'title_type[featured]' => array('show'),
				        'title_type[subtitled]' => array('hide'),
			        	),
			    	),

	            'overlay_level' => array(
			        'type' => 'number',
			        'label' => __( 'Overlay Level (0-1)', 'kedavra' ),
			        'default' => '0.9',
			        'state_handler' => array(
				        'title_type[default]' => array('hide'),
				        'title_type[featured]' => array('show'),
				        'title_type[subtitled]' => array('hide'),
			        	),
		    		),

	            'the_title' => array(
					'type' => 'section',
					'label'  => __( 'The Title', 'kedavra' ),
					'hide'   => false,
					'fields' => array(

						'text' => array(
							'type' => 'text',
							'label' => __( 'Text', 'kedavra' ),
						),
						'subtitle' => array(
							'type' => 'textarea',
					        'label' => __( 'Subtitle Text (HTML Allowed)', 'kedavra' ),
					        'default' => '',
					        'allow_html_formatting' => false,
					        'rows' => 5,
						),
						'color' => array(
							'type' => 'color',
							'label' => __('Color', 'kedavra'),
							'default' => '#000000'
						),
						'align' => array(
							'type' => 'select',
							'label' => __( 'Align', 'kedavra' ),
							'default' => 'center',
							'options' => array(
								'center' => __( 'Center', 'kedavra' ),
								'left' => __( 'Left', 'kedavra' ),
								'right' => __( 'Right', 'kedavra' ),
								'justify' => __( 'Justify', 'kedavra' )
							)
						),
						'font_style' => array(
							'type' => 'select',
							'label' => __( 'Font Style', 'kedavra' ),
							'default' => 'default',
							'options' => array(
								'default' => __( 'Default', 'kedavra' ),
								'italic' => __( 'Italic', 'kedavra' ),
							)
						),
					)
				),

				'title_block_anim' => array(
	                'type' => 'select',
						'label' => __( 'The Title Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'title_block_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

			),
			//title end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/title-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['title_block_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

	/**
	 * Get the template variables for the headline
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		return array(
			'title' => $instance['the_title']['text']
		);
	}

}

siteorigin_widget_register('title-block', __FILE__, 'Title_block');