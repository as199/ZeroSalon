<?php

class Image_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'image-block',
			__('Image Block', 'kedavra'),
			array(
				'description' => __('Widget to show Image', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

	            'image_file' => array(
	                'type' => 'media',
					'label' => __( 'Insert Image', 'kedavra' ),
					'choose' => __( 'Choose image', 'kedavra' ),
					'update' => __( 'Set image', 'kedavra' ),
					'library' => 'image'
					),

	            'image_block_anim' => array(
	                'type' => 'select',
						'label' => __( 'Image Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'anim_image_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

			),
			//image end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/image-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['image_block_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('image-block', __FILE__, 'Image_block');