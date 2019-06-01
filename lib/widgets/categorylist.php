<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/

require_once(__DIR__."/../helper_functions.php");
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
    <section class="contianer-fluid d-flex flex-column flex-md-row flex-nowrap mt-3">

      <div class="col-12 col-md-9 d-flex justify-content-center flex-wrap">


        <?php for($index=0 ; $index<(int)$instance['numberofcat'];$index++):
            $link = get_term_link((int)$instance["hacatlist".$index],"products_cat");
          ?>


          <div class="ha-part-cat-item col-5 col-md-3 col-lg-2 d-flex flex-column ha-part-cat-item align-self-start m-2">

            <div class="text-center pt-2 col-11 col-md-8 align-self-center">


              <a href="<?php echo $link; ?>" class="">
                  <i class="ha-icon <?php echo $instance["iconlist".$index] ?>"></i>
              </a>


            </div>
            <div class=" text-center pt-2">
              <a href="<?php echo $link; ?>" class="text-11 hover-text-12">
                <h3>
                  <?php echo $instance["title".$index] ?>
                </h3>
              </a>
            </div>


        </div>

      <?php endfor; ?>





      </div>

      <div class="col-12 col-md-3">

        <ul class="list-group dg-list-group text-right mx-0 px-0">
          <?php
          $terms = get_terms( array(
                              'taxonomy' => 'products_cat',
                              'hide_empty' => false,
                              "parent" => (int)$instance["catterm"],
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

    ?>
    <p >
      <label for="<?php echo esc_attr($this->get_field_id("numberofcat")); ?>">تعداد دسته ها</label>
      <input type="number"
             name="<?php echo esc_attr($this->get_field_name("numberofcat")); ?>"
             id="<?php echo esc_attr($this->get_field_id("numberofcat")); ?>"
            value="<?php echo (int)$instance["numberofcat"] ?>">

    </p>
    <p>
      <label style="align-self:center;"
            for="<?php echo esc_attr($this->get_field_id("catterm")); ?>">
              دسته بندی
      </label>
      <?php ha_print_category_list("catterm",esc_attr($this->get_field_name("catterm")),"products_cat",$instance) ?>


    </p>
    <p><hr></p>


    <?php
      for($index=0 ; $index< (int)$instance['numberofcat'];$index++):

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id("title".$index)); ?>">نام دسته</label>
            <input type="text"
                  name="<?php echo esc_attr($this->get_field_name("title".$index)); ?>"
                  id="<?php echo esc_attr($this->get_field_id("title".$index)); ?>"
                  value="<?php echo $instance['title'.$index]; ?>">
        </p>
        <p>
            <label for="">icon</label>
            <?php self::print_icon_name("iconlist".$index , $instance); ?>
        </p>
        <p>
            <label for="">category</label>
            <?php ha_print_category_list("hacatlist".$index,$this->get_field_name("hacatlist".$index),"products_cat",$instance); ?>
        </p>
        <p><hr></p>

        <?php

      endfor;


     ?>


    <?php

     // <!-- echo esc_attr( $this->get_field_name() -->
  }

  public function update($new_instance, $old_instance)
  {
    return $new_instance;
  }

  public function print_icon_name($name , $instance){
    $icon_names = array(
      "ha-piston",
      "ha-battery",
      "ha-car-lights",
      "ha-car-lights-1",
      "ha-dashboard",
      "ha-engine",
      "ha-gas-station",
      "ha-info",
      "ha-steering-wheel",
      "ha-temperature",
      "ha-tire",
    );
    ?>
    <select class="widefat" name="<?php echo esc_attr($this->get_field_name($name)); ?>" required>
      <option value="">-</option>
      <?php foreach($icon_names as $icon_name): ?>
          <option value="<?php echo $icon_name ?>" <?php if($instance[$name]==$icon_name){ echo "selected";} ?> >
            <?php echo $icon_name; ?>
          </option>
      <?php endforeach; ?>

    </select>

    <?php
  }

  }//end class













 ?>
