<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="container">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"style="font-size:26px"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->
			
	<?php
                //Columns must be a factor of 12 (1,2,3,4,6,12)
                $numOfCols = 4;
                $rowCount = 0;
                $bootstrapColWidth = 12 / $numOfCols;
            ?>
            <div class="products-grid row medium-products products">
             <div class="row">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>
			<div class="col-md-<?php echo $bootstrapColWidth; ?> m_b_20">
			<div class="product-item">
                      <div class="product-item-img"> 
                      <a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>"> 
                      <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="product image" /> 
                      </a> 
                       <div class="hover-box">
                <a type="button" href="<?php echo get_permalink(); ?>" class="btn btn-button cart-button lagoon-blue-bg"><i class="fa fa-eye"></i></a>
              </div>
                      </div>
                      <div class="item-bottom">
                        <div class="item-content">
                          <div class="product-name"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></div>
                         
						 <!--<div class="product-price"> <span class="new-price">BHD <?php echo  $product->regular_price;  ?></span></div>-->
                        
						</div>
                      </div>
                    </div>
                    </div>
                    <?php
 $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
			//	get_template_part( 'content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
</div>
</div>
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
