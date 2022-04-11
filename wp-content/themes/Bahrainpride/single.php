<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 
while ( have_posts() ) : the_post();
if(get_post_type()=='promotions')
	{ ?>
<section class="breadcrumb-area" style="background:url(<?php bloginfo( 'stylesheet_directory' ); ?>/assets/image/breadcrumb.jpg);">
      <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span><?php the_title();  ?></span></div>
            <ul>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>
              <li><a href="<?php echo get_permalink(13); ?>"><span><span>Promotions</span></span></a></li>
              <li><span><?php the_title();  ?></span></li>
            </ul>
          </div>
        </div>
      </div>
</section>
<section class="main-page container m_t_40 m_b_40">
      <div class="main-container col2-left-layout">
        <div class="main">
          <div class="row">
            <aside class=" col-sm-12 col-md-12 col-lg-12 p_b_30">
              <div class="col-main"> 
                <!--  our product -->
                <div class="allpr">
                  <div class="product-container">
                    <div id="products-grid">
                      <ul class="products-grid row medium-products">
                        <!-- item -->
                        <li class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m_b_20">
                          <div class="pastpost">
                            <div class="row">
                              <div class="col-lg-5 col-md-5">
                                <div class="allpic"> <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-responsive" alt="img"> </div>
                              </div>
                              <div class="col-lg-7 col-md-7">
                                <h1 class="corporatehead"><?php the_title();  ?></h1>
                                <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get('date_from'); ?> to <?php echo get('date_to'); ?></div>
                                <div class="description m_b_10"><?php echo get_the_content();  ?></div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- / our product --> 
              </div>
            </aside>
            <!-- / Right side --> 
          </div>
        </div>
      </div>
</section>
<?php	

}

else if(get_post_type()=='product')
	{
	$c=1;
	$attachment_ids = $product->get_gallery_attachment_ids();
	?>
<section class="main-page container m_t_40 m_b_40">
    <div class="main-container col1-layout">
    <div class="main">
    <div class="col-main">
	<div class="product-view">
		<div class="product-essential ">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
						<div id="bannerslide" class="m_b_30">
						  <div id="carousel-custom" class="carousel slide" data-ride="carousel">
							<div class="carousel-outer">
							  <div class="carousel-inner">
								<div class="item active"> <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"/> </div>
								<?php
								foreach( $attachment_ids as $attachment_id ) 
									{ ?>
									<div class="item"> <img src="<?php echo  wp_get_attachment_image_src( $attachment_id, 'full' )[0]; ?>"/> </div>
									<?php }	
								?>
							  </div>
							  <!-- sag sol --> 
							  <a class='left carousel-control' href='#carousel-custom' data-slide='prev'> <span class='glyphicon fa fa-chevron-left'></span> </a> <a class='right carousel-control' href='#carousel-custom' data-slide='next'> <span class='glyphicon fa fa-chevron-right'></span> </a> </div>
							
							<!-- thumb -->
							<ol class='carousel-indicators mCustomScrollbar meartlab'>
							  <li data-target='#carousel-custom' data-slide-to='0' class='active'><img src="<?php echo get_the_post_thumbnail_url(); ?>"/></li>
							  <?php
							  foreach( $attachment_ids as $attachment_id ) 
									{ ?>
							  <li data-target='#carousel-custom' data-slide-to='<?php echo $c; ?>'> <img  src="<?php echo wp_get_attachment_image_src( $attachment_id, 'thumbnail' )[0]; ?>"></li>
							  <?php ++$c; }	?>
							</ol>
						  </div>
						</div>
				</div>		
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="product-shop">
					  <div class="products-name">
					  <h1><?php the_title();  ?></h1>
					  </div>
					  <div class="product-discription">
							<p><?php echo $product->description;  ?></p>
							<?php echo $product->short_description;  ?>
					  </div>
					  <!--
					  <div class="product-price"> 
					  <?php if($product->sale_price=='') { ?>
					  <span class="new-price bigprice">BHD <?php echo $product->regular_price; ?></span>
					  <?php } else { ?>
					  <span class="old-price">BHD <?php echo $product->regular_price; ?></span> <span class="new-price bigprice">BHD <?php echo $product->sale_price; ?></span> 	
					  <?php }  ?>
					  </div>
					  -->
					  <div class="social-link padding-top"> 
					  <?php //echo DISPLAY_ULTIMATE_PLUS(); ?>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$cats_array = array(0);
		$terms = wp_get_post_terms( $product->id, 'product_cat' );
		if( sizeof( $terms ) ){
			foreach ( $terms as $term ) {
				$children = get_term_children( $term->term_id, 'product_cat' );
				if ( !sizeof( $children ) )
					$cats_array[] = $term->term_id;
			}
		}
		$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type' => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows' => 1,
		'posts_per_page' => 8,
		'orderby' => $orderby,
		'post__not_in' => array( $product->id ),
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cats_array
			),
		)
		) );
		$loop = new WP_Query( $args );
		if ($loop) : 
		?>
		<div class="product-collateral row-fluid p_t_20 p_b_30"> 
            <section class="upsale-box padding-45"> 
                <div class="upsale-hadding product-heading">
                   <h2 class="no-margin"> <span>Related Products</span> </h2>
                </div>
                <div class="related-prodcuts medium-products product-container padding-30"> 
                    <?php
					while ( $loop->have_posts() ) : $loop->the_post(); 
					?>
                    <div class="product-item">
						<div class="product-item-img"> <a href="<?php echo get_permalink(); ?>" title="product image"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image" /> </a>
						  <div class="hover-box">
							<a type="button" href="<?php echo get_permalink(); ?>" class="btn btn-button cart-button lagoon-blue-bg"><i class="fa fa-eye"></i></a>
						  </div>
						</div>
						<div class="item-bottom">
						  <div class="item-content">
							<div class="product-name"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></div>
							<div class="product-price"><span class="new-price">BHD <?php if($product->sale_price=='') { echo $product->regular_price; } else { echo $product->sale_price; }  ?></span></div>
							
						  </div>
						</div>
					</div>
					<?php 
					endwhile;
					wp_reset_query(); 		
					?>
                </div>
            </section>
        </div>
		<?php 
		endif;
		?>
		</div>
	</div>
	</div>
	</div>
</section>	
	<?php
	}
else
	{
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );

		// End the loop.
		
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	
<?php } 
endwhile;
?>


<?php get_footer(); ?>
