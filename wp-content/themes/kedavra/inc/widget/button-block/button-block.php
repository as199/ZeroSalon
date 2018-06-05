<?php

class Button_block extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'button-block',
			__('Button Block', 'kedavra'),
			array(
				'description' => __('Widget to show Button Link', 'kedavra'),
				'panels_groups' => array('kedavra'),
			),
			array(

			),
			array(
				'text' => array(
					'type' => 'text',
					'label' => __('Button text', 'kedavra'),
				),

				'url' => array(
					'type' => 'link',
					'label' => __('Destination URL', 'kedavra'),
				),

				'new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Open in a new window', 'kedavra'),
				),

				'button_anim' => array(
	                'type' => 'select',
						'label' => __( 'Button Animation', 'kedavra' ),
						'default' => 'fadeIn',
						'options' => array(
						),
	            	),

			    'anim_button_delay' => array(
	                'type' => 'number',
	                'label' => __( 'Animation Delay (decimal allowed)', 'kedavra' ),
	                'default' => '0.2',
	            	),

				'button_icon' => array(
					'type' => 'section',
					'label' => __('Icon', 'kedavra'),
					'fields' => array(
						'icon_selected' => array(
							'type' => 'icon',
							'label' => __('Icon', 'kedavra'),
						),

						'icon_color' => array(
							'type' => 'color',
							'label' => __('Icon color', 'kedavra'),
						),

						'icon' => array(
							'type' => 'media',
							'label' => __('Image icon', 'kedavra'),
							'description' => __('Replaces the icon with your own image icon.', 'kedavra'),
						),
					),
				),

				'design' => array(
					'type' => 'section',
					'label' => __('Design and layout', 'kedavra'),
					'hide' => true,
					'fields' => array(
						'align' => array(
							'type' => 'select',
							'label' => __('Align', 'kedavra'),
							'default' => 'center',
							'options' => array(
								'left' => __('Left', 'kedavra'),
								'right' => __('Right', 'kedavra'),
								'center' => __('Center', 'kedavra'),
								'justify' => __('Justify', 'kedavra'),
							),
						),

						'theme' => array(
							'type' => 'select',
							'label' => __('Button theme', 'kedavra'),
							'default' => 'atom',
							'options' => array(
								'atom' => __('Atom', 'kedavra'),
								'flat' => __('Flat', 'kedavra'),
								'wire' => __('Wire', 'kedavra'),
								'bord-bottom' => __('Border Bottom', 'kedavra'),
							),
						),


						'button_color' => array(
							'type' => 'color',
							'label' => __('Button color', 'kedavra'),
						),

						'text_color' => array(
							'type' => 'color',
							'label' => __('Text color', 'kedavra'),
						),

						'hover' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => __('Use hover effects', 'kedavra'),
						),

						'font_size' => array(
							'type' => 'select',
							'label' => __('Font size', 'kedavra'),
							'options' => array(
								'1' => __('Normal', 'kedavra'),
								'1.15' => __('Medium', 'kedavra'),
								'1.3' => __('Large', 'kedavra'),
								'1.45' => __('Extra large', 'kedavra'),
							),
						),

						'rounding' => array(
							'type' => 'select',
							'label' => __('Rounding', 'kedavra'),
							'default' => '0.25',
							'options' => array(
								'0' => __('None', 'kedavra'),
								'0.25' => __('Slightly rounded', 'kedavra'),
								'0.5' => __('Very rounded', 'kedavra'),
								'1.5' => __('Completely rounded', 'kedavra'),
							),
						),

						'padding' => array(
							'type' => 'select',
							'label' => __('Padding', 'kedavra'),
							'default' => '1',
							'options' => array(
								'0.5' => __('Low', 'kedavra'),
								'1' => __('Medium', 'kedavra'),
								'1.4' => __('High', 'kedavra'),
								'1.8' => __('Very high', 'kedavra'),
							),
						),

					),
				),

				'attributes' => array(
					'type' => 'section',
					'label' => __('Other attributes and SEO', 'kedavra'),
					'hide' => true,
					'fields' => array(
						'id' => array(
							'type' => 'text',
							'label' => __('Button ID', 'kedavra'),
							'description' => __('An ID attribute allows you to target this button in Javascript.', 'kedavra'),
						),

						'title' => array(
							'type' => 'text',
							'label' => __('Title attribute', 'kedavra'),
							'description' => __('Adds a title attribute to the button link.', 'kedavra'),
						),

						'onclick' => array(
							'type' => 'text',
							'label' => __('Onclick', 'kedavra'),
							'description' => __('Run this Javascript when the button is clicked. Ideal for tracking.', 'kedavra'),
						),
					)
				),
			),
			KEDAVRA_TEMPLATE_DIR .'/inc/widget/button-block/'
		);

	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'button-block-base',
					
					array(),
					SOW_BUNDLE_VERSION
				),
			)
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		if(empty($instance['design']['theme'])) return 'atom';
		return $instance['design']['theme'];
	}

	/**
	 * Get the variables that we'll be injecting into the less stylesheet.
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance){
		if( empty( $instance ) || empty( $instance['design'] ) ) return array();

		return array(
			'button_color' => $instance['design']['button_color'],
			'text_color' => $instance['design']['text_color'],

			'font_size' => $instance['design']['font_size'] . 'em',
			'rounding' => $instance['design']['rounding'] . 'em',
			'padding' => $instance['design']['padding'] . 'em',
			'has_text' => empty( $instance['text'] ) ? 'false' : 'true',
		);
	}

	/**
	 * Make sure the instance is the most up to date version.
	 *
	 * @param $instance
	 *
	 * @return mixed
	 */
	function modify_instance($instance){

		if( empty($instance['button_icon']) ) {
			$instance['button_icon'] = array();

			if(isset($instance['icon_selected'])) $instance['button_icon']['icon_selected'] = $instance['icon_selected'];
			if(isset($instance['icon_color'])) $instance['button_icon']['icon_color'] = $instance['icon_color'];
			if(isset($instance['icon'])) $instance['button_icon']['icon'] = $instance['icon'];

			unset($instance['icon_selected']);
			unset($instance['icon_color']);
			unset($instance['icon']);
		}

		if( empty($instance['design']) ) {
			$instance['design'] = array();

			if(isset($instance['align'])) $instance['design']['align'] = $instance['align'];
			if(isset($instance['theme'])) $instance['design']['theme'] = $instance['theme'];
			if(isset($instance['button_color'])) $instance['design']['button_color'] = $instance['button_color'];
			if(isset($instance['text_color'])) $instance['design']['text_color'] = $instance['text_color'];
			if(isset($instance['hover'])) $instance['design']['hover'] = $instance['hover'];
			if(isset($instance['font_size'])) $instance['design']['font_size'] = $instance['font_size'];
			if(isset($instance['rounding'])) $instance['design']['rounding'] = $instance['rounding'];
			if(isset($instance['padding'])) $instance['design']['padding'] = $instance['padding'];

			unset($instance['align']);
			unset($instance['theme']);
			unset($instance['button_color']);
			unset($instance['text_color']);
			unset($instance['hover']);
			unset($instance['font_size']);
			unset($instance['rounding']);
			unset($instance['padding']);
		}

		if( empty($instance['attributes']) ) {
			$instance['attributes'] = array();
			if(isset($instance['id'])) $instance['attributes']['id'] = $instance['id'];
			unset($instance['id']);
		}

		return $instance;
	}

	function modify_form( $form ) {
		$form['button_anim']['options'] = include dirname(__FILE__).'/inc/animation.php';
		return $form;
	}
}

siteorigin_widget_register('button-block', __FILE__, 'Button_block');