<?php
/**
 * Template part for showing the site navigation
 *
 * @package Blogspace
 */

if ( ! has_nav_menu( 'menu-1' ) ) {
	return;
}
?>
<nav id="site-navigation" class="main-navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Navigation Menu', 'blogspace' ); ?></button>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		)
	);
	?>
</nav><!-- #site-navigation -->
