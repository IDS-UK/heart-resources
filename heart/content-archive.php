<?php
/**
 * The template used for displaying individual posts in an archive page
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<?php do_action( 'colormag_before_post_content' ); ?>
<?php 
   global $archive_count;
   if ($archive_count == 1) {
      $classes = array(
    'theme-list-item',
    'featured',
   );}
   else{
         $classes = array(
    'theme-list-item',
   );
      }

?>
<div  id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
   <?php 
   // Show post thumbnail, add 'featured' class, for larger image, if first in the list
      if ( has_post_thumbnail() ) { ?>
   <div class="<?php if ($archive_count == 1) { echo 'featured ';}?>theme-link-image">
   <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo the_post_thumbnail_url( 'heart-archive-thumbnail' ); ?>"></a>
   <?php if ($archive_count == 1){ ?>

   <span class="credit">
      <?php image_credit($id ? $id : $post->ID); ?>
   </span>
   <?php } ?>
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
			echo '<p>' . $teaser . sprintf( ' <a class="more-link" title="%1$s" href="%2$s"><span>%3$s</span></a>', get_the_title(get_the_ID()),get_permalink( get_the_ID() ),__( 'Read more', 'colormag' )) . '</p>';
         }
			else{
						
            the_excerpt();}
         ?>
         
      </div>

   <?php do_action( 'colormag_after_post_content' ); ?>
   </div>
</div>
