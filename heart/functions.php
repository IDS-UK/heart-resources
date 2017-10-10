<?php 

/* Sets up parent theme */
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'colormag', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css' );
    wp_enqueue_style( 'webflow-basic', get_stylesheet_directory_uri() . '/css/webflow.css' );
    wp_enqueue_style( 'webflow', get_stylesheet_directory_uri() . '/css/heart-resources.webflow.css' );
}
function theme_enqueue_scripts() {
	wp_enqueue_script('heart-js', get_stylesheet_directory_uri() . '/js/heart.js', array( 'jquery' ), '1.0.0', true );  
    wp_enqueue_script('webflow-js', get_stylesheet_directory_uri() . '/js/webflow.js', array( 'jquery' ), '1.0.0', true );  
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Custom image sizes 
if ( function_exists( 'add_image_size' ) ) { 
    add_image_size ('home-slider', 1280, 1024, true);
    add_image_size( 'heart-archive-thumbnail', 410, 9999 ); //300 pixels wide (and unlimited height)
}

// Navigation hack - adds class top-link to top nav

function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
    $menu_locations = get_nav_menu_locations();

    if ( has_term($menu_locations['header-menu'], 'nav_menu', $item) ) {
       $item_output = preg_replace('/<a /', '<a class="top-link" ', $item_output, 1);
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);

/* Widgets */
/* Set up bespoke widgets for above footer - used for Newsletter sign up and Twitter
/*-----------------------------------------------------------------------------------*/
add_action( 'widgets_init', 'heart_widgets_init' );
function heart_widgets_init() {
	// Registering above footer sidebar one
	register_sidebar( array(
		'name' 				=> esc_html__( 'Above Footer Sidebar One', 'colormag' ),
		'id' 					=> 'above_footer_sidebar_one',
		'description'   	=> esc_html__( 'Shows widgets at above footer sidebar one.', 'colormag' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering above footer sidebar two
	register_sidebar( array(
		'name' 				=> esc_html__( 'Above Footer Sidebar Two', 'colormag' ),
		'id' 					=> 'above_footer_sidebar_two',
		'description'   	=> esc_html__( 'Shows widgets at above footer sidebar two.', 'colormag' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );
}

/* Filter to exclude document library (doc-lib) items from the homepage query 
/* Filter removed 10/17 due to changed requirements */
/*-----------------------------------------------------------------------------------*/
function exclude_doc_lib($query) {
if ( $query->is_home() ) {
	if ( isset($query->query_vars['post_type'])) {
		if ( is_array($query->query_vars['post_type'])) {
			if(($key = array_search('doc_lib', $query->query_vars['post_type'])) !== false) {
				unset($query->query_vars['post_type'][$key]);
			}
		}
	}
}
return $query;
}

//add_filter('pre_get_posts', 'exclude_doc_lib');


// Remove p tags from category description
remove_filter('term_description','wpautop');

/* Registers top/header menu used for Content Types  */
/*-----------------------------------------------------------------------------------*/
function heart_register_top_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'heart_register_top_menu' );

/* gets post type and returns as font-awesome class 
/* Font-awesome icons used:
Helpdesk file or question-circle
Assignment copy
Blog comment
Topic book
Doc-lib file-text
HEART talks video-camera
Announcements bullhorn
*/
/*-----------------------------------------------------------------------------------*/
function heart_get_post_type($id){

	$posttype = get_post_type($id);

	switch ($posttype) {
			case 'post':
			echo 'fa fa-question-circle';
			break;
			case 'doc_lib':
			echo 'fa fa-file-text';
			break;
			case 'assignment':
			echo 'fa fa-copy';
			break;
			case 'mmedia':
			echo 'fa fa-video-camera';
			break;
			case 'blog':
			echo 'fa fa-comment';
			break;
			case 'announcements':
			echo 'fa fa-bullhorn';
			break;
			case 'topic':
			echo 'fa fa-book';
			break;
			case 'reading_pack':
			echo 'fa fa-clone';
			break;
	}
}


/*
 * Category Color for widgets and other - overwrites parent function 
 * Also shows post type icon and text and any branding (on single items only)
 */

function colormag_colored_category() {
	global $post;
	$categories = get_the_category();
	$separator = '&nbsp;';
	$output = '';

	?>
	<div class="theme-labels content">

	<?php

	if($categories) {
	$output .= '';
		foreach($categories as $category) {

			if($category->term_id == 4 || $category->term_id == 5 || $category->term_id == 11 || $category->term_id == 2304 || $category->term_id == 2305 ) {

					if ($category->term_id == 4):
					$color_border_value = '#b56b79';
					elseif ($category->term_id == 5):
					$color_border_value = '#628bb3';
					elseif ($category->term_id == 11):
					$color_border_value = '#d5992a';
					elseif ($category->term_id == 2304):
					$color_border_value = '#8a85bf';
					elseif ($category->term_id == 2305):
					$color_border_value = '#796d65';
					endif;
				$output .= '<div class="theme-label" style="background-color:' . $color_border_value . '"><a href="'.get_category_link( $category->term_id ).'"'  . '" rel="category tag">'.$category->cat_name.'</a></div>';
			}
		}
	 echo trim($output, $separator);

	}
	  
	?>

	</div>
	<?php	  
}
   
/*
*  Home page slider - Creates category labels for post with icons
*/

function heart_home_slider_category() {
	global $post;
	$categories = get_the_category();
	$separator = '&nbsp;';
	$output = '';	
	?>
	  
	<div class="education no-bg slide-theme">
	                
	<?php
  
	if($categories) {
	    $output .= '';
	    foreach($categories as $category) {

			if($category->term_id == 4) {
	       $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="slide-theme-label" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><svg id="education" data-name="education" class="slide-theme-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.87 70.87"><defs><style>.cls-1{fill:#fff;}</style></defs><title>education</title><path class="cls-1" d="M23.45,28.78c1.25-.73,2.48-1.53,3.76-2.16a38.53,38.53,0,0,1,9.66-3.3A2,2,0,0,0,38.68,21a1.71,1.71,0,0,0-2.24-1.55,39.87,39.87,0,0,0-13.16,5.22,14.73,14.73,0,0,0-4,3.73,17.54,17.54,0,0,0-1.3,2.24A2.31,2.31,0,0,0,17.86,33a4,4,0,0,1-.52,4.15,1.89,1.89,0,0,0-.44,1.48,71.37,71.37,0,0,1-.25,12,26.06,26.06,0,0,1-2.24,8.8C13.59,61,12.54,62.31,11,62.54a4.28,4.28,0,0,1-1.94-.16C7,61.71,5.42,60,3.93,58l.47-.54a34.66,34.66,0,0,0,8.79-17.35c.09-.47.14-1,.23-1.42a3.19,3.19,0,0,0-.33-2.3,4.13,4.13,0,0,1,1.16-5.16,2.17,2.17,0,0,0,.66-.85c.31-.65.55-1.36.84-2s.59-1.26.94-2c-.25-.12-.49-.23-.73-.33C13.27,25,10.57,23.92,7.9,22.8a1.87,1.87,0,0,1-.9-.87,1.6,1.6,0,0,1,.88-2.2l7.19-2.9C22,14,29,11.22,36,8.45a2.32,2.32,0,0,1,1.64,0Q51.73,14,65.78,19.7a1.87,1.87,0,0,1,.75.47A1.68,1.68,0,0,1,66,22.78c-2.2.91-4.42,1.78-6.62,2.67C52.21,28.33,45,31.22,37.87,34.06a2.63,2.63,0,0,1-1.84,0C32,32.54,28,30.9,24,29.29c-.16-.06-.31-.15-.47-.22l0-.28"/><path class="cls-1" d="M22.34,32.63l11.76,4.73c1.37.55,2.71,1.24,4.21.57,1.75-.78,3.54-1.45,5.31-2.16l7.25-2.91c.16-.07.33-.11.56-.19a48.18,48.18,0,0,1,1.78,8.68,6.83,6.83,0,0,1-.89,3.85,16.79,16.79,0,0,1-4.72,5.47A17.19,17.19,0,0,1,24.18,49.1a19.58,19.58,0,0,1-2.48-3.27,7.75,7.75,0,0,1-1-5.8c.37-1.88.76-3.75,1.16-5.62.12-.57.3-1.13.47-1.78"/></svg>' . esc_html( $category->cat_name ) . '</a>';
			}
			elseif($category->term_id == 5) {
	       $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="slide-theme-label" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><svg id="health" data-name="health" class="slide-theme-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.87 70.87"><defs></defs><title>health</title><path class="cls-1" d="M25.25,38.34c.31,1,.58,1.82.85,2.66.69,2.21,1.36,4.43,2.05,6.64a2.38,2.38,0,0,0,4.69-.13q1.85-7.42,3.7-14.84a1.47,1.47,0,0,1,.26-.59c.18.8.37,1.6.54,2.4.34,1.59.67,3.18,1,4.77a2.33,2.33,0,0,0,2.45,2q4.34,0,8.67,0a2.35,2.35,0,1,0,0-4.69c-2.06,0-4.11,0-6.17,0h-.66l-.94-4.36c-.81-3.79-1.62-7.59-2.45-11.38A2.23,2.23,0,0,0,37.3,19,2.2,2.2,0,0,0,35,20.09a3.42,3.42,0,0,0-.39,1q-2.09,8.34-4.17,16.67c0,.15-.09.3-.18.58l-1.61-5.17c-.29-.93-.57-1.87-.87-2.79a2.37,2.37,0,0,0-4.54-.12c-.73,1.94-1.45,3.88-2.15,5.83a.61.61,0,0,1-.7.48q-4.12,0-8.24,0c-.33,0-.56,0-.72-.39C9,30.6,8.73,25,11.91,19.68a15.78,15.78,0,0,1,14-8.07,14.53,14.53,0,0,1,7.8,2.49c.92.56,1.85,1.1,2.77,1.67a2.53,2.53,0,0,0,2.77.05c1-.59,2.09-1.17,3.15-1.74a16.43,16.43,0,0,1,8.41-2.14c6.31.2,10.86,3.12,13.33,9,2.86,6.78,2.16,13.35-1.58,19.63a25.51,25.51,0,0,1-7.75,7.93c-2.84,1.94-5.76,3.75-8.65,5.61-2.58,1.66-5.17,3.31-7.74,5a.82.82,0,0,1-1.07,0A189.34,189.34,0,0,1,19.82,46.32a1.69,1.69,0,0,0-1-.34c-3.79,0-7.57,0-11.36,0a2.33,2.33,0,0,1-2.2-3.43,2.36,2.36,0,0,1,2.28-1.25H22.33a2.36,2.36,0,0,0,2.44-1.65C24.92,39.24,25.06,38.86,25.25,38.34Z"/></svg>' . esc_html( $category->cat_name ) . '</a>';
			}
			elseif($category->term_id == 11) {
	       $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="slide-theme-label" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><svg id="nutrition" data-name="nutrition" class="slide-theme-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.87 70.87"><defs><style>.cls-1{fill:#fff;}</style></defs><title>nutrition</title><path class="cls-1" d="M56.1,56.37c-9.66-14.68-27-4.27-27-4.27l0,.14s12.75,15.22,27,4.31Z"/><path class="cls-1" d="M42.35,44.4c-9.65-14.69-27-4.28-27-4.28l0,.14s12.75,15.22,27,4.32Z"/><path class="cls-1" d="M28.46,32.44c-8.21-12.49-23-3.64-23-3.64l0,.12s10.83,12.95,23,3.67Z"/><path class="cls-1" d="M57.86,54.25C41.95,47.07,49.16,28,49.17,28l.13,0S66.25,38.1,58,54.2Z"/><path class="cls-1" d="M43.9,42.52C28,35.35,35.2,16.24,35.21,16.23l.12,0s17,10.18,8.74,26.27Z"/><path class="cls-1" d="M30,30.66c-13.53-6.11-7.4-22.34-7.4-22.34l.11,0s14.42,8.65,7.43,22.33Z"/><path class="cls-1" d="M20.18,23.62C19.44,10.72,5.06,11,5.06,11L5,11s2.46,14.38,15.1,12.68Z"/><path class="cls-1" d="M59,55.51a9,9,0,0,0,6.88,3l-2,4.07a14.93,14.93,0,0,1-5.8-4.64Z"/></svg>' . esc_html( $category->cat_name ) . '</a>';
			}
			elseif($category->term_id == 2304) {
	       $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="slide-theme-label" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><svg id="water" class="slide-theme-image" data-name="water" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.87 70.87"><defs><style>.cls-1{fill:#fff;}</style></defs><title>water</title><path class="cls-1" d="M33.72,60.84h-.59c-6.07-.23-11.18-5.3-11.86-11.78-.05-.5-.08-1-.09-1.5a1.65,1.65,0,0,1,1.53-1.78,1.62,1.62,0,0,1,1.64,1.7,10.33,10.33,0,0,0,1.25,5,9,9,0,0,0,7.85,5,1.67,1.67,0,0,1,1.7,1.21,1.69,1.69,0,0,1-1.44,2.21m20-16.62a30,30,0,0,0-2.32-8.72A67.41,67.41,0,0,0,47,26.93c-2.29-3.89-4.65-7.75-6.94-11.64a50.52,50.52,0,0,1-3.58-6.91,12.21,12.21,0,0,1-1-3.39l-.08.26c-.27.83-.52,1.67-.82,2.48a57.21,57.21,0,0,1-4.34,8.78Q26.63,22.68,23,28.81a49.87,49.87,0,0,0-4.47,9.45,23.56,23.56,0,0,0-1.25,11.26,18.82,18.82,0,0,0,9.54,14.17A17.35,17.35,0,0,0,38.7,65.56a17.76,17.76,0,0,0,12.1-8.22,19.87,19.87,0,0,0,2.94-13.12"/></svg>' . esc_html( $category->cat_name ) . '</a>';
			}
			elseif($category->term_id == 2305) {
	       $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="slide-theme-label" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><svg id="social" data-name="social" class="slide-theme-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.87 70.87"><defs><style>.cls-1{fill:#fff;}</style></defs><title>childcare</title><path class="cls-1" d="M43.21,36.9a6.25,6.25,0,0,0-6.15,6.4,6.79,6.79,0,0,0,7.09,6.89,6.09,6.09,0,0,0,5.9-6.05C50,40,47,36.85,43.21,36.9m.91,15.15c-5.65.23-8.47-3.11-10.92-7a9.81,9.81,0,0,0-1.61-2.37c-.65-.55-1.85-1.15-2.47-.91A2.89,2.89,0,0,0,27.56,44a13.71,13.71,0,0,0,1.38,4.79c.76,1.53.4,2.38-1.06,2.86a15.48,15.48,0,0,1-3.18.58c-1,.11-2,.07-3,.1l-.11.55a10.18,10.18,0,0,0,2.34,1.16c3.18.66,6.38,1.21,9.58,1.75,1.07.18,2.18.11,3.24.32a4.42,4.42,0,0,1,3.64,3.62c.42,1.85-.63,3.12-2,4.16-2.69,2-5.87,1.94-8.94,1.63a25.91,25.91,0,0,1-10.54-3.42c-6.42-3.74-8.78-9.43-6.5-16.37a54.23,54.23,0,0,1,7.94-16,7.28,7.28,0,0,1,6-3.13c6.31.1,12.62.34,18.92.64a7.59,7.59,0,0,1,6,3.6,118.18,118.18,0,0,1,7.18,12.25c2.48,5-.25,10.4-4.76,14.35a11.29,11.29,0,0,1-7.79,3.08,4.72,4.72,0,0,1-4.55-2.49c-.8-1.6.17-3,1.22-4.3.4-.47.84-.91,1.59-1.73"/><path class="cls-1" d="M46.68,15.17a10.55,10.55,0,0,1-21.08.56,10.55,10.55,0,0,1,21.08-.56"/></svg>' . esc_html( $category->cat_name ) . '</a>';
			}
  		}
    	echo trim($output, $separator);	
  	}
	?>

	</div>
	<?php	  
 } 
 
 /**
 * This function is for social links display on header -  - overwrites parent function
 *
 * Get links through Theme Options
 */
function colormag_social_links() {

   $colormag_social_links = array( 'colormag_social_facebook' 	=> __( 'Facebook', 'colormag' ),
									'colormag_social_twitter' 		=> __( 'Twitter', 'colormag' ),
									'colormag_social_googleplus' 	=> __( 'Google-Plus' , 'colormag' ),
									'colormag_social_instagram' 	=> __( 'Instagram', 'colormag' ),
									'colormag_social_pinterest' 	=> __( 'Pinterest', 'colormag' ),
									'colormag_social_youtube' 		=> __( 'YouTube', 'colormag' ),
									'colormag_social_vimeo' 	=> __( 'Vimeo', 'colormag' ),
									'colormag_social_soundcloud' 	=> __( 'Soundcloud', 'colormag' ),
									'colormag_social_rss' 		=> __( 'RSS', 'colormag' )
							 	);
	?>
	<div class="social-links clearfix">
		<ul>
		<?php
			$i=0;
			$colormag_links_output = '';
			foreach( $colormag_social_links as $key => $value ) {
				$link = get_theme_mod( $key , '' );
				if ( !empty( $link ) ) {
					if ( get_theme_mod( $key.'_checkbox', 0 ) == 1 ) { $new_tab = 'target="_blank"'; } else { $new_tab = ''; }
					$colormag_links_output .=
						'<li><a href="'.esc_url( $link ).'" '.$new_tab.'><i class="fa fa-'.strtolower($value).'"></i></a></li>';
				}
				$i++;
			}
			echo $colormag_links_output;
		?>
		</ul>
	</div><!-- .social-links -->
	<?php
}

/*
* Get top level categories for a post - filters to only top level "theme" categories, currently Health, Nutrition and Education
* Returns array of top level categories
*/

function heart_top_level_cats(){

	global $post;
	$cats = array();
	//Loop through categories for this post

		foreach (get_the_category($post->ID) as $c) {
			$cat = get_category($c);
	//If category isn't top level, then find parent

			if ($cat->parent != 0) {
				$cat = get_category($cat->parent);
			}
	//If category is a "theme" category, extract the theme name into an array - filtered by current top level themes
			if($cat->name == 'Health' || $cat->name == 'Education' || $cat->name =='Nutrition') {
		       $cats[] = $cat->name;
			}
		}
	//Removes duplicate themes - this can happen if both the child and parent theme are ticked
		$result = array_unique($cats);
	return $result;
}	

/*
*  Returns string containing lower case theme name of top level categories associated with a post
* Used for css of .item-header single posts
*/

function heart_top_level_css(){
	$cats = heart_top_level_cats();
	if (sizeOf($cats) == 1) {

	$post_categories = implode(' ', $cats);
	} else {
	$post_categories = '';
	}

return strtolower($post_categories);
}

/**
* Add title before #primary for single post items - uses colormag_before_body_content hook
*/

function heart_header_first(){
	if (is_singular()){
	   echo '<div class="item-header clearfix ' . heart_top_level_css() . '">';
	   colormag_colored_category();
	   echo '<h1 class="heading">'. get_the_title() . '</h1>';
	   colormag_entry_meta(); 
	   echo '</div>';
	}
}
add_action( 'colormag_before_body_content', 'heart_header_first', 10, 1 );

/**
* Creates browse and search by widget for certain post types - pass post type from page
*/

function heart_browse_widget ($post_type){
	$obj = get_post_type_object( $post_type );
	$post_type_name = $obj->labels->name;
	?>
	<aside class="widget widget_text clearfix">
		<h3 class="widget-title">
			Browse <?php echo $post_type_name;?> by:
		</h3>	
		<div class="browse-link-block">
		   <a class="browse-link-button health w-inline-block" href="<?php echo esc_url( home_url() );?>/category/health/?post_type=<?php echo $post_type;?>">

		   <img class="browse-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/health_1.svg">

		   <div class="browse-link-text">Health</div>
		   </a>
		   <a class="browse-link-button education w-inline-block" href="<?php echo esc_url( home_url() );?>/category/education/?post_type=<?php echo $post_type;?>">

		   <img class="browse-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/education_1.svg">

		   <div class="browse-link-text">Education</div>
		   </a>
		   <a class="browse-link-button nutrition w-inline-block" href="<?php echo esc_url( home_url() );?>/category/nutrition/?post_type=<?php echo $post_type;?>">

		   <img class="browse-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/nutrition_1.svg">

		   <div class="browse-link-text">Nutrition</div>
		   </a>
		</div>
	</aside>

	<aside class="widget widget_text clearfix">
		<h3 class="widget-title">
			Search <?php echo $post_type_name;?>
		</h3>	
		<div class="w-form">
		   <form action="<?php bloginfo('url'); ?>" class="search-block" method="get">
			   
				  <input type="text" placeholder="Search" class="w-input" name="s">
				  <input type="hidden" name="post_type" value="<?php echo $post_type;?>" />
				  <button class="search-icon search-button w-button" type="submit"></button>
			   
			</form><!-- .searchform -->                  
		</div>
	</aside>
	<?php
}

/**
 * Shows meta information of post - overwrites parent function
 */
function colormag_entry_meta() {
 	global $post;
 	// Don't display on pages
 	if (!is_page()){
	   	echo '<div class="meta-block">';
	   	?>
	   	<div class="post-type meta-sub-block">
	   		
	   		<div class="icon-font meta"><i class=" <?php heart_get_post_type(get_the_ID());?>"></i></div> 
	   		<div class="meta-text"><a href="<?php 
	   			if (get_post_type(get_the_ID()) == 'post'){ 
	   				echo esc_url( home_url( '/' ) ) . 'category/helpdesk-reports';
	   			}
	   			else {
	   				echo esc_url( home_url( '/' ) ) . get_post_type(get_the_ID());
	   			}
	   			?>"><?php posttypetext($post->ID);?></a></div>
	   		
	   	</div>

	   	<div class="meta-sub-block">
	      <?php
	      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	      $time_string = sprintf( $time_string,
	         esc_attr( get_the_date( 'c' ) ),
	         esc_html( get_the_date() ),
	         esc_attr( get_the_modified_date( 'c' ) ),
	         esc_html( get_the_modified_date() )
	      );
	   	printf( __( '<div class="icon-font meta"><i class="fa fa-calendar-o"></i></div><div class="meta-text"> %3$s</div>', 'colormag' ),
	   		esc_url( get_permalink() ),
	   		esc_attr( get_the_time() ),
	   		$time_string
	   	); ?>

	   	</div>
	      <?php
	      // Shows comment meta if has 1 or more comments
	        if ( ! post_password_required() && (get_comments_number()>0)) { ?>
	            <div class="meta-sub-block">
         			<div class="comments"><?php comments_popup_link( __( '<i class="fa fa-comment"></i> 0 Comments', 'colormag' ), __( '<i class="fa fa-comment"></i> 1 Comment', 'colormag' ), __( '<i class="fa fa-comments"></i> % Comments', 'colormag' ) ); ?></div>
         		</div>
      	<?php 
      		}

	   	edit_post_link( __( 'Edit', 'colormag' ), '<div class="meta-sub-block"><div class="edit-link"><i class="fa fa-edit"></i>', '</div></div>' );

	   	echo '</div>';
   	}
   
}

/**
* Add tags after post content - uses colormag_after_post_content action hook
*/

function tags_at_end($id){
	   $tags_list = get_the_tag_list( ' <div class="meta-block tags"><div class="icon-font meta"><i class="fa fa-tags"></i></div><div class="meta-text">', __( ', ', 'colormag' ), '</div></div>' );
 	 if ( $tags_list ) echo $tags_list;

}
add_action( 'colormag_after_post_content', 'tags_at_end', 10, 1 );

// Removes comments from pages
add_action('init', 'heart_remove_page_comments', 100);

function heart_remove_page_comments() {
	remove_post_type_support( 'page', 'comments' );
}

/**
 * Function to select the sidebar - overwrites parent function
 */
function colormag_sidebar_select() {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, 'colormag_page_layout', true ); }

	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$colormag_default_layout = get_theme_mod( 'colormag_default_layout', 'right_sidebar' );

	$colormag_default_page_layout = get_theme_mod( 'colormag_pages_default_layout', 'right_sidebar' );
	$colormag_default_post_layout = get_theme_mod( 'colormag_single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() || is_home() || is_singular('announcements')) {
			if( $colormag_default_page_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $colormag_default_page_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		if( is_singular(array( 'assignment', 'post', 'topic','doc_lib', 'blog', 'mmedia', 'reading_pack'))){
			if( $colormag_default_post_layout == 'right_sidebar' ) { get_sidebar('browse'); }
			elseif ( $colormag_default_post_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		if( is_category() ) {
			if( $colormag_default_post_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $colormag_default_post_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
	}
	elseif( $layout_meta == 'right_sidebar' ) { get_sidebar(''); }
	elseif( $layout_meta == 'left_sidebar' ) { get_sidebar( 'left' ); }
}

/**
 * function to show the footer info, copyright information - overwrites parent function
 */

function colormag_footer_copyright() {
   $site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';

   $default_footer_value = sprintf( __( 'Copyright &copy; %1$s %2$s. All rights reserved.', 'colormag' ), date( 'Y' ), $site_link );

   $colormag_footer_copyright = '<div class="copyright">'.$default_footer_value.'</div>';
   echo $colormag_footer_copyright;
}

/*
 * Display the related posts - overwrites Parent function
 */

   function colormag_related_posts_function() {
      wp_reset_postdata();
      global $post;
	            $term_list = array(); 
                $terms_list = array();

      // Define shared post arguments
      $args = array(
         'no_found_rows'            => true,
         'update_post_meta_cache'   => false,
         'update_post_term_cache'   => false,
         'ignore_sticky_posts'      => 1,
         'orderby'               => 'rand',
         'post__not_in'          => array($post->ID),
		 'post_type' => array( 'post', 'assignment', 'mmedia', 'blog', 'topic' ),
		 'date_query' => array(
								array(
									'column' => 'post_date_gmt',
									'after' => '5 year ago',
								),

		),
         'posts_per_page'        => 2
      );
      // Related by categories
      if ( get_theme_mod('colormag_related_posts', 'categories') == 'categories' ) {

         $cats = get_post_meta($post->ID, 'related-posts', true);
        // Get lowest taxonomy terms for this post in array
            
         $term_list = heart_get_lowest_taxonomy_terms(get_the_terms( get_the_ID(), 'category'));
        // Loop through terms, add term ids to new array ($terms_list)
			if (!empty($term_list)){ 		
                foreach ($term_list as $terms){
                    $terms_list[] = $terms->term_id;
                }
				$to_remove = array('22');
			$terms_list = array_diff($terms_list, $to_remove);
			}

		 
         if ( !$cats ) {

            $args['category__in'] = $terms_list;
         } else {
            $args['cat'] = $terms_list;
         }
		 
      }
      // Related by tags
      if ( get_theme_mod('colormag_related_posts', 'categories') == 'tags' ) {

         $tags = get_post_meta($post->ID, 'related-posts', true);

         if ( !$tags ) {
            $tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
            $args['tag__in'] = $tags;
         } else {
            $args['tag_slug__in'] = explode(',', $tags);
         }
         if ( !$tags ) { $break = true; }
      }

      $query = !isset($break)?new WP_Query($args):new WP_Query;
      return $query;
   }

/*
 * Adds Icon to Helpdesk Report archive titles
 * Use of the hooks for Category Color in the archive titles - removes parent filters and actions, adds new ones allow icon to be added to Helpdesk (category) items
 * Also removes ColorMags excerpt filters - so that the HEARTContentPlugin settings are not overwritten
 */
 
 add_action('init','heart_remove_action_init');

function heart_remove_action_init() {
    remove_filter('single_cat_title', 'colormag_colored_category_title');
	remove_action('colormag_category_title','colormag_category_title_function');
	/*Removes colormag Excerpt filters*/
	remove_filter ( 'excerpt_length', 'colormag_excerpt_length' );
	remove_filter ( 'excerpt_more', 'colormag_continue_reading' );
    add_filter('single_cat_title', 'heart_colored_category_title');
 }

/*
 * Displays category titles for archive pages
 * Finds top level category, if not already top level, and assigns correct category icon
 * Applies top level category color bottom border
 */ 
function heart_colored_category_title($title) {

	$current_cat = get_query_var('cat');    
	$parent_cat = get_ancestors( $current_cat, 'category' );  

	if (!empty ($parent_cat)):
 		$parent = $parent_cat[0];
	else: 
		$parent = $current_cat;
	endif;

	if ($parent == 4):
		$parent_icon = get_stylesheet_directory_uri() . '/images/education.svg';
	$color_border_value = '#b56b79';
	elseif ($parent == 5):
		$parent_icon = get_stylesheet_directory_uri() .'/images/health.svg';
	$color_border_value = '#628bb3';
	elseif ($parent == 11):
		$parent_icon = get_stylesheet_directory_uri() .'/images/nutrition.svg';
	$color_border_value = '#d5992a';
	elseif ($parent == 2304):
		$parent_icon = get_stylesheet_directory_uri() .'/images/water.svg';
	$color_border_value = '#8a85bf';
	elseif ($parent == 2305):
		$parent_icon = get_stylesheet_directory_uri() .'/images/social-protection.svg';
	$color_border_value = '#796d65';
	endif;

   
   if ( !empty($color_border_value) ) {

         return '<div class="title-block" style="border-bottom-color: '.$color_border_value.'"><h1><img class="title-image" src="'.$parent_icon.'">'.$title.'</h1><div class="post-type-description">' . get_the_archive_description() . '</div></div>';
   } elseif (is_category('helpdesk-reports')){
      return '<div class="title-block"><h1><i class="fa fa-question-circle"></i> '.$title.'</h1><div class="post-type-description">' . get_the_archive_description() . '</div></div>';
   } else {
	         return '<div class="title-block"><h1>'.$title.'</h1><div class="post-type-description">' . get_the_archive_description() . '</div></div>';
   }
}

/**
 * Amend the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function heart_excerpt_readmore( $more ) {
    return sprintf( '... <a class="more-link" title="%1$s" href="%2$s"><span>%3$s</span></a>',
        get_the_title(get_the_ID()),
		get_permalink( get_the_ID() ),
        __( 'Read more', 'colormag' )
    );
}
add_filter( 'excerpt_more', 'heart_excerpt_readmore' );

/**
 * Template for comments and pingbacks overwrites parent function
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function colormag_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'colormag' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'colormag' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					//echo get_avatar( $comment, 74 );
					printf( '<div class="comment-author-link"><i class="fa fa-user"></i>%1$s%2$s</div>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'colormag' ) . '</span>' : ''
					);
					printf( '<div class="comment-date-time"><i class="fa fa-calendar-o"></i>%1$s</div>',
						sprintf( __( '%1$s at %2$s', 'colormag' ), get_comment_date(), get_comment_time() )
					);
					printf( '<a class="comment-permalink" href="%1$s"><i class="fa fa-link"></i>Permalink</a>', esc_url( get_comment_link( $comment->comment_ID ) ) );
					edit_comment_link();
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'colormag' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'colormag' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</section><!-- .comment-content -->

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}


/**
* Function to remove .search class - needed to remove Colormag styling from search page
*/
add_filter('body_class','heart_alter_search_classes');
function heart_alter_search_classes($classes) {
    if(is_search()){
    	if (($key = array_search('search', $classes)) !== false) {
    unset($classes[$key]);
}
       return $classes;
    } else {
       return $classes;
    }

}
