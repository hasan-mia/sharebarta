<?php
// ======Add Style & Css======
include_once('inc/enque.php');

// ======Theme Suppot======
include_once('inc/theme-support.php');

// ======Custom Post Suppot======
include_once('inc/custom-post.php');

// ======Bangla Date & Time Suppot======
include_once('inc/bnTime.php');

// ====== Bootstrap Nav Menu======
include_once('inc/nav-menu.php');

// ====== All Widgets======
include_once('inc/all-widgets.php');

include_once('inc/custom-widgets.php');

// ====== Auto add featured image======
function auto_set_featured_image() {
   global $post;
   $featured_image_exists = has_post_thumbnail($post->ID);
      if (!$featured_image_exists)  {
         $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
         if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {set_post_thumbnail($post->ID, $attachment_id);}
         }
      }
}
add_action('the_post', 'auto_set_featured_image');

//=============Remove Default Comment Website link Fields =========
 function remove_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
 }

add_filter('comment_form_default_fields', 'remove_url_field');

// ===========Remove main comment text area=======
// function remomove_comment_field_to_bottom( $fields ) {
// $comment_field = $fields['comment'];
// unset( $fields['comment'] );
// return $fields;
// }
// add_filter( 'comment_form_fields', 'remomove_comment_field_to_bottom' );


//=============Remove Defalult Comment Text Area  =========

function placeholder_comment_form_fields($fields) {
    $replace_author = __('Your Name', 'আপনার নাম');
    $replace_email = __('Your Email', 'আপনার ইমেইল দিন');
    // $replace_url = __('Your Website', 'আপনার ওয়েবসাইট');
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'নাম', 'yourdomain' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" placeholder="আপনার নাম" value="' . esc_attr( $commenter['comment_author'] ) . '" size="28"' . $aria_req . ' /></p>';

    $fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'ইমেইল', 'yourdomain' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" name="email" type="text" placeholder="আপনার ইমেইল" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="28"' . $aria_req . ' /></p>';

    // $fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'ওয়েবসাইট', 'yourdomain' ) . '</label>' .
    // '<input id="url" name="url" type="text" placeholder="'.$replace_url.'" value="' . esc_attr( $commenter['comment_author_url'] ) .
    // '" size="30" /></p>';

    return $fields;
}
add_filter('comment_form_default_fields','placeholder_comment_form_fields');

function comment_text_area_placeholder( $args ) {
	$args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="আপনার মতামত এখানে লিখুন..."', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'comment_text_area_placeholder' );


//================= Add External Link to Featured Image with Custom Field==================
add_filter('post_thumbnail_html','add_external_link_on_page_post_thumbnail',10);
    function add_external_link_on_page_post_thumbnail( $html ) {
    if( is_singular() ) {
            global $post;
            $name = get_post_meta($post->ID, 'ExternalUrl', true);
            if( $name ) {
                    $html = '<a href="' . ( $name ) . '" target="_blank" >' . $html . '</a>';
            }
    }
    return $html;
}

// =========Number of Post in Category Page=======
function category_page_post_number_query( $query ) {
if ( $query->is_category() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', 30 );
    }
}
add_action( 'pre_get_posts', 'category_page_post_number_query' );

// =========Number of Post in Archive Page=======
function archive_page_post_number_query( $query ) {
if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', 99 );
    }
}
add_action( 'pre_get_posts', 'archive_page_post_number_query' );

// =========Number of Post in Search Page=======
function search_page_post_number_query( $query ) {
if ( $query->is_search() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'search_page_post_number_query' );

// =========Remove Wp Automatic Menu From Editor=======

function remove_wpm_menu_items_from_editor() {
    if( !current_user_can( 'administrator' ) ):
        remove_menu_page( 'edit.php?post_type=wp_automatic' );
    endif;
}
add_action( 'admin_menu', 'remove_wpm_menu_items_from_editor' );

// =========Remove First Image =======

// function removeFirstImgTag($post_id) {
//   $post = get_post($post_id);
//   $content = $post->post_content;
//   preg_match('<img([\w\W]+?)/>', $content, $matches);
//   $content = str_replace($matches[0][0], '', $content);

//   wp_update_post(array(
//     'ID'            => $post_id,
//     'post_content'  => $content,
//   ));
// }
// add_filter( 'the_content', 'removeFirstImgTag' );

// function catch_that_image() {
//   global $post, $posts;
//   $first_img = '';
//   ob_start();
//   ob_end_clean();
//   $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
//   $first_img = $matches [1] [0];

//   if(empty($first_img)){ //Defines a default image
//     $first_img = "/images/default.jpg";
//   }
//   return $first_img;
// }

// =========Remove First Image =======

//======== Add Font Awesome ===========
//======== Add Font Awesome ===========
add_action( 'wp_enqueue_scripts', 'crunchify_enqueue_fontawesome' );
function crunchify_enqueue_fontawesome() {
        wp_enqueue_style('crunchify-font-awesome', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css?ver=5.7');
}


