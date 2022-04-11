<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php 
query_posts( 'posts_per_page=1&post_type=home_page' ); 
while (have_posts()) : the_post();
?>
<figure class="slider-area">
    <div class="slider-area-inner">
    <div class="ajax_loading"><i class="fa fa-spinner fa-spin"></i></div>
    <div id="nivoparrallax" class="nivoSlider"> 
	<?php $slider = get_group('home_slider');
	foreach($slider as $sliders)
		{
		?>
        <div class="slider-item"> <img src="<?php echo $sliders['home_slider_image'][1]['original']; ?>" title="#imgcaption1" alt="image" />
            <div id="imgcaption1" class="caption-item" style="display: none">
              <div class="container">
                <div class="RightToLeft">
                  <div class="Headding"><?php echo $sliders['home_slider_heading'][1];  ?></div>
                  <div class="sub-heading"><?php echo $sliders['home_slider_subheading'][1];  ?></div>
                  <div class="s-dsc hidden-xs"><?php echo $sliders['home_slider_description'][1];  ?></div>
                  <div class="readmore"> <a href="<?php echo $sliders['home_slider_slider_link'][1];  ?>" class="btn btn-button Pink-color-bg">View More</a> </div>
                </div>
              </div>
            </div>
        </div>
	<?php }   ?> 
    </div>
    </div>
</figure>
<section class="page-section">
    <div class="container">
    <div class="row">
	    <?php $category_section = get_group('two_category_section');
		foreach($category_section as $categorysec)
		{
		?>
        <div class="col-md-6">
            <div class="thumbnail no-border no-padding thumbnail-banner size-1x3 hover">
              <div class="media">
                <div class="media-link" href="#">
                  <div class="img-bg" style="background-image:url(<?php echo $categorysec['category_section_first_image'][1]['original']; ?>);"></div>
                  <div class="caption">
                    <div class="caption-wrapper div-table">
                      <div class="caption-inner div-cell">
                        <h2 class="caption-title"><?php echo $categorysec['category_section_first_titile'][1];  ?></h2>
                        <h3 class="caption-sub-title"><?php echo $categorysec['category_section_first_description'][1];  ?></h3>
                        <div class="aligncenter"><a href="<?php echo $categorysec['category_section_first_link'][1];  ?>" class="btn btn-button Pink-color-bg"> View Products </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="thumbnail no-border no-padding thumbnail-banner size-1x3">
              <div class="media">
                <div class="media-link" href="#">
                  <div class="img-bg" style="background-image: url(<?php echo $categorysec['category_section_second_image'][1]['original']; ?>);"></div>
                  <div class="caption text-right">
                    <div class="caption-wrapper div-table">
                      <div class="caption-inner div-cell">
                        <h2 class="caption-title"><?php echo $categorysec['category_section_second_title'][1];  ?></h2>
                        <h3 class="caption-sub-title"><?php echo $categorysec['category_section_second_description'][1];  ?></h3>
                        <div class="aligncenter"><a href="<?php echo $categorysec['category_section_second_link'][1];  ?>" class="btn btn-button Pink-color-bg"> View Products </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
		<?php }   ?> 
    </div>
    </div>
