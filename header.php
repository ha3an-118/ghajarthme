<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">


    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/colorpalet.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fontawesome.css">

    <!-- =================================================  -->
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-3.3.1.js">

    </script>
    <!-- add slider  -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/slider.css">
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/slider.js"></script>
    <!-- ==================================================  -->




    <title></title>
  </head>
  <body>
    <!-- IDEA: header part  -->
      <header class="container-fluid dg-header d-flex flex-row justify-content-between">
            <div class="d-flex flex-row">
              <div id="logo" class="align-self-center ha-logo-contianer" >
                  <!-- <img class="dg-logo" src="pic/logo.png" title="car instrument pertian "> -->
                  <?php the_custom_logo(); ?>
              </div>
              <div class="flg text-2 align-self-center pr-3 ">
                <span>گروه پخش لوازم یدکی </span>
                <span class="text-8">پرشین</span>
              </div>

            </div>

             <div class="align-self-center text-1 d-flex flex-row dir-ltr">
              <i class="fa fa-2x fa-headset"></i>
              <a href="trello:+98911901111"  class="align-self-center pl-2  text-2 hover-text-11"><?php echo get_option("haTellphoneone"); ?></a>
              <a href="trello:+98911901111"  class="align-self-center pl-2  text-2 hover-text-11"><?php echo get_option("haTellphonetwo"); ?></a>

              <?php
              /*
              $arg_phone_top_menu = array(
                'menu_class'        => "align-self-center text-1 d-flex flex-row dir-ltr ha-list-style-none",
                'menu_id'           => "",
                'container'         => "div",
                'container_class'   => "d-flex",
                'container_id'      => "phonemenu",
                'before'            => '<i class="fa fa-2x fa-headset"></i>',
                'after'             => "",
                'link_before'       => "<span class='align-self-center pl-2  text-2 hover-text-11'>",
                'link_after'        => "</span>",
                'theme_location'    => "phone-number-menu",

              );

              wp_nav_menu( $arg_phone_top_menu );
              */
               ?>




         </div>
      </header>
    <!--         start navigation  part             -->
      <nav class="container-fluid dg-nav d-flex flex-row justify-content-between bg-4">

          <!-- <div class="d-flex flex-row  pr-4 fmd ">
              <a href="#" class="text-2 hover-text-11 mr-2 "> صفحه اصلی</a>
              <a href="#" class="text-2 hover-text-11 mr-2 "> صفحه اصلی</a>
              <a href="#" class="text-2 hover-text-11 mr-2 "> صفحه اصلی</a>
              <a href="#" class="text-2 hover-text-11 mr-2 "> صفحه اصلی</a>
              <a href="#" class="text-2 hover-text-11 mr-2 "> صفحه اصلی</a>

          </div> -->
          <?php

          $arg_main_top_menu = array(
            'menu_class'        => "d-flex flex-row  pr-4 fmd ha-list-style-none",
            'menu_id'           => "",
            'container'         => "div",
            'container_class'   => "d-flex",
            'container_id'      => "maintopmenu",
            'before'            => '',
            'after'             => "",
            'link_before'       => "<span class='text-2 hover-text-11 mr-2'>",
            'link_after'        => "</span>",
            'theme_location'    => "top_main_menu",

          );

          wp_nav_menu( $arg_main_top_menu );

           ?>



          <div class="col-4">
            <form class="ha-top-search " action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET" role="search">

                <input type="search"  class="textinput btn text-right" placeholder="عنوان سرچ خود را وارد کنید" value="<?php echo get_search_query(); ?>" name="s">
                <button type="submit" name="button" class="submitinput btn bg-1 hover-bg-4">
                    <i class="fa fa-search "></i>
                </button>

            </form>
          </div>

      </nav>
