<?php
/*
* template for show the product single page
*/
get_header();

?>
<section class="container-fluid d-flex  flex-row justify-content-between bg-3 mt-3">

  <div class="ha-asside">
    <div class="bg-3 p-2 d-flex flex-row justify-content-center my-1 ha-asside-header">

      <button type="button" name="button" class="ha-btn mx-auto" onclick="haToggleAsside(this)">
            <i class="fa fa-chevron-circle-right fa-2x"></i>
      </button>
      <button type="button" name="button" class="ha-asside-toggle ha-btn " onclick="haToggleAsside(this)" >
            <i class="fa fa-filter fa-3x text-8 fa-inverse"></i>
      </button>

    </div>


  </div>
  <div class="ha-container d-flex  flex-column juastify-content-start">


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
