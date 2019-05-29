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
        <div class="ha-container d-flex flex-wrap juastify-content-start">

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
