<?php get_header(); ?>

  <div id="main_content">

  <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

      <div class="article" id="post-<?php the_ID(); ?>">
      
      <div class="posttitle">
<h2>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
</h2>
      		<div class="postmeta">
          Posted by
          <?php the_author_posts_link(); ?>
          <?php the_time('j F, Y') ?>
          <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comments'); ?>
			</div>
     </div>
        <div class="entry clearfix">
          <?php the_content("<div class='more-link'>Read More</div>"); ?>
        </div>
                
      </div>

    <?php endwhile; ?>

    <div class="navigation">
      <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </div>

  <?php else : ?>

    <h2 class="center">Not Found</h2>
    <p class="center">Sorry, but you are looking for something that isn't here.</p>
    <?php include (TEMPLATEPATH . "/searchform.php"); ?>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
