<?php
/**
 * Template part for showing the site branding
 *
 * @package Blogspace
 */

?>
<div class="site-branding">
	<?php the_custom_logo(); ?>

	<div class="title-tagline">
	<?php
	if ( is_front_page() && is_home() ) :
		?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
	else :
		?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
	endif;
	$blogspace_description = get_bloginfo( 'description', 'display' );
	if ( $blogspace_description || is_customize_preview() ) :
		?>
		<p class="site-description"><?php echo esc_html( $blogspace_description ); ?></p>
	<?php endif; ?>
	</div>
</div><!-- .site-branding -->
