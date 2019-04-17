<?php
/*
* template for show the product single page
*/
get_header();

?>
<section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

  <div class="col-3">


  </div>
  <div class="col-9 d-flex  flex-column juastify-content-start">


<?php


if(have_posts()):

  while(have_posts()):
    the_post();

    get_template_part("template-parts/weblog/weblog","singlepage");

    get_template_part("template-parts/weblog/weblog","singlePageRelatedPosts");

    $postID = $post->ID;

    // print_r($post);

  endwhile;
  wp_reset_postdata();
else :
  echo "پست مورد نظر یافت نشد";
endif;

?>
</div>
</section>


  <?php

get_footer();

 ?>
