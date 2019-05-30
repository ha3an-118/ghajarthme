<?php
  /*
  * Template is for shwo pagination on the page
  */
  global $wp_query;
  $arg = array(
    'before_page_number' => '<li class="page-item page-link">',
    'after_page_number' => '</li>',
    'next_text' => '<li class="page-item page-link">&raquo;</li>',
    'prev_text' => '<li class="page-item page-link">&laquo;</li>',

  );

  $x=paginate_links($arg);

  ?>
     <div class='d-flex flex-row justify-content-center mt-2'>
       <nav aria-label="Page navigation ">
          <ul class="pagination">

                    <?php print_r($x); ?>

          </ul>
        </nav>
     </div>
