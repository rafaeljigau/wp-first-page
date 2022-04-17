<?php
/**
 * Template part for showing the footer widgets
 *
 * @package Blogspace
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area footer-widgets">
	<div class="wrapper">
		<div class="footer-widgets-col">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div>
	</div>
</aside><!-- #secondary -->
