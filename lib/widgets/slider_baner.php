<?php
  /**
   * write by hasan abedi from ha3an.ir
   */

   add_action( 'widgets_init', function() { register_widget( 'SliderBaner' ); } );

  class SliderBaner extends WP_Widget
  {
    // private static $numberofslide =(!empty($instance['numberofslide']))? $instance['numberofslide'] : 3;

    private static $numberofslide ;
    public function __construct()
    {
      // code...
      parent::__construct(
          'ha-slider-baner',  // Base ID
          'ha slider baner '   // Name
        );
    }

    public function widget($args, $instance)
    {

      ?>
    <!--         start baner part                   -->
    <section class="contianer-fluid d-flex flex-md-row flex-column mt-2 dg-baner dir-ltr px-0 px-md-3">

      <div class="col-12 col-md-9 ">
        <?php
        $id = esc_attr($this->get_field_id("topbanerslider"));
        self::$numberofslide =(empty($instance['numberofslide']))?3:$instance['numberofslide'];
        global $index;

        ?>

        <div id="<?php echo $id; ?>" class="carousel slide">
              <ol class="carousel-indicators">
                <?php for( $index=0 ; $index< (int)self::$numberofslide ;$index++ ): ?>
                      <li data-target="#<?php echo $id; ?>" data-slide-to="<?php echo $index ?>" class="<?php if($index==0){ echo "active";} ?>"></li>
                <?php endfor; ?>
              </ol>


              <div class="carousel-inner">

                <div >
                  <?php
                  for( $index=0 ; $index< (int)self::$numberofslide ;$index++ ){
                        $mustshowpage = new WP_Query(array(
                                                      'page_id' => (int)$instance['pageid'.$index],
                                                    ));

                        if($mustshowpage->have_posts()):
                          while ($mustshowpage->have_posts()) :

                              $mustshowpage->the_post();?>
                              <?php get_template_part("template-parts/widget/widget","slideritem"); ?>

                         <?php
                          endwhile;//end while
                       endif;//end if
                       wp_reset_postdata();

                     }//end of for
              ?>

              </div>


              <a class="carousel-control-prev" href="#<?php echo $id; ?>" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#<?php echo $id; ?>" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>


      </div> <!--  end fo .col9 -->

<div class="col-12 col-sm-10 mx-sm-auto col-md-3 d-md-flex justify-content-center d-none ">


  <!-- <img class="img-fluid " src="pic/3.jpg" alt=""> -->
  <?php // TODO: must get page from admin ui and show heare ?>
  <?php
  $baner = new WP_Query(array(
                                'page_id' => (int)$instance['baner'],
                              ));
  if($baner->have_posts()):
    while($baner->have_posts()):
      $baner->the_post();
      ?>
      <a href="<?php the_permalink(); ?>" style="height:100%;">

        <img class="img-fluid " src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">

      </a>


</div>
<div id="habannerpupup" class="ha-baner-pupup"
  beforewidth="0" beforeheight="0" beforepositiontop="0" beforepositionleft="0"
  afterwidth="100%" afterheight="100%" afterpositiontop="0" afterpositionleft="0" >

    <button expandwinid="habannerpupup" class="btn bg-trnsparent" >
      <i class="fa fa-times fa-2x text-1"></i>
    </button>
  <div class="col-9 mx-auto">
    <a href="<?php the_permalink(); ?>" style="height:100%;">


      <img class="img-fluid " src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">

    </a>

  </div>



</div>




  <div class="fixed-bottom  d-md-none alert alert-warning alert-dismissible fade show" role="alert">

    <button expandwinid="habannerpupup" class="btn bg-trnsparent" >
        <strong class="text-danger">یک پیشنهاد ویژه دارید </strong> برای نمایش کلید کنید.
    </button>



  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
      endwhile;
  endif;
  wp_reset_postdata();

?>
<script type="text/javascript">
      $('[data-dismiss=alert]').click(function(){

        $(this).parents('[role=alert]').hide();

      });

      $(document).ready(function(){
        $('#<?php echo $id ?>').carousel({
            interval: <?php echo (int)$instance["timeofslide"]*1000 ?>,
          })
      });


</script>
</section> <!-- end of .dg-baner -->
    <?php


  } // end of widget function

    public function form($instance)
    {
      self::$numberofslide =(empty($instance['numberofslide']))?3:$instance['numberofslide'];

        ?>
        <div class="widefat">
          <label class="widefat" for="<?php echo esc_attr($this->get_field_id("baner")); ?>">صفحه بنر را انتخاب کنید</label>
          <select class="widefat" id="<?php echo esc_attr($this->get_field_id("baner")); ?>"
                  name="<?php echo esc_attr($this->get_field_name("baner")); ?>">
                  <?php
                    $pages = new WP_Query(array(
                      'post_type' => 'page',
                      'posts_per_page' => -1

                    ));
                    if($pages->have_posts()){
                      while($pages->have_posts()){
                        $pages->the_post();
                        ?>
                          <option value="<?php the_ID(); ?>"
                            <?php if( (int)$instance['baner']==get_the_ID()) { echo "selected"; } ?>
                            >
                              <?php the_title(); ?>
                          </option>
                        <?php
                      }
                    }
                    wp_reset_postdata();
                   ?>

          </select>
        </div>
        <p>


        </p>
        <div class="widefat"  style="display:flex; justify-content:space-between;margin-top:1rem;">

          <label style="align-self:center;"
                for="<?php echo esc_attr($this->get_field_id("numberofslide")); ?>">
              تعداد اسلاید
          </label>
          <input id="<?php echo esc_attr($this->get_field_id("numberofslide")); ?>"
                 type="number"
                 name="<?php echo esc_attr($this->get_field_name("numberofslide")); ?>"
                 value="<?php echo $instance["numberofslide"]; ?>">



        </div>
        <div class="widefat"  style="display:flex; justify-content:space-between;margin-top:1rem;">

          <label style="align-self:center;"
                for="<?php echo esc_attr($this->get_field_id("timeofslide")); ?>">
              زمان اسلایدر ثانیه
          </label>
          <input id="<?php echo esc_attr($this->get_field_id("timeofslide")); ?>"
                 type="number"
                 name="<?php echo esc_attr($this->get_field_name("timeofslide")); ?>"
                 value="<?php echo $instance["timeofslide"]; ?>">



        </div>

        <?php // TODO: must print in number of slide the select form  ?>
        <?php
            for($index=0 ; $index < self::$numberofslide ; $index++):

              ?>
                <div class="widefat" style="margin-top:1rem;">

                  <select class="widefat" name="<?php echo esc_attr($this->get_field_name("pageid".$index)); ?>">

                    <?php
                      $pages = new WP_Query(array(
                        'post_type' => 'page',
                        'posts_per_page' => -1

                      ));
                      if($pages->have_posts()){
                        while($pages->have_posts()){
                          $pages->the_post();
                          ?>
                            <option value="<?php the_ID(); ?>"
                              <?php if( (int)$instance['pageid'.$index]==get_the_ID()) { echo "selected"; } ?>
                              >
                                <?php the_title(); ?>
                            </option>
                          <?php
                        }
                      }
                      wp_reset_postdata();
                     ?>

                  </select>

                </div>

              <?php

            endfor;




         ?>

         <!-- <div class="">

          <select class="widefat" name="<?php echo esc_attr($this->get_field_name("pageid")); ?>">

            <?php
              $pages = new WP_Query(array(
                'post_type' => 'page',
                'posts_per_page' => 0,

              ));
              if($pages->have_posts()){
                while($pages->have_posts()){
                  $pages->the_post();
                  ?>
                    <option value="<?php the_ID(); ?>"
                      <?php if( (int)$instance['pageid']==get_the_ID()) { echo "selected"; } ?>
                      >
                        <?php the_title(); ?>
                    </option>
                  <?php
                }
              }
              wp_reset_postdata();
             ?>

          </select>

         </div> -->



        <?php
     // <!-- echo esc_attr( $this->get_field_name() -->
    }

    public function update($new_instance, $old_instance)
    {
      self::$numberofslide = $new_instance["numberofslide"];
      return $new_instance;

    }

  }//end class








 ?>
