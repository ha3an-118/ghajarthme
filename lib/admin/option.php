<?php
// Hook for adding admin menus
/** Step 2 (from text above). */
require_once("form_print.php");
add_action( 'admin_menu', 'my_menu' );

/** Step 1. */
function my_menu() {
    add_theme_page(
        'Ha ThemeSeting',
        'Ha Menu',
        'manage_options',
        'ha-unique-identifier',
        'ha_themeoption'
    );
}

/** Step 3. */
function ha_themeoption() {
    if ( !current_user_can( 'manage_options' ) ) {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    $option_flag = get_option("haThemeOptionFlag");
    if(empty($option_flag)):
      ha_set_default_option();
      add_option("haThemeOptionFlag","up");
    endif;
    if(isset($_POST["submit"])):
      ha_update_option();
    endif;
    ha_print_admin_form();
}

 ?>
