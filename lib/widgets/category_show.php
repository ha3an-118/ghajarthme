<?php
  /**
   * write by hasan abedi from ha3an.ir
   */

   add_action( 'widgets_init', function() { register_widget( 'LogoCategory' ); } );
   require_once(__DIR__."/../helper_functions.php");
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
              echo '<section id="'.esc_attr($this->get_field_id("carTypeCategor")).'" class="d-flex flex-row flex-wrap justify-content-around my-2">';
              for( $index=0 ; $index< (int)self::$numberofslide ;$index++ ):
                    $termid = (int)$instance['catid'.$index];
                    $mustshowpage = new WP_Query(array(
                                                  'page_id' => (int)$instance['pageid'.$index],
                                                ));

                    if($mustshowpage->have_posts()):
                      while ($mustshowpage->have_posts()) :

                          $mustshowpage->the_post();?>

                          <div class="car-type-category-item  col-5 col-md-2  my-1  ">
                            <a href="<?php echo  get_term_link($termid,'products_cat')?>" >

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


        <p class="widefat"  style="display:flex; justify-content:space-between;margin-top:1rem;">
            <label style="align-self:center;"
                  for="<?php echo esc_attr($this->get_field_id("numberofslide")); ?>">
                تعداد اسلاید
            </label>
            <input id="<?php echo esc_attr($this->get_field_id("numberofslide")); ?>"
                   type="number"
                   name="<?php echo esc_attr($this->get_field_name("numberofslide")); ?>"
                   value="<?php echo $instance["numberofslide"]; ?>">
        </p>
        <p><hr></p>
        <p>در این ویجیت شما یک صفحه را با یک دسته بندی مرتبط میکنید</p>
        <?php
            for($index=0 ; $index < self::$numberofslide ; $index++):



              ?>
              <p class="widefat">
                  <label class="widefat" for="<?php echo esc_attr($this->get_field_id("aboutus")); ?>">
                      صفحه مورد نظر را انتخاب کنید
                  </label>
                  <?php print_posttype_posts_list(esc_attr($this->get_field_name("pageid".$index)),"pageid".$index , "page" ,$instance); ?>
                  <?php $cat_name = 'catid'.$index; ?>
                  <label for="<?php echo esc_attr($this->get_field_id($cat_name)); ?>"> دسته بندی مورد نظر را انتخاب کنید</label>
                  <?php ha_print_category_list($cat_name,esc_attr($this->get_field_name($cat_name)),'products_cat',$instance) ?>

              </p>
              <p><hr></p>
              <?php endfor;
    }

    public function update($new_instance, $old_instance)
    {
      self::$numberofslide = $new_instance["numberofslide"];
      return $new_instance;

    }

  }//end class








 ?>
