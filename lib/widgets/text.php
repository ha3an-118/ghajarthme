
echo "<ul class='text-right p-0 w-100'>";

<li class="list-group-item  fmd bg-4 text-11">

        <?php echo $instance['title']; ?>

</li>
<?php
foreach($terms as $term):
  // print_r($term);
   $parent =get_term_parents_list($term->term_id,$term->taxonomy,array(
      'separator'=> "-**-",
   ));
  $paarray = explode("-**-",$parent);
  $index =0;
  foreach($paarray as $temp):
    if(!empty($temp)):
      echo "<li class='ha-parent-cat pr-".($index*2)."'>".$temp."</li>";
      $index++;
    endif;
  endforeach;


  // function my_post_queries( $query ) {
  //   // do not alter the query on wp-admin pages and only alter it if it's the main query
  //   if (!is_admin() && $query->is_main_query()){
  //
  //     // alter the query for the home and category pages
  //
  //     if(is_home()){
  //       $query->set('posts_per_page', 3);
  //     }
  //
  //     if(is_category()){
  //       $query->set('posts_per_page', 3);
  //     }
  //
  //   }
  // }
  // add_action( 'pre_get_posts', 'my_post_queries' );




  $terms = wp_get_post_terms($postID,"products_cat");

  $termId = array();

  foreach($terms as $term):

    array_push($termId,(int)$term->term_id);


  endforeach;


  $queryArg = array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
          'taxonomy' => 'products_cat',
          'field' =>    'term_id',
          'terms' => $termId,
        ),
      ),
    'post_per_page' => 0,

  );


    $posts = new WP_Query($queryArg);
  ?>
  <section class="container-fluid d-flex flex-row justify-content-between bg-3 mt-3">

          <div class="col-12 d-flex flex-wrap juastify-content-start">

  <?php

    if($posts->have_posts()):

      while($posts->have_posts()):
        $posts->the_post();

        get_template_part("template-parts/product/product","item3");
        // get_template_part("template-parts/widget/widget","slidercatitem");


      endwhile;
      wp_reset_postdata();

    endif;

    ?>
  </div>
  </section>
