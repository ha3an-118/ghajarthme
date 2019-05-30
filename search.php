<?php
get_header();


?>
<section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

  <div class="ha-asside">


  </div>
  <div class="ha-container d-flex flex-column">

        <?php
            if(have_posts()):
              echo "<div class=' d-flex  flex-wrap  juastify-content-start '>";
              while(have_posts()):
                  the_post();

                  if($post->post_type == "post"):
                    get_template_part("template-parts/weblog/weblog","weblog4");
                  elseif ($post->post_type == "product"):
                    get_template_part("template-parts/product/product","item");
                  endif;

              endwhile;
              echo "</div>";
              wp_reset_postdata();
              get_template_part("template-parts/pagination","regular");
            endif;


         ?>

  </div>

</section>


<?php

get_footer();

 ?>
