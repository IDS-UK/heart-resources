<?php
/**
 * The template used for displaying single posts
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'colormag_before_post_content' ); ?>

   <?php if( get_post_format() ) { get_template_part( 'inc/post-formats' ); } ?>

	   <?php
      $image_popup_id = get_post_thumbnail_id();
      $image_popup_url = wp_get_attachment_url( $image_popup_id );
   ?>

   <?php if ( has_post_thumbnail() ) { ?>
      <?php if (!is_post_type('reading_pack')){?>
	  
	  <div class="featured-image theme-link-image">
      <?php if (get_theme_mod('colormag_featured_image_popup', 0) == 1) { ?>
         <a href="<?php echo $image_popup_url; ?>" class="image-popup"><?php the_post_thumbnail( 'colormag-featured-image' ); ?></a>
      <?php } else { ?>
         <?php the_post_thumbnail( 'colormag-featured-image' ); ?>
      <?php } ?>
		<span class="credit">
			<?php image_credit($id ? $id : $post->ID); ?>
		</span>
      </div>
	<?php } ?>  
   <?php } ?>

   <div class="article-content clearfix">

		<?php 
		// Display download button
			download_info(); 
		?>

   	<div class="entry-content clearfix">
   		<?php
   		// Display Helpdesk query if post is Helpdesk
		if (is_post_type('post')){
			$helpdesk_query = get_field( "helpdesk_query" );
			if (!empty($helpdesk_query)){
		?>
		<div class="query">
			<strong>Helpdesk Query:</strong>
		<?php
		  echo $helpdesk_query;
		?>
		</div>
		
			<strong>Summary:</strong>
		
		<?php
			}
		}
   			the_content();
   		// Display Key Readings and Questions to Guide Reading if post is a Reading Pack	
		if (is_post_type('reading_pack')){
			$key_readings = get_field ("key_readings");
			$question = get_field( "questions_to_guide_reading" );
			$kr_author = '';
			$kr_year = '';
			$kr_title = '';
			$kr_publisher ='';
						
			if (!empty($key_readings)){
				?>
				<div class="key-readings">
					<h4>Key Readings</h4>
					<ol>
					<?php
				foreach ($key_readings as $key_reading){
					$kr_author = get_field ("author", $key_reading->ID);
					$kr_year = get_field ("publication_year", $key_reading->ID);
					$kr_title = '<a href="' . $key_reading->guid . '"><strong>' . $key_reading->post_title . '</strong></a>';
					if (!empty($kr_year)){
						$kr_year = '(' . $kr_year . ')';
					}
					$kr_publisher = get_field ("publisher", $key_reading->ID);
					
					$kr_outputs = array($kr_author, $kr_year, $kr_title, $kr_publisher);
					
					echo '<li><div class="key-reading-meta">';
					
					foreach ($kr_outputs as $kr_output){
						if ($kr_output){
						echo $kr_output . ' ';	
						}
												
					}
					echo '</div>';
					
					echo '<div class="key-reading-abstract">'. $key_reading->post_content . '</div>';
					echo '<hr></li>';	
					
				}
			?>
				</ol></div>
				<?php
			}
			
			if (!empty($question)){
				?>
				<div class="query">
					<h4>Questions to guide reading</h4>
				<?php
				  echo $question;
				?>
				</div>
						
				<?php
			}
			
		}	
			
		// Display download button
			download_info(); 

			
   			wp_link_pages( array(
   				'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'colormag' ),
   				'after'             => '</div>',
   				'link_before'       => '<span>',
   				'link_after'        => '</span>'
   	      ) );

   		?>
   	</div>

   </div>

	<?php do_action( 'colormag_after_post_content' ); ?>
</article>