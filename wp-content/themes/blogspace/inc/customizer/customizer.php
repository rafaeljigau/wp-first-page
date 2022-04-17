<?php
/**
 * Blogspace Theme Customizer
 *
 * @package Blogspace
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogspace_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( method_exists( $wp_customize, 'register_section_type' ) ) {
		$wp_customize->register_section_type( Blogspace_Upsell_Section::class );
	}

	$wp_customize->add_section(
		new Blogspace_Upsell_Section(
			$wp_customize,
			'blogspace_premium',
			array(
				'title'       => esc_html__( 'Premium Available', 'blogspace' ),
				'button_text' => esc_html__( 'Get Premium', 'blogspace' ),
				'button_url'  => esc_url( blogspace_upsell_buy_url() ),
				'priority'    => 1,
			)
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'blogspace_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'blogspace_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section(
		'sect_blog',
		array(
			'title'       => esc_html__( 'Blog', 'blogspace' ),
			'description' => esc_html__( 'Customize the blog settings in here.', 'blogspace' ),
			'priority'    => 151,
		)
	);

	$wp_customize->add_setting(
		'sett_archive_content',
		array(
			'type'              => 'theme_mod',
			'default'           => blogspace_default_archive_content(),
			'transport'         => 'refresh',
			'sanitize_callback' => 'blogspace_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'sett_archive_content',
		array(
			'section'     => 'sect_blog',
			'type'        => 'radio',
			'choices'     => array(
				'excerpt' => esc_html__( 'Summary', 'blogspace' ),
				'full'    => esc_html__( 'Full text', 'blogspace' ),
			),
			'label'       => esc_html__( 'Blog Content', 'blogspace' ),
			'description' => esc_html__( 'You can show the summary or the full text in the blog archive pages.', 'blogspace' ),
		)
	);

	$wp_customize->add_section(
		'sect_footer',
		array(
			'title'       => esc_html__( 'Footer', 'blogspace' ),
			'description' => esc_html__( 'Customize the footer settings in here.', 'blogspace' ),
			'priority'    => 161,
		)
	);

	$wp_customize->add_setting(
		'sett_site_info',
		array(
			'type'              => 'theme_mod',
			'default'           => blogspace_default_site_info(),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'blogspace_sanitize_site_info',
		)
	);

	$wp_customize->add_control(
		'sett_site_info',
		array(
			'section'     => 'sect_footer',
			'type'        => 'textarea',
			'label'       => esc_html__( 'Site Info', 'blogspace' ),
			'description' => esc_html__( 'You can modify the site info text to be shown in the footer. You may aslo use the following HTML tags: em, strong, span, a, br.', 'blogspace' ),
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'sett_site_info',
		array(
			'selector'            => '.site-info',
			'container_inclusive' => true,
			'render_callback'     => function() {
				get_template_part( 'template-parts/footer/site-info' );
			},
		)
	);
}
add_action( 'customize_register', 'blogspace_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogspace_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogspace_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Get upsell buy URL.
 *
 * @return string
 */
function blogspace_upsell_buy_url() {
	return 'https://codeclove.com/blogspace/';
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogspace_customize_preview_js() {
	wp_enqueue_script( 'blogspace-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), BLOGSPACE_VERSION, true );
}
add_action( 'customize_preview_init', 'blogspace_customize_preview_js' );

/**
 * Sanitize select.
 *
 * @param string $input The input from the setting.
 * @param object $setting The selected setting.
 *
 * @return string $input|$setting->default The input from the setting or the default setting.
 */
function blogspace_sanitize_select( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize site info text.
 *
 * @param string $input Input text.
 * @return string
 */
function blogspace_sanitize_site_info( $input ) {
	return wp_kses( $input, blogspace_site_info_tags_allowed() );
}

/**
 * Output the Customizer CSS to wp_head
 */
function blogspace_customizer_css() {

	$bg_color   = get_theme_mod( 'navigation-hover-color', '#fff' );
	$text_color = get_theme_mod( 'navigation-text-color', '#eb4449' );
	$link_color = get_theme_mod( 'links-color', '#eb4449' );
	?>
	<style>

		.main-navigation a:hover,
		.main-navigation a:focus,
		.main-navigation a:active {
			color: <?php echo sanitize_hex_color( $text_color ); ?>;
			background: <?php echo sanitize_hex_color( $bg_color ); ?>;
		}
		.main-navigation .menu .current-menu-ancestor>a,
		.main-navigation .menu .current-menu-item>a,
		.main-navigation .menu .current-menu-parent>a,
		.main-navigation .menu>li .sub-menu>li.current-menu-ancestor>a,
		.main-navigation .menu>li .sub-menu>li.current-menu-item>a,
		.main-navigation .menu>li .sub-menu>li.current-menu-parent>a,
		.main-navigation .menu>li .sub-menu>li>a:hover,
		.main-navigation .menu>li>a:hover {
			color: <?php echo sanitize_hex_color( $text_color ); ?>;
			background: <?php echo sanitize_hex_color( $bg_color ); ?>;
		}

		button:hover,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover {
			background: <?php echo sanitize_hex_color( $bg_color ); ?>;
			color: <?php echo sanitize_hex_color( $text_color ); ?>;
		}

		button:active,
		button:focus,
		input[type="button"]:active,
		input[type="button"]:focus,
		input[type="reset"]:active,
		input[type="reset"]:focus,
		input[type="submit"]:active,
		input[type="submit"]:focus {
			background: <?php echo sanitize_hex_color( $bg_color ); ?>;
			color: <?php echo sanitize_hex_color( $text_color ); ?>;
		}

		a {
			color: <?php echo sanitize_hex_color( $link_color ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'blogspace_customizer_css' );
