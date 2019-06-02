<?php
/*
* Template Name:  page
*
*/
get_header();


  if(have_posts()):
    while(have_posts()):
      the_post();
      echo "<div class='contianer'>";
          the_content();
      echo "</div>";
    endwhile;
    wp_reset_postdata();
endif;
get_footer();
 ?>
