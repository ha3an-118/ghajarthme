<?php
/**
 *
 */
 require_once(__DIR__."/../helper_functions.php");
 add_action( 'widgets_init' , function() { register_widget( 'sidebarCatChalid' ); } );


class sidebarCatChalid extends WP_Widget
{

  public function __construct()
  {
    // code...
    parent::__construct(
      'sidebarCatChalid',
      'sidebarCatChalid');
  }
  public function widget($arg , $instance){

    $all_terms = array();
    ?>
    <div class='bg-3 border'>
          <div class="list-group-item  fmd bg-4 text-11 text-right">

                <?php echo $instance['title']; ?>

        </div>
        <div class="bg-3 pr-1">

                <?php
                    self::print_child((int)$instance['cat'] ,  $instance['taxonomies']);
                 ?>


        </div>

  </div>




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

      <p>
        <?php print_taxonomies_list(esc_attr($this->get_field_name("taxonomies")),"taxonomies" ,$instance) ?>
      </p>
      <p>
        <?php
            $tax = empty($instance["taxonomies"])?"category":$instance["taxonomies"];
            print_r($tax);
            ha_print_category_list("cat",esc_attr($this->get_field_name("cat")),$tax,$instance)


         ?>
      </p>

    </div>



    <?php

    // print_taxonomies_list($this->get_field_name('taxname'),"taxname"  ,$instance);




  }
  public function update($new_instance,$old_instance){
    return $new_instance;
  }

  public function print_child($termId , $taxonomy){

        $arg = array(
          "parent" => $termId,
          "taxonomy" => $taxonomy,
          'hide_empty' => false,

        );


        $terms = get_terms($arg);


        if(!empty($terms)){
        echo "<ul class='text-right ha-side-list-hiracial'>";
              foreach ($terms as $term) {

                echo "<li class='' title='".$term->description."'><a href=".get_term_link($term->term_id)." class=''>".$term->name."</a></li>";
                self::print_child($term->term_id , $taxonomy);
              }
        echo "</ul>";
      }



  }
}



 ?>
