<?php
// Frontend Script

function deshprotikhon_frontend_enque() {
   wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css',false,'4.4.1','all');
   wp_enqueue_style( 'fontawesome_css', get_template_directory_uri() . '/css/fontawesome.min.css',false,'5.9.0','all');
   wp_enqueue_style( 'font_rupushibangla_css', get_template_directory_uri() . '/fonts/rupushibangla.css',false,'1.0','all');
   wp_enqueue_style( 'style_css', get_template_directory_uri() . '/css/custom.css',false,'1.0','all');
   wp_enqueue_style( 'responsive_css', get_template_directory_uri() . '/css/responsive.css',false,'1.0','all');


   wp_enqueue_style('bootstrap_css');
   wp_enqueue_style('fontawesome_css');
   wp_enqueue_style('font_rupushibangla_css');
   wp_enqueue_style('style_css');
   wp_enqueue_style('responsive_css');


	// <!--========jquery=========-->
  // Upload Image Script
  wp_enqueue_media();
	// wp_deregister_script('jquery');
	wp_enqueue_script( 'proper_js', get_template_directory_uri() . '/js/jquery-3.4.1.slim.min.js',array(),'3.4.1',true);
	wp_enqueue_script( 'proper_js', get_template_directory_uri() . '/js/proper.min.js',array(),'null',true);
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js',array(),'4.4.1',true);
	wp_enqueue_script( 'fontawesome_js', get_template_directory_uri() . '/js/fontawesome.min.js',array(),'5.9.0',true);
	wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/js/jquery.min.js',array(),'5.9.0',true);
	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/custom.js',array(),'1.0',true);
  wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/js/admin.js',array('jquery'),'1.0.0',true);


}
add_action( 'wp_enqueue_scripts', 'deshprotikhon_frontend_enque');

// Admin Script
//
// function sharebazarnews_frontend_enque() {
//
//   // Upload Image Script
//   wp_enqueue_media();
// 	// wp_deregister_script('jquery');
// 	wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/js/admin.js',array('jquery'),'1.0.0',true);
//
// }
// add_action( 'admin_enqueue_scripts', 'sharebazarnews_frontend_enque');
