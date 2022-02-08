<?php get_header(); ?>
  <!-- End Header section -->


  <!-- ==================
    Main Section
================== -->
  <div class="container">
    <!-- == Start Main Body Part== -->
    <div class="row">
      <!-- ===================
        Start Main Body Part
      ==================== -->
      <div class="col-md-9 col-sm-12 col-12 my-5">
        <div class="search-result text-center">
          <h1 > আপনার অনুসন্ধানের ফলফলঃ </h1>
        </div>

        <div class="row">
          <!-- start category content -->

          <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <div class="col-md-4 col-sm-12 col-12">
            <div class="cat-content my-1">
              <?php the_post_thumbnail()?>
              <h2><a href="<?php the_permalink(); ?>" title="প্রচ্ছদ"><?php the_title(); ?></a></h2>
            </div>
            <!-- End content -->
          </div>
          <!-- End content column -->
          <?php  endwhile;
        else:  echo "<h2 class='search-error'> দুঃক্ষিত! কোন পোস্ট পাওয়া যায়নি। অনুগ্রহ করে আবার চেষ্টা করুন... </h2>";
          endif;  ?>
        </div>
        <!-- End row -->
      </div>
      <!-- ==End Main Body Part Column Section== -->


      <!-- =============
     Sidebar Section
    ============== -->
      <div class="col-md-3 col-sm-12 col-12 my-4">
        <!-- <div class="asside"> -->
        <!-- =========================
                  Start Tabbar Part
              ============================ -->
        <div class="tab-bar my-4">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="home" aria-selected="true"> সর্বশেষ সংবাদ </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="profile" aria-selected="false">সর্বাধিক পঠিত</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <!-- !st Tab Content -->
            <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="home-tab">
              <div class="tab-news">
                <ul>
                  <?php
                  $latest = new WP_Query( array(
                    'posts_per_page' => 10, /* how many post you need to display */
                    'offset' => 0,
                    'category__not_in' => array(58),
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'post', /* your post type name */
                    'post_status' => 'publish',


                  ) );
                    ?>
                  <?php if ( $latest->have_posts() ) : ?>
                  <?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
                  <li>
                    <div class="box-style">
                      <div class="box-left">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                      </div>
                      <div class="box-right">
                         <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                      </div>
                    </div>
                  </li>
                  <?php endwhile; wp_reset_postdata(); else : endif; ?>
                </ul>
              </div>
            </div>
            <!-- end content -->
            <!-- 2nd tab Content -->
            <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="profile-tab">
              <div class="tab-news">
                <ul>
                  <?php
                  $popular = new WP_Query( array(
                    'meta_key' => 'my_post_viewed',
                    'orderby' => 'meta_value_num',
                    'posts_per_page' => 10,
                    'offset' => 0,
                  ) );
                    ?>
                  <?php if ( $popular->have_posts() ) : ?>
                  <?php while ( $popular->have_posts() ) : $popular->the_post(); ?>
                  <li>
                    <div class="box-style">
                      <div class="box-left">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                      </div>
                      <div class="box-right">
                         <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                      </div>
                    </div>
                  </li>
                  <?php endwhile; else :  endif; wp_reset_postdata();?>
                </ul>

              </div>
            </div>

          </div>
          <!-- End content -->
        </div>
        <!-- End TabBar -->
      </div>
      <!-- end assidebar -->

      <!-- Page Navigation -->
          <div class="navigation">
            <?php
            global $wp_query;
            $total_pages = $wp_query->max_num_pages;
            if ($total_pages > 1){
            $current_page = max(1, get_query_var('paged'));
              echo '<div class="page_nav">';
              echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text' => 'পূর্ববর্তী',
                'next_text' => 'পরবর্তী'
              ));

              echo '</div>';
            }
             ?>
          </div>
    </div>
    <!-- End Main row -->
  </div>
  <!-- End Conatiner Fluid -->

<?php get_footer(); ?>