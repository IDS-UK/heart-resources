<?php
/*
Plugin Name: HEART content set up
Description: Declares a plugin that will create custom post types, custom taxonomies and custom fields for the HEART website.
Version: 1.3
Author: Simon Colmer
License: GPLv2
*/


/*-----------------------------------------------------------------------------------*/
/* SET UP CONTENT TYPES AND TAXONOMIES */
/*-----------------------------------------------------------------------------------*/

/* Custom Post Types */
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'heart_create_post_types' );

function heart_create_post_types() {

// register document library content type
	register_post_type( 'doc_lib', 
		array(
			'labels' => array(
				'name' => __( 'Document Library' ),
				'singular_name' => __( 'Document Library' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Document Library item' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Document Library item' ),
				'new_item' => __( 'New Document Library item' ),
				'view' => __( 'View Document Library item' ),
				'view_item' => __( 'View Document Library item' ),
				'search_items' => __( 'Search Document Library items' ),
				'not_found' => __( 'No Document Library items found' ),
				'not_found_in_trash' => __( 'No Document Library items found in Trash' )
				),
			'menu_position' => 11,
			'supports' => array( 'title', 'editor', 'comments', 'thumbnail' ),
			'public' => true,
			'menu_icon' => 'dashicons-media-text',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true

		)
	);
	
	// register assignment report content type
	register_post_type( 'assignment', 
		array(
			'labels' => array(
				'name' => __( 'Assignment Reports' ),
				'singular_name' => __( 'Assignment Report' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Assignment Report' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Assignment Report' ),
				'new_item' => __( 'New Assignment Report' ),
				'view' => __( 'View Assignment Report' ),
				'view_item' => __( 'View Assignment Report' ),
				'search_items' => __( 'Search Assignment Reports' ),
				'not_found' => __( 'No Assignment Reports found' ),
				'not_found_in_trash' => __( 'No Assignment Reports found in Trash' )
				),
			'menu_position' => 8,
			'supports' => array( 'title', 'editor', 'revisions', 'comments', 'thumbnail' ),
			'public' => true,
			'menu_icon' => 'dashicons-media-document',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true

		)
	);	
	
    // register blog content type	
	
		register_post_type( 'blog', 
		array(
			'labels' => array(
				'name' => __( 'Blogs' ),
				'singular_name' => __( 'Blog' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Blog post' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Blog post' ),
				'new_item' => __( 'New Blog post' ),
				'view' => __( 'View Blog post' ),
				'view_item' => __( 'View Blog post' ),
				'search_items' => __( 'Search Blog posts' ),
				'not_found' => __( 'No Blog posts found' ),
				'not_found_in_trash' => __( 'No Blog posts found in Trash' )
				),
			'menu_position' => 9,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
			'public' => true,
			'menu_icon' => 'dashicons-welcome-write-blog',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true

		)
	);

// register topic guide content type
	register_post_type( 'topic', 
		array(
			'labels' => array(
				'name' => __( 'Topic Guides' ),
				'singular_name' => __( 'Topic Guide' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Topic Guide page' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Topic Guide page' ),
				'new_item' => __( 'New Topic Guide page' ),
				'view' => __( 'View Topic Guide page' ),
				'view_item' => __( 'View Topic Guide page' ),
				'search_items' => __( 'Search Topic Guide pages' ),
				'not_found' => __( 'No Topic Guide pages found' ),
				'not_found_in_trash' => __( 'No Topic Guide pages found in Trash' )
				),
			'menu_position' => 6,
			'capability_type' => 'page',
	              'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'revisions', 'comments', 'thumbnail', 'page-attributes' ),
			'public' => true,
			'menu_icon' => 'dashicons-book-alt',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true

		)
	);

    // register multimedia/HEART Talks content type
	
		register_post_type( 'mmedia', 
		array(
			'labels' => array(
				'name' => __( 'HEART Talks' ),
				'singular_name' => __( 'HEART Talks' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New HEART Talks' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit HEART Talks' ),
				'new_item' => __( 'New HEART Talks' ),
				'view' => __( 'View HEART Talks' ),
				'view_item' => __( 'View HEART Talks' ),
				'search_items' => __( 'Search HEART Talks' ),
				'not_found' => __( 'No HEART Talks found' ),
				'not_found_in_trash' => __( 'No HEART Talks found in Trash' )
				),
			'menu_position' => 7,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
			'public' => true,
			'menu_icon' => 'dashicons-video-alt',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true
		)
	);
	
		// register announcements content type
	register_post_type( 'announcements', 
		array(
			'labels' => array(
				'name' => __( 'Announcements' ),
				'singular_name' => __( 'Announcements' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Announcement' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Announcements' ),
				'new_item' => __( 'New Announcement' ),
				'view' => __( 'View Announcement' ),
				'view_item' => __( 'View Announcement' ),
				'search_items' => __( 'Search Announcements' ),
				'not_found' => __( 'No Announcements found' ),
				'not_found_in_trash' => __( 'No Announcements found in Trash' )
				),
			'menu_position' => 12,
			'supports' => array( 'title', 'editor', 'revisions', 'comments', 'thumbnail' ),
			'public' => true,
			'menu_icon' => 'dashicons-megaphone',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true
		)
	);	
		
    // register training content type	

	register_post_type( 'training', 
		array(
			'labels' => array(
				'name' => __( 'Training' ),
				'singular_name' => __( 'Training' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Training item' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Training item' ),
				'new_item' => __( 'New Training item' ),
				'view' => __( 'View Training item' ),
				'view_item' => __( 'View Training item' ),
				'search_items' => __( 'Search Training items' ),
				'not_found' => __( 'No Training items found' ),
				'not_found_in_trash' => __( 'No Training items found in Trash' )
				),
			'menu_position' => 13,
			'supports' => array( 'title', 'editor', 'excerpt', 'comments', 'thumbnail', 'custom-fields' ),
			'public' => true,
			'menu_icon' => 'dashicons-groups',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true
		)
	);
	
	// register reading packs content type
	register_post_type( 'reading_pack', 
		array(
			'labels' => array(
				'name' => __( 'Reading Packs' ),
				'singular_name' => __( 'Reading Pack' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Reading Pack' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Reading Pack' ),
				'new_item' => __( 'New Reading Pack' ),
				'view' => __( 'View Reading Pack' ),
				'view_item' => __( 'View Reading Pack' ),
				'search_items' => __( 'Search Reading Packs' ),
				'not_found' => __( 'No Reading Packs found' ),
				'not_found_in_trash' => __( 'No Reading Packs found in Trash' )
				),
			'menu_position' => 8,
			'supports' => array( 'title', 'editor','excerpt', 'comments', 'thumbnail' ),
			'public' => true,
			'menu_icon' => 'dashicons-media-text',
			'taxonomies' => array ('category', 'post_tag'),
            'has_archive' => true

		)
	);
	
}

