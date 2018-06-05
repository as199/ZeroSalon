<?php

class Testimonial_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'testimonial-block',
			__('Testimonial Block', 'kedavra'),
			array(
				'description' => __('Block to show testimonial', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(
				'testimonial_number' => array(
					'type' => 'number',
					'label' => __('Testimonial Show Number', 'kedavra'),
					'default' => 3,
				),

			    'testi_author_color' => array(
			        'type' => 'color',
			        'label' => __( 'Testimonial Author and Job Color', 'kedavra' ),
			        'default' => '',
			    ),

				'testimonial_nav' => array(
					'type' => 'select',
					'label' => __( 'Show Navigation', 'kedavra' ),
					'default' => 'true',
					'options' => array(
						'true' => __( 'Show', 'kedavra' ),
						'false' => __( 'Hidden', 'kedavra' ),
					)
				),

				'testimonial_animation' => array(
					'type' => 'select',
					'label' => __( 'Testimonial Slide Animation', 'kedavra' ),
					'default' => 'slide',
					'options' => array(
						'slide' => __( 'Slide', 'kedavra' ),
						'fade' => __( 'Fade', 'kedavra' ),
					)
				),
			),
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/testimonial-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('testimonial-block', __FILE__, 'Testimonial_block');