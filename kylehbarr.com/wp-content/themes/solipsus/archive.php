<?php get_header(); ?>

	<?php if (have_posts()) : ?>
	
		<?php $post = $posts[0]; // Thanks Kubrick for this code ?>
		
		<?php if (is_category()) { ?>				
		<h2><?php _e('Archive for '); echo single_cat_title(); ?></h2>
		
 	  	<?php } elseif (is_day()) { ?>
		<h2><?php _e('Archive for '); the_time('F j, Y'); ?></h2>
		
	 	<?php } elseif (is_month()) { ?>
		<h2><?php _e('Archive for '); the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2><?php _e('Archive for '); the_time('Y'); ?></h2>

		<?php } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive'); ?></h2>

		<?php } ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post">
	
				<h2 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			
				<p class="postmeta"> 
				{ <?php the_time('F j, Y') ?> @ <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_time() ?></a> }
				&#183; 
				{ <?php the_category(', ') ?> }
				&#183; 
				{ <?php comments_popup_link(__('Comments'), __('Comments (1)'), __('Comments (%)'), 'commentslink', __('Comments off')); ?> }
				</p>
			
				<div class="postentry">
				<?php the_content("... continue reading this entry."); ?>
				</div>
			
				<p class="postfeedback">
				<?php edit_post_link(__('Edit'), '&nbsp; {', '}'); ?>
				</p>
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			
			</div>
				
		<?php endwhile; ?>

		<?php posts_nav_link(' &#183; ', __('Next entries &raquo;'), __('&laquo; Previous entries')); ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
