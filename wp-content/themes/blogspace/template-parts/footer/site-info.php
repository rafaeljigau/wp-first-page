<?php
/**
 * The template for displaying the site info
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogspace
 */

$blogspace_site_info = blogspace_site_info();
?>

<div class="site-info">
	<div class="wrapper">
		<?php
		if ( '' !== $blogspace_site_info ) {
			echo wp_kses( $blogspace_site_info, blogspace_site_info_tags_allowed() );
		}
		?>

		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Theme: %1$s by %2$s', 'blogspace' ), esc_html( blogspace_theme_name() ), ( '<a href="' . esc_url( blogspace_author_url() ) . '">CodeClove</a>' ) );
		?>
	</div>
</div><!-- .site-info -->
