<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
<div class="product-item">
                            <div class="product-item-img"><a href="<?php echo get_permalink(); ?>" title="product image"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image"></a>
                              <div class="hover-box"> <a href="<?php echo get_permalink(); ?>" class="btn btn-button cart-button lagoon-blue-bg"> <i class="fa fa-eye"></i> </a> </div>
                            </div>
                            <div class="item-bottom">
                              <div class="item-content">
                                <div class="product-name"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></div>
                                
								<!--<div class="product-price"><span class="new-price">BHD <?php if($product->sale_price=='') { echo $product->regular_price; } else { echo $product->sale_price; }  ?></span></div>-->
                              
							  </div>
                            </div>
</div>	
</li>
