<?php /* 
Template Name: Archives 
*/ ?>  

<?php get_header(); ?>      

<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : start_wp(); ?>  

<div class="entrycat"> 

<h2>Archive</h2>

<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
<option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>  
	<?php wp_dropdown_categories('show_option_none=Select category'); ?>

<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
    }
    dropdown.onchange = onCatChange;
--></script>




<br /><br />


<!-- archives with the_excerpt -->    
<?php $arc_query = new WP_Query('orderby=post_date&order=DESC&showposts=-1'); ?> <?php while ($arc_query->have_posts()) : $arc_query->the_post(); ?> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $post->post_excerpt; ?></a>  

<?php endwhile; ?>  	
</div>  
     

<?php endforeach; else: ?>    

<p><h2 class="center">You're looking for something which just isn't here</h2></p> 
<?php endif; ?>    
<!-- end post -->   


<?php get_footer(); ?>  