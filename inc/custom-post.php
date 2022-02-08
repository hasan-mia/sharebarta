<?php

/*
==========================================
 Custom Post Type
==========================================
*/

function hasan_custom_post_type (){

	$labels = array(
		'name' => 'Ads',
		'singular_name' => 'Ad',
		'add_new' => 'Add Ads',
		'all_items' => 'All Ads',
		'add_new_item' => 'Add Type',
		'edit_item' => 'Edit Type',
		'new_item' => 'New Type',
		'view_item' => 'View Type',
		'search_item' => 'Search Ads',
		'not_found' => 'No Ads found',
		'not_found_in_trash' => 'No Ads found in trash',
		'parent_item_colon' => 'Parent Ads'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
        'show_in_nav_menus'  => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-table-row-after',
		'supports' => array(
			'title',
      'thumbnail',
      'custom-fields',
			// 'editor',
			// 'excerpt',
			// 'revisions',
		),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('ads',$args);
}
add_action('init','hasan_custom_post_type');

function hasan_custom_taxonomies() {

	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Ads Category',
		'singular_name' => 'Category',
		'search_items' => 'Search Category',
		'all_items' => 'All Category',
		'parent_item' => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'edit_item' => 'Edit Category',
		'update_item' => 'Update Category',
		'add_new_item' => 'Add New Ads Category',
		'new_item_name' => 'New Ads Category Name',
		'menu_name' => 'Ads Category'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
        'public'        => true,
        'publicly_queryable'  => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'type' )
	);

	register_taxonomy('type', array('ads'), $args);

	//add new taxonomy NOT hierarchical

}

add_action( 'init' , 'hasan_custom_taxonomies' );

// =========Wp Post Order in Dashboard=======

function custom_post_types_admin_order( $wp_query ) {
  if (is_admin()) {

    // Get the post type from the query
    $post_type = $wp_query->query['post_type'];

    if ( $post_type == 'ads') {

      $wp_query->set('orderby', 'date');

      $wp_query->set('order', 'DESC');
    }
  }
}
add_filter('pre_get_posts', 'custom_post_types_admin_order');

// =========Remove Custom Post Menu From Editor=======

function remove_ads_menu_items_from_editor() {
    if( !current_user_can( 'administrator' ) ):
        remove_menu_page( 'edit.php?post_type=ads' );
    endif;
}
add_action( 'admin_menu', 'remove_ads_menu_items_from_editor' );


//=============Display Custom Post ads on Home page ===========
function display_custom_post_types($query) {
    if ( is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'page', 'ads' ) );
    }
    return $query;
}
add_action('pre_get_posts', 'display_custom_post_types');

//=============Display Post category page ===========
// $cat = get_category_link( $category_name, $category_id, $category_slug );
$cat_title = single_cat_title();
function posts_in_category($query){
    if ($query->is_category) {
        if (is_category('$cat_title')) {
            $query->set('posts_per_archive_page', 10);
        }
        
    }

}
add_filter('pre_get_posts', 'posts_in_category');