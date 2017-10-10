<?php
/**
 * The template part for displaying navigation.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<?php
if( is_archive() || is_home() || is_search() ) {
	/**
	 * Checking WP-PageNaviplugin exist
	 */
	if ( function_exists('wp_pagenavi' ) ) :
		wp_pagenavi();

	else:
		global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) :
		?>
		<ul class="default-wp-page clearfix">
			<li class="previous"><?php next_posts_link( __( '&larr; Previous', 'colormag' ) ); ?></li>
			<li class="next"><?php previous_posts_link( __( 'Next &rarr;', 'colormag' ) ); ?></li>
		</ul>
		<?php
		endif;
	endif;
}

?>