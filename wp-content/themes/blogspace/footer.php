<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogspace
 */

?>

	<footer id="colophon" class="site-footer">
		<?php
		get_template_part( 'template-parts/footer/widgets' );
		get_template_part( 'template-parts/footer/site-info' );
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
