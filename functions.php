<?php
require_once("lib/helper_functions.php");
require_once("lib/admin/option.php");
require_once("lib/ajax/saveComment.php");


//register menu place
add_action('init', 'ha_register_menu');
function ha_register_menu(){
  $arg = array(
      "phone-number-menu" => __("منو شماره تلفن"),
      "top_main_menu" => __("منو اصلی"),

  );
  register_nav_menus($arg);

}
// post per page


// add thme suport coustem logo to theme
$custom_logo_arg = array(
    'height'      => 50,
    'width'       => 50,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
);
// add_theme_support();

add_theme_support( 'custom-logo' );

add_theme_support( 'post-thumbnails' );
add_theme_support('custom-fields');

add_theme_support('custom-header-uploads');

//add post type support
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'page', 'custom-fields');
add_post_type_support( 'product', 'custom-header-uploads');

add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


add_action( 'widgets_init', 'ha_sidebar_init' );

function ha_sidebar_init() {

  register_sidebar( array(
        'name' => __( 'footer-1' ),
        'id' => 'footer1',
        'description' => __('نمایش در قسمت اول پابرگ سایت'),
        ) );

  register_sidebar( array(
        'name' => __( 'footer-2' ),
        'id' => 'footer2',
        'description' => __(" نمایش در قسمت دوم پابرگ"),
        ) );

  register_sidebar( array(
        'name' => __( 'footer-3' ),
        'id' => 'footer3',
        'description' => __('نمایش در قسمت سوم پابرگ'),
        ) );


  register_sidebar( array(
        'name' => __( 'home page' ),
        'id' => 'homepage',
        'description' => __('نمایش در صفحه اصلی سایت '),
        ) );

  register_sidebar( array(
        'name' => __( 'products page' ),
        'id' => 'productspage',
        'description' => __('جهت نمایش در برگه محصولات '),
        ) );
   register_sidebar( array(
        'name' => __( 'product tax page' ),
        'id' => 'producttaxpage',
        'description' => __('جهت نمایش در برگه محصولات برچسب ها '),
        ) );
    register_sidebar( array(
        'name' => __( 'weblog page' ),
        'id' => 'weblogpage',
        'description' => __('جهت نمایش در برگه محصولات '),
                                    ) );
register_sidebar( array(
        'name' => __( 'weblog single page' ),
        'id' => 'weblogsinglepage',
        'description' => __('جهت نمایش در برگه محصولات '),
                              ) );

}





//register widget

ha_add_widget("slider_baner");
ha_add_widget("slider_cat");
ha_add_widget("category_show");
ha_add_widget("categorylist");
ha_add_widget("slider_weblog");
ha_add_widget("aboutus");
ha_add_widget("footer_aboutus");
ha_add_widget("footer_contactus");
ha_add_widget("sidebarCat");
ha_add_widget("showParent");
ha_add_widget("sidebarCatChalid");



 ?>
