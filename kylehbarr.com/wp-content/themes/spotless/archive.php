<?php get_header(); ?>   
<!-- begin post -->   
<br />   
<div id="content" class="entry">  	  	 
<?php if (have_posts()) : ?>  		     
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>     
<?php /* If this is a category archive */ if (is_category()) { ?>				 		 
<h2 class="pagetitle">Category: '<?php echo single_cat_title(); ?>'</h2> 	 	    		 	      
 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?> 		  
<h2 class="pagetitle">Author Archive</h2>  		    

<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?> 		  

<div class="entry">Archives</div>		   
<?php } ?>   		  		  
<br /> 	 
</div> 
<div class="entrycat">    
<?php while (have_posts()) : the_post(); ?> 	    

<a title="'<?php the_title(); ?>', posted at <?php the_time('F jS, Y') ?>" href="<?php the_permalink() ?>"><?php echo $post->post_excerpt; ?></a>      

<?php endwhile; ?>   	  
</div>	 

<br /><br/>    
<?php else : ?>  	  
<h2 class="center">Page not found</h2> 	 	 	 
<?php endif; ?> 		    		  
	 
<!-- end post -->     




<?php get_footer(); ?>  