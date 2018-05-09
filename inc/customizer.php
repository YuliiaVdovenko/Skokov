<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'understrap_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'understrap' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'understrap' ),
			'priority'    => 160,
		) );

		 //select sanitization function
        function understrap_theme_slug_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }

		$wp_customize->add_setting( 'understrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type', array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'understrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'understrap' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_sidebar_position',
					'type'        => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );


if ( ! function_exists( 'customize_quote_register' ) ) {
    function customize_quote_register($wp_customize)
    {
        $wp_customize -> add_section(
            'quote_text_section', array(
            'title' => __('Blog Page', 'BlogPage'),
            'description' => __('Quote text and author')
        ));

        $wp_customize -> add_setting('quote_text', array(
            'default' => 'Lorem Ipsum',
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'quote_text', array(
                'type'=>'text',
                'label' => __('Custom text/quote', 'BlogPage'),
                'description' => __('This is a custom text box.'),
                'section' => 'quote_text_section',
                'settings' => 'quote_text',
            )));


        $wp_customize -> add_setting('author_text', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'author_text', array(
                    'type'=>'text',
                'label' => __('Custom text/author', 'BlogPage'),
                'description' => __("This is a author's name."),
                'section' => 'quote_text_section',
                'settings' => 'author_text',
            )));
    }
}
add_action('customize_register', 'customize_quote_register');


if ( ! function_exists( 'customize_contact_register' ) ) {
    function customize_contact_register($wp_customize)
    {
        $wp_customize -> add_section(
            'contact_text_section', array(
            'title' => __('Contact Page', 'ContactPage'),
            'description' => __('Contact information')
        ));

        $wp_customize -> add_setting('form_name', array(
            'default' => 'send us a message'
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'form_name', array(
                'type'=>'text',
                'label' => __("Custom form's name", 'ContactPage'),
                'description' => __("This is a form name"),
                'section' => 'contact_text_section',
                'settings' => 'form_name',
            )));


        $wp_customize -> add_setting('info_name', array(
            'default' => 'contact info'
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'info_name', array(
                'type'=>'text',
                'label' => __("Custom info's name", 'ContactPage'),
                'description' => __("This is a contact info name"),
                'section' => 'contact_text_section',
                'settings' => 'info_name',
            )));

        $wp_customize -> add_setting('address_label', array(
            'default' => 'Address: ',
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'address_label', array(
                'type'=>'text',
                'label' => __('Custom label for address', 'ContactPage'),
                'description' => __('This is a custom label for address'),
                'section' => 'contact_text_section',
                'settings' => 'address_label',
            )));


        $wp_customize -> add_setting('address_text', array(
            'default' => '',
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'address_text', array(
                'type'=>'text',
                'label' => __('Custom address', 'ContactPage'),
                'description' => __('This is a custom text box for address'),
                'section' => 'contact_text_section',
                'settings' => 'address_text',
            )));

        $wp_customize -> add_setting('phone_label', array(
            'default' => 'Phone: '
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'phone_label', array(
                'type'=>'text',
                'label' => __('Custom label for phone number', 'ContactPage'),
                'description' => __("This is a label for phone number"),
                'section' => 'contact_text_section',
                'settings' => 'phone_label',
            )));

        $wp_customize -> add_setting('phone_number', array(
            'default' => '+38 '
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'phone_number', array(
                'type'=>'text',
                'label' => __('Custom phone number', 'ContactPage'),
                'description' => __("This is a phone number"),
                'section' => 'contact_text_section',
                'settings' => 'phone_number',
            )));

        $wp_customize -> add_setting('phone_number2', array(
            'default' => '+38 '
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'phone_number2', array(
                'type'=>'text',
                'label' => __('Custom phone number', 'ContactPage'),
                'description' => __("This is the second custom's phone number"),
                'section' => 'contact_text_section',
                'settings' => 'phone_number2',
            )));

        $wp_customize -> add_setting('email_label', array(
            'default' => 'E-mail: '
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'email_label', array(
                'type'=>'text',
                'label' => __('Custom label for email address', 'ContactPage'),
                'description' => __("This is a label for email address"),
                'section' => 'contact_text_section',
                'settings' => 'email_label',
            )));

        $wp_customize -> add_setting('email_address', array(
        'default' => 'example@gmail.com'
    ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'email_address', array(
                'type'=>'text',
                'label' => __('Custom email address', 'ContactPage'),
                'description' => __("This is email address"),
                'section' => 'contact_text_section',
                'settings' => 'email_address',
            )));

    }
}
add_action('customize_register', 'customize_contact_register');



