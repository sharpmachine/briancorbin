<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="comments"><?php comments_popup_link('NO COMMENTS', '<span> 1 </span> COMMENTS', '<span> % </span> COMMENTS'); ?></div>
				<div class="PostHead">

<div class="PostTime"><?php the_time('<b>j</b> M Y') ?> </div>
<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<small class="PostDet"><?php edit_post_link('Edit', '', ' | '); ?> Author: <?php the_author() ?> | Filed under: <?php the_category(', ') ?></small>

</div>

				<div class="entry">
				<script type="text/javascript"><!--
google_ad_client = "pub-1715633612259706";
/* 468x60, created 11/9/08 */
google_ad_slot = "1270343647";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

			
			</div>	<p class="postmetadata">
			<span class="tags"><?php the_tags('Tags: ', ', '); ?> </span>
			</p>

		<?php endwhile; ?>

	

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
    
    

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
