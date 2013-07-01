<?php get_header(); ?>

  <div id="main_content">
  
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
    <div class="article" id="post-<?php the_ID(); ?>">
      
     <div class="posttitle">
     <h2><?php the_title(); ?></h2>
      		<div class="postmeta">
          Posted by
          <?php the_author_posts_link(); ?>
          <?php the_time('j F, Y') ?>
          <!--
          <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comments'); ?>
          -->
			</div>
     </div>    
      <div class="entry clearfix">
        
        <?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>

        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

      </div>
    </div>
    <?php endwhile; endif; ?>
    <?php comments_template(); ?>
    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>