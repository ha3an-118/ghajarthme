<?php
  /*
  * Template is for shwo pagination on the page
  */
  global $wp_query;
  if(isset($wp_query)):
      $numberofpage =(int)$wp_query->max_num_pages;
      if($numberofpage > 1):

     ?>
     <div class='d-flex flex-row justify-content-center mt-2'>
       <nav aria-label="Page navigation example">
          <ul class="pagination">
              <li class="page-item">
                  <a class="page-link text-12 hover-text-8" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>
              <?php for($index=1 ; $index<=$numberofpage; $index++): ?>
                <?php $link=get_pagenum_link($index); ?>
                  <li class="page-item">
                    <a class="page-link text-12 hover-text-8" href="<?php echo $link ?>">
                      <?php echo $index ?>
                    </a>
                  </li>
              <?php endfor; ?>
              <li class="page-item">
                  <a class="page-link text-12 hover-text-8" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
          </ul>
        </nav>
     </div>
    <?php endif; //end for $numberofpage>1  ?>
  <?php else: ?>
    <div class="">
      is not set
      <?php print_r($query) ?>
    </div>
<?php endif; // end for isset($query) ?>
