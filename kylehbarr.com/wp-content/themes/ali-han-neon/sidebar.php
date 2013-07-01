  <div id="secondary_content">
         <div id="secondary_nav">
        <div class="secondary_navTop"></div>
        <div class="secondary_navBg">
        <?php if ( is_404() || is_category() || is_day() || is_month() ||
              is_year() || is_search() || is_paged() ) {
        ?>

        <?php /* If this is a 404 page */ if (is_404()) { ?>
        

        <?php } ?>

        <?php }?>
        
        
        <ul>
          
          <?php   /* Widgetized sidebar, if you have the plugin installed. */
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
          
            <?php wp_list_categories('show_count=0&title_li=<h2>Categories</h2>'); ?>
          <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
          
 <li>
 <h2>Browse by tags</h2>
 <?php wp_tag_cloud('smallest=8&largest=17&number=30'); ?>
 </li>
            <?php wp_list_bookmarks(); ?>
          
            <h2>Meta</h2>
            <li><ul>
              <?php wp_register(); ?>
              <li><?php wp_loginout(); ?></li>
              <li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
              <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
              <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
              <?php wp_meta(); ?>
            </ul>
          </li>
        </ul>
        <?php } ?>

        <?php endif; ?>
        </div>
        <div class="secondary_navBottom"></div>
      </div>
      
  </div>

