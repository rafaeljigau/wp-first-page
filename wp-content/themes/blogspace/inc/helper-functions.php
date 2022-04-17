<?php
/**
 * Helpers functions
 *
 * @package Blogspace
 */

if ( ! function_exists( 'blogspace_default_archive_content' ) ) {
	/**
	 * Get default archive content.
	 *
	 * @return string.
	 */
	function blogspace_default_archive_content() {
		return apply_filters( 'blogspace_default_archive_content', 'excerpt' );
	}
}

/**
 * Get archive content.
 *
 * @return string.
 */
function blogspace_archive_content() {
	return get_theme_mod( 'sett_archive_content', blogspace_default_archive_content() );
}

if ( ! function_exists( 'blogspace_show_summary' ) ) {
	/**
	 * Whether to show the summary or the content.
	 *
	 * @return bool Whether to show the summary.
	 */
	function blogspace_show_summary() {
		global $post;

		$more_tag = apply_filters( 'blogspace_more_tag', strpos( $post->post_content, '<!--more-->' ) );

		$format = ( false !== get_post_format() ) ? get_post_format() : 'standard';

		$show_summary = ( 'excerpt' === blogspace_archive_content() );

		$show_summary = ( 'standard' !== $format ) ? false : $show_summary;

		$show_summary = ( $more_tag ) ? false : $show_summary;

		$show_summary = ( is_search() ) ? true : $show_summary;

		return apply_filters( 'blogspace_show_summary', $show_summary );
	}
}

/**
 * Get HTML tags allowed for site info text.
 *
 * @return array
 */
function blogspace_site_info_tags_allowed() {
	return apply_filters(
		'blogspace_site_info_tags_allowed',
		array(
			'span'   => array( 'class' => array() ),
			'strong' => array(),
			'em'     => array(),
			'br'     => array(),
			'a'      => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
				'class' => array(),
			),
		)
	);
}

/**
 * Get default site info.
 *
 * @return string.
 */
function blogspace_default_site_info() {
	return apply_filters(
		'blogspace_default_site_info',
		sprintf(
			/* translators: 1: current year, 2: blog name */
			esc_html__( 'Copyright &copy; %1$s %2$s.', 'blogspace' ),
			esc_html( date_i18n( _x( 'Y', 'copyright date format', 'blogspace' ) ) ),
			get_bloginfo( 'name', 'display' )
		)
	);
}

/**
 * Get site info.
 *
 * @return string.
 */
function blogspace_site_info() {
	return get_theme_mod( 'sett_site_info', blogspace_default_site_info() );
}

/**
 * Get theme name.
 *
 * @return string
 */
function blogspace_theme_name() {
	return wp_get_theme()->get( 'Name' );
}

/**
 * Get theme author URI.
 *
 * @return string
 */
function blogspace_author_url() {
	return wp_get_theme()->get( 'AuthorURI' );
}
