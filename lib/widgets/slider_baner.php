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
    <section class="contianer-fluid d-flex flex-md-row flex-column mt-2 dg-baner">

      <div class="col-12 col-md-9">

      <div class="" id="<?php echo esc_attr($this->get_field_id("topbanerslider")); ?>" role="slider"  pagination="true"  cycle="2000"  navigation="true" >
          <div class="d-flex flex-row flex-nowrap" role="sliderItemsHolder">
            <?php
              self::$numberofslide =(empty($instance['numberofslide']))?3:$instance['numberofslide'];

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
      </div> <!-- end of  [role="sliderItemsHolder"] -->
      <div class="" role="sliderNavigation">


      <!-- IDEA: pager part  -->
      <div class="" role="sliderPaginations" content>

      </div>
      <!-- IDEA: next/prevision part -->
      <div class="slidernextprevrow">

            <div class="p-2 bg-1" role="nextslide" >
                  <
            </div>

            <div class="p-2 bg-1" role="prevslide">
                    >
            </div>

      </div>
    </div> <!-- [role=sliderNavigation ] -->

  </div> <!--  end of [role="slider"] -->
</div> <!--  end fo .col9 -->

<div class="col-12 col-sm-10 mx-sm-auto col-md-3 d-flex justify-content-center">

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
      <img class="img-fluid " src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
      <?php
    endwhile;
  endif;
  wp_reset_postdata();

   ?>

</div>


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
                      'post_per-page' => 0,

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

        <?php // TODO: must print in number of slide the select form  ?>
        <?php
            for($index=0 ; $index < self::$numberofslide ; $index++):

              ?>
                <div class="widefat" style="margin-top:1rem;">

                  <select class="widefat" name="<?php echo esc_attr($this->get_field_name("pageid".$index)); ?>">

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
