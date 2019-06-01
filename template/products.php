<?php
/*
* Template Name: products page
*
*/
get_header();

if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }



$arg = array(
  'post_type' => 'product',

  'paged'=> $paged,
);
global $wp_query;

$wp_query = new WP_Query($arg);


?>

<!--  start  product page  -->
      <section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

        <div class="ha-asside  flex-column bg-10 ">

          <div class="bg-3 p-2 d-flex flex-row justify-content-center my-1 ha-asside-header">

            <button type="button" name="button" class="ha-btn mx-auto" onclick="haToggleAsside(this)">
                  <i class="fa fa-chevron-circle-right fa-2x"></i>
            </button>
            <button type="button" name="button" class="ha-asside-toggle ha-btn " onclick="haToggleAsside(this)" >
                  <i class="fa fa-filter fa-3x text-8 fa-inverse"></i>
            </button>

          </div>


          <?php dynamic_sidebar("productspage"); ?>



        </div>

        <div class="ha-container d-flex flex-column">

<?php

if($wp_query->have_posts()):
    echo "<div class='d-flex flex-wrap juastify-content-start'>";
  while($wp_query->have_posts()):

          $wp_query->the_post();

          get_template_part("template-parts/product/product","item");

  endwhile;
  wp_reset_postdata();
    echo "</div>";

    get_template_part("template-parts/pagination");




else:
  echo "محصولی یافت نشد";

endif;
      ?>
    </div>


  </section>

      <?php

get_footer();
 ?>
