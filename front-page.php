<?php get_header(); ?>

 	<!-- Begin Spotlight -->
    <div id="spotlight">
        <!-- <img id="spotlight-home-image" src="<?php $key="banner"; echo get_post_meta($post->ID, $key, true); ?>" alt="Restoring quality and function to people&rsquo;s lives." width="600" height="340"  /> -->
        <?php add_flexslider(); ?>
        <blockquote id="spotlight-home-quote"><?php $key="tagline"; echo get_post_meta($post->ID, $key, true); ?><a id="spotlight-home-button" href="<?php bloginfo('url'); ?>/programs-services/">Learn&nbsp;More&nbsp;&raquo;</a></blockquote>
	</div>
    <!-- End Spotlight -->

    <!-- Begin Content -->
    <div id="content">
    
        <!-- Begin Widgets -->
        <div id="widget-about" class="widget-home"> 
            <h2 class="widget-head"><a href="<?php bloginfo('url'); ?>/about-us/">About Us</a></h2>
            <?php while (have_posts()) : the_post(); // start loop one ?>
            <div id="post-<?php the_ID(); ?>" class="widget-text">
            <?php the_content(''); ?>
            </div>        
            <?php endwhile; ?>
        </div>
        <div id="widget-news" class="widget-home">
            <h2 class="widget-head"><a href="<?php bloginfo('url'); ?>/news/">Latest News</a></h2>
            <div class="widget-text">
                <ul>
                <?php rewind_posts(); // stop loop one ?>
                <?php query_posts('showposts=4'); // giving directions to loop two ?>
                <?php while (have_posts()) : the_post(); // start loop two ?>
                <li><!--<b><?php /*the_time('m/d/Y');*/ ?>:</b>--> <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> <span class="post-date"><?php the_time('F j, Y'); ?></span></li>
                <?php endwhile; ?>
                </ul>            
            </div>
        </div>
        <div id="widget-contact" class="widget-home">
            <h2 class="widget-head"><a href="<?php bloginfo('url'); ?>/contact-us/">Contact Us</a></h2>
            <div class="widget-text">
            <p><b>Rehabilitation Institute of Washington</b></p>
            <p>415 1st Avenue N, Suite 200<br />Seattle, WA 98109</p>
            <a href="http://maps.google.com/maps?q=415+1st+Avenue+N,+Suite+200++Seattle,+WA+98109&hl=en&sll=37.0625,-95.677068&sspn=44.388698,93.076172&hnear=415+1st+Ave+N,+Seattle,+Washington+98109&t=m&z=14"><img id="map-home" src="<?php bloginfo('template_directory'); ?>/images/map-home.png" alt="RIW Map &amp; Directions" /></a>
            <p>P: 206-859-5030<br />F: 206-859-5031</p> 
            <p><a href="http://maps.google.com/maps?q=415+1st+Avenue+N,+Suite+200++Seattle,+WA+98109&hl=en&sll=37.0625,-95.677068&sspn=44.388698,93.076172&hnear=415+1st+Ave+N,+Seattle,+Washington+98109&t=m&z=14">Get Directions&nbsp;&raquo;</a></p>
            </div>
        </div>
        <!-- End Widgets -->
    </div>
    <!-- End Content -->

<?php get_footer(); ?>