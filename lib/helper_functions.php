<?php
/*
* this function must enable widget by require_one
*/
function ha_add_widget( $widgetName )
{
  $fileName = __DIR__."/widgets/".$widgetName.".php";

    require_once($fileName);

}




 ?>
