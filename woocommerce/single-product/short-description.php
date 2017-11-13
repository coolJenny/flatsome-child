<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

if ( ! $post->post_excerpt ) {
	return;
}

?>
<div class="product-short-description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
	
	<?php if( $product->is_type( 'variable' ) ){ ?>
		<p class="stock in-stock" style="border-top: 1px dashed #ddd; padding-top: 20px;">Select a Color</p>
	<?php }	?>
</div>
