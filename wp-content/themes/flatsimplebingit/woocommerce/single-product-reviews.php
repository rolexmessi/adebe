<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews"><div class="wrapcomment">
	<?php
	if ( get_option('woocommerce_enable_review_rating') == 'yes' ) {

		$count = $product->get_rating_count();

		if ( $count > 0 ) {

			$average = $product->get_average_rating();

			echo '<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';

			echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average ).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>';

			echo '<h4 class="related-title">'.sprintf( _n('%s review for %s', '%s reviews for %s', $count, 'woocommerce'), '<strong itemprop="ratingCount" class="count">'.$count.'</strong>', wptexturize($post->post_title) ).'</span></h4>';

			echo '</div>';

		} else {

			echo '<h4 class="related-title">'.__( 'Reviews', 'woocommerce' ).'</h4>';

		}

	} else {

		echo '<h4 class="related-title">'.__( 'Reviews', 'woocommerce' ).'</h4>';

	}

	$title_reply = '';

	if ( have_comments() ) :

		echo '<ol class="commentlist">';

		wp_list_comments( array( 'callback' => 'woocommerce_comments' ) );

		echo '</ol>';

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Previous', 'woocommerce' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'woocommerce' ) ); ?></div>
			</div>
		<?php endif;

		$title_reply = __( 'Add a review', 'woocommerce' );

	else :

		$title_reply = __( 'Be the first to review', 'woocommerce' ).' &ldquo;'.$post->post_title.'&rdquo;';

		echo '<p class="noreviews">'.__( 'There are no reviews yet, would you like to <a href="#review_form" class="inline show_review_form">submit yours</a>?', 'woocommerce' ).'</p>';

	endif;

	echo '</div>';
	
	if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) :
	
	echo '<div id="review_form_wrapper"><div id="review_form">';
	
	$commenter = wp_get_current_commenter();

	$comment_form = array(
		'title_reply' => '<span class="ktz-blocktitle">' . $title_reply . '</span>',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => array(
			'author' => '<div class="row"><div class="col-md-6"><div class="form-group has-feedback"><label class="control-label sr-only" for="author">Name</label><input type="text" name="author" class="form-control btn-box" id="form-control" placeholder="' . __( 'Name', ktz_theme_textdomain ) .' ' . ( $req ? __( '*', ktz_theme_textdomain ) : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1" aria-required="true" /><span class="glyphicon glyphicon-user form-control-feedback"></span></div></div>',
			'email'  => '<div class="col-md-6"><div class="form-group has-feedback"><label class="control-label sr-only" for="email">Email</label><input type="text" name="email" class="form-control btn-box" id="form-control" placeholder="' . __( 'Email', ktz_theme_textdomain ) .' ' . ( $req ? __( '*', ktz_theme_textdomain ) : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2" aria-required="true" /><span class="glyphicon glyphicon-envelope form-control-feedback"></span></div></div></div>',
		),
		'label_submit' => __( 'Submit Review', 'woocommerce' ),
		'logged_in_as' => '',
		'id_submit' => 'comment-submit',
		'comment_field' => ''
	);

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
						</select></p>';
					}

	$comment_form['comment_field'] .= '<div class="textarea-form"><textarea name="comment" cols="100%" rows="5" class="form-control btn-box" tabindex="4"></textarea></div>' . wp_nonce_field( 'woocommerce-comment_rating', '_wpnonce', true, false );

	comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );

	echo '</div></div>';
	
	else : 
	
	echo '<p class="woocommerce-verification-required">' . __( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ) . '</p>';

	endif;

?><div class="clear"></div></div>
