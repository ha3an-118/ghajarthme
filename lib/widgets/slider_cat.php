<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/
add_action( 'widgets_init', function() { register_widget( 'SliderCat' ); } );

class SliderCat extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
          'ha-slider-cat',  // Base ID
          'ha slider cat '   // Name
        );
    }
  public function widget($args, $instance)
  {
    // TODO: must get the term id and get the term_id and get query form it
    $queryArg = array(
      'post_type' => 'product',
      'tax_query' => array(
          array(
            'taxonomy' => 'products_cat',
            'field' =>    'term_id',
            'terms' => (int)$instance['catid'],
          ),
        ),
      'post_per_page' => 0,

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

      <div class="container-fluid p-0 d-flex flex-row flex-nowrap justify-content-between overflow-hidden"
            id="<?php echo esc_attr($this->get_field_id("sugesttion")) ?>" role="slider" type="protofile" arrang="horizontal"   >
          <div class=" d-flex flex-column justify-content-center" >
            <bottom class="bg-light hover-bg-12 text-12 hover-text-3 py-3 px-2  rounded " role="nextprotofile">
              <i class="fa fa-chevron-right fa-lg"></i>
            </bottom>

          </div>

          <div class="col-9 col-md-11 p-0" >

            <div class="dg-segustion-group py-3 d-flex flex-row flex-nowrap  " role="sliderItemsHolder">
              <?php
              if($posts->have_posts()):

                while($posts->have_posts()):
                    $posts->the_post();
                    get_template_part("template-parts/widget/widget","slidercatitem");
                endwhile;

              else:
                echo "havent eny post";
              endif;


          ?>
          </div> <!-- end [role = sliderItemsHolder]-->

        </div> <!-- end [role = slider] -->
        <div class=" d-flex flex-column justify-content-center" >
          <bottom class="bg-light hover-bg-12 text-12 hover-text-3 py-3 px-2  rounded " role="previousprotofile">
          <i class="fa fa-chevron-left fa-lg"></i>
          </bottom>

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
    $terms = get_terms( array(
                        'taxonomy' => 'products_cat',
                        'hide_empty' => true,
) );
    echo "<select  class='widefat' name='".$this->get_field_name('catid')."'>";
    foreach($terms as $term):

      echo "<option value='".$term->term_id."'".((int)$instance['catid']==$term->term_id?'selected':'').">".$term->name."</option>";

    endforeach;
    echo "</select>";
     // <!-- echo esc_attr( $this->get_field_name() -->
  }

  public function update($new_instance, $old_instance)
  {
    return $new_instance;
  }

  }//end class













 ?>
