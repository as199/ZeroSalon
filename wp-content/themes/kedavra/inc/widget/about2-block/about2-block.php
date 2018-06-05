<?php

class About2_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'about2-block',
			__('About Two Side Block', 'kedavra'),
			array(
				'description' => __('Widget to show About Repeater', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'about_item' => array(
		        'type' => 'repeater',
		        'label' => __( 'About' , 'kedavra' ),
		        'item_name'  => __( 'About Item', 'kedavra' ),
		        'item_label' => array(
		            'selector'     => "[id*='about2_title']",
		            'update_event' => 'change',
		            'value_method' => 'val'
		        ),

		        'fields' => array(
		            'about2_img' => array(
				        'type' => 'media',
				        'label' => __( 'Insert About Image', 'kedavra' ),
				        'choose' => __( 'Choose image', 'kedavra' ),
				        'update' => __( 'Set image', 'kedavra' ),
				        'library' => 'image'
				    	),

			   		'about2_title' => array(
		                'type' => 'text',
		                'label' => __( 'Your About Title', 'kedavra' ),
		                'default' => '',
		            	),

		            'about2_desc' => array(
		                'type' => 'textarea',
				        'label' => __( 'About Description', 'kedavra' ),
				        'default' => '',
				        'allow_html_formatting' => true,
				        'rows' => 10
				    	),

		            'text_align' => array(
		                'type' => 'select',
							'label' => __( 'Title Align ', 'kedavra' ),
							'default' => 'text-center',
							'options' => array(
								'text-center' => __( 'Center', 'kedavra' ),
								'text-right' => __( 'Right', 'kedavra' ),
								'text-left' => __( 'Left', 'kedavra' ),
							)
		            	),

		            'about2_title_color' => array(
				        'type' => 'color',
				        'label' => __('About Title Color', 'kedavra'),
				        'default' => '',
				   		),

		            'about2_desc_color' => array(
				        'type' => 'color',
				        'label' => __( 'About Description Color', 'kedavra' ),
				        'default' => '',
					    ),

		        	),
					//field repeater end
		   		),
		   		//about_item end

		            'about2_img_anim' => array(
		                'type' => 'select',
							'label' => __( 'About Image Animation', 'kedavra' ),
							'default' => 'fadeIn',
							'options' => array(
							),
		            	),

				    'anim_img_delay' => array(
		                'type' => 'number',
		                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
		                'default' => '0.2',
		            	),

		            'about2_desc_anim' => array(
		                'type' => 'select',
							'label' => __( 'About Text Animation', 'kedavra' ),
							'default' => 'fadeIn',
							'options' => array(
							),
		            	),

				    'anim_desc_delay' => array(
		                'type' => 'number',
		                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
		                'default' => '0.2',
		            	),
			),
			//about2 end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/about2-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	function modify_form( $form ) {
		$form['about2_img_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		$form['about2_desc_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}

}

siteorigin_widget_register('about2-block', __FILE__, 'About2_block');