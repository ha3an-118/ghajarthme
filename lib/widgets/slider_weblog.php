<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/
add_action( 'widgets_init', function() { register_widget( 'SliderWeblog' ); } );

class SliderWeblog extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
          'ha-slider-weblog',  // Base ID
          'ha slider weblog '   // Name
        );
    }
  public function widget($args, $instance)
  {
    // TODO: must get the term id and get the term_id and get query form it
    $queryArg = array(
      'post_type' => 'post',

      'post_per_page' => 10,

    );

    $posts = new WP_Query($queryArg);
    ?>

    <section class="contianer-fluid d-flex flex-column flex-nowrap mt-3 bg-10">
      <div class="dg-segustion-header p-3 text-right ">

          <div class="f1r5 pr-4 ">
              <?php echo $instance['title']; ?>
          </div>
          <div class="dg-header-underline mt-4">

          </div>
      </div>

      <div class="container-fluid d-flex flex-row flex-nowrap justify-content-between">
          <div class=" d-flex flex-column justify-content-center" >
            <bottom class="bg-light hover-bg-12 text-12 hover-text-3 py-3 px-2  rounded " role="nextprotofile">
              <
            </bottom>

          </div>

          <div class="col-11" id="<?php echo esc_attr($this->get_field_id("sugesttion")) ?>" role="slider" type="protofile" arrang="horizontal">

            <div class="dg-segustion-group py-3 d-flex flex-row flex-nowrap " role="sliderItemsHolder">
              <?php
              if($posts->have_posts()):

                while($posts->have_posts()):
                    $posts->the_post();
                    get_template_part("template-parts/widget/widget","weblog");
                endwhile;

              else:
                echo "havent eny post";
              endif;


          ?>
          </div> <!-- end [role = sliderItemsHolder]-->

        </div> <!-- end [role = slider] -->
        <div class=" d-flex flex-column justify-content-center" >
          <div class="bg-light hover-bg-12 text-12 hover-text-3 py-3 px-2  rounded " role="previousprotofile">
            >
          </div>

        </div>
      </div>
        </section> <!-- end of section -->
          <?php
  } // end of widget function

  public function form($instance)
  {

    ?>
    <div class="widefat">
        <label class="widefat" for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            عنوان
        </label>
        <input type="text" class="widefat"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>"
               id = "<?php echo esc_attr($this->get_field_id('title')); ?>"
               value="<?php echo $instance['title']; ?>">
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