/* Change labels "Posts" to "Helpdesk Reports" */
/*-----------------------------------------------------------------------------------*/
function heart_change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Helpdesks';
    $submenu['edit.php'][5][0] = 'Helpdesk Reports';
    $submenu['edit.php'][10][0] = 'Add Helpdesk Reports';
    echo '';
}

function heart_change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Helpdesk Reports';
        $labels->singular_name = 'Helpdesk Report';
        $labels->add_new = 'Add Helpdesk Report';
        $labels->add_new_item = 'Add Helpdesk Report';
        $labels->edit_item = 'Edit Helpdesk Reports';
        $labels->new_item = 'Helpdesk Report';
        $labels->view_item = 'View Helpdesk Reports';
        $labels->search_items = 'Search Helpdesk Reports';
        $labels->not_found = 'No Helpdesk Reports found';
        $labels->not_found_in_trash = 'No Helpdesk Reports found in Trash';
		$labels->name_admin_bar = "Helpdesk Report";
    }
    add_action( 'init', 'heart_change_post_object_label' );
    add_action( 'admin_menu', 'heart_change_post_menu_label' );

/* Add category "Helpdesk Reports" to every new "Post" */
/*-----------------------------------------------------------------------------------*/

function heart_add_helpdesk_category_automatically($post_ID) {
	global $wpdb;
	if(!has_term('22','category',$post_ID)){
		$cat = array(22);
		wp_set_object_terms($post_ID, $cat, 'category', true);
	}
}
add_action('publish_post', 'heart_add_helpdesk_category_automatically');


/* Custom taxonomies */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'heart_register_taxonomies', 0 );
 
