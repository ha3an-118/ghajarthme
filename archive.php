<?php
get_header();



?>

<!--  start  product page  -->
      <section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

        <div class="d-none d-md-flex col-md-3">


        </div>
        <div class=" d-flex flex-column">

<?php

if(have_posts()):
  echo "<div class='d-flex flex-wrap juastify-content-start' >";

  while(have_posts()):

          the_post();

          get_template_part("template-parts/weblog/weblog","weblog4");

  endwhile;
  echo "</div>";
  wp_reset_postdata();
  get_template_part("template-parts/pagination","regular");
else:
  echo "پستی یافت نشد";

endif;
      ?>
    </div>
  </section>

      <?php

get_footer();
 ?>
