<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

	


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
	<div class="comments"><?php comments_popup_link('NO COMMENTS', '<span> 1 </span> COMMENTS', '<span> % </span> COMMENTS'); ?></div>
				<div class="PostHead">

<div class="PostTime"><?php the_time('<b>j</b> M Y') ?> </div>
<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<small class="PostDet"><?php edit_post_link('Edit', '', ' | '); ?> Author: <?php the_author() ?> | Filed under: <?php the_category(', ') ?></small>

</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?>   </p>
			</div>

		<?php endwhile; ?>


	<?php else : ?>

		<h2 class="pagetitle">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>