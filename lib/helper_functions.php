<?php
/*
* this function must enable widget by require_one
*/
function ha_add_widget( $widgetName )
{
  $fileName = __DIR__."/widgets/".$widgetName.".php";

    require_once($fileName);

}

function ha_print_category_list($name,$widgetName,$taxonomy,$instance){

  $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
) );

  ?>



  <select class="widefat" name="<?php echo $widgetName ?>" required>
    <option value="">-</option>
    <?php foreach($terms as $term): ?>
      <option value="<?php echo (int)$term->term_id ?>" <?php if( (int)$instance[$name]==$term->term_id) { echo "selected"; } ?>>
          <?php echo $term->name ?>
      </option>
    <?php endforeach; ?>

  </select>


  <?php

}

 function print_posttype_posts_list($idname,$name , $posttype ,$instance){

       ?>
       <div class="widefat" style="margin-top:1rem;">
           <select class="widefat" name="<?php echo $idname ?>">

       <?php
               $items = new WP_Query(array(
                                       'post_type' => $posttype,
                                       'posts_per_page' => 0,
                                     ));
                       if($items->have_posts()):
                         while($items->have_posts()):
                           $items->the_post();
                           ?>
                             <option value="<?php the_ID(); ?>"
                               <?php if( (int)$instance[$name]==get_the_ID()) { echo "selected"; } ?> >
                                 <?php the_title(); ?>
                             </option>
                           <?php
                         endwhile;
                       endif;
                       wp_reset_postdata();
                      ?>

                   </select>

         </div>
 <?php
 }


 function print_taxonomies_list($idname,$name ,$instance){

       ?>
       <div class="widefat" style="margin-top:1rem;">
           <select class="widefat" name="<?php echo $idname ?>">

       <?php

               $taxs = get_taxonomies();

               foreach($taxs as $tax):
       ?>
                             <option value="<?php echo $tax; ?>"
                               <?php if( $instance[$name]==$tax) { echo "selected"; } ?> >
                                 <?php echo $tax ?>
                             </option>

               <?php endforeach; ?>
                   </select>

         </div>
 <?php
 }









 ?>
