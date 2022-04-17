<?php
/**
 * Example implementation of the 'Customizer Helper'.
 *
 * @link       https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package    customizer-helper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version    1.0.0
 */

/**
 * Load the helper class.
 */
if ( file_exists( dirname( __FILE__ ) . '/class-customizer-helper.php' ) ) {
	require_once dirname( __FILE__ ) . '/class-customizer-helper.php';
}

/**
 * Defines customizer settings
 */
function customizer_helper_settings() {

	// Stores all the panels to be added.
	$panels = array();

	// Stores all the sections to be added.
	$sections = array();

	// Stores all the settings that will be added.
	$settings = array();

	// Header Navigation text color control.
	$settings['navigation-text-color'] = array(
		'section'  => 'colors',
		'id'       => 'navigation-text-color',
		'label'    => esc_html__( 'Navigation Text Color On Hover', 'blogspace' ),
		'type'     => 'color',
		'priority' => 41,
		'default'  => '#2f4468',
	);

	// Header navigation background hover control.
	$settings['navigation-hover-color'] = array(
		'section'  => 'colors',
		'id'       => 'navigation-hover-color',
		'label'    => esc_html__( 'Navigation Hover Color', 'blogspace' ),
		'type'     => 'color',
		'priority' => 41,
		'default'  => '#eb4449',
	);

	// Link colors control.
	$settings['links-color'] = array(
		'section'  => 'colors',
		'id'       => 'links-color',
		'label'    => esc_html__( 'Links Color', 'blogspace' ),
		'type'     => 'color',
		'priority' => 41,
		'default'  => '#eb4449',
	);

	// Adds the panels to the $settings array.
	$settings['panels'] = $panels;

	// Adds the sections to the $settings array.
	$settings['sections'] = $sections;

	$customizer_helper = Customizer_Helper::Instance();
	$customizer_helper->add_settings( $settings );

}
add_action( 'init', 'customizer_helper_settings' );
