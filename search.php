<?php get_header(); ?>

<!-- Begin Content -->
<div id="content">
    
    <!-- Begin Text -->
    <div id="text">    
        <h2>Search Results:</h2>
        <?php if (have_posts()) : ?>
        <p>Here's what we found for you...</p>
        <?php while (have_posts()) : the_post(); ?>
        <div class="page-excerpt" id="page-excerpt-<?php the_ID(); ?>">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); // page excerpts ?>
        <p class="full-story"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More &raquo;</a></p>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
        <p>No posts found. Try a different search?</p>
        <?php get_search_form(); ?>
        <?php endif; ?> 
    </div>
    <!-- End Text -->
    
    <?php get_sidebar(); ?>
    
</div>
<!-- End Content -->

<?php get_footer(); ?>