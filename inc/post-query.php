
// ======Multiple Post Query======
<?php
    $categories = get_categories( array(
        'child_of'=>'your_category_id'
    ) );

    $subcategories = array();

    foreach ( $categories as $category ) {
        $subcategories[] = $category->cat_ID;
    }
?>

<?php
    $new_loop = new WP_Query( array(
    'post_type' => 'post',
    'category__in' => $subcategories,
    'posts_per_page' => 5
    ) );
?>

<?php if ( $new_loop->have_posts() ) : while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>

    // put your inside the loop code here

<?php endwhile; else: ?>
    No posts found
<?php endif; ?>
<?php wp_reset_query(); ?>