<?php get_header(); ?>
	
<!-- Begin Content -->
<div id="content">

	<!-- Begin Text -->
    <div id="text">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>">
    <h2><?php the_title(); ?></h2>
	<p class="post-data"><small>Posted on <?php the_time('F jS, Y') ?></small></p>
	<?php the_content(); ?>
    <ul class="post-navigation">
    <li class="post-navigation-previous"><?php next_post_link('&laquo;&nbsp;%link'); ?></li>
    <li class="post-navigation-next"><?php previous_post_link('%link&nbsp;&raquo'); ?></li>
    </ul>
    <?php endwhile; endif; ?>
    </article>
    </div>
    <!-- End Text -->
    
    <?php get_sidebar(); ?>
    
</div>
<!-- End Content -->

<?php get_footer(); ?>