</section>
<?php endwhile; 
wp_reset_query();
?>
<section class="featured-box padding-45">
    <div class="container"> 
		<div class="featured-heading product-heading">
          <h2 class="no-margin"> <span>Offer Products</span> </h2>
        </div>
		<div class="featured-prodcuts product-container padding-30"> 
          <?php
		  $args = array( 'post_type' => 'product', 'product_cat' => 'offers', 'posts_per_page' => '8' );
		  $loop = new WP_Query( $args );//print_r($loop);
		  while ( $loop->have_posts() ) : $loop->the_post(); 
		  global $product;
		  $percentage= round((( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100),0) ;
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
               <!--
			   <div class="product-price"><span class="new-price">BHD <?php echo  $product->sale_price;  ?></span> <span class="old-price">BHD <?php echo  $product->regular_price;  ?></span> </div>
                <div class="offer"><?php echo $percentage; ?>% OFF</div>
              -->
			  </div>
			  
            </div>
          </div>
		  <?php
		  endwhile; 
		  wp_reset_query(); 
		  ?>
          <!-- / single item --> 
        </div>
	</div>
</section>	
<section class="promo-box1 padding-30">
      <div class="container">
        <div class="originalback" style="background-image: url(<?php bloginfo( 'stylesheet_directory' ); ?>/assets/image/slides.jpg);">
          <div class="posba">
            <div class="col-md-7">
              <div class="fullhea">Bahrain Pride Trading Centre Last Mega Draw</div>
            </div>
            <div class="col-md-4"><a href="#" class="buttonall">View More</a></div>
          </div>
        </div>
      </div>
</section>
    <section class="our-product-box padding-45">
      <div class="container">
        <div class="tab-product">
          <div class="tab-menu-box"> 
            <!--  tab product title -->
            <div class="ourproducts-heading product-heading">
              <h2 class="no-margin"> <span>Our Product</span> </h2>
            </div>
            <!-- / tab product --> 
            <!--  tab product menu -->
            <div class="tab-menu">
              <ul role="tablist">
                <li class="active" role="presentation"><a data-toggle="tab" role="tab" href="#allproduct" aria-expanded="true"><span>All Product</span></a></li>
                <li class="" role="presentation"><a data-toggle="tab" role="tab" href="#latestproduct" aria-expanded="false"><span>Kitchen & Dining</span></a></li>
                <li class="" role="presentation"><a data-toggle="tab" role="tab" href="#bestsaler" aria-expanded="false"><span>Kids Toys</span></a></li>
                <li class="" role="presentation"><a data-toggle="tab" role="tab" href="#mostpupoler" aria-expanded="false"><span>Stationery</span></a></li>
              </ul>
            </div>
            
            <!-- / tab product menu --> 
            <!--  tab product content -->
            <div class="tab-product-content multiap"> 
              <!-- item box -->
              <div class="tab-conten">
                <div id="allproduct" class="tab-pane fade in active " role="tabpanel">
                <div class="our-product"> 
                    <?php
					$args = array( 'post_type' => 'product','posts_per_page' => '12','tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => array( 'offers' ),
						'operator' => 'NOT IN'
						)
					) );
					$loop = new WP_Query( $args );//print_r($loop);
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $product;
					?>
                    <div class="product-item">
                      <div class="product-item-img"> <a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image" /> </a> </div>
                      <div class="item-bottom">
                        <div class="item-content">
						
                          <div class="product-name"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></div>
                          <!--
						  <div class="product-price"> <span class="new-price">BHD <?php echo  $product->regular_price;  ?></span></div>
                          -->
						</div>
                      </div>
                    </div>
                    <?php
					endwhile; 
					wp_reset_query(); 
					?>
                </div>
                </div>
                <div id="latestproduct" class="tab-pane fade" role="tabpanel">
                  <div class="our-product"> 
                     <?php
					$args = array( 'post_type' => 'product','product_cat' => 'kitchen-dining','posts_per_page' => '12');
					$loop = new WP_Query( $args );//print_r($loop);
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $product;
					?>
                    <div class="product-item">
                      <div class="product-item-img"> <a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image" /> </a> </div>
                      <div class="item-bottom">
                        <div class="item-content">
                          <div class="product-name"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></div>
                         
						 <!--<div class="product-price"> <span class="new-price">BHD <?php echo  $product->regular_price;  ?></span></div>-->
                        
						</div>
                      </div>
                    </div>
                    <?php
					endwhile; 
					wp_reset_query(); 
					?>
                  </div>
                </div>
				<div id="bestsaler" class="tab-pane fade" role="tabpanel">
                  <div class="our-product"> 
					<?php
					$args = array( 'post_type' => 'product','product_cat' => 'kids-toys','posts_per_page' => '12');
					$loop = new WP_Query( $args );//print_r($loop);
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $product;
					?>
                    <div class="product-item">
                      <div class="product-item-img"> <a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image" /> </a> </div>
                      <div class="item-bottom">
                        <div class="item-content">
                          <div class="product-name"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></div>
                          
						  <!--<div class="product-price"> <span class="new-price">BHD <?php echo  $product->regular_price;  ?></span></div>-->
                        
						</div>
                      </div>
                    </div>
                    <?php
					endwhile; 
					wp_reset_query(); 
					?>
				  </div>
				</div>  
                <div id="mostpupoler" class="tab-pane fade" role="tabpanel">
                  <div class="our-product"> 
                    <?php
					$args = array( 'post_type' => 'product','product_cat' => 'stationery','posts_per_page' => '12');
					$loop = new WP_Query( $args );//print_r($loop);
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $product;
					?>
                    <div class="product-item">
                      <div class="product-item-img"> <a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image" /> </a> </div>
                      <div class="item-bottom">
                        <div class="item-content">
                          <div class="product-name"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></div>
                         
						<!--<div class="product-price"> <span class="new-price">BHD <?php echo  $product->regular_price;  ?></span></div>-->

						 </div>
                      </div>
                    </div>
                    <?php
					endwhile; 
					wp_reset_query(); 
					?>
                  </div>
                </div>
              </div>
              <!-- / item box --> 
            </div>
            <!-- / tab product content --> 
          </div>
        </div>
      </div>
</section>
<?php get_footer(); ?>
