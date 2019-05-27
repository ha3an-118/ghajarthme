<?php
get_header();



?>

<!--  start  product page  -->
      <section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

        <div class="col-3">

          <?php
          dynamic_sidebar("portfoliospage");
           ?>




        </div>
        <div class="col-9 d-flex flex-wrap juastify-content-start">

<?php

if(have_posts()):

  while(have_posts()):

          the_post();

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
