<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/
add_action( 'widgets_init', function() { register_widget( 'ContactUsFooter' ); } );

class ContactUsFooter extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
          'ha-contactus-footer',  // Base ID
          'ha contactus footer'   // Name
        );
    }
  public function widget($args, $instance)
  {
    ?>
    <div class=" text-right py-5" id="contactus">
        <div class="d-flex flex-row flex-nowrap" id="footerphone">
            <i class="fa fa-lg fa-phone text-1"></i>
            <div class="">
                <a  href="tellto:<?php echo $instance['tell1'] ?>"class="pr-3 text-light">
                  <?php echo $instance['tell1'] ?>
                </a>
                <a  href="tellto:<?php echo $instance['tell2'] ?>"class="pr-3 text-light">
                  <?php echo $instance['tell2'] ?>
                </a>

            </div>

        </div>
        <div class="d-flex flex-row flex-nowrap" id="footerphone">
            <i class="fa fa-lg fa-location-arrow text-1"></i>
            <div class="">

                <a  href="#"class="pr-3 text-light">
                  <?php echo $instance['address'] ?>
                </a>

            </div>


        </div>
        <div class="pt-3">
          <form class="" action="index.html" method="post">
            <label for="submiteournews" class="h4"> عضویت در خبر نامه</label>
            <input id="submiteournews" type="text" name="" value="" class=" w-100">
          </form>
        </div>
    </div>

    <?php
  } // end of widget function

  public function form($instance)
  {

    ?>
    <div class="widefat">

      <p>
          <label for="<?php echo esc_attr($this->get_field_id("tell1")); ?>" class="widefat"  >
            tell-1
          </label>
      </p>
      <p>
        <input type="text" class="widefat"
               id ="<?php echo esc_attr($this->get_field_id("tell1"));?>"
               name=" <?php echo esc_attr($this->get_field_name('tell1')); ?>"
               value="<?php echo $instance['tell1'] ?>">
      </p>
      <hr>


      <p>
          <label for="<?php echo esc_attr($this->get_field_id("tell2"));  ?>" class="widefat">
            tell-1
          </label>
      </p>
      <p>
        <input type="text" class="widefat"
               id ="<?php echo esc_attr($this->get_field_id("tell2"));?>"
               name=" <?php echo esc_attr($this->get_field_name('tell2')); ?>"
               value="<?php echo $instance['tell2'] ?>">
      </p>
      <hr>



      <p>
          <label for="<?php echo esc_attr($this->get_field_id("address")); ?>" class="widefat">
            address
          </label>
      </p>
      <p>
        <textarea class="widefat"
               id ="<?php echo esc_attr($this->get_field_id("address"));?>"
               name=" <?php echo esc_attr($this->get_field_name('address')); ?>"
               value="">
               <?php echo $instance['address'] ?>
        </textarea>
      </p>

    </div>


    <?php
     // <!-- echo esc_attr( $this->get_field_name() -->
  }

  public function update($new_instance, $old_instance)
  {
    return $new_instance;
  }

  }//end class













 ?>
