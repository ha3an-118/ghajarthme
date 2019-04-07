<?php

get_header();

if(have_posts()):

  while(have_posts()):
    the_post();
    echo "<h2>".the_title()."</h2>";
    echo the_content();
  endwhile;

else :
  echo "چیزی برای نمایش موجود نیست";



endif;

get_footer();



 ?>
