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
//
	

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


// Create Custom Image Sizes
add_image_size( 'spotlight', 600, 340, array( 'left', 'top' ) ); // 600 pixels wide by 340 pixels tall cropped fom the top left corner

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'spotlight' => __( 'Spotlight' ),
    ) );
}
//


// Add a Flexslider Gallery Using a Function or Shortcode
function add_flexslider() {
						
    global $post; // don't forget to make this a global variable inside your function or it won't f'ing work

    $attachments = get_children( array( 'post_parent' => $post->ID, 'order' => 'ASC', 'orderby' => 'menu_order',  'post_type' => 'attachment', 'post_mime_type' => 'image', ) ); // get and order the attachments

    if ( $attachments ) { // check for images attached to posting

        $open .= '<div class="flexslider"><ul class="slides">'; // create opening markup

        foreach ( $attachments as $attachment ) { // create the list items with images (slides)

            if ( is_front_page() ) { // for the slider on the home page

                $slides .= '<li id="slide-' . $attachment->ID . '">' . wp_get_attachment_image($attachment->ID, 'spotlight') . '</li>'; // create slides with spotlight size image

            } else { // for the sliders everywhere else

                $slides .= '<li id="slide-' . $attachment->ID . '">' . wp_get_attachment_image($attachment->ID, 'large') . '<p class="flexslider-caption">' . get_post_field('post_excerpt', $attachment->ID) . '</p></li>' ; // create slides with large size image and caption

            }

        } // end foreach attachment 

        $close .= '</ul></div>'; // create closing markup

    } // end check for images

    if ( has_shortcode( $content, 'flexslider' ) ) { // if using shortcode to call the slides

        return $open . $slides . $close; // create the whole slider with a return 

    } else { // if using hard coded function to call the slides

        echo $open . $slides . $close; // create the whole slider with an echo

    } // end if using shortcode
		
} // end function

add_shortcode( 'flexslider', 'add_flexslider' ); // add shortcode 
// 


// Get My Title Tag
function get_my_title_tag() {
	
	global $post;
	
	if ( is_front_page() ) {  // for the site’s Front Page
	
		bloginfo('description'); // retrieve the site tagline
	
	} 
	
	elseif ( is_page() || is_single() ) { // for your site’s Pages or Postings
	
		the_title(); // retrieve the page or posting title 
	
	}
	
	else { // for everything else
	
		bloginfo('description');
		
	}
	
	if ( $post->post_parent ) { // for your site’s Parent Pages
	
		echo ' | '; // separator with spaces
		echo get_the_title($post->post_parent); // retrieve the parent page title
		
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
	query_posts(array('post_type' => 'page', 'posts_per_page' => -1, 'post_status' => publish,'post_parent' => $post->ID,'order' => 'ASC','orderby' => 'menu_order')); // query and order child pages 

	while (have_posts()) : the_post(); 
	
		$childPermalink = get_permalink( $post->ID ); // post permalink
		$childID = $post->ID; // post id
		$childTitle = $post->post_title; // post title
		$childExcerpt = $post->post_excerpt; // post excerpt
        
		echo '<article id="page-excerpt-'.$childID.'" class="page-excerpt">';
		echo '<h3><a href="'.$childPermalink.'">'.$childTitle.' &raquo;</a></h3>';
		echo '<p>'.$childExcerpt.' <a href="'.$childPermalink.'">Read More&nbsp;&raquo;</a></p>';
		echo '</article>';
        
	endwhile;
	
	// reset query
	wp_reset_query();
        
}
//

// add the staff member profile for single view
function add_memberprofile() {
	
	$theme_url = get_template_directory_uri();
	$custom = get_post_custom();
	$name = get_the_title();
	$name_slug = basename(get_permalink());
	$photo_url = wp_get_attachment_url(get_post_thumbnail_id());
	$title = $custom["_staff_member_title"][0];
	$email = $custom["_staff_member_email"][0];
	$phone = $custom["_staff_member_phone"][0];
	$bio = $custom["_staff_member_bio"][0];
	$fb_url	= $custom["_staff_member_fb"][0];
	$tw_url	= $custom["_staff_member_tw"][0];
    
	if (!empty($photo_url)) { // image
		echo '<img class="staff-member-photo-medium" src="'.$photo_url.'" alt = "'.$name.'">';
	}
	
	if (!empty($name)) { // name
		echo '<h2 class="staff-name">'.$name.'</h2>';
	}
    
    if (!empty($title)) { // name
		echo '<h4 class="staff-title">'.$title.'</h4>';
	}
	
	if (!empty($email)) { // email
		echo '<p><a href="mailto:'.$email.'">'.$email.'</a></p>';
	}
	
	if (!empty($phone)) { // phone
		echo '<p>'.$phone.'</p>';
	}
	
	if (!empty($fb_url)) { // facebook
		echo '<a href="'.$fb_url.'" target="_blank"><img class="staff-icon-social" src="'.$theme_url.'/images/img-facebook.png" alt = "'.$name.'"></a>'; 
	}
	
	if (!empty($tw_url)) { // twitter 
		echo '<a href="'.$tw_url.'" target="_blank"><img class="staff-icon-social" src="'.$theme_url.'/images/img-twitter.png" alt = "'.$name.'"></a>'; 
	}
	
	if (!empty($bio)) { // bio
		echo '<section class="staff-bio">'.$bio.'</section>';
	}
	
} // end add the staff member profile for single view

?>