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
    get_template_part("template-parts/relatedpost");

get_footer();

 ?>
