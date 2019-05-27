<?php
/**
 *
 */
 require_once(__DIR__."/../helper_functions.php");
 add_action( 'widgets_init' , function() { register_widget( 'SidebarCat' ); } );


class SidebarCat extends WP_Widget
{

  public function __construct()
  {
    // code...
    parent::__construct(
      'SidebarCat',
      'SidebarCat');
  }
  public function widget($arg , $instance){


    $terms = get_terms( array(
                        'taxonomy' => $instance['taxname'],
                        'hide_empty' => false,
) );
    ?>
    <ul class="text-right w-100 p-0">
      <li class="list-group-item  fmd bg-4 text-11">

              <?php echo $instance['title']; ?>

      </li>
      <!-- 'before_title', 'after_title',
      'before_widget','after_widget' -->
      <?php foreach($terms as $term): ?>
        <li class="list-group-item text-1 hover-text-3 ">
            <a href="<?php echo get_term_link($term); ?>" class="text-2 hover-text-11">
                <?php echo $term->name ?>
            </a>
        </li>
      <?php endforeach; ?>


    </ul>





    <?php
  }

  public function form($instance){

    ?>
    <div class="widefat">

      <p >
          <label for="<?php echo esc_attr($this->get_field_id("title")); ?>" class="widefat">
                  عنوان
           </label>
      </p>
      <p>
          <input type="text" class="widefat"
                 id="<?php echo esc_attr($this->get_field_id("title")); ?>"
                 name="<?php echo esc_attr($this->get_field_name("title")); ?>"
                 value="<?php echo $instance["title"] ?>">
      </p>

    </div>



    <?php

    print_taxonomies_list($this->get_field_name('taxname'),"taxname"  ,$instance);




  }
  public function update($new_instance,$old_instance){
    return $new_instance;
  }
}


 ?>
