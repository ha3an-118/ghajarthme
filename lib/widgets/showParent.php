<?php
/**
 *
 */
 require_once(__DIR__."/../helper_functions.php");
 add_action( 'widgets_init' , function() { register_widget( 'ShowParent' ); } );


class ShowParent extends WP_Widget
{

  public function __construct()
  {
    // code...
    parent::__construct(
      'ShowParent',
      'Show Parent');
  }
  public function widget($arg , $instance){

    $all_terms = array();
    ?>
    <div>
      <div class="list-group-item  fmd bg-4 text-11 text-right">

              <?php echo $instance['title']; ?>

      </div>
          <?php
          global $wp_query;

          if(have_posts()):

            while(have_posts()):

                    the_post();
                    $taxs = get_taxonomies();

                    $terms = get_the_terms($post,$taxs);

                    array_push($all_terms,$terms);

            endwhile;
            wp_reset_postdata();
          else:
            echo "دسته بندی یافت نشد";

          endif;
          $all_term_unique = array_unique($all_terms,SORT_REGULAR);
          $parent_link = array();
          if(!empty($all_term_unique)):
              foreach($all_term_unique as $terms):
                if(!empty($terms)):
                    foreach($terms as $term):
                        $temp_parentlink = get_term_parents_list($term->term_id,$term->taxonomy,array(
                           'separator'=> "-**-",
                        ));
                        array_push($parent_link,  $temp_parentlink);
                    endforeach;
              endif;

              endforeach;
          endif;
          $parent_link = array_unique($parent_link,SORT_REGULAR);

          foreach($parent_link as $parents):
            $paarray = explode("-**-",$parents);
            $index =0;
            echo "<div class='bg-3 pr-1'>";
              echo "<ul class='text-right ha-side-list-hiracial'>";
              foreach($paarray as $temp):
                if(!empty($temp)):
                  echo "<li class='text-12 hover-text-11'>".$temp."</li>";
                  $index++;
                endif;
              endforeach;
              echo "</ul>";
            echo "</div>";
          endforeach;
    echo "</div>";


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

    // print_taxonomies_list($this->get_field_name('taxname'),"taxname"  ,$instance);




  }
  public function update($new_instance,$old_instance){
    return $new_instance;
  }
}


 ?>
