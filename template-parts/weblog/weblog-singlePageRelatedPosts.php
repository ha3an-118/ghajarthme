<?php


  $tax = get_taxonomies();

  $terms = get_the_terms($post,$tax);

  $tax_query_arg = array(
        'relation' => 'OR',

  );

  foreach($terms as $term):

      $tax_temp =array(

        'taxonomy' => $term->taxonomy,
        'field' =>    'term_id',
        'terms' => (int)$term->term_id,


      );

      array_push($tax_query_arg,$tax_temp);

  endforeach;

  //show the terms on page

  ?>
  <div class="col-11 mx-auto align-self-center text-right">
    <hr class="bg-2">
    <?php
      foreach($terms as $term):
        ?>

          <a href="<?php echo get_term_link($term); ?>"
             class="p-2 mr-2 hover-text-1 text-8" >
            <?php echo $term->name; ?>
          </a>
        <?php
      endforeach;

     ?>

  </div>


  <?php



  $queryArg = array(
    'post_type' => $post->post_type,
    'tax_query' => $tax_query_arg,
    'posts_per_page' => 10,
  );

    $relatedPosts = new WP_Query($queryArg);

    ?>
    <section class="contianer-fluid d-flex flex-column flex-nowrap my-3 bg-10">


    <div class="dg-segustion-header p-3 text-right ">

        <div class="f1r5 pr-4 ">
            <?php echo "نوشته های مشابه" ?>
        </div>
        <div class="dg-header-underline mt-4">

        </div>
    </div>
    <div class="col-12 d-flex flex-wrap juastify-content-start">
    <?php

    if($relatedPosts->have_posts()):
      while($relatedPosts->have_posts()):
          $relatedPosts->the_post();
        get_template_part("template-parts/weblog/weblog","weblog3");
      endwhile;

    endif;

    wp_reset_postdata();

?>
  </div>

 </section>
