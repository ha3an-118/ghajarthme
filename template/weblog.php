<?php
/*
* Template Name: weblog page
*
*/
get_header();

$arg = array(
  'post_type' => 'post',
);

$products = new WP_Query($arg);

?>

<!--  start  product page  -->
      <section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

        <div class="col-3">


        </div>
        <div class="col-9 d-flex flex-wrap juastify-content-start">

<?php

if($products->have_posts()):

  while($products->have_posts()):

          $products->the_post();

          get_template_part("template-parts/weblog/weblog","weblog4");

  endwhile;
  wp_reset_postdata();
else:
  echo "پستی یافت نشد";

endif;
      ?>
    </div>
  </section>

      <?php

get_footer();
 ?>
