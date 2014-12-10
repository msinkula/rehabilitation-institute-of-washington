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
register_sidebars(array('name' => 'Sidebar', 'before_widget' => '<div id="%1$s" class="widget-items %2$s">', 'after_widget'  => '</div>', 'before_title'  => '<h2 class="widget-title">', 'after_title'   => '</h2>'));
	
// Register Menus
function register_my_menus() {
  register_nav_menus(array('main-menu' => __( 'Main Menu' ),'footer-menu' => __( 'Footer Menu' )));
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
	
	$attachments = get_children(array('post_parent' => get_the_ID(), 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image'));
	
	if ($attachments) { // see if there are images attached to posting
        
		echo '<div class="flexslider">';
		echo '<ul class="slides">';
		
		foreach ( $attachments as $attachment_id => $attachment ) { // create the list items for images with captions
		
			echo '<li>';
			echo wp_get_attachment_image($attachment_id, 'large');
			echo '<p class="flexslider-caption">';
			echo get_post_field('post_excerpt', $attachment->ID);
			echo '</p>';
			echo '</li>';
			
		}
		
		echo '</ul>';
		echo '</div>';
        
	} // end see if images
	
} 
// 
// Get My Title Tag
function get_my_title_tag() {
	
	global $post;
	
	if ( is_home() || is_archive() || is_front_page() ) {  // for the Blog (Home) Page, Blog (Archives) Pages or the site’s Front Page
	
		bloginfo('description'); // retrieve the site tagline
	
	} 
	
	elseif ( is_page() || is_single() ) { // for your site’s Pages or Postings
	
		the_title(); // retrieve the page or posting title 
	
	} 
	
	if ( $post->post_parent ) { // for your site’s Parent Pages
	
		echo ' | '; // separator with spaces
		echo get_the_title($post->post_parent);  // retrieve the parent page title
		
	}

	echo ' | '; // separator with spaces
	bloginfo('name'); // retrieve the site name
	echo ' | '; // separator with spaces
	echo 'Seattle, WA.'; // write in the location
	
}
//

// Get Child Pages 
function get_child_pages() {
	
	global $post;
	
	rewind_posts(); // stop any previous loops 
	query_posts(array('post_type' => 'page','numberposts' => -1,'post_status' => null,'post_parent' => $post->ID,'order' => 'ASC','orderby' => 'menu_order')); // query and order child pages 
    
	if (have_posts()) : while (have_posts()) : the_post(); 
	
		$childPermalink = get_permalink( $post->ID ); // post permalink
		$childID = $post->ID; // post id
		$childTitle = $post->post_title; // post title
		$childExcerpt = $post->post_excerpt; // post excerpt
        
		echo '<article id="page-excerpt-'.$childID.'" class="page-excerpt">';
		echo '<h3><a href="'.$childPermalink.'">'.$childTitle.' &raquo;</a></h3>';
		echo '<p>'.$childExcerpt.' <a href="'.$childPermalink.'">Read More&nbsp;&raquo;</a></p>';
		echo '</article>';
        
	endwhile; endif; 
        
}
//

// Get SEO Paragraph From Home Page
function get_seo() {

	$myPosting = get_post(8);
	
	$mySEO = $myPosting->post_content;
	
	echo $mySEO;
	
}
//

?>