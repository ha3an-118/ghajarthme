<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/
add_action( 'widgets_init', function() { register_widget( 'AboutUs' ); } );

class AboutUs extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
          'ha-about us',  // Base ID
          'ha about us '   // Name
        );
    }
  public function widget($args, $instance)
  {
    // TODO: must get the term id and get the term_id and get query form it
    $queryArg = array(
                'post_type' => 'page',
                'page_id' => (int)$instance['aboutus'],
    );

    $posts = new WP_Query($queryArg);
    if($posts->have_posts()):
      while ($posts->have_posts()):
          $posts->the_post();
          ?>
          <section class="w-100 p-0 m-0 d-flex flex-row flex-nowrap">
              <div class="col-6">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
              </div>
              <div class="col-6 align-self-center">

                <div class="d-flex flex-column flex-nowrap text-right justify-content-center">

                  <div class="flg py-3 pr-2">
                       <?php the_title(); ?>
                  </div>
                  <div class="text-justify pr-4">
                    <?php the_content(); ?>
                  </div>

                </div>

              </div>

          </section> <!-- end of  about us section  -->



          <?php

      endwhile;
    endif;
    wp_reset_postdata();
  } // end of widget function

  public function form($instance)
  {

    ?>
    <div class="widefat">
      <label class="widefat" for="<?php echo esc_attr($this->get_field_id("aboutus")); ?>">صفحه در باره ما را انتخاب کنید </label>
      <select class="widefat" id="<?php echo esc_attr($this->get_field_id("aboutus")); ?>"
              name="<?php echo esc_attr($this->get_field_name("aboutus")); ?>">
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
                        <?php if( (int)$instance['aboutus']==get_the_ID()) { echo "selected"; } ?>
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
    echo "this is weblog category";
     // <!-- echo esc_attr( $this->get_field_name() -->
  }

  public function update($new_instance, $old_instance)
  {
    return $new_instance;
  }

  }//end class













 ?>
