<?php 
/* Don't remove these lines. */
add_filter('comment_text', 'popuplinks');
foreach ($posts as $post) { start_wp();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo sprintf(__("Comentarios en %s"), the_title('','',false)); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_settings('blog_charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		body { margin: 3px; }
	</style>

</head>
<body>
<div class="commentscontainer">
<div class="t"><div class="b"><div class="l"><div class="r"><div class="bl"><div class="br"><div class="tl"><div class="tr">

<div class="comments-popup">

	<h3 id="comments"><?php comments_number('Comments', '1 Comment', '% Comments' );?> on  &#8220;<?php the_title(); ?>&#8221;</h3> 



<?php
// this line is WordPress' motor, do not delete it.
$comment_author = (isset($_COOKIE['comment_author_' . COOKIEHASH])) ? trim($_COOKIE['comment_author_'. COOKIEHASH]) : '';
$comment_author_email = (isset($_COOKIE['comment_author_email_'. COOKIEHASH])) ? trim($_COOKIE['comment_author_email_'. COOKIEHASH]) : '';
$comment_author_url = (isset($_COOKIE['comment_author_url_'. COOKIEHASH])) ? trim($_COOKIE['comment_author_url_'. COOKIEHASH]) : '';
$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $id AND comment_approved = '1' ORDER BY comment_date");
$commentstatus = $wpdb->get_row("SELECT comment_status, post_password FROM $wpdb->posts WHERE ID = $id");
if (!empty($commentstatus->post_password) && $_COOKIE['wp-postpass_'. COOKIEHASH] != $commentstatus->post_password) {  // and it doesn't match the cookie
	echo(get_the_password_form());

} else { ?>

<?php if ($comments) { ?>
<ol id="commentlist">
<?php foreach ($comments as $comment) { ?>
	<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
<div class="commentsbody">
			<?php comment_author_link() ?> says:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is hold to moderation</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small><br />

			<?php comment_text() ?>

		</div></li>

<?php } // end for each comment ?>
</ol>
<?php } else { // this is displayed if there are no comments so far ?>
	<p><?php _e("No comments yet"); ?></p>
<?php } ?>

<?php if ('open' == $commentstatus->comment_status) { ?>
<h3><?php _e("Leave a comment"); ?></h3>
<!-- <p><?php _e("Line and paragraph breaks automatic, e-mail address never displayed, <acronym title=\"Hypertext Markup Language\">HTML</acronym> allowed:"); ?> <code><?php echo allowed_tags(); ?></code></p> -->

<form action="<?php echo get_settings('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<p>
	  <input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
	   <label for="author"><?php _e("Name"); ?></label>
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	<input type="hidden" name="redirect_to" value="<?php echo wp_specialchars($_SERVER["REQUEST_URI"]); ?>" />
	</p>

	<p>
	  <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" />
	   <label for="email"><?php _e("E-mail"); ?></label>
	</p>

	<p>
	  <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" />
	   <label for="url"><?php _e("<acronym title=\"Uniform Resource Identifier\">URI</acronym>"); ?></label>
	</p>

	<p>
	  <label for="comment"><?php _e("Comment"); ?></label>
	<br />
	  <textarea name="comment" id="comment" cols="38" rows="4" tabindex="4"></textarea>
	</p>

	<p>
	  <input name="submit" type="submit" tabindex="5" value="<?php _e("Say it!"); ?>" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php } else { // comments are closed ?>
<p><?php _e("Sorry, the comment form is closed at this time."); ?></p>
<?php }
} // end password check
?>


<?php // if you delete this the sky will fall on your head
}
?>


<?php //} ?> 
<p class="credit"><?php timer_stop(1); ?> <?php echo sprintf(__("<cite>Powered by <a href=\"http://wordpress.org\" title=\"%s\"><strong>Wordpress</strong></a></cite>"),__("Powered by WordPress, state-of-the-art semantic personal publishing platform.")); ?></p>
</div></div></div></div></div></div></div></div>
</div>

</body>
</html>
