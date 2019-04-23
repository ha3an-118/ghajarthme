
<!-- start single product part  -->
<section class="container-fluid d-flex flex-column flex-md-row justify-content-between bg-3 mt-3">

  <div class="col-12 col-md-5">

    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">

  </div>
  <div class="col-12 col-md-7 align-self-center text-right">

    <h3>
          <?php the_title(); ?>
    </h3>
    <h4>
          شماره تماس
    </h4>
    <div>
        <?php the_content(); ?>
    </div>


  </div>

</section>
<!--  end single product part -->
