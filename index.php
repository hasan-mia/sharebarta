<?php get_header(); ?>
<!-- =======================
        Main Body Section
    ======================== -->
<div class="container">

  <!-- =====================
        highlights Ads
   ========================= -->

  <div class="col-md-12 col-sm-12 col-12 gx">
    <!-- Start Ads -->
    <div class="pb-2">
      <div class="row">
        <?php
                  // the query
                  $the_category = new WP_Query( array(
                    'post_type' => 'ads',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'type' => 'top-three',
                  ));
                  ?>
        <?php if ( $the_category->have_posts()) : ?>
        <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
        <?php $url= get_post_meta($post->ID, 'ads-link', true); ?>
        <div class="col-md-4 col-sm-12 col-12">
          <a href="<?php echo esc_url($url) ?>" target="_blank"><?php the_post_thumbnail();?></a>
        </div>
        <?php endwhile; endif; wp_reset_postdata();?>
      </div>
    </div>
    <!-- end ads -->
  </div>
  <section id="top-three">
    <div class="container">
      <div class="row">
        <?php
         $related = new WP_Query(array(
           'category_name' => 'top-three',
           'posts_per_page' => 3,
           'offset' => 0,  
             ));
             ?>

        <?php if ( $related->have_posts() ) : ?>
        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
        <div class="col-md-4 col-sm-12 col-12">
          <div class="box-style">
            <div class="box-right">
              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
              </h2>
              <p>
                <span>
                  <i class="fas fa-arrow-right"></i>
                  <a class="author-name"
                    href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?>
                    :</a>
                </span>
                <?php echo wp_trim_words( get_the_content(), 10);?>
              </p>
            </div>
            <div class="box-left">
              <?php the_post_thumbnail();?>
            </div>
          </div>
        </div>
        <!-- end column-->
        <?php  endwhile; else : endif;wp_reset_postdata(); ?>
      </div>
      <!--end row-->
      <div>
  </section>
  <!-- end top three -->

  <!-- ====Uniq Custom Null Lead News Query=== -->
  <?php
      // the query
      $lead_news = new WP_Query( array(
        'category_name' => 'main-news',
        'posts_per_page' => 3,
      ));
       if ( $lead_news->have_posts()){
             $posts = $lead_news->the_post();
             $lead[] = $post->ID;
       }
       else {
         echo " ";
       }
      
    ?>
  <!-- End custom uniq Query -->
  <!-- Lead Section -->
  <!-- ========Body Part======= -->
  <section>
    <div class="lead-sec">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-12">
          <!-- Start One-Bottom-Box -->
          <div class="lead-first-content" id="lead-sec-main">
            <!-- Start Cat First Content -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-12">
                <?php
                    // the query
                    $the_category = new WP_Query( array(
                      'category_name' => 'main-news',
                      'posts_per_page' => 1,
                      'offset' => 0,
                    ));
                    ?>
                <?php if ( $the_category->have_posts()) : ?>
                <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
                <?php  $lead[] = $post->ID; ?>
                <div class="first-content" id="lead-img">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                  <div class="bg">
                  <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                  <p><?php echo wp_trim_words( get_the_content(), 20, '...' );?> </p>
                  </div>
                </div>

                <?php endwhile; endif; wp_reset_postdata();?>
                <!-- end main content -->
              </div>
              <!-- End column -->
            </div>
            <!-- End row -->
          </div>
          <!-- End Main lead News -->

          <div class="row ml-2 mt-1" id="lead-sec-bottom">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <!-- Start One-Bottom-Box -->
              <div class="one-bottom-box">
                <!-- Start Cat First Content -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-12">
                    <?php
                          // the query
                          $the_category = new WP_Query( array(
                            'category_name' => 'main-news',
                              'posts_per_page' => 1,
                              'offset' => 0,
                              'post__not_in'  =>  $lead,
                          ));
                          ?>

                    <?php if ( $the_category->have_posts()) : ?>
                    <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
                    <?php  $lead[] = $post->ID; ?>
                    <div class="box-style">
                      <div class="box-right">
                        <h2><a href="<?php the_permalink(); ?>"
                            title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                      </div>
                      <div class="box-left">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                      </div>
                      <div>

                      </div>
                    </div>
                    <?php endwhile;  endif; wp_reset_postdata(); ?>
                    <!-- End box style -->
                  </div>
                  <!-- End column -->
                </div>
                <!-- End row -->
              </div>
              <!-- end 2nd col -->
            </div>
            <!-- end column -->

            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <!-- Start One-Bottom-Box -->
              <div class="one-bottom-box">
                <!-- Start Cat First Content -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-12">
                    <?php
                          // the query
                          $the_category = new WP_Query( array(
                            'category_name' => 'main-news',
                              'posts_per_page' => 1,
                              'offset' => 0,
                              'post__not_in'  =>  $lead,
                          ));
                          ?>

                    <?php if ( $the_category->have_posts()) : ?>
                    <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
                    <?php  $lead[] = $post->ID; ?>
                    <div class="box-style">
                      <div class="box-right">
                        <h2><a href="<?php the_permalink(); ?>"
                            title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                      </div>
                      <div class="box-left">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                      </div>
                      <div>

                      </div>
                    </div>
                    <?php endwhile;  endif; wp_reset_postdata(); ?>
                    <!-- End box style -->
                  </div>
                  <!-- End column -->
                </div>
                <!-- End row -->
              </div>
              <!-- end 2nd col -->
            </div>
            <!-- end column -->

          </div>

        </div>
        <!-- end lead middle col -->

        <div class="col-lg-3 col-md-12 col-12">
          <div class="one-bottom-box my-1" id="lead-sec-right">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <?php
                    // the query
                    $the_category = new WP_Query( array(
                      'category_name' => 'top-news',
                      'posts_per_page' => 6,
                      'offset' => 0,
                      'post__not_in'  =>  $lead,
                    ));
                    if($the_category->have_posts()):
                    while ($the_category->have_posts() ):$the_category->the_post();
                    ?>
                <?php  $slider4[] = $post->ID; ?>
                <div class="box-style">

                  <div class="box-left">
                    <h2><a href="<?php the_permalink(); ?>"
                        title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                  </div>

                  <div class="box-right">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                  </div>

                </div>

                <?php endwhile;  endif; wp_reset_postdata();?>
                <!-- End box style -->

              </div>
              <!-- End column -->
            </div>
            <!-- End row -->
          </div>
        </div>
        <!-- end 3rd col -->
      </div>
      <!-- end row -->
      <!-- End lead div -->
      <!-- end row -->
  </section>
  <!-- End Lead Section -->
  <!-- =========================
      Price Sensitive Parts
  ============================-->
  <section id="price-sensitive-part">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12">
        <!-- Start Ads -->
        <div class="px-1 py-2">
          <div class="row">
            <?php
                  // the query
                  $the_category = new WP_Query( array(
                    'post_type' => 'ads',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'type' => 'national-politics',
                  ));
                  ?>
            <?php if ( $the_category->have_posts()) : ?>
            <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
            <?php $url= get_post_meta($post->ID, 'ads-link', true); ?>
            <div class="col-md-4 col-sm-12 col-12">
              <a href="<?php echo esc_url($url) ?>" target="_blank"><?php the_post_thumbnail();?></a>
            </div>
            <?php endwhile; endif; wp_reset_postdata();?>
          </div>
        </div>
        <!-- end ads -->
      </div>
      <!-- end ads column -->
      <div class="col-md-12 col-sm-12 col-12">
        <div class="one-right-two">
          <div class="content-body">
            <!-- Satrt Category Title -->
            <div class="cat-title">
              <div class="title">
                <h1> জাতীয়-রাজনীতি </h1>
              </div>
              <div class="link">
                <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'national-politics',
                        'posts_per_page' => 1,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      $cats = wp_get_post_categories($post->ID);
                      if($cats) : foreach($cats as $cat) : $category = get_category($cat);endforeach;
                      $cat_lik = get_category_link($category->cat_ID);
                      ?>
                <a href="<?php echo $cat_lik?>">আরও খবর <i class="fas fa-arrow-right"></i></a>
                <?php
                        endif;
                        endwhile;
                      endif;
                      ?>
              </div>
            </div>
            <!-- End cat title -->
            <div class="row">
              <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'national-politics',
                          'posts_per_page' => 6,
                          'offset' => 0,
                          'post__not_in'  =>  $lead,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      ?>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="secound-content">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                  <h2><a href="<?php the_permalink(); ?>"
                      title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                </div>
                <!-- End Column -->
              </div>
              <?php endwhile;  endif; wp_reset_postdata();?>
            </div>
            <!-- End row -->
          </div>
          <!-- end content body -->
        </div>
        <!-- End one right two category -->

        <!--============ Start Category section =============-->
        <section class="category-sec">
          <div class="one-right-two my-2">
            <!-- Start Ads -->
            <div class="px-1 py-2">
              <div class="row">
                <?php
                  // the query
                  $the_category = new WP_Query( array(
                    'post_type' => 'ads',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'type' => 'company-news',
                  ));
                  ?>
                <?php if ( $the_category->have_posts()) : ?>
                <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
                <?php $url= get_post_meta($post->ID, 'ads-link', true); ?>
                <div class="col-md-4 col-sm-12 col-12">
                  <a href="<?php echo esc_url($url) ?>" target="_blank"><?php the_post_thumbnail();?></a>
                </div>
                <?php endwhile; endif; wp_reset_postdata();?>
              </div>
            </div>
            <!-- end ads -->
            <div class="row">
              <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="content-body">
                  <!-- Satrt Category Title -->
                  <div class="cat-title">
                    <div class="title">
                      <h1> কোম্পানি সংবাদ </h1>
                    </div>
                    <div class="link">
                      <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'company-news',
                        'posts_per_page' => 1,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      $cats = wp_get_post_categories($post->ID);
                      if($cats) : foreach($cats as $cat) : $category = get_category($cat);endforeach;
                      $cat_lik = get_category_link($category->cat_ID);
                      ?>
                      <a href="<?php echo $cat_lik?>">আরও খবর <i class="fas fa-arrow-right"></i></a>
                      <?php
                        endif;
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                  <!-- End cat title -->
                  <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 my-2">
                      <?php
                   // the query
                   $the_category = new WP_Query( array(
                     'category_name' => 'company-news',
                      'posts_per_page' => 2,
                      'offset' => 0,
                      'post__not_in'  =>  $lead,
                   ));
                  if($the_category->have_posts()):
                   while ($the_category->have_posts() ):$the_category->the_post();
                   ?>
                      <div class="first-content">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                        <h2><a href="<?php the_permalink(); ?>"
                            title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo wp_trim_words( get_the_content(), 45, '...' );?></p>
                      </div>
                      <?php endwhile;  endif; wp_reset_postdata();?>
                    </div>
                    <!-- End Column -->
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                      <?php
                     // the query
                     $the_category = new WP_Query( array(
                       'category_name' => 'company-news',
                        'posts_per_page' => 9,
                        'offset' => 2,
                        'post__not_in'  =>  $lead,
                     ));
                    if($the_category->have_posts()):
                     while ($the_category->have_posts() ):$the_category->the_post();
                     ?>
                      <div class="box-style">
                        <div class="box-right">
                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail()?></a>
                        </div>
                        <div class="box-left">
                          <h2><a href="<?php the_permalink(); ?>"
                              title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                      </div>
                      <?php endwhile;  endif; wp_reset_postdata();?>
                      <!-- End Column -->
                    </div>

                  </div>
                  <!-- End row -->
                </div>
                <!-- end content body -->
              </div>
              <!-- end column -->
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <!-- Satrt Category Title -->
                <div class="cat-title">
                  <div class="title">
                    <h1> পুঁজিবাজারের সর্বশেষ খবর </h1>
                  </div>
                  <div class="link">
                    <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'share-market',
                        'posts_per_page' => 1,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      $cats = wp_get_post_categories($post->ID);
                      if($cats) : foreach($cats as $cat) : $category = get_category($cat);endforeach;
                      $cat_lik = get_category_link($category->cat_ID);
                      ?>
                    <a href="<?php echo $cat_lik?>">আরও খবর <i class="fas fa-arrow-right"></i></a>
                    <?php
                        endif;
                        endwhile;
                      endif;
                      ?>
                  </div>
                </div>
                <!-- End cat title -->

                <?php
                        // the query
                        $the_category = new WP_Query( array(
                          'category_name' => 'share-market',
                            'posts_per_page' => 12,
                            'offset' => 0,
                            'post__not_in'  =>  $lead,
                        ));
                        if($the_category->have_posts()):
                        while ($the_category->have_posts() ):$the_category->the_post();
                        ?>
                <li class="link-list"> <i class="fas fa-arrow-right"></i> <a href="<?php the_permalink(); ?>"
                    title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile;  endif; wp_reset_postdata();?>

                <?php dynamic_sidebar('home-sidebar');?>

              </div>
              <!--  end column -->
              <div>
                <!-- row -->
              </div>
              <!-- End one right two category -->
        </section>
        <!-- end category section -->

        <!--============ Start Category section =============-->
        <section class="category-sec">
          <div class="one-right-two my-2">
            <!-- Start Ads -->
            <div class="px-1 py-2">
              <div class="row">
                <?php
                  // the query
                  $the_category = new WP_Query( array(
                    'post_type' => 'ads',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'type' => 'exclusive',
                  ));
                  ?>
                <?php if ( $the_category->have_posts()) : ?>
                <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
                <?php $url= get_post_meta($post->ID, 'ads-link', true); ?>
                <div class="col-md-4 col-sm-12 col-12">
                  <a href="<?php echo esc_url($url) ?>" target="_blank"><?php the_post_thumbnail();?></a>
                </div>
                <?php endwhile; endif; wp_reset_postdata();?>
              </div>
            </div>
            <!-- end ads -->
            <div class="row">
              <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="content-body">
                  <!-- Satrt Category Title -->
                  <div class="cat-title">
                    <div class="title">
                      <h1> এক্সক্লুসিভ </h1>
                    </div>
                    <div class="link">
                      <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'exclusive',
                        'posts_per_page' => 1,
                        'offset' => 0,
                        'post__not_in'  =>  $lead,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      $cats = wp_get_post_categories($post->ID);
                      if($cats) : foreach($cats as $cat) : $category = get_category($cat);endforeach;
                      $cat_lik = get_category_link($category->cat_ID);
                      ?>
                      <a href="<?php echo $cat_lik?>">আরও খবর <i class="fas fa-arrow-right"></i></a>
                      <?php
                        endif;
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                  <!-- End cat title -->
                  <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12 col-12 my-2">
                      <?php
                   // the query
                   $the_category = new WP_Query( array(
                     'category_name' => 'exclusive',
                      'posts_per_page' => 1,
                      'offset' => 0,
                      'post__not_in'  =>  $lead,
                   ));
                  if($the_category->have_posts()):
                   while ($the_category->have_posts() ):$the_category->the_post();
                   ?>
                      <div class="first-content">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                        <h2><a href="<?php the_permalink(); ?>"
                            title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo wp_trim_words( get_the_content(), 75, '...' );?></p>
                      </div>
                      <?php endwhile;  endif; wp_reset_postdata();?>
                    </div>
                    <!-- End Column -->
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                      <?php
                     // the query
                     $the_category = new WP_Query( array(
                       'category_name' => 'exclusive',
                        'posts_per_page' => 5,
                        'offset' => 1,
                        'post__not_in'  =>  $lead,
                     ));
                    if($the_category->have_posts()):
                     while ($the_category->have_posts() ):$the_category->the_post();
                     ?>
                      <div class="box-style">
                        <div class="box-right">
                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail()?></a>
                        </div>
                        <div class="box-left">
                          <h2><a href="<?php the_permalink(); ?>"
                              title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                      </div>
                      <?php endwhile;  endif; wp_reset_postdata();?>
                      <!-- End Column -->
                    </div>

                  </div>
                  <!-- End row -->
                </div>
                <!-- end content body -->
              </div>
              <!-- end column -->
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <!-- Satrt Category Title -->
                <div class="cat-title">
                  <div class="title">
                    <h1> বিনোদন </h1>
                  </div>
                  <div class="link">
                    <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'entertainment',
                        'posts_per_page' => 1,
                        'offset' => 0,
                        'post__not_in'  =>  $lead,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      $cats = wp_get_post_categories($post->ID);
                      if($cats) : foreach($cats as $cat) : $category = get_category($cat);endforeach;
                      $cat_lik = get_category_link($category->cat_ID);
                      ?>
                    <a href="<?php echo $cat_lik?>">আরও খবর <i class="fas fa-arrow-right"></i></a>
                    <?php
                        endif;
                        endwhile;
                      endif;
                      ?>
                  </div>
                </div>
                <!-- End cat title -->
                <div class="one-bottom-box" id="cat-sec-right">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                      <?php
                    // the query
                    $the_category = new WP_Query( array(
                      'category_name' => 'entertainment',
                      'posts_per_page' => 5,
                      'offset' => 1,
                      'post__not_in'  =>  $lead,
                    ));
                    if($the_category->have_posts()):
                    while ($the_category->have_posts() ):$the_category->the_post();
                    ?>
                      <?php  $slider4[] = $post->ID; ?>
                      <div class="box-style">

                        <div class="box-left">
                          <h2><a href="<?php the_permalink(); ?>"
                              title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="box-right">
                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                        </div>

                      </div>

                      <?php endwhile;  endif; wp_reset_postdata();?>
                      <!-- End box style -->

                    </div>
                    <!-- End column -->
                  </div>
                  <!-- End row -->
                </div>


              </div>
              <!--  end column -->
              <div>
                <!-- row -->
              </div>
              <!-- End one right two category -->
        </section>
        <!-- end category section -->

        <!--============ Start Category section =============-->
        <section class="category-sec">
          <div class="one-right-two my-2">
            <!-- Start Ads -->
            <div class="px-1 py-2">
              <div class="row">
                <?php
                  // the query
                  $the_category = new WP_Query( array(
                    'post_type' => 'ads',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'type' => 'গুজব',
                  ));
                  ?>
                <?php if ( $the_category->have_posts()) : ?>
                <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
                <?php $url= get_post_meta($post->ID, 'ads-link', true); ?>
                <div class="col-md-4 col-sm-12 col-12">
                  <a href="<?php echo esc_url($url) ?>" target="_blank"><?php the_post_thumbnail();?></a>
                </div>
                <?php endwhile; endif; wp_reset_postdata();?>
              </div>
            </div>
            <!-- end ads -->
            <div class="row">
              <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="content-body">
                  <!-- Satrt Category Title -->
                  <div class="cat-title">
                    <div class="title">
                      <h1> গুজব </h1>
                    </div>
                    <div class="link">
                      <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'গুজব',
                        'posts_per_page' => 1,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      $cats = wp_get_post_categories($post->ID);
                      if($cats) : foreach($cats as $cat) : $category = get_category($cat);endforeach;
                      $cat_lik = get_category_link($category->cat_ID);
                      ?>
                      <a href="<?php echo $cat_lik?>">আরও খবর <i class="fas fa-arrow-right"></i></a>
                      <?php
                        endif;
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                  <!-- End cat title -->
                  <div class="row">
                    <div class="col-md-8 col-sm-12 col-12 my-2">
                      <?php
                        // the query
                        $the_category = new WP_Query( array(
                          'category_name' => 'গুজব',
                            'posts_per_page' => 1,
                            'offset' => 0,
                            'post__not_in'  =>  $lead,
                        ));
                        if($the_category->have_posts()):
                        while ($the_category->have_posts() ):$the_category->the_post();
                        ?>
                      <div class="first-content">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                        <h2><a href="<?php the_permalink(); ?>"
                            title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo wp_trim_words( get_the_content(), 55, '...' );?></p>
                      </div>
                      <?php endwhile;  endif; wp_reset_postdata();?>
                    </div>
                    <!-- End Column -->
                    <div class="col-md-4 col-sm-12 col-12">
                      <?php
                     // the query
                     $the_category = new WP_Query( array(
                       'category_name' => 'গুজব',
                        'posts_per_page' => 5,
                        'offset' => 1,
                        'post__not_in'  =>  $lead,
                     ));
                    if($the_category->have_posts()):
                     while ($the_category->have_posts() ):$the_category->the_post();
                     ?>
                      <div class="box-style">
                        <div class="box-right">
                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail()?></a>
                        </div>
                        <div class="box-left">
                          <h2><a href="<?php the_permalink(); ?>"
                              title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                      </div>
                      <?php endwhile;  endif; wp_reset_postdata();?>
                      <!-- End Column -->
                    </div>

                  </div>
                  <!-- End row -->
                </div>
                <!-- end content body -->
              </div>
              <!-- end column -->
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <!-- Satrt Category Title -->
                <div class="cat-title">
                  <div class="title">
                    <h1> সোশ্যাল মিডিয়া </h1>
                  </div>
                  <div class="link">
                    <?php
                      // the query
                      $the_category = new WP_Query( array(
                        'category_name' => 'social-media',
                        'posts_per_page' => 1,
                        'post__not_in'  =>  $lead,
                      ));
                      if($the_category->have_posts()):
                      while ($the_category->have_posts() ):$the_category->the_post();
                      $cats = wp_get_post_categories($post->ID);
                      if($cats) : foreach($cats as $cat) : $category = get_category($cat);endforeach;
                      $cat_lik = get_category_link($category->cat_ID);
                      ?>
                    <a href="<?php echo $cat_lik?>">আরও খবর <i class="fas fa-arrow-right"></i></a>
                    <?php
                        endif;
                        endwhile;
                      endif;
                      ?>
                  </div>
                </div>
                <!-- End cat title -->
                <div class="one-bottom-box" id="cat-sec-right">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                      <?php
                    // the query
                    $the_category = new WP_Query( array(
                      'category_name' => 'social-media',
                      'posts_per_page' => 5,
                      'offset' => 0,
                      'post__not_in'  =>  $lead,
                    ));
                    if($the_category->have_posts()):
                    while ($the_category->have_posts() ):$the_category->the_post();
                    ?>
                      <?php  $slider4[] = $post->ID; ?>
                      <div class="box-style">

                        <div class="box-left">
                          <h2><a href="<?php the_permalink(); ?>"
                              title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="box-right">
                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                        </div>

                      </div>

                      <?php endwhile;  endif; wp_reset_postdata();?>
                      <!-- End box style -->

                    </div>
                    <!-- End column -->
                  </div>
                  <!-- End row -->
                </div>


              </div>
              <!--  end column -->
              <div>
                <!-- row -->
              </div>
              <!-- End one right two category -->
        </section>
        <!-- end category section -->


      </div>
      <!-- end column -->
    </div>
    <!-- end row -->
  </section>
  <!-- end price sensitive section -->

</div>
<!-- End Whole Body Container Section -->
<?php get_footer(); ?>