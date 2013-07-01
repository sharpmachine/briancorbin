<?php
get_header(); ?>
<div id="wrapper">
	<div id="container">
	<div id="content">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'keiran' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'search' ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'keiran' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'keiran' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>
		<?php endif; ?>
	</div><!-- END #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>