    <div class="" role="sliderItemHolder">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">

        <div class="p-3 bg-12 dg-baner-txt text-right text-3">

          <h3><?php the_title(); ?></h3>


          <div class="ha-slider-text">
              <?php the_excerpt(); ?>
          </div>
        </div>
    </div>
