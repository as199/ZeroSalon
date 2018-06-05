<?php

class Author_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'author-block',
			__('Author Block', 'kedavra'),
			array(
				'description' => __('Widget to show Author Description', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(

				'author_left' => array(
					'type' => 'section',
					'label'  => __( 'Author Left Part', 'kedavra' ),
					'hide'   => true,
					'fields' => array(

				   		'author_img' => array(
					        'type' => 'media',
					        'label' => __( 'Insert Author Image', 'kedavra' ),
					        'choose' => __( 'Choose image', 'kedavra' ),
					        'update' => __( 'Set image', 'kedavra' ),
					        'library' => 'image'
					    	),

				   		'author_title' => array(
			                'type' => 'text',
			                'label' => __( 'Your Author Title', 'kedavra' ),
			                'default' => '',
			            	),

				   		'author_name' => array(
			                'type' => 'text',
			                'label' => __( 'Your Author Name', 'kedavra' ),
			                'default' => '',
			            	),

			            'author_job' => array(
			                'type' => 'text',
			                'label' => __( 'Your Author Job', 'kedavra' ),
			                'default' => '',
			            	),

			            'author_text_color' => array(
					        'type' => 'color',
					        'label' => __( 'Text Left Color', 'kedavra' ),
					        'default' => '',
					    ),

					    'author_left_anim' => array(
			                'type' => 'select',
								'label' => __( 'Author Left Content Animation', 'kedavra' ),
								'default' => 'fadeInLeft',
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

					    'author_left_delay' => array(
			                'type' => 'number',
			                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
			                'default' => '0.2',
			            	),
			        )
				),

				'author_right' => array(
					'type' => 'section',
					'label'  => __( 'Author Right Part', 'kedavra' ),
					'hide'   => true,
					'fields' => array(

				   		'sign_img' => array(
					        'type' => 'media',
					        'label' => __( 'Insert Mark/Signature Image', 'kedavra' ),
					        'choose' => __( 'Choose image', 'kedavra' ),
					        'update' => __( 'Set image', 'kedavra' ),
					        'library' => 'image'
					    	),

				   		'author_title_right' => array(
			                'type' => 'text',
			                'label' => __( 'Your Author Title', 'kedavra' ),
			                'default' => '',
			            	),

			            'author_subtitle_right' => array(
			                'type' => 'text',
			                'label' => __( 'Your Author Subtitle', 'kedavra' ),
			                'default' => '',
			            	),

			            'author_desc' => array(
			                'type' => 'textarea',
					        'label' => __( 'Author Description', 'kedavra' ),
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

			            'author_textright_color' => array(
					        'type' => 'color',
					        'label' => __( 'Text Right Color', 'kedavra' ),
					        'default' => '',
					    ),

					    'author_right_anim' => array(
			                'type' => 'select',
								'label' => __( 'Author Right Content Animation', 'kedavra' ),
								'default' => 'fadeInRight',
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

					    'author_right_delay' => array(
			                'type' => 'number',
			                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
			                'default' => '0.2',
			            	),
			        )
				),

			),
			//author end
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/author-block/'
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('author-block', __FILE__, 'Author_block');