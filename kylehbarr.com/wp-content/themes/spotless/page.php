<?php get_header(); ?>   
 
<!-- begin post -->  
  
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : start_wp(); ?>    

<div class="pages">   
<?php the_content(); ?>    
</div> 		    
 
<?php comments_template(); ?> 	  

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> 
<p><strong> 
<h2 class="center">Page not found</h2> 	
</strong></p> 
<?php endif; ?>    

<!-- end post -->    

<?php get_footer(); ?> 