<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( '১ টি মতামত &ldquo;%s&rdquo;', 'comments title', 'worldtribune' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s উত্তর &ldquo;%2$s&rdquo;',
						'%1$s উত্তর &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'worldtribune'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 70,
					'style'       => 'ul',
					'short_ping'  => true,
					'reply_text'  => __( 'উত্তর দিন', 'worldtribune' ),
				)
			);
			?>
		</ul>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => '<span class="screen-reader-text">' . __( 'পূর্ববর্তী', 'worldtribune' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'পরবর্তী', 'worldtribune' ) . '</span>',
			)
		);

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'worldtribune' ); ?></p>
		<?php
	endif;

	// =====Customize Comment Language======
	$comments_args = array(
			// 'fields' =>  $fields,
			'title_reply'=>'আপনার মতামত দিন',
			'label_submit' => 'মতামত দিন',
			'cancel_reply_link' => 'মতামত বাতিল করুন',
			'title_reply_to'       => __( 'উত্তর দিয়ে যান %s' ),

	);
	comment_form($comments_args);

	?>

</div><!-- #comments -->