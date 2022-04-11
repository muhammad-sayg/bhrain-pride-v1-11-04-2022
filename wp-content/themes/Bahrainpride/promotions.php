<?php 
/*
	Template Name: Promotions
*/
get_header(); 
?>
<section class="breadcrumb-area" style="background:url('https://www.shakeelgroup.com.bh/bahrainpride/wp-content/uploads/2021/09/Banner-Bahrain-Pride.png');">
      <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span>Promotions</span></div>
            <ul>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>
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
				<aside class=" col-sm-12 col-md-12 col-lg-12 p_b_30">
					<div class="col-main"> 
					<!--  our product -->
						<div class="allpr">
							<div class="product-container">
								<?php
									while ( have_posts() ) : the_post(); 
									the_content();
									endwhile; 
									wp_reset_query(); 
								?>	
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
<style>
.mfp-figure img {
-webkit-transition: 0.6s ease;
 transition: 0.6s ease;	
}
.mfp-content:hover .mfp-figure  img {
 -webkit-transform: scale(1.4);
 transform: scale(1.4);
 }
</style>
<?php get_footer(); ?>