<?php get_header(); ?>

<!-- BEGIN CONTENT -->
<div id="content">
    
    <!-- Begin Text -->
    <div id="text">
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-excerpt-<?php the_ID(); ?>" class="post-excerpt">
    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?>&nbsp;&raquo;</a></h3>
    <p class="post-data"><small>Posted on <?php the_time('F jS, Y') ?></small></p>
    <?php the_excerpt(); ?>
    <p class="read-more"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More &raquo;</a></p>
    </article>
    <?php endwhile; ?>
    <?php wp_pagenavi(); ?>
    </div>
    <!-- End Text -->
    
    <?php get_sidebar(); ?>

</div>
<!-- END CONTENT -->

<?php get_footer(); ?>
