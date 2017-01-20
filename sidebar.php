<!-- START SIDEBAR -->
<div id="sidebar">

    <!-- Begin Sub Pages -->
    <?php	
	
	if ($post->post_parent) { // if has a post parent
            
		$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0" ); 
		$parentName = get_the_title($post->post_parent);
        $parentLink = get_permalink($post->post_parent);

	} else { // if does not have a post parent

		$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0" ); 
		$parentName = get_the_title($post->ID);
	
	}

	if ($children) { // if has children ?>

        <div id="sub-navigation" class="widget-items">
        <h2 class="sub-navigation-title"><a href="<?php echo $parentLink; ?>"><?php echo $parentName; ?></a></h2>
        <ul class="sub-navigation-items">
        <?php echo $children; ?>
        </ul>
        </div>
        
    <?php }	?> 
    <!-- End Sub Pages -->
    
    <!-- Begin Dynamic Sidebar -->
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?><?php endif; ?>
    <!-- End Dynamic Sidebar -->
           
</div>
<!-- END SIDEBAR -->
