<?php
/**
 * Theme Footer Section for our theme.
 *
 * Displays all of the footer section and closing of the #main div.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

		</div><!-- .inner-wrap -->
	</div><!-- #main -->
   <?php if ( is_active_sidebar('above_footer_sidebar_one') ) { ?>
      <div class="above-footer clearfix grad">

         <div class="inner-wrap">
               <h1 class="section-title">Connect with us</h1>
         	<div class="above-footer-left">
            <?php dynamic_sidebar('above_footer_sidebar_one'); ?>
            </div>
            <div class="above-footer-right">
            <?php dynamic_sidebar('above_footer_sidebar_two'); ?>
            </div>
         </div>
         <div class="gradient"></div>
      </div>
   <?php } ?>
	<?php do_action( 'colormag_before_footer' ); ?>
		<footer id="colophon" class="clearfix">
			<?php get_sidebar( 'footer' ); ?>
			<div class="footer-socket-wrapper clearfix">
				<div class="inner-wrap">
					<div class="footer-socket-area">
                  <div class="footer-socket-right-section">
   						<?php if( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) { colormag_social_links(); } ?>
                  </div>
                  <div class="footer-socket-left-section">
   						<?php do_action( 'colormag_footer_copyright' ); ?>
                  </div>
					</div>
				</div>
			</div>
		</footer>
		<a href="#masthead" id="scroll-up"><i class="fa fa-chevron-up"></i></a>
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>