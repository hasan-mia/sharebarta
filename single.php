<?php get_header(); ?>
  <!-- End Header section -->


   <!-- =======================
        Main Body Section
    ======================== -->
<div class="container" id="lead-sec single-two">
  <div class="row">
    <!-- ========Body Part======= -->
    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
      <!-- == Start Main Body Part== -->
          <div class="breadcrumb my-2">
              <li><a href="<?php echo esc_url( home_url() )?>"><i class="fa fa-home"></i></a></li>
              <li><a href="<?php echo esc_url( home_url() )?>/category/<?php $cat = get_the_category(); echo $cat[0]->cat_name;?>"> <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?> </a></li>
            </div>
            <!-- end breadcrumb -->

            <!-- =======Article Part====== -->
            <?php
            while ( have_posts() ) :
      				the_post();
             ?>
            <article class="main" id="print">
              <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>              <div class="row">
                <!-- end title -->
                <div class="col-md-6 col-sm-12 col-12">
                  <div class="post-source">
                    <div class="author">
                      <span class="author"> <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?> </span>
                      <i class="fas fa-pencil-alt"></i>
                      <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                     </div>
                    <p> <span class="far fa-clock text-danger"></span> প্রকাশিত: <?php echo bn_date(get_post_time('h:i a'))?>, <?php echo bn_date(get_post_time('d M Y, l'));?></p>
                  </div>
                  <!-- end post source -->
                </div>
                <!-- end column -->
                <div class="col-md-6 col-sm-12 col-12">
                  <div class="single-social">
                    <ul class="share-icon">
                      <li> <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank"> <i class="fab fa-facebook-square"></i> </a> </li>
                      <li> <a href="https://twitter.com/share?url=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank"> <i class="fab fa-twitter-square"></i> </a> </li>
                      <li> <a href="http://www.linkedin.com/shareArticle?url=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank"> <i class="fab fa-linkedin"></i> </a> </li>
                      <li> <a href="javascript:window.print()"> <i class="fa fa-print"></i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- end social share -->
              <div class="single-text" style="overflow:hidden;">
                <div class="single-image">
                  <?php the_post_thumbnail();?>
                </div>
                <!-- end feture image -->

                <div class="main-content">
                  <p><?php the_content(); ?></p>
                </div>
                <div class="single-post-tags">
                  <ul class="photo-tags">
                    <li><i class="fa fa-tags"></i></li>
                    <li>
                      <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                     </li>
                  </ul>
                </div>
              </div>
            </article>
            <!-- end main article -->


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
                    <section class="single-related" id="cat-left">
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
                                  'posts_per_page' => 5,
                                  
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
                                  'posts_per_page' => 5,
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
          <!-- end main article -->

    </div>
    <!-- End Body Part Col -->

    <!-- =========== Sidebar Part========== -->
    <div class="col-lg-8 col-md-12 col-sm-12 col-12">

      <section class="my-2">
        <!-- =========Latest News sidebar========== -->
        <div class="row">
          <div class="col-md-12 col-sm-12-col-12" id="full-single-body">
            <div class="cat-right-sidebar">
              <div class="sidebar-title">
                <h1> সর্বশেষ সংবাদ </h1>
              </div>
              <?php
                $latest = array(
                  'posts_per_page' => 16, /* how many post you need to display */
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