<div class="col-12 col-md-3 col-lg-3 mx-auto " role="sliderItemHolder" >
  <a href="<?php the_permalink(); ?>" class="  ">
      <div class="dg-segustion-item   d-flex flex-column flex-nowrap hover-bg-3 p-0 pb-3 align-items-center ">

          <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid box-shadow" alt="">
          <div class="text-center p-2 text-12 hover-text-2 h5">
              <?php the_title(); ?>
          </div>

      </div>
  </a>
</div>
