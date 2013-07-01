<?php get_header(); ?>

  <div id="main_content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="post" id="post-<?php the_ID(); ?>">
     <div class="posttitle">
     <h2><?php the_title(); ?></h2>
      		<div class="postmeta">
          
          &bull; Posted by
          <?php the_author_posts_link(); ?>
          &bull; <?php the_time('j F, Y') ?>
          &bull; <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comments'); ?>
			</div>
     </div>
      <div class="entry clearfix">
        <?php the_content("<div class='more-link'>Read More</div>"); ?>
   <ul class="article_footer">

       
<div class="postmeta">
          &bull;
          Posted by
          <?php the_author_posts_link(); ?>
          &bull; <?php the_time('l, F jS, Y') ?> 
          at <?php the_time() ?>
          &bull; <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comments'); ?>
</div>
<br />
    
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        
<div class="tags">
<?php the_tags('<span>','&nbsp;</span> <span>&nbsp;','</span>'); ?>
</div><!-- /.tags -->


<br />

Filed under: <?php the_category() ?>
 </ul>
        <p>
           <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
              // Both Comments and Pings are open ?>
              You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

            <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
              // Only Pings are Open ?>
              Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

            <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
              // Comments are open, Pings are not ?>
              You can skip to the end and leave a response. Pinging is currently not allowed.

            <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
              // Neither Comments, nor Pings are open ?>
              Both comments and pings are currently closed.

            <?php } edit_post_link('Edit this entry','','.'); ?>

        </p>

      </div>
    </div>

  <?php comments_template(); ?>

  <?php endwhile; else: ?>

    <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
