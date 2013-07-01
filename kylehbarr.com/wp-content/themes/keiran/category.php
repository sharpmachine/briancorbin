<?php
get_header(); ?>
	<div id="wrapper">
    	<div id="container">
		<div id="content">
			<header class="entry-header">
				<h1 class="entry-title"><?php printf( __( 'Category Archives: %s', 'keiran' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
				<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'keiran_archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
			</header><!-- END page header -->
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'category' ); ?>
			<?php endwhile; ?>
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<nav id="nav-below">
				<div class="nav-previous"><?php next_posts_link( __( '&larr; Older posts', 'keiran' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'keiran' ) ); ?></div>
			</nav><!-- end #nav-below -->
		<?php endif; ?>	            
		</div> <!-- END #content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>