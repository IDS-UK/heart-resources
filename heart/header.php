<?php
/**
 * Theme Header Section for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main" class="clearfix"> <div class="inner-wrap">
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<?php
/**
 * This hook is important for wordpress plugins and other many things
 */
wp_head();
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'colormag_before' ); ?>
<div id="page" class="hfeed site">
  <?php do_action( 'colormag_before_header' ); ?>

  <section class="top-links">
    <div class="_1180px-wrapper top-nav">
      
      <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'content-types-links', 'items_wrap'      => '%3$s' ) 
         ); ?>

      <?php if( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) { colormag_social_links(); } ?>

    </div>
  </section>
   <section id="masthead" class="main-banner">
    <div class="_1180px-wrapper banner">
      <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">

            <?php
            if((get_theme_mod('colormag_header_logo_placement', 'header_text_only') == 'show_both' || get_theme_mod('colormag_header_logo_placement', 'header_text_only') == 'header_logo_only')) {
            ?>
              
                <?php if (get_theme_mod('colormag_logo', '') != '') { ?>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo w-nav-brand"><img src="<?php echo esc_url(get_theme_mod('colormag_logo')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="logo-image"></a>
                <?php } ?>

                <?php if (function_exists('the_custom_logo') && has_custom_logo( $blog_id = 0 )) {
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>

                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo w-nav-brand"><img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="logo-image"></a>
                  <?php
                } ?>
              
            <?php
            }
                  $screen_reader = '';
                  if ( get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'header_logo_only' || (get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'disable' )) {
                     $screen_reader = 'screen-reader-text';
                  }
            ?>
            <div id="header-text" class="<?php echo $screen_reader; ?>">
                     <?php if ( is_front_page() || is_home() ) : ?>
                <h1 id="site-title">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
                     <?php else : ?>
                        <h3 id="site-title">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h3>
                     <?php endif; ?>
              <?php
                     $description = get_bloginfo( 'description', 'display' );
                     if ( $description || is_customize_preview() ) : ?>
                        <p id="site-description"><?php echo $description; ?></p>
                     <?php endif;?><!-- #site-description -->
            </div><!-- #header-text -->
<nav id="site-navigation" class="main-navigation clearfix nav-menu w-nav-menu" role="navigation">
    
   <h4 class="menu-toggle"></h4>
   <?php
   if ( has_nav_menu( 'primary' ) ) {
      wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-menu w-nav-menu menu-primary-container', 'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
   }
    else {
      wp_page_menu();
    }
    ?>


</nav>

  <div class="home-search-block">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="home-search-link">
      <i class="fa fa-home"></i><span class="hidden-text">Home</span>
    </a>
    <a href="<?php echo esc_url( home_url( '/' ) ) . 'about'; ?>" class="home-search-link">
       <i class="fa fa-question"></i><span class="hidden-text">About</span>
    </a>
   <?php if ( get_theme_mod( 'colormag_search_icon_in_menu', 0 ) == 1 ) { ?>
    <span class="search-nav">
      <i class="fa fa-search search-link"><span class="search-text">Search</span></i>
        <div class="search-form-top w-form">
             <form action="<?php bloginfo('url'); ?>" class="search-block" method="get">          
                <input type="text" placeholder="Search" class="w-input search-field" name="s">
                <button class="search-icon search-button w-button" type="submit"></button>
            </form><!-- .searchform -->                  
        </div>
      </span>   
    <?php } ?>
  </div>
        <div class="menu-button w-nav-button">
          <div class="icon w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
  </section>


      <?php if( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_two' ) { colormag_render_header_image(); } ?>



    </div><!-- #header-text-nav-container -->

    <?php if( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_three' ) { colormag_render_header_image(); } ?>

  </header>
  <?php do_action( 'colormag_after_header' ); ?>
  <?php do_action( 'colormag_before_main' ); ?>
  <div id="main" class="clearfix">
    <div class="inner-wrap clearfix">