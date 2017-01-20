<!doctype html>

<!--  
Theme Name: Rehabilitation Institute of Washington
Description: This is a theme my wife would respond to.
Version: 2.0
Author: Premium Design Works
Author URI: http://www.premiumdw.com/
-->

<html>
<head>
<meta charset="<?php bloginfo('charset'); ?>">

<!-- Begin Title Tag -->
<title><?php get_my_title_tag(); ?></title>
<!-- End Title Tag -->

<!-- Begin Meta -->
<meta name="description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<!-- End Meta  -->

<!-- Begin Meta for Facebook -->
<meta property="og:title" content="<?php the_title(); ?>"/>
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
<?php if ($fb_image) : ?>
<meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
<?php endif; ?>
<meta property="og:type" content="<?php if (is_single() || is_page()) { echo "article"; } else { echo "website";} ?>"
/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<!-- End Meta for Facebook -->

<!-- Begin Styles -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/flexslider.css" type="text/css" media="all" />
<!-- End Styles -->

<!-- Begin Scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/toggle.js"></script>
<script type="text/javascript">
    
    $(window).load(function(){
		
      $('.flexslider').flexslider({
        animation: "fade",
        <?php if(is_front_page()) { echo 'slideshow: true,'; } else { echo 'slideshow: false,'; } ?>
		smoothHeight: true,
      });
	  
    });
	
</script>
<!-- End Scripts -->

<!-- Begin WP Head -->
<?php wp_head(); ?>
<!-- End WP Head --> 

</head>
<body <?php body_class(); ?>>

<!-- Start Utility Menu -->
<div id="utility-navigation">
    <div id="utility-navigation-items">
        <?php /*do_action('icl_language_selector');*/ ?>
    </div>
</div>
<!-- End Utility Menu -->

<!-- Start Header -->
<div id="header">

    <!-- Start Header Elements -->
    <div id="header-elements">
        <h1 id="logo-riw"><a href="<?php echo get_settings('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo-riw.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
        <p id="logo-carf"><a href="http://www.carf.org/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logo-carf.png" alt="CARF: Commission on Accreditation of Rehabilitation Facilities" /><span>Commission on Accreditation of Rehabilitation Facilities Member Since 1985.</span></a></p>
    </div>
    <!-- End Header Elements -->
    
    <!-- Start Main Menu -->
    <div id="menu-main">
    <h4 id="menu-main-title"><a href="#"><span id="menu-main-title-glyph">&#8801;&nbsp;</span>Menu</a></h4>
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </div>
    <!-- End Main Menu -->

</div>
<!-- End Header -->

<!-- Start Middle -->
<div id="middle">
