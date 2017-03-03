<?php get_header(); ?>
	
<!-- Begin Content -->
<div id="content">

	<!-- Begin Text -->
    <div id="text">
    <div id="breadcrumbs"> 
    <?php bcn_display(); ?>
    </div> 
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>">
	<?php add_memberprofile(); ?> 
    <?php endwhile; endif; ?>
    </article>
    </div>
    <!-- End Text -->
    
    <?php get_sidebar(); ?>
    
</div>
<!-- End Content -->

<?php get_footer(); ?>