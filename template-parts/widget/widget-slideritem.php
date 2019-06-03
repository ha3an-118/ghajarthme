<?php global $index ?>
    <div class="carousel-item <?php if($index==0){ echo "active";} ?>" >

        <?php
        $aparat_link = get_post_meta( get_the_ID(), 'aparat_link');

        if(empty($aparat_link)):

            ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
            <?php

        else:
          echo $aparat_link[0];
        endif;

         ?>



        <div class="p-3 bg-12 dg-baner-txt text-right text-3">

          <h3><?php the_title(); ?></h3>


          <div class="ha-slider-text">
              <?php the_excerpt(); ?>
          </div>
        </div>
    </div>
