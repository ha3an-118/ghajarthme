<?php
/*
* Template Name: weblog page
*
*/
get_header();

if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

$arg = array(
  'post_type' => 'post',
  
  'paged'=> $paged,
);
global $query;
$query = new WP_Query($arg);

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
          <?php dynamic_sidebar("weblogpage"); ?>

        </div>
        <div class="ha-container d-flex flex-column">

<?php

if($query->have_posts()):
  echo "<div class='d-flex flex-wrap juastify-content-start'>";
  while($query->have_posts()):

          $query->the_post();

          get_template_part("template-parts/weblog/weblog","weblog4");

  endwhile;
  wp_reset_postdata();
  echo "</div>";

  get_template_part("template-parts/pagination");

else:
  echo "پستی یافت نشد";

endif;
      ?>
    </div>
  </section>

      <?php

get_footer();
 ?>
