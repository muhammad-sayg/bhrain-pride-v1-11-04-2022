<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php
if(is_product_category())
	{
?>	
<section class="breadcrumb-area" style="background:url('https://www.shakeelgroup.com.bh/bahrainpride/wp-content/uploads/2021/09/Banner-Bahrain-Pride.png');">
      <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span>Products</span></div>
            <ul>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>
              <li><a href="#"><span><span>Products</span></span></a></li>
              <li><span><?php the_title(); ?></span></li>
            </ul>
          </div>
        </div>
      </div>
</section>	
 <section class="main-page container m_t_40 m_b_40">
    <div class="main-container col2-left-layout">
      <div class="main">
        <div class="row"> 
		<aside class="col-sm-4 col-md-3 col-lg-3 left-column">
		<section class="category-menu p_b_30">
            <div class="bunker-color-bg">
			<div class="category-hadding">
                <h2><span class="fa fa-list"></span> Categories </h2>
            </div>
			<div class="category-meni-content">
			<?php if ( function_exists ( dynamic_sidebar('category_sidebar') ) ) : ?>
			<?php dynamic_sidebar ('category_sidebar'); ?>
            <?php endif; 
			?>
			</div>
			</div>
		</section>	
		</aside>
		<aside class=" col-sm-8 col-md-9 col-lg-9 p_b_30">
			<div class="col-main">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
				get_template_part( 'content', 'page' );
				endwhile;
				?>
			</div>	
		</aside>
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
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
</div><!-- .content-area -->
<?php } ?>
<?php get_footer(); ?>
