<?php
// ======Navigation Menu Register ===========
function sharebazar_hasan_menus(){
  register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'Sharebazar Alo' ),
      'usermenu' => __( 'User Menu', 'Sharebazar Alo' ),
      'footermenu' => __( 'Footer Menu', 'Sharebazar Alo' ),
      'socialmenu' => __( 'Social Menu', 'Sharebazar Alo' ),
  ) );
}
add_action( 'init', 'sharebazar_hasan_menus' );

// ====== WP_Bootstrap_Navwalker_v.4======
if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}