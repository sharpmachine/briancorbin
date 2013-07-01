<?php
/**
 * The template for displaying image attachments.
 */

get_header(); ?>

<?php get_header(); ?>

<div id="wrapper">
	<div id="container">
	<div id="content">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-wrap">
            <header class="entry-header">
				<header class="entry-header">
					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	        	    <?php	$metadata = wp_get_attachment_metadata();
								printf( __( '<p>Published on %1$s at <a href="%2$s" title="Link to full-size image">%3$s &times; %4$s</a> in <a href="%5$s" title="Return to %6$s" rel="gallery">%6$s</a></p>', 'keiran' ),
									get_the_date(),
									wp_get_attachment_url(),
									$metadata['width'],
									$metadata['height'],
									get_permalink( $post->post_parent ),
									get_the_title( $post->post_parent )
								);
							?>
					<nav id="image-navigation">
					<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous' , 'keiran' ) ); ?></span>
					<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;' , 'keiran' ) ); ?></span>
					</nav><!-- END #image-navigation -->
					</header><!-- END .entry-header -->

					<div class="entry-content">

						<div class="entry-attachment">
							<div class="attachment">
								<?php
									/**
									 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
									 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
									 */
									$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
									foreach ( $attachments as $k => $attachment ) {
										if ( $attachment->ID == $post->ID )
											break;
									}
									$k++;
									// If there is more than 1 attachment in a gallery
									if ( count( $attachments ) > 1 ) {
										if ( isset( $attachments[ $k ] ) )
											// get the URL of the next image attachment
											$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
										else
											// or get the URL of the first image attachment
											$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
									} else {
										// or, if there's only 1 image, get the URL of the image
										$next_attachment_url = wp_get_attachment_url();
									}
								?>

								<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
								$attachment_size = apply_filters( 'keiran_attachment_size', 880 );
								echo wp_get_attachment_image( $post->ID, array( $attachment_size, $attachment_size ) ); // filterable image width with, essentially, no limit for image height.
								?></a>
							</div><!-- END .attachment -->

							<?php if ( ! empty( $post->post_excerpt ) ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div>
							<?php endif; ?>
						</div><!-- END .entry-attachment -->

					<?php the_content( __( 'read more &rarr;', 'keiran' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'keiran' ), 'after' => '</div>' )		 ); ?>

					</div><!-- END .entry-content -->

		<footer class="entry-meta">
			<p>
				<?php if ( count( get_the_category() ) ) : ?>
				<?php printf( __( 'Categories: %2$s', 'keiran' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>  
				<?php endif; ?>
				<?php $tags_list = get_the_tag_list( '', ', ' ); 
				if ( $tags_list ): ?>
					| <?php printf( __( 'Tags: %2$s', 'keiran' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?> </p>
				<?php endif; ?>
	    <p>
                <?php printf( __( 'Share on:', 'keiran' ) )?> 
				
                <!-- get clean titles -->
                <?php
					ob_start();
					the_title_attribute();
					$title = ob_get_clean();
				?>                
    	        <!--Twitter -->
        	    <a href="http://twitter.com/home?status=Currently%20reading:<?php echo urlencode(the_title_attribute('echo=0')); ?>%20<?php echo urlencode( get_permalink( $post->ID ) ); ?>" target="_blank"> <?php printf( __( 'Twitter', 'keiran' ) )?></a>, 
            	<!--Facebook-->
	            <a href="https://www.facebook.com/share.php?u=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&amp;t=<?php echo urlencode (the_title_attribute('echo=0')); ?>" target="_blank"><?php printf( __( 'Facebook', 'keiran' ) )?></a>, 
    	        <!--Delicious -->
        	    <a href="http://del.icio.us/post?v=4;url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>" target="_blank"><?php printf( __( 'Delicious', 'keiran' ) )?></a> |
                <!--Permalink-->
       			<a href="<?php echo get_permalink(); ?>"><?php _e( 'Permalink ', 'keiran' ); ?></a>
				<!--Admin Edit-->
				<?php edit_post_link( __( 'Edit &rarr;', 'keiran' ), '| <span class="edit-link">', '</span>' ); ?> 
            </p>					                 
	</footer>
            
			<div class="clear"></div>
	</div><!-- END .entry-wrap-->            
</article>


			<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>

   		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<nav id="nav-below">
				<div class="nav-previous"><?php next_posts_link( __( '&larr; Older posts', 'keiran' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'keiran' ) ); ?></div>
			</nav><!-- END #nav-below -->
		<?php endif; ?>	

	</div><!-- END #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
