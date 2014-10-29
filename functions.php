<?php 

/*  
Theme Name: Rehabilitation Institute of Washington
Description: This is a theme my wife would respond to.
Version: 2.0
Author: Premium Design Works
Author URI: http://www.premiumdw.com/
*/

// Link to admin styles
add_editor_style( 'admin.css' );

// Register Sidebar
register_sidebars(array(
	'name'          => 'Sidebar',
	'before_widget' => '<div id="%1$s" class="widget-items %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
	));
	
// Register Menus
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Disable Post Categories
function wpse120418_unregister_categories() {
    register_taxonomy( 'category', array() );
}
add_action( 'init', 'wpse120418_unregister_categories' );

// Enable Page Excerpts
add_post_type_support( 'page', 'excerpt' );

// Enable Featured Image
add_theme_support( 'post-thumbnails' );

// Add FlexSlider	
function add_flexslider() { 
	
	$attachments = get_children(array('post_parent' => get_the_ID(), 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image'/*,'caption' => $attachment->post_excerpt,*/ ));
	
	if ($attachments) { // see if there are images attached to posting ?>
        
    <!-- Begin Slider --> 
    <div class="flexslider">
    <ul class="slides">
    
    <?php // create the list items for images with captions
    
    foreach ( $attachments as $attachment_id => $attachment ) { 
    
        echo '<li>';
        echo wp_get_attachment_image($attachment_id, 'large');
        echo '<p class="flexslider-caption">';
        echo get_post_field('post_excerpt', $attachment->ID);
        echo '</p>';
        echo '</li>';
        
    } ?>
    
    </ul>
    </div>
    <!-- End Slider -->
        
	<?php } // end see if images
	
} // end add flexslider

?>