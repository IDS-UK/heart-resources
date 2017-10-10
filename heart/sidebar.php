<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<div id="secondary" class="sidebarphp">
	<?php do_action( 'colormag_before_sidebar' ); ?>
		<?php
			if( is_page_template( 'page-templates/contact.php' ) ) {
				$sidebar = 'colormag_contact_page_sidebar';
			}
			else {
				$sidebar = 'colormag_right_sidebar';
			}
		?>

		<?php if ( ! dynamic_sidebar( $sidebar ) ) :
			if ( $sidebar == 'colormag_contact_page_sidebar' ) {
            $sidebar_display = __('Contact Page', 'colormag');
         } else {
            $sidebar_display = __('Right', 'colormag');
         }

      endif; ?>

	<?php do_action( 'colormag_after_sidebar' ); ?>
</div>