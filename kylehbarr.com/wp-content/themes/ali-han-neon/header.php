<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- this product is released under General Public License. Please see the attached file for details. You can also find details about the license at http://www.opensource.org/licenses/gpl-license.php -->

<!--[if IE 6]>
<script src="<?php bloginfo('template_url')?>/pngfix.js"></script>
<![endif]-->
<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( !empty($withcomments) && !is_single() ) {
?>
  
<?php } else { // No sidebar ?>
  
<?php } ?>

</style>

<?php wp_head(); ?>
<script type="text/javascript">
startList = function() {
if (document.all&&document.getElementById) {
navRoot = document.getElementById("top_menu_nav");
for (i=0; i<navRoot.childNodes.length; i++) {
node = navRoot.childNodes[i];
if (node.nodeName=="LI") {
node.onmouseover=function() {
this.className+=" over";
  }
  node.onmouseout=function() {
  this.className=this.className.replace(" over", "");
   }
   }
  }
 }
}
window.onload=startList;
</script>

</head>
<body>



<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" class="tablo" >
<tr>
    <td rowspan="2" >&nbsp;</td>
    <td class="banner">

    <div id="top_mL"></div> 
     <div id="top_menu">
    
    <div id="top_mRss">
<a class="blog" href="<?php bloginfo('rss2_url'); ?>">RSS</a>
	</div>
    
       
    <ul id="top_menu_nav">
<?php wp_list_pages('depth=0&sort_column=menu_order&title_li=' . ('') . '' ); ?>
</ul></div>

<div id="top_mR"></div>

     

<div id="masthead">
    		<div id="banner_text">
            	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
            

    		<div id="bloginfo_desc"><?php bloginfo('description'); ?></div>
</div></div>
        
        <div id="topMenu">
        
<div id="navi">
  	<div id="navi-in">
    		<a href="<?php echo get_option('home'); ?>/">Home</a><?php path();?>
    </div>       
    <div id="search">
              <div class="searchfield">
                <?php include(TEMPLATEPATH."/searchform.php");?>
              </div>
     </div>
  	
</div><!--navi end -->
    
        </div>
        
    </td>
    <td rowspan="2" >&nbsp;</td>


<tr>
     <td width="960">
    

  
  <div id="content" class="clearfix">
