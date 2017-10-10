<?php
/**
 * The template for displaying Archive page.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<?php get_header(); ?>

	<?php do_action( 'colormag_before_body_content' ); ?>

	<div id="primary">
		<div id="content" class="clearfix">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
               <?php if ( is_category() ) {
                  do_action('colormag_category_title');
                  single_cat_title();
                  } else { ?>
					<div class="title-block"><h1>
						<?php
							if ( is_tag() ) :
								
								echo '<i class="fa fa-tags"></i> Tag: ';
								single_tag_title();

							elseif ( is_author() ) :
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author: %s', 'colormag' ), '<span class="vcard">' . get_the_author() . '</span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'colormag' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'colormag' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'colormag' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'colormag' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'colormag');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'colormag' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'colormag' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'colormag' );

							else :
							$object = get_post_type_object( get_post_type( get_the_ID() ));
							$obj = $object->labels->name;
							?>
							<i class=" <?php heart_get_post_type(get_the_ID());?>"></i>
							<?php
								_e( $obj, 'colormag' );

							endif;
						?>
					</h1>
					<?php
						if (!empty($object)){
						// Show an optional post type description 
						 if ( !is_category() ) { 
							$post_type_description = $object->description;
								if ( ! empty( $post_type_description ) ) {
									printf( '<div class="post-type-description">%s</div>', $post_type_description );
								}
						 }				
						}
						
						if (is_archive() || is_category()){
						the_archive_description ( $before = '<div class="post-type-description">', $after = '</div>' );
						}

					?>

					</div>
                  <?php } ?>

				</header><!-- .page-header -->

            <div class="article-container theme-list-wrapper">

   				<?php 
   				// Set up variable to define if the post is the first in the list
   					$archive_count = 1; ?>

   				<?php while ( have_posts() ) : the_post(); ?>

   					<?php get_template_part( 'content', 'archive' ); ?>

   					 <?php $archive_count++; ?>

   				<?php endwhile; ?>

            </div>

				<?php get_template_part( 'navigation', 'archive' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>
			
			<?php if (is_post_type_archive('topic')){
				peaks_topic_guide(); 
			}?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php colormag_sidebar_select(); ?>

	<?php do_action( 'colormag_after_body_content' ); ?>

<?php get_footer(); ?>