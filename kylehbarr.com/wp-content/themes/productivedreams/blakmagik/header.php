<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( !empty($withcomments) && !is_single() ) {
?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbg-<?php bloginfo('text_direction'); ?>.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>

</style>

<?php wp_head(); ?>
</head>
<body>
<div id="page">


<div id="header">
	<div id="headerimg">
		<h1><a href="http://www.productivedreams.com"><?php bloginfo('name'); ?></a></h1>
		<div class="description">designed by <strong>productivedreams.com</strong> for smashing magazine</div>
	</div>
    <div class="toplinks">
    <a href="<?php echo get_option('home'); ?>/">Home</a>
    <a href="http://feeds.feedburner.com/productivedreams" class="topnav_rss">RSS</a>
    <a href="http://www.facebook.com/people/Gopal_Raju/710457690" class="topnav_contact">Contact</a>
    </div>
    <div class="primarynav">	<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
    <div class="searchfield"><span>SEARCH</span>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </div>
    
    </div>
</div>
<hr />
