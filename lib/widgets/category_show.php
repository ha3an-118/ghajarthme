<?php
  /**
   * write by hasan abedi from ha3an.ir
   */

   add_action( 'widgets_init', function() { register_widget( 'LogoCategory' ); } );

  class LogoCategory extends WP_Widget
  {
    // private static $numberofslide =(!empty($instance['numberofslide']))? $instance['numberofslide'] : 3;

    private static $numberofslide ;
    public function __construct()
    {
      // code...
      parent::__construct(
          'ha-logo-cat',  // Base ID
          'ha logo category '   // Name
        );
    }

    public function widget($args, $instance)
    {


              self::$numberofslide =(empty($instance['numberofslide']))?3:$instance['numberofslide'];
              echo '<section id="'.esc_attr($this->get_field_id("carTypeCategor")).'" class="d-flex flex-row justify-content-around">';
              for( $index=0 ; $index< (int)self::$numberofslide ;$index++ ):
                    $termid = (int)$instance['catid'.$index];
                    $mustshowpage = new WP_Query(array(
                                                  'page_id' => (int)$instance['pageid'.$index],
                                                ));

                    if($mustshowpage->have_posts()):
                      while ($mustshowpage->have_posts()) :

                          $mustshowpage->the_post();?>

                          <div class="car-type-category-item  col-2 bg-1">
                            <a href="<?php echo  get_term_link($termid)?>" >

                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">


                            </a>

                          </div>

                     <?php
                      endwhile;//end while
                   endif;//end if
                   wp_reset_postdata();

          endfor;//end of for
          echo "</section>";


  } // end of widget function

    public function form($instance)
    {
      self::$numberofslide =(empty($instance['numberofslide']))?3:$instance['numberofslide'];

        ?>


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

                  <div class="widefat">
                    <label for="<?php echo esc_attr($this->get_field_id('catid'.$index)); ?>"> دسته بندی مورد نظر را انتخاب کنید</label>

                    <?php
                    $terms = get_terms( array(
                                        'taxonomy' => 'products_cat',
                                        'hide_empty' => true,
                ) );
                    echo "<select  class='widefat' name='".$this->get_field_name('catid'.$index)."' id='".$this->get_field_id('catid'.$index)."'>";
                    foreach($terms as $term):

                      echo "<option value='".$term->term_id."'".((int)$instance['catid'.$index]==$term->term_id?'selected':'').">".$term->name."</option>";

                    endforeach;
                    echo "</select>";


                     ?>

                  </div>

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
