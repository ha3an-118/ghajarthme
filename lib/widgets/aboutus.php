<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/
add_action( 'widgets_init', function() { register_widget( 'AboutUs' ); } );
require_once(__DIR__."/../helper_functions.php");
class AboutUs extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
          'ha-about-us',  // Base ID
          'ha about us '   // Name
        );
    }
  public function widget($args, $instance)
  {
    // TODO: must get the term id and get the term_id and get query form it

    $queryArg = array(
                'page_id' => (int)$instance['aboutus'],
    );

    $posts = new WP_Query($queryArg);
    if($posts->have_posts()):
      while ($posts->have_posts()):
          $posts->the_post();
          ?>
          <section class="w-100 p-0 m-0 d-flex flex-column flex-md-row flex-nowrap">
              <div class="col-12 col-md-6 d-flex justify-content-center p-0 m-0 d-none d-md-flex">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
              </div>
              <div class="col-12 col-md-6 align-self-center">

                <div class="d-flex flex-column flex-nowrap text-right justify-content-center">

                  <div class="flg py-3 pr-2">
                       <?php the_title(); ?>
                  </div>
                  <div class="text-justify px-4">
                    <?php the_content(); ?>
                  </div>

                </div>

              </div>

          </section> <!-- end of  about us section  -->
          <?php
      endwhile;
      wp_reset_postdata();
    endif;

  } // end of widget function

  public function form($instance)
  {
    ?>
    <p class="widefat">
        <label class="widefat" for="<?php echo esc_attr($this->get_field_id("aboutus")); ?>">صفحه در باره ما را انتخاب کنید </label>
        <?php print_posttype_posts_list(esc_attr($this->get_field_name("aboutus")),"aboutus" , "page" ,$instance); ?>
    </p>
    <?php
  }

  public function update($new_instance, $old_instance)
  {
    return $new_instance;
  }

  }//end class













 ?>
