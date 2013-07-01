</div>

<div id="sidebar">

<ul>


	<li>
		<h2><?php _e('Search'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</li>
        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

	<li>
		<h2></a>
		</div>
	</li>

	<li>
		<h2><?php _e('Quicklinks'); ?></h2>
		<div class="text">
			<center>
			<a href="#" onclick="window.open('/content/site/music?autoplay=1','jukebox','height=300,width=220,left=0,top=0,resizable=no,statusbar=no,scrollbars=no');" title="<?php _e('Music'); ?>"><img src="/wp-content/themes/solipsus/images/music.gif" alt="Music"/></a>
			<a href="#" onclick="window.open('/guestbook','guestbook','height=600,width=500,left=0,top=0,resizable=no,statusbar=no,scrollbars=yes');" title="<?php _e('Guestbook'); ?>"><img src="/wp-content/themes/solipsus/images/guestbook.gif" alt="Guestbook"/></a>
			<a href="/wp-stats.php" title="<?php _e('WP Stats'); ?>"><img src="/wp-content/themes/solipsus/images/stats.gif" alt="WP Stats"/></a> 
			<a href="/wp-register.php" title="<?php _e('Register'); ?>"><img src="/wp-content/themes/solipsus/images/register.gif" alt="Register"/></a> 
			<a href="/wp-login.php" title="<?php _e('Log In'); ?>"><img src="/wp-content/themes/solipsus/images/login.gif" alt="Log In"/></a> 
			<a href="/wp-login.php?action=logout" title="<?php _e('Log Out'); ?>"><img src="/wp-content/themes/solipsus/images/logout.gif" alt="Log Out"/></a> 			
			</center>
		</div>
	</li>


	<?php wp_list_pages('title_li=<h2>' . __('Pages') . '</h2>' ); ?>


	<li>
		<h2><?php _e('Archives'); ?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>


	<li>
		<h2><?php _e('Categories'); ?></h2>
		<ul>
			<?php wp_list_cats(); ?> 
		</ul>
	</li>


	<li>
		<h2><?php _e('Calendar'); ?></h2>
		<div class="text">
			<?php get_calendar(1); ?>
		</div>
	</li>


	<?php get_links_list(); ?>


	<?php if (function_exists('wp_theme_switcher')) { ?>
	<li>
		<h2><?php _e('Themes'); ?></h2>
		<?php wp_theme_switcher(); ?>
	</li>
	<?php } ?>

		
	<li>
		<h2><?php _e('Meta'); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
		<?php endif; ?>
	</li>


</ul>

</div>
