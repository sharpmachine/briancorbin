<?php get_header(); ?>

  <div id="main_content">

    <?php if (have_posts()) : ?>
    
         <div class="posttitle">
     <h2>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    Filled Under: <?php single_cat_title(); ?>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    Archive for <?php the_time('F jS, Y'); ?>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    Archive for <?php the_time('F, Y'); ?>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    Archive for <?php the_time('Y'); ?>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    Author Archive
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    Blog Archives
    <?php } ?>
</h2>
      	</div>

    <div class="navigation">
      <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </div>

    <?php while (have_posts()) : the_post(); ?>
    <div class="article">
        <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <p class="byline">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> </p>

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
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
