<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
if ( $woocommerce_loop['columns'] == 2 ) {
	$classes[] = 'ktz_col2';
	} elseif ( $woocommerce_loop['columns'] == 3 ) {
	$classes[] = 'ktz_col3';
	} elseif ( $woocommerce_loop['columns'] == 4 ) {
	$classes[] = 'ktz_col4';
	} elseif ( $woocommerce_loop['columns'] == 5 ) {
	$classes[] = 'ktz_col5';
	} elseif ( $woocommerce_loop['columns'] == 6 ) {
	$classes[] = 'ktz_col6';
	} else {
	$classes[] = 'ktz_col_default';
	}
?>
<li <?php post_class( $classes ); ?>>
	<div class="products-box ktz-product-fade">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
		<a href="<?php the_permalink(); ?>">
	
		<?php
			/**
			 * Remove hook in _woocommerce_ktz.php and add new ktz_badge_sale_amount
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10 
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'ktz_badge_sale_amount' ); 
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>		

		</a>
			
		<h3><a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></h3>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div>
</li>