<?php
add_theme_support( 'post-thumbnails' );

 //=============Enable support for Post Formats==========
add_theme_support('post-formats', array('gallery', 'image', 'video','tags', 'link'));

  //============= Dynamic Search Form==============
add_theme_support('html5',array('search-form'));

//======== Custom Logo & Size ===========
add_theme_support( 'custom-logo');

function hasan_custom_logo_setup() {
 $defaults = array(
 'height'      => 50,
 'width'       => 180,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'hasan_custom_logo_setup' );


//======== Single Image Size ===========
add_image_size( 'single-image', 400, 250, true );


//======== Most Popular Post View Count ===========
function count_post_visits() {
   if( is_single() ) {
      global $post;
      $views = get_post_meta( $post->ID, 'my_post_viewed', true );
      if( $views == '' ) {
         update_post_meta( $post->ID, 'my_post_viewed', '1' );
      } else {
         $views_no = intval( $views );
         update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
      }
   }
}
add_action( 'wp_head', 'count_post_visits' );

