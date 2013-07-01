<?php get_header(); ?>    
<!-- begin post -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : start_wp(); ?>    

<div class="entry">  

	
<?php global $post, $tableposts;
$previous = @$wpdb->get_var("SELECT ID FROM $tableposts WHERE post_date < '$post->post_date' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 0, 1");
if ($previous) {
$link = get_permalink($previous);
echo '<a href="' . $link . '" title="Previous">' . $post->post_content . '</a>
';
} else {
the_content('[More Photos]'); 
} ?>
    

</div>

 <div class="posted">  
<?php previous_post('%', '&laquo; Previous &middot;', 'no'); ?> <?php next_posts_link('&laquo; Previous &middot;') ?> <a href="<?php the_permalink() ?>" title="Permalink"><?php the_title(); ?></a> <?php previous_posts_link('&middot; Next &raquo;') ?> <?php next_post('%', '&middot; Next &raquo;', 'no'); ?>   	
</div> 



<?php comments_template(); ?>
  	

<!-- <?php trackback_rdf(); ?> -->    

<?php endforeach; else: ?> 
<p><b> <h2 class="center">Page not found</h2> 	</b></p> 

<?php endif; ?>    

<!-- end post -->      




<?php get_footer(); ?> 