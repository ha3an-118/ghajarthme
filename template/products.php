<?php
/*
* Template Name: products page
*
*/
get_header();

$arg = array(
  'post_type' => 'product',
);

$products = new WP_Query($arg);

?>

<!--  start  product page  -->
      <section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

        <div class="d-none d-md-flex col-md-3  flex-column">

          <?php dynamic_sidebar("portfoliospage "); ?>


        </div>
        <div class="col-12 col-md-9 d-flex flex-wrap juastify-content-start">

<?php

if($products->have_posts()):

  while($products->have_posts()):

          $products->the_post();

          get_template_part("template-parts/product/product","item");

  endwhile;
  wp_reset_postdata();
else:
  echo "محصولی یافت نشد";

endif;
      ?>
    </div>
  </section>

      <?php

get_footer();
 ?>
