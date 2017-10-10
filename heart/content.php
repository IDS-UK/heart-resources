<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php do_action( 'colormag_before_post_content' ); ?>

   <div class="article-content clearfix">

      <?php if( get_post_format() ) { get_template_part( 'inc/post-formats' ); } ?>

      <header class="entry-header">
		 <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
         </h1>
      </header>
      <?php colormag_colored_category(); ?>
      <?php colormag_entry_meta(); ?>

      <div class="entry-content clearfix">
         <?php
            the_excerpt();
         ?>
         
      </div>

   </div>

   <?php do_action( 'colormag_after_post_content' ); ?>
</article>