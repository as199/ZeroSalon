<?php

class Feature_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'feature-block',
			__('Feature Block', 'kedavra'),
			array(
				'description' => __('Widget to show Feature Icon', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'feature_type' => array(
	                'type' => 'select',
						'label' => __( 'Select Feature Block Type', 'kedavra' ),
						'default' => 'style1',
						'options' => array(
							'style1' => __( 'Icon Above', 'kedavra' ),
							'style2' => __( 'Icon Beside', 'kedavra' ),
						)
	            	),

				'feature_block' => array(
		        'type' => 'repeater',
		        'label' => __( 'Features' , 'kedavra' ),
		        'item_name'  => __( 'Feature Item', 'kedavra' ),
		        'item_label' => array(
		            'selector'     => "[id*='feature_title']",
		            'update_event' => 'change',
		            'value_method' => 'val'
		        ),

		        'fields' => array(
					'feature_img' => array(
						'type' => 'media',
						'label' => __( 'Insert Feature Image', 'kedavra' ),
						'choose' => __( 'Choose image', 'kedavra' ),
						'update' => __( 'Set image', 'kedavra' ),
						'library' => 'image'
						),

					'feature_icon' => array(
						'type' => 'icon',
						'label' => __('Select an icon', 'kedavra'),
						),

					'feature_title' => array(
						'type' => 'text',
						'label' => __( 'Your Feature Title', 'kedavra' ),
						'default' => '',
						),

					'feature_subtitle' => array(
						'type' => 'textarea',
						'label' => __( 'Feature Description', 'kedavra' ),
						'default' => '',
						'allow_html_formatting' => true,
						'rows' => 10
						),

					'feat_text_color' => array(
				        'type' => 'color',
				        'label' => __( 'Feature Text Color', 'kedavra' ),
				        'default' => '',
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

					'feature_block_anim' => array(
		                'type' => 'select',
							'label' => __( 'Feature Item Animation', 'kedavra' ),
							'default' => 'fadeIn',
							'options' => array(
								'bounce' => __( 'bounce', 'kedavra' ),
							    'flash' => __( 'flash', 'kedavra' ),
							    'pulse' => __( 'pulse', 'kedavra' ),
							    'rubberBand' => __( 'rubberBand', 'kedavra' ),
							    'shake' => __( 'shake', 'kedavra' ),
							    'swing' => __( 'swing', 'kedavra' ),
							    'tada' => __( 'tada', 'kedavra' ),
							    'wobble' => __( 'wobble', 'kedavra' ),
							    'bounceIn' => __( 'bounceIn', 'kedavra' ),
							    'bounceInDown' => __( 'bounceInDown', 'kedavra' ),
							    'bounceInLeft' => __( 'bounceInLeft', 'kedavra' ),
							    'bounceInRight' => __( 'bounceInRight', 'kedavra' ),
							    'bounceInUp' => __( 'bounceInUp', 'kedavra' ),
							    'bounceOut' => __( 'bounceOut', 'kedavra' ),
							    'bounceOutDown' => __( 'bounceOutDown', 'kedavra' ),
							    'bounceOutLeft' => __( 'bounceOutLeft', 'kedavra' ),
							    'bounceOutRight' => __( 'bounceOutRight', 'kedavra' ),
							    'bounceOutUp' => __( 'bounceOutUp', 'kedavra' ),
							    'fadeIn' => __( 'fadeIn', 'kedavra' ),
							    'fadeInDown' => __( 'fadeInDown', 'kedavra' ),
							    'fadeInDownBig' => __( 'fadeInDownBig', 'kedavra' ),
							    'fadeInLeft' => __( 'fadeInLeft', 'kedavra' ),
							    'fadeInLeftBig' => __( 'fadeInLeftBig', 'kedavra' ),
							    'fadeInRight' => __( 'fadeInRight', 'kedavra' ),
							    'fadeInRightBig' => __( 'fadeInRightBig', 'kedavra' ),
							    'fadeInUp' => __( 'fadeInUp', 'kedavra' ),
							    'fadeInUpBig' => __( 'fadeInUpBig', 'kedavra' ),
							    'fadeOut' => __( 'fadeOut', 'kedavra' ),
							    'fadeOutDown' => __( 'fadeOutDown', 'kedavra' ),
							    'fadeOutDownBig' => __( 'fadeOutDownBig', 'kedavra' ),
							    'fadeOutLeft' => __( 'fadeOutLeft', 'kedavra' ),
							    'fadeOutLeftBig' => __( 'fadeOutLeftBig', 'kedavra' ),
							    'fadeOutRight' => __( 'fadeOutRight', 'kedavra' ),
							    'fadeOutRightBig' => __( 'fadeOutRightBig', 'kedavra' ),
							    'fadeOutUp' => __( 'fadeOutUp', 'kedavra' ),
							    'fadeOutUpBig' => __( 'fadeOutUpBig', 'kedavra' ),
							    'flipInX' => __( 'flipInX', 'kedavra' ),
							    'flipInY' => __( 'flipInY', 'kedavra' ),
							    'flipOutX' => __( 'flipOutX', 'kedavra' ),
							    'flipOutY' => __( 'flipOutY', 'kedavra' ),
							    'lightSpeedIn' => __( 'lightSpeedIn', 'kedavra' ),
							    'lightSpeedOut' => __( 'lightSpeedOut', 'kedavra' ),
							    'rotateIn' => __( 'rotateIn', 'kedavra' ),
							    'rotateInDownLeft' => __( 'rotateInDownLeft', 'kedavra' ),
							    'rotateInDownRight' => __( 'rotateInDownRight', 'kedavra' ),
							    'rotateInUpLeft' => __( 'rotateInUpLeft', 'kedavra' ),
							    'rotateInUpRight' => __( 'rotateInUpRight', 'kedavra' ),
							    'rotateOut' => __( 'rotateOut', 'kedavra' ),
							    'rotateOutDownLeft' => __( 'rotateOutDownLeft', 'kedavra' ),
							    'rotateOutDownRight' => __( 'rotateOutDownRight', 'kedavra' ),
							    'rotateOutUpLeft' => __( 'rotateOutUpLeft', 'kedavra' ),
							    'rotateOutUpRight' => __( 'rotateOutUpRight', 'kedavra' ),
							    'hinge' => __( 'hinge', 'kedavra' ),
							    'rollIn' => __( 'rollIn', 'kedavra' ),
							    'rollOut' => __( 'rollOut', 'kedavra' ),
							    'zoomIn' => __( 'zoomIn', 'kedavra' ),
							    'zoomInDown' => __( 'zoomInDown', 'kedavra' ),
							    'zoomInLeft' => __( 'zoomInLeft', 'kedavra' ),
							    'zoomInRight' => __( 'zoomInRight', 'kedavra' ),
							    'zoomInUp' => __( 'zoomInUp', 'kedavra' ),
							    'zoomOut' => __( 'zoomOut', 'kedavra' ),
							    'zoomOutDown' => __( 'zoomOutDown', 'kedavra' ),
							    'zoomOutLeft' => __( 'zoomOutLeft', 'kedavra' ),
							    'zoomOutRight' => __( 'zoomOutRight', 'kedavra' ),
							    'zoomOutUp' => __( 'zoomOutUp', 'kedavra' ),
							    'slideInDown' => __( 'slideInDown', 'kedavra' ),
							    'slideInLeft' => __( 'slideInLeft', 'kedavra' ),
							    'slideInRight' => __( 'slideInRight', 'kedavra' ),
							    'slideInUp' => __( 'slideInUp', 'kedavra' ),
							    'slideOutDown' => __( 'slideOutDown', 'kedavra' ),
							    'slideOutLeft' => __( 'slideOutLeft', 'kedavra' ),
							    'slideOutRight' => __( 'slideOutRight', 'kedavra' ),
							    'slideOutUp' => __( 'slideOutUp', 'kedavra' ),
							),
		            	),

				    'feature_block_delay' => array(
		                'type' => 'number',
		                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
		                'default' => '0.2',
		            	),

					),
					//field repeater end
		   		),
		   		//feature_block end
		   		'per_row' => array(
					'type' => 'number',
					'label' => __('Feature item per row', 'kedavra'),
					'default' => 3,
					),        

			),
			//feature end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/feature-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('feature-block', __FILE__, 'Feature_block');