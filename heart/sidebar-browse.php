<?php
/**
 * The left sidebar widget area.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<div id="secondary">
	<?php do_action( 'colormag_before_sidebar' );?>
	
	<?php 

	// Display related doc lib items if is single Topic Guide item
		if (is_singular('topic')){
			topic_guide_related();
		} 
	// Display bibliographic data if is single Document Library item
		if (is_singular('doc_lib')){
		$author = get_post_meta ( get_the_ID(), 'author', true ); 
		$pub_year = get_post_meta ( get_the_ID(), 'publication_year', true );
		$publisher = get_post_meta ( get_the_ID(), 'publisher', true ); 
	?>

		<div class="document_meta_data">
	<?php
			
			if ( is_archive() == false ) {
			
				if ( !empty($author) ) {
				echo "<span class='meta_title'>Author(s): </span>" . $author . "<br />";
				}
				
				if ( !empty($pub_year) ) {
				echo "<span class='meta_title'>Published: </span>" . $pub_year . "<br />";
				}
				
				if ( !empty($publisher) ) {
				echo "<span class='meta_title'>Publisher: </span>" . $publisher . "<br />";
				}
			}
	?>
		</div>
	<?php 
	// Display Topic Guide that Document Library item features in
		document_library_topic_guide();?>
	<?php
		}
	?>

	<?php 
	//Display Reading Pack author if is single Reading Pack item

		if (is_singular('reading_pack')){
				$rpauthor = get_the_terms( $post->ID, 'rp_author' );
	
		if (!empty($rpauthor)){

	?>
			<aside class="widget widget_text clearfix">
				<h3 class="widget-title">
					Author details:
				</h3>	
			<?php heart_rp_authors();?>
			</aside>
<?php 
		}
	}
	?>
	
	<?php 
	// Display Browse buttons for content type
		heart_browse_widget(get_post_type());?>

	<?php
	// Displays branding for documents - currently just Orie and MQSUN
			if (is_singular()){
		  		 heart_content_partner();
			}
	?>

	<?php do_action( 'colormag_after_sidebar' ); ?>
</div>