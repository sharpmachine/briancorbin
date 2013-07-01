<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>
<div id="wrapper">
	<div id="container">
	<div id="content">
		<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'keiran' ), '<span>' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'keiran' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'keiran' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
							else :
								_e( 'Archives', 'keiran' );
							endif;
						?>
					</h1>
				</header>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'keiran' ); ?></h1>
					</header><!-- END .entry-header -->
					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'keiran' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- END .entry-content -->
				</article>
			<?php endif; ?> 
 		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<nav id="nav-below">
				<div class="nav-previous"><?php next_posts_link( __( '&larr;Older posts', 'keiran' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'keiran' ) ); ?></div>
			</nav><!-- end #nav-below -->
		<?php endif; ?>		               	
	</div><!-- END #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>


