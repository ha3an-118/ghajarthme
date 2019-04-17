
<!-- start single product part  -->
<section class="container-fluid d-flex flex-column justify-content-between bg-3 mt-3">

  <div class="col-10 mx-auto mh-75 d-flex flex-justify-center">

    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">

  </div>
  <div class="col-10 mx-auto align-self-center text-right">

    <h3>
          <?php the_title(); ?>
    </h3>

    <div>
        <?php the_content(); ?>
    </div>


  </div>

</section>
<!--  end single product part -->
