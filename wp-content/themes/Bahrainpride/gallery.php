<?php 
/*
	Template Name: Gallery
*/
get_header(); 
?>
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/ninja-slider.css" rel="stylesheet" type="text/css">
<a href="https://play.google.com/store/apps/details?id=com.shahico.bahrainpride&hl=en_US&gl=US" target="_blank">
<section class="breadcrumb-area" style="background:url('https://www.shakeelgroup.com.bh/bahrainpride/wp-content/uploads/2021/09/Banner-Bahrain-Pride.png');">
    <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span>Gallery</span></div>
            <ul>
              <!--<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>-->
              <!--<li><span>Gallery</span></li>-->
            </ul>
          </div>
        </div>
    </div>
</section>
</a>
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
<?php get_footer(); ?>