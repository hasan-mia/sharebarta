<?php get_header(); ?>
  <!-- End Header section -->


   <!-- =======================
        Main Body Section
    ======================== -->
<div class="container">
  <div class="row">
    <!-- ========Body Part======= -->
    <div class="col-md-9 col-sm-12 col-12">
      <!-- == Start Main Body Part== -->
      <section>
        <div class="row">
          <!-- ==================
                      Left Siebar Section
                    ================== -->
          <div class="col-md-3 col-sm-12 col-12">
            <ol class="breadcrumb my-3">
              <li><a href="<?php echo esc_url( home_url() )?>"><i class="fa fa-home"></i></a></li>
              <li><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></li>
            </ol>
            <!-- End Breadcrumb -->

            <!-- Start Post source -->
            <div class="post-source">
              <p> সর্বশেষ আপডেট: </p>
              <p> <?php echo bn_date(get_post_time('d M Y, l'));?> | <?php echo bn_date(get_post_time('h:i a'));?></p>
              <ul class="share-icon">
                <li> <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><i class="fab fa-facebook-square fa-2x"></i></a> </li>
                <li> <a href="https://twitter.com/share?url=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"> <i class="fab fa-twitter fa-2x"></i> </a> </li>
                <li> <a href="http://www.linkedin.com/shareArticle?url=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"> <i class="fab fa-linkedin fa-2x"></i> </a> </li>
                <li> <a href="javascript:window.print()"> <i class="fa fa-print fa-2x"></i> </a> </li>
              </ul>
            </div>
            <!-- End left Social Media -->

            <!-- =====Left Sidebar Ads====== -->
            <div class="my-3">
              <?php dynamic_sidebar('single-left-sidebar');?>
            </div>

          </div>
          <!-- End Left Sidebar -->

          <div class="col-md-9 col-sm-12 col-12">
            <?php
            while ( have_posts() ) :
      				the_post();
             ?>
            <article class="main my-3">
              <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
              <div class="single-text my-3" style="overflow:hidden;">
                <div class="single-image">
                  <?php the_post_thumbnail();?>
                </div>
                  <p><?php the_content(); ?></p>
              </div>
            </article>


            <!-- Comment Section -->
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="comments">
                    <!-- <h3 id="reply-title">মতামত দিন</h3> -->
                    <!-- Facebook Comment -->
                    <!-- <div class="fb-comments" data-href="https://bn.worldtribune.net/" data-width="" data-numposts="5"></div> -->
                    <!-- Wordpress Comment -->
                    <?php
                    if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif;

            			endwhile; // End the loop.
                   ?>
                  </div>
                </div>
                <!-- end comments column -->
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                  <!--====Related News======-->
                <section class="single-related">
                   <div class="sidebar-title text-left">
                       <h1>অন্যরা যা পড়ছে</h1>
                   </div>
                     <div class="row">
                       <div class="col-md-6 col-sm-12 col-12">
                         <?php
                         $related = new WP_Query(array(
                              'post_type' => 'post',
                              'category__in' => wp_get_post_categories(get_the_ID()),
                              'post__not_in' => array(get_the_ID()),
                              'posts_per_page' => 3,
                              
                            ));
                            ?>

                            <?php if ( $related->have_posts() ) : ?>
                            <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                           <div class="box-style">
                                     <div class="box-left">
                                       <?php the_post_thumbnail();?>
                                     </div>
                                     <div class="box-right">
                                       <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                     </div>
                                   </div>
                            <?php  endwhile; else : endif;wp_reset_postdata(); ?>
                     </div>
                       <!-- end column-->

                     <div class="col-md-6 col-sm-12 col-12">
                         <?php
                         $related = new WP_Query(array(
                              'post_type' => 'post',
                              'category__in' => wp_get_post_categories(get_the_ID()),
                             'post__not_in' => array(get_the_ID()),
                              'posts_per_page' => 3,
                              'offset' => 3,
                              
                            ));
                            ?>

                            <?php if ( $related->have_posts() ) : ?>
                            <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                           <div class="box-style">
                                     <div class="box-left">
                                       <?php the_post_thumbnail();?>
                                     </div>
                                     <div class="box-right">
                                       <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                     </div>
                                   </div>
                            <?php  endwhile; else : endif;wp_reset_postdata(); ?>
                       </div>
                       <!-- end column-->
                     </div>
                    <!--end row-->

              </section>
              <!-- end related post -->
                </div>
                <!-- end column -->
              </div>
              <!-- end row -->

          </div>
          <!-- end main article -->


        </div>
      </section>


    </div>
    <!-- End Body Part Col -->

    <!-- =========== Sidebar Part========== -->
    <div class="col-md-3 col-sm-12 col-12">
      <!-- ==========Company Ads=========== -->
    <section>
      <div class="company-ads">
        <div class="row">
          <?php
           // the query
           $the_category = new WP_Query( array(
             'post_type' => 'ads',
             'post_status' => 'publish',
             'posts_per_page' => 6,
             'orderby' => 'post_date',
             'order' => 'DESC',
             'type' => 'company-ads',
           ));
           ?>
          <?php if ( $the_category->have_posts()) : ?>
          <?php while ( $the_category->have_posts() ) : $the_category->the_post(); ?>
          <?php $url= get_post_meta($post->ID, 'custom-link', true); ?>
          <div class="col-md-12 col-sm-12 col-12">
            <div class="company-ads">
              <a href="<?php echo esc_url($url) ?>" target="_blank"><?php the_post_thumbnail();?></a>
            </div>
          </div>
          <?php endwhile; endif; wp_reset_postdata();?>
        </div>
      </div>
    </section>
    <!-- end company sensitive ads -->

      <section class="my-3">
        <!-- =========Latest News sidebar========== -->
        <div class="row">
          <div class="col-md-12">
            <div class="cat-right-sidebar">
              <div class="sidebar-title">
                <h1> সর্বশেষ সংবাদ </h1>
              </div>
              <?php
                $latest = array(
                  'posts_per_page' => 8, /* how many post you need to display */
                  'offset' => 0,
                  'category__not_in' => array(31337),
                  'orderby' => 'post_date',
                  'order' => 'DESC',
                  'post_type' => 'post', /* your post type name */
                  'post_status' => 'publish',

                );

                $query = new WP_Query($latest);
                if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                ?>
              <div class="box-style">
                <div class="box-left">
                  <?php the_post_thumbnail();?>
                </div>
                <div class="box-right">
                  <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                </div>
              </div>
            <?php endwhile; endif;?>
              <!-- end content -->

            </div>
          </div>
        </div>
      </section>
      <!-- end section -->

      <!-- Single right Sidebar Ads -->
      <asside>
            <?php dynamic_sidebar('single-right-sidebar');?>
      </asside>
      <!-- End Main Sidebar -->

    </div>
    <!-- End Sidebar Part -->
  </div>
  <!-- End Main Body Section -->
</div>
  <!-- =========================
        Footer Section
    ============================ -->
<?php get_footer(); ?>