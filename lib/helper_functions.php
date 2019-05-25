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







 ?>
