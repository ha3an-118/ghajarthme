<?php
get_header();


?>
<section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

  <div class="col-3">


  </div>
  <div class="col-9 d-flex flex-wrap juastify-content-start">

        <?php
            if(have_posts()):

              while(have_posts()):
                  the_post();



                  if($post->post_type == "post"):
                    get_template_part("template-parts/weblog/weblog","weblog4");
                  elseif ($post->post_type == "product"):
                    get_template_part("template-parts/product/product","item");
                  endif;

              endwhile;

            endif;


         ?>

  <div>

</section>


<?php

get_footer();

 ?>
