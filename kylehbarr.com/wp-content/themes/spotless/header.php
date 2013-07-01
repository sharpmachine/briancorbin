<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  

<html xmlns="http://www.w3.org/1999/xhtml">   
<head profile="http://gmpg.org/xfn/11">  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />    

<title><?php bloginfo('name'); ?>  <?php if ( is_single() ) { ?> <?php } ?>  <?php wp_title(); ?></title>    

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />   
<!-- leave this for stats -->      

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="black" />  
 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />  
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />    
<?php wp_get_archives('type=monthly&format=link'); ?>  
 

<?php wp_head(); ?>   
</head>  
<body>   

<div class="container">  

<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1> 


<div class="nav">
<a href="<?php bloginfo('url'); ?>/about" title="about">about</a> &middot; <a href="<?php bloginfo('url'); ?>/archive" title="archive">archive</a>  &middot; <a title="SUSCRIBE" href="<?php bloginfo('rss2_url'); ?>">rss</a>
</div>