function heart_register_taxonomies() {
 
    // register taxonomy to hold our document types
    register_taxonomy(
        'doc_type',
        array( 'doc_lib' ),
        array(
            'hierarchical' => true,
            'public' => true,
            'query_var' => true,
            'rewrite' => true,
            'labels' => array(
						'name'              => _x( 'Document types', 'taxonomy general name' ),
						'singular_name'     => _x( 'Document type', 'taxonomy singular name' ),
						'search_items'      => __( 'Search Document types' ),
						'all_items'         => __( 'All Document types' ),
						'parent_item'       => __( 'Parent Document types' ),
						'parent_item_colon' => __( 'Parent Document types:' ),
						'edit_item'         => __( 'Edit Document type' ), 
						'update_item'       => __( 'Update Document type' ),
						'add_new_item'      => __( 'Add New Document type' ),
						'new_item_name'     => __( 'New Document type' ),
						'menu_name'         => __( 'Document types' ),
            ),
        )
    );
 
    // register taxonomy to hold our geographical information
    register_taxonomy(
        'geo',
        array( 'post', 'assignment', 'doc_lib','blog','mmedia','training' ),
        array(
            'hierarchical' => true,
            'public' => true,
            'query_var' => true,
            'rewrite' => true,
            'labels' => array(
				'name'              => _x( 'Coverage', 'taxonomy general name' ),
				'singular_name'     => _x( 'Coverage', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Coverage' ),
				'all_items'         => __( 'All Coverage' ),
				'parent_item'       => __( 'Parent Coverage' ),
				'parent_item_colon' => __( 'Parent Coverage:' ),
				'edit_item'         => __( 'Edit Coverage' ), 
				'update_item'       => __( 'Update Coverage' ),
				'add_new_item'      => __( 'Add New Country' ),
				'new_item_name'     => __( 'New Country' ),
				'menu_name'         => __( 'Coverage' ),
            ),
        )
    );
	
    // register taxonomy to hold our training types
    register_taxonomy(
        'training_types',
        array( 'training' ),
        array(
            'hierarchical' => true,
            'public' => true,
            'query_var' => true,
            'rewrite' => true,
            'labels' => array(
				'name'              => _x( 'Training type', 'taxonomy general name' ),
				'singular_name'     => _x( 'Training type', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Training types' ),
				'all_items'         => __( 'All Training types' ),
				'parent_item'       => __( 'Parent Training types' ),
				'parent_item_colon' => __( 'Parent Training types:' ),
				'edit_item'         => __( 'Edit Training type' ), 
				'update_item'       => __( 'Update Training type' ),
				'add_new_item'      => __( 'Add New Training type' ),
				'new_item_name'     => __( 'New Training type' ),
				'menu_name'         => __( 'Training types' ),
            ),
        )
    );	
	
    // register taxonomy to hold our country of publication information
    register_taxonomy(
        'geo_pub',
        array( 'doc_lib'),
        array(
            'hierarchical' => true,
            'public' => true,
            'query_var' => true,
            'rewrite' => true,
            'labels' => array(
				'name'              => _x( 'Country of publication', 'taxonomy general name' ),
				'singular_name'     => _x( 'Country of publication', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Country of publication' ),
				'all_items'         => __( 'All Countries of publication' ),
				'parent_item'       => __( 'Parent Country of publication' ),
				'parent_item_colon' => __( 'Parent Country of publication:' ),
				'edit_item'         => __( 'Edit Country of publication' ), 
				'update_item'       => __( 'Update Country of publication' ),
				'add_new_item'      => __( 'Add New Country of publication' ),
				'new_item_name'     => __( 'New Country of publication' ),
				'menu_name'         => __( 'Country of publication' ),
            ),
        )
    );	
	
	// register taxonomy to hold our Reading pack authors
    register_taxonomy(
	'rp_author',
        array( 'reading_pack' ),
        array(
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'labels' => array(
				'name'                       => _x( 'Reading Pack Authors', 'Taxonomy General Name', 'text_domain' ),
				'singular_name'              => _x( 'Reading Pack Author', 'Taxonomy Singular Name', 'text_domain' ),
				'menu_name'                  => __( 'Reading Pack Author', 'text_domain' ),
				'all_items'                  => __( 'All Reading Pack Author', 'text_domain' ),
				'parent_item'                => __( 'Parent Item', 'text_domain' ),
				'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
				'new_item_name'              => __( 'New Reading Pack Author', 'text_domain' ),
				'add_new_item'               => __( 'Add New Reading Pack Author', 'text_domain' ),
				'edit_item'                  => __( 'Edit Reading Pack Author', 'text_domain' ),
				'update_item'                => __( 'Update Reading Pack Author', 'text_domain' ),
				'separate_items_with_commas' => __( 'Separate authors with commas', 'text_domain' ),
				'search_items'               => __( 'Search Reading Pack Author', 'text_domain' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
				'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
				'not_found'                  => __( 'Not Found', 'text_domain' ),
				),
		)
	);
 
}

/* Add Photographer Credit and URL fields to media uploader */
/*-----------------------------------------------------------------------------------*/
/**
 * Uses IPTC info from pic to get copyright info to initially populate the field
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */
 
function be_attachment_field_credit( $form_fields, $post ) {
	$thumb_id = get_post_meta($post->ID,'_thumbnail_id',true);
	$meta = wp_get_attachment_metadata($thumb_id);
	$copyright = get_post_meta( $post->ID, 'be_photographer_credit', true );
		/*if (empty($copyright)){
			$copyright = $meta[image_meta][copyright];
		} */

	$form_fields['be-photographer-credit'] = array(
		'label' => 'Photographer Credit',
		'value' => $copyright,
		'show_in_modal' => true,
		'helps' => 'If provided, photo credit will be displayed',
	);
	
	$form_fields['be-photographer-url'] = array(
		'label' => 'Photograph URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_url', true ),
		'show_in_modal' => true,
		'helps' => 'Add URL of photograph',
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );

/**
 * Save values of Photographer Credit and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function be_attachment_field_credit_save( $post, $attachment ) {
	if( !empty( $attachment['be-photographer-credit'] ) )
		update_post_meta( $post['ID'], 'be_photographer_credit', $attachment['be-photographer-credit'] );

	if( isset( $attachment['be-photographer-url'] ) )
update_post_meta( $post['ID'], 'be_photographer_url', esc_url( $attachment['be-photographer-url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );

/**
 * Save values of Author Name and URL in media uploader modal via AJAX
 */

function admin_attachment_field_media_author_credit_ajax_save() {

    $post_id = $_POST['id'];

    if( isset( $_POST['attachments'][$post_id]['be-photographer-credit'] ) )
        update_post_meta( $post_id, 'be-photographer-credit', $_POST['attachments'][$post_id]['be-photographer-credit'] );

    if( isset( $_POST['attachments'][$post_id]['be_photographer_url'] ) )
        update_post_meta( $post_id, 'be_photographer_url', $_POST['attachments'][$post_id]['be_photographer_url'] );

    clean_post_cache($post_id);

} add_action('wp_ajax_save-attachment-compat', 'admin_attachment_field_media_author_credit_ajax_save', 0, 1); 


/* Include CPTs in search results */
/*-----------------------------------------------------------------------------------*/

// Define what post types to search
function searchAll( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'feed', 'reading_pack', 'topic', 'doc_lib', 'training', 'blog', 'assignment', 'mmedia', 'announcements'));
	}
	return $query;
}

// The hook needed to search ALL content
add_filter( 'the_search_query', 'searchAll' );

/* Include CPTs in tag and category results*/
/*-----------------------------------------------------------------------------------*/

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( (is_tag()) || (is_category() && $query->is_main_query())) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('post', 'assignment','reading_pack', 'doc_lib', 'training', 'topic', 'blog', 'mmedia', 'nav_menu_item', 'announcements'); 
    $query->set('post_type',$post_type);
	return $query;
    }
}

