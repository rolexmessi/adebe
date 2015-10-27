<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>
<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="commentwrapper clearfix">
		<div class="author-card pull-left clearfix">
		<?php echo get_avatar( $GLOBALS['comment'], $size='52' ); ?>
		</div>
            <div class="comment_data">
			<span class="fontawesome ktzfo-caret-left"></span>

					<p><span itemprop="author" class="comment_author_link"><?php comment_author(); ?></span> 
					<?php

					if ( get_option('woocommerce_review_rating_verification_label') == 'yes' )
					if ( wc_customer_bought_product( $comment->comment_author_email, $comment->user_id, $comment->comment_post_ID ) )
					echo '<em class="verified">(' . __( 'verified owner', 'woocommerce' ) . ')</em> ';

					?>
					<span class="comment-date"><time itemprop="datePublished" datetime="<?php echo get_comment_date('c'); ?>"><?php echo get_comment_date(__( get_option('date_format'), 'woocommerce' )); ?></time></span>
			<?php if ( get_option('woocommerce_enable_review_rating') == 'yes' ) : ?>
				<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf(__( 'Rated %d out of 5', 'woocommerce' ), $rating) ?>">
					<span style="width:<?php echo ( intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
				</span>
			<?php endif; ?></p>
					
			<?php if ($GLOBALS['comment']->comment_approved == '0') : ?>
				<p><em><?php _e( 'Your comment is awaiting approval', 'woocommerce' ); ?></em></p>
			<?php else : ?>
				<div itemprop="description"><?php comment_text(); ?></div>
			<?php endif; ?>
					
				<div class="clear"></div>
			</div>
		<div class="clear"></div>
	</div>
