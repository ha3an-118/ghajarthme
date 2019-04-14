<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/
add_action( 'widgets_init', function() { register_widget( 'CatList' ); } );

class CatList extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
          'ha-cat-list',  // Base ID
          'ha cat list'   // Name
        );
    }
  public function widget($args, $instance)
  {
    ?>
    <section class="contianer-fluid d-flex flex-row flex-nowrap mt-3">

      <div class="col-9 d-flex justify-content-center">

        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pic/car.png" alt="" class="img-fluid">

      </div>

      <div class="col-3">

        <ul class="list-group dg-list-group">
          <?php
          $terms = get_terms( array(
                              'taxonomy' => 'products_cat',
                              'hide_empty' => false,
                            ) );

          foreach($terms as $term):
           ?>

          <li class="list-group-item ">

            <a href="<?php echo get_term_link($term); ?>" class="text-2  w-100 h-100">
              <?php echo $term->name; ?>
            </a>


           </li>
          <?php

          endforeach;

           ?>

        </ul>

      </div>

    </section>


    <?php
  } // end of widget function

  public function form($instance)
  {

    echo "not me ";
     // <!-- echo esc_attr( $this->get_field_name() -->
  }

  public function update($new_instance, $old_instance)
  {
    return $new_instance;
  }

  }//end class













 ?>