/* Include CPTs in home page*/
/*-----------------------------------------------------------------------------------*/

add_filter('pre_get_posts', 'home_post_type');
function home_post_type($query) {
  if(is_home() && $query->is_main_query()) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('post', 'assignment', 'doc_lib', 'training','reading_pack', 'topic', 'blog', 'mmedia', 'announcements'); 
    $query->set('post_type',$post_type);
	return $query;
    }
}

/* Create custom taxonomy dropdowns */
/*-----------------------------------------------------------------------------------*/
function get_geo_dropdown($taxonomies, $args){
	$myterms = get_terms($taxonomies, $args);
	$output ="<select name='geo'>";
	foreach($myterms as $term){
		$root_url = get_bloginfo('url');
		$term_taxonomy=$term->taxonomy;
		$term_slug=$term->slug;
		$term_name =$term->name;
		$link = $term_slug;
		$output .="<option value='".$link."'>".$term_name." (".$term->count.") </option>";
	}
	$output .="</select>";
return $output;
}

function get_doctype_dropdown($taxonomies, $args){
	$myterms = get_terms($taxonomies, $args);
	$output ="<select name='doc_type'>";
	foreach($myterms as $term){
		$root_url = get_bloginfo('url');
		$term_taxonomy=$term->taxonomy;
		$term_slug=$term->slug;
		$term_name =$term->name;
		$link = $term_slug;
		$output .="<option value='".$link."'>".$term_name." (".$term->count.") </option>";
	}
	$output .="</select>";
return $output;
}

function get_training_dropdown($taxonomies, $args){
	$myterms = get_terms($taxonomies, $args);
	$output ="<select name='training_types'>";
	foreach($myterms as $term){
		$root_url = get_bloginfo('url');
		$term_taxonomy=$term->taxonomy;
		$term_slug=$term->slug;
		$term_name =$term->name;
		$link = $term_slug;
		$output .="<option value='".$link."'>".$term_name." (".$term->count.") </option>";
	}
	$output .="</select>";
return $output;
}


/*-----------------------------------------------------------------------------------*/
/*ADMIN FUNCTIONS*/
/*-----------------------------------------------------------------------------------*/

/* Add HEART logo to log in */
/*-----------------------------------------------------------------------------------*/

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url(/wp-content/uploads/2012/12/HEART_logo.jpg) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

/* At a glance dashboard for cpts */
/*-----------------------------------------------------------------------------------*/	

add_filter( 'dashboard_glance_items', 'custom_glance_items', 10, 1 );

