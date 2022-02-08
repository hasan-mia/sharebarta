<?php get_header(); ?>

  <!-- =======================
        Main Body Section
    ======================== -->
<div class="container">
  <div class="row my-2">

    <!-- ========Body Part======= -->
   <?php if (have_posts()): ?>
    <div class="col-md-9 col-sm-12 col-12">
      <div class="section-page-title my-3">
        <h1><a href="<?php get_category_link( $category_name, $category_id, $category_slug ); ?> "> <?php single_cat_title(); ?> </a></h1>
      </div>

      <!-- Category Lead -->
      <section>
        <div class="cat-lead-news my-2">
          <div class="row">
            <div class="col-md-8 col-sm-12 col-12 my-3">
              <?php
              $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
               $cat_query = new WP_Query( array(
               'paged'         => $paged,
                 'posts_per_page' => 1,
                 'orderby' => 'date',
                 'cat' => get_query_var('cat'),
                 ));
                ?>
                <?php if ( $cat_query->have_posts() ) : ?>
                <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
                <?php  $top[] = $post->ID; ?>
              <div class="main-content">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <p> <?php echo wp_trim_words( get_the_content(), 15, '...' );?> </p>
              </div>
                <?php  endwhile; else : endif;wp_reset_postdata(); ?>
            </div>
            <!-- end column -->
            <div class="col-md-4 col-sm-12 col-12 my-2">
              <?php
              $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
              $cat_query = new WP_Query( array(
                  'paged'         => $paged,
                  'posts_per_page' => 2,
                  'orderby' => 'date',
                  'cat' => get_query_var('cat'),
                  'post__not_in'  =>  $top,
                  ));
                ?>
                <?php if ( $cat_query->have_posts() ) : ?>
                <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
                <?php  $top[] = $post->ID; ?>
              <div class="content my-2">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              </div>
              <?php  endwhile; else : endif;wp_reset_postdata(); ?>
            </div>
            <!-- end column -->
          </div>
          <!-- end row -->
        </div>
        <!-- End lead news -->
      </section>
      <!-- End lead news section -->

      <section class="my-2">
        <div class="row">
          <?php
          $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
          $cat_query = new WP_Query( array(
              'paged'         => $paged,
              'posts_per_page' => 3,
              'orderby' => 'date',
              'cat' => get_query_var('cat'),
              'post__not_in'  =>  $top,
              ));
            ?>
            <?php if ( $cat_query->have_posts() ) : ?>
            <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
            <?php  $top[] = $post->ID; ?>
          <div class="col-md-4 col-sm-12 col-12">
            <div class="cat-content">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <!-- End content -->
          </div>
          <?php  endwhile; else: endif;  ?>
          <!-- End content column -->

        </div>
      </section>
      <!-- End section -->

      <section class="my-2">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <?php
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $cat_query = new WP_Query( array(
                'paged'         => $paged,
                'posts_per_page' => 6,
                'orderby' => 'date',
                'cat' => get_query_var('cat'),
                'post__not_in'  =>  $top,
                ));
              ?>
              <?php if ( $cat_query->have_posts() ) : ?>
              <?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
            <div class="row category-area my-1">
              <div class="col-md-4 col-sm-12 col-12">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
              </div>
              <div class="col-md-8 col-sm-12 col-12">
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <p> <?php echo wp_trim_words( get_the_content(), 20, '...' );?> </p>
                <p> <?php echo bn_date(get_post_time('h:i a')) . ', ' . bn_date(get_post_time('l, d M Y'));?></p>
              </div>
            </div>
            <?php  endwhile; else: endif;  ?>
            <!-- End cat-content -->

          </div>
        </div>
      </section>

    </div>



    <!-- =========== Sidebar Part========== -->
    <div class="col-md-3 col-sm-12 col-12">

      <section class="my-3">
        <!-- =========Most Read News From Category right sidebar========== -->
        <div class="row">
          <div class="col-md-12">
            <div class="cat-right-sidebar">
              <div class="sidebar-title">
                <h1>এই বিভাগের সর্বাধিক পঠিত</h1>
              </div>
              <?php
                $popular = new WP_Query( array(
                  'category__in' => wp_get_post_categories($post->ID),
                  'post__not_in' => array($post->ID),
                  'meta_key' => 'my_post_viewed',
                  'orderby' => 'meta_value_num',
                  'posts_per_page' => 10,
                  'offset' => 0,
                  'category__not_in' => array(11174),
                ) );
                  ?>
                <?php if ( $popular->have_posts() ) : ?>
                <?php while ( $popular->have_posts() ) : $popular->the_post(); ?>

                <div class="box-style">
                  <div class="box-left">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                  </div>
                  <div class="box-right">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                  </div>
                </div>
                <?php endwhile;  else : endif; wp_reset_postdata();?>
              <!-- end content -->

            </div>
          </div>
        </div>
      </section>
      <!-- end section -->

      <!-- Main Sidebar -->
      <asside>
          <?php get_sidebar();?>
      </asside>
      <!-- End Main Sidebar -->

    </div>
    <!-- End Sidebar Part -->
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
    <!-- End Body Part Col -->
  <?php   else:
      echo "<h2 style='color:red; text-align:center;margin:10% 0 10% -5%; font-family:SolaimanLipi;'> দুঃক্ষিত! এই ক্যাটাগরিতে কোন পোস্ট নেই... </h2>";
    endif; ?>

  </div>
</div>
  <!-- End Main Body  row Section -->

<?php get_footer(); ?>