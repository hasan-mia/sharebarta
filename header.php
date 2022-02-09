<!DOCTYPE html>
<html <?php language_attributes();?> lang="en" dir="ltr">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
   <?php if(is_front_page() || is_home()){
         echo get_bloginfo('name');
     } else{
         echo wp_title('');
     }?>
 </title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- =======================
             Header Section
    ======================== -->
    <div class="container">
      <div class="row d-flex justify-content-center">
            <div class="main-header-ad">
                <?php dynamic_sidebar('main-header-ads');?>
            </div>
      </div>
    </div>
  <section class="header_wrap">
    <div class="container">
        <!-- End main header ads -->
      <div class="row">

        <div class="col-md-4 col-sm-12 col-12">
          <div class="main-logo">
            <!-- Dynamic Custom Logo-->
            <?php
            if ( has_custom_logo() ) {
                 the_custom_logo();
                }
              else {
                echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
              }
            ?>
          </div>
        </div>
        <!-- End column -->

        <div class="col-md-4 col-sm-12 col-12">
          <div class="head-date">
            <p>
              <?php
              echo ' <i class="fas fa-map-marker-alt"></i> '. 'ঢাকা '. '<i class="fas fa-calendar-alt"></i>'. bn_date(date(' l, d M Y'));
              ?>
            </p>
          </div>
        </div>
          <!-- end column -->
        <div class="col-md-4 col-sm-12 col-12">
                <?php dynamic_sidebar('main-social');?>
          </div>
          <!-- End column -->
        </div>
        <!-- End row -->
      </div>
    </div>
    <!-- End Logo -->

  </section>
  <header class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand">
        <?php
          if ( has_custom_logo() ) {
            the_custom_logo();
          }
          else {
            echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
          }
        ?>
        </span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars fa-2x"></span>
        </button>

        <div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
          <?php
          wp_nav_menu( array(
              'theme_location'  => 'primary',
              'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
              'container'       => 'ul',
              'container_class' => 'navbar-nav mr-auto',
              'container_id'    => 'navbarSupportedContent',
              'menu_class'      => 'navbar-nav mr-auto nav-middle',
              'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
              'walker'          => new WP_Bootstrap_Navwalker(),
          ) );
          ?>
          <!-- Search Form -->
          <?php get_search_form(); ?>
        </div>

      </nav>
    </header>
    <!-- End Main Menu -->

    <div class="container">
      <div class="home-page-ads my-2">
        <div class="row">
          <?php
           // the query
           $the_category = new WP_Query( array(
             'post_type' => 'ads',
             'post_status' => 'publish',
             'posts_per_page' => 3,
             'orderby' => 'post_date',
             'order' => 'DESC',
             'type' => 'মেনুবার',
           ));
           ?>
          <?php if ( $the_category->have_posts()) : ?>
          <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
            <!-- Get Custom Field Meta Value -->
          <?php $url= get_post_meta($post->ID, 'custom-link', true); ?>
          <div class="col-md-4 col-sm-12 col-12" id="mbl-left">
            <div class="header-down-ads">
              <a href="<?php echo esc_url($url) ?>" target="_blank"><?php the_post_thumbnail();?></a>
            </div>
          </div>
          <?php endwhile; endif; wp_reset_postdata();?>
        </div>
      </div>
    </div>
  <!-- End Header Section -->