function custom_glance_items( $items = array() ) {

    $post_types = array( 'assignment', 'doc_lib', 'mmedia', 'blog'  );
    
    foreach( $post_types as $type ) {

        if( ! post_type_exists( $type ) ) continue;

        $num_posts = wp_count_posts( $type );
        
        if( $num_posts ) {
      
            $published = intval( $num_posts->publish );
            $post_type = get_post_type_object( $type );
            
            $text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
            $text = sprintf( $text, number_format_i18n( $published ) );
            
            if ( current_user_can( $post_type->cap->edit_posts ) ) {
                $items[] = sprintf( '%2$s', $type, $text ) . "\n";
            } else {
                $items[] = sprintf( '%2$s', $type, $text ) . "\n";
            }
        }
    }
    
    return $items;
}

/* Show custom post types in dashboard activity widget */
/*-----------------------------------------------------------------------------------*/

// unregister the default activity widget
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
function remove_dashboard_widgets() {

    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
}

// register your custom activity widget
add_action('wp_dashboard_setup', 'add_custom_dashboard_activity' );
function add_custom_dashboard_activity() {
    wp_add_dashboard_widget('custom_dashboard_activity', 'Activities', 'custom_wp_dashboard_site_activity');
}

// the new function based on wp_dashboard_recent_posts (in wp-admin/includes/dashboard.php)
function wp_dashboard_recent_post_types( $args ) {

	if ( ! $args['post_type'] ) {
		$args['post_type'] = 'any';
	}

	$query_args = array(
		'post_type'      => $args['post_type'],
		'post_status'    => $args['status'],
		'orderby'        => 'date',
		'order'          => $args['order'],
		'posts_per_page' => intval( $args['max'] ),
		'no_found_rows'  => true,
		'cache_results'  => false
	);
	$posts = new WP_Query( $query_args );

	if ( $posts->have_posts() ) {

		echo '<div id="' . $args['id'] . '" class="activity-block">';

		if ( $posts->post_count > $args['display'] ) {
			echo '<small class="show-more hide-if-no-js"><a href="#">' . sprintf( __( 'See %s more…'), $posts->post_count - intval( $args['display'] ) ) . '</a></small>';
		}

		echo '<h4>' . $args['title'] . '</h4>';

		echo '<ul>';

		$i = 0;
		$today    = date( 'Y-m-d', current_time( 'timestamp' ) );
		$tomorrow = date( 'Y-m-d', strtotime( '+1 day', current_time( 'timestamp' ) ) );

		while ( $posts->have_posts() ) {
			$posts->the_post();

			$time = get_the_time( 'U' );
			if ( date( 'Y-m-d', $time ) == $today ) {
				$relative = __( 'Today' );
			} elseif ( date( 'Y-m-d', $time ) == $tomorrow ) {
				$relative = __( 'Tomorrow' );
			} else {
				/* translators: date and time format for recent posts on the dashboard, see http://php.net/date */
				$relative = date_i18n( __( 'M jS' ), $time );
			}

 			$text = sprintf(
				/* translators: 1: relative date, 2: time, 4: post title */
 				__( '<span>%1$s, %2$s</span> <a href="%3$s">%4$s</a>' ),
  				$relative,
  				get_the_time(),
  				get_edit_post_link(),
  				_draft_or_post_title()
  			);

 			$hidden = $i >= $args['display'] ? ' class="hidden"' : '';
 			echo "<li{$hidden}>$text</li>";
			$i++;
		}

		echo '</ul>';
		echo '</div>';

	} else {
		return false;
	}

	wp_reset_postdata();

	return true;
}

// The replacement widget
function custom_wp_dashboard_site_activity() {

    echo '<div id="activity-widget">';

    $future_posts = wp_dashboard_recent_post_types( array(
        'post_type'  => 'any',
        'display' => 3,
        'max'     => 7,
        'status'  => 'future',
        'order'   => 'ASC',
        'title'   => __( 'Publishing Soon' ),
        'id'      => 'future-posts',
    ) );

    $recent_posts = wp_dashboard_recent_post_types( array(
        'post_type'  => 'any',
        'display' => 10,
        'max'     => 10,
        'status'  => 'publish',
        'order'   => 'DESC',
        'title'   => __( 'Recently Published' ),
        'id'      => 'published-posts',
    ) );

    $recent_comments = wp_dashboard_recent_comments( 10 );

    if ( !$future_posts && !$recent_posts && !$recent_comments ) {
        echo '<div class="no-activity">';
        echo '<p class="smiley"></p>';
        echo '<p>' . __( 'No activity yet!' ) . '</p>';
        echo '</div>';
    }

    echo '</div>';
}	

/* Remove query string from static files */
/*-----------------------------------------------------------------------------------*/
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

/* gets post views count for use on popular tab */
/*-----------------------------------------------------------------------------------*/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/*-----------------------------------------------------------------------------------*/
/*SHORTCODES*/
/*-----------------------------------------------------------------------------------*/