if ( ! function_exists( 'customize_social_register' ) ) {
    function customize_social_register($wp_customize)
    {
        $wp_customize -> add_section(
            'social_link_section', array(
            'title' => __('Social Link', 'SocialLink'),
            'description' => __('Social link information')
        ));

        $wp_customize -> add_setting('social_link_name', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'social_link_name', array(
                'type'=>'text',
                'label' => __('Custom social links name', 'SocialLink'),
                'description' => __("This is name of all Social links"),
                'section' => 'social_link_section',
                'settings' => 'social_link_name',
            )));

        $wp_customize -> add_setting('fb_link', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'fb_link', array(
                'type'=>'text',
                'label' => __('Custom fb link', 'SocialLink'),
                'description' => __("This is a facebook link"),
                'section' => 'social_link_section',
                'settings' => 'fb_link',
            )));


        $wp_customize -> add_setting('google_link', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'google_link', array(
                'type'=>'text',
                'label' => __('Custom google link', 'SocialLink'),
                'description' => __("This is a google link"),
                'section' => 'social_link_section',
                'settings' => 'google_link',
            )));

        $wp_customize -> add_setting('twitter_link', array(
            'default' => '',
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'twitter_link', array(
                'type'=>'text',
                'label' => __('Custom twitter link', 'SocialLink'),
                'description' => __('This is a twitter link'),
                'section' => 'social_link_section',
                'settings' => 'twitter_link',
            )));


        $wp_customize -> add_setting('in_link', array(
            'default' => '',
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'in_link', array(
                'type'=>'text',
                'label' => __('Custom linkedin link', 'SocialLink'),
                'description' => __('This is a custom linkedin link'),
                'section' => 'social_link_section',
                'settings' => 'in_link',
            )));

        $wp_customize -> add_setting('youtube_link', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'youtube_link', array(
                'type'=>'text',
                'label' => __('Custom youtube link', 'SocialLink'),
                'description' => __("This is a youtube link"),
                'section' => 'social_link_section',
                'settings' => 'youtube_link',
            )));

        $wp_customize -> add_setting('vk_link', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'vk_link', array(
                'type'=>'text',
                'label' => __('Custom vk link', 'SocialLink'),
                'description' => __("This is a vk link"),
                'section' => 'social_link_section',
                'settings' => 'vk_link',
            )));

        $wp_customize -> add_setting('rss_link', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'rss_link', array(
                'type'=>'text',
                'label' => __('Custom rss link', 'SocialLink'),
                'description' => __("This is a custom rss link"),
                'section' => 'social_link_section',
                'settings' => 'rss_link',
            )));

        $wp_customize -> add_setting('dribble_link', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'dribble_link', array(
                'type'=>'text',
                'label' => __('Custom dribble link', 'SocialLink'),
                'description' => __("This is a dribble link"),
                'section' => 'social_link_section',
                'settings' => 'dribble_link',
            )));

        $wp_customize -> add_setting('footer_copyright', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'footer_copyright', array(
                'type'=>'text',
                'label' => __('Custom footer copyright text', 'SocialLink'),
                'section' => 'social_link_section',
                'settings' => 'footer_copyright',
            )));
        $wp_customize -> add_setting('footer_copyright_lable', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'footer_copyright_lable', array(
                'type'=>'text',
                'label' => __('Custom footer copyright text', 'SocialLink'),
                'section' => 'social_link_section',
                'settings' => 'footer_copyright_lable',
            )));

        $wp_customize -> add_setting('footer_copyright_link', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'footer_copyright_link', array(
                'type'=>'text',
                'label' => __('Custom footer copyright text', 'SocialLink'),
                'section' => 'social_link_section',
                'settings' => 'footer_copyright_link',
            )));

        $wp_customize -> add_setting('footer_copyright2', array(
            'default' => ''
        ));

        $wp_customize -> add_control(
            new WP_Customize_Control(
                $wp_customize,
                'footer_copyright2', array(
                'type'=>'text',
                'label' => __('Custom footer copyright text', 'SocialLink'),
                'section' => 'social_link_section',
                'settings' => 'footer_copyright2',
            )));
    }
}
add_action('customize_register', 'customize_social_register');