<!-- start single weblog part  -->
<section class="">

  <div class="col-12 col-md-10 mx-auto">

    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid mx-auto d-block" alt="">

  </div>
  <article class="text-right">
      <header>
          <h3>
                <?php the_title(); ?>
          </h3>
      </header>
        <?php the_content(); ?>
  </article>

</section>
<!--  end single weblog part -->