/* Strip shortcodes from excerpt but not content between*/
/*-----------------------------------------------------------------------------------*/

function custom_excerpt($text = '') {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
                // $text = strip_shortcodes( $text );
		$text = do_shortcode( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt'  );
add_filter( 'get_the_excerpt', 'custom_excerpt'  );

/* Tag shortcode pulls content of particular tag [tag-post tag='x'] */
/*-----------------------------------------------------------------------------------*/

function tag_posts_function($atts){
   extract(shortcode_atts(array(
      'tag' => null,
   ), $atts));

   $return_string = '<ul class="tag-posts">';
   query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'tag' => $tag));
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
      endwhile;
   endif;
   $return_string .= '</ul>';

   wp_reset_query();
   return $return_string;
}

function register_shortcodes(){
   add_shortcode('tag-posts', 'tag_posts_function');
}
add_action( 'init', 'register_shortcodes');

/*-----------------------------------------------------------------------------------*/
/* Shortcode [evidence] - applies div class "evidence" to content - used in Topic Guides*/
/*-----------------------------------------------------------------------------------*/
function evidence_box_shortcode($atts, $content=null, $code="") {

	$return = '<div class="evidence">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}

add_shortcode('evidence' , 'evidence_box_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*TEMPLATE FUNCTIONS*/
/*-----------------------------------------------------------------------------------*/

/* is_post_type function - boolean for post type you pass it e.g. is_post_type ('doc_lib') */
/*-----------------------------------------------------------------------------------*/

function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

/* image_credit() - Get Image credit and display  */
/*-----------------------------------------------------------------------------------*/

function image_credit($id) {

	$thumb_id = get_post_meta($id,'_thumbnail_id',true);
	$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
	$copyrights = get_post_meta(get_post_thumbnail_id(), 'be_photographer_credit', true);
	$links = get_post_meta(get_post_thumbnail_id(), 'be_photographer_url', true);

	if(!empty($copyrights) && empty($links)) {
		echo '&copy; ' . $copyrights;
	}
	
	else if(!empty($copyrights) && !empty($links)) {
		echo '&copy; <a href="' . $links . '">' . $copyrights . '</a>';
	}
	
	else if(empty($copyrights) && empty($links)) {
		echo $alt;
	}

}

/* bespoke excerpt trimming - excerpt(10) restricts to 10 words  */
/*-----------------------------------------------------------------------------------*/

function excerpt($num) {
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)."...";
	echo $excerpt;
}

/* gets post type and converts into readable text  */
/*-----------------------------------------------------------------------------------*/
function posttypetext($id){

$posttypetext = get_post_type($id);

	if ($posttypetext == 'doc_lib'){
		echo 'Document Library';
	}
	elseif ($posttypetext == 'post'){
		echo 'Helpdesk Report';
	}
	elseif ($posttypetext == 'mmedia'){
		echo 'HEART talks';
	}
	elseif ($posttypetext == 'topic'){
		echo 'Topic Guide';
	}
	elseif ($posttypetext == 'reading_pack'){
		echo 'Reading Pack';
	}
	else {
		echo ucwords($posttypetext); 
	}

}

/* Content Partner branding - identifies specific tags and adds branding (logo and link)
* Currently only hard coded for ORIE and MQSUN tags
/*-----------------------------------------------------------------------------------*/

function heart_content_partner() {
	// Get all the tags for this post
	$all_the_tags = get_the_tags();
	if (!empty($all_the_tags)){
		// Get names of tags
		$tag_names = array();
		foreach ($all_the_tags as $tag_name){
			array_push($tag_names, $tag_name->name);
		}
		// Create content partner array
		$partners = array('MQSUN', 'ORIE');

		// Check if a content partner is named in the tags, then output relevant content partner logo and link
		if(count(array_intersect($tag_names, $partners)) > 0){ ?>
		
			<aside class="widget widget_text clearfix">
				<h3 class="widget-title">
					Content Partner:
				</h3>	
			<?php 

			foreach($all_the_tags as $this_tag) {

				if (strpos($this_tag->name,'MQSUN') !== false) {
			    echo '<div class="content-partner"><a href="' . site_url() . '/tag/mqsun" title="About MQSUN"><img alt="MQSUN logo" src="' . get_stylesheet_directory_uri() . '/images/MQSUN_logo100.jpg" width="100" height="40"></a></div>';
				}
				if (strpos($this_tag->name,'ORIE') !== false) {
			    echo '<div class="content-partner"><a href="' . site_url() . '/tag/orie" title="About ORIE"><img alt="ORIE logo" src="' . get_stylesheet_directory_uri() . '/images/ORIE_logo100.jpg" width="100" height="72"></a></div>';
				}
			}
			?>
			</aside>
		<?php
		}
	}
}

/* Adds file information to Download button */
/*-----------------------------------------------------------------------------------*/

function download_info() {
global $post;
	$url = get_post_meta ( get_the_ID(), 'external_url', true ); 
	$filesize = get_post_meta ( get_the_ID(), 'file_size', true ); 
	$ext = pathinfo($url, PATHINFO_EXTENSION);
	if ($ext == 'xls' || $ext == 'xlsx' ) {
		$extension = 'file-excel-o';
	}
	elseif ($ext == 'doc' || $ext == 'docx'){
		$extension = 'file-word-o';
	}
	elseif ($ext == 'odt' || $ext == 'txt'){
		$extension = 'file-text-o';
	}
	elseif ($ext == 'ppt'){
		$extension = 'file-powerpoint-o';
	}
	elseif ($ext == 'pdf'){
		$extension = 'file-pdf-o';
	}
	else{
		$extension = 'file-o';
	}
	$str = strtoupper($ext);
	$delimiter = "";
	$posttypetext = get_post_type($post);
		if ($posttypetext == 'post'){
			$posttype = 'helpdesk';
		}
		else {
			$posttype = $posttypetext; 
		}
	
	if ( !empty($url) ) {


		
	echo '<div class="download-block w-clearfix"><a class="download slider-button" href="' . $url . '" target="_blank" onClick="__gaTracker(\'send\', \'event\', \'download-' . $posttype . '\', \'' . $url . '\');"><span class="icon-font"><i class=" fa fa-cloud-download"></i>Download</a>'; 

		if ( !empty($filesize) || !empty($str) ) {
			echo '<div class="file-size">';
		
			if ( $ext == 'pdf' || $ext == 'doc' || $ext == 'docx' || $ext == 'xlsx' || $ext == 'xls' || $ext == 'txt' || $ext == 'ppt' || $ext == 'odt') {
			echo '<span class="icon-font"><i class="fa fa-'. $extension . '"></i></span>';
		}
				if (!empty($str) && ( $str == 'PDF' || $str == 'DOC' || $str == 'DOCX' || $str == 'XLSX' || $str == 'XLS' || $str == 'TXT' || $str == 'PPT' || $str == 'ODT' || $str == 'HTML')) {
					
					echo $delimiter . $str;
					$delimiter = ' - ';
				}
				if (!empty($filesize)){
					echo $delimiter . $filesize;
					$delimiter = ' - ';
				} 
			echo '</div>';
					}
	echo '</div>';
	}	
}

/* Finds and displays document library items that appear in Topic Guides */
/*-----------------------------------------------------------------------------------*/

function topic_guide_related() {
	$current_post = get_the_ID ();
	$args = array('post_type' => 'doc_lib', 'posts_per_page' => -1, 'meta_key' => 'topic_guide' );
	$my_query = new WP_Query($args);

	if ($my_query->found_posts != 0) {	
		
		echo '	<aside class="widget widget_text clearfix">
				<h3 class="widget-title">
					Related documents
				</h3>';
	    
	    while ($my_query->have_posts()) : $my_query->the_post(); 
		  
		  $relatedtothispost = get_post_meta ( get_the_ID(), 'topic_guide', true ); 

			if (is_array ($relatedtothispost)){
			  
			   if (in_array($current_post, $relatedtothispost)) { ?>

			   <a title="Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><p><?php the_title(); ?></p></a>

				<?php
				}
			} 
		endwhile; 
		
		echo '</aside>';

	} 
	wp_reset_query(); 

}

/* Finds and displays Topic guide (where relevant) in single document library items */
/*-----------------------------------------------------------------------------------*/

function document_library_topic_guide() {

/*Get the topic guide IDs that are associated to this doc_lib item */
	$relatedtothistopic = get_post_meta ( get_the_ID(), 'topic_guide', true );
/* Get only the published topic guides to display */
	if (is_array($relatedtothistopic)) {	
			foreach ($relatedtothistopic as $key => $topic_guide_id) {
				$topic_guide_status =  get_post_status($topic_guide_id);
				if($topic_guide_status != 'publish') {
					unset($relatedtothistopic[$key]);
				} 
			}
	}
	$delimiter = "";
/* Output the list of topic guides */
	if (!empty ($relatedtothistopic) ){

		if (count($relatedtothistopic) > 1) {
			?>
			<aside class="widget widget_text in_topic_guide clearfix">
			<h3 class="widget-title">
				Appears in our Topic Guides:
			</h3>	
			<ul>
			<?php
						
				foreach ($relatedtothistopic as $relatedtopic){
					 echo '<li><i class="fa fa-book"></i> <a href="' . get_permalink($relatedtopic) . '">' . get_the_title($relatedtopic) . '</a></li>';
				}
				echo '</ul></aside>';
			}
		else
			{
				?>
			<aside class="widget widget_text in_topic_guide clearfix">
			<h3 class="widget-title">
				Appears in our Topic Guide:
			</h3>	
			<ul>
			<?php
				foreach ($relatedtothistopic as $relatedtopic){
				echo '<li><i class="fa fa-book"></i> <a href="' . get_permalink($relatedtopic) . '">' . get_the_title($relatedtopic) . '</a></li>';

				}
				echo '</ul></aside>';			
			}
	}
}

/* Finds and displays PEAKS Topic Guide document library items */
/*-----------------------------------------------------------------------------------*/

function peaks_topic_guide() {

$args = array('post_type' => 'doc_lib', 'posts_per_page' => -1,'category_name' => 'PEAKS Topic Guide','orderby' => 'date', 'order' => 'DESC' );
$my_query = new WP_Query($args);

if ($my_query->found_posts != 0) {	
	
echo '<div class="topic-extra clearfix">

<h3 class="topic-extra-label"><span>Other DFID funded Topic Guides:<span></h3>';
      while ($my_query->have_posts()) : $my_query->the_post();  ?>

   <div class="article-content clearfix">

      <?php if( get_post_format() ) { get_template_part( 'inc/post-formats' ); } ?>


      <header class="entry-header">
        <i class=" <?php heart_get_post_type();?>"></i>
		 <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
         </h1>
      </header>

      <?php colormag_entry_meta(); ?>

      <div class="entry-content clearfix">
         <?php
            the_excerpt();
         ?>
   
      </div>

   </div>
   <?php

endwhile; 
echo '</div>';
	} 
wp_reset_query(); 
}


/* Gets the lowest taxonomy term in the taxonomy */
/* The function returns the terms with the lowest level by using recursion. In each iteration it removes terms with no parents (level 1) and terms with parents that are not any more included in the set of filtered terms (levels > 1). Recursion ends by having an empty set and returning the result from the previous iteration.*/
/* 
 * Call is get_lowest_taxonomy_terms(get_the_terms( get_the_ID(), 'taxonomy_name')); */
/*-----------------------------------------------------------------------------------*/
 function heart_get_lowest_taxonomy_terms( $terms ) {
    // if terms is not array or its empty don't proceed
    if ( ! is_array( $terms ) || empty( $terms ) ) {
        return false;
    }

    $filter = function($terms) use (&$filter) {

        $return_terms = array();
        $term_ids = array();

        foreach ($terms as $t){
            $term_ids[] = $t->term_id;
        }

        foreach ( $terms as $t ) {
            if( $t->parent == false || !in_array($t->parent,$term_ids) )  {
                //remove this term
            }
            else{
                $return_terms[] = $t;
            }
        }

        if( count($return_terms) ){
            return $filter($return_terms);  
        }
        else {
            return $terms;
        }

    };

    return $filter($terms);
}

	
/*-----------------------------------------------------------------------------------*/
/* Adds button to add documents */
/*-----------------------------------------------------------------------------------*/		

add_action('media_buttons','heart_add_media_button',15);

function heart_add_media_button(){
    echo '<a href="#" class="button insert-document">Attach Document</a>';
}

/*-----------------------------------------------------------------------------------*/
/* Class for Add documents modal window */
/* Based on TGM New Media Plugin by Thomas Griffin*/
/*-----------------------------------------------------------------------------------*/		

class HEART_New_Media_Plugin {

    /**
     * Constructor for the class.
     */
    public function __construct() {

        // Load the plugin textdomain.
        load_plugin_textdomain( 'heart', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        // Load our custom assets.
        add_action( 'admin_enqueue_scripts', array( $this, 'assets' ) );

        // Generate the custom metabox to hold our example media manager.
        //add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );

    }

    /**
     * Loads any plugin assets we may have.
     */
    public function assets() {

        // This function loads in the required media files for the media manager.
        wp_enqueue_media();

        // Register, localize and enqueue our custom JS.
        wp_register_script( 'heart-media', plugins_url( '/js/media.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
        wp_localize_script( 'heart-media', 'heart_document_media',
            array(
                'title'     => __( 'Upload or choose your document', 'heart' ), // This will be used as the default title
                'button'    => __( 'Attach document to this record', 'heart' )            // This will be used as the default button text
            )
        );
        wp_enqueue_script( 'heart-media' );

    }
}

// Instantiate the class.
$heart_new_media_plugin = new HEART_New_Media_Plugin();


/* Gets Reading Pack author content*/
/*-----------------------------------------------------------------------------------*/
function heart_rp_authors() {
	global $post;
		$rp_authors = get_the_terms( $post->ID, 'rp_author' ); 
		
		foreach($rp_authors as $term) {
		
			echo '<div class="single-author">';
			echo '<div class="author-name"><strong>' . $term->name . '</strong></div>';
			echo '<div class="author-bio">'. $term->description . '</div>';
			echo '</div>';
		}
}


?>