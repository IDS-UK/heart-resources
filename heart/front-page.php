<?php
/**
 * Template to show the front page.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
get_header(); ?>

   <div class="front-page-top-section clearfix">

<?php 
// Get posts to include in slider - looks for items with custom field home_page_slider checked true, max 5 items, sorted by most recently modified (e.g. updated)
   $args = array(
      'post_type' => array('post', 'assignment', 'doc_lib', 'training','reading_pack', 'topic', 'blog', 'mmedia', 'announcements'),
      'posts_per_page' => 5, 
      'orderby' => 'modified',
      'order'   => 'DESC',
      'meta_query' => array(
         array(
            'key' => 'home_page_slider',
            'compare' => '==',
            'value' => '1',
         ),
      ),
   );
   $query = new WP_Query( $args );
   $count_slides = $query->post_count;

?>

   <div class="slider w-slider" data-animation="fade" data-autoplay="1" data-delay="4000" data-duration="500" data-easing="linear" data-infinite="1" data-nav-spacing="10">
      <div class="w-slider-mask">

      <?php 
         $count = 1;
 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
      /* grab the url for the full size featured image */
      $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'home-slider'); 
      // Get title length to apply 'long' style - reduce font size for long titles
      $title = get_the_title();
      $title_char_count = strlen($title);
      
      ?>
         <div class="w-slide" data-ix="slide-<?php echo $count;?>">
            <div class="slide" style="background-image: -webkit-linear-gradient(270deg, transparent 34%, #000), url(<?php echo $featured_img_url ;?>);background-image: linear-gradient(180deg, transparent 34%, #000), url(<?php echo $featured_img_url;?>);">
               <div class="slide-text-wrapper">
                  <a class="slide-title-link" href="<?php the_permalink(); ?>"><h1 class="slide-title<?php if ($title_char_count > 75){echo ' long';}?>"><?php the_title(); ?></h1></a>
                  <div class="meta-slide">
                     <span class="text-block"><a href="<?php 
               if (get_post_type(get_the_ID()) == 'post'){ 
                  echo esc_url( home_url( '/' ) ) . 'category/helpdesk-reports';
               }
               else {
                  echo esc_url( home_url( '/' ) ) . get_post_type(get_the_ID());
               }
               ?>"><i class="<?php heart_get_post_type(get_the_ID());?> slide-post-type-image"></i><?php posttypetext(get_the_ID());?></a></span>
                     <?php heart_home_slider_category();?>
                  </div>
               </div>
               <a class="slider-button" href="<?php the_permalink(); ?>">Read more</a>
            <div class="slider-loading-bar" data-ix="slider-loading" style="width: 0px; transition: width 200ms;"></div>
            </div>
         </div>
         <?php $count++; 
         endwhile; else : ?>
   <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; 
         ?>
      </div>

      <?php 
            
         if ($count_slides > 1){ ?>
      <div class="w-round w-slider-nav" data-ix="slide-2">
         <div class="w-slider-dot w-active" data-wf-ignore="" style="margin-left: 10px; margin-right: 10px;"></div>
      </div>
      <?php }?>
   </div>

   <?php wp_reset_postdata(); ?>

         <section class="grad themes">
            <div class="_1180px-wrapper theme">
               <h1 class="section-title">Our themes</h1><div>&nbsp;</div>
<a class="theme-link w-inline-block" href="<?php echo esc_url( home_url() );?>/category/health">
                  <div class="health theme-block">
                     <div class="theme-title-block">
                        <img class="health theme-block-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/health_1.svg">
                        <h2 class="health theme-block-title-text">Health</h2>
                     </div>
                     <div class="theme-text"><?php echo category_description( get_category_by_slug( 'health' )->term_id );?></div>
                  </div>
               </a>
               <a class="theme-link w-inline-block" href="<?php echo esc_url( home_url() );?>/category/nutrition">
                  <div class="health theme-block">
                     <div class="theme-title-block">
                        <img class="nutrition theme-block-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/nutrition_1.svg">
                        <h2 class="nutrition theme-block-title-text">Nutrition</h2>
                     </div>
                     <div class="theme-text"><?php echo category_description( get_category_by_slug( 'nutrition' )->term_id );?></div>
                  </div>
               </a>
               <a class="theme-link w-inline-block" href="<?php echo esc_url( home_url() );?>/category/water-and-sanitation">
                  <div class="health theme-block">
                     <div class="theme-title-block">
                        <img class="theme-block-icon water" src="<?php echo get_stylesheet_directory_uri();?>/images/water_1.svg">
                        <h2 class="theme-block-title-text water">Water &amp; Sanitation</h2>
                     </div>
                     <div class="theme-text"><?php echo category_description( get_category_by_slug( 'water-and-sanitation' )->term_id );?></div>
                  </div>
               </a>
               <a class="theme-link w-inline-block" href="<?php echo esc_url( home_url() );?>/category/education">
                  <div class="health theme-block">
                     <div class="theme-title-block">
                        <img class="education theme-block-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/education_1.svg">
                        <h2 class="education theme-block-title-text">Education</h2>
                     </div>
                     <div class="theme-text"><?php echo category_description( get_category_by_slug( 'education' )->term_id );?></div>
                  </div>
               </a>
               <a class="theme-link w-inline-block" href="<?php echo esc_url( home_url() );?>/category/social-protection">
                  <div class="health theme-block">
                     <div class="theme-title-block">
                        <img class="social theme-block-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/social-protection_1.svg">
                        <h2 class="social theme-block-title-text">Social Protection</h2>
                     </div>
                     <div class="theme-text"><?php echo category_description( get_category_by_slug( 'social-protection' )->term_id );?></div>
                  </div>
               </a>
            </div>
         </section>
         <?php
         if (get_theme_mod('colormag_hide_blog_front', 0) == 0): ?>

            <div class="article-container">
               <?php if ( have_posts() ) : ?>

                  <?php while ( have_posts() ) : the_post(); ?>

                     <?php
                     if ( is_front_page() && is_home() ) {
                       get_template_part( 'content', '' );
                     } elseif ( is_front_page() ) {
                       get_template_part( 'content', 'page' );
                     }
                     ?>

                  <?php endwhile; ?>

                  <?php get_template_part( 'navigation', 'none' ); ?>

               <?php else : ?>

                  <?php get_template_part( 'no-results', 'none' ); ?>

               <?php endif; ?>
            </div>
         <?php endif; ?>
         </div>
      </div>
      <?php colormag_sidebar_select(); ?>
   </div>

<?php get_footer(); ?>