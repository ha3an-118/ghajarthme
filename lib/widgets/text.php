
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
