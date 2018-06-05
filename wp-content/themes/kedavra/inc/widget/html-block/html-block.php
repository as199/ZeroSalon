<?php

class Html_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'html-block',
			__('HTML Block', 'kedavra'),
			array(
				'description' => __('Widget to show HTML', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

	            'html_text' => array(
	                'type' => 'textarea',
			        'label' => __( 'HTML Content', 'kedavra' ),
			        'default' => '',
			        'allow_html_formatting' => true,
			        'rows' => 10
			    	),

	            'text_align' => array(
	                'type' => 'select',
						'label' => __( 'Text Align ', 'kedavra' ),
						'default' => 'text-center',
						'options' => array(
							'text-center' => __( 'Center', 'kedavra' ),
							'text-right' => __( 'Right', 'kedavra' ),
							'text-left' => __( 'Left', 'kedavra' ),
						)
	            	),

	            'html_block_anim' => array(
	                'type' => 'select',
						'label' => __( 'HTML Text Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'anim_html_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

			),
			//html end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/html-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['html_block_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('html-block', __FILE__, 'Html_block');