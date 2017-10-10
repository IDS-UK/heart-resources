<?php 

/**
 * Related Posts template part.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */

$related_posts = colormag_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

   <h2 class="interested-title"><?php _e('You may also be interested in', 'colormag'); ?></h2>

   <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
   <div  id="post-<?php the_ID(); ?>" <?php post_class('theme-list-item'); ?>>

   <?php if ( has_post_thumbnail() ) { ?>
      <div class="theme-link-image">
         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo the_post_thumbnail_url( 'colormag-featured-image' ); ?>"></a>
      </div>
   <?php }  ?> 

      <div class="theme-link-text-block">

      <?php colormag_colored_category(); ?>

         <a class="theme-link-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>

       <?php colormag_entry_meta(); ?>

         <div class="theme-link-summary">
         <?php
                  
         $teaser = get_post_meta ( get_the_ID(), 'teaser_text', true );

         if (!empty($teaser)){
            echo '<p>' . $teaser . '</p>';}
         else{
                  
            the_excerpt();
         }
         ?>
         
         </div>

      <?php do_action( 'colormag_after_post_content' ); ?>
      </div>
   </div>

   <?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query(); ?>