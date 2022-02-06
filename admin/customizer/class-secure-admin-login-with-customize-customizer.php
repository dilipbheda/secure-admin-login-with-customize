<?php
if ( ! class_exists( 'Secure_Login_Customizer' ) ) {
	class Secure_Login_Customizer {
		/**
		 * Calling public constructor.
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'secure_login_customize_register' ) );
		}

		/**
		 * Register Secure Login Customize in WordPress Customizer.
		 * @argument 'wp_customize'
		 */
		public function secure_login_customize_register( $wp_customize ) {
			$wp_customize->add_panel(
				'secure_login_panel', array(
					'priority'       => 200,
					'capability'     => 'edit_theme_options',
					'title'          => __( 'Customize Secure Login', 'secure-admin-login-with-customize' ),
				)
			);

			$wp_customize->add_section(
				'secure_login_logo_section', array(
					'priority' => 5,
					'title' => __( 'Logo', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_section(
				'secure_login_background_section', array(
					'priority' => 10,
					'title' => __( 'Background', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_section(
				'secure_login_form_bg_section', array(
					'priority' => 15,
					'title' => __( 'Login Form', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_section(
				'secure_login_field_section', array(
					'priority' => 25,
					'title' => __( 'Input Fields', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_section(
				'secure_login_error_message_section', array(
					'priority' => 30,
					'title' => __( 'Error Message Format', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_section(
				'secure_login_captcha_section', array(
					'priority' => 35,
					'title' => __( 'Google reCaptcha', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_section(
				'secure_login_captcha_code_section', array(
					'priority' => 40,
					'title' => __( 'Captcha Code', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_section(
				'secure_login_additional_css_section', array(
					'priority' => 45,
					'title' => __( 'Additional CSS', 'secure-admin-login-with-customize' ),
					'panel'  => 'secure_login_panel',
				)
			);

			$wp_customize->add_setting(
				'secure_login_logo', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_image' )
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize, 'secure_login_logo', array(
						'label' => __( 'Logo', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_logo_section',
						'priority' => 5,
						'settings' => 'secure_login_logo',
						'description' => __( 'You can change logo in login page', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_logo_width', array(
					'default' => '100px',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_logo_width', array(
					'label' => __( 'Width', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_logo_section',
					'priority' => 10,
					'settings' => 'secure_login_logo_width',
					'description' => __( 'Example: 50px', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_logo_height', array(
					'default' => '100px',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_logo_height', array(
					'label' => __( 'Height', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_logo_section',
					'priority' => 15,
					'settings' => 'secure_login_logo_height',
					'description' => __( 'Example: 30px', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_logo_padding', array(
					'default' => '10px',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_logo_padding', array(
					'label' => __( 'Padding Bottom', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_logo_section',
					'priority' => 20,
					'settings' => 'secure_login_logo_padding',
					'description' => __( 'Example: 10px', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_bg_image', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_image' )
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize, 'secure_login_bg_image', array(
						'label' => __( 'Image', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_background_section',
						'priority' => 5,
						'settings' => 'secure_login_bg_image',
						'description' => __( 'Change background image', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_bg_color', array(
					'default' => '#F1F1F1',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_bg_color', array(
						'label' => __( 'Color', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_background_section',
						'priority' => 10,
						'settings' => 'secure_login_bg_color',
						'description' => __( 'Change background color', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_bg_size', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_bg_size', array(
					'label' => __( 'Size', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_background_section',
					'priority' => 15,
					'settings' => 'secure_login_bg_size',
					'description' => __( 'Set background size using css property', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_form_bg_image', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_image' )
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize, 'secure_login_form_bg_image', array(
						'label' => __( 'Background', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_form_bg_section',
						'priority' => 5,
						'settings' => 'secure_login_form_bg_image',
						'description' => __( 'Background Image', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_form_bg_color', array(
					'default' => '#FFF',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_form_bg_color', array(
						'section' => 'secure_login_form_bg_section',
						'priority' => 10,
						'settings' => 'secure_login_form_bg_color',
						'description' => __( 'Background color', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_form_width', array(
					'default' => '300px',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_form_width', array(
					'label' => __( 'Width', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_form_bg_section',
					'priority' => 15,
					'settings' => 'secure_login_form_width',
					'description' => __( 'Example: 300px', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_form_height', array(
					'default' => '220px',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_form_height', array(
					'label' => __( 'Height', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_form_bg_section',
					'priority' => 20,
					'settings' => 'secure_login_form_height',
					'description' => __( 'Example: 220px', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_form_padding', array(
					'default' => '26px 24px 46px 0',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_form_padding', array(
					'label' => __( 'Padding', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_form_bg_section',
					'priority' => 25,
					'settings' => 'secure_login_form_padding',
					'description' => __( 'Example: 10px 10px 10px 10px', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_form_border', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_form_border', array(
					'label' => __( 'Border', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_form_bg_section',
					'priority' => 30,
					'settings' => 'secure_login_form_border',
					'description' => __( 'Example: 2px dotted black', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_field_width', array(
					'default' => '100%',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_field_width', array(
					'label' => __( 'Input Field', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_field_section',
					'priority' => 5,
					'settings' => 'secure_login_field_width',
					'description' => __( 'Width', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_field_margin', array(
					'default' => '2px 6px 16px 0',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_field_margin', array(
					'section' => 'secure_login_field_section',
					'priority' => 5,
					'settings' => 'secure_login_field_margin',
					'description' => __( 'Margin Example: 10px 10px 0 0', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_field_bg', array(
					'default' => '#FFF',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_field_bg', array(
						'section' => 'secure_login_field_section',
						'priority' => 5,
						'settings' => 'secure_login_field_bg',
						'description' => __( 'Background', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_field_color', array(
					'default' => '#fff',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_field_color', array(
						'section' => 'secure_login_field_section',
						'priority' => 5,
						'settings' => 'secure_login_field_color',
						'description' => __( 'Color', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_field_label', array(
					'default' => '#fff',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_field_label', array(
						'section' => 'secure_login_field_section',
						'priority' => 5,
						'settings' => 'secure_login_field_label',
						'description' => __( 'Label Color', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_field_font_size', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_field_font_size', array(
					'section' => 'secure_login_field_section',
					'priority' => 5,
					'settings' => 'secure_login_field_font_size',
					'description' => __( 'Label Font Size', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_button_font_size', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_button_font_size', array(
					'label' => __( 'Button', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_field_section',
					'priority' => 5,
					'settings' => 'secure_login_button_font_size',
					'description' => __( 'Font Size (Example: 10px)', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_button_bg', array(
					'default' => '#2EA2CC',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_button_bg', array(
						'section' => 'secure_login_field_section',
						'priority' => 10,
						'settings' => 'secure_login_button_bg',
						'description' => __( 'Change background', 'secure-admin-login-with-customize' )

					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_button_border', array(
					'default' => '#0074A2',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_button_border', array(
						'section' => 'secure_login_field_section',
						'priority' => 15,
						'settings' => 'secure_login_button_border',
						'description' => __( 'Border color', 'secure-admin-login-with-customize' ),
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_button_hover_bg', array(
					'default' => '#1E8CBE',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_button_hover_bg', array(
						'section' => 'secure_login_field_section',
						'priority' => 20,
						'settings' => 'secure_login_button_hover_bg',
						'description' => __( 'Button hover effect color', 'secure-admin-login-with-customize' ),
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_button_hover_border', array(
					'default' => '#0074A2',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_button_hover_border', array(
						'section' => 'secure_login_field_section',
						'priority' => 25,
						'settings' => 'secure_login_button_hover_border',
						'description' => __( 'Border hover effect color', 'secure-admin-login-with-customize' ),
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_button_shadow', array(
					'default' => '#78C8E6',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_button_shadow', array(
						'section' => 'secure_login_field_section',
						'priority' => 30,
						'settings' => 'secure_login_button_shadow',
						'description' => __( 'Box Shadow', 'secure-admin-login-with-customize' ),
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_button_color', array(
					'default' => '#FFF',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_button_color', array(
						'section' => 'secure_login_field_section',
						'priority' => 35,
						'settings' => 'secure_login_button_color',
						'description' => __( 'Button Color', 'secure-admin-login-with-customize' ),
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_text_color', array(
					'default' => '#999',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_text_color', array(
						'label' => __( 'Text', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_field_section',
						'priority' => 35,
						'settings' => 'secure_login_text_color',
						'description' => __( 'Text color', 'secure-admin-login-with-customize' ),
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_text_color_hover', array(
					'default' => '#2EA2CC',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_text_color_hover', array(
						'section' => 'secure_login_field_section',
						'priority' => 40,
						'settings' => 'secure_login_text_color_hover',
						'description' => __( 'Text hover effect color', 'secure-admin-login-with-customize' ),
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_form_text_font_size', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_form_text_font_size', array(
					'section' => 'secure_login_field_section',
					'priority' => 45,
					'settings' => 'secure_login_form_text_font_size',
					'description' => __( 'Font Size ( Example: 15px )', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_error_bg_color', array(
					'default' => '#fff',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_error_bg_color', array(
						'label' => __( 'Background', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_error_message_section',
						'priority' => 15,
						'settings' => 'secure_login_error_bg_color',
						'description' => __( 'Background color', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_error_border_color', array(
					'default' => '#dc3232',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_error_border_color', array(
						'label' => __( 'Border', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_error_message_section',
						'priority' => 20,
						'settings' => 'secure_login_error_border_color',
						'description' => __( 'Border color', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_error_text_color', array(
					'default' => '#dc3232',
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'secure_login_error_text_color', array(
						'label' => __( 'Text color', 'secure-admin-login-with-customize' ),
						'section' => 'secure_login_error_message_section',
						'priority' => 25,
						'settings' => 'secure_login_error_text_color',
						'description' => __( 'Text color', 'secure-admin-login-with-customize' )
					)
				)
			);

			$wp_customize->add_setting(
				'secure_login_error_font_size', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_error_font_size', array(
					'label' => __( 'Font Size', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_error_message_section',
					'priority' => 30,
					'settings' => 'secure_login_error_font_size',
					'description' => __( 'Example: 10px', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_captcha_enable', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_checkbox' ),
					'validate_callback' => array( $this, 'secure_login_recaptcha_validation' )
				)
			);

			$wp_customize->add_control(
				'secure_login_captcha_enable', array(
					'label' => __( 'Enable/Disable', 'secure-admin-login-with-customize' ),
					'type' => 'checkbox',
					'section' => 'secure_login_captcha_section',
					'priority' => 10,
					'settings' => 'secure_login_captcha_enable'
				)
			);

			$wp_customize->add_setting(
				'secure_login_captcha_sitekey', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_captcha_sitekey', array(
					'label' => __( 'Site Key', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_captcha_section',
					'priority' => 15,
					'settings' => 'secure_login_captcha_sitekey',
					'description' => __( 'Enter google recaptcha site key', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_captcha_secretkey', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_string' )
				)
			);

			$wp_customize->add_control(
				'secure_login_captcha_secretkey', array(
					'label' => __( 'Secret Key', 'secure-admin-login-with-customize' ),
					'section' => 'secure_login_captcha_section',
					'priority' => 20,
					'settings' => 'secure_login_captcha_secretkey',
					'description' => __( 'Enter google recaptcha secret key', 'secure-admin-login-with-customize' )
				)
			);

			$wp_customize->add_setting(
				'secure_login_captcha_code_enable', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_checkbox' ),
					'validate_callback' => array( $this, 'secure_login_captcha_validation' )
				)
			);

			$wp_customize->add_control(
				'secure_login_captcha_code_enable', array(
					'label' => __( 'Enable/Disable', 'secure-admin-login-with-customize' ),
					'type' => 'checkbox',
					'section' => 'secure_login_captcha_code_section',
					'priority' => 10,
					'settings' => 'secure_login_captcha_code_enable',
				)
			);

			$wp_customize->add_setting(
				'secure_login_additional_css', array(
					'type' => 'option',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => array( $this, 'secure_login_sanitize_textarea' )
				)
			);

			$wp_customize->add_control(
				'secure_login_additional_css', array(
					'label' => __( 'Additional CSS', 'secure-admin-login-with-customize' ),
					'type' => 'textarea',
					'section' => 'secure_login_additional_css_section',
					'priority' => 15,
					'settings' => 'secure_login_additional_css'
				)
			);
		}

		/**
		 * Image sanitization callback.
		 *
		 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
		 * send back the filename, otherwise, return the setting default.
		 *
		 * - Sanitization: image file extension
		 * - Control: text, WP_Customize_Image_Control
		 *
		 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
		 *
		 * @param string $image Image filename.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string The image filename if the extension is allowed; otherwise, the setting default.
		 */
		function secure_login_sanitize_image( $image, $setting ) {
			/*
			 * Array of valid image file types.
			 *
			 * The array includes image mime types that are included in wp_get_mime_types()
			 */
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
				'bmp'          => 'image/bmp',
				'tif|tiff'     => 'image/tiff',
				'ico'          => 'image/x-icon'
			);
			// Return an array with file extension and mime_type.
			$file = wp_check_filetype( $image, $mimes );
			// If $image has a valid mime_type, return it; otherwise, return the default.
			return ( $file['ext'] ? $image : $setting->default );
		}

		/**
		 * Senitize checkbox fields.
		 */
		public function secure_login_sanitize_checkbox( $value ) {
			return $value;
		}

		/**
		 * Senitize input field.
		 */
		public function secure_login_sanitize_string( $value ) {
			return sanitize_text_field( $value );
		}

		/**
		 * Sanitize textarea field.
		 */
		public function secure_login_sanitize_textarea( $value ) {
			return sanitize_textarea_field( $value );
		}

		/**
		 * Google recaptcha validation.
		 */
		public function secure_login_captcha_validation( $validate, $value ) {
			if ( ( get_option( 'secure_login_captcha_enable' ) ) && ( ! empty( $value ) ) ) {
				$validate->add( 'requied', __( 'Please disable google recaptcha', 'secure-admin-login-with-customize' ) );
			}
			return $validate;
		}

		/**
		 * Captcha validation.
		 */
		public function secure_login_recaptcha_validation( $validate, $value ) {
			if ( ( get_option( 'secure_login_captcha_code_enable' ) ) && ( ! empty( $value ) ) ) {
				$validate->add( 'requied', __( 'Please disable captcha code', 'secure-admin-login-with-customize' ) );
			}
			return $validate;
		}
	}
	new Secure_Login_Customizer;
}
