<?php
//================ Add Multiple sidebar Section ===================
function hasan_widgets_ini() {
  register_sidebar( array(
    'name'          => __( 'Ads In Top Header', 'textdomain' ),
    'id'            => 'main-header-ads',
    'description'   => __( 'Show Ads in Main Header Top Section', 'textdomain' ),
    'before_widget' => '<div class="main-header-ads">',
    'after_widget'  => '</div>',
) );
// ========Main Header Ads======

register_sidebar( array(
  'name'          => __( 'Main Header Social', 'textdomain' ),
  'id'            => 'main-social',
  'description'   => __( 'Header Right Social Column..', 'textdomain' ),
  'before_widget' => '<div class="header-social float-right">',
  'after_widget'  => '</div>',
) );
// ========Main Social Column ======
  
  //  register_sidebar( array(
  //   'name'          => __( 'Epaper Sidebar', 'textdomain' ),
  //   'id'            => 'epaper-sidebar',
  //   'description'   => __( 'Customize Your Home Page Right Sidebar...', 'textdomain' ),
  //   'before_widget' => '<div class="epapaer-content my-3">',
  //   'after_widget'  => '</div>',
  // ) );
  // ========Epaper Sidebar======

  register_sidebar( array(
    'name'          => __( 'Home Page Sidebar', 'textdomain' ),
    'id'            => 'home-sidebar',
    'description'   => __( 'Customize Your Home Page Right Sidebar...', 'textdomain' ),
    'before_widget' => '<div class="main-sidebar my-3">',
    'after_widget'  => '</div>',
  ) );
  // ========Home Page Right Sidebar======

  register_sidebar( array(
    'name'          => __( 'Main Sidebar', 'textdomain' ),
    'id'            => 'main-sidebar',
    'description'   => __( 'Customize Your Main Right Sidebar...', 'textdomain' ),
    'before_widget' => '<div class="main-sidebar my-2">',
    'after_widget'  => '</div>',
  ) );
  // ========Main Right Sidebar======
  
  register_sidebar( array(
    'name'          => __( 'Facebook Page at Bottom', 'textdomain' ),
    'id'            => 'facebook-page-bottom',
    'description'   => __( 'Embed your facebook Page at bottom...', 'textdomain' ),
    'before_widget' => '<div class="facebook-page-bottom">',
    'after_widget'  => '</div>',
  ) );
  // ========Single Left Sidebar Ads======
  
  register_sidebar( array(
    'name'          => __( 'Single Page Right Sidebar', 'textdomain' ),
    'id'            => 'single-right-sidebar',
    'description'   => __( 'Customize Your Main Right Sidebar...', 'textdomain' ),
    'before_widget' => '<div class="main-sidebar my-2">',
    'after_widget'  => '</div>',
  ) );
  // ========Single Right Sidebar======

  // register_sidebar( array(
  //   'name'          => __( 'Top Left Footer Column', 'textdomain' ),
  //   'id'            => 'top-left-footer',
  //   'description'   => __( 'Top Left Side Footer Column in Footer..', 'textdomain' ),
  //   'before_widget' => '<div class="footer-widget">',
  //   'after_widget'  => '</div>',
  // ) );
  // ========Top First Footer Column ======

  // register_sidebar( array(
  //   'name'          => __( 'Top Right Footer Column', 'textdomain' ),
  //   'id'            => 'top-right-footer',
  //   'description'   => __( 'Top Right Side Footer Column in Footer..', 'textdomain' ),
  //   'before_widget' => '<div class="footer-widget">',
  //   'after_widget'  => '</div>',
  // ) );
  // ========Top Secound Footer Column ======

  register_sidebar( array(
    'name'          => __( 'Main Footer Left Side Column', 'textdomain' ),
    'id'            => 'main-left-footer',
    'description'   => __( 'Main Footer Left Side Column..', 'textdomain' ),
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
  ) );
  // ========Main Footer Left Column ======

  register_sidebar( array(
    'name'          => __( 'Main Footer Right Side Column', 'textdomain' ),
    'id'            => 'main-right-footer',
    'description'   => __( 'Main Footer Right Side Column..', 'textdomain' ),
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
  ) );
  // ========Main Footer Right Column ======

  register_sidebar( array(
    'name'          => __( 'Copyright Section', 'textdomain' ),
    'id'            => 'footer-copyright',
    'description'   => __( 'Add our copyright text here..', 'textdomain' ),
    'before_widget' => '<div class="text-center copyright">',
    'after_widget'  => '</div>',
  ) );
  // ========Copyright Footer Column======

    // register_sidebar( array(
  //   'name'          => __( 'First Footer Column', 'textdomain' ),
  //   'id'            => 'footer-first',
  //   'description'   => __( 'Left Column in Footer..', 'textdomain' ),
  //   'before_widget' => '<div class="footer-logo">',
  //   'after_widget'  => '</div>',
  // ) );
  // // ========First Footer Column ======

  // register_sidebar( array(
  //   'name'          => __( 'Secound Footer Column', 'textdomain' ),
  //   'id'            => 'footer-secound',
  //   'description'   => __( 'Left-Midle Column in Footer...', 'textdomain' ),
  //   'before_widget' => '<div class="footer-text">',
  //   'after_widget'  => '</div>',
  // ) );
  // // ========Secound Footer Column======

  // register_sidebar( array(
  //   'name'          => __( 'Third Footer Column', 'textdomain' ),
  //   'id'            => 'footer-third',
  //   'description'   => __( 'Right-Middle Column in Footer..', 'textdomain' ),
  //   'before_widget' => '<div class="footer-text">',
  //   'after_widget'  => '</div>',
  // ) );
  // // ========Third Footer Column======

  // register_sidebar( array(
  //   'name'          => __( 'Fourth Footer Column', 'textdomain' ),
  //   'id'            => 'footer-fourth',
  //   'description'   => __( 'Right Column in Footer..', 'textdomain' ),
  //   'before_widget' => '<div class="footer-app">',
  //   'after_widget'  => '</div>',
  // ) );
  // // ========Fourth Footer Column======



}
add_action( 'widgets_init', 'hasan_widgets_ini' );