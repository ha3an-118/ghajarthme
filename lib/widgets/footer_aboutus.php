<?php
/*
* This widget must show the slider with category selected
* write by hasan abedi from ha3an.ir
*/
add_action( 'widgets_init', function() { register_widget( 'AboutUsFooter' ); } );

class AboutUsFooter extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
          'ha-aboutus-footer',  // Base ID
          'ha aboutus footer'   // Name
        );
    }
  public function widget($args, $instance)
  {
    ?>
    <div class="text-right text-light py-5" id="aboutusfooter">

        <div class="h4">
              <?php echo $instance['title']; ?>
        </div>
        <article class="text-justify">
              <?php echo $instance['content']; ?>
        </article>
    </div>

    <?php
  } // end of widget function

  public function form($instance)
  {

    ?>
    <div class="widefat">

      <p>
          <label for="<?php echo esc_attr($this->get_field_id("title")); ?>"> عنوان</label>
      </p>
      <p>
        <input type="text"
               id ="<?php echo esc_attr($this->get_field_id("title"));?>"
               name=" <?php echo esc_attr($this->get_field_name('title')); ?>"
               value="<?php echo $instance['title'] ?>">
      </p>
      <hr>
      <p>
          <label for="<?php echo esc_attr($this->get_field_id("content")); ?>">شرح</label>
      </p>
      <p>
        <textarea class="widefat"
               id ="<?php echo esc_attr($this->get_field_id("content"));?>"
               name=" <?php echo esc_attr($this->get_field_name('content')); ?>"
               value="">
               <?php echo $instance['content'] ?>
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
