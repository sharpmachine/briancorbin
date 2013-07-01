</td>
</tr><tr>
    <td colspan="3" valign="bottom" align="center" class="footer" id="footer">
    <table width="900" border="0" align="center" cellpadding="0" cellspacing="10">
  <tr>
    <td  valign="top"><h3>About</h3><br /><?php $authorTR = $wpdb->get_var("SELECT meta_value FROM $wpdb->usermeta WHERE user_id=1 and meta_key='description'"); if ( !empty($authorTR) ) { echo $authorTR; }else{ echo "Go to admin panel > Users > Your Profile > About Yourself > Biographical Info > Fill is text area > and click: Update Profile button. note:only for admin OR click <a href=\"".get_option('home')."/wp-admin/profile.php\">here</a>(..or for \"user ID : 1\") "; } ?></td>
    <td width="300"  valign="top"><h3>Recent Comments</h3>
      <br /><?php
$number=5; // number of recent comments desired
$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
?>
<ul id="recentcomments">
<?php
if ( $comments ) : foreach ( (array) $comments as $comment) :
echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_author_link(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
endforeach; endif;?></ul>
</td>
    <td width="300"  valign="top"><h3>Recent Posts</h3><br />
      <?php $recent = new WP_Query("showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
                    <li><a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                      </a></li>
                    <?php endwhile; ?>
</td></tr></table><?php wp_footer(); footer();?></table>

<!-- Your Google Analytics Code-->


<!--End Analytics Code-->



</body></html>
