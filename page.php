<?php get_header(); ?>

<?php if (get_post_meta($post->ID, 'banner', true)) { // begin check for spotlight ?>

    <!-- Begin Spotlight -->
    <div id="spotlight">
    <img id="spotlight-main-image" src="<?php echo get_post_meta($post->ID, 'banner', true); ?>" alt="Main Spotlight Image" width="600" height="340" />
    <blockquote id="spotlight-main-quote">
    <?php quotescollection_quote(); ?>
    </blockquote>
    </div>
    <!-- End Spotlight -->

<?php } // end check for spotlight ?>

<!-- Begin Content -->
<div id="content">
    
    <!-- Begin Text -->
    <div id="text">  
        <div id="breadcrumbs"> 
        <?php bcn_display(); ?>
        </div>  
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="page-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <?php add_flexslider() ?>
        <?php the_content(); ?>
        </article>
        <?php endwhile; endif; ?>
		<?php $page_excerpts = array('post_type' => 'page','numberposts' => -1,'post_status' => null,'post_parent' => $post->ID,'order' => 'ASC','orderby' => 'menu_order'); $child_pages = get_posts($page_excerpts); ?>
        <?php foreach ($child_pages as $post) : setup_postdata($post); ?>
        <article id="page-excerpt-<?php the_ID(); ?>" class="page-excerpt">
        <h3><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?>&nbsp;&raquo;</a></h3>
        <?php the_excerpt(); // get child page excerpts ?>
        <p class="read-more"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More &raquo;</a></p>
        </article>
        <?php endforeach; ?> 
    </div>
    <!-- End Text -->
    
    <?php get_sidebar(); ?>
    
</div>
<!-- End Content -->

<?php get_footer(); ?>