<?php
/*
* This template file is just for get related post in single page that have one post
* must add after loop
*/
  global $wp_query;


  if(have_posts()):
    while(have_posts()):
      the_post();
      $tax_arg = array(
        'relation' => 'OR',
      );
      // TODO: get the taxonomy
       $post_taxs = get_object_taxonomies($post);
      // TODO: get the post term of taxanomy
      foreach($post_taxs as $post_tax):
          $terms = get_the_terms($post,$post_tax);
          $terms_id = array();
          if(!empty($terms)):
              foreach($terms as $term):
                    array_push($terms_id,(int)$term->term_id);
              endforeach;
              $tax_temp =array(
                'taxonomy' => $post_tax,
                'field' =>    'term_id',
                'terms' => $terms_id,
                );
              array_push($tax_arg,$tax_temp);
          endif;
      endforeach;
      // TODO: ceate the array for passing the wp-query
      $queryArg = array(
        'post_type' => $post->post_type,
        'tax_query' => $tax_arg,
        'posts_per_page' => 10,
        'post__not_in' => array((int)get_the_ID()),

      );
      global $ha_slider;
      $ha_slider = new WP_Query($queryArg);
      get_template_part("template-parts/slider");

    endwhile; //have posts while
  endif; //have post if

 ?>
