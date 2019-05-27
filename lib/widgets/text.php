
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
