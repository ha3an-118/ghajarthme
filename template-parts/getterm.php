<?php
  $tax = get_taxonomies();
  $terms = get_the_terms($post,$tax);
  echo "<div class=' container  p-3 col-12 d-flex flex-row flex-wrap my-2'>";
  foreach($terms as $term){

    ?>
      <a class="px-2 mx-2 btn bg-10 btn-outline-warning bg-3 text-2 hover-bg-1" href="<?php echo get_term_link($term) ?>" >
            <?php echo $term->name; ?>
      </a>
    <?php

  }
  echo "</div>";

 ?>
