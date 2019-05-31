<?php
add_action( 'wp_ajax_save_message', 'save_message' );
add_action( 'wp_ajax_nopriv_save_message', 'save_message' );



function save_message(){

  if(isset($_POST['link'])){
      $link = $_POST['link'];
  }
  if(isset($_POST['message'])){
      $message = $_POST['message'];
  }
  if(isset($_POST['postid'])){
      $postid = (int)$_POST['postid'];
  }


  

  $commentdata = array(
  	'comment_post_ID' => $postid, // to which post the comment will show up
  	'comment_author_email' => $link, //fixed value - can be dynamic
  	'comment_content' => $message, //fixed value - can be dynamic
  	'comment_type' => '', //empty for regular comments, 'pingback' for pingbacks, 'trackback' for trackbacks
  	'user_id' => $current_user->ID, //passing current user ID or any predefined as per the demand
  );

  //Insert new comment and get the comment ID
  $comment_id = wp_new_comment( $commentdata );


  echo $comment_id;


}



 ?>
