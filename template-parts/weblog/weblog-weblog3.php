<!-- start ================================================ -->
<div class="col-12 col-md-3"  >
  <div class="dg-segustion-item   d-flex flex-column flex-nowrap hover-bg-3 p-0 pb-3 align-items-center ">

      <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">
      <div class="text-center p-2 h5">
          <?php the_title(); ?>
      </div>
      <div class="text-justify px-2 ">
        <?php the_excerpt();  ?>
      </div>
      <a  href="<?php the_permalink(); ?>" class="btn bg-1 hover-bg-4 p2 col-5  ">
         خواندن مقاله
      </a>

  </div>
</div>
<!-- end ================================================  -->
