<?php get_header(); ?>
	<div id="wrapper">
        <div id="container">
		<div id="content">  
    			<article id="404" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Page not found', 'keiran' ); ?></h1>
				</header><!-- end page-entry-header -->
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'keiran' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- END .entry-content -->
			</article><!-- END #page -->
		</div><!-- END #content -->            
		</div><!-- END #container -->

<?php get_footer(); ?>