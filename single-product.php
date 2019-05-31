<?php
/*
* template for show the product single page
*/
get_header();

echo "<section >";
if(have_posts()):

  while(have_posts()):
    the_post();

    get_template_part("template-parts/product/product","singlepage");



    $postID = $post->ID;

    // print_r($post);

  endwhile;
  wp_reset_postdata();
else :
  echo "پست مورد نظر یافت نشد";
endif;

echo "</section>";

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

  <?php

get_footer();

 ?